<!DOCTYPE html>
<html lang="en">
<?php  include('header.php'); ?>
<style>
ul.sidebar-menu li ul.sub li.create_exam a{
    color: #68dff0;
    display: block;
}
#sidebar > ul > li.create_exam > ul.sub, #sidebar > ul > li > ul.sub > li > a {
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
    <h3><i class="fa fa-angle-right"></i> Create Certificate Authority</h3>
    <div class="row">
    <div class="col-lg-12 main-chart">
    <div class="row mt">
    
    
    <div class="col-lg-12 main-chart">
            <div class="col-md-offset-3 col-lg-7 col-md-4 col-sm-4 mb">
              <div class="content-panel ">
                <div class="user">
                    <center><img src="<?php echo base_url(); ?>assets/img/profile_pict/<?php echo $this->session->userdata('username');?>_.jpg" class="img-circle" width="80">
                    <h4><?php echo $this->session->userdata('nama');?></h4>
                    <h3>Create Certificate Signing Request</h3></center>
                  </div>
                  <form role="form" method="POST" action="<?php  echo base_url(); ?>create_csr/add_csr" enctype="multipart/form-data"><br>
                    <div class="form-group col-lg-12">
                        <label>Country Name : </label>
                        <input name="country" data-transform="input-control" class="form-control" type="text" required>
                    </div>
                    <div class="form-group col-lg-12">
                        <label>Organization Name : </label>
                        <input name="organization" data-transform="input-control" class="form-control" type="text" required>
                    </div>
                    <div class="form-group col-lg-12">
                        <label>Organization Unit Name : </label>
                        <input name="unit" data-transform="input-control" class="form-control" type="text" required>
                    </div>
                    <div class="form-group col-lg-12">
                        <label>Name : </label>
                        <input name="name" data-transform="input-control" class="form-control" type="text" value="<?php echo $nama;?>" required>
                    </div>
                    <center><input type="submit" class="btn btn-danger" value="SEND"></center>
                    <br>
                  </form>
                </div>
              </div>
            </div></div></div></div>

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
