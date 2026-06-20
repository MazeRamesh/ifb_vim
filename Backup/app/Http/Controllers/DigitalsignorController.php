<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\salesheader;
use Yajra\Datatables\Datatables;
use DB;
use Illuminate\Support\Facades\Storage;
use Carbon;
// use PDF;
use Response;
use Artisan;
use Carbon\Carbon as CarbonCarbon;
use DNS2D;
use PDF;
use JasperPHP;
use PHPJasper\PHPJasper;
use PHPJasperXML;

class DigitalsignorController extends Controller
{
    //
    public function index()
    {
         return view('signor.index');
    }
    public function getIndexData(Request $request)
    {
       $user=auth()->user();
        $sales = salesheader::where('pdfstatus','=',null)->where('signstatus','=',null);//->get();
        if($request->has('fromdate')&&$request->fromdate!=''&&$request->has('todate')&&$request->todate!='')
        {
            $fromdate=Carbon\Carbon::createFromFormat('m/d/Y',$request->fromdate)->startOfDay()->format('Y-m-d');
            $todate=Carbon\Carbon::createFromFormat('m/d/Y',$request->todate)->endOfDay()->format('Y-m-d');
            $sales->whereDate('created_at','>=',$fromdate)->whereDate('created_at','<=',$todate);
        }
        return Datatables::of($sales)

        ->addColumn('checkb', function ($row) {

            return '<div class="checkbox">
                               <input type="checkbox" id="check" name="check" value="" />
                               <label for="check">
                               <span></span>
                               </label>

                                            </div>';
        })
        ->addColumn('actions', function ($row) {

            return '<div class="btn-group btn-group-sm" role="group">

                    <a href="' . route('digital.print.previewunsigned', [$row->id]) . '" class="btn btn-sm btn-outline-success" title="Show Invoice">
                        <i class="fas fa-eye"></i>
                    </a>


                </div>';
        })->editColumn('ewaybillno', function ($row) {

            if($row->ewaybillno==null)
                return "<span style='color:red;'>Not Generated</span>";
            else
                return "<span style='color:green;'>$row->ewaybillno</span>";

        })->editColumn('pdfstatus', function ($row) {

            if($row->pdfstatus==null)
                return "<span style='color:red;'>Unsigned</span>";
            else
                return "<span style='color:green;'>$row->pdfstatus</span>";

        })
        ->addIndexColumn()
        ->rawColumns(['actions' => 'actions','checkboxes'=>'checkb','ewaybillno'=>'ewaybillno','pdfstatus'=>'pdfstatus'])
        ->make(true);
    }

    public function getIndexDatareadyforsigned()
    {
       $user=auth()->user();
        $sales = salesheader::where('pdfstatus','=',null)->where('signstatus','=',"Ready")->get();

        return Datatables::of($sales)

        ->addColumn('checkb', function ($row) {

            return '<div class="checkbox">
                               <input type="checkbox" id="check" name="check" value="" />
                               <label for="check">
                               <span></span>
                               </label>

                                            </div>';
        })
        ->addColumn('actions', function ($row) {

            return '<div class="btn-group btn-group-sm" role="group">

                    <a href="' . route('digital.print.previewunsigned', [$row->id]) . '" class="btn btn-sm btn-outline-success" title="Show Invoice">
                        <i class="fas fa-eye"></i>
                    </a>


                </div>';
        })->editColumn('ewaybillno', function ($row) {

            if($row->ewaybillno==null)
                return "<span style='color:red;'>Not Generated</span>";
            else
                return "<span style='color:green;'>$row->ewaybillno</span>";

        })->editColumn('pdfstatus', function ($row) {

            if($row->pdfstatus==null)
                return "<span style='color:red;'>Unsigned</span>";
            else
                return "<span style='color:green;'>$row->pdfstatus</span>";

        })
        ->rawColumns(['actions' => 'actions','checkboxes'=>'checkb','ewaybillno'=>'ewaybillno','pdfstatus'=>'pdfstatus'])
        ->make(true);
    }

    public function getIndexDatasigned()
    {
       $user=auth()->user();
        $sales = salesheader::where('pdfstatus','!=',null)->get();

        return Datatables::of($sales)
         ->addColumn('checkb', function ($row) {

            return '<div class="checkbox">
                               <input type="checkbox" id="check" name="check" value="" />
                               <label for="check">
                               <span></span>
                               </label>

                                            </div>';
        })
        ->addColumn('actions', function ($row) {

            return '<div class="btn-group btn-group-sm" role="group">

                    <a href="' . route('digital.print.preview', [$row->id]) . '" class="btn btn-sm btn-outline-success" title="Show Invoice">
                        <i class="fas fa-eye"></i>
                    </a>
                    <a href="' . route('digital.print.downloadviabutton', [$row->id]) . '" class="btn btn-sm btn-outline-warning" title="Show Area">
                        <i class="fas fa-upload"></i>
                    </a>


                </div>';
        })->editColumn('ewaybillno', function ($row) {

            if($row->ewaybillno==null)
                return "<span style='color:red;'>Not Generated</span>";
            else
                return "<span style='color:green;'>$row->ewaybillno</span>";

        })->editColumn('pdfstatus', function ($row) {

            if($row->pdfstatus==null)
                return "<span style='color:red;'>Unsigned</span>";
            else
                return "<span style='color:green;'>$row->pdfstatus</span>";

        })
        ->rawColumns(['actions' => 'actions','checkboxes'=>'checkb','ewaybillno'=>'ewaybillno','pdfstatus'=>'pdfstatus'])
        ->make(true);
    }


    public function getinvoicenumsigned(Request $request)
    {
       $user=auth()->user();
        $fromdate=$request->get('from');
        $todate=$request->get('to');
        // dd($fromdate);
        $fromdate = date('Y-m-d H:i:s', strtotime($fromdate));
        $todate = date('Y-m-d H:i:s', strtotime($todate));
         // dd($fromdate,$todate);
                   //$data = Invoice::all();


      $data = DB::table('salesheaders')->select('invoiceno')->where('pdfstatus','=','Signed')
                ->whereDate('created_at',">=", $fromdate)
                ->whereDate('created_at','<=',$todate)->get();

           // dd($data);

         return response()->json($data);
    }

    public function PrintSignPDF(Request $request)
    {

        $invoicenumber   = $request->get('invoicenumber');
        // dd($invoicenumber);
        $invoices=explode(",",$invoicenumber);
        $count=count($invoices);
        // dd($invoicenumber);
        // $pdf = PDF::loadView('print_invoice.singlepdf',compact(['data','a','customer','company']))->setPaper('a4', 'portrait');
        // $pdf=Storage::get("public/UnSigned/".$invoicenumber.".pdf", $pdf->output());
      // return $pdf->stream('PrintBarcode.pdf');
         $pdfContent = Storage::get("public/Signed/".$invoicenumber.".pdf");
         // $file = storage_path()."/public/UnSigned/Test001.pdf";
         // dd($file);
         return Response::make($pdfContent, 200, [
          'Content-Type'        => 'application/pdf',
          'Content-Disposition' => 'inline; filename="'.$invoicenumber.'"'
          ]);
        // dd("print");
    }


    public function downloadviabutton($id)
    {

        $invoicenumber=DB::table('salesheaders')->where('id',$id)->first()->invoiceno;
        // $invoicenumber   = $request->get('invoicenumber');
        // dd($invoicenumber);
        // $invoices=explode(",",$invoicenumber);
        // $count=count($invoices);
        // dd($invoicenumber);
        // $pdf = PDF::loadView('print_invoice.singlepdf',compact(['data','a','customer','company']))->setPaper('a4', 'portrait');
        // $pdf=Storage::get("public/UnSigned/".$invoicenumber.".pdf", $pdf->output());
      // return $pdf->stream('PrintBarcode.pdf');
         $pdfContent = Storage::get("public/Signed/".$invoicenumber.".pdf");
         // $file = storage_path()."/public/UnSigned/Test001.pdf";
         // dd($file);
         return Response::make($pdfContent, 200, [
          'Content-Type'        => 'application/pdf',
          'Content-Disposition' => 'inline; filename="'.$invoicenumber.'"'
          ]);
        // dd("print");
    }

    public function SignPDF(Request $request)
    {
    //   dd("1");
       $user=auth()->user();
        $invoicenumber   = $request->get('invoicenumbers');
        $invoices=explode(",",$invoicenumber);
        $count=count($invoices);
        // dd($invoices);
        $output      = base_path('/vendor/cossou/jasperphp/examples');
        $logopath    = base_path('/public/img');
        $barcodepath = base_path('/storage/app');
        $current     = Carbon\Carbon::now();
        $currenttime = $current->format('Y-m-d H:i:s');
        // $company=DB::table('companies')->first();
        $company=DB::table('companies')->where('cmpgstino',$user->user_plant)->first();
        $selectcompany="hmil";
        $plantname="HVF1";
        $shopcode="0";
        // dd($selectcompany);
        if($selectcompany == "hmil")
        {
            $companyAddress1  = "HYUNDAI MOTOR INDIA LIMITED";
            $companyAddress2  = "H1 SIPCOT INDUSTRIAL PARK,";
            $companyAddress3  = "IRRUNGATTUKOTTAI,";
            $companyAddress4  = "SRIPERUMBUDUR TK";
            $companyAddress5  = "TAMIL NADU - 602105";
            $companyGSTIN     = "33AAACH2364M1ZM";
            $companyStateCode = "33";
        }
        else
        {
            $companyAddress1  = "KIA MOTORS INDIA PRIVATE LIMITED";
            $companyAddress2  = "Erramanchi, Penukonda Mondal,";
            $companyAddress3  = "Ananthapur District,";
            $companyAddress4  = "";
            $companyAddress5  = "";
            $companyGSTIN     = "37AAGCK5972Q6ZG";
            $companyStateCode = "37";
        }
        $data = DB::table('salesheaders')
                ->leftJoin('salesdetails', 'salesdetails.invoiceno_id', '=', 'salesheaders.invoiceno')->select('salesheaders.*','salesdetails.*')->where('salesheaders.invoiceno','=', $invoices[0])->get();
        // dd($data);
                $datastr='';
        foreach($data as $data)
        {
             $datastr.=$data->shopcode.
             preg_replace('/\s+/', '', $data->ponumber).
             preg_replace('/[^a-zA-Z0-9\']/', '', $data->HMILPartNo)."\r\n".
             preg_replace('/\s+/', '', $data->invoiceno)."\t".
             preg_replace("/[^a-zA-Z0-9\ ]+/", "", $data->invoicedate).
             preg_replace('/\s+/', '', $data->productqty)."\t".
             preg_replace('/\s+/', '', (($data->AssessableValue)+($data->productsgstamount)+($data->productcgstamount)))."\t".                  // InvoiceTotal // change 08-01-2020
             preg_replace('/\s+/', '', str_pad($data->HASNorSACcode,10,"0")).
             "0.00"."\t".
             preg_replace('/\s+/', '', $data->sgstamount)."\t".                // SGSTamt     SGST_amt change here
             preg_replace('/\s+/', '', $data->igstamount)."\t".
             "0.00"."\t".
             preg_replace('/\s+/', '', $data->productsellingrate)."\t".
             preg_replace('/\s+/', '', $data->MaterialCost)."\t".
             preg_replace('/\s+/', '', $data->cgstamount)."\t".
             preg_replace('/\s+/', '', $data->ConsPartCost)."\t".
             preg_replace('/\s+/', '', $data->ConsPartCost)."\t".
             preg_replace('/\s+/', '', $data->AssessableValue)."\t".
             preg_replace('/\s+/', '', $data->ConsPartCost)."\t".
             preg_replace('/\s+/', '', $data->ToolCost)."\t".
             preg_replace('/\s+/', '', $data->ConsMatlCost)."\t".
             preg_replace('/\s+/', '', $data->plantGSTIN)."\r\n";
        }
       $datastr = trim($datastr);
        \Storage::disk('local')->put('Barcode.png',base64_decode(DNS2D::getBarcodePNG($datastr, "QRCODE")));
        // dd($datastr);

   $output = base_path('/vendor/cossou/jasperphp/examples');

        $AllCopies     = ['HMIL_O','HMIL_D','HMIL_T','HMIL_E'];
        $AllCopiesName = ['Original copy','Duplicate copy','Triplicate copy','Extra copy'];
        // dd($invoices);
        for($i=0; $i<count($invoices); $i++)
        {
           $invoiceto=DB::table('salesheaders')->where('invoiceno',$invoices)->pluck('invoiceto')->first();
          $customer=DB::table('customertables')->where('customercode',$invoiceto)->first();
         $data = DB::table('salesheaders')
                ->leftJoin('salesdetails', 'salesdetails.invoiceno_id', '=', 'salesheaders.invoiceno')->select('salesheaders.*','salesdetails.*')->where('salesheaders.invoiceno','=', $invoices[$i])->get();

          salesheader::where('invoiceno',$invoices[$i])->update(['signstatus'=>"Ready"]);

          JasperPHP::process(base_path('/vendor/cossou/jasperphp/examples/report5.jrxml'),false,
                               array('pdf'),
                               array('php_version'       => $invoicenumber,
                                     'selectcopy'        => "Original",
                                     'SUBREPORT_DIR'     => $output,
                                     'companyAddress1'   => $companyAddress1,
                                     'companyAddress2'   => $companyAddress2,
                                     'companyAddress3'   => $companyAddress3,
                                     'companyAddress4'   => $companyAddress4,
                                     'companyAddress5'   => $companyAddress5,
                                     'companyGSTIN'      => $companyGSTIN,
                                     'companyStateCode'  => $companyStateCode,
                                     'plant_name'        => $plantname,
                                     'shop_code'         => $shopcode
                                    ),
                               //array('resource' => $output ),
                               array(
                                        'driver'    => 'mysql',
                                        'username'  => 'root',
                                        'host'      => 'localhost',
                                        'database'  => 'nash_vim_hmil'
                                    )
                            )->execute();

        $pathToFile = base_path('/vendor/cossou/jasperphp/examples/report5.pdf');
        // $pdfContent = Storage::get("public/Signed/".$invoicenumber.".pdf");

        if($pathToFile)
        {
          Storage::put("public/UnSigned/".$invoices[$i].".pdf", file($pathToFile));
            // return response()->file($pathToFile);
        }

        else
        {
            return redirect()->back()->withErrors('File Not Found');
        }
          // $pdf = PDF::loadView('signor.signorblade',compact(['data','customer','company']))->setPaper('a4', 'portrait');


        }

        return redirect()->route('signor.index')
                             ->with('success_message', 'PDF Signed Succesfully!');




    }


    public function ReadyToSignPDF(Request $request)
    {
      // dd("2");
        // exec("C:\\xampp\htdocs\Nash_HMIL\public\DigitalSignature.bat");
       $user=auth()->user();
        $invoicenumber   = $request->get('invoices');
        $invoices=explode(",",$invoicenumber);
        $count=count($invoices);
        $output      = base_path('/vendor/cossou/jasperphp/examples');
        $logopath    = base_path('/public/img');
        $barcodepath = base_path('/storage/app');
        $current     = Carbon\Carbon::now();
        $currenttime = $current->format('Y-m-d H:i:s');
        // $company=DB::table('companies')->first();
        $company=DB::table('companies')->where('cmpgstino',$user->user_plant)->first();


        // dd($datastr);

   $output = base_path('/vendor/cossou/jasperphp/examples');

        $AllCopies     = ['HMIL_O','HMIL_D','HMIL_T','HMIL_E'];
        $AllCopiesName = ['Original copy','Duplicate copy','Triplicate copy','Extra copy'];
        for($i=0; $i<count($invoices); $i++)
        {
            $data = DB::table('salesheaders')
                ->leftJoin('salesdetails', 'salesdetails.invoiceno_id', '=', 'salesheaders.invoiceno')->select('salesheaders.*','salesdetails.*')->where('salesheaders.invoiceno','=', $invoices[$i])->get();
                $datastr='';
        foreach($data as $data)
        {
             $datastr.=$data->shopcode.
             preg_replace('/\s+/', '', $data->ponumber).
             preg_replace('/[^a-zA-Z0-9\']/', '', $data->HMILPartNo)."\r\n".
             preg_replace('/\s+/', '', $data->invoiceno)."\t".
             preg_replace("/[^a-zA-Z0-9\ ]+/", "", $data->invoicedate).
             preg_replace('/\s+/', '', $data->productqty)."\t".
             preg_replace('/\s+/', '', (($data->AssessableValue)+($data->productsgstamount)+($data->productcgstamount)))."\t".                  // InvoiceTotal // change 08-01-2020
             preg_replace('/\s+/', '', str_pad($data->HASNorSACcode,10,"0")).
             "0.00"."\t".
             preg_replace('/\s+/', '', $data->sgstamount)."\t".                // SGSTamt     SGST_amt change here
             preg_replace('/\s+/', '', $data->igstamount)."\t".
             "0.00"."\t".
             preg_replace('/\s+/', '', $data->productsellingrate)."\t".
             preg_replace('/\s+/', '', $data->MaterialCost)."\t".
             preg_replace('/\s+/', '', $data->cgstamount)."\t".
             preg_replace('/\s+/', '', $data->ConsPartCost)."\t".
             preg_replace('/\s+/', '', $data->ConsPartCost)."\t".
             preg_replace('/\s+/', '', $data->AssessableValue)."\t".
             preg_replace('/\s+/', '', $data->ConsPartCost)."\t".
             preg_replace('/\s+/', '', $data->ToolCost)."\t".
             preg_replace('/\s+/', '', $data->ConsMatlCost)."\t".
             preg_replace('/\s+/', '', $data->plantGSTIN)."\r\n";
        }
       $datastr = trim($datastr);
        \Storage::disk('local')->put('Barcode.png',base64_decode(DNS2D::getBarcodePNG($datastr, "QRCODE")));
          // salesheader::updateOrCreate(['invoiceno'=>$invoices[$i]],['signstatus'=>"Ready"]);
          // $invoiceto=DB::table('salesheaders')->where('invoiceno',$invoices)->pluck('invoiceto')->first();
          // $customer=DB::table('customertables')->where('customercode',$invoiceto)->first();
          // $data= DB::table('salesheaders')->where('plantGSTIN',$user->user_plant)->leftJoin('salesdetails', 'salesdetails.invoiceno_id', '=', 'salesheaders.invoiceno')->leftJoin('companies', 'companies.cmpcode', '=', 'salesheaders.companyid')->where('salesheaders.invoiceno','=', $invoices[$i])->get();

          salesheader::where('invoiceno',$invoices[$i])->update(['signstatus'=>"Ready"]);
          //            $invoiceto=DB::table('salesheaders')->where('invoiceno',$invoices)->pluck('invoiceto')->first();
          // $customer=DB::table('customertables')->where('customercode',$invoiceto)->first();
         $data = DB::table('salesheaders')
                ->leftJoin('salesdetails', 'salesdetails.invoiceno_id', '=', 'salesheaders.invoiceno')->select('salesheaders.*','salesdetails.*')->where('salesheaders.invoiceno','=', $invoices[$i])->get();

          salesheader::where('invoiceno',$invoices[$i])->update(['signstatus'=>"Ready"]);

       $datacount=count($data);
          $pdf = PDF::loadView('signor.signorblade',compact(['data','datacount']))->setPaper('a4', 'portrait');
          Storage::put("public/UnSigned/".$invoices[$i].".pdf", $pdf->output());

        }
       // Artisan::call('schedule:run');
       // shell_exec("C:\\xampp\htdocs\mazeworks_vim\public\JKfenner\get_sap_invoices\get_sap_invoices\\1010444793.pdf");

        // $sss=  ("C:\\xampp\\htdocs\\mazeworks_vim\\public\\img\\avatar04.png");

         //exec($sss);

         //$filepath = ("C:\\xampp\\htdocs\\mazeworks_vim\\public\\img\\avatar04.png");
       // exec(java -jar "C:\xampp\htdocs\mazeworks_vim\public\VIM\MazeWorks_Digital_Signer.jar");

         // dd("AAAA");


        return redirect()->route('signor.index')->with('success_message', 'PDF Added Succesfully!');

    }

public function preview($id)
    {
        $salesheader = salesheader::with('InvoicenoList')->findOrFail($id);

        return view('signor.show', compact('salesheader'));
    }
    public function previewunsigned($id)
    {
        $salesheader = salesheader::with('InvoicenoList')->findOrFail($id);

        return view('signor.unsignedshow', compact('salesheader'));
    }
}
