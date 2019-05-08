<?php include('connection.php');
$_SESSION['current-page'] = 'profile';
 ?>
<?php include('header.php'); ?>
   <!--\\\\\\\left_nav end \\\\\\-->
    <div class="contentpanel">
      <!--\\\\\\\ contentpanel start\\\\\\-->
      <div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
          <h1>Profile</h1>
          <h2 class="">view profile</h2>
        </div>
        
      </div>
      

 <?php if (isset($_SESSION['studentid'])): ?>
        <div class="page-content">
    
    <?php $qry = mysqli_query($connection, "select * from student_table where studentid = '" . $_SESSION['studentid'] . "'");
    $res = mysqli_fetch_assoc($qry);
     ?>


    <div class="user-profile-content">


    <?php if (isset($_GET['w']) and $_GET['w'] == 'update'): ?>
      <div class="alert alert-success"> <strong>Profile is successfully updated!</div>
    <?php endif ?>
    <?php if (isset($_GET['status']) and $_GET['status'] == 'updatedpassword'): ?>
      <div class="alert alert-success"> <strong>Password is successfully updated!</div>
    <?php endif ?>


              <div class="profile_bg">
                <div class="user-profile-sidebar">
                  <div class="row">
                    <div class="col-md-12" style="text-align: center;"><img height="100px;" src="<?php echo $res['profilepicturelocation'] ?>"></div>
                    
                    <div class="col-md-12">
                      <div class="user-identity">
                        <h4 style="text-align: center;"><strong><?php echo $res['firstname'] . " " . $res['middleinitial'] . " " . $res['lastname']; ?></strong></h4>
                
                      </div>
                    </div>
                  </div>
                </div>
     
          
    
                </div>

      
       
                      <div class="row">
                        <div class="col-sm-6">
                       
                          <address>
                          <strong>First Name</strong><br>
                          <abbr><?php echo $res['firstname']; ?></abbr>
                          </address>

                          <address>
                          <strong>Middle Initial</strong><br>
                          <abbr><?php echo $res['middleinitial']; ?></abbr>
                          </address>

                          <address>
                          <strong>Last Name</strong><br>
                          <abbr><?php echo $res['lastname']; ?></abbr>
                          </address>

                          <address>
                          <strong>Address</strong><br>
                          <abbr><?php echo $res['address']; ?></abbr>
                          </address>
                          
                          <address>
                          <strong>Email Address</strong><br>
                          <abbr><?php echo $res['emailaddress']; ?></abbr>
                          </address>

                          <address>
                          <strong>Student ID Number</strong><br>
                          <abbr><?php echo $res['studentidnumber']; ?></abbr>
                          </address>


                        </div>
                        <div class="col-sm-6">


                          <address>
                          <strong>Contact Number</strong><br>
                          <abbr><?php echo $res['contactnumber']; ?></abbr>
                          </address>
                       
                          <address>
                          <strong>Gender</strong><br>
                          <abbr><?php echo $res['gender']; ?></abbr>
                          </address>

                          <address>
                          <strong>Birthday</strong><br>
                          <abbr><?php echo $res['birthday']; ?></abbr>
                          </address>

                          <address>
                          <strong>Specialized Field of Art</strong><br>
                          <abbr><?php echo $res['specializedfieldofart']; ?></abbr>
                          </address>

                          <address>
                          <strong>Username</strong><br>
                          <abbr><?php echo $res['username']; ?></abbr>
                          </address>

                          <address>
                            <form method="POST" action="controller.php" enctype="multipart/form-data">
                              <strong>Change Profile Picture</strong>
                              <input type="file" name="profilepicturelocation" required="">
                              <input type="text" name="studentid" value="<?php echo $res['studentid'] ?>" hidden="" >
                              <input type="text" name="from" value="edit-profile-picture-member" hidden="" >
                              <input type="submit" name="" class="btn btn-primary float-right">
                            </form>
                          </address>
                          
                 

                        </div>

                      </div>
                    </div>

          <br>
             <div class="row">
               <div class="col-lg-12">
                
                <a class="btn btn-primary" href="javascript:void(0);"  data-toggle="modal" data-target="#UpdateModal" data-toggle="modal" >Update</a>
              <a class="btn btn-warning" data-target="#ChangePassModal" data-toggle="modal">Change Password</a>
           
               </div>
             </div>
     
      </div>



      <!-- Edit Modal -->
<div class="modal fade" id="UpdateModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Edit Profile</h4>
      </div>
      <div class="modal-body">
      <form role="form" class="form-horizontal" method="POST" action="controller.php" enctype="multipart/form-data">

          <div class="form-group">
            <div class="col-sm-10">
              <label class="pull-left">First Name:</label>
                <input type="text" placeholder="First Name" id="firstname" name="firstname" class="form-control" value="<?php echo $res['firstname'] ?>" >
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-10">
              <label class="pull-left">Middle Initial:</label>
                <input type="text" placeholder="Middle Initial" id="middleinitial" name="middleinitial" class="form-control" required="" maxlength="4" value="<?php echo $res['middleinitial'] ?>">
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-10">
              <label class="pull-left">Last Name:</label>
                <input type="text" placeholder="Last Name" id="lastname" name="lastname" class="form-control" required="" value="<?php echo $res['lastname'] ?>">
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-10">
              <label class="pull-left">Gender:</label>
                <select class="form-control" id="gender" name="gender">
                  <optgroup label="Please Select Gender">
                   <option selected="" value="<?php echo $res['gender'] ?>"><?php echo $res['gender']; ?></option> 
                    <option value="Male"> Male </option>
                    <option value="Female"> Female </option>
                  </optgroup>
                </select>
          
            </div>
          </div>
    

          <div class="form-group">
            <div class="col-sm-10">
              <label class="pull-left">Birthday:</label>
                <input type="date" max="2005-12-31" min="1930-12-31" id="birthday" name="birthday" class="form-control" required="" value="<?php echo $res['birthday'] ?>">
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-10">
              <label class="pull-left">Address:</label>
                <input type="text" placeholder="Address" id="address" name="address" class="form-control" required="" value="<?php echo $res['address'] ?>">
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-10">
              <label class="pull-left">Student ID Number:</label>
                <input type="text" placeholder="Student ID Number" id="studentidnumber" name="studentidnumber" class="form-control" required="" value="<?php echo $res['studentidnumber'] ?>">
            </div>
          </div>


          <div class="form-group">
            <div class="col-sm-10">
              <label class="pull-left">Email Address:</label>
                <input type="email" placeholder="Email Address" id="emailaddress" name="emailaddress" class="form-control" required="" value="<?php echo $res['emailaddress'] ?>">
            </div>
          </div>


          <div class="form-group">
            <div class="col-sm-10">
              <label class="pull-left">Contact Number:</label>
                <input type="text" placeholder="Contact number" id="contactnumber" name="contactnumber" class="form-control" required="" value="<?php echo $res['contactnumber'] ?>">
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-10">
              <label class="pull-left">Specialized Field of Arts:</label>
                <select class="form-control" id="specializedfieldofart" name="specializedfieldofart">
                  <optgroup label="Please Select Field of Specialization">
                    <?php if (isset($_GET['specializedfieldofart'])): ?> <option selected="" value="<?php echo($_GET['specializedfieldofart']) ?>">  <?php echo($_GET['specializedfieldofart']) ?> </option> <?php endif ?>
                    <option value="Architectural Drafting and Design"> Architectural Drafting and Design </option>
                    <option value="CAD Drafting and Design Technology"> CAD Drafting and Design Technology </option>
                    <option value="Mechanical Drafting and Design"> Mechanical Drafting and Design </option>
                  </optgroup>
                </select>
          
            </div>
          </div>

         <!--  <div class="form-group">
            <div class="col-sm-10">
              <label class="pull-left">Profile Picture:</label>
                <input type="file" placeholder="Upload Profile Picture" id="profilepicturelocation" name="profilepicturelocation" class="form-control">
            </div>
          </div>
 -->


     
          
       
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="text" name="studentid" value="<?php echo $res['studentid'] ?>" hidden="" >
        <input type="text" name="from" value="edit-member-profile-1" hidden="" >
        <button type="submit" class="btn btn-primary">Save changes</button>
      </form>
      </div>
    </div>
  </div>
</div>



      <!-- Change Password Modal -->
<div class="modal fade" id="ChangePassModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Change Password</h4>
      </div>
      <div class="modal-body">
      <form role="form" class="form-horizontal" method="POST" action="controller.php" enctype="multipart/form-data">

          <div class="form-group">
            <div class="col-sm-10">
              <label class="pull-left">New Password:</label>
                <input type="password" id="password" name="password" class="form-control"  >
            </div>
          </div>

   
 
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="text" name="studentid" value="<?php echo $res['studentid'] ?>" hidden="" >
        <input type="text" name="from" value="edit-password-member-profile" hidden="" >
        <button type="submit" class="btn btn-primary">Save changes</button>
      </form>
      </div>
    </div>
  </div>
</div>
 <?php endif ?>


<?php if (isset($_SESSION['adminid'])): ?>
        <div class="page-content">
    
    <?php $qry = mysqli_query($connection, "select * from admin_table where adminid = '" . $_SESSION['adminid'] . "'");
    $res = mysqli_fetch_assoc($qry);
     ?>


    <div class="user-profile-content">


    <?php if (isset($_GET['w']) and $_GET['w'] == 'update'): ?>
      <div class="alert alert-success"> <strong>Profile is successfully updated!</div>
    <?php endif ?>
    <?php if (isset($_GET['status']) and $_GET['status'] == 'updatedpassword'): ?>
      <div class="alert alert-success"> <strong>Password is successfully updated!</div>
    <?php endif ?>


              <div class="profile_bg">
                <div class="user-profile-sidebar">
                  <div class="row">
                    <div class="col-md-12" style="text-align: center;"><img height="100px;" src="images/profile.png"></div>
                    <div class="col-md-12">
                      <div class="user-identity">
                        <h4 style="text-align: center;"><strong><?php echo $res['firstname'] . " " . $res['middleinitial'] . " " . $res['lastname']; ?></strong></h4>
                
                      </div>
                    </div>
                  </div>
                </div>
     
          
    
                </div>

      
       
                      <div class="row">
                        <div class="col-sm-6">
                       
                          <address>
                          <strong>First Name</strong><br>
                          <abbr><?php echo $res['firstname']; ?></abbr>
                          </address>

                          <address>
                          <strong>Middle Initial</strong><br>
                          <abbr><?php echo $res['middleinitial']; ?></abbr>
                          </address>

                          <address>
                          <strong>Last Name</strong><br>
                          <abbr><?php echo $res['lastname']; ?></abbr>
                          </address>

                      


                        </div>
                        <div class="col-sm-6">



                          <address>
                          <strong>Username</strong><br>
                          <abbr><?php echo $res['username']; ?></abbr>
                          </address>
                          
                 

                        </div>

                      </div>
                    </div>

          <br>
             <div class="row">
               <div class="col-lg-12">
                
                <a class="btn btn-primary" href="javascript:void(0);"  data-toggle="modal" data-target="#UpdateModal" data-toggle="modal" >Update</a>
              <a class="btn btn-warning" data-target="#ChangePassModal" data-toggle="modal">Change Password</a>
           
               </div>
             </div>
     
      </div>



      <!-- Edit Modal -->
<div class="modal fade" id="UpdateModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Edit Profile</h4>
      </div>
      <div class="modal-body">
      <form role="form" class="form-horizontal" method="POST" action="controller.php" enctype="multipart/form-data">

          <div class="form-group">
            <div class="col-sm-10">
              <label class="pull-left">First Name:</label>
                <input type="text" placeholder="First Name" id="firstname" name="firstname" class="form-control" value="<?php echo $res['firstname'] ?>" >
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-10">
              <label class="pull-left">Middle Initial:</label>
                <input type="text" placeholder="Middle Initial" id="middleinitial" name="middleinitial" class="form-control" required="" maxlength="4" value="<?php echo $res['middleinitial'] ?>">
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-10">
              <label class="pull-left">Last Name:</label>
                <input type="text" placeholder="Last Name" id="lastname" name="lastname" class="form-control" required="" value="<?php echo $res['lastname'] ?>">
            </div>
          </div>

         

     
          
       
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="text" name="adminid" value="<?php echo $res['adminid'] ?>" hidden="" >
        <input type="text" name="from" value="edit-admin-profile-1" hidden="" >
        <button type="submit" class="btn btn-primary">Save changes</button>
      </form>
      </div>
    </div>
  </div>
</div>



      <!-- Change Password Modal -->
<div class="modal fade" id="ChangePassModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Change Password</h4>
      </div>
      <div class="modal-body">
      <form role="form" class="form-horizontal" method="POST" action="controller.php" enctype="multipart/form-data">

          <div class="form-group">
            <div class="col-sm-10">
              <label class="pull-left">New Password:</label>
                <input type="password"  id="password" name="password" class="form-control"  >
            </div>
          </div>

   
 
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="text" name="adminid" value="<?php echo $res['adminid'] ?>" hidden="" >
        <input type="text" name="from" value="edit-password-admin-profile" hidden="" >
        <button type="submit" class="btn btn-primary">Save changes</button>
      </form>
      </div>
    </div>
  </div>
</div>
 <?php endif ?>

 <?php if (isset($_SESSION['viewerid'])): ?>
        <div class="page-content">
    
    <?php $qry = mysqli_query($connection, "select * from viewer_table where viewerid = '" . $_SESSION['viewerid'] . "'");
    $res = mysqli_fetch_assoc($qry);
     ?>


    <div class="user-profile-content">


    <?php if (isset($_GET['w']) and $_GET['w'] == 'update'): ?>
      <div class="alert alert-success"> <strong>Profile is successfully updated!</div>
    <?php endif ?>
    <?php if (isset($_GET['status']) and $_GET['status'] == 'updatedpassword'): ?>
      <div class="alert alert-success"> <strong>Password is successfully updated!</div>
    <?php endif ?>


              <div class="profile_bg">
                <div class="user-profile-sidebar">
                  <div class="row">
                    <div class="col-md-12" style="text-align: center;"><img height="100px;" src="images/profile.png"></div>
                    <div class="col-md-12">
                      <div class="user-identity">
                        <h4 style="text-align: center;"><strong><?php echo $res['firstname'] . " " . $res['middleinitial'] . " " . $res['lastname']; ?></strong></h4>
                
                      </div>
                    </div>
                  </div>
                </div>
     
          
    
                </div>

      
       
                       <div class="row">
                        <div class="col-sm-6">
                       
                          <address>
                          <strong>First Name</strong><br>
                          <abbr><?php echo $res['firstname']; ?></abbr>
                          </address>

                          <address>
                          <strong>Middle Initial</strong><br>
                          <abbr><?php echo $res['middleinitial']; ?></abbr>
                          </address>

                          <address>
                          <strong>Last Name</strong><br>
                          <abbr><?php echo $res['lastname']; ?></abbr>
                          </address>

                          <address>
                          <strong>Address</strong><br>
                          <abbr><?php echo $res['address']; ?></abbr>
                          </address>
                          
                          <address>
                          <strong>Email Address</strong><br>
                          <abbr><?php echo $res['emailaddress']; ?></abbr>
                          </address>


                        </div>
                        <div class="col-sm-6">


                          <address>
                          <strong>Contact Number</strong><br>
                          <abbr><?php echo $res['contactnumber']; ?></abbr>
                          </address>
                       
                          <address>
                          <strong>Gender</strong><br>
                          <abbr><?php echo $res['gender']; ?></abbr>
                          </address>

                          <address>
                          <strong>Birthday</strong><br>
                          <abbr><?php echo $res['birthday']; ?></abbr>
                          </address>

                       

                          <address>
                          <strong>Username</strong><br>
                          <abbr><?php echo $res['username']; ?></abbr>
                          </address>
                          
                 

                        </div>

                      </div>
                    </div>

          <br>
             <div class="row">
               <div class="col-lg-12">
                
                <a class="btn btn-primary" href="javascript:void(0);"  data-toggle="modal" data-target="#UpdateModal" data-toggle="modal" >Update</a>
              <a class="btn btn-warning" data-target="#ChangePassModal" data-toggle="modal">Change Password</a>
           
               </div>
             </div>
     
      </div>



  <!-- Edit Modal -->
<div class="modal fade" id="UpdateModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Edit Profile</h4>
      </div>
      <div class="modal-body">
      <form role="form" class="form-horizontal" method="POST" action="controller.php" enctype="multipart/form-data">

          <div class="form-group">
            <div class="col-sm-10">
              <label class="pull-left">First Name:</label>
                <input type="text" placeholder="First Name" id="firstname" name="firstname" class="form-control" value="<?php echo $res['firstname'] ?>" >
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-10">
              <label class="pull-left">Middle Initial:</label>
                <input type="text" placeholder="Middle Initial" id="middleinitial" name="middleinitial" class="form-control" required="" maxlength="4" value="<?php echo $res['middleinitial'] ?>">
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-10">
              <label class="pull-left">Last Name:</label>
                <input type="text" placeholder="Last Name" id="lastname" name="lastname" class="form-control" required="" value="<?php echo $res['lastname'] ?>">
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-10">
              <label class="pull-left">Gender:</label>
                <select class="form-control" id="gender" name="gender">
                  <optgroup label="Please Select Gender">
                   <option selected="" value="<?php echo $res['gender'] ?>"><?php echo $res['gender']; ?></option> 
                    <option value="Male"> Male </option>
                    <option value="Female"> Female </option>
                  </optgroup>
                </select>
          
            </div>
          </div>
    

          <div class="form-group">
            <div class="col-sm-10">
              <label class="pull-left">Birthday:</label>
                <input type="date" max="2005-12-31" min="1930-12-31" id="birthday" name="birthday" class="form-control" required="" value="<?php echo $res['birthday'] ?>">
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-10">
              <label class="pull-left">Address:</label>
                <input type="text" placeholder="Address" id="address" name="address" class="form-control" required="" value="<?php echo $res['address'] ?>">
            </div>
          </div>

    


          <div class="form-group">
            <div class="col-sm-10">
              <label class="pull-left">Email Address:</label>
                <input type="email" placeholder="Email Address" id="emailaddress" name="emailaddress" class="form-control" required="" value="<?php echo $res['emailaddress'] ?>">
            </div>
          </div>


          <div class="form-group">
            <div class="col-sm-10">
              <label class="pull-left">Contact Number:</label>
                <input type="text" placeholder="Contact number" id="contactnumber" name="contactnumber" class="form-control" required="" value="<?php echo $res['contactnumber'] ?>">
            </div>
          </div>




     
          
       
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="text" name="viewerid" value="<?php echo $res['viewerid'] ?>" hidden="" >
        <input type="text" name="from" value="edit-viewer-profile-1" hidden="" >
        <button type="submit" class="btn btn-primary">Save changes</button>
      </form>
      </div>
    </div>
  </div>
</div>



      <!-- Change Password Modal -->
<div class="modal fade" id="ChangePassModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Change Password</h4>
      </div>
      <div class="modal-body">
      <form role="form" class="form-horizontal" method="POST" action="controller.php" enctype="multipart/form-data">

          <div class="form-group">
            <div class="col-sm-10">
              <label class="pull-left">New Password:</label>
                <input type="password"  id="password" name="password" class="form-control"  >
            </div>
          </div>

   
 
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="text" name="viewerid" value="<?php echo $res['viewerid'] ?>" hidden="" >
        <input type="text" name="from" value="edit-password-viewer-profile" hidden="" >
        <button type="submit" class="btn btn-primary">Save changes</button>
      </form>
      </div>
    </div>
  </div>
</div>
 <?php endif ?>


 <?php if (isset($_SESSION['teacherid'])): ?>
        <div class="page-content">
    
    <?php $qry = mysqli_query($connection, "select * from teacher_table where teacherid = '" . $_SESSION['teacherid'] . "'");
    $res = mysqli_fetch_assoc($qry);
     ?>


    <div class="user-profile-content">


    <?php if (isset($_GET['w']) and $_GET['w'] == 'update'): ?>
      <div class="alert alert-success"> <strong>Profile is successfully updated!</div>
    <?php endif ?>
    <?php if (isset($_GET['status']) and $_GET['status'] == 'updatedpassword'): ?>
      <div class="alert alert-success"> <strong>Password is successfully updated!</div>
    <?php endif ?>


              <div class="profile_bg">
                <div class="user-profile-sidebar">
                  <div class="row">
                    <div class="col-md-12" style="text-align: center;"><img height="100px;" src="images/profile.png"></div>
                    <div class="col-md-12">
                      <div class="user-identity">
                        <h4 style="text-align: center;"><strong><?php echo $res['firstname'] . " " . $res['middleinitial'] . " " . $res['lastname']; ?></strong></h4>
                
                      </div>
                    </div>
                  </div>
                </div>
     
          
    
                </div>

      
       
                       <div class="row">
                        <div class="col-sm-6">
                       
                          <address>
                          <strong>First Name</strong><br>
                          <abbr><?php echo $res['firstname']; ?></abbr>
                          </address>

                          <address>
                          <strong>Middle Initial</strong><br>
                          <abbr><?php echo $res['middleinitial']; ?></abbr>
                          </address>

                          <address>
                          <strong>Last Name</strong><br>
                          <abbr><?php echo $res['lastname']; ?></abbr>
                          </address>

                
                          
                          <address>
                          <strong>Email Address</strong><br>
                          <abbr><?php echo $res['emailaddress']; ?></abbr>
                          </address>


                        </div>
                        <div class="col-sm-6">


                          <address>
                          <strong>Contact Number</strong><br>
                          <abbr><?php echo $res['contactnumber']; ?></abbr>
                          </address>
                       
                          <address>
                          <strong>Gender</strong><br>
                          <abbr><?php echo $res['gender']; ?></abbr>
                          </address>

                          <address>
                          <strong>Birthday</strong><br>
                          <abbr><?php echo $res['birthday']; ?></abbr>
                          </address>

                       

                          <address>
                          <strong>Username</strong><br>
                          <abbr><?php echo $res['username']; ?></abbr>
                          </address>
                          
                 

                        </div>

                      </div>
                    </div>

          <br>
             <div class="row">
               <div class="col-lg-12">
                
                <a class="btn btn-primary" href="javascript:void(0);"  data-toggle="modal" data-target="#UpdateModal" data-toggle="modal" >Update</a>
              <a class="btn btn-warning" data-target="#ChangePassModal" data-toggle="modal">Change Password</a>
           
               </div>
             </div>
     
      </div>



  <!-- Edit Modal -->
<div class="modal fade" id="UpdateModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Edit Profile</h4>
      </div>
      <div class="modal-body">
      <form role="form" class="form-horizontal" method="POST" action="controller.php" enctype="multipart/form-data">

          <div class="form-group">
            <div class="col-sm-10">
              <label class="pull-left">First Name:</label>
                <input type="text" placeholder="First Name" id="firstname" name="firstname" class="form-control" value="<?php echo $res['firstname'] ?>" >
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-10">
              <label class="pull-left">Middle Initial:</label>
                <input type="text" placeholder="Middle Initial" id="middleinitial" name="middleinitial" class="form-control" required="" maxlength="4" value="<?php echo $res['middleinitial'] ?>">
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-10">
              <label class="pull-left">Last Name:</label>
                <input type="text" placeholder="Last Name" id="lastname" name="lastname" class="form-control" required="" value="<?php echo $res['lastname'] ?>">
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-10">
              <label class="pull-left">Gender:</label>
                <select class="form-control" id="gender" name="gender">
                  <optgroup label="Please Select Gender">
                   <option selected="" value="<?php echo $res['gender'] ?>"><?php echo $res['gender']; ?></option> 
                    <option value="Male"> Male </option>
                    <option value="Female"> Female </option>
                  </optgroup>
                </select>
          
            </div>
          </div>
    

          <div class="form-group">
            <div class="col-sm-10">
              <label class="pull-left">Birthday:</label>
                <input type="date" max="2005-12-31" min="1930-12-31" id="birthday" name="birthday" class="form-control" required="" value="<?php echo $res['birthday'] ?>">
            </div>
          </div>

 


          <div class="form-group">
            <div class="col-sm-10">
              <label class="pull-left">Email Address:</label>
                <input type="email" placeholder="Email Address" id="emailaddress" name="emailaddress" class="form-control" required="" value="<?php echo $res['emailaddress'] ?>">
            </div>
          </div>


          <div class="form-group">
            <div class="col-sm-10">
              <label class="pull-left">Contact Number:</label>
                <input type="text" placeholder="Contact number" id="contactnumber" name="contactnumber" class="form-control" required="" value="<?php echo $res['contactnumber'] ?>">
            </div>
          </div>




     
          
       
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="text" name="teacherid" value="<?php echo $res['teacherid'] ?>" hidden="" >
        <input type="text" name="from" value="edit-teacher-profile-1" hidden="" >
        <button type="submit" class="btn btn-primary">Save changes</button>
      </form>
      </div>
    </div>
  </div>
</div>



      <!-- Change Password Modal -->
<div class="modal fade" id="ChangePassModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Change Password</h4>
      </div>
      <div class="modal-body">
      <form role="form" class="form-horizontal" method="POST" action="controller.php" enctype="multipart/form-data">

          <div class="form-group">
            <div class="col-sm-10">
              <label class="pull-left">New Password:</label>
                <input type="password"  id="password" name="password" class="form-control"  >
            </div>
          </div>

   
 
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="text" name="teacherid" value="<?php echo $res['teacherid'] ?>" hidden="" >
        <input type="text" name="from" value="edit-password-teacher-profile" hidden="" >
        <button type="submit" class="btn btn-primary">Save changes</button>
      </form>
      </div>
    </div>
  </div>
</div>
 <?php endif ?>


<?php include('footer.php');  ?>
