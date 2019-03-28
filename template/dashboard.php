<?php include "auth/auth_header.php";?>

<!-- Page Wrapper -->
  <div id="wrapper">

  <?php include "auth/auth_sidebar.php";?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <?php include "auth/auth_topbar.php";?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>
          
          <?php include "table.php";?>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
<?php
  include "auth/auth_footer.php";
?>