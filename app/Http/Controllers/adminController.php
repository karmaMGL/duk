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
}
