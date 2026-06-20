
<div class="form-group {{ $errors->has('product_id') ? 'has-error' : '' }}">
    <label for="product_id" class="col-md-2 control-label">Product</label>
    <div class="col-md-10">
        <select class="form-control" id="product_id" name="product_id">
        	    <option value="" style="display: none;" {{ old('product_id', optional($productmap)->product_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select product</option>
        	@foreach ($products as $key => $product)
			    <option value="{{ $key }}" {{ old('product_id', optional($productmap)->product_id) == $key ? 'selected' : '' }}>
			    	{{ $product }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('product_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('cutomer_id') ? 'has-error' : '' }}">
    <label for="cutomer_id" class="col-md-2 control-label">Cutomer</label>
    <div class="col-md-10">
        <select class="form-control" id="cutomer_id" name="cutomer_id">
        	    <option value="" style="display: none;" {{ old('cutomer_id', optional($productmap)->cutomer_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select cutomer</option>
        	@foreach ($cutomers as $key => $cutomer)
			    <option value="{{ $key }}" {{ old('cutomer_id', optional($productmap)->cutomer_id) == $key ? 'selected' : '' }}>
			    	{{ $cutomer }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('cutomer_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('product') ? 'has-error' : '' }}">
    <label for="product" class="col-md-2 control-label">Product</label>
    <div class="col-md-10">
        <input class="form-control" name="product" type="text" id="product" value="{{ old('product', optional($productmap)->product) }}" minlength="1" placeholder="Enter product here...">
        {!! $errors->first('product', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('customer') ? 'has-error' : '' }}">
    <label for="customer" class="col-md-2 control-label">Customer</label>
    <div class="col-md-10">
        <input class="form-control" name="customer" type="text" id="customer" value="{{ old('customer', optional($productmap)->customer) }}" minlength="1" placeholder="Enter customer here...">
        {!! $errors->first('customer', '<p class="help-block">:message</p>') !!}
    </div>
</div>

