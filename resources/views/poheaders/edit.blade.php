@extends('layouts.app')
@section('po','menu-open')
@section('page-title','Edit Purchase Order')
@push('css')
<style type="text/css">
  .select2-selection__rendered
  {
    padding-top: 8px !important;
  }
  .select2-selection__choice
  {
   padding-top: 8px !important; 
  }
  .select2-result-repository__avatar{float:left;width:60px;margin-right:10px}.select2-result-repository__avatar img{width:100%;height:auto;border-radius:2px}.select2-result-repository__meta{margin-left:70px}.select2-result-repository__title{color:black;font-weight:700;word-wrap:break-word;line-height:1.1;margin-bottom:4px}.select2-result-repository__forks,.select2-result-repository__stargazers{margin-right:1em}.select2-result-repository__forks,.select2-result-repository__stargazers,.select2-result-repository__watchers{display:inline-block;color:#aaa;font-size:11px}.select2-result-repository__description{font-size:13px;color:#777;margin-top:4px}.select2-results__option--highlighted .select2-result-repository__title{color:white}.select2-results__option--highlighted .select2-result-repository__forks,.select2-results__option--highlighted .select2-result-repository__stargazers,.select2-results__option--highlighted .select2-result-repository__description,.select2-results__option--highlighted .select2-result-repository__watchers{color:#c6dcef}.s2-docs-sidebar.affix{position:static}
</style>
@endpush
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">New Purchase Order</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
			  <li class="breadcrumb-item"><a href="{{ route('poheaders.poheader.index') }}">PO</a></li>
              <li class="breadcrumb-item active">Edit Purchase Order</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
	
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
			<div class="col-12">
				<div class="card card-primary card-outline">
                    
            <form ng-controller="PoHeaderInventoryController" method="POST" action="{{ route('poheaders.poheader.update', $poheader->id) }}" id="edit_poheader_form" name="edit_poheader_form" accept-charset="UTF-8" class="form-horizontal">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            @include ('poheaders.form', [
                                        'poheader' => $poheader,
                                        'editflag' => true,
                                      ])

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="Update">
                    </div>
                </div>
            </form>

        </div>
    </div>
          </div>
        </div>
      </section>
</div>


@endsection

@push('scripts')
<script type="text/javascript">

    app.filter("filterproducts", [
    function() {
        return function(footballers, iwanttofilter) {
            return arrayIntersection(footballers, iwanttofilter);

            function arrayIntersection(a, b) {
              console.log(a,b);
                return a.filter(function(x) {
                    return b.indexOf(x.id) != -1;
                });
            }
        }
    }]);


app.controller('PoHeaderInventoryController', function($scope,$http,$filter) {
   
var now = new Date();
    
 $scope.myDate = now;
  this.isOpen = false;

$scope.products=@json($poheader->podetail);
$scope.select_products=@json($products);
    
    
$scope.tax_type=@json($poheader->taxtypes); //'intrastate';
$scope.discount_amt=@json($poheader->discountamount);
$scope.Packing_amt=@json($poheader->Packing_amt);
$scope.Freight_amt=@json($poheader->Freight_amt);
$scope.other_amt=@json($poheader->otheramount);
    
$scope.rupees = '';
$scope.paise = '';
$scope.number='';    
    
$scope.taxamountword=@json($poheader->taxamountword);
$scope.grandtotalamountword=@json($poheader->grandtotalamountword);
$scope.customercode_id=@json($poheader->customercode_id);
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
    

$scope.updateDetails=function(){
  $http.get('{{route("customertables.get-mapped-products")}}?customer_id='+$scope.customercode_id).then(function(response){
        var response=response.data;
        console.log(response);
        $scope.products.forEach(m_product=>{
          console.log(m_product);
          found_product=response.find(product=>product.productpartno==m_product.productcode_id);
          if(found_product!=null)
          {
            m_product.productsellingrate=found_product.pivot.productsellingrate;
          }
          else
            m_product.productsellingrate=m_product.originalsellingrate;
        })
      })
  $http.get('{{route("productmaps.get-mapped-products")}}?customer_id='+$scope.customercode_id).then(function(response){
        var response=response.data;
        console.log(response);
    
            $scope.selected_prods=response.map(val=>val.product_id);
          
            console.log($scope.selected_prods);
          
      })
}

// $scope.productinfo=function(){
//   $http.get('{{route("productmaps.get-mapped-products")}}?customer_id='+$scope.customercode_id).then(function(response){
//         var response=response.data;
//         console.log(response);
//         $scope.products.forEach(m_product=>{
//           found_product=response.find(product=>product.productpartno==m_product.productcode_id);
//           if(found_product!=null)
//           {
//             m_product.productsellingrate=found_product.pivot.productsellingrate;
//           }
//           else
//             m_product.productsellingrate=m_product.originalsellingrate;
//         })
       
//       })
// }

setTimeout(function() {
$scope.updateDetails();
}, 100);

$scope.getProductsInfo=function(p){
        $http.get("{{route('products.products.index')}}"+'/getproductlist/'+p.productcode_id+'?customer_id='+$scope.customercode_id).then(function(response) {
            response = response.data;
p.productcgstrate=response.productcgstrate;

p.productcode=response.productcode;

p.productdescription=response.productdescription;
p.productexpirydate=response.productcgstrate;
p.producthsncode=response.producthsncode;
p.productigstrate=response.productigstrate;


p.productname=response.productname;
p.productpartno=response.productpartno;
p.productsellingrate=response.productsellingrate;
p.originalsellingrate=response.productsellingrate;
if(response.pivot!=null)
{
  p.productsellingrate=response.pivot.productsellingrate;
}
p.productsgstrate=response.productsgstrate;
p.uom_id=response.uom_id;

        console.log(response);
    });
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
    $scope.products.push({'productcode_id':'',
'productpartno':'',
'productname':'',
'productdescription':'',
'producthsncode':'',
'productigstrate':'',
'productcgstrate':'',
'productsgstrate':'',
'uom_id':'',
'productsellingrate':'',
'productqty':''});
   
}

    
//$scope.add();
$scope.removeItem=function(index){
    if($scope.products.length>1)
        $scope.products.splice(index,1);
}

$scope.total_amount=function(){
    total=0;
    $scope.products.forEach(product=>{
        total+=product.amount;
    });
    return total;
}
$scope.taxCal1=function(){
     total=0;
    $scope.products.forEach(product=>{
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


 function onlyNumbers(evt) {
    var e = event || evt; // For trans-browser compatibility
    var charCode = e.which || e.keyCode;

    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
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
    
    /*$(document).on('select2:select','.product_name',function(e){
        console.log($(this).val());
        $scope.products[$(this).parent().parent().index()].productcode_id=$(this).val();
        console.log($scope.products);
        $scope.$apply();
        $scope.getProductsInfo($scope.products[$(this).parent().parent().index()]);
    });*/
    
})
    


</script>


@endpush