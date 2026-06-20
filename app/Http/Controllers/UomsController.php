<?php

namespace App\Http\Controllers;

use App\Models\Uom;
use App\Http\Controllers\Controller;
use App\Http\Requests\UomsFormRequest;
use Exception;

class UomsController extends Controller
{

    /**
     * Display a listing of the uoms.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $uoms = Uom::paginate(15);

        return view('uoms.index', compact('uoms'));
    }

    /**
     * Show the form for creating a new uom.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('uoms.create');
    }

    /**
     * Store a new uom in the storage.
     *
     * @param App\Http\Requests\UomsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(UomsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            Uom::create($data);

            return redirect()->route('uoms.uom.index')
                             ->with('success_message', 'Uom was successfully added!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Display the specified uom.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $uom = Uom::findOrFail($id);

        return view('uoms.show', compact('uom'));
    }

    /**
     * Show the form for editing the specified uom.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $uom = Uom::findOrFail($id);
        

        return view('uoms.edit', compact('uom'));
    }

    /**
     * Update the specified uom in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\UomsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, UomsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $uom = Uom::findOrFail($id);
            $uom->update($data);

            return redirect()->route('uoms.uom.index')
                             ->with('success_message', 'Uom was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }        
    }

    /**
     * Remove the specified uom from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $uom = Uom::findOrFail($id);
            $uom->delete();

            return redirect()->route('uoms.uom.index')
                             ->with('success_message', 'Uom was successfully deleted!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }



}
