
    <div class="row">
        <div class="col-md-6 form-group {{ $errors->has('empcode') ? 'has-error' : '' }}">
                <label for="empcode" class="col-md-6 control-label lab">Employee Code<b class="imp">*</b></label>
                <input class="form-control" name="empcode" type="text" id="empcode" value="{{ old('empcode', optional($emplayee)->empcode) }}" minlength="1"  @if($editflag==true) readonly @endif>
                {!! $errors->first('empcode', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="col-md-6 form-group {{ $errors->has('empname') ? 'has-error' : '' }}">
            <label for="empname" class="col-md-6 control-label lab">Name<b class="imp">*</b></label>
            <input class="form-control" name="empname" type="text" id="empname" value="{{ old('empname', optional($emplayee)->empname) }}" minlength="1" >
            {!! $errors->first('empname', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="col-md-6 form-group {{ $errors->has('empplant') ? 'has-error' : '' }}">
                <label for="empplant" class="col-md-6 control-label lab">Plant Code<b class="imp">*</b></label>
               <select class="form-control" id="empplant" name="empplant">
                        <option value="" style="display: none;" {{ old('empplant', optional($emplayee)->empplant ?: '') == '' ? 'selected' : '' }} disabled selected>Select company</option>
                    @foreach ($plants as $key => $plant)
                        <option value="{{ $plant->plantname }}" {{ old('empplant', optional($emplayee)->empplant) == $key ? 'selected' : '' }}>
                            {{ $plant->plantcode }} - {{ $plant->plantname }}
                        </option>
                    @endforeach
                </select>
                {!! $errors->first('empplant', '<p class="help-block">:message</p>') !!}
        </div>
{{--<!--         <div class="col-md-6 form-group {{ $errors->has('company_id') ? 'has-error' : '' }}">
            <label for="company_id" class="col-md-6 control-label">Name</label>
                <select class="form-control" id="company_id" name="company_id" readonly>
                        <option value="" style="display: none;" {{ old('company_id', optional($emplayee)->company_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select company</option>
                    @foreach ($companies as $key => $company)
                        <option value="{{ $company->cmpcode }}" {{ old('company_id', optional($emplayee)->company_id) == $key ? 'selected' : '' }}>
                            {{ $company->cmpcode }} - {{ $company->cmpname }}
                        </option>
                    @endforeach
                </select>
                {!! $errors->first('company_id', '<p class="help-block">:message</p>') !!}
        </div> -->--}}
        <div class="col-md-6 form-group {{ $errors->has('empemail') ? 'has-error' : '' }}">
            <label for="empemail" class="col-md-6 control-label lab">Email<b class="imp">*</b></label>
                <input class="form-control" name="empemail" type="email" id="empemail" value="{{ old('empemail', optional($emplayee)->empemail) }}" >
                {!! $errors->first('empemail', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="col-md-6 form-group {{ $errors->has('empmobile') ? 'has-error' : '' }}">
            <label for="empmobile" class="col-md-6 control-label lab">Mobile<b class="imp">*</b></label>
                <input class="form-control" name="empmobile" type="text" id="empmobile" value="{{ old('empmobile', optional($emplayee)->empmobile) }}" minlength="1" >
                {!! $errors->first('empmobile', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="col-md-6 form-group {{ $errors->has('empaddress') ? 'has-error' : '' }}">
            <label for="empaddress" class="col-md-6 control-label lab">Address</label>
                <textarea class="form-control" name="empaddress" type="text" id="empaddress" value="{{ old('empaddress', optional($emplayee)->empaddress) }}" minlength="1"></textarea>
                {!! $errors->first('empaddress', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="col-md-6 form-group {{ $errors->has('pincode') ? 'has-error' : '' }}">
            <label for="pincode" class="col-md-6 control-label lab">Enter Pincode</label>
                <input class="form-control" name="pincode" type="text" id="pincode" value="{{old('pincode', optional($emplayee)->pincode) }}">
                {!! $errors->first('pincode', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="col-md-6 form-group {{ $errors->has('empcity') ? 'has-error' : '' }}">
            <label for="empcity" class="col-md-6 control-label lab"> City</label>
         
                <input class="form-control" name="empcity" type="text" id="empcity" value="{{ old('empcity', optional($emplayee)->empcity) }}" minlength="1">
                {!! $errors->first('empcity', '<p class="help-block">:message</p>') !!}
        </div>

       <!--  <div class="col-md-6 form-group {{ $errors->has('empplace') ? 'has-error' : '' }}">
            <label for="empplace" class="col-md-6 control-label">Place</label>
                <input class="form-control" name="empplace" type="text" id="empplace" value="{{ old('empplace', optional($emplayee)->empplace) }}" minlength="1">
                {!! $errors->first('empplace', '<p class="help-block">:message</p>') !!}
        </div> -->
        <div class="col-md-6 form-group {{ $errors->has('empstatus') ? 'has-error' : '' }}">
            <label for="empstatus" class="col-md-6 control-label lab"> Status</label>
                <select class="form-control" id="empstatus" name="empstatus">
                        <option value="" style="display: none;" {{ old('empstatus', optional($emplayee)->empstatus ?: '') == '' ? 'selected' : '' }} disabled selected>setect empstatus here...</option>
                    @foreach (['Active' => 'Active',
        'Inactive' => 'Inactive'] as $key => $text)
                        <option value="{{ $key }}" {{ old('empstatus', optional($emplayee)->empstatus) == $key ? 'selected' : '' }}>
                            {{ $text }}
                        </option>
                    @endforeach
                </select>
                
                {!! $errors->first('empstatus', '<p class="help-block">:message</p>') !!}
        </div>
</div>













