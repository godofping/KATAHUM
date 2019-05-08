<?php include('connection.php');
$_SESSION['current-page'] = 'reports';
 ?>
<?php include('header.php'); ?>
   <!--\\\\\\\left_nav end \\\\\\-->
    <div class="contentpanel">
      <!--\\\\\\\ contentpanel start\\\\\\-->
      <div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
          <h1>ADVERTISING</h1>
          <h2 class="">List of Artwork Category</h2>
        </div>
        
      </div>
      <div class="container clear_both padding_fix">
        <!--\\\\\\\ container  start \\\\\\-->

   <div id="main-content">
    <div class="page-content">
      
      
       
      <div class="row">
        <div class="col-md-12">
          <div class="block-web">
           <div class="header">
              <br>
              <h3 class="content-header">List of Services </h3>
              <br>
    

              


            </div>
         <div class="porlets-content">
            <div class="table-responsive">
                <table  class="display table table-bordered table-striped" id="dynamic-table">
                  <thead>
                    <tr>
                      <th>Title</th>
                      <th>Description</th>
                      <th>Date Posted</th>
                      <th>Posted By</th>
                      <th>Image</th>

                    
                    </tr>
                  </thead>
                  <tbody>
                    <?php 

                    $qry = mysqli_query($connection, "select * from serviceoffered_view");
                    while ($res = mysqli_fetch_assoc($qry)) { ?>
                      <tr>
                      <td><?php echo $res['serviceofferedtitle']; ?></td>
                      <td><?php echo $res['servicedescription']; ?></td>
                      <td><?php echo $res['dateposted']; ?></td>
                      <td><?php echo $res['firstname'] . " " . $res['middleinitial'] . " " . $res['lastname']; ?></td>
                      
                      <td><img src="<?php echo $res['imagelocation']; ?>" height = 50px; width = 50px;></td>
             
      
                    </tr>
                    <?php } ?>
                  
                  </tbody>
        
                </table>
              </div><!--/table-responsive-->
            </div><!--/porlets-content-->
            
            
          </div><!--/block-web--> 
        </div><!--/col-md-12--> 
      </div><!--/row-->

 
      
           
        </div><!--/page-content end--> 
  </div>







<?php include('footer.php');  ?>
