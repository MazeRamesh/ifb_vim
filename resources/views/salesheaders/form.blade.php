<div class="row">
<div class="col-12">
{{--<!-- <div class="card card-primary card-outline"> -->--}}
<div class="card-body">
    <div class="row">
        <div class="col" style="display:none">    
            <div class="form-group clearfix {{ $errors->has('salesuniqueno') ? 'has-error' : '' }}">
                <label for="salesuniqueno" class="col-md-3 col-sm-6 control-label">Sales unique No</label>
                <div class="col-md-9 col-sm-6 float-right">
                    <input class="form-control" name="salesuniqueno" type="text" id="salesuniqueno" value="{{ old('salesuniqueno', optional($salesheader)->salesuniqueno) }}" minlength="1" placeholder="Enter salesuniqueno here...">
                    {!! $errors->first('salesuniqueno', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
    </div>
    <div class="col">
        <div class="form-group clearfix{{ $errors->has('invoiceno') ? 'has-error' : '' }}">
            <label for="invoiceno" class="col-md-4 col-sm-6 control-label">Invoice No</label>
                <input class="form-control" name="invoiceno" type="text" id="invoiceno"  value="{{ old('invoiceno', optional($salesheader)->invoiceno) }}" minlength="1" placeholder="Invoice number" required>
                {!! $errors->first('invoiceno', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="col"> 
        <div class="form-group clearfix{{ $errors->has('invoicedate') ? 'has-error' : '' }}">
            <label for="invoicedate" class="col-md- col-sm-6 control-label">Invoice Date</label>
                <input class="form-control datepicker" name="invoicedate" type="text" id="invoicedate" value="{{ old('invoicedate', $currentdate) }}" minlength="1" placeholder="Enter invoicedate here..." required>
                {!! $errors->first('invoicedate', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    
    <div class="col"> 
        <div class="form-group clearfix{{ $errors->has('invoiceto') ? 'has-error' : '' }}">
            <label for="invoiceto" class=" control-label">Invoice To</label>
                <select class="form-control" id="invoiceto" name="invoiceto" required ng-model="invoiceto" ng-change="getcustomers()" >
                        <option value="" disabled selected>Select</option>
                    @foreach ($DropDownValues as $key => $DropDownValuess)
                        <option value="{{ $DropDownValuess->optionvalue }}" {{ old('invoiceto', optional($salesheader)->invoiceto) == $DropDownValuess->optionvalue ? 'selected' : '' }}>
                            {{ $DropDownValuess->optionvalue }}
                        </option>
                    @endforeach
                </select>
                
                {!! $errors->first('invoiceto', '<p class="help-block">:message</p>') !!}
        </div>
    </div>


<div class="col"> 
    <div class="form-group clearfix{{ $errors->has('customercode_id') ? 'has-error' : '' }}">
        <label for="customercode_id" class="control-label">Customer Code</label>
            <select class="form-control select22" id="customercode_id" name="customercode_id" ng-model="customercode_id" required @if($editflag==true) disabled selected @endif>
                    <!-- <option ng-repeat= value="pass.customercode" disabled selected>Select customer</option> -->
                <option ng-repeat="cust in customer" value=@{{cust.customercode}}>@{{cust.customername}}</option>
            </select>
            {!! $errors->first('customercode_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="col" style="display:none"> 
<div class="form-group clearfix{{ $errors->has('vchtypecode_id') ? 'has-error' : '' }}">
    <label for="vchtypecode_id" class="control-label">Sales Vch Type </label>
        <select class="form-control" id="vchtypecode_id" name="vchtypecode_id">
        	    <option value="" style="display: none;" {{ old('vchtypecode_id', optional($salesheader)->vchtypecode_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select vchtypecode</option>
        	@foreach ($vchtypecodes as $key => $vchtypecode)
			    <option value="{{ $vchtypecode->vchtypecode_id }}" {{ old('vchtypecode_id', optional($salesheader)->vchtypecode_id) == $key ? 'selected' : '' }}>
			    	{{ $vchtypecode->vchtypename }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('vchtypecode_id', '<p class="help-block">:message</p>') !!}
</div>
</div>
    
    
    </div>
    
    
    
    
    <div class="row">
        
                    <div class="col"> 
<div class="form-group {{ $errors->has('taxtypes') ? 'has-error' : '' }}">
    <label for="taxtypes" class=" control-label">Tax Type</label>
        <select class="form-control" id="taxtypes" name="taxtypes" ng-model="tax_type">
        	    <option value="" style="display: none;" {{ old('taxtypes', optional($salesheader)->taxtypes ?: '') == '' ? 'selected' : '' }} disabled>select taxtypes here...</option>
        	@foreach (['intrastate' => 'Intrastate',
'interstate' => 'Interstate'] as $key => $text)
			    <option value="{{ $key }}" ng-selected="tax_type=='{{$key}}'" {{ old('taxtypes', optional($salesheader)->taxtypes) == $key ? 'selected' : '' }}>
			    	{{ $text }}
			    </option>
			@endforeach
        </select>
        {!! $errors->first('taxtypes', '<p class="help-block">:message</p>') !!}
</div>
</div>
    
<div class="col" > 
<div class="form-group clearfix{{ $errors->has('transport') ? 'has-error' : '' }}">
    <label for="transport" class=" control-label">Transport</label>
  
        <select class="form-control" id="transport" name="transport" required>
        	    <option value="" style="display: none;" {{ old('transport', optional($salesheader)->transport ?: '') == '' ? 'selected' : '' }} disabled selected>Select Transport</option>
        	@foreach ($transport as $key => $transport_id)
			    <option value="{{ $transport_id->transporterId }}" {{ old('transport', optional($salesheader)->transport) == $transport_id->transporterId ? 'selected' : '' }}>
			    	{{ $transport_id->transporterId }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('transport', '<p class="help-block">:message</p>') !!}
   
</div>
</div>
        
        <div class="col" > 
<div class="form-group clearfix{{ $errors->has('ponumber') ? 'has-error' : '' }}">
    <label for="ponumber" class=" control-label">PO Number</label>
        <select class="form-control" id="ponumber" multiple=true name="" ng-model="ponumber" required ng-options="pass.pono for pass in ponumbers track by pass.pono">
        </select>
        {!! $errors->first('ponumber', '<p class="help-block">:message</p>') !!}
</div>
</div>
        
<div class="col">     
<div class="form-group clearfix{{ $errors->has('podate') ? 'has-error' : '' }}">
    <label for="podate" class="control-label">PO Date</label>
        <input class="form-control"  type="text" id="podate" ng-model="podate"  value="{{ old('podate', optional($salesheader)->podate) }}" minlength="1" placeholder="Enter podate here..." readonly>
        {!! $errors->first('podate', '<p class="help-block">:message</p>') !!}
</div>
</div>
    
    </div>
    
    
        <!-- <div class="row" ng-if="invoiceto !='Others'"> -->
<div class="row"> 
<div class="col-md-3">     
<div class="form-group clearfix{{ $errors->has('plantcode') ? 'has-error' : '' }}">
    <label for="plantcode" class="col-md-4 col-sm-6 control-label">Eway-Bill No.</label>
        <input class="form-control" name="plantcode" type="text" id="plantcode"  value="{{ old('plantcode', optional($salesheader)->plantcode) }}" minlength="1" placeholder="Enter Ewaybill number here...">
        {!! $errors->first('plantcode', '<p class="help-block">:message</p>') !!}
</div>
</div>
    
     <div class="col">     
<div class="form-group clearfix{{ $errors->has('shopcode') ? 'has-error' : '' }}">
    <label for="shopcode" class="control-label">Shop Code</label>
        <input class="form-control" name="shopcode" type="text" id="shopcode"  value="{{ old('shopcode', optional($salesheader)->shopcode) }}" minlength="1" placeholder="Enter shopcode here..." ng-model="shopcode" required readonly>
        {!! $errors->first('shopcode', '<p class="help-block">:message</p>') !!}
</div>
</div>
        
<div class="col-md-3">     
    <div class="form-group clearfix{{ $errors->has('pdsno') ? 'has-error' : '' }}">
        <label for="pdsno" class="control-label">PDS No</label>
            <input class="form-control" name="pdsno" type="text" id="pdsno"  value="{{ old('pdsno', optional($salesheader)->pdsno) }}" minlength="1" placeholder="Enter pdsno here..." ng-model="pdsno">
            {!! $errors->first('pdsno', '<p class="help-block">:message</p>') !!}
    </div>
</div>
        
<div class="col-md-3">     
    <div class="form-group clearfix{{ $errors->has('pdsdate') ? 'has-error' : '' }}">
        <label for="pdsdate" class="control-label">PDS Date</label>
            <input class="form-control" name="pdsdate" type="date" id="pdsdate"  value="{{ old('pdsdate', optional($salesheader)->pdsdate) }}" minlength="1" placeholder="Enter pdsdate here..." ng-model="pdsdate">
            {!! $errors->first('pdsdate', '<p class="help-block">:message</p>') !!}
    </div>
</div>
  </div>      
<!-- </div> -->
    
    </div>
</div>




<div class="container-fluid">
<div class="row">
<div class="col-12" style="padding-right: 0px;padding-left: 0px;">
<div class="card card-primary card-outline">
<div class="card-header">
<h3 class="card-title clearfix text-info text-uppercase font-weight-bold">
Product Details
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
<th>Description</th>
<th style="display:none;">Product HSN Code</th>
<th >GST Rate(%)</th>
<th style="display:none;">Product CGST Rate</th>
<th style="display:none;">Product SGST Rate</th>

<th>UOM</th>
<th>Rate</th>
<th>Quantity</th>
<th>Amount</th>
<th>Action</th>
<th style="display:none;">Tax Amount</th>
    
<th style="display:none;">Taxable Amount</th>

    
<th></th>

{{--<!-- <th>Due date</th> -->--}}
</tr>
</thead>
    <tbody id="add_more"   class="sales_container">
        <tr ng-repeat="p in table_products" ng-init="$last && finished()">
            <td class="td">
            <select style="width:200px" class="product_name form-control select11" name="productcode_id[]" ng-change="getProductsInfo(p)" ng-model="p.po_id" >
            <option selected disabled>Please select</option>
            {{-- @foreach ($products  as $key => $productss ) @endforeach 
                <option value="{{ $productss->productpartno }}" {{ old('productcode_id', optional($salesheader)->productcode_id) == $productss->productpartno ? 'selected' : '' }}>
                                {{ $productss->productpartno }}
                </option>
                --}}
                <option ng-repeat="product in products" ng-hide="product.canavailable==false" value=@{{product.id}}>@{{product.productcode_id}}</option>
            </select>
            <!-- <input class="form-control" ng-if="p.newlyadded==null||p.newlyadded==false" type="text" name="productcode_id[]" value="@{{p.productcode_id}}" readonly=true /> -->
            </td>
                
            <td class="td" style="display:none;">
            <input class="productpartno form-control " name="productpartno[]" type="text" id="productpartno"  minlength="1" ng-model="p.productpartno" placeholder="" value="" readonly>
            </td>
                
            <td class="td">
            <input class="productname form-control " name="productname[]" type="text" id="productname"  minlength="1" ng-model="p.productname" placeholder="" value="" readonly>
            <input style="display: none" type="text" name="ponumber[]" ng-model="p.ponumber" />
            <input style="display: none" type="text" name="podate[]" ng-model="p.podate" />
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
                

            <td class="td">
            <input class="uom_id form-control " name="uom_id[]" type="text" id="uom_id"  minlength="1" ng-model="p.uom_id" placeholder="" value="" readonly>
            </td>
            <td class="td">
            <input class="productsellingrate form-control " name="productsellingrate[]" type="text" min="1" max="99999" ng-model="p.productsellingrate" placeholder="" step="any" readonly>
            </td>
                
            <td class="td">
            <input class="productqty form-control " name="productqty[]" type="text"   minlength="1" ng-model="p.productqty" placeholder="" autofocus required>
            </td>

            <td class="td">
            <input class="netamount form-control " name="netamount[]" type="text"  min="1" max="99999" ng-model="orderAmount(p) | number : 2" readonly="" placeholder="" step="any">
            </td>
                
            <td class="td" style="display:none;">
            <input class="taxamount form-control " name="taxamount[]" type="text"  min="1" max="99999" ng-model="orderAmount1(p) | number : 2" readonly="" placeholder="" step="any">
            </td>
                
            <td class="td" style="display:none;">
            <input class="taxableamount form-control " name="taxableamount[]" type="text"  min="1" max="99999" ng-model="p.amount+p.tax_amount | number : 2" readonly="" placeholder="" step="any">
            </td>	
            <td>
                <span>
            <button type="button" ng-click="add()" class="btn btn-success" title="Add Line" aria-hidden="true">
                <i class="fas fa-plus-square"></i>
                </button>
            </span>
            </td>
            <td>
                <span>
            <button ng-click="removeItem($index)" type="button" class="btn btn-danger" title="Remove Line" aria-hidden="true">
            <i class="fas fa-trash-alt"></i>
            </button>
                </span>
            </td>
        </tr>
        <tr>
            <td>
                <label>Item Total</label>
                <input ng-model="total_amount() | number : 2" name="sales_total" value="{{ old('productamount', optional($salesheader)->productamount) }}" type="text" class="form-control"  readonly>
            </td>
            <!-- <td  id="2479">
                <label>IGST Amount</label>
                <input name="igstamount" ng-model="taxCal1() | number : 2" type="text" class="form-control" readonly>
            </td>
            <td id="2480">
                <label>CGST Amount</label>
                <input name="cgstamount" ng-model="taxCal1()/2 | number : 2" type="text" class="form-control" readonly>
            </td>
            <td  id="2481">
                <label>SGST Amount</label>
                <input name="sgstamount" ng-model="taxCal1()/2 | number : 2" type="text" class="form-control" readonly>
            </td> -->
            <td id="2481">
                <label>Tax Amount</label>
                <input name="totaltaxamount" ng-model="taxCal1() | number : 2" type="text" class="form-control" readonly>
            </td>
            <td id="2470">
                <label>Loading Charges</label>
                <input name="Packing_amt" ng-model="Packing_amt" ng-blur="roundoff1(Packing_amt)" type="text" class="form-control" >
            </td>
            <td>
                <label>Freight Charges</label>
                <input name="Freight_amt" ng-model="Freight_amt" ng-blur="roundoff2(Freight_amt)" type="text" class="form-control" >
            </td>
            <td>
                <label>Other Amount</label>
                <input name="otheramount" ng-model="other_amt" ng-blur="roundoff3(other_amt)" type="text" class="form-control" >
            </td>
            <td>
                <label>Discount</label>
                <input ng-model="discount_amt" name="discountamount" value="{{ old('sales_discount_amount', optional($salesheader)->sales_discount_amount) }}" type="text" class="form-control"  placeholder="" >
            </td>
        </tr>
    </tbody>
<tfoot>
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
</div>



<!--
</tr>
</tfoot>
</table>


</div>
</div>
</div>
</div>
</div>
-->




<div class="row">
<div class="col-12">
<div class="card card-primary card-outline">
<div class="card-header">
<h3 class="card-title clearfix">
Comments
<div class="float-right">
</div>
</h3>
</div>    
<div class="card-body">

<div class="row">
<div class="col"> 

<div class="form-group clearfix {{ $errors->has('narration') ? 'has-error' : '' }}">
<textarea class="form-control" name="narration" cols="50" rows="2" id="narration" minlength="1" placeholder="">{{ old('narration', optional($salesheader)->narration) }}</textarea>
{!! $errors->first('narration', '<p class="help-block">:message</p>') !!}
</div>

</div>
</div>

</div>
</div>
</div>
</div>





        <div class="col"> 
<div class="form-group clearfix{{ $errors->has('taxamountword') ? 'has-error' : '' }}">
    <label for="taxamountword" class="col-md-3 col-sm-6 control-label">Taxamountword</label>
    <div class="col-md-9 col-sm-6 float-right">    
        <input class="form-control" ng-model="taxamountword" name="taxamountword" type="text" id="taxamountword" value="{{ old('taxamountword', optional($salesheader)->taxamountword) }}" minlength="1" placeholder="Enter taxamountword here..." readonly>
        {!! $errors->first('taxamountword', '<p class="help-block">:message</p>') !!}
    </div>
</div>
</div>

        <div class="col"> 
<div class="form-group clearfix{{ $errors->has('grandtotalamountword') ? 'has-error' : '' }}">
    <label for="grandtotalamountword" class="col-md-3 col-sm-6 control-label">Grandtotalamountword</label>
   <div class="col-md-9 col-sm-6 float-right">
        <input class="form-control" ng-model="grandtotalamountword" name="grandtotalamountword" type="text" id="grandtotalamountword" value="{{ old('grandtotalamountword', optional($salesheader)->grandtotalamountword) }}" minlength="1" placeholder="Enter grandtotalamountword here..." readonly>
        {!! $errors->first('grandtotalamountword', '<p class="help-block">:message</p>') !!}
    </div>
</div>
</div>
    <div style="display:none">

        <div class="col"> 
<div class="form-group clearfix{{ $errors->has('createdby') ? 'has-error' : '' }}">
    <label for="createdby" class="col-md-3 col-sm-6 control-label">Createdby</label>
    <div class="col-md-9 col-sm-6 float-right">
        <input class="form-control" name="createdby" type="text" id="createdby" value="{{Auth::user()->name, old('createdby', optional($salesheader)->createdby) }}" minlength="1" placeholder="Enter createdby here..." readonly>
        {!! $errors->first('createdby', '<p class="help-block">:message</p>') !!}
    </div>
</div>
</div>

        <div class="col"> 
<div class="form-group clearfix{{ $errors->has('createdlocation') ? 'has-error' : '' }}">
    <label for="createdlocation" class="col-md-3 col-sm-6 control-label">Createdlocation</label>
    <div class="col-md-9 col-sm-6 float-right">
        <input class="form-control" name="createdlocation" type="text" id="createdlocation" value="{{ old('createdlocation', optional($salesheader)->createdlocation) }}" minlength="1" placeholder="Enter createdlocation here..." readonly>
        {!! $errors->first('createdlocation', '<p class="help-block">:message</p>') !!}
    </div>
</div>
</div>

        <div class="col"> 
<div class="form-group clearfix{{ $errors->has('companyid') ? 'has-error' : '' }}">
    <label for="companyid" class="col-md-3 col-sm-6 control-label">Companyid</label>
    <div class="col-md-9 col-sm-6 float-right">
        <input class="form-control" name="companyid" type="text" id="companyid" value="{{ old('companyid', optional($company)->cmpcode) }}" minlength="1" placeholder="Enter companyid here..." readonly>
        {!! $errors->first('companyid', '<p class="help-block">:message</p>') !!}
    </div>
</div>
</div>
</div>

@push('scripts')
<script>
      $( ".datepicker" ).datepicker({
dateFormat: "dd-mm-yy",
weekStart: 0,
calendarWeeks: true,
autoclose: true,
todayHighlight: true,
rtl: true,
orientation: "auto"
});
</script>
@endpush