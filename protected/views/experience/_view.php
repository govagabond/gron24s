
<?php
/* @var $this UserController */
/* @var $data User */
?>
      
    <?php $pageSize = $widget->dataProvider->getPagination()->pageSize; ?>
    
    <?php if($index == 0) echo '<div class="lt-row">'; ?>

      <div class="lst-wrp-ex mar-rght2-ex">
        <a href="#"><h1><?php echo CHtml::encode($data->display_title); ?>, <?php echo CHtml::encode($data->loc); ?></h1></a>
      <div class="ltmn">
           <div class="tile-hour"><?php echo CHtml::encode($data->duration); ?> <?php if($data->duration==1) { echo 'Hour'; } else { echo 'Hours'; } ?></div><div class="tile-usd"><div class="prcmn"><span class="fnt14"><?php echo Yii::app()->session['currency_symbol']; ?> <?php echo CHtml::encode(ceil($data->personPrices->per_person*Yii::app()->session['currency_rate'])); ?></span><span class="fnt11">(1 person)</span></div><span class="info">?</span></div>
            
        </div>

        
        
    <div class="wd10ctr"><h3 class="shiftbold"><p><img src="images/star.png" width="90" height="16" alt="star-rating"></p>
    <span><?php echo CHtml::encode($data->review_number); ?> <?php if($data->review_number==1) { echo 'review'; } else { echo 'reviews'; } ?></span>
    </h3><a href="#"><img width="221" height="155" src="images/experiences/65384_294470103987312_29889210_n.jpg" class="img-brdr"></a> </div>
    <div class="wd10ctr">
      <div class="lst-row-ex-pc-left"> <a href="#"><img src="images/rohan.jpg" width="43" height="43" alt="rohan"></a>
          
         </div><div class="lst-row-ex-pc-right">
            <h4><?php echo CHtml::encode($data->user->UserDetail->first_name); ?></h4>
            <p>Languages <span class="flag flag-gb"></span> <span class="flag flag-in"></span><span class="flag flag-fr"></span><span class="flag flag-es"></span><span class="flag flag-de"></span></p>
            </div>
    
    </div>
    <div style="top:103px;" class="cardhover">
      <h3 class="shiftbold1"><p><span id="<?php echo CHtml::encode($data->rate); ?>" class="fixedrating"/>(<?php echo CHtml::encode($data->rating_number); ?>)</p>
    <span>10 review</span>
    </h3>
    <div class="floatLeft">
      <ul>
          <li class="border-right">
              <a href="#"><span class="tile-wishlist">Wishlist</span></a>
            </li>
            <li class="border-right">
              <a href="#"><span class="tile-fb-share">Fshare</span></a>
            </li>
            <li>
              <a href="#"><span class="tile-tweet">Tweet</span></a>
            </li>
        </ul>
    </div>
    <div class="floatLeft">
      <a href="#" class="booknowbtn">Book Now</a>
        <a href="#" class="explorebtn">Explore Now</a>
    </div>
    </div>
    </div>

    <?php if($index != 0 && $index != $pageSize && ($index + 1) % 3 == 0)
      echo '</div><div class="lt-row">'; ?>
    
    <?php if(($index + 1) == $pageSize ) echo '</div>'; ?>