
<div class="form-group {{ $errors->has('quotation_number') ? 'has-error' : '' }}">
    <label for="quotation_number" class="col-md-2 control-label">Quotation Number</label>
    <div class="col-md-10">
        <input class="form-control" name="quotation_number" type="number" id="quotation_number" value="{{ old('quotation_number', optional($quotation)->quotation_number) }}" placeholder="Enter quotation number here...">
        {!! $errors->first('quotation_number', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('quotation_date') ? 'has-error' : '' }}">
    <label for="quotation_date" class="col-md-2 control-label">Quotation Date</label>
    <div class="col-md-10">
        <input class="form-control" name="quotation_date" type="text" id="quotation_date" value="{{ old('quotation_date', optional($quotation)->quotation_date) }}" placeholder="Enter quotation date here...">
        {!! $errors->first('quotation_date', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('quotation_company_code') ? 'has-error' : '' }}">
    <label for="quotation_company_code" class="col-md-2 control-label">Quotation Company Code</label>
    <div class="col-md-10">
        <input class="form-control" name="quotation_company_code" type="text" id="quotation_company_code" value="{{ old('quotation_company_code', optional($quotation)->quotation_company_code) }}" minlength="1" placeholder="Enter quotation company code here...">
        {!! $errors->first('quotation_company_code', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('quotation_customer_code') ? 'has-error' : '' }}">
    <label for="quotation_customer_code" class="col-md-2 control-label">Quotation Customer Code</label>
    <div class="col-md-10">
        <input class="form-control" name="quotation_customer_code" type="text" id="quotation_customer_code" value="{{ old('quotation_customer_code', optional($quotation)->quotation_customer_code) }}" minlength="1" placeholder="Enter quotation customer code here...">
        {!! $errors->first('quotation_customer_code', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('project_name') ? 'has-error' : '' }}">
    <label for="project_name" class="col-md-2 control-label">Project Name</label>
    <div class="col-md-10">
        <input class="form-control" name="project_name" type="text" id="project_name" value="{{ old('project_name', optional($quotation)->project_name) }}" minlength="1" placeholder="Enter project name here...">
        {!! $errors->first('project_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
    <label for="description" class="col-md-2 control-label">Description</label>
    <div class="col-md-10">
        <textarea class="form-control" name="description" cols="50" rows="10" id="description" minlength="1" maxlength="1000">{{ old('description', optional($quotation)->description) }}</textarea>
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('reference') ? 'has-error' : '' }}">
    <label for="reference" class="col-md-2 control-label">Reference</label>
    <div class="col-md-10">
        <input class="form-control" name="reference" type="text" id="reference" value="{{ old('reference', optional($quotation)->reference) }}" minlength="1" placeholder="Enter reference here...">
        {!! $errors->first('reference', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('quotation_product_code') ? 'has-error' : '' }}">
    <label for="quotation_product_code" class="col-md-2 control-label">Quotation Product Code</label>
    <div class="col-md-10">
        <input class="form-control" name="quotation_product_code" type="text" id="quotation_product_code" value="{{ old('quotation_product_code', optional($quotation)->quotation_product_code) }}" minlength="1" placeholder="Enter quotation product code here...">
        {!! $errors->first('quotation_product_code', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('item_description') ? 'has-error' : '' }}">
    <label for="item_description" class="col-md-2 control-label">Item Description</label>
    <div class="col-md-10">
        <input class="form-control" name="item_description" type="text" id="item_description" value="{{ old('item_description', optional($quotation)->item_description) }}" minlength="1" placeholder="Enter item description here...">
        {!! $errors->first('item_description', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('item_price') ? 'has-error' : '' }}">
    <label for="item_price" class="col-md-2 control-label">Item Price</label>
    <div class="col-md-10">
        <input class="form-control" name="item_price" type="text" id="item_price" value="{{ old('item_price', optional($quotation)->item_price) }}" minlength="1" placeholder="Enter item price here...">
        {!! $errors->first('item_price', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('item_sgst') ? 'has-error' : '' }}">
    <label for="item_sgst" class="col-md-2 control-label">Item Sgst</label>
    <div class="col-md-10">
        <input class="form-control" name="item_sgst" type="text" id="item_sgst" value="{{ old('item_sgst', optional($quotation)->item_sgst) }}" minlength="1" placeholder="Enter item sgst here...">
        {!! $errors->first('item_sgst', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('item_cgst') ? 'has-error' : '' }}">
    <label for="item_cgst" class="col-md-2 control-label">Item Cgst</label>
    <div class="col-md-10">
        <input class="form-control" name="item_cgst" type="text" id="item_cgst" value="{{ old('item_cgst', optional($quotation)->item_cgst) }}" minlength="1" placeholder="Enter item cgst here...">
        {!! $errors->first('item_cgst', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('item_igst') ? 'has-error' : '' }}">
    <label for="item_igst" class="col-md-2 control-label">Item Igst</label>
    <div class="col-md-10">
        <input class="form-control" name="item_igst" type="text" id="item_igst" value="{{ old('item_igst', optional($quotation)->item_igst) }}" minlength="1" placeholder="Enter item igst here...">
        {!! $errors->first('item_igst', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('item_subtotal') ? 'has-error' : '' }}">
    <label for="item_subtotal" class="col-md-2 control-label">Item Subtotal</label>
    <div class="col-md-10">
        <input class="form-control" name="item_subtotal" type="text" id="item_subtotal" value="{{ old('item_subtotal', optional($quotation)->item_subtotal) }}" minlength="1" placeholder="Enter item subtotal here...">
        {!! $errors->first('item_subtotal', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('item_taxtotal') ? 'has-error' : '' }}">
    <label for="item_taxtotal" class="col-md-2 control-label">Item Taxtotal</label>
    <div class="col-md-10">
        <input class="form-control" name="item_taxtotal" type="text" id="item_taxtotal" value="{{ old('item_taxtotal', optional($quotation)->item_taxtotal) }}" minlength="1" placeholder="Enter item taxtotal here...">
        {!! $errors->first('item_taxtotal', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('quotation_amount') ? 'has-error' : '' }}">
    <label for="quotation_amount" class="col-md-2 control-label">Quotation Amount</label>
    <div class="col-md-10">
        <input class="form-control" name="quotation_amount" type="text" id="quotation_amount" value="{{ old('quotation_amount', optional($quotation)->quotation_amount) }}" minlength="1" placeholder="Enter quotation amount here...">
        {!! $errors->first('quotation_amount', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('quotation_amount_inwords') ? 'has-error' : '' }}">
    <label for="quotation_amount_inwords" class="col-md-2 control-label">Quotation Amount Inwords</label>
    <div class="col-md-10">
        <input class="form-control" name="quotation_amount_inwords" type="text" id="quotation_amount_inwords" value="{{ old('quotation_amount_inwords', optional($quotation)->quotation_amount_inwords) }}" minlength="1" placeholder="Enter quotation amount inwords here...">
        {!! $errors->first('quotation_amount_inwords', '<p class="help-block">:message</p>') !!}
    </div>
</div>

