<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\salesheader;
use App\Models\Customertables;
use Yajra\Datatables\Datatables;
use DB;
use Carbon\Carbon;
use PDF;
use JasperPHP;
use PHPJasper\PHPJasper;
use PHPJasperXML;
use DNS2D;

class EwaybillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return view('ewaybill.ewaybilllist');
    }

   public function getallinvoices()
    {
                $sales = salesheader::get();
        
        return Datatables::of($sales)
        // ->addColumn('checkb', function ($row) {
            
        //     return '<div class="checkbox">
        //                        <input type="checkbox" id="check" name="check" value="" />
        //                        <label for="check">
        //                        <span></span>
        //                        </label> 
                                                                     
        //                                     </div>'; 
        // })
        ->addColumn('actions', function ($row) {
            if($row->ewaybillno!=null)
            {
                return '<div class="btn-group btn-group-sm" role="group">

                    <a href="' . route('printewaybillno', [$row->id]) . '" class="btn btn-sm btn-outline-success" title="Show Area">
                        <i class="fas fa-print"></i>
                    </a>
                   
                </div>'; 
            }
            
        })->editColumn('ewaybillno', function ($row) { 
        
            if($row->ewaybillno==null)
                return "<span style='color:red;'>Not Generated</span>";
            else 
                return "<span style='color:green;'>$row->ewaybillno</span>";
        
        })->editColumn('pdfstatus', function ($row) { 
         
            if($row->pdfstatus==null)
                return "<span style='color:red;'>Unsigned</span>";
            else 
                return "<span style='color:green;'>Signed</span>";
        
        })
        ->rawColumns(['actions' => 'actions','ewaybillno'=>'ewaybillno','pdfstatus'=>'pdfstatus'])
        ->make(true);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getewayinvoicenum(Request $request)
    {
        $fromdate=$request->get('from');
        $todate=$request->get('to');
        // dd($fromdate);
        $fromdate = date('Y-m-d H:i:s', strtotime($fromdate));
        $todate = date('Y-m-d H:i:s', strtotime($todate));
         // dd($fromdate,$todate);
                   //$data = Invoice::all();

                  
      $data = DB::table('salesheaders')->select('invoiceno')->whereDate('created_at',">=", $fromdate)->where('ewaybillno','=',null)->whereDate('created_at','<=',$todate)->get();
           
           // dd($data);

         return response()->json($data);
    }

    public function generateewaybillno(Request $request)
    {
        // dd("12345");

        $getInv = $request->input('invoicenumber');

        $getEwayBillUserPass= DB::table('configs')
                                        ->where('id', 1)
                                        ->select('ewaybillusername','ewaybilluserpassword')
                                        ->first();
        $InvoiceData1 = salesheader::with('InvoicenoList')->where('invoiceno',$getInv)->first();
        $customerdetail= Customertables::where('customercode',$InvoiceData1->customercode_id)->first();
        $fromGstin=$getEwayBillUserPass->ewaybillusername;
        $toGstin=$customerdetail->customerGSTINno;
        $km="100";
$InvoiceData['docType']="INV";
$InvoiceData['docNo']=$InvoiceData1->invoiceno;
$InvoiceData['docDate']=$InvoiceData1->invoicedate;
$InvoiceData['fromGstin']=$fromGstin;
$InvoiceData['supplyType']= "O";
$InvoiceData["subSupplyType"]="1";
$InvoiceData["subSupplyDesc"]="Supply"; 
$InvoiceData['fromTrdName']="J.K. Fenner (India) Limited";
$InvoiceData['fromAddr1']=substr("RNS 23,Renault Nissan Suppliers Park,Sipcot Industrial Park,Vadukkapattu Village, Oragadam,Sriperumpudur Taluk, Kancheepuram Dist,Tamilnadu - 603 204. India Phone:+ 91- 44-67202600/67202632",0,119);
$InvoiceData['fromAddr2']=substr("RNS 23,Renault Nissan Suppliers Park,Sipcot Industrial Park,Vadukkapattu Village, Oragadam,Sriperumpudur Taluk, Kancheepuram Dist,Tamilnadu -603 204. India Phone:+ 91- 44-67202600/67202632",120,239);
$InvoiceData['fromPlace']="Chennai";
$InvoiceData['fromPincode']=603204;//intval($InvoiceData1->Invoicing_Postel_Code);//;
$InvoiceData['fromStateCode']=intval(substr($fromGstin,0,2));
$InvoiceData['actFromStateCode']=intval(substr($fromGstin,0,2));
$InvoiceData['toGstin']=$toGstin;//"33AAACH2364M1ZM";
$InvoiceData['toTrdName']=$customerdetail->customername;
$InvoiceData['toAddr1']=$customerdetail->customeraddress;
$InvoiceData['toAddr2']="";
$InvoiceData['toPlace']=$customerdetail->customercity;
$InvoiceData['toPincode']=121212;//intval($InvoiceData1->Invoicing_Postel_Code);//263665;
$InvoiceData['actToStateCode']=intval(substr($toGstin,0,2));
$InvoiceData['toStateCode']=intval(substr($toGstin,0,2));
// $InvoiceData['TransactionType']=1;
// $InvoiceData['dispatchFromGSTIN']=$fromGstin;
// $InvoiceData['dispatchFromTradeName']="Chemetall India Private Limited";
// $InvoiceData['shipToGSTIN']=$toGstin;
// $InvoiceData['shipToTradeName']=$InvoiceData1->Invoicing_Mailing_Name;
// $InvoiceData['otherValue']=0;
$InvoiceData['totalValue']=(float)$InvoiceData1->taxableamounts;
// dd(json_encode($InvoiceData['shipToGSTIN']));
// $InvoiceData['GrandTotalInWord']=$InvoiceData1->Invoice_Total_In_Words;
// $InvoiceData['taxable_amount']=(float)$InvoiceData1->Total_Amount;
// $InvoiceData['TaxAmountInWord']="";
$InvoiceData['totInvValue']=(float)$InvoiceData1->sales_total;
$InvoiceData['cgstValue']=($InvoiceData['fromStateCode']==$InvoiceData['toStateCode'])?((float)$InvoiceData1->cgstamount):0;
$InvoiceData['sgstValue']=($InvoiceData['fromStateCode']==$InvoiceData['toStateCode'])?((float)$InvoiceData1->sgstamount):0;
$InvoiceData['igstValue']=($InvoiceData['fromStateCode']==$InvoiceData['toStateCode'])?0:((float)$InvoiceData1->igstamount);
$InvoiceData['cessValue']=0;
// $InvoiceData['cessNonAdvolValue']="0";
// $InvoiceData['transporterId']=$toGstin;
// $InvoiceData['transporterName']="";
$InvoiceData['transDocNo']="";
$InvoiceData['transMode']="1";
$InvoiceData['transDistance']=$km;
$InvoiceData['transactionType']=1;
$InvoiceData['transDocDate']=Carbon::now()->format('d/m/Y');//date of now"01/12/2019"
$InvoiceData['vehicleNo']="12121212";
$InvoiceData['vehicleType']="R";

// $InvoiceData['count']="";
// $InvoiceData['status']="";
// $InvoiceData['companyName']="";
// $InvoiceData['companyid']="";
// $InvoiceData['ewaybillno']=$InvoiceData1->ewaybillno;
// $InvoiceData['ewayBillDate']=$InvoiceData1->ewayBilldate;
// $InvoiceData['validUpto']=$InvoiceData1->validUpto;
// $InvoiceData['message']=$InvoiceData1->message;
// $InvoiceData['requestId']=$InvoiceData1->requestId;

foreach($InvoiceData1->InvoicenoList as $key=> $Invoicedata2)
        {
// $InvoiceData['itemList'][$key]['document_number']=$Invoicedata2->Invoice_Number_id;
// $InvoiceData['itemList'][$key]['item_number']=$Invoicedata2->Customer_Material_Number;
// $InvoiceData['itemList'][$key]['product_id']=$Invoicedata2->Trimmed_Product_Code;
$InvoiceData['InvoicenoList'][$key]['productName']=$Invoicedata2->productname;
$InvoiceData['InvoicenoList'][$key]['productDesc']=$Invoicedata2->productname;
$InvoiceData['InvoicenoList'][$key]['hsnCode']=intval($Invoicedata2->producthsncode);
$InvoiceData['InvoicenoList'][$key]['quantity']=intval($Invoicedata2->productqty);
$InvoiceData['InvoicenoList'][$key]['qtyUnit']=str_pad($Invoicedata2->uom_id,3,'S');
$InvoiceData['InvoicenoList'][$key]['cgstRate']=0;
// (float)$Invoicedata2->CGST_Amount;(float)$Invoicedata2->SGST_Amount;
$InvoiceData['InvoicenoList'][$key]['sgstRate']=0;
$InvoiceData['InvoicenoList'][$key]['igstRate']=0;
$InvoiceData['InvoicenoList'][$key]['cessRate']=0;
$InvoiceData['InvoicenoList'][$key]['cessAdvol']=0;
$InvoiceData['InvoicenoList'][$key]['taxableAmount']=(float)$Invoicedata2->taxableamount;
// $InvoiceData['itemList'][$key]['count']="";
// $InvoiceData['itemList'][$key]['status']="";
// $InvoiceData['itemList'][$key]['companyName']="";
// $InvoiceData['itemList'][$key]['companyid']="";
}

        
        
        if(($getEwayBillUserPass->ewaybillusername == "") || ($getEwayBillUserPass->ewaybilluserpassword ==""))
        {
             return redirect()->route('ewaybill.index')->withErrors(['unexpected_error' => 'Company "GSTIN" number OR "URL" not found. Please Contact Administrator.']);
        }
      
        
       $getAccessOldToken    = DB::table('configs')
                                        ->where('id', 1)
                                        ->where('ewaytrialkeyexpirydate', '>=', Carbon::now())
                                        ->select('ewaybillserialkey')
                                        ->first(); 
       $getAccessNewToken    = DB::table('configs')
                                        ->where('id', 1)
                                        ->where('ewaybillexpirydate', '>=', Carbon::now())
                                        ->select('ewaybillserialnewkey')
                                        ->first(); 
                                        // dd($getAccessOldToken,$getAccessNewToken);
        if($getAccessOldToken || $getAccessNewToken)
        {
            if($getAccessOldToken)
            {
                $getAccessToken = $getAccessOldToken->ewaybillserialkey;
            }
            else
            {
                $getAccessToken = $getAccessNewToken->ewaybillserialnewkey;
            }
          
            $URL = $getEwayBillUserPass->ewaybilluserpassword;
            $http_url='http://mazedemo.3utilities.com:8080/EwayBillGenerate_server/public/api/ewaybillgenerate';
            
         $curl=curl_init($http_url);
     //   $send = json_encode($data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($curl, CURLOPT_HEADER, true);
         // dd(json_encode($InvoiceData));

        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization:  Bearer '.$getAccessToken,'Content-Type:application/json'));
        $req=['ewaybillusername'=>$getEwayBillUserPass->ewaybillusername,
                                                    'ewaybilluserpassword'=>$getEwayBillUserPass->ewaybilluserpassword,
                                                    'InvoiceData'=> $InvoiceData];
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($req));
        // curl_setopt($curl, CURLOPT_PROXY, 'localhost:8888');
        try{
            }
        catch (Exception $e)
        {
            return $e->getMessage();
        }
        
       $res = curl_exec($curl);
        $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

$header_size = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
$header = substr($res, 0, $header_size);
// dd($header);
$body = substr($res, $header_size);      
$headersmall = strtolower($header);
$result      = json_decode($body,true);
// dd($result);          
$req['token']=$getAccessToken;
// $result['header']=$header;
// Log::create(['description'=>'Eway Bill',
//   'app_name'=>'Web App',
// 'user_id'=>Auth::Id(),
// 'route'=>$http_url,
// 'method_type'=>"POST",
// 'http_code'=>$httpcode,
// 'req_res_payload'=>json_encode(['request'=>$req,'response'=>$res])]);
if($header)
{
preg_match_all('/x\-ratelimit\-limit\: \d{1,}/', $headersmall, $output_array);
if(count($output_array)>0&&count($output_array[0])>0)
{
$ratelimit       = $output_array[0][0];
$ratelimit_value = (explode(" ",$ratelimit));           
if($ratelimit_value[0]){$StoreRateLimit = $ratelimit_value[1];}else{$StoreRateLimit = 0;}
            
preg_match_all('/x\-ratelimit\-remaining\: \d{1,}/', $headersmall, $output);
$ratelimitRemaining        = $output[0][0];
$ratelimitRemaining_value  = (explode(" ",$ratelimitRemaining));           
if($ratelimitRemaining_value[0]){$StoreRatelimitRemaining_value = $ratelimitRemaining_value[1];}else{$StoreRatelimitRemaining_value = 0;}

DB::table('configs')->where('id', 1)->update(['ewaybilltotalcount'=>$StoreRateLimit,
                                                'ewaybillremainingcount'=>$StoreRatelimitRemaining_value]);   
}
}
else
{
    // dd("first");
 // return response()->json(['message'=>'Server Not found Please Contact Administrator','status'=>'error']);
     return redirect()->route('ewaybill.index')->withErrors(['unexpected_error' => '"SERVER" not Responding Please Contact Administrator']);

}
     
          // dd($res);
            
          if(isset($result['status'])&&$result['status']=="error")
          {
            // dd("second");
              // return response()->json(['status'=>'error','message'=>"ERROR -> ".$result['message']]);
               return redirect()->route('ewaybill.index')->withErrors(['unexpected_error' => "ERROR -> ".$result['message']]);
          }
            else if(isset($result['status'])&&$result['status']=="success")
            {
        
       $ewaybillnumber      = $result['ewaybillnumber'];
       $ewayBillDate        = $result['ewayBillDate'];
       $validUpto           = $result['validUpto'];
       $message             = $result['message'];
       $todayCount          = $result['todayCount'];
       $requestId           = $result['requestId'];
       $activationdate      = $result['activationdate'];
       $expirydate          = $result['expirydate'];
       $RemainingDays       = $result['RemainingDays'];
            
        Session::put('EwayBillRequestTodayCount',$todayCount);
            
        $updateQuery1 = DB::table('salesheaders')->where('invoiceno',$getInv)->update(['ewaybillno'=>$ewaybillnumber,
                                                          'ewaybilldate'=>$ewayBillDate,
                                                           'validUpto' =>$validUpto,
                                                           'message' =>$message,
                                                            'requestId'=>$requestId
                                                          ]);  
        $updateQuery2 = DB::table('configs')->where('id',1)->update(['ewaybillactivationdate'=>$activationdate,
                                                                        'ewaybillexpirydate'=>$expirydate,
                                                                        'ewaybillremainingdays'=>$RemainingDays]);
             return redirect()->route('ewaybill.index')
                             ->with('success_message', 'e-Way Bill Number Generated successfully!');
            // return response()->json(['status'=>'success','ewaybillnumber'=>$ewaybillnumber,'message'=>$message]);
            }
            else
            {
                // dd("third");
                // return response()->json(['message'=>'"SERVER" not Responding Please Contact Administrator','status'=>'error']); 
                 return redirect()->route('ewaybill.index')->withErrors(['unexpected_error' => '"SERVER" not Responding Please Contact Administrator']);
            }
            
        }
        
        else
        {
             // return response()->json(['message'=>'"Serial Key" not found Please Contact Administrator','status'=>'error']); 
            // return redirect()->route('ewaybill.index')->with('danger_message', 'Serial Key" not found Please Contact Administrator');
             return redirect()->route('ewaybill.index')->withErrors(['unexpected_error' => 'Serial Key" not found Please Contact Administrator']);
        }
    }
     public function printewaybillno($id)
    {

$pdf = PDF::loadView('ewaybill.ewaybillpdf')->setPaper('a4', 'portrait');
      return $pdf->stream('PrintBarcode.pdf');
        // $output = base_path('/vendor/cossou/jasperphp/JK_Fenner');
        // $id=$id;
        // $salesheaders = salesheader::where('id',$id)->first();  
        // \Storage::disk('local')->put('EwayBill.png',base64_decode(DNS2D::getBarcodePNG($salesheaders->ewaybillno, "QRCODE")));
        // $invoicenumber=$salesheaders->invoiceno;
        // JasperPHP::process(base_path('/vendor/cossou/jasperphp/JK_Fenner/ewaybill.jrxml'),false,
        //                      array('pdf'),
        //                      array('invoicenumber' => $invoicenumber,'SUBREPORT_DIR' =>$output),
        //                        array('driver'=>'mysql','username'=>'root','host'=>'localhost','port'=>'3306','database'  => 'vim_application')
        //                     )->execute();

        
        //     $pathToFile_ewaybill     = base_path('/vendor/cossou/jasperphp/JK_Fenner/ewaybill.pdf');
            
        //     return response()->file($pathToFile_ewaybill);
    }

}
