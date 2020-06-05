<?php require_once('initialize.php'); 
include('header.php');
  // echo ini_get('display_errors');
  // // It's set to dysplay the errors
  // if (!ini_get('display_errors'))
  // {
  //     ini_set('display_errors', '1');
  // }
?>

<?php $about= About::find_all();
$team = Team::find_all();
$media = Media::find_all();
?>



<body id="page-top" onload="generateCaptcha()">

  <!-- Canvas -->

  <script>
    
      var c = document.getElementById("myCanvas");
      var ctx = c.getContext("2d");
      ctx.font = "30px Arial";
      ctx.strokeText("Hello World",10,50);

  </script>

	 <!-- Load Facebook SDK for JavaScript -->
  <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>

<script>
   var captcha;
       
      function generateCaptcha() {
          var a = Math.floor((Math.random() * 10));
          var b = Math.floor((Math.random() * 10));
          var c = Math.floor((Math.random() * 10));
          var d = Math.floor((Math.random() * 10));
       
        captcha=a.toString()+b.toString()+c.toString()+d.toString();
        
          document.getElementById("captcha").value = captcha;
      }
       
      function check(){
        var input=document.getElementById("enter_captcha").value;
       
        if(input==captcha){
          document.getElementById("errors_captcha").innerHTML =""; 
          }
        else{
          document.getElementById("errors_captcha").innerHTML ="Please enter the valid CAPTCHA digits in the box provided";
                return false;
         }
      }
</script>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="index.php">Agency</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav text-uppercase ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#login">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#team">Team</a>
          </li>
           <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#media">Media</a>
          </li>
          <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#canvas">Canvas & SVG</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Header -->
  <header class="masthead">
    <div class="container">
      <div class="intro-text">
        <div class="intro-lead-in">Welcome To Our Studio!</div>
        <div class="intro-heading text-uppercase">It's Nice To Meet You</div>
        <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#about">Tell Me More</a>
      </div>
    </div>
  </header>

  <center>
	 <div id="fb-root"></div>
	 <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v7.0"></script>

	 <div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-width="" data-layout="standard" data-action="like" data-size="small" data-share="true"></div>
</center>

  <!-- LOGIN -->
  <section class="bg-light page-section" id="login">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Login</h2>
          <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
        </div>
      </div>
      <div class="row text-center" >
        <div class="col-md-4">
          <span class="fa-stack fa-4x">
            <i class="fas fa-circle fa-stack-2x text-primary"></i>
            <i class="fas fa-shopping-cart fa-stack-1x fa-inverse"></i>
          </span>
          <h4 class="service-heading">Register</h4>
              <div class="container">
                    <div class="header"> </div>
                   <!--  <?php if(isset($_POST['reg_user'])) include('errors.php');?> -->

                   <form method="post" id="reg_user" action="index_register.php">
                    <div class="input-group">
                      <label>Username</label>
                      <input type="text" id="user_register" name="user_register">
                    </div>

                    <div class="input-group">
                      <label>Password</label>
                      <input type="password" id="password_register" name="password_register">
                    </div>
                    <div class="input-group">
                      <button type="submit" class="btn" id="reg_user" name="reg_user">Register</button>
                    </div>
                    <p>
                        Already a member? <a href="#login">Sign in</a>
                    </p>
                    </form>
                </div>
        </div>
        <div class="col-md-4">
          <span class="fa-stack fa-4x">
            <i class="fas fa-circle fa-stack-2x text-primary"></i>
            <i class="fas fa-laptop fa-stack-1x fa-inverse"></i>
          </span>
          <h4 class="service-heading">User</h4>
          <p class="text-muted"></p>
        </div>
        <div class="col-md-4">
          <span class="fa-stack fa-4x">
            <i class="fas fa-circle fa-stack-2x text-primary"></i>
            <i class="fas fa-lock fa-stack-1x fa-inverse"></i>
          </span>
          <h4 class="service-heading">Login</h4>
           <div class="header"></div>
                  <!-- <?php if(isset($_POST['login_user'])) include('errors.php');?> -->

                    <form method="post" name="login_user" action="index_login.php" id="login_user" onsubmit ="validate_login();">
                          <div class="input-group">
                              <label>Username</label>
                              <input type="text" id="user" name="user" >
                          </div>
                          <div class="input-group" id="errors_user">
                                 
                          </div>
                          <div class="input-group">
                                  <label>Password</label>
                                  <input type="password" id="password" name="password">
                          </div> 
                           <div class="input-group" id="errors_password">
                                 
                          </div>
                          
                          <!-- Remember me -->
                          
                          <p class="remember_me">
                                <label>
                                 <input type="checkbox" name="remember_me" id="remember_me">
                                  Remember me 
                                </label>
                              </p>
                              
                        <!-- I'm not robot!!! -->
                
                       <label><strong>Enter Captcha:</strong></label><br/>
                       <p>
                        <input type="text" id="captcha" name="captcha" disabled/><br/><br/>
                        <input type="text" id="enter_captcha" size="6" maxlength="4"/><br/><br/>
                            <small>copy the digits from the image into this box</small>
                            </p>
                              <div class="input-group" id="errors_captcha">
                            
                             </div>
                        <button onclick="generateCaptcha()">Refresh</button>
                          <div class="input-group">
                                  <input type="submit" class="btn" value="Login" onclick="check()">
                          </div>


                          <p>
                              Not yet a member? <a href="#login">Sign up</a>
                          </p>
                    </form>

        </div>
      </div>
    </div>
  </section>


  <!-- About -->
  <section class="page-section" id="about">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">About</h2>
          <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <ul class="timeline">
            <?php foreach ($about as $key => $value) {
             if($value['id'] % 2 == 1)
             { ?>

              <li>
              <div class="timeline-image">
                <img class="rounded-circle img-fluid" src="<?php echo $value['image'];?>" alt="">
              </div>
              <div class="timeline-panel">
                <div class="timeline-heading">
                  <h4><?php echo $value['time'];?></h4>
                  <h4 class="subheading"><?php echo $value['title'];?></h4>
                </div>
                <div class="timeline-body">
                  <p class="text-muted"><?php echo $value['content'];?></p>
                </div>
              </div>
            </li>

            <?php }
            else { ?>
               <li class="timeline-inverted">
              <div class="timeline-image">
                <img class="rounded-circle img-fluid" src="<?php echo $value['image'];?>" alt="">
              </div>
              <div class="timeline-panel">
                <div class="timeline-heading">
                  <h4><?php echo $value['time'];?></h4>
                  <h4 class="subheading"><?php echo $value['title'];?></h4>
                </div>
                <div class="timeline-body">
                    <p class="text-muted"><?php echo $value['content'];?></p>
                </div>
              </div>
            </li>
            <?php }
            } ?>

            <li class="timeline-inverted">
              <div class="timeline-image">
                <h4>Be Part
                  <br>Of Our
                  <br>Story!</h4>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>


  <!-- Team -->
  <section class="bg-light page-section" id="team">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Our Amazing Team</h2>
          <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
        </div>
      </div>
      <div class="row">
      	 <?php foreach ($team as $key => $value) { ?>
        <div class="col-sm-4">
          <div class="team-member">
            <img class="mx-auto rounded-circle" src="<?php echo $value['image']; ?>" alt="">
            <h4><?php echo $value['name']; ?></h4>
            <p class="text-muted"><?php echo $value['profession']; ?></p>
          </div>
        </div>
      <?php } ?>
      </div>
    
    </div>
  </section>

  <!-- Media -->
  
    <section class="bg-light page-section" id="media">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Our Amazing Media</h2>
          <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
        </div>
      </div>
   <div class="row">
        <?php foreach ($media as $key => $value) { ?>
                <div>
    
       <?php 
                  $url = $value['youtube'];
                  preg_match(
                          '/[\\?\\&]v=([^\\?\\&]+)/',
                          $url,
                          $matches
                      );
                  $id = $matches[1];
 
                  $width = '500';
                  $height = '385';
     echo '<object width="' . $width . '" height="' . $height . '"><param name="movie" value="http://www.youtube.com/v/' . $id . '&amp;hl=en_US&amp;fs=1?rel=0"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="http://www.youtube.com/v/' . $id . '&amp;hl=en_US&amp;fs=1?rel=0" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="' . $width . '" height="' . $height . '"></embed></object>';
                  ?>
      
        <audio controls>
          <source src="horse.ogg" type="audio/ogg">
          <source src="<?php echo $value['music'];?>" type="audio/mpeg">
        </audio>

        <video width="320" height="240" controls>
          <source src="<?php echo $value['video'];?>" type="video/mp4">
          <source src="movie.ogg" type="video/ogg">
        </video>
      </div>
      <?php } ?>
      </div>


    </div>
  </section>

  <!-- Canvas and SVG -->

  <section class="bg-light page-section" id="canvas">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Example of canvas and SVG</h2>
        </div>
      </div>
  <br>
<center>
      <h1>CANVAS:</h1>
          <canvas id="myCanvas" width="250" height="100" style="border:1px solid #d3d3d3;"></canvas>

          <!-- SVG -->
      <h1>SVG:</h1>
          <svg width="100" height="100">
              <circle cx="50" cy="50" r="40" stroke="green" stroke-width="4" fill="yellow" />
          </svg>
        </center>

<!-- Canvas -->

  <script>
    
      var c = document.getElementById("myCanvas");
      var ctx = c.getContext("2d");
      ctx.font = "30px Arial";
      ctx.strokeText("Burduja Andrei",10,50);

  </script>

</div>
</section>
  
<div id="map"></div>

 <?php include('footer.php');?>

  

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Contact form JavaScript -->
  <script src="js/jqBootstrapValidation.js"></script>
  <script src="js/contact_me.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/agency.min.js"></script>

<script type="text/javascript">

  $(document).ready(function()
  {
  
  var map = L.map('map').setView([47.17416, 27.57043], 19);

  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/#map=17/47.17416/27.57043">OpenStreetMap</a> contributors'
  }).addTo(map);

  L.marker([51.5, -0.09]).addTo(map)
    .bindPopup('Universitatea "Alexandru Ioan Cuza", Iasi')
    .openPopup();
});

  function validate_login()
  { 
    var user = document.forms["login_user"]['user'].value;
    var password = document.forms["login_user"]['password'].value;
    var checkbox = $('[name="remember_me"]');

    if (user == "") {
      document.getElementById("errors_user").innerHTML = "Name must be filled out";
      return false;
    }
    else
    {
      document.getElementById("errors_user").innerHTML = "";
    }

    if (password == "") {
      document.getElementById("errors_password").innerHTML ="Password must be filled out";
      return false;
    }
    else
    {
      document.getElementById("errors_password").innerHTML ="";
    }

        
    // if (checkbox.is(':checked')){
    //     alert("checked");
    // }else{
    //     alert("unchecked");
    // }
}

</script>
  
</body>
</html>
