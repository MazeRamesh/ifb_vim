<?php

namespace App\Http\Controllers;

use App\Exports\CustomerErrorExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\MaterialDetailsFormRequest;
use App\Imports\MaterialDetail as ImportsMaterialDetail;
use App\Imports\SalesheaderImport;
use App\Models\MaterialDetail;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\HeadingRowImport;
use Yajra\Datatables\Datatables;

class MaterialDetailsController extends Controller
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
     * Display a listing of the material details.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
		return view('material_details.index');
    }

	/**
     * Process ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getIndexData()
    {
		$materialDetails = MaterialDetail::getQuery();

		return Datatables::of($materialDetails)
        ->addColumn('actions', function ($row) {

            return '<div class="btn-group btn-group-sm float-right" role="group">
                    <a href="' . route('material_details.material_detail.show', [$row->id]) . '" class="btn btn-sm btn-outline-primary" title="Show MaterialDetail">
                        <i class="fas fa-fw fa-eye" aria-hidden="true"></i>
                    </a>
                    <a href="' . route('material_details.material_detail.edit', [$row->id]) . '" class="btn btn-sm btn-outline-primary" title="Edit MaterialDetail">
                        <i class="fas fa-fw fa-edit" aria-hidden="true"></i>
                    </a>
                    <button type="submit" class="btn btn-sm btn-outline-primary btn-delete" title="Delete MaterialDetail" data-remote="' . route('material_details.material_detail.destroy', [$row->id]) . '" >
                        <i class="fas fa-fw fa-trash-alt" aria-hidden="true"></i>
                    </button>
                </div>';
        })
        ->rawColumns(['actions' => 'actions'])
        ->make(true);
    }


    /**
     * Show the form for creating a new material detail.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {


        return view('material_details.create');
    }

    /**
     * Store a new material detail in the storage.
     *
     * @param App\Http\Requests\MaterialDetailsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(MaterialDetailsFormRequest $request)
    {
        try {

            $data = $request->getData();

            MaterialDetail::create($data);

            return redirect()->route('material_details.material_detail.index')
                             ->with('success_message', 'Material Detail was successfully added.');

        } catch (Exception $exception) {
            // dd($exception);
            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified material detail.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $materialDetail = MaterialDetail::findOrFail($id);

        return view('material_details.show', compact('materialDetail'));
    }

    /**
     * Show the form for editing the specified material detail.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $materialDetail = MaterialDetail::findOrFail($id);


        return view('material_details.edit', compact('materialDetail'));
    }

    /**
     * Update the specified material detail in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\MaterialDetailsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, MaterialDetailsFormRequest $request)
    {
        try {

            $data = $request->getData();

            $materialDetail = MaterialDetail::findOrFail($id);
            $materialDetail->update($data);

            return redirect()->route('material_details.material_detail.index')
                             ->with('success_message', 'Material Detail was successfully updated.');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Remove the specified material detail from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $materialDetail = MaterialDetail::findOrFail($id);
            $materialDetail->delete();

            return redirect()->route('material_details.material_detail.index')
                             ->with('success_message', 'Material Detail was successfully deleted.');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }
    public function importExcel(Request $request)
    {
         $v = Validator::make($request->all(), [
        'import_file' => ['required','file']
        ]);
        if ($v->fails())
        {
            return redirect()->back(
            )->withErrors($v->errors());
        }
       else
       {
        try {
            $materials_import = new ImportsMaterialDetail();
            $errors=[];
            $importFile = Excel::import($materials_import,request()->file('import_file'));
            $errorflag=0;
            $errorrow=array();
            $failures=$materials_import->getErrors();
            if(count($failures)>0)
            {
                $export = new CustomerErrorExport($failures);
                return Excel::download($export, 'Material Detail Import Error.xlsx');
            }
            return redirect()->back()->with('success_message', 'File Imported Successfully!!');
        }
        catch(\PhpOffice\PhpSpreadsheet\Reader\Exception $e)
        {
            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Something Wrong On Your Sheet! Open with excel software and save then try again!']);
        }
        catch (Exception $e) {
            return back()->withInput()
                         ->withErrors(['unexpected_error' => $e->getMessage()]);
       }
       }


    }
}
