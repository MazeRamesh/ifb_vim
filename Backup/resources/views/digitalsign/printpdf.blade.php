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
@for($i=0; $i < count($a); $i++)
@for($k=0; $k < $Barcodecount; $k++)
    <body style="font-size:9px;font-weight:500;padding:0px;margin:0px; ">

   <table border="1" style="width:100%;border-collapse: collapse; border-top-left-radius:70%;">
<tbody>

<tr>
<td  style="width:80%;text-align: center;font-weight: bold;border-right:0ch;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; GST INVOICE<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size:6px;">(Under section 31 of the Central Goods & Service Tax Act 2017 Read with GST Invoice Rule)</span></td>
<td style="text-align:right;padding-right:4px;border-left:0ch;"> <b>@if($a[$i]=="original")<strong>ORIGINAL</strong>FOR RECIPIENT
@elseif($a[$i]=="duplicate")<strong>DUPLICATE</strong>FOR TRANSPORTER
@elseif($a[$i]=="triplicate")<strong>TRIPLICATE</strong>FOR SUPPLIER
@else($a[$i]=="extra")<strong>EXTRA COPY</strong> 
@endif</b> </td>
</tr>
</tbody>
</table>
<table style="width: 100%;border-collapse:collapse;border-top: 0ch;" border="1" style="" >
   <tbody>
   <tr>
   <td style="width: 15%;vertical-align: baseline;"> 
<?php $image_path = '/img/Logo.jpg'; ?>
<img src="{{ public_path() . $image_path }}" alt="" srcset="" style="width:170px;"> </td>
   <td style="width:30%;"> <b style="font-size: 12px;">BASF Catalyst India Pvt. Ltd.</b> <br>
      Plot No:P8/1, Veerapuram Village, <br>
     Mahindra World City, Chengelpet Taluk, <br>
     Kanchipuram District – <br>
     Tamil Nadu 603002, <br>
     India</td>
     <td style="border-right:0ch;">  <b style="font-size: 10px;"> GST Invoice No.</b> &nbsp;&nbsp;  <b style="font-size: 10px;">: {{$data[0]->invoiceno}}</b> <br>
       Internal Doc No.</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b style="font-size: 10px;">: {{$data[0]->billno}}</b> <br>
      Invoice Issue Date  &nbsp;&nbsp; : {{$data[0]->invoicedate}}<br>
      CIN No &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : U27105MH1997PTC199824<br>
      EWB &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{$data[0]->ewaybillno}}<br>
      Valid till &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{$data[0]->validUpto}}
     </td>
     <td style="width:10%;border-left:0ch;">
<img src="data:image/jpeg;base64,{{ $irn_barcode[$k] }}" alt="" style="width: 75px;height:75px;"> </td>
   </tr>
   <tr>
   <td style="font-weight: bold;">GSTIN No : &nbsp;33AAACE2545B1ZD</td>
   <td style="font-weight: bold;">PAN No : &nbsp;AAACE2545B</td>
   <td style="font-weight: bold;border-right:0ch;">Vendor Code :&nbsp;T00N</td>
   <td style="width:15%;border-left:0ch;">  </td>
   </tr>
   </tbody>
   </table>
   <!-- DivTable.com -->
   <table style="width: 100%;border-collapse:collapse;border-top: 0ch;" border="1" style="" >
      <tbody>
      <tr>
      <td style="width: 50%;">  Detail Of Receiver(BillNo) : <br>
         <b> HYUNDAI MOTOR INDIA LIMITED
</b> <br>
         H1 SIPCOT INDUSTRIAL PARK, IRRUNGATTUKOTTAI,<br>
         SRIPERUMBUDUR TK, TAMIL NADU - 602105, INDIA<br>
         GST IN: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;  <b> 33AAACH2364M1ZM </b> <br>
         State Code :&nbsp;&nbsp;&nbsp;&nbsp;<b> 33</b> <br>
         State Name :&nbsp;&nbsp;&nbsp;&nbsp;<b>Tamil Nadu</b> </td>
        <td style="width: 50%;">    Consignee(Shipped To) : <br>
         <b> HYUNDAI MOTOR INDIA LIMITED
</b> <br>
         H1 SIPCOT INDUSTRIAL PARK, IRRUNGATTUKOTTAI,<br>
         SRIPERUMBUDUR TK, TAMIL NADU - 602105, INDIA<br>
         GST IN: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; <b> 33AAACH2364M1ZM </b> <br>
         State Code :&nbsp;&nbsp;&nbsp;&nbsp;<b> 33</b> <br>
         State Name :&nbsp;&nbsp;&nbsp;  <b>Tamil Nadu</b> </td>
      </tr>
    
      </tbody>
      </table>
         <!-- DivTable.com -->
         <table style="border-top:0ch;border-collapse:collapse;width: 100%;" border="1">
<tbody>
<tr style="font-size: 8px;text-align: center;"> <td style="width: 2%;">  
               
               SI
            
            </td>
            <td style="width: 5%;">  
               
               Item Code
            
            </td>
            <td style="width: 5%;">  
               
               Shop Code
            
            </td>
            <td style="width: 3%;">  
               
               PO No.
            
            </td>
            <td style="width: 5%;">  
               
               PO Month
            
            </td>
            <td style="">  
               
               Internal Part No.
            
            </td>
            <td style="width:10%;"  >
               
               Customer Part No.
            
            </td>
            <td style="width:17%;">  
               
               Part Name
            
            </td>
            <td style="width: 5%;">  
               
               HSN Code
            
            </td>
           
            <td style="width: 2%;">  
               
               No.of.Cases
            
            </td>
            <td style="width: 5%;">  
               
               UOM
            
            </td>
            <td style="">  
               
               QTY
            
            </td>
            <td style="width: 5%;">  
               
               Basic Rate
            
            </td>
            <td style="width: 3%;">  
               
               Total Cost
            
            </td>
            <td style="width: 3%;">  
               
               Cons Part Cost
            
            </td>
            <td style="width: 3%;">  
               
               Cons Mail Cost
            
            </td>
            <td style="width: 3%;">  
               
               Assessable value
            
            </td>
</tr>
@foreach($data as $key=> $details)
<tr style="font-size: 8px;"> 
  <td style="border-top: 0ch;border-bottom:0ch;width: 2%;text-align: center;">  
               {{$key+1}}
   
            </td>
            <td style="border-top: 0ch;border-bottom:0ch;width: 5%; text-align: center;" >  
               {{$details->productcode_id}}
            </td>
            <td style="border-top: 0ch;border-bottom:0ch;width: 5%;text-align: center;">  
              {{$data[0]->shopcode}}
            </td>
            <td style="border-top: 0ch;border-bottom:0ch;width: 3%;text-align: left;">  
                {{$details->ponumber}}
            
            </td>
            <td style="border-top: 0ch;border-bottom:0ch;width: 5%;text-align: left;">  
                {{$details->podate}}
            
            </td>
            <td style="border-top: 0ch;border-bottom:0ch;text-align: left;">  
                {{$details->productpartno}}
            
            </td>
            <td style="border-top: 0ch;border-bottom:0ch;width:10%;text-align: left;font-size: 9px !important;"  >
              {{$details->customerPartno}}
            
            </td>
            <td style="border-top: 0ch;border-bottom:0ch;width:17%;font-size: 8px !important;text-align: left;">  
             {{$details->productname}}
            
            </td>
            <td style="border-top: 0ch;border-bottom:0ch;width: 5%;text-align: center;">  
                {{$details->producthsncode}}
            
            </td>
           
            <td style="border-top: 0ch;border-bottom:0ch;width: 2%;text-align: center;">  
                
            
            </td>
            <td style="border-top: 0ch;border-bottom:0ch;width: 5%;text-align: center;">  
                {{$details->uom_id}}
            
            </td>
            <td style="border-top: 0ch;border-bottom:0ch;text-align: center;font-size: 9px !important;">  
                {{$details->productqty}}
               
            </td>
            <td style="border-top: 0ch;border-bottom:0ch;width: 5%;text-align: right;">  
             {{$details->productsellingrate}}
               
            </td>
            <td style="border-top: 0ch;border-bottom:0ch;width: 2%;">  
               
            </td>
            <td style="border-top: 0ch;border-bottom:0ch;width: 3%;">  
               
            </td>
            <td style="border-top: 0ch;border-bottom:0ch;width: 3%;">  
               
            </td>
            <td style="border-top: 0ch;border-bottom:0ch;width: 5%;text-align: right;">  
                {{$details->netamount}}
            
            </td>
</tr>
@endforeach

@for($j=$datacount; $j<8; $j++)
<tr style="font-size: 10px;"> 
            <td style="border-top: 0ch;border-bottom:0ch;width: 2%;">&nbsp;</td>
            <td style="border-top: 0ch;border-bottom:0ch;width: 5%;">&nbsp;</td>
            <td style="border-top: 0ch;border-bottom:0ch;width: 5%;">&nbsp;</td>
            <td style="border-top: 0ch;border-bottom:0ch;width: 3%;">&nbsp;</td>
            <td style="border-top: 0ch;border-bottom:0ch;width: 5%;">&nbsp;</td>
            <td style="border-top: 0ch;border-bottom:0ch;">&nbsp;</td>
            <td style="border-top: 0ch;border-bottom:0ch;width:10%;">&nbsp;</td>
            <td style="border-top: 0ch;border-bottom:0ch;width:17%;">&nbsp;</td>
            <td style="border-top: 0ch;border-bottom:0ch;width: 5%;">&nbsp;</td>
            <td style="border-top: 0ch;border-bottom:0ch;width: 2%;">&nbsp;</td>
            <td style="border-top: 0ch;border-bottom:0ch;width: 5%;">&nbsp;</td>
            <td style="border-top: 0ch;border-bottom:0ch;">&nbsp;</td>
            <td style="border-top: 0ch;border-bottom:0ch;width: 5%;">&nbsp;</td>
            <td style="border-top: 0ch;border-bottom:0ch;width: 2%;">&nbsp;</td>
            <td style="border-top: 0ch;border-bottom:0ch;width: 3%;">&nbsp;</td>
            <td style="border-top: 0ch;border-bottom:0ch;width: 3%;">&nbsp;</td>
            <td style="border-top: 0ch;border-bottom:0ch;width: 5%;">&nbsp;</td>
</tr>
@endfor
</tbody>
</table>
         <!-- DivTable.com -->
       <!-- DivTable.com -->
   <table style="width: 100%;border-collapse:collapse;border-top: 0ch;" valign="top"border="1" style="" >
      <tbody>
      <tr style="padding-top:0px;padding-left: 0px;">
         <td style="padding-left:4px; padding-top:0px;border-right: 0ch;vertical-align: initial;">  
           
            
            <div style="width: 47%;float:left;border:0ch;"> Vehicle No &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp; <br>
               Mode of Transport&nbsp;&nbsp;&nbsp;: <br>
               Payment Terms&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: 30 days from Invoice date.<br>
              </div>
            <div style="width: 50%;float:right;border-left:1px solid black;padding-left: 5px;"> Through  &nbsp;&nbsp;: <br>
               Delivery &nbsp;&nbsp;&nbsp;: <br>
               Freight &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <br></div>
            <div style="width: 100%;clear:both;border-top:1px solid black;padding-top:7px;line-height: 13px;">IRN No &nbsp;:&nbsp;&nbsp;{{$data[0]->irn_reference_no}}  <br>Electronic Reference No &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : 
               <br>               Date &  Time of Preparation &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <br>
               Date & Time of Removal&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <br></div>
            
         
                         <td style="width: 20%;border-right: 0ch;">   
                                            Less Amortization Value<br>
                                                    SubTotal <br>
                                                    TCS Amount <br>
                                                  SGST  <br>
                                                       CGST   <br>
                                                     IGST <br>
                                                       <b>  Tax Amount </b>  <br>
                                                    <b>Total Amount</b>       
                      </td> <td style="width: 20%;font-weight: bold ; text-align:right;border-left: 0ch;">   
                                <br>
                                {{$data[0]->sales_total}} 
                                <br>
                                {{$data[0]->tcs_amount}}
                                <br>
                                {{$data[0]->sgstamount}}
                                <br>
                                {{$data[0]->cgstamount}}
                                <br>
                                0.00
                                <br>
                                {{$data[0]->totaltaxamount}}
                                <br>
                                {{$data[0]->grandtotalamount}}         
                                </td>


               
      </tr>
      
      
    
      </tbody>
      </table>
         <!-- DivTable.com -->
         <!-- DivTable.com -->
         <table border="1" style="width:100%;border-collapse: collapse;border-top: 0ch;">
            <tbody>
            
               <tr>
                  <td  style="width:100%;">  Tax Amount (in Words) &nbsp;&nbsp;&nbsp;:&nbsp;{{$data[0]->taxamountword}}
                  <br>
                  Total Amount (in Words) &nbsp;:&nbsp;{{$data[0]->grandtotalamountword}}.
                  </td>
                  </tr> 
                 
            </tbody>
            </table>
         <!-- DivTable.com -->
         <table style="width: 100%;border-collapse:collapse;border-top: 0ch;" border="1" style="" >
            <tbody>
          
            <tr>
            <td style="width:25%; vertical-align: top;font-size: 7px;">  <b>  BUYER DETAILS </b>
            </td>
            <td style="width:25%;vertical-align: top;font-size: 7px;"> <b>SECURITY GATE ENTRY</b>
            </td>
            <td style="width:25%;vertical-align: top;font-size: 6px;"> <strong>RECEIPT ACKNOWLOGEMENT</strong> <br>
               
             
               LOCATION  &nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               QTY RECD :<br>
               SIGNATURE :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               STAMP &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:


            </td>
            <td style="width:25%;vertical-align: top;font-size: 6px;"> <b>SRV NO :</b> <br>
              
               <span style="font-size: 6px;"> Applicable   Examption    Notification    No.Date </span>
               

            </td>
            </tr>
            </tbody>
            </table>
            <!-- DivTable.com -->
         <table style="width: 100%;border-collapse:collapse;border-top: 0ch;" border="1" style="" >
            <tbody>
            <tr>
            <td style="width: 30%;padding: 5px;padding-top:0px;padding-left: 25px;padding-bottom: 15px;">    
      <p style="text-align:center;padding:0px;margin:0px;margin-bottom:6px;margin-top:2px;font-size: 11px;">Invoice Number : {{$data[0]->invoiceno}}</p>

<img src="data:image/jpeg;base64,{{ $customer_barcode[$k] }}" alt="" style="width: 250px;height:250px;"></td>
            
            <td style="width: 40%;padding-left:0px; vertical-align:top;   padding-top: 0px;">
              
           
<div style="width: 100%;text-align: justify;padding:5px;border-bottom: 1px solid black;font-size: 7px;">
<b>  Terms:</b> &nbsp;&nbsp;&nbsp;<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Electronic funds transfer, please remit to:Bank Name: CITIBANK, No. 2, CLUB HOUSE ROAD, CHENNAI-6000021FSC / NEFT Code: CIT10000003 A/c No. 02951212, Cheque / Draft to be made in favour of BASF CATALYSTS INDIA PVT. LTD. Provide remittance details along with invoice references to myservicedesk-fa-ar@basf.com. All e-correspondence are being forwarded to your registered email id. For GSTIN credit related queries,kindly address your emails to GSTINcreditqueries@basf.com
            <br><br>
         Registerd Office : BASF CATALYSTS INDIA PVT. LTD.<br>
         The Capital, 'A', Wing, 1204-C, 12th floor,<br>
         Plot No.C-70, 'G' Block, Bandra Kurla Complex,<br> 
         Badndra(EAST), Mumbai-400051.
</div>   
                
           <!--  </div> -->
            <div style="text-align: center;width: 100%;font-size: 11px;">
   
<b>for BASF Catalyst India Pvt. Ltd.</b>               
            
            </div> 
            <div style="text-align: center;padding-top: 130px;width: 100%;">
   
<b>Name of the Signature</b>               
            
            </div>
            
            </td>
            
            </tr>
           
            </tbody>
            </table>
            <!-- DivTable.com -->
    <!-- DivTable.com -->
         <!-- DivTable.com -->
        
         <!-- DivTable.com -->
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
                     <!-- Data start -->
                     <tr>
                        <td style="width: 3%;">  
                           
                           T00N                       
                        </td>
                        <td style="width: 3%;">  
                            {{$data[0]->location}}            
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
                       
                           </tr><!-- Data start -->
                         
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
                                 <!-- Data start -->
 
                   <tr style="font-size: 8px;">
                
                <td style="border-top:0ch;border-bottom:0ch;width: 3%;text-align: left;">  
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
                   <tr style="font-size: 8px;">
                
                <td style="border-top:0ch;border-bottom:0ch;width: 3%;text-align: left;">  
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
                   <tr style="font-size: 8px;">
                
                <td style="border-top:0ch;border-bottom:0ch;width: 3%;text-align: left;">  
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
                   </tr> <tr style="font-size: 8px;">
                
                <td style="border-top:0ch;border-bottom:0ch;width: 3%;text-align: left;">  
                </td>
                <td style="border-top:0ch;border-bottom:0ch;width: 3%;">  
                   
                </td>
                <td style="border-top:0ch;border-bottom:0ch;width: 3%;">  
                                           </td>
                <td style="border-top:0ch;border-bottom:0ch;width: 3%;">  
                                            
                </td>
                <td style="border-top:0ch;border-bottom:0ch;width: 6%;">  
                  &nbsp;
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
                                      <tr style="font-size: 8px;">
                
                <td style="border-top:0ch;border-bottom:0ch;width: 3%;text-align: left;">  
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
                   <tr style="font-size: 8px;">
                
                <td style="border-top:0ch;border-bottom:0ch;width: 3%;text-align: left;">  
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
                   <tr style="font-size: 8px;">
                
                <td style="border-top:0ch;border-bottom:0ch;width: 3%;text-align: left;">  
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
                   <!-- <tr style="font-size: 8px;">
                
                <td style="border-top:0ch;border-bottom:0ch;width: 3%;text-align: left;">  
                </td>
                <td style="border-top:0ch;border-bottom:0ch;width: 3%;">  
                   
                </td>
                <td style="border-top:0ch;border-bottom:0ch;width: 3%;">  
                                           </td>
                <td style="border-top:0ch;border-bottom:0ch;width: 3%;">  
                                            
                </td>
                <td style="border-top:0ch;border-bottom:0ch;width: 6%;">  
                  &nbsp;
                </td>
                <td style="border-top:0ch;border-bottom:0ch;width: 6%;">  
                   
                </td>  
                <td style="border-top:0ch;border-bottom:0ch;width: 6%;">                
                   
                </td>
                <td style="border-top:0ch;border-bottom:0ch;width: 6%;">  
                  
                </td>
                <td style="border-top:0ch;border-bottom:0ch;width: 11.1%;">  
                              
                </td>
                   </tr> -->


                      
            </tbody>
            </table>
             <!-- DivTable.com -->
      
   </body>
   
   @endfor  
   @endfor      
  
</html>
