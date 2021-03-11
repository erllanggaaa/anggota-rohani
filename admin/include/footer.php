<footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>By</b> Remuz Kmurawak
    </div>
    <strong>Copyright &copy; 2021.</strong> All rights
    reserved.
  </footer>

    <!-- jQuery -->
  
    <script src="http://libs.baidu.com/jquery/1.11.1/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    
    <script src="../bower_components/sammy/lib/min/sammy-latest.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>
    
    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>  
<script type="text/javascript">
$(function(){
                $('#dataTables-example').DataTable({
                        responsive: true
                });
});
</script>

<script type="text/javascript">
$(function(){
                $('#dataTables-example2').DataTable({
                        responsive: true
                });
});
</script>
    
    <?php include ("include/script-tambahan.php"); ?>
    
<?php
mysqli_close($konek);
exit(); ?>
</body>
</html>