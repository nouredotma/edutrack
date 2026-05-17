<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\View\View;

class PageController extends Controller
{
    public function home(): View
    {
        $totalStudents = Student::count();
        $beginners = Student::where('level', 'Beginner')->count();
        $intermediates = Student::where('level', 'Intermediate')->count();
        $advanced = Student::where('level', 'Advanced')->count();

        return view('home', compact('totalStudents', 'beginners', 'intermediates', 'advanced'));
    }

    public function about(): View
    {
        return view('about');
    }
}
