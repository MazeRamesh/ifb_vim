<html>
<head>
<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
    
    p{
        padding-left: 8px;
        font-weight: bold;
        text-align: left;
    }
    
    
    .setborder{
     border: 2px solid black;
     font-size: 6pt;
     font-family: Arial, Helvetica, sans-serif;  
    }
    
    .column {
    float: left;
    width: 30%;
    padding: 1px;
    height: 200px;
       
    }
    .row:after {
    content: "";
    display: table;
    clear: both;
    }
    
</style>
    <script>
        //window.print();
      // setTimeout(function(){history.back();}, 1000);
        //window.history.back();
    </script>
</head>
<body>

<div class="setborder">

<table style="width:100%">
  <tr>
    <th style="width:50%">
    <?php $image_path = '/images/boachLogo.jpg'; ?>
<img style="padding-left:10px; padding-top:5px;" src="{{ public_path() . $image_path }}"  height="40" width="100">
        <br>
        <p>APOLLO TYRES LTD</p>
        <p>B-25,Sipcot Indl Estate,Sriperumbudur,Oragadam,</p>
        <p>Kanchipuram</p>
        <p>Kanchipuram,Tamilnadu,602105</p>
        <p>Phone No - 044-37182132-47, Fax - </p><br>
      </th>
    <th style="width:50%">
        <?php $image_path = '/images/daimler.png'; ?>
<img style="padding-left:10px; padding-top:15px;" src="{{ public_path() . $image_path }}"  height="40" width="40">
        <br>
        <p>Daimler India Commercial Vehicles Pvt. Ltd.</p>
        <p>Unit 301 & 302, 3rd Floor,</p>
        <p>Campus 3B, RMZ Millennia,</p>
        <p>Business Park,No 143,</p>
        <p>Dr.M.G.R.Road,Perungudi,</p>
        <p>Chennai – 600 096 India</p><br>
      </th> 
  </tr>
  
</table>
    <br>
    <br>
    
     @for($i=0; $i < count($reprints); $i++)
    
<div class="row">
  <div class="column" style="width:30%">
    <img style="padding-left:10px;" src="data:image/png;base64,{{DNS2D::getBarcodePNG(
                                         $reprints[$i]->customerPartNo.":".$reprints[$i]->manufDate.":"."AP"."-".$reprints[$i]->qty, 'QRCODE')}}" alt="barcode" height="160" width="160"/>
  </div>
        <div class="column" style="width:12%">
        <p>Part Number<b style="padding-left:15px;">:</b></p><br>
        <p>MM-CW-YY<b style="padding-left:20px;">:</b></p><br>
        <p>Make<b style="padding-left:42px;">:</b></p><br>
        <p>Description<b style="padding-left:18px;">:</b></p><br>
		<p>Invoice Number<b style="padding-left:2px;">:</b></p><br>
        </div>
        
        <div class="column" style="width:30%">
        <p>{{$reprints[$i]->customerPartNo}} - {{$reprints[$i]->qty}}</p><br>
        <p>{{$reprints[$i]->manufDate}}</p><br>
        <p>AP(Apollo)</p><br>
        <p>{{$description[$i]}}</p><br>
		<p>{{$reprints[$i]->invoicenumber}}</p><br>
        </div>
</div>
    
    <?php

$upDate = new DateTime();  
$updates = DB::table('barcodelabels')->where('customerPartNo', '=', $reprints[$i]->customerPartNo)
            ->update(['created_at' => $upDate]);

?>   
     @endfor
    
    </div>

</body>
</html>












































