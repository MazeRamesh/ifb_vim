
<div class="form-group clearfix {{ $errors->has('city_name') ? 'has-error' : '' }}">
    <label for="city_name" class="col-md-3 col-sm-6 control-label">City Name</label>
    <div class="col-md-9 col-sm-6 float-right">
        <input class="form-control " name="city_name" type="text" id="city_name" value="{{ old('city_name', optional($city)->city_name) }}" minlength="1" placeholder="Enter city name here...">
        {!! $errors->first('city_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group clearfix {{ $errors->has('city_short_name') ? 'has-error' : '' }}">
    <label for="city_short_name" class="col-md-3 col-sm-6 control-label">City Short Name</label>
    <div class="col-md-9 col-sm-6 float-right">
        <input class="form-control " name="city_short_name" type="text" id="city_short_name" value="{{ old('city_short_name', optional($city)->city_short_name) }}" minlength="1" placeholder="Enter city short name here...">
        {!! $errors->first('city_short_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group clearfix {{ $errors->has('state_id') ? 'has-error' : '' }}">
    <label for="state_id" class="col-md-3 col-sm-6 control-label">State</label>
    <div class="col-md-9 col-sm-6 float-right">
        <select class="form-control" id="state_id" name="state_id">
        	    <option value="" style="display: none;" {{ old('state_id', optional($city)->state_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select state</option>
        	@foreach ($states as $key => $state)
			    <option value="{{ $key }}" {{ old('state_id', optional($city)->state_id) == $key ? 'selected' : '' }}>
			    	{{ $state }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('state_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group clearfix {{ $errors->has('city_active') ? 'has-error' : '' }}">
    <label for="city_active" class="col-md-3 col-sm-6 control-label">City Active</label>
    <div class="col-md-9 col-sm-6 float-right">
        <input class="form-control " name="city_active" type="text" id="city_active" value="{{ old('city_active', optional($city)->city_active) }}" minlength="1" placeholder="Enter city active here...">
        {!! $errors->first('city_active', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group clearfix {{ $errors->has('created_by') ? 'has-error' : '' }}">
    <label for="created_by" class="col-md-3 col-sm-6 control-label">Created By</label>
    <div class="col-md-9 col-sm-6 float-right">
        <select class="form-control" id="created_by" name="created_by">
        	    <option value="" style="display: none;" {{ old('created_by', optional($city)->created_by ?: '') == '' ? 'selected' : '' }} disabled selected>Select created by</option>
        	@foreach ($creators as $key => $creator)
			    <option value="{{ $key }}" {{ old('created_by', optional($city)->created_by) == $key ? 'selected' : '' }}>
			    	{{ $creator }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('created_by', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group clearfix {{ $errors->has('created_date') ? 'has-error' : '' }}">
    <label for="created_date" class="col-md-3 col-sm-6 control-label">Created Date</label>
    <div class="col-md-9 col-sm-6 float-right">
        <input class="form-control " name="created_date" type="text" id="created_date" value="{{ old('created_date', optional($city)->created_date) }}" placeholder="Enter created date here...">
        {!! $errors->first('created_date', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group clearfix {{ $errors->has('altered_by') ? 'has-error' : '' }}">
    <label for="altered_by" class="col-md-3 col-sm-6 control-label">Altered By</label>
    <div class="col-md-9 col-sm-6 float-right">
        <select class="form-control" id="altered_by" name="altered_by">
        	    <option value="" style="display: none;" {{ old('altered_by', optional($city)->altered_by ?: '') == '' ? 'selected' : '' }} disabled selected>Select altered by</option>
        	@foreach ($alteredBies as $key => $alteredBy)
			    <option value="{{ $key }}" {{ old('altered_by', optional($city)->altered_by) == $key ? 'selected' : '' }}>
			    	{{ $alteredBy }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('altered_by', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group clearfix {{ $errors->has('altered_date') ? 'has-error' : '' }}">
    <label for="altered_date" class="col-md-3 col-sm-6 control-label">Altered Date</label>
    <div class="col-md-9 col-sm-6 float-right">
        <input class="form-control " name="altered_date" type="text" id="altered_date" value="{{ old('altered_date', optional($city)->altered_date) }}" placeholder="Enter altered date here...">
        {!! $errors->first('altered_date', '<p class="help-block">:message</p>') !!}
    </div>
</div>

