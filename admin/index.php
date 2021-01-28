<?php
include '../includes/define_includes.php';
include ADMIN_ROOT . '/includes/controller.auth.php';
include ADMIN_ROOT . '/includes/callbacks.php';
include ADMIN_ROOT . '/includes/crud.php';
include ADMIN_ROOT . "/includes/controller.php";
include ADMIN_ROOT . "/vues/header.php";
include ADMIN_ROOT . "/vues/sidebar.php";
?>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

<?php
include ADMIN_ROOT . "/vues/content.php";
include ADMIN_ROOT . "/vues/footer.php";
?>       

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<?php
include ADMIN_ROOT . "/vues/modals.php";
include ADMIN_ROOT . "/vues/scripts.php";
?>

</body>

</html>