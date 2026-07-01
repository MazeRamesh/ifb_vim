<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\salesheader;
use Carbon;
use DB;
use DNS2D;
use PDF;
use Illuminate\Support\Facades\Storage;
use Response;

class DigitalsignController extends Controller
{
    
public function index()
{
    return view('digitalsign.index');
}

public function digitalsignor(Request $request)
{
   $user=auth()->user();
    $sales = salesheader::where('pdfstatus','=',null)->where('signstatus','=',null)->orderBy('id','desc');
    if($request->has('fromdate')&&$request->fromdate!=''&&$request->has('todate')&&$request->todate!='')
    {
        $fromdate=Carbon\Carbon::createFromFormat('d-m-Y',$request->fromdate)->startOfDay()->format('Y-m-d');
        $todate=Carbon\Carbon::createFromFormat('d-m-Y',$request->todate)->endOfDay()->format('Y-m-d');
        $sales->whereDate('created_at','>=',$fromdate)->whereDate('created_at','<=',$todate);
    }
    return Datatables::of($sales)
    ->addColumn('checkb', function ($row) 
    {
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

public function DigitalSignPDF(Request $request)
{
    $user=auth()->user();
    $invoicenumber_ids   = $request->get('invoicenumber_ids');
    // dd($invoicenumber_ids);
    $invoices=explode(",",$invoicenumber_ids);
    // dd($invoices);
    $count=count($invoices);
    $company=DB::table('companies')->where('cmpgstino',$user->user_plant)->first();
    $selectcompany="hmil";
    $plantname="HVF1";
    $shopcode="0";
    $companyAddress1  = "HYUNDAI MOTOR INDIA LIMITED";
    $companyAddress2  = "H1 SIPCOT INDUSTRIAL PARK,";
    $companyAddress3  = "IRRUNGATTUKOTTAI,";
    $companyAddress4  = "SRIPERUMBUDUR TK";
    $companyAddress5  = "TAMIL NADU - 602105";
    $companyGSTIN     = "33AAACH2364M1ZM";
    $companyStateCode = "33";
    
    foreach($invoices as $key => $id)
    {
        $customer_barcode=[];
        $irn_barcode=[];
        $data = DB::table('salesheaders')->leftJoin('salesdetails', 'salesdetails.invoiceno_id', '=', 'salesheaders.invoiceno')->select('salesheaders.*','salesdetails.*','salesheaders.podateinword')->where('salesheaders.id','=', $id)->get();
        // dd($data);
        $datastr='';
        $invdate=$data[0]->invoicedate;
        $datastr.=$data[0]->shopcode.
        preg_replace('/\s+/', '', $data[0]->ponumber).
        preg_replace('/\s+/', '', $data[0]->customerPartno)."\r\n".
        preg_replace('/\s+/', '', $data[0]->invoiceno)."\t".
        preg_replace('/\./', '', $invdate).
        preg_replace('/\s+/', '', $data[0]->tot_qty)."\t".
        preg_replace('/\s+/', '', $data[0]->grandtotalamount)."\t".
        preg_replace('/\s+/', '', $data[0]->producthsncode).'0.00'."\t".
        preg_replace('/\s+/', '', $data[0]->sgstamount)."\t".preg_replace('/\s+/', '', $data[0]->igstamount)."\t".preg_replace('/\s+/', '', $data[0]->tcs_amount)."\t".
        preg_replace('/\s+/', '', $data[0]->productsellingrate)."\t".
        preg_replace('/\s+/', '', $data[0]->taxableamounts)."\t".
        preg_replace('/\s+/', '', $data[0]->cgstamount)."\t".'0.00'."\t".'0.00'."\t".
        preg_replace('/\s+/', '', $data[0]->taxableamounts)."\t".'0.00'."\t".
        "0.00"."\t".'0.00'."\t".preg_replace('/\s+/', '', $data[0]->companyGSTIN)."\t".' '."\t".
             preg_replace('/\s+/', '', $data[0]->irn_reference_no)."\t";
        $datastr = trim($datastr);
        // dd($datastr);
        //$customer_barcode[] = 'data:image/svg+xml;base64,' . base64_encode(DNS2D::getBarcodeSVG($datastr, "QRCODE", 2, 2));
        //$irn_barcode[] = 'data:image/svg+xml;base64,' . base64_encode(DNS2D::getBarcodeSVG($data[0]->irn_reference_no."\r\n", "QRCODE", 2, 2));
         $customer_barcode = 'data:image/svg+xml;base64,' . base64_encode(DNS2D::getBarcodeSVG($datastr, "QRCODE", 2, 2));
        $irn_barcode = 'data:image/svg+xml;base64,' . base64_encode(DNS2D::getBarcodeSVG($data[0]->irn_reference_no."\r\n", "QRCODE", 2, 2));
        $datacount=count($data);
        // $Barcodecount=count($customer_barcode);
        $a = ['original'];

        salesheader::where('id',$id)->update(['signstatus'=>"Ready"]); 
       // $pdf = PDF::loadView('print_invoice.singlepdf',compact(['data','a','datacount','customer_barcode','irn_barcode']))->setPaper('a4', 'landscape');
        $pdf = PDF::loadView('digitalsign.printpdf',compact(['data','a','datacount','customer_barcode','irn_barcode']))->setPaper('a4', 'landscape');
        // return $pdf->stream($invoices[$i].' - HMIL MRIR.pdf');
        Storage::put("public/UnSigned/".$data[0]->invoiceno.".pdf", $pdf->output());
    }
    return redirect()->route('digitalsign.index')->with('success_message', 'PDF Added Succesfully!');  
}

public function digitalsigned(Request $request)
{
    $user=auth()->user();
    $sales = salesheader::where('pdfstatus','=',"Signed")->where('signstatus','=',"Ready");
    if($request->has('fromdate')&&$request->fromdate!=''&&$request->has('todate')&&$request->todate!='')
    {
        $fromdate=Carbon\Carbon::createFromFormat('m/d/Y',$request->fromdate)->startOfDay()->format('Y-m-d');
        $todate=Carbon\Carbon::createFromFormat('m/d/Y',$request->todate)->endOfDay()->format('Y-m-d');
        $sales->whereDate('created_at','>=',$fromdate)->whereDate('created_at','<=',$todate);
        }
		$sales->orderBy('id','desc');
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

                    <a href="' . route('digital.print.signedpdf', [$row->id]) . '" class="btn btn-sm btn-outline-danger" title="Show Invoice">
                        <i class="fas fa-file-pdf"></i>
                    </a>

                    <button type="button" class="btn btn-sm btn-outline-danger btn-delete-row" data-id="' . $row->id . '" title="Delete Invoice" style="margin-left: 5px;">
                        <i class="fas fa-trash-alt"></i>
                    </button>

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

public function signedpdf($id)
{
    $invoiceno=salesheader::where('id',$id)->first()->invoiceno;
    //dd(storage_path('app\\public\\Signed\\').$invoiceno.'.pdf');
    $file = storage_path('app\\public\\Signed\\').$invoiceno.'.pdf';
    $headers = array('Content-Type: application/pdf',);
    return Response::download($file, $invoiceno.".pdf",$headers);
}


















public function printbarcode(Request $request)
{
    dd("as");
    $user=auth()->user();
    // File::delete(storage_path().'/All_Invoices.zip');
    $invoicenumber   = $request->get('invoicenumber1');
    $invoices=explode(",",$invoicenumber);
    $count=count($invoices);
    if($count==1)
    {
    if($request->get('all')==null && $request->get('original')==null && $request->get('duplicate')==null && $request->get('triplicate')==null && $request->get('extra')==null)
    {

        $all             = $request->get('all');
        $a=array();
        $request->get('original')!=null?$a[]='original':0;
        $request->get('duplicate')!=null?$a[]='duplicate':0;
        $request->get('triplicate')!=null?$a[]='triplicate':0;
        $request->get('extra')!=null?$a[]='extra':0;
        $selectcopy="Original";

        $output      = base_path('/vendor/cossou/jasperphp/examples');
        $logopath    = base_path('/public/img');
        $barcodepath = base_path('/storage/app');
        $current     = Carbon\Carbon::now();
        $currenttime = $current->format('Y-m-d H:i:s');
        $company=DB::table('companies')->where('cmpgstino',$user->user_plant)->first();
        $invoiceto=DB::table('salesheaders')->where('invoiceno',$invoices[0])->first();
        $invoiceto=$invoiceto->invoiceto;
        // $customer=DB::table('customertables')->where('customercode',$invoiceto)->first();
        $data = DB::table('salesheaders')
                ->leftJoin('salesdetails', 'salesdetails.invoiceno_id', '=', 'salesheaders.invoiceno')
                ->select('salesheaders.*','salesdetails.*','salesheaders.podateinword')->where('salesheaders.invoiceno','=', $invoices[0])->get();
        $datastr='';
        $invdate=$data[0]->invoicedate;
        $datastr.=$data[0]->shopcode.
        preg_replace('/\s+/', '', $data[0]->ponumber).
        preg_replace('/\s+/', '', $data[0]->customerPartno)."\r\n".
        preg_replace('/\s+/', '', $data[0]->invoiceno)."\t".
        preg_replace('/\./', '', $invdate).
        preg_replace('/\s+/', '', $data[0]->tot_qty)."\t".
        preg_replace('/\s+/', '', $data[0]->grandtotalamount)."\t".
        preg_replace('/\s+/', '', $data[0]->producthsncode).'0.00'."\t".
        preg_replace('/\s+/', '', $data[0]->sgstamount)."\t".preg_replace('/\s+/', '', $data[0]->igstamount)."\t".preg_replace('/\s+/', '', $data[0]->tcs_amount)."\t".
        preg_replace('/\s+/', '', $data[0]->productsellingrate)."\t".
        preg_replace('/\s+/', '', $data[0]->taxableamounts)."\t".
        preg_replace('/\s+/', '', $data[0]->cgstamount)."\t".'0.00'."\t".'0.00'."\t".
        preg_replace('/\s+/', '', $data[0]->taxableamounts)."\t".'0.00'."\t".
        "0.00"."\t".'0.00'."\t".preg_replace('/\s+/', '', $data[0]->companyGSTIN)."\t".' '."\t".
             preg_replace('/\s+/', '', $data[0]->irn_reference_no)."\t";
        // dd($datastr);
       $datastr = trim($datastr);
        $customer_barcode = 'data:image/svg+xml;base64,' . base64_encode(DNS2D::getBarcodeSVG($datastr, "QRCODE", 2, 2));
        $irn_barcode = 'data:image/svg+xml;base64,' . base64_encode(DNS2D::getBarcodeSVG($data[0]->irn_reference_no."\r\n", "QRCODE", 2, 2));
        // dd($datastr);
        $datacount=count($data);
        $a = ['original','duplicate'];
         $pdf = PDF::loadView('print_invoice.singlepdf',compact(['data','a','datacount','customer_barcode','irn_barcode']))->setPaper('a4', 'portrait');
      return $pdf->stream($invoices[0].' - HMIL MRIR.pdf');
      }
      else
      {
        $all             = $request->get('all');
        $a=array();
        $request->get('original')!=null?$a[]='original':0;
        $request->get('duplicate')!=null?$a[]='duplicate':0;
        $request->get('triplicate')!=null?$a[]='triplicate':0;
        $request->get('extra')!=null?$a[]='extra':0;
        $current     = Carbon\Carbon::now();
        $currenttime = $current->format('Y-m-d H:i:s');
        $company=DB::table('companies')->where('cmpgstino',$user->user_plant)->first();
        $invoiceto=DB::table('salesheaders')->where('invoiceno',$invoices[0])->first();
        $invoiceto=$invoiceto->invoiceto;
        // dd("one");
        // $customer=DB::table('customertables')->where('customercode',$invoiceto)->first();
        $data = DB::table('salesheaders')
                ->leftJoin('salesdetails', 'salesdetails.invoiceno_id', '=', 'salesheaders.invoiceno')
                ->select('salesheaders.*','salesdetails.*','salesheaders.podateinword')
                ->where('salesheaders.invoiceno','=', $invoices[0])->get();
                $datastr='';
        // foreach($data as $datas)
        // {
            $invdate=$data[0]->invoicedate;
             $datastr.=$data[0]->shopcode.''.
             preg_replace('/\s+/', '', $data[0]->ponumber).
             preg_replace('/\s+/', '', $data[0]->customerPartno)."\r\n".
             preg_replace('/\s+/', '', $data[0]->invoiceno)."\t".
             preg_replace('/\./', '', $invdate).
             preg_replace('/\s+/', '', $data[0]->tot_qty)."\t".
             preg_replace('/\s+/', '', $data[0]->grandtotalamount)."\t".
             preg_replace('/\s+/', '', $data[0]->producthsncode).'0.00'."\t".
             preg_replace('/\s+/', '', $data[0]->sgstamount)."\t".preg_replace('/\s+/', '', $data[0]->igstamount)."\t".preg_replace('/\s+/', '', $data[0]->tcs_amount)."\t".
             preg_replace('/\s+/', '', $data[0]->productsellingrate)."\t".
             preg_replace('/\s+/', '', $data[0]->taxableamounts)."\t".
             preg_replace('/\s+/', '', $data[0]->cgstamount)."\t".'0.00'."\t".'0.00'."\t".
             preg_replace('/\s+/', '', $data[0]->taxableamounts)."\t".'0.00'."\t".
             "0.00"."\t".'0.00'."\t".preg_replace('/\s+/', '', $data[0]->companyGSTIN)."\t".' '."\t".
             preg_replace('/\s+/', '', $data[0]->irn_reference_no)."\t";
            // dd($datastr);
       $datastr = trim($datastr);
        $customer_barcode = 'data:image/svg+xml;base64,' . base64_encode(DNS2D::getBarcodeSVG($datastr, "QRCODE", 2, 2));
        $irn_barcode = 'data:image/svg+xml;base64,' . base64_encode(DNS2D::getBarcodeSVG($data[0]->irn_reference_no."\r\n", "QRCODE", 2, 2));
       $datacount=count($data);
      if($all == "All")
       {
        // dd($all);
        $a = ['original','duplicate','triplicate','extra'];
        $pdf = PDF::loadView('print_invoice.singlepdf',compact(['data','a','datacount','customer_barcode','irn_barcode']))->setPaper('a4', 'portrait');
        return $pdf->stream($invoices[0].' - HMIL MRIR.pdf');
          // return view('print_invoice.singlepdf',compact('a','data','datacount','customer_barcode','irn_barcode'));
       }
        else
        {
            $pdf = PDF::loadView('print_invoice.singlepdf',compact(['data','a','datacount','customer_barcode','irn_barcode']))->setPaper('a4', 'portrait');
            return $pdf->stream($invoices[0].' - HMIL MRIR.pdf');
        }
      }
    }
}

    public function deleteSigned(Request $request)
    {
        $ids = $request->get('ids');
        if (empty($ids)) {
            return response()->json(['success' => false, 'message' => 'No records selected.']);
        }

        try {
            $salesheaders = salesheader::whereIn('id', $ids)->get();
            foreach ($salesheaders as $salesheader) {
                $invoiceno = $salesheader->invoiceno;

                // Check file path: C:\xampp8_2_12\htdocs\ifb_vim\storage\app\public\Signed\<invoiceno>.pdf
                $filePath = "C:\\xampp8_2_12\\htdocs\\ifb_vim\\storage\\app\\public\\Signed\\" . $invoiceno . ".pdf";
                if (file_exists($filePath)) {
                    @unlink($filePath);
                }

                // Delete DB records
                $salesheader->delete();
                DB::table('salesdetails')->where('invoiceno_id', $invoiceno)->delete();
            }

            return response()->json(['success' => true, 'message' => 'Selected invoices deleted successfully from database and local storage.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
        }
    }
}
