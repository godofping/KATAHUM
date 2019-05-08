<?php 
include_once("connection.php");
 ?>
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
      
      <form method="post" action="controller.php">
       
      <div class="row">
        <div class="col-md-12">


       <?php 
       $qry = mysqli_query($connection, "select * from position_table");  
        while ($res = mysqli_fetch_assoc($qry)) { ?>
        <br>
        <h3 class="blue_text"><?php echo $res['positionname']; ?></h3>
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
             <div class="col-sm-6">
            <div class="contact_people">
              <a><img src="<?php echo $res1['profilepicturelocation'] ?>" height = "120px" width = "120px"></a>
                <div class="contact_people_body">
                  <h5><?php echo $res1['firstname'] . " " . $res1['middleinitial'] . " " . $res1['lastname']; ?></h5>
                    <span><i class="fa fa-star"></i><?php echo $res1['partyname']; ?></span>
                    <br>
                    <br>
                    <br>
               

                </div>
            </div>
            </div>

  
  
              <?php } ?>

              </div>
            </div>
          </div>


          <?php if ($isvoted == false): ?>
            <div class="row">
          <div class="col-sm-6">
                    <select class="form-control" name="a<?php  echo $res['positionid']; ?>">
                      <option disabled="" selected="">Please Select</option>
                      <?php $qry2 = mysqli_query($connection, "select * from candidate_view where positionid = '" . $res['positionid'] . "'");  
          while ($res2 = mysqli_fetch_assoc($qry2)) {  ?>
                      <option value="<?php echo $res2['candidateid'] ?>"> <?php echo $res2['firstname'] . " " . $res2['middleinitial'] . " " . $res2['lastname']; ?> </option>
                      <?php } ?>
                    </select>
                  </div>
          </div>
            <br>
          <br>
          <?php endif ?>

        
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