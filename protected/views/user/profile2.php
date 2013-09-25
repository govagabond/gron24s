<!DOCTYPE html>
<html>
<head>
    <title>goVagabond</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/modal.css" rel="stylesheet" type="text/css">


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
                 <h1 class="dashboard_title">Change Your Password</h1>

                    <div class="dashboard_middle">
                 
                    
                        
                      
                        
                       <!-- Changed info form -->
                  <div class="wd102">
                  <?php $form=$this->beginWidget('CActiveForm', array(
                    'id'=>'password-form',
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
                          
                                   <label>Enter your new password</label>
                                   <?php echo $form->passwordField($user,'password',array(
                                     'placeholder'=>'New Password',
                                     'class'=>'inp-textarea')); ?>
                                   <?php echo $form->error($user,'password'); ?> 
                        </div>
                                <div class="form-group2">
                          
                                   <label>Confirm your new password</label>
                                   <?php echo $form->passwordField($user,'password_repeat',array(
                                     'placeholder'=>'Confirm New Password',
                                     'class'=>'inp-textarea')); ?>
                                   <?php echo $form->error($user,'password_repeat'); ?>  
                                   
                        </div>
                                
                  
             <div class=" fltlft"><?php echo CHtml::submitButton('CANCEL',array('class'=>'btn btn-inverse')); ?></div>
             <div class="fr"><?php echo CHtml::submitButton('CHANGE PASSWORD',array('class'=>'btn signupbtn')); ?></div>

            </fieldset>
          <?php $this->endWidget(); ?>
        </div>
            <!-- Changed info form -->
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

    <script src="<?php echo Yii::app()->request->baseUrl; ?>/scripts/bootstrap.js"></script>
    <script>
     $(document).ready(function() {
       
         <?php if(isset($errorhead)) { ?>
              
              var mphead = "<?php echo $errorhead; ?>";
              var mpdescription = "<?php echo $errordesc; ?>";
              $('#mphead').text(mphead); $('#mpdescription').text(mpdescription);
              $('#messagePopup').modal('show');

         <?php } ?>

     });
    </script>



  </body>
</html>
...