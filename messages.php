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
          <h2 class="">inbox</h2>
        </div>
      </div>
      <div class="container clear_both padding_fix">
        <!--\\\\\\\ container  start \\\\\\-->


        <div class="block-web">
            
            <?php 
            $qry = mysqli_query($connection, "select viewerid, studentid , serviceofferedid, serviceofferedtitle  from service_offered_conversation_view where serviceofferedid = '" . $_GET['serviceofferedid'] . "' group by viewerid, studentid , serviceofferedid, serviceofferedtitle ");  $res1 = mysqli_fetch_assoc($qry); ?>

            <?php if (mysqli_num_rows($qry) > 0): ?>
              <strong>MESSAGES FROM DIFFERENT VIEWERS IN YOUR POSTED SERVICE "<?php echo $res1['serviceofferedtitle']; ?>"</strong>
            <?php endif ?>

            <?php if (mysqli_num_rows($qry) <= 0): ?>
              <strong>YOU HAVE NO MESSAGES IN YOUR POSTED SERVICE "<?php

              $qry10 = mysqli_query($connection, "select * from serviceoffered_table where serviceofferedid = '" . $_GET['serviceofferedid'] . "'");
              $res10 = mysqli_fetch_assoc($qry10);

               echo $res10['serviceofferedtitle']; ?>"</strong>
            <?php endif ?>
            
       
            <div class="table-responsive">
              <table class="table table-email">
                <tbody>
                
                <?php
$qry = mysqli_query($connection, "select viewerid, studentid , serviceofferedid, serviceofferedtitle, vfirstname, vmiddleinitial, vlastname,vemailaddress, vcontactnumber, serviceofferedconversationid  from service_offered_conversation_view where serviceofferedid = '" . $_GET['serviceofferedid'] . "' group by viewerid, studentid , serviceofferedid, serviceofferedtitle, vfirstname, vmiddleinitial, vlastname,vemailaddress, vcontactnumber"); 
                while ($res = mysqli_fetch_assoc($qry)) {  ?>
                  <tr>

                    <td>
                      <div class="media"> 
                        
                          <h4 class="text-primary">From: <?php echo $res['vfirstname'] . " " . $res['vmiddleinitial'] . " " . $res['vlastname']; ?></h4>
                          <h4 class="text-primary">Contact Number: <?php echo $res['vcontactnumber']; ?></h4>
                          <h4 class="text-primary">Email Address: <?php echo $res['vemailaddress']; ?></h4>
       
                          <small class="text-muted"></small>
                          <a class="btn btn-link pull-right" href="conversation.php?serviceofferedid=<?php echo $_GET['serviceofferedid']; ?>">VIEW MESSAGE</a>
                        </div>
                      </div>
                    </td>
                  </tr>

                  <?php } ?>

                </tbody>
              </table>
            </div><!-- /table-responsive --> 
          </div>



<?php include('footer.php');  ?>
