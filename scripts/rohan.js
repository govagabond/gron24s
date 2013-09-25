$(document).ready(function() {
  
$(document).on('click','.facebookButton',function() {

   var x = screen.width/2 - 600/2;
   var y = screen.height/2 - 250/2;
   window.open('/site/loginfacebook?provider=facebook','Connecting to Facebook....','width=600,height=250,left='+x+',top='+y);
});

//adjusting login popup


// $(document).on('click','#logIn',function(e) {

//     e.preventDefault();
//     var a = $('#logIn').position().top+2;
//     var b = $('#logIn').position().left+2;

//     $('#logInPopup').css({'position':'absolute','top':a,'left':b});
//     $('#logInPopup').modal('toggle');
// })


// $('.signupbtn').click(function(e) {
 
//   if($('#LocationCompete').val()=='')
//   { 
//     $('#UserDetail_location_em_').text('Location cannot be empty').show();
//     if(!$('#UserDetail_location_em_').hasClass('error')) {
//     $('#UserDetail_location_em_').parent().addClass('error'); }
//     e.preventDefault();
//   }
//   else
//   {
//     $('#UserDetail_location_em_').text('').hide();
//     $('#UserDetail_location_em_').parent().removeClass('error');
//   }

// });

  
//checkbox stuff
$(document).on('change','input#answer1',function() {
   if(this.checked==true) { 
        $('#searchc1').show();
        $('#searchc2').hide();
        $('input#answer2').attr('checked',false);
    }
});

$(document).on('change','input#answer2',function() {
   if(this.checked==true) { 
        $('fieldset#searchc2').show();
        $('fieldset#searchc1').hide();
        $('input#answer1').attr('checked',false);
    }
});

$('#forgotButton').click(function() {
    $('#logInPopup').modal('hide');
    $('#forgotPopup').modal('show');

});


$('#searchc1').show();
$('#searchc2').hide();

$('#dpYears').datepicker();

$('#logInPopup').hover(function() { 
   $('#logInPopup').modal('show');
   //$('.modal-backdrop').hide();
});
$('#logInPopup').mouseleave(function() { 
   $('#logInPopup').modal('hide');
   //$('.modal-backdrop').hide();
});



});