<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Contracts\BaseRepository;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $base;

    public function __construct(BaseRepository $repo)
    {
        $this->base = $repo;
    }

    public function index()
    {
        $subjects = $this->base->showSub();
        $exams = $this->base->showAllExam();
        return view('exams.home', compact('subjects', 'exams'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
}
