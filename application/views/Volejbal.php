<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
		.responsive {
			width: 100%;
			height: auto;
		}

		.topnav {
			overflow: hidden;
			background-color: #333;
		}

		/* Style the topnav links */
		.topnav a {
			background-color: rgba(212, 212, 212, 0.02);
			float: left;
			display: block;
			width: 20%;
			color: #c9aa71;
			font-size: 20px;
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
<img src="<?php echo base_url('images/vrch.jpg'); ?>" class="responsive"/>
			<br>
	<div class = "topnav">
		<a href='<?php echo site_url('volejbal/mesto_management')?>'>-Mestá-</a>
		<a href='<?php echo site_url('volejbal/hala_management')?>'>-Športové Haly-</a>
		<a href='<?php echo site_url('volejbal/tim_management')?>'>-Tímy-</a>
		<a href='<?php echo site_url('volejbal/hraci_management')?>'>-Hráči-</a>
		<a href='<?php echo site_url('volejbal/liga_management')?>'>-Ligy-</a>

		<!--
		<a href='<?php echo site_url('volejbal/customers_management')?>'>Customers</a>
		<a href='<?php echo site_url('volejbal/orders_management')?>'>Orders</a>
		<a href='<?php echo site_url('volejbal/products_management')?>'>Products</a>
		<a href='<?php echo site_url('volejbal/offices_management')?>'>Offices</a>
		<a href='<?php echo site_url('volejbal/employees_management')?>'>Employees</a>
		<a href='<?php echo site_url('volejbal/film_management')?>'>Films</a>
		<a href='<?php echo site_url('volejbal/multigrids')?>'>Multigrid [BETA]</a>
		-->
		
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
