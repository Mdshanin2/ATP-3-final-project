<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\logoutController;
use App\Http\Controllers\buyerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function(){
	echo "index page";
});

Route::get('/login', [loginController::class,'index']);
Route::post('/login', [loginController::class,'verify']);
Route::get('/logout', [logoutController::class,'index']);
Route::get('/register', [registerController::class,'index']);
Route::post('/register', [registerController::class,'store']);

Route::group(['middleware'=>['sess']], function(){
	
	Route::get('/home', 'homeController@index')->name('home.index')->middleware('sess');
	Route::get('/home/admin_info', 'homeController@info')->name('home.admininfo');
	Route::post('/home/admin_info', 'homeController@adupdate');

	Route::get('/home/adminlist', 'homeController@adminlist')->name('home.adminlist');
	
	Route::get('/home/inbox', 'homeController@inbox')->name('home.inbox');
	Route::get('/inbox/reply/{uname}', 'homeController@reply')->name('home.reply');
	Route::post('/inbox/reply/{uname}', 'homeController@replysend')->name('home.replysend');
	Route::get('/inbox/delete/{id}', 'homeController@idelete')->name('home.idelete');


	//Route::get('/stdlist', ['uses'=> 'homeController@stdlist', 'as'=> 'home.stdlist']);
	Route::get('/details/{id}', 'homeController@show')->name('home.show');

	//Route::group(['middleware'=>['type']], function(){
		Route::get('/create', 'homeController@create')->name('home.create');
		Route::post('/create', 'homeController@store');
		Route::get('/edit/{id}', 'homeController@edit')->name('home.edit');
		Route::post('/edit/{id}', 'homeController@update');
		Route::get('/delete/{id}', 'homeController@delete');
		Route::post('/delete/{id}', 'homeController@destroy');
	// });

	//admin_buyerlist
	Route::get('/home/ad_buyerlist', 'homeController@buyerlist')->name('home.adbuyerlist');
	Route::get('/bdelete/{id}', 'homeController@bdelete');
  //admin _joblist
	Route::get('/home/joblist', 'homeController@joblist')->name('home.joblist');
	Route::get('/jdelete/{id}', 'homeController@jdelete');
	//search work
	Route::get('/live_search', 'LiveSearch@index');//not used
	Route::get('/home/search/action', 'homeController@action')->name('live_search.action');
	
	Route::get('/home/search/free_action', 'homeController@free_action')->name('freelancer_search.action');
	//admin_freelancerlist
	Route::get('/home/ad_freelancerlist', 'homeController@freelancerlist')->name('home.adfreelancerlist');
	Route::get('/fdelete/{id}', 'homeController@fdelete');
	
	//Route::get('/home/joblist', 'homeController@joblist')->name('home.joblist');
	

	//////////////////////////////////////////////////////////////////////////////////////////////////////////
	Route::group(['middleware'=>['sess']], function(){
		
		Route::get('/buyerhome', [buyerController::class,'home'])->name('buyer.home');
		//job
		Route::get('/joblist', [buyerController::class,'joblist'])->name('buyer.joblist');
		Route::get('/jobdetails/{id}', [buyerController::class,'showJob'])->name('buyer.jobdetails');
		Route::get('/editjob/{id}', [buyerController::class,'editJob'])->name('buyer.editjob');
		Route::post('/editjob/{id}', [buyerController::class,'updateJob']);
		Route::get('/createjob', [buyerController::class,'createJob'])->name('buyer.createjob');
		Route::post('/createjob', [buyerController::class,'storeJob']);
		Route::get('/deletejob/{id}', [buyerController::class,'deleteJob'])->name('buyer.deletejob');
		Route::post('/deletejob/{id}', [buyerController::class,'destroyJob']);

		//review
		Route::get('/reviewlist', [buyerController::class,'reviewlist'])->name('buyer.reviewlist');
		Route::get('/reviewdetails/{id}', [buyerController::class,'showReview'])->name('buyer.reviewdetails');
		Route::get('/editreview/{id}', [buyerController::class,'editReview'])->name('buyer.editreview');
		Route::post('/editreview/{id}', [buyerController::class,'updateReview']);
		Route::get('/createreview', [buyerController::class,'createReview'])->name('buyer.createreview');
		Route::post('/createreview', [buyerController::class,'storeReview']);
		Route::get('/deletereview/{id}', [buyerController::class,'deleteReview'])->name('buyer.deletereview');
		Route::post('/deletereview/{id}', [buyerController::class,'destroyReview']);
		
		//payment
		Route::get('/payment', [buyerController::class,'payment'])->name('buyer.payment');
		Route::get('/editpayment/{id}', [buyerController::class,'editPayment'])->name('buyer.editpayment');
		Route::post('/editpayment/{id}', [buyerController::class,'updatePayment']);
		
		//freelancer
		Route::get('/freelancerlist', [buyerController::class,'freelancerlist'])->name('buyer.freelancerlist');
		Route::get('/searchfreelancer', [buyerController::class,'searchfreelancer'])->name('buyer.searchfreelancer');
		
		//billing
		Route::get('/billinglist', [buyerController::class,'billinglist'])->name('buyer.billinglist');
		
		//company plan
		Route::get('/companyplan', [buyerController::class,'companyplan'])->name('buyer.companyplan');
		Route::get('/editplan/{id}', [buyerController::class,'editPlan'])->name('buyer.editplan');
		Route::post('/editplan/{id}', [buyerController::class,'updatePlan']);

		//finance
		Route::get('/financelist', [buyerController::class,'financelist'])->name('buyer.financelist');
		Route::get('/editfinance/{id}', [buyerController::class,'editFinance'])->name('buyer.editfinance');
		Route::post('/editfinance/{id}', [buyerController::class,'updateFinance']);

		//report
		Route::get('/buyerreport', [buyerController::class,'buyerreport'])->name('buyer.buyerreport');
		Route::get('/billingreport', [buyerController::class,'billingreport'])->name('buyer.billingreport');
		Route::get('/financereport', [buyerController::class,'financereport'])->name('buyer.financereport');
	});

});

//Route::resource('/product', 'ProductController');
Route::resource('/student', 'StudentController');
