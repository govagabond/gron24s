<!DOCTYPE html>
<html>
<head>
    <title>goVagabond</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

     <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.css" rel="stylesheet" type="text/css">

<style>
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

     <?php $this->renderPartial('//variable/headerhome'); ?> 
    
      <!-- Begin page content -->
      <div class="container">
        
        <div class="row backmn">
      <div class="cont">
        <div class="tab-content"> 
          <div class="tab-pane">
            <?php $form=$this->beginWidget('CActiveForm', array(
              'id'=>'facebook-form',
              'enableAjaxValidation'=>true,
              'enableClientValidation'=>true,
              'htmlOptions' => array("class"=>"bs-docs-example"),
              'clientOptions'=>array(
                'validateOnSubmit'=>true,
              ),
            )); ?>
                  <fieldset>
                      <legend style="color:#133783;">Confirm the information extracted from your facebook account to complete your registration.</legend>
                      
                        <div class="form-group2">
                          <label>Location</label>
                          <?php echo $form->textField($userd,'location',array(
                          'placeholder'=>'Location',
                          'id'=>'UserDetail_location',
                          'class'=>'inp-textarea')); ?>
                        <?php echo $form->error($userd,'location'); ?>
                        </div>
                                
                        <div class="form-group2">
                          <label>Country Extension</label>
                          <?php echo $form->textField($userd,'country_code',array(
                            'placeholder'=>'Extension',
                            'class'=>'inp-textarea')); ?>
                          <?php echo $form->error($userd,'country_code'); ?>
                        </div>
                  
                        <div class="form-group2">
                        <label>Mobile Number</label>
                        <?php echo $form->textField($userd,'mobile_number',array(
                          'placeholder'=>'Mobile Number',
                          'class'=>'inp-textarea',
                          )); ?>
                        <?php echo $form->error($userd,'mobile_number'); ?>  
                        </div>
              <div class="fr">
                <?php echo CHtml::submitButton('COMPLETE SIGN-UP',array('class'=>'btn fbsignupbtn')); ?> 
              </div> 
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
<script src="<?php echo Yii::app()->request->baseUrl; ?>/scripts/bootstrap.js"></script>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?libraries=places&sensor=true"></script>
<script>
  function initialize() {

  var input = document.getElementById('UserDetail_location');
  var options = {
    types: ['(cities)'],
    //componentRestrictions: {country: 'fr'}
  };

  autocomplete = new google.maps.places.Autocomplete(input, options);

  }
  google.maps.event.addDomListener(window, 'load', initialize);
</script>

</body>
</html>
