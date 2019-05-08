<?php include('connection.php');
$_SESSION['current-page'] = 'teachers';
 ?>
<?php include('header.php'); ?>
   <!--\\\\\\\left_nav end \\\\\\-->
    <div class="contentpanel">
      <!--\\\\\\\ contentpanel start\\\\\\-->
      <div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
          <h1>TEACHERS</h1>
          <h2 class="">List of Teachers</h2>
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
              <h3 class="content-header">List of Teachers</h3>
              <br>
          

              <?php if (isset($_GET['teacher']) and isset($_GET['w']) and $_GET['w'] == 'added'): ?>
                <div class="alert alert-success"> <strong><?php echo $_GET['teacher']; ?></strong> is successfully added!</div>
              <?php endif ?>
              <?php if (isset($_GET['teacher']) and isset($_GET['w']) and $_GET['w'] == 'delete'): ?>
                <div class="alert alert-danger"> <strong><?php echo $_GET['teacher']; ?></strong> is successfully deleted!</div>
              <?php endif ?>
              <?php if (isset($_GET['teacher']) and isset($_GET['w']) and $_GET['w'] == 'update'): ?>
                <div class="alert alert-success"> <strong><?php echo $_GET['teacher']; ?></strong> is successfully updated!</div>
              <?php endif ?>

            </div>
         <div class="porlets-content">
            <div class="table-responsive">
                <table  class="display table table-bordered table-striped" id="dynamic-table">
                  <thead>
                    <tr>
                      <th>Full Name</th>
                      <th>Email Address</th>
                      <th>Contact Number</th>
                      <th>Gender</th>
                      <th>Birthday</th>
                      <th>Username</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 

                    $qry = mysqli_query($connection, "select * from teacher_table");
                    while ($res = mysqli_fetch_assoc($qry)) { ?>
                      <tr>
                      <td><?php echo $res['firstname'] . " " . $res['middleinitial'] . " " . $res['lastname'] ; ?></td>
                      <td><?php echo $res['emailaddress']; ?></td>
                      <td><?php echo $res['contactnumber']; ?></td>
                      <td><?php echo $res['gender']; ?></td>
                      <td><?php echo $res['birthday']; ?></td>
                      <td><?php echo $res['username']; ?></td>

                      <td><a href="javascript:void(0);"  data-toggle="modal" data-target="#EditModal<?php echo $res['teacherid']; ?>">Edit</a> | <a href="javascript:void(0);"  data-toggle="modal" data-target="#DeleteModal<?php echo $res['teacherid']; ?>">Delete</a></td>
                    </tr>
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


  <?php 

  $qry = mysqli_query($connection, "select * from teacher_table");
  while ($res = mysqli_fetch_assoc($qry)) { ?>
 <!-- Delete Modal -->
<div class="modal fade" id="DeleteModal<?php echo $res['teacherid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Are you sure to delete <strong><?php echo $res['firstname'] . " " . $res['middleinitial'] . " " . $res['lastname']; ?></strong> profile?</h4>
      </div>
      <div class="modal-body">
      <div style="text-align: center;"><a href="controller.php?from=delete-teacher-profile&teacherid=<?php echo $res['teacherid'] ?>&teacher=<?php echo $res['firstname'] . " " . $res['middleinitial'] . " " . $res['lastname']; ?>" class="btn btn-primary btn-lg">Yes</a>
      <a href="#" class="btn btn-danger btn-lg" data-dismiss="modal">No</a></div>
      
      </div>
      <div class="modal-footer">
      
   
      </div>
    </div>
  </div>
</div>



<!-- Edit Modal -->
<div class="modal fade" id="EditModal<?php echo $res['teacherid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Edit <strong><?php echo $res['firstname'] . " " . $result['middleinitial'] . " " . $result['lastname']; ?></strong> profile</h4>
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
                <input type="text" placeholder="Middle Initial" id="middleinitial" name="middleinitial" class="form-control" required="" maxlength="1" value="<?php echo $res['middleinitial'] ?>">
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
        <input type="text" name="from" value="edit-teacher-profile" hidden="" >
        <button type="submit" class="btn btn-primary">Save changes</button>
      </form>
      </div>
    </div>
  </div>
</div>
  <?php } ?>



<?php include('footer.php');  ?>
