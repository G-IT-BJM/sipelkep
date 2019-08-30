<?php 

ob_start();

require 'config/base_url.php';
require 'config/koneksi.php';

?>

<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<?php include 'views/template/header.php' ?>

<body>
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade show"><span class="spinner"></span></div>
	<!-- end #page-loader -->
	
	<!-- begin #page-container -->
	<div id="page-container" class="page-container fade page-sidebar-fixed page-header-fixed">

		<!-- begin #header -->
<?php include 'views/template/nav-header.php' ?>
		<!-- end #header -->
		
		<!-- begin #sidebar -->
<?php include 'views/template/menu-sidebar.php' ?>
		<!-- end #sidebar -->
		
		<!-- begin #content -->
		<div id="content" class="content">
			
<?php

// Put Content Here!!!

$page = @$_GET['page'];

switch ($page) {
	case '':
		echo '';
		break;
	case 'content1':
		include 'views/content1.php';
		break;
	case 'content2':
		include 'views/content2.php';
		break;
	default:
		header('location:'.base_url.'404.php');
		die();
		break;
}

?>

		</div>
		<!-- end #content -->
		
		<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->
	</div>
	<!-- end page container -->
	
<?php include 'views/template/footer.php' ?>

</body>
</html>

<?php ob_end_flush(); ?>
