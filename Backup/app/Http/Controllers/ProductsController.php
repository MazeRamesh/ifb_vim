<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProductsFormRequest;
use App\Models\Products;
use App\Models\DropDowns;
use App\Models\Uom;
use App\Models\Customertables;
use Exception;
use Excel;
use Validator;
use DB;
use App\Imports\ProductImport;
use App\Exports\ProductErrorExport;
use Maatwebsite\Excel\HeadingRowImport;

class ProductsController extends Controller
{

    /**
     * Display a listing of the products.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $productsObjects = Products::paginate(15);

        return view('products.index', compact('productsObjects'));
    }

    /**
     * Show the form for creating a new products.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {

        $DropDownValues  = DropDowns::where('fieldsname',config('constants.options_from_db')['UOM'])->get();

        return view('products.create', compact('DropDownValues'));
    }

    /**
     * Store a new products in the storage.
     *
     * @param App\Http\Requests\ProductsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(ProductsFormRequest $request)
    {
        try {

            $data = $request->getData();

            Products::create($data);

            return redirect()->route('products.products.index')
                             ->with('success_message', 'Products was successfully added.');

        } catch (Exception $exception) {

            // dd($exception);

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified products.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $products = Products::findOrFail($id);

        return view('products.show', compact('products'));
    }

    /**
     * Show the form for editing the specified products.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $products = Products::findOrFail($id);

        $DropDownValues  = DropDowns::where('fieldsname',config('constants.options_from_db')['UOM'])->get();

        return view('products.edit', compact('products','DropDownValues'));
    }

    /**
     * Update the specified products in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\ProductsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, ProductsFormRequest $request)
    {
        try {

            $data = $request->getData();

            $products = Products::findOrFail($id);
            $products->update($data);

            return redirect()->route('products.products.index')
                             ->with('success_message', 'Products was successfully updated.');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Remove the specified products from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $products = Products::findOrFail($id);
            $products->delete();

            return redirect()->route('products.products.index')
                             ->with('success_message', 'Products was successfully deleted.');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    public function getproductlist($productcode,Request $request)
    {
        $getProducts=null;
        if($request->get('customer_id')!=null && $request->get('customer_id')!="")
        {
            $customer=Customertables::where(function($q)use($request){
                $q->orWhere('customercode',$request->get('customer_id'));
                $q->orWhere('id',$request->get('customer_id'));
            })->first();
            if($customer!=null)
            {
                $getProducts=$customer->mapped_products->where('productpartno',$productcode);
                if($getProducts->count()==1)
                    return response()->json($getProducts->first());
            }
        }
        // dd($getProducts->toSql());
        $getProducts = Products::where('productpartno',$productcode);
        return response()->json($getProducts->first());


    }

    public function get_product(Request $request)
    {
        $getProductsname = Products::select('id','productpartno','productname');
        if($request->get('q')!=null && $request->get('q')!='')
        {
            $getProductsname->select('*')->where(function($q)use($request){
                $q->orWhere('productpartno','like','%'.$request->get('q').'%')->orWhere('productname','like','%'.$request->get('q').'%')->orWhere('productcode','like','%'.$request->get('q').'%');
            });
            if($request->get('notin')!=null&&count($request->get('notin'))>0)
                $getProductsname->whereNotIn('id',$request->get('notin'));
        }
        return response()->json($getProductsname->paginate(10));


    }

    public function productsDownload()
    {
        $data = Products::get()->toArray();

         if ( !empty ( $data ) )
            {
		      return Excel::create('Part_Master', function($excel) use ($data) {
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

    public function productsImport()
    {
         return view('products.import');
    }

        public function productsExcelImport(Request $request)
    {
         $v = Validator::make($request->all(), [
        'import_file' => 'required|file|max:1024',
    ]);

    if ($v->fails())
    {
        return redirect()->back()->withErrors($v->errors());
    }


        else

        {
           $headings = (new HeadingRowImport)->toArray(request()->file('import_file'))[0][0];
           $headings[]="Remarks";
            $old_import = new ProductImport($headings);
//           dd($headings);
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

               $export = new ProductErrorExport($errorExport);

               return Excel::download($export, 'importError.xlsx');
             }

           else
           {
               return redirect()->back()->with('success_message',"Imported Successfully");
           }

    }

       // else

       //  {

       //     $result = Excel::load($request->file('import_file')->getRealPath(), function ($reader) use($request) {

       //          foreach ($reader->noHeading()->skipRows(1)->toArray() as $key => $row)
       //          {

       //              if(!$row[0])
       //              break;

       //              $data1['productcode']                   = $row[0];
       //              $data1['productname']                   = $row[1];
       //              $data1['productpartno']                 = $row[2];
       //              $data1['productdescription']            = $row[3]??'';
       //              $data1['customerpartno']                = $row[4]??'';
       //              $data1['customerpartname']              = $row[5]??'';
       //              $data1['customerpartdescription']       = $row[6]??'';
       //              $data1['uom_id']                        = $row[7];
       //              $data1['productsellingrate']            = $row[8];
       //              $data1['productigstrate']               = $row[9];
       //              $data1['productcgstrate']               = (($row[9])/2)??'';
       //              $data1['productsgstrate']               = (($row[9])/2)??'';
       //              $data1['producthsncode']                = $row[10]??'';
       //              $data1['productstatus']                 = 'active';

       //              $currentDateTime = date('Y-m-d H:i:s');

       //              $data1['created_at']           = $currentDateTime;
       //              $data1['updated_at']           = $currentDateTime;



       //              $check_productcode   = DB::table('products')->where('productcode', trim($row[0]))->first();


       //              if($check_productcode !=null)
       //              {

       //                  $resp = redirect('products.products.index')->withErrors($row[0]. " This Products Already Exist.");
       //                           \Session::driver()->save();
       //                           $resp->send();
       //                           exit();

       //              }
       //              else
       //              {
       //                  DB::table('products')->insert($data1);
       //              }

       //          }
       //      })->get();

       //    return redirect()->route('products.products.index')->with('success', ['File Import successfully.']);

       //  }

    }
    public function getProducts(Request $request)
    {

    }

}
