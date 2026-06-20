<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductmapsFormRequest;
use App\Models\Customertables;
use App\Models\Products;
use App\Models\Productmap;
use Illuminate\Http\Request;
use App\Http\Requests;
use Exception;

class ProductmapsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
	public function __construct()
	{
	    $this->middleware('auth');
	}
	
    /**
     * Display a listing of the productmaps.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $productmaps = Productmap::with('productmap','customermap')->paginate(15);

        return view('productmaps.index', compact('productmaps'));
    }

    /**
     * Show the form for creating a new productmap.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $products = Products::pluck('productcode','id')->all();
$customers = Customertables::pluck('id','id')->all();
        
        return view('productmaps.create', compact('products','customers'));
    }

    /**
     * Store a new productmap in the storage.
     *
     * @param App\Http\Requests\ProductmapsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(ProductmapsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            Productmap::create($data);

            return redirect()->route('productmaps.productmap.index')
                             ->with('success_message', 'Productmap was successfully added.');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified productmap.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $productmap = Productmap::with('productmap','customermap')->findOrFail($id);

        return view('productmaps.show', compact('productmap'));
    }

    /**
     * Show the form for editing the specified productmap.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $productmap = Productmap::findOrFail($id);
        $products = Products::pluck('productcode','id')->all();
        $customers = Customertables::pluck('id','id')->all();

        return view('productmaps.edit', compact('productmap','products','customers'));
    }

    /**
     * Update the specified productmap in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\ProductmapsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, ProductmapsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $productmap = Productmap::findOrFail($id);
            $productmap->update($data);

            return redirect()->route('productmaps.productmap.index')
                             ->with('success_message', 'Productmap was successfully updated.');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified productmap from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $productmap = Productmap::findOrFail($id);
            $productmap->delete();
             return response()->json(['status'=>true,'message'=>'Deleted Successfully']);
            // return redirect()->route('productmaps.productmap.index')
            //                  ->with('success_message', 'Productmap was successfully deleted.');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

   public function getMappedProducts(Request $request){
        $customerid=$request->get('customer_id');
        $customer_id=Customertables::where(function($q) use($customerid){
            $q->orWhere('id',$customerid);
            $q->orWhere('customercode',$customerid);
        })->select('id')->first()->id;
        //return response()->json($customer_id);
        if($customer_id!=null && $customer_id!="")
        {
            $mapped_products=Productmap::with('productmap','customermap')->where(function($q)use($customer_id){
                $q->orWhere('customer_id',$customer_id);
                //$q->orWhere('customercode',$customer_id);
            })->get();
            
            return response()->json($mapped_products);
        }
    }


}
