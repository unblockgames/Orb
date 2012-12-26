<html>
	<head>
		<title><?php echo $title;?></title>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js">
		</script>
		<script>
			$(document).ready(function()
			{
				$("ul").on("click", "li", function(e)
				{
					alert($(this).attr("hasTypes"));
					if ($(this).attr("hasTypes") == 0)
					{
					$("ul").load("browser/getNext/" + $(this).attr("q"));
					}
					else
					{
					$("ul").load("browser/listItems/" + $(this).attr("q"));
					}
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
					echo '<li q = "'.$row['marketGroupID'].'" hasTypes = "0">'.$row['marketGroupName'].'</li>';
				}
				?>
			</ul>
		</div>
	</body>
</html>