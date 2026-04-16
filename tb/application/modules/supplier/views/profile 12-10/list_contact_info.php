<html>
	<table border="1">
		<tr>
			<td>Slno</td>
			<td>Country</td>
			<td>City </td>
			<td>Accommodation Name</td>
			<td>Room Status</td>
			<td>View Details</td>
		</tr>
		<?php
		$slno=1;
			foreach($result as $value)
			{
		?>
		<tr>
			<td><?php echo $slno ?></td>
			<td><?php echo $value->name ?></td>
			<td><?php echo $value->city_name ?></td>
			<td><?php echo $value->property_name ?></td>
			<td>Room Status</td>
			<td><a href="<?php echo WEB_URL;?>index/edit_contact_inform/<?php echo $value->sup_id ?>/<?php echo $value-> sup_contact_inform_id ?>">Click</a></td>
		</tr>
		<?php
		$slno++;
			}
		?>
		<tr>
			<td colspan="6" align="right"><a href="<?php echo WEB_URL;?>index/profile/contact_inform">Add Accomidation</a></td>
		</tr>
	</table>


</html>