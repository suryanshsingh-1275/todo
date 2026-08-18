<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $tasks = Auth::user()
            ->tasks()
            ->latest()
            ->get();

        return view('dashboard.index', compact('tasks'));
    }
}