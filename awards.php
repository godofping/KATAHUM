<?php include('connection.php');
$_SESSION['current-page'] = 'updates';
 ?>
<?php include('header.php'); ?>
   <!--\\\\\\\left_nav end \\\\\\-->
    <div class="contentpanel">
      <!--\\\\\\\ contentpanel start\\\\\\-->
      <div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
          <h1>UPDATES</h1>
          <h2 class="">AWARDS</h2>
        </div>
        
      </div>



      <div class="container clear_both padding_fix">
        <!--\\\\\\\ container  start \\\\\\-->



   <div id="main-content">
    <div class="page-content">

         <div class="row">
            <div class="col-lg-12">
                <h1 class="red_text text-center"><strong>AWARDS</strong></h1>
            </div>
         </div>
      
  <?php $qry = mysqli_query($connection, "select * from award_view"); 
while ($res = mysqli_fetch_assoc($qry)) {
  ?>



    <div class="col-lg-12">
            <section class="panel default blue_title h1">
              <div class="panel-heading"><?php echo $res['awardtitle']; ?><h6 class="green_text">Posted by: <?php echo $res['firstname'] . " " . $res['middleinitial'] . " " . $res['lastname'] ; ?> <span class="red_text" style="padding-left: 10px;"><?php echo date("M jS, Y", strtotime($res['dateposted']));; ?></span></h6></div>

              <div class="panel-body">
                <p style="white-space: pre;"><?php echo $res['awarddescription']; ?></p>
           
              </div>
            </section>
          </div>

  <?php } ?>
 
      
           
        </div><!--/page-content end--> 
  </div>







<?php include('footer.php');  ?>
