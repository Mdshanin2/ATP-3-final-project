<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request; // using the REQUEST library
use App\Joblist;

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
}
