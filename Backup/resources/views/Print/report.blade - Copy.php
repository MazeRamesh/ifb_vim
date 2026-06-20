<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Jka4</title>
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
  margin:-30;
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
    </style>



     @for($i=0; $i < $a; $i++)

<body style=font-size:10pt; >
	<page>
	<table width="550" height="" border="1">
  <tbody>
    <tr>
      <td   rowspan="2">
          <?php $image_path = '/images/jk_fennerLogo.jpg'; ?>
          <img src="{{ public_path() . $image_path }}" width="150" height="80" alt=""/></td>
      <td>&nbsp;&nbsp;FORM GSTIN  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[RULE7,Sec31]<br></td>
      <td><center><strong>TAX INVOICE</strong></center></td>
    </tr>
    <tr>
        <td><center><label>J.K.FENNER(INDIA) Limited</label>&nbsp; <br>
            <label>NO.3,Madurai-Melakkai Road,&nbsp;Kochadai,</label><br>
            <label>MADURAI-625016.</label></center></td>
      <td ><center>
          @if($i == 0)<strong>{{isset($selectcopy)?$selectcopy:'ORIGINAL'}}</strong>
          @elseif($i==1)<strong>DUPLICATE</strong>
          @elseif($i==2)<strong>TRIPLICATE</strong>
          @else($i==3)<strong>EXTRA</strong>@endif
          <br>FOR &nbsp;  RECIPENT</center>
       </td>
    </tr>
    <tr>
        <td style=font-size:7pt; ><center> 0452-4283800,4283863 faxno:0452-4283850.</center></td>
        <td><center> E-mail:filmdu@jkfenner.com&nbsp; </center></td>
        <td><center> website: www.mhi-ipt.in&nbsp; &nbsp;</center> </td>
    </tr>
    <tr>
      <td><center><strong> 4231TN1992PLC062306</strong></center></td>
      <td><center><strong>GSTIN:33AAACJ7230N1ZJ</strong></center></td>
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
      <td> &nbsp;<label>INV.SL.No.</label>&nbsp;:  <label>1002671163</label> </td>
      <td> &nbsp;<label>SAP INVOICE No.</label>&nbsp;:  <label> 1002671163</label>&nbsp;&nbsp;&nbsp; DATE: 11.10.2018</td>
    </tr>
    <tr>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;<strong>Receiver (Biller to)&nbsp; &nbsp; &nbsp; &nbsp; 410185 </strong></td>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;<strong>Details of Consignee (Shipped to) </strong></td>
    </tr>
    <tr>
        <td style=font-size:8pt; >&nbsp;<label>Name</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;<label>TRACTOR &amp; FARM EQUIPMENT LTD</label><br>
            &nbsp;<label>Address</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;<label>10/205 KALLADIPATTI P.O;</label><br>
            &nbsp;<label>Dindiguk District</label>&nbsp;&nbsp;:&nbsp;&nbsp;<label>624201</label> <br>
            &nbsp;<label>State</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;<label>Tamil nadu</label><br>
            &nbsp;<label>State code</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp; <label>33</label><br>
        &nbsp;<label>GSTIN No</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;<label>33AAACT2761Q1Z1</label><br>
            &nbsp;<label>Vendor code</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;<label>DJ0105</label></td>

      <td style=font-size:8pt; >&nbsp;<label>Name</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;<label></label><br>
            &nbsp;<label>Address</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;<label></label><br>
            &nbsp;<label>State</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;<label></label><br>
            &nbsp;<label>State code</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp; <label></label><br>
        &nbsp;<label>GSTIN No</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;<label></label></td>
    <tr>
      <td>&nbsp;<label>Orderno</label>&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<label>172628</label><br>
          &nbsp;<label>Order Date</label>&nbsp; &nbsp; &nbsp;&nbsp;:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<label>11.10.2018</label></td>
      <td>&nbsp;<label>Purchase Order No.</label> :&nbsp; &nbsp;1030000771&nbsp; &nbsp; </td>
    </tr>
  </tbody>
</table>
<table width="550" border="1">
  <tbody>
    <tr>
      <td> chapter heading</td>
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
    <td class="tableheight"><label>TRANSMISSION RUBBER BELTS POWER FLEX 051-TW1245 021M01</label></td>
        <td class="tableheight"><center><b><label>200</label></b></center></td>
    <td class="tableheight"><center><b><label>PC</label></b></center></td>
    <td  class="tableheight" style="text-align:right;"><b><label>70.51</label></b></td>
        <td  class="tableheight" style="text-align:right;"><b><label>14,102.00</label></b> </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><center><b><label>200</label></b></center></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;14,102.00</td>
    </tr>
  </tbody>
</table>
<table width="550" border="1">
  <tbody>
    <tr>
      <td colspan="6">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; INSURANCE Rs.&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Packing &amp; Forwarding:Rs.</td>

    </tr>
    <tr>
      <td width="2" >&nbsp;</td>
      <td width="2">%:</td>
      <td >TOD:&nbsp; &nbsp; &nbsp; &nbsp;0.00 </td>
      <td>CD:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;0.000 </td>
      <td >OTHERS:&nbsp; 0.00 </td>
      <!--<td>&nbsp;</td>-->
    </tr>
    <tr>
      <td width="2">&nbsp;</td>
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

          <img style="padding-left:10px;" src="data:image/png;base64,{{DNS2D::getBarcodePNG("ABCD", 'QRCODE')}}" alt="barcode" height="80" width="90"/>


         <!-- Name:<br>/Rail Way Bill No.:&nbsp;&nbsp;&nbsp;&nbsp;Date &Time:   11.10.2018<br> Weight:  32.400 No.of Bundles: 2<br>DINGUL DISTRICT Name of the State:<br>
      Supply:--></td>
      <td  width="180" colspan="2">&nbsp; &nbsp; TAXABLE VALUE </td>
      <td  style="text-align:right;" rowspan="3">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;14,102.00<br>
<br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 1269.18<br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 1269.18</td>
    </tr>
    <tr>
      <td  colspan="2">&nbsp; &nbsp; RATE OF TAX&nbsp; %</td>
    </tr>
    <tr>
      <td >&nbsp;CGST<BR>&nbsp;SGST<BR>&nbsp;IGST/UGST</td>
      <td  rowspan="0">  &nbsp; &nbsp; &nbsp;9.00<br>
&nbsp; &nbsp; &nbsp;9.00</td>
    </tr>
    <tr>
      <td  >&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; OF TAX SUBJECT TO REVERSE CHARGES </td>
      <td >CGST<BR>SGST<BR>IGST/UGST </td>
    </tr>
    <tr>
      <td>1.Term and conditions of this sales given overleaf.<br>2.Certified that the Particular given above are true and correct. </td>
      <td colspan="2">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;TOTAL<br> Invoice value in figure </td>
      <td>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 16640.36</td>
    </tr>
  </tbody>
</table>
<table width="550" height="" border="1">
  <tbody>
    <tr>
      <td  colspan="2">Voice Value in Words: SIXTEEN THOUSAND SIX HUNDRED FORTY AND PAISE THIRTY-SIX ONLY</td>
    </tr>
    <tr>
      <td> 144&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;      &nbsp; 336351<BR>10&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 16.20</td>
      <td rowspan="3" style="vertical-align: top;
  text-align: left;">&nbsp;    for  J.K.Fenner (india)Ltd.,</td>
    </tr>
  </tbody>
</table>
</page>
</body>
    @endfor
</html>
