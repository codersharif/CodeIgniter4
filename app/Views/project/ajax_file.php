<button type="button" id="btn-click">
	ajax check
</button>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script>
$(document).ready(function(){

  $("#btn-click").click(function(){

    $.ajax({
     url: "<?=site_url('ajax-response')?>",
     type:"POST",
     dataType:"JSON",
     data:{
     	name:"sharif khan",
     	email:"sharif@mail.com"
     },
     success: function(result){
      $("#div1").html(result);
    }

    });
  });
});
</script>