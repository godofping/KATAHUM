<?php if (!(isset($_SESSION['adminid']) or isset($_SESSION['teacherid']) or isset($_SESSION['viewerid']) or isset($_SESSION['studentid']))) {
  header("Location: logout.php");
} 

if (isset($_SESSION['adminid'])) {
  $qry = mysqli_query($connection, "select * from admin_table where adminid = '" . $_SESSION['adminid'] . "'");
  $displayloggedinas = 'Administator';
}
if (isset($_SESSION['studentid'])) {
  $qry = mysqli_query($connection, "select * from student_table where studentid = '" . $_SESSION['studentid'] . "'");
  $displayloggedinas = 'Student';
}
if (isset($_SESSION['teacherid'])) {
  $qry = mysqli_query($connection, "select * from teacher_table where teacherid = '" . $_SESSION['teacherid'] . "'");
  $displayloggedinas = 'Teacher';
}
if (isset($_SESSION['viewerid'])) {
  $qry = mysqli_query($connection, "select * from viewer_table where viewerid = '" . $_SESSION['viewerid'] . "'");
  $displayloggedinas = 'Viewer';
}




$result = mysqli_fetch_assoc($qry);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Online Katahum Drafting Organization of SKSU Isulan Campus</title>
<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
<link href="css/font-awesome.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="css/animate.css" rel="stylesheet" type="text/css" />
<link href="css/admin.css" rel="stylesheet" type="text/css" />
<link href="plugins/data-tables/DT_bootstrap.css" rel="stylesheet">
<link href="plugins/advanced-datatable/css/demo_table.css" rel="stylesheet">
<link href="plugins/advanced-datatable/css/demo_page.css" rel="stylesheet">
<link href="plugins/bootstrap-fileupload/bootstrap-fileupload.min.css" rel="stylesheet">
<link href="plugins/checkbox/minimal/blue.css" rel="stylesheet" type="text/css" />
<link href="plugins/checkbox/minimal/green.css" rel="stylesheet" type="text/css" />
<link href="plugins/checkbox/minimal/grey.css" rel="stylesheet" type="text/css" />
<link href="plugins/checkbox/minimal/orange.css" rel="stylesheet" type="text/css" />
<link href="plugins/checkbox/minimal/pink.css" rel="stylesheet" type="text/css" />
<link href="plugins/checkbox/minimal/purple.css" rel="stylesheet" type="text/css" />
<link href="plugins/bootstrap-fileupload/bootstrap-fileupload.min.css" rel="stylesheet">
<link href="plugins/dropzone/dropzone.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="plugins/bootstrap-datepicker/css/datepicker.css" />
<link rel="stylesheet" type="text/css" href="plugins/bootstrap-timepicker/compiled/timepicker.css" />
<link rel="stylesheet" type="text/css" href="plugins/bootstrap-colorpicker/css/colorpicker.css" />
<link rel="stylesheet" href="plugins/file-uploader/css/blueimp-gallery.min.css">
<link rel="stylesheet" href="plugins/file-uploader/css/jquery.fileupload.css">
<link rel="stylesheet" href="plugins/file-uploader/css/jquery.fileupload-ui.css">
<link href="plugins/map/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />





<script src="js/jquery.js"></script>
</head>
<body class="light_theme fixed_header left_nav_fixed">
<div class="wrapper">
  <!--\\\\\\\ wrapper Start \\\\\\-->
  <div class="header_bar">
    <!--\\\\\\\ header Start \\\\\\-->
    <div class="brand">
      <!--\\\\\\\ brand Start \\\\\\-->
      <div class="logo" style="display:block"><span class="theme_color">OKDOSIC</span> WEBSITE</div>
      <div class="small_logo" style="display:none"><img src="images/s-logo.png" width="50" height="47" alt="s-logo" /> <img src="images/r-logo.png" width="122" height="20" alt="r-logo" /></div>

    </div>
    <!--\\\\\\\ brand end \\\\\\-->
     <div class="header_top_bar">
      <!--\\\\\\\ header top bar start \\\\\\-->
      <a href="javascript:void(0);" class="menutoggle"> <i class="fa fa-bars"></i> </a>
      <div class="top_left">
        <div class="top_left_menu">

        </div>
      </div>
    
      <div class="top_right_bar">

        <?php if (isset($_SESSION['viewerid']) or isset($_SESSION['studentid'])): ?>
          <div class="top_right">
          <div class="top_right_menu">
            <ul>

              <?php 
                if (isset($_SESSION['viewerid'])) {
                  $qry13 = mysqli_query($connection, "select count(*) as total from service_offered_conversation_view where isread = 0 and viewerid = '" . $_SESSION['viewerid'] . "' and fromwho = 'student'");

                }
                if (isset($_SESSION['studentid'])) {
                  $qry13 = mysqli_query($connection, "select count(*) as total from service_offered_conversation_view where isread = 0 and studentid = '" .  $_SESSION['studentid']. "' and fromwho = 'viewer'");
                }

                $res13 = mysqli_fetch_assoc($qry13);

              ?>
            
              <li class="dropdown"> <a href="javascript:void(0);" data-toggle="dropdown" style="margin-left: -160px"> Mail <span class="badge badge color_1"><?php echo $res13['total']; ?></span> </a>
                <ul class="drop_down_task dropdown-menu" style="margin-left: -160px">
                  <div class="top_pointer"></div>
                  <li>
                    <p class="number">You have <?php echo $res13['total']; ?> mails</p>
                  </li>

                     <?php 
                      if (isset($_SESSION['viewerid'])) {
                        $qry13 = mysqli_query($connection, "select * from service_offered_conversation_view where isread = 0 and viewerid = '" . $_SESSION['viewerid'] . "' and fromwho = 'student'");

                      }
                      if (isset($_SESSION['studentid'])) {
                        $qry13 = mysqli_query($connection, "select * from service_offered_conversation_view where isread = 0 and studentid = '" .  $_SESSION['studentid']. "' and fromwho = 'viewer'");
                      }
                      while ($res13 = mysqli_fetch_assoc($qry13)) {

                      ?>
                       <li> <a href="controller.php?from=inbox-header&serviceofferedid=<?php echo $res13['serviceofferedid'] ?>&serviceofferedconversationid=<?php echo $res13['serviceofferedconversationid']; ?>" class="mail"> <span class="photo"><img src="images/message.png" width="40px" height="40px" /></span> <span class="subject"> <span class="from">
                       <?php 
                       if (isset($_SESSION['studentid'])) {
                         echo $res13['vfirstname'] . " " . $res13['vmiddleinitial'] . " " . $res13['vlastname'];
                       }
                       elseif(isset($_SESSION['viewerid']))
                       {
                          echo $res13['sfirstname'] . " " . $res13['smiddleinitial'] . " " . $res13['slastname'];
                       }

                       ?>
                         
                       </span> <span class="time"><?php echo date($res13['datetime'], strtotime("H:i:s")); ?></span> </span> <span class="message"><?php echo $res13['message']; ?></span> </a> 
                      </li>
                      <?php } ?>
                 
              
                </ul>
              </li>
  
            </ul>
          </div>
        </div>
        <?php endif ?>


        <div class="user_admin dropdown"> <a href="javascript:void(0);" data-toggle="dropdown"><img style="margin-left: -120px" src="<?php if(isset($_SESSION['studentid'])){ echo $result['profilepicturelocation']; } else { echo "images/profile.png";} ?>" width="40px" height="40px" /><span class="user_adminname"><?php echo $result['firstname'] . " " . $result['middleinitial'] . " " . $result['lastname']; ?></span> <b class="caret"></b> </a>
          <ul class="dropdown-menu">
            <div class="top_pointer"></div>
            <li> <a href="profile.php"><i class="fa fa-user"></i> Profile</a> </li>
            <li> <a href="logout.php"><i class="fa fa-power-off"></i> Logout</a> </li>
          </ul>
        </div>


        
      </div>
    </div>

    <!--\\\\\\\ header top bar end \\\\\\-->
  </div>
  <!--\\\\\\\ header end \\\\\\-->
  <div class="inner">
    <!--\\\\\\\ inner start \\\\\\-->
    <div class="left_nav">
      <!--\\\\\\\left_nav start \\\\\\-->
      <br>

      <?php if (isset($_SESSION['adminid'])): ?>

        <div class="left_nav_slidebar">
        <ul>
          
          <li 
          <?php if (isset($_SESSION['current-page']) and $_SESSION['current-page'] == 'elections'): ?>
            class="left_nav_active theme_border"
          <?php endif ?>>
          <a href="javascript:void(0);"> <i class="fa fa-home"></i> DASHBOARD <span class="plus"><i class="fa fa-plus"></i></span></a>
            <ul <?php if (isset($_SESSION['current-page']) and $_SESSION['current-page'] == 'dashboard'): ?>
              class="opened" style="display: block"
            <?php endif ?>>
              <li> <a href="admin-dashboard.php"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Home</b> </a> 
              </li>
            
            
            </ul>
          </li>

          <li 
          <?php if (isset($_SESSION['current-page']) and $_SESSION['current-page'] == 'members'): ?>
            class="left_nav_active theme_border"
          <?php endif ?>>
          <a href="javascript:void(0);"> <i class="fa fa-group"></i> MEMBERS <span class="plus"><i class="fa fa-plus"></i></span></a>
            <ul <?php if (isset($_SESSION['current-page']) and $_SESSION['current-page'] == 'members'): ?>
              class="opened" style="display: block"
              <?php endif ?>>
              <li> <a href="list-of-members.php"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>List of Organization Members</b> </a> 
              </li>
            </ul>
          </li>

          <li 
          <?php if (isset($_SESSION['current-page']) and $_SESSION['current-page'] == 'viewers'): ?>
            class="left_nav_active theme_border"
          <?php endif ?>>
          <a href="javascript:void(0);"> <i class="fa fa-user"></i> VIEWERS <span class="plus"><i class="fa fa-plus"></i></span></a>
            <ul <?php if (isset($_SESSION['current-page']) and $_SESSION['current-page'] == 'viewers'): ?>
              class="opened" style="display: block"
              <?php endif ?>>
              <li> <a href="list-of-viewers.php"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>List of Viewers </b> </a> 
              </li>
            </ul>
          </li>

          <li 
          <?php if (isset($_SESSION['current-page']) and $_SESSION['current-page'] == 'teachers'): ?>
            class="left_nav_active theme_border"
          <?php endif ?>>
          <a href="javascript:void(0);"> <i class="fa fa-user-md"></i> TEACHERS <span class="plus"><i class="fa fa-plus"></i></span></a>
            <ul <?php if (isset($_SESSION['current-page']) and $_SESSION['current-page'] == 'teachers'): ?>
              class="opened" style="display: block"
              <?php endif ?>>
              <li> <a href="list-of-teachers.php"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>List of Teachers </b> </a> 
              </li>
            </ul>
          </li>




          <li 
          <?php if (isset($_SESSION['current-page']) and $_SESSION['current-page'] == 'elections'): ?>
            class="left_nav_active theme_border"
          <?php endif ?>>
          <a href="javascript:void(0);"> <i class="fa fa-pencil"></i> ELECTION <span class="plus"><i class="fa fa-plus"></i></span></a>
            <ul <?php if (isset($_SESSION['current-page']) and $_SESSION['current-page'] == 'elections'): ?>
              class="opened" style="display: block"
              <?php endif ?>>
              <li> <a href="list-of-party.php"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>List of Party</b> </a> 
              </li>
              <li> <a href="list-of-aspiring-members.php"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>List of Aspiring Officers</b> </a> 
              </li>
              <li> <a href="list-of-election-officers.php"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>List of Election Officers</b> </a> 
              </li>
              <li> <a href="election-result.php"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Election Result</b> </a> 
              </li>
              <li> <a href="election-setting.php"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Election Setting</b> </a> 
              </li>
     
     
            
            
            </ul>
          </li>


          <li 
          <?php if (isset($_SESSION['current-page']) and $_SESSION['current-page'] == 'updates'): ?>
            class="left_nav_active theme_border"
          <?php endif ?>
>          <a href="javascript:void(0);"> <i class="fa fa-rss-square"></i> UPDATES <span class="plus"><i class="fa fa-plus"></i></span></a>
            <ul <?php if (isset($_SESSION['current-page']) and $_SESSION['current-page'] == 'updates'): ?>
              class="opened" style="display: block"
            <?php endif ?>>
              <li> <a href="list-of-news.php"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>List of News</b> </a> 
              </li>
              <li> <a href="list-of-events.php"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>List of Events</b> </a> 
              </li>
              <li> <a href="list-of-awards.php"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>List of Awards</b> </a> 
              </li>
            </ul>
          </li>

          <li 
          <?php if (isset($_SESSION['current-page']) and $_SESSION['current-page'] == 'SOA'): ?>
            class="left_nav_active theme_border"
          <?php endif ?>
>          <a href="javascript:void(0);"> <i class="fa fa-money"></i> S.O.A. <span class="plus"><i class="fa fa-plus"></i></span></a>
            <ul <?php if (isset($_SESSION['current-page']) and $_SESSION['current-page'] == 'SOA'): ?>
              class="opened" style="display: block"
            <?php endif ?>>
              <li> <a href="list-of-contributions-and-fines.php"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>List of Contributions and Fines</b> </a> 
              </li>
              <li> <a href="list-of-statement-of-accounts.php"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>List of Statement of Accounts</b> </a> 

            </ul>
          </li>

          <li 
          <?php if (isset($_SESSION['current-page']) and $_SESSION['current-page'] == 'advertising'): ?>
            class="left_nav_active theme_border"
          <?php endif ?>
>          <a href="javascript:void(0);"> <i class="fa fa-paperclip"></i> ARTWORK ACTIVITY <span class="plus"><i class="fa fa-plus"></i></span></a>
            <ul <?php if (isset($_SESSION['current-page']) and $_SESSION['current-page'] == 'advertising'): ?>
              class="opened" style="display: block"
            <?php endif ?>>
              <li> <a href="list-of-artwork-category.php"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>List of Artwork Category</b> </a> 
              </li>
              <li> <a href="list-of-artworks.php"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>List of Artworks</b> </a> 

            </ul>
          </li>



          <li 
          <?php if (isset($_SESSION['current-page']) and $_SESSION['current-page'] == 'reports'): ?>
            class="left_nav_active theme_border"
          <?php endif ?>>
          <a href="javascript:void(0);"> <i class="fa fa-book"></i> REPORTS <span class="plus"><i class="fa fa-plus"></i></span></a>
            <ul <?php if (isset($_SESSION['current-page']) and $_SESSION['current-page'] == 'reports'): ?>
              class="opened" style="display: block"
            <?php endif ?>>
              
            <!--   <li> <a href="admin-dashboard.php"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Statement of Account</b> </a> 
              </li>
              <li> <a href="admin-dashboard.php"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b> Receipt (Acknowledgement Receipt)</b> </a> 
              </li> -->
              <li> <a href="list-of-members-report.php"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>List of Members</b> </a> 
              </li>
              <li> <a href="list-of-aspiring-members-report.php"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>List of Aspiring Members</b> </a> 
              </li>
              <li> <a href="election-result1.php"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>List of Election Officers</b> </a> 
              </li>
              <li> <a href="list-of-statement-of-accounts-reports.php"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Statement of Account</b> </a> 
              </li>
              <li> <a href="receipt-reports.php"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Receipt</b> </a> 
              </li>
              <li> <a href="financial-statement.php"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Financial Statement (Grand Total of Collectibles and Collections)</b> </a> 
              </li>
              <li> <a href="list-of-services-reports.php"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>List of Services</b> </a> 
              </li>

            
            
            </ul>
          </li>

  
          
          
        </ul>
      </div>
      <?php endif ?>

      <?php if (isset($_SESSION['teacherid'])): ?>

        <div class="left_nav_slidebar">
        <ul>
          
          <li 
          <?php if (isset($_SESSION['current-page']) and $_SESSION['current-page'] == 'dashboard'): ?>
            class="left_nav_active theme_border"
          <?php endif ?>>
          <a href="javascript:void(0);"> <i class="fa fa-home"></i> DASHBOARD <span class="plus"><i class="fa fa-plus"></i></span></a>
            <ul <?php if (isset($_SESSION['current-page']) and $_SESSION['current-page'] == 'dashboard'): ?>
              class="opened" style="display: block"
            <?php endif ?>>
              <li> <a href="teacher-dashboard.php"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Home</b> </a> 
              </li>
            
            
            </ul>
          </li>

          <li 
          <?php if (isset($_SESSION['current-page']) and $_SESSION['current-page'] == 'reports'): ?>
            class="left_nav_active theme_border"
          <?php endif ?>>
          <a href="javascript:void(0);"> <i class="fa fa-users"></i> MEMBERS <span class="plus"><i class="fa fa-plus"></i></span></a>
            <ul <?php if (isset($_SESSION['current-page']) and $_SESSION['current-page'] == 'reports'): ?>
              class="opened" style="display: block"
            <?php endif ?>>
              <li> <a href="list-of-members.php"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>List of Organization Members</b> </a> 
              </li>
            </ul>
          </li>

          <li 
          <?php if (isset($_SESSION['current-page']) and $_SESSION['current-page'] == 'updates'): ?>
            class="left_nav_active theme_border"
          <?php endif ?>
>          <a href="javascript:void(0);"> <i class="fa fa-rss-square"></i> UPDATES <span class="plus"><i class="fa fa-plus"></i></span></a>
            <ul <?php if (isset($_SESSION['current-page']) and $_SESSION['current-page'] == 'updates'): ?>
              class="opened" style="display: block"
            <?php endif ?>>
              <li> <a href="news.php"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>News</b> </a> 
              </li>
              <li> <a href="events.php"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Events</b> </a> 
              </li>
              <li> <a href="awards.php"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Awards</b> </a> 
              </li>
            </ul>
          </li>

          <li 
          <?php if (isset($_SESSION['current-page']) and $_SESSION['current-page'] == 'advertising'): ?>
            class="left_nav_active theme_border"
          <?php endif ?>>
          <a href="javascript:void(0);"> <i class="fa fa-paperclip"></i> ARTWORK ACTIVITY <span class="plus"><i class="fa fa-plus"></i></span></a>
            <ul <?php if (isset($_SESSION['current-page']) and $_SESSION['current-page'] == 'advertising'): ?>
              class="opened" style="display: block"
            <?php endif ?>>
              <li> <a href="announce-artwork-category.php"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Announce Artwork Category</b> </a> 
              </li>
     
            </ul>
          </li>






      </div>
      <?php endif ?>


      <?php if (isset($_SESSION['studentid'])): ?>

        <div class="left_nav_slidebar">
        <ul>
          
          <li 
          <?php if (isset($_SESSION['current-page']) and $_SESSION['current-page'] == 'dashboard'): ?>
            class="left_nav_active theme_border"
          <?php endif ?>>
          <a href="javascript:void(0);"> <i class="fa fa-home"></i> DASHBOARD <span class="plus"><i class="fa fa-plus"></i></span></a>
            <ul <?php if (isset($_SESSION['current-page']) and $_SESSION['current-page'] == 'dashboard'): ?>
              class="opened" style="display: block"
            <?php endif ?>>
              <li> <a href="student-dashboard.php"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Home</b> </a> 
              </li>
            
            
            </ul>
          </li>

          <li 
          <?php if (isset($_SESSION['current-page']) and $_SESSION['current-page'] == 'students'): ?>
            class="left_nav_active theme_border"
          <?php endif ?>>
          <a href="javascript:void(0);"> <i class="fa fa-users"></i> STUDENTS <span class="plus"><i class="fa fa-plus"></i></span></a>
            <ul <?php if (isset($_SESSION['current-page']) and $_SESSION['current-page'] == 'students'): ?>
              class="opened" style="display: block"
            <?php endif ?>>
              <li> <a href="list-of-members.php"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>List of Organization Members</b> </a> 
              </li>
            </ul>
          </li>


                    <li 
          <?php if (isset($_SESSION['current-page']) and $_SESSION['current-page'] == 'elections'): ?>
            class="left_nav_active theme_border"
          <?php endif ?>>
          <a href="javascript:void(0);"> <i class="fa fa-pencil"></i> ELECTION <span class="plus"><i class="fa fa-plus"></i></span></a>
            <ul <?php if (isset($_SESSION['current-page']) and $_SESSION['current-page'] == 'elections'): ?>
              class="opened" style="display: block"
              <?php endif ?>>
              <li> <a href="vote.php"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Vote</b> </a> 
              </li>
         
              <li> <a href="election-result.php"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Election Result</b> </a> 
              </li>
     
            
            
            </ul>
          </li>

          <li 
          <?php if (isset($_SESSION['current-page']) and $_SESSION['current-page'] == 'updates'): ?>
            class="left_nav_active theme_border"
          <?php endif ?>
>          <a href="javascript:void(0);"> <i class="fa fa-rss-square"></i> UPDATES <span class="plus"><i class="fa fa-plus"></i></span></a>
            <ul <?php if (isset($_SESSION['current-page']) and $_SESSION['current-page'] == 'updates'): ?>
              class="opened" style="display: block"
            <?php endif ?>>
              <li> <a href="news.php"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>News</b> </a> 
              </li>
              <li> <a href="events.php"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Events</b> </a> 
              </li>
              <li> <a href="awards.php"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Awards</b> </a> 
              </li>
            </ul>
          </li>

            <li 
          <?php if (isset($_SESSION['current-page']) and $_SESSION['current-page'] == 'statementofaccount'): ?>
            class="left_nav_active theme_border"
          <?php endif ?>
>          <a href="javascript:void(0);"> <i class="fa fa-money"></i> S.O.A. <span class="plus"><i class="fa fa-plus"></i></span></a>
            <ul <?php if (isset($_SESSION['current-page']) and $_SESSION['current-page'] == 'statementofaccount'): ?>
              class="opened" style="display: block"
            <?php endif ?>>
              <li> <a href="statement-of-account.php"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>My Statement of Account</b> </a> 
              </li>
              </li>
            </ul>
          </li>


          <li 
          <?php if (isset($_SESSION['current-page']) and $_SESSION['current-page'] == 'advertising'): ?>
            class="left_nav_active theme_border"
          <?php endif ?>
>          <a href="javascript:void(0);"> <i class="fa fa-paperclip"></i> ARTWORK ACTIVITY <span class="plus"><i class="fa fa-plus"></i></span></a>
            <ul <?php if (isset($_SESSION['current-page']) and $_SESSION['current-page'] == 'advertising'): ?>
              class="opened" style="display: block"
            <?php endif ?>>
              <li> <a href="advertising.php"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b> Submit Artwork</b> </a> 
              </li>
              </li>
            </ul>
          </li>


          <li 
          <?php if (isset($_SESSION['current-page']) and $_SESSION['current-page'] == 'services'): ?>
            class="left_nav_active theme_border"
          <?php endif ?>
>          <a href="javascript:void(0);"> <i class="fa fa-camera"></i> SERVICES <span class="plus"><i class="fa fa-plus"></i></span></a>
            <ul <?php if (isset($_SESSION['current-page']) and $_SESSION['current-page'] == 'services'): ?>
              class="opened" style="display: block"
            <?php endif ?>>
              <li> <a href="services.php"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b> Post Service</b> </a> 
              </li>
              </li>
            </ul>
          </li>






      </div>
      <?php endif ?>




         <?php if (isset($_SESSION['viewerid'])): ?>

        <div class="left_nav_slidebar">
        <ul>
          
          <li 
          <?php if (isset($_SESSION['current-page']) and $_SESSION['current-page'] == 'dashboard'): ?>
            class="left_nav_active theme_border"
          <?php endif ?>>
          <a href="javascript:void(0);"> <i class="fa fa-home"></i> DASHBOARD <span class="plus"><i class="fa fa-plus"></i></span></a>
            <ul <?php if (isset($_SESSION['current-page']) and $_SESSION['current-page'] == 'dashboard'): ?>
              class="opened" style="display: block"
            <?php endif ?>>
              <li> <a href="viewer-dashboard.php"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Home</b> </a> 
              </li>
            
            
            </ul>
          </li>

          <li 
          <?php if (isset($_SESSION['current-page']) and $_SESSION['current-page'] == 'services'): ?>
            class="left_nav_active theme_border"
          <?php endif ?>>
          <a href="javascript:void(0);"> <i class="fa fa-home"></i> SERVICES <span class="plus"><i class="fa fa-plus"></i></span></a>
            <ul <?php if (isset($_SESSION['current-page']) and $_SESSION['current-page'] == 'services'): ?>
              class="opened" style="display: block"
            <?php endif ?>>
              <li> <a href="list-of-services.php"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>List of Services</b> </a> 
              </li>
            
            
            </ul>
          </li>




          






      </div>
      <?php endif ?>
      


    </div>

 