<?php

namespace App\Http\Controllers;

use App\Models\Customertables;
use App\Models\DropDowns;
use App\Http\Controllers\Controller;
use App\Http\Requests\CustomertablesFormRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use App\Http\Requests;
use Validator;
use DB;
use Exception;
use Excel;
use App\Imports\CustomerImport;
use App\Exports\CustomerErrorExport;
use Maatwebsite\Excel\HeadingRowImport;

class CustomertablesController extends Controller
{

    /**
     * Display a listing of the customertables.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $customertablesObjects = Customertables::paginate(15);

        return view('customertables.index', compact('customertablesObjects'));
    }

    /**
     * Show the form for creating a new customertables.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        $DropDownValues  = DropDowns::where('fieldsname',config('constants.options_from_db')['Customer_Types'])->get();
        return view('customertables.create',compact('DropDownValues'));
    }

    /**
     * Store a new customertables in the storage.
     *
     * @param App\Http\Requests\CustomertablesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(CustomertablesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            // dd($data);
            Customertables::create($data);

            return redirect()->route('customertables.customertables.index')
                             ->with('success_message', 'Customertables was successfully added!');

        } catch (Exception $exception) {
            //dd($exception);
            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Display the specified customertables.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $customertables = Customertables::findOrFail($id);

        return view('customertables.show', compact('customertables'));
    }

    /**
     * Show the form for editing the specified customertables.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $customertables = Customertables::findOrFail($id);
        $DropDownValues  = DropDowns::where('fieldsname',config('constants.options_from_db')['Customer_Types'])->get();
        // dd($customertables);
        return view('customertables.edit', compact('customertables','DropDownValues'));
    }

    /**
     * Update the specified customertables in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\CustomertablesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, CustomertablesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $customertables = Customertables::findOrFail($id);
            $customertables->update($data);

            return redirect()->route('customertables.customertables.index')
                             ->with('success_message', 'Customertables was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }        
    }

    /**
     * Remove the specified customertables from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $customertables = Customertables::findOrFail($id);
            $customertables->delete();

            return redirect()->route('customertables.customertables.index')
                             ->with('success_message', 'Customertables was successfully deleted!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }
    
    public function customertablesImport()
    {
     
        return view('customertables.import');
    }
    
    
    public function customertablesExcelImport(Request $request)
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
            $old_import = new CustomerImport($headings);
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
              
               $export = new CustomerErrorExport($errorExport);
               
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
                    
       //            $data1['customercode']            = $row[0];
       //            $data1['customername']            = $row[1];
       //            $data1['customertype']            = $row[2]??'';
       //            $data1['customeraddress']         = $row[3];
       //            $data1['customerGSTINno']         = $row[4]??'';
       //            $data1['customerphoneno']         = $row[5];
       //            $data1['customermobileno']        = $row[6];
       //            $data1['customeremail']           = $row[7];
       //            $data1['customercity']            = $row[8]??'';
       //            $data1['customerstate']           = $row[9]??'';
       //            $data1['customerpanno']           = $row[10];
       //            $data1['customerstatecode']       = $row[11];
       //            $data1['vendorcode']              = $row[12];
       //            $data1['typeofbusiness']          = $row[13];
       //            $data1['customerstaus']           = 'active';
                    
       //            $currentDateTime = date('Y-m-d H:i:s');
                    
       //            $data1['created_at']           = $currentDateTime;
       //            $data1['updated_at']           = $currentDateTime;
                    
                    
       //              $checkcustomercode   = DB::table('customertables')->where('customercode', trim($row[0]))->first();
                    
       //              if($checkcustomercode !=null)
       //              { 
       //                  $resp =  back()->withInput()
       //                   ->withErrors(['unexpected_error' => 'This customercode Already Exist!']);
       //                           \Session::driver()->save();
       //                           $resp->send();
       //                           exit();  
       //              }
       //              else
       //              {
       //                  DB::table('customertables')->insert($data1);
       //              }
 
       //          }
       //      })->get();
           
       //     return redirect()->route('customertables.customertables.index')
       //                       ->with('success_message', 'File Import successfully.');
           
       //  }   
        
    }
    
    
    public function customertablesDownload()
    {
        $data = Customertables::get()->toArray();
       
         if ( !empty ( $data ) ) 
            {
		      return Excel::create('Customer_Master', function($excel) use ($data) {
			     $excel->sheet('mySheet', function($sheet) use ($data)
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
    
    public function pincodesearch()
    {
        
error_reporting(E_ALL);
ini_set('display_errors',1);
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "vim_app";
$q = $_GET['q'];
if(isset($q) || !empty($q)) {
	$con = mysqli_connect($hostname, $username, $password, $dbname);
    $query = "SELECT * FROM pincodes WHERE pincode LIKE '$q%'";
    $result = mysqli_query($con, $query);
    $res = array();
    while($resultSet = mysqli_fetch_assoc($result)) 
    {
     $res[$resultSet['id']]['id'] =  $resultSet['divisionname']."-".$resultSet['egionname']."-".$resultSet['circlename']."-".$resultSet['taluk']."-".$resultSet['statename']."-".$resultSet['statecode'];
     $res[$resultSet['id']]['value'] =  $resultSet['pincode'];
    $res[$resultSet['id']]['label'] =   "Pincode: ".$resultSet['pincode'].", ".$resultSet['divisionname'].", ".$resultSet['egionname'].", ".$resultSet['circlename'].", ".$resultSet['taluk'].", ".$resultSet['statename']."-".$resultSet['statecode'];
    
    }
    if(!$res) {
    	$res[0] = 'Not found!';
    }
    echo json_encode($res);
}

    }
    
    
public function getCustomers(Request $request)
{
    $customers=Customertables::orWhere('customername','like','%'.$request->get('q').'%')->orWhere('customercode','like','%'.$request->get('q').'%');
    return response()->json($customers->paginate(10));
}

public function getMappedProducts(Request $request){
        $customer_id=$request->get('customer_id');
        if($customer_id!=null && $customer_id!="")
        {
            $mapped_products=Customertables::where(function($q)use($customer_id){
                $q->orWhere('id',$customer_id);
                $q->orWhere('customercode',$customer_id);
            })->first()->mapped_products;
            return response()->json($mapped_products);
        }
    }

}
