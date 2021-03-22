<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $title = 'Административная панель';
        if (!auth()->user()->have_school) {
            return view('admin.school.create');
        }

        return view('admin.dashboard', compact('title'));
    }
}
