<?php
/* @var $this UserController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
  'Local Expert Dash',
);

?>

<?php $this->widget('bootstrap.widgets.TbMenu', array(
    'type'=>'tabs', // '', 'tabs', 'pills' (or 'list')
    'stacked'=>false, // whether this is a stacked menu
    'items'=>array(
        array('label'=>'New Applications', 'url'=>Yii::app()->createUrl("admin/index")),
        array('label'=>'Approved', 'url'=>Yii::app()->createUrl("admin/approved"), 'active'=>true),
        array('label'=>'Waitlisted', 'url'=>Yii::app()->createUrl("admin/waitlisted")),
        array('label'=>'Rejected', 'url'=>Yii::app()->createUrl("admin/rejected")),
    ),
)); ?>



<?php $this->widget('zii.widgets.grid.CGridView', array(
  'id'=>'guide-grid',
  'dataProvider'=>$dataProvider,
  // 'itemView'=>'_view',
  // 'sortableAttributes'=>array(
  //     'rate' => 'Rating',
  //     'review_number' => 'Number of Reviews',
  //     'exp_created' => 'Date of Creation',
  // ),
  'columns'=>array(
    'user.id',
    'user.UserDetail.first_name',
    'user.UserDetail.last_name',
    'user.UserDetail.location',
    'user.created',
    // 'is_activated',
    // 'created',
    array(
      'class'=>'CButtonColumn',
      'template'=>'{view}',
      'viewButtonLabel' => 'View Details',
      'viewButtonImageUrl' => 'http://www.roxy.in/images/view-details_icon.png',
      'buttons' => array(
              'view' => array(
                  'url' => 'Yii::app()->createUrl("admin/guideDetails", array("id"=>$data->id))',       
              ),                        
      ),                    
    ),
  ),
)); ?>
