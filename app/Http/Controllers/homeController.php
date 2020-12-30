<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request; // using the REQUEST library
use App\Http\Requests\registerRequest;// form validation using requests
use App\Http\Requests\adminRequest;// form validation using requests
use App\Http\Requests\buyerRequest;
use Validator;
use App\User;// accessing model for user table 
use App\freelancer;// accessing model for user table 
use  App\buyer;
use  App\joblist;
class homeController extends Controller
{

    public function index(Request $req){
        return view('home.index', ['username'=> $req->session()->get('username')]);
    	
    }

    public function adminlist(){
    	//$students = $this->getStudentlist();

        $students = User::all();
    	return view('home.adminlist')->with('students', $students);
    }
////////////////////////////////////////////////////
    public function buyerlist(){
    	//$students = $this->getStudentlist();

        $buyer = buyer::all();
    	return view('home.ad_buyerlist')->with('students', $buyer);
    }
    public function bdelete($id){
        
        $user = buyer::find($id);
        $user->delete();
    	return redirect()->route('home.adbuyerlist');
    }
    //////////////////////////////////////////////////
    public function joblist(){
    	//$students = $this->getStudentlist();

        $joblist = joblist::all();
    	return view('home.ad_joblist')->with('students', $joblist);;
    }
    public function jdelete($id){
        
        $user = User::find($id);
        $user->delete();
    	return redirect()->route('home.joblist');
    }
    /////////////////////////////////////////////
    public function freelancerlist(){
    	//$students = $this->getStudentlist();

        $freelancer = freelancer::all();
        return view('home.ad_freelancerlist')->with('students', $freelancer);
    }
    public function fdelete($id){
        
        $user = User::find($id);
        $user->delete();
    	return redirect()->route('home.adfreelancerlist');
    }
/////////////////////////////////////////////////////////
	public function show($id){
    	
        $std = User::find($id);
        return view('home.show', $std);
    }

    public function create(){
    
    	return view('home.admin_create');
    }

    public function store(adminRequest $req){             // validation done here 
    
        // if($req->hasFile('myimg')){
        //     $file = $req->file('myimg');

        //     //echo "File name:".$file->getClientOriginalName()."<br>";
        //     //echo "File Ext:".$file->getClientOriginalExtension()."<br>";
        //     //echo "File Size:".$file->getSize()."<br>";

        //     if($file->move('upload', $file->getClientOriginalName())){
               
        // }

        /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
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
                return redirect('/');
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
                return redirect('/');
            }
            else{
                echo("error freelancer not inserted to database");
                }

          }
          elseif($req->member=="admin"){

            $user = new User();
            
            $user->fname       = $req->name;
            $user->username  = $req->username;
            $user->password  = $req->password;
            $user->email     =$req->email;
            $user->phone     = $req->phone;
           $user->address    = $req->address;
          // $user->member    = $req->member;
          //  $user->profile_img  = $file->getClientOriginalName();
            if($user->save()){               // inserts in to the database using the save() method
                return redirect()->route('home.adminlist');;
            }
            
            else{
                echo("error admin not inserted to database");
                }

          }
       else{
           echo("error member not found");}

    //return redirect()->route('home.stdlist');
    	//return redirect()->route('home.stdlist');
}
    
    public function edit($id){
    	
        $std = User::find($id);         // used to find the id and return the row with all values
    	return view('home.edit', $std);
    }

    public function update($id, Request $req){
    	   
        $user = User::find($id);

        $user->username = $req->username;
        $user->password = $req->password;
        $user->type     = $req->type;
      //  $user->name     = $req->name;
       // $user->cgpa     = $req->cgpa;
       // $user->dept     = $req->dept;

        $user->save();

    	return redirect()->route('home.adminlist');
    }

    public function delete($id){
        
        $user = User::find($id);
        $user->delete();
    	return redirect()->route('home.adminlist');
    }

    public function destroy(){
    	
    	//return view('home.stdlist');
    }

    private function getStudentlist(){
  /* $validation = Validator::make($req->all(), [
            'name' => 'required|min:3',
            'email'=> 'required',
            'cgpa' => 'required'
        ]);

        if($validation->fails()){
            return redirect()
                    ->route('home.create')
                    ->with('errors', $validation->errors())
                    ->withInput();

            return back()
                    ->with('errors', $validation->errors())
                    ->withInput();
        }*/
        /*	$user = ['name'=> 'alamin', 'id'=>12];
    	return view('home.index', $user);*/

    	/*
    	$name = 'alamin';
    	$id = 33;
    	$cgpa = 4;
    	return view('home.index', compact('name', 'id', 'cgpa'));*/

    /*	return view('home.index')
    			->with('name', 'alamin')
    			->with('id', '66');*/

    	/*return view('home.index')
    			->withName('alamin')
    			->withId('66');*/

    	/*$v = view('home.index');
    	$v->withName('alamin');
    	$v->withId('12');
    	return $v;*/
        return [
    		['id'=> 1, 'name'=> 'alamin', 'cgpa'=>1.2, 'email'=> 'alamin@aiub.edu'],
    		['id'=> 2, 'name'=> 'CYZ', 'cgpa'=>2.2, 'email'=> 'CYZ@aiub.edu'],
    		['id'=> 3, 'name'=> 'XYZ', 'cgpa'=>3.2, 'email'=> 'XYZ@aiub.edu'],
    		['id'=> 4, 'name'=> 'ABC', 'cgpa'=>3.4, 'email'=> 'ABC@aiub.edu'],
    		['id'=> 5, 'name'=> 'PQE', 'cgpa'=>3.6, 'email'=> 'PQE@aiub.edu'],
    		['id'=> 6, 'name'=> 'PQR', 'cgpa'=>4, 'email'=> 'PQR@aiub.edu'],
    		['id'=> 7, 'name'=> 'asd', 'cgpa'=>2.5, 'email'=> 'asd@aiub.edu']
    	];
    }


}
