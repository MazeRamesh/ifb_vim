
<div class="form-group clearfix {{ $errors->has('state_name') ? 'has-error' : '' }}">
    <label for="state_name" class="col-md-3 col-sm-6 control-label">State Name</label>
    <div class="col-md-9 col-sm-6 float-right">
        <input class="form-control " name="state_name" type="text" id="state_name" value="{{ old('state_name', optional($state)->state_name) }}" minlength="1" placeholder="Enter state name here...">
        {!! $errors->first('state_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group clearfix {{ $errors->has('state_short_name') ? 'has-error' : '' }}">
    <label for="state_short_name" class="col-md-3 col-sm-6 control-label">State Short Name</label>
    <div class="col-md-9 col-sm-6 float-right">
        <input class="form-control " name="state_short_name" type="text" id="state_short_name" value="{{ old('state_short_name', optional($state)->state_short_name) }}" minlength="1" placeholder="Enter state short name here...">
        {!! $errors->first('state_short_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>
    
<div class="form-group clearfix {{ $errors->has('country_id') ? 'has-error' : '' }}">
    <label for="country_id" class="col-md-3 col-sm-6 control-label">Country</label>
    <div class="col-md-9 col-sm-6 float-right">
        <select class="form-control" id="country_id" name="country_id">
        	    <option value="" style="display: none;" {{ old('country_id', optional($state)->country_id ?: '') == '' ? 'selected' : '' }} disabled selected>Enter country here...</option>
        	@foreach ($countries as $key => $country)
			    <option value="{{ $key }}" {{ old('country_id', optional($state)->country_id) == $key ? 'selected' : '' }}>
			    	{{ $country }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('country_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group clearfix {{ $errors->has('state_active') ? 'has-error' : '' }}">
    <label for="state_active" class="col-md-3 col-sm-6 control-label">State Active</label>
    <div class="col-md-9 col-sm-6 float-right">
        <input class="form-control " name="state_active" type="text" id="state_active" value="{{ old('state_active', optional($state)->state_active) }}" minlength="1" placeholder="Enter state active here...">
        {!! $errors->first('state_active', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group clearfix {{ $errors->has('created_by') ? 'has-error' : '' }}">
    <label for="created_by" class="col-md-3 col-sm-6 control-label">Created By</label>
    <div class="col-md-9 col-sm-6 float-right">
        <select class="form-control" id="created_by" name="created_by">
        	    <option value="" style="display: none;" {{ old('created_by', optional($state)->created_by ?: '') == '' ? 'selected' : '' }} disabled selected>Select created by</option>
        	@foreach ($creators as $key => $creator)
			    <option value="{{ $key }}" {{ old('created_by', optional($state)->created_by) == $key ? 'selected' : '' }}>
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
        <input class="form-control " name="created_date" type="text" id="created_date" value="{{ old('created_date', optional($state)->created_date) }}" placeholder="Enter created date here...">
        {!! $errors->first('created_date', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group clearfix {{ $errors->has('altered_by') ? 'has-error' : '' }}">
    <label for="altered_by" class="col-md-3 col-sm-6 control-label">Altered By</label>
    <div class="col-md-9 col-sm-6 float-right">
        <select class="form-control" id="altered_by" name="altered_by">
        	    <option value="" style="display: none;" {{ old('altered_by', optional($state)->altered_by ?: '') == '' ? 'selected' : '' }} disabled selected>Select altered by</option>
        	@foreach ($alteredBies as $key => $alteredBy)
			    <option value="{{ $key }}" {{ old('altered_by', optional($state)->altered_by) == $key ? 'selected' : '' }}>
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
        <input class="form-control " name="altered_date" type="text" id="altered_date" value="{{ old('altered_date', optional($state)->altered_date) }}" placeholder="Enter altered date here...">
        {!! $errors->first('altered_date', '<p class="help-block">:message</p>') !!}
    </div>
</div>

