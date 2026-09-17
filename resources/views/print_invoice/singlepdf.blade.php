<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Tax Invoice</title>
<style>
    @page {
        size: A4 portrait;
        margin: 10px 15px;
    }
    body {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 9.5px;
        line-height: 1;
        color: #000;
        margin: 0;
        padding: 0;
    }
    .page-container {
        width: 100%;
        border: 1.5px solid #000;
        border-radius: 8px;
        box-sizing: border-box;
        padding: 0;
        position: relative;
    }
    table {
        width: 100%;
        border-collapse: collapse;
    }
    td, th {
        padding: 1.5px 2px;
        border: 0.5px solid #000;
        vertical-align: top;
        font-size: 9.5px;
    }
    th {
        font-weight: bold;
        background-color: #f2f2f2;
        text-align: center;
    }
    .no-border-table td {
        border: none;
        padding: 0.5px 0;
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
        <table style="border: none; width: 100%;">
            <tr>
                <td style="border: none; padding: 2px; text-align: left; vertical-align: middle; width: 25%;">
                    <div style="display: inline-block; vertical-align: middle;">
                        <img src="{{ asset('assets/img/IFB.jpg') }}" alt="IFB Logo" style="height: 30px; width: auto; object-fit: contain;">
                    </div>
                </td>
                <td style="border: none; text-align: center; vertical-align: middle; width: 50%;">
                    <div style="font-size: 15px; font-weight: bold; letter-spacing: 0.5px;">TAX INVOICE</div>
                </td>
                <td style="border: none; text-align: right; vertical-align: middle; width: 25%; padding-right: 5px;">
                    <div style="font-size: 10px; font-weight: bold; letter-spacing: 0.5px;">{{ $copyLabel }}</div>
                </td>
            </tr>
        </table>

        <!-- Details Box Section (Invoice Details & Addresses) -->
        <table style="width: 100%; border-collapse: collapse; border-top: 1px solid #000; border-bottom: 1px solid #000; border-left: none; border-right: none;">
            <tr>
                <td style="width: 50%; padding: 2px 3px; border-right: 1px solid #000; border-top: none; border-bottom: none; border-left: none; text-align: left; vertical-align: top;">
                    <div style="font-size: 10.5px; font-weight: bold;">IFB Automotive Pvt. Ltd</div>
                    <div style="font-size: 8px; line-height: 1.15;">
                        Kasaba Hobli, Soukya Road, Koralur Village, Bangalore 560067 Karnataka India<br>
                        State Name & Code: Karnataka 29<br>
                        Phone No: 91 80 39884450 Fax: 91 80 39842778<br>
                        GSTIN: 29AABCI2766H1ZE PAN: AABCI2766H CIN: U29130WB1989PTC046693<br>
                        Web: www.ifbautomotive.com Email ID: info@ifbautomotive.com<br>
                        Regd Office: Plot No.IND -5, Sector -1, East Calcutta Township, Kolkata - 700 107
                    </div>

                    <table class="no-border-table" style="width: 100%; margin-top: 1px;">
                        <tr>
                            <td class="font-bold" style="font-size: 8px; width: 25%;">Invoice To</td>
                            <td style="font-size: 7.5px; width: 75%;">: <strong>{{ 600051 }}</strong></td>
                        </tr>
                        <tr>
                            <td class="font-bold" style="font-size: 8px;"> HYUNDAI MOTOR INDIA LTD.</td>
                            <td style="font-size: 7.5px; text-align: right; font-weight: bold;">Vendor Code &nbsp;&nbsp; : &nbsp;&nbsp; {{ $data[0]->vendorCode ?? '' }}</td>
                        </tr>
                        <tr>
                            <td colspan="2" style="font-size: 7.5px; line-height: 1.15;">
                                SIPCOT INDL. EST, IRRUNGATTUKOTTAI SRIPERUMBUDUR(TK),CHENNAI Tamil Nadu India 602105
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="font-size: 7px; line-height: 1.15;">
                                PAN No: {{ !empty($data[0]->customerBillingGSTINno) ? substr($data[0]->customerBillingGSTINno, 2, 10) : '' }} &nbsp; GSTIN/UIN : {{ $data[0]->customerBillingGSTINno ?? '' }}<br>
                                State Name & Code: {{ $data[0]->customerStateName ?? '' }} (Code: {{ $data[0]->customerStateCode ?? '' }})<br>
                                Place of Supply: {{ $data[0]->statePlaceofSupply ?? '' }}
                            </td>
                        </tr>
                    </table>
                </td>

                <td style="width: 50%; padding: 2px 3px; border: none; text-align: left; vertical-align: top;">
                    <table style="width: 100%; border: none; border-collapse: collapse;">
                        <tr>
                            <td style="width: 65%; border: none; vertical-align: top; padding: 0px;">
                                <table class="no-border-table" style="font-size: 6.5px; width: 100%;">
                                    <tr>
                                        <td class="font-bold" style="width: 40%;">Invoice Number</td>
                                        <td style="width: 60%;">: <strong>{{ $data[0]->invoiceno ?? '' }}</strong></td>
                                    </tr>
                                    <tr>
                                        <td class="font-bold">Invoice Date</td>
                                        <td>: <strong>{{ !empty($data[0]->invoicedate) ? preg_replace('/\./', '/', $data[0]->invoicedate) : '' }}</strong></td>
                                    </tr>
                                    <tr>
                                        <td>Invoice Type</td>
                                        <td>: Tax Invoice</td>
                                    </tr>
                                    <tr>
                                        <td>Transporter Name</td>
                                        <td>: {{ $data[0]->transporter_name ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Transport Mode</td>
                                        <td>: Road</td>
                                    </tr>
                                    <tr>
                                        <td>LR Number</td>
                                        <td>: </td>
                                    </tr>
                                    <tr>
                                        <td>Package Description</td>
                                        <td>: </td>
                                    </tr>
                                    <tr>
                                        <td>Gross Weight & Net Wt</td>
                                        <td>: </td>
                                    </tr>
                                    <tr>
                                        <td class="font-bold">Consignee (Shipped to)</td>
                                        <td>: <strong>{{ $data[0]->customerBillingcode ?? '600051' }}</strong></td>
                                    </tr>
                                </table>
                            </td>

                            <td style="width: 35%; border: none; vertical-align: top; text-align: right; padding: 0px;">
                                @if(!empty($irn_barcode))
                                    <img src="{{ $irn_barcode }}" alt="IRN Barcode" style="width: 70px; height: 70px; display: inline-block;">
                                @endif
                            </td>
                        </tr>
                    </table>

                    <table class="no-border-table" style="font-size: 7.5px; width: 100%;">
                        <tr>
                            <td class="font-bold" style="font-size: 8px;">HYUNDAI MOTOR INDIA LTD.</td>
                        </tr>
                        <tr>
                            <td style="font-size: 7px; line-height: 1.15;">
                                #H1 SIPCOT INDL. EST, IRRUNGATTUKOTTAI SRIPERUMBUDUR(TK),CHENNAI Tamil Nadu India 602105
                            </td>
                        </tr>
                        <tr>
                            <td style="font-size: 7px; line-height: 1.15;">
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
                <tr style="font-size: 6.5px; text-align: center;">
                    <th rowspan="2" style="width: 3%; border-left: none; border-top: none; padding: 1.5px 1px;">SL#</th>
                    <th rowspan="2" style="width: 6%; border-top: none; padding: 1.5px 1px;">Item Code<br>(Mat. Code)</th>
                    <th rowspan="2" style="width: 9%; border-top: none; padding: 1.5px 1px;">Customer<br>Part No.</th>
                    <th rowspan="2" style="width: 18%; border-top: none; padding: 1.5px 1px;">Desc of Goods / Services</th>
                    <th rowspan="2" style="width: 8%; border-top: none; padding: 1.5px 1px;">Cust. PO</th>
                    <th rowspan="2" style="width: 7%; border-top: none; padding: 1.5px 1px;">HSN Code</th>
                    <th rowspan="2" style="width: 4%; border-top: none; padding: 1.5px 1px;">Qty</th>
                    <th rowspan="2" style="width: 4%; border-top: none; padding: 1.5px 1px;">UOM</th>
                    <th rowspan="2" style="width: 6%; border-top: none; padding: 1.5px 1px;">Unit Price</th>
                    <th colspan="2" style="width: 8%; border-top: none; padding: 1.5px 1px;">P & F</th>
                    <th rowspan="2" style="width: 6%; border-top: none; padding: 1.5px 1px;">Total Amount</th>
                    <th rowspan="2" style="width: 5%; border-top: none; padding: 1.5px 1px;">Discount</th>
                    <th rowspan="2" style="width: 6%; border-top: none; padding: 1.5px 1px;">Taxable Value</th>
                    <th colspan="2" style="width: 8%; border-top: none; padding: 1.5px 1px;">CGST</th>
                    <th colspan="2" style="width: 8%; border-top: none; padding: 1.5px 1px;">SGST / UT GST</th>
                    <th colspan="2" style="width: 8%; border-top: none; border-right: none; padding: 1.5px 1px;">IGST</th>
                </tr>
                <tr style="font-size: 6.5px; text-align: center;">
                    <th style="padding: 1px;">Rate</th>
                    <th style="padding: 1px;">Amount</th>
                    <th style="padding: 1px;">Rate</th>
                    <th style="padding: 1px;">Amount</th>
                    <th style="padding: 1px;">Rate</th>
                    <th style="padding: 1px;">Amount</th>
                    <th style="padding: 1px; border-right: none;">Rate</th>
                    <th style="padding: 1px; border-right: none;">Amount</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $index => $row)
                <tr style="font-size: 6.8px; height: 14px; border-top: none; border-bottom: none;">
                    <td class="text-center" style="border-left: none; padding: 1.5px 1px; vertical-align: middle; border-bottom: 0 !important;">{{ $index + 1 }}</td>
                    <td class="text-center" style="padding: 1.5px 1px; vertical-align: middle; border-bottom: 0 !important;">{{ $row->ItemNumber ?? '10' }}</td>
                    <td class="text-center" style="padding: 1.5px 1px; vertical-align: middle; border-bottom: 0 !important;">{{ $row->customerPartno ?? '' }}</td>
                    <td class="text-left" style="padding: 1.5px 1px; vertical-align: middle; line-height: 1.1; border-bottom: 0 !important;">{{ $row->productname ?? '' }}</td>
                    <td class="text-center" style="padding: 1.5px 1px; vertical-align: middle; border-bottom: 0 !important;">{{ $row->ponumber ?? '' }}</td>
                    <td class="text-center" style="padding: 1.5px 1px; vertical-align: middle; border-bottom: 0 !important;">{{ $row->producthsncode ?? '' }}</td>
                    <td class="text-center" style="padding: 1.5px 1px; vertical-align: middle; border-bottom: 0 !important;">{{ $row->productqty ?? 0 }}</td>
                    <td class="text-center" style="padding: 1.5px 1px; vertical-align: middle; border-bottom: 0 !important;">{{ $row->uom_id ?: 'EA' }}</td>
                    <td class="text-right" style="padding: 1.5px 1px; vertical-align: middle; border-bottom: 0 !important;">{{ !empty($row->productsellingrate) ? sprintf("%.2f", $row->productsellingrate) : '0.00' }}</td>
                    <td class="text-center" style="padding: 1.5px 1px; vertical-align: middle; border-bottom: 0 !important;"></td>
                    <td class="text-right" style="padding: 1.5px 1px; vertical-align: middle; border-bottom: 0 !important;"></td>
                    <td class="text-right" style="padding: 1.5px 1px; vertical-align: middle; border-bottom: 0 !important;">{{ !empty($row->netamount) ? sprintf("%.2f", $row->netamount) : '0.00' }}</td>
                    <td class="text-right" style="padding: 1.5px 1px; vertical-align: middle; border-bottom: 0 !important;">0.00</td>
                    <td class="text-right" style="padding: 1.5px 1px; vertical-align: middle; border-bottom: 0 !important;">{{ !empty($row->taxableamount) ? sprintf("%.2f", $row->taxableamount) : '0.00' }}</td>
                    <td class="text-center" style="padding: 1.5px 1px; vertical-align: middle; border-bottom: 0 !important;">{{ $row->cgst_per ? $row->cgst_per.'%' : '' }}</td>
                    <td class="text-right" style="padding: 1.5px 1px; vertical-align: middle; border-bottom: 0 !important;">{{ !empty($row->productcgstamount) ? sprintf("%.2f", $row->productcgstamount) : '' }}</td>
                    <td class="text-center" style="padding: 1.5px 1px; vertical-align: middle; border-bottom: 0 !important;">{{ $row->sgst_per ? $row->sgst_per.'%' : '' }}</td>
                    <td class="text-right" style="padding: 1.5px 1px; vertical-align: middle; border-bottom: 0 !important;">{{ !empty($row->productsgstamount) ? sprintf("%.2f", $row->productsgstamount) : '' }}</td>
                    <td class="text-center" style="padding: 1.5px 1px; vertical-align: middle; border-bottom: 0 !important;">{{ $row->igst_per ? $row->igst_per.'%' : '' }}</td>
                    <td class="text-right" style="border-right: none; padding: 1.5px 1px; vertical-align: middle; border-bottom: 0 !important;">{{ !empty($row->productigstamount) ? sprintf("%.2f", $row->productigstamount) : '' }}</td>
                </tr>
                @endforeach

                @for($i = count($data); $i < 8; $i++)
                <tr style="font-size: 6.8px; height: 14px;">
                    <td class="text-center" style="border-left: none; padding: 1.5px 1px; vertical-align: middle; border-bottom: 0 !important; border-top: 0 !important;"></td>
                    <td class="text-center" style="padding: 1.5px 1px; vertical-align: middle; border-bottom: 0 !important; border-top: 0 !important;"></td>
                    <td class="text-center" style="padding: 1.5px 1px; vertical-align: middle; border-bottom: 0 !important; border-top: 0 !important;"></td>
                    <td class="text-left" style="padding: 1.5px 1px; vertical-align: middle; line-height: 1.1; border-bottom: 0 !important; border-top: 0 !important;"></td>
                    <td class="text-center" style="padding: 1.5px 1px; vertical-align: middle; border-bottom: 0 !important; border-top: 0 !important;"></td>
                    <td class="text-center" style="padding: 1.5px 1px; vertical-align: middle; border-bottom: 0 !important; border-top: 0 !important;"></td>
                    <td class="text-center" style="padding: 1.5px 1px; vertical-align: middle; border-bottom: 0 !important; border-top: 0 !important;"></td>
                    <td class="text-center" style="padding: 1.5px 1px; vertical-align: middle; border-bottom: 0 !important; border-top: 0 !important;"></td>
                    <td class="text-right" style="padding: 1.5px 1px; vertical-align: middle; border-bottom: 0 !important; border-top: 0 !important;"></td>
                    <td class="text-center" style="padding: 1.5px 1px; vertical-align: middle; border-bottom: 0 !important; border-top: 0 !important;"></td>
                    <td class="text-right" style="padding: 1.5px 1px; vertical-align: middle; border-bottom: 0 !important; border-top: 0 !important;"></td>
                    <td class="text-right" style="padding: 1.5px 1px; vertical-align: middle; border-bottom: 0 !important; border-top: 0 !important;"></td>
                    <td class="text-right" style="padding: 1.5px 1px; vertical-align: middle; border-bottom: 0 !important; border-top: 0 !important;"></td>
                    <td class="text-right" style="padding: 1.5px 1px; vertical-align: middle; border-bottom: 0 !important; border-top: 0 !important;"></td>
                    <td class="text-center" style="padding: 1.5px 1px; vertical-align: middle; border-bottom: 0 !important; border-top: 0 !important;"></td>
                    <td class="text-right" style="padding: 1.5px 1px; vertical-align: middle; border-bottom: 0 !important; border-top: 0 !important;"></td>
                    <td class="text-right" style="padding: 1.5px 1px; vertical-align: middle; border-bottom: 0 !important; border-top: 0 !important;"></td>
                    <td class="text-center" style="padding: 1.5px 1px; vertical-align: middle; border-bottom: 0 !important; border-top: 0 !important;"></td>
                    <td class="text-right" style="padding: 1.5px 1px; vertical-align: middle; border-bottom: 0 !important; border-top: 0 !important;"></td>
                    <td class="text-right" style="border-right: none; padding: 1.5px 1px; vertical-align: middle; border-bottom: 0 !important; border-top: 0 !important;"></td>
                </tr>
                @endfor
                <tr class="font-bold" style="background-color: #f9f9f9; font-size: 6.8px; height: 14px;">
                    <td colspan="6" class="text-right" style="border-left: none; padding: 1.5px 2px;">Total</td>
                    <td class="text-center" style="padding: 1.5px 1px;">{{ $data[0]->tot_qty ?? 0 }}</td>
                    <td style="padding: 1.5px 1px;"></td>
                    <td style="padding: 1.5px 1px;"></td>
                    <td style="padding: 1.5px 1px;"></td>
                    <td style="padding: 1.5px 1px;"></td>
                    <td class="text-right" style="padding: 1.5px 1px;">{{ !empty($data[0]->sales_total) ? sprintf("%.2f", $data[0]->sales_total) : '0.00' }}</td>
                    <td style="padding: 1.5px 1px;"></td>
                    <td class="text-right" style="padding: 1.5px 1px;">{{ !empty($data[0]->taxableamounts) ? sprintf("%.2f", $data[0]->taxableamounts) : '0.00' }}</td>
                    <td style="padding: 1.5px 1px;"></td>
                    <td class="text-right" style="padding: 1.5px 1px;">{{ !empty($data[0]->cgstamount) ? sprintf("%.2f", $data[0]->cgstamount) : '0.00' }}</td>
                    <td style="padding: 1.5px 1px;"></td>
                    <td class="text-right" style="padding: 1.5px 1px;">{{ !empty($data[0]->sgstamount) ? sprintf("%.2f", $data[0]->sgstamount) : '0.00' }}</td>
                    <td style="padding: 1.5px 1px;"></td>
                    <td class="text-right" style="border-right: none; padding: 1.5px 1px;">{{ !empty($data[0]->igstamount) ? sprintf("%.2f", $data[0]->igstamount) : '0.00' }}</td>
                </tr>
            </tbody>
        </table>

        <!-- IRN Row -->
        <div style="border-top: 1px solid #000; border-bottom: 1px solid #000; padding: 2px 4px; font-size: 7px; text-align: left;">
            <strong>IRN No :</strong> {{ $data[0]->irn_reference_no ?? '' }}
        </div>

        <table style="width: 100%; border-collapse: collapse; border-bottom: 1px solid #000;">
            <tr>
                <td style="width: 25%; border: none; padding: 2px; text-align: center; vertical-align: top; border-right: 1px solid #000;">
                    <div style="font-weight: bold; font-size: 7px; margin-bottom: 1px;">{{ $data[0]->invoiceno ?? '' }}</div>
                    @if(!empty($customer_barcode))
                        <img src="{{ $customer_barcode }}" alt="Customer Barcode" style="width: 95px; height: 95px; margin-top: 1px;">
                    @endif
                </td>
                
                <td style="width: 45%; border: none; padding: 2px 3px; text-align: left; vertical-align: top; border-right: 1px solid #000;">
                    <div style="font-size: 7.5px; line-height: 1.15; padding-bottom: 2px; border-bottom: 1px solid #000; margin-bottom: 2px;">
                        <strong>IGST amount(in words) :</strong> {{ ($data[0]->igstamount ?? 0) > 0 ? ($data[0]->igstinwords ?? '') . ' only' : 'Zero Rupees Only' }}<br>
                        <strong>Total Amount(in words) :</strong> {{ $data[0]->grandtotalamountword ?? '' }}<br>
                        <strong>Document Currency In :</strong> INR
                    </div>
                    
                    <div style="font-size: 7px; line-height: 1.15; padding-top: 1px;">
                        <strong>Payment Terms: Within {{ $data[0]->payment_terms ?? '' }} days Due net</strong><br>
                        Insurance: Material dispatched under this invoice is covered under Marine Open Policy No.0830012873 12, valid from 01.04.2026 to 31.03.2027.<br>
                        <strong>Declaration:</strong> Certified that the particulars are true and correct and the amount indicated represents the price actually charged.<br>
                        <strong>Terms & Conditions: (E&OE)</strong><br>
                        1. Interest @ 24% will be charged if payment is not received within due date.<br>
                        2. Rejection if any should be intimated within 7 days of receipt.<br>
                        3. No contract valid unless in writing and signed by authorized officer.<br>
                        4. All disputes subject to Bangalore jurisdiction. Note: Tax not payable under reverse charge.
                    </div>
                </td>
                
                <td style="width: 30%; border: none; padding: 0px; text-align: left; vertical-align: top;">
                    <table style="width: 100%; border-collapse: collapse; font-size: 7px;">
                        <tr>
                            <td style="border-bottom: 1px solid #000; border-right: 1px solid #000; padding: 1.5px 3px; font-weight: bold; width: 60%; height: 13px;">Total Taxable Value</td>
                            <td style="border-bottom: 1px solid #000; padding: 1.5px 3px; text-align: right; width: 40%; font-weight: bold;">{{ !empty($data[0]->taxableamounts) ? sprintf("%.2f", $data[0]->taxableamounts) : '0.00' }}</td>
                        </tr>
                        <tr>
                            <td style="border-bottom: 1px solid #000; border-right: 1px solid #000; padding: 1.5px 3px; font-weight: bold; height: 13px;">Total IGST Value</td>
                            <td style="border-bottom: 1px solid #000; padding: 1.5px 3px; text-align: right; font-weight: bold;">{{ !empty($data[0]->igstamount) ? sprintf("%.2f", $data[0]->igstamount) : '0.00' }}</td>
                        </tr>
                        <tr>
                            <td style="border-bottom: 1px solid #000; border-right: 1px solid #000; padding: 1.5px 3px; font-weight: bold; height: 13px;">Total UGST Value</td>
                            <td style="border-bottom: 1px solid #000; padding: 1.5px 3px; text-align: right; font-weight: bold;">0.00</td>
                        </tr>
                        <tr>
                            <td style="border-bottom: 1px solid #000; border-right: 1px solid #000; padding: 1.5px 3px; font-weight: bold; height: 13px;">TCS Amount</td>
                            <td style="border-bottom: 1px solid #000; padding: 1.5px 3px; text-align: right; font-weight: bold;">{{ !empty($data[0]->tcs_amount) ? sprintf("%.2f", $data[0]->tcs_amount) : '0.00' }}</td>
                        </tr>
                        <tr style="font-weight: bold; font-size: 7.5px;">
                            <td style="border-bottom: 1px solid #000; border-right: 1px solid #000; padding: 2px 3px; height: 14px;">Total Invoice Value</td>
                            <td style="border-bottom: 1px solid #000; padding: 2px 3px; text-align: right;">{{ !empty($data[0]->grandtotalamount) ? sprintf("%.2f", $data[0]->grandtotalamount) : '0.00' }}</td>
                        </tr>
                        <tr>
                            <td colspan="2" style="border: none; text-align: center; padding-top: 2px; padding-bottom: 1px;">
                                <div style="font-size: 7px; font-weight: bold; margin-bottom: 10px;">For IFB Automotive Pvt. Ltd</div>
                                <div style="font-size: 6.5px; margin-top: 15px;">Authorized Signatory</div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <!-- Bottom Section (Delivery Card / MRIR) -->
        <div class="font-bold text-center" style="border-bottom: 1px solid #000; padding: 1.5px; font-size: 7px;">
            Delivery Card / MRIR
        </div>

        <table style="width: 100%; border-collapse: collapse; font-size: 6.5px; border-bottom: 1px solid #000;">
            <thead>
                <tr style="text-align: center;">
                    <th style="width: 14%; padding: 1px; border-top: none;">Vendor Code</th>
                    <th style="width: 14%; padding: 1px; border-top: none;">Location</th>
                    <th style="width: 14%; padding: 1px; border-top: none;">Shop Code</th>
                    <th style="width: 14%; padding: 1px; border-top: none;">Gate Number</th>
                    <th style="width: 14%; padding: 1px; border-top: none;">Schd.Date</th>
                    <th style="width: 14%; padding: 1px; border-top: none;">Recd.Date</th>
                    <th style="width: 16%; padding: 1px; border-top: none; border-right: none;">MRIR Number</th>
                </tr>
            </thead>
            <tbody>
                <tr class="text-center">
                    <td style="border-left: none; border-bottom: none; padding: 1.5px 1px;">{{ $data[0]->vendorCode ?? '' }}</td>
                    <td style="border-bottom: none; padding: 1.5px 1px;">{{ $data[0]->plant_code ?? '' }}</td>
                    <td style="border-bottom: none; padding: 1.5px 1px;">{{ $data[0]->shopcode ?? '' }}</td>
                    <td style="border-bottom: none; padding: 1.5px 1px;">{{ $data[0]->gateno ?? '' }}</td>
                    <td style="border-bottom: none; padding: 1.5px 1px;"></td>
                    <td style="border-bottom: none; padding: 1.5px 1px;"></td>
                    <td style="border-right: none; border-bottom: none; padding: 1.5px 1px;"></td>
                </tr>
            </tbody>
        </table>

        <table style="width: 100%; border-collapse: collapse; font-size: 6.5px;">
            <thead>
                <tr style="text-align: center;">
                    <th style="width: 12%; padding: 1px; border-top: none;">Part Number</th>
                    <th style="width: 12%; padding: 1px; border-top: none;">Container Type</th>
                    <th style="width: 12%; padding: 1px; border-top: none;">No. Of. Container</th>
                    <th style="width: 12%; padding: 1px; border-top: none;">Stuff Qty</th>
                    <th style="width: 10%; padding: 1px; border-top: none;">Rec. Qty</th>
                    <th style="width: 10%; padding: 1px; border-top: none;">Rej. Qty</th>
                    <th style="width: 10%; padding: 1px; border-top: none;">Acc. Qty</th>
                    <th style="width: 10%; padding: 1px; border-top: none;">Recd. By</th>
                    <th style="width: 12%; padding: 1px; border-top: none; border-right: none;">HMI Entry Seal</th>
                </tr>
            </thead>
            <tbody>
                <tr class="text-center">
                    <td style="border-left: none; border-bottom: none; padding: 1.5px 1px;">{{ $data[0]->customerPartno ?? '' }}</td>
                    <td style="border-bottom: none; padding: 1.5px 1px;">{{ $data[0]->ContainerType ?? '' }}</td>
                    <td style="border-bottom: none; padding: 1.5px 1px;">{{ $data[0]->NoofContainers ?? '' }}</td>
                    <td style="border-bottom: none; padding: 1.5px 1px;">{{ $data[0]->StuffQty ?? '' }}</td>
                    <td style="border-bottom: none; padding: 1.5px 1px;"></td>
                    <td style="border-bottom: none; padding: 1.5px 1px;"></td>
                    <td style="border-bottom: none; padding: 1.5px 1px;"></td>
                    <td style="border-bottom: none; padding: 1.5px 1px;"></td>
                    <td style="border-right: none; border-bottom: none; padding: 1.5px 1px;"></td>
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
