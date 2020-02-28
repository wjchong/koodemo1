<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Invoice</title>
  
  
  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto+Condensed'>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

      <link rel="stylesheet" href="css/style.css">

 
<style>
  

@import url('https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i');

body{
  font-family: 'Roboto', sans-serif !important;
  background-color: #faf8f8;
}

.container-width {
  width: 100%;
  max-width: 450px;
  padding-right: 6px;
  padding-left: 6px;
  margin: 0 auto;
}

.invoice {
    background-color: #ffffff;
    //box-shadow: 0 14px 28px rgba(0, 0, 0, 0.1), 0 10px 10px rgba(0, 0, 0, 0.13);
    margin: 0px 0;
    padding: 25px 15px 15px;
        box-shadow: 0px 2px 10px #f0ebeb;
}
.invoice header {
  overflow: hidden;
  margin-bottom:50px;
}

.invoice header section:nth-of-type(1) h1 {
font-weight: 600;
letter-spacing: 2px;
color: #30b630;
font-size: 23px;
margin-top: 0;
margin-bottom: 5px;
margin-top: 13px;
}
.invoice header section:nth-of-type(1) span {
  color: #b7bcc3;
  font-size: 14px;
  letter-spacing: 2px;
}
.invoice header section:nth-of-type(2) {
  float: right;
}
.invoice header section:nth-of-type(2) span {
  font-size: 21px;
  color: #b7bcc3;
  letter-spacing: 1px;
}
.invoice header section:nth-of-type(2) span:before {
  content: "#";
}
.invoice main {
  border: 1px dashed #b7bcc3;
  border-left-width: 0px;
  border-right-width: 0px;
  padding-top: 30px;
  padding-bottom: 0px;
}
.invoice main section {
  overflow: hidden;
}
.invoice main section span {
  float: left;
  color: #344760;
  font-size: 16px;
  letter-spacing: .5px;
}
.invoice main section span:nth-of-type(1) {
  width: 45%;
  margin-right: 5%;
}
.invoice main section span:nth-of-type(2) {
  width: 22.5%;
}
.invoice main section span:nth-of-type(2), .invoice main section span:nth-of-type(3) {
  text-align: right;
}
.invoice main section span:nth-of-type(3) {
  width: 22.5%;
}
.invoice main section:nth-of-type(1) {
  margin-bottom: 30px;
}
.invoice main section:nth-of-type(1) span {
  color: #b7bcc3;
  text-transform: uppercase;
  letter-spacing: 2px;
  font-size: 13px;
}
.invoice main section:nth-of-type(2) {
  margin-bottom: 30px;
}
.invoice main section:nth-of-type(2) figure {
  overflow: hidden;
  margin: 0;
  margin-bottom: 7px;
  line-height: 160%;
}
.invoice main section:nth-of-type(2) figure:last-of-type {
  margin-bottom: 0;
}
.invoice main section:nth-of-type(3) span:nth-of-type(1) {
  width: 72.5%;
  font-weight: bold;
}
.invoice main section:nth-of-type(3) span:nth-of-type(2) {
  margin-right: 0 !important;
}
.invoice footer {
  text-align: right;
  margin-top: 30px;
}
.invoice footer a {
  font-size: 19px;
  font-weight: bold;
  text-decoration: none;
  text-transform: uppercase;
  position: relative;
  letter-spacing: 1px;
}
.invoice footer a:after {
  content: "";
  width: 0%;
  height: 4px;
  position: absolute;
  right: 0;
  bottom: -10px;
  background-color: inherit;
  -webkit-transition: width 0.2s ease-in-out;
  -moz-transition: width 0.2s ease-in-out;
  transition: width 0.2s ease-in-out;
}
.invoice footer a:hover:after {
  width: 100%;
}
.invoice footer a:nth-of-type(1) {
  color: #b7bcc3;
  margin-right: 30px;
}
.invoice footer a:nth-of-type(1):after {
  background-color: #b7bcc3;
}
.invoice footer a:nth-of-type(2) {
  color: #fe8888;
}
.invoice footer a:nth-of-type(2):after {
  background-color: #fe8888;
}


.summer-items{
  font-size: 20px;
  font-weight: 600;
}
.total-bar{
  margin-top: 25px;
}
.img30{
  margin-bottom: 30px;
}

</style>

</head>

<body>
  <div class="container-width">

<img src="http://socialryde.cc/SocialRyde/uploads/images/logo123.png" class="center-block img30" style="margin-top: 30px;">

  <div class="invoice">

    <header class="text-center">
      <section>
        <img src="http://socialryde.cc/SocialRyde/uploads/images/cash_bar.png">
        <h1>Payment Success!</h1>
      </section>
    </header>

     <section class="total-bar">
        <p><strong> Admin Cost</strong><span class="pull-right"><?php if(isset($_GET['adminFare'])){echo $_GET['adminFare'];} ?></span></p>
        <p><strong> Ryder Cost </strong><span class="pull-right"><?php if(isset($_GET['riderFare'])){echo $_GET['riderFare'];} ?></span></p>
        <p><strong> Payment Mode </strong><span class="pull-right">Paypal</span></p>
        <p><strong> Total Cash </strong><span class="pull-right"><?php if(isset($_GET['totalFare'])){echo $_GET['totalFare'];} ?></span></p>



 </section>

  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
