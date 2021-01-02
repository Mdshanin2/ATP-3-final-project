<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request; // using the REQUEST library

class buyerController extends Controller
{
    public function home()
    {
        return view('buyer.buyerHome');
    }
}
