<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Form';
$this->breadcrumbs=array(
    'Form',
);
?>
<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/modal.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery.Jcrop.css" type="text/css" />


 <div id="cropPopup" class="modal fade">
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Modal header</h3>
  </div>
 <div class="modal-body">
    <img src="" id="target"/>
 </div>
 </div>


<h1>Login</h1>

<p>Please fill out the following form with your login credentials:</p>

<div class="form">

    <?$this->widget('ext.EFineUploader.EFineUploader',
     array(
           'id'=>'FineUploader',
           'config'=>array(
                           'autoUpload'=>true,
                           'request'=>array(
                              'endpoint'=>'/site/upload',// OR $this->createUrl('files/upload'),
                              'params'=>array('YII_CSRF_TOKEN'=>Yii::app()->request->csrfToken),
                                           ),
                           'retry'=>array('enableAuto'=>true,'preventRetryResponseProperty'=>true),
                           'chunking'=>array('enable'=>false,'partSize'=>100),//bytes
                           'callbacks'=>array(
                                'onComplete'=>"js:function(id, name, response){ 
                                         $('#cropPopup').modal('show');
                                         $('#target').attr('src',response.filename);
                                         $('#target').Jcrop(
                                              {
                                                onSelect:    showCoords,
                                                bgColor:     'black',
                                                bgOpacity:   .4,
                                                setSelect:   [ 100, 100, 50, 50 ],
                                                aspectRatio: 1
                                              }
                                            );

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

</div><!-- form -->

<script src="<?php echo Yii::app()->request->baseUrl; ?>/scripts/jquery.Jcrop.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/scripts/bootstrap.js"></script>
<script language="Javascript">

  function showCoords(c)
  {
      // variables can be accessed here as
      // c.x, c.y, c.x2, c.y2, c.w, c.h
  };

</script>