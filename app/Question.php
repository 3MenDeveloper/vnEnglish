<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'questions';
    protected $fillable = [ 'ask', 'option', 'rightAnswer', 'rightAnswerNote', 'active', 'quizID'];
    protected $primaryKey = 'questionID';
}
