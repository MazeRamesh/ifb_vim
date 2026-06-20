<div class="row">
<div class="col-12">
{{--<!-- <div class="card card-primary card-outline"> -->--}}
<div class="card-body">
    
    <div class="row">
        
<div class="col" style="display:none">     
<div class="form-group clearfix {{ $errors->has('pouniqueno') ? 'has-error' : '' }}">
    <label for="pouniqueno" class="col-md-3 col-sm-6 control-label">Unique No</label>
    <div class="col-md-9 col-sm-6 float-right">
        <input class="form-control" name="pouniqueno" type="text" id="pouniqueno" value="{{ old('pouniqueno', optional($poheader)->pouniqueno) }}" minlength="1" placeholder="Enter pouniqueno here...">
        {!! $errors->first('pouniqueno', '<p class="help-block">:message</p>') !!}
    </div>
</div>
</div>
        

    <div class="col"> 
<div class="form-group clearfix{{ $errors->has('pono') ? 'has-error' : '' }}">
    <label for="pono" class="col-md-3 col-sm-6 control-label">Po Number</label>
    <div class="col-md-9 col-sm-6 float-right">
        <input class="form-control" name="pono" type="text" id="pono" value="{{ old('pono', optional($poheader)->pono) }}" minlength="1" placeholder="Enter pono here...">
        {!! $errors->first('pono', '<p class="help-block">:message</p>') !!}
    </div>
</div>
</div>

        <div class="col"> 
<div class="form-group clearfix{{ $errors->has('podate') ? 'has-error' : '' }}">
    <label for="podate" class="col-md-3 col-sm-6 control-label">Po Date</label>
    <div class="col-md-9 col-sm-6 float-right">
        <input class="form-control" name="podate" type="date" id="podate" value="{{ old('podate', optional($poheader)->podate) }}" minlength="1" placeholder="Enter podate here...">
        {!! $errors->first('podate', '<p class="help-block">:message</p>') !!}
    </div>
</div>
</div>

        <div class="col"> 
<div class="form-group clearfix{{ $errors->has('customercode_id') ? 'has-error' : '' }}">
    <label for="customercode_id" class="col-md-3 col-sm-6 control-label">Customer Code</label>
    <div class="col-md-9 col-sm-6 float-right">
        <select class="form-control" id="customercode_id" name="customercode_id">
        	    <option value="" style="display: none;" {{ old('customercode_id', optional($poheader)->customercode_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select customercode</option>
        	@foreach ($customercodes as $key => $customercode)
			    <option value="{{ $customercode->customercode }}" {{ old('customercode_id', optional($poheader)->customercode_id) == $customercode->customercode ? 'selected' : '' }}>
			    	{{ $customercode->customercode }} - {{ $customercode->customername }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('customercode_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
</div>

        <div class="col" style="display:none"> 
<div class="form-group clearfix{{ $errors->has('vchtypecode_id') ? 'has-error' : '' }}">
    <label for="vchtypecode_id" class="col-md-3 col-sm-6 control-label">Vchtypecode</label>
    <div class="col-md-9 col-sm-6 float-right">
        <select class="form-control" id="vchtypecode_id" name="vchtypecode_id">
        	    <option value="" style="display: none;" {{ old('vchtypecode_id', optional($poheader)->vchtypecode_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select vchtypecode</option>
        	@foreach ($vchtypecodes as $key => $vchtypecode)
			    <option value="{{ $key }}" {{ old('vchtypecode_id', optional($poheader)->vchtypecode_id) == $key ? 'selected' : '' }}>
			    	{{ $vchtypecode }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('vchtypecode_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
</div>

        <div class="col"> 
<div class="form-group clearfix{{ $errors->has('taxtypes') ? 'has-error' : '' }}">
    <label for="taxtypes" class="col-md-3 col-sm-6 control-label">Tax Types</label>
    <div class="col-md-9 col-sm-6 float-right">
                <select class="form-control" id="taxtypes" name="taxtypes" ng-model="tax_type">
        	    <option value="" style="display: none;" {{ old('taxtypes', optional($poheader)->taxtypes ?: '') == '' ? 'selected' : '' }} disabled>select taxtypes here...</option>
        	@foreach (['intrastate' => 'Intrastate',
'interstate' => 'Interstate'] as $key => $text)
			    <option value="{{ $key }}" ng-selected="tax_type=='{{$key}}'" {{ old('taxtypes', optional($poheader)->taxtypes) == $key ? 'selected' : '' }}>
			    	{{ $text }}
			    </option>
			@endforeach
        </select>
        {!! $errors->first('taxtypes', '<p class="help-block">:message</p>') !!}
    </div>
</div>
</div>
        
        
</div>
    
    <div class="container-fluid">
<div class="row">
<div class="col-12" style="padding-right: 0px;padding-left: 0px;">
<div class="card card-primary card-outline">
<div class="card-header">
<h3 class="card-title clearfix">
SKU Details
</h3>
</div> 

<div class="card-body table-responsive" style="padding-top: 0px;">

<table ng-app="products" class="table table-hover">
<thead>
<tr>
{{--<!-- <th>Product Code</th> -->--}}
<th>Part No</th>
    
<th style="display:none;">Product PartNo</th>
<th>Part Name</th>
<th>Part Description</th>
<th style="display:none;">Product HSN Code</th>
<th >GST Rate(%)</th>
<th style="display:none;">Product CGST Rate</th>
<th style="display:none;">Product SGST Rate</th>
<th>UOM</th>
<th>Rate</th>
<th>Quantity</th>
<th>Amount</th>
    
<th style="display:none;">Tax Amount</th>
    
<th style="display:none;">Taxable Amount</th>

    
<th></th>

{{--<!-- <th>Due date</th> -->--}}
</tr>
</thead>
<tbody id="add_more"   class="sales_container">
<tr ng-repeat="p in products"  ng-init="$last && fixSelect2Issue()">
<td class="td" style="width:300px;">
<select class="product_name form-control"  name="productcode_id[]" ng-change="getProductsInfo(p)" ng-model="p.productcode_id" >
<option value="" selected disabled>Please select</option>
</select>
</td>
    
<td class="td" style="display:none;">
<input class="partno form-control " name="productpartno[]" type="text" id="productpartno"  minlength="1" ng-model="p.productpartno" placeholder="" value="" readonly>
</td>
    
<td class="td">
<input class="productname form-control " name="productname[]" type="text" id="productname"  minlength="1" ng-model="p.productname" placeholder="" value="" readonly>
</td>

<td class="td">
<input class="productdescription form-control " name="productdescription[]" type="text" id="productdescription"  minlength="1" ng-model="p.productdescription" placeholder="" value="" readonly>
</td>

<td class="td" style="display:none;">
<input class="producthsncode form-control " name="producthsncode[]" type="text" id="producthsncode"  minlength="1" ng-model="p.producthsncode" placeholder="" value="" readonly>
</td>
    
<td class="td">
<input class="productigstrate form-control " name="productigstrate[]" type="text" id="productigstrate"  minlength="1" ng-model="p.productigstrate" placeholder="" value="" readonly>
</td>
    
<td class="td" style="display:none;">
<input class="productcgstrate form-control " name="productcgstrate[]" type="text" id="productcgstrate"  minlength="1" ng-model="p.productcgstrate" placeholder="" value="" readonly>
</td>
    
<td class="td" style="display:none;">
<input class="productsgstrate form-control " name="productsgstrate[]" type="text" id="productsgstrate"  minlength="1" ng-model="p.productsgstrate" placeholder="" value="" readonly>
</td>
    

<td class="td" >
<input class="uom_id form-control " name="uom_id[]" type="text" id="uom_id"  minlength="1" ng-model="p.uom_id" placeholder="" value="" readonly>
</td>
<td class="td">
<input class="productsellingrate form-control " name="productsellingrate[]" type="text" min="1" max="99999" ng-model="p.productsellingrate" placeholder="" step="any" readonly>
</td>
    
<td class="td">
<input class="productqty form-control " name="productqty[]" type="text"   minlength="1" ng-model="p.productqty" placeholder="" autofocus>
</td>

<td class="td">
<input class="netamount form-control " name="netamount[]" type="text"  min="1" max="99999" ng-model="orderAmount(p) | number : 2" readonly="" placeholder="" step="any">
</td>
    
<td class="td" style="display:none;">
<input class="taxamount form-control " name="taxamount[]" type="text"  min="1" max="99999" ng-model="orderAmount1(p) | number : 2" readonly="" placeholder="" step="any">
</td>
    
<td class="td" style="display:none;">
<input class="taxableamount form-control " name="taxableamount[]" type="text"  min="1" max="99999" ng-model="p.amount+p.tax_amount| number : 2" readonly="" placeholder="" step="any">
</td>	

<td>
	<span>
<button type="button" ng-click="add()" class="fa fa-plus-circle btn btn-success" title="Add Line" aria-hidden="true" style="border: 2px solid #008000">
	</button>
</span>
</td>
<td>
	<span>
<button ng-click="removeItem($index)" type="button" class="fa fa-trash btn btn-danger" title="Remove Line" aria-hidden="true" style="border: 2px solid #555555;">
</button>
	</span>
</td>
</tr>
</tbody>
<tfoot>
<tr>	
<td class="td tdfoot"></td>
<td class="td tdfoot"></td>
<td class="td tdfoot"></td>
<td class="td tdfoot"></td>
<td class="td tdfoot"></td>
<td class="td tdfoot"></td>
<td class="td tdfoot">Item Total</td>
<td class="td tdfoot">
<input ng-model="total_amount() | number : 2" name="taxableamounts" value="{{ old('taxableamount', optional($poheader)->taxableamount) }}" type="text" class="form-control"  readonly>
</td>
<td class="td tdfoot"></td>

</tr>
    
    

    
    
<tr ng-show="tax_type=='interstate'" class="td tdfoot" id="2479">
<td class="td tdfoot"></td>
<td class="td tdfoot"></td>
<td class="td tdfoot"></td>
<td class="td tdfoot"></td>
<td class="td tdfoot"></td>
<td class="td tdfoot"></td>
<td class="td tdfoot">IGST Amount</td>
<td class="td tdfoot">
<input name="igstamount" ng-model="taxCal1() | number : 2" type="text" class="form-control" readonly>
</td>
<td class="td tdfoot"></td>
</tr> 
    
<tr ng-show="tax_type=='intrastate'" class="td tdfoot" id="2480">
<td class="td tdfoot"></td>
<td class="td tdfoot"></td>
<td class="td tdfoot"></td>
<td class="td tdfoot"></td>
<td class="td tdfoot"></td>
<td class="td tdfoot"></td>
<td class="td tdfoot">CGST Amount</td>
<td class="td tdfoot">
<input name="cgstamount" ng-model="taxCal1()/2 | number : 2" type="text" class="form-control" readonly>
</td>
<td class="td tdfoot"></td>
</tr> 
    
<tr  ng-show="tax_type=='intrastate'"  class="td tdfoot" id="2481">
<td class="td tdfoot"></td>
<td class="td tdfoot"></td>
<td class="td tdfoot"></td>
<td class="td tdfoot"></td>
<td class="td tdfoot"></td>
<td class="td tdfoot"></td>
<td class="td tdfoot">SGST Amount</td>
<td class="td tdfoot">
<input name="sgstamount" ng-model="taxCal1()/2 | number : 2" type="text" class="form-control" readonly>
</td>
<td class="td tdfoot"></td>
</tr> 
    
<tr class="td tdfoot" id="2481">
<td class="td tdfoot"></td>
<td class="td tdfoot"></td>
<td class="td tdfoot"></td>
<td class="td tdfoot"></td>
<td class="td tdfoot"></td>
<td class="td tdfoot"></td>
<td class="td tdfoot">Total Tax Amount</td>
<td class="td tdfoot">
<input name="taxamounts" ng-model="taxCal1() | number : 2" type="text" class="form-control" readonly>
</td>
<td class="td tdfoot"></td>
</tr> 
    
    
<tr class="td tdfoot" id="2470">
<td class="td tdfoot"></td>
<td class="td tdfoot"></td>
<td class="td tdfoot"></td>
<td class="td tdfoot"></td>
<td class="td tdfoot"></td>
<td class="td tdfoot"></td>
<td class="td tdfoot">Loading & Packing Charges</td>
<td class="td tdfoot">
<input name="Packing_amt" ng-model="Packing_amt" ng-blur="roundoff1(Packing_amt)" type="text" class="form-control" >
</td>
<td class="td tdfoot"></td>
</tr>
    
<tr class="td tdfoot" id="2471">
<td class="td tdfoot"></td>
<td class="td tdfoot"></td>
<td class="td tdfoot"></td>
<td class="td tdfoot"></td>
<td class="td tdfoot"></td>
<td class="td tdfoot"></td>
<td class="td tdfoot">Freight Charges</td>
<td class="td tdfoot">
<input name="Freight_amt" ng-model="Freight_amt" ng-blur="roundoff2(Freight_amt)" type="text" class="form-control" >
</td>
<td class="td tdfoot"></td>
</tr>
    
    
<tr class="td tdfoot" id="2482">
<td class="td tdfoot"></td>
<td class="td tdfoot"></td>
<td class="td tdfoot"></td>
<td class="td tdfoot"></td>
<td class="td tdfoot"></td>
<td class="td tdfoot"></td>
<td class="td tdfoot">Other Amount</td>
<td class="td tdfoot">
<input name="otheramount" ng-model="other_amt" ng-blur="roundoff3(other_amt)" type="text" class="form-control" >
</td>
<td class="td tdfoot"></td>
</tr>

<tr>
<td class="td tdfoot"></td>
<td class="td tdfoot"></td>
<td class="td tdfoot"></td>
<td class="td tdfoot"></td>
<td class="td tdfoot"></td>
<td class="td tdfoot"></td>
<td class="td tdfoot">Discount (-)</td>
<td class="td tdfoot">
<input ng-model="discount_amt" ng-blur="roundoff4(discount_amt)" name="discountamount" value="{{ old('sales_discount_amount', optional($poheader)->sales_discount_amount) }}" type="text" class="form-control"  placeholder="" >
</td>
<td class="td tdfoot"></td>
</tr>

<td class="td tdfoot"></td>
<td class="td tdfoot"></td>
<td class="td tdfoot"></td>
<td class="td tdfoot"></td>
<td class="td tdfoot"></td>
<td class="td tdfoot"></td>
<td class="td tdfoot"><b>Grand Total</b></td>
<td class="td tdfoot">
    <b><input name="grandtotalamount" ng-model="grandTotal() | number : 2" type="text" class="form-control" type="text" readonly ></b>
</td>
<td class="td tdfoot"></td>
    </tfoot>
    </table>
    </div>
    </div>
    </div>
    </div>
    </div>

        

        <div class="col"> 
<div class="form-group clearfix{{ $errors->has('taxamountword') ? 'has-error' : '' }}">
    <label for="taxamountword" class="col-md-3 col-sm-6 control-label">Taxamountword</label>
    <div class="col-md-9 col-sm-6 float-right">    
        <input class="form-control" ng-model="taxamountword" name="taxamountword" type="text" id="taxamountword" value="{{ old('taxamountword', optional($poheader)->taxamountword) }}" minlength="1" placeholder="Enter taxamountword here..." readonly>
        {!! $errors->first('taxamountword', '<p class="help-block">:message</p>') !!}
    </div>
</div>
</div>

        <div class="col"> 
<div class="form-group clearfix{{ $errors->has('grandtotalamountword') ? 'has-error' : '' }}">
    <label for="grandtotalamountword" class="col-md-3 col-sm-6 control-label">Grandtotalamountword</label>
   <div class="col-md-9 col-sm-6 float-right">
        <input class="form-control" ng-model="grandtotalamountword" name="grandtotalamountword" type="text" id="grandtotalamountword" value="{{ old('grandtotalamountword', optional($poheader)->grandtotalamountword) }}" minlength="1" placeholder="Enter grandtotalamountword here..." readonly>
        {!! $errors->first('grandtotalamountword', '<p class="help-block">:message</p>') !!}
    </div>
</div>
</div>
    <div style="display:none">

        <div class="col"> 
<div class="form-group clearfix{{ $errors->has('createdby') ? 'has-error' : '' }}">
    <label for="createdby" class="col-md-3 col-sm-6 control-label">Createdby</label>
    <div class="col-md-9 col-sm-6 float-right">
        <input class="form-control" name="createdby" type="text" id="createdby" value="{{Auth::user()->name, old('createdby', optional($poheader)->createdby) }}" minlength="1" placeholder="Enter createdby here..." readonly>
        {!! $errors->first('createdby', '<p class="help-block">:message</p>') !!}
    </div>
</div>
</div>

        <div class="col"> 
<div class="form-group clearfix{{ $errors->has('createdlocation') ? 'has-error' : '' }}">
    <label for="createdlocation" class="col-md-3 col-sm-6 control-label">Createdlocation</label>
    <div class="col-md-9 col-sm-6 float-right">
        <input class="form-control" name="createdlocation" type="text" id="createdlocation" value="{{ old('createdlocation', optional($poheader)->createdlocation) }}" minlength="1" placeholder="Enter createdlocation here..." readonly>
        {!! $errors->first('createdlocation', '<p class="help-block">:message</p>') !!}
    </div>
</div>
</div>

        <div class="col"> 
<div class="form-group clearfix{{ $errors->has('companyid') ? 'has-error' : '' }}">
    <label for="companyid" class="col-md-3 col-sm-6 control-label">Companyid</label>
    <div class="col-md-9 col-sm-6 float-right">
        <input class="form-control" name="companyid" type="text" id="companyid" value="{{ old('companyid', optional($poheader)->companyid) }}" minlength="1" placeholder="Enter companyid here..." readonly>
        {!! $errors->first('companyid', '<p class="help-block">:message</p>') !!}
    </div>
</div>
</div>
        
</div>

