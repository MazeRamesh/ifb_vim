<div class="row">
    <div class="col-md-6 form-group {{ $errors->has('productcode') ? 'has-error' : '' }}">
        <label for="productcode" class="col-md-2 control-label">Unique Code</label>
            <input class="form-control" name="productcode" type="text" id="productcode" value="{{ old('productcode', optional($products)->productcode) }}" minlength="1" placeholder="Unique Code" @if($editflag==true) readonly @endif>
            {!! $errors->first('productcode', '<p class="help-block">:message</p>') !!}
    </div>

<div class="col-md-6 form-group {{ $errors->has('productpartno') ? 'has-error' : '' }}">
    <label for="productpartno" class="col-md-4 control-label">Our Part Number</label>
        <input class="form-control" name="productpartno" type="text" id="productpartno" value="{{ old('productpartno', optional($products)->productpartno) }}" minlength="1" placeholder="Product part No">
        {!! $errors->first('productpartno', '<p class="help-block">:message</p>') !!}
</div>

<div class="col-md-6 form-group {{ $errors->has('customerpartno') ? 'has-error' : '' }}">
    <label for="customerpartno" class="col-md-4 control-label">Customer Part Number</label>
        <input class="form-control" name="customerpartno" type="text" id="customerpartno" value="{{ old('customerpartno', optional($products)->customerpartno) }}" minlength="1" placeholder="Customer Part No">
        {!! $errors->first('customerpartno', '<p class="help-block">:message</p>') !!}
</div>

<div class="col-md-6 form-group {{ $errors->has('productname') ? 'has-error' : '' }}">
    <label for="productname" class="col-md-4 control-label">Our Part Name</label>
        <input class="form-control" name="productname" type="text" id="productname" value="{{ old('productname', optional($products)->productname) }}" minlength="1" placeholder="Product Name">
        {!! $errors->first('productname', '<p class="help-block">:message</p>') !!}
</div>


<div class="col-md-6 form-group {{ $errors->has('customerpartname') ? 'has-error' : '' }}">
    <label for="customerpartname" class="col-md-4 control-label">Customer Part Name</label>
        <input class="form-control" name="customerpartname" type="text" id="customerpartname" value="{{ old('customerpartname', optional($products)->customerpartname) }}" minlength="1" placeholder="Customer Part Name">
        {!! $errors->first('customerpartname', '<p class="help-block">:message</p>') !!}
</div>


<div class="col-md-6 form-group {{ $errors->has('uom_id') ? 'has-error' : '' }}">
    <label for="uom_id" class="col-md-2 control-label">Uom</label>
        <select class="form-control" id="uom_id" name="uom_id">
            <option value="" disabled selected>Select</option>
        	@foreach ($DropDownValues as $key => $DropDownValuess)
			    <option value="{{ $DropDownValuess->optionvalue }}" {{ old('uom_id', optional($products)->uom_id) == $DropDownValuess->optionvalue ? 'selected' : '' }}>
			    	{{ $DropDownValuess->optionvalue }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('uom_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="col-md-6 form-group {{ $errors->has('customerpartdescription') ? 'has-error' : '' }}">
    <label for="customerpartdescription" class="col-md-4 control-label">Customer Part Description</label>
        <textarea class="form-control" name="customerpartdescription" cols="50" rows="2" id="customerpartdescription" minlength="1" placeholder="Customer Part Description">{{ old('customerpartdescription', optional($products)->customerpartdescription) }}</textarea>
        {!! $errors->first('customerpartdescription', '<p class="help-block">:message</p>') !!}
</div>

<div class="col-md-6 form-group {{ $errors->has('productdescription') ? 'has-error' : '' }}">
    <label for="productdescription" class="col-md-4 control-label">Our Part Description</label>
        <textarea class="form-control" name="productdescription" cols="50" rows="2" id="productdescription" minlength="1" placeholder="Our Part Description">{{ old('productdescription', optional($products)->productdescription) }}</textarea>
        {!! $errors->first('productdescription', '<p class="help-block">:message</p>') !!}
</div>

<div style="display:none">
    <div class="form-group {{ $errors->has('productmanufactdate') ? 'has-error' : '' }}">
        <label for="productmanufactdate" class="col-md-2 control-label">Product Manufact Date</label>
        <div class="col-md-10">
            <input class="form-control" name="productmanufactdate" type="date" id="productmanufactdate" value="{{ old('productmanufactdate', optional($products)->productmanufactdate) }}" minlength="1" placeholder="Enter productmanufact Date here...">
            {!! $errors->first('productmanufactdate', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="form-group {{ $errors->has('productexpirydate') ? 'has-error' : '' }}">
        <label for="productexpirydate" class="col-md-2 control-label">Product Expiry Date</label>
        <div class="col-md-10">
            <input class="form-control" name="productexpirydate" type="date" id="productexpirydate" value="{{ old('productexpirydate', optional($products)->productexpirydate) }}" minlength="1" placeholder="Enter productexpiry Date here...">
            {!! $errors->first('productexpirydate', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="form-group {{ $errors->has('productmrprate') ? 'has-error' : '' }}">
        <label for="productmrprate" class="col-md-2 control-label">Product MRP Rate</label>
        <div class="col-md-10">
            <input class="form-control" name="productmrprate" type="text" id="productmrprate" value="{{ old('productmrprate', optional($products)->productmrprate) }}" minlength="1" placeholder="Enter product MRP Rate here...">
            {!! $errors->first('productmrprate', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="col-md-6 form-group {{ $errors->has('producthsncode') ? 'has-error' : '' }}">
    <label for="producthsncode" class="col-md-2 control-label">HSN Code</label>
        <input class="form-control" name="producthsncode" type="text" id="producthsncode" value="{{ old('producthsncode', optional($products)->producthsncode) }}" minlength="1" placeholder="HSN Code">
        {!! $errors->first('producthsncode', '<p class="help-block">:message</p>') !!}
</div>

<div class="col-md-6 form-group {{ $errors->has('productigstrate') ? 'has-error' : '' }}">
    <label for="productigstrate" class="col-md-4 control-label">Product IGST Percentage</label>
        <input class="form-control" name="productigstrate" type="text" id="productigstrate" value="{{ old('productigstrate', optional($products)->productigstrate) }}" minlength="1" placeholder="Product IGST Percentage">
        {!! $errors->first('productigstrate', '<p class="help-block">:message</p>') !!}
</div>

<div class="col-md-6 form-group {{ $errors->has('productcgstrate') ? 'has-error' : '' }}">
    <label for="productcgstrate" class="col-md-4 control-label">Product CGST Percentage</label>
        <input class="form-control" name="productcgstrate" type="text" id="productcgstrate" value="{{ old('productcgstrate', optional($products)->productcgstrate) }}" minlength="1" placeholder="Product CGST Percentage">
        {!! $errors->first('productcgstrate', '<p class="help-block">:message</p>') !!}
</div>

<div class="col-md-6 form-group {{ $errors->has('productsgstrate') ? 'has-error' : '' }}">
    <label for="productsgstrate" class="col-md-4 control-label">Product SGST Percentage</label>
        <input class="form-control" name="productsgstrate" type="text" id="productsgstrate" value="{{ old('productsgstrate', optional($products)->productsgstrate) }}" minlength="1" placeholder="Product SGST Percentage">
        {!! $errors->first('productsgstrate', '<p class="help-block">:message</p>') !!}
</div>

<div class="col-md-6 form-group {{ $errors->has('productsellingrate') ? 'has-error' : '' }}">
    <label for="productsellingrate" class="col-md-2 control-label">Amount</label>
        <input class="form-control" name="productsellingrate" type="text" id="productsellingrate" value="{{ old('productsellingrate', optional($products)->productsellingrate) }}" minlength="1" placeholder="Amount">
        {!! $errors->first('productsellingrate', '<p class="help-block">:message</p>') !!}
</div>

<div style="display:none" class="col-md-6 form-group {{ $errors->has('productdealerrate') ? 'has-error' : '' }}">
    <label for="productdealerrate" class="col-md-4 control-label">Product Dealer Rate</label>
        <input class="form-control" name="productdealerrate" type="text" id="productdealerrate" value="{{ old('productdealerrate', optional($products)->productdealerrate) }}" minlength="1" placeholder="Product Dealer Rate">
        {!! $errors->first('productdealerrate', '<p class="help-block">:message</p>') !!}
</div>



<div style="display:none" class="col-md-6 form-group {{ $errors->has('productqty') ? 'has-error' : '' }}">
    <label for="productqty" class="col-md-2 control-label">Product Qty</label>
        <input class="form-control" name="productqty" type="text" id="productqty" value="{{ old('productqty', optional($products)->productqty) }}" minlength="1" placeholder="Product Qty">
        {!! $errors->first('productqty', '<p class="help-block">:message</p>') !!}
</div>

<div style="display:none" class="col-md-6 form-group {{ $errors->has('productclosingqty') ? 'has-error' : '' }}">
    <label for="productclosingqty" class="col-md-2 control-label">Product Closing Qty</label>
        <input class="form-control" name="productclosingqty" type="text" id="productclosingqty" value="{{ old('productclosingqty', optional($products)->productclosingqty) }}" minlength="1" placeholder="Enter product closing qty here...">
        {!! $errors->first('productclosingqty', '<p class="help-block">:message</p>') !!}
</div>

<div class="col-md-6 form-group {{ $errors->has('productstatus') ? 'has-error' : '' }}">
    <label for="productstatus" class="col-md-3  control-label">Product Status</label>
        <select class="form-control " name="productstatus" id="productstatus" required>
        <option value="" disabled selected style="display:none">Select</option>
        <option value="active">Active</option>
        <option value="inactive">Inactive</option>
        </select>
        {!! $errors->first('productstatus', '<p class="help-block">:message</p>') !!}
</div>
</div>



