<?php

namespace App\Http\Controllers;

use App\Models\Taxtypes;
use App\Http\Controllers\Controller;
use App\Http\Requests\TaxtypesFormRequest;
use Exception;

class TaxtypesController extends Controller
{

    /**
     * Display a listing of the taxtypes.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $taxtypesObjects = Taxtypes::paginate(15);

        return view('taxtypes.index', compact('taxtypesObjects'));
    }

    /**
     * Show the form for creating a new taxtypes.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('taxtypes.create');
    }

    /**
     * Store a new taxtypes in the storage.
     *
     * @param App\Http\Requests\TaxtypesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(TaxtypesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            Taxtypes::create($data);

            return redirect()->route('taxtypes.taxtypes.index')
                             ->with('success_message', 'Taxtypes was successfully added!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Display the specified taxtypes.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $taxtypes = Taxtypes::findOrFail($id);

        return view('taxtypes.show', compact('taxtypes'));
    }

    /**
     * Show the form for editing the specified taxtypes.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $taxtypes = Taxtypes::findOrFail($id);
        

        return view('taxtypes.edit', compact('taxtypes'));
    }

    /**
     * Update the specified taxtypes in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\TaxtypesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, TaxtypesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $taxtypes = Taxtypes::findOrFail($id);
            $taxtypes->update($data);

            return redirect()->route('taxtypes.taxtypes.index')
                             ->with('success_message', 'Taxtypes was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }        
    }

    /**
     * Remove the specified taxtypes from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $taxtypes = Taxtypes::findOrFail($id);
            $taxtypes->delete();

            return redirect()->route('taxtypes.taxtypes.index')
                             ->with('success_message', 'Taxtypes was successfully deleted!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }



}
