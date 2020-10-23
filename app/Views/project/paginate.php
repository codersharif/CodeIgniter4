<table border="1" width="500">
	<thead>
		<tr>
			<td>id</td>
			<td>name</td>
			<td>email</td>
		</tr>
	</thead>
	<tbody>
		<?php if(!empty($users)):?>
		<?php foreach($users as $user):?>
		<tr>
			<td><?=$user['id']?></td>
			<td><?=$user['name']?></td>
			<td><?=$user['email']?></td>
		</tr>
	<?php endforeach?>
	<?php endif?>
	</tbody>	
</table>

<?= $pager->links()?>