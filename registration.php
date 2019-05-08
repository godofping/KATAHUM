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


  </div> 

  
  <div class="login_page">
  
    <?php if (isset($_GET['s']) and $_GET['s'] == 'select'): ?>
        <div class="registration">

        <div class="panel-heading border login_heading">REGISTER AS</div> 
          <a href="registration.php?s=teacher"><div class="effect-button">TEACHER</div></a>
          <a href="registration.php?s=student"><div class="effect-button">STUDENT</div></a>
          <a href="registration.php?s=viewer"><div class="effect-button">VIEWER</div></a>
       </div>

    <?php endif ?>

    <?php if (isset($_GET['s']) and $_GET['s'] == 'teacher'): ?>
        <div class="registration">

        <div class="panel-heading border login_heading">Register as teacher</div> 

        <?php if (isset($_GET['status']) and $_GET['status'] == 'username-taken'): ?>
            <p class="pink_text">
            
              <span class="red_bg bg_space"><i class="fa fa-times"></i> Username is already taken</span>
            
            </p>
        <?php endif ?>

        <form role="form" class="form-horizontal" method="POST" action="controller.php">

          <div class="form-group">
            <div class="col-sm-10">
              <label class="pull-left">First Name:</label>
                <input type="text" placeholder="First Name" id="firstname" name="firstname" class="form-control" required="" <?php if (isset($_GET['firstname'])): ?> value = "<?php echo($_GET['firstname']) ?>"<?php endif ?>>
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-10">
              <label class="pull-left">Middle Initial:</label>
                <input type="text" placeholder="Middle Initial" id="middleinitial" name="middleinitial" class="form-control" required="" maxlength="4" <?php if (isset($_GET['middleinitial'])): ?> value = "<?php echo($_GET['middleinitial']) ?>"<?php endif ?>>
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-10">
              <label class="pull-left">Last Name:</label>
                <input type="text" placeholder="Last Name" id="lastname" name="lastname" class="form-control" required="" <?php if (isset($_GET['lastname'])): ?> value = "<?php echo($_GET['lastname']) ?>"<?php endif ?>>
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-10">
              <label class="pull-left">Gender:</label>
                <select class="form-control" id="gender" name="gender">
                  <optgroup label="Please Select Gender">
                    <?php if (isset($_GET['gender'])): ?> <option selected="" value="<?php echo($_GET['gender']) ?>">  <?php echo($_GET['gender']) ?> </option> <?php endif ?>
                    <option value="Male"> Male </option>
                    <option value="Female"> Female </option>
                  </optgroup>
                </select>
          
            </div>
          </div>
    

          <div class="form-group">
            <div class="col-sm-10">
              <label class="pull-left">Birthday:</label>
                <input type="date" max="2005-12-31" min="1930-12-31" placeholder="Email Address" id="birthday" name="birthday" class="form-control" required="" <?php if (isset($_GET['birthday'])): ?> value = "<?php echo($_GET['birthday']) ?>"<?php endif ?>>
            </div>
          </div>


          <div class="form-group">
            <div class="col-sm-10">
              <label class="pull-left">Email Address:</label>
                <input type="email" placeholder="Email Address" id="emailaddress" name="emailaddress" class="form-control" <?php if (isset($_GET['emailaddress'])): ?> value = "<?php echo($_GET['emailaddress']) ?>"<?php endif ?>>
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-10">
              <label class="pull-left">Contact Number:</label>
                <input type="text" placeholder="Contact number" id="contactnumber" name="contactnumber" class="form-control"  <?php if (isset($_GET['contactnumber'])): ?> value = "<?php echo($_GET['contactnumber']) ?>"<?php endif ?>>
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-10">
              <label class="pull-left">Username:</label>
                <input type="text" placeholder="Username" id="username" name="username" class="form-control" required="" >
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-10">
              <label class="pull-left">Password:</label>
                <input type="password" placeholder="Password" id="password" name="password" class="form-control" required="">
            </div>
          </div>



          <div class="form-group">
            <div class=" col-sm-12">
                  <input type="text" hidden="" name="from" value="registration-teacher">
                  <button class="btn btn-large btn-primary pull-center" type="submit">Register</button>                 
            </div>
          </div>
          
       </form>

       </div>


    <?php endif ?>

    <?php if (isset($_GET['s']) and $_GET['s'] == 'student'): ?>
        <div class="registration">

        <div class="panel-heading border login_heading">Register as student</div> 

        <?php if (isset($_GET['status']) and $_GET['status'] == 'username-taken'): ?>
            <p class="pink_text">
            
              <span class="red_bg bg_space"><i class="fa fa-times"></i> Username is already taken</span>
            
            </p>
        <?php endif ?>

        <form role="form" class="form-horizontal" method="POST" action="controller.php" enctype="multipart/form-data">

          <div class="form-group">
            <div class="col-sm-10">
              <label class="pull-left">First Name:</label>
                <input type="text" placeholder="First Name" id="firstname" name="firstname" class="form-control" required="" <?php if (isset($_GET['firstname'])): ?> value = "<?php echo($_GET['firstname']) ?>"<?php endif ?>>
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-10">
              <label class="pull-left">Middle Initial:</label>
                <input type="text" placeholder="Middle Initial" id="middleinitial" name="middleinitial" class="form-control" required="" maxlength="4" <?php if (isset($_GET['middleinitial'])): ?> value = "<?php echo($_GET['middleinitial']) ?>"<?php endif ?>>
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-10">
              <label class="pull-left">Last Name:</label>
                <input type="text" placeholder="Last Name" id="lastname" name="lastname" class="form-control" required="" <?php if (isset($_GET['lastname'])): ?> value = "<?php echo($_GET['lastname']) ?>"<?php endif ?>>
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-10">
              <label class="pull-left">Gender:</label>
                <select class="form-control" id="gender" name="gender">
                  <optgroup label="Please Select Gender">
                    <?php if (isset($_GET['gender'])): ?> <option selected="" value="<?php echo($_GET['gender']) ?>">  <?php echo($_GET['gender']) ?> </option> <?php endif ?>
                    <option value="Male"> Male </option>
                    <option value="Female"> Female </option>
                  </optgroup>
                </select>
          
            </div>
          </div>
    

          <div class="form-group">
            <div class="col-sm-10">
              <label class="pull-left">Birthday:</label>
                <input type="date" max="2005-12-31" min="1930-12-31" placeholder="Email Address" id="birthday" name="birthday" class="form-control" required="" <?php if (isset($_GET['birthday'])): ?> value = "<?php echo($_GET['birthday']) ?>"<?php endif ?>>
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-10">
              <label class="pull-left">Address:</label>
                <input type="text" placeholder="Address" id="address" name="address" class="form-control" required="" <?php if (isset($_GET['address'])): ?> value = "<?php echo($_GET['address']) ?>"<?php endif ?>>
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-10">
              <label class="pull-left">Student ID Number:</label>
                <input type="text" placeholder="Student ID Number" id="studentidnumber" name="studentidnumber" class="form-control" required="" <?php if (isset($_GET['studentidnumber'])): ?> value = "<?php echo($_GET['studentidnumber']) ?>"<?php endif ?>>
            </div>
          </div>


          <div class="form-group">
            <div class="col-sm-10">
              <label class="pull-left">Email Address:</label>
                <input type="email" placeholder="Email Address" id="emailaddress" name="emailaddress" class="form-control"  <?php if (isset($_GET['emailaddress'])): ?> value = "<?php echo($_GET['emailaddress']) ?>"<?php endif ?>>
            </div>
          </div>


          <div class="form-group">
            <div class="col-sm-10">
              <label class="pull-left">Contact Number:</label>
                <input type="text" placeholder="Contact number" id="contactnumber" name="contactnumber" class="form-control"  <?php if (isset($_GET['contactnumber'])): ?> value = "<?php echo($_GET['contactnumber']) ?>"<?php endif ?>>
            </div>
          </div>

    
          <div class="form-group">
            <div class="col-sm-10">
              <label class="pull-left">Specialized Field of Arts:</label>
                <input type="text" placeholder="Specialized Field of Arts" id="specializedfieldofart" name="specializedfieldofart" class="form-control" required="" >
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-10">
              <label class="pull-left">Profile Picture:</label>
                <input type="file" placeholder="Upload Profile Picture" id="profilepicturelocation" name="profilepicturelocation" class="form-control">
            </div>
          </div>


          <div class="form-group">
            <div class="col-sm-10">
              <label class="pull-left">Username:</label>
                <input type="text" placeholder="Username" id="username" name="username" class="form-control" required="" >
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-10">
              <label class="pull-left">Password:</label>
                <input type="password" placeholder="Password" id="password" name="password" class="form-control" required="">
            </div>
          </div>



          <div class="form-group">
            <div class=" col-sm-12">
                  <input type="text" hidden="" name="from" value="registration-student">
                  <button class="btn btn-large btn-primary pull-center" type="submit">Register</button>                 
            </div>
          </div>
          
       </form>

       </div>

       <br>
       <br>
       <br>

    <?php endif ?>


    <?php if (isset($_GET['s']) and $_GET['s'] == 'viewer'): ?>
        <div class="registration">

        <div class="panel-heading border login_heading">Register as viewer</div> 

        <?php if (isset($_GET['status']) and $_GET['status'] == 'username-taken'): ?>
            <p class="pink_text">
            
              <span class="red_bg bg_space"><i class="fa fa-times"></i> Username is already taken</span>
            
            </p>
        <?php endif ?>

        <form role="form" class="form-horizontal" method="POST" action="controller.php">

          <div class="form-group">
            <div class="col-sm-10">
              <label class="pull-left">First Name:</label>
                <input type="text" placeholder="First Name" id="firstname" name="firstname" class="form-control" required="" <?php if (isset($_GET['firstname'])): ?> value = "<?php echo($_GET['firstname']) ?>"<?php endif ?>>
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-10">
              <label class="pull-left">Middle Initial:</label>
                <input type="text" placeholder="Middle Initial" id="middleinitial" name="middleinitial" class="form-control" required="" maxlength="4" <?php if (isset($_GET['middleinitial'])): ?> value = "<?php echo($_GET['middleinitial']) ?>"<?php endif ?>>
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-10">
              <label class="pull-left">Last Name:</label>
                <input type="text" placeholder="Last Name" id="lastname" name="lastname" class="form-control" required="" <?php if (isset($_GET['lastname'])): ?> value = "<?php echo($_GET['lastname']) ?>"<?php endif ?>>
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-10">
              <label class="pull-left">Gender:</label>
                <select class="form-control" id="gender" name="gender">
                  <optgroup label="Please Select Gender">
                    <?php if (isset($_GET['gender'])): ?> <option selected="" value="<?php echo($_GET['gender']) ?>">  <?php echo($_GET['gender']) ?> </option> <?php endif ?>
                    <option value="Male"> Male </option>
                    <option value="Female"> Female </option>
                  </optgroup>
                </select>
          
            </div>
          </div>
    

          <div class="form-group">
            <div class="col-sm-10">
              <label class="pull-left">Birthday:</label>
                <input type="date" max="2005-12-31" min="1930-12-31" placeholder="Email Address" id="birthday" name="birthday" class="form-control" required="" <?php if (isset($_GET['birthday'])): ?> value = "<?php echo($_GET['birthday']) ?>"<?php endif ?>>
            </div>
          </div>


          <div class="form-group">
            <div class="col-sm-10">
              <label class="pull-left">Email Address:</label>
                <input type="email" placeholder="Email Address" id="emailaddress" name="emailaddress" class="form-control" required="" <?php if (isset($_GET['emailaddress'])): ?> value = "<?php echo($_GET['emailaddress']) ?>"<?php endif ?>>
            </div>
          </div>

           <div class="form-group">
            <div class="col-sm-10">
              <label class="pull-left">Address:</label>
                <input type="text" placeholder="Address" id="address" name="address" class="form-control"  <?php if (isset($_GET['address'])): ?> value = "<?php echo($_GET['address']) ?>"<?php endif ?>>
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-10">
              <label class="pull-left">Contact Number:</label>
                <input type="text" placeholder="Contact number" id="contactnumber" name="contactnumber" class="form-control" <?php if (isset($_GET['contactnumber'])): ?> value = "<?php echo($_GET['contactnumber']) ?>"<?php endif ?>>
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-10">
              <label class="pull-left">Username:</label>
                <input type="text" placeholder="Username" id="username" name="username" class="form-control" required="" >
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-10">
              <label class="pull-left">Password:</label>
                <input type="password" placeholder="Password" id="password" name="password" class="form-control" required="">
            </div>
          </div>



          <div class="form-group">
            <div class=" col-sm-12">
                  <input type="text" hidden="" name="from" value="registration-viewer">
                  <button class="btn btn-large btn-primary pull-center" type="submit">Register</button>                 
            </div>
          </div>
          
       </form>

       </div>


    <?php endif ?>






</div>
  
  
  
  
  
  
  
  
</div>
<!--\\\\\\\ wrapper end\\\\\\-->




<script src="js/jquery-2.1.0.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/common-script.js"></script>
<script src="js/jquery.slimscroll.min.js"></script>
</body>
</html>
