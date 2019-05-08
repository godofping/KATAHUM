<?php include('connection.php');
$_SESSION['current-page'] = 'elections';
 ?>
<?php include('header.php'); ?>
   <!--\\\\\\\left_nav end \\\\\\-->
    <div class="contentpanel">
      <!--\\\\\\\ contentpanel start\\\\\\-->
      <div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
          <h1>ELECTION</h1>
          <h2 class="">Election REsult</h2>
        </div>
        
      </div>
      <div class="container clear_both padding_fix">
        <!--\\\\\\\ container  start \\\\\\-->

   <div id="main-content">
    <div class="page-content">
        
      <div id="electionresultrealtime" name="electionresultrealtime"></div>
           
        </div><!--/page-content end--> 
  </div>


<script type="text/javascript">
$(document).ready(function checknoti(){
    var feedback = $.ajax({
        type: "POST",
        url: "real-time-election-result.php",
        async: false
    }).complete(function(){
        setTimeout(function(){checknoti();}, 1000);
    }).responseText;

    $('#electionresultrealtime').html(feedback);
});
</script>


<?php include('footer.php');  ?>
