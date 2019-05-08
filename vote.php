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
          <h2 class="">VOTE</h2>
        </div>
        
      </div>
      <div class="container clear_both padding_fix">
        <!--\\\\\\\ container  start \\\\\\-->

        <?php 

        $qry = mysqli_query($connection, "select count(*) as numberofvotes from vote_table where studentid = '" . $_SESSION['studentid'] . "'");
       $res = mysqli_fetch_assoc($qry);
       $isvoted = false;
       if ($res['numberofvotes'] > 0) {
         $isvoted = true;
       }
        ?>

   <div id="main-content">
    <div class="page-content">
        
              <div class="row">
            <div class="col-lg-12">
                <h1 class="red_text text-center"><strong>VOTING PAGE</strong></h1>
                <h3 class="green_text text-center"><?php if ($isvoted == true) {
                  echo "You already voted. Here are the aspiring officers you have voted.";
                } ?></h3>
          <?php $qry5 = mysqli_query($connection, "select * from election_table");
          $res5 = mysqli_fetch_assoc($qry5);?>


                <?php if ($res5['status'] == 'Start'): ?>
                  <h4 class="red_text text-center">Election is on <?php echo date('h:i A Y-m-d', strtotime($res5['electiondateandtimestart'])); ?> and will end on <?php echo date('h:i A Y-m-d', strtotime($res5['electiondateandtimeend'])); ?></h4>
                <?php endif ?>

                <?php if ($res5['status'] == 'Finish'): ?>
                  <h4 class="red_text text-center">Election Ended.</h4>
                <?php endif ?>



            </div>
         </div>



         <div id="main-content">
    <div class="page-content">
        
      <div id="electionresultrealtime" name="electionresultrealtime"></div>
           
        </div><!--/page-content end--> 
  </div>
      
      <form method="post" action="controller.php">
       
      <div class="row">
        <div class="col-md-12">


          <?php if ($isvoted == true): ?>
            <h3>Election Receipt</h3>
          <?php endif ?>

       <?php 
       $qry = mysqli_query($connection, "select * from position_table");  
        while ($res = mysqli_fetch_assoc($qry)) { ?>
        <br>
        <h4 class="blue_text"><?php echo $res['positionname']; ?></h4>
        <br>


        

        <div class="row">
          <div class="col-sm-12">
            <div class="row">

            <?php

            if ($isvoted == false) {
               $qry1 = mysqli_query($connection, "select * from candidate_view where positionid = '" . $res['positionid'] . "'"); 
            }
            else
            {
               $qry1 = mysqli_query($connection, "select * from vote_view where positionid = '" . $res['positionid'] . "' and studentid = '" . $_SESSION['studentid'] ."'"); 
            }
            
          while ($res1 = mysqli_fetch_assoc($qry1)) { ?>
   

  
  
              <?php } ?>

              </div>
            </div>
        </div>


        
            <div class="row">
          <div class="col-sm-6">
                    <select class="form-control" name="a<?php  echo $res['positionid']; ?>">
                      <?php if ($isvoted == true): ?>
                        <option disabled="" selected="">
                          <?php 
                          $qry4 = mysqli_query($connection, "select * from vote_view where studentid = '" . $_SESSION['studentid'] . "' and positionid = '" . $res['positionid']. "'");
                          $res4 = mysqli_fetch_assoc($qry4);
                          
                          $qry4 = mysqli_query($connection, "select * from candidate_view where candidateid = '" . $res4['candidateid'] . "'");
                          $res4 = mysqli_fetch_assoc($qry4);

                          echo $res4['firstname'] . " " . $res4['middleinitial'] . " " . $res4['lastname'];





                           ?>
                        </option>
                      <?php endif ?>

                      <?php if ($isvoted == false): ?>
                        <option disabled="" selected="">Please Select</option>
                      <?php endif ?>

                      <?php $qry2 = mysqli_query($connection, "select * from candidate_view where positionid = '" . $res['positionid'] . "'");  
          while ($res2 = mysqli_fetch_assoc($qry2)) {  ?>
                      <?php if ($isvoted == false): ?>
                        <option value="<?php echo $res2['candidateid'] ?>" <?php if ($isvoted == true): ?>
                        disabled
                      <?php endif ?>> <?php echo $res2['firstname'] . " " . $res2['middleinitial'] . " " . $res2['lastname']; ?> </option>
                      <?php endif ?>
                      <?php } ?>
                    </select>
                  </div>
          </div>
            <br>
          <br>
        

        
          <br>

        <?php  } ?>
            
            
          </div><!--/block-web--> 
        </div><!--/col-md-12--> 
      </div><!--/row-->

      
      <?php if ($isvoted == false): ?>
        <div class="container">
        <div class="row">
          <div class="col-sm-5">
          </div>  
     
          <?php if (date('Y-m-d H:i:s') >= $res5['electiondateandtimestart'] and date('Y-m-d H:i:s') <= $res5['electiondateandtimeend'] and $res5['status'] == 'Start'): ?>
            <div class="col-sm-2">
            <input type="text" name="from" value="submit-vote" hidden="">
             <input type="submit" class="btn btn-primary btn-lg" value="SUBMIT VOTE">
             </form>
             <br>
             <br>
             <br>
          </div>  
          <?php endif ?>

          <div class="col-sm-5">
   
             <br>
          </div>  
        
        
        </div>
      </div>
      <?php endif ?>
 
      
           
        </div><!--/page-content end--> 
  </div>



<script type="text/javascript">
$(document).ready(function checknoti(){
    var feedback = $.ajax({
        type: "POST",
        url: "real-time-election.php",
        async: false
    }).complete(function(){
        setTimeout(function(){checknoti();}, 1000);
    }).responseText;

    $('#electionresultrealtime').html(feedback);
});
</script>



<?php include('footer.php');  ?>
