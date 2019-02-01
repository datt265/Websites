<?php
session_start();
if (!isset($_SESSION['SESS_STATUS_ADMIN']) || $_SESSION['SESS_STATUS_ADMIN'] != "ADMINOK") {
header('location: adminlogin.php');}
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Aquatic Centre - Admin</title>
    <meta charset="utf-8">
    <meta name="description" content="Aquatic Centre">
    <meta name="keywords" content="Aquaruim Fish Shop">
    <meta name="author" content="danielattard.com">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery-1.7.1.min.js"></script>
    <script src="js/superfish.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/tms-0.4.1.js"></script>
    <script src="js/slider.js"></script>
    <script src="js/jquery.cycle.all.min.js"></script>
  </head>
  
  <body>  
  <script type='text/javascript'>
		
    $(document).ready(function(){
      $('#menu a').click(function(){
        $('.content').hide();
        handleNewSelection.apply($("#menu"));
        $('#'+this.rel+'').show();
      return false;
      });
      $('.content input.close').click(function(){
        $(this).parent().hide();
      });
    });       
         
    hideAllDivs = function () {
      $("#createEvent").hide();
      $("#modifyEvent").hide();
      $("#removeEvent").hide();
    };

    handleNewSelection = function () {
      hideAllDivs();      
    };

    $(document).ready(function() {        
      handleNewSelection.apply($("#menu"));      
    });
      
    //checks
    function validate(form) {    
      var eventDescription=form.eventDescription;      
      if (eventDescription.value=="") {
		alert("Event Description is Empty ");
		eventDescription.focus();
      return false
      }      
      return true; // allow submission      
    }	
	
	/*
	function getDetails(menuCaller){   
	if (menuCaller == 'r'){           
       var productCode =  $("#productCode\\[r\\]").val();             
     }
     
     if (menuCaller == 'm') {      
       var productCode =  $("#productCode\\[m\\]").val();
     }      
	 
     $.ajax({ type: "POST", 
      url: 'http://danielattard.com/fishshop/createevent.php',  
      data: 'eventCode='+eventCode,+ '&eventDate='+eventDate+  '&eventDescription='+eventDescription , 
	  cache: false,       
     });        
     return true; 
} //end function getDetails 
    
	*/
	 
	 
	
  
  
  function downloadUrl(url, callback) {
      var request = window.ActiveXObject ?
        new ActiveXObject('Microsoft.XMLHTTP') :
        new XMLHttpRequest;

      request.onreadystatechange = function() {
      if (request.readyState == 4) {
        request.onreadystatechange = doNothing;
        callback(request, request.status);
      }
      };

      request.open('GET', url, true);
      request.send(null);
    }

  function doNothing() {}

  </script>
  
  
  <!-- ********************************************************* -->
    <div id="header">
    <?php
      echo "<div>";
      echo "&nbsp<a href='pclogout.php' style='color:#FFFFFF' >Logoff";  
      echo "  ";  
      echo "&nbsp" .$_SESSION['userlogin']. "</a>";        
      echo "</div>";
    ?>
    </div>
	
      <div class="main-indents">
        <div class="main">    
			<header>
            <h1 class="logo"><a href="home.html">Aquatic Centre</a></h1>
            <nav>
                <ul class="sf-menu">
                    <li><a href="home.html">home</a></li>
                    <li><a href="about.html">About</a></li>
                    <li>
                        <a href="gallery.html">Gallery</a>
                        <ul>
                            <li><a href="#">Tropical Fish</a></li>
                            <li><a href="#">Aquatic Plants</a></li>
                            <li>
                                <a href="#">Marine</a>
                                <ul>
                                    <li><a href="#">Fish</a></li>
                                    <li><a href="#">Corals</a></li>
                                </ul>
                            </li>                           
                        </ul>
                    </li>                    
                    <li><a href="members_info.html">Members Info</a></li>
					<li><a href="cvForm.php">Careers</a></li>
					<li>
                        <a>Games</a>
                        <ul>
                            <li><a href="games/memgame.html">Memory Game</a></li>                            
                        </ul>
                    </li> 
					 <li class="current"><a href="admin.php">Admin</a></li>	
                    <li><a href="contacts.html">contacts</a></li>
                </ul>
            </nav>
            <div class="clear"></div>
        </header>    
        
	        <!-- Slider -->
	        <div class="mp-slider">
	            <ul class="items">
	                <li><img src="images/slide-1.jpg" alt="" /><div class="banner"><span class="row-1"><b>Enjoy</b> an Aquarium</span><span class="row-2">in your own <b>Home</b></span></div></li>
	                <li><img src="images/slide-2.jpg" alt="" /><div class="banner"><span class="row-1"><b>All</b> the Beauty</span><span class="row-2">of the live bearing <b>Fish</b></span></div></li>
	                <li><img src="images/slide-3.jpg" alt="" /><div class="banner"><span class="row-1"><b>Find</b> the treasures</span><span class="row-2">in a planted <b>World</b></span></div></li>
	            </ul>
	            <a href="#" class="mp-prev"></a>
	            <a href="#" class="mp-next"></a>
	        </div>
        
        <!-- Content -->    
		 <section id="content"><div class="ic"></div>
	     	<div class="container_12">
				<article class="content-box">
					<div class="wrapper">
		              	<div class="col-11">
							<section>
								<ul class="link-list" id="menu">                              
									<li><a href="createEvent" rel="createEvent">Create Event</a></li>
									<li><a href="modifyEvent" rel="modifyEvent">Modify Event</a></li>
									<li><a href="removeProduct" rel="removeEvent">Remove Product</a></li>                    
								</ul>
							</section>     
						</div>
	      
						<div class="col-12">				
							<section>          
				            	<div id="createEvent">
									<table>
										<tr>
											<td>
												<th>Create Event</th>
											</td>
										</tr>              
									</table>
									<form name="createEvent" action="createevent.php" method="POST" onsubmit="return validate(this);">
					                	<table>             
					                
					                		<tr>
					                			<td>
					                  				<label>Event Code</label>        
					                			</td>
					                			<td>
									            	<select id="eventCode" name="eventCode" >
													 	<option value="tropic">Tropical</option>
									                  	<option value="marine">Marine</option>
									            	    <option selected = "selected" value="plants">Plants</option>                  
									                 </select><br>  
									         	</td>
									         </tr>
					                
					                		<tr>
					                			<td>
								                	<label>Event Date</label>        
								                </td>
								                <td>												
								                	<input name="eventDate" type="date"/><br>  
						                		</td>
						                	</tr>				
							             
											<tr>
												<td class="txtTop">
													<label>Event Description</label>  
												</td>
												<td>                  
													<textarea maxlength="100" rows="5" name="eventDescription"></textarea>
												</td>
											</tr>													
							               					                
					                		<tr>
						                		<td class="txtCenter" colspan="2">
						                			<input type="submit" value="Create Event" >
						                		</td>
					                		</tr>                
					              		</table>
				              		</form>            
				            	</div>
							</section> <!-- //end section add product -->  
									
							<section>
								<div id="modifyEvent">
									<?php  
										include($_SERVER['DOCUMENT_ROOT']."/talpools/getproductcodes.php");                
									?>
									<table>
										<tr>
											<td>
												<th>Modify Event</th>
											</td>
										</tr>
									</table>              
									<form name="modifyEvent" action="modifyevent.php" method="POST" enctype="multipart/form-data" onsubmit="return validateMod(this);">
										<table>
											<tr>
												<td>
												 	<label>Product Code</label>        
												</td>
												<td>
													<select name="productCode" id="productCode[m]" onchange="getDetails('m');">
														<option selected = "selected" value=""></option>
													  	<?php echo $productCode; ?>        
													</select>  
												</td>
												
												<tr>
													<td>
												  		<label>Product Image</label>        
													</td>                				
													<td class="txtTop" id="productImageName[m]"></td>
													<tr>
														<td>
															<td>
																<input type="file" name="myfile2" id="myfile2">
															</td>										
													
													<td>
													<input id="productImageNameText[m]" name="productImageNameText" maxlength="50" type="hidden"><br>  
													</td>
												</tr>
										
												<tr><td>
												  <label>Product Name</label>        
												</td>
												<td>
												  <input id="productName[m]" name="productName" maxlength="20" type="text" ><br>  
												</td></tr>
												  
												<tr><td class="txtTop">
												  <label>Product Description</label>  
												</td>
												<td>                  
												  <textarea maxlength="100" rows="5" id="productDescription[m]" name="productDescription" ></textarea>
												</td></tr>
												
												<tr><td>
												  <label>Product Category</label>        
												</td>
												<td>
												  <select id="categoryId[m]" name="categoryId" >
												  <option value=""></option>
												  <option value="a">Accesories</option>
												  <option value="c">Chemicals</option>
												  <option value="p">Parts</option>           
												  </select><br>  
												</td></tr>
												
												<tr><td>
												  <label>Product Price</label>        
												</td>
												<td>
												  <input id="productPrice[m]" name="productPrice" maxlength="6" type="text" /><br>  
												</td></tr>  
				
												<tr><td>
												  <label>Active Product</label>  
												</td>
												<td>                  
												  <select name="active" id="active[m]">
												  <option value=""></option>  
												  <option value="0">No</option>
												  <option value="1">Yes</option>
												  </select><br>                  
												</td></tr>
				
												
												<tr><td>
												  <label>Featured Product</label>  
												</td>
												<td>                  
												  <select name="featured" id="featured[m]">
												  <option value=""></option>  
												  <option value="0">No</option>
												  <option value="1">Yes</option>
												  </select><br>  
												</td></tr>
				
												
											<tr>
												<td class="txtCenter" colspan="2">
													<input type="submit" value="Save Changes" >
												</td>
											</tr>																
										</table>
							  		</form>					
								</div>           
							</section> <!-- //end section modify product -->  
							
							<section>
								<div id="removeEvent">
									<?php  
										include($_SERVER['DOCUMENT_ROOT']."/talpools/getproductcodes.php");                
									?>
									<table>
									 	<tr>
									 		<td>
												<th>Remove Event</th>
											</td>
										</tr>  
									</table>            
									
									<form name="removeEvent" action="removeevent.php" method="POST" enctype="multipart/form-data" onsubmit="return validate(this);">
										<table>	
											<tr>	
												<td>
													<label>Product Code</label>        
												</td>
												<td>
													<select name="productCode" id="productCode[r]" onchange="getDetails('r');">
										  				<option selected = "selected" value=""></option>
														<?php echo $productCode; ?>        
													</select>  
												</td>
													  
												<td class="txtTop" name="productImageName" id="productImageName[r]"></td>
											</tr>
								
											<tr>
												<td>
										  			<label>Product Name</label>        
												</td>
												<td>
										  			<input id="productName[r]" maxlength="20" type="text" disabled/><br>  
												</td>
											</tr>											
								
											<tr>
												<td class="txtTop">
										  			<label>Product Description</label>  
												</td>
												<td>                  
										  			<textarea maxlength="100" rows="5" id="productDescription[r]" name="productDescription" disabled></textarea>
												</td>
											</tr>
										
											<tr>
												<td>
											  		<label>Product Category</label>        
												</td>
												<td>
												  	<input id="categoryId[r]" name="categoryId" disabled >                    
												</td>
											</tr>
											
											<tr>
												<td>
											  		<label>Product Price</label>        
												</td>
												<td>
											  		<input id="productPrice[r]" name="productPrice" maxlength="6" type="text" disabled/><br>  
												</td>
											</tr>  
				
											<tr>
												<td>
											  		<label>Active Product</label>  
												</td>
												<td>                  
											  		<input id="active[r]" name="active" disabled>                  
												</td>
											</tr>
					
											<tr>
												<td>
													<label>Featured Product</label>  
												</td>
												<td>                  
											  		<input id="featured[r]" name="featured" disabled>                  
												</td>
											</tr>
										
											<tr>
												<td class="txtCenter" colspan="2">
													<input type="submit" value="Remove Product" >
												</td>
											</tr>
										</table>
									</form>  
								</div>           
							</section> <!-- //end section remove product -->          
						</div> <!-- //end class col-12 -->
					</div> <!-- //end class wrapper -->						
				</article>
			</div>
		</section>
	
	<!-- Footer -->
        <footer>
            <div id="copyright">
              &copy; Aquatic Centre - Malta. All rights reserved. | Design: <a href="http://danielattard.com">danielattard.com</a> 
            </div>
            <ul class="social-list">
            	<!--<li><a href="#"><img src="images/soc-icon-1.png" alt=""></a></li>-->
                <li><a href="#"><img src="images/soc-icon-2.png" alt=""></a></li>
                <!--<li><a href="#"><img src="images/soc-icon-3.png" alt=""></a></li>-->
            </ul>
        </footer> 
		
		 </div>
    </div>
  
  
     
  <!-- ********************************************************* -->
  
</html>