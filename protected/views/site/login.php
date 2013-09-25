<!DOCTYPE html>
<html>
<head>
    <title>goVagabond</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/modal.css" rel="stylesheet" type="text/css">


     <style>

       div.errorMessage {
       margin-left: 5px !important;
       color: green !important;
       text-align: right;
       font-size: 11px;
       }
       
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
      #wrap1 {
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

      #wrap1 > .container {
        padding-top: 70px;
      }
      .container .credit {
        margin: 20px 0 0px 0;
      }
.radio, .checkbox{ padding-left:0;}
.prettycheckbox a, .prettyradio a{ margin-top:0;}
      code {
        font-size: 80%;
      }
     </style>



</head>
 
  <body >


    <div id="wrap1">

      <!-- Fixed navbar -->
      <?php $this->renderPartial('//variable/headerhome'); ?> 
	  
      <!-- Begin page content -->
    
      <div class="container">
        
        <div class="tab-content" id="login">	
    			<div class="tab-pane">
    				<?php $form=$this->beginWidget('CActiveForm', array(
    				 'id'=>'login-form',
    				 'htmlOptions' => array("class"=>"bs-docs-example"),
    				 'enableAjaxValidation'=>true,
    				 'enableClientValidation'=>false,
    				 'clientOptions'=>array(
    				   'validateOnSubmit'=>true,
    				 ),
    				)); ?>
            			<fieldset>
              				<legend>Please enter your username and password</legend>
              					<!--<div class="alert alert-block alert-error fade in">
            
            <h4 class="alert-heading">Incorrect Email/Password Combination</h4>
            <p>Please enter the username and password to login</p>
            <p>
              <a href="#" class="btn btn-danger">Take this action</a> 
            </p>
          </div>-->
                                 <div class="form-group2">
              						<label>Username</label>
                                    <?php echo $form->textField($loginform,'username',array(
                                      'placeholder'=>'Username',
                                      'class'=>'inp-textarea')); ?>
                                    <?php echo $form->error($loginform,'username'); ?>
             				    </div>
                                
                                <div class="form-group2">
                                <label>Password</label>
              						<?php echo $form->passwordField($loginform,'password',array(
              						  'placeholder'=>'Password',
              						  'class'=>'inp-textarea')); ?>
              						<?php echo $form->error($loginform,'password'); ?>
             				    </div>
            <div class="form-group">
              <div class="col-lg-offset-2 col-lg-10">
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="LoginForm[rememberMe]" class="checkbox_banr"> Remember me
                  </label>
                </div>
              </div>
            </div>
                                
             <div class="fltlft"><a href="#">Forgot Password</a></div> 
             <div class="fr">
                 <?php echo CHtml::submitButton('LOGIN',array('class'=>'btn loginbtn')); ?>
             </div>
              
            </fieldset>
          <?php $this->endWidget(); ?>

          </div>
	      </div>
       
      </div>

      <div id="push"></div>
    </div>

    <?php $this->renderPartial('//variable/footerhome'); ?> 

    <!-- JavaScript plugins (requires jQuery) -->
    
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/scripts/bootstrap.js"></script>

  </body>
</html>
