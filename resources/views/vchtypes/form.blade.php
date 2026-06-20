
<div class="form-group clearfix {{ $errors->has('vchtypecode') ? 'has-error' : '' }}">
    <label for="vchtypecode" class="col-md-3 col-sm-6 control-label">Voucher Type Code</label>
    <div class="col-md-9 col-sm-6 float-right">
        <input class="form-control " name="vchtypecode" type="text" id="vchtypecode" value="{{ old('vchtypecode', optional($vchtypes)->vchtypecode) }}" minlength="1" placeholder="Enter vch type code here...">
        {!! $errors->first('vchtypecode', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group clearfix {{ $errors->has('vchtypename') ? 'has-error' : '' }}">
    <label for="vchtypename" class="col-md-3 col-sm-6 control-label">Voucher Type Name</label>
    <div class="col-md-9 col-sm-6 float-right">
        <input class="form-control " name="vchtypename" type="text" id="vchtypename" value="{{ old('vchtypename', optional($vchtypes)->vchtypename) }}" minlength="1" placeholder="Enter vch type name here...">
        {!! $errors->first('vchtypename', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group clearfix {{ $errors->has('vchtypedescription') ? 'has-error' : '' }}">
    <label for="vchtypedescription" class="col-md-3 col-sm-6 control-label">Voucher Type Description</label>
    <div class="col-md-9 col-sm-6 float-right">
        <input class="form-control " name="vchtypedescription" type="text" id="vchtypedescription" value="{{ old('vchtypedescription', optional($vchtypes)->vchtypedescription) }}" minlength="1" placeholder="Enter vch type description here...">
        {!! $errors->first('vchtypedescription', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group clearfix {{ $errors->has('vchtypeunder') ? 'has-error' : '' }}">
    <label for="vchtypeunder" class="col-md-3 col-sm-6 control-label">Voucher Type Under</label>
    <div class="col-md-9 col-sm-6 float-right">
        <input class="form-control " name="vchtypeunder" type="text" id="vchtypeunder" value="{{ old('vchtypeunder', optional($vchtypes)->vchtypeunder) }}" minlength="1" placeholder="Enter vch type under here...">
        {!! $errors->first('vchtypeunder', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group clearfix {{ $errors->has('status') ? 'has-error' : '' }}">
    <label for="status" class="col-md-3 col-sm-6 control-label">Status</label>
    <div class="col-md-9 col-sm-6 float-right">
        <input class="form-control " name="status" type="text" id="status" value="{{ old('status', optional($vchtypes)->status) }}" minlength="1" placeholder="Enter status here...">
        {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
    </div>
</div>

