<!DOCTYPE html>
<html>
<head>
<style>
body{
  margin-right:0px;
  margin-top:-30px;
  font-family: Arial, Helvetica, sans-serif;
  padding: 0%;

}
table
{
    border-top-left-radius: 10px;
  border-collapse: collapse;
  border-radius:12px;
}
th{
    font-size: 10px;
}
td, th
{
  padding-top:5px;
    text-align: center;
    border-radius:12px !important;
    font-size: 11px;
  border: 1px solid black;

}
</style>
</head>
 {{-- @for($i=0; $i < count($a); $i++) --}}
<body>
{{-- bill one --}}
        @for($i=0;$i<2;$i++)
        <span style="font-size: 13px;text-align:;">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <b>
                DELIVERY CARD / M.R.I.R

            </b>
        </span>


    <table style="width: 100%;" border="1">
        <tbody>
        <tr>
        <th>VENDOR</th>
        <th> VENDOR NAME </th>
        <th>Shop  </th>
        <th> Gate No </th>
        <th>INV LINE NO. </th>
        <th>RECD DATE </th>
        <th>M.R.I.R. NO</th>

        </tr>

<tr>
        <td>T00N </td>
        <td> BASF Catalysts</td>
        <td>{{$data[0]->createdlocation}} </td>
        <td>{{$data[0]->gateno}} </td>
        <td>1 &nbsp;&nbsp; <b>OF</b> &nbsp; &nbsp; 1 </td>
        <td> &nbsp; </td>
        <td> &nbsp; </td>

        </tr>


        <tr>
        <th colspan="2">SCHEDULE DATE </th>
        <th> CONTAINER </th>
        <th colspan="2">STUF'G QTY/NO. OF CONT. </th>
        <th> LOCATION  </th>
        <th>APPROVED</th>
        </tr>

        <tr>
        <td colspan="2">{{preg_replace('/\./','/',$data[0]->invoicedate)}} </td>
        <td> PALLET </td>
        <td colspan="2"> {{$data[0]->StuffQty}} / {{$data[0]->NoofContainers}} </td>
         <th> JOB  </th>
        <td> &nbsp; </td>
        </tr>


        <tr>
        <th>ORDER NO.</th>
        <th>  INVOICE QTY. </th>
        <th> RECD. QTY   </th>
        <th> REJN. QTY.  </th>
        <th> REJN. CODE  </th>
        <th> CHECKED BY   </th>
        <th>CARDEX ENTRY</th>
        </tr>

        <tr>
        <td>{{$data[0]->ponumber}}</td>
        <td>  {{$data[0]->tot_qty}}</td>
        <td> &nbsp; </td> <td> &nbsp; </td> <td> &nbsp; </td> <td> &nbsp; </td> <td> &nbsp; </td>

        </tr>
        <tr>
            <th>Customer Part No</th>
            <td>  {{$data[0]->customerPartno}} </td>
            <th rowspan="1"> INSPECT QTY.  </th>
            <th rowspan="1"> REJN.  </th>
            <th rowspan="1"> REASON CODE  </th>
            <th rowspan="1"> Q.C. INCHARGE  </th>
            <th rowspan="1">ACCEPT QTY</th>
        </tr>
        <tr>
            <th>Desc</th>
            <td >{{$data[0]->productname}} </td>
            <td></td>
            <td></td>
            <td></td>
            <th>Part No</th>
            <td>  {{$data[0]->productpartno}} </td>
        </tr>
        <tr>
            <th>INVOICE NO.</th>
            <th>INVOICE DATE.</th>
            <th rowspan="6" colspan="4" style="padding: 0px;margin:0px;">
                <img src="data:image/png;base64,{{$customer_barcode}}" alt=""style="width:120px;height:120px; margin-top:20px;"srcset="">


           &nbsp;           &nbsp;
           &nbsp;
           &nbsp;
           &nbsp;


           &nbsp;
           &nbsp;
           &nbsp;
           &nbsp;
           &nbsp;
           <img src="data:image/png;base64,{{$irn_barcode}}" alt=""style="width:120px; margin-top:20px;"srcset="">


            </th>
            <th>  ASSESSABLE VALUE </th>

            </tr>


        <tr>
            <td>{{$data[0]->invoiceno}}</td>
            <td> {{preg_replace('/\./','/',$data[0]->invoicedate)}}</td>
            <td> {{$data[0]->taxableamounts}} </td>

            </tr>


        <tr>
            <th>S-GST </th>
            <th>I-GST</th>
            <th>  CST Amount</th>

            </tr>


        <tr>
            <td> {{$data[0]->sgstamount}}</td>
            <td> 0.00</td>
            <td>   0.00 </td>

            </tr>


        <tr>
            <th>C-GST </th>
            <th style="font-size: 8px;" >CONSIGNEE PART COST</th>
            <th>  Additional Excise Duty </th>

            </tr>



        <tr>
            <td> {{$data[0]->cgstamount}}</td>
            <td>0.00</td>
            <td>  0.00 </td>

            </tr>
  <tr>
            <td> <b> IRN </b></td>
            <td colspan="6"> {{$data[0]->irn_reference_no}}</td>

            </tr>




        </tbody>
        </table>
        <!-- DivTable.com -->

        <table style="width: 100%;margin-top:3px;" border="1">
            <tbody>
            <tr><th>
                Tool Cost
            </th>

            <th>
                CONSIGNEE MATL COST
            </th>
            <th>
                GSTN
            </th>
            <th rowspan="4" colspan="2" >
                REMARKS BY Q.C.
            </th>

            </tr>
            <tr>
                <td>
                    0.00
                </td>

            <td>
                0.00
            </td>
            <td>
                 {{$data[0]->companyGSTIN}}
            </td>


            </tr>



            <tr><th>
                Unit Price
            </th>

            <th>
                Material Cost
            </th>
            <th>
                BED AMOUNT
            </th>


            </tr>

            <tr><td>
                {{$data[0]->productsellingrate}}
            </td>

            <td>
                {{$data[0]->taxableamounts}}
            </td>
            <td>
               0.00
            </td>


            </tr>


        </tr>





            </tbody>
            </table>
            <table style="width: 100%;border-top:0ch;">
                <tbody>
                    <tr style="border-top:0ch;"> <th style="border-top:0ch;">
                        TARIFF No

                    </th><th style="border-top:0ch;">
                        TCS AMOUNT

                    </th>

                    <th style="border-top:0ch;">
                        INVOICE AMOUNT
                    </th>
                    <th style="border-top:0ch;">
                        EXCISE DUTY AMOUNT
                    </th>        <th style="border-top:0ch;">
                        VALUE ADDED TAX
                    </th>        <th style="border-top:0ch;">
                         SHOP CODE
                    </th>


                    </tr>

                    <tr><td>
                        {{$data[0]->producthsncode}}
                    </td><td>
                        {{$data[0]->tcs_amount}}
                    </td>

                    <td>
                        {{$data[0]->grandtotalamount}}
                    </td>
                    <td>
                        0.00
                    </td>       <td> &nbsp; </td>       <td>
                        {{$data[0]->shopcode}}
                    </td>


                    </tr>
                </tbody>
            </table>
            @endfor
            <!-- DivTable.com -->
{{-- bill one --}}
        {{-- <span style="font-size: 13px;text-align:;">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <b>
                DELIVERY CARD / M.R.I.R

            </b>
        </span>


    <table style="width: 100%;" border="1">
        <tbody>
        <tr>
        <th>VENDOR</th>
        <th> VENDOR NAME </th>
        <th>Shop  </th>
        <th> Gate No </th>
        <th>INV LINE NO. </th>
        <th>RECD DATE </th>
        <th>M.R.I.R. NO</th>

        </tr>

<tr>
        <td>T00N </td>
        <td> BASF Catalysts</td>
        <td>{{$data[0]->createdlocation}} </td>
        <td>{{$data[0]->gateno}} </td>
        <td>1 &nbsp;&nbsp;  <b>OF</b>  &nbsp; &nbsp; 1 </td>

        <td> &nbsp; </td>
        <td> &nbsp; </td>

        </tr>


        <tr>
        <th colspan="2">SCHEDULE DATE </th>
        <th> CONTAINER </th>
        <th colspan="2">STUF'G QTY/NO. OF CONT. </th>
        <th> LOCATION  </th>
        <th>APPROVED</th>
        </tr>

        <tr>
        <td colspan="2">{{preg_replace('/\./','/',$data[0]->invoicedate)}} </td>
        <td> PALLET </td>
        <td colspan="2"> {{$data[0]->StuffQty}} / {{$data[0]->NoofContainers}} </td>
         <th> JOB  </th>
        <td> &nbsp; </td>
        </tr>


        <tr>
        <th>ORDER NO.</th>
        <th>  INVOICE QTY. </th>
        <th> RECD. QTY   </th>
        <th> REJN. QTY.  </th>
        <th> REJN. CODE  </th>
        <th> CHECKED BY   </th>
        <th>CARDEX ENTRY</th>
        </tr>

        <tr>
        <td>{{$data[0]->ponumber}}</td>
        <td>  {{$data[0]->tot_qty}}</td>
        <td> &nbsp; </td> <td> &nbsp; </td> <td> &nbsp; </td> <td> &nbsp; </td> <td> &nbsp; </td>

        </tr>


        <tr>
            <th>Customer Part No</th>
            <td>  {{$data[0]->customerPartno}} </td>
            <th rowspan="1"> INSPECT QTY.  </th>
            <th rowspan="1"> REJN.  </th>
            <th rowspan="1"> REASON CODE  </th>
            <th rowspan="1"> Q.C. INCHARGE  </th>
            <th rowspan="1">ACCEPT QTY</th>
        </tr>
        <tr>
            <th>Desc</th>
            <td>{{$data[0]->productname}} </td>
            <td></td>
            <td></td>
            <td></td>
            <th>Part No</th>
            <td>  {{$data[0]->productpartno}} </td>
        </tr>
        <tr>
            <th>INVOICE NO.</th>
            <th>INVOICE DATE.</th>
            <th rowspan="6" colspan="4" style="padding: 0px;margin:0px;">
                <img src="data:image/png;base64,{{$customer_barcode}}" alt=""style="width:120px;height:120px; margin-top:20px;"srcset="">
           &nbsp;           &nbsp;
           &nbsp;
           &nbsp;
           &nbsp;


           &nbsp;
           &nbsp;
           &nbsp;
           &nbsp;
           &nbsp;
           <img src="data:image/png;base64,{{$irn_barcode}}" alt=""style="width:120px; margin-top:20px;"srcset="">


            </th>
            <th>  ASSESSABLE VALUE </th>

            </tr>


        <tr>
            <td>{{$data[0]->invoiceno}}</td>
            <td> {{preg_replace('/\./','/',$data[0]->invoicedate)}}</td>
            <td> {{$data[0]->taxableamounts}} </td>

            </tr>


        <tr>
            <th>S-GST </th>
            <th>I-GST</th>
            <th>  CST Amount</th>

            </tr>


        <tr>
            <td> {{$data[0]->sgstamount}}</td>
            <td> 0.00</td>
            <td>   0.00 </td>

            </tr>


        <tr>
            <th>C-GST </th>
            <th style="font-size: 8px;" >CONSIGNEE PART COST</th>
            <th>  Additional Excise Duty </th>

            </tr>



        <tr>
            <td> {{$data[0]->cgstamount}}</td>
            <td>0.00</td>
            <td>  0.00 </td>
        </tr>
        <tr>
            <td> <b> IRN </b></td>
            <td colspan="6"> {{$data[0]->irn_reference_no}}</td>
        </tr>




        </tbody>
        </table>
        <!-- DivTable.com -->

        <table style="width: 100%;margin-top:3px;" border="1">
            <tbody>
            <tr><th>
                Tool Cost
            </th>

            <th>
                CONSIGNEE MATL COST
            </th>
            <th>
                GSTN
            </th>
            <th rowspan="4" colspan="2" >
                REMARKS BY Q.C.
            </th>

            </tr>
            <tr>
                <td>
                    0.00
                </td>

            <td>
                0.00
            </td>
            <td>
                 {{$data[0]->companyGSTIN}}
            </td>


            </tr>



            <tr><th>
                Unit Price
            </th>

            <th>
                Material Cost
            </th>
            <th>
                BED AMOUNT
            </th>


            </tr>

            <tr><td>
                {{$data[0]->productsellingrate}}
            </td>

            <td>
                {{$data[0]->taxableamounts}}
            </td>
            <td>
               0.00
            </td>


            </tr>


        </tr>


        </tr>



            </tbody>
            </table>
            <!-- DivTable.com -->
            <table style="width: 100%;border-top:0ch;">
                <tbody>
                    <tr style="border-top:0ch;"> <th style="border-top:0ch;">
                        TARIFF No

                    </th><th style="border-top:0ch;">
                        TCS AMOUNT


                    </th>

                    <th style="border-top:0ch;">
                        INVOICE AMOUNT
                    </th>
                    <th style="border-top:0ch;">
                        EXCISE DUTY AMOUNT
                    </th>        <th style="border-top:0ch;">
                        VALUE ADDED TAX
                    </th>        <th style="border-top:0ch;">
                         SHOP CODE
                    </th>


                    </tr>

                    <tr><td>
                        {{$data[0]->producthsncode}}
                    </td><td>
                        {{$data[0]->tcs_amount}}
                    </td>

                    <td>
                        {{$data[0]->grandtotalamount}}
                    </td>
                    <td>
                        0.00
                    </td>       <td> &nbsp; </td>       <td>
                        {{$data[0]->shopcode}}
                    </td>


                    </tr>
                </tbody>
            </table> --}}

</body>
{{-- @endfor --}}
</html>
