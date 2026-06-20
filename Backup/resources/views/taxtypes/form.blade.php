
<div class="form-group clearfix {{ $errors->has('taxcode') ? 'has-error' : '' }}">
    <label for="taxcode" class="col-md-3 col-sm-6 control-label">Tax Code</label>
    <div class="col-md-9 col-sm-6 float-right">
        <input class="form-control " name="taxcode" type="text" id="taxcode" value="{{ old('taxcode', optional($taxtypes)->taxcode) }}" minlength="1" placeholder="Enter tax code here...">
        {!! $errors->first('taxcode', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group clearfix {{ $errors->has('taxname') ? 'has-error' : '' }}">
    <label for="taxname" class="col-md-3 col-sm-6 control-label">Tax Name</label>
    <div class="col-md-9 col-sm-6 float-right">
        <input class="form-control " name="taxname" type="text" id="taxname" value="{{ old('taxname', optional($taxtypes)->taxname) }}" minlength="1" placeholder="Enter tax name here...">
        {!! $errors->first('taxname', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group clearfix {{ $errors->has('taxtypes') ? 'has-error' : '' }}">
    <label for="taxtypes" class="col-md-3 col-sm-6 control-label">Tax Types</label>
    <div class="col-md-9 col-sm-6 float-right">
        <input class="form-control " name="taxtypes" type="text" id="taxtypes" value="{{ old('taxtypes', optional($taxtypes)->taxtypes) }}" minlength="1" placeholder="Enter taxtypes here...">
        {!! $errors->first('taxtypes', '<p class="help-block">:message</p>') !!}
    </div>
</div>

