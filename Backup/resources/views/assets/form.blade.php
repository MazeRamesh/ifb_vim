
<div class="form-group clearfix {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-3 col-sm-6 control-label">Name</label>
    <div class="col-md-9 col-sm-6 float-right">
        <input class="form-control " name="name" type="text" id="name" value="{{ old('name', optional($asset)->name) }}" minlength="1" maxlength="255" placeholder="Enter name here...">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group clearfix {{ $errors->has('description') ? 'has-error' : '' }}">
    <label for="description" class="col-md-3 col-sm-6 control-label">Description</label>
    <div class="col-md-9 col-sm-6 float-right">
        <textarea class="form-control" name="description" cols="50" rows="2" id="description" minlength="1" maxlength="1000">{{ old('description', optional($asset)->description) }}</textarea>
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group clearfix {{ $errors->has('location') ? 'has-error' : '' }}">
    <label for="location" class="col-md-3 col-sm-6 control-label">Location</label>
    <div class="col-md-9 col-sm-6 float-right">
        <input class="form-control " name="location" type="text" id="location" value="{{ old('location', optional($asset)->location) }}" minlength="1" placeholder="Enter location here...">
        {!! $errors->first('location', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group clearfix {{ $errors->has('email') ? 'has-error' : '' }}">
    <label for="email" class="col-md-3 col-sm-6 control-label">Email</label>
    <div class="col-md-9 col-sm-6 float-right">
        <input class="form-control " name="email" type="email" id="email" value="{{ old('email', optional($asset)->email) }}" placeholder="Enter email here...">
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div>

