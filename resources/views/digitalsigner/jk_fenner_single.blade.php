<!DOCTYPE html>
<html>
<head>
<style>
body
{
  margin-right:40px;
  margin-top:-10px;
  font-size:11px;
}
table
{
  border-collapse: collapse;
  border-radius:15px;
}
table, td, th
{
  border: 1px solid black;

}
</style>
</head>
 @for($i=0; $i < count($a); $i++)
<body>

<p>&nbsp;</p>
<table width="100%">
<tbody>
<tr>
<td colspan="3" rowspan="2">&nbsp; <?php $image_path = '/img/jk_fenner.jpg'; ?>
          <img src="{{ public_path() . $image_path }}" width="130" height="40" alt=""/></td>
<td colspan="4"><center>FORM GSTIN  &nbsp;&nbsp;  &nbsp;&nbsp;   &nbsp;&nbsp; [RULE7,Sec31]</center></td>
<td colspan="3"><center><strong>TAX INVOICE</strong></center></td>
</tr>
<tr>
<td colspan="4"><center><label ><b>J.K. Fenner (India) Limited</b></label>&nbsp; <br>
            <label >C/o PCL Logistics, 2315, Behind Krishna Furniture,</label><br>
            <label>Atul Kataria Chowk, Old Delhi,</label><br>
            <label > Grugaon - 122 001.</label></center></td>
<td colspan="3"><center>
<strong>ORIGINAL<br></strong>FOR RECIPIENT

</center></td>
</tr>
<tr>
<td colspan="3"><center>Phone : {{$company->cmpphoneno}}</center></td>
<td colspan="4"><center> E-mail :&nbsp;{{$company->cmpemail}}</center></td>
<td colspan="3"><center> website: www.mhi-ipt.in</center> </td>
</tr>
<tr>
<td colspan="3"><center><strong>CIN : 4231TN1992PLC062306</strong></td>
<td colspan="4"><center><strong>GSTIN :{{$company->cmpgstino}}</strong></center></td>
<td colspan="3"><center><strong> PAN:AAACJ7230N</strong></center></td>
</tr>
<tr>
<td colspan="5">E-WAY BILL No</td>
<td colspan="5">E-WAY BILL Date</td>
</tr>
<tr>
<td colspan="5"><label>GSTIN INV.SL.No.</label>:<label>{{$data[0]->invoiceno}}</label></td>
<td colspan="5"><label>SAP INVOICE No.</label>:<label>{{$data[0]->invoiceno}}</label>&nbsp;&nbsp;&nbsp; DATE: {{$data[0]->invoicedate}}</td>
</tr>
<tr>
<td colspan="5"><strong>Receiver (Biller to)&nbsp; &nbsp; &nbsp; &nbsp; 410185 </strong></td>
<td colspan="5"><strong>Details of Consignee (Shipped to) </strong></td>
</tr>
<tr>
        <td colspan="5">&nbsp;<label>Name</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;<label>{{$customer->customername}}</label><br>
            &nbsp;<label>Address</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;<label>{{$customer->customeraddress}}</label><br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>AddressSample</label><br>
            &nbsp;<label>State</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;<label>{{$customer->customerstate}}</label><br>
            &nbsp;<label>State code & Pin</label>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp; <label>33</label>&nbsp;&nbsp;&nbsp;&&nbsp;&nbsp;<label>33</label> <br>
        &nbsp;<label>GSTIN No</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;<label>{{$customer->customerGSTINno}}</label><br>
            &nbsp;<label>Vendor code</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;<label>{{$customer->vendorcode}}</label></td>
<td colspan="5"><label>Name</label><br><label>Address</label><br><label>State</label><br><label>State code</label><br><label>GSTIN No</label></td>
</tr>
<tr>
<td colspan="5"><label>Internal Order No</label><br><label>Order Date</label></td>
<td colspan="5"><label>Purchase Order No.</label></td>
</tr>
<tr>
<td colspan="10"> <label>HSN Chapter Heading:&nbsp; &nbsp;4016</label></td>
</tr>

<tr>
<td><center><label><strong>S.No.</strong></label></center></td>
<td colspan="5"><center><label><strong>SIZE&nbsp; &amp; DESCRIPTION OF GOODS</strong></label></center></td>
<td><center><label><strong>QTY</strong></label></center></td>
<td><center><label><strong>UOM</strong></label></center></td>
<td ><center><label><strong>RATE PER<br> UNIT</strong></label></center><br>

</td>
<td ><center><label><strong>TOTAL</strong></label></center>

           </td>
</tr>

<tr>
	<td style="text-align:center;height:200px;!important">

	<p>1</p>
	<p>1</p>
	<p>1</p>

	</td>

	<td colspan="5" style="text-align:center;">
		@foreach($data as $details)
		<p>{{ $details->productname }}</p>
		@endforeach
	</td>
	<td style="text-align:center;">
		@foreach($data as $details)
		<p>{{ $details->productqty }}</p>
		@endforeach
	</td>
	<td style="text-align:center;">
		@foreach($data as $details)
		<p>{{ $details->uom_id }}</p>
		@endforeach
	</td>
	<td style="text-align:center;">
		@foreach($data as $details)
		<p>{{ $details->productsellingrate }}</p>
		@endforeach
	</td>
	<td style="text-align:right;" >
		@foreach($data as $details)
		<p>{{ $details->netamount }}</p>
		@endforeach
	</td>

</tr>
<tr>
<td>&nbsp;</td>
<td colspan="5">&nbsp;</td>
<td><center><b><label>{{$data[0]->productqty}}</label></b></center></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td style="text-align:right;"><b>{{$data[0]->netamount}}</b></td>
</tr>
<tr>
<td colspan="10"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; INSURANCE Rs.  &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;Packing &amp; Forwarding:Rs.</td>
</tr>
<tr>
<td width="2" >Disc</td>
      <td width="2">%:</td>
<td colspan="2">TOD:&nbsp; &nbsp; &nbsp; &nbsp;0.00 </td>
<td colspan="2">CD:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;0.000 </td>
<td colspan="2">OTHERS:&nbsp; 0.00 </td>
<td colspan="2" >&nbsp;</td>
</tr>
<tr>
<td width="2">Disc</td>
      <td  width="2">Rs.: </td>
<td colspan="2">TOD: </td>
<td colspan="2">CD:</td>
<td colspan="2">OTHERS: </td>
<td colspan="2">&nbsp;</td>
</tr>
<tr>
<?php $image_path = '/img/barcode.png'; ?>
<td colspan="4" style="text-align: center;" rowspan="3"><img src="{{ public_path() . $image_path }}" width="100" height="100" alt="" /></td>
<td colspan="4">TAXABLE VALUE</td>
<td colspan="2" style="border-bottom:none;float: right;" >1212</td>
</tr>
<tr>
<td colspan="4">RATE OF TAX %</td>
<td colspan="2" style="border-bottom:none;border-top:none;float: right;" >1212</td>
</tr>
<tr>
<td colspan="2">CGST<br>
SGST<br>
IGST/UGST</td>
<td colspan="2">
	9.00<br>
9.00<br>
18.00
</td>
<td colspan="2" style="border-top:none;text-align: right;">{{$data[0]->cgstamount}}<br>{{$data[0]->sgstamount}}<br>{{$data[0]->igstamount}}</td>

</tr>

<tr>
<td colspan ="4">AMOUNT OF TAX SUBJECT TO REVERSE CHARGES</td>
<td colspan="2">CGST<br>
SGST<br>
IGST/UGST</td>
<td colspan="4">&nbsp;</td>
</tr>
<tr>
<td colspan="4">1.Term and conditions of this sales given overleaf.<br>
2.Certified that the Particular given above are true and correct.</td>
<td colspan="4">TOTAL<br>
Invoice value in figure</td>
<td colspan="2" style="text-align:right;font-size: 15px;">&nbsp;<label><strong>{{$data[0]->sales_total}}</strong></label></td>
</tr>
<tr>
<td colspan="10">Invoice Value in Words: {{$data[0]->grandtotalamountword}} ONLY</td>
</tr>
<tr >
<td colspan="7"><p><strong>TERMS & CONDITION</strong></p>
<p style="font-size:8px;">1.The responsibility of the Company ceases on delivery of the goods to the buyer or his agent at any of the Company's
Offices or by the transporters/carriers at the destination.<br>
2.The goods supplied to order will not be taken back.<br>
3.No complaint for shortages/damages will be entertained unless shortage certificate(s) is/are produced from the
carriers/transporters indicating clearly the cause of damages to the sathisfaction
of the company within a week from the date of delivery. Claim, regarding quality of goods may be considered provided
the Company receives the complaint within a period of 15 days from the date of delivery. Submission of claim does not
observe the buyer from the obligation to pay the debts to the Company.<br>
4.All payments should be made as per the agrees terms. Interest will be collected @18% p.a. for delayed payments.
The charges of buyer's bankers will be to buyer's account only.<br>
5.Any GST/such other tax levy either existing or that may be imposed or assessed in future on the sale of the products
covered under this invoice in addition to the duty/tax already charged shall be payable by the buyer.</p>

</td>

<td colspan="3" style="padding-bottom:100px;padding-left:30px;"> for &nbsp; J.K. Fenner (India) Limited</td>
</tr>


</tbody>
</table>


</body>
@endfor
</html>
