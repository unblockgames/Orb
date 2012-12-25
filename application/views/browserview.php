<html>
	<head>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js">
		</script>
		<title><?php echo $title;?></title>
	</head>
	<body>
		<h1><?php echo $heading;?></h1>
		<div id = "div1">
			<?php
			foreach ($result->result_array() as $row)
			{
				echo '$($row[\'marketGroupID\']).click(function(){$("#div1").load("browser/getNext/"$row[\'marketGroupID\']);});<'.$row['marketGroupID'].'>'.$row['marketGroupName'].'</'.$row['marketGroupID'].'><br />';
			}
			?>
		</div>
	</body>
</html>