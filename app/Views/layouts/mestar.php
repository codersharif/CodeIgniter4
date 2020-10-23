<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Welcome to CodeIgniter 4!</title>
	<meta name="description" content="The small framework with powerful features">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/png" href="/favicon.ico"/>
	<?=link_tag('public/css/bootstrap.min.css')?>

</head>
<body>
  
  <?=$this->include("layouts/header")?>
  <?=$this->renderSection("content")?>
  <?=$this->include("layouts/footer")?>

<?=script_tag('public/js/bootstrap.min.js')?>
</body>
</html>