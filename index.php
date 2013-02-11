<?php
	$tname="ecom";
	$column_to_skip=array("description");
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>View &middot; Template</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Select page">
		<meta name="author" content="Ali">

		<!-- Le styles -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-responsive.min.css" rel="stylesheet">

		<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.js'></script>
		<script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.js'></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/modify.js"></script>
	</head>

	<body>

		<div class="navbar navbar-fixed-top" id = "navbar_top">
			<div class="navbar-inner">
				<div class="container">
					<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>
					<a class="brand" href="#">
						Template
					</a>
					<div class="nav-collapse collapse">
						<ul class="nav">
							<li class="active"><a href="#">View</a></li>
						</ul>
						<ul class="nav">
							<li><a href="insert.php">Insert</a></li>
						</ul>
					</div><!--/.nav-collapse -->
				</div>
			</div>
		</div>
		<hr>
		<div class = "row" style = "margin-top:1em;">
		</div>




		<div class="container">
		 
			
			<header class="jumbotron subhead" id="overview">
				<div class="row-fluid">
					<div class="span6 page-header">
						<h1>
							Template
							<small>View Page</small>
						</h1>
						
					</div>
				</div>
			</header>

			<div class = "row-fluid">
				<div class="span12">

					<!-- <a href="#responsive" role="button" class="btn" data-toggle="modal">Launch demo modal</a> -->

					<section>
						<div class="page-header">
							<h2>View</h2>
						</div>
						 <?php
							include_once('config.ini');
							$query = "SELECT * from $tname ORDER BY id ASC LIMIT 50";

							$result = pg_query($db, $query);
						?>
						<table class="table table-bordered table-striped table-hover">
							<thead>
								<tr>
									<?php
										$i=0;
										while ($i < pg_num_fields($result))
										{
											$fieldName = pg_field_name($result, $i);
											if (in_array($fieldName, $column_to_skip)) {
												    break;
											}
											echo '<th>' . $fieldName . '</th>';
											$i++;
										}
									?>
									<th>Options</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$i=0;
									while($row = pg_fetch_assoc($result)) {
										$id = $row["id"];
										echo "<tr id='rowid-$id'>";
										foreach ($row as $fieldName => $item) {
											if (in_array($fieldName, $column_to_skip)) {
												    break;
											}
											echo "<td>" . $item . "</td>";
										}
										// echo "<td>" . htmlspecialchars($row["last_name"]) . "</td>";
										// echo "<td>" . htmlspecialchars($row["first_name"]) . "</td>";
										// echo "<td>" . htmlspecialchars($row["title"]) . "</td>";
										?>
										
										<td>
											<button class="btn btn-inverse edit-btn" data-toggle="modal" href="#edit-modal" <?php echo "id='$id'" ?> >Edit</button>
											<button class="btn btn-danger delete-btn" <?php echo "id='$id'" ?> >Delete</button>
										</td>
										<?php
										echo "</tr>";
									}
								?>
							</tbody>
						</table>
					</section>
				</div>
			</div>
		</div>
		<!-- Modal -->
		<div id="edit-modal" class="modal hide fade" tabindex="-1" data-width="760">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h3>Edit Data</h3>
			</div>
			<div class="modal-body">
				<input class="hide" id="id"/>
				<?php
					include_once('config.ini');
					$result = pg_query($db, "select * from $tname limit 1");
					$i = 1;
					while($i < pg_num_fields($result)) 
					{
						$fieldName = pg_field_name($result, $i);
						$i++;

				?>
						<div class="control-group">
							<label class="control-label" <?php echo "for = '".$fieldName."'"; ?> ><?php echo $fieldName; ?></label>
							<div class="controls">
								<input type="text" class="input-xlarge" <?php echo "id = '".$fieldName."' name = '".$fieldName."'"; ?> >
							</div>
						</div>
				<?php
					}
				?>
			</div>
			<div class="modal-footer">
				<div class="modal-footer">
					<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
					<button class="btn btn-primary" id="save-changes-btn">Save changes</button>
			</div>
		</div>
		
	</body>
</html>