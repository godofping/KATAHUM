<?php include('connection.php');
$_SESSION['current-page'] = 'elections';
 ?>
<?php include('header.php'); ?>
   <!--\\\\\\\left_nav end \\\\\\-->
    <div class="contentpanel">
      <!--\\\\\\\ contentpanel start\\\\\\-->
      <div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
          <h1>ELECTION</h1>
          <h2 class="">List of Aspiring Members</h2>
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
              <h3 class="content-header">List of Aspiring Officers </h3>
              <br>
              <h5><a href="javascript:void(0);" class="add_user" data-toggle="modal" data-target="#myModal"> <i class="fa fa-plus-square"></i> <span> New Candidate</span> </a></h5>
              <br>
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
                      <th>Party</th>
                      <th>Position</th>
                      <th>Profile Picture</th>
                      <th>Full Name</th>
                      <th>Actions</th>

                    
                    </tr>
                  </thead>
                  <tbody>
                    <?php 

                    $qry = mysqli_query($connection, "select * from candidate_view order by positionid");
                    while ($res = mysqli_fetch_assoc($qry)) { ?>
                      <tr>
                      <td><?php echo $res['partyname']; ?></td>
                      <td><?php echo $res['positionname']; ?></td>
                      <td><img src="<?php echo $res['profilepicturelocation']; ?>" width = "50px" height = "50px"></td>
                      <td><?php echo $res['firstname'] . " " . $res['middleinitial'] . " " . $res['lastname']; ?></td>
                      <td><a href="javascript:void(0);"  data-toggle="modal" data-target="#EditModal<?php echo $res['candidateid']; ?>">Edit</a> | <a href="javascript:void(0);"  data-toggle="modal" data-target="#DeleteModal<?php echo $res['candidateid']; ?>">Delete</a></td>
      
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


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Add New Candidate</h4>
      </div>
      <div class="modal-body">
      <form action="controller.php" method="POST" class="form-horizontal row-border" enctype="multipart/form-data">
        <div class="form-group">
          <label class="col-sm-3 control-label">First Name</label>
          <div class="col-sm-9">
              <input type="text" name="firstname" id="firstname" class="form-control" required="">
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label">Middle Initial</label>
          <div class="col-sm-9">
              <input type="text" name="middleinitial" id="middleinitial" class="form-control" required="" maxlength="1">
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label">Last Name</label>
          <div class="col-sm-9">
              <input type="text" name="lastname" id="lastname" class="form-control" required="">
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label">Party</label>
            <div class="col-sm-9">
                <select class="form-control" id="partyid" name="partyid" required="">
                  <optgroup label="Please Select Party">
                  <?php $qry1 = mysqli_query($connection, "select * from party_table");
                  while ($res1 = mysqli_fetch_assoc($qry1)) { ?>
                     <option value="<?php echo $res1['partyid'] ?>"> <?php echo $res1['partyname']; ?> </option>
                  <?php } ?>
                  </optgroup>
                </select>
          
            </div>
          </div>

          <div class="form-group">
          <label class="col-sm-3 control-label">Position</label>
            <div class="col-sm-9">
                <select class="form-control" id="positionid" name="positionid" required="">
                  <optgroup label="Please Select Position">
                  <?php $qry1 = mysqli_query($connection, "select * from position_table");
                  while ($res1 = mysqli_fetch_assoc($qry1)) { ?>
                     <option value="<?php echo $res1['positionid'] ?>"> <?php echo $res1['positionname']; ?> </option>
                  <?php } ?>
                  </optgroup>
                </select>
          
            </div>
          </div>

        <div class="form-group">
          <label class="col-sm-3 control-label">Profile Picture</label>
            <div class="col-sm-9">
                <input type="file" placeholder="Upload Profile Picture" id="profilepicturelocation" name="profilepicturelocation" class="form-control">
            </div>
          </div>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="text" name="from" value="add-candidate" hidden="" >
        <button type="submit" class="btn btn-primary">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>



 <?php 

$qry = mysqli_query($connection, "select * from candidate_view order by positionid");
while ($res = mysqli_fetch_assoc($qry)) { ?>
 <!-- Delete Modal -->
<div class="modal fade" id="DeleteModal<?php echo $res['candidateid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Are you sure to delete <strong><?php echo $res['firstname'] . " " . $res['middleinitial'] . " " . $res['lastname']; ?></strong> profile?</h4>
      </div>
      <div class="modal-body">
      <div style="text-align: center;"><a href="controller.php?from=delete-candidate&candidateid=<?php echo $res['candidateid'] ?>&member=<?php echo $res['firstname'] . " " . $res['middleinitial'] . " " . $res['lastname']; ?>" class="btn btn-primary btn-lg">Yes</a>
      <a href="#" class="btn btn-danger btn-lg" data-dismiss="modal">No</a></div>
      
      </div>
      <div class="modal-footer">
      
   
      </div>
    </div>
  </div>
</div>



<!-- Edit Modal -->
<div class="modal fade" id="EditModal<?php echo $res['candidateid'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Edit <?php echo $res['firstname'] . " " . $res['middleinitial'] . " " . $res['lastname']; ?> profile.</h4>
      </div>
      <div class="modal-body">
      <form action="controller.php" method="POST" class="form-horizontal row-border" enctype="multipart/form-data">
        <div class="form-group">
          <label class="col-sm-3 control-label">First Name</label>
          <div class="col-sm-9">
              <input type="text" name="firstname" id="firstname" class="form-control" required="" value="<?php echo $res['firstname'] ?>">
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label">Middle Initial</label>
          <div class="col-sm-9">
              <input type="text" name="middleinitial" id="middleinitial" class="form-control" required="" value="<?php echo $res['middleinitial'] ?>" maxlength = "1">
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label">Last Name</label>
          <div class="col-sm-9">
              <input type="text" name="lastname" id="lastname" class="form-control" required="" value="<?php echo $res['lastname'] ?>">
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label">Party</label>
            <div class="col-sm-9">
                <select class="form-control" id="partyid" name="partyid" required="">
                  <optgroup label="Please Select Party">
                    <option selected="" value="<?php echo $res['partyid'] ?>"><?php echo $res['partyname'] ?></option>
                  <?php $qry1 = mysqli_query($connection, "select * from party_table");
                  while ($res1 = mysqli_fetch_assoc($qry1)) { ?>
                     <option value="<?php echo $res1['partyid'] ?>"> <?php echo $res1['partyname']; ?> </option>
                  <?php } ?>
                  </optgroup>
                </select>
          
            </div>
          </div>

          <div class="form-group">
          <label class="col-sm-3 control-label">Position</label>
            <div class="col-sm-9">
                <select class="form-control" id="positionid" name="positionid" required="">
                  <optgroup label="Please Select Position">
                    <option selected="" value="<?php echo $res['positionid'] ?>"><?php echo $res['positionname'] ?></option>
                  <?php $qry1 = mysqli_query($connection, "select * from position_table");
                  while ($res1 = mysqli_fetch_assoc($qry1)) { ?>
                     <option value="<?php echo $res1['positionid'] ?>"> <?php echo $res1['positionname']; ?> </option>
                  <?php } ?>
                  </optgroup>
                </select>
          
            </div>
          </div>

        <div class="form-group">
          <label class="col-sm-3 control-label">Profile Picture</label>
            <div class="col-sm-9">
                <input type="file" placeholder="Upload Profile Picture" id="profilepicturelocation" name="profilepicturelocation" class="form-control">
            </div>
          </div>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="text" name="candidateid" value="<?php echo $res['candidateid'] ?>" hidden = "">
        <input type="text" name="from" value="update-candidate" hidden="" >
        <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>


<?php } ?>


<?php include('footer.php');  ?>
