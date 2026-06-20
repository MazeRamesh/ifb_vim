<?php

namespace App\Http\Controllers;

use App\Models\location;
use App\Http\Controllers\Controller;
use App\Http\Requests\LocationsFormRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use App\Http\Requests;
use Validator;
use DB;
use Exception;
use Excel;

class LocationsController extends Controller
{

    /**
     * Display a listing of the locations.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $locations = location::paginate(15);

        return view('locations.index', compact('locations'));
    }

    /**
     * Show the form for creating a new location.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('locations.create');
    }

    /**
     * Store a new location in the storage.
     *
     * @param App\Http\Requests\LocationsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(LocationsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            location::create($data);

            return redirect()->route('locations.location.index')
                             ->with('success_message', 'Location was successfully added!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Display the specified location.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $location = location::findOrFail($id);

        return view('locations.show', compact('location'));
    }

    /**
     * Show the form for editing the specified location.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $location = location::findOrFail($id);
        

        return view('locations.edit', compact('location'));
    }

    /**
     * Update the specified location in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\LocationsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, LocationsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $location = location::findOrFail($id);
            $location->update($data);

            return redirect()->route('locations.location.index')
                             ->with('success_message', 'Location was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }        
    }

    /**
     * Remove the specified location from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $location = location::findOrFail($id);
            $location->delete();

            return redirect()->route('locations.location.index')
                             ->with('success_message', 'Location was successfully deleted!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }
    
    
        
    public function locationImport()
    {
     
        return view('locations.import');
    }
    
    
    public function locationExcelImport(Request $request)
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
      
           $result = Excel::load($request->file('import_file')->getRealPath(), function ($reader) use($request) {
                           
                foreach ($reader->noHeading()->skipRows(1)->toArray() as $key => $row) 
                {
                    
                    if(!$row[0])
                    break;
        
                  $data1['locationcode']            = $row[0];
                  $data1['locationname']            = $row[1];
                  $data1['locationDescription']     = $row[2]??'';
                    
                    $currentDateTime = date('Y-m-d H:i:s');
                    
                  $data1['created_at']           = $currentDateTime;
                  $data1['updated_at']           = $currentDateTime;
                    
                 
                    
                    $checklocationcode  = DB::table('locations')->where('locationcode', trim($row[0]))->first();
                    
                    if($checklocationcode !=null)
                    { 
                        $resp =  back()->withInput()
                         ->withErrors(['unexpected_error' => 'This locationcode Already Exist!']);
                                 \Session::driver()->save();
                                 $resp->send();
                                 exit();  
                    }
                    else
                    {
                        DB::table('locations')->insert($data1);
                    }
 
                }
            })->get();
           
           return redirect()->route('locations.location.index')
                             ->with('success_message', 'File Import successfully.');
           
        }   
        
    }
    
    
    public function locationDownload()
    {
        $data = location::get()->toArray();
       
         if ( !empty ( $data ) ) 
            {
		      return Excel::create('Locations_Master', function($excel) use ($data) {
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
    



}
