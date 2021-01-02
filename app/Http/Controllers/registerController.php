<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request; // using the REQUEST library
use App\Http\Requests\registerRequest;// form validation using requests
use App\Http\Requests\adminRequest;// form validation using requests
use App\Http\Requests\buyerRequest;// form validation using requests
use Validator;
use App\User;// accessing model for user table 
use App\freelancer;// accessing model for user table 
use  App\buyer;// accessing model for user table 

class registerController extends Controller
{

    public function index(Request $req){

        return view('home.register');
    	
    }

    public function store( buyerRequest $breq , registerRequest $req){             // validation done here 
        
        // if($req->hasFile('myimg')){
        //     $file = $req->file('myimg');

        //     //echo "File name:".$file->getClientOriginalName()."<br>";
        //     //echo "File Ext:".$file->getClientOriginalExtension()."<br>";
        //     //echo "File Size:".$file->getSize()."<br>";

        //     if($file->move('upload', $file->getClientOriginalName())){
            if ($req->member=="buyer"){   
                $user = new buyer();

                $user->fname     = $req->name;
                $user->username  = $req->username;
                $user->password  = $req->password;
                $user->email     = $req->email;
                $user->phone     = $req->phone;
               $user->address    = $req->address;
              // $user->member    = $req->member;
              //  $user->profile_img  = $file->getClientOriginalName();
                if($user->save()){               // inserts in to the database using the save() method
                //    alert("buyer registered");
                    return redirect('/login');
                }
                else{
                    echo("error buyer not inserted to database");}

              }
              elseif($req->member=="freelancer"){

                $user = new freelancer();
                
                $user->fname       = $req->name;
                $user->username  = $req->username;
                $user->password  = $req->password;
                $user->email     =$req->email;
                $user->phone     = $req->phone;
               $user->address    = $req->address;
              // $user->member    = $req->member;
              //  $user->profile_img  = $file->getClientOriginalName();
                if($user->save()){               // inserts in to the database using the save() method
                    return redirect('/login');
                }
                else{
                    echo("error freelancer not inserted to database");}

              }
           else{
               echo("error member not found");}

    	//return redirect()->route('home.stdlist');
    }

    


}
