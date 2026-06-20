<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>JK Fenner - {{$data[0]->invoiceno}}</title>
</head>
<style>
body {

  background: rgb(204,204,204);

}
page {
  /*border-style: solid;*/
    padding: 10px;
  background: white;
  display: block;
  margin:-20;
  margin-bottom: -0.5cm;
  box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);

}
page[size="A4"] {
  width: 21cm;
  height: 29.7cm;
}
page[size="A4"][layout="landscape"] {
  width: 29.7cm;
  height: 21cm;
}
page[size="A3"] {
  width: 29.7cm;
  height: 42cm;
}
page[size="A3"][layout="landscape"] {
  width: 42cm;
  height: 29.7cm;
}
page[size="A5"] {
  width: 14.8cm;
  height: 21cm;
}
page[size="A5"][layout="landscape"] {
  width: 21cm;
  height: 14.8cm;
}
@media print {
  body, page {
    margin: 0;
    box-shadow: 0;
  }
}
    .tableheight {
    height: 190px;
}
    table {
  border-collapse: collapse;
}

table, th, td {
  border: 1px solid black;
}
    </style>



     @for($i=0; $i < $a; $i++)

<body style=font-size:9pt; >
  <page>
  <table width="550" height="" border="1">
  <tbody>
    <tr>
      <td   rowspan="2">
          <?php $image_path = '/img/jk_fenner.jpg'; ?>
          <img src="{{ public_path() . $image_path }}" width="150" height="80" alt=""/></td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FORM GSTIN  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[RULE7,Sec31]<br></td>
      <td><center><strong>TAX INVOICE</strong></center></td>
    </tr>
    <tr>
        <td><center><label>J.K. Fenner (India) Limited</label>&nbsp; <br>
            <label>C/o PCL Logistics, 2315, Behind Krishna Furniture, Atul</label><br>
            <label>Kataria Chowk, Old Delhi</label></center></td>
      <td ><center>
        <strong>ORIGINAL FOR RECIPIENT</strong>
          <!-- @if($i == 0)<strong>{{isset($selectcopy)?$selectcopy:'ORIGINAL'}}</strong>
          @elseif($i==1)<strong>DUPLICATE</strong>
          @elseif($i==2)<strong>TRIPLICATE</strong>
          @else($i==3)<strong>EXTRA</strong>@endif
          <br>FOR &nbsp;  RECIPENT-->
        </center>
       </td>
    </tr>
    <tr>
        <td style=font-size:7pt; ><center>Phone : {{$company->cmpphoneno}} faxno:{{$company->cmpmobileno}}</center></td>
        <td><center> E-mail:{{$company->cmpemail}}&nbsp; </center></td>
        <td><center> website: www.mhi-ipt.in&nbsp; &nbsp;</center> </td>
    </tr>
    <tr>
      <td><center><strong>CIN : 4231TN1992PLC062306</strong></center></td>
      <td><center><strong>GSTIN:{{$company->cmpgstino}}</strong></center></td>
      <td><center><strong> PAN:AAACJ7230N</strong></center></td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
      <td>&nbsp;&nbsp; E-WAY BILL No&nbsp;:</td>
    </tr>
  </tbody>
</table>
<table width="550" border="1">
  <tbody>
    <tr>
      <td> &nbsp;<label>GSTIN INV.SL.No.</label>&nbsp;:  <label>{{$data[0]->invoiceno}}</label> </td>
      <td> &nbsp;<label>SAP INVOICE No.</label>&nbsp;:  <label> {{$data[0]->invoiceno}}</label>&nbsp;&nbsp;&nbsp; DATE: {{$data[0]->invoicedate}}</td>
    </tr>
    <tr>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;<strong>Receiver (Biller to)&nbsp; &nbsp; &nbsp; &nbsp; 410185 </strong></td>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;<strong>Details of Consignee (Shipped to) </strong></td>
    </tr>
    <tr>
        <td style=font-size:8pt; >&nbsp;<label>Name</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;<label>{{$customer->customername}}</label><br>
            &nbsp;<label>Address</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;<label>{{$customer->customeraddress}}</label><br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>AddressSample</label><br>
            &nbsp;<label>State</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;<label>{{$customer->customerstate}}</label><br>
            &nbsp;<label>State code & Pin</label>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp; <label>33</label>&nbsp;&nbsp;&nbsp;&&nbsp;&nbsp;<label>33</label> <br>
        &nbsp;<label>GSTIN No</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;<label>{{$customer->customerGSTINno}}</label><br>
            &nbsp;<label>Vendor code</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;<label>{{$customer->vendorcode}}</label></td>

      <td style=font-size:8pt; >&nbsp;<label>Name</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;<label></label><br>
            &nbsp;<label>Address</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;<label></label><br>
            &nbsp;<label>State</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;<label></label><br>
            &nbsp;<label>State code</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp; <label></label><br>
        &nbsp;<label>GSTIN No</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;<label></label></td>
    <tr>
      <td>&nbsp;<label>Internal Order No</label>&nbsp;&nbsp;&nbsp;: &nbsp; &nbsp; &nbsp;<label>3539913</label><br>
          &nbsp;<label>Order Date</label>  &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;:&nbsp; &nbsp; &nbsp; &nbsp;<label>3539913</label></td>
      <td>&nbsp;<label>Purchase Order No.</label> :&nbsp; &nbsp;3539913&nbsp; &nbsp; </td>
    </tr>
  </tbody>
</table>
<table width="550" border="1">
  <tbody>
    <tr>
      <td> HSN Chapter Heading &nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;<label>4016</label> </td>
    </tr>
  </tbody>
</table>
<table  width="550" border="1">
  <tbody >
    <tr>
      <td><center><label><strong>S.No.</strong></label></center></td>
        <td><center><label><strong>SIZE&nbsp; &amp; DESCRIPTION OF GOODS</strong></label></center></td>
        <td ><center><label><strong>QTY</strong></label></center></td>
        <td><center><label><strong>UOM</strong></label></center></td>
        <td ><center><label><strong>RATE PER</strong></label><br><strong>UNIT</strong></center>
            <strong><label>&nbsp;&nbsp;Rs.</label></strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <strong><label>Ps.</label></strong>
           </td>
     <td ><center><label><strong>Total</strong></label></center>
            <strong><label>&nbsp;&nbsp;&nbsp;&nbsp;Rs.</label></strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;   <strong><label>Ps.</label></strong>
           </td>
    </tr>
    <tr>
    <td class="tableheight"><label>1</label></td>
    <td class="tableheight">
        &nbsp;&nbsp;<b><label>{{$data[0]->productname}}</label><br>
        &nbsp;&nbsp;<label></label><br>
        &nbsp;&nbsp;<label></label></b></td>
        <td class="tableheight"><center><b><label>{{$data[0]->productqty}}</label></b></center></td>
    <td class="tableheight"><center><b><label>PC</label></b></center></td>
    <td  class="tableheight" style="text-align:right;"><b><label>{{$data[0]->productsellingrate}}</label></b></td>
        <td  class="tableheight" style="text-align:right;"><b><label>{{$data[0]->netamount}}</label></b> </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><center><b><label>{{$data[0]->productqty}}</label></b></center></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td style="text-align:right;"><b>{{$data[0]->netamount}}</b></td>
    </tr>
  </tbody>
</table>
<table width="550" border="1">
  <tbody>
    <tr>
      <td colspan="6">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; INSURANCE Rs.  &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;Packing &amp; Forwarding:Rs.</td>

    </tr>
    <tr>
      <td width="2" >Disc</td>
      <td width="2">%:</td>
      <td >TOD:&nbsp; &nbsp; &nbsp; &nbsp;0.00 </td>
      <td>CD:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;0.000 </td>
      <td >OTHERS:&nbsp; 0.00 </td>
      <!--<td>&nbsp;</td>-->
    </tr>
    <tr>
      <td width="2">Disc</td>
      <td  width="2">Rs.: </td>
      <td>TOD: </td>
      <td>CD:</td>
      <td>OTHERS: </td>
      <!--<td>&nbsp;</td>-->
    </tr>
  </tbody>
</table>
<table width="550" border="1">
  <tbody>
    <tr>
      <td  width="250" rowspan="3" style="vertical-align: top;
  text-align: left;">

          {{--<!-- <img style="padding-left:10px;padding-top:10px;" src="data:image/png;base64,{{DNS2D::getBarcodePNG(
                                                                $data[0]->po_ref.",".
                                                                $data[0]->po_itemNo.",".
                                                                $data[0]->itemQuantity.",".
                                                                $data[0]->sap_invoiceno.",".
                                                                $data[0]->InvoiceDate.",".
                                                                $data[0]->rate.",".
                                                                $data[0]->rate1.",".
                                                                $data[0]->vendorCode.",".
                                                                $data[0]->customerPartno.",".
                                                                $data[0]->cgstAmount.",".
                                                                $data[0]->sgstAmount.",".
                                                                $data[0]->igstAmount.",".
                                                                $data[0]->ugstAmount.",".
                                                                $data[0]->cgst_per.",".
                                                                $data[0]->sgst_per.",".
                                                                $data[0]->igst_per.",".
                                                                $data[0]->ugst_per.",".
                                                                $data[0]->cess.",".
                                                                $data[0]->basic_value.",".
                                                                $data[0]->invValue.",".
                                                                $data[0]->HASNorSACcode
                                                                ,'QRCODE')}}" alt="barcode" height="90" width="90"/> -->--}}




         <!-- Name:<br>/Rail Way Bill No.:&nbsp;&nbsp;&nbsp;&nbsp;Date &Time:   11.10.2018<br> Weight:  32.400 No.of Bundles: 2<br>DINGUL DISTRICT Name of the State:<br>
      Supply:--></td>
      <td  width="180" colspan="2">&nbsp; &nbsp; TAXABLE VALUE </td>
      <td  style="text-align:right;" rowspan="3">
<b></b><br><br>
{{$data[0]->cgstamount}} <br>
{{$data[0]->sgstamount}}<br>
{{$data[0]->igstamount}}</td>
    </tr>
    <tr>
      <td  colspan="2">&nbsp; &nbsp; RATE OF TAX&nbsp; %</td>
    </tr>
    <tr>
      <td >&nbsp;CGST<br>&nbsp;SGST<br>&nbsp;IGST/UGST</td>
      <td  rowspan="0">  &nbsp; &nbsp; &nbsp;<br>
                         &nbsp; &nbsp; &nbsp;<br>
                         &nbsp; &nbsp; &nbsp;</td>
    </tr>
    <tr>
      <td  >&nbsp; &nbsp;  AMOUNT OF TAX SUBJECT TO REVERSE CHARGES </td>
      <td >CGST<br>SGST<br>IGST/UGST </td>
    </tr>
    <tr>
      <td>1.Term and conditions of this sales given overleaf.<br>2.Certified that the Particular given above are true and correct. </td>
      <td colspan="2">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;TOTAL<br> Invoice value in figure </td>
      <td style="text-align:right;"><b>{{$data[0]->sales_total}}</b> </td>
    </tr>
  </tbody>
</table>
<table width="550" height="" border="1">
  <tbody>
    <tr>
      <td  colspan="2">Voice Value in Words: ONLY</td>
    </tr>
    <tr>
        <td height="89px"></td>
        <td height="89px" style="vertical-align: top; text-align:left;">&nbsp; &nbsp; for &nbsp; J.K. Fenner (India) Limited</td>
        {{--<!--<td > 144&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;      &nbsp; 336351<br>10&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 16.20</td>
      <td rowspan="3" style="vertical-align: top;
  text-align: left;">&nbsp;    for &nbsp;  {{$data[0]->plantName}}</td>-->--}}
    </tr>
  </tbody>
</table>
</page>
</body>
    @endfor
</html>
