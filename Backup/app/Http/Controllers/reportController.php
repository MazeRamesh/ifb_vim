<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customertables;
use App\Models\salesheader;
use App\Models\company;
use App\Models\salesdetails;
use App\Models\location;
use App\Models\Products;
use App\Models\Vchtypes;
use Datatables;
use Exception;
use DateTime;
use Excel;
use Gate;
use App\Exports\SalesExport;

class reportController extends Controller
{

  public function salesreportdownload(Request $request)
    {
      // dd("Qwe");
      $invoice_id=$request->get('data');
      $invoice_id = array_map('intval', explode(',', $invoice_id));
      // $invoice_id    = explode(',',$invoice_id);
      // $invoice_id=[15,16];
      // dd($invoice_id);
      return Excel::download(new SalesExport($invoice_id), 'Sales.xlsx');
    }

    public function customerwisereport()
    {
    $customerlist = Customertables::all();
    return view('Reports.customerwisereports',compact('customerlist'));
    }

    public function getcustomerwisereportdata()
    {
        $salesheaders = salesheader::with('InvoicenoList');
        //dd($salesheaders->toArray());
		return Datatables::of($salesheaders)->filter(function ($query){

                                  if(request()->has('fromdate') && request('fromdate')!="" && request('fromdate')!="all")
                                  {
                                      $fromdate = request("fromdate");
                                      $date = \DateTime::createFromFormat('d/m/Y', $fromdate);
                                      $fromdate = ($date->format('Y-m-d'));
                                      $query->whereDate('salesheaders.created_at','>=',$fromdate);
                                  }
                                  if(request()->has('todate') && request('todate')!="" && request('todate')!="")
                                  {
                                    $todate=request("todate");
                                    $date = \DateTime::createFromFormat('d/m/Y', $todate);
                                    $todate = ($date->format('Y-m-d'));
                                    $query->whereDate('salesheaders.created_at','<=',$todate);
                                  }
                                  if(request()->has('customercode') && request('customercode')!="" && request('customercode')!="all")
                                  {
                                    $customercode = request("customercode");
                                    $query->where('salesheaders.customercode_id',$customercode);
                                  }

                              }
                            )
        ->make(true);
    }

     public function locationwisereport()
    {
    $location = location::all();
    return view('Reports.locationwisereports',compact('location'));
    }

    public function getlocationwisereportdata()
    {
        $salesheaders = salesheader::with('InvoicenoList');
        //dd($salesheaders->toArray());
		return Datatables::of($salesheaders)->filter(function ($query){

                                  if(request()->has('fromdate') && request('fromdate')!="" && request('fromdate')!="all")
                                  {
                                      $fromdate = request("fromdate");
                                      $date = \DateTime::createFromFormat('d/m/Y', $fromdate);
                                      $fromdate = ($date->format('Y-m-d'));
                                      $query->whereDate('salesheaders.created_at','>=',$fromdate);
                                  }
                                  if(request()->has('todate') && request('todate')!="" && request('todate')!="")
                                  {
                                    $todate=request("todate");
                                    $date = \DateTime::createFromFormat('d/m/Y', $todate);
                                    $todate = ($date->format('Y-m-d'));
                                    $query->whereDate('salesheaders.created_at','<=',$todate);
                                  }
                                  if(request()->has('locationcode') && request('locationcode')!="" && request('locationcode')!="all")
                                  {
                                    $locationcode = request("locationcode");
                                    $query->where('salesheaders.createdlocation',$locationcode);
                                  }

                              }
                            )
        ->make(true);
    }

    public function productwisereports()
    {
    $Productslist = Products::all();
    return view('Reports.productwisereports',compact('Productslist'));
    }

    public function getproductwisereportsdata()
    {
        $salesheaders = salesheader::with('InvoicenoList');
        //dd($salesheaders->toArray());
		return Datatables::of($salesheaders)->filter(function ($query){

                                  if(request()->has('fromdate') && request('fromdate')!="" && request('fromdate')!="all")
                                  {
                                      $fromdate = request("fromdate");
                                      $date = \DateTime::createFromFormat('d/m/Y', $fromdate);
                                      $fromdate = ($date->format('Y-m-d'));
                                      $query->whereDate('salesheaders.created_at','>=',$fromdate);
                                  }
                                  if(request()->has('todate') && request('todate')!="" && request('todate')!="")
                                  {
                                    $todate=request("todate");
                                    $date = \DateTime::createFromFormat('d/m/Y', $todate);
                                    $todate = ($date->format('Y-m-d'));
                                    $query->whereDate('salesheaders.created_at','<=',$todate);
                                  }
                                  if(request()->has('productcode') && request('productcode')!="" && request('productcode')!="all")
                                  {

                                    $query->whereHas('invoicenolist',function($q){
                                         $productcode = request("productcode");
                                        $q->where('productcode_id',$productcode);
                                    });


                                  }

                              }
                            )
        ->make(true);
    }

     public function salespersonwisereports()
    {
    $plantlist = company::all();
    return view('Reports.salespersonwisereports',compact('plantlist'));
    }

    public function getsalespersonwisereportsdata()
    {
        $salesheaders = salesheader::with('InvoicenoList');
        //dd($salesheaders->toArray());
		return Datatables::of($salesheaders)->filter(function ($query){

                                  if(request()->has('fromdate') && request('fromdate')!="" && request('fromdate')!="all")
                                  {
                                      $fromdate = request("fromdate");
                                      $date = \DateTime::createFromFormat('d/m/Y', $fromdate);
                                      $fromdate = ($date->format('Y-m-d'));
                                      $query->whereDate('salesheaders.created_at','>=',$fromdate);
                                  }
                                  if(request()->has('todate') && request('todate')!="" && request('todate')!="")
                                  {
                                    $todate=request("todate");
                                    $date = \DateTime::createFromFormat('d/m/Y', $todate);
                                    $todate = ($date->format('Y-m-d'));
                                    $query->whereDate('salesheaders.created_at','<=',$todate);
                                  }
                                  if(request()->has('customercode') && request('customercode')!="" && request('customercode')!="all")
                                  {
                                    $customercode = request("customercode");
                                    $query->where('salesheaders.customercode_id',$customercode);
                                  }

                              }
                            )
        ->make(true);
    }

     public function salesreports()
    {
    // $customerlist = Customertables::all();
       $plantlist = company::all();
    return view('Reports.salesreports',compact('plantlist'));
    }

    public function salewisesreports()
    {
        $user=auth()->user();
         // dd("q1wqwqw");
        $sales = salesheader::orderBy('id','desc');

        return Datatables::of($sales)->filter(function ($row){
            $search_value=request()->get('search')['value'];
                  if(request()->has('fromdate') && request('fromdate')!="" && request('fromdate')!="all")
                   {
                      $fromdate = request("fromdate");
                      $date = \DateTime::createFromFormat('d/m/Y', $fromdate);
                      $fromdate = ($date->format('Y-m-d'));
                      $row->whereDate('salesheaders.created_at','>=',$fromdate);
                    }
                  if(request()->has('todate') && request('todate')!="" && request('todate')!="")
                   {
                        $todate=request("todate");
                        $date = \DateTime::createFromFormat('d/m/Y', $todate);
                        $todate = ($date->format('Y-m-d'));
                        $row->whereDate('salesheaders.created_at','<=',$todate);
                    }
                  if(request()->has('signstatus') && request('signstatus')!="" && request('signstatus')!="")
                   {
                        $signstatus=request("signstatus");
                        if($signstatus=="signed"){
                        $row->where('salesheaders.pdfstatus',$signstatus);
                        }
                        else if($signstatus=="all")
                        {
                        $row;
                        }
                        else{
                        $row->where('salesheaders.pdfstatus',null);
                        }
                    }
                    if($search_value!="")
                    {
                        $row->where('invoiceno','like','%'.$search_value.'%');
                    }
                })
        ->addColumn('checkb', function ($row) {

            return '<div class="checkbox">
                               <input type="checkbox" id="check" name="check" value="" />
                               <label for="check">
                               <span></span>
                               </label>

                                            </div>';
        })
        ->addColumn('actions', function ($row) {
            if(Gate::allows('admin')){


            return '<div class="btn-group btn-group-sm" role="group">

                    <a href="' . route('prints.print.show', [$row->id]) . '" class="btn btn-sm btn-outline-success" title="Show Invoice">
                        <i class="fas fa-eye"></i>
                    </a>
                    <button type="submit" class="btn btn-sm btn-outline-danger btn-delete" title="Delete Invoice" data-remote="' . route('salesheaders.salesheader.destroy', [$row->id]) . '" >
                         <i class="fas fa-fw fa-trash" aria-hidden="true"></i>
                     </button>

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
                return "<span style='color:green;'>$row->pdfstatus</span>";

        })
        ->rawColumns(['actions' => 'actions','checkboxes'=>'checkb','ewaybillno'=>'ewaybillno','pdfstatus'=>'pdfstatus'])
        ->make(true);
    }

     public function salestypewisereports()
    {
    $Vchtypeslist = Vchtypes::all();
    return view('Reports.salestypewisereports',compact('Vchtypeslist'));
    }

    public function getsalestypewisereportsdata()
    {
        $salesheaders = salesheader::with('InvoicenoList');
        //dd($salesheaders->toArray());
		return Datatables::of($salesheaders)->filter(function ($query){

                                  if(request()->has('fromdate') && request('fromdate')!="" && request('fromdate')!="all")
                                  {
                                      $fromdate = request("fromdate");
                                      $date = \DateTime::createFromFormat('d/m/Y', $fromdate);
                                      $fromdate = ($date->format('Y-m-d'));
                                      $query->whereDate('salesheaders.created_at','>=',$fromdate);
                                  }
                                  if(request()->has('todate') && request('todate')!="" && request('todate')!="")
                                  {
                                    $todate=request("todate");
                                    $date = \DateTime::createFromFormat('d/m/Y', $todate);
                                    $todate = ($date->format('Y-m-d'));
                                    $query->whereDate('salesheaders.created_at','<=',$todate);
                                  }
                                  if(request()->has('vchtypecode') && request('vchtypecode')!="" && request('vchtypecode')!="all")
                                  {
                                    $vchtypecode = request("vchtypecode");
                                    $query->where('salesheaders.vchtypecode_id',$vchtypecode);
                                  }

                              }
                            )
        ->make(true);
    }
}
