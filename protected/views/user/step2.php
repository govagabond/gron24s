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
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/tooltipster.css" rel="stylesheet" type="text/css">
    <style>
     .form-group3 {
      margin-bottom: 15px;
      float: left;
      width: 48%;
     }
     .form-group4 {
      margin-bottom: 15px;
      margin-left: 9px;
      float: left;
      width: 48%;
     }

     div.errorMessage {
     margin-left: 5px !important;
     color: green !important;
     text-align: right;
     font-size: 11px;
     }
    </style>
</head>
  <body>
  
  
  
   <div id="wrap">

      <!-- Fixed navbar -->
      <?php $this->renderPartial('//variable/headerhome'); ?> 

    
      <!-- Begin page content -->
      <div class="container">
        
        <div class="row backmn">
      <div class="cont">
        <div class="tab-content"> 
          <div class="tab-pane">
            <?php $form=$this->beginWidget('CActiveForm', array(
              'id'=>'step2-form',
              'enableAjaxValidation'=>true,
              'enableClientValidation'=>true,
              'htmlOptions' => array("class"=>"bs-docs-example"),
              'clientOptions'=>array(
                'validateOnSubmit'=>true,
              ),
            )); ?>
                  <fieldset>
                      <legend>Local Expert Application Form</legend>
                        <div class="form-group2">
                          <label>Brief introduction about yourself</label>
                          <?php echo $form->textArea($guide,'brief_profile',array(
                          'placeholder'=>'Brief Introduction',
                          'class'=>'inp-textarea tooltip',
                          'title'=>'Help us to know you better - write a brief introduction of yourself, your passions and tell your guests what\'s unique about you.')); ?>
                          <?php echo $form->error($guide,'brief_profile'); ?>
                        </div>
                                
                                
                        <div class="form-group2">
                          <label>Languages Spoken</label>
                          <?php echo $form->dropDownList($guide,'languages', $languages, array('class'=>'styled selectComp','multiple'=>true)) ?>
                          <?php echo $form->error($guide,'languages'); ?>
                        </div>

                        <div class="form-group2">
                        <label>Description of any one travel experience you wish to list on the website</label>
                         <?php echo $form->textArea($guide,'expertise',array(
                          'placeholder'=>'Travel Experience',
                          'class'=>'inp-textarea tooltip',
                          'title'=>'Your experience can be a Tour or an Activity - as long as you feel that there is an inherent interest that can be generated for travelers. Tell us more about what you want to do and what your guests will experience.')); ?>
                          <?php echo $form->error($guide,'expertise'); ?>
                        </div>
                                
                        <div class="form-group3">
                          <label>First Reference Name</label>
                          <?php echo $form->textField($guide,'reference_1_name',array(
                            'placeholder'=>'First Reference Name',
                            'class'=>'inp-textarea',
                            'title'=>'')); ?>
                          <?php echo $form->error($guide,'reference_1_name'); ?>
                        </div>

                        <div class="form-group4">
                          <label>First Reference Email</label>
                          <?php echo $form->textField($guide,'reference_1_email',array(
                            'placeholder'=>'First Reference Email',
                            'class'=>'inp-textarea',
                            'title'=>'')); ?>
                          <?php echo $form->error($guide,'reference_1_email'); ?>
                        </div>
                                
                        <div class="form-group3">
                          <label>Second Reference Name</label>
                          <?php echo $form->textField($guide,'reference_2_name',array(
                            'placeholder'=>'Second Reference Name',
                            'class'=>'inp-textarea',
                            'title'=>'')); ?>
                          <?php echo $form->error($guide,'reference_2_name'); ?>
                        </div>

                        <div class="form-group4">
                          <label>Second Reference Email</label>
                          <?php echo $form->textField($guide,'reference_2_email',array(
                            'placeholder'=>'Second Reference Email',
                            'class'=>'inp-textarea',
                            'title'=>'')); ?>
                          <?php echo $form->error($guide,'reference_2_email'); ?>
                        </div>
                  
                        

              <div class="fr"><?php echo CHtml::submitButton('SUBMIT',array('class'=>'btn signupbtn')); ?></div>

            </fieldset>
          <?php $this->endWidget(); ?>
        </div>
      </div>
    
    </div>
   </div>
        
      </div>

      <div id="push"></div>
    </div>
  
 
  <!-- Banner -->
   
      
   
   
   <?php $this->renderPartial('//variable/footerhome'); ?> 

    <!-- JavaScript plugins (requires jQuery) -->
   <script src="<?php echo Yii::app()->request->baseUrl; ?>/select/select2.js"></script>
   <script src="<?php echo Yii::app()->request->baseUrl; ?>/scripts/bootstrap.js"></script>
   <script src="<?php echo Yii::app()->request->baseUrl; ?>/scripts/jquery.autosize.js"></script>
   <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/scripts/jquery.tooltipster.min.js"></script>



    <script>
      $(function(){

        $(".selectComp").select2();
        $('.inp-textarea').autosize();
        $('.animated').autosize({append: "\n"});

        $('.tooltip').tooltipster();

      });
      
        
    </script>

  </body>
</html>
