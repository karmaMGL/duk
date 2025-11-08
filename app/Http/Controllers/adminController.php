<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section;  // Assuming you have Section model
use App\Models\Question; // Assuming you have Question model
use App\Models\Feedback; // Assuming you have Feedback model
use App\Models\Discount; // Assuming you have Discount model
use App\Models\Company;  // Assuming you have Company model
use App\Models\User;
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
        if ($request->search) {
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
        if (Section::where('section_number', $request->number)->where('is_active', true)->exists()) {
            return redirect()->route('admin.sections')->with('error', 'Хэсгийн дугаар аль хэдийн байна.');
        }
        Section::create([
            'name' => $request->name,
            'section_number' => $request->number,
            'is_active' => $request->status === 'true' ? 1 : 0,
            'created_userid' => auth()->user()->id,
        ]);

        return redirect()->route('admin.sections')->with('success', 'Хэсгийн мэдээллийг хадгаллаа.');
    }
    public function questions()
    {
        $sections = Section::all();
        $questions = Question::with(['section', 'answers'])
            ->latest()
            ->paginate(15);
        Log::info($questions);
        return view("admin.questions.index", compact('questions','sections'));
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

    public function newQuestion()
    {
        $sections = Section::all();
        return view("admin.questions.create", compact('sections'));
    }
}
