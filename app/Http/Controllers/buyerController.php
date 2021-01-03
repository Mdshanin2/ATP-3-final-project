<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request; // using the REQUEST library
use App\Joblist;
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

    public function show($id){
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
}
