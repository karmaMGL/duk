<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminController extends Controller
{
    //
    public function index()
    {
        return view("admin.dashboard.index");
    }
    public function sections()
    {
        return view("admin.sections.index");
    }
    public function sectionsItem($id)
    {
        return view("admin.sections.item");
    }
    public function questions()
    {
        return view("admin.questions.index");
    }
    public function questionsItem($id)
    {
        return view("admin.questions.item");
    }
    public function feedback()
    {
        return view("admin.feedback.index");
    }
    public function discount()
    {
        return view("admin.discount.index");
    }
    public function company()
    {
        return view("admin.company.index");
    }
}
