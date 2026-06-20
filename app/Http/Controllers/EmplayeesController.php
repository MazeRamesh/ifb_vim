<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmplayeesFormRequest;
use App\Models\company as Company;
use App\Models\emplayee;
use Exception;
use auth;
class EmplayeesController extends Controller
{

    /**
     * Display a listing of the emplayees.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $emplayees = emplayee::with('company')->paginate(15);

        return view('emplayees.index', compact('emplayees'));
    }

    /**
     * Show the form for creating a new emplayee.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        // $user_plant = Auth::user()->userplant;
        // dd($user_plant);
        $plants = Company::all();

        return view('emplayees.create', compact('plants'));
    }

    /**
     * Store a new emplayee in the storage.
     *
     * @param App\Http\Requests\EmplayeesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(EmplayeesFormRequest $request)
    {
        try {

            $data = $request->getData();

            emplayee::create($data);

            return redirect()->route('emplayees.emplayee.index')
                             ->with('success_message', 'Emplayee was successfully added.');

        } catch (Exception $exception) {

          //  dd($exception);

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified emplayee.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $emplayee = emplayee::with('company')->findOrFail($id);

        return view('emplayees.show', compact('emplayee'));
    }

    /**
     * Show the form for editing the specified emplayee.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $emplayee = emplayee::findOrFail($id);
        // $companies = Company::all();
       $plants = Company::all();
        return view('emplayees.edit', compact('emplayee','plants'));
    }

    /**
     * Update the specified emplayee in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\EmplayeesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, EmplayeesFormRequest $request)
    {
        try {

            $data = $request->getData();

            $emplayee = emplayee::findOrFail($id);
            $emplayee->update($data);

            return redirect()->route('emplayees.emplayee.index')
                             ->with('success_message', 'Emplayee was successfully updated.');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Remove the specified emplayee from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $emplayee = emplayee::findOrFail($id);
            $emplayee->delete();

            return redirect()->route('emplayees.emplayee.index')
                             ->with('success_message', 'Emplayee was successfully deleted.');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }



}
