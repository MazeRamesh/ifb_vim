<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;
use Yajra\Datatables\Datatables;
use App\Models\salesheader;
use Illuminate\Support\Facades\Log;
use Auth;

class AutoasnController extends Controller
{

public function index()        
{
    return view('autoasn.index');
}

public function manualchange($id)        
{
    salesheader::where('id',$id)->update(['hmil_status_msg'=>"Manually Posted",'hmil_status'=>1]);
    return redirect()->route('autoasn.index')->with('success_message','ASN Status Manually Changed...');
}

public function deletemanualchange($id)        
{
    salesheader::where('id',$id)->update(['hmil_status_msg'=>null,'hmil_status'=>null]);
    return redirect()->route('autoasn.index')->with('success_message','Revert the ASN Status...');
}

public function getIndexData()
{
    $user=auth()->user();
    $sales = DB::table('salesheaders')->orderBy('id','desc');
    return Datatables::of($sales)
    ->editColumn('hmil_status', function ($row) {
    if($row->hmil_status==1) 
    {
        return '<span class="badge badge-success">Posted</span>';
    }
    elseif($row->hmil_status==2) 
    {
        return '<span class="badge badge-danger">Failed</span>';
    }
    else
    {
        return '<span class="badge badge-danger">Not Posted</span>';
    }
    })
    ->addColumn('actions', function ($row) {
    if($row->hmil_status==1) 
    {
        return '<div class="btn-group btn-group-sm" role="group">
                <a href="' . route('hmil.manual.deletechange', [$row->id]) . '" class="btn btn-sm btn-outline-danger" title="Manually Change">
                        <i class="fas fa-trash-alt"></i>
                </a>   
                </div>'; 
    }
    else
    {
        return '<div class="btn-group btn-group-sm" role="group">
        <a href="' . route('hmil.manual.change', [$row->id]) . '" class="btn btn-sm btn-outline-info" title="Manually Change">
                        <i class="fas fa-pencil-alt"></i>
        </a>
        </div>'; 
    }
    })->rawColumns(['actions' => 'actions','hmil_status'=>'hmil_status'])
        ->make(true);
}

public function getsignedinvoicenum(Request $request)
{
    $user=auth()->user();
    $fromdate=$request->get('from');
    $todate=$request->get('to');
    // dd($fromdate,$todate);
    $fromdate = date('Y-m-d H:i:s', strtotime($fromdate));
    $todate = date('Y-m-d H:i:s', strtotime($todate)); 
    // dd($fromdate,$todate);
    $data = DB::table('salesheaders')->select('invoiceno')->where(function($q) {
 $q->where('hmil_status',null)->orWhere('hmil_status','!=',1);
      })->whereDate('created_at',">=", $fromdate)->whereDate('created_at','<=',$todate)->orderBy('id','desc')->get();
    
    return response()->json($data);
}

public function postdata(Request $request)
{
    $invoicenumber   = $request->get('invoicenumber');
    $soap_url="https://hmieai.hmil.net:6004/Service.asmx";
    //$soap_url="https://hmieai.hmil.net:5004/KML.asmx?WSDL";  
    $datas = DB::table('salesheaders')->leftJoin('salesdetails','salesdetails.invoiceno_id','=','salesheaders.invoiceno')->where('salesheaders.invoiceno','=',$invoicenumber)->get();
    // dd($datas);
    $datastr='';
    $body="";
    $deldept1 = "NIL";
    $hcurrency = "INR";
    $zeroval = "0";
    $remarks = "NIL";
    foreach($datas as $data)
    {
        // dd($data);
        $total=$data->netamount+$data->productsgstamount+$data->productcgstamount;
        $invdate=Carbon::createFromFormat('d.m.Y',$data->invoicedate)->format('Ymd');
        // dd($invdate);
        // <EBELN>".$data->ponumber."</EBELN>
        // <MATNR>".$data->productpartno."</MATNR>
        // <IVQTY>".$data->productqty."</IVQTY>
        $body.="<TAB_DATA_HEADER>
             <IVNUM>".$data->invoiceno."</IVNUM>
             <IVDAT>".$invdate."</IVDAT>
             <LIFNR>".'T00N'."</LIFNR>
             <ZSHOP>".$data->shopcode."</ZSHOP>
             <EBELN>".$data->ponumber."</EBELN>
             <MATNR>".$data->customerPartno."</MATNR>
             <IVQTY>".$data->productqty."</IVQTY>
             <ZAIVAMT>".$total."</ZAIVAMT>
             <ZANETPR>".$data->productsellingrate."</ZANETPR>
             <ZANETWR>".$data->netamount."</ZANETWR>
             <ZCGST>".$data->productcgstamount."</ZCGST>
             <ZSGST>".$data->productsgstamount."</ZSGST>
             <ZIGST>"."0.00"."</ZIGST>
             <ZADTC2>".''."</ZADTC2>
             <ZACNMC>".''."</ZACNMC>
             <ZACNPC>".''."</ZACNPC>
             <ZAASVL>".''."</ZAASVL>
             <ZHSNSAC>".$data->producthsncode."</ZHSNSAC>
             <ZGSTIN>".'33AAACE2545B1ZD'."</ZGSTIN>
             <VEHNO>".$data->vehicle_no."</VEHNO>
             <RETDC>".''."</RETDC>
             <ZATCS>".''."</ZATCS>
             <ZATOLC>".''."</ZATOLC>
             <ZLOTCODE>".''."</ZLOTCODE>
             <EWAYBILL>".$data->ewaybillno."</EWAYBILL>
             <EINVNO>".$data->irn_reference_no."</EINVNO>
             <ZMFGDT>".''."</ZMFGDT>
             <ZNUM1>".$data->tcs_amount."</ZNUM1>
             <ZNUM2>".''."</ZNUM2>
             <ZNUM3>".''."</ZNUM3>
             <ZNUM4>".''."</ZNUM4>
             <ZNUM5>".''."</ZNUM5>
             <ZNUM6>".''."</ZNUM6>
             <ZNUM7>".''."</ZNUM7>
             <ZCHAR1>".''."</ZCHAR1>
             <ZCHAR2>".''."</ZCHAR2>
             <ZCHAR3>".''."</ZCHAR3>
             <ZCHAR4>".''."</ZCHAR4>
             <ZCHAR5>".''."</ZCHAR5>
             <ZDATE1>".''."</ZDATE1>
             <ZDATE2>".''."</ZDATE2>
             <ZDATE3>".''."</ZDATE3>
             <ZDATE4>".''."</ZDATE4>
             <ZDATE5>".''."</ZDATE5>
             </TAB_DATA_HEADER>";
    }
    $pathtofile=storage_path('\\app\\public\\Signed\\'.$invoicenumber.".pdf");
    if(file_exists($pathtofile))
    {
        $pdf_content=file_get_contents($pathtofile);
        $hex_decimal=strtoupper(bin2hex($pdf_content));
        $soapreq="<Envelope xmlns=\"http://schemas.xmlsoap.org/soap/envelope/\">
            <Body>
            <getData xmlns=\"http://hmieai/DI/data\">
            <!--Optional:-->
                <HEXADECIMAL>".$hex_decimal."</HEXADECIMAL>
            <!--Optional:-->
            <data01>
                <!--Optional:-->
                    <GET_DATA>
                    %s
                    </GET_DATA>
            </data01>
            </getData>
            </Body>
            </Envelope>";

    $soapreq=sprintf($soapreq,$body);
    $soapreq =trim($soapreq);
    // dd($soapreq);
    $headers = array(
        "Content-Type: text/xml; charset=utf-8",
        "Content-Length: ".strlen($soapreq),
        "SOAPAction: "."");
    //$proxy = '127.0.0.1:8888';//changehere

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $soap_url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $soapreq);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    // curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . $password);
    //curl_setopt($ch, CURLOPT_PROXY, $proxy);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    $response = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    Log::debug('req_res_payload',['request'=>$soapreq,'response'=>$response,'httpcode'=>$httpcode]);

    if($httpcode==200)
    {
        $response1 = preg_replace("/(<\/?)(\w+):([^>]*>)/", "$1$2$3", $response);
        $xml = simplexml_load_string($response1);
        $t_data=json_decode( json_encode($xml->soapBody->getDataResponse->getDataResult->GET_DATA_01->TAB_DATA) , 1);
        $s_msg=$t_data['IFFFAILMSG'];
        $s_flag=$t_data['IFRESULT'];
        salesheader::where('invoiceno',$invoicenumber)->update(['hmil_status_msg'=>$s_msg,'hmil_status'=>$s_flag=="S"?1:2]);
        if($s_flag=="S") 
        {
            return redirect()->route('autoasn.index')->with('success_message','ASN was SuccessFully Posted...');
        }
        else
        {
            return redirect()->back()->withErrors($s_msg);
        }

    }
    else
    {
        return redirect()->back()->withErrors('HMIL Server not reachable. Try after sometime...');
    }
    }
    else
    {
        return redirect()->back()->withErrors('Digital Invoice Not Available in Path');
    }
}

function forceFilePutContents (string $fullPathWithFileName, string $fileContents)
{
    $exploded = explode(DIRECTORY_SEPARATOR,$fullPathWithFileName);
    array_pop($exploded);
    $directoryPathOnly = implode(DIRECTORY_SEPARATOR,$exploded);
    if (!File::exists($directoryPathOnly))
    {
        File::makeDirectory($directoryPathOnly,0775,true,false);
    }
    File::put($fullPathWithFileName,$fileContents);
}
}