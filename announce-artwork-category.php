<?php include('connection.php');
$_SESSION['current-page'] = 'advertising';
 ?>
<?php include('header.php'); ?>
   <!--\\\\\\\left_nav end \\\\\\-->
    <div class="contentpanel">
      <!--\\\\\\\ contentpanel start\\\\\\-->
      <div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
          <h1>ADVERTISING</h1>
          <h2 class="">Announce Artwork Category</h2>
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
              <h3 class="content-header">List of Announced Artwork Category</h3>
              <br>
              <h5><a href="javascript:void(0);" class="add_user" data-toggle="modal" data-target="#myModal"> <i class="fa fa-plus-square"></i> <span> Announce</span> </a></h5>
              <br>
              <br>
              <?php if (isset($_GET['w']) and $_GET['w'] == 'added'): ?>
                <div class="alert alert-success"> Announcement is successfully added!</div>
              <?php endif ?>
              <?php if (isset($_GET['w']) and $_GET['w'] == 'deleted'): ?>
                <div class="alert alert-danger"> Announcement is successfully deleted!</div>
              <?php endif ?>
              <?php if (isset($_GET['w']) and $_GET['w'] == 'updated'): ?>
                <div class="alert alert-success"> Announcement is successfully updated!</div>
              <?php endif ?>

              


            </div>
         <div class="porlets-content">
            <div class="table-responsive">
                <table  class="display table table-bordered table-striped" id="dynamic-table">
                  <thead>
                    <tr>
                      <th>Artwork Category</th>
                      <th>Teacher Full Name</th>
                      <th>Date Announced</th>
                      <th>Description</th>
                      <th>View Submitted Artworks</th>
                      <th>Actions</th>

                    
                    </tr>
                  </thead>
                  <tbody>
                    <?php 

                    $qry = mysqli_query($connection, "select * from announced_artwork_category_view");
                    while ($res = mysqli_fetch_assoc($qry)) { ?>
                      <tr>
                      <td><?php echo $res['artworkcategoryname']; ?></td>
                      <td><?php echo $res['fullname']; ?></td>
                      <td><?php echo $res['dateannounced']; ?></td>
                      <td><?php echo $res['description']; ?></td>
                      <td><a href="view-submitted-artworks.php?announcedartworkcategoryid=<?php echo $res['announcedartworkcategoryid']; ?>">View Artworks</a></td>
                      <td>
                        <?php if ($res['teacherid'] == $_SESSION['teacherid']): ?>
                          <a href="javascript:void(0);"  data-toggle="modal" data-target="#EditModal<?php echo $res['announcedartworkcategoryid']; ?>">Edit</a> | <a href="javascript:void(0);"  data-toggle="modal" data-target="#DeleteModal<?php echo $res['announcedartworkcategoryid']; ?>">Delete</a>
                        <?php endif ?>
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
        <h4 class="modal-title" id="myModalLabel">Add Announcement</h4>
      </div>
      <div class="modal-body">
      <form action="controller.php" method="POST" class="form-horizontal row-border">

        <div class="form-group">
           <label class="col-sm-3 control-label">Artwork Category</label>
            <div class="col-sm-9">
              <select class="form-control" id="artworkcategoryid" name="artworkcategoryid" required="" >
                <option selected="" disabled="" >Please Select</option>

                <?php
                $qry = mysqli_query($connection,"select * from artwork_category_table");
                 while($res = mysqli_fetch_assoc($qry)){ ?>
                  <option value="<?php echo $res['artworkcategoryid'] ?>"> <?php echo $res['artworkcategoryname']; ?> </option>
                <?php } ?>
                
                   
              </select>
            </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label">Description</label>
          <div class="col-sm-9">
            <textarea class="form-control" required="" id="description" name="description" rows="10"></textarea>
          </div>
        </div>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

        <input type="text" name="from" value="add-artwork-announcement" hidden="" >
        <button type="submit" class="btn btn-primary">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>



 <?php 

$qry1 = mysqli_query($connection, "select * from announced_artwork_category_view");
while ($res1 = mysqli_fetch_assoc($qry1)) { ?>
 <!-- Delete Modal -->
<div class="modal fade" id="DeleteModal<?php echo $res1['announcedartworkcategoryid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Are you sure to delete the announcement of <strong><?php echo $res1['fullname']; ?></strong> posted on the date of <?php echo $res1['dateannounced']; ?>?</h4>
      </div>
      <div class="modal-body">
      <div style="text-align: center;"><a href="controller.php?from=delete-artwork-announcement&announcedartworkcategoryid=<?php echo $res1['announcedartworkcategoryid'] ?>&fullname=<?php echo $res1['fullname'] ?>&dateannounced=<?php echo $res1['dateannounced']; ?>" class="btn btn-primary btn-lg">Yes</a>
      <a href="#" class="btn btn-danger btn-lg" data-dismiss="modal">No</a></div>
      
      </div>
      <div class="modal-footer">
      
   
      </div>
    </div>
  </div>
</div>



<!-- Edit Modal -->
<div class="modal fade" id="EditModal<?php echo $res1['announcedartworkcategoryid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Edit the announcement of <strong><?php echo $res1['fullname']; ?></strong> posted on the date of <?php echo $res1['dateannounced']; ?></h4>
      </div>
      <div class="modal-body">
      <form action="controller.php" method="POST" class="form-horizontal row-border">

        <div class="form-group">
           <label class="col-sm-3 control-label">Artwork Category</label>
            <div class="col-sm-9">
              <select class="form-control" id="artworkcategoryid" name="artworkcategoryid" required="" >
                <option selected=""  value="<?php echo $res1['artworkcategoryid'] ?>"><?php echo $res1['artworkcategoryname']; ?></option>

                <?php
                $qry2 = mysqli_query($connection,"select * from artwork_category_table");
                 while($res2 = mysqli_fetch_assoc($qry2)){ ?>
                  <option value="<?php echo $res2['artworkcategoryid'] ?>"> <?php echo $res2['artworkcategoryname']; ?> </option>
                <?php } ?>
                
                   
              </select>
            </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label">Description</label>
          <div class="col-sm-9">
            <textarea class="form-control" required="" id="description" name="description" rows="10"><?php echo $res1['description']; ?></textarea>
          </div>
        </div>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       
        <input type="text" name=" announcedartworkcategoryid" value="<?php echo $res1['announcedartworkcategoryid']; ?>" hidden="" >
        <input type="text" name="from" value="edit-artwork-announcement" hidden="" >
        <button type="submit" class="btn btn-primary">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>


<?php } ?>




<?php include('footer.php');  ?>
