<?php 
session_start(); 


if (isset($_SESSION['adminid'])) {
  header("Location: admin-dashboard.php");
}
elseif (isset($_SESSION['studentid'])) {
  header("Location: student-dashboard.php");
}
elseif (isset($_SESSION['teacherid'])) {
  header("Location: teacher-dashboard.php");
}
elseif (isset($_SESSION['viewerid'])) {
  header("Location: viewer-dashboard.php");
}
else
{
  session_destroy();
}



 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Online Katahum Drafting Organization of SKSU Isulan Campus</title>
<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
<link href="css/font-awesome.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="css/animate.css" rel="stylesheet" type="text/css" />
<link href="css/admin.css" rel="stylesheet" type="text/css" />
</head>
<body class="light_theme  fixed_header left_nav_fixed">
<div class="wrapper">
  <!--\\\\\\\ wrapper Start \\\\\\-->


  
 <div class="container">
    <div class="row">
    <div class="col-sm-12">
       <h1 class="text-center" style="color: white;margin-bottom: -100px;padding-top: 60px;">Online Katahum Drafting Organization of SKSU Isulan Campus</h1>
    </div>
  </div>

  </div> 

  
  <div class="login_page">
  
  <div class="login_content">

  <div class="panel-heading border login_heading">login now</div>	

  <?php if (isset($_GET['status']) and $_GET['status'] == 'login-failed'): ?>
    <p class="pink_text">
    
      <span class="red_bg bg_space"><i class="fa fa-times"></i> Username and/or Password is incorrect.</span>
    
    </p>
  <?php endif ?>

 <form role="form" class="form-horizontal" method="POST" action="controller.php">
      <div class="form-group">
        
        <div class="col-sm-10">
          <input type="text" placeholder="Username" id="username" name="username" class="form-control" required="">
        </div>
      </div>
      <div class="form-group">
        
        <div class="col-sm-10">
          <input type="password" placeholder="Password" id="password" name="password" class="form-control" required="">
        </div>
      </div>
      <div class="form-group">
        <div class=" col-sm-12">

              <input type="text" hidden name="from" value="login">
              <button class="btn btn-large btn-primary pull-center" type="submit">Sign in</button>

             
        </div>
      </div>

      <a href="registration.php?s=select"><p>No Account? Register here</p></a>
      
    </form>
 </div>
  </div>
  
  
  
  
  
  
  
  
</div>
<!--\\\\\\\ wrapper end\\\\\\-->




<script src="js/jquery-2.1.0.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/common-script.js"></script>
<script src="js/jquery.slimscroll.min.js"></script>
</body>
</html>
