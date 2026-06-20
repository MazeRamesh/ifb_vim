<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\salesheader;
use App\Models\company;
use App\Errorlog;
use DB;
use Illuminate\Support\Facades\Storage;
use Carbon;
use PDF;
use Response;
use File;

class SignorController extends Controller
{

  public function ReadyForScan(Request $request) 
    {
      $key = $request->get('api_key');
      // $valid=company::where('cmp_uuid',$key)->first();
      $valid="0";
      if($valid!=null)
      {
       $unsigneddetails=salesheader::where('pdfstatus','=',null)->where
       ('signstatus','=',"Ready")->select('id','invoiceno as inv_no')->get()->map(function($row){
       $row->filename=$row->inv_no.'.pdf';
       return $row;
       });
       return response()->json(['status'=>true,'data'=>$unsigneddetails]);  
      }
       return response()->json(['status'=>false,'message'=>"Invalid API Key"]);
    }

    public function DownloadForScan(Request $request,$id) 
    {
      $key = $request->get('api_key');
      // $valid=company::where('cmp_uuid',$key)->first();
      $valid="0";
      if($valid!=null)
      {
        $invoiceno=salesheader::where('id',$id)->select('invoiceno')->first();
        $file = storage_path()."\app\public\UnSigned\\".$invoiceno->invoiceno.".pdf";
        $headers = array(
              'Content-Type: application/pdf',
            );

    return Response::download($file, $invoiceno->invoiceno.'.pdf', $headers);
      }
      return response()->json(['status'=>false,'message'=>"Invalid API Key"]);
      
    }
    public function DownloadSigned(Request $request,$id) 
    {
      // dd($request->all());
      $key = $request->get('api_key');
      // $valid=company::where('cmp_uuid',$key)->first();
      $valid="0";
      if($valid!=null)
      {
      $file   = $request->file('file');
      // dd($file);
      salesheader::where('id',$id)->update(['pdfstatus'=>"Signed"]);
      $invoiceno=salesheader::where('id',$id)->select('invoiceno')->first();
      $file->storeAs('public\\Signed\\',$invoiceno->invoiceno.".pdf");
      File::delete(storage_path().'/app/public/UnSigned/'.$invoiceno->invoiceno.'.pdf');
      // unlink(storage_path('public\\UnSigned\\'.$invoiceno->invoiceno.".pdf"));

      // Storage::put("public/Signed/".$invoiceno->invoiceno.".pdf",$file);
        return response()->json(['status'=>"Success"]);
        }  
        return response()->json(['status'=>false,'message'=>"Invalid API Key"]);
    }
    public function Errors(Request $request) 
    {
      $key = $request->get('api_key');
      // $valid=company::where('cmp_uuid',$key)->first();
      $valid="0";
      if($valid!=null)
      {
      $data   = $request->get('data');
      foreach ($data as $key => $value) 
            {
              Errorlog::updateOrCreate(['unsigned_file_id'=>$value['unsigned_file_id']],['unsigned_file_id'=>$value['unsigned_file_id'],'inv_no'=>$value['inv_no'],'file_name'=>$value['file_name'],'error_code'=>$value['error_code'],'error_desc'=>$value['error_desc']]);              
            }
      return response()->json(['status'=>true,'data'=>$data]); 
      }
      return response()->json(['status'=>false,'message'=>"Invalid API Key"]); 
    }

}
