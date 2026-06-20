@extends('layouts.app')

@section('page-title','Sales New')
@section('sales','menu-open')
@section('content')
@push('css')
<style>
.select2-container .select2-selection--single{
  
height: 37px;
  }
</style>
  
}
@endpush
  <div class="content-wrapper">
    <!-- <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Sales New</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
			  <li class="breadcrumb-item"><a href="{{ route('salesheaders.salesheader.index') }}">Sales</a></li>
              <li class="breadcrumb-item active">New Sales</li>
            </ol>
          </div>
        </div>
      </div>
    </div> -->

    <!-- Main content -->
	
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
			<div class="col-12 mt-3">
				<div class="card card-primary card-outline">
					<form method="POST" action="{{ route('salesheaders.salesheader.store') }}" accept-charset="UTF-8" id="create_salesheader_form" name="create_salesheader_form" class="form-horizontal" ng-controller="SalesHeaderInventoryController">
						<div class="card-header">
							<h3 class="card-title clearfix text-info text-uppercase font-weight-bold">
							   Create New Sales
							   <div class="float-right">
									<a href="{{ route('salesheaders.salesheader.index') }}" class="btn btn-primary btn-sm" title="Show All products">
											<span class="fa fa-th-list" aria-hidden="true"></span>
									</a>
													</div>
							</h3>
						</div>
						<div class="card-body">
							@if ($errors->any())
								<ul class="alert alert-danger">
									@foreach ($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
								</ul>
							@endif

            
            {{ csrf_field() }}
            @include ('salesheaders.form', [
                                        'salesheader' => null,
                                        'editflag'    => false,
                                      ])

               </div>
						<div class="card-footer clearfix text-center">
								<input class="btn btn-primary btn-sm pr-4 pl-4" type="submit" value="Add">
						</div>
					</form>
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
<script type="text/javascript">
app.controller('SalesHeaderInventoryController', function($scope,$http,$filter) {
   
var now = new Date(); 
 $scope.myDate = now;
  this.isOpen = false;
$scope.old_po_arr=[];
$scope.podate = '';
$scope.invoiceto = '';
$scope.customercode_id = '';
$scope.ponumber ='';
$scope.podate ="";
$scope.shopcode="";
$scope.plantcode ="";
$scope.pdsno ="";
$scope.pdsdate ="";
$scope.ponumbers = [];
$scope.customer = [];
$scope.table_products=[];
$scope.products=[];
var oldinput_arr=[];
$scope.getcustomers= function(){
$http.get("{{route('salesheaders.salesheader.index')}}"+'/getcustomers/'+$scope.invoiceto).then(function(response) {
        response = response.data;
    $scope.customer=response;
    console.log($scope.customer);
    
    });   
    
}   

$(".select22").select2({'placeholder':'Select a Customer','theme':'bootstrap4'}).on('change', function () {

      // $scope.$apply();
      $scope.getpono(this.value);
      console.log(this.value);
});

$scope.getpono= function(value){
 $http.get("{{route('salesheaders.salesheader.index')}}"+'/getpono/'+value).then(function(response) {
        response = response.data;
        console.log(response);
        //console.log($scope.customercode_id);
      findvalues=$scope.customer.find(values=>values.customercode==value)
      $scope.shopcode=findvalues.shopcode||'';
      $scope.plantcode=findvalues.plantcode||'';
      $scope.pdsno=findvalues.pdsno||'';
      $scope.pdsdate=findvalues.pdsdate||'';
      $scope.ponumbers=response;
      // console.log(findvalues,$scope.shopcode,$scope.plantcode,$scope.pdsno,$scope.pdsdate);

        //console.log(response);
    });

}

$("#ponumber").select2({'placeholder':'Select a PO Number','theme':'bootstrap4'});
$("#ponumber").on('select2:unselect', function (e) {
    var arr_po=$(this).val();
    clearPoNum(arr_po);
});

function clearPoNum(arr_po)
{
  var po=$scope.old_po_arr.filter(e => arr_po.indexOf(e.pono)===-1)[0];
    //console.log([arr_po,po]);
    $scope.products=$scope.products.filter(product=>product.ponumber!=po.pono);
    $scope.discount_amt=parseFloat($scope.discount_amt)-parseFloat(po.discountamount);
     $scope.Packing_amt=parseFloat($scope.Packing_amt)-parseFloat(po.Packing_amt);
     $scope.Freight_amt=parseFloat($scope.Freight_amt)-parseFloat(po.Freight_amt);
     $scope.other_amt=parseFloat($scope.other_amt)-parseFloat(po.otheramount);
    index=$scope.old_po_arr.findIndex(po_arr=>po_arr.pono==po.pono);
    $scope.old_po_arr.splice(index,1);
    oldinput_arr=$scope.old_po_arr.map(po=>po.pono);
    $scope.$apply();
}


$("#ponumber").on('select2:select', function (e) {
  var arr_po=$(this).val();
// console.log('hello');
  var current_po=0;
  if(arr_po.length>1)
  {
    //console.log(oldinput_arr);
    current_po=arr_po.filter(e => oldinput_arr.indexOf(e)===-1)[0];
  }
  else
  {
    $scope.products=[];
    $scope.old_po_arr=[];
    oldinput_arr=[];
    current_po=arr_po[0];
  }
  oldinput_arr=$(this).val();
  $http.get("{{route('salesheaders.salesheader.index')}}"+'/podetails/'+current_po).then(function(response) {
     res = response.data;
     //console.log(res);
     $scope.old_po_arr.push(res);
     res.podetail.forEach(detail=>{
      detail.newlyadded=false;
      detail.ponumber=res.pono;
      detail.podate=res.podate;
      $scope.products.push(detail);
     });
     $scope.podate=res.podate;
     $scope.discount_amt=parseFloat($scope.discount_amt)+parseFloat(res.discountamount);
     $scope.Packing_amt=parseFloat($scope.Packing_amt)+parseFloat(res.Packing_amt);
     $scope.Freight_amt=parseFloat($scope.Freight_amt)+parseFloat(res.Freight_amt);
     $scope.other_amt=parseFloat($scope.other_amt)+parseFloat(res.otheramount);
     //$scope.$apply();
     //$scope.finished();
     // $(".select11").select2({'placeholder':'Select a Part Number','theme':'bootstrap4'});
     


    });
});

$scope.finished= function(value){

console.log($(".select11:last-child"));
  $(".select11:last-child").select2({'placeholder':'Select a Part Number','theme':'bootstrap4'}).on('change', function () {
     $scope.table_products[$(this).parent().parent().index()].po_id=$(this).val();
      $scope.getProductsInfo($scope.table_products[$(this).parent().parent().index()]);
      console.log(this.value);

        });

}
$scope.table_products=[{
'productcode_id':'',
'newlyadded':true,
'productpartno':'',
'productname':'',
'productdescription':'',
'producthsncode':'',
'productigstrate':'',
'productcgstrate':'',
'productsgstrate':'',
'uom_id':'',
'productsellingrate':'',
'productqty':'',
'amount':'',
'tax_amount':'',
'po_id':''
}];
setTimeout(function() {
$scope.finished();
}, 100);
$scope.tax_type='intrastate';
$scope.discount_amt=0;
$scope.other_amt=0; 
// $scope.getProductsInfo=function(p){
//        $http.get("{{route('products.products.index')}}"+'/getproductlist/'+p.productcode_id).then(function(response) {
//             response = response.data;
// p.productcgstrate=response.productcgstrate;

// p.productcode=response.productcode;

// p.productdescription=response.productdescription;
// p.productexpirydate=response.productcgstrate;
// p.producthsncode=response.producthsncode;
// p.productigstrate=response.productigstrate;


// p.productname=response.productname;
// p.productpartno=response.productpartno;

// p.productsellingrate=response.productsellingrate;
// p.productsgstrate=response.productsgstrate;

// p.uom_id=response.uom_id;

//         console.log(response);
//     });
//     }
$scope.canAvailable=function(p){
  console.log($scope.table_products,p)
  console.log($scope.table_products.filter(tp=>parseInt(tp.po_id)==p.id).length);
  return ($scope.table_products.filter(tp=>tp.po_id==p.po_id).length)>0;
}
    $scope.getProductsInfo=function(p){
      // console.log($scope.products.find(select_po=>select_po.id==parseInt(p.po_id)));
      seleted_product=$scope.products.find(select_po=>select_po.id==parseInt(p.po_id));
      // seleted_product.canavailable=false;
      console.log(seleted_product);
      if(seleted_product!=null)
      {
        response=seleted_product;
      }
      // console.log();
p.productcode_id=response.productcode_id;
p.productcgstrate=response.productcgstrate;
p.newlyadded=true;
p.productcode=response.productcode;
p.productdescription=response.productdescription;
p.productexpirydate=response.productcgstrate;
p.producthsncode=response.producthsncode;
p.productigstrate=response.productigstrate;
p.ponumber=response.ponumber;
p.podate=response.podate;
p.productname=response.productname;
p.productpartno=response.partno;
p.productsellingrate=response.productsellingrate;
p.originalsellingrate=response.productsellingrate;
console.log(p.productpartno);
if(response.pivot!=null)
{
  p.productsellingrate=response.pivot.productsellingrate;
}
p.productsgstrate=response.productsgstrate;
p.uom_id=response.uom_id;
$scope.$apply();
//console.log([p,response]);
//         console.log(response);
//     });
    }

$scope.products_discount='';
$scope.orderAmount=function(p){
    p.amount=p.productsellingrate*p.productqty;
    return p.amount;
}
$scope.orderAmount1=function(p){
    p.tax_amount=(p.amount*p.productigstrate)/100;
    return p.tax_amount;
}
$scope.orderAmount2=function(p){}
$scope.add=function(){

     


    $scope.table_products.push({'productcode_id':'',
      'newlyadded':true,
'productpartno':'',
'ponumber':'',
'podate':'',
'productname':'',
'productdescription':'',
'producthsncode':'',
'productigstrate':'',
'productcgstrate':'',
'productsgstrate':'',
'uom_id':'',
'po_id':'',
'productsellingrate':'',
'productqty':''});

setTimeout(function() {
$scope.finished();
}, 100);
    // $(".select11").select2({'placeholder':'Select a Part Number','theme':'bootstrap4'});
    
}
$scope.removeItem=function(index){
    if($scope.table_products.length>1)
    {
      tpo_id=$scope.table_products[index].po_id;
      makevisible=$scope.products.find(product=>product.id==tpo_id);
      if(makevisible!=null){
        makevisible.canavailable=true;
      }
      $scope.table_products.splice(index,1);

      // t_ponumber=$scope.table_products[index].ponumber;
      // $scope.products.splice(index,1);
      // if(t_ponumber!=null)
      // {
      //   t_index=$scope.products.findIndex(product=>product.ponumber==t_ponumber);
      //   if(t_index==-1)
      //   {
      //     newinput_arr=oldinput_arr.filter(arr=>arr!=t_ponumber);
      //     console.log(newinput_arr);
      //     $("#ponumber").val(newinput_arr).trigger("change");
      //     clearPoNum(newinput_arr);
      //   }
      // }
    }
}

$scope.discount_amt=0.00;
$scope.Packing_amt=0.00;
$scope.Freight_amt=0.00;
$scope.other_amt=0.00; 
    
$scope.rupees = '';
$scope.paise = '';
$scope.number='';    
    
$scope.taxamountword=''; 
$scope.grandtotalamountword=''; 
    
    
$scope.roundoff1=function(model)
{
   $scope.Packing_amt =  $filter('number')(model,2) // parseFloat(Math.round(model * 100) / 100).toFixed(2);
}

$scope.roundoff2=function(model)
{
   $scope.Freight_amt =  $filter('number')(model,2) // parseFloat(Math.round(model * 100) / 100).toFixed(2);
}

$scope.roundoff3=function(model)
{
   $scope.other_amt =  $filter('number')(model,2) // parseFloat(Math.round(model * 100) / 100).toFixed(2);
}

$scope.roundoff4=function(model)
{
   $scope.discount_amt =  $filter('number')(model,2) // parseFloat(Math.round(model * 100) / 100).toFixed(2);
}
    

$scope.total_amount=function(){
    total=0;
    $scope.table_products.forEach(product=>{
        total+=product.amount;
    });
    return total;
}
$scope.taxCal1=function(){
     total=0;
    $scope.table_products.forEach(product=>{
        total+=product.tax_amount;
    });
    $scope.NumToWordss(total);
    return total;
}
$scope.grandTotal=function(){
   var GrandTotal = parseFloat($scope.total_amount())+parseFloat($scope.taxCal1())+parseFloat($scope.other_amt)+parseFloat($scope.Packing_amt)+parseFloat($scope.Freight_amt)-parseFloat($scope.discount_amt);
    
    $scope.NumToWords(GrandTotal);
  
    return GrandTotal;
}


$scope.NumToWord=function(amount){
    //alert(amount);
var words = new Array();
words[0] = 'Zero';words[1] = 'One';words[2] = 'Two';words[3] = 'Three';words[4] = 'Four';words[5] = 'Five';words[6] = 'Six';words[7] = 'Seven';words[8] = 'Eight';words[9] = 'Nine';words[10] = 'Ten';words[11] = 'Eleven';words[12] = 'Twelve';words[13] = 'Thirteen';words[14] = 'Fourteen';words[15] = 'Fifteen';words[16] = 'Sixteen';words[17] = 'Seventeen';words[18] = 'Eighteen';words[19] = 'Nineteen';words[20] = 'Twenty';words[30] = 'Thirty';words[40] = 'Forty';words[50] = 'Fifty';words[60] = 'Sixty';words[70] = 'Seventy';words[80] = 'Eighty';words[90] = 'Ninety';var op;
amount = amount.toString();
var atemp = amount.split(".");
var number = atemp[0].split(",").join("");
var n_length = number.length;
var words_string = "";
if(n_length <= 9){
var n_array = new Array(0, 0, 0, 0, 0, 0, 0, 0, 0);
var received_n_array = new Array();
for (var i = 0; i < n_length; i++){
received_n_array[i] = number.substr(i, 1);}
for (var i = 9 - n_length, j = 0; i < 9; i++, j++){
n_array[i] = received_n_array[j];}
for (var i = 0, j = 1; i < 9; i++, j++){
if(i == 0 || i == 2 || i == 4 || i == 7){
if(n_array[i] == 1){
n_array[j] = 10 + parseInt(n_array[j]);
n_array[i] = 0;}}}
var value = "";
for (var i = 0; i < 9; i++){
if(i == 0 || i == 2 || i == 4 || i == 7){
value = n_array[i] * 10;} else {
value = n_array[i];}
if(value != 0){
words_string += words[value] + " ";}
if((i == 1 && value != 0) || (i == 0 && value != 0 && n_array[i + 1] == 0)){
words_string += "Crores ";}
if((i == 3 && value != 0) || (i == 2 && value != 0 && n_array[i + 1] == 0)){
words_string += "Lakhs ";}
if((i == 5 && value != 0) || (i == 4 && value != 0 && n_array[i + 1] == 0)){
words_string += "Thousand ";}
if(i == 6 && value != 0 && (n_array[i + 1] != 0 && n_array[i + 2] != 0)){
words_string += "Hundred and ";} else if(i == 6 && value != 0){
words_string += "Hundred ";}}
words_string = words_string.split(" ").join(" ");}
    return words_string;
}
$scope.RsPaise=function (n){
nums = n.toString().split('.')
var whole = $scope.NumToWord(nums[0])
if(nums[1]==null)nums[1]=0;
if(nums[1].length == 1 )nums[1]=nums[1]+'0';
if(nums[1].length> 2){nums[1]=nums[1].substring(2,length - 1)}
if(nums.length == 2){
if(nums[0]<=9){nums[0]=nums[0]*10} else {nums[0]=nums[0]};
var fraction = $scope.NumToWord(nums[1])
if(whole=='' && fraction==''){op= 'Zero only';}
if(whole=='' && fraction!=''){op= fraction + 'paise only';}
if(whole!='' && fraction==''){op= whole + 'Rupees only';} 
if(whole!='' && fraction!=''){op= whole + 'Rupees and ' + fraction + 'paise only';}
amt=$scope.number;
if(amt > 999999999.99){op='Oops!!! The amount is too big to convert';}
if(isNaN(amt) == true ){op='Error : Amount in number appears to be incorrect. Please Check.';}
    $scope.paise = op;
    return op;
}}

  
    $scope.NumToWords=function(amount)
    {
        $scope.grandtotalamountword = $scope.RsPaise(amount);   
   
    }
    
     $scope.NumToWordss=function(amount)
    {   
        $scope.taxamountword        = $scope.RsPaise(amount);   
    }

// $scope.podetails= function(){
//  $http.get("{{route('salesheaders.salesheader.index')}}"+'/podetails/'+$scope.ponumber.pono).then(function(response) {
//         res = response.data;
//      console.log(res);
//      $scope.products=[];
//      res.podetail.forEach(detail=>{
//       detail.newlyadded=false;
//       $scope.products.push(detail);
//      });
//      $scope.podate=res.podate;
//      $scope.discount_amt=res.discountamount;
//      $scope.Packing_amt=res.Packing_amt;
//      $scope.Freight_amt=res.Freight_amt;
//      $scope.other_amt=res.otheramount; 
     
//     });     
// }


})
    
    


</script>
@endpush
