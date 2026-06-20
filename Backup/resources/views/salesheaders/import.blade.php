@extends('layouts.app')
@section('page-title','Sales Invoice')
@section('importpage','menu-open')
@section('content')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> --}}
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
   <!-- Compiled and minified CSS -->

   <!-- Compiled and minified JavaScript -->
<style>

.btn {
  line-height: 31px;
  position: relative;
  padding: 5px 22px;
  border: 0;
  margin: 10px;
  cursor: pointer;
  border-radius: 2px;
  text-transform: uppercase;
  text-decoration: none;
  outline: none !important;
  -webkit-transition: 0.2s ease-out;
  -moz-transition: 0.2s ease-out;
  -o-transition: 0.2s ease-out;
  -ms-transition: 0.2s ease-out;
  transition: 0.2s ease-out;
}

.btn i,
.btn-flat i {
  font-size: 1.3rem;
  line-height: inherit;
}

.btn .badge {
  margin-left: 7px;
}

.z-depth-1, .btn, .btn-floating {
  box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
}

.z-depth-1-half, .btn:hover, .btn-floating:hover {
  box-shadow: 0 5px 11px 0 rgba(0, 0, 0, 0.18), 0 4px 15px 0 rgba(0, 0, 0, 0.15);
}

.btn-default {
  color: #fff;
  background-color: #2BBBAD;
}

.btn-default:hover,
.btn-default:focus {
  background-color: #30cfc0 !important;
  color: #fff !important;
}

.waves-effect {
  position: relative;
  cursor: pointer;
  display: inline-block;
  overflow: hidden;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  -webkit-tap-highlight-color: transparent;
  vertical-align: middle;
  z-index: 1;
  will-change: opacity, transform;
  -webkit-transition: all 0.3s ease-out;
  -moz-transition: all 0.3s ease-out;
  -o-transition: all 0.3s ease-out;
  -ms-transition: all 0.3s ease-out;
  transition: all 0.3s ease-out;
}

.waves-effect .waves-ripple {
  position: absolute;
  border-radius: 50%;
  width: 20px;
  height: 20px;
  margin-top: -10px;
  margin-left: -10px;
  opacity: 0;
  background: rgba(0, 0, 0, 0.2);
  -webkit-transition: all 0.7s ease-out;
  -moz-transition: all 0.7s ease-out;
  -o-transition: all 0.7s ease-out;
  -ms-transition: all 0.7s ease-out;
  transition: all 0.7s ease-out;
  -webkit-transition-property: -webkit-transform, opacity;
  -moz-transition-property: -moz-transform, opacity;
  -o-transition-property: -o-transform, opacity;
  transition-property: transform, opacity;
  -webkit-transform: scale(0);
  -moz-transform: scale(0);
  -ms-transform: scale(0);
  -o-transform: scale(0);
  transform: scale(0);
  pointer-events: none;
}

.waves-effect.waves-light .waves-ripple {
  background-color: rgba(255, 255, 255, 0.45);
}

.waves-effect.waves-red .waves-ripple {
  background-color: rgba(244, 67, 54, 0.7);
}

.waves-effect.waves-yellow .waves-ripple {
  background-color: rgba(255, 235, 59, 0.7);
}

.waves-effect.waves-orange .waves-ripple {
  background-color: rgba(255, 152, 0, 0.7);
}

.waves-effect.waves-purple .waves-ripple {
  background-color: rgba(156, 39, 176, 0.7);
}

.waves-effect.waves-green .waves-ripple {
  background-color: rgba(76, 175, 80, 0.7);
}

.waves-effect.waves-teal .waves-ripple {
  background-color: rgba(0, 150, 136, 0.7);
}

/* Firefox Bug: link not triggered */
a.waves-effect .waves-ripple {
  z-index: -1;
}
</style>
<style>
.btn {
  background-color: green;
  border: none;
  padding: 10px 12px;
  cursor: pointer;
}
tr:nth-child(odd) {
  background-color:#e0f3ff;
}
/* Darker background on mouse-over */
.btn:hover {
  background-color: RoyalBlue;

}
/*floatin label style*/
.fp-floating-label {
  position: absolute;
  left: 1.5rem;
  top: 0.7rem;
  display: inline-block;
  padding: 0 0.1rem;
  line-height: 1;
  background-color: #fff;
  cursor: text;
  transition: all 300ms cubic-bezier(0.23,1,0.32,1);
  z-index: 2;
  color: #8a8a8a;
}

.fp-floating-label--select {
  cursor: default;
}

.fp-floating-label--focused, .fp-floating-label--valued {
  font-size: 0.8rem;
  color: inherit;
  transform: translateY(-125%);
}

</style>

  <div class="content-wrapper" ng-controller="ImportController">
  <!-- {{ Session::get('data') }} -->

	@if(Session::has('success_message'))
        <div class="alert alert-success">
            <span class="fa fa-ok"></span>
            {!! session('success_message') !!}
            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>
       </div>
    @endif
    @if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger">
            <span class="fa fa-ok"></span>
            {{ $error }}
            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endforeach
	@endif
    <section class="content">
      <div class="container-fluid">
        <div class="row" style="padding-top: 10px;">
			<div class="col-12">
				<div class="card card-primary card-outline">
				   <div class="card-header" style="background-color: #535EE3;">
            <h3 class="card-title clearfix" style="color: white;">Upload Invoice</h3>

					</div>


					  <div class="panel">


                  <div class="container" style="padding-bottom: 10px;" id="uploaddiv">


                      <form  style="margin-top: 15px;padding: 10px;padding-top:0px;" action="{{ route('salesheaders.salesheader.importExcel') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                        {!! csrf_field() !!}

                        <div class="row">
                            <div class="col-md-6 border border-right-0 p-3">

                                <div class="form-group clearfix{{ $errors->has('selectcompany') ? 'has-error' : '' }}">
                                    <label class="lab">Select File<b class="imp">*</b></label> <br>
                                                <input type="file" name="import_file" accept=".xlsx, .xls, .csv, .CSV"/>

                                                        <span style=""><button class="btn btn-md" style="background: #2832ab;   padding-bottom: 3px;
                                                            margin-top: 15px;
                                                            padding-top: 0px;
                                                            padding-left: 30px;
                                                            padding-right: 30px;" ><!--<i class="fa fa-upload waves-effect waves-light" style="font-size: 18px;color:white;"></i>-->  <span style="color:white; text-transform:none">Upload</span></button>

                                                        </span>

                                </div>

                                     </div>

                                     <div class="col-md-6 border text-right border-left-0 p-3 mt-4">



                                                         <a href="{{ asset('ExcelImport_sampleFiles/Sample_Upload_File.xls') }}" download>
                                                                  {{-- <span class="fa fa-download pull-right" aria-hidden="true" title="Download Sample File"> --}}
                                                                    <button  type="button" class="btn waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="Download Sample file" style="    background-color: #028902b3;
                                                                    padding-bottom: 3px;
                                                                    margin-top: 15px;
                                                                    padding-top: 0px;
                                                                    padding-left: 30px;
                                                                    padding-right: 30px;"><i class="fa fa-download " style="font-size: 18px;color:white;"></i>
                                                                     </button>
                                                                </span></a>




                                             </div>
    </div>





		</form>
	</div>





   <div class="container" style="padding-bottom: 10px; display: none;" id="importdiv">

                  <!-- style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 10px;" -->
                      <form id="invoice_form" style="padding-top: 10px;" action="{{ route('salesheaders.salesheader.importExcelstore') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                      <input type="hidden" name="page" value="{{request()->get('page')??1}}"/>
				<table class="table table-blank" >
                    <thead>
						<tr style="background-color: white;text-align:center;">
						<th>S.No</th>
                        <th>Invoice No</th>
                        <th>Material No</th>
						<th>Part No</th>
                        <th>Customer Part No</th>
                        <th>Shop Code</th>
                        <th>Shop</th>
                        {{--<th>Gate</th>
                        <th>Box Qty</th>
                        <th>Plant</th>
                        <th>HSN Code</th>
                        <th>GST IN</th>
                        <th>Description</th> --}}
						</tr>
					</thead>
                        <tbody>
                            <tr ng-repeat-start="invoice in invoices" ng-init="$last && triggerChange()">
                                <td style="width:5%">
                                    @{{$index+1}}
                                </td>
                                <td style="width:10%">
                                    @{{invoice.invoiceno_id}}
                                </td>
                                <td style="width:15%">
                                    <input type="text" style="display: none" name="material_no[]" ng-model="invoice.material_code"/>
                                    <selectize name="material_no[]" style="width:100%;height:36px !important;" config="mMaterialConfig" options='mMaterials' ng-model="invoice.material_code"></selectize>
                                </td>
                                <td style="width:15%">
                                    <input type="text" style="display: none" name="partno[]" ng-model="invoice.part_no"/>
                                    <selectize name="partno[]" style="width:100%;height:36px !important;" config="mPartNoConfig" options='mMaterials' ng-model="invoice.part_no"></selectize>
                                </td>
                                <td style="width:15%">
                                    <input type="text" style="display: none" name="customer_partno[]" ng-model="invoice.customer_part_no"/>
                                    <selectize required name="customer_partno[]" style="width:100%;height:36px !important;" config="mCustomerPartNoConfig" options='mMaterials' ng-model="invoice.customer_part_no"></selectize>
                                </td>
                                <td style="width:15%">
                                    <input type="text" style="display: none" name="shop_code[]" ng-model="invoice.shop_code"/>
                                    <selectize required name="shop_code[]" style="width:100%;height:36px !important;" config="mShopCodeConfig" options='mMaterials' ng-model="invoice.shop_code"></selectize>
                                </td>
                                <td style="width:15%">
                                    <input type="text" style="display: none" name="shop[]" ng-model="invoice.shop"/>
                                    <selectize name="shop[]" style="width:100%;height:36px !important;" config="mShopConfig" options='mMaterials' ng-model="invoice.shop"></selectize>
                                </td>
                                </tr>
                                <tr>
                                <td colspan="7">

                                    <div class="row">
                                        <div class="col-2">
                                            <label class="fp-floating-label fp-floating-label--valued" >Gate</label>
                                            <input type="text" style="display: none" name="gate[]" ng-model="invoice.gate"/>
                                            <selectize class="fp-advanced-select" name="gate[]" style="width:100%;height:36px !important;" config="mGateConfig" options='mMaterials' ng-model="invoice.gate"></selectize>
                                        </div>
                                        <div class="col-2">
                                            <label class="fp-floating-label fp-floating-label--valued" >Box Qty</label>
                                            <input type="text" style="display: none" name="box_qty[]" ng-model="invoice.box_qty"/>
                                            <selectize class="fp-advanced-select" name="box_qty[]" style="width:100%;height:36px !important;" config="mBoxQtyConfig" options='mMaterials' ng-model="invoice.box_qty"></selectize>
                                        </div>
                                        <div class="col-2">
                                            <label class="fp-floating-label fp-floating-label--valued" >Status</label>
                                            <span ng-bind-html="invoice.status_html"></span>
                                        </div>
                                        <div class="col-2">
                                            <label class="fp-floating-label fp-floating-label--valued">HSN</label>
                                            <input type="text" style="display: none" name="hsncode[]" ng-model="invoice.hsncode"/>
                                            <selectize class="fp-advanced-select" name="hsncode[]" style="width:100%;height:36px !important;" config="mHSNConfig" options='mMaterials' ng-model="invoice.hsncode"></selectize>
                                        </div>
                                        <div class="col-2">
                                            <label class="fp-floating-label fp-floating-label--valued">Gst In</label>
                                            <input type="text" style="display: none" name="gst_in[]" ng-model="invoice.gst_in"/>
                                            <selectize class="fp-advanced-select" name="gst_in[]" style="width:100%;height:36px !important;" config="mGSTINConfig" options='mMaterials' ng-model="invoice.gst_in"></selectize>
                                        </div>
                                        <div class="col-2">
                                            <label class="fp-floating-label fp-floating-label--valued">Description</label>
                                            <input type="text" style="display: none" name="product_desc[]" ng-model="invoice.product_desc"/>
                                            <selectize class="fp-advanced-select" name="product_desc[]" style="width:100%;height:36px !important;" config="mProductDescConfig" options='mMaterials' ng-model="invoice.product_desc"></selectize>
                                        </div>
                                    </div>
                                </td>
                                </tr>
                                <tr ng-repeat-end>
                                    <td colspan="7">
                                        <div class="row">
                                            <div class="col-2">
                                                <label class="fp-floating-label fp-floating-label--valued">No Of Container</label>
                                            <input class="form-control" type="number" name="stuff_qtys[]" min=0 ng-model="invoice.stuff_qty"/>
                                            </div>
                                            <div class="col-2">
                                                <label class="fp-floating-label fp-floating-label--valued">TCS Amount</label>
                                            <input class="form-control" min=0 type="number" step=".01" name="tcs_amount[]" ng-model="invoice.tcs_amount" required/>
                                            </div>
                                            <div class="col-2">
                                                <label class="fp-floating-label fp-floating-label--valued">Vehicle No</label>
                                            <input class="form-control" type="text" name="vehicle_no[]" ng-model="invoice.vehicle_no" required/>
                                            </div>
                                            <div class="col-2">
                                                <label class="fp-floating-label fp-floating-label--valued">Ewaybill No</label>
                                            <input class="form-control" type="text"  name="ewaybillno[]" ng-model="invoice.ewaybillno" required/>
                                            </div>
                                            <div class="col-4">
                                                <label class="fp-floating-label fp-floating-label--valued">IRN Number</label>
                                            <input class="form-control" type="text" maxlength="64" minlength="64" name="irn_reference_no[]" ng-model="invoice.data.irn" required />
                                            </div>
                                        </div>
                                    </td>
                                </tr>
					</tbody>
                          </table>
@if($current_page_count>0)
<div class="row">
<div class="col-md-12 text-right"><b>Showing {{$current_page_starting}} to {{$current_page_count}} of {{$total_invoices}} Invoices</b></div>
</div>
@endif

      <div style="padding-top: 0px;"><center><button type="submit" style="background-color: #3d48ca;
        color: white;
        border: 0px;" class="btn btn-info btn-md">Import</button>
        <input type="submit" onclick="return confirmCancel()" class="btn btn-warning btn-md" style="border: 1px solid #535ee3;
    background: azure;" name="action" value="Cancel"/>
    </center>
           </div>


    </form>
  </div>
                 </div>


				</div><!--/. card -->
			</div>
		</div> <!--/. row -->
	  </div><!--/. container-fluid -->
    </section>
	<!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
@push('scripts')
<script>
    function confirmCancel()
    {
        if(confirm('Are you sure to cancel a import?'))
        {
            $("#invoice_form").attr('novalidate',true);
            return true;
        }
        return false;
    }
    @if(count($salesheader)>0)
    window.onbeforeunload = function(){
        return 'Are you sure you want to leave this page?  You will lose any unsaved data.';
    }
    @endif
    app.controller('ImportController',function($scope,$http,$timeout){
        $scope.invoices=@json($salesheader??[]);
        $scope.mMaterials=@json($materials);
  PartNoSelectize=[];
  $scope.mPartNoConfig={
  create: false,
  valueField: 'part_no_plant_code',
  labelField: 'part_no',
  maxItems: 1,
  'placeholder':"Select a Part",
  openOnFocus:true,
  searchField: ['part_no','plant_code'],
  onInitialize: function(selectize){
    PartNoSelectize.push(selectize);
  },
  onChange:function(selectize,selectize_instance){
    var index=($(selectize_instance.$control[0]).closest('tr').index());
    index=index/3;
    // return ;
    material_detail=$scope.mMaterials.find(row=>{
        if(row.part_no_plant_code==selectize)
            return true;
        else
            return false;
    });
    $scope.invoices[index].material_code=material_detail.material_code;
    MaterialSelectize[index].setValue(material_detail.material_code,true);
    $scope.invoices[index].customer_part_no=material_detail.customer_part_no;
    CustomerPartNoSelectize[index].setValue(material_detail.customer_part_no,true);
    $scope.invoices[index].shop_code=material_detail.shop_code;
    ShopCodeSelectize[index].setValue(material_detail.shop_code,true);
    $scope.invoices[index].shop=material_detail.shop;
    ShopSelectize[index].setValue(material_detail.shop,true);
    $scope.invoices[index].gate=material_detail.gate;
    GateSelectize[index].setValue(material_detail.gate,true);
    $scope.invoices[index].box_qty=material_detail.box_qty;
    BoxQtySelectize[index].setValue(material_detail.box_qty,true);
    $scope.invoices[index].hsncode=material_detail.hsn_code;
    HSNSelectize[index].setValue(material_detail.hsn_code,true);
    $scope.invoices[index].gst_in=material_detail.gst_in;
    GSTINSelectize[index].setValue(material_detail.gst_in,true);
    $scope.invoices[index].product_desc=material_detail.product_desc;
    ProductDescSelectize[index].setValue(material_detail.product_desc,true);
    $scope.$apply();
  },
  onDropdownClose: function(dropdown,selectize_instance) {
    var index=($(selectize_instance.$control[0]).closest('tr').index());
    console.log(index);
  },
  render: {
  option: function(item, escape) {
    return '<div>'
      + '<strong>'
      + escape(item.part_no)
      + '</strong>'+' - '
      + escape(item.plant_code)
      + '</div>';
  },
  item: function(item, escape){
    return '<div>'
      + '<strong>'
      + escape(item.part_no)
      + '</strong>'+' - '
      + escape(item.plant_code)
      + '</div>';
  }
}
  }
  CustomerPartNoSelectize=[];
  $scope.mCustomerPartNoConfig={
  create: false,
  valueField: 'customer_part_no',
  labelField: 'customer_part_no',
  maxItems: 1,
  'placeholder':"Select a Customer Part",
  openOnFocus:true,
  searchField: ['customer_part_no','plant_code'],
  onInitialize: function(selectize){
    CustomerPartNoSelectize.push(selectize);
  },
  onChange:function(selectize,selectize_instance){
    var index=($(selectize_instance.$control[0]).closest('tr').index());
    index=index/3;
    // return ;
    material_detail=$scope.mMaterials.find(row=>{
        if(row.customer_part_no==selectize)
            return true;
        else
            return false;
    });
    $scope.invoices[index].material_code=material_detail.material_code;
    MaterialSelectize[index].setValue(material_detail.material_code,true);
    $scope.invoices[index].part_no=material_detail.part_no+'-'+material_detail.plant_code;
    PartNoSelectize[index].setValue(material_detail.part_no+'-'+material_detail.plant_code,true);
    $scope.invoices[index].shop_code=material_detail.shop_code;
    ShopCodeSelectize[index].setValue(material_detail.shop_code,true);
    $scope.invoices[index].shop=material_detail.shop;
    ShopSelectize[index].setValue(material_detail.shop,true);
    $scope.invoices[index].gate=material_detail.gate;
    GateSelectize[index].setValue(material_detail.gate,true);
    $scope.invoices[index].box_qty=material_detail.box_qty;
    BoxQtySelectize[index].setValue(material_detail.box_qty,true);
    $scope.invoices[index].hsncode=material_detail.hsn_code;
    HSNSelectize[index].setValue(material_detail.hsn_code,true);
    $scope.invoices[index].gst_in=material_detail.gst_in;
    GSTINSelectize[index].setValue(material_detail.gst_in,true);
    $scope.invoices[index].product_desc=material_detail.product_desc;
    ProductDescSelectize[index].setValue(material_detail.product_desc,true);
    $scope.$apply();
  },
  onDropdownClose: function(dropdown,selectize_instance) {
    var index=($(selectize_instance.$control[0]).closest('tr').index());
    console.log(index);
  }
  }
  ShopCodeSelectize=[];
  $scope.mShopCodeConfig={
  create: false,
  valueField: 'shop_code',
  labelField: 'shop_code',
  maxItems: 1,
  'placeholder':"Select a Shop Code",
  openOnFocus:true,
  searchField: ['shop_code'],
  onInitialize: function(selectize){
    ShopCodeSelectize.push(selectize);
  },
  onChange:function(selectize,selectize_instance){
    var index=($(selectize_instance.$control[0]).closest('tr').index());
    //code here
  },
  onDropdownClose: function(dropdown,selectize_instance) {
    var index=($(selectize_instance.$control[0]).closest('tr').index());
    console.log(index);
  }
  }
  ShopSelectize=[];
  $scope.mShopConfig={
  create: false,
  valueField: 'shop',
  labelField: 'shop',
  maxItems: 1,
  'placeholder':"Select a Shop",
  openOnFocus:true,
  searchField: ['shop'],
  onInitialize: function(selectize){
    ShopSelectize.push(selectize);
  },
  onChange:function(selectize,selectize_instance){
    var index=($(selectize_instance.$control[0]).closest('tr').index());
    //code here
  },
  onDropdownClose: function(dropdown,selectize_instance) {
    var index=($(selectize_instance.$control[0]).closest('tr').index());
    console.log(index);
  }
  }
  GateSelectize=[];
  $scope.mGateConfig={
  create: false,
  valueField: 'gate',
  labelField: 'gate',
  maxItems: 1,
  'placeholder':"Select a Gate",
  openOnFocus:true,
  searchField: ['gate'],
  onInitialize: function(selectize){
    GateSelectize.push(selectize);
  },
  onChange:function(selectize,selectize_instance){
    var index=($(selectize_instance.$control[0]).closest('tr').index());
    //code here
  },
  onDropdownClose: function(dropdown,selectize_instance) {
    var index=($(selectize_instance.$control[0]).closest('tr').index());
    console.log(index);
  }
  }
  BoxQtySelectize=[];
  $scope.mBoxQtyConfig={
  create: false,
  valueField: 'box_qty',
  labelField: 'box_qty',
  maxItems: 1,
  'placeholder':"Select a BoxQty",
  openOnFocus:true,
  searchField: ['box_qty'],
  onInitialize: function(selectize){
    BoxQtySelectize.push(selectize);
  },
  onChange:function(selectize,selectize_instance){
    var index=($(selectize_instance.$control[0]).closest('tr').index());
    //code here
  },
  onDropdownClose: function(dropdown,selectize_instance) {
    var index=($(selectize_instance.$control[0]).closest('tr').index());
    console.log(index);
  }
  }
  HSNSelectize=[];
  $scope.mHSNConfig={
  create: false,
  valueField: 'hsn_code',
  labelField: 'hsn_code',
  maxItems: 1,
  'placeholder':"Select a HSN",
  openOnFocus:true,
  searchField: ['hsn_code'],
  onInitialize: function(selectize){
    HSNSelectize.push(selectize);
  },
  onChange:function(selectize,selectize_instance){
    var index=($(selectize_instance.$control[0]).closest('tr').index());
    //code here
  },
  onDropdownClose: function(dropdown,selectize_instance) {
    var index=($(selectize_instance.$control[0]).closest('tr').index());
    console.log(index);
  }
  }
  GSTINSelectize=[];
  $scope.mGSTINConfig={
  create: false,
  valueField: 'gst_in',
  labelField: 'gst_in',
  maxItems: 1,
  'placeholder':"Select a GSTIN",
  openOnFocus:true,
  searchField: ['gst_in'],
  onInitialize: function(selectize){
    GSTINSelectize.push(selectize);
  },
  onChange:function(selectize,selectize_instance){
    var index=($(selectize_instance.$control[0]).closest('tr').index());
    //code here
  },
  onDropdownClose: function(dropdown,selectize_instance) {
    var index=($(selectize_instance.$control[0]).closest('tr').index());
    console.log(index);
  }
  }
  ProductDescSelectize=[];
  $scope.mProductDescConfig={
  create: false,
  valueField: 'product_desc',
  labelField: 'product_desc',
  maxItems: 1,
  'placeholder':"Product Desc",
  openOnFocus:true,
  searchField: ['product_desc'],
  onInitialize: function(selectize){
    ProductDescSelectize.push(selectize);
  },
  onChange:function(selectize,selectize_instance){
    var index=($(selectize_instance.$control[0]).closest('tr').index());
    //code here
  },
  onDropdownClose: function(dropdown,selectize_instance) {
    var index=($(selectize_instance.$control[0]).closest('tr').index());
  }
  }
  MaterialSelectize=[];
        $scope.mMaterialConfig={
  create: false,
  valueField: 'material_code',
  labelField: 'material_code',
  maxItems: 1,
  'placeholder':"Select a Material",
  openOnFocus:true,
  searchField: ['material_code','plant_code'],
  onInitialize: function(selectize){
    MaterialSelectize.push(selectize);
  },
  onChange:function(selectize,selectize_instance){
    var index=($(selectize_instance.$control[0]).closest('tr').index());
    index=index/3;
    console.log($(selectize_instance.$control[0]).closest('tr'),$(selectize_instance.$control[0]).closest('tr').index());
    // return ;
    material_detail=$scope.mMaterials.find(row=>{
        if(row.material_code==selectize)
            return true;
        else
            return false;
    });
    $scope.invoices[index].part_no=material_detail.part_no+'-'+material_detail.plant_code;
    PartNoSelectize[index].setValue(material_detail.part_no+'-'+material_detail.plant_code,true);
    $scope.invoices[index].customer_part_no=material_detail.customer_part_no;
    CustomerPartNoSelectize[index].setValue(material_detail.customer_part_no,true);
    $scope.invoices[index].shop_code=material_detail.shop_code;
    ShopCodeSelectize[index].setValue(material_detail.shop_code,true);
    $scope.invoices[index].shop=material_detail.shop;
    ShopSelectize[index].setValue(material_detail.shop,true);
    $scope.invoices[index].gate=material_detail.gate;
    GateSelectize[index].setValue(material_detail.gate,true);
    $scope.invoices[index].box_qty=material_detail.box_qty;
    BoxQtySelectize[index].setValue(material_detail.box_qty,true);
    $scope.invoices[index].hsncode=material_detail.hsn_code;
    HSNSelectize[index].setValue(material_detail.hsn_code,true);
    $scope.invoices[index].gst_in=material_detail.gst_in;
    GSTINSelectize[index].setValue(material_detail.gst_in,true);
    $scope.invoices[index].product_desc=material_detail.product_desc;
    $scope.invoices[index].stuff_qty=Math.ceil($scope.invoices[index].productqty/$scope.invoices[index].box_qty);
    console.log($scope.invoices[index].productqty,$scope.invoices[index].box_qty,'here');
    ProductDescSelectize[index].setValue(material_detail.product_desc,true);
    $scope.$apply();
  },
  onDropdownClose: function(dropdown,selectize_instance) {
    var index=($(selectize_instance.$control[0]).closest('tr').index());
    console.log(index);
  }
  }
$scope.triggerChange=function()
{
    $timeout(function(){
        MaterialSelectize.forEach(selectize=>{
        selectize.trigger('change');
    })
    },300);
}
    });
  window.onload=Autotrigger();
  function Autotrigger()
  {
    var value=@json($salesheader);

    if(value.length!=0)
    {
      $("#importdiv").show();
      $("#uploadfile").attr("disabled", true);
      // $("#uploaddiv").hide();
    }
    else
    {
      $("#importdiv").hide();
    }
  console.log(value.length);

  }

  function cancel(){
    $("#uploadfile").attr("disabled", false);
              $.post("{{route('session.forget')}}",
                        {
                            cancel: "clear",
                            _token: '{{csrf_token()}}'
                        },
                        function(data,status)
                        {
                        window.location.reload();
                        }
                );

  }
// function plants()
//       {
//         console.log(this);
//        if($("#plantname").val()=='HVF1'){
//            $(".shopcode").val('A2');
//       }
//        else{
//          $(".shopcode").val('J2');
//       }
//       }

;(function(window) {
    'use strict';

    var Waves = Waves || {};
    var $$ = document.querySelectorAll.bind(document);

    // Find exact position of element
    function isWindow(obj) {
        return obj !== null && obj === obj.window;
    }

    function getWindow(elem) {
        return isWindow(elem) ? elem : elem.nodeType === 9 && elem.defaultView;
    }

    function offset(elem) {
        var docElem, win,
            box = {top: 0, left: 0},
            doc = elem && elem.ownerDocument;

        docElem = doc.documentElement;

        if (typeof elem.getBoundingClientRect !== typeof undefined) {
            box = elem.getBoundingClientRect();
        }
        win = getWindow(doc);
        return {
            top: box.top + win.pageYOffset - docElem.clientTop,
            left: box.left + win.pageXOffset - docElem.clientLeft
        };
    }

    function convertStyle(obj) {
        var style = '';

        for (var a in obj) {
            if (obj.hasOwnProperty(a)) {
                style += (a + ':' + obj[a] + ';');
            }
        }

        return style;
    }

    var Effect = {

        // Effect delay
        duration: 750,

        show: function(e, element) {

            // Disable right click
            if (e.button === 2) {
                return false;
            }

            var el = element || this;

            // Create ripple
            var ripple = document.createElement('div');
            ripple.className = 'waves-ripple';
            el.appendChild(ripple);

            // Get click coordinate and element witdh
            var pos         = offset(el);
            var relativeY   = (e.pageY - pos.top);
            var relativeX   = (e.pageX - pos.left);
            var scale       = 'scale('+((el.clientWidth / 100) * 10)+')';

            // Support for touch devices
            if ('touches' in e) {
              relativeY   = (e.touches[0].pageY - pos.top);
              relativeX   = (e.touches[0].pageX - pos.left);
            }

            // Attach data to element
            ripple.setAttribute('data-hold', Date.now());
            ripple.setAttribute('data-scale', scale);
            ripple.setAttribute('data-x', relativeX);
            ripple.setAttribute('data-y', relativeY);

            // Set ripple position
            var rippleStyle = {
                'top': relativeY+'px',
                'left': relativeX+'px'
            };

            ripple.className = ripple.className + ' waves-notransition';
            ripple.setAttribute('style', convertStyle(rippleStyle));
            ripple.className = ripple.className.replace('waves-notransition', '');

            // Scale the ripple
            rippleStyle['-webkit-transform'] = scale;
            rippleStyle['-moz-transform'] = scale;
            rippleStyle['-ms-transform'] = scale;
            rippleStyle['-o-transform'] = scale;
            rippleStyle.transform = scale;
            rippleStyle.opacity   = '1';

            rippleStyle['-webkit-transition-duration'] = Effect.duration + 'ms';
            rippleStyle['-moz-transition-duration']    = Effect.duration + 'ms';
            rippleStyle['-o-transition-duration']      = Effect.duration + 'ms';
            rippleStyle['transition-duration']         = Effect.duration + 'ms';

            rippleStyle['-webkit-transition-timing-function'] = 'cubic-bezier(0.250, 0.460, 0.450, 0.940)';
            rippleStyle['-moz-transition-timing-function']    = 'cubic-bezier(0.250, 0.460, 0.450, 0.940)';
            rippleStyle['-o-transition-timing-function']      = 'cubic-bezier(0.250, 0.460, 0.450, 0.940)';
            rippleStyle['transition-timing-function']         = 'cubic-bezier(0.250, 0.460, 0.450, 0.940)';

            ripple.setAttribute('style', convertStyle(rippleStyle));
        },

        hide: function(e) {
            TouchHandler.touchup(e);

            var el = this;
            var width = el.clientWidth * 1.4;

            // Get first ripple
            var ripple = null;
            var ripples = el.getElementsByClassName('waves-ripple');
            if (ripples.length > 0) {
                ripple = ripples[ripples.length - 1];
            } else {
                return false;
            }

            var relativeX   = ripple.getAttribute('data-x');
            var relativeY   = ripple.getAttribute('data-y');
            var scale       = ripple.getAttribute('data-scale');

            // Get delay beetween mousedown and mouse leave
            var diff = Date.now() - Number(ripple.getAttribute('data-hold'));
            var delay = 350 - diff;

            if (delay < 0) {
                delay = 0;
            }

            // Fade out ripple after delay
            setTimeout(function() {
                var style = {
                    'top': relativeY+'px',
                    'left': relativeX+'px',
                    'opacity': '0',

                    // Duration
                    '-webkit-transition-duration': Effect.duration + 'ms',
                    '-moz-transition-duration': Effect.duration + 'ms',
                    '-o-transition-duration': Effect.duration + 'ms',
                    'transition-duration': Effect.duration + 'ms',
                    '-webkit-transform': scale,
                    '-moz-transform': scale,
                    '-ms-transform': scale,
                    '-o-transform': scale,
                    'transform': scale,
                };

                ripple.setAttribute('style', convertStyle(style));

                setTimeout(function() {
                    try {
                        el.removeChild(ripple);
                    } catch(e) {
                        return false;
                    }
                }, Effect.duration);
            }, delay);
        },

        // Little hack to make <input> can perform waves effect
        wrapInput: function(elements) {
            for (var a = 0; a < elements.length; a++) {
                var el = elements[a];

                if (el.tagName.toLowerCase() === 'input') {
                    var parent = el.parentNode;

                    // If input already have parent just pass through
                    if (parent.tagName.toLowerCase() === 'i' && parent.className.indexOf('waves-effect') !== -1) {
                        continue;
                    }

                    // Put element class and style to the specified parent
                    var wrapper = document.createElement('i');
                    wrapper.className = el.className + ' waves-input-wrapper';

                    var elementStyle = el.getAttribute('style');

                    if (!elementStyle) {
                        elementStyle = '';
                    }

                    wrapper.setAttribute('style', elementStyle);

                    el.className = 'waves-button-input';
                    el.removeAttribute('style');

                    // Put element as child
                    parent.replaceChild(wrapper, el);
                    wrapper.appendChild(el);
                }
            }
        }
    };


    /**
     * Disable mousedown event for 500ms during and after touch
     */
    var TouchHandler = {
        /* uses an integer rather than bool so there's no issues with
         * needing to clear timeouts if another touch event occurred
         * within the 500ms. Cannot mouseup between touchstart and
         * touchend, nor in the 500ms after touchend. */
        touches: 0,
        allowEvent: function(e) {
            var allow = true;

            if (e.type === 'touchstart') {
                TouchHandler.touches += 1; //push
            } else if (e.type === 'touchend' || e.type === 'touchcancel') {
                setTimeout(function() {
                    if (TouchHandler.touches > 0) {
                        TouchHandler.touches -= 1; //pop after 500ms
                    }
                }, 500);
            } else if (e.type === 'mousedown' && TouchHandler.touches > 0) {
                allow = false;
            }

            return allow;
        },
        touchup: function(e) {
            TouchHandler.allowEvent(e);
        }
    };


    /**
     * Delegated click handler for .waves-effect element.
     * returns null when .waves-effect element not in "click tree"
     */
    function getWavesEffectElement(e) {
        if (TouchHandler.allowEvent(e) === false) {
            return null;
        }

        var element = null;
        var target = e.target || e.srcElement;

        while (target.parentElement !== null) {
            if (!(target instanceof SVGElement) && target.className.indexOf('waves-effect') !== -1) {
                element = target;
                break;
            } else if (target.classList.contains('waves-effect')) {
                element = target;
                break;
            }
            target = target.parentElement;
        }

        return element;
    }

    /**
     * Bubble the click and show effect if .waves-effect elem was found
     */
    function showEffect(e) {
        var element = getWavesEffectElement(e);

        if (element !== null) {
            Effect.show(e, element);

            if ('ontouchstart' in window) {
                element.addEventListener('touchend', Effect.hide, false);
                element.addEventListener('touchcancel', Effect.hide, false);
            }

            element.addEventListener('mouseup', Effect.hide, false);
            element.addEventListener('mouseleave', Effect.hide, false);
        }
    }

    Waves.displayEffect = function(options) {
        options = options || {};

        if ('duration' in options) {
            Effect.duration = options.duration;
        }

        //Wrap input inside <i> tag
        Effect.wrapInput($$('.waves-effect'));

        if ('ontouchstart' in window) {
            document.body.addEventListener('touchstart', showEffect, false);
        }

        document.body.addEventListener('mousedown', showEffect, false);
    };

    /**
     * Attach Waves to an input element (or any element which doesn't
     * bubble mouseup/mousedown events).
     *   Intended to be used with dynamically loaded forms/inputs, or
     * where the user doesn't want a delegated click handler.
     */
    Waves.attach = function(element) {
        //FUTURE: automatically add waves classes and allow users
        // to specify them with an options param? Eg. light/classic/button
        if (element.tagName.toLowerCase() === 'input') {
            Effect.wrapInput([element]);
            element = element.parentElement;
        }

        if ('ontouchstart' in window) {
            element.addEventListener('touchstart', showEffect, false);
        }

        element.addEventListener('mousedown', showEffect, false);
    };

    window.Waves = Waves;

    document.addEventListener('DOMContentLoaded', function() {
        Waves.displayEffect();
    }, false);
// var advSelects = document.getElementsByClassName('fp-advanced-select');
// for (var i = advSelects.length - 1; i >= 0; i--) {
//   var $select = $(advSelects[i]);
//   (function($el) {
//     var $label = $el.prev();
//     $el.selectize({
//       plugins: ['remove_button'],
//       create:true,
//       onFocus: function() {
//         $label.addClass('fp-floating-label--focused');
//       },
//       onBlur: function() {
//         $label.removeClass('fp-floating-label--focused');
//       },
//       onItemAdd: function(){
//         $label.addClass('fp-floating-label--valued');
//        },
//       onDelete: function(){
//         var count = $el.find('option').length
//         if (count <= 1){
//           $label.removeClass('fp-floating-label--valued');
//           $(this).focus();
//         }
//       },
//       onChange: function(value) {
//         value = value.trim();
//         if (value) {
//           $label.addClass('fp-floating-label--valued');
//         } else {
//           $label.removeClass('fp-floating-label--valued');
//         }
//       }
//     });
//   })($select);
// }
    // $(".material_no,.partno,.customer_partno,.shop_code,.shop").selectize(
    //     {
    //   plugins: ['remove_button'],
    //   create:true
    // }
    // );
    $('form').submit(function () {
    window.onbeforeunload = null;
});
})(window);
// $("#delnote_no").mask('000000');
// $("#part_no").mask('################');
</script>
@endpush









