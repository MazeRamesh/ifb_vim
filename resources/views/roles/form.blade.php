
{{--<!-- <div class="form-group clearfix {{ $errors->has('company_id') ? 'has-error' : '' }}">
<label for="company_id" class="col-md-3 col-sm-6 control-label">Company</label>
<div class="col-md-9 col-sm-6 float-right">
<select class="form-control" id="company_id" name="company_id">
<option value="" style="display: none;" {{ old('company_id', optional($role)->company_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select company</option>
@foreach ($companies as $key => $company)
<option value="{{ $key }}" {{ old('company_id', optional($role)->company_id) == $key ? 'selected' : '' }}>
{{ $company }}
</option>
@endforeach
</select>

{!! $errors->first('company_id', '<p class="help-block">:message</p>') !!}
</div>
</div> -->--}}

<div class="form-group clearfix {{ $errors->has('name') ? 'has-error' : '' }}">
<label for="name" class="col-md-3 col-sm-6 control-label">Name</label>
<div class="col-md-9 col-sm-6 float-right">
<input class="form-control " name="name" type="text" id="name" value="{{ old('name', optional($role)->name) }}" minlength="1" placeholder="Enter role name here...">
{!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
</div>

<div class="form-group clearfix {{ $errors->has('display_name') ? 'has-error' : '' }}">
<label for="display_name" class="col-md-3 col-sm-6 control-label">Short Name</label>
<div class="col-md-9 col-sm-6 float-right">
<input class="form-control " name="display_name" type="text" id="display_name" value="{{ old('display_name', optional($role)->display_name) }}" minlength="1" placeholder="Enter role short name here...">
{!! $errors->first('display_name', '<p class="help-block">:message</p>') !!}
</div>
</div>

<div class="form-group clearfix {{ $errors->has('description') ? 'has-error' : '' }}">
<label for="description" class="col-md-3 col-sm-6 control-label">Description</label>
<div class="col-md-9 col-sm-6 float-right">
<input class="form-control " name="description" type="text" id="description" value="{{ old('description', optional($role)->description) }}" minlength="1" placeholder="Enter role description here...">
{!! $errors->first('description', '<p class="help-block">:message</p>') !!}
</div>
</div>

{{--<!-- <div class="form-group clearfix {{ $errors->has('clients_active') ? 'has-error' : '' }}">
<label for="clients_active" class="col-md-3 col-sm-6 control-label">Clients Active</label>
<div class="col-md-9 col-sm-6 float-right">
<input class="form-control " name="clients_active" type="text" id="clients_active" value="{{ old('clients_active', optional($role)->clients_active) }}" minlength="1" placeholder="Enter clients active here...">
{!! $errors->first('clients_active', '<p class="help-block">:message</p>') !!}
</div>
</div> -->--}}

