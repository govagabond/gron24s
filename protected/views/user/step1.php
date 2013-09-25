<!DOCTYPE html>
<html>
<head>
    <title>goVagabond</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

     <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.css" rel="stylesheet" type="text/css">


</head>
  <body>
 
  

     <!-- header -->

    <?php $this->renderPartial('//variable/headerhome'); ?> 
   
  
  <!-- Banner -->
   
   		
   <div class="row backmn">
   		<div class="cont">
    	    
            
 

  <div class="tab-content">	
    <div class="tab-pane">
    	<a href="<?php echo Yii::app()->createUrl('/user/step1',array('i'=>'1')); ?>"><div class="travlr"><span><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/men-travler.png" width="71" height="56" alt="traveler"></span>Are you a traveller ?</div></a>
      <a href="<?php echo Yii::app()->createUrl('/user/step1',array('i'=>'2')); ?>"><div class="travlr"><span><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/guide.png" width="71" height="56" alt="traveler"></span><div class="travlr-cnt"><h1>Are you a local expert?</h1> <p>To fill in a application with your details which will be validated within the next 48 hours after which your account will activated and you will be informed accordingly.</p></div></div></a>
    </div>
  </div>
    
    </div>
   </div>
   
    <?php $this->renderPartial('//variable/footerhome'); ?> 
    <!-- JavaScript plugins (requires jQuery) -->
   
   <script src="<?php echo Yii::app()->request->baseUrl; ?>/scripts/bootstrap.js"></script>

<!-- And the JavaScript -->

  </body>
</html>
