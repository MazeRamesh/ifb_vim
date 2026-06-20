<!DOCTYPE html>
<html lang="en">
   <head>
      <title>{{$data[0]->invoiceno}}</title>
      <meta charset="utf-8">
     <style>
         td{
            padding-left: 5px;
            padding-top: 3px;
            padding-bottom: 3px;
         }

      </style>
   </head>
    <body style="font-size:9px;font-weight:500;">

   <table border="1" style="width:100%;border-collapse: collapse; border-top-left-radius:70%;">
<tbody>

<tr>
<td  style="width:80%;text-align: center;font-weight: bold;border-right:0ch;font-size: 11px;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; GST INVOICE<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;INVOICE UNDER RULE-7</td>
<td style="text-align:right;padding-right:4px;border-left:0ch;font-size: 8px;"> <b><strong>ORIGINAL</strong>FOR RECIPIENT</b> </td>
</tr>
</tbody>
</table>
<table style="width: 100%;border-collapse:collapse;border-top: 0ch;" border="1" style="" >
   <tbody>
   <tr>
   <td style="width: 33%;vertical-align: baseline;">
<?php $image_path = '/img/NASH.png'; ?>
<img src="{{ public_path() . $image_path }}" alt="" srcset="" style="width:225px;"> </td>
   <td style="width: 33%;text-align: center;"> <b style="font-size: 12px;text-align: center;">{{config('app.company_name')}}</b> <br>
      G-117,SIPCOT INDUSTRIAL PARK <br>
     Vallam Vadagal, Sriperumbudur,Chennai<br>
     Tamil Nadu 602105, <br>
     India</td>
     <td style="width: 33%;">  <b style="font-size: 11px;"> GST Invoice No.</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <b style="font-size: 11px;">: {{$data[0]->invoiceno}}</b> <br>
      <span style="font-size: 10px;">Invoice Issue Date</span>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <span style="font-size: 10px;">{{$data[0]->invoicedate}}</span><br>
      <span style="font-size: 10px;">Billing No</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{$data[0]->salesuniqueno}}<br>
      <span style="font-size: 10px;">Plant</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{$data[0]->plantname}}</td>
   </tr>
   <tr>
   <td style="font-weight: bold;">GST Invoice No : &nbsp;33AADCN9558Q3ZL</td>
   <td style="font-weight: bold;">PAN No : &nbsp;AADCN9558Q</td>
   <td style="font-weight: bold;">Vendor Code :&nbsp;{{$data[0]->vendorCode}}</td>
   </tr>
   </tbody>
   </table>

   <table style="width: 100%;border-collapse:collapse;border-top: 0ch;" border="1" style="" >
      <tbody>
      <tr>
      <td style="width: 50%;">  Detail Of Receiver(BillNo) : <br>
         <b> HYUNDAI MOTOR INDIA LIMITED
</b> <br>
         H1 SIPCOT INDUSTRIAL PARK,<br>
         IRRUNGATTUKOTTAI,<br>
         SRIPERUMBUDUR TK <br>
         TAMIL NADU - 602105<br>
         INDIA <br>
         GST IN: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;  <b> 33AAACH2364M1ZM </b> <br>
         State Code :&nbsp;&nbsp;&nbsp;&nbsp;<b> 33</b> <br>
         State Name :&nbsp;&nbsp;&nbsp;&nbsp;<b>Tamil Nadu</b> </td>
        <td style="width: 50%;">    Consignee(Shipped To) : <br>
         <b> HYUNDAI MOTOR INDIA LIMITED
</b> <br>
         H1 SIPCOT INDUSTRIAL PARK,<br>
         IRRUNGATTUKOTTAI,<br>
         SRIPERUMBUDUR TK<br>
         TAMIL NADU - 602105<br>
         INDIA <br>
         GST IN: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; <b> 33AAACH2364M1ZM </b> <br>
         State Code :&nbsp;&nbsp;&nbsp;&nbsp;<b> 33</b> <br>
         State Name :&nbsp;&nbsp;&nbsp;  <b>Tamil Nadu</b> </td>
      </tr>

      </tbody>
      </table>

         <table style="border-top:0ch;border-collapse:collapse;width: 100%;" border="1">
<tbody>
<tr style="font-size: 8px;text-align: center;">
  <td style="width: 2%;">

               SI

            </td>
            <td style="width: 3%;">

               Shop Code

            </td>
            <td style="width: 5%;">

               PO No

            </td>
            <td style="width: 3%;">

               PO Month

            </td>
            <td style="width: 5%;">

               Internal Part No.

            </td>
            <td style="width: 8%;">

               Customer Part No.

            </td>
            <td style="width:20%;"  >

              Part Name

            </td>
            <td style="width:5%;">

              HSN Code

            </td>
            <td style="width: 2%;">

               ALC

            </td>

            <td style="width: 2%;">

               No.of.Cases

            </td>
            <td style="width: 3%;">

               UOM

            </td>
            <td style="width: 5%;">

               QTY

            </td>
            <td style="width: 5%;">

               Basic Rate

            </td>
            <td style="width: 10%;">

               Assessable Value

            </td>

</tr>
@foreach($data as $key=> $details)
<tr style="font-size: 8px;"> <td style="border-top: 0ch;border-bottom:0ch;width: 2%;text-align: center;">
               {{$key+1}}

            </td>
            <td style="border-top: 0ch;border-bottom:0ch;width: 3%; text-align: center;" >
               {{$details->shopcode}}
            </td>
            <td style="border-top: 0ch;border-bottom:0ch;width: 5%;text-align: center;">
                {{$details->ponumber}}
            </td>
            <td style="border-top: 0ch;border-bottom:0ch;width: 3%;text-align: left;">
                {{$details->podateinword}}

            </td>
            <td style="border-top: 0ch;border-bottom:0ch;width: 5%;text-align: left;">
                {{$details->ITWPartNo}}

            </td>
            <td style="border-top: 0ch;border-bottom:0ch;width: 8%;text-align: left;">
                {{$details->HMILPartNo}}

            </td>
            <td style="border-top: 0ch;border-bottom:0ch;width:20%;text-align: left;font-size: 7px;"  >
              {{$details->ItemServiceDescription}}

            </td>
            <td style="border-top: 0ch;border-bottom:0ch;width:5%;text-align: left;">
             {{$details->HASNorSACcode}}

            </td>
            <td style="border-top: 0ch;border-bottom:0ch;width: 2%;text-align: center;">


            </td>

            <td style="border-top: 0ch;border-bottom:0ch;width: 2%;text-align: center;">
                {{$details->NoOfCases}}

            </td>
            <td style="border-top: 0ch;border-bottom:0ch;width: 3%;text-align: center;">
                {{$details->uom_id}}

            </td>
            <td style="border-top: 0ch;border-bottom:0ch;text-align: center;width: 5%;">
                {{$details->productqty}}

            </td>
            <td style="border-top: 0ch;border-bottom:0ch;width: 5%;text-align: right;">
             {{$details->productsellingrate}}

            </td>
            <td style="border-top: 0ch;border-bottom:0ch;width: 10%;text-align: right;">
               {{$details->netamount}}
            </td>
</tr>
@endforeach


@for($j=$datacount; $j<8; $j++)
<tr style="font-size: 8px;">
            <td style="border-top: 0ch;border-bottom:0ch;width: 2%;height: 10px;"></td>
            <td style="border-top: 0ch;border-bottom:0ch;width: 3%;"></td>
            <td style="border-top: 0ch;border-bottom:0ch;width: 5%;"></td>
            <td style="border-top: 0ch;border-bottom:0ch;width: 3%;"></td>
            <td style="border-top: 0ch;border-bottom:0ch;width: 5%;"></td>
            <td style="border-top: 0ch;border-bottom:0ch;width: 8%;"></td>
            <td style="border-top: 0ch;border-bottom:0ch;width:20%;"></td>
            <td style="border-top: 0ch;border-bottom:0ch;width:5%;"></td>
            <td style="border-top: 0ch;border-bottom:0ch;width: 2%;"></td>
            <td style="border-top: 0ch;border-bottom:0ch;width: 2%;"></td>
            <td style="border-top: 0ch;border-bottom:0ch;width: 3%;"></td>
            <td style="border-top: 0ch;border-bottom:0ch;width: 5%;"></td>
            <td style="border-top: 0ch;border-bottom:0ch;width: 5%;"></td>
            <td style="border-top: 0ch;border-bottom:0ch;width: 12%;"></td>

</tr>
@endfor

</tbody>
</table>

   <table style="width: 100%;border-collapse:collapse;border-top: 0ch;" valign="top"border="1" style="" >
      <tbody>
      <tr style="padding-top:0px;padding-left: 0px;">
         <td style="padding-left:4px; padding-top:0px;border-right: 0ch;vertical-align: initial;">


            <div style="width: 47%;float:left;border:0ch;"> Vehicle No &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;{{$data[0]->transport}} <br>
               Mode of Transport&nbsp;&nbsp;&nbsp;: <br>
               Payment Terms&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <br>
              </div>
            <div style="width: 50%;float:right;border-left:1px solid black;padding-left: 5px;"> Through  &nbsp;&nbsp;: <br>
               Delivery &nbsp;&nbsp;&nbsp;: <br>
               Freight &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <br></div>
            <div style="width: 100%;clear:both;border-top:1px solid black;padding-top:7px;line-height: 13px;">  Electronic Reference No &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
               <br>               Date &  Time of Preparation &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <br>
               Date & Time of Removal&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <br></div>


                         <td style="width: 20%;border-right: 0ch;">
                                            Less Amortization Value<br>
                                                    SubTotal <br>
                                                  SGST @14 <br>
                                                       CGST @14  <br>
                                                     IGST @  <br>
                                                       <b>  Tax Amount </b>  <br>
                                                    <b style="font-size: 11px;">Total Amount</b>
                      </td> <td style="width: 20%;font-weight: bold ; text-align:right;border-left: 0ch;">
                                <br>
                                {{$data[0]->taxableamounts}}
                                <br>
                                {{$data[0]->sgstamount}}
                                <br>
                                {{$data[0]->cgstamount}}
                                <br>
                                {{$data[0]->igstamount}}
                                <br>
                                {{$data[0]->taxamounts}}
                                <br>
                                <b style="font-size: 11px;">{{$data[0]->sales_total}}</b>
                                </td>



      </tr>



      </tbody>
      </table>

         <table border="1" style="width:100%;border-collapse: collapse;border-top: 0ch;">
            <tbody>

               <tr>
                  <td  style="width:100%;">  Tax Amount (in Words) &nbsp;&nbsp;&nbsp;: {{$data[0]->taxamountword}}.
                  <br>
                  Total Amount (in Words) &nbsp;: {{$data[0]->grandtotalamountword}}.
                  </td>
                  </tr>

            </tbody>
            </table>

         <table style="width: 100%;border-collapse:collapse;border-top: 0ch;" border="1" style="" >
            <tbody>

            <tr>
            <td style="width:25%; vertical-align: top;">  <b>  BUYER DETAILS </b>
            </td>
            <td style="width:25%;vertical-align: top;"> <b>SECURITY GATE ENTRY</b>
            </td>
            <td style="width:25%;vertical-align: top;"> <b>RECEIPT ACKNOWLOGEMENT</b> <br>


               LOCATION  :<br>
               QTY RECD : <br>
               SIGNATURE :  <br>
               STAMP :


            </td>
            <td style="width:25%;vertical-align: top;"> <b>SRV NO :</b> <br>

               <span style="font-size: 8px;"> Applicable   Examption    Notification    No.Date </span>


            </td>
            </tr>
            </tbody>
            </table>

         <table style="width: 100%;border-collapse:collapse;border-top: 0ch;" border="1" style="" >
            <tbody>
            <tr>
            <td style="width: 22.3%;padding: 10px;">
<?php $img_path = '/app/Barcode.png'; ?>
<img src="{{ storage_path() . $img_path }}" alt="" style="width: 160px;"></td>
            <td style="width: 33%;padding: 4px;
    vertical-align: baseline;"><


            <div style="width: 99%;text-align:justify;clear:both;padding:2px;vertical-align:baseline;"> <b>  Terms:</b> &nbsp;&nbsp;&nbsp;<br>All Claims and disputes arising out of contracts made by us
               subject to Chennai Junsdiction. Any Central or state authorities
               are born by purchaser. 18 % per annum intrest will charged on
               accounts remaining unpaid after the due date. Certified that the
               particulars given above are true and amount indicated
               represents the price actually charged & that there is not flow of
               addional consideration.</div>

            </td>
            <td style="width: 33%;padding-left:0px; vertical-align:top;   padding-top: 0px;">


            <div style="width: 100%;text-align: justify;padding:5px;border-bottom: 1px solid black;">Certified that the particulars given above are true and
<br>amount indicated represents the price actually charged
<br>& that there is not flow of addional consideration
<br>directly or indirectly from the buyer.
</div>


            <div style="text-align: center;width: 100%;font-size: 11px;">

<b>for NSAH INDUSTRIES PVT LTD</b>

            </div>
            <div style="text-align: center;padding-top: 100px;width: 100%;">

<b>Name of the Signature</b>

            </div>

            </td>

            </tr>

            </tbody>
            </table>
            <table style="width: 100%;font-weight:bold;border-collapse:collapse;border-top: 0ch;text-align: center;" border="1" style="" >
               <tbody>
                  <tr>
                     <td style="height: 10px;">DELIVERY CARD / M.R.I.R</td>
                  </tr>
               </tbody>
            </table>
         <table style="font-weight:bold;width: 100%;border-collapse:collapse;border-top: 0ch;text-align: center;" border="1" style="" >
            <tbody>
               <tr>

                  <td style="width: 3%;">

                     Vendor

                  </td>
                  <td style="width: 3%;">

                     Location

                  </td>
                  <td style="width: 3%;">

                     Shop Code
                  </td>
                  <td style="width: 3%;">

                     Gate No

                  </td>
                  <td style="width: 6%;">

                     Schd Date

                  </td>
                  <td style="width: 6%;">

                     Recd Date
                  </td>
                  <td style="width: 10%;">

                     MRIR No
                  </td>
                     </tr>

                     <tr>
                        <td style="width: 3%;">

                           {{$data[0]->vendorCode}}
                        </td>
                        <td style="width: 3%;">

                        </td>
                        <td style="width: 3%;">

                           {{$data[0]->shopcode}}

                        </td>
                        <td style="width: 3%;">

                           {{$data[0]->gateno}}

                        </td>
                        <td style="width: 6%;">


                        </td>
                        <td style="width: 6%;">



                        </td>
                        <td style="width: 12%;">


                        </td>

                           </tr>

            </tbody>
         </table>
         <table style="width: 100%;font-weight:bold;border-collapse:collapse;border-top: 0ch;text-align: center;" border="1" style="" >
            <tbody>
            <tr style="font-size: 8px;">

                <td style="width: 6%;">

                   Part No

                </td>
                <td style="width: 3%;">

                   Cont Type

                </td>
                <td style="width: 3%;">
                   No Of Cont                         </td>
                <td style="width: 3%;">

                   Stuff Qty
                </td>
                <td style="width: 4%;">

                   Rec Qty
                   &nbsp;
                   &nbsp;
                   &nbsp;
                   &nbsp;
                   </td>
                <td style="width: 4%;">

                   Rej Qty

                </td>  <td style="width: 4%;">

                   Acc Qty
                   &nbsp;
                   &nbsp;
                   &nbsp;
                   &nbsp;
                   </td>
                <td style="width: 4%;">


                   Recd Qty
                </td>
                <td style="width: 18%;">

                  HMI Entry Seal
                </td>
                   </tr>
      @foreach($data as $key=> $details)
 <tr style="font-size: 8px;">

                <td style="border-top:0ch;border-bottom:0ch;width: 3%;text-align: left">
                {{$details->HMILPartNo}}
                </td>
                <td style="border-top:0ch;border-bottom:0ch;width: 3%;">

                </td>
                <td style="border-top:0ch;border-bottom:0ch;width: 3%;">
                                           </td>
                <td style="border-top:0ch;border-bottom:0ch;width: 3%;">

                </td>
                <td style="border-top:0ch;border-bottom:0ch;width: 6%;">

                </td>
                <td style="border-top:0ch;border-bottom:0ch;width: 6%;">

                </td>
                <td style="border-top:0ch;border-bottom:0ch;width: 6%;">

                </td>
                <td style="border-top:0ch;border-bottom:0ch;width: 6%;">

                </td>
                <td style="border-top:0ch;border-bottom:0ch;width: 11.1%;">

                </td>
                   </tr>
                   @endforeach

                   @for($k=$datacount; $k<8; $k++)
<tr style="font-size: 8px;">

                <td style="border-top:0ch;border-bottom:0ch;width: 3%;text-align: left;height: 10px;">
                </td>
                <td style="border-top:0ch;border-bottom:0ch;width: 3%;">

                </td>
                <td style="border-top:0ch;border-bottom:0ch;width: 3%;">
                                           </td>
                <td style="border-top:0ch;border-bottom:0ch;width: 3%;">

                </td>
                <td style="border-top:0ch;border-bottom:0ch;width: 6%;">

                </td>
                <td style="border-top:0ch;border-bottom:0ch;width: 6%;">

                </td>
                <td style="border-top:0ch;border-bottom:0ch;width: 6%;">

                </td>
                <td style="border-top:0ch;border-bottom:0ch;width: 6%;">

                </td>
                <td style="border-top:0ch;border-bottom:0ch;width: 11.1%;">

                </td>
                   </tr>
                      @endfor
            </tbody>
            </table>
            <table style="width: 100%;font-weight:bold;border-collapse:collapse;border-top: 0ch;text-align: center;" border="1" style="" >
               <tbody>
                  <tr>
                     <td style="height: 30px;"></td>
                  </tr>
               </tbody>
            </table>

   </body>


</html>
