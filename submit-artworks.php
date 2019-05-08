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
          <h2 class="">Submit Artwork</h2>
        </div>
        
      </div>
      <div class="container clear_both padding_fix">
        <!--\\\\\\\ container  start \\\\\\-->

        <div class="row">
        <div class="col-md-12">
          <div class="block-web">
            <div class="header">

              <h3 class="content-header">Submit Artwork</h3>
            </div>

            <?php 
            $qry = mysqli_query($connection, "select * from announced_artwork_category_view where announcedartworkcategoryid = '" . $_GET['announcedartworkcategoryid'] . "'");
            $res = mysqli_fetch_assoc($qry);


            ?>
            
            <?php if (isset($_GET['status']) and $_GET['status'] == 'submitted'): ?>
            	<div class="alert alert-success">
		      <strong>Success!</strong> Your artwork is successfully submitted.
		    </div>
            <?php endif ?>


            <div class="porlets-content">
              <h4><?php echo $res['fullname']; ?> wants you to submit a/an <?php echo $res['artworkcategoryname']; ?> artwork. <br> 
              <br>
              "<?php echo $res['description']; ?>"
          		</h4>
              <br>
              <form action ="controller.php"  method="POST" enctype="multipart/form-data" class="">

                <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                <div class="row fileupload-buttonbar">
                	<textarea class="form-control" name="message" rows="5" cols="20" required="">Your message</textarea>
                  	<br>
                  	<br>

                  <div class="col-lg-12"> 

                    <!-- The fileinput-button span is used to style the file input field as button --> 
                    <span class="btn btn-success fileinput-button"> <i class="glyphicon glyphicon-plus"></i> <span>Add Image</span>
                    <input type="file" name="uploadfile" required="">
                    </span>
                    <input type="text" name="from" value="submit-artwork" hidden>
                    <input type="text" name="announcedartworkcategoryid" value="<?php echo $res['announcedartworkcategoryid']; ?>" hidden>
                    <button type="submit" class="btn btn-primary start"> <i class="glyphicon glyphicon-upload"></i> <span>Start upload</span> </button>
                </div>

              
       
              </form>
              <br>
                <br>
                  <br>
              <div class="panel panel-default">
                <div class="panel-heading">

                  <h3 class="panel-title">Upload Notes</h3>
                </div>
                <div class="panel-body">
            <ul>
                <li>The maximum file size for uploads is <strong>5 MB</strong>.</li>
                <li>Only image files (<strong>JPG, GIF, PNG</strong>) are allowed .</li>
                <li>No <strong>trolling</strong> please .</li>
        
          
         
            </ul>
        </div>
              </div>
            </div>
            
          </div>
          <!--/block-web--> 
        </div>
        <!--/col-md-12--> 
      </div>


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
      		$qry = mysqli_query($connection, "select * from artwork_view where announcedartworkcategoryid = '" . $_GET['announcedartworkcategoryid'] . "' and studentid = '" . $_SESSION['studentid'] . "'");
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
