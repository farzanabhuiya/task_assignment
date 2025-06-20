<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use App\Models\course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomePageController extends Controller
{


    public function index()
{
    $courses = course::with('modules.contents')->latest()->get();
    return view('Frontend.homePage', compact('courses'));
}
}
