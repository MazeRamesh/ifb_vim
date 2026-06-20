
<div class="form-group clearfix {{ $errors->has('fieldsname') ? 'has-error' : '' }}">
    <label for="fieldsname" class="col-md-3 col-sm-6 control-label">Fieldsname</label>
    <div class="col-md-9 col-sm-6 float-right">
        <input class="form-control " name="fieldsname" type="text" id="fieldsname" value="{{ old('fieldsname', optional($dropDowns)->fieldsname) }}" minlength="1" placeholder="Enter fields name here...">
        {!! $errors->first('fieldsname', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group clearfix {{ $errors->has('optionvalue') ? 'has-error' : '' }}">
    <label for="optionvalue" class="col-md-3 col-sm-6 control-label">Option value</label>
    <div class="col-md-9 col-sm-6 float-right">
        <input class="form-control " name="optionvalue" type="text" id="optionvalue" value="{{ old('optionvalue', optional($dropDowns)->optionvalue) }}" minlength="1" placeholder="Enter option value here...">
        {!! $errors->first('optionvalue', '<p class="help-block">:message</p>') !!}
    </div>
</div>
