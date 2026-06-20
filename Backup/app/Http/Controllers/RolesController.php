<?php

namespace App\Http\Controllers;

use App\Role;
use App\Models\company as Company;
use App\Http\Controllers\Controller;
use App\Http\Requests\RolesFormRequest;
use Exception;

class RolesController extends Controller
{

    /**
     * Display a listing of the roles.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $roles = Role::with('company')->paginate(15);

        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new role.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $companies = Company::pluck('created_at','id')->all();

        return view('roles.create', compact('companies'));
    }

    /**
     * Store a new role in the storage.
     *
     * @param App\Http\Requests\RolesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(RolesFormRequest $request)
    {
        try {

            $data = $request->getData();

            //dd($data);

            Role::create($data);

            return redirect()->route('roles')
                             ->with('success_message', 'Role was successfully added!');

        } catch (Exception $exception) {

            dd($exception);

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Display the specified role.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $role = Role::with('company')->findOrFail($id);

        return view('roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified role.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $companies = Company::pluck('created_at','id')->all();

        return view('roles.edit', compact('role','companies'));
    }

    /**
     * Update the specified role in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\RolesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, RolesFormRequest $request)
    {
        try {

            $data = $request->getData();

            $role = Role::findOrFail($id);
            $role->update($data);

            return redirect()->route('roles')
                             ->with('success_message', 'Role was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Remove the specified role from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {

            if($id == "0")
            {
                 return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Not allowed!']);
            }
            else
            {
            $role = Role::findOrFail($id);
            $role->delete();

            return redirect()->route('roles')
                             ->with('success_message', 'Role was successfully deleted!');

            }


        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }



}
