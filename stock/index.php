<!DOCTYPE html>
<html lang="en">
 <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <link rel="stylesheet" type="text/css" href="simple-calendar/tcal.css" />
  <script type="text/javascript" src="simple-calendar/tcal_en.js"></script>
  
  <title>Stock Exchange</title>

  <!--ChartJs Library -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
  
  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/business-frontpage.css" rel="stylesheet">

  <script src="js/convertCurrency.js"></script>
</head>
<body onload="convertCurrency();">
  
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="index.php">Stock Exchange</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Register</a>
          </li>
		  <li class="nav-item">
            <a class="nav-link" href="#">About Us</a>
          </li>
		  <li class="nav-item">
            <a class="nav-link" href="#">Contact Us</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

<!-- Header -->
<header class="bg-primary py-5 mb-5">
  <div class="container h-100">
    <div class="row h-100 align-items-center">
      <div class="col-lg-12">
        <h1 class="display-4 text-white mt-5 mb-2">Exchange with convenience</h1>
        <p class="lead mb-5 text-white-50"></p>
      </div>
    </div>
  </div>
</header>

  <!-- Page Content -->
  <div class="container">

    <div class="row">
      <div class="col-md-8 mb-5">
        <h2>Alphabet Inc.(GOOG)</h2>
        <hr>
        <p>Google announced a 2-for-1 stock split way back in 2012, and it finally took effect in early 2014. The result: GOOG was joined by GOOGL, each representing different classes of Google stock.</p>
        <p>GOOGL stock allowed for voting rights, GOOG stock did not.</p>
        <a class="btn btn-primary btn-lg" href="companyDescription.php">read more &raquo;</a>
      </div>
      <div class="col-md-4 mb-5">
        <div id="box">
        <h5>Currency Converter</h5>
        <table>
          <tr>
            <td><input id="fromAmount" type="text" size="15" value="1" onkeyup="convertCurrency();"/></td>
            <td>
              <select id="from" onchange="convertCurrency();">
                <option value="AUD" selected>Austrlian Dollar(AUD)</option>
                <option value="USD" >US Dollar(USD)</option>
                <option value="INR" >Indian Rupee(INR)</option>
            </td>
          </tr>
          <tr>
            <td><input id="toAmount" type="text" size="15" disabled/></td>
            <td>
              <select id="to" onchange="convertCurrency();">
                <option value="AUD">Austrlian Dollar(AUD)</option>
                <option value="USD" selected>US Dollar(USD)</option>
                <option value="INR" >Indian Rupee(INR)</option>
            </td>
          </tr>
        </table>
        </div>
      </div>
    </div>
    

  </div>
  <!-- /.container -->
  <div class="chart-layout"> 
   		<canvas id="chart" height="15" width="35"></canvas>
  </div>
  <script src="js/main.js"></script>
  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Polina & Karma 2020</p>
    </div>
    <!-- /.container -->

  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
   
 
</html>
<?php
  //header("Refresh: 60");
  include('dropdown.php');
  include('api.php');
  require ('functions.php');
  //include ('record.php');
?>
