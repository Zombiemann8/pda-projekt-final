<!DOCTYPE html>
<html>
<head>
	<title>Volejbal</title>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>

		.header {
			width: 100%;
			padding: 0px;
			text-align: center;
			font-size: 50px;
			font-family: "Lucida Grande";
			color: #000000;
		}

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
			padding: 14px 0px;
			text-decoration: none;
		}

		/* Change color on hover */
		.topnav a:hover {
			background-color: #ddd;
			color: black;
		}

		.login{
			position: absolute;
			right: 0;
			/*top: calc(50% - 75px);*/
			left: calc(100% - 300px);
			height: 150px;
			width: 250px;
			padding: 10px;

		}

		.login input[type=button]{
			width: 250px;
			height: 35px;
			background: #e8e8e8;
			border: 1px;
			border-radius: 2px;
			cursor: pointer;
			color: #de9e29;
			font-family: 'Exo', sans-serif;
			font-size: 16px;
			font-weight: 400;
			padding: 6px;
			margin-top: 10px;
		}

		.login input[type=button]:hover{
			opacity: 0.8;
		}

		.login input[type=button]:active{
			opacity: 0.6;
		}


		.login input[type=button]:focus{
			outline: none;
		}

		::-webkit-input-placeholder{
			color: rgba(0,0,0,0.6);
		}




		</style>
<?php 
foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
</head>
<body oncontextmenu="return false">

<img src="<?php echo base_url('images/vrch.jpg'); ?>" class="responsive"/>
			<br>
	<div class = "topnav">
		<a href='<?php echo site_url('volejbal/zapas_management')?>'>-Zapasy-</a>
		<a href='<?php echo site_url('volejbal/hala_management')?>'>-Športové Haly-</a>
		<a href='<?php echo site_url('volejbal/tim_management')?>'>-Tímy-</a>
		<a href='<?php echo site_url('volejbal/hraci_management')?>'>-Hráči-</a>
		<a href='<?php echo site_url('volejbal/liga_management')?>'>-Ligy-</a>
		
	</div>

<form name="login">
	<div class="login">
		<input type="button" onclick="check(this.form)" value="Login as admin"/>
	</div>



</form>
<script language="javascript">
	function check(form)
	{
			window.open('http://[::1]/pda-projekt-final/index.php/')
	}
</script>

<br>
<div class="header">Volejbal na Slovensku.</div>
<br>

	<center><a href="http://www.svf.sk/sk/titulna-stranka">
		<img src="<?php echo base_url('images/svf.png');?>" />
		</a></center>

	<div style='height:20px;'></div>  
    <div style="padding: 10px">
		<?php echo $output; ?>
    </div>
    <?php foreach($js_files as $file): ?>
        <script src="<?php echo $file; ?>"></script>
    <?php endforeach; ?>

<address>
	<b>
		<div align="right"style="color:black">
			Created by <a href="mailto:ivanveselka@gmail.com">Ivan Veselka</a>.<br>
			Adress: Šurany<br>
			94201 <br>
			Slovakia
		</div>
	</b>
</address>
</body>
</html>
