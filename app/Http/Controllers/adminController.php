<?php

namespace App\Http\Controllers;

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
            ->exists()) {
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
            ->exists()) {
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
            return redirect()->route('admin.sections.questions', $section->id)
                ->with('success', 'Асуултыг амжилттай хадгаллаа.');

        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Асуулт хадгалахад алдаа гарлаа: ' . $e->getMessage());
            return redirect()->back()
                ->withInput()
                ->with('error', 'Алдаа гарлаа. Дахин оролдоно уу.');
        }
    }
    public function questions()
    {
        $sections = Section::all();
        $questions = Question::with(['section', 'options'])
            ->latest()
            ->paginate(15);
        return view("admin.questions.index", compact('questions', 'sections'));
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
