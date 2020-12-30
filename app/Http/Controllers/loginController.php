<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;

class loginController extends Controller
{
    public function index(){
    	return view('login.index');
    }

    public function verify(Request $req){

        //$req->session()->put('username', 'alamin');
        //$req->session()->put('email', 'alamin@gmail.com');
        //$email = $req->session()->get('email');// to recieve email
        //$req->session()->forget('email'); // to erase email
        //$req->session()->flush(); // to forget everything in session
        //$req->session()->has('email'); // to check for session variable
        //$req->session()->pull('email'); // works as pop statement retrives and delete

        /*$req->session()->flash('msg', 'invalid username/password');
        $req->session()->flash('error', 'invalid request');
        $msg = $req->session()->get('msg');
        $req->session()->keep('msg');
        $req->session()->reflash();
        $msg1 = $req->session()->get('msg');*/

        //$user = User::all();
        $user  = User::where('username', $req->username)
                        ->where('password', $req->password)
                        ->first();

       /* $user = DB::table('user_table')
                    ->where('username', $req->username)
                    ->where('password', $req->password)
                    ->get();*/

        echo $user['type'];
        //echo count($user);
    	 if(count((array)$user) > 0){

            $req->session()->put('username', $req->username);
            $req->session()->put('type', $req->username);
            
    		return redirect('/home');
    	}else{
            $req->session()->flash('msg', 'invalid username/password');
    		return redirect('/login');
    	}
    }
}
