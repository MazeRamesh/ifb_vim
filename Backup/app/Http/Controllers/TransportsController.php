<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\TransportsFormRequest;
use App\Models\company as Company;
use App\Models\transport;
use Exception;

class TransportsController extends Controller
{

    /**
     * Display a listing of the transports.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $transports = transport::with('company')->paginate(15);

        return view('transports.index', compact('transports'));
    }

    /**
     * Show the form for creating a new transport.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        // $companies = Company::pluck('id')->all();
         $companies = Company::all();
        // dd($companies);
        return view('transports.create', compact('companies'));
    }

    /**
     * Store a new transport in the storage.
     *
     * @param App\Http\Requests\TransportsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(TransportsFormRequest $request)
    {
        try {

            $data = $request->getData();

            transport::create($data);

            return redirect()->route('transports.transport.index')
                             ->with('success_message', 'Transport was successfully added.');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified transport.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $transport = transport::with('company')->findOrFail($id);

        return view('transports.show', compact('transport'));
    }

    /**
     * Show the form for editing the specified transport.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $transport = transport::findOrFail($id);
        $companies = Company::all();
        // dd($companies);
        return view('transports.edit', compact('transport','companies'));
    }

    /**
     * Update the specified transport in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\TransportsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, TransportsFormRequest $request)
    {
        try {

            $data = $request->getData();
              // dd($data);
            $transport = transport::findOrFail($id);
            $transport->update($data);

            return redirect()->route('transports.transport.index')
                             ->with('success_message', 'Transport was successfully updated.');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Remove the specified transport from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $transport = transport::findOrFail($id);
            $transport->delete();

            return redirect()->route('transports.transport.index')
                             ->with('success_message', 'Transport was successfully deleted.');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }



}
