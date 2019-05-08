<?php include('connection.php');
$_SESSION['current-page'] = 'dashboard';
 ?>
<?php include('header.php'); ?>
   <!--\\\\\\\left_nav end \\\\\\-->
    <div class="contentpanel">
      <!--\\\\\\\ contentpanel start\\\\\\-->
      <div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
          <h1>DASHBOARD</h1>
          <h2 class="">Home</h2>
        </div>
        
      </div>
      <div class="container clear_both padding_fix">
        <!--\\\\\\\ container  start \\\\\\-->

        <div class="information green_info">   
              <div class="information_inner">
                <div class="info green_symbols"><i class="fa fa-users icon"></i></div>
                <span>NUMBER OF MEMBERS REGISTERED IN THE ORGANIZATION </span>
                <h1 class="bolded"><?php $qry = mysqli_query($connection, "select count(*) as result from student_table"); $res = mysqli_fetch_assoc($qry); echo $res['result'];?></h1>
                <div class="infoprogress_green">
                  <div class="greenprogress"></div>
                </div>
              
                <div class="pull-right" id="work-progress1"><canvas width="47" height="20" style="display: inline-block; vertical-align: top; width: 47px; height: 20px;"></canvas></div>
              </div>
            </div>

            <div class="information green_info">   
              <div class="information_inner">
                <div class="info green_symbols"><i class="fa fa-user icon"></i></div>
                <span>NUMBER OF TEACHERS REGISTERED IN THE ORGANIZATION </span>
                <h1 class="bolded"><?php $qry = mysqli_query($connection, "select count(*) as result from teacher_table"); $res = mysqli_fetch_assoc($qry); echo $res['result'];?></h1>
                <div class="infoprogress_green">
                  <div class="greenprogress"></div>
                </div>
              
                <div class="pull-right" id="work-progress1"><canvas width="47" height="20" style="display: inline-block; vertical-align: top; width: 47px; height: 20px;"></canvas></div>
              </div>
            </div>

            <div class="information green_info">   
              <div class="information_inner">
                <div class="info green_symbols"><i class="fa fa-user icon"></i></div>
                <span>NUMBER OF VIEWERS REGISTERED IN THE ORGANIZATION </span>
                <h1 class="bolded"><?php $qry = mysqli_query($connection, "select count(*) as result from viewer_table"); $res = mysqli_fetch_assoc($qry); echo $res['result'];?></h1>
                <div class="infoprogress_green">
                  <div class="greenprogress"></div>
                </div>
              
                <div class="pull-right" id="work-progress1"><canvas width="47" height="20" style="display: inline-block; vertical-align: top; width: 47px; height: 20px;"></canvas></div>
              </div>
            </div>

            <div class="information green_info">   
              <div class="information_inner">
                <div class="info green_symbols"><i class="fa fa-user icon"></i></div>
                <span>NUMBER OF POSTED SERVICES </span>
                <h1 class="bolded"><?php $qry = mysqli_query($connection, "select count(*) as result from serviceoffered_view"); $res = mysqli_fetch_assoc($qry); echo $res['result'];?></h1>
                <div class="infoprogress_green">
                  <div class="greenprogress"></div>
                </div>
              
                <div class="pull-right" id="work-progress1"><canvas width="47" height="20" style="display: inline-block; vertical-align: top; width: 47px; height: 20px;"></canvas></div>
              </div>
            </div>


<?php include('footer.php');  ?>
