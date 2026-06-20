<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductCustomerMapping;
class RateMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('rate_masters.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customer_id=$request->get('customer_id');
        $product=$request->get('product');
        $product=ProductCustomerMapping::updateOrCreate(['product_id'=>$product['id'],'customer_id'=>$customer_id],['productsellingrate'=>$product['rate']]);
        if($product!=null)
        {
            return response()->json(['status'=>true,'product_mapped'=>$product,'message'=>'Product Mapped to Customer']);
        }
        else
            return response()->json(['status'=>false,'message'=>'Error on Product Mapping']);   
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
        $flag=ProductCustomerMapping::findOrFail($id)->delete();
        if($flag)
            return response()->json(['status'=>true,'message'=>'Deleted Successfully']);
        else
            return response()->json(['status'=>false,'message'=>'Something Went Wrong']);
    }
    public function getMappedProducts(Request $request){
        $customer_id=$request->get('customer_id');
        if($customer_id!=null && $customer_id!="")
        {
            return response()->json(['status'=>'true','products'=>ProductCustomerMapping::where('customer_id',$customer_id)->get()]);
        }
    }
}
