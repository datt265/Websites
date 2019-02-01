<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <link rel="stylesheet" type="text/css" media="all" href="css/popupstyle.css">
    <link rel="stylesheet" type="text/css" media="all" href="css/fancybox/jquery.fancybox.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="css/fancybox/jquery.fancybox.js?v=2.0.6"></script>
    
    <title>Aquatic Centre - Member Login</title>  
    
  </head>

  <body>
  
    <div id="wrapper">
      <p><a class="modalbox" href="#inline" style="display: none;">click to login</a></p>
    </div>

    <!-- hidden inline form -->
    <div id="inline">
      <h2>Aquatic Centre - Member Login</h2>

      <form id="contact" name="contact" action="#" method="POST">
        <label for="username">Username</label>
        <input type="username" id="username" name="username" class="txt"> <!-- using popupstyle.css -->
        <br>
        <label for="password">Password&nbsp&nbsp</label>
        <input type="password" id="password" name="password" class="txt"> <!-- using popupstyle.css -->
        <br>
        <button id="send">Login</button>
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
</script>
    
    
  </body>
</html>
