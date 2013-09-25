<?php
/* @var $this UserController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
  'Local Expert Details',
);

?>

<div class="btn-toolbar">
    <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type'=>'info', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons'=>array(
            array('label'=>'Decision', 'url'=>'#'),
            array('items'=>array(
                array('label'=>'Approve Guide', 'url'=>array('admin/approve',array('id'=>$guide->id))),
                array('label'=>'Waitlist Guide', 'url'=>array('admin/waitlist',array('id'=>$guide->id))),
                array('label'=>'Reject Guide', 'url'=>array('admin/reject',array('id'=>$guide->id))),
            )),
        ),
    )); ?>
</div>

<?php 

  $this->widget('zii.widgets.CDetailView', array(
    'data'=>$guide,
    'attributes'=>array(
        'id',             
        'user.UserDetail.first_name',
        'user.UserDetail.last_name',
        array(               
            'label'=>'Gender',
            'type'=>'text',
            'value'=> $this->gender[$guide->user->UserDetail->gender],
         ), 
        array(               
            'label'=>'Languages',
            'type'=>'text',
            'value'=> $str,
         ),
        'user.UserDetail.location',  
        'brief_profile',       
        //'description:html',  
        array(               
            'label'=>'Mobile number',
            'value'=> $guide->user->UserDetail->country_code.'-'.$guide->user->UserDetail->mobile_number,
         ),
        array(               
            'label'=>'Areas of Expertise',
            'value'=> $guide->expertise,
         ),
        array(               
            'label'=>'Reference 1',
            'value'=> $guide->reference_1_name.', '.$guide->reference_1_email,
         ),
        array(               
            'label'=>'Reference 2',
            'value'=> $guide->reference_2_name.', '.$guide->reference_2_email,
         ),
    
     ),
));
 ?>

