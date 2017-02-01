<?php
//Java Script


?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script   src="https://code.jquery.com/ui/1.12.0-rc.1/jquery-ui.js"   integrity="sha256-IY2gCpIs4xnQTJzCIPlL3uUgSOwVQYD9M8t208V+7KA="   crossorigin="anonymous"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<!-- Tinymce js -->
<script src="js/tinymce/tinymce.min.js"></script>

<!-- Dropzone js -->
<script src="js/dropzone.js"></script>

<!-- Atom.SaveOnBlur js -->
<script src="js/jquery.atom.SaveOnBlur.js"></script>

<script>
	
	$(document).ready(function() {

		$("#console-debug").hide();

		$("#btn-debug").click(function(){

			$("#console-debug").toggle();

	 });

    $(".btn-delete").on("click", function(){

      var selected = $(this).attr("id");
      var pageid = selected.split("del_").join("");
      var confirmed = confirm("Are you sure you want to delete this page?");

      if(confirmed == true) {

        $.get("ajax/pages.php?id="+pageid);

        $("#page_"+pageid).remove();
      }


      //alert(selected);
    })

    $("#sort-nav").sortable({
      cursor: "move",
      update: function() {
        var order = $(this).sortable("serialize");
        $.get("ajax/list-sort.php", order);
      }
    });

    $('.nav-form').submit(function(event){
      
      var navData = $(this).serializeArray();
      var navLabel = $('input[name=label]').val();
      var navID = $('input[name=id]').val();
    
      
      $.ajax({
        
        url: "ajax/navigation.php",
        type: "POST",
        data: navData
        
      }).done(function(){
        
        $("#label_"+navID).html(navLabel);
        
      });
      
      
      event.preventDefault();
      
    });

	});  //END Document ready();

	tinymce.init({
    selector: '.editor',
    theme: 'modern',
    plugins: [
      'code advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
      'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
      'save table contextmenu directionality emoticons template paste textcolor'
    ],
    content_css: 'css/content.css',
    toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons'
  });

</script>