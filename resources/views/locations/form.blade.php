
<div class="form-group clearfix {{ $errors->has('locationcode') ? 'has-error' : '' }}">
    <label for="locationcode" class="col-md-3 col-sm-6 control-label">Location Code</label>
    <div class="col-md-9 col-sm-6 float-right">
        <input class="form-control " name="locationcode" type="text" id="locationcode" value="{{ old('locationcode', optional($location)->locationcode) }}" minlength="1" placeholder="Enter location code here...">
        {!! $errors->first('locationcode', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group clearfix {{ $errors->has('shopcode') ? 'has-error' : '' }}">
    <label for="shopcode" class="col-md-3 col-sm-6 control-label">Shop Code</label>
    <div class="col-md-9 col-sm-6 float-right">
        <input class="form-control " name="shopcode" type="text" id="shopcode" value="{{ old('shopcode', optional($location)->shopcode) }}" minlength="1" placeholder="Enter shopcode name here...">
        {!! $errors->first('shopcode', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group clearfix {{ $errors->has('locationname') ? 'has-error' : '' }}">
    <label for="locationname" class="col-md-3 col-sm-6 control-label">Location Name</label>
    <div class="col-md-9 col-sm-6 float-right">
        <input class="form-control " name="locationname" type="text" id="locationname" value="{{ old('locationname', optional($location)->locationname) }}" minlength="1" placeholder="Enter location name here...">
        {!! $errors->first('locationname', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group clearfix {{ $errors->has('locationDescription') ? 'has-error' : '' }}" style="display:none">
    <label for="locationDescription" class="col-md-3 col-sm-6 control-label">Location Description</label>
    <div class="col-md-9 col-sm-6 float-right">
        <input class="form-control " name="locationDescription" type="text" id="locationDescription" value="{{ old('locationDescription', optional($location)->locationDescription) }}" minlength="1" placeholder="Enter location description here...">
        {!! $errors->first('locationDescription', '<p class="help-block">:message</p>') !!}
    </div>
</div>

