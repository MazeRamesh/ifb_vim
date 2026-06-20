<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\SalesheadersFormRequest;
use App\Models\Customertables;
use App\Models\Vchtypes;
use App\Models\DropDowns;
use App\Models\salesheader;
use App\Models\salesdetails;
use App\Models\poheader;
use App\Models\podetails;
use App\Models\Products;
use App\Models\emplayee;
use App\Models\company;
use App\Models\transport;
use App\Models\location;
use Exception;
use DB;
use Illuminate\Http\Request;
use Excel;
use Validator;
use NumberFormatter;
use Auth;
use Carbon\Carbon;
use App\Imports\SalesheaderImport;
use App\Exports\SalesheadeErrorImport;
use App\Models\MaterialDetail;
use Maatwebsite\Excel\HeadingRowImport;

class SalesheadersController extends Controller
{

    public static $invoice="";
    public $errorblock=0;

    /**
     * Display a listing of the salesheaders.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
      //  $salesheaders = salesheader::with('Customertables','Vchtypes')->paginate(15);
       // $salesheaders = salesheader::paginate(15);
        $salesheaders = salesheader::with('InvoicenoList')->get();
      //  $salesheaders = json_encode($salesheaders);
        return view('salesheaders.index', compact('salesheaders'));
    }

    /**
     * Show the form for creating a new salesheader.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $username = Auth::user()->name;
        // dd($username);
        $current = Carbon::now();
        $currentdate = $current->format('d-m-Y');
        // dd($currentdate);
        // $company = emplayee::where('empcode',$username)->select('company_id')->first();
         $company = company::findOrFail(1);
        // dd($company[0]);
        $customercodes   = Customertables::all();
        $DropDownValues  = DropDowns::where('fieldsname',config('constants.options_from_db')['Customer_Types'])->get();
        $vchtypecodes    = Vchtypes::all();
        $products        =  Products::all();
        $transport       =  transport::all();

        return view('salesheaders.create', compact('customercodes','vchtypecodes','products','DropDownValues','transport','company','currentdate'));
    }

    /**
     * Store a new salesheader in the storage.
     *
     * @param App\Http\Requests\SalesheadersFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(SalesheadersFormRequest $request)
    {


        try {

            // dd();

            $data = $request->getData();

            // dd($data);
            // dd($data);
           $salesheaderID = salesheader::create($data);

             foreach ($data['productcode_id'] as $key => $value) {
                // dd([$data['ponumber'][$key],$data['podate'][$key]]);
                salesdetails::create(['productcode_id'=>$salesheaderID->id,
                  'invoiceno_id'=>$data['invoiceno'],
                  'invoicedate'=>$data['invoicedate'],
                  'ponumber'=>$data['ponumber'][$key],
                  'podate'=>$data['podate'][$key],
                  'productcode_id'=>$value,
                  'productname'=>$data['productname'][$key],
                  'productpartno'=>$data['productpartno'][$key],
                  'productdescription'=>$data['productdescription'][$key],
                  'uom_id'=>$data['uom_id'][$key],
                  'productsellingrate'=>$data['productsellingrate'][$key],
                  'productigstrate'=>$data['productigstrate'][$key],
                  'productcgstrate'=>$data['productcgstrate'][$key],
                  'productsgstrate'=>$data['productsgstrate'][$key],
                  'productqty'=>$data['productqty'][$key],
                  'producthsncode'=>$data['producthsncode'][$key],
                  'netamount'=>$data['netamount'][$key],
                  'taxamount'=>$data['taxamount'][$key],
                  'taxableamount'=>$data['taxableamount'][$key],
            ]);

                 DB::table('poheaders')->where('pono',$data['ponumber'][$key])->update(['status'=>1]);
                 DB::table('podetails')->where('pono_id',$data['ponumber'][$key])->update(['status'=>1]);
            }

            return redirect()->route('salesheaders.salesheader.index')
                             ->with('success_message', 'Salesheader was successfully added.');

        } catch (Exception $exception) {

             // dd($exception);

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified salesheader.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $salesheader = salesheader::with('InvoicenoList')->findOrFail($id);

        return view('salesheaders.show', compact('salesheader'));
    }

    /**
     * Show the form for editing the specified salesheader.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $current = Carbon::now();
        $currentdate = $current->format('d-m-Y');
        $salesheader = salesheader::with('InvoicenoList')->findOrFail($id);
        // dd($salesheader);
        $DropDownValues  = DropDowns::where('fieldsname',config('constants.options_from_db')['Customer_Types'])->get();
        $customercodes = Customertables::all();
        $vchtypecodes  = Vchtypes::all();
        $products   =  Products::all();
        $transport       =  transport::all();
        $username = Auth::user()->name;
        // $company = emplayee::where('empcode',$username)->select('company_id')->first();
     //  dd($salesheader);
        $company = company::findOrFail(1);
        // dd($company);
        return view('salesheaders.edit', compact('salesheader','customercodes','vchtypecodes','products','DropDownValues','transport','company','currentdate'));
    }

    /**
     * Update the specified salesheader in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\SalesheadersFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, SalesheadersFormRequest $request)
    {
        try {

            $data = $request->getData();
            // dd($data);
            $salesheader = salesheader::findOrFail($id);
            $salesheader->update($data);
            $salesheader->InvoicenoList()->delete();
            foreach ($data['productcode_id'] as $key => $value) {
                // dd([$data['ponumber'][$key],$data['podate'][$key]]);
                salesdetails::create(['productcode_id'=>$salesheader->id,
                  'invoiceno_id'=>$data['invoiceno'],
                  'invoicedate'=>$data['invoicedate'],
                  'ponumber'=>$data['ponumber'][$key],
                  'podate'=>$data['podate'][$key],
                  'productcode_id'=>$value,
                  'productname'=>$data['productname'][$key],
                  'productpartno'=>$value, //$data['productpartno'][$key],
                  'productdescription'=>$data['productdescription'][$key],
                  'uom_id'=>$data['uom_id'][$key],
                  'productsellingrate'=>$data['productsellingrate'][$key],
                  'productigstrate'=>$data['productigstrate'][$key],
                  'productcgstrate'=>$data['productcgstrate'][$key],
                  'productsgstrate'=>$data['productsgstrate'][$key],
                  'productqty'=>$data['productqty'][$key],
                  'producthsncode'=>$data['producthsncode'][$key],
                  'netamount'=>$data['netamount'][$key],
                  'taxamount'=>$data['taxamount'][$key],
                  'taxableamount'=>$data['taxableamount'][$key],
            ]);
            }

            return redirect()->route('salesheaders.salesheader.index')
                             ->with('success_message', 'Salesheader was successfully updated.');

        } catch (Exception $exception) {
            // dd($exception);
            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Remove the specified salesheader from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
       // dd($id);
        try {
            // dd("!235");
             $salesheader = salesheader::with('InvoicenoList')->findOrFail($id);
            // foreach ($salesheader->InvoicenoList as $key => $salesdetails) {
            // $Update_POhead_Status   = DB::table('poheaders')->where('pono',$salesdetails->ponumber)->update(['status'=>0]);
            // $Update_POdetail_Status = DB::table('podetails')->where('pono_id',$salesdetails->ponumber)->update(['status'=>0]);
            // }
            // $Update_POhead_Status   = DB::table('poheaders')->where('pono',$salesheader->ponumber)->update(['status'=>0]);
            // $Update_POdetail_Status = DB::table('podetails')->where('pono_id',$salesheader->ponumber)->update(['status'=>0]);
            $invNo = $salesheader->invoiceno;
            $salesheader->delete();
            $salesheader = DB::table('salesdetails')->where('invoiceno_id',$invNo)->delete();
            return redirect()->route('salesheaders.salesheader.index')
                             ->with('success_message', 'Salesheader was successfully deleted.');

        } catch (Exception $exception) {
            // dd($exception);
            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }


    public function getcustomers($invoiceto)
    {
        $getcustomers =  Customertables::where('customertype',$invoiceto)->get();
        return response()->json($getcustomers);
    }

    public function getpono($cuscode)
    {
        $getpono =  poheader::where('customercode_id',$cuscode)->get();
        return response()->json($getpono);
    }

    public function podetails($pono)
    {
        $getpodetails =  poheader::with('podetail')->where('pono',$pono)->first();
        //dd($getpodetails);
        return response()->json($getpodetails);
    }

    public function exportDownload()
    {
        $data = salesheader::with('InvoicenoList')->get()->toArray();

         if ( !empty ( $data ) )
            {
		      return Excel::create('SalesInvoice', function($excel) use ($data) {
			     $excel->sheet('Sheet', function($sheet) use ($data)
	           {
				$sheet->fromArray($data);
	           });
              })->export('xls');
            }
         else
            {
             echo "No Data Found"; exit;
            }
    }

public function Import(Request $request)
{
    // dd("as");
    $salesheader=session()->get('sales_header')??[];
    // dd($salesheader);
        $current_page_count=0;
        $current_page_starting=1;
        $invoice_pagination=$chucking=DropDowns::where('fieldsname','INVOICE_PAGINATE')->first()->optionvalue??4;
        $total_invoices=count(session()->get('o_sales_header')??[]);
        if($total_invoices>0)
        {
            $page=$request->get('page');
            if($page!=null&&count($salesheader)>($page-1))
            {
                $current_page_count=count($salesheader[($page-1)]);
                $current_page_starting=$invoice_pagination*($page-1);
                $current_page_count+=$current_page_starting;
                $current_page_starting+=1;
                $salesheader=$salesheader[($page-1)]->map(function($row){return $row['details'][0];})->values();
            }
            else if(count($salesheader)>0)
            {
                $current_page_count=count($salesheader[0]);
                $salesheader=$salesheader[0]->map(function($row){return $row['details'][0];});
            }
        }
        $salesheader=collect($salesheader);
        $salesheader=$salesheader->map(function($row){
            // dd(salesheader::where('invoiceno',$row['invoiceno_id'])->count());
            $row['status']=salesheader::where('invoiceno',$row['invoiceno_id'])->count()>0?'old':'new';
            $row['status_html']=$row['status']=="old"?"<h5><span class='badge badge-lg badge-info text-large mt-1'>Already Imported</span></h5>":"<h5><span class='badge badge-success mt-1'>New</span></h5><div></div>";
            $row['material_code']=$row['productcode_id'];
            return $row;
        });

        $materials=MaterialDetail::orderBy('part_no')->get()->map(function($row){
            $row->part_no_plant_code=$row->part_no.'-'.$row->plant_code;
            return $row;
        });
        // dd($total_invoices,$current_page_count);
         return view('salesheaders.import',compact('salesheader','materials','total_invoices',
         'current_page_count','current_page_starting'
        ));
    }


      public function Downloadpdf()
    {

        // dd("qwerty");
         return view('salesheaders.import');
    }


    public function ExcelImport(Request $request)
    {


      $v = Validator::make($request->all(), [
        'import_file' => 'required|file|max:1024',
    ]);

    if ($v->fails())
    {
        return redirect()->back()->withErrors($v->errors());
    }

    //    else

    //     {
    //        Excel::import(new AssetImport,request()->file('import_file'));

    //            return redirect()->back()->with('success_message',"Imported Successfully");


    // }

           else

        {
           $headings = (new HeadingRowImport)->toArray(request()->file('import_file'))[0][0];
           $headings[]="Remarks";
            $old_import = new SalesheaderImport($headings);
            // dd($headings);
           $errors=[];
        $importFile = Excel::import($old_import,request()->file('import_file'));
        $errorflag=0;
        $errorrow=array();
        $failures=$old_import->failures();
        // dd($failures);
        foreach ($failures as $failure)
        {
         $errors[]=["row"=>$failure->row(),'message'=>implode(',',$failure->errors()),'values'=>$failure->values()];
           }
           if($failures->count()>0)
           {
             $errors=collect($errors)->groupBy('row')->toArray();

               foreach($errors as $error)
               {
                 $messages=[];
                 foreach($error as $cell)
                     $messages[]=$cell['message'];

                $msg=implode(',',$messages);
                 $errorrow[]=array_merge($error[0]['values'],['Remarks'=>$msg]);

            }
               $errorExport=array_merge([$headings],$errorrow);

               $export = new SalesheadeErrorImport($errorExport);

               return Excel::download($export, 'importError.xlsx');
             }

           else
           {
               return redirect()->back()->with('success_message',"Imported Successfully");
           }

    }

    //      $v = Validator::make($request->all(), [
    //     'import_file' => 'required|file|max:1024',
    // ]);

    // if ($v->fails())
    // {

    //     return redirect()->back()->withErrors($v->errors());
    // }
    //    else
    //     {

    //        $numberformat = new NumberFormatter("en", NumberFormatter::SPELLOUT);

    //        $result = Excel::load($request->file('import_file')->getRealPath(), function ($reader) use($request,$numberformat) {

    //             foreach ($reader->noHeading()->skipRows(1)->toArray() as $key => $row)
    //             {

    //                 if($row[0]== null)
    //                 {

    //                 $this->errorblock=1;
    //                 break;
    //                 }

    //                 else
    //                 {

    //                 $data1['invoiceno']            = $row[0];
    //                 $data1['invoicedate']          = $row[1];
    //                 $data1['customercode_id']      = $row[2];
    //                 $data1['invoiceto']            = $row[3];
    //                 $data1['plantcode']            = $row[4]??'';
    //                 $data1['shopcode']             = $row[5]??'';
    //                 $data1['pdsno']                = $row[6]??'';
    //                 $data1['pdsdate']              = $row[7]??'';
    //                 $data1['transport']            = $row[8]??'';
    //                 $data1['ponumber']             = $row[9]??'';
    //                 $data1['podate']               = $row[10]??'';
    //                 $data1['igstamount']           = sprintf("%.2f",$row[11])??'';
    //                 $data1['cgstamount']           = sprintf("%.2f",$row[12])??'';
    //                 $data1['sgstamount']           = sprintf("%.2f",$row[13])??'';
    //                 $data1['taxableamounts']       = sprintf("%.2f",$row[14])??'';
    //                 $data1['Freight_amt']          = sprintf("%.2f",$row[15])??'';
    //                 $data1['Packing_amt']          = sprintf("%.2f",$row[16])??'';
    //                 $data1['otheramount']          = sprintf("%.2f",$row[17])??'';
    //                 $data1['discountamount']       = sprintf("%.2f",$row[18])??'';
    //                 $data1['sales_total']          = sprintf("%.2f",$row[19]);

    //                 $data1['totaltaxamount']            = sprintf("%.2f",$row[20]);
    //                 $arrayoftots                        = explode('.',$data1['totaltaxamount'],2);
    //                 $currencyinrss                      = $numberformat->format($arrayoftots[0]);
    //                 $currencyinpss                      = $numberformat->format($arrayoftots[1]);
    //                 $currencys=$currencyinrss.' rupees';
    //                 if($currencyinpss!='zero')
    //                     $currencys.=' and '.$currencyinpss.' paisa only';
    //                 $data1['taxamountword']      = $currencys." only";


    //                 $data1['grandtotalamount']          = sprintf("%.2f",$row[21]);
    //                 $arrayoftot                         = explode('.',$data1['grandtotalamount'],2);
    //                 $currencyinrs                       = $numberformat->format($arrayoftot[0]);
    //                 $currencyinps                       = $numberformat->format($arrayoftot[1]);
    //                 $currency=$currencyinrs.' rupees';
    //                 if($currencyinps!='zero')
    //                     $currency.=' and '.$currencyinps.' paisa';
    //                 $data1['grandtotalamountword']      = $currency." only";



    //                 $data1['taxtypes']             = $row[22]??'';
    //                 $data1['narration']            = $row[23]??'';
    //                 $data1['ewaybillno']           = $row[24]??'';
    //                 $data1['ewaybilldate']         = $row[25]??'';

    //                 $currentDateTime = date('Y-m-d H:i:s');

    //                 $data1['created_at']           = $currentDateTime;
    //                 $data1['updated_at']           = $currentDateTime;
    //                 $data1['createdby']            = Auth::user()->name;

    //                  $data2['invoiceno_id']        = $row[0];
    //                  $data2['invoicedate']         = $row[1];
    //                  $data2['ponumber']            = $row[9]??'';
    //                  $data2['podate']              = $row[10]??'';
    //                  $data2['productcode_id']      = $row[26];
    //                  $data2['productname']         = $row[27];
    //                  $data2['productpartno']       = $row[28];
    //                  $data2['productdescription']  = $row[29]??'';
    //                  $data2['uom_id']              = $row[30];
    //                  $data2['productsellingrate']  = sprintf("%.2f",$row[31]);
    //                  $data2['productigstrate']     = $row[32]??'';
    //                  $data2['productcgstrate']     = $row[33]??'';
    //                  $data2['productsgstrate']     = $row[34]??'';
    //                  $data2['producthsncode']      = $row[35]??'';
    //                  $data2['taxamount']           = sprintf("%.2f",$row[36])??'';
    //                  $data2['netamount']           = sprintf("%.2f",$row[37]);
    //                  $data2['taxableamount']       = sprintf("%.2f",$row[38])??'';

    //                  $data2['created_at']          = $currentDateTime;
    //                  $data2['updated_at']          = $currentDateTime;

    //                 }


    //                 $check_invoiceno      = DB::table('salesheaders')->where('invoiceno', trim($row[0]))->first();
    //                 $check_customercode   = DB::table('customertables')->where('customercode', trim($row[2]))->first();


    //                 if(($check_invoiceno !=null) || ($check_customercode == null))
    //                 {

    //                     $resp = redirect('salesheaders')->withErrors($row[0]. " This Invoice Already Exist. OR".$row[2]." Customer Code Not Found");
    //                              \Session::driver()->save();
    //                              $resp->send();
    //                              exit();

    //                 }
    //                 else
    //                 {
    //                     DB::table('salesheaders')->insert($data1);
    //                     DB::table('salesdetails')->insert($data2);
    //                 }

    //             }
    //         })->get();

    //        if($this->errorblock == 0)
    //        {
    //       return redirect()->route('salesheaders.salesheader.index')->with('success', ['File Import successfully.']);
    //        }
    //        else
    //        {
    //           $resp = redirect('salesheaders')->withErrors("Please Check excel file");
    //                              \Session::driver()->save();
    //                              $resp->send();
    //                              exit();
    //        }
    //     }
    }

}
