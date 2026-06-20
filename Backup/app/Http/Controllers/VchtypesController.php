<?php

namespace App\Http\Controllers;

use App\Models\Vchtypes;
use App\Http\Controllers\Controller;
use App\Http\Requests\VchtypesFormRequest;
use Exception;

class VchtypesController extends Controller
{

    /**
     * Display a listing of the vchtypes.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $vchtypesObjects = Vchtypes::paginate(15);

        return view('vchtypes.index', compact('vchtypesObjects'));
    }

    /**
     * Show the form for creating a new vchtypes.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('vchtypes.create');
    }

    /**
     * Store a new vchtypes in the storage.
     *
     * @param App\Http\Requests\VchtypesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(VchtypesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            Vchtypes::create($data);

            return redirect()->route('vchtypes.vchtypes.index')
                             ->with('success_message', 'Vchtypes was successfully added!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Display the specified vchtypes.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $vchtypes = Vchtypes::findOrFail($id);

        return view('vchtypes.show', compact('vchtypes'));
    }

    /**
     * Show the form for editing the specified vchtypes.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $vchtypes = Vchtypes::findOrFail($id);
        

        return view('vchtypes.edit', compact('vchtypes'));
    }

    /**
     * Update the specified vchtypes in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\VchtypesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, VchtypesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $vchtypes = Vchtypes::findOrFail($id);
            $vchtypes->update($data);

            return redirect()->route('vchtypes.vchtypes.index')
                             ->with('success_message', 'Vchtypes was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }        
    }

    /**
     * Remove the specified vchtypes from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $vchtypes = Vchtypes::findOrFail($id);
            $vchtypes->delete();

            return redirect()->route('vchtypes.vchtypes.index')
                             ->with('success_message', 'Vchtypes was successfully deleted!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }



}
