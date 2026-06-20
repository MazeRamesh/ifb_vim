<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompaniesFormRequest;
use App\Models\company;
use App\Models\location;
use Exception;

class CompaniesController extends Controller
{

    /**
     * Display a listing of the companies.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {

        $companies = company::paginate(15);

        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new company.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        $location = location::all();
        return view('companies.create',compact('location'));
    }

    /**
     * Store a new company in the storage.
     *
     * @param App\Http\Requests\CompaniesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(CompaniesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            // dd($data);
            company::create($data);

            return redirect()->route('companies.company.index')
                             ->with('success_message', 'Company was successfully added.');

        } catch (Exception $exception) {
            
            dd($exception);

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified company.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $company = company::findOrFail($id);

        return view('companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified company.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $company = company::findOrFail($id);
        $location = location::all();

        return view('companies.edit', compact('company','location'));
    }

    /**
     * Update the specified company in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\CompaniesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */

    public function gen_uuid() 
    {
        return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),mt_rand( 0, 0xffff ),mt_rand( 0, 0x0fff ) | 0x4000,mt_rand( 0, 0x3fff ) | 0x8000,mt_rand( 0, 0xffff ),mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
        );
    }

    public function update($id, CompaniesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            // dd($data);
            $company = company::findOrFail($id);
            $cmp_uuid=base64_encode($data['plantname']);
            $data['cmp_uuid']=$cmp_uuid;
            // dd($data);
            $company->update($data);

            return redirect()->route('companies.company.index')
                             ->with('success_message', 'Company was successfully updated.');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified company from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $company = company::findOrFail($id);
            $company->delete();

            return redirect()->route('companies.company.index')
                             ->with('success_message', 'Company was successfully deleted.');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

  

}
