<?php session_start(); ?>
<?php require_once('initialize.php'); 
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
<?php include('header.php');?>
<body id="page-top">
    
<!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="admin.php">Agency</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav text-uppercase ml-auto">
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
           <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Header -->
  <header class="masthead">
    <div class="container">
      <div class="intro-text">
        <div class="intro-lead-in">Welcome <?php echo (isset($_COOKIE['user']) ? $_COOKIE['user'] : "Visitor");?>!</div>
        <div class="intro-heading text-uppercase"><?php echo (isset($_SESSION['success']) ? $_SESSION['success'] : "");?>!</div>
        <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#about">Tell Me More</a>
      </div>
    </div>
  </header>

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
                  <a href="update_about.php?id=<?php echo $value['id'];?>">Update</a>
                  <a href="delete_about.php?id=<?php echo $value['id'];?>">Delete</a>
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
                  <a href="update_about.php?id=<?php echo $value['id'];?>">Update</a>
                  <a href="delete_about.php?id=<?php echo $value['id'];?>">Delete</a>
              </div>
            </li>
            <?php }
            } ?>

            <li class="timeline-inverted">
            <a href="insert_about.php">
              <div class="timeline-image">
                <h4>Insert
                  <br>a new
                  <br>article!</h4>
              </div>
          </a>
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
          <a href="update_team.php?id=<?php echo $value['id'];?>">Update</a>
          <a href="delete_team.php?id=<?php echo $value['id'];?>">Delete</a>
          </div>
        </div>
      <?php } ?>
      </div>
      <center>
     <a href="insert_team.php">
              <div class="timeline-image">
                <h4>Insert
                  <br>a new
                  <br>member!</h4>
              </div>
          </a>
        </center>
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
      <br>
         <center>
          <a href="update_media.php?id=<?php echo $value['id'];?>">Update Media</a><br>
        <a href="delete_media.php?id=<?php echo $value['id'];?>">Delete Media</a>
        </center>
        <br>
      <?php } ?>
      </div>
       
        <br>
        <center>
     <a href="insert_media.php">
              <div class="timeline-image">
                <h4>Insert
                  <br>a new
                  <br>media!</h4>
              </div>
          </a>
        </center>
        

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

</body>

</html>
