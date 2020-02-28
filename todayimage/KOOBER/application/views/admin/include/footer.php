  <?php 

// total_users

$query="SELECT * FROM users";
$sql = mysql_query($query);
$total_users = mysql_num_rows($sql);

// total_users_active

$query="SELECT * FROM users WHERE status = 'active'";
$sql = mysql_query($query);
$total_users_active = mysql_num_rows($sql);


$total_users_deactive = $total_users - $total_users_active;


// user_request

$query="SELECT * FROM user_request WHERE status = 'Complete' GROUP BY user_id";
$sql = mysql_query($query);
$user_com_request = mysql_num_rows($sql);

// user_request

$query="SELECT * FROM user_request WHERE status = 'Reject' GROUP BY user_id";
$sql = mysql_query($query);
$user_rej_request = mysql_num_rows($sql);

?>  
        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="<?=base_url('assets');?>/js/jquery.min.js"></script>
        <script src="<?=base_url('assets');?>/js/bootstrap.min.js"></script>
        <script src="<?=base_url('assets');?>/js/detect.js"></script>
        <script src="<?=base_url('assets');?>/js/fastclick.js"></script>
        <script src="<?=base_url('assets');?>/js/jquery.slimscroll.js"></script>
        <script src="<?=base_url('assets');?>/js/jquery.blockUI.js"></script>
        <script src="<?=base_url('assets');?>/js/waves.js"></script>
        <script src="<?=base_url('assets');?>/js/wow.min.js"></script>
        <script src="<?=base_url('assets');?>/js/jquery.nicescroll.js"></script>
        <script src="<?=base_url('assets');?>/js/jquery.scrollTo.min.js"></script>
        <script src="<?=base_url('assets');?>/js/jquery.app.js"></script>
        <!-- jQuery  -->
        <script src="<?=base_url('assets');?>/plugins/moment/moment.js"></script>
        <!-- jQuery  -->
        <script src="<?=base_url('assets');?>/plugins/waypoints/lib/jquery.waypoints.js"></script>
        <script src="<?=base_url('assets');?>/plugins/counterup/jquery.counterup.min.js"></script>
        <!-- jQuery  -->
        <script src="<?=base_url('assets');?>/plugins/sweetalert/dist/sweetalert.min.js"></script>
        
        <!-- jQuery  -->
        <script src="<?=base_url('assets');?>/pages/jquery.dashboard.js"></script>
              <!-- EASY PIE CHART JS -->
        <script src="<?=base_url('assets');?>/plugins/jquery.easy-pie-chart/dist/easypiechart.min.js"></script>
        <script src="<?=base_url('assets');?>/plugins/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
        <script src="<?=base_url('assets');?>/pages/easy-pie-chart.init.js"></script>

           <!--Morris Chart-->
        <script src="<?=base_url('assets');?>/plugins/morris.js/morris.min.js"></script>
        <script src="<?=base_url('assets');?>/plugins/raphael/raphael-min.js"></script>
        <script src="<?=base_url('assets');?>/pages/morris.init.js"></script>

            <!-- Datatables-->
        <script src="<?=base_url('assets');?>/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?=base_url('assets');?>/plugins/datatables/dataTables.bootstrap.js"></script>
        
        <script type="text/javascript">

            jQuery(document).ready(function($) {
                $('.counter').counterUp({
                    delay: 100,
                    time: 1200
                });
            });
        </script>

          <script type="text/javascript">
            $(document).ready(function() {
                $('#datatable').dataTable();
            });
            TableManageButtons.init();
        </script>


<script>
   function readURL(input,id) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#'+id)
                    .attr('src', e.target.result);
                    
            };

            reader.readAsDataURL(input.files[0]);
        }
    }


    new Morris.Donut({
  
  element: 'members-tickets',
  
  data: [
      {value: <?= $total_users_deactive;?>, label: 'Inactive Users'},
      {value: <?= $total_users_active;?>, label: 'Active Users'},
  ],
  colors: [
    '#33414E',
     '#197cbf',
     '#3298de',
  ],
  
  
});

new Morris.Donut({
  
  element: 'truke1',
  
  data: [

      
      {value: <?= $user_com_request;?>, label: 'Productive Users'},
      {value: <?= $user_rej_request;?>, label: 'Non-Productive Users'},
  ],
  colors: [
    '#33414E',
     '#197cbf',
  ],
  
});

</script>

    
    </body>

</html>