<!DOCTYPE html>
<html>
<head>
    <title>goVagabond</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

     <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/prettyCheckable.css" rel="stylesheet" media="screen">
     <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery-ui-1.9.2.custom.css" rel="stylesheet" media="screen">
     <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/popup.css" rel="stylesheet" media="screen">
     <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.css" rel="stylesheet" type="text/css">
     <link href="<?php echo Yii::app()->request->baseUrl; ?>/select/select2.css" rel="stylesheet" type="text/css">
     <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/modal.css" rel="stylesheet" type="text/css">
     <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/datepicker.css" rel="stylesheet" type="text/css">
     <style>
      div#logInPopup {
              position:relative;
              top:313px; left:0px;
       }
       .pac-container { border:1px solid #rgba(82, 168, 236, 0.8);border-radius:0 0 5px 5px;  z-index: 1000000000 !important;  }
       .pointcursor { cursor:pointer; }
       .pac-item{ padding:2px 0.4em;}
     </style>


</head>
  <body>

    

    <!-- header -->

   <?php $this->renderPartial('//variable/headerhome'); ?> 

   <!-- Sign up popup -->

   <div id="messagePopup" class="modal fade">
    <div class="wd101">
      <div class="alert alert-success">
       <button data-dismiss="alert" class="close" type="button">X</button>
       <strong><span id="mphead"></span></strong><span id="mpdescription"></span>
      </div>
    </div>
   </div>

   <div id="forgotPopup" class="modal fade">
      <div class="frgt_popup forgot in">
           <div class="dcp-login">Forgot Password</div>
           <?php $form=$this->beginWidget('CActiveForm', array(
             'id'=>'forgot-form',
             'enableAjaxValidation'=>true,
             'enableClientValidation'=>false,
             'htmlOptions' => array("class"=>"form-group2"),
             'clientOptions'=>array(
               'validateOnSubmit'=>true,
               'validateOnChange'=>true,
               'validateOnType'=>true,
             ),
           )); ?>
            <div class="ftpwd-lft" >
              <?php echo $form->textField($loginform,'username',array(
                'placeholder'=>'Enter email',
                'class'=>'form-control')); ?>
              <?php echo $form->error($loginform,'username'); ?>
            </div>
            <div class="fr">
              <?php echo CHtml::submitButton('GO',array('class'=>'btn loginbtn')); ?>
            </div>
           <?php $this->endWidget(); ?>
      </div>
   </div>


   <div id="signUpPopup" class="modal fade">
      <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'signup-form',
        'enableAjaxValidation'=>true,
        'enableClientValidation'=>false,
        'htmlOptions' => array("class"=>"signup_popup signup in"),
        'clientOptions'=>array(
          'validateOnSubmit'=>true,
          'validateOnChange'=>true,
          'validateOnType'=>true,
        ),
      )); ?>
        <div class="dcp-login1">Enter your information signup to your traveller or guide account.</div>
        <div class="fb-button"><a class="facebookButton" href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/fb-sgnup.png" width="231" height="45" alt="facebook"></a></div>
        <div class="signup-or-separator shift">
        <span class="text">or</span>
        <hr>
        </div>
        <div class="create-using-email">
        Sign up with Email
        </div>
        <div class="form-group">
          <div class="fnm-signup">
            <?php echo $form->textField($userd,'first_name',array(
              'placeholder'=>'First Name',
              'class'=>'form-controln')); ?>
            <?php echo $form->error($userd,'first_name'); ?>
          </div>
          <div class="fnm-signup1">
             <?php echo $form->textField($userd,'last_name',array(
               'placeholder'=>'Last Name',
               'class'=>'form-controln')); ?>
             <?php echo $form->error($userd,'last_name'); ?>
          </div>
          </div>
        <div class="form-group">
             <?php echo $form->textField($user,'username',array(
               'placeholder'=>'Email Address or Username',
               'class'=>'form-controln')); ?>
             <?php echo $form->error($user,'username'); ?>
          </div>
       
       <div class="form-group">
          <div class="fnm-signup">
            <?php echo $form->dropDownList($userd,'gender', $gender, array ('class'=>'styled selectComp hideselect')) ?>
            <?php echo $form->error($userd,'gender'); ?>
          </div>

          <div class="form-group input-append date" id="dpYears" data-date="12-02-2012" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
             <?php echo $form->textField($userd,'dob',array(
               'placeholder'=>'Date of Birth',
               'class'=>'form-controln',
               'size'=>16,
               'type'=>'text',
               'readonly'=>true)); ?>
             <span class="add-on"><i class="icon-calendar"></i></span>
             <?php echo $form->error($userd,'dob'); ?>
         </div>
         
       </div>
       
       <div class="form-group">
        
         <?php echo $form->textField($userd,'location',array(
           'placeholder'=>'Location',
           'id'=>'UserDetail_location',
           'class'=>'form-controln')); ?>
         <?php echo $form->error($userd,'location'); ?>   
    
       </div>
       <div class="form-group">
        
         <div class="extension"> 
          <?php echo $form->textField($userd,'country_code',array( 
            'placeholder'=>'Extension',
            'class'=>'form-controln')); ?>
          <?php echo $form->error($userd,'country_code'); ?>  
        </div>

         <div class="mn-numbr"> 
          <?php echo $form->textField($userd,'mobile_number',array(
            'placeholder'=>'Mobile Number',
            'class'=>'form-controln')); ?>
          <?php echo $form->error($userd,'mobile_number'); ?>  
        </div>
       </div>
       <div class="form-group">
        
         <div class="fnm-signup">
          <?php echo $form->passwordField($user,'password',array(
            'placeholder'=>'Password',
            'class'=>'form-controln')); ?>
          <?php echo $form->error($user,'password'); ?>  
         </div>
         <div class="fnm-signup1">
          <?php echo $form->passwordField($user,'password_repeat',array(
            'placeholder'=>'Confirm Password',
            'class'=>'form-controln')); ?>
          <?php echo $form->error($user,'password_repeat'); ?>  
         </div>
       </div>
       <div class="plcy">
       <label class="color-wht">
               <input type="checkbox" name="UserDetail[terms]" id="UserDetail_terms"> By registering your confirm that you agree with our

         <a href="#">Terms & Conditions</a> and <a href="#">Privacy policy.</a>
       </label>
        <?php echo $form->error($userd,'terms'); ?>  

       </div>
        <div class=" fltlft"><button class="btn btn-inverse" data-dismiss="modal">CANCEL</button></div> 
        <div class="fr"><?php echo CHtml::submitButton('SIGN UP',array('class'=>'btn signupbtn')); ?></div>

     <?php $this->endWidget(); ?>
   </div>

   <!-- Login Popup -->
   <div id="logInPopup" class="modal fade">
     <?php $form=$this->beginWidget('CActiveForm', array(
      'id'=>'login-form',
      'htmlOptions' => array("class"=>"login_popup"),
      'enableAjaxValidation'=>true,
      'enableClientValidation'=>false,
      'clientOptions'=>array(
        'validateOnSubmit'=>true,
      ),
     )); ?>

          <div class="sep-login">&nbsp;</div>
          <!--<div class="dcp-login">Enter your email adress Login to 
          your traveller or guide account.</div>-->
          <div class="fb-button"><a href="#"><img src="images/fb-sgn.png" width="219" height="45" alt="facebook"></a></div>
          <div class="login-or-separator shift">
              <span class="text">or</span>
            <hr>
          </div>

           <div class="form-group">
            
             <?php echo $form->textField($loginform,'username',array(
               'placeholder'=>'Username',
               'class'=>'form-control')); ?>
             <?php echo $form->error($loginform,'username'); ?>

           </div>
           <div class="form-group">
            
             <?php echo $form->passwordField($loginform,'password',array(
               'placeholder'=>'Password',
               'class'=>'form-control')); ?>
             <?php echo $form->error($loginform,'password'); ?>

           </div>
           
           <div class="checkbox">
             <label  class="color-wht">
               <input type="checkbox" name="LoginForm[rememberMe]"> Remember Me
             </label>
             <div class="errorMessage" id="LoginForm_rememberMe_em_" style="display:none"></div>
           </div>

           <?php echo CHtml::submitButton('LOGIN',array('class'=>'btn loginbtn')); ?>
           <div class="frgt-pwd"><a data-toggle="modal" href="#" id="forgotButton">Forgot Password</a></div>
         
         <?php $this->endWidget(); ?>
   </div>
   <!-- header -->
  
   
   <!-- Banner -->
  
      <div class="banner">
        <ul>
            <li style=" background-image:url(<?php echo Yii::app()->request->baseUrl; ?>/images/experiences/AmazingIndia66.jpg); background-size: 100%; width: 25%;"></li>
          <li style=" background-image:url(<?php echo Yii::app()->request->baseUrl; ?>/images/experiences/GoVagabond-Picture14.jpg); background-size: 100%; width: 25%;"></li>
          <li style=" background-image:url(<?php echo Yii::app()->request->baseUrl; ?>/images/experiences/AmazingIndia75.jpg); background-size: 100%; width: 25%;"></li>
            <li style=" background-image:url(<?php echo Yii::app()->request->baseUrl; ?>/images/experiences/IB5.jpg); background-size: 100%; width: 25%;"></li> 
        <li style=" background-image:url(<?php echo Yii::app()->request->baseUrl; ?>/images/experiences/GoVagabond-Picture13.jpg); background-size: 100%; width: 25%;"></li>
        </ul>
    
     
     <!-- Banner Description -->
     
        <a href="#" class="unslider-arrow prev">&nbsp;</a>
    <a href="#" class="unslider-arrow next">&nbsp;</a>
  <!-- Banner Description -->
</div>
   <div class="wrapper">
       <div class="bannerin">
          <div class="formdv">
          <h1>Planning the perfect travel experience globally.</h1>
        <p>Take a tailor made travel experience with a friendly and knowledgeable local person as your personal expert!</p>
        <div class="wd100">
        
        <label class="label_check" for="pass-3"><input type="checkbox" class="checkbox_banr" value="yes" id="answer1" name="answer"/><span class="mar-rght2 font12 cksp">Experience Based Search</span> </label> 
        
        <label class="label_check" for="pass-2"><input type="checkbox" class="checkbox_banr" value="yes" id="answer2" name="answer"/> <span class="mar-rght2 font12 cksp">Location based Search</span></label> 

        </div>
        <div class="fields">
        <div class="box"><!--start box-->
                      <fieldset id="searchc1" class="searchBox">
                      <input type="text" placeholder="What do you wan't to explore ?" id="tags" class="searchTxt">
                      </fieldset> 

                      <fieldset id="searchc2" class="searchBox">
                      <input type="text" placeholder="Type your desired location" id="locationComplete1" class="searchTxt">
                      </fieldset>
                      
                      <input type="button" class="search" value="Search">      
                      </div>
                     
                     <!--end boxft-->
                         
                        <!--end boxrt-->
                         
                         <div class="clear"></div>
                   </div>
</div>

</div>
    </div>
    
  
  </div>
  <!-- Banner -->
   
      
   <div class="row backmn">
      <div class="cont">
        <div class="col-5">
           <div class="sidemenu"><!--start sidemenu-->
                       <div class="location"><!--start location-->
                       <h1>Target Countries</h1>
                       </div><!--end location-->
                       
                       <div class="list"><!--start list-->
                          <ul>
                             <li><a href="#">India</a></li>
                             <li><a href="#">Thailand</a></li>
                             <li><a href="#">Romania</a></li>
                             <li><a href="#">Austria</a></li>
                             <li><a class="active" href="#">Hungary</a></li>
                             <li><a href="#">Vietnam</a></li>
                             <li><a href="#">Cambodia</a></li>
                             <li><a href="#">Turkey</a></li>
                             <li><a href="#">China</a></li>
                             <li><a href="#">Japan</a></li>
                             <li><a href="#">Slovakia</a></li>
                             <li><a href="#">Poland</a></li>
                             <li><a href="#">Spain</a></li>
                             <li><a class="last" href="#">Portugal</a></li>
                         </ul> 
             </div><!--end list-->
                      </div>
               </div>
    <div class="col-lg-8">
     <div class="menu">
      <ul>
          <li><a href="#">City</a></li>
            <li><a href="#">Culture</a></li>
            <li><a href="#">Religion and Spiritualism</a></li>
            <li><a href="#">Food and Wine</a></li>
            <li><a href="#">other categories</a></li>
        </ul>
    
    </div>
      <div class="lt-row">
          <div class="lst-wrp mar-rght2">
            <a href="#"><h1>A traditional Goan with wine, Goa</h1></a>
          <div class="ltmn">
              <div class="lst-row">75 USD | 3 hour</div>
                <div class="lst-rowrt"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/star.png" width="122" height="20" alt="stars"></div>
            </div>
            
        <div class="wd10ctr"><img class="img-brdr" src="<?php echo Yii::app()->request->baseUrl; ?>/images/experiences/65384_294470103987312_29889210_n.jpg" width="241" height="186"> </div>
        </div>
        
        <div class="lst-wrp mar-rght2">
          <a href="#"> <h1>A Mughal monument walk, Allahabad</h1></a>
       <div class="ltmn"> 
          <div class="lst-row">80 USD | 6 hour</div>
          <div class="lst-rowrt"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/star.png" width="122" height="20" alt="stars"></div>
        </div>
            
        <div class="wd10ctr"><img class="img-brdr" src="<?php echo Yii::app()->request->baseUrl; ?>/images/experiences/IB5.jpg" width="241" height="186"> </div>
          
        </div><div class="lst-wrp">
        <a href="#"><h1>Ibn Batuta's, Delhi</h1></a>
        <div class="ltmn"><div class="lst-row">100 USD | 4 hour</div><div class="lst-rowrt"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/star.png" width="122" height="20" alt="stars"></div></div>
            
        <div class="wd10ctr"><img class="img-brdr" src="<?php echo Yii::app()->request->baseUrl; ?>/images/experiences/IB5.jpg" width="241" height="186"> </div>
          
        </div></div><div class="lt-row"><div class="lst-wrp mar-rght2">
       <a href="#"> <h1>A walk in Lutyen's Delhi, Dlehi</h1></a>
       <div class="ltmn"> <div class="lst-row">90 USD | 4 hour</div><div class="lst-rowrt"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/star.png" width="122" height="20" alt="stars"></div></div>
            
       <div class="wd10ctr"> <img class="img-brdr" src="<?php echo Yii::app()->request->baseUrl; ?>/images/experiences/ID3.jpg" width="241" height="186"> </div>
          
        </div><div class="lst-wrp mar-rght2">
        <a href="#"><h1>Hawelis of Old Delhi, Delhi</h1></a>
      <div class="ltmn">  <div class="lst-row">120 USD | 6 hour</div><div class="lst-rowrt"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/star.png" width="122" height="20" alt="stars"></div></div>
            
        <div class="wd10ctr"><img class="img-brdr" src="<?php echo Yii::app()->request->baseUrl; ?>/images/experiences/OS3.jpg" width="241" height="186"> </div>
          
        </div><div class="lst-wrp">
       <a href="#"> <h1>A private tour of the Taj Mahal, Agra</h1></a>
      <div class="ltmn">  <div class="lst-row">250 USD | 16 hour</div><div class="lst-rowrt"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/star.png" width="122" height="20" alt="stars"></div></div>
            
       <div class="wd10ctr"> <img class="img-brdr" src="<?php echo Yii::app()->request->baseUrl; ?>/images/experiences/Photo0350.jpg" width="241" height="186"> </div>
          
        </div></div><div class="lt-row"><div class="lst-wrp mar-rght2">
       <a href="#"> <h1>Bazars of Phuket, Thailand</h1></a>
        <div class="ltmn"><div class="lst-row">85 USD | 5 hour</div><div class="lst-rowrt"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/star.png" width="122" height="20" alt="stars"></div></div>
            
      <div class="wd10ctr">  <img class="img-brdr" src="<?php echo Yii::app()->request->baseUrl; ?>/images/experiences/Thailand1.jpg" width="241" height="186"> </div>
          
        </div><div class="lst-wrp mar-rght2">
     <a href="#">   <h1>Vedic tour of India, Varanasi</h1></a>
      <div class="ltmn">  <div class="lst-row">450 USD | 7 days</div><div class="lst-rowrt"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/star.png" width="122" height="20" alt="stars"></div></div>
            
       <div class="wd10ctr"> <img class="img-brdr" src="<?php echo Yii::app()->request->baseUrl; ?>/images/experiences/Varanasi 3.jpg" width="241" height="186"> </div>
          
        </div><div class="lst-wrp">
     <a href="#">   <h1>Cycling in the mountains of Vietnam, Vietnam</h1></a>
       <div class="ltmn"> <div class="lst-row">150 USD | 6 hour</div><div class="lst-rowrt"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/star.png" width="122" height="20" alt="stars"></div></div>
            
       <div class="wd10ctr"> <img class="img-brdr" src="<?php echo Yii::app()->request->baseUrl; ?>/images/experiences/Vietnam.jpg" width="241" height="186"> </div>
          
        </div></div>
        
        
        
    </div>
    
    </div>
   </div>

   
   <?php $this->renderPartial('//variable/footerhome'); ?> 


   <!-- <script src="scripts/popup.js"></script> -->
   <script src="<?php echo Yii::app()->request->baseUrl; ?>/scripts/rohan.js"></script>
   <script src="<?php echo Yii::app()->request->baseUrl; ?>/select/select2.js"></script>
   <script src="<?php echo Yii::app()->request->baseUrl; ?>/scripts/bootstrap.js"></script>
   <script src="<?php echo Yii::app()->request->baseUrl; ?>/scripts/jquery-ui-1.9.2.custom.js"></script>
   <script>
 $(function() {
   var availableTags = [
     "ActionScript",
     "AppleScript",
     "Asp",
     "BASIC",
     "C",
     "C++",
     "Clojure",
     "COBOL",
     "ColdFusion",
     "Erlang",
     "Fortran",
     "Groovy",
     "Haskell",
     "Java",
     "JavaScript",
     "Lisp",
     "Perl",
     "PHP",
     "Python",
     "Ruby",
     "Scala",
     "Scheme"
   ];
   $( "#tags" ).autocomplete({
     source: availableTags
   });
 });
 </script>
   <script src="<?php echo Yii::app()->request->baseUrl; ?>/scripts/prettyCheckable.js"></script>
  <!--  // <script src="scripts/bootstrap-dropdown.js"></script> -->
   <!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>-->
   
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/scripts/features.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/scripts/script.js"></script>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?libraries=places&sensor=false&region=all"></script>
<script>
  function initialize() {

  var input = document.getElementById('UserDetail_location');
  var options = {
    types: ['(cities)'],
    //componentRestrictions: {country: 'fr'}
  };

  autocomplete = new google.maps.places.Autocomplete(input, options);
  
  var input1 = document.getElementById('locationComplete1'); autocomplete1 = new google.maps.places.Autocomplete(input1, options);

  // google.maps.event.addListener(autocomplete, 'place_changed', function() {
  // //console.log(autocomplete.getPlace().formatted_address); 
  // //document.getElementById('LocationCompete').value = autocomplete.getPlace().formatted_address; 
  // //alert(document.getElementById('LocationCompete').value);
  // });

  }
  google.maps.event.addDomListener(window, 'load', initialize);
</script>

   <script type="text/javascript">
jQuery(function(){

  <?php if(isset($errorhead)) { ?>
       
       var mphead = "<?php echo $errorhead; ?>";
       var mpdescription = "<?php echo $errordesc; ?>";
       $('#mphead').text(mphead); $('#mpdescription').text(mpdescription);
       $('#messagePopup').modal('show');

  <?php } ?>

$(".selectComp").select2(); 

jQuery('.fadein img:gt(0)').hide();
setInterval(function(){jQuery('.fadein :first-child').fadeOut().next('img').fadeIn().end().appendTo('.fadein');}, 5000);
}); 
</script>

<script src="<?php echo Yii::app()->request->baseUrl; ?>/scripts/unslider.min.js"></script>
<script>
   $(function() {

    var unslider = $('.banner').unslider();
    
    $('.unslider-arrow').click(function() {
        var fn = this.className.split(' ')[1];
        
        //  Either do unslider.data('unslider').next() or .prev() depending on the className
        unslider.data('unslider')[fn]();
    });

    $('input.checkbox_banr').prettyCheckable();

});
</script>


<script type="text/javascript">
// $(function(){
// $('select.styled').customSelect();
// });
</script>

<script src="<?php echo Yii::app()->request->baseUrl; ?>/scripts/datepicker.js"></script>
<script type="text/javascript">
  window.onload = function(){
    new JsDatePick({
      useMode:2,
      target:"inputField",
      dateFormat:"%d-%M-%Y"
  });

  $('#dpYears').datepicker();
  };
</script>



  </body>
</html>
