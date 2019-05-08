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
          <h2 class="">Financial Statement</h2>
        </div>
        
      </div>
      <div class="container clear_both padding_fix">
        <!--\\\\\\\ container  start \\\\\\-->

          <div class="panel-heading"> <h2>Financial Statement</h2></div>
        <div class="panel-body">


              
                <table class="table">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Total Collectables</th>
                      <th>Total Collected</th>
                      <th>Total Not Yet Collected</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                    <?php 
                    $qry = mysqli_query($connection, "select * from list_of_contribution_and_fine_table");
                    while ($res = mysqli_fetch_assoc($qry)) { 

                    $qry1 = mysqli_query($connection, "SELECT SUM(amount) AS total FROM statement_of_account_view WHERE STATUS = 'paid' and contributionandfineid = '" . $res['contributionandfineid'] . "'");
                    $res1 = mysqli_fetch_assoc($qry1);

                    $qry2 = mysqli_query($connection, "SELECT SUM(amount) AS total FROM statement_of_account_view WHERE STATUS = 'unpaid' and contributionandfineid = '" . $res['contributionandfineid'] . "'");
                    $res2 = mysqli_fetch_assoc($qry2);

                    $qry3 = mysqli_query($connection, "SELECT SUM(amount) AS total FROM statement_of_account_view WHERE  contributionandfineid = '" . $res['contributionandfineid'] . "'");
                    $res3 = mysqli_fetch_assoc($qry3);

                    ?>

                    <tr>
                      <td><?php echo $res['nameofcontributionorfine']; ?></td>
                      <td>₱ <?php echo number_format($res3['total'], 2); ?></td>
                      <td>₱ <?php echo number_format($res1['total'], 2); ?></td>
                      <td>₱ <?php echo number_format($res2['total'], 2); ?></td>
                    </tr>
                      
                   <?php } ?>
               
                  </tbody>
                </table>
              </div>


<?php include('footer.php');  ?>
