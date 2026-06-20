
<div class="form-group clearfix">
    <label for="material_code" class="col-md-3 col-sm-6 control-label">Material Code<span class="text-danger">*</span></label>
    <div class="col-md-9 col-sm-6 float-right">
        <input class="form-control {{ $errors->has('material_code') ? 'is-invalid' : '' }}" name="material_code" type="text" id="material_code" required value="{{ old('material_code', optional($materialDetail)->material_code) }}" minlength="1" placeholder="Enter material code here...">
        {!! $errors->first('material_code', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>

<div class="form-group clearfix">
    <label for="part_no" class="col-md-3 col-sm-6 control-label">Part No<span class="text-danger">*</span></label>
    <div class="col-md-9 col-sm-6 float-right">
        <input class="form-control {{ $errors->has('part_no') ? 'is-invalid' : '' }}" name="part_no" type="text" id="part_no" required value="{{ old('part_no', optional($materialDetail)->part_no) }}" minlength="1" placeholder="Enter part no here...">
        {!! $errors->first('part_no', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>

<div class="form-group clearfix">
    <label for="customer_part_no" class="col-md-3 col-sm-6 control-label">Customer Part No<span class="text-danger">*</span></label>
    <div class="col-md-9 col-sm-6 float-right">
        <input class="form-control {{ $errors->has('customer_part_no') ? 'is-invalid' : '' }}" name="customer_part_no" type="text" id="customer_part_no" required value="{{ old('customer_part_no', optional($materialDetail)->customer_part_no) }}" minlength="1" placeholder="Enter customer part no here...">
        {!! $errors->first('customer_part_no', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>

<div class="form-group clearfix">
    <label for="shop_code" class="col-md-3 col-sm-6 control-label">Shop Code<span class="text-danger">*</span></label>
    <div class="col-md-9 col-sm-6 float-right">
        <input class="form-control {{ $errors->has('shop_code') ? 'is-invalid' : '' }}" name="shop_code" type="text" id="shop_code" required value="{{ old('shop_code', optional($materialDetail)->shop_code) }}" minlength="1" placeholder="Enter shop code here...">
        {!! $errors->first('shop_code', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>

<div class="form-group clearfix">
    <label for="shop" class="col-md-3 col-sm-6 control-label">Shop<span class="text-danger">*</span></label>
    <div class="col-md-9 col-sm-6 float-right">
        <input class="form-control {{ $errors->has('shop') ? 'is-invalid' : '' }}" name="shop" type="text" id="shop" required value="{{ old('shop', optional($materialDetail)->shop) }}" minlength="1" placeholder="Enter shop here...">
        {!! $errors->first('shop', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>

<div class="form-group clearfix">
    <label for="gate" class="col-md-3 col-sm-6 control-label">Gate<span class="text-danger">*</span></label>
    <div class="col-md-9 col-sm-6 float-right">
        <input required class="form-control {{ $errors->has('gate') ? 'is-invalid' : '' }}" name="gate" type="text" id="gate" value="{{ old('gate', optional($materialDetail)->gate) }}" minlength="1" placeholder="Enter gate here...">
        {!! $errors->first('gate', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>

<div class="form-group clearfix">
    <label for="box_qty" class="col-md-3 col-sm-6 control-label">Box Qty<span class="text-danger">*</span></label>
    <div class="col-md-9 col-sm-6 float-right">
        <input class="form-control {{ $errors->has('box_qty') ? 'is-invalid' : '' }}" name="box_qty" required type="number" min="1" id="box_qty" value="{{ old('box_qty', optional($materialDetail)->box_qty)??1 }}" minlength="1" placeholder="Enter box qty here...">
        {!! $errors->first('box_qty', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>

<div class="form-group clearfix">
    <label for="plant_code" class="col-md-3 col-sm-6 control-label">Plant Code<span class="text-danger">*</span></label>
    <div class="col-md-9 col-sm-6 float-right">
        <input required class="form-control {{ $errors->has('plant_code') ? 'is-invalid' : '' }}" name="plant_code" type="text" id="plant_code" value="{{ old('plant_code', optional($materialDetail)->plant_code) }}" minlength="1" placeholder="Enter plant code here...">
        {!! $errors->first('plant_code', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>

<div class="form-group clearfix">
    <label for="hsn_code" class="col-md-3 col-sm-6 control-label">Hsn Code<span class="text-danger">*</span></label>
    <div class="col-md-9 col-sm-6 float-right">
        <input required class="form-control {{ $errors->has('hsn_code') ? 'is-invalid' : '' }}" name="hsn_code" type="text" id="hsn_code" value="{{ old('hsn_code', optional($materialDetail)->hsn_code) }}" minlength="1" placeholder="Enter hsn code here...">
        {!! $errors->first('hsn_code', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>

<div class="form-group clearfix">
    <label for="gst_in" class="col-md-3 col-sm-6 control-label">Gst In<span class="text-danger">*</span></label>
    <div class="col-md-9 col-sm-6 float-right">
        <input required class="form-control {{ $errors->has('gst_in') ? 'is-invalid' : '' }}" name="gst_in" type="text" id="gst_in" value="{{ old('gst_in', optional($materialDetail)->gst_in) }}" minlength="1" placeholder="Enter gst in here...">
        {!! $errors->first('gst_in', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>

<div class="form-group clearfix">
    <label for="product_desc" class="col-md-3 col-sm-6 control-label">Product Desc<span class="text-danger">*</span></label>
    <div class="col-md-9 col-sm-6 float-right">
        <input required class="form-control {{ $errors->has('product_desc') ? 'is-invalid' : '' }}" name="product_desc" type="text" id="product_desc" value="{{ old('product_desc', optional($materialDetail)->product_desc) }}" minlength="1" placeholder="Enter product desc here...">
        {!! $errors->first('product_desc', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>

