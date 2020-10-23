<?=form_open("form","class='form',id='formId'")?>

 <?php
    $name=[
    	"name"=>"name",
    	"class"=>"form-controll",
    	"value"=>"sharif",
    	"id"=>"nameId"
    ];

    $text=[
        "name"=>"contact",
    	"class"=>"form-control",
    ];
 ?>

 <?=form_input($name)?>
 <?=form_textarea($text)?>
 <?=form_hidden("id","1")?>
 <?=form_submit("submit","Submit")?>

<?=form_close()?>