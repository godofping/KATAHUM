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
          <h2 class="">election setting</h2>
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
              <h3 class="content-header">Election Setting </h3>
              <br>
              <h5><a href="javascript:void(0);" class="add_user" data-toggle="modal" data-target="#myModal"> <i class="fa fa-plus-square"></i> <span> Set Election</span> </a></h5>
              <br>
              <br>
              <?php if (isset($_GET['awardtitle']) and isset($_GET['w']) and $_GET['w'] == 'added'): ?>
                <div class="alert alert-success"> <strong><?php echo $_GET['awardtitle']; ?></strong> is successfully added!</div>
              <?php endif ?>
              <?php if (isset($_GET['awardtitle']) and isset($_GET['w']) and $_GET['w'] == 'deleted'): ?>
                <div class="alert alert-danger"> <strong><?php echo $_GET['awardtitle']; ?></strong> is successfully deleted!</div>
              <?php endif ?>
              <?php if (isset($_GET['awardtitle']) and isset($_GET['w']) and $_GET['w'] == 'update'): ?>
                <div class="alert alert-success"> <strong><?php echo $_GET['awardtitle']; ?></strong> is successfully updated!</div>
              <?php endif ?>

              


            </div>
            <br>
            <br>
          <?php $qry = mysqli_query($connection, "select * from election_table");
          $res = mysqli_fetch_assoc($qry);

           ?>
          <h2>Election Starting Date and Time: <?php echo date('h:i A Y-m-d', strtotime($res['electiondateandtimestart'])); ?></h2>
          <h2>Election Ending Date and Time: <?php echo date('h:i A Y-m-d', strtotime($res['electiondateandtimeend'])); ?></h2>
          <h2>Status: <?php echo $res['status']; ?></h2>
            
            
          </div><!--/block-web--> 
        </div><!--/col-md-12--> 
      </div><!--/row-->

 
      
           
        </div><!--/page-content end--> 
  </div>

<?php
$electiondateandtimestart =  (explode(" ",$res['electiondateandtimestart']));
$electiondateandtimeend =  (explode(" ",$res['electiondateandtimeend']));
$startingdate =  $electiondateandtimestart[0];
$startingtime =  $electiondateandtimestart[1];
$endingdate =  $electiondateandtimeend[0];
$endingtime =  $electiondateandtimeend[1];
 ?>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Set Election Schedule</h4>
      </div>
      <div class="modal-body">
      <form action="controller.php" method="POST" class="form-horizontal row-border" enctype="multipart/form-data">
        <div class="form-group">
          <label class="col-sm-3 control-label">Starting Date</label>
          <div class="col-sm-9">
              <input type="date" name="startingdate" id="startingdate" class="form-control" required="" value="<?php echo $startingdate; ?>">
          </div>
        </div>

        <div class="form-group">
           <label class="col-sm-3 control-label">Staring Time </label>
            <div class="col-sm-9">
              <select class="form-control" id="startingtime" name="startingtime" required="">
                <option selected="" value="<?php echo $startingtime; ?>"><?php echo date('h:i A',strtotime($startingtime)); ?></option>
                <option value="7:30:00"> 07:30 AM </option>
                <option value="8:00:00"> 08:00 AM </option>     
                <option value="8:30:00"> 08:30 AM </option>
                <option value="9:00:00"> 09:00 AM </option>
                <option value="9:30:00"> 09:30 AM </option>
                <option value="10:00:00"> 10:00 AM </option>
                <option value="10:30:00"> 10:30 AM </option>
                <option value="11:00:00"> 11:00 AM </option>
                <option value="11:30:00"> 11:30 AM </option>
                <option value="12:00:00"> 12:00 PM </option>
                <option value="12:30:00"> 12:30 PM </option>
                <option value="13:00:00"> 01:00 PM </option>
                <option value="13:30:00"> 01:30 PM </option>
                <option value="14:00:00"> 02:00 PM </option>
                <option value="14:30:00"> 02:30 PM </option>
                <option value="15:00:00"> 03:00 PM </option>
                <option value="15:30:00"> 03:30 PM </option>
                <option value="16:00:00"> 04:00 PM </option>
                <option value="16:30:00"> 04:30 PM </option>
                <option value="17:00:00"> 05:00 PM </option>
                <option value="17:30:00"> 05:30 PM </option>
                <option value="18:00:00"> 06:00 PM </option>
                <option value="18:30:00"> 06:30 PM </option>
                <option value="19:00:00"> 07:00 PM </option>
                <option value="19:30:00"> 07:30 PM </option>
                
              </select>
            </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label">Ending Date</label>
          <div class="col-sm-9">
              <input type="date" name="endingdate" id="endingdate" class="form-control" required="" value="<?php echo $endingdate; ?>">
          </div>
        </div>

        <div class="form-group">
           <label class="col-sm-3 control-label">Ending Time</label>
            <div class="col-sm-9">
              <select class="form-control" id="endingtime" name="endingtime" required="" >
                <option selected="" value="<?php echo $endingtime ?>"><?php echo date('h:i A',strtotime($endingtime)); ?></option>
                <option value="7:30:00"> 07:30 AM </option>
                <option value="8:00:00"> 08:00 AM </option>     
                <option value="8:30:00"> 08:30 AM </option>
                <option value="9:00:00"> 09:00 AM </option>
                <option value="9:30:00"> 09:30 AM </option>
                <option value="10:00:00"> 10:00 AM </option>
                <option value="10:30:00"> 10:30 AM </option>
                <option value="11:00:00"> 11:00 AM </option>
                <option value="11:30:00"> 11:30 AM </option>
                <option value="12:00:00"> 12:00 PM </option>
                <option value="12:30:00"> 12:30 PM </option>
                <option value="13:00:00"> 01:00 PM </option>
                <option value="13:30:00"> 01:30 PM </option>
                <option value="14:00:00"> 02:00 PM </option>
                <option value="14:30:00"> 02:30 PM </option>
                <option value="15:00:00"> 03:00 PM </option>
                <option value="15:30:00"> 03:30 PM </option>
                <option value="16:00:00"> 04:00 PM </option>
                <option value="16:30:00"> 04:30 PM </option>
                <option value="17:00:00"> 05:00 PM </option>
                <option value="17:30:00"> 05:30 PM </option>
                <option value="18:00:00"> 06:00 PM </option>
                <option value="18:30:00"> 06:30 PM </option>
                <option value="19:00:00"> 07:00 PM </option>
                <option value="19:30:00"> 07:30 PM </option>
                
              </select>
            </div>
        </div>

        <div class="form-group">
           <label class="col-sm-3 control-label">Status</label>
            <div class="col-sm-9">
              <select class="form-control" id="status" name="status" required="" >
                <option selected="" disabled="" >Please Select</option>
                <option value="Start"> Start </option>
                <option value="Finish"> Finish </option>     
                
              </select>
            </div>
        </div>


      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="text" name="from" value="set-election" hidden="" >
        <button type="submit" class="btn btn-primary">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>





<?php include('footer.php');  ?>
