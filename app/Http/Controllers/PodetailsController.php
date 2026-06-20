<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PodetailsFormRequest;
use App\Models\Pono;
use App\Models\Productcode;
use App\Models\podetails;
use Exception;

class PodetailsController extends Controller
{

    /**
     * Display a listing of the podetails.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $podetailsObjects = podetails::with('pono','productcode')->paginate(15);

        return view('podetails.index', compact('podetailsObjects'));
    }

    /**
     * Show the form for creating a new podetails.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $ponos = Pono::pluck('id','id')->all();
$productcodes = Productcode::pluck('id','id')->all();
        
        return view('podetails.create', compact('ponos','productcodes'));
    }

    /**
     * Store a new podetails in the storage.
     *
     * @param App\Http\Requests\PodetailsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(PodetailsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            podetails::create($data);

            return redirect()->route('podetails.podetails.index')
                             ->with('success_message', 'Podetails was successfully added.');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified podetails.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $podetails = podetails::with('pono','productcode')->findOrFail($id);

        return view('podetails.show', compact('podetails'));
    }

    /**
     * Show the form for editing the specified podetails.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $podetails = podetails::findOrFail($id);
        $ponos = Pono::pluck('id','id')->all();
$productcodes = Productcode::pluck('id','id')->all();

        return view('podetails.edit', compact('podetails','ponos','productcodes'));
    }

    /**
     * Update the specified podetails in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\PodetailsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, PodetailsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $podetails = podetails::findOrFail($id);
            $podetails->update($data);

            return redirect()->route('podetails.podetails.index')
                             ->with('success_message', 'Podetails was successfully updated.');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified podetails from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $podetails = podetails::findOrFail($id);
            $podetails->delete();

            return redirect()->route('podetails.podetails.index')
                             ->with('success_message', 'Podetails was successfully deleted.');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }



}
