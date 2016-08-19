<?php require_once "includes/header.php"; ?>

<?php
if(!$session->is_signed_in()){
    header("Location: login.php");
}
?>  
    <div id="wrapper">

        <!-- Navigation -->
<?php require_once "includes/navigation.php"; ?>
       
        <div id="page-wrapper">
        
<?php require_once "includes/content.php"; ?>
       
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php require_once "includes/footer.php"; ?>