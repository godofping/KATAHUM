<?php include('connection.php');
$_SESSION['current-page'] = 'advertising';
 ?>
<?php include('header.php'); ?>
   <!--\\\\\\\left_nav end \\\\\\-->
    <div class="contentpanel">
      <!--\\\\\\\ contentpanel start\\\\\\-->
      <div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
          <h1>ADVERTISING</h1>
          <h2 class="">Submitted Artwork</h2>
        </div>
        
      </div>
      <div class="container clear_both padding_fix">
        <!--\\\\\\\ container  start \\\\\\-->



      <div class="row">
      	<div class="col-lg-12">

<br>
<br>
                <h1 class="red_text text-center"><strong>My Submitted Artworks</strong></h1>
                <h3 class="green_text text-center"></h3>
                <br>
      </div>


      </div>

      		<?php
      		$qry = mysqli_query($connection, "select * from artwork_view where announcedartworkcategoryid = '" . $_GET['announcedartworkcategoryid'] . "'");
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
         			<h5 class="text-left"><?php echo $res['message']; ?></h5>
         		</div>



                  </div>
                </div>
              </section>
            </div>
      		<?php } ?>

      		<?php if (mysqli_num_rows($qry) <= 0): ?>
      			<h4 style="text-align: center;">You have no submitted artwork here.</h4>
      		<?php endif ?>



<?php include('footer.php');  ?>
