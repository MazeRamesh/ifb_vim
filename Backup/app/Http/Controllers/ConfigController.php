<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Config;
use DB;
class ConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $configures = Config::all();
        //dd($configures);
        return view('config.config',compact('configures'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $getRequest1 = $request->get('ewaybillserialkey');
        $getRequest2 = $request->get('ewaybillserialnewkey');
        $getRequest3 = $request->get('ewaybillusername');
        $getRequest4 = $request->get('ewaybilluserpassword');
        // dd($getRequest1,$getRequest2,$getRequest3,$getRequest4);
        $updateQuery = DB::table('configs')->where('id',1)->update(['ewaybillserialkey'=>$getRequest1,
                                                                       'ewaybillserialnewkey'=>$getRequest2,
                                                                       'ewaybillusername'=>$getRequest3,
                                                                       'ewaybilluserpassword'=>$getRequest4,
                                                                      ]);
            
            if($updateQuery)
            {
                return redirect()->route('config')
                             ->with('success_message', 'Updated Successfully');
            }
        else
        {
            return redirect()->back()->withErrors('Not Update'); 
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
