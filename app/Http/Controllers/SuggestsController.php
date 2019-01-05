<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Contracts\BaseRepository;

class SuggestsController extends Controller
{
    protected $base;

    public function __construct(BaseRepository $repo)
    {
        $this->base = $repo;
    }

    public function index()
    {
        $suggests = $this->base->showAllSug();
        return view('exams.suggest', compact('suggests'));
    }

    public function newSuggest()
    {
        $subjects = $this->base->showSub();
        return view('exams.new_suggest', compact('subjects'));
    }

    public function suggestQues(Request $request)
    {
        $sug = $this->base->createSug($request);
        return $this->index();
    }
}
