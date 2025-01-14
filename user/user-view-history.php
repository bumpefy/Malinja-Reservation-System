<?php 
include ("../php/session.php");
include('../php/dbconn.php');
session_start();
if (!isset($_SESSION['username'])) {
  header('Location: ../');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    <script src="js/readonly.js"></script>
    <script src="js/buton.js"></script>

  <title>i-Kolej</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="vendors/owl-carousel/css/owl.carousel.min.css">
  <link rel="stylesheet" href="vendors/owl-carousel/css/owl.theme.default.css">
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/aos/css/aos.css">
  <link rel="stylesheet" href="css/style.min.css">
  <link rel="stylesheet" href="css/stylebook.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
   <!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">
<!-- Bootstrap CSS -->
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
<!-- Font Awesome CSS -->
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css'>

<style>
tr{
    border-style: outset;
    text-align: center;
}

td{
    border-style: outset;
    text-align: center;
    background-color:#D6EEEE;

}
</style>
</head>
<body id="body" data-spy="scroll" data-target=".navbar" data-offset="100">
  <header id="header-section">
    <nav class="navbar navbar-expand-lg pl-3 pl-sm-0" id="navbar" style="font-family: Poppins,sans-serif;">
    <div class="container">
      <div class="navbar-brand-wrapper d-flex w-100">

      <a href="index.php">
        <img src="images/logohoriz.png" alt="" style="width:150px;"></a>

        <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="mdi mdi-menu navbar-toggler-icon"></span>
        </button> 
      </div>
      <div class="collapse navbar-collapse navbar-menu-wrapper" id="navbarSupportedContent">
        <ul class="navbar-nav align-items-lg-center align-items-start ml-auto">
          <li class="d-flex align-items-center justify-content-between pl-4 pl-lg-0">
            <div class="navbar-collapse-logo">
              <img src="images/Group2.svg" alt="">
            </div>
            <button class="navbar-toggler close-button" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="mdi mdi-close navbar-toggler-icon pl-5"></span>
            </button>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index2.php">Request</a>  
          </li>
          <li class="nav-item">
            <a class="nav-link" href="user-view-history.php">History</a>  
          </li>
          <li class="nav-item">
            <a class="nav-link" href="user_view_detail.php">Profile</a>
          </li>
          <li class="nav-item btn-contact-us pl-4 pl-lg-0">
            <button class="btn btn-info" data-toggle="modal" data-target="#exampleModal" ><a href="../index.php"><div style="color:white">Logout</div></a></button>
          </li>
        </ul>
      </div>
    </div> 
    </nav>   
  </header>

  <div class="container">
    <div class="col-12 col-lg-7 grid-margin grid-margin-lg-0" data-aos="fade-right" style="margin-left:380px;">
      <h1 class="font-weight-semibold">Reservation History</h1>
      </div><br><br>


<?php
include('../php/dbconn.php');
include ("../php/session.php");
$uid=$_SESSION['user_id'];
$q="SELECT * FROM reserve WHERE user_id='$uid' ORDER BY timestamp";
$result=mysqli_query($dbconn,$q);
$numrow=mysqli_num_rows($result);?>
<table class="table table-bordered" style="text-align:center;" >

<tr style="background-color:#ADD8E6; border-style: outset;"><th style="border-style: outset;"><b>Reserve id<b></th><th style="border-style: outset;"><b>Timestamp</b></th><th style="border-style: outset;"><b>Bed</b></th><th style="border-style: outset;"><b>Status</b></th></tr>
<?php for ($a=0;$a<$numrow;$a++){
    $row=mysqli_fetch_array($result);
    echo '<tr >';
    echo '<td style="border-style: outset;">';
    echo $row['reserve_id'];
    echo '</td>';
    echo '<td style="border-style: outset;">';
    echo $row['timestamp'];
    echo '</td>';
    echo '<td style="border-style: outset;">';
    echo $row['bed_id'];
    echo '</td>';
    echo '<td style="border-style: outset;">';
        if($row['status']==1){
          echo 'Approved';
        }
        else if ($row['status']==-1){
          echo 'Rejected';
        }
        else{
          echo 'Pending';
        }
        echo '</td>';
        echo '</tr>';
    }?>

</table>

<footer class="border-top">
        <p class="text-center text-muted pt-4">Copyright © 2022 Malinja Room Reservation System.</p>
      </footer>

  <script src="vendors/jquery/jquery.min.js"></script>
  <script src="vendors/bootstrap/bootstrap.min.js"></script>
  <script src="vendors/owl-carousel/js/owl.carousel.min.js"></script>
  <script src="vendors/aos/js/aos.js"></script>
  <script src="js/landingpage.js"></script>
</body>
</html>