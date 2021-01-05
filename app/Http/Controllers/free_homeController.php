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
//use  App\buyer;
use  App\joblist;
use  App\jobapply;
use  App\chat;
use Carbon\Carbon;

 
//get status code using $response->getStatusCode();
 
// $body = $response->getBody();
// $arr_body = json_decode($body);
// print_r($arr_body);
// use App\Flight
// use GuzzleHttp\Client;

class free_homeController extends Controller
{

    public function index(Request $req){

        $count2 = freelancer::all()->count();// need to count the jobs the freelancer has taken
        

    //    print_r($count);
        // echo($count);
        return view('home.free_home', ['username'=> $req->session()->get('username')])->with ('countjob',$count2);
    }

    



    ///////////////////////////////////////////////////
    public function adminlist(){
        $adminlist = User::all();
    	return view('home.free_adminlist')->with('adminlists', $adminlist);
    }

    public function free_ad_reply(Request $req, $uname){
        $username=$req->session()->get('username');
        
        $results = DB::select('select * from chat where username = ? and Admin_username = ? or username =? and Admin_username= ?',[$uname, $username, $username, $uname]);
 
    	return view('home.free_inbox_inside')->with('replytxt', $results);
    }
////////////////////////////////////////////////////////////////////
    
    public function inbox(Request $req){
    	$username=$req->session()->get('username');
        $results = DB::select('select * from chat where username = ? && Admin_Username != ? group by reply order by date desc', [$username,$username]);
       // $results= array($results);
        // print_r($results);
       // $inboxtxt = chat::all();
    	return view('home.free_inbox')->with('inboxtxt', $results);
    }


    public function reply(Request $req, $sender){
        $username=$req->session()->get('username');
        
        $results = DB::select('select * from chat where username = ? and Admin_username = ? or username =? and Admin_username= ?',[$sender, $username,$username,$sender]);
 
    	return view('home.free_inbox_inside')->with('replytxt', $results);
    }


    public function replysend(Request $req, $uname){

        $d = new Carbon ();
    //    echo($d);

        $username=$req->session()->get('username');
     
        $chat = new chat();

        $chat->message   = $req->message;
        $chat->date  = $d;
        $chat->username  = $uname;
        $chat->Admin_Username  = $username;
        $chat->reply  = $username;

      
        if($chat->save()){               // inserts in to the database using the save() method
            $results = DB::select('select * from chat where username = ? && Admin_Username = ?',[$uname, $username]);
 
            return view('home.free_inbox_inside')->with('replytxt', $results);
        }
        else{
            echo("error buyer not inserted to database");}

      
    }
    


    public function idelete($id){
        $chat = chat::find($id);
        $chat->delete();
    	return redirect()->route('free_home.inbox');
    }

////////////////////////////////////////////////////////////////////////////////
   
    public function info(Request $req){
    
         $username=$req->session()->get('username');
         //echo($username);  
        $info = freelancer::where('username',$username)->first();
        // $adinfo =User::find(1);    
        // print_r($adinfo); //                    cannot get the array or the row of the admin who is logged in 
        return view('home.free_info_edit',$info);
    }



    public function free_update( ad_editRequest $req){
        $username=$req->session()->get('username');
        //echo($username);  
        $user = freelancer::where('username',$username)->first();
            $user->fname      = $req->name;
            $user->username  = $req->username;
            $user->password  = $req->password;
            $user->email     = $req->email;
            $user->phone     = $req->phone;
           $user->address    = $req->address;
        $user->save();
    	return redirect()->route('home.admininfo');
    }


    //////////////////////////////////////////////////
    public function joblist(){
    	//$students = $this->getStudentlist();

        $joblist = joblist::all();
    	return view('home.free_joblist')->with('students', $joblist);;
    }
    public function job_apply(request $req, $id){
        $username=$req->session()->get('username');
        $user = joblist::find($id);
        $apply = new jobapply();

      $apply->freelancer_uname  = $username;
      $apply->buyer_uname =$user->buyer_uname;
      $apply->job_desc = $user->job_desc;
      $apply->job_date =  $user->job_date;
      $apply->salary =  $user->salary;
      $apply->save();
        
    	return redirect()->route('free_home.joblist');
    }
    /////////////////////////////////////////////
  /////////////////////////////////////////////////////////////////////////////

   
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
     <td>'.$row->buyer_uname.'</td>
     <td>'.$row->buyer_email.'</td>
     <td>'.$row->job_desc.'</td>
     <td>'.$row->job_date.'</td>
     <td>'.$row->salary.'</td>
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
