<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PoheadersFormRequest;
use App\Models\Customertables;
use App\Models\Vchtypes;
use App\Models\poheader;
use App\Models\podetails;
use App\Models\Products;
use Exception;
use NumberFormatter;
use DB;
use Redirect;
use App\Models\salesdetails;

class PoheadersController extends Controller
{

    /**
     * Display a listing of the poheaders.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $poheaders = poheader::with('customercode','vchtypecode')->paginate(15);

        return view('poheaders.index', compact('poheaders'));
    }

    /**
     * Show the form for creating a new poheader.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $customercodes = Customertables::all();
        $vchtypecodes    = Vchtypes::all(); 
        $products        =  Products::all();
        
       // dd($products);
        
        return view('poheaders.create', compact('customercodes','vchtypecodes','products'));
    }

    /**
     * Store a new poheader in the storage.
     *
     * @param App\Http\Requests\PoheadersFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(PoheadersFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
           // dd($data);
            
            $poheaderID = poheader::create($data);
            
            foreach ($data['productcode_id'] as $key => $value) {
                
                podetails::create(['productcode_id'=>$poheaderID->id,
                                      
                  'pono_id'=>$data['pono'],
                  'podate'=>$data['podate'],
                  'productcode_id'=>$data['productcode_id'][$key],//$value,
                  'productname'=>$data['productname'][$key],
                  'partno'=>$data['productcode_id'][$key],//$data['productpartno'][$key],
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

            return redirect()->route('poheaders.poheader.index')
                             ->with('success_message', 'Poheader was successfully added.');

        } catch (Exception $exception) {
            
            dd($exception);

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified poheader.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $poheader = poheader::with('podetail')->findOrFail($id);
        
       // dd($poheader);

        return view('poheaders.show', compact('poheader'));
    }

    /**
     * Show the form for editing the specified poheader.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $checkEditOption = DB::table('poheaders')->select('status')->where('id',$id)->first();
        
       // dd($checkEditOption->status);
        
        if($checkEditOption->status == 0)
        {
                    
        $poheader        = poheader::with('podetail')->findOrFail($id);
        $customercodes   = Customertables::all();
        $vchtypecodes    = Vchtypes::all();
        $products        =  Products::all();
        
       // dd($poheader);
            
        return view('poheaders.edit', compact('poheader','customercodes','vchtypecodes','products'));
        }
        
        else
        {
             return Redirect::back()->withErrors('This PO Number already Invoice raised.');
            // return redirect()->route('poheaders.poheader.index')->withErrors(['unexpected_error' => 'This PO Number already Invoice raised.']);
        }
    }

    /**
     * Update the specified poheader in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\PoheadersFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, PoheadersFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $poheader = poheader::findOrFail($id);
            $poheader->update($data);
            
             $podetails   = $poheader->pono;
             $podetailss  = DB::table('podetails')->where('pono_id',$podetails)->delete();
            
            if($podetailss)
            {
             foreach ($data['productcode_id'] as $key => $value) {
                
                podetails::create(['productcode_id'=>$poheader->id,
                                      
                  'pono_id'=>$data['pono'],
                  'podate'=>$data['podate'],
                  'productcode_id'=>$data['productcode_id'][$key],//$value,
                  'productname'=>$data['productname'][$key],
                  'partno'=>$data['productcode_id'][$key],//$data['productpartno'][$key],
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
            }

            return redirect()->route('poheaders.poheader.index')
                             ->with('success_message', 'Poheader was successfully updated.');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified poheader from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            
       
            $poheader  = poheader::with('podetail')->findOrFail($id);
              
            $podeatils = podetails::where('pono_id',$poheader->pono)->get();
            $salesdetailcount=salesdetails::where('ponumber',$poheader->pono)->count();
            // dd($salesdetailcount);
            if($salesdetailcount == 0)
            {
           
            $poheader->delete();
            podetails::where('pono_id',$poheader->pono)->delete();
            return redirect()->route('poheaders.poheader.index')
                             ->with('success_message', 'Purchase Order was successfully deleted.');
          
            }
            
            else
            {
            
                  return back()->withInput()
                         ->withErrors(['This PO Number already Invoice raised.']);
            }
            // if($poheader->status == 0)
            // {
           
            // $poheader->delete();
            // podetails::where('pono_id',$poheader->pono)->delete();
            // return redirect()->route('poheaders.poheader.index')
            //                  ->with('success_message', 'Purchase Order was successfully deleted.');
          
            // }
            
            // else
            // {
            
            //       return back()->withInput()
            //              ->withErrors(['This PO Number already Invoice raised.']);
            // }

        } catch (Exception $exception) {
          dd($exception);
            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }



}
