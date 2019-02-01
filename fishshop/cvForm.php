<?PHP

require_once("./include/fgcontactform.php");
require_once("./include/captcha-creator.php");

$formproc = new FGContactForm();
$captcha = new FGCaptchaCreator('scaptcha');

$formproc->EnableCaptcha($captcha);


$formproc->AddRecipient('webmaster@danielattard.com'); 

$formproc->SetFormRandomKey('XsHVufPpgD9Epwl');

$formproc->AddFileUploadField('photo','jpg,jpeg,gif,png,bmp',2024);
$formproc->AddFileUploadField('resume','doc,docx,pdf,txt',2024);

if(isset($_POST['submitted']))
{
   if($formproc->ProcessForm())
   {
       // $formproc->RedirectToURL("thank-you.php");
		?>
		<script language="javascript" type="text/javascript">
		  alert('Thank you for the message. We will contact you shortly.');
		  window.location = 'home.html';
		</script>
	<?php
   }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Careers</title>
  	<meta charset="utf-8">
    <meta name="description" content="Aquatic Centre">
    <meta name="keywords" content="Aquaruim Fish Shop">
    <meta name="author" content="danielattard.com">
	<link rel="shortcut icon" href="./images/favicon.ico" >  
	<link rel="icon" type="image/gif" href="./images/favicon.gif" >  
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery-1.7.1.min.js"></script>
    <script type='text/javascript' src='js/gen_validatorv31.js'></script>
    <script type='text/javascript' src='js/fg_captcha_validator.js'></script>
	 <script src="js/jquery-1.7.1.min.js"></script>
    <script src="js/superfish.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/tms-0.4.1.js"></script>
    <script src="js/slider.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
</head>
<body>
<div class="main-indents">
    <div class="main">
        <!-- Header -->
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
					<li class="current"><a href="cvForm.php">Careers</a></li>	
					<li>
                        <a>Games</a>
                        <ul>
                            <li><a href="games/memgame.html">Memory Game</a></li>                            
                        </ul>
                    </li>          
                    <li><a href="contacts.html">contacts</a></li>
                </ul>
            </nav>
            <div class="clear"></div>
        </header>
        <!-- Content -->
        <section id="content"><div class="ic"></div>
            <div class="container_12">
            	<div class="a2">
                	<div class="wrapper">
                    	<div class="col-7">
							<h3 class="hp-1">Vacancies</h3>
								<h5>Sorry, there are no open vacancies</h5>
									<p class="p3">
										Would you like joining our team?
									</p>
									<p class="p3">
										Do you want your hobby to become your profession?
									</p>
									<p class="p3">
										Do you have what it takes to become a professional fish keeper?
									</p>
									<p class="p3">
										Are you customer oriented?
									</p>
									<p class="p3">
										So why not sending us your C.V. ?, and if a vacancy arises we'll contact you. 
									</p>                                              
                        </div>
						
                        <div class="col-10">						
                        	<h3>Upload Form</h3>			
								<!-- Form Code Start -->
								<form id='vacancy-form' action='<?php echo $formproc->GetSelfScript(); ?>' method='post' enctype="multipart/form-data" accept-charset='UTF-8'>
									<fieldset >
										<input type='hidden' name='submitted' id='submitted' value='1'/>
										<input type='hidden' name='<?php echo $formproc->GetFormIDInputName(); ?>' value='<?php echo $formproc->GetFormIDInputValue(); ?>'/>
										<input type='text' class='spmhidip' name='<?php echo $formproc->GetSpamTrapInputName(); ?>' />
										
										<div><span class='error'><?php echo $formproc->GetErrorMessage(); ?></span></div>
										
										<!--
										<div class='container'>
											<label for='name' >Your Full Name*: </label><br/>
											<input type='text' name='name' id='name' value='<?php echo $formproc->SafeDisplay('name') ?>' maxlength="50" /><br/>											
											<span id='vacancy-form_name_errorloc' class='error'></span>
										</div>
										-->
										<label class="name">
											<input type="text" name="name" value="Your Name" onfocus="if(this.value=='Your Name'){this.value=''}" onblur="if(this.value==''){this.value='Your Name'}">
										</label>
										<label class="email">
											<input type="email" name="email" value="Email" onfocus="if(this.value=='Email'){this.value=''}" onblur="if(this.value==''){this.value='Email'}">
										</label>
										<label class="message">
											<textarea name="message" onfocus="if(this.value=='Message'){this.value=''}" onblur="if(this.value==''){this.value='Message'}">Message</textarea>
										</label>
										<!--
										<div class='container'>
											<label for='email' >Email Address*:</label><br/>
											<input type='text' name='email' id='email' value='<?php echo $formproc->SafeDisplay('email') ?>' maxlength="50" /><br/>
											<span id='vacancy-form_email_errorloc' class='error'></span>
										</div>
										<div class='container'>
											<label for='message' >Message:</label><br/>
											<span id='vacancy-form_message_errorloc' class='error'></span>
											<textarea rows="10" cols="50" name='message' id='message'><?php echo $formproc->SafeDisplay('message') ?></textarea>
										</div>
										-->
										<!--
										<div class='container'>
											<label for='photo' >Your photo:</label><br/>
											<input type="file" name='photo' id='photo' /><br/>
											<span id='vacancy-form_photo_errorloc' class='error'></span>
										</div>
										-->
										<div class='container'>
											<br/>
											<input type="file" name='resume' id='resume' />
											<span id='vacancy-form_resume_errorloc' class='error'></span>
										</div>
										
										
										<label class="captchaImg">      
											<img class="captchaImg" alt='Captcha image' src='show-captcha.php?rand=1' id='scaptcha_img'>											
										</label>
										
										<label class="captchaXtra"> 
											<a href='javascript: refresh_captcha_img();'>Click here to refresh</a>
										</label>
								
								<label class="captcha">
								  <input type="text" maxlength="6" name="scaptcha" id='scaptcha' value="Captcha" onfocus="if(this.value=='Captcha'){this.value=''}" onblur="if(this.value==''){this.value='Captcha'}">
								</label> 
								
								<div class="btns">
                                    <a class="button" onClick="document.getElementById('vacancy-form').reset()">Clear</a>
                                    <a class="button" onClick="document.getElementById('vacancy-form').submit()">Send</a> 
                                </div>
							</fieldset>
						</form>
					</div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer -->
        <footer>
            <div id="copyright">
              &copy;2014 - Aquatic Centre - Malta. Design|Development : <a href="http://danielattard.com">danielattard.com</a> 
            </div>
            <ul class="social-list">
            	<!--<li><a href="#"><img src="images/soc-icon-1.png" alt=""></a></li>-->
                <li><a href="#"><img src="images/soc-icon-2.png" alt=""></a></li>
                <!--<li><a href="#"><img src="images/soc-icon-3.png" alt=""></a></li>-->
            </ul>
        </footer>
    </div>
</div>

<!-- client-side Form Validations:
Uses the excellent form validation script from JavaScript-coder.com-->

<script type='text/javascript'>
// <![CDATA[

    var frmvalidator  = new Validator("vacancy-form");
    frmvalidator.EnableOnPageErrorDisplay();
    frmvalidator.EnableMsgsTogether();
    frmvalidator.addValidation("name","req","Please provide your name");

    frmvalidator.addValidation("email","req","Please provide your email address");

    frmvalidator.addValidation("email","email","Please provide a valid email address");

    frmvalidator.addValidation("message","maxlen=2048","The message is too long!(more than 2KB!)");

    frmvalidator.addValidation("photo","file_extn=jpg;jpeg;gif;png;bmp","Upload images only. Supported file types are: jpg,gif,png,bmp");

    frmvalidator.addValidation("scaptcha","req","Please enter the code in the image above");

    document.forms['vacancy-form'].scaptcha.validator
      = new FG_CaptchaValidator(document.forms['vacancy-form'].scaptcha,
                    document.images['scaptcha_img']);

    function SCaptcha_Validate()
    {
        return document.forms['vacancy-form'].scaptcha.validator.validate();
    }

    frmvalidator.setAddnlValidationFunction("SCaptcha_Validate");

    function refresh_captcha_img()
    {
        var img = document.images['scaptcha_img'];
        img.src = img.src.substring(0,img.src.lastIndexOf("?")) + "?rand="+Math.random()*1000;
    }

// ]]>
</script>


</body>
</html>