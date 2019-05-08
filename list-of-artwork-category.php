<?php include('connection.php');
$_SESSION['current-page'] = 'advertising';
 ?>
<?php include('header.php'); ?>
   <!--\\\\\\\left_nav end \\\\\\-->
    <div class="contentpanel">
      <!--\\\\\\\ contentpanel start\\\\\\-->
      <div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
          <h1>ARTWORK ACTIVITY</h1>
          <h2 class="">List of Artwork Category</h2>
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
              <h3 class="content-header">List of Artwork Category </h3>
              <br>
              <h5><a href="javascript:void(0);" class="add_user" data-toggle="modal" data-target="#myModal"> <i class="fa fa-plus-square"></i> <span> New Artwork Category</span> </a></h5>
              <br>
              <br>
              <?php if (isset($_GET['artworkcategoryname']) and isset($_GET['w']) and $_GET['w'] == 'added'): ?>
                <div class="alert alert-success"> <strong><?php echo $_GET['artworkcategoryname']; ?></strong> is successfully added!</div>
              <?php endif ?>
              <?php if (isset($_GET['artworkcategoryname']) and isset($_GET['w']) and $_GET['w'] == 'deleted'): ?>
                <div class="alert alert-danger"> <strong><?php echo $_GET['artworkcategoryname']; ?></strong> is successfully deleted!</div>
              <?php endif ?>
              <?php if (isset($_GET['artworkcategoryname']) and isset($_GET['w']) and $_GET['w'] == 'update'): ?>
                <div class="alert alert-success"> <strong><?php echo $_GET['artworkcategoryname']; ?></strong> is successfully updated!</div>
              <?php endif ?>

              


            </div>
         <div class="porlets-content">
            <div class="table-responsive">
                <table  class="display table table-bordered table-striped" id="dynamic-table">
                  <thead>
                    <tr>
                      <th>artworkname</th>
                      <th>Actions</th>

                    
                    </tr>
                  </thead>
                  <tbody>
                    <?php 

                    $qry = mysqli_query($connection, "select * from artwork_category_table");
                    while ($res = mysqli_fetch_assoc($qry)) { ?>
                      <tr>
                      <td><?php echo $res['artworkcategoryname']; ?></td>
                      <td><a href="javascript:void(0);"  data-toggle="modal" data-target="#EditModal<?php echo $res['artworkcategoryid']; ?>">Edit</a> | <a href="javascript:void(0);"  data-toggle="modal" data-target="#DeleteModal<?php echo $res['artworkcategoryid']; ?>">Delete</a></td>
      
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
        <h4 class="modal-title" id="myModalLabel">Add New Artwork Category</h4>
      </div>
      <div class="modal-body">
      <form action="controller.php" method="POST" class="form-horizontal row-border">
        <div class="form-group">
          <label class="col-sm-3 control-label">Artwork Category Name</label>
          <div class="col-sm-9">
              <input type="text" name="artworkcategoryname" id="artworkcategoryname" class="form-control" required="">
          </div>
        </div>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="text" name="from" value="add-artwork-category" hidden="" >
        <button type="submit" class="btn btn-primary">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>



 <?php 

$qry = mysqli_query($connection, "select * from artwork_category_table");
while ($res = mysqli_fetch_assoc($qry)) { ?>
 <!-- Delete Modal -->
<div class="modal fade" id="DeleteModal<?php echo $res['artworkcategoryid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Are you sure to delete <strong><?php echo $res['artworkcategoryname']; ?></strong>?</h4>
      </div>
      <div class="modal-body">
      <div style="text-align: center;"><a href="controller.php?from=delete-artwork-category&artworkcategoryid=<?php echo $res['artworkcategoryid'] ?>&artworkcategoryname=<?php echo $res['artworkcategoryname'] ?>" class="btn btn-primary btn-lg">Yes</a>
      <a href="#" class="btn btn-danger btn-lg" data-dismiss="modal">No</a></div>
      
      </div>
      <div class="modal-footer">
      
   
      </div>
    </div>
  </div>
</div>



<!-- Edit Modal -->
<div class="modal fade" id="EditModal<?php echo $res['artworkcategoryid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Edit <strong><?php echo $res['artworkcategoryname']; ?></strong></h4>
      </div>
      <div class="modal-body">
      <form action="controller.php" method="POST" class="form-horizontal row-border">
        <div class="form-group">
          <label class="col-sm-3 control-label">Party Name</label>
          <div class="col-sm-9">
              <input type="text" name="artworkcategoryname" id="artworkcategoryname" class="form-control" required="" value="<?php echo $res['artworkcategoryname']; ?>">
          </div>
        </div>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="text" name="artworkcategoryid" value="<?php echo $res['artworkcategoryid'] ?>" hidden="" >
        <input type="text" name="from" value="edit-artwork-category" hidden="" >
        <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>


<?php } ?>




<?php include('footer.php');  ?>
