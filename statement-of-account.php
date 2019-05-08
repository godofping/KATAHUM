<?php include('connection.php');
$_SESSION['current-page'] = 'statementofaccount';
 ?>
<?php include('header.php'); ?>
   <!--\\\\\\\left_nav end \\\\\\-->
    <div class="contentpanel">
      <!--\\\\\\\ contentpanel start\\\\\\-->
      <div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
          <h1>S.O.A.</h1>
          <h2 class="">Statement of Account</h2>
        </div>
        
      </div>
      <div class="container clear_both padding_fix">
        <!--\\\\\\\ container  start \\\\\\-->

   <div id="main-content">
    <div class="page-content">


      
      <div class="invoice_body">


         <div class="row">
            <div class="col-lg-12">
                <h1 class="red_text text-center"><strong>STATEMENT OF ACCOUNT</strong></h1>
            </div>
         </div>
      

            <div class="clearfix"></div>
            <br>
            <br>

            
            <table class="table table-hover" style="width: 100%;">
                    <thead>
                      <tr>
                        <th>Contribution Name</th>
                        <th>Type</th>
                        <th>Amount</th>
                  
               
                      </tr>
                    </thead>
                    <tbody>

                      <?php $qry1 = mysqli_query($connection, "select * from statement_of_account_view where studentid = '" . $_SESSION['studentid'] . "' and status = 'unpaid'"); 
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
            
            <div class="invoice_footer">
            <div class="row">
              <div class="col-sm-7">

              </div>
              <div class="col-sm-5">
                <div class="invoice_total pull-right">
                  <h3><strong>Balance: <span class="well_text">&#8369;<?php echo $totalpayment; ?></span></strong></h3>
                </div>
              </div>
            </div>
          </div>
           
           
            <div class="row">
            <div class="col-sm-12">
              <p class="footer_text">**Please pay your balances.</p>
            </div>
          </div> 
            
          </div>
       
      

 
      
           
        </div><!--/page-content end--> 
  </div>


<?php include('footer.php');  ?>
