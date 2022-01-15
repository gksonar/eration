<?php

session_start();
include'confi.php';
 ?>
<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>E-Ration - Seller Login</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/favicon.png">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous"> -->
    <link href="css/style.css" rel="stylesheet">
    
</head>

<body class="h-100">
    
    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    



    <div class="login-form-bg h-100" style="background-color:grey;">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                <a class="text-center" href="index.html"> <h4>Seller Login</h4></a>
        
                                <form class="mt-5 mb-5 login-input" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <input type="email" name="seller_email" class="form-control" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="seller_password" class="form-control" placeholder="Password">
                                    </div>
                                    <button class="btn login-form__btn submit w-100" type="submit" name="login">Sign In</button>
                                </form>
                               <!--  <p class="mt-5 login-form__footer">Dont have account? <a href="page-register.html" class="text-primary">Sign Up</a> now</p> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="plugins/common/common.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/gleek.js"></script>
    <script src="js/styleSwitcher.js"></script>
</body>
</html>
<?php
if(isset($_POST['login']))
{

 $query="select * from seller_details where seller_email='".$_POST['seller_email']."' and seller_password='".$_POST['seller_password']."' ";

 $res=mysqli_query($con,$query) or die(mysqli_error($con));
if(mysqli_num_rows($res)>0)
      {
             $row=mysqli_fetch_array($res);
            extract($row);

            $_SESSION['seller_id']=$row['seller_id'];
         $_SESSION['seller_email']=$row['seller_email'];
         
                  echo "<script>";
                  echo "alert('Login Successfully');";
                   echo "window.location.href='dashboard.php';";
                   echo "</script>";
        
        
      }
     else
     {
          echo "<script>";
          echo "alert('Email  or Password is Invalid');";
          echo "window.location.href='index.php';";
          echo "</script>";
    }
}
?>





 