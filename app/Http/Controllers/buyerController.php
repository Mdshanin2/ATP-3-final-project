<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request; // using the REQUEST library
use App\buyer;
use App\Joblist;
use App\Http\Requests\jobRequest;
use App\Review;
use App\Http\Requests\reviewRequest;
use App\Freelancerlist;
use App\Billinglist;
use App\Payment;
use App\Http\Requests\paymentRequest;
use App\Companyplan;
use App\Http\Requests\planRequest;
use App\Financelist;
use App\Http\Requests\financeRequest;
use PDF;
use GuzzleHttp\Client;

class buyerController extends Controller
{
    public function home(){
        $profile = buyer::where('username',session('username'))->first();
        return view('buyer.buyerHome',['profile'=>$profile]);
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

    public function createJob(){
        if(session('type')=='Buyer')
        {
           return view('buyer.createjob');    
        }
        else
        {
            return redirect('/login');
        }
    }

    public function storeJob(jobRequest $req){
        if(session('type')=='Buyer')
        {
            $job = new Joblist();

            $job->buyer_uname    = $req->buyer_uname;
            $job->buyer_email    = $req->buyer_email;
            $job->job_desc       = $req->job_desc;
            $job->job_date       = $req->job_date;
            $job->salary         = $req->salary;
            $job->freelancer_uname= "1";

            if($job->save()){
                 return redirect()->route('buyer.joblist');
             }    
        }
        else
        {
            return redirect('/login');
        }
    }

    public function deleteJob($id){
        if(session('type')=='Buyer')
        {
           $job = Joblist::find($id);
           return view('buyer.deletejob', $job);
        }
        else
        {
            return redirect('/login');
        } 
    }

    public function destroyJob($id){
        if(session('type')=='Buyer')
        {
            $job = Joblist::find($id);
            if($job->delete()){
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

    public function editReview($id){
        if(session('type')=='Buyer')
        {
           $review = Review::find($id);
           return view('buyer.editReview', $review);
        }
        else
        {
            return redirect('/login');
        } 
    }

    public function updateReview($id, reviewRequest $req){
        if(session('type')=='Buyer')
        {
            $review = Review::find($id);

            $review->fname    = $req->fname;
            $review->review   = $req->review;
            $review->date        = $req->date;

            $review->save();

            if($review->save()){
                return redirect()->route('buyer.reviewlist');
            }  
        }
        else
        {
            return redirect('/login');
        } 
        
    }

    public function createReview(){
        if(session('type')=='Buyer')
        {
           return view('buyer.createreview');    
        }
        else
        {
            return redirect('/login');
        }
    }

    public function storeReview(reviewRequest $req){
        if(session('type')=='Buyer')
        {
            $review = new Review();

            $review->fname    = $req->fname;
            $review->review   = $req->review;
            $review->date     = $req->date;

            if($review->save()){
                 return redirect()->route('buyer.reviewlist');
             }    
        }
        else
        {
            return redirect('/login');
        }
    }

    public function deleteReview($id){
        if(session('type')=='Buyer')
        {
           $review = Review::find($id);
           return view('buyer.deletereview', $review);
        }
        else
        {
            return redirect('/login');
        } 
    }

    public function destroyReview($id){
        if(session('type')=='Buyer')
        {
            $review = Review::find($id);
            if($review->delete()){
                return redirect()->route('buyer.reviewlist');
            }
        }
        else
        {
            return redirect('/login');
        } 
    }

    //freelancer list
    public function freelancerlist(){
        if(session('type')=='Buyer')
        {
            $freelancerlist = Freelancerlist::all();
            return view('buyer.freelancerlist')->with('freelancer', $freelancerlist);     
        }
        else
        {
            return redirect('/login');
        }
    }

    public function searchfreelancer(Request $req){
   
            $freelancerlist = Freelancerlist::where('fname','like','%'.$req->searchkey.'%')->get();          
            return json_encode($freelancerlist);
    }

    //billing list
    public function billinglist(){
        if(session('type')=='Buyer')
        {
            $billing = Billinglist::all();
            return view('buyer.billinglist')->with('billing', $billing);     
        }
        else
        {
            return redirect('/login');
        }
    }

    //finance list
    public function financelist(){
        if(session('type')=='Buyer')
        {
            $client     = new Client();
            $res        = $client->request('GET', 'http://127.0.0.1:3000/buyer//finance/financelist/API');
            $finance    = json_decode($res->getBody());
            return view('buyer.financelist')->with('finance', $finance);     
        }
        else
        {
            return redirect('/login');
        }
    }

    public function editFinance($id){
        if(session('type')=='Buyer')
        {
           $finance = Financelist::find($id);
           return view('buyer.editFinance', $finance);
        }
        else
        {
            return redirect('/login');
        } 
    }

    public function updateFinance($id, financeRequest $req){
        if(session('type')=='Buyer')
        {
            $client  = new Client();
            $res     = $client->request('POST', 'http://127.0.0.1:3000/buyer/finance/edit/API', [
                'form_params'   => [
                    'id'      =>  $id,   
                    'month'   =>  $req->month,
                    'amount'      =>  $req->amount
                ]
            ]);
            $response    = json_decode($res->getBody());
            if($response->status=="updated!!")
            {
                return redirect()->route('buyer.financelist');
            }
        }
        else
        {
            return redirect('/login');
        } 
        
    }
    //payment
    public function payment(){
        if(session('type')=='Buyer')
        {
            $payment = Payment::all();
            return view('buyer.payment')->with('payment', $payment);     
        }
        else
        {
            return redirect('/login');
        }
    }

    public function editPayment($id){
        if(session('type')=='Buyer')
        {
           $payment = Payment::find($id);
           return view('buyer.editPayment', $payment);
        }
        else
        {
            return redirect('/login');
        } 
    }

    public function updatePayment($id, paymentRequest $req){
        if(session('type')=='Buyer')
        {
            $payment = Payment::find($id);

            $payment->fname    = $req->fname;
            $payment->amount   = $req->amount;
            $payment->date     = $req->date;

            $payment->save();

            if($payment->save()){
                return redirect()->route('buyer.payment');
            }  
        }
        else
        {
            return redirect('/login');
        } 
        
    }

    //company plan
    public function companyplan(){
        if(session('type')=='Buyer')
        {
            $companyplan = Companyplan::all();
            return view('buyer.companyplan')->with('company_plan', $companyplan);     
        }
        else
        {
            return redirect('/login');
        }
    }

    public function editPlan($id){
        if(session('type')=='Buyer')
        {
           $companyplan = Companyplan::find($id);
           return view('buyer.editPlan', $companyplan);
        }
        else
        {
            return redirect('/login');
        } 
    }

    public function updatePlan($id, planRequest $req){
        if(session('type')=='Buyer')
        {
            $companyplan = Companyplan::find($id);

            $companyplan->description    = $req->description;

            $companyplan->save();

            if($companyplan->save()){
                return redirect()->route('buyer.companyplan');
            }  
        }
        else
        {
            return redirect('/login');
        } 
        
    }

    public function buyerreport()
    {
        return view('buyer.report');
    }

    public function billingreport()
    {
        $billing = Billinglist::all();
        $count = count($billing);
        $amount = 0;
        $tax = 0;
        for($i=0; $i < count($billing); $i++)
        {   
            $amount += $billing[$i]['amount']; 
            $tax += $billing[$i]['tax'];
        }

        $pdf = PDF::loadView('buyer.billingreport', ['billing'=>$billing ,'count'=>$count , 'amount'=>$amount , 'tax'=>$tax]);
        return $pdf->download('billingreport.pdf');
    }

    public function financereport()
    {
        $finance = Financelist::all();
        $count = count($finance);
        $amount = 0;
        for($i=0; $i < count($finance); $i++)
        {   
            $amount += $finance[$i]['amount'];
        }

        $pdf = PDF::loadView('buyer.financereport', ['finance'=>$finance ,'count'=>$count , 'amount'=>$amount]);
        return $pdf->download('financereport.pdf');
    }
}
