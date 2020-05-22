<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
		.topnav {
			overflow: hidden;
			background-color: #333;
		}

		/* Style the topnav links */
		.topnav a {
			background-color: #4d4d4d;
			float: left;
			display: block;
			color: #c9aa71;
			text-align: center;
			padding: 14px 16px;
			text-decoration: none;
		}

		/* Change color on hover */
		.topnav a:hover {
			background-color: #ddd;
			color: black;
		}
		</style>
<?php 
foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
</head>
<body>
	<div class = "topnav">
		<a href='<?php echo site_url('examples/hala_management')?>'>Haly</a>
		<a href='<?php echo site_url('examples/tim2_management')?>'>Timy2</a>
		<a href='<?php echo site_url('examples/liga_management')?>'>Ligy</a>
		<a href='<?php echo site_url('examples/hraci_management')?>'>Hraci</a>
		<a href='<?php echo site_url('examples/customers_management')?>'>Customers</a>
		<a href='<?php echo site_url('examples/orders_management')?>'>Orders</a>
		<a href='<?php echo site_url('examples/products_management')?>'>Products</a>
		<a href='<?php echo site_url('examples/offices_management')?>'>Offices</a>

		<a href='<?php echo site_url('examples/employees_management')?>'>Employees</a>
		<a href='<?php echo site_url('examples/film_management')?>'>Films</a>
		<a href='<?php echo site_url('examples/multigrids')?>'>Multigrid [BETA]</a>
		
	</div>
	<div style='height:20px;'></div>  
    <div style="padding: 10px">
		<?php echo $output; ?>
    </div>
    <?php foreach($js_files as $file): ?>
        <script src="<?php echo $file; ?>"></script>
    <?php endforeach; ?>
</body>
</html>
