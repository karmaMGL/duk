<?php

namespace App\Http\Controllers;

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
        return view('dashboard.road-signs');
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
        return view('dashboard.exams');
    }
}
