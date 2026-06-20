
<div class="form-group clearfix {{ $errors->has('uomcode') ? 'has-error' : '' }}">
    <label for="uomcode" class="col-md-3 col-sm-6 control-label">Uom Code</label>
    <div class="col-md-9 col-sm-6 float-right">
        <input class="form-control " name="uomcode" type="text" id="uomcode" value="{{ old('uomcode', optional($uom)->uomcode) }}" minlength="1" placeholder="Enter uom code here...">
        {!! $errors->first('uomcode', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group clearfix {{ $errors->has('uomname') ? 'has-error' : '' }}">
    <label for="uomname" class="col-md-3 col-sm-6 control-label">Uom Name</label>
    <div class="col-md-9 col-sm-6 float-right">
        <input class="form-control " name="uomname" type="text" id="uomname" value="{{ old('uomname', optional($uom)->uomname) }}" minlength="1" placeholder="Enter uom name here...">
        {!! $errors->first('uomname', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group clearfix {{ $errors->has('uomshortname') ? 'has-error' : '' }}">
    <label for="uomshortname" class="col-md-3 col-sm-6 control-label">Uom Short Name</label>
    <div class="col-md-9 col-sm-6 float-right">
        <input class="form-control " name="uomshortname" type="text" id="uomshortname" value="{{ old('uomshortname', optional($uom)->uomshortname) }}" minlength="1" placeholder="Enter uom short name here...">
        {!! $errors->first('uomshortname', '<p class="help-block">:message</p>') !!}
    </div>
</div>

