<div class="row">
    <div class="col-sm-6 form-group clearfix {{ $errors->has('customercode') ? 'has-error' : '' }}">
        <label for="customercode" class="col-md-6  control-label lab">Code<b class="imp">*</b></label>
            <input class="form-control" name="customercode" type="text" id="customercode" value="{{ old('customercode', optional($customertables)->customercode) }}" minlength="1" @if($editflag==true) readonly @endif>
            {!! $errors->first('customercode', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="col-sm-6 form-group clearfix {{ $errors->has('customername') ? 'has-error' : '' }}">
        <label for="customername" class="col-md-6  control-label lab">Name<b class="imp">*</b></label>
            <input class="form-control " name="customername" type="text" id="customername" value="{{ old('customername', optional($customertables)->customername) }}" minlength="1">
            {!! $errors->first('customername', '<p class="help-block">:message</p>') !!}
    </div>
<!--     <div class="col-sm-6 form-group clearfix {{ $errors->has('customertype') ? 'has-error' : '' }}">
        <label for="customertype" class="col-md-6  control-label">Type</label>
            <select class="form-control" id="customertype" name="customertype" required ng-model="customertype">
                    <option value="" disabled selected>Select</option>
                @foreach ($DropDownValues as $key => $DropDownValuess)
                    <option value="{{ $DropDownValuess->optionvalue }}" {{ old('customertype', optional($customertables)->customertype) == $DropDownValuess->optionvalue ? 'selected' : '' }}>
                        {{ $DropDownValuess->optionvalue }}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('custcustomertype', '<p class="help-block">:message</p>') !!}
    </div> -->
    <div class="col-sm-6 form-group clearfix{{ $errors->has('plantcode') ? 'has-error' : '' }}">
        <label for="plantcode" class="col-md-6  control-label lab">Plant Code<b class="imp">*</b></label>
            <input class="form-control" name="plantcode" type="text" id="plantcode"  value="{{ old('plantcode', optional($customertables)->plantcode) }}" minlength="1">
            {!! $errors->first('plantcode', '<p class="help-block" required>:message</p>') !!}
    </div>
<!--     <div class="col-sm-6 form-group clearfix{{ $errors->has('shopcode') ? 'has-error' : '' }}">
        <label for="shopcode" class="col-md-6  control-label">Shop Code</label>
            <input class="form-control" name="shopcode" type="text" id="shopcode"  value="{{ old('shopcode', optional($customertables)->shopcode) }}" minlength="1" placeholder="Enter shopcode here...">
            {!! $errors->first('shopcode', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="col-sm-6 form-group  clearfix{{ $errors->has('gateno') ? 'has-error' : '' }}"  ng-show="customertype !='Others' && customertype !=''">     
            <label for="gateno" class="col-md-6 control-label">Gate Number</label>
                <input class="form-control" name="gateno" type="text" id="gateno"  value="{{ old('gateno', optional($customertables)->gateno) }}" minlength="1" placeholder="Enter gateno here...">
                {!! $errors->first('gateno', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="col-sm-6 form-group clearfix{{ $errors->has('location') ? 'has-error' : '' }}" ng-show="customertype !='Others' && customertype !=''">     
        <label for="location" class="col-md-3 control-label">Location</label>
            <input class="form-control" name="location" type="text" id="location"  value="{{ old('location', optional($customertables)->location) }}" minlength="1" placeholder="Enter location here...">
            {!! $errors->first('location', '<p class="help-block">:message</p>') !!}
    </div> -->
    <div class="col-sm-6 form-group clearfix {{ $errors->has('customerGSTINno') ? 'has-error' : '' }}">
        <label for="customerGSTINno" class="col-md-3  control-label lab">GSTIN No.<b class="imp">*</b></label>
            <input class="form-control " name="customerGSTINno" type="text" id="customerGSTINno" value="{{ old('customerGSTINno', optional($customertables)->customerGSTINno) }}" minlength="1" >
            {!! $errors->first('customerGSTINno', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="col-sm-6 form-group clearfix {{ $errors->has('customerpanno') ? 'has-error' : '' }}">
        <label for="customerpanno" class="col-md-6 control-label lab">PAN No.<b class="imp">*</b></label>
            <input class="form-control" name="customerpanno" type="text" id="customerpanno" value="{{ old('customerpanno', optional($customertables)->customerpanno) }}" minlength="1">
            {!! $errors->first('customerpanno', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="col-sm-6 form-group clearfix {{ $errors->has('customerphoneno') ? 'has-error' : '' }}">
        <label for="customerphoneno" class="col-md-6  control-label lab">PhoneNo</label>
            <input class="form-control " name="customerphoneno" type="text" id="customerphoneno" value="{{ old('customerphoneno', optional($customertables)->customerphoneno) }}" minlength="1">
            {!! $errors->first('customerphoneno', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="col-sm-6  form-group clearfix {{ $errors->has('customermobileno') ? 'has-error' : '' }}">
        <label for="customermobileno" class="col-md-6 control-label lab">MobileNo</label>
            <input class="form-control " name="customermobileno" type="text" id="customermobileno" value="{{ old('customermobileno', optional($customertables)->customermobileno) }}" minlength="1">
            {!! $errors->first('customermobileno', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="col-sm-6 form-group clearfix {{ $errors->has('customeremail') ? 'has-error' : '' }}">
        <label for="customeremail" class="col-md-6  control-label lab">Email<b class="imp">*</b></label>
            <input class="form-control " name="customeremail" type="email" id="customeremail" value="{{ old('customeremail', optional($customertables)->customeremail) }}" >
            {!! $errors->first('customeremail', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="col-sm-6 form-group {{ $errors->has('pincode') ? 'has-error' : '' }}">
        <label for="pincode" class="col-md-6  control-label lab">Enter Pincode</label>
            <input class="form-control" name="pincode" type="text" id="pincode" value="{{old('pincode', optional($customertables)->pincode) }}">
            {!! $errors->first('pincode', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="col-sm-6 form-group clearfix {{ $errors->has('customerstate') ? 'has-error' : '' }}">
        <label for="customerstate" class="col-md-6  control-label lab">State</label>
            <input class="form-control " name="customerstate" type="text" id="customerstate" value="{{ old('customerstate', optional($customertables)->customerstate) }}" minlength="1" readonly>
            {!! $errors->first('customerstate', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="col-sm-6  form-group clearfix {{ $errors->has('customerstatecode') ? 'has-error' : '' }}">
        <label for="customerstatecode" class="col-md-6 control-label lab">State Code</label>
            <input class="form-control " name="customerstatecode" type="text" id="customerstatecode" value="{{ old('customerstatecode', optional($customertables)->customerstatecode) }}" minlength="1">
            {!! $errors->first('customerstatecode', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="col-sm-6 form-group clearfix {{ $errors->has('customercity') ? 'has-error' : '' }}">
        <label for="customercity" class="col-md-3  control-label lab">City</label>
            <input class="form-control " name="customercity" type="text" id="customercity" value="{{ old('customercity', optional($customertables)->customercity) }}" minlength="1" readonly>
            {!! $errors->first('customercity', '<p class="help-block">:message</p>') !!}
    </div>
   <!--  <div class="col-sm-6  form-group clearfix {{ $errors->has('vendorcode') ? 'has-error' : '' }}">
        <label for="vendorcode" class="col-md-6 control-label">Vendor Code</label>
            <input class="form-control " name="vendorcode" type="text" id="vendorcode" value="{{ old('vendorcode', optional($customertables)->vendorcode) }}" minlength="1" placeholder="Enter vendorcode here...">
            {!! $errors->first('vendorcode', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="col-sm-6  form-group clearfix {{ $errors->has('typeofbusiness') ? 'has-error' : '' }}">
        <label for="typeofbusiness" class="col-md-4 control-label">Type of Business</label>
            <input class="form-control " name="typeofbusiness" type="text" id="typeofbusiness" value="{{ old('typeofbusiness', optional($customertables)->typeofbusiness) }}" minlength="1" placeholder="Enter typeofbusiness here...">
            {!! $errors->first('vendorcode', '<p class="help-block">:message</p>') !!}
    </div> -->
    <div class="col-sm-6 form-group clearfix {{ $errors->has('customerstaus') ? 'has-error' : '' }}">
        <label for="customerstaus" class="col-md-6  control-label lab">Status<b class="imp">*</b></label>
            <select class="form-control " name="customerstaus" id="customerstaus" required>
            <option value="" disabled selected style="display:none">Select</option>
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
            </select>
            {!! $errors->first('customerstaus', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="col-sm-6 form-group clearfix {{ $errors->has('consigneeaddress') ? 'has-error' : '' }}">
        <label for="consigneeaddress" class="col-md-3  control-label lab">Consignee Address<b class="imp">*</b></label>
        <textarea class="form-control " name="consigneeaddress" cols="50" rows="3" id="consigneeaddress" value="{{ old('consigneeaddress', optional($customertables)->consigneeaddress) }}" minlength="1">{{ old('consigneeaddress', optional($customertables)->consigneeaddress) }}</textarea>
        {!! $errors->first('consigneeaddress', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="col-sm-6 form-group clearfix {{ $errors->has('customeraddress') ? 'has-error' : '' }}">
        <label for="customeraddress" class="col-md-6 control-label lab">Address<b class="imp">*</b></label>
            <textarea class="form-control " name="customeraddress" cols="50" rows="3" id="customeraddress" value="{{ old('customeraddress', optional($customertables)->customeraddress) }}" minlength="1">{{ old('customeraddress', optional($customertables)->customeraddress) }}</textarea>
            {!! $errors->first('customeraddress', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<!-- <div class="col">     
<div class="form-group clearfix{{ $errors->has('pdsno') ? 'has-error' : '' }}">
    <label for="pdsno" class="col-md-3 col-sm-6 control-label">PDS No</label>
    <div class="col-md-9 col-sm-6 float-right">
        <input class="form-control" name="pdsno" type="text" id="pdsno"  value="{{ old('pdsno', optional($customertables)->pdsno) }}" minlength="1" placeholder="Enter pdsno here...">
        {!! $errors->first('pdsno', '<p class="help-block">:message</p>') !!}
    </div>
</div>
</div>
        
    <div class="col">     
<div class="form-group clearfix{{ $errors->has('pdsdate') ? 'has-error' : '' }}">
    <label for="pdsdate" class="col-md-3 col-sm-6 control-label">PDS Date</label>
    <div class="col-md-9 col-sm-6 float-right">
        <input class="form-control" name="pdsdate" type="date" id="pdsdate"  value="{{ old('pdsdate', optional($customertables)->pdsdate) }}" minlength="1" placeholder="Enter pdsdate here...">
        {!! $errors->first('pdsdate', '<p class="help-block">:message</p>') !!}
    </div>
</div>
</div> -->
        
<!-- </div> -->








