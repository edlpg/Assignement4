<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Message;

class mainController extends Controller
{
      public function createUser(Request $request){
      try{
          $id = $request -> input('user');
          $idError = '';
          $pw = $request -> input('password');
          $pwError = '';
          $pwR = $request -> input('passwordRepeat');
          $user = new User();
          $usrName = $user->where('name', '=', $id)->get();

           if(count($usrName) > 0) {
            $idError = 'This user already exist, please chose another one.';
            }
            if($id == '')
            {
                $idError = 'User name must be somethig...';
            }
            if($pw != $pwR)
            {
              $pwError = 'Passwords dont match..';
            }
            if($pw == '' || $pwR == '')
            {
              $pwError = 'you must fill both of the password text fields...';
            }
            if($pwError !='' || $idError !='')
            {
              return view('newUserError')->with(['idError' => $idError,'pwError' => $pwError]);
            }
            else{
              $usrNam = $request -> input('user');
              $user->name  = $usrNam;
              $user->password = $request -> input('password');
              $user->save();
              $messages = Message::orderBy('updated_at', 'descending')->get();
              return view('onSession')->with(['userName' => $usrNam,'messageArr'=>$messages]);
              }
            }catch(\Exception $e){return 'Exeption :'.$e;}
      }

      public function login(Request $request){
        try{
        $id = $request->input('user');
        $user = new User();
        $usrName = $user->where('name', '=', $id)->get();

        if(count($usrName) == 0){
          return view('indexError');
        }
        else{
          $inputPw = $request -> input('password');
          $addPw = '';
          foreach($usrName as $usn) {
           $addPw=$usn->password;
          }
             if($addPw == $inputPw)
             {
               $messages = Message::orderBy('updated_at', 'descending')->get();
                 return view('onSession')->with(['userName' => $id,'messageArr'=>$messages]);
             }
             else{
                return view('indexError');
             }
          }
       }
       catch(\Exception $e){return 'Exeption: '.$e;}
      }

      public function newMessage(Request $request){
      try{
        $newMessage = new Message();
        $newMessage->user=$request -> input('user');
        $newMessage->message=$request -> input('newMessage');
        $newMessage->save();
        $messages = Message::orderBy('updated_at', 'descending')->get();
        return view('onSession')->with(['userName' => $request -> input('user'),'messageArr'=>$messages]);
      }
      catch(\Exception $e){return 'Exeption: '.$e;}
      }

      public function updateMessage(Request $request){
        try{
          $newMessage = Message::where('id', '=', $request -> input('id'))->first();
          $newMessage->message = $request -> input('newMessage');
          $newMessage->save();
          $messages = Message::orderBy('updated_at', 'descending')->get();
          return view('onSession')->with(['userName' => $request -> input('user'),'messageArr'=>$messages]);
        }
        catch(\Exception $e){return 'Exeption: '.$e;}
        }

        public function deleteMessage(Request $request){
          try{
            $newMessage = Message::where('id', '=', $request -> input('id'))->first();
            $newMessage->delete();
            $messages = Message::orderBy('updated_at', 'descending')->get();
            return view('onSession')->with(['userName' => $request -> input('user'),'messageArr'=>$messages]);
          }
          catch(\Exception $e){return 'Exeption: '.$e;}
          }
}
