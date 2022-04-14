<style>
	td,th,tr{
		width: 150px;
		text-align: center;
	}
</style>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Movies</title>
</head>
<body bgcolor="lightblue">
	<?php include("config.php"); 
	session_start();
		$flag=2;
		if(isset($_SESSION['flag']))
		{

			$name=$_SESSION['name'];
			$mov=mysqli_query($con,"select * from movies where actor='$name'")or die('Error:- '.mysqli_error($con));
			if(mysqli_num_rows($mov)>0)
			{
				$flag=1;
			}
			else
			{
				$flag=0;
			}


		}
		 unset($_SESSION['flag']);
	?>
	<h2>Movie List</h2>
	<table>
		<tr>
                <th>S.No</th>
                <th>Movie name</th>
                <th>Actor</th>
                <th>Actress</th>
                <th>Producer</th>
                <th>Year of release</th>
          </tr>

	<?php 
		$sql=mysqli_query($con,"select * from movies") or die('Error:- '.mysqli_error($con));
            $count=0;
            while($rs=mysqli_fetch_array($sql))
                  {
                    $count++;
                    ?>
            
		<tr>
			<td><?php echo $count; ?></td>
			<td><?php echo $rs[1]; ?></td>
			<td><?php echo $rs[2]; ?></td>
			<td><?php echo $rs[3]; ?></td>
			<td><?php echo $rs[4]; ?></td>
			<td><?php echo $rs[5]; ?></td>
		</tr>
	
	<?php } ?>
	</table>
	
	<p></p>
	<form name="form" action="action.php?pid=1" method="post">
		Search movie by actor name &nbsp;<input type="text" name="name">
		<input type="submit">
	</form>
	<?php if($flag==1)
	{ ?>
	<table>
		<tr>
                <th>S.No</th>
                <th>Movie name</th>
                <th>Actor</th>
                <th>Actress</th>
                <th>Producer</th>
                <th>Year of release</th>
          </tr>

	<?php 
            $count=0;
            while($rs=mysqli_fetch_array($mov))
                  {
                    $count++;
                    ?>
            
		<tr>
			<td><?php echo $rs[0]; ?></td>
			<td><?php echo $rs[1]; ?></td>
			<td><?php echo $rs[2]; ?></td>
			<td><?php echo $rs[3]; ?></td>
			<td><?php echo $rs[4]; ?></td>
			<td><?php echo $rs[5]; ?></td>
		</tr>
	
	<?php } ?>
	</table>
<?php } 
	elseif($flag==0)
		{?>
			<p>No movie  found!!!</p>
		<?php } ?>


	
</body>
</html>