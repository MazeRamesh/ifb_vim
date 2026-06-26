<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Tax Invoice</title>
<style>
    @page {
        size: A4 landscape;
        margin: 25px;
    }
    body {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 11px;
        line-height: 1;
        color: #000;
        margin: 0;
        padding: 0;
    }
    .page-container {
        width: 100%;
        /* height: 730px; */

        border: 1.5px solid #000;
        border-radius: 15px;
        box-sizing: border-box;
        padding: 0;
        position: relative;
    }
    table {
        width: 100%;
        border-collapse: collapse;
    }
    td, th {
        padding: 2.5px 4px;
        border: 0.5px solid #000;
        vertical-align: top;
        font-size: 11px;
    }
    th {
        font-weight: bold;
        background-color: #f2f2f2;
        text-align: center;
    }
    .no-border-table td {
        border: none;
        padding: 1.5px 0;
    }
    .text-center {
        text-align: center;
    }
    .text-right {
        text-align: right;
    }
    .text-left {
        text-align: left;
    }
    .font-bold {
        font-weight: bold;
    }
    .border{
        border-bottom: none !important;
    }
</style>
</head>
<body>

@php
    $copyNames = [
        'original' => 'ORIGINAL FOR RECIPIENT',
        'duplicate' => 'DUPLICATE FOR TRANSPORTER',
        'triplicate' => 'TRIPLICATE FOR SUPPLIER',
        'extra' => 'EXTRA COPY'
    ];
@endphp

@for($copyIndex = 0; $copyIndex < count($a); $copyIndex++)
    @php
        $copyKey = $a[$copyIndex];
        $copyLabel = $copyNames[$copyKey] ?? 'INVOICE COPY';
    @endphp

    <div class="page-container">
        <!-- Top Title & Logo Section -->
        <table style="border: none;">
            <tr>
                <td style=" border: none; padding: 4px; text-align: left; vertical-align: top;">
                    <div style="display: inline-block; vertical-align: middle;">
                        <img src="{{ asset('assets/img/IFB.jpg') }}" alt="IFB Logo" style="height: 40px; width: auto; object-fit: contain;">
                    </div>
                
                </td>
                <td style=" border: none; text-align: center;padding-left: 150px; vertical-align: middle;">
                    <div style="font-size: 18px; font-weight: bold; letter-spacing: 0.5px;">TAX INVOICE</div>
                </td>
                <td style=" border: none; text-align: center; vertical-align: middle;">
                    <div style="font-size: 14px; font-weight: bold; letter-spacing: 0.5px;">{{ $copyLabel }}</div>
                   
                </td>
            </tr>
        </table>

        <!-- Details Box Section (Invoice Details & Addresses) -->
        <table style="width: 100%; border-collapse: collapse; border-top: 1px solid #000; border-bottom: 1px solid #000; border-left: none; border-right: none;">
    <tr>
        <td style="width: 50%; padding: 4px; border-right: 1px solid #000; border-top: none; border-bottom: none; border-left: none; text-align: left; vertical-align: top;">
            <div style="font-size: 13px; font-weight: bold; margin-top: 1px;">IFB Industries Ltd</div>
            <div style="font-size: 10px; line-height: 1.3; margin-top: 2px;">
                Off Whitefied Road 16/17, Visveswaraiah Indl. Estate, Bangalore 560048 Karnataka India<br>
                State Name & Code: Karnataka 29<br>
                Phone No: 08030589620 Fax: 08030589611<br>
                GSTIN: 29AAACI6561R1ZT PAN: AAACI6561R CIN: L51109WB1974PLC029637<br>
                Web: www.ifbindustries.com Email ID: contact@ifbbangalore.com<br>
                Regd Office: Regd.Office : 14,Taratolla Road,Kolkata - 700088
            </div>

            <table class="no-border-table" style="width: 100%;">
                <tr>
                    <td class="font-bold" style="font-size: 10px; width: 25%;">Invoice To</td>
                    <td style="font-size: 8.5px; width: 75%;">: <strong>{{ 100878 }}</strong></td>
                </tr>
                <tr>
                    <td class="font-bold" style="font-size: 10px;"> HYUNDAI MOTOR INDIA LTD.</td>
                    <td style="font-size: 8.5px; text-align: right; font-weight: bold;">Vendor Code &nbsp;&nbsp; : &nbsp;&nbsp; {{ $data[0]->vendorCode ?? '' }}</td>
                </tr>
                <tr>
                    <td colspan="2" style="font-size: 9px; line-height: 1.3; padding-top: 3px;">
                        SIPCOT INDL. EST, IRRUNGATTUKOTTAI SRIPERUMBUDUR(TK),CHENNAI Tamil Nadu India 602105
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="font-size: 8px; line-height: 1.3;">
                        PAN No: {{ !empty($data[0]->customerBillingGSTINno) ? substr($data[0]->customerBillingGSTINno, 2, 10) : '' }} &nbsp; GSTIN/UIN : {{ $data[0]->customerBillingGSTINno ?? '' }}<br>
                        State Name & Code: {{ $data[0]->customerStateName ?? '' }} (Code: {{ $data[0]->customerStateCode ?? '' }})<br>
                        Place of Supply: {{ $data[0]->statePlaceofSupply ?? '' }}
                    </td>
                </tr>
            </table>
        </td>

        <td style="width: 50%; padding: 4px; border: none; text-align: left; vertical-align: top;">
            
            <table style="width: 100%; border: none; border-collapse: collapse;">
                <tr>
                    <td style="width: 65%; border: none; vertical-align: top; padding: 0px;">
                        <table class="no-border-table" style="font-size: 7px; width: 100%;">
                            <tr>
                                <td class="font-bold" style="width: 35%;">Invoice Number</td>
                                <td style="width: 65%;">: <strong>{{ $data[0]->invoiceno ?? '' }}</strong></td>
                            </tr>
                            <tr>
                                <td class="font-bold">Invoice Date</td>
                                <td>: <strong>{{ !empty($data[0]->invoicedate) ? preg_replace('/\./', '/', $data[0]->invoicedate) : '' }}</strong></td>
                            </tr>
                            <tr>
                                <td >Invoice Type</td>
                                <td>: Tax Invoice</td>
                            </tr>
                            <tr>
                                <td >Transporter Name</td>
                                <td>: {{ $data[0]->transporter_name ?? '' }}</td>
                            </tr>
                            <tr>
                                <td >Transport Mode</td>
                                <td>: Road</td>
                            </tr>
                            <tr>
                                <td >LR Number</td>
                                <td>: </td>
                            </tr>
                            <tr>
                                <td >Package Description</td>
                                <td>: </td>
                            </tr>
                            <tr>
                                <td >Gross Weight & Net Wt</td>
                                <td>: </td>
                            </tr>
                            <tr>
                                <td class="font-bold" style="padding-top: 4px;">Name of Consignee (Shipped to)</td>
                                <td style="padding-top: 4px;">: <strong>{{ $data[0]->customerBillingcode ?? '100878' }}</strong></td>
                            </tr>
                        </table>
                    </td>

                    <td style="width: 35%; border: none; vertical-align: top; text-align: right; padding: 0px;">
                        @if(!empty($irn_barcode))
                            <img src="{{ $irn_barcode }}" alt="IRN Barcode" style="width: 100px; height: 100px; display: inline-block; margin-top: 2px;">
                        @endif
                    </td>
                </tr>
            </table>

            <table class="no-border-table" style="font-size: 9px; width: 100%; margin-top: 1px;">
                <tr>
                    <td class="font-bold" style="font-size: 9px;">HYUNDAI MOTOR INDIA LTD.</td>
                </tr>
                <tr>
                    <td style="font-size: 8px; line-height: 1.3;">
                        #H1 SIPCOT INDL. EST, IRRUNGATTUKOTTAI SRIPERUMBUDUR(TK),CHENNAI Tamil Nadu India 602105
                    
                </tr>
                <tr>
                    <td style="font-size: 8px; line-height: 1.3;">
                        State Name & Code: {{ $data[0]->customerStateName ?? '' }} Code: {{ $data[0]->customerStateCode ?? '' }} GSTIN/UIN: {{ $data[0]->customerBillingGSTINno ?? '' }} PAN No: {{ !empty($data[0]->customerBillingGSTINno) ? substr($data[0]->customerBillingGSTINno, 2, 10) : '' }}
                    </td>
                </tr>
            </table>
            
        </td>
    </tr>
</table>

        <!-- Details Products Table Section -->
        <table style="width: 100%; border-collapse: collapse; border-left: none; border-right: none; border-top: none;">
    <thead>
        <tr style="font-size: 7px; text-align: center;">
            <th rowspan="2" style="width: 3%; border-left: none; border-top: none; padding: 2px;">SL#</th>
            <th rowspan="2" style="width: 6%; border-top: none; padding: 2px;">Item Code<br>(Mat. Code)</th>
            <th rowspan="2" style="width: 9%; border-top: none; padding: 2px;">Customer<br>Part No.</th>
            <th rowspan="2" style="width: 18%; border-top: none; padding: 2px;">Desc of Goods / Services</th>
            <th rowspan="2" style="width: 8%; border-top: none; padding: 2px;">Cust. PO</th>
            <th rowspan="2" style="width: 7%; border-top: none; padding: 2px;">HSN Code</th>
            <th rowspan="2" style="width: 4%; border-top: none; padding: 2px;">Qty</th>
            <th rowspan="2" style="width: 4%; border-top: none; padding: 2px;">UOM</th>
            <th rowspan="2" style="width: 6%; border-top: none; padding: 2px;">Unit Price</th>
            <th colspan="2" style="width: 8%; border-top: none; padding: 2px;">P & F</th>
            <th rowspan="2" style="width: 6%; border-top: none; padding: 2px;">Total Amount</th>
            <th rowspan="2" style="width: 5%; border-top: none; padding: 2px;">Discount</th>
            <th rowspan="2" style="width: 6%; border-top: none; padding: 2px;">Taxable Value</th>
            <th colspan="2" style="width: 8%; border-top: none; padding: 2px;">CGST</th>
            <th colspan="2" style="width: 8%; border-top: none; padding: 2px;">SGST / UT GST</th>
            <th colspan="2" style="width: 8%; border-top: none; border-right: none; padding: 2px;">IGST</th>
        </tr>
        <tr style="font-size: 7px; text-align: center;">
            <th style="padding: 2px;">Rate</th>
            <th style="padding: 2px;">Amount</th>
            <th style="padding: 2px;">Rate</th>
            <th style="padding: 2px;">Amount</th>
            <th style="padding: 2px;">Rate</th>
            <th style="padding: 2px;">Amount</th>
            <th style="padding: 2px; border-right: none;">Rate</th>
            <th style="padding: 2px; border-right: none;">Amount</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $index => $row)
        <tr style="font-size: 7.5px;  height: 50px; border-top: none; border-bottom: none;">
            <td class="text-center" style="border-left: none; padding: 15px 3px; vertical-align: top; border-bottom: 0 !important;">{{ $index + 1 }}</td>
            <td class="text-center" style="padding: 15px 3px; vertical-align: top; border-bottom: 0 !important;">{{ $row->ItemNumber ?? '10' }}</td>
            <td class="text-center" style="padding: 15px 3px; vertical-align: top; border-bottom: 0 !important;">{{ $row->customerPartno ?? '' }}</td>
            <td class="text-left" style="padding: 15px 3px; vertical-align: top; line-height: 1.2; border-bottom: 0 !important;">{{ $row->productname ?? '' }}</td>
            <td class="text-center" style="padding: 15px 3px; vertical-align: top; border-bottom: 0 !important;">{{ $row->ponumber ?? '' }}</td>
            <td class="text-center" style="padding: 15px 3px; vertical-align: top; border-bottom: 0 !important;">{{ $row->producthsncode ?? '' }}</td>
            <td class="text-center" style="padding: 15px 3px; vertical-align: top; border-bottom: 0 !important;">{{ $row->productqty ?? 0 }}</td>
            <td class="text-center" style="padding: 15px 3px; vertical-align: top; border-bottom: 0 !important;">{{ $row->uom_id ?: 'EA' }}</td>
            <td class="text-right" style="padding: 15px 3px; vertical-align: top; border-bottom: 0 !important;">{{ !empty($row->productsellingrate) ? sprintf("%.2f", $row->productsellingrate) : '0.00' }}</td>
            <td class="text-center" style="padding: 15px 3px; vertical-align: top; border-bottom: 0 !important;"></td>
            <td class="text-right" style="padding: 15px 3px; vertical-align: top; border-bottom: 0 !important;"></td>
            <td class="text-right" style="padding: 15px 3px; vertical-align: top; border-bottom: 0 !important;">{{ !empty($row->netamount) ? sprintf("%.2f", $row->netamount) : '0.00' }}</td>
            <td class="text-right" style="padding: 15px 3px; vertical-align: top; border-bottom: 0 !important;">0.00</td>
            <td class="text-right" style="padding: 15px 3px; vertical-align: top; border-bottom: 0 !important;">{{ !empty($row->taxableamount) ? sprintf("%.2f", $row->taxableamount) : '0.00' }}</td>
            <td class="text-center" style="padding: 15px 3px; vertical-align: top; border-bottom: 0 !important;">{{ $row->cgst_per ? $row->cgst_per.'%' : '' }}</td>
            <td class="text-right" style="padding: 15px 3px; vertical-align: top; border-bottom: 0 !important;">{{ !empty($row->productcgstamount) ? sprintf("%.2f", $row->productcgstamount) : '' }}</td>
            <td class="text-center" style="padding: 15px 3px; vertical-align: top; border-bottom: 0 !important;">{{ $row->sgst_per ? $row->sgst_per.'%' : '' }}</td>
            <td class="text-right" style="padding: 15px 3px; vertical-align: top; border-bottom: 0 !important;">{{ !empty($row->productsgstamount) ? sprintf("%.2f", $row->productsgstamount) : '' }}</td>
            <td class="text-center" style="padding: 15px 3px; vertical-align: top; border-bottom: 0 !important;">{{ $row->igst_per ? $row->igst_per.'%' : '' }}</td>
            <td class="text-right" style="border-right: none; padding: 15px 3px; vertical-align: top; border-bottom: 0 !important;">{{ !empty($row->productigstamount) ? sprintf("%.2f", $row->productigstamount) : '' }}</td>
        </tr>
        @endforeach

  @for($i = count($data); $i < 3; $i++)
        <tr style="font-size: 7.5px;  height: 50px;" >
            <td class="text-center" style="border-left: none; padding: 15px 3px; vertical-align: top; border-bottom: 0 !important; border-top: 0 !important;"></td>
            <td class="text-center" style="padding: 15px 3px; vertical-align: top; border-bottom: 0 !important; border-top: 0 !important;"></td>
            <td class="text-center" style="padding: 15px 3px; vertical-align: top; border-bottom: 0 !important; border-top: 0 !important;"></td>
            <td class="text-left" style="padding: 15px 3px; vertical-align: top; line-height: 1.2; border-bottom: 0 !important; border-top: 0 !important;"></td>
            <td class="text-center" style="padding: 15px 3px; vertical-align: top; border-bottom: 0 !important; border-top: 0 !important;"></td>
            <td class="text-center" style="padding: 15px 3px; vertical-align: top; border-bottom: 0 !important; border-top: 0 !important;"></td>
            <td class="text-center" style="padding: 15px 3px; vertical-align: top; border-bottom: 0 !important; border-top: 0 !important;"></td>
            <td class="text-center" style="padding: 15px 3px; vertical-align: top; border-bottom: 0 !important; border-top: 0 !important;"></td>
            <td class="text-right" style="padding: 15px 3px; vertical-align: top; border-bottom: 0 !important; border-top: 0 !important;"></td>
            <td class="text-center" style="padding: 15px 3px; vertical-align: top; border-bottom: 0 !important; border-top: 0 !important;"></td>
            <td class="text-right" style="padding: 15px 3px; vertical-align: top; border-bottom: 0 !important; border-top: 0 !important;"></td>
            <td class="text-right" style="padding: 15px 3px; vertical-align: top; border-bottom: 0 !important; border-top: 0 !important;"></td>
            <td class="text-right" style="padding: 15px 3px; vertical-align: top; border-bottom: 0 !important; border-top: 0 !important;"></td>
            <td class="text-right" style="padding: 15px 3px; vertical-align: top; border-bottom: 0 !important; border-top: 0 !important;"></td>
            <td class="text-center" style="padding: 15px 3px; vertical-align: top; border-bottom: 0 !important; border-top: 0 !important;"></td>
            <td class="text-right" style="padding: 15px 3px; vertical-align: top; border-bottom: 0 !important; border-top: 0 !important;"></td>
            <td class="text-right" style="padding: 15px 3px; vertical-align: top; border-bottom: 0 !important; border-top: 0 !important;"></td>
            <td class="text-center" style="padding: 15px 3px; vertical-align: top; border-bottom: 0 !important; border-top: 0 !important;"></td>
            <td class="text-right" style="padding: 15px 3px; vertical-align: top; border-bottom: 0 !important; border-top: 0 !important;"></td>
            <td class="text-right" style="border-right: none; padding: 15px 3px; vertical-align: top; border-bottom: 0 !important; border-top: 0 !important;"></td>
        </tr>
        @endfor
        <tr class="font-bold" style="background-color: #f9f9f9; font-size: 7.5px; height: 18px;">
            <td colspan="6" class="text-right" style="border-left: none; padding: 4px 3px;">Total</td>
            <td class="text-center" style="padding: 4px 3px;">{{ $data[0]->tot_qty ?? 0 }}</td>
            <td style="padding: 4px 3px;"></td>
            <td style="padding: 4px 3px;"></td>
            <td style="padding: 4px 3px;"></td>
            <td style="padding: 4px 3px;"></td>
            <td class="text-right" style="padding: 4px 3px;">{{ !empty($data[0]->sales_total) ? sprintf("%.2f", $data[0]->sales_total) : '0.00' }}</td>
            <td style="padding: 4px 3px;"></td>
            <td class="text-right" style="padding: 4px 3px;">{{ !empty($data[0]->taxableamounts) ? sprintf("%.2f", $data[0]->taxableamounts) : '0.00' }}</td>
            <td style="padding: 4px 3px;"></td>
            <td class="text-right" style="padding: 4px 3px;">{{ !empty($data[0]->cgstamount) ? sprintf("%.2f", $data[0]->cgstamount) : '0.00' }}</td>
            <td style="padding: 4px 3px;"></td>
            <td class="text-right" style="padding: 4px 3px;">{{ !empty($data[0]->sgstamount) ? sprintf("%.2f", $data[0]->sgstamount) : '0.00' }}</td>
            <td style="padding: 4px 3px;"></td>
            <td class="text-right" style="border-right: none; padding: 4px 3px;">{{ !empty($data[0]->igstamount) ? sprintf("%.2f", $data[0]->igstamount) : '0.00' }}</td>
        </tr>
    </tbody>
</table>

        <!-- IRN Row -->
        <div style="border-top: 1px solid #000; border-bottom: 1px solid #000; padding: 4px; font-size: 8px; text-align: left;">
            <strong>IRN No :</strong> {{ $data[0]->irn_reference_no ?? '' }}
        </div>

        <table style="width: 100%; border-collapse: collapse; border-bottom: 1px solid #000;">
    <tr>
        <td style="width: 30%; border: none; padding: 5px; text-align: center; vertical-align: top; border-right: 1px solid #000;">
            <div style="font-weight: bold; font-size: 7.5px; margin-bottom: 2px;">{{ $data[0]->invoiceno ?? '' }}</div>
            @if(!empty($customer_barcode))
                <img src="{{ $customer_barcode }}" alt="Customer Barcode" style="width: 180px; height: 180  px; margin-top: 5px;">
            @endif
        </td>
        
       <td style="width: 40%; border: none; padding: 5px; text-align: left; vertical-align: top; border-right: 1px solid #000;">
    
    <div style="font-size: 9px; line-height: 1.4; padding-bottom: 5px; border-bottom: 1px solid #000; margin-bottom: 5px;">
        <strong>IGST amount(in words) :</strong> {{ ($data[0]->igstamount ?? 0) > 0 ? ($data[0]->igstinwords ?? '') . ' only' : 'Zero Rupees Only' }}<br>
        <strong>Total Amount(in words) :</strong> {{ $data[0]->grandtotalamountword ?? '' }}<br>
        <strong>Document Currency In :</strong> INR
    </div>
    
    <div style="font-size: 8px; line-height: 1.3; padding-top: 2px;">
        <strong>Payment Terms: Within 61 days Due net</strong><br>
        Insurance: Material dispatched under this invoice is covered under the Marine Open Policy No.104400211910000001, which is valid from midnight of 01.04.2019 to midnight 31.03.2020.<br>
        <strong>Declaration:</strong> Certified that the particulars are true and correct and the amount indicated represents the price actually charged and that there is no flow of additional consideration directly or indirectly from the buyer.<br>
        <strong>Terms & Conditions: (E&OE)</strong><br>
        1. Interest @ 24% will be charged, if payment is not received within the due date.<br>
        2. Rejection if any should be intimated within 7 days from the date of receipt.<br>
        3. No agreement or contract is valid unless is in writing and is signed by a duty authorized office of the company.<br>
        4. All disputes subject to Bangalore jurisdiction.<br>
        Note: Unless otherwise stated, tax on this invoice is not payable under reverse charge.
    </div>
</td>
        
        <td style="width: 30%; border: none; padding: 0px; text-align: left; vertical-align: top;">
            <table style="width: 100%; border-collapse: collapse; font-size: 7.5px;">
                <tr>
                    <td style="border-bottom: 1px solid #000; border-right: 1px solid #000; padding: 3px 5px; font-weight: bold; width: 60%; height: 16px;">Total Taxable Value</td>
                    <td style="border-bottom: 1px solid #000; padding: 3px 5px; text-align: right; width: 40%; font-weight: bold;">{{ !empty($data[0]->taxableamounts) ? sprintf("%.2f", $data[0]->taxableamounts) : '0.00' }}</td>
                </tr>
                <tr>
                    <td style="border-bottom: 1px solid #000; border-right: 1px solid #000; padding: 3px 5px; font-weight: bold; height: 16px;">Total IGST Value</td>
                    <td style="border-bottom: 1px solid #000; padding: 3px 5px; text-align: right; font-weight: bold;">{{ !empty($data[0]->igstamount) ? sprintf("%.2f", $data[0]->igstamount) : '0.00' }}</td>
                </tr>
                <tr>
                    <td style="border-bottom: 1px solid #000; border-right: 1px solid #000; padding: 3px 5px; font-weight: bold; height: 16px;">Total UGST Value</td>
                    <td style="border-bottom: 1px solid #000; padding: 3px 5px; text-align: right; font-weight: bold;">0.00</td>
                </tr>
                <tr>
                    <td style="border-bottom: 1px solid #000; border-right: 1px solid #000; padding: 3px 5px; font-weight: bold; height: 16px;">TCS Amount</td>
                    <td style="border-bottom: 1px solid #000; padding: 3px 5px; text-align: right; font-weight: bold;">{{ !empty($data[0]->tcs_amount) ? sprintf("%.2f", $data[0]->tcs_amount) : '0.00' }}</td>
                </tr>
                <tr style="font-weight: bold; font-size: 8px;">
                    <td style="border-bottom: 1px solid #000; border-right: 1px solid #000; padding: 4px 5px; height: 18px;">Total Invoice Value</td>
                    <td style="border-bottom: 1px solid #000; padding: 4px 5px; text-align: right;">{{ !empty($data[0]->grandtotalamount) ? sprintf("%.2f", $data[0]->grandtotalamount) : '0.00' }}</td>
                </tr>
                <tr>
                    <td colspan="2" style="border: none; text-align: center; padding-top: 5px; padding-bottom: 2px;">
                        <div style="font-size: 8px; font-weight: bold; margin-bottom: 30px;">For IFB Industries Ltd</div>
                        <div style="font-size: 7.5px; margin-top: 50px;">Authorized Signatory</div>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>

        <!-- Bottom Section (Delivery Card / MRIR) -->
        <div class="font-bold text-center" style="border-bottom: 1px solid #000; padding: 3px; font-size: 8.5px;">
            Delivery Card / MRIR
        </div>

        <table style="width: 100%; border-collapse: collapse; font-size: 7.5px; border-bottom: 1px solid #000;">
            <thead>
                <tr style="text-align: center;">
                    <th style="width: 14%; padding: 2px; border-top: none;">Vendor Code</th>
                    <th style="width: 14%; padding: 2px; border-top: none;">Location</th>
                    <th style="width: 14%; padding: 2px; border-top: none;">Shop Code</th>
                    <th style="width: 14%; padding: 2px; border-top: none;">Gate Number</th>
                    <th style="width: 14%; padding: 2px; border-top: none;">Schd.Date</th>
                    <th style="width: 14%; padding: 2px; border-top: none;">Recd.Date</th>
                    <th style="width: 16%; padding: 2px; border-top: none; border-right: none;">MRIR Number</th>
                </tr>
            </thead>
            <tbody>
                <tr class="text-center">
                    <td style="border-left: none; border-bottom: none; padding: 3px;">{{ $data[0]->vendorCode ?? '' }}</td>
                    <td style="border-bottom: none; padding: 3px;">{{ $data[0]->plant_code ?? '' }}</td>
                    <td style="border-bottom: none; padding: 3px;">{{ $data[0]->shopcode ?? '' }}</td>
                    <td style="border-bottom: none; padding: 3px;">{{ $data[0]->gateno ?? '' }}</td>
                    <td style="border-bottom: none; padding: 3px;"></td>
                    <td style="border-bottom: none; padding: 3px;"></td>
                    <td style="border-right: none; border-bottom: none; padding: 3px;"></td>
                </tr>
            </tbody>
        </table>

        <table style="width: 100%; border-collapse: collapse; font-size: 7.5px;">
            <thead>
                <tr style="text-align: center;">
                    <th style="width: 12%; padding: 2px; border-top: none;">Part Number</th>
                    <th style="width: 12%; padding: 2px; border-top: none;">Container Type</th>
                    <th style="width: 12%; padding: 2px; border-top: none;">No. Of. Container</th>
                    <th style="width: 12%; padding: 2px; border-top: none;">Stuff Qty</th>
                    <th style="width: 10%; padding: 2px; border-top: none;">Rec. Qty</th>
                    <th style="width: 10%; padding: 2px; border-top: none;">Rej. Qty</th>
                    <th style="width: 10%; padding: 2px; border-top: none;">Acc. Qty</th>
                    <th style="width: 10%; padding: 2px; border-top: none;">Recd. By</th>
                    <th style="width: 12%; padding: 2px; border-top: none; border-right: none;">HMI Entry Seal</th>
                </tr>
            </thead>
            <tbody>
                <tr class="text-center">
                    <td style="border-left: none; border-bottom: none; padding: 3px;">{{ $data[0]->customerPartno ?? '' }}</td>
                    <td style="border-bottom: none; padding: 3px;">{{ $data[0]->ContainerType ?? '' }}</td>
                    <td style="border-bottom: none; padding: 3px;">{{ $data[0]->NoofContainers ?? '' }}</td>
                    <td style="border-bottom: none; padding: 3px;">{{ $data[0]->StuffQty ?? '' }}</td>
                    <td style="border-bottom: none; padding: 3px;"></td>
                    <td style="border-bottom: none; padding: 3px;"></td>
                    <td style="border-bottom: none; padding: 3px;"></td>
                    <td style="border-bottom: none; padding: 3px;"></td>
                    <td style="border-right: none; border-bottom: none; padding: 3px;"></td>
                </tr>
            </tbody>
        </table>
    </div>

    {{-- Page break between copies --}}
    @if($copyIndex < count($a) - 1)
        <div style="page-break-after: always; clear: both;"></div>
    @endif
@endfor

</body>
</html>
