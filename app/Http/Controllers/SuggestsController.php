<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;

class SuggestsController extends Controller
{
    public function store(Request $request)
    {
        return view('suggest');
    }

    public function newSuggest()
    {
        $subjects = Subject::all();
        return view('new_suggest', compact('subjects'));
    }
}
