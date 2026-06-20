<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use App\Models\location;
use App\Http\Requests;
use App\Invoice;
use App\InvoiceProduct;
use App\User;
use App\Models\item;
use App\Models\ftpconfig;
use SplFileInfo;
use Input;
use DB;
use Session;
use App\Post;
use App\Details;
use App\Exports\CustomerErrorExport;
use App\Imports\SalesheaderImport;
use App\Models\salesdetails;
use App\Models\salesheader;
use Auth;
use SFTP;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\File;
use DateTime;
use Exception;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\HeadingRowImport;
use Validator;
use NumberFormatter;

// use Session;
class InvoiceController extends Controller
{
    public static $invoice="";
    public $errorblock=false;
    public function index()
    {


        $loginName =  Auth::user()->username;

        $invoices = DB::table('invoices')
            ->leftJoin('invoice_products', 'invoice_products.InternalDocNo_id', '=', 'invoices.InternalDocNo')
            ->leftJoin('items', 'items.ourPartNo', '=', 'invoice_products.ourProductCode')
            ->leftJoin('users', 'users.username', '=', 'users.username')
            ->leftJoin('locations', 'users.location', '=', 'locations.location')
            ->where('users.username','=', $loginName)->get();




        //return view('invoices.create');

        return view('invoices.index', compact('invoices'));
    }

    public function create()
    {
       return view('invoices.create');
    }





    public function downloadExcel()
    {
                            //download('csv'); store('csv',storage_path('./app/'));
    }

public function post()

{

 // FTP server details
$ftpcon = ftpconfig::all();

foreach($ftpcon as $ftpcon)
{
    $ftp_host       = $ftpcon->IPaddress;
    $ftp_username   = $ftpcon->username;
    $ftp_password   = $ftpcon->password;
    $ftp_port       = $ftpcon->port;
    $ftp_file_path  = $ftpcon->folderPath;
}



// open an FTP connection

    $conn_id = ftp_connect($ftp_host,$ftp_port);

    /*if($conn_id){
        echo "success"; exit;
    }
    else{
        echo "not success"; exit;
    }*/

    $ftp = Storage::createFtpDriver([
                                 'host'     => $ftp_host,
                                 'username' => $ftp_username,
                                 'password' => $ftp_password,
                                 'port'     => $ftp_port,
                                 //'root'     => '',
                                 //'passive'  => '',
                                 //'ssl'      => '',
                                 'timeout'  => '30',
                             ]);

     $ss = Session::get('invoice');
        $file_local = Storage::disk('local')->get(  $ss.'.csv');
        $file_ftp = $ftp->put($ftp_file_path.'/'.  $ss.'.csv', $file_local);

   /* echo $file_ftp;
    exit;*/

        if($file_ftp)
        {
            return redirect()->route('invoices')->with('success', ['File Send successfully.']);
        }
        else
        {
            return redirect()->back()->withErrors('FTP config Error');
        }


}






    public function importExcel(Request $request)
    {
        // dd("qwqw");
         $v = Validator::make($request->all(), [
        'import_file' => ['required','file']
        ]);

         $gateno=$request->get('gateno');
         $plantname=$request->get('plantname');
         // if($selectcompany == "hmil")
        // {
            // $companyAddress1  = "HYUNDAI MOTOR INDIA LIMITED";
            // $companyAddress2  = "H1 SIPCOT INDUSTRIAL PARK,";
            // $companyAddress3  = "IRRUNGATTUKOTTAI,";
            // $companyAddress4  = "SRIPERUMBUDUR TK";
            // $companyAddress5  = "TAMIL NADU - 602105";
            // $companyGSTIN     = "33AAACH2364M1ZM";
            // $companyStateCode = "33";
        // }
        // else
        // {
        //     $companyAddress1  = "KIA MOTORS INDIA PRIVATE LIMITED";
        //     $companyAddress2  = "Erramanchi, Penukonda Mondal,";
        //     $companyAddress3  = "Ananthapur District,";
        //     $companyAddress4  = "";
        //     $companyAddress5  = "";
        //     $companyGSTIN     = "37AAGCK5972Q6ZG";
        //     $companyStateCode = "37";
        // // }
         // dd($company,$plantname);
    if ($v->fails())
    {
        // dd($v->errors());
        return redirect()->back(
        )->withErrors($v->errors());
    }

       else
       {
        try {
            $headings = (new HeadingRowImport())->toArray(request()->file('import_file'))[0][0];
            $headings[]="Remarks";
            $sales_import = new SalesheaderImport($headings);
            //           dd($headings);
            $errors=[];
            $importFile = Excel::import($sales_import,request()->file('import_file'));
            $errorflag=0;
            $errorrow=array();
            $failures=$sales_import->getErrors();
            if(count($failures)>0)
            {
                $export = new CustomerErrorExport($failures);
                return Excel::download($export, 'importError.xlsx');
            }
            return redirect()->back()->with('success_message', 'File Imported Successfully!!');
        }
        catch(\PhpOffice\PhpSpreadsheet\Reader\Exception $e)
        {
            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Something Wrong On Your Sheet! Open with excel software and save then try again!']);
        }
        catch (Exception $e) {
            // dd($e);
            return back()->withInput()
                         ->withErrors(['unexpected_error' => $e->getMessage()]);
       }
       }

    }

    public function downloadmanual(Request $request)

    {

    }



     public function importExcelstore(Request $request)
    {


        try {
            // dd($request->all());
            $o_sales_headers=Session::get('sales_header');
            $o_sales_details=Session::get('sales_details');
            $page=$request->get('page');
            $action=$request->get('action');
            if($action=="Cancel")
            {
                $invoice_no=$o_sales_headers[$page-1]->values()[0]['invoiceno'];
                if(count($o_sales_headers)<=$page)
                {
                    Session::forget('sales_header');
                    Session::forget('sales_details');
                    $page=1;
                }
                else
                    $page++;
                return redirect()->route('salesheaders.salesheader.Import',['page'=>$page])->with('success_message', 'Invoice No '.$invoice_no.' Skipped!');
            }
            $sales_headers=$o_sales_headers[($page-1)]->values();
            // dd($sales_headers);
            $sales_details=$sales_headers->map(function($row){return $row['details'][0];})->values();
            $partno=$request->get('partno');
            $customer_partno=$request->get('customer_partno');
            $shop_code=$request->get('shop_code');
            $shop=$request->get('shop');
            $gate=$request->get('gate');
            $box_qty=$request->get('box_qty');
            $hsncode=$request->get('hsncode');
            $gst_in=$request->get('gst_in');
            $product_desc=$request->get('product_desc');
            $tcs_amount=$request->get('tcs_amount');
            $irn_reference_no=$request->get('irn_reference_no');
            $stuff_qtys=$request->get('stuff_qtys');
            $sales_details=collect($sales_details)->mapInto(salesdetails::class);
            foreach($sales_headers as $key=> $sales_header)
            {
                $sales_header['data']=json_encode($sales_header['data'],true);
                $sales_header['companyGSTIN']=$gst_in[$key];
                $sales_header['shopcode']=$shop_code[$key];
                $sales_header['createdlocation']=$shop[$key];
                $sales_header['gateno']=$gate[$key];
                $sales_header['NoofContainers']=$box_qty[$key];
                $sales_header['ContainerType']=$box_qty[$key];
                $sales_header['plant_code']=explode('-',$partno[$key])[1];
                $sales_header['tcs_amount']=sprintf('%.2f',$tcs_amount[$key]);
                $sales_header['irn_reference_no']=$irn_reference_no[$key];
                $sales_header['StuffQty']=$stuff_qtys[$key];
                $sales_header=salesheader::updateOrCreate(['invoiceno'=>$sales_header['invoiceno']],$sales_header);
                $sales_detail=$sales_details[$key];
                $sales_detail['invoiceno_id']=$sales_header->invoiceno;
                $sales_detail['data']=json_encode($sales_detail['data'],true);
                $sales_detail['productpartno']=explode('-',$partno[$key])[0];
                $sales_detail['customerPartno']=$customer_partno[$key];
                $sales_detail['producthsncode']=$hsncode[$key];
                $sales_detail['productname']=$product_desc[$key];
                $sales_header->InvoicenoList()->delete();
                $sales_header->InvoicenoList()->save($sales_detail);
            }
            // dd($sales_details);
            if(count($o_sales_headers)<=$page)
            {
                Session::forget('sales_header');
                Session::forget('sales_details');
                $page=1;
            }
            else
                $page++;
            return redirect()->route('salesheaders.salesheader.Import',['page'=>$page])->with('success_message', 'Invoice was successfully added!');

        } catch (Exception $exception) {
            // dd($exception);
            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Error on '.$exception->getMessage()]);
        }
    }


public function sessionforget()
{
    Session::forget('data1');
    Session::forget('data2');
    return response()->json(array('data'=>'success'));
}


public function google_maps_search()
{

/*	$address = "chennai";
	$key	= "AIzaSyDq6pb0dOe00EExg6QH1jUtr1nWe6LG9Mk";
	//echo $key; exit;
    $url = sprintf('https://maps.googleapis.com/maps/api/geocode/json?address=%s&key=%s', urlencode($address), urlencode($key));
    //echo "HI"; exit;
	$response = file_get_contents($url);
    $data = json_decode($response, true);
    dd($data); exit;
    return $data;*/

/*       $lat = 52.5227797;

// Longitude
$lng = 13.3880986;

// The language code (en = english)
$language = 'en';

// The google API key
$key = 'AIzaSyDq6pb0dOe00EExg6QH1jUtr1nWe6LG9Mk';

$url = sprintf('https://maps.googleapis.com/maps/api/geocode/json?latlng=%s,%s&language=%s&key=%s', urlencode($lat),
    urlencode($lng), urldecode($language), urlencode($key));

$response = file_get_contents($url);
$data = json_decode($response, true);

var_export($data);*/

       $response = \GoogleMaps::load('geocoding')
		->setParam (['address' =>'chennai'])
 		->get();
    //    dd($response);

}




}
