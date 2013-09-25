<!DOCTYPE html>
<html>
<head>
    <title>goVagabond</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

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
       .pac-container { border:1px solid #rgba(82, 168, 236, 0.8); width:510px !important; left:415px !important; border-radius:0 0 5px 5px;  z-index: 1000000000 !important;  }
       .pointcursor { cursor:pointer; }
     </style>


</head>
  <body>

    

    <!-- header -->
   
   <?php $this->renderPartial('//variable/headerhome'); ?> 

   <!-- Sign up popup -->
   <div id="signUpPopup" class="modal fade">
   <div class="close" data-dismiss="modal">X</div>
      <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'signup-form',
        'enableAjaxValidation'=>true,
        'enableClientValidation'=>true,
        'clientOptions'=>array(
          'validateOnSubmit'=>true,
        ),
      )); ?>
           <div class="dcp-login1">Enter your information signup to your traveller or guide account.</div>
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
           'id'=>'LocationCompete',
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
               <input type="checkbox"> By registering your confirm that you agree with our

         <a href="#">Terms & Conditions</a> and <a href="#">Privacy policy</a>
             </label>
       </div>
        <?php echo CHtml::submitButton('SIGN UP',array('class'=>'btn signupbtn')); ?>
        <div class="frgt-pwd"><a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/fb-sgn.png" width="219" height="45" alt="facebook"></a></div>
     <?php $this->endWidget(); ?>
   </div>

   <!-- Login Popup -->
   <div id="logInPopup" class="modal fade">
     <form role="form" class="login_popup">
             <div class="sep-login">&nbsp;</div>
          <div class="dcp-login">Enter your email adress Login to 
     your traveller or guide account.</div>
           <div class="form-group">
            
             <input type="email" placeholder="Enter email" id="exampleInputEmail1" class="form-control">
           </div>
           <div class="form-group">
            
             <input type="password" placeholder="Password" id="exampleInputPassword1" class="form-control">
           </div>
           
           <div class="checkbox">
             <label  class="color-wht">
               <input type="checkbox"> Remember Me
             </label>
           </div>
           <button class="btn loginbtn" type="submit">LOGIN</button>
           <div class="frgt-pwd"><a href="#">Forgot Password</a></div>
            <div class="frgt-pwd"><a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/fb-sgn.png" width="219" height="45" alt="facebook"></a></div>
         </form>
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
        
                <label class="label_check pointcursor" for="pass-3"><input type="checkbox"  id="pass-3" ><span class="mar-rght2 font12 cksp">Trending</span> </label> 
        
        <label class="label_check pointcursor" for="pass-2"><input type="checkbox"  id="pass-2"> <span class="mar-rght2 font12 cksp">Country based</span></label> 
        
        <label class="label_check pointcursor" for="pass-1"><input type="checkbox"  id="pass-1"><span class="mar-rght2 font12 cksp">City based</span></label> 
        </div>
        <div class="fields">
        <div class="box"><!--start box-->
                      <div class="boxft fltlft" id="searchc1"><!--start boxft-->
                             <select class="styled selectComp">
                                <option value="0">Country</option>
                                <option value="1">Country1</option>
                                <option value="2">Country2</option>
                             </select>
                      </div>  
                      <div class="boxft fltlft" id="searchc2"><!--start boxft-->
                             <select class="styled selectComp">
                                <option value="0">City</option>
                                <option value="1">City1</option>
                                <option value="2">City1</option>
                             </select>
                      </div>
                      <fieldset id="searchc3" class="searchBox">
                      <input type="text" value="What do you want to explore ?" class="searchTxt">
                      <input type="submit" value="Search" onclick="return false;" class="searchSubmit">
                      </fieldset>
                      
                      <div class="boxrt srchbtn"><!--start boxrt-->
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
   <script src="<?php echo Yii::app()->request->baseUrl; ?>/scripts/datepicker.js"></script>
  <!--  // <script src="scripts/bootstrap-dropdown.js"></script> -->
   <!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>-->
   
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/scripts/features.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/scripts/script.js"></script>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?libraries=places&sensor=false&region=all"></script>
<script>
  function initialize() {

  var input = document.getElementById('LocationCompete');
  var options = {
    types: ['(cities)'],
    //componentRestrictions: {country: 'fr'}
  };

  autocomplete = new google.maps.places.Autocomplete(input, options);
  
  google.maps.event.addListener(autocomplete, 'place_changed', function() {
  console.log(autocomplete.getPlace().formatted_address); 
  //document.getElementById('LocationCompete').value = autocomplete.getPlace().formatted_address; 
  //alert(document.getElementById('LocationCompete').value);
  });

  }
  google.maps.event.addDomListener(window, 'load', initialize);
</script>

   <script type="text/javascript">
jQuery(function(){

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

});
</script>


<script type="text/javascript">
// $(function(){
// $('select.styled').customSelect();
// });
</script>
<script type="text/javascript">
  window.onload = function(){
    new JsDatePick({
      useMode:2,
      target:"inputField",
      dateFormat:"%d-%M-%Y"
  });
  };
</script>

<!-- And the JavaScript -->


<script>
  var d = document;
var safari = (navigator.userAgent.toLowerCase().indexOf('safari') != -1) ? true : false;
var gebtn = function(parEl,child) { return parEl.getElementsByTagName(child); };
onload = function() {
    
    var body = gebtn(d,'body')[0];
    body.className = body.className && body.className != '' ? body.className + ' has-js' : 'has-js';
    
    if (!d.getElementById || !d.createTextNode) return;
    var ls = gebtn(d,'label');
    for (var i = 0; i < ls.length; i++) {
        var l = ls[i];
        if (l.className.indexOf('label_') == -1) continue;
        var inp = gebtn(l,'input')[0];
        if (l.className == 'label_check') {
            l.className = (safari && inp.checked == true || inp.checked) ? 'label_check c_on' : 'label_check c_off';
            l.onclick = check_it;
        };
        if (l.className == 'label_radio') {
            l.className = (safari && inp.checked == true || inp.checked) ? 'label_radio r_on' : 'label_radio r_off';
            l.onclick = turn_radio;
        };
    };
};
var check_it = function() {
    var inp = gebtn(this,'input')[0];
    if (this.className == 'label_check c_off' || (!safari && inp.checked)) {
        this.className = 'label_check c_on';
        if (safari) inp.click();
    } else {
        this.className = 'label_check c_off';
        if (safari) inp.click();
    };
};
var turn_radio = function() {
    var inp = gebtn(this,'input')[0];
    if (this.className == 'label_radio r_off' || inp.checked) {
        var ls = gebtn(this.parentNode,'label');
        for (var i = 0; i < ls.length; i++) {
            var l = ls[i];
            if (l.className.indexOf('label_radio') == -1)  continue;
            l.className = 'label_radio r_off';
        };
        this.className = 'label_radio r_on';
        if (safari) inp.click();
    } else {
        this.className = 'label_radio r_off';
        if (safari) inp.click();
    };
};
</script>
  </body>
</html>
