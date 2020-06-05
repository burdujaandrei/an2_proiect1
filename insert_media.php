<?php include('header.php');
require_once('initialize.php');

if($_SERVER["REQUEST_METHOD"] == "POST")
{
		$uploads_dir = '';
	    $uploadfile_music = $uploads_dir . basename($_FILES['music']['name']);
	    $temp_music = $uploads_dir.$_FILES["music"]['name'];

        $music = $temp_music;
        
     if (move_uploaded_file($_FILES['music']['tmp_name'], $uploadfile_music)) {
            echo "File mp3 is valid, and was successfully uploaded.<br/>";
        } 

     $uploadfile_video = $uploads_dir . basename($_FILES['video']['name']);
     $temp_video = $uploads_dir.$_FILES["video"]['name'];

     if (move_uploaded_file($_FILES['video']['tmp_name'], $uploadfile_video)) 
      {
            echo "File mp4 is valid, and was successfully uploaded.\n";
      } 

    $media_one = array(
      "youtube" => $_POST['youtube'],
      "music" => $music,
      "video" => $temp_video
    );

    $media = new Media();
    $result = $media->create($media_one);
}
?>
<body id="page-top">
    
 <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="admin.php">Agency</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      </div>
  </nav>


 <!-- Media -->
  <section class="page-section" id="insert">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Edit media</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <center>
           <form action="insert_media.php" method="POST" enctype="multipart/form-data">
               Youtube                
              <div>
                 <input type="text" name="youtube" placeholder="https://youtube..." required>
               </div>

              <br/>
              Music
              <div>  
              <input type="file" placeholder="Upload a file" name="music" accept="audio/mp3" required>
              </div>
              <br/>
              Video
              <div>  
              <input type="file" placeholder="Upload a file" name="video"  accept="video/mp4" required>
              </div>
              <br/>
             <input type="submit" value="Insert">
           </form>
         </center>
        </div>
      </div>
    </div>
  </section>
   <?php include('footer.php');?>

</body>

</html>