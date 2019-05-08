<?php include('connection.php');
$_SESSION['current-page'] = 'reports';
 ?>
<?php include('header.php'); ?>
   <!--\\\\\\\left_nav end \\\\\\-->
    <div class="contentpanel">
      <!--\\\\\\\ contentpanel start\\\\\\-->
      <div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
          <h1>REPORTS</h1>
          <h2 class="">Receipt</h2>
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
             
              <h3 class="content-header">List of Reciepts</h3>
 
   
              <br>
              <?php if (isset($_GET['nameofcontributionorfine']) and isset($_GET['w']) and $_GET['w'] == 'added'): ?>
                <div class="alert alert-success"> <strong><?php echo $_GET['nameofcontributionorfine']; ?></strong> is successfully added to <?php echo $_GET['member']; ?> statement of account!</div>
              <?php endif ?>
              <?php if (isset($_GET['nameofcontributionorfine']) and isset($_GET['w']) and $_GET['w'] == 'deleted'): ?>
                <div class="alert alert-danger"> <strong><?php echo $_GET['nameofcontributionorfine']; ?></strong> is successfully removed from <?php echo $_GET['member']; ?> statement of account!</div>
              <?php endif ?>
              <?php if (isset($_GET['nameofcontributionorfine']) and isset($_GET['w']) and $_GET['w'] == 'update'): ?>
                <div class="alert alert-success"> <strong><?php echo $_GET['nameofcontributionorfine']; ?></strong> is successfully updated from <?php echo $_GET['member']; ?> statement of account!</div>
              <?php endif ?>


  

            </div>
         <div class="porlets-content">
            <div class="table-responsive">
                <table  class="display table table-bordered table-striped" id="dynamic-table">
                  <thead>
                    <tr>
                      <th>Student ID Number</th>
                      <th>Full Name</th>
                      <th>Receipt</th>
                   
                    </tr>
                  </thead>
                  <tbody>
                    <?php 

                    $qry = mysqli_query($connection, "select * from student_table");
                    while ($res = mysqli_fetch_assoc($qry)) { ?>
                      <tr>
                      <td><?php echo $res['studentidnumber']; ?></td>
                      <td><?php echo $res['firstname'] . " " . $res['middleinitial'] . " " . $res['lastname'] ; ?></td>
                      <td>
                        
                        <table class="table table-hover" style="width: 100%;">
                <thead>
                  <tr>
                    <th>Contribution Name</th>
                    <th>Type</th>
                    <th>Amount</th>
              
           
                  </tr>
                </thead>
                <tbody>

                  <?php $qry1 = mysqli_query($connection, "select * from statement_of_account_view where studentid = '" . $res['studentid'] . "' and status = 'paid'"); 
                  $totalpayment = 0;
                  while ($res1 = mysqli_fetch_assoc($qry1)) { ?>
                  <tr>
                    <td><?php echo $res1['nameofcontributionorfine']; ?></td>
                    <td><?php echo $res1['type']; ?></td>
                    <td>&#8369;<?php echo $res1['amount']; if ($res1['status'] == 'unpaid') {
                      $ispayed = false;
                      $totalpayment += $res1['amount'];
                    } else { 
                      $ispayed = true; 
                    }?>
                  
                    </td>

                  
           
                  </tr>

                  <?php } ?>
                </tbody>
              </table>

                      </td>
                   
                  
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
