{{--<!-- @push('scripts')
<style>
    .imp
    {
        color: red;
    }
    .lab
    {
        font-weight: bold !important;
    }
</style>
@endpush -->--}}
<div class="row">
<!--     <div class="col-md-6 form-group {{ $errors->has('cmpcode') ? 'has-error' : '' }}">
        <label for="cmpcode" class="col-md-6 control-label">Company Code</label>
            <input class="form-control" name="cmpcode" type="text" id="cmpcode" value="{{ old('cmpcode', optional($company)->cmpcode) }}" minlength="1" placeholder="Enter cmpcode here..." readonly>
            {!! $errors->first('cmpcode', '<p class="help-block">:message</p>') !!}
</div> -->
<div class="col-md-6 form-group {{ $errors->has('cmpname') ? 'has-error' : '' }}">
        <label for="cmpname" class="col-md-6 control-label lab">Company Name<b class="imp">*</b></label>
            <input class="form-control" name="cmpname" type="text" id="cmpname" value="J.K Fenner (India) Limited" minlength="1" required readonly>
            {!! $errors->first('cmpname', '<p class="help-block">:message</p>') !!}
</div>    
<!-- <div class="col-md-6 form-group {{ $errors->has('cmpmailingname') ? 'has-error' : '' }}">
    <label for="cmpmailingname" class="col-md-6 control-label lab">Mailing Name</label>
        <input class="form-control" name="cmpmailingname" type="text" id="cmpmailingname" value="{{ old('cmpmailingname', optional($company)->cmpmailingname) }}" minlength="1">
        {!! $errors->first('cmpmailingname', '<p class="help-block">:message</p>') !!}
</div> -->
<div class="col-md-6 form-group {{ $errors->has('plantcode') ? 'has-error' : '' }}">
        <label for="plantcode" class="col-md-6 control-label lab">Plant Code<b class="imp">*</b></label>
            <input class="form-control" name="plantcode" type="text" id="plantcode" value="{{ old('plantcode', optional($company)->plantcode) }}" minlength="1">
            {!! $errors->first('plantcode', '<p class="help-block">:message</p>') !!}
</div>
<div class="col-md-6 form-group {{ $errors->has('plantname') ? 'has-error' : '' }}">
        <label for="plantname" class="col-md-6 control-label lab">Plant Name<b class="imp">*</b></label>
            <input class="form-control" name="plantname" type="text" id="plantname" value="{{ old('plantname', optional($company)->plantname) }}" minlength="1" required>
            {!! $errors->first('plantname', '<p class="help-block">:message</p>') !!}
</div>
<div class="col-md-6 form-group {{ $errors->has('cmpgstino') ? 'has-error' : '' }}">
    <label for="cmpgstino" class="col-md-6 control-label lab">GSTIN</label>
        <input class="form-control" name="cmpgstino" type="text" id="cmpgstino" value="{{ old('cmpgstino', optional($company)->cmpgstino) }}" minlength="1">
        {!! $errors->first('cmpgstino', '<p class="help-block">:message</p>') !!}
</div>
<div class="col-md-6 form-group {{ $errors->has('pannopanno') ? 'has-error' : '' }}">
    <label for="panno" class="col-md-6 control-label lab">PAN No</label>
        <input class="form-control" name="panno" type="text" id="panno" value="{{ old('panno', optional($company)->panno) }}" minlength="1">
        {!! $errors->first('panno', '<p class="help-block">:message</p>') !!}
</div>
<!-- <div class="col-md-6 form-group {{ $errors->has('companylocation') ? 'has-error' : '' }}">
    <label for="company_id" class="col-md-6 control-label"> Location</label>
        <select class="form-control" id="companylocation" name="companylocation">
        	    <option value="" style="display: none;" {{ old('companylocation', optional($company)->companylocation ?: '') == '' ? 'selected' : '' }} disabled selected>Select Location</option>
        	@foreach ($location as $key => $locations)
			    <option value="{{ $locations->locationcode }}" {{ old('location', optional($company)->location) == $key ? 'selected' : '' }}>
			    	{{ $locations->locationcode }} - {{ $locations->locationname }}
			    </option>
			@endforeach
        </select>
        {!! $errors->first('companylocation', '<p class="help-block">:message</p>') !!}
</div> -->

<div class="col-md-6 form-group {{ $errors->has('cmpcountry') ? 'has-error' : '' }}">
    <label for="cmpcountry" class="col-md-6 control-label lab">Country</label>
        <input class="form-control" name="cmpcountry" type="text" id="cmpcountry" value="{{'India', old('cmpcountry', optional($company)->cmpcountry) }}" readonly>
        {!! $errors->first('cmpcountry', '<p class="help-block">:message</p>') !!}
</div>
<div class="col-md-6 form-group {{ $errors->has('pincode') ? 'has-error' : '' }}">
    <label for="pincode" class="col-md-6 control-label lab">Enter Pincode</label>
        <input class="form-control" name="pincode" type="text" id="pincode" value="{{old('pincode', optional($company)->pincode) }}">
        {!! $errors->first('pincode', '<p class="help-block">:message</p>') !!}
</div>
<div class="col-md-6 form-group {{ $errors->has('cmpstate') ? 'has-error' : '' }}">
    <label for="cmpstate" class="col-md-6 control-label lab">State</label>
        <input class="form-control" name="cmpstate" type="text" id="cmpstate" value="{{ old('cmpstate', optional($company)->cmpstate) }}" minlength="1" readonly>
        {!! $errors->first('cmpstate', '<p class="help-block">:message</p>') !!}
</div>
<div class="col-md-6 form-group {{ $errors->has('cmpcity') ? 'has-error' : '' }}">
    <label for="cmpcity" class="col-md-6 control-label lab">City</label>
        <input class="form-control" name="cmpcity" type="text" id="cmpcity" value="{{ old('cmpcity', optional($company)->cmpcity) }}" minlength="1" readonly>
        {!! $errors->first('cmpcity', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group col-md-6 {{ $errors->has('statecode') ? 'has-error' : '' }}">
    <label for="statecode" class="col-md-6 control-label lab">State Code</label>
        <input class="form-control" name="statecode" type="text" id="statecode" value="{{ old('statecode', optional($company)->statecode) }}" minlength="1" readonly>
        {!! $errors->first('statecode', '<p class="help-block">:message</p>') !!}
</div>


<!-- <div class="col-md-6 form-group {{ $errors->has('cmpemail') ? 'has-error' : '' }}">
    <label for="cmpemail" class="col-md-6 control-label">Email</label>
        <input class="form-control" name="cmpemail" type="email" id="cmpemail" value="{{ old('cmpemail', optional($company)->cmpemail) }}">
        {!! $errors->first('cmpemail', '<p class="help-block">:message</p>') !!}
</div>

<div class="col-md-6 form-group {{ $errors->has('cmpphoneno') ? 'has-error' : '' }}">
    <label for="cmpphoneno" class="col-md-6 control-label">PhoneNo</label>
        <input class="form-control" name="cmpphoneno" type="text" id="cmpphoneno" value="{{ old('cmpphoneno', optional($company)->cmpphoneno) }}" minlength="1">
        {!! $errors->first('cmpphoneno', '<p class="help-block">:message</p>') !!}
</div> -->

<!-- <div class="col-md-6 form-group {{ $errors->has('cmpmobileno') ? 'has-error' : '' }}">
    <label for="cmpmobileno" class="col-md-6 control-label">MobileNo</label>
        <input class="form-control" name="cmpmobileno" type="text" id="cmpmobileno" value="{{ old('cmpmobileno', optional($company)->cmpmobileno) }}" minlength="1">
        {!! $errors->first('cmpmobileno', '<p class="help-block">:message</p>') !!}
</div>

<div class="col-md-6 form-group {{ $errors->has('cmpwebsite') ? 'has-error' : '' }}">
    <label for="cmpwebsite" class="col-md-6 control-label">Website</label>
        <input class="form-control" name="cmpwebsite" type="text" id="cmpwebsite" value="{{ old('cmpwebsite', optional($company)->cmpwebsite) }}" minlength="1">
        {!! $errors->first('cmpwebsite', '<p class="help-block">:message</p>') !!}
</div> -->

<!-- <div class="col-md-6 form-group {{ $errors->has('cmplogo') ? 'has-error' : '' }}">
    <label for="cmplogo" class="col-md-6 control-label">Logo</label>
        <input class="form-control" name="cmplogo" type="file" id="cmplogo" value="{{ old('cmplogo', optional($company)->cmplogo) }}" minlength="1" placeholder="Enter cmplogo here...">
        {!! $errors->first('cmplogo', '<p class="help-block">:message</p>') !!}
</div> -->
<div class="col-md-6 form-group {{ $errors->has('cmpaddress') ? 'has-error' : '' }}">
    <label for="cmpaddress" class="col-md-6 control-label lab">Address<b class="imp">*</b></label>
        <textarea class="form-control" name="cmpaddress" cols="50" rows="3" id="cmpaddress" minlength="1" required>{{ old('cmpaddress', optional($company)->cmpaddress) }}</textarea>
        {!! $errors->first('cmpaddress', '<p class="help-block">:message</p>') !!}
</div>

</div>
















