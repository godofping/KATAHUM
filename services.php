<?php include('connection.php');
$_SESSION['current-page'] = 'services';
 ?>
<?php include('header.php'); ?>
   <!--\\\\\\\left_nav end \\\\\\-->
    <div class="contentpanel">
      <!--\\\\\\\ contentpanel start\\\\\\-->
      <div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
          <h1>SERVICES</h1>
          <h2 class="">Post Service</h2>
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
              <h3 class="content-header">List of My Listed Service</h3>
              <br>
              <h5><a href="javascript:void(0);" class="add_user" data-toggle="modal" data-target="#myModal"> <i class="fa fa-plus-square"></i> <span> Post</span> </a></h5>
              <br>
              <br>
              <?php if (isset($_GET['status']) and $_GET['status'] == 'added'): ?>
                <div class="alert alert-success"> Service is successfully added!</div>
              <?php endif ?>
              <?php if (isset($_GET['status']) and $_GET['status'] == 'deleted'): ?>
                <div class="alert alert-danger"> Service is successfully deleted!</div>
              <?php endif ?>
              <?php if (isset($_GET['status']) and $_GET['status'] == 'updated'): ?>
                <div class="alert alert-success"> Service is successfully updated!</div>
              <?php endif ?>

              


            </div>
         <div class="porlets-content">
            <div class="table-responsive">
                <table  class="display table table-bordered table-striped" id="dynamic-table">
                  <thead>
                    <tr>
                      <th>Title</th>
                      <th>Description</th>
                      <th>Date Posted</th>
                      <th>Actions</th>

                    
                    </tr>
                  </thead>
                  <tbody>
                    <?php 

                    $qry = mysqli_query($connection, "select * from serviceoffered_view where studentid = '" . $_SESSION['studentid'] . "'");
                    while ($res = mysqli_fetch_assoc($qry)) { ?>
                      <tr>
                      <td><?php echo $res['serviceofferedtitle']; ?></td>
                      <td><?php echo $res['servicedescription']; ?></td>
                      <td><?php echo $res['dateposted']; ?></td>
                      <td>
   
                          <a href="messages.php?serviceofferedid=<?php echo $res['serviceofferedid'] ?>">View Inbox</a> | <a href="javascript:void(0);"  data-toggle="modal" data-target="#EditModal<?php echo $res['serviceofferedid']; ?>">Edit</a> | <a href="javascript:void(0);"  data-toggle="modal" data-target="#DeleteModal<?php echo $res['serviceofferedid']; ?>">Delete</a>
                    
                      </td>
      
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
        <h4 class="modal-title" id="myModalLabel">Post Service</h4>
      </div>
      <div class="modal-body">
      <form action="controller.php" method="POST" class="form-horizontal row-border" enctype="multipart/form-data">

        <div class="form-group">
          <label class="col-sm-3 control-label">Title</label>
          <div class="col-sm-9">
              <input type="text" name="serviceofferedtitle" id="serviceofferedtitle" class="form-control" required="">
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label">Description</label>
          <div class="col-sm-9">
            <textarea class="form-control" required="" id="servicedescription" name="servicedescription" rows="10"></textarea>
          </div>
        </div>


        <div class="form-group">
          <label class="col-sm-3 control-label">Image</label>
          <div class="col-sm-9">
              <input type="file" name="imagelocation" id="imagelocation" class="form-control" required="">
          </div>
        </div>


      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

        <input type="text" name="from" value="add-service-offered" hidden="" >
        <button type="submit" class="btn btn-primary">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>



 <?php 

$qry1 = mysqli_query($connection, "select * from serviceoffered_view where studentid = '" . $_SESSION['studentid'] . "'");
while ($res1 = mysqli_fetch_assoc($qry1)) { ?>


<!-- Delete Modal -->
<div class="modal fade" id="DeleteModal<?php echo $res1['serviceofferedid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Are you sure to delete the service <strong><?php echo $res1['serviceofferedtitle']; ?></strong>?</h4>
      </div>
      <div class="modal-body">
      <div style="text-align: center;"><a href="controller.php?from=delete-service-offered&serviceofferedid=<?php echo $res1['serviceofferedid'] ?>" class="btn btn-primary btn-lg">Yes</a>
      <a href="#" class="btn btn-danger btn-lg" data-dismiss="modal">No</a></div>
      
      </div>
      <div class="modal-footer">
      
   
      </div>
    </div>
  </div>
</div>



<!-- Edit Modal -->
<div class="modal fade" id="EditModal<?php echo $res1['serviceofferedid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Edit</h4>
      </div>
      <idv class="modal-body">
      <div class="modal-body">
      <form action="controller.php" method="POST" class="form-horizontal row-border">

        <div class="form-group">
          <label class="col-sm-3 control-label">Title</label>
          <div class="col-sm-9">
              <input type="text" name="serviceofferedtitle" id="serviceofferedtitle" class="form-control" required="" value="<?php echo $res1['serviceofferedtitle'] ?>">
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label">Description</label>
          <div class="col-sm-9">
            <textarea class="form-control" required="" id="servicedescription" name="servicedescription" rows="10"><?php echo $res1['servicedescription'] ?></textarea>
          </div>
        </div>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

        <input type="text" name="from" value="update-service-offered" hidden="" >
        <input type="text" name="serviceofferedid" value="<?php echo $res1['serviceofferedid'] ?>" hidden>
        <button type="submit" class="btn btn-primary">Save</button>
        </form>
      </div>
      </div>
    </div>
  </div>
</div>


<?php } ?>




<?php include('footer.php');  ?>
