<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $table = 'quizs';
    protected $fillable = ['title', 'image', 'password', 'duration', 'active', 'skillID'];
    protected $primaryKey = 'quizID';
}
