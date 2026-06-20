
<div class="row">
    <div class="col-md-6 form-group {{ $errors->has('transporterId') ? 'has-error' : '' }}">
        <label for="transporterId" class="col-md-2 control-label">Transporter Id</label>
            <input class="form-control" name="transporterId" type="text" id="transporterId" value="{{ old('transporterId', optional($transport)->transporterId) }}" minlength="1" placeholder="Enter transporter id here...">
            {!! $errors->first('transporterId', '<p class="help-block">:message</p>') !!}
    </div>

<div class="col-md-6 form-group {{ $errors->has('transporterName') ? 'has-error' : '' }}">
    <label for="transporterName" class="col-md-2 control-label"> Name</label>
        <input class="form-control" name="transporterName" type="text" id="transporterName" value="{{ old('transporterName', optional($transport)->transporterName) }}" minlength="1" placeholder="Enter transporter name here...">
        {!! $errors->first('transporterName', '<p class="help-block">:message</p>') !!}
</div>

<div class="col-md-6 form-group {{ $errors->has('transportertype') ? 'has-error' : '' }}">
    <label for="transportertype" class="col-md-2 control-label"> Type</label>
        <input class="form-control" name="transportertype" type="text" id="transportertype" value="{{ old('transportertype', optional($transport)->transportertype) }}" minlength="1" placeholder="Enter transportertype here...">
        {!! $errors->first('transportertype', '<p class="help-block">:message</p>') !!}
</div>

<div class="col-md-6 form-group {{ $errors->has('vehicleNo') ? 'has-error' : '' }}">
    <label for="vehicleNo" class="col-md-2 control-label">Vehicle No</label>
        <input class="form-control" name="vehicleNo" type="text" id="vehicleNo" value="{{ old('vehicleNo', optional($transport)->vehicleNo) }}" minlength="1" placeholder="Enter vehicle no here...">
        {!! $errors->first('vehicleNo', '<p class="help-block">:message</p>') !!}
</div>

<div class="col-md-6 form-group {{ $errors->has('vehicleType') ? 'has-error' : '' }}">
    <label for="vehicleType" class="col-md-2 control-label">Vehicle Type</label>
        <input class="form-control" name="vehicleType" type="text" id="vehicleType" value="{{ old('vehicleType', optional($transport)->vehicleType) }}" minlength="1" placeholder="Enter vehicle type here...">
        {!! $errors->first('vehicleType', '<p class="help-block">:message</p>') !!}
</div>

<div class="col-md-6 form-group {{ $errors->has('transDocNo') ? 'has-error' : '' }}">
    <label for="transDocNo" class="col-md-2 control-label"> Document No</label>
        <input class="form-control" name="transDocNo" type="text" id="transDocNo" value="{{ old('transDocNo', optional($transport)->transDocNo) }}" minlength="1" placeholder="Enter trans doc no here...">
        {!! $errors->first('transDocNo', '<p class="help-block">:message</p>') !!}
</div>

<div class="col-md-6 form-group {{ $errors->has('transMode') ? 'has-error' : '' }}">
    <label for="transMode" class="col-md-2 control-label"> Mode</label>
        <input class="form-control" name="transMode" type="text" id="transMode" value="{{ old('transMode', optional($transport)->transMode) }}" minlength="1" placeholder="Enter trans mode here...">
        {!! $errors->first('transMode', '<p class="help-block">:message</p>') !!}
</div>

<div class="col-md-6 form-group {{ $errors->has('transDistance') ? 'has-error' : '' }}">
    <label for="transDistance" class="col-md-2 control-label"> Distance</label>
        <input class="form-control" name="transDistance" type="text" id="transDistance" value="{{ old('transDistance', optional($transport)->transDistance) }}" minlength="1" placeholder="Enter trans distance here...">
        {!! $errors->first('transDistance', '<p class="help-block">:message</p>') !!}
</div>

<div class="col-md-6 form-group {{ $errors->has('transDocDate') ? 'has-error' : '' }}">
    <label for="transDocDate" class="col-md-2 control-label"> Date</label>
        <input class="form-control datepicker" name="transDocDate" type="text" id="transDocDate" value="{{ old('transDocDate', optional($transport)->transDocDate) }}" minlength="1" placeholder="Enter trans doc date here...">
        {!! $errors->first('transDocDate', '<p class="help-block">:message</p>') !!}
</div>

<div class="col-md-6 form-group {{ $errors->has('company_id') ? 'has-error' : '' }}">
    <label for="company_id" class="col-md-2 control-label">Company</label>

        <select class="form-control" id="company_id" name="company_id">
                {{--<!-- <option value="" style="display: none;" {{ old('company_id', optional($transport)->company_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select company</option> -->--}}
           @foreach ($companies as $key => $company)
                <option value="{{ $company->cmpcode }}" {{ old('company_id', optional($transport)->company_id) == $key ? 'selected' : '' }}>
                    {{ $company->cmpcode }} - {{ $company->cmpname }}
                </option>
            @endforeach
        </select>
        
        {!! $errors->first('company_id', '<p class="help-block">:message</p>') !!}

</div>

<div class ="row" style="display:none">

<div class="col-md-6 form-group {{ $errors->has('entrydate') ? 'has-error' : '' }}">
    <label for="entrydate" class="col-md-2 control-label">Entrydate</label>
        <input class="form-control" name="entrydate" type="text" id="entrydate" value="{{date('Y-m-d H:i:s'), old('entrydate', optional($transport)->entrydate) }}" minlength="1" placeholder="Enter entrydate here...">
        {!! $errors->first('entrydate', '<p class="help-block">:message</p>') !!}
</div>

<div class="col-md-6 form-group {{ $errors->has('createdby') ? 'has-error' : '' }}">
    <label for="createdby" class="col-md-2 control-label">Createdby</label>
        <input class="form-control" name="createdby" type="text" id="createdby" value="{{Auth::user()->name, old('createdby', optional($transport)->createdby) }}" minlength="1" placeholder="Enter createdby here...">
        {!! $errors->first('createdby', '<p class="help-block">:message</p>') !!}
</div>


</div>

@push('scripts')
<script>
      $( ".datepicker" ).datepicker({
dateFormat: "dd-mm-yy",
weekStart: 0,
calendarWeeks: true,
autoclose: true,
todayHighlight: true,
rtl: true,
orientation: "auto"
});
</script>
@endpush