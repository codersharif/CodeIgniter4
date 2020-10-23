<?= $this->extend("layouts/mestar") ?>

<?= $this->section("content")?>
<div class="bg-info text-white p-4 mb-4">


<?php if(session()->get('succes')):?>

  <p><?=session()->get('succes')?></p>
  
<?php endif?>

<?php if(session()->get('error')):?>
  <p><?=session()->get('error')?></p>
<?php endif?>
</div>

<?php if(isset($validation)):?>
<?php print_r($validation->listErrors());?>	
<?php endif?>

<form method="POST" action="<?=site_url('form')?>">
	<input type="hidden" value="<?=csrf_hash()?>" name="<?=csrf_token()?>">
	<?=//srf_field()?>
	
	<p>
		<label>Name :</label>
		<input type="text" name="name">
		<?php if(isset($validation)):?>
		<?=$validation->getError('name')?>
		<?php endif?>
	</p>
	<p>
		<label>email :</label>
		<input type="text" name="email">
	</p>
	<p>
		<label>phone :</label>
		<input type="text" name="phone">
	</p>

	<input type="submit" name="submit" value="Submit">
</form>

<?= $this->endSection()?>