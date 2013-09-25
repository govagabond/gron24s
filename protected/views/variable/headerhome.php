    <!-- Fixed navbar -->
      <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
          <div class="container container-full-width">
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><img width="179" height="39" alt="logo" src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.gif"></a>
            <div class="nav-collapse collapse">
              <ul class="nav">
                <li class="active"><a href="#">Find an Experience</a></li>
                <li class="sep"></li>
                <li><a href="#about">Find a Local Expert </a></li>
                <li class="sep"></li>
                <li><a href="#contact">About Govagabond</a></li>
                <li class="sep"></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Terms & Policies <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms and Conditions</a></li>
                    <li><a href="#">Cancellation</a></li>
                   <li><a href="#">FAQs</a></li>
                  </ul>
                </li>
                
              </ul>
            </div><!--/.nav-collapse -->
            <div class="fltrt"> 
          <ul>
           <li class="llogin"><a data-toggle="modal" href="#signUpPopup">Sign Up</a></li> 
           <li class="tlogin"><a id="logIn" data-backdrop="false" data-toggle="modal" href="#logInPopup">Login</a></li>
         </ul>
         </div>
          </div>
        </div>
      </div>