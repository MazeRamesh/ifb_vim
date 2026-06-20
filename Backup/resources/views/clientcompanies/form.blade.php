
<div class="form-group {{ $errors->has('cmpcode') ? 'has-error' : '' }}">
    <label for="cmpcode" class="col-md-2 control-label">Cmpcode</label>
    <div class="col-md-10">
        <input class="form-control" name="cmpcode" type="text" id="cmpcode" value="{{ old('cmpcode', optional($clientcompany)->cmpcode) }}" minlength="1" placeholder="Enter cmpcode here...">
        {!! $errors->first('cmpcode', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('cmpname') ? 'has-error' : '' }}">
    <label for="cmpname" class="col-md-2 control-label">Cmpname</label>
    <div class="col-md-10">
        <input class="form-control" name="cmpname" type="text" id="cmpname" value="{{ old('cmpname', optional($clientcompany)->cmpname) }}" minlength="1" placeholder="Enter cmpname here...">
        {!! $errors->first('cmpname', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('cmpmailingname') ? 'has-error' : '' }}">
    <label for="cmpmailingname" class="col-md-2 control-label">Cmpmailingname</label>
    <div class="col-md-10">
        <input class="form-control" name="cmpmailingname" type="text" id="cmpmailingname" value="{{ old('cmpmailingname', optional($clientcompany)->cmpmailingname) }}" minlength="1" placeholder="Enter cmpmailingname here...">
        {!! $errors->first('cmpmailingname', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('cmpaddress') ? 'has-error' : '' }}">
    <label for="cmpaddress" class="col-md-2 control-label">Cmpaddress</label>
    <div class="col-md-10">
        <input class="form-control" name="cmpaddress" type="text" id="cmpaddress" value="{{ old('cmpaddress', optional($clientcompany)->cmpaddress) }}" minlength="1" placeholder="Enter cmpaddress here...">
        {!! $errors->first('cmpaddress', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('cmpgstino') ? 'has-error' : '' }}">
    <label for="cmpgstino" class="col-md-2 control-label">Cmpgstino</label>
    <div class="col-md-10">
        <input class="form-control" name="cmpgstino" type="text" id="cmpgstino" value="{{ old('cmpgstino', optional($clientcompany)->cmpgstino) }}" minlength="1" placeholder="Enter cmpgstino here...">
        {!! $errors->first('cmpgstino', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('cmpcountry') ? 'has-error' : '' }}">
    <label for="cmpcountry" class="col-md-2 control-label">Cmpcountry</label>
    <div class="col-md-10">
        <input class="form-control" name="cmpcountry" type="number" id="cmpcountry" value="{{ old('cmpcountry', optional($clientcompany)->cmpcountry) }}" placeholder="Enter cmpcountry here...">
        {!! $errors->first('cmpcountry', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('cmpstate') ? 'has-error' : '' }}">
    <label for="cmpstate" class="col-md-2 control-label">Cmpstate</label>
    <div class="col-md-10">
        <input class="form-control" name="cmpstate" type="text" id="cmpstate" value="{{ old('cmpstate', optional($clientcompany)->cmpstate) }}" minlength="1" placeholder="Enter cmpstate here...">
        {!! $errors->first('cmpstate', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('cmpcity') ? 'has-error' : '' }}">
    <label for="cmpcity" class="col-md-2 control-label">Cmpcity</label>
    <div class="col-md-10">
        <input class="form-control" name="cmpcity" type="text" id="cmpcity" value="{{ old('cmpcity', optional($clientcompany)->cmpcity) }}" minlength="1" placeholder="Enter cmpcity here...">
        {!! $errors->first('cmpcity', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('cmpemail') ? 'has-error' : '' }}">
    <label for="cmpemail" class="col-md-2 control-label">Cmpemail</label>
    <div class="col-md-10">
        <input class="form-control" name="cmpemail" type="email" id="cmpemail" value="{{ old('cmpemail', optional($clientcompany)->cmpemail) }}" placeholder="Enter cmpemail here...">
        {!! $errors->first('cmpemail', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('cmpphoneno') ? 'has-error' : '' }}">
    <label for="cmpphoneno" class="col-md-2 control-label">Cmpphoneno</label>
    <div class="col-md-10">
        <input class="form-control" name="cmpphoneno" type="text" id="cmpphoneno" value="{{ old('cmpphoneno', optional($clientcompany)->cmpphoneno) }}" minlength="1" placeholder="Enter cmpphoneno here...">
        {!! $errors->first('cmpphoneno', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('cmpmobileno') ? 'has-error' : '' }}">
    <label for="cmpmobileno" class="col-md-2 control-label">Cmpmobileno</label>
    <div class="col-md-10">
        <input class="form-control" name="cmpmobileno" type="text" id="cmpmobileno" value="{{ old('cmpmobileno', optional($clientcompany)->cmpmobileno) }}" minlength="1" placeholder="Enter cmpmobileno here...">
        {!! $errors->first('cmpmobileno', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('cmpwebsite') ? 'has-error' : '' }}">
    <label for="cmpwebsite" class="col-md-2 control-label">Cmpwebsite</label>
    <div class="col-md-10">
        <input class="form-control" name="cmpwebsite" type="text" id="cmpwebsite" value="{{ old('cmpwebsite', optional($clientcompany)->cmpwebsite) }}" minlength="1" placeholder="Enter cmpwebsite here...">
        {!! $errors->first('cmpwebsite', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('cmplogo') ? 'has-error' : '' }}">
    <label for="cmplogo" class="col-md-2 control-label">Cmplogo</label>
    <div class="col-md-10">
        <input class="form-control" name="cmplogo" type="text" id="cmplogo" value="{{ old('cmplogo', optional($clientcompany)->cmplogo) }}" minlength="1" placeholder="Enter cmplogo here...">
        {!! $errors->first('cmplogo', '<p class="help-block">:message</p>') !!}
    </div>
</div>

