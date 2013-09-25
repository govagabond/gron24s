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

</head>
  <body>
  
  <!-- header -->

    <?php $this->renderPartial('//variable/headerhome'); ?> 
  
 
  <!-- Banner -->
   
   		
   <div class="row backmn">
   		<div class="cont">
    		<div class="tab-content">	
    			<div class="tab-pane">
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
              				<legend>Change Your Password</legend>
              				
                        <div class="form-group2">
              						<?php echo $form->passwordField($user,'password',array(
                            'placeholder'=>'Enter your new password',
                            'class'=>'inp-textarea')); ?>
                          <?php echo $form->error($user,'password'); ?>  
             				    </div>
                                
                        <div class="form-group2">
             				      <?php echo $form->passwordField($user,'password_repeat',array(
                            'placeholder'=>'Re-enter your new password',
                            'class'=>'inp-textarea')); ?>
                          <?php echo $form->error($user,'password_repeat'); ?>
                        </div>
        					
                               
              <div class="fr">
                <?php echo CHtml::submitButton('SUBMIT',array('class'=>'btn signupbtn')); ?>
              </div> 
            </fieldset>
          <?php $this->endWidget(); ?>	
        </div>
			</div>
    
    </div>
   </div>
   
   <?php $this->renderPartial('//variable/footerhome'); ?> 
    <!-- JavaScript plugins (requires jQuery) -->
   
   <script src="<?php echo Yii::app()->request->baseUrl; ?>/select/select2.js"></script>
   <script src="<?php echo Yii::app()->request->baseUrl; ?>/scripts/bootstrap.js"></script>
   <script src="<?php echo Yii::app()->request->baseUrl; ?>/scripts/jquery-ui-1.9.2.custom.js"></script>
   <script src="<?php echo Yii::app()->request->baseUrl; ?>/scripts/bootstrap-popover.js"></script>
   <script src="<?php echo Yii::app()->request->baseUrl; ?>/scripts/jquery.autosize.js"></script>



<script>
			$(function(){
        
        $("[data-toggle=tooltip]").tooltip();
        $("[data-placement=right]").hover(function(){
          $('.tooltip').css('top',parseInt($('.tooltip').css('top')) + 8 + 'px')
        });

				$('.inp-textarea').autosize();
				$('.animated').autosize({append: "\n"});
			
      });
			
// 		$(function(){

// $('.popover').show();
// $('.popover').hide();

// 				});
		</script>

  </body>
</html>
