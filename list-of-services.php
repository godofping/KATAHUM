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
          <h2 class="">List of Services</h2>
        </div>
        
      </div>
      <div class="container clear_both padding_fix">
        <!--\\\\\\\ container  start \\\\\\-->


        <div id="main-content">
    <div class="page-content">
      
      <div class="row">
          <div class="col-sm-12">
            <div class="ticket_open">
              <div class="ticket_open_heading">
                <h3 class="pull-left"><span class="semi-bold">List of Services Offered</span></h3>
              </div>
              <div class="clearfix"></div>
 
              <?php
              $qry = mysqli_query($connection, "select * from serviceoffered_view");
              while ($res = mysqli_fetch_assoc($qry)) {
              ?>
              <a href="contact-student-in-services.php?serviceofferedid=<?php echo $res['serviceofferedid'] ?>" class="open_ticket_comment">
              <div class="open_ticket_thumnail">
            
             
              </div>
              <div class="ticket_problem"><?php echo $res['serviceofferedtitle']; ?></div>
              <span ><?php echo $res['servicedescription']; ?></span>
             
              <p>Posted by:  <?php echo $res['firstname'] . " " . $res['middleinitial'] . " " . $res['lastname']; ?> <br>Date posted: <?php echo $res['dateposted']; ?></p>
              <br>
              </a>

              <?php } ?>
              
  

 
          
          
          </div>
          <div class="col-sm-4"></div>
        </div>
       
      </div>
    </div>
  </div>


<?php include('footer.php');  ?>
