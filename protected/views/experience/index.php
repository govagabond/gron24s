<!DOCTYPE html>
<html>
<head>
    <title>goVagabond</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="css/prettyCheckable.css" rel="stylesheet" media="screen">
    <style>
     .select2-search {
     display: inline block !important;
     }

     .ex_filters .categoryFilter { margin-right:3px !important; }
     .ex_filters span.flag { margin-right:4px !important; }

     div.loading {
         /*background-color:#000;*/
         background-image: url('<?php echo Yii::app()->request->baseUrl; ?>/images/ajax-loader.gif');
         background-position:  center center;
         background-repeat: no-repeat;
         opacity: 0.5;
     }
     div.loading * {
         opacity: .8;
     }
    </style>

    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/popup.css" rel="stylesheet" media="screen">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/select/select2.css" rel="stylesheet" type="text/css">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/modal.css" rel="stylesheet" type="text/css">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery.navgoco.css" rel="stylesheet" type="text/css">
</head>
  <body>
  
  
  <!-- header -->
  <?php $this->renderPartial('//variable/headerhome'); ?> 
  
 
  <!-- Banner -->
   
      
   <div class="row backmn pad-top">
      <div class="container clearfix">
        <div class="page-title">10 Destination found in "india" </div>
            <div id="search_experiance" class="search-gry box-padding">
              <div class="clearfix">
               <?php echo CHtml::beginForm(CHtml::normalizeUrl(array('experience/ajaxindex')), 'get', array('id'=>'location-form')); ?>

                <div class="srchwrapper mar-rght1">
                 <?php echo CHtml::textField('locationlist', (isset($_GET['locationlist'])) ? $_GET['locationlist'] : '', array('id'=>'LocationCompete','class'=>'categoryFilter searchTxt-ex','placeholder'=>'Experience Type'));
                      echo CHtml::submitButton('Search', array('id'=>'locationsubmit','class'=>'searchSubmit-ex')); ?>
                 </div>
              <?php  echo CHtml::endForm(); 

              Yii::app()->clientScript->registerScript('search',
                  "var ajaxUpdateTimeout;
                  var ajaxRequest;
                  $('input#LocationCompete').keyup(function(){
                      ajaxRequest = $('.categoryFilter').serialize();
                      clearTimeout(ajaxUpdateTimeout);
                      ajaxUpdateTimeout = setTimeout(function () {
                          $.fn.yiiListView.update(
                              'ajaxListView',
                              {data: ajaxRequest}
                          )
                      },
                      300);
                      $.each($('.fixedrating'),function() {
                      $(this).raty({
                              readOnly  : true,
                              score   : $(this).attr('id')
                            });
                      });
                  });
                  $('#location-form').submit(function(e){
                      e.preventDefault();
                      ajaxRequest = $('.categoryFilter').serialize();
                      $.fn.yiiListView.update(
                          'ajaxListView',
                          {data: ajaxRequest}
                      );
                      $.each($('.fixedrating'),function() {
                      $(this).raty({
                              readOnly  : true,
                              score   : $(this).attr('id')
                            });
                      });
                  });


              "
              );

              ?>


            <div class="srchwrapper">
                <?php echo CHtml::dropdownList('categorylist', (isset($_GET['categorylist'])) ? $_GET['categorylist'] : '',$categories,array('class'=>'categoryFilter','id'=>'catSearch','multiple'=>true,'placeholder'=>'Experience Categories'));  ?>
   
             </div>
              
           </div>
            </div>
            <div class="col-5" >
         
              <div class="box-border ex_filters">
              <h4 class="panel-light">
  Destination
    <i class="icon icon-caret-down position-right"></i>
  </h4>
  
  <div class="price-filter-cont">
    
   
<ul id="demo2" class="nav">
    
   <?php foreach($loclist as $key=>$value) { ?> 
    <li>
      <a href="#"><? echo $value['country_name']; ?></a>
        <ul>
          <?php foreach ($value->city as $key => $val) { ?>
            <li><a href="#" class="categoryFilter"><? echo $val['name']; ?></a></li>
          <?php } ?>
        </ul>
    </li>
    <?php } ?>

</ul>


     </div>
   <h4 class="panel-light">
    Duration
    <i class="icon icon-caret-down position-right"></i>
  </h4>
  <div class="price-filter-cont">

  <?php echo CHtml::checkBoxList('durationlist',(isset($_GET['durationlist'])) ? $_GET['durationlist'] : '',$duration,
     array('template'=>'{beginLabel}{input}{labelTitle}{endLabel}',
           'separator'=>"\n",
           'class'=>'categoryFilter',
           'container'=>''
       )
   ); 

   ?>
  </div>
  
  <h4 class="panel-light">
   Languages
    <i class="icon icon-caret-down position-right"></i>
  </h4>
  <div class="price-filter-cont">

<?php echo CHtml::checkBoxList('languagelist',(isset($_GET['languagelist'])) ? $_GET['languagelist'] : '',$lang,
   array('template'=>'{beginLabel}{input}{labelTitle}{endLabel}',
         'separator'=>"\n",
         'class'=>'categoryFilter',
         'container'=>''
     )
 ); 

 ?>
  </div>
  <h4 class="panel-light">
   Rating
    <i class="icon icon-caret-down position-right"></i>
    
  </h4>
  <div class="price-filter-cont" id="ratingFilter">

 <?php echo CHtml::checkBoxList('ratinglist',(isset($_GET['ratinglist'])) ? $_GET['ratinglist'] : '',$rating,
   array('template'=>'{beginLabel}{input}{labelTitle}{endLabel}',
         'separator'=>"\n",
         'class'=>'categoryFilter',
         'container'=>''
     )
 ); 

 ?>

  </div>
  <h4 class="panel-light">
  Services
    <i class="icon icon-caret-down position-right"></i>
  </h4>
  <div class="price-filter-cont">
    
  <?php echo CHtml::checkBoxList('servicelist',(isset($_GET['servicelist'])) ? $_GET['servicelist'] : '', array(1=>'&nbsp;Private Tour&nbsp;<span class="duration-filter-count filter-count-hidden" style="display: inline;">(1)</span>',2=>'&nbsp;Skip the line&nbsp;<span class="duration-filter-count filter-count-hidden" style="display: inline;">(1)</span>',3=>'&nbsp;Hotel Pickup&nbsp;<span class="duration-filter-count filter-count-hidden" style="display: inline;">(1)</span>'),
    array('template'=>'{beginLabel}{input}{labelTitle}{endLabel}',
          'separator'=>"\n",
          'class'=>'categoryFilter',
          'container'=>''
      )
  ); 

  ?>

  </div>
 
              </div>
            
            </div>
            <div class="col-lg-9 experienceSection">

       <div class="fltlft sort-bar">
          <label class="mar-rght1">
          <input type="checkbox" name="" class="duration-filter" value="3" id="dur-lvl-3">
          Handicap friendly 

          </label>
          <label class="">
          <input type="checkbox" name="" class="duration-filter" value="3" id="dur-lvl-3">
          Kid friendly  

          </label>
                
       </div>
      
        <?php $this->widget('zii.widgets.CListView', array(
          'dataProvider'=>$dataProvider,
          'itemView'=>'_view',
          'sortableAttributes'=>array(
              'rate' => 'Rating',
              'review_number' => 'Number of Reviews',
              'exp_created' => 'Date of Creation',
          ),
          'id'=>'ajaxListView',
          'ajaxUrl'=> $this->createUrl('/experience/ajaxindex'),
          'ajaxUpdate' => 'ratingFilter',
          'loadingCssClass' =>'loading',
          'summaryText' => 'Displaying {start}-{end} of {count} Experiences',
          'pagerCssClass' =>'pagination pagination-right',
          'pager' => array(
              'header'=>'',
              'cssFile'=>false,
              'maxButtonCount'=>25,
              'selectedPageCssClass'=>'active',
              'hiddenPageCssClass'=>'disabled',
              'firstPageCssClass'=>'previous',
              'lastPageCssClass'=>'next',
              'firstPageLabel'=>'<<',
              'lastPageLabel'=>'>>',
              'prevPageLabel'=>'Previous',
              'nextPageLabel'=>'Next',
           ),
          // 'beforeAjaxUpdate' => 'function(){
          //       $(".experienceSection").addClass("loading");}',
          //      'afterAjaxUpdate' => 'function(){
          //       $(".experienceSection").removeClass("loading");}',
        )); 
        
        ?>

        <?php Yii::app()->clientScript->registerScript('checkboxfilter',"$('.categoryFilter').change(function(){
          category = $('.categoryFilter').serialize();
          $.fn.yiiListView.update(
              'ajaxListView',
              {data: category}
          );
          });");   ?>

   </div>
            
    
    </div>
   </div>
   </div>
 
 <!-- footer -->
 <?php $this->renderPartial('//variable/footerhome'); ?> 
    
    <!-- JavaScript plugins (requires jQuery) -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/select/select2.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/scripts/bootstrap.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/scripts/jquery.autosize.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/scripts/jquery.navgoco.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/scripts/jquery.raty.js"></script>

    <!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>-->
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?libraries=places&sensor=true"></script>

    <script>
      var input = document.getElementById('LocationCompete');
      var options = {
        types: ['(cities)'],
        //componentRestrictions: {country: 'fr'}
      };

      autocomplete = new google.maps.places.Autocomplete(input, options);
    </script>

       <script type="text/javascript">
    jQuery(function(){

    $("#catSearch").select2();

    jQuery('.fadein img:gt(0)').hide();
    setInterval(function(){jQuery('.fadein :first-child').fadeOut().next('img').fadeIn().end().appendTo('.fadein');}, 5000);
    }); 
    </script>


      <script type="text/javascript" id="demo1-javascript">
    $(document).ready(function() {
      // Initialize navgoco with default options
      $("#demo1").navgoco({
        caret: '<span class="caret"></span>',
        accordion: false,
        openClass: 'open',
        save: true,
        cookie: {
          name: 'navgoco',
          expires: false,
          path: '/'
        },
        slide: {
          duration: 400,
          easing: 'swing'
        }
      });

      $("#collapseAll").click(function(e) {
        e.preventDefault();
        $("#demo1").navgoco('toggle', false);
      });

      $("#expandAll").click(function(e) {
        e.preventDefault();
        $("#demo1").navgoco('toggle', true);
      });
    });
    </script>
    <script type="text/javascript" id="demo2-javascript">
    $(document).ready(function() {
      $("#demo2").navgoco({accordion: true});
      
      $(document).on('mouseenter','.lt-row',function() {  
         $(this).children('.cardhover').slideDown('fast');
      });
      $(document).on('mouseleave','.lt-row',function() { 
         $(this).children('.cardhover').slideUp('fast');
      });


      $.each($('.fixedrating'),function() {
      $(this).raty({
              readOnly  : true,
              score   : $(this).attr('id')
            });
      });

      // $('#Checker').hover(
      //  function() { $(this).stop(true).animate({  height: '+=20' });}, 
      //  function() {  $(this).stop(true).animate({  height: '-=20'  });}
      // );

      

    });
    </script>


      <script src="scripts/prettyCheckable.js"></script>
  </body>
</html>
