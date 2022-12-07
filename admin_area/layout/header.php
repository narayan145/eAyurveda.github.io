<?php include'includes/db.php'; ?>
<?php	
 if(!isset($_SESSION['email']))
  {
  	 // echo "<script>window.open('login.php','_self')</script>";
  	

  }
  ?>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>E-Ayurveda System</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">


<!--Icons-->
<script src="js/lumino.glyphs.js"></script>

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" height="100px" background-color="green">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">E-Ayurveda System</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Admin <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Profile</a></li>
							<li><a href="#"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"></use></svg> Settings</a></li>
							<li><a href="logout.php"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
			<div class="form-group" style="display:none;">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu" >
			<li class="active"><a href="index.php"><svg class="glyph stroked dashboard-dial"><use xlink:href="#"></use></svg>Dashboard</a></li>

			<li><a href="insert_product.php"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg>Insert product</a></li>

			<li><a class="" href="listproduct.php"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg>View product List</a></li>

			<li><a href="add_category.php"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg>Add Category</a></li>

			<li><a href="view_category.php"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg>List Category</a></li>

			<li><a href="add_admin.php"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg>Add Admin</a></li>

			<li><a href="view_admin.php"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg>List Admin</a></li>

			<li><a href="view_customer.php"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg>List Customer</a></li>


			
			
			<li role="presentation" class="divider"></li>
			<li><a href="../index.php"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>Home Page</a></li>

			<li><a href="logout.php"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Logout</a></li>
		</ul>
		</div><br><br>
		<!--<div class="attribution">Template by <a href="http://www.medialoot.com/item/lumino-admin-bootstrap-template/">Medialoot</a><br/><a href="http://www.glyphs.co" style="color: #333;">Icons by Glyphs</a></div>-->
	</div><!--/.sidebar-->
</body>
</html>