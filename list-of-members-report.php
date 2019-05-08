<?php include('connection.php');
$_SESSION['current-page'] = 'reports';
 ?>
<?php include('header.php'); ?>
   <!--\\\\\\\left_nav end \\\\\\-->
    <div class="contentpanel">
      <!--\\\\\\\ contentpanel start\\\\\\-->
      <div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
          <h1>REPORTS</h1>
          <h2 class="">List of Students</h2>
        </div>
        
      </div>
      <div class="container clear_both padding_fix">
        <!--\\\\\\\ container  start \\\\\\-->

   <div id="main-content">
    <div class="page-content">
      
      
       
      <div class="row">
        <div class="col-md-12">
          <div class="block-web">
           <div class="header">
              <br>
              <h3 class="content-header">List of Organization Members</h3>
  
              <br>
              <?php if (isset($_GET['member']) and isset($_GET['w']) and $_GET['w'] == 'added'): ?>
                <div class="alert alert-success"> <strong><?php echo $_GET['member']; ?></strong> is successfully added!</div>
              <?php endif ?>
              <?php if (isset($_GET['member']) and isset($_GET['w']) and $_GET['w'] == 'deleted'): ?>
                <div class="alert alert-danger"> <strong><?php echo $_GET['member']; ?></strong> is successfully deleted!</div>
              <?php endif ?>
              <?php if (isset($_GET['member']) and isset($_GET['w']) and $_GET['w'] == 'update'): ?>
                <div class="alert alert-success"> <strong><?php echo $_GET['member']; ?></strong> is successfully updated!</div>
              <?php endif ?>

            </div>
         <div class="porlets-content">
            <div class="table-responsive">
                <table  class="display table table-bordered table-striped" id="dynamic-table">
                  <thead>
                    <tr>
                      <th>Student ID Number</th>
                      <th>Profile Picture</th>
                      <th>Full Name</th>
                      <th>Address</th>
                      <th>Email Address</th>
                      <th>Contact Number</th>
                      <th>Gender</th>
                      <th>Birthday</th>
                      <th>Specialized Fields of Arts</th>
                      <th>Username</th>
      
                    </tr>
                  </thead>
                  <tbody>
                    <?php 

                    $qry = mysqli_query($connection, "select * from student_table");
                    while ($res = mysqli_fetch_assoc($qry)) { ?>
                      <tr>
                      <td><?php echo $res['studentidnumber']; ?></td>
                      <td><img src="<?php echo $res['profilepicturelocation']; ?>" width = "50px" height = "50px"></td>
                      <td><?php echo $res['firstname'] . " " . $res['middleinitial'] . " " . $res['lastname'] ; ?></td>
                      <td><?php echo $res['address']; ?></td>
                      <td><?php echo $res['emailaddress']; ?></td>
                      <td><?php echo $res['contactnumber']; ?></td>
                      <td><?php echo $res['gender']; ?></td>
                      <td><?php echo $res['birthday']; ?></td>
                      <td><?php echo $res['specializedfieldofart']; ?></td>
                      <td><?php echo $res['username']; ?></td>

                    <?php } ?>
                  
                  </tbody>
        
                </table>
              </div><!--/table-responsive-->
            </div><!--/porlets-content-->
            
            
          </div><!--/block-web--> 
        </div><!--/col-md-12--> 
      </div><!--/row-->

 
      
           
        </div><!--/page-content end--> 
  </div>


 



<?php include('footer.php');  ?>
