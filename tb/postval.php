<form name="fname" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
<?php
		for($i=0;$i<999;$i++){ ?>
<input type="text" name="dates[]" value="<?php echo $i;?>">
		<?php } 

?>

<input type="submit" value="submit" name="submit"/>

<?php
		if(isset($_POST['submit'])){
			echo count($_POST['dates']);

			print_r($_POST['dates']);
		}
?>