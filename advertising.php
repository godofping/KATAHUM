<?php include('connection.php');
$_SESSION['current-page'] = 'advertising';
 ?>
<?php include('header.php'); ?>
   <!--\\\\\\\left_nav end \\\\\\-->
    <div class="contentpanel">
      <!--\\\\\\\ contentpanel start\\\\\\-->
      <div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
          <h1>S.O.A.</h1>
          <h2 class="">List of statement of accounts</h2>
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
                <h3 class="pull-left"><span class="semi-bold">Announced Artwok Categories</span></h3>
              </div>
              <div class="clearfix"></div>
 
              <?php
              $qry = mysqli_query($connection, "select * from announced_artwork_category_view");
              while ($res = mysqli_fetch_assoc($qry)) {
              ?>
              <a href="submit-artworks.php?announcedartworkcategoryid=<?php echo $res['announcedartworkcategoryid'] ?>" class="open_ticket_comment">
              <div class="open_ticket_thumnail">
            
             
              </div>
              <div class="ticket_problem"><?php echo $res['artworkcategoryname']; ?></div>
              <span ><?php echo $res['description']; ?></span>
             
              <p>Posted by:  <?php echo $res['fullname']; ?> <br>Date posted: <?php echo $res['dateannounced']; ?></p>
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
