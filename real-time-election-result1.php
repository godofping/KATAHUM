<?php include('connection.php'); ?>
 
      
       
      

          <div class="col-lg-12">
            <section class="panel default blue_title h2">

              <h3 class="content-header">Election Result</h3>
              <div class="panel-body">
              
                <table class="table">
                  <thead>
                    <tr>
                      <th>Position Name</th>
                      <th>Party Name</th>
                      <th>Full Name</th>
                      <th>Votes</th>
                  
                    </tr>
                  </thead>
                  <tbody>

<?php 
     $qry = mysqli_query($connection, "select * from position_table");  
        while ($res = mysqli_fetch_assoc($qry)) { 

      $qry0 = mysqli_query($connection, "SELECT  COUNT(*) AS votes,candidateid FROM vote_view WHERE positionid = '" . $res['positionid'] . "' GROUP BY (candidateid) ORDER BY (votes) DESC LIMIT 1");
      $res0 = mysqli_fetch_assoc($qry0);


      $qry1 = mysqli_query($connection, "select * from candidate_view where candidateid = '" . $res0['candidateid'] . "'");
      $res1 = mysqli_fetch_assoc($qry1);



 ?>

                    <tr>
                      <td><?php echo $res['positionname']; ?></td>
                      <td><?php echo $res1['partyname']; ?></td>
                      <td><?php echo $res1['firstname'] . " " . $res1['middleinitial'] . " " . $res1['lastname']; ?></td>
                      <td><?php 
                  $qry2 = mysqli_query($connection, "select count(*) as numberofvotes from vote_table where candidateid = '" . $res1['candidateid'] . "'");
                  $res2 = mysqli_fetch_assoc($qry2); 
                  echo $res2['numberofvotes']; ?> </td>
       
                    </tr>

                       <?php  } ?>
                 
                  </tbody>
                </table>
              </div>
              <div></div>
            </section>
          </div>

     
            
            
          </div><!--/block-web--> 
        </div><!--/col-md-12--> 