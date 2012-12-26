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
					if ($(this).attr("q")!='null')
				{
					if ($(this).attr("hasTypes") == 0)
					{
					$("ul").load("browser/getNext/" + $(this).attr("q"));
					}
					else
					{
					$("ul").load("browser/listItems/" + $(this).attr("q"));
					}
				}
				});
				$("#div1").on("click", "#p1", function(e)
				{
					$("ul").load("browser/getLast/");
				});
			});
		</script>
	</head>
	<body onload="CCPEVE.requestTrust('http://shoguncorp.com')">
		<h1><?php echo $heading;?></h1>
		<div id="div1">
			<p id="p1">Previous</p>
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