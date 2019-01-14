<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Contracts\BaseRepository;

class SuggestsController extends Controller
{
    protected $base; 
    protected $request;

    public function __construct(BaseRepository $repo, Request $request)
    {
        $this->base = $repo;
        $this->request = $request;
    }

    public function index()
    {
        $suggests = $this->base->showAllSug();
        return view('exams.suggest', compact('suggests'));
    }

    public function newSuggest()
    {
        $suggests = $this->base->createSug($this->request);
        return json_encode(true);
    }

    public function suggestQues()
    {
        $subjects = $this->base->showSub();
        return view('exams.new_suggest', compact('subjects'));  
    }

    public function deleteSug($id)
    {
        $this->base->deleteSug($id);
        return redirect()->route('showSug');
    }
}
