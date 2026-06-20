<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Bootstrap Example</title>
      <meta charset="utf-8">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
      <style>
          body {
  background-color: grey;
}
page {
  background: white;
  display: block;
  margin: 0 auto;
  margin-bottom: 0.5cm;
  margin-top: 0.5cm;
  box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
}
page[size="A4"] {
  width: 21cm;
  padding: 4px;
  height: 29.7cm;
}

      </style>
   </head>
   <page size="A4"> <body style="font-size:10px;font-weight:700">
      <div class="container my-5">
         <!-- Control the  border border-dark column width, and how they should appear on different devices -->
         <div class="row">
            <div class=" border border-dark col-sm-12 text-center" style=" ">  GST INVOICE <br>INVOICE UNDER RULE-7</div>
         </div>
         <div class="row">
            <div class=" border border-dark border-right-0 border-bottom-0 border-top-0 col-sm-4 " style=" "><img style="width:100%;"src="http://mazeworkssolutions.com/wp-content/uploads/2019/03/cropped-MazeWorks_Banner_Transparent.png" alt="" srcset=""></div>
            <div class="border border-dark border-right-0 border-bottom-0 border-top-0 col-sm-4 text-center" style=" ">
                {{config('app.company_name')}} <br>
                 G-117,SIPCOT INDUSTRIAL PARK <br>
                Vallam Vadagal, Sriperumbudur,Chennai <br>
                Tamil Nadu 602105, <br>
                India

            </div>
            <div class=" border border-dark  border-left-0 border-bottom-0 border-top-0 col-sm-4" style=" ">
                <div class="row">
                    <div class=" border border-dark border-right-0  border-bottom-0 border-top-0 col-sm-6" style="     padding-bottom: 18px;">
                        GST Invoice No. <br>
                        GST Invoice Issue Date <br>
                        Billing No <br>
                        plant
                    </div>
                    <div class=" border border-dark border-right-0  border-bottom-0 border-top-0 col-sm-6" style=" ">
                        32020000330 <br>
                        01/07/2020 <br>
                        32020000330 <br>
                        HVF1 <br>

                    </div>
                 </div>

            </div>
         </div>
         <div class="row">
            <div class=" border border-dark   border-bottom-0  col-sm-4" style=" ">GSTN No : &nbsp;33AADCN9558Q3ZL</div>
            <div class=" border border-dark  border-left-0 border-bottom-0  col-sm-4" style=" ">PAN No : &nbsp;AADCN9558Q</div>
            <div class=" border border-dark   border-left-0 border-bottom-0  col-sm-4" style=" "> Vendor Code :&nbsp;TF6W</div>
         </div>
         <div class="row">
            <div class=" border  border-right-0 border-bottom-0  border-dark col-sm-6" style=" ">
                Detail Of Receiver(BillNo) : <br>
                HYUNDAI MOTOR INDIA LIMITED <br>
                H1 SIPCOT INDUSTRIAL PARK,<br>
                IRRUNGATTUKOTTAI,<br>
                SRIPERUMBUDUR TK <br>
                TAMIL NADU - 602105<br>
                INDIA <br>
                GSTINNO: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 33AAACH2364M1ZM <br>
                State Code :&nbsp;&nbsp;&nbsp;&nbsp;33

            </div>
            <div class=" border border-dark  border-bottom-0  col-sm-6" style=" ">
                Consignee(Shipped To) : <br>
                HYUNDAI MOTOR INDIA LIMITED <br>
                H1 SIPCOT INDUSTRIAL PARK,<br>
                IRRUNGATTUKOTTAI,<br>
                SRIPERUMBUDUR TK<br>
                TAMIL NADU - 602105<br>
                INDIA <br>
                GSTINNO: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 33AAACH2364M1ZM <br>
                State Code :&nbsp;&nbsp;&nbsp;&nbsp;33

            </div>
         </div>
