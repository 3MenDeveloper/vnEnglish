<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;
use App\User;
use Auth;


class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('member.content.home')->with('categories', $categories);
    }

    public function getInfo()
    {
        return view('member.content.info');
    }

    public function updateInfo(Request $request)
    {
        $this->validate($request, [
            'name'         => 'required|min:6',
            'email'        => 'required|email',
            'gender'       => 'required|boolean',
            'dateOfBirth'  => 'required|date',
            'placeOfBirth' => 'required|min:3',
            'password'     => 'confirmed|min:8'
        ]);

        $memeberId = Auth::user()->id;
        $member = User::find($memeberId);

        $name                 = $request->input('name');
        $email                = $request->input('email');
        $gender               = $request->input('gender');
        $dateOfBirth          = $request->input('dateOfBirth');
        $placeOfBirth         = $request->input('placeOfBirth');
        $password             = $request->input('password');

        $member->name         = $name;
        $member->email        = $email;
        $member->genger       = $gender;
        $member->dateOfBirth  = $dateOfBirth;
        $member->placeOfBirth = $placeOfBirth;
        $member->password     = bcrypt($password);

        if($member->save())
            return 'success';
        return false;
    }

    public function changeAvatar(Request $request)
    {
        $memeberId = Auth::user()->id;
        $member = User::find($memeberId);
        $member->avatar = $request->input('avatar');
        if($member->save())
            return 'success';
        return false;
    }

    public function chat()
    {
        return view('member.content.chat');
    }

    public function updateChat(Request $request){
        /*$this->validate($request, [
            'function' => 'required',
            'file' => 'required',
        ]);*/

        $chattext = public_path().'/chat/chat.txt';

        $function = $request->input('function');

        $log = array();

        switch($function) {

             case('getState'):
                 if(file_exists($chattext)){
                   $lines = file($chattext);
                 }
                 $log['state'] = count($lines);
                 break;

             case('update'):
                $state = $request->input('state');
                if(file_exists($chattext)){
                   $lines = file($chattext);
                }
                 $count =  count($lines);
                 if($state == $count){
                     $log['state'] = $state;
                     $log['text'] = false;

                     }
                     else{
                         $text= array();
                         $log['state'] = $state + count($lines) - $state;
                         foreach ($lines as $line_num => $line)
                           {
                               if($line_num >= $state){
                             $text[] =  $line = str_replace("\n", "", $line);
                               }

                            }
                         $log['text'] = $text;
                     }

                 break;

             case('send'):
              $nickname = htmlentities(strip_tags($request->input('nickname')));
                 $reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
                  $message = htmlentities(strip_tags($request->input('message')));
             if(($message) != "\n"){

                 if(preg_match($reg_exUrl, $message, $url)) {
                    $message = preg_replace($reg_exUrl, '<a href="'.$url[0].'" target="_blank">'.$url[0].'</a>', $message);
                    }


                fwrite(fopen($chattext, 'a'), "<span>". $nickname . "</span>" . $message = str_replace("\n", " ", $message) . "\n");
             }
                 break;

        }

        return $log;
    }

}
