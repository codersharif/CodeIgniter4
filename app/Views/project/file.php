<?php if(session()->get('succes')):?>

  <p><?=session()->get('succes')?></p>
  
<?php endif?>

<?php if(session()->get('error')):?>
  <p><?=session()->get('error')?></p>
<?php endif?>

<form method="post" action="<?=site_url('file-upload')?>" enctype="multipart/form-data">
	<input type="hidden" value="<?=csrf_hash()?>" name="<?=csrf_token()?>">
	<p>
		<label>File</label>
		<input type="file" name="file">
	</p>
	<button type="submit">Submit</button>
	
</form>