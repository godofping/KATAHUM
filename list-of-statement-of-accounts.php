<?php include('connection.php');
$_SESSION['current-page'] = 'SOA';
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
        <div class="col-md-12">
          <div class="block-web">
           <div class="header">

            <br> 
             
              <h3 class="content-header">List of Statement of Accounts </h3>
 
   
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
                      <th>Contributions and Fines</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 

                    $qry = mysqli_query($connection, "select * from student_table");
                    while ($res = mysqli_fetch_assoc($qry)) { ?>
                      <tr>
                      <td><?php echo $res['studentidnumber']; ?></td>
                      <td><?php echo $res['firstname'] . " " . $res['middleinitial'] . " " . $res['lastname'] ; ?></td>
                      <td width="20">
                  <table class="table table-hover" style="width: 100%;">
			              <thead>
			                <tr>
			                  <th>Contribution Name</th>
			                  <th>Type</th>
			                  <th>Amount</th>
			                  <th>Status</th>
			                  <th>Date Paid</th>
			                  <th>Actions</th>
			                </tr>
			              </thead>
			              <tbody>

			                <?php $qry1 = mysqli_query($connection, "select * from statement_of_account_view where studentid = '" . $res['studentid'] . "'"); 
			                $totalpayment = 0;
			                while ($res1 = mysqli_fetch_assoc($qry1)) { ?>
		                	<tr>
		                		<td><?php echo $res1['nameofcontributionorfine']; ?></td>
		                		<td><?php echo $res1['type']; ?></td>
		                		<td>&#8369;<?php echo number_format($res1['amount'], 2); if ($res1['status'] == 'unpaid') {
		                			$ispayed = false;
		                			$totalpayment += $res1['amount'];
		                		} else { 
		                			$ispayed = true; 
		                		}?>
		                	
		                		</td>
		                		<td><?php echo $res1['status']; ?></td>
		                		<td><?php echo $res1['datepaid']; ?></td>
		                		<td><a href="javascript:void(0);"  data-toggle="modal" data-target="#RemoveModal<?php echo $res1['statementofaccountid']; ?>">Remove</a> | 
		                			<?php if ($ispayed == true): ?>
		                			<a href="javascript:void(0);"  data-toggle="modal" data-target="#ConvertToUnPaidModal<?php echo $res1['statementofaccountid']; ?>">Refund</a> 
		                			<?php endif ?>
		                			<?php if ($ispayed == false): ?>
		                			<a href="javascript:void(0);"  data-toggle="modal" data-target="#ConvertToPaidModal<?php echo $res1['statementofaccountid']; ?>">Pay</a> 
		                			<?php endif ?>


		                			 </td>
		                	</tr>


                       <!-- Remove Item Modal -->
                      <div class="modal fade" id="RemoveModal<?php echo $res1['statementofaccountid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title" id="myModalLabel">Are you sure to remove <strong><?php echo $res1['nameofcontributionorfine']; ?></strong> from <strong><?php echo $res['firstname'] . " " . $res['middleinitial'] . " " . $res['lastname'] ; ?></strong> statement of account?</h4>
                            </div>
                            <div class="modal-body">
                            <div style="text-align: center;"><a href="controller.php?from=remove-fines-from-statement-of-account&statementofaccountid=<?php echo $res1['statementofaccountid'] ?>&nameofcontributionorfine=<?php echo $res1['nameofcontributionorfine']; ?>&member=<?php echo $res['firstname'] . " " . $res['middleinitial'] . " " . $res['lastname'] ; ?>" class="btn btn-primary btn-lg">Yes</a>
                            <a href="#" class="btn btn-danger btn-lg" data-dismiss="modal">No</a></div>
                            
                            </div>
                            <div class="modal-footer">
                            
                         
                            </div>
                          </div>
                        </div>
                      </div>


                       <!-- Convert to paid Modal -->
                      <div class="modal fade" id="ConvertToPaidModal<?php echo $res1['statementofaccountid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title" id="myModalLabel">Confirm <strong><?php echo $res1['nameofcontributionorfine']; ?></strong> payment from <strong><?php echo $res['firstname'] . " " . $res['middleinitial'] . " " . $res['lastname'] ; ?></strong> statement of account?</h4>
                            </div>
                            <div class="modal-body">
                            <div style="text-align: center;"><a href="controller.php?from=convert-to-paid&statementofaccountid=<?php echo $res1['statementofaccountid'] ?>&nameofcontributionorfine=<?php echo $res1['nameofcontributionorfine']; ?>&member=<?php echo $res['firstname'] . " " . $res['middleinitial'] . " " . $res['lastname'] ; ?>" class="btn btn-primary btn-lg">Yes</a>
                            <a href="#" class="btn btn-danger btn-lg" data-dismiss="modal">No</a></div>
                            
                            </div>
                            <div class="modal-footer">
                            
                         
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- Convert to unpaid Modal -->
                      <div class="modal fade" id="ConvertToUnPaidModal<?php echo $res1['statementofaccountid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title" id="myModalLabel">Confirm <strong><?php echo $res1['nameofcontributionorfine']; ?></strong> refund from <strong><?php echo $res['firstname'] . " " . $res['middleinitial'] . " " . $res['lastname'] ; ?></strong> statement of account?</h4>
                            </div>
                            <div class="modal-body">
                            <div style="text-align: center;"><a href="controller.php?from=convert-to-unpaid&statementofaccountid=<?php echo $res1['statementofaccountid'] ?>&nameofcontributionorfine=<?php echo $res1['nameofcontributionorfine']; ?>&member=<?php echo $res['firstname'] . " " . $res['middleinitial'] . " " . $res['lastname'] ; ?>" class="btn btn-primary btn-lg">Yes</a>
                            <a href="#" class="btn btn-danger btn-lg" data-dismiss="modal">No</a></div>
                            
                            </div>
                            <div class="modal-footer">
                            
                         
                            </div>
                          </div>
                        </div>
                      </div>

			                <?php } ?>

			                <tr>
			                  <td colspan="1">Balance</td>
                        <td></td>
			                  <td><strong>	&#8369;<?php echo $totalpayment; ?></strong></td>
                        <td></td>
                        <td></td>
                        <td></td>


			                </tr>
			                
			              </tbody>
			            </table>
                      	

                      </td>
                    </td>
                   
                        <td><a href="javascript:void(0);"  data-toggle="modal" data-target="#AddModal<?php echo $res['studentid']; ?>">Add Contributions or Fines</a> <br> <a href="javascript:void(0);"  data-toggle="modal" data-target="#DisplayRecieptModal<?php echo $res['studentid']; ?>">Display Reciept</a></td>
                  
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


  <?php 

  $qry3 = mysqli_query($connection, "select * from student_table");
  while ($res = mysqli_fetch_assoc($qry3)) { 
$studentid = $res['studentid']; 
  	?>

<!-- Add Modal -->
<div class="modal fade" id="AddModal<?php echo $res['studentid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Add contribution or fines to <strong><?php echo $res['firstname'] . " " . $result['middleinitial'] . " " . $result['lastname']; ?></strong> account</h4>
      </div>
      <div class="modal-body">
      <form role="form" class="form-horizontal" method="POST" action="controller.php" enctype="multipart/form-data">


  	<input type="text" name="studentid" value="<?php echo $res['studentid'] ?>" hidden="">
  	<input type="text" name="member" value="<?php echo $res['firstname'] . " " . $res['middleinitial'] . " " . $res['lastname']; ?>" hidden="" >


       <div class="form-group">
           <label class="col-sm-3 control-label">Name of Contribution or Fine</label>
            <div class="col-sm-9">
              <select class="form-control" id="contributionandfineid" name="contributionandfineid" required="" >
              	<option selected="" disabled=""> Please Select </option>  
              	<?php $qry9 = mysqli_query($connection, "select * from list_of_contribution_and_fine_table");
              	while ($res23 = mysqli_fetch_assoc($qry9)) {
              		$qry4 = mysqli_query($connection, "SELECT COUNT(*) AS numofrows FROM statement_of_account_view WHERE studentid = '" . $studentid . "' AND contributionandfineid = '" . $res23['contributionandfineid'] . "'");
              		$res4 = mysqli_fetch_assoc($qry4);
              	if($res4['numofrows'] <= 0){
              	 ?>

                <option value="<?php echo $res23['contributionandfineid']; ?>"> <?php echo $res23['nameofcontributionorfine']; ?> </option>  
                <?php 
            }
            	} ?>
              </select>
            </div>
        </div>
 

      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
     
        
        <input type="text" name="from" value="addcof" hidden="" >
        <button type="submit" class="btn btn-primary">Add</button>
      </form>
      </div>
    </div>
  </div>
</div>



<!-- Display Modal -->
<div class="modal fade" id="DisplayRecieptModal<?php echo $res['studentid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Reciept of <strong><?php echo $res['firstname'] . " " . $result['middleinitial'] . " " . $result['lastname']; ?></strong></h4>
      </div>
      <div class="modal-body">

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

              



 

      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
     
  

     
      </div>
    </div>
  </div>
</div>










  <?php } ?>



<?php include('footer.php');  ?>
