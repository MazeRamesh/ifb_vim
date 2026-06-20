<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customertables;
use App\Models\Vchtypes;
use App\Models\DropDowns;
use App\Models\salesheader;
use App\Models\company;
use App\Models\salesdetails;
use App\Models\poheader;
use App\Models\podetails;
use App\Models\Products;
use App\Models\transport;
use App\Models\emplayee;
use App\User;
use Exception;
use DB;
use Excel;
use Validator;
use NumberFormatter;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
	public function __construct()
	{
	    $this->middleware('auth');
	}
	
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $Total_SalesInvoices   = salesheader::count();
        $Total_UnSignedInvoices= salesheader::where('pdfstatus',null)->count();
        $Total_SignedInvoices  = salesheader::where('pdfstatus','Signed')->count();
        return view('home',compact('Total_SalesInvoices','Total_UnSignedInvoices','Total_SignedInvoices'));

        // $user=auth()->user();
        // if($user->role_id==0)
        // {
        // $plants=company::get()->map(function($p_name)
        // {
        //  $p_name->Total_SalesInvoices   = salesheader::where('plantGSTIN',$p_name->cmpgstino)->count();
        //  $p_name->Total_User        = User::where('user_plant',$p_name->plantcode)->count();
        //  $p_name->Total_UnSignedInvoices= salesheader::where('plantGSTIN',$p_name->cmpgstino)->where('pdfstatus',null)->count();
        //  $p_name->Total_SignedInvoices  = salesheader::where('plantGSTIN',$p_name->cmpgstino)->where('pdfstatus','Signed')->count();
        //  return $p_name;
        // });
        // return view('home',compact('plants'));
        // }
        // else if($user->role_id==1)
        // {
        // $plants=company::where('cmpgstino',$user->user_plant)->get()->map(function($p_name)
        // {
        //  $p_name->Total_SalesInvoices   = salesheader::where('plantGSTIN',$p_name->cmpgstino)->count();
        //  $p_name->Total_User        = User::where('user_plant',$p_name->plantcode)->count();
        //  $p_name->Total_UnSignedInvoices= salesheader::where('plantGSTIN',$p_name->cmpgstino)->where('pdfstatus',null)->count();
        //  $p_name->Total_SignedInvoices  = salesheader::where('plantGSTIN',$p_name->cmpgstino)->where('pdfstatus','Signed')->count();
        //  return $p_name;
        // });
                
        // return view('home',compact('plants'));
        // }
        
    }
}
