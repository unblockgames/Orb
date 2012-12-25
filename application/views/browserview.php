<html>
	<head>
		<title><?php echo $title;?></title>
	</head>
	<body>
		<h1><?php echo $heading;?></h1>
		<div id = "div1">
			<?php
			foreach ($result->result_array() as $row)
			{
				//this is the place where the browser items will actually by created but idk how to create them with AJAX functionality... yet
			}
			?>
		</div>
	</body>
</html>