<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Quiz;


class QuizsController extends Controller
{
    public function getQuizs($id)
    {
    	if(!isset($id))
    		abort('404');

        $quizs = Quiz::where('categoryID', $id)->get();
        return view('member.content.quizs', compact('quizs', 'quizs'));
    }
}
