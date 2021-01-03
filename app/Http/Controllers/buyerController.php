<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request; // using the REQUEST library
use App\Joblist;
use App\Http\Requests\jobRequest;
use App\Review;

class buyerController extends Controller
{
    public function home()
    {
        return view('buyer.buyerHome');
    }

    public function joblist(){
        if(session('type')=='Buyer')
        {
            $job = Joblist::all();
            return view('buyer.joblist')->with('job_list', $job);     
        }
        else
        {
            return redirect('/login');
        }
    }

    public function showJob($id){
        if(session('type')=='Buyer')
        {
           $job = Joblist::find($id);
           return view('buyer.showJob', $job);
        }
        else
        {
            return redirect('/login');
        } 
        
    }

    public function editJob($id){
        if(session('type')=='Buyer')
        {
           $job = Joblist::find($id);
           return view('buyer.editJob', $job);
        }
        else
        {
            return redirect('/login');
        } 
    }

    public function updateJob($id, jobRequest $req){
        if(session('type')=='Buyer')
        {
            $job = Joblist::find($id);

            $job->buyer_uname    = $req->buyer_uname;
            $job->buyer_email    = $req->buyer_email;
            $job->job_desc       = $req->job_desc;
            $job->job_date       = $req->job_date;
            $job->salary         = $req->salary;

            $job->save();

            if($job->save()){
                return redirect()->route('buyer.joblist');
            }  
        }
        else
        {
            return redirect('/login');
        } 
        
    }

////////////////////////////////////REVIEW/////////////////////////////
    public function reviewlist(){
        if(session('type')=='Buyer')
        {
            $review = Review::all();
            return view('buyer.reviewlist')->with('review', $review);     
        }
        else
        {
            return redirect('/login');
        }
    }

    public function showReview($id){
        if(session('type')=='Buyer')
        {
           $review = Review::find($id);
           return view('buyer.showReview', $review);
        }
        else
        {
            return redirect('/login');
        } 
        
    }
}
