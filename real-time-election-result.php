<?php include('connection.php'); ?>
          <div class="row">
            <div class="col-lg-12">
                <h1 class="red_text text-center"><strong>ELECTION RESULT</strong></h1>
            </div>
         </div>
      
       
      <div class="row">
        <div class="col-md-12">
       <?php $qry = mysqli_query($connection, "select * from position_table");  
        while ($res = mysqli_fetch_assoc($qry)) { ?>
        <br>
        <h3 class="blue_text"><?php echo $res['positionname']; ?></h3>
        <br>

        <div class="row">
          <div class="col-sm-12">
            <div class="row">

            <?php 

            $qry0 = mysqli_query($connection, "SELECT  COUNT(*) AS votes,candidateid FROM vote_view WHERE positionid = '" . $res['positionid'] . "' GROUP BY (candidateid) ORDER BY (votes) DESC LIMIT 1");
            $res0 = mysqli_fetch_assoc($qry0);


            $qry1 = mysqli_query($connection, "select * from candidate_view where candidateid = '" . $res0['candidateid'] . "'");
            $res1 = mysqli_fetch_assoc($qry1);



       ?>
             <div class="col-sm-6">
            <div class="contact_people">
            	<a><img src="<?php echo $res1['profilepicturelocation'] ?>" height = "120px" width = "120px"></a>
                <div class="contact_people_body">
                	<h5><?php echo $res1['firstname'] . " " . $res1['middleinitial'] . " " . $res1['lastname']; ?></h5>
                    <span><i class="fa fa-star"></i><?php echo $res1['partyname']; ?></span>
                    <span><i class="fa fa-ticket"></i><strong class="green_text" style="font-size: 30px;"><?php 
                  $qry2 = mysqli_query($connection, "select count(*) as numberofvotes from vote_table where candidateid = '" . $res1['candidateid'] . "'");
                  $res2 = mysqli_fetch_assoc($qry2); 
                  echo $res2['numberofvotes']; ?> </strong></span>
                  
              

                </div>
            </div>
            </div>

  
  

              </div>
            </div>
          </div>

        <?php  } ?>
            
            
          </div><!--/block-web--> 
        </div><!--/col-md-12--> 