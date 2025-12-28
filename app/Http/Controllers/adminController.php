<?php

namespace App\Http\Controllers;

use App\Models\records;
use Illuminate\Http\Request;
use App\Models\Section;  // Assuming you have Section model
use App\Models\Question; // Assuming you have Question model
use App\Models\Feedback; // Assuming you have Feedback model
use App\Models\Discount; // Assuming you have Discount model
use App\Models\Company;  // Assuming you have Company model
use App\Models\questionOption;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class adminController extends Controller
{
    //
    public function index()
    {

        $stats = [
            'sections' => Section::all()->count(),
            'users' => User::all()->count(),
            'questions' => Question::all()->count(),
            'feedbacks' => Feedback::all()->count(),
            'companies' => Company::all()->count(),
        ];
        $view = view("admin.dashboard.index", compact('stats'));

        return view('layouts.app', compact('view'));
    }

    public function sections(Request $request)
    {

        $sections = Section::withCount('questions')->latest()->paginate(10);
        if ($request->filled('search')) {
            $sections = Section::withCount('questions')->where('name', 'like', '%' . $request->search . '%')->latest()->paginate(10);
        }
        $view = view("admin.sections.index", compact('sections'));
        return view('layouts.app', compact('view'));
    }
    public function destroySection($id)
    {
        $section = Section::findOrFail($id);
        $section->delete();

        return redirect()->route('admin.sections')->with('success', 'Хэсгийн мэдээллийг устгалаа.');
    }
    public function sectionsItem($id)
    {
        $section = Section::findOrFail($id);

        return response()->json($section);
    }
    public function newSection()
    {
        return view("admin.sections.create");
    }
    public function storeSection(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'number' => 'required',
            'status' => 'required',
        ]);

        // Check if section number already exists and is active
        if (Section::where('section_number', $request->number)
            ->where('is_active', true)
            ->where('id', '!=', $request->id)
            ->exists()
        ) {
            return redirect()->back()->with('error', 'Хэсгийн дугаар аль хэдийн байна.');
        }

        Section::create([
            'name' => $request->name,
            'section_number' => $request->number,
            'is_active' => $request->status === 'true' ? 1 : 0,
            'created_userid' => auth()->user()->id,
        ]);

        return redirect()->route('admin.sections')->with('success', 'Хэсгийн мэдээллийг хадгаллаа.');
    }

    public function updateSection(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'number' => 'required',
            'status' => 'required',
        ]);

        $section = Section::findOrFail($id);

        // Check if section number already exists and is active, excluding current section
        if (Section::where('section_number', $request->number)
            ->where('is_active', true)
            ->where('id', '!=', $id)
            ->exists()
        ) {
            return redirect()->back()->with('error', 'Хэсгийн дугаар аль хэдийн байна.');
        }

        $section->update([
            'name' => $request->name,
            'section_number' => $request->number,
            'is_active' => $request->status === 'true' ? 1 : 0,
            'updated_userid' => auth()->user()->id,
        ]);

        return redirect()->route('admin.sections')->with('success', 'Хэсгийн мэдээлэл амжилттай шинэчлэгдлээ.');
    }

    public function storeQuestion(Request $request)
    {
        Log::info($request->toArray());
        $request->validate([
            'name' => 'required',
            'img_url' => 'nullable',
            'section_id' => 'required|exists:sections,id',
            'is_active' => 'nullable|boolean',
            'correct_answer' => 'required',
            'why_correct' => 'nullable|string',
            'options' => 'required|array|min:2',
            'options.*' => 'required|string|max:255'
        ]);

        $section = Section::find($request->section_id);
        if (!$section) {
            return redirect()->back()->with('error', 'Сонгосон хэсэг олдсонгүй.');
        }

        // Start database transaction
        DB::beginTransaction();

        try {
            // First create the question with all required fields
            $question = Question::create([
                'name' => $request->name,
                'section_id' => $request->section_id,
                'img_url' => $request->img_url,
                'is_active' => $request->has('is_active') ? 1 : 0,
                'why_correct' => $request->why_correct,
                'created_userid' => Auth::id()
                // answer_id will be set after creating the option
            ]);

            // Create all options and track the correct one
            foreach ($request->options as $index => $optionText) {
                $isCorrect = $index == $request->correct_answer;
                $option = questionOption::create([
                    'question_id' => $question->id,
                    'option_name' => $optionText,
                    'is_correct' => $isCorrect,
                    'created_userid' => Auth::id()
                ]);

                // If this is the correct answer, update the question with answer_id
                if ($isCorrect) {
                    $question->update(['answer_id' => $option->id]);
                }
            }

            // All options are now created in the previous loop

            DB::commit();
            return redirect()->back()
                ->with('success', 'Асуултыг амжилттай хадгаллаа.');
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Асуулт хадгалахад алдаа гарлаа: ' . $e->getMessage());
            return redirect()->back()
                ->withInput()
                ->with('error', 'Алдаа гарлаа. Дахин оролдоно уу.');
        }
    }
    public function storeUpdateQuestion(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'section_id' => 'required|exists:sections,id',
            'is_active' => 'boolean',
            'why_correct' => 'nullable|string',
            'options' => 'required|array|min:2',
            'options.*.id' => 'sometimes|exists:question_options,id',
            'options.*.option_text' => 'required|string|max:255',
            'answer_id' => 'required|exists:question_options,id'
        ]);

        // Start transaction to ensure data consistency
        DB::beginTransaction();

        try {
            // Update the question
            $question = Question::findOrFail($id);
            $question->update([
                'name' => $validated['name'],
                'section_id' => $validated['section_id'],
                'is_active' => $request->has('is_active'),
                'why_correct' => $validated['why_correct'] ?? null,
                'answer_id' => $validated['answer_id'],
                'updated_userid' => auth()->id()
            ]);

            $optionIds = [];
            // Update or create options
            foreach ($request->options as $optionData) {
                if (isset($optionData['id'])) {
                    // Update existing option
                    $option = $question->options()->findOrFail($optionData['id']);
                    $option->update([
                        'option_text' => $optionData['option_text']
                    ]);
                    $optionIds[] = $option->id;
                } else {
                    // Create new option
                    $newOption = $question->options()->create([
                        'option_text' => $optionData['option_text']
                    ]);
                    $optionIds[] = $newOption->id;
                }
            }

            // Delete options that were removed
            $question->options()->whereNotIn('id', $optionIds)->delete();

            DB::commit();
            return redirect()->route('admin.questions.index')
                ->with('success', 'Question updated successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()
                ->with('error', 'Error updating question: ' . $e->getMessage());
        }
    }
    public function questions(Request $request)
    {
        $quary = Section::with('questions')->where('is_active', true);
        if ($request->filled('search')) {
            $quary->where('name', 'like', '%' . $request->search . '%')->orWhereHas('questions', function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->search . '%');
            });
        }
        $sections = $quary->get();
        return view("admin.questions.index", compact('sections'));
    }
    public function destroyQuestion($id)
    {
        Question::destroy($id);
        questionOption::where('question_id', $id)->delete();
        records::where('question_id', $id)->delete();
        return redirect()->back()
            ->with('success', 'Амжилттай устгасан');
    }
    public function questionsItem($id)
    {

        return view("admin.questions.item");
    }
    public function feedback()
    {
        $feedbacks = Feedback::with('user')
            ->latest()
            ->paginate(15);

        return view("admin.feedback.index", compact('feedbacks'));
    }
    public function discount()
    {
        $discounts = Discount::latest()->paginate(15);
        return view("admin.discount.index", compact('discounts'));
    }
    public function company()
    {
        $companies = Company::withCount('users')
            ->latest()
            ->paginate(15);

        return view("admin.company.index", compact('companies'));
    }
}
