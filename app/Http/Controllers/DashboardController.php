<?php

namespace App\Http\Controllers;

use App\Models\question;
use App\Models\records;
use App\Models\section;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('dashboard.index');
    }

    /**
     * Show the practice test page.
     *
     * @return \Illuminate\View\View
     */
    public function practice()
    {
        return view('dashboard.practice');
    }

    /**
     * Show the road signs page.
     *
     * @return \Illuminate\View\View
     */
    public function roadSigns()
    {
        return view('roadSigns.roadSigns');
    }

    /**
     * Show the study guide page.
     *
     * @return \Illuminate\View\View
     */
    public function studyGuide()
    {
        return view('dashboard.study-guide');
    }

    /**
     * Show the user's profile page.
     *
     * @return \Illuminate\View\View
     */
    public function profile()
    {
        return view('dashboard.profile');
    }
    public function examDynamic()
    {
        return view('exams.dynamic');
    }
    public function examStatic()
    {
        return view('exams.static');
    }
    public function sections()
    {
        $datas = section::with('questions')->where('is_active', true)->get();
        $sections = [
            [
                'id'=> 1,
                'name'=> 'Section 1',
                'description'=> 'Description for Section 1',
                'completedQuestions'=> 10,
                'totalQuestions'=> 20,
                'averageScore'=> 80,
                'estimatedTime'=> '10 minutes',
                'isCompleted'=> true,
                'difficulty'=> 'Easy',
            ],
        ];
        return view('sections.sections', compact('sections','datas'));
    }
    public function sectionsItem($id){
        $data = section::with('questions.options')->where('id',$id)->first();
        return view('sections.item', compact('id','data'));
    }
    public function sectionsSubmit(Request $request){
        $request->validate([
            'question_id' => 'required',
            'section_id' => 'required',
            'selected_option_id' => 'required',
        ]);
        $question = question::find($request->question_id);
        $is_correct = $question->options()->where('id',$request->selected_option_id)->first()->is_correct;
        $record = records::create([
            'question_id' => $request->question_id,
            'question_option_id' => $request->selected_option_id,
            'section_id' => $request->section_id,
            'user_id' => auth()->user()->id,
            'is_correct' => $is_correct,
        ]);
        $question->update([
            'answer_id' => $request->selected_option_id,
        ]);
        return redirect()->back();
    }
    /**
     * Show the user's settings page.
     *
     * @return \Illuminate\View\View
     */
    public function settings()
    {
        return view('dashboard.settings');
    }
    public function exams(){
        return view('exams');
    }
}
