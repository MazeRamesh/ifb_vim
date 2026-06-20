
<div class="form-group {{ $errors->has('pono_id') ? 'has-error' : '' }}">
    <label for="pono_id" class="col-md-2 control-label">Pono</label>
    <div class="col-md-10">
        <select class="form-control" id="pono_id" name="pono_id">
        	    <option value="" style="display: none;" {{ old('pono_id', optional($podetails)->pono_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select pono</option>
        	@foreach ($ponos as $key => $pono)
			    <option value="{{ $key }}" {{ old('pono_id', optional($podetails)->pono_id) == $key ? 'selected' : '' }}>
			    	{{ $pono }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('pono_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('podate') ? 'has-error' : '' }}">
    <label for="podate" class="col-md-2 control-label">Podate</label>
    <div class="col-md-10">
        <input class="form-control" name="podate" type="text" id="podate" value="{{ old('podate', optional($podetails)->podate) }}" minlength="1" placeholder="Enter podate here...">
        {!! $errors->first('podate', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('productcode_id') ? 'has-error' : '' }}">
    <label for="productcode_id" class="col-md-2 control-label">Productcode</label>
    <div class="col-md-10">
        <select class="form-control" id="productcode_id" name="productcode_id">
        	    <option value="" style="display: none;" {{ old('productcode_id', optional($podetails)->productcode_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select productcode</option>
        	@foreach ($productcodes as $key => $productcode)
			    <option value="{{ $key }}" {{ old('productcode_id', optional($podetails)->productcode_id) == $key ? 'selected' : '' }}>
			    	{{ $productcode }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('productcode_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('productname') ? 'has-error' : '' }}">
    <label for="productname" class="col-md-2 control-label">Productname</label>
    <div class="col-md-10">
        <input class="form-control" name="productname" type="text" id="productname" value="{{ old('productname', optional($podetails)->productname) }}" minlength="1" placeholder="Enter productname here...">
        {!! $errors->first('productname', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('partno') ? 'has-error' : '' }}">
    <label for="partno" class="col-md-2 control-label">Partno</label>
    <div class="col-md-10">
        <input class="form-control" name="partno" type="text" id="partno" value="{{ old('partno', optional($podetails)->partno) }}" minlength="1" placeholder="Enter partno here...">
        {!! $errors->first('partno', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('productdescription') ? 'has-error' : '' }}">
    <label for="productdescription" class="col-md-2 control-label">Productdescription</label>
    <div class="col-md-10">
        <input class="form-control" name="productdescription" type="text" id="productdescription" value="{{ old('productdescription', optional($podetails)->productdescription) }}" minlength="1" placeholder="Enter productdescription here...">
        {!! $errors->first('productdescription', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('uom') ? 'has-error' : '' }}">
    <label for="uom" class="col-md-2 control-label">Uom</label>
    <div class="col-md-10">
        <input class="form-control" name="uom" type="text" id="uom" value="{{ old('uom', optional($podetails)->uom) }}" minlength="1" placeholder="Enter uom here...">
        {!! $errors->first('uom', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('productmanufactdate') ? 'has-error' : '' }}">
    <label for="productmanufactdate" class="col-md-2 control-label">Productmanufactdate</label>
    <div class="col-md-10">
        <input class="form-control" name="productmanufactdate" type="text" id="productmanufactdate" value="{{ old('productmanufactdate', optional($podetails)->productmanufactdate) }}" minlength="1" placeholder="Enter productmanufactdate here...">
        {!! $errors->first('productmanufactdate', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('productexpirydate') ? 'has-error' : '' }}">
    <label for="productexpirydate" class="col-md-2 control-label">Productexpirydate</label>
    <div class="col-md-10">
        <input class="form-control" name="productexpirydate" type="text" id="productexpirydate" value="{{ old('productexpirydate', optional($podetails)->productexpirydate) }}" minlength="1" placeholder="Enter productexpirydate here...">
        {!! $errors->first('productexpirydate', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('productmrprate') ? 'has-error' : '' }}">
    <label for="productmrprate" class="col-md-2 control-label">Productmrprate</label>
    <div class="col-md-10">
        <input class="form-control" name="productmrprate" type="text" id="productmrprate" value="{{ old('productmrprate', optional($podetails)->productmrprate) }}" minlength="1" placeholder="Enter productmrprate here...">
        {!! $errors->first('productmrprate', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('productsellingrate') ? 'has-error' : '' }}">
    <label for="productsellingrate" class="col-md-2 control-label">Productsellingrate</label>
    <div class="col-md-10">
        <input class="form-control" name="productsellingrate" type="text" id="productsellingrate" value="{{ old('productsellingrate', optional($podetails)->productsellingrate) }}" minlength="1" placeholder="Enter productsellingrate here...">
        {!! $errors->first('productsellingrate', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('productdealerrate') ? 'has-error' : '' }}">
    <label for="productdealerrate" class="col-md-2 control-label">Productdealerrate</label>
    <div class="col-md-10">
        <input class="form-control" name="productdealerrate" type="text" id="productdealerrate" value="{{ old('productdealerrate', optional($podetails)->productdealerrate) }}" minlength="1" placeholder="Enter productdealerrate here...">
        {!! $errors->first('productdealerrate', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('productigstrate') ? 'has-error' : '' }}">
    <label for="productigstrate" class="col-md-2 control-label">Productigstrate</label>
    <div class="col-md-10">
        <input class="form-control" name="productigstrate" type="text" id="productigstrate" value="{{ old('productigstrate', optional($podetails)->productigstrate) }}" minlength="1" placeholder="Enter productigstrate here...">
        {!! $errors->first('productigstrate', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('productcgstrate') ? 'has-error' : '' }}">
    <label for="productcgstrate" class="col-md-2 control-label">Productcgstrate</label>
    <div class="col-md-10">
        <input class="form-control" name="productcgstrate" type="text" id="productcgstrate" value="{{ old('productcgstrate', optional($podetails)->productcgstrate) }}" minlength="1" placeholder="Enter productcgstrate here...">
        {!! $errors->first('productcgstrate', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('productsgstrate') ? 'has-error' : '' }}">
    <label for="productsgstrate" class="col-md-2 control-label">Productsgstrate</label>
    <div class="col-md-10">
        <input class="form-control" name="productsgstrate" type="text" id="productsgstrate" value="{{ old('productsgstrate', optional($podetails)->productsgstrate) }}" minlength="1" placeholder="Enter productsgstrate here...">
        {!! $errors->first('productsgstrate', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('productqty') ? 'has-error' : '' }}">
    <label for="productqty" class="col-md-2 control-label">Productqty</label>
    <div class="col-md-10">
        <input class="form-control" name="productqty" type="text" id="productqty" value="{{ old('productqty', optional($podetails)->productqty) }}" minlength="1" placeholder="Enter productqty here...">
        {!! $errors->first('productqty', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('producthsncode') ? 'has-error' : '' }}">
    <label for="producthsncode" class="col-md-2 control-label">Producthsncode</label>
    <div class="col-md-10">
        <input class="form-control" name="producthsncode" type="text" id="producthsncode" value="{{ old('producthsncode', optional($podetails)->producthsncode) }}" minlength="1" placeholder="Enter producthsncode here...">
        {!! $errors->first('producthsncode', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('productigstamount') ? 'has-error' : '' }}">
    <label for="productigstamount" class="col-md-2 control-label">Productigstamount</label>
    <div class="col-md-10">
        <input class="form-control" name="productigstamount" type="text" id="productigstamount" value="{{ old('productigstamount', optional($podetails)->productigstamount) }}" minlength="1" placeholder="Enter productigstamount here...">
        {!! $errors->first('productigstamount', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('productcgstamount') ? 'has-error' : '' }}">
    <label for="productcgstamount" class="col-md-2 control-label">Productcgstamount</label>
    <div class="col-md-10">
        <input class="form-control" name="productcgstamount" type="text" id="productcgstamount" value="{{ old('productcgstamount', optional($podetails)->productcgstamount) }}" minlength="1" placeholder="Enter productcgstamount here...">
        {!! $errors->first('productcgstamount', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('productsgstamount') ? 'has-error' : '' }}">
    <label for="productsgstamount" class="col-md-2 control-label">Productsgstamount</label>
    <div class="col-md-10">
        <input class="form-control" name="productsgstamount" type="text" id="productsgstamount" value="{{ old('productsgstamount', optional($podetails)->productsgstamount) }}" minlength="1" placeholder="Enter productsgstamount here...">
        {!! $errors->first('productsgstamount', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('netamount') ? 'has-error' : '' }}">
    <label for="netamount" class="col-md-2 control-label">Netamount</label>
    <div class="col-md-10">
        <input class="form-control" name="netamount" type="text" id="netamount" value="{{ old('netamount', optional($podetails)->netamount) }}" minlength="1" placeholder="Enter netamount here...">
        {!! $errors->first('netamount', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('taxableamount') ? 'has-error' : '' }}">
    <label for="taxableamount" class="col-md-2 control-label">Taxableamount</label>
    <div class="col-md-10">
        <input class="form-control" name="taxableamount" type="text" id="taxableamount" value="{{ old('taxableamount', optional($podetails)->taxableamount) }}" minlength="1" placeholder="Enter taxableamount here...">
        {!! $errors->first('taxableamount', '<p class="help-block">:message</p>') !!}
    </div>
</div>

