<!DOCTYPE html>
<html lang="en">
<?php  include('admin_header.php'); ?>
<style>
ul.sidebar-menu li ul.sub li.available_exam a{
    color: #68dff0;
    display: block;
}
#sidebar > ul > li.available_exam > ul.sub, #sidebar > ul > li > ul.sub > li > a {
    display: block;
}
ul.sidebar-menu li a.examination, ul.sidebar-menu li a:hover, ul.sidebar-menu li a:focus {
    background: #68dff0;
    color: #fff;
    display: block;
}
</style>
<!-- **********************************************************************************************************************************************************
MAIN CONTENT
*********************************************************************************************************************************************************** -->
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
    <h3><i class="fa fa-angle-right"></i> List CSR </h3>
    <div class="row">
      <div class="col-lg-12 main-chart">
      <center><h1>List CSR(Certificate Signing Request)</h1></center>
      <div class="col-lg-12">
                      <div class="content-panel">
                          <section id="unseen">
                            <table class="table table-bordered table-striped table-condensed">
                              <thead>
                              <tr>
                                  <th>No</th>
                                  <th>Username</th>
                                  <th>Name</th>
                                  <th>Country</th>
                                  <th>Organization</th>
                                  <th>Unit</th>
                                  <th>Confirmation</th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php 
                              $mysqli = new mysqli('localhost','root','','ca');
                              $sql = "SELECT * from csr";
                              $count = 0;
                              $result = $mysqli->query($sql);
                              while ($row = $result->fetch_array(MYSQLI_BOTH))
                              {
                                  $count++;
                                  echo('<tr><td>'); echo $count; echo('</td>');
                                  echo('<td>'); echo $row['username']; echo('</td>');
                                  echo('<td>'); echo $row['name']; echo('</td>');
                                  echo('<td>'); echo $row['country']; echo('</td>');
                                  echo('<td>'); echo $row['organization']; echo('</td>');
                                  echo('<td>'); echo $row['unit']; echo('</td>');
                                  echo('<td>'); 
                                  if($row['status']=="unsigned"){
                                    echo ('
                                    <div>
                                        <a href="');echo base_url(); echo "admin/acc_csr/"; echo $row['id']; echo('"><button class="btn btn-success btn-xs fa fa-check"></button></a>
                                         - 
                                        <a href="');echo base_url(); echo "admin/del_csr/"; echo $row['id']; echo('"><button class="btn btn-danger btn-xs fa fa-trash-o"></button></a>
                                    </div>
                                    ');
                                  }
                                  else{
                                    echo $row['status'];
                                  }
                                  echo('</td></tr>');
                              }
                              ?>
                              </tbody>
                          </table>
                          </section>
                  </div><!-- /content-panel -->
               </div></div></div><!-- /col-lg-4 -->     
      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2015 - Ramadhan Rosihadi Perdana
              <a href="index.html#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/jquery-1.8.3.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/jquery.sparkline.js"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>
    
    <script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="assets/js/gritter-conf.js"></script>

    <!--script for this page-->    
    <script type="application/javascript">
        $(document).ready(function () {
            $("#date-popover").popover({html: true, trigger: "manual"});
            $("#date-popover").hide();
            $("#date-popover").click(function (e) {
                $(this).hide();
            });
        
            $("#my-calendar").zabuto_calendar({
                action: function () {
                    return myDateFunction(this.id, false);
                },
                action_nav: function () {
                    return myNavFunction(this.id);
                },
                ajax: {
                    url: "show_data.php?action=1",
                    modal: true
                },
                legend: [
                    {type: "text", label: "Special event", badge: "00"},
                    {type: "block", label: "Regular event", }
                ]
            });
        });
        
        
        function myNavFunction(id) {
            $("#date-popover").hide();
            var nav = $("#" + id).data("navigation");
            var to = $("#" + id).data("to");
            console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
        }
    </script>
  

  </body>
</html>
