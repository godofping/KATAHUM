<?php include('connection.php');
$_SESSION['current-page'] = 'updates';
 ?>
<?php include('header.php'); ?>
   <!--\\\\\\\left_nav end \\\\\\-->
    <div class="contentpanel">
      <!--\\\\\\\ contentpanel start\\\\\\-->
      <div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
          <h1>UPDATES</h1>
          <h2 class="">List of Events</h2>
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
              <h3 class="content-header">List of Events </h3>
              <br>
              <h5><a href="javascript:void(0);" class="add_user" data-toggle="modal" data-target="#myModal"> <i class="fa fa-plus-square"></i> <span> New Event</span> </a></h5>
              <br>
              <br>
              <?php if (isset($_GET['eventtitle']) and isset($_GET['w']) and $_GET['w'] == 'added'): ?>
                <div class="alert alert-success"> <strong><?php echo $_GET['eventtitle']; ?></strong> is successfully added!</div>
              <?php endif ?>
              <?php if (isset($_GET['eventtitle']) and isset($_GET['w']) and $_GET['w'] == 'deleted'): ?>
                <div class="alert alert-danger"> <strong><?php echo $_GET['eventtitle']; ?></strong> is successfully deleted!</div>
              <?php endif ?>
              <?php if (isset($_GET['eventtitle']) and isset($_GET['w']) and $_GET['w'] == 'update'): ?>
                <div class="alert alert-success"> <strong><?php echo $_GET['eventtitle']; ?></strong> is successfully updated!</div>
              <?php endif ?>

              


            </div>
         <div class="porlets-content">
            <div class="table-responsive">
                <table  class="display table table-bordered table-striped" id="dynamic-table">
                  <thead>
                    <tr>
                      <th>Date Posted</th>
                      <th>Posted By</th>
                      <th>Event Title</th>
                      <th>Event Description</th>
                      <th>Actions</th>

                    
                    </tr>
                  </thead>
                  <tbody>
                    <?php 

                    $qry = mysqli_query($connection, "select * from event_view");
                    while ($res = mysqli_fetch_assoc($qry)) { ?>
                      <tr>
                      <td><?php echo $res['dateposted']; ?></td>
                      <td><?php echo $res['firstname'] . " " . $res['middleinitial'] . " " . $res['lastname']; ?></td>
                      <td><?php echo $res['eventtitle']; ?></td>
                      <td><?php echo $res['eventdescription']; ?></td>
                      
                      <td><a href="javascript:void(0);"  data-toggle="modal" data-target="#EditModal<?php echo $res['eventid']; ?>">Edit</a> | <a href="javascript:void(0);"  data-toggle="modal" data-target="#DeleteModal<?php echo $res['eventid']; ?>">Delete</a></td>
      
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
        <h4 class="modal-title" id="myModalLabel">Add New Event</h4>
      </div>
      <div class="modal-body">
      <form action="controller.php" method="POST" class="form-horizontal row-border" enctype="multipart/form-data">
        <div class="form-group">
          <label class="col-sm-3 control-label">Event Title</label>
          <div class="col-sm-9">
              <input type="text" name="eventtitle" id="eventtitle" class="form-control" required="">
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label">Event Description</label>
          <div class="col-sm-9">
            <textarea class="form-control" required="" id="eventdescription" name="eventdescription" rows="15"></textarea>
          </div>
        </div>

    

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="text" name="from" value="add-event" hidden="" >
        <button type="submit" class="btn btn-primary">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>



 <?php 

$qry = mysqli_query($connection, "select * from event_view");
while ($res = mysqli_fetch_assoc($qry)) { ?>
 <!-- Delete Modal -->
<div class="modal fade" id="DeleteModal<?php echo $res['eventid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Are you sure to delete this <strong><?php echo $res['eventtitle']; ?></strong> event?</h4>
      </div>
      <div class="modal-body">
      <div style="text-align: center;"><a href="controller.php?from=delete-event&eventid=<?php echo $res['eventid'] ?>&eventtitle=<?php echo $res['eventtitle']; ?>" class="btn btn-primary btn-lg">Yes</a>
      <a href="#" class="btn btn-danger btn-lg" data-dismiss="modal">No</a></div>
      
      </div>
      <div class="modal-footer">
      
   
      </div>
    </div>
  </div>
</div>



<!-- Edit Modal -->
<div class="modal fade" id="EditModal<?php echo $res['eventid'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Edit <?php echo $res['eventtitle']; ?> event</h4>
      </div>
      <div class="modal-body">
      <form action="controller.php" method="POST" class="form-horizontal row-border" enctype="multipart/form-data">
        <div class="form-group">
          <label class="col-sm-3 control-label">Event Title</label>
          <div class="col-sm-9">
              <input type="text" name="eventtitle" id="eventtitle" class="form-control" required="" value="<?php echo $res['eventtitle'] ?>">
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label">Event Description</label>
          <div class="col-sm-9">
            <textarea class="form-control" required="" id="eventdescription" name="eventdescription"><?php echo $res['eventdescription']; ?></textarea>
          </div>
        </div>

    

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="text" name="eventid" value="<?php echo $res['eventid'] ?>" hidden="">
        <input type="text" name="from" value="edit-event" hidden="" >
        <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>


<?php } ?>


<?php include('footer.php');  ?>
