<html>
	<head>
		<title><?php echo $title;?></title>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js">
		</script>
		<script>
			$(document).ready(function()
			{
				$("li").click(function()
				{
					$("ul").load("browser/getNext/" + $(this).attr("q"));;
				});
			});
		</script>
	</head>
	<body>
		<h1><?php echo $heading;?></h1>
		<div id="div1">
			<ul>
				<?php
				foreach ($result->result_array() as $row)
				{
					echo '<li q = "'.$row['marketGroupID'].'">'.$row['marketGroupName'].'</li>';
				}
				?>
			</ul>
		</div>
	</body>
</html>