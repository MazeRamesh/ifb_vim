<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\SalesdetailsFormRequest;
use App\Models\Invoiceno;
use App\Models\Productcode;
use App\Models\salesdetails;
use Exception;

class SalesdetailsController extends Controller
{

    /**
     * Display a listing of the salesdetails.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $salesdetailsObjects = salesdetails::with('invoiceno','productcode')->paginate(15);

        return view('salesdetails.index', compact('salesdetailsObjects'));
    }

    /**
     * Show the form for creating a new salesdetails.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $invoicenos = Invoiceno::pluck('id','id')->all();
$productcodes = Productcode::pluck('id','id')->all();
        
        return view('salesdetails.create', compact('invoicenos','productcodes'));
    }

    /**
     * Store a new salesdetails in the storage.
     *
     * @param App\Http\Requests\SalesdetailsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(SalesdetailsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            salesdetails::create($data);

            return redirect()->route('salesdetails.salesdetails.index')
                             ->with('success_message', 'Salesdetails was successfully added.');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified salesdetails.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $salesdetails = salesdetails::with('invoiceno','productcode')->findOrFail($id);

        return view('salesdetails.show', compact('salesdetails'));
    }

    /**
     * Show the form for editing the specified salesdetails.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $salesdetails = salesdetails::findOrFail($id);
        $invoicenos = Invoiceno::pluck('id','id')->all();
$productcodes = Productcode::pluck('id','id')->all();

        return view('salesdetails.edit', compact('salesdetails','invoicenos','productcodes'));
    }

    /**
     * Update the specified salesdetails in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\SalesdetailsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, SalesdetailsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $salesdetails = salesdetails::findOrFail($id);
            $salesdetails->update($data);

            return redirect()->route('salesdetails.salesdetails.index')
                             ->with('success_message', 'Salesdetails was successfully updated.');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified salesdetails from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $salesdetails = salesdetails::findOrFail($id);
            $salesdetails->delete();

            return redirect()->route('salesdetails.salesdetails.index')
                             ->with('success_message', 'Salesdetails was successfully deleted.');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }



}
