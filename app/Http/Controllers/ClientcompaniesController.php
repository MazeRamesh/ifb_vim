<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientcompaniesFormRequest;
use App\Models\clientcompany;
use Exception;

class ClientcompaniesController extends Controller
{

    /**
     * Display a listing of the clientcompanies.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $clientcompanies = clientcompany::paginate(15);

        return view('clientcompanies.index', compact('clientcompanies'));
    }

    /**
     * Show the form for creating a new clientcompany.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('clientcompanies.create');
    }

    /**
     * Store a new clientcompany in the storage.
     *
     * @param App\Http\Requests\ClientcompaniesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(ClientcompaniesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            clientcompany::create($data);

            return redirect()->route('clientcompanies.clientcompany.index')
                             ->with('success_message', 'Clientcompany was successfully added.');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified clientcompany.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $clientcompany = clientcompany::findOrFail($id);

        return view('clientcompanies.show', compact('clientcompany'));
    }

    /**
     * Show the form for editing the specified clientcompany.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $clientcompany = clientcompany::findOrFail($id);
        

        return view('clientcompanies.edit', compact('clientcompany'));
    }

    /**
     * Update the specified clientcompany in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\ClientcompaniesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, ClientcompaniesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $clientcompany = clientcompany::findOrFail($id);
            $clientcompany->update($data);

            return redirect()->route('clientcompanies.clientcompany.index')
                             ->with('success_message', 'Clientcompany was successfully updated.');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified clientcompany from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $clientcompany = clientcompany::findOrFail($id);
            $clientcompany->delete();

            return redirect()->route('clientcompanies.clientcompany.index')
                             ->with('success_message', 'Clientcompany was successfully deleted.');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }



}
