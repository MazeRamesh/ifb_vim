<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Invoice;
use App\Models\location;
use DB;
use PDF;
use JasperPHP;
use PHPJasper\PHPJasper;
use PHPJasperXML;
use Response;
use Terbilang;
use DNS2D;
use PDFMerger;
use Carbon;
use App\Models\salesheader;
use Carbon\Carbon as CarbonCarbon;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Storage;
use File;
use ZipArchive;
use Illuminate\Filesystem\Filesystem;

class printController extends Controller
{

    public function index()
    {

    }


    public function create()

    {
        $user=auth()->user();
        // dd($user->user_plant);
        $sales=salesheader::where('plantGSTIN',$user->user_plant)->get();
         return view('print.create');
    }

     public function print_invoice()

    {

        // $areas = Area::with('plant')->get();

        // return Datatables::of($areas)
        // ->addColumn('actions', function ($row) {

        //     return '<div class="btn-group btn-group-sm" role="group">
        //             <a href="' . route('areas.area.show', [$row->id]) . '" class="btn btn-sm btn-outline-info" title="Show Area">
        //                 <i class="fas fa-fw fa-eye" aria-hidden="true"></i>
        //             </a>
        //             <a href="' . route('areas.area.edit', [$row->id]) . '" class="btn btn-sm btn-outline-warning" title="Edit Area">
        //                 <i class="fas fa-fw fa-edit" aria-hidden="true"></i>
        //             </a>
        //             <button type="submit" class="btn btn-sm btn-outline-danger btn-delete" title="Delete Area" data-remote="' . route('areas.area.destroy', [$row->id]) . '" >
        //                 <i class="fas fa-fw fa-trash-alt" aria-hidden="true"></i>
        //             </button>
        //         </div>';
        // })
        // ->rawColumns(['actions' => 'actions'])
        // ->make(true);
        //  $sales=salesheader::all();
          return view('print_invoice.print_invoice');
    }


     public function getIndexData()
    {
         $user=auth()->user();
         // dd($user->user_plant);
        $sales = salesheader::get();

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

                    <a href="' . route('prints.print.show', [$row->id]) . '" class="btn btn-sm btn-outline-success" title="Show Area">
                        <i class="fas fa-eye"></i>
                    </a>
                    <button type="submit" class="btn btn-sm btn-outline-danger btn-delete" title="Delete Area" data-remote="' . route('salesheaders.salesheader.destroy', [$row->id]) . '" >
                         <i class="fas fa-fw fa-trash" aria-hidden="true"></i>
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
        ->rawColumns(['actions' => 'actions','checkboxes'=>'checkb','ewaybillno'=>'ewaybillno','pdfstatus'=>'pdfstatus'])
        ->make(true);
    }


public function printbarcode(Request $request)
{
        //dd($request->all());
        $user=auth()->user();
        // File::delete(storage_path().'/All_Invoices.zip');
        $invoicenumber   = $request->get('invoicenumber1') ?: $request->get('invoicenumber');
        $invoices=explode(",",$invoicenumber);
        $count=count($invoices);
        if($count==1)
        {
            // dd("one");
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
             $pdf = PDF::loadView('print_invoice.singlepdf',compact(['data','a','datacount','customer_barcode','irn_barcode']))->setPaper('a4', 'landscape');
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
        $pdf = PDF::loadView('print_invoice.singlepdf',compact(['data','a','datacount','customer_barcode','irn_barcode']))->setPaper('a4', 'landscape');
        return $pdf->stream($invoices[0].'.pdf');
          // return view('print_invoice.singlepdf',compact('a','data','datacount','customer_barcode','irn_barcode'));
       }
        else
        {
            // dd($irn_barcode);
            $a = ['original','duplicate','triplicate','extra'];
            $pdf = PDF::loadView('print_invoice.singlepdf',compact(['data','a','datacount','customer_barcode','irn_barcode']))->setPaper('a4', 'landscape');
            return $pdf->stream($invoices[0].'.pdf');
        }
      }
    }
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $salesheader = salesheader::with('InvoicenoList')->findOrFail($id);

        return view('print_invoice.show', compact('salesheader'));
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }

       public function getinvoicenum(Request $request)
    {
         $user=auth()->user();
        $fromdate=$request->get('from');
        $todate=$request->get('to');
        // dd($fromdate);
        $fromdate = date('Y-m-d H:i:s', strtotime($fromdate));
        $todate = date('Y-m-d H:i:s', strtotime($todate));
         // dd($fromdate,$todate);
                   //$data = Invoice::all();


      $data = DB::table('salesheaders')->select('invoiceno')
                ->whereDate('created_at',">=", $fromdate)
                ->whereDate('created_at','<=',$todate)->orderBy('created_at','desc')->get();

           // dd($data);

         return response()->json($data);
    }

     public function checkinvoiceto(Request $request)
    {
        $invoiceno=$request->get('invoiceno');
        $data = salesheader::with('customer')->where('invoiceno',$invoiceno)->first();
        return response()->json($data);
    }


}
