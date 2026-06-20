<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuotationsFormRequest;
use App\Models\Quotation;
use Exception;

class QuotationsController extends Controller
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
     * Display a listing of the quotations.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $quotations = Quotation::paginate(15);

        return view('quotations.index', compact('quotations'));
    }

    /**
     * Show the form for creating a new quotation.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('quotations.create');
    }

    /**
     * Store a new quotation in the storage.
     *
     * @param App\Http\Requests\QuotationsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(QuotationsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            Quotation::create($data);

            return redirect()->route('quotations.quotation.index')
                             ->with('success_message', 'Quotation was successfully added.');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified quotation.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $quotation = Quotation::findOrFail($id);

        return view('quotations.show', compact('quotation'));
    }

    /**
     * Show the form for editing the specified quotation.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $quotation = Quotation::findOrFail($id);
        

        return view('quotations.edit', compact('quotation'));
    }

    /**
     * Update the specified quotation in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\QuotationsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, QuotationsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $quotation = Quotation::findOrFail($id);
            $quotation->update($data);

            return redirect()->route('quotations.quotation.index')
                             ->with('success_message', 'Quotation was successfully updated.');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified quotation from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $quotation = Quotation::findOrFail($id);
            $quotation->delete();

            return redirect()->route('quotations.quotation.index')
                             ->with('success_message', 'Quotation was successfully deleted.');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }



}
