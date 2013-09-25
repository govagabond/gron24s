<!DOCTYPE html>
<html>
<head>
    <title>goVagabond</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/select/select2.css" rel="stylesheet" type="text/css">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/modal.css" rel="stylesheet" type="text/css">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery.navgoco.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery.Jcrop.css" type="text/css" />

     <style>
       div#logInPopup {
              position:relative;
              top:313px; left:0px;
       }
       .pac-container { border:1px solid #rgba(82, 168, 236, 0.8);border-radius:0 0 5px 5px;  z-index: 1000000000 !important;  }
       .pointcursor { cursor:pointer; }
	   .pac-item{ padding:2px 0.4em;}

/* Sticky footer styles
      -------------------------------------------------- */

      html,
      body {
        height: 100%;
        /* The html and body elements cannot have any padding or margin. */
      }

      /* Wrapper for page content to push down footer */
      #wrap {
        min-height: 100%;
        height: auto !important;
        height: 100%;
        /* Negative indent footer by it's height */
        margin: 0 auto -60px;
      }

      /* Set the fixed height of the footer here */
      #push,
      #footer {
        height: 60px; line-height:38px;
      }
     

      /* Lastly, apply responsive CSS fixes as necessary */
      



      /* Custom page CSS
      -------------------------------------------------- */
      /* Not required for template or sticky footer method. */

      #wrap > .container {
        padding-top: 70px;
      }
      .container .credit {
        margin: 20px 0 0px 0;
      }

      /*code {
        font-size: 80%;
      }*/
      div.errorMessage {
      margin-left: 5px !important;
      color: green !important;
      text-align: right;
      font-size: 14px;
      }
     </style>

</head>
  <body >

    <div id="wrap">

    
  <?php $this->renderPartial('//variable/headerpostlogin'); ?> 

   <!-- Crop popup -->
  <div id="cropPopup" class="modal fade">
  
    <form id="coppr_cont" action="/index.php/site/indexnext" method="post" class="signup in">
     <div class="page-title txt-cntr">
     Crop Picture
     </div>
     <div class="coppr_pic">
      <img src="" width="400" height="400" alt="cropper" id="target"> </div>
      <div class=" fltlft">
       <button class="btn btn-inverse" data-dismiss="modal">CANCEL</button>
      </div>
      <div class="fr">
        <button class="btn signupbtn" id="croppicture" type="button">Crop Picture</button> 
        </div>
    </form>
  </div>

     <!-- Message popup -->
   <div id="messagePopup" class="modal fade">
    <div class="wd101">
      <div class="alert alert-success">
       <button data-dismiss="alert" class="close" type="button">X</button>
       <strong><span id="mphead"></span></strong><span id="mpdescription"></span>
      </div>
    </div>
   </div>
    
	  
      <!-- Begin page content -->
      <div class="container">
        
        <div id="account">
            	<div class="row">
                	<div class="dashboad_links">
                    	<ul>
                        	<li><a href="#">Manage Account</a></li>
                            <li><a href="#">Messages</a></li>
                            <li><a href="#">Your Trips</a></li>
                            <li><a href="#">Manage Tour</a></li>
                            <li><a href="#">Create Experience</a></li>
                            <li class="last"><a href="#">Changed Picture</a></li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                	<div class="col-3">
                    	<div id="user_pic">
                        <div class="pic">
                        <img src="<?php if($user->UserDetail->imagemarker==0) { echo Yii::app()->request->baseUrl.'/images/user-dashboard.jpg'; } elseif($user->UserDetail->imagemarker==1) { echo $user->UserDetail->image_url; } elseif($user->UserDetail->image_marker==2) { echo $user->UserDetail->image_source; } ?>" width="81" height="78" alt="user-dashboard"> 
                        </div>
                        	
                            <div class="description">
                           Take a tailor made travel .
                            </div>
                            </div>
                      <div class="edit_dashboard_links">
                        	<ul>
                            	  <li class="selected"><a href="#">General Information <span class="icon"></span></a></li>
                                <li><a href="#">Local expert information <span class="icon"></span></a></li>
                                <li><a href="#">Update username/password <span class="icon"></span></a></li>
                               
                            </ul>
                        </div>
                    </div>
                    <div class="col-9 content">
                   <br>
                    	
                    <div class="dashboard_middle">
                  <h1 class="dashboard_title1">Display picture</h1>
                    <div class="profile_pic_mn clearfix">
                        	<div class="profile_pic_container">
                            <img id="savedpicture" src="<?php echo Yii::app()->request->baseUrl; ?>/images/default.jpg" width="219" height="219" alt="default-pciture"> </div>
                        
                        <div class="upload_area_container">
                          <?php $form=$this->beginWidget('CActiveForm', array(
                            'id'=>'url-form',
                            'action'=>$this->createUrl('user/weburl'),
                            'enableAjaxValidation'=>true,
                            'enableClientValidation'=>false,
                            'htmlOptions' => array("class"=>""),
                            'clientOptions'=>array(
                              'validateOnSubmit'=>true,
                              'validateOnChange'=>true,
                              'validateOnType'=>true,
                            ),
                          )); ?>
                       		<div class="upload_url_container">
                            <p>Use an external Web URL</p>
                            	<div class="upload_url_inp">
                                <?php echo $form->textField($userd,'image_url',array(
                                  'placeholder'=>'Image Url',
                                  'class'=>'inp-textarea')); ?>
                                <?php echo $form->error($userd,'image_url'); ?>
                                </div>
                                <div class="upload_url_button"> 
                                  <?php echo CHtml::submitButton('Submit',array('class'=>'upload_submit')); ?>
                                </div>

                            </div>
                          <?php $this->endWidget(); ?>

                            <div class="upload_or">
                            OR
                            
                            </div>
                            <div class="upload_url_container">
                            <p>Upload external</p>
                            	
                        
                                <?$this->widget('ext.EFineUploader.EFineUploader',
                                 array(
                                       'id'=>'FineUploader',
                                       'config'=>array(
                                                       'autoUpload'=>true,
                                                       'request'=>array(
                                                          'endpoint'=>$this->createUrl('image/upload'),// OR $this->createUrl('files/upload'),
                                                          'params'=>array('YII_CSRF_TOKEN'=>Yii::app()->request->csrfToken),
                                                                       ),
                                                       'retry'=>array('enableAuto'=>true,'preventRetryResponseProperty'=>true),
                                                       'chunking'=>array('enable'=>false,'partSize'=>100),//bytes
                                                       'callbacks'=>array(
                                                            'onComplete'=>"js:function(id, name, response){ 
                                                                     $('#target').attr('src',response.filename);
                                                                     $('#target').Jcrop(
                                                                          {
                                                                            onSelect:    showCoords,
                                                                            bgColor:     'black',
                                                                            bgOpacity:   .6,
                                                                            setSelect:   [ 80, 80, 300, 300 ],
                                                                            aspectRatio: 1
                                                                          }
                                                                        );
                                                                     $('#cropPopup').modal('show');

                                                             }",
                                                            'onError'=>"js:function(id, name, errorReason){ }",
                                                                         ),
                                                       'validation'=>array(
                                                                 'allowedExtensions'=>array('jpg','jpeg','png'),
                                                                 'sizeLimit'=>2 * 1024 * 1024,//maximum file size in bytes
                                                                 'minSizeLimit'=>4*1024,// minimum file size in bytes
                                                                          ),
                                                      )
                                      ));
                                 
                                ?>
                
                            
                            </div>
                        </div>
                    </div>
                        
                    	
                        
                <h1 class="dashboard_title1">General information</h1>
                 <div class="wd102">

                  <?php $form=$this->beginWidget('CActiveForm', array(
                    'id'=>'general-form',
                    'enableAjaxValidation'=>true,
                    'enableClientValidation'=>false,
                    'htmlOptions' => array("class"=>"bs-docs-example"),
                    'clientOptions'=>array(
                      'validateOnSubmit'=>true,
                      'validateOnChange'=>true,
                      'validateOnType'=>true,
                    ),
                  )); ?>
            			<fieldset>
              				
              					<div class="form-group2">
              						
                                  <label>First Name</label>
                                    <?php echo $form->textField($userd,'first_name',array(
                                      'placeholder'=>'First Name',
                                      'class'=>'inp-textarea')); ?>
                                    <?php echo $form->error($userd,'first_name'); ?>
             				    </div>
                                <div class="form-group2">
              						
                                   <label>Last Name</label>
                                    <?php echo $form->textField($userd,'last_name',array(
                                      'placeholder'=>'Last Name',
                                      'class'=>'inp-textarea')); ?>
                                    <?php echo $form->error($userd,'last_name'); ?>
             				    </div>
                                <div class="form-group2">
              						
                                   <label>Location</label>
                                    <?php echo $form->textField($userd,'location',array(
                                      'placeholder'=>'Location',
                                      'id'=>'UserDetail_location',
                                      'class'=>'inp-textarea')); ?>
                                    <?php echo $form->error($userd,'location'); ?> 
             				    </div>
                                <div class="form-group2">
              						  <div class="dashboard_extensionmn">
                                  <label>Extension</label>
               
                                    <?php echo $form->textField($userd,'country_code',array( 
                                      'placeholder'=>'Extension',
                                      'class'=>'inp-textarea')); ?>
                                    <?php echo $form->error($userd,'country_code'); ?>  
                              
                                    </div>
                                    <div class="dashboard_extension-r">
                                    <label>Mobile Number</label>
            				                <?php echo $form->textField($userd,'mobile_number',array(
                                      'placeholder'=>'Mobile Number',
                                      'class'=>'inp-textarea')); ?>
                                    <?php echo $form->error($userd,'mobile_number'); ?> 
                        </div></div>
                        <div class="form-group2">
              						<label>Gender</label>
                             <?php echo $form->dropDownList($userd,'gender', $this->gender, array('class'=>'styled selectComp')) ?>
                             <?php echo $form->error($userd,'gender'); ?>
             				    </div>
                                <div class="form-group2">
              						
                                   <label>Address</label>
                                  <?php echo $form->textField($userd,'address',array(
                                      'placeholder'=>'Address',
                                      'class'=>'inp-textarea')); ?>
                                    <?php echo $form->error($userd,'address'); ?> 

                     				    </div>
                                <div class="form-group2">
                          
                                   <label>Zipcode</label>
                                  <?php echo $form->textField($userd,'zipcode',array(
                                      'placeholder'=>'Zip Code',
                                      'class'=>'inp-textarea')); ?>
                                    <?php echo $form->error($userd,'zipcode'); ?> 
                               </div>
                                <div class="form-group2">
              						
                                   <label>Best time to call</label>
                                   <?php echo $form->textField($userd,'time_call',array(
                                      'placeholder'=>'Best Time to Call',
                                      'class'=>'inp-textarea')); ?>
                                    <?php echo $form->error($userd,'time_call'); ?> 
             				    </div>
                                
                                
                                
                                 
                                
                                
        					
                                
              <div class=" fltlft"><?php echo CHtml::submitButton('CANCEL',array('class'=>'btn btn-inverse')); ?></div>
              <div class="fr"><?php echo CHtml::submitButton('UPDATE PROFILE',array('class'=>'btn signupbtn')); ?></div>
            </fieldset>
          <?php $this->endWidget(); ?>

        </div>
      </div>
     </div>
    </div>
    </div>
        
      </div>

      <div id="push"></div>
    </div>

    <div id="footer">
      <div class="container">
        <div class="ft-left">
        <a href="#">Media</a> 
        <span>|</span>
        <a href="#">Affiliates & Partnerships</a>
         <span>|</span>
         <a href="#">Hiring</a> 
         <span>|</span>
         <a href="#">Get in Touch</a>
       </div>
      	<div class="news">
        <p>Sign Up Newsletter</p>
        <input type="text" class="newsltr" id="exampleInputEmail" placeholder="Enter email">
        <button type="button" class="btn subscribe " >SUBSCRIBE</button>
        </div>
        <div class="ft-right">
        <a href="#"><img  alt="facebook" src="<?php echo Yii::app()->request->baseUrl; ?>/images/facebook.png"></a>&nbsp;&nbsp; 
        <a href="#"><img  alt="twitter" src="<?php echo Yii::app()->request->baseUrl; ?>/images/twitter.png"></a>&nbsp;&nbsp;
        <a href="#"><img alt="you-tube" src="<?php echo Yii::app()->request->baseUrl; ?>/images/tube.png"></a> &nbsp; 
        <a href="#"><img alt="google+" src="<?php echo Yii::app()->request->baseUrl; ?>/images/google+.png"></a></div>
      </div>
    </div>
    <!-- JavaScript plugins (requires jQuery) -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/select/select2.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/scripts/bootstrap.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/scripts/jquery.autosize.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/scripts/jquery.navgoco.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/scripts/jquery.raty.js"></script>

    <!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>-->
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?libraries=places&sensor=true"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/scripts/jquery.Jcrop.min.js"></script>

<script>
  function initialize() {

  var input = document.getElementById('LocationCompete');
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

<script>
var cropCoord = {};

function showCoords(c)
{
    cropCoord = c;
};


$(document).ready(function() {
  
    <?php if(isset($errorhead)) { ?>
         
         var mphead = "<?php echo $errorhead; ?>";
         var mpdescription = "<?php echo $errordesc; ?>";
         $('#mphead').text(mphead); $('#mpdescription').text(mpdescription);
         $('#messagePopup').modal('show');

    <?php } ?>

    $(".selectComp").select2();

    $(document).on('click','#croppicture', function(e){
         
         e.preventDefault();
         
         $.ajax({
           type: "POST",
           url: "<?php echo Yii::app()->createUrl('image/crop'); ?>",
           data: { coordinates: cropCoord },
         })
        .done(function(response) {
             $('#cropPopup').modal('hide');
             $('#savedpicture').attr('src',response);
         });

    });



    $('ul.nav li.dropdown').hover(function() {
      $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn();
    }, function() {
      $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut();
    });

});





</script>
<!-- And the JavaScript -->

  </body>
</html>
...