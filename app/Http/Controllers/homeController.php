<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request; // using the REQUEST library
use App\Http\Requests\registerRequest;// form validation using requests
use App\Http\Requests\adminRequest;// form validation using requests
use App\Http\Requests\buyerRequest;
use App\Http\Requests\ad_editRequest;
use Illuminate\Support\Facades\DB;
use Validator;
use App\User;// accessing model for user table 
use App\freelancer;// accessing model for user table 
use  App\buyer;
use  App\joblist;
use  App\chat;
use Carbon\Carbon;
// use App\Flight
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;

class homeController extends Controller
{

    public function index(Request $req){

        $count = buyer::all()->count();
        $count2 = freelancer::all()->count();
        $count3 = joblist::all()->count();

    //    print_r($count);
        // echo($count);
        return view('home.index', ['username'=> $req->session()->get('username')])->with ('countb',$count)->with ('countfree',$count2)->with ('countjob',$count3);
    }
  
    public function microService(Request $res){

        $client = new client([
        'headers'=> ['content-type'=>'application/json','Accept'=>'application/json'],

        ]);
       
         $res = $client->get('http://localhost:3000/home/userlistjson');//nodejs

    $adminlist = json_decode($res->getBody(),true); 
   //  $adminlist = $res->getBody(); 
     // dd($adminlist); 
      //echo ($adminlist);
        //print_r($adminlist);
       // echo('i am here' );
        return view('home.adminlist')->with('adminlists', $adminlist);



}
    public function inbox(Request $req){
    	$username=$req->session()->get('username');
        $results = DB::select('select * from chat where username = ? && Admin_Username != ? group by reply order by date desc', [$username,$username]);
       // $results= array($results);
        // print_r($results);
       // $inboxtxt = chat::all();
    	return view('home.ad_inbox')->with('inboxtxt', $results);
    }


    public function reply(Request $req, $uname){
        $username=$req->session()->get('username');
        
        $results = DB::select('select * from chat where username = ? and Admin_username = ? or username =? and Admin_username= ?',[$uname, $username,$username,$uname]);
 
    	return view('home.ad_inbox_inside')->with('replytxt', $results);
    }


    public function replysend(Request $req, $uname){

        $d = new Carbon ();
    //    echo($d);

        $username=$req->session()->get('username');
     
        $chat = new chat();

        $chat->message     = $req->message;
        $chat->date  = $d;
        $chat->username  = $uname;
        $chat->Admin_Username  = $username;
        $chat->reply  = $username;

      
        if($chat->save()){               // inserts in to the database using the save() method
            $results = DB::select('select * from chat where username = ? && Admin_Username = ?',[$uname, $username]);
 
            return view('home.ad_inbox_inside')->with('replytxt', $results);
        }
        else{
            echo("error buyer not inserted to database");}

      
    }
    


    public function idelete($id){
        $chat = chat::find($id);
        $chat->delete();
    	return redirect()->route('home.ad_inbox');
    }


    public function adminlist(){
        $adminlist = User::all();
    	return view('home.adminlist')->with('adminlists', $adminlist);
    }



    public function info(Request $req){
    $username=$req->session()->get('username');
    //echo($username);  
    $adinfo = User::where('username',$username)->first();
  // $adinfo =User::find(1);    
   // print_r($adinfo); //                    cannot get the array or the row of the admin who is logged in 
   return view('home.ad_info_edit',$adinfo);
    }



    public function adupdate( ad_editRequest $req){
        $username=$req->session()->get('username');
        //echo($username);  
        $user = User::where('username',$username)->first();
            $user->fname      = $req->name;
            $user->username  = $req->username;
            $user->password  = $req->password;
            $user->email     = $req->email;
            $user->phone     = $req->phone;
           $user->address    = $req->address;
        $user->save();
    	return redirect()->route('home.admininfo');
    }


    public function delete($id){
        $user = User::find($id);
        $user->delete();
    	return redirect()->route('home.adminlist');
    }

////////////////////////////////////////////////////
    public function buyerlist(){
    	//$students = $this->getStudentlist();

        $buyer = buyer::all();
       // print_r($buyer);
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
        
        $user = joblist::find($id);
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
        
        $user = freelancer::find($id);
        $user->delete();
    	return redirect()->route('home.adfreelancerlist');
    }
///////////////////////////////////////////////////////////
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

function action(Request $request)
{
 if($request->ajax())
 {
  $output = '';
  $query = $request->get('query');
  if($query != '')
  {
   $data = DB::table('joblist') 
   ->where('buyer_uname', 'like', '%'.$query.'%')
     ->orWhere('buyer_email', 'like', '%'.$query.'%')
     ->orWhere('job_desc', 'like', '%'.$query.'%')
     ->orWhere('job_date', 'like', '%'.$query.'%')
     ->orWhere('salary', 'like', '%'.$query.'%')
     ->orderBy('id', 'desc')
     ->get();
     
  }
  else
  {
   $data = DB::table('joblist')
     ->orderBy('id', 'asc')
     ->get();
  }
  $total_row = $data->count();
  if($total_row > 0)
  {
   foreach($data as $row)
   {
    $output .= '
    <tr>
    <td>'.$row->id.'</td>
     <td>'.$row->buyer_uname.'</td>
     <td>'.$row->buyer_email.'</td>
     <td>'.$row->job_desc.'</td>
     <td>'.$row->job_date.'</td>
     <td>'.$row->salary.'</td>
     <td> <a href="/jdelete/{{'.$row->id.'}}" class="btn btn-danger">' ."Delete". '</a></td>
     </tr>';
   }
  }
  //<td><a href="/jdelete/{{'.$row->id.'}}" class="btn btn-danger" >'Delete '</a></td>
  else
  {
   $output = '
   <tr>
    <td align="center" colspan="5">No Data Found</td>
   </tr>
   ';
  }
  $data = array(
   'table_data'  => $output,
   'total_data'  => $total_row
  );

  echo json_encode($data);
 }
}

function free_action(Request $request)
{
 if($request->ajax())
 {
  $output = '';
  $query = $request->get('query');
  if($query != '')
  {
   $data = DB::table('freelancer') 
   ->where('fname', 'like', '%'.$query.'%')
     ->orWhere('username', 'like', '%'.$query.'%')
     ->orWhere('address', 'like', '%'.$query.'%')
     ->orWhere('email', 'like', '%'.$query.'%')
     ->orWhere('phone', 'like', '%'.$query.'%')
     ->orderBy('id', 'desc')
     ->get();
     
  }
  else
  {
   $data = DB::table('freelancer')
     ->orderBy('id', 'desc')
     ->get();
  }
  $total_row = $data->count();
  if($total_row > 0)
  {
   foreach($data as $row)
   {
    $output .= '
    <tr>
    <td>'.$row->id.'</td>
     <td>'.$row->fname.'</td>
     <td>'.$row->username.'</td>
     <td>'.$row->email.'</td>
     <td>'.$row->phone.'</td>
     <td>'.$row->address.'</td>
     <td> <a href="/fdelete/{{'.$row->id.'}}" class="btn btn-danger">' ."Delete". '</a></td>
     </tr>';
   }
  }
  //<td><a href="/jdelete/{{'.$row->id.'}}" class="btn btn-danger" >'Delete '</a></td>
  else
  {
   $output = '
   <tr>
    <td align="center" colspan="5">No Data Found</td>
   </tr>
   ';
  }
  $data = array(
   'table_data'  => $output,
   'total_data'  => $total_row
  );

  echo json_encode($data);
 }
}


 /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////   
    public function edit($id){
    	
        $std = User::find($id);         // used to find the id and return the row with all values
    	return view('home.edit', $std);
    }

    public function update($id, Request $req){
    	   
        $user = User::find($id);

             $user->fname      = $req->fname;
            $user->username  = $req->username;
            $user->password  = $req->password;
            $user->email     =$req->email;
            $user->phone     = $req->phone;
           $user->address    = $req->address;

        $user->save();

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
