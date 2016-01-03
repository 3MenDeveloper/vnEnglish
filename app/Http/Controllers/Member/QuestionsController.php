<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Question;
use App\Tag;
use Auth;
use Session;
use App\User;

class QuestionsController extends Controller
{


    public function getQuestion($cate, $quiz)
    {

        $tags = Tag::where('quizID', $quiz)->get();

        // Kiểm tra tồn tại
        if (count($tags) == 0)
            abort('404');

        foreach ($tags as $row) {
            $tag[] = $row->tagID;
        }
        // var_dump($tags);

        $questions = DB::table('questions')
                        ->join('questiontag', 'questions.questionID', '=', 'questiontag.questionID')
                        ->join('tags', 'questiontag.tagID', '=', 'tags.tagID')
                        ->where(function ($query) use($tag, $cate){
                            $query->whereIn('tags.tagID',$tag)
                                  ->where('questions.categoryID', '=', $cate);
                        })
                        ->get();

        // Kiểm tra dữ liệu tồn tại
        if(count($questions) == 0)
            abort('404');

        //  Randum array
        shuffle($questions);
        // dd($questions);

        // Tạo quizUser
        $timestamp = date('Y-m-d G:i:s');
        $quizUserID = DB::table('quizuser')->insertGetId([
            'quizID' => $quiz,
            'id'     => Auth::user()->id,
            'created_at' => $timestamp,
            'updated_at' => $timestamp
        ]);

        Session::put('quizUserID', $quizUserID);

        return view('member.content.questions', ['questions' => $questions]);
    }


    public function checkAnswer(Request $request){

        $questionID = $request->input('questionID');
        $userAnswer = $request->input('userAnswer');

        // Lọc ra câu hỏi kiểm tra
        $question = Question::findOrFail($questionID);

        $rightAnswer = explode('--', $question->rightAnswer);

        $right = 0;

        if (count($userAnswer) == count($rightAnswer)){

            // Kiểm tra đáp án
            $mistake = array_diff($userAnswer, $rightAnswer);

            // Nếu đáp án đúng
            $right = (count($mistake) == 0)? 1 : 0;

        }

        $quizUserID = Session::get('quizUserID');
        $userAnswer = implode('--', $userAnswer);

        // Thêm đáp án câu hỏi của User
        $timestamp = date('Y-m-d G:i:s');
        DB::table('quizuserquestion')->insert([
            'quizUserID' => $quizUserID,
            'questionID' => $questionID,
            'userAnswer' => $userAnswer,
            'mark'       => $right,
            'created_at' => $timestamp,
            'updated_at' => $timestamp
        ]);

        return $right;
    }

    public function questionFinished()
    {
        $quizUserID = Session::get('quizUserID');

        // Tổng điểm đáp án đúng của User
        $total = DB::table('quizuserquestion')
            ->select(DB::raw('SUM(mark) as total'))
            ->where('quizUserID', '=', $quizUserID)
            ->get();

        // Gán tổng điểm vào QuizUser
        $total = $total[0]->total;
        $right = DB::table('quizuser')->where('quizUserID', '=', $quizUserID)
                    ->update([
                        'mark' => $total,
                        'finish' => 1
                    ]);

        // Xét trường hợp hoàn thành
        $userid = Auth::user()->id;

        $userExp = DB::table('users')->select('userExp')
            ->where('id', '=', $userid)
            ->get();

        if ($total == 10) {
            $userExp = $userExp[0]->userExp + 10;
        }elseif($total >= 5){
            $userExp = $userExp[0]->userExp + 5;
        }else{
            $userExp = $userExp[0]->userExp + 0;
        }

        // Nếu điểm tổng bài quiz lớn hơn 5
        if ($total >= 5) {
            // Cập nhật điểm kinh nghiệm userExp cho User
            // DB::table('users')->where('id', '=', $userid)
            //     ->update(['userExp' => $userExp]);

            $users = User::find($userid);
            $users->userExp = $userExp;

            // Cập nhật level của User
            $level = DB::table('level')->get();
            foreach ($level as $level) {
                if ($userExp >= $level->exp) {
                    continue;
                }else{
                    $userLevel = $level->level - 1;
                    if ($users->userLevel <= $userLevel) {
                        $users->userLevel = $userLevel;
                        $upLevel = $userLevel;
                    }
                    break;
                }
            }
            $users->save();
        }


        // Lấy danh sách show kết quả question sau khi làm xong bài quiz
        $questions = DB::table('questions')
            ->join('quizuserquestion','questions.questionId','=','quizuserquestion.questionId')
            ->where('quizuserquestion.quizUserID','=',$quizUserID)
            ->select('questions.*','quizuserquestion.userAnswer','quizuserquestion.mark')
            ->orderBy('quizuserquestion.updated_at', 'asc')
            ->get();

        $data[] = $total; // lấy điểm kết quả làm
        $data[] = $questions;
        $data[] = ($upLevel) ? $upLevel : null;

        return $data;
    }

}
