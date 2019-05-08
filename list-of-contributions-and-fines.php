<?php include('connection.php');
$_SESSION['current-page'] = 'SOA';
 ?>
<?php include('header.php'); ?>
   <!--\\\\\\\left_nav end \\\\\\-->
    <div class="contentpanel">
      <!--\\\\\\\ contentpanel start\\\\\\-->
      <div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
          <h1>S.O.A.</h1>
          <h2 class="">List of Contributions and Fines</h2>
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
              <h3 class="content-header">List of Contributions and Fines </h3>
              <br>
              <h5><a href="javascript:void(0);" class="add_user" data-toggle="modal" data-target="#myModal"> <i class="fa fa-plus-square"></i> <span> New Contributions or Fines</span> </a></h5>
              <br>
              <br>
              <?php if (isset($_GET['nameofcontributionorfine']) and isset($_GET['w']) and $_GET['w'] == 'added'): ?>
                <div class="alert alert-success"> <strong><?php echo $_GET['nameofcontributionorfine']; ?></strong> is successfully added!</div>
              <?php endif ?>
              <?php if (isset($_GET['nameofcontributionorfine']) and isset($_GET['w']) and $_GET['w'] == 'deleted'): ?>
                <div class="alert alert-danger"> <strong><?php echo $_GET['nameofcontributionorfine']; ?></strong> is successfully deleted!</div>
              <?php endif ?>
              <?php if (isset($_GET['nameofcontributionorfine']) and isset($_GET['w']) and $_GET['w'] == 'update'): ?>
                <div class="alert alert-success"> <strong><?php echo $_GET['nameofcontributionorfine']; ?></strong> is successfully updated!</div>
              <?php endif ?>

              


            </div>
         <div class="porlets-content">
            <div class="table-responsive">
                <table  class="display table table-bordered table-striped" id="dynamic-table">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Type</th>
                      <th>Amount</th>
                      <th>Actions</th>

                    
                    </tr>
                  </thead>
                  <tbody>
                    <?php 

                    $qry = mysqli_query($connection, "select * from list_of_contribution_and_fine_table");
                    while ($res = mysqli_fetch_assoc($qry)) { ?>
                      <tr>
                      <td><?php echo $res['nameofcontributionorfine']; ?></td>
                      <td><?php echo $res['type']; ?></td>
                      <td> ₱ <?php echo number_format($res['amount'], 2); ?></td>
                      <td><a href="javascript:void(0);"  data-toggle="modal" data-target="#EditModal<?php echo $res['contributionandfineid']; ?>">Edit</a> | <a href="javascript:void(0);"  data-toggle="modal" data-target="#DeleteModal<?php echo $res['contributionandfineid']; ?>">Delete</a></td>
      
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
        <h4 class="modal-title" id="myModalLabel">Add New Contribution or Fines</h4>
      </div>
      <div class="modal-body">
      <form action="controller.php" method="POST" class="form-horizontal row-border" enctype="multipart/form-data">


        <div class="form-group">
          <label class="col-sm-3 control-label">Name of Contribution or Fine</label>
          <div class="col-sm-9">
              <input type="text" name="nameofcontributionorfine" id="nameofcontributionorfine" class="form-control" required="">
          </div>
        </div>



        <div class="form-group">
           <label class="col-sm-3 control-label">Type</label>
            <div class="col-sm-9">
              <select class="form-control" id="type" name="type" required="" >
                <option selected="" disabled="" >Please Select</option>
                <option value="Contribution"> Contribution </option>
                <option value="Fine"> Fine </option>           
              </select>
            </div>
        </div>



        <div class="form-group">
          <label class="col-sm-3 control-label">Amount</label>
          <div class="col-sm-9">
              <input type="number" name="amount" id="amount" class="form-control" required="">
          </div>
        </div>


    

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="text" name="from" value="add-contributions-or-fines" hidden="" >
        <button type="submit" class="btn btn-primary">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>



 <?php 

$qry = mysqli_query($connection, "select * from list_of_contribution_and_fine_table");
while ($res = mysqli_fetch_assoc($qry)) { ?>
 <!-- Delete Modal -->
<div class="modal fade" id="DeleteModal<?php echo $res['contributionandfineid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Are you sure to delete <strong><?php echo $res['nameofcontributionorfine']; ?></strong>?</h4>
      </div>
      <div class="modal-body">
      <div style="text-align: center;"><a href="controller.php?from=delete-contribution-or-fine&contributionandfineid=<?php echo $res['contributionandfineid'] ?>&nameofcontributionorfine=<?php echo $res['nameofcontributionorfine']; ?>" class="btn btn-primary btn-lg">Yes</a>
      <a href="#" class="btn btn-danger btn-lg" data-dismiss="modal">No</a></div>
      
      </div>
      <div class="modal-footer">
      
   
      </div>
    </div>
  </div>
</div>



<!-- Edit Modal -->
<div class="modal fade" id="EditModal<?php echo $res['contributionandfineid'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Edit <?php echo $res['nameofcontributionorfine']; ?> news</h4>
      </div>
      <div class="modal-body">
      <form action="controller.php" method="POST" class="form-horizontal row-border" enctype="multipart/form-data">


        <div class="form-group">
          <label class="col-sm-3 control-label">Name of Contribution or Fine</label>
          <div class="col-sm-9">
              <input type="text" name="nameofcontributionorfine" id="nameofcontributionorfine" class="form-control" required="" value="<?php echo $res['nameofcontributionorfine']; ?>">
          </div>
        </div>



        <div class="form-group">
           <label class="col-sm-3 control-label">Type</label>
            <div class="col-sm-9">
              <select class="form-control" id="type" name="type" required="" >
                <option selected="<?php echo $res['type']; ?>" > <?php echo $res['type']; ?> </option>
                <option value="Contribution"> Contribution </option>
                <option value="Fine"> Fine </option>           
              </select>
            </div>
        </div>



        <div class="form-group">
          <label class="col-sm-3 control-label">Amount</label>
          <div class="col-sm-9">
              <input type="number" name="amount" id="amount" class="form-control" required="" value="<?php echo $res['amount']; ?>">
          </div>
        </div>


    

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="text" name="contributionandfineid" id="contributionandfineid" value="<?php echo $res['contributionandfineid']; ?>" hidden>
        <input type="text" name="from" value="edit-contribution-or-fine" hidden="" >
        <button type="submit" class="btn btn-primary">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>


<?php } ?>


<?php include('footer.php');  ?>
