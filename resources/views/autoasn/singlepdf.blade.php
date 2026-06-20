<!DOCTYPE html>
<html lang="en">
   <head>
      <title>{{$fulldata[0]->invoice_no}}</title>
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
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;INVOICE UNDER RULE-7</td>
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
<?php $image_path = '/img/itwlogo.png'; ?>
<img src="{{ public_path() . $image_path }}" alt="" srcset="" style="width:170px;"> </td>
   <td style="width:30%;"> <b style="font-size: 12px;">ITW INDIA PRIVATE LIMITED</b> <br>
      G-65,SIPCOT INDUSTRIAL PARK <br>
     Vallam Vadagal, Sriperumbudur, <br>Kanchipuram District<br>
     Tamil Nadu 602105, <br>
     India</td>
     <td style="border-right:0ch;">  <b style="font-size: 10px;"> GST Invoice No.</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <b style="font-size: 10px;">: {{$fulldata[0]->invoice_no}}</b> <br>
      Internal Document No   &nbsp;&nbsp;&nbsp;    : {{$fulldata[0]->internal_doc_no}}<br>
      Invoice Issue Date  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{$fulldata[0]->invoice_date}}<br>
      EWB &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{$fulldata[0]->ewaybillno}}<br>
      Valid till &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{$fulldata[0]->vaildupto}}<br>
      IRN No &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{$fulldata[0]->irn_no}}
	  </td>
	  <td style="width:10%;border-left:0ch;">
<img src="data:image/jpeg;base64,{{ $QRBarcode[$k] }}" alt="" style="width: 50px;height:50px;"> </td>
   </tr>
   <tr>
   <td style="font-weight: bold;">GSTIN No : &nbsp;33AAACI4550Q1ZD</td>
   <td style="font-weight: bold;">PAN No : &nbsp;AAACI4550Q</td>
   <td style="font-weight: bold;border-right:0ch;">Vendor Code :&nbsp;T07O</td>
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
           
            <td style="width: 5%;">  
               
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
@foreach($fulldata as $key=> $details)
<tr style="font-size: 8px;"> 
  <td style="border-top: 0ch;border-bottom:0ch;width: 2%;text-align: center;">  
               {{$key+1}}
   
            </td>
            <td style="border-top: 0ch;border-bottom:0ch;width: 5%; text-align: center;" >  
               {{$details->sub_item_no}}
            </td>
            <td style="border-top: 0ch;border-bottom:0ch;width: 5%;text-align: center;">  
                A3
            </td>
            <td style="border-top: 0ch;border-bottom:0ch;width: 3%;text-align: left;">  
                {{$details->sub_po_no}}
            
            </td>
            <td style="border-top: 0ch;border-bottom:0ch;width: 5%;text-align: left;">  
                {{$details->sub_po_date}}
            
            </td>
            <td style="border-top: 0ch;border-bottom:0ch;text-align: left;">  
                {{$details->sub_itw_part_no}}
            
            </td>
            <td style="border-top: 0ch;border-bottom:0ch;width:10%;text-align: left;"  >
              {{$details->sub_hmil_part_no}}
            
            </td>
            <td style="border-top: 0ch;border-bottom:0ch;width:17%;font-size: 5px !important;text-align: left;">  
             {{$details->sub_item_description}}
            
            </td>
            <td style="border-top: 0ch;border-bottom:0ch;width: 5%;text-align: center;">  
                {{$details->sub_hsn_code}}
            
            </td>
           
            <td style="border-top: 0ch;border-bottom:0ch;width: 5%;text-align: center;">  
                {{$details->sub_no_cases}}
            
            </td>
            <td style="border-top: 0ch;border-bottom:0ch;width: 5%;text-align: center;">  
                {{$details->sub_uom}}
            
            </td>
            <td style="border-top: 0ch;border-bottom:0ch;text-align: center;">  
                {{$details->sub_item_qty}}
               
            </td>
            <td style="border-top: 0ch;border-bottom:0ch;width: 5%;text-align: right;">  
             {{$details->sub_item_rate}}
               
            </td>
            <td style="border-top: 0ch;border-bottom:0ch;width: 2%;">  
               
            </td>
            <td style="border-top: 0ch;border-bottom:0ch;width: 3%;">  
               
            </td>
            <td style="border-top: 0ch;border-bottom:0ch;width: 3%;">  
               
            </td>
            <td style="border-top: 0ch;border-bottom:0ch;width: 5%;text-align: right;">  
                {{$details->sub_assessable_value}}
            
            </td>
</tr>
@endforeach

@for($j=$datacount; $j<8; $j++)
<tr style="font-size: 8px;"> 
            <td style="border-top: 0ch;border-bottom:0ch;width: 2%;">&nbsp;</td>
            <td style="border-top: 0ch;border-bottom:0ch;width: 5%;">&nbsp;</td>
            <td style="border-top: 0ch;border-bottom:0ch;width: 5%;">&nbsp;</td>
            <td style="border-top: 0ch;border-bottom:0ch;width: 3%;">&nbsp;</td>
            <td style="border-top: 0ch;border-bottom:0ch;width: 5%;">&nbsp;</td>
            <td style="border-top: 0ch;border-bottom:0ch;">&nbsp;</td>
            <td style="border-top: 0ch;border-bottom:0ch;width:10%;">&nbsp;</td>
            <td style="border-top: 0ch;border-bottom:0ch;width:17%;">&nbsp;</td>
            <td style="border-top: 0ch;border-bottom:0ch;width: 5%;">&nbsp;</td>
            <td style="border-top: 0ch;border-bottom:0ch;width: 5%;">&nbsp;</td>
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
           
            
            <div style="width: 47%;float:left;border:0ch;"> Vehicle No &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;{{$fulldata[0]->transporter_vehicle}} <br>
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
                                                    TCS Amount <br>
                                                  SGST @14% <br>
                                                       CGST @14%  <br>
                                                     IGST @28%  <br>
                                                       <b>  Tax Amount </b>  <br>
                                                    <b>Total Amount</b>       
                      </td> <td style="width: 20%;font-weight: bold ; text-align:right;border-left: 0ch;">   
                                <br>
                                {{$fulldata[0]->subtotal}} 
                                <br>
                                {{$fulldata[0]->total_tcs_amount}}
                                <br>
                                {{$fulldata[0]->totalsgst}}
                                <br>
                                {{$fulldata[0]->totalcgst}}
                                <br>
                                {{$fulldata[0]->totaligst}}
                                <br>
                                {{$fulldata[0]->tax_amount}}
                                <br>
                                {{$fulldata[0]->grand_total}}         
                                </td>


               
      </tr>
      
      
    
      </tbody>
      </table>
         <!-- DivTable.com -->
         <!-- DivTable.com -->
         <table border="1" style="width:100%;border-collapse: collapse;border-top: 0ch;">
            <tbody>
            
               <tr>
                  <td  style="width:100%;">  Tax Amount (in Words) &nbsp;&nbsp;&nbsp;: {{$fulldata[0]->taxtotal_inword}}.
                  <br>
                  Total Amount (in Words) &nbsp;: {{$fulldata[0]->grandtotal_inword}}.
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
            <td style="width: 40%;padding: 5px;padding-top:0px;padding-left: 20px;padding-bottom: 15px;">    
      <p style="text-align:center;padding:0px;margin:0px;margin-bottom:2px;margin-top:2px;">{{$fulldata[0]->invoice_no}}</p>

<img src="data:image/jpeg;base64,{{ $Barcode[$k] }}" alt="" style="width: 250px;height:250px;"></td>
            
            <td style="width: 40%;padding-left:0px; vertical-align:top;   padding-top: 0px;">
              
           
            <div style="width: 100%;text-align: justify;padding:5px;border-bottom: 1px solid black;">
			 <b>  Terms:</b> &nbsp;&nbsp;&nbsp;<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;All Claims and disputes arising out of contracts made by us
               subject to Chennai Junsdiction. Any Central or state authorities
               are born by purchaser. 18 % per annum intrest will charged on
               accounts remaining unpaid after the due date. Certified that the
               particulars given above are true and amount indicated
               represents the price actually charged & that there is not flow of
               addional consideration.
			   <br><br>
			Certified that the particulars given above are true and 
amount indicated represents the price actually charged 
& that there is not flow of addional consideration 
directly or indirectly from the buyer.
</div>   
                
           <!--  </div> -->
            <div style="text-align: center;width: 100%;font-size: 11px;">
   
<b>for ITW INDIA PVT.LTD</b>               
            
            </div> 
            <div style="text-align: center;padding-top: 170px;width: 100%;">
   
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
                           
                           T07O                        
                        </td>
                        <td style="width: 3%;">  
                            A2-6            
                        </td>
                        <td style="width: 3%;">  
                           
                           A3
                        
                        </td>
                        <td style="width: 3%;">  
                           
                          2A30
                        
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


                      
            </tbody>
            </table>
             <!-- DivTable.com -->
      
   </body>
   
   @endfor  
   @endfor      
  
</html>