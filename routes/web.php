<?php

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


Route::get('/login', 'loginController@index')->name ('login');
Route::post('/login', 'loginController@verify');
Route::get('/logout', 'logoutController@index');
Route::get('/register', 'registerController@index');
Route::post('/register', 'registerController@store');

Route::group(['middleware'=>['sess']], function(){
	Route::group(['middleware'=>['atype']], function(){
	Route::get('/home', 'homeController@index')->name('home.index')->middleware('sess');
	Route::get('/home/admin_info', 'homeController@info')->name('home.admininfo');
	Route::post('/home/admin_info', 'homeController@adupdate');

	Route::get('/home/adminlist', 'homeController@microservice')->name('home.adminlist');
	
	Route::get('/home/inbox', 'homeController@inbox')->name('home.inbox');
	Route::get('/inbox/reply/{uname}', 'homeController@reply')->name('home.reply');
	Route::post('/inbox/reply/{uname}', 'homeController@replysend')->name('home.replysend');
	Route::get('/inbox/delete/{id}', 'homeController@idelete')->name('home.idelete');
	//Route::get('/stdlist', ['uses'=> 'homeController@stdlist', 'as'=> 'home.stdlist']);
	Route::get('/details/{id}', 'homeController@show')->name('home.show');

	
		Route::get('/create', 'homeController@create')->name('home.create');
		Route::post('/create', 'homeController@store');
		Route::get('/edit/{id}', 'homeController@edit')->name('home.edit');
		Route::post('/edit/{id}', 'homeController@update');
		Route::get('/delete/{id}', 'homeController@delete');
	//	Route::post('/delete/{id}', 'homeController@destroy');
	
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
});
	//Route::get('/home/joblist', 'homeController@joblist')->name('home.joblist');
	Route::group(['middleware'=>['ftype']], function(){	
//freelancer work
	//home and joblist
	Route::get('/free_home', 'free_homeController@index')->name('free_home.index');
	Route::get('/free_home/joblist', 'free_homeController@joblist')->name('free_home.joblist');
	Route::get('/job_apply/{id}', 'free_homeController@job_apply');
//adminlist
	Route::get('/free_home/adminlist', 'free_homeController@adminlist')->name('free_home.adminlist');
	Route::get('/admin/reply/{uname}', 'free_homeController@free_ad_reply');
	Route::post('/admin/reply/{uname}', 'free_homeController@replysend');
//inbox
	Route::get('/free_home/inbox', 'free_homeController@inbox')->name('free_home.inbox');
	Route::get('/free_inbox/reply/{uname}', 'free_homeController@reply')->name('free_home.reply');
	Route::post('/free_inbox/reply/{uname}', 'free_homeController@replysend');
	Route::get('/free_inbox/delete/{id}', 'free_homeController@idelete')->name('free_home.idelete');

//info
	Route::get('/free_home/freelancer_info', 'free_homeController@info')->name('free_home.freelancerinfo');
	Route::post('/free_home/freelancer_info', 'free_homeController@free_update');
});

});

//Route::resource('/product', 'ProductController');
Route::resource('/student', 'StudentController');

