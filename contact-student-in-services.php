<?php include('connection.php');
$_SESSION['current-page'] = 'advertising';
 ?>
<?php include('header.php'); ?>
   <!--\\\\\\\left_nav end \\\\\\-->
    <div class="contentpanel">
      <!--\\\\\\\ contentpanel start\\\\\\-->
      <div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
          <h1>SERVICES</h1>
          <h2 class="">Contact Student</h2>
        </div>
        
      </div>
      <div class="container clear_both padding_fix">
        <!--\\\\\\\ container  start \\\\\\-->


        <?php if (isset($_GET['status']) and $_GET['status'] == 'sent'): ?>
          <div class="alert alert-success">Message sent</div>
        <?php endif ?>


      </div>

      		<?php
      		$qry = mysqli_query($connection, "select * from serviceoffered_view where serviceofferedid = '" . $_GET['serviceofferedid'] . "'");
      		while ($res = mysqli_fetch_assoc($qry)) {
      		  ?>
      		<div class="col-lg-12">
              <section class="panel panel_header_bg_orange">
                <div class="block-web">
                  <div class="header">
                    <h3>Date Posted: <?php echo $res['dateposted']; ?></h3>
                  </div>
                  <div class="porlets-content">
                   
         		<div class="text-center">
         			<img class="img-responsive" src="<?php echo $res['imagelocation']; ?>">
         			<br>
         			<h4 class="text-left">Submitted by: <?php echo $res['firstname'] . " " . $res['middleinitial'] . " " . $res['lastname']; ?></h4>
              <br>
         			<h3 class="text-left"><?php echo $res['serviceofferedtitle']; ?></h3>
              <br>
              <h4 class="text-left">
                <?php echo $res['servicedescription']; ?>


              </h4>
         		</div>



                  </div>
                </div>
              </section>
            </div>

      		<?php 
          $studentid = $res['studentid'];
        } ?>




         <div class="container clear_both padding_fix">
        <!--\\\\\\\ container  start \\\\\\-->
        <br>
        <br>
      <h2 class="text-primary">Conversation</h2>

        <div class="block-web">
  
          
            <?php
            $qry = mysqli_query($connection, "select * from service_offered_conversation_view where serviceofferedid = '" . $_GET['serviceofferedid'] . "'"); 
        $res8 = mysqli_fetch_assoc($qry);
          $serviceofferedid = $res8['serviceofferedid'];
              $viewerid = $res8['viewerid'];
            ?>

            
      <h4 class="email-subject">Inquiry in service "<?php echo $res8['serviceofferedtitle']; ?>"</h4>


            <?php
            $qry = mysqli_query($connection, "select * from service_offered_conversation_view where serviceofferedid = '" . $_GET['serviceofferedid'] . "'"); 
             while ($res = mysqli_fetch_assoc($qry)) {  ?>
           

              <?php if ($res['fromwho'] == 'viewer'): ?>
                <div class="read-panel">

                <div class="media-body"> <span class="media-meta pull-right"><?php echo date('h:i: A Y-m-d', strtotime($res['datetime'])); ?></span>
                  <h4 class="text-primary">From: <?php echo $res['vfirstname'] . " " . $res['vmiddleinitial'] . " " . $res['vlastname']; ?></h4>
                       
              </div>
                
             
              <p><?php echo $res['message']; ?></p>
              <?php endif ?>


              <?php if ($res['fromwho'] == 'student'): ?>
                <div class="read-panel">

                <div class="media-body"> <span class="media-meta pull-right"><?php echo date('h:i: A Y-m-d', strtotime($res['datetime'])); ?></span>
                  <h4 class="text-primary">From: You</h4>
              </div>
                
              <p><?php echo $res['message']; ?></p>
              <?php endif ?>



              <?php } ?>

              <br>
              <div class="media"> <a class="pull-left" href="#">  </a>
                <div class="media-body">
                  <form action="controller.php" method="POST">
                  <textarea placeholder="Reply here..." class="form-control" name="message"></textarea>
                  <input type="text" name="from" value="submit-message" hidden="">
                  <input type="text" name="studentid" value="<?php echo $studentid; ?>" hidden>
                  <input type="text" name="serviceofferedid" value="<?php echo $_GET['serviceofferedid']; ?>" hidden>
                  <button type="submit" class="btn btn-primary btn-lg pull-right" style="margin-top: 20px;">Submit</button>
                  </form>
                </div>
              </div><!-- /media --> 
                
          </div><!--/ read-panel -->    
         </div>

     



<?php include('footer.php');  ?>
