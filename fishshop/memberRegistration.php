<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <link rel="stylesheet" type="text/css" media="all" href="css/popupstyle.css">
    <link rel="stylesheet" type="text/css" media="all" href="css/fancybox/jquery.fancybox.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="css/fancybox/jquery.fancybox.js?v=2.0.6"></script>
    
    <title>Aquatic Centre - Registration</title>  
    
  </head>

  <body>
  <script type='text/javascript'>
		
		//check that password matches
		function validate(form) {
			var e = form.elements;

			// Validation code
			  if(e['password'].value != e['confirm-password'].value) {
				alert('Passwords do not match.');
				return false;
			}
			return true;			
		}
	

	</script>
  
    <div id="wrapper">
      <p><a class="modalbox" href="#inline" style="display: none;">click to login</a></p>
    </div>

    <!-- hidden inline form -->
    <div id="inline">
      <h2>Aquatic Centre - New Member Registration</h2>

      <form id="contact" name="contact" action="submitregistration.php" method="POST">
        <label for="name">Name</label>
        <input type="name" id="name" name="name" class="txt"> <!-- using popupstyle.css -->
        <br>
	<label for="surname">Surname</label>
        <input type="surname" id="surname" name="surname" class="txt"> <!-- using popupstyle.css -->
        <br>
        <label for="username">Username</label>
        <input type="username" id="username" name="username" class="txt"> <!-- using popupstyle.css -->
        <br>
	 <label for="email">Email</label>
        <input type="email" id="email" name="email" class="txt"> <!-- using popupstyle.css -->
        <br>
        <label for="password">Password&nbsp&nbsp</label>
        <input type="password" id="password" name="password" class="txt"> <!-- using popupstyle.css -->
        <br>
	<label for="confirmpassword">Confirm Password&nbsp&nbsp</label>
        <input type="password" id="confirm-password" name="confirm-password" class="txt"> <!-- using popupstyle.css -->
        <br>
        <button id="send">Register</button>
        <!--<input type="submit" value="Login">-->
      </form>
    </div>
    
    <!-- basic fancybox setup -->
<script type="text/javascript">

  $(document).ready(function() {
 $(".modalbox").fancybox().trigger('click'); 

    //$(".modalbox").fancybox();
    $("#contact").submit(function() { return false; });
	
	  });
$("#send").on("click", function(){
      
      var name        = $("#name").val();
      var surname     = $("#surname").val();
      var username    = $("#username").val();
      var email    	  = $("#email").val();
      var password    = $("#password").val();
            
     {        
        // first we hide the submit btn so the user doesnt click twice
        $("#send").replaceWith("<em>standby...</em>");
        
        $.ajax({
          type: 'POST',
          url: 'submitregistration.php',
          data: $("#contact").serialize(),
          success: function(data) {              
              $("#contact").fadeOut("fast", function(){
              if (data != 'false') {
                $(this).before("<p><strong>Please Wait.....</strong></p>");
                setTimeout("$.fancybox.close()", 1000);
                //alert(data);                              
                //location.replace("http://danielattard.com/fishshop/admin.php");
                }
                else if (data != 'true') {
                  $(this).before("<p><strong>Error.....</strong></p>");
                setTimeout("$.fancybox.close()", 1000);
                  //alert(data);                              
                location.replace("http://danielattard.com/fishshop/memberRegistration.php");
                }                          
              });            
          }
        });
      }
    });
  
</script>
    
    
  </body>
</html>
