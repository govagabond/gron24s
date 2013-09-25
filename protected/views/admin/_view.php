<?php
/* @var $this UserController */
/* @var $data User */
?>

<div class="view">

	<b>Guide ID :</b>
	<?php echo CHtml::link(CHtml::encode($data->user->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b>Guide's Name:</b>
	<?php echo CHtml::encode($data->user->UserDetail->first_name); ?> <?php echo CHtml::encode($data->user->UserDetail->last_name); ?>
	<br />

	<b>Brief Profile:</b>
	<?php echo CHtml::encode($data->brief_profile); ?>
	<br/>

	<b>Languages:</b>
	<?php  
	?>
	<br />




</div>