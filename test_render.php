<?php

// use Illuminate\Support\Facades\DB;
// use Barryvdh\DomPDF\Facade as PDF;
// use Milon\Barcode\DNS2D;

// // Bootstrap Laravel
// require __DIR__.'/vendor/autoload.php';
// $app = require_once __DIR__.'/bootstrap/app.php';
// $kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
// $kernel->bootstrap();

// $invoiceno = '5508215874';

// $data = DB::table('salesheaders')
//         ->leftJoin('salesdetails', 'salesdetails.invoiceno_id', '=', 'salesheaders.invoiceno')
//         ->select('salesheaders.*','salesdetails.*','salesheaders.podateinword')
//         ->where('salesheaders.invoiceno','=', $invoiceno)
//         ->get();

// if ($data->isEmpty()) {
//     die("Invoice not found in database.\n");
// }

// $numItems = isset($argv[1]) ? intval($argv[1]) : 1;
// $items = [];
// for ($i = 0; $i < $numItems; $i++) {
//     $items[] = clone $data[0];
// }
// $data = collect($items);

// $datastr = '';
// $invdate = $data[0]->invoicedate;
// $datastr .= $data[0]->shopcode .
//     preg_replace('/\s+/', '', $data[0]->ponumber) .
//     preg_replace('/\s+/', '', $data[0]->customerPartno) . "\r\n" .
//     preg_replace('/\s+/', '', $data[0]->invoiceno) . "\t" .
//     preg_replace('/\./', '', $invdate) .
//     preg_replace('/\s+/', '', $data[0]->tot_qty) . "\t" .
//     preg_replace('/\s+/', '', $data[0]->grandtotalamount) . "\t" .
//     preg_replace('/\s+/', '', $data[0]->producthsncode) . '0.00' . "\t" .
//     preg_replace('/\s+/', '', $data[0]->sgstamount) . "\t" . preg_replace('/\s+/', '', $data[0]->igstamount) . "\t" . preg_replace('/\s+/', '', $data[0]->tcs_amount) . "\t" .
//     preg_replace('/\s+/', '', $data[0]->productsellingrate) . "\t" .
//     preg_replace('/\s+/', '', $data[0]->taxableamounts) . "\t" .
//     preg_replace('/\s+/', '', $data[0]->cgstamount) . "\t" . '0.00' . "\t" . '0.00' . "\t" .
//     preg_replace('/\s+/', '', $data[0]->taxableamounts) . "\t" . '0.00' . "\t" .
//     "0.00" . "\t" . '0.00' . "\t" . preg_replace('/\s+/', '', $data[0]->companyGSTIN) . "\t" . ' ' . "\t" .
//     preg_replace('/\s+/', '', $data[0]->irn_reference_no) . "\t";

// $datastr = trim($datastr);

// // Instantiate DNS2D
// $dns2d = new DNS2D();
// $customer_barcode = 'data:image/svg+xml;base64,' . base64_encode($dns2d->getBarcodeSVG($datastr, "QRCODE", 2, 2));
// $irn_barcode = 'data:image/svg+xml;base64,' . base64_encode($dns2d->getBarcodeSVG($data[0]->irn_reference_no . "\r\n", "QRCODE", 2, 2));

// $datacount = count($data);
// $a = ['original']; // Just do original copy for testing

// echo "Rendering PDF for $invoiceno with datacount = $datacount...\n";

// // Render view
// $pdf = \PDF::loadView('print_invoice.singlepdf', compact(['data', 'a', 'datacount', 'customer_barcode', 'irn_barcode']))->setPaper('a4', 'landscape');

// // Save PDF
// $pdfPath = __DIR__ . '/test.pdf';
// file_put_contents($pdfPath, $pdf->output());

// echo "PDF saved successfully to $pdfPath\n";
