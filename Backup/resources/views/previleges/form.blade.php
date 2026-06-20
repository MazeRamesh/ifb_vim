
<div class="form-group clearfix {{ $errors->has('company_id') ? 'has-error' : '' }}">
    <label for="company_id" class="col-md-3 col-sm-6 control-label">Company</label>
    <div class="col-md-9 col-sm-6 float-right">
        <select class="form-control" id="company_id" name="company_id">
        	    <option value="" style="display: none;" {{ old('company_id', optional($previlege)->company_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select company</option>
        	@foreach ($companies as $key => $company)
			    <option value="{{ $key }}" {{ old('company_id', optional($previlege)->company_id) == $key ? 'selected' : '' }}>
			    	{{ $company }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('company_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group clearfix {{ $errors->has('priviledge_name') ? 'has-error' : '' }}">
    <label for="priviledge_name" class="col-md-3 col-sm-6 control-label">Priviledge Name</label>
    <div class="col-md-9 col-sm-6 float-right">
        <input class="form-control " name="priviledge_name" type="text" id="priviledge_name" value="{{ old('priviledge_name', optional($previlege)->priviledge_name) }}" minlength="1" placeholder="Enter priviledge name here...">
        {!! $errors->first('priviledge_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group clearfix {{ $errors->has('priviledge_active') ? 'has-error' : '' }}">
    <label for="priviledge_active" class="col-md-3 col-sm-6 control-label">Priviledge Active</label>
    <div class="col-md-9 col-sm-6 float-right">
        <input class="form-control " name="priviledge_active" type="text" id="priviledge_active" value="{{ old('priviledge_active', optional($previlege)->priviledge_active) }}" minlength="1" placeholder="Enter priviledge active here...">
        {!! $errors->first('priviledge_active', '<p class="help-block">:message</p>') !!}
    </div>
</div>

