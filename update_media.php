<?php include('header.php');
require_once('initialize.php');

$id= $_GET['id'];

if($_SERVER["REQUEST_METHOD"] == "POST")
{

  //youtube

  if(!empty($_POST['youtube']) && $_POST['youtube'] != $_POST['old_youtube'])
  {
    $youtube = $_POST['youtube'];
  }
  else
  {
    $youtube = $_POST['old_youtube'];
  }
  // about music

    $uploads_dir = '';

    $uploadfile_music = $uploads_dir . basename($_FILES['music']['name']);
    $temp_music = $uploads_dir.$_FILES["music"]['name'];  

      if(!empty($_FILES["music"]['name']) && $_POST['old_music'] != $temp_music)
      {
        $userfile_extn = substr($temp_music, strrpos($temp_music, '.')+1);
        if($userfile_extn == "")
        {
          $music = $temp_music.".mp3";
        }
        else
        {
          $music = $temp_music;
        }
      }
      else
      {
        $music = $_POST['old_music'];
      }

      if (move_uploaded_file($_FILES['music']['tmp_name'], $uploadfile_music)) {
            echo "File is valid, and was successfully uploaded.\n";
        } 

     $uploadfile_video = $uploads_dir . basename($_FILES['video']['name']);
     $temp_video = $uploads_dir.$_FILES["video"]['name'];  

      if(!empty($_FILES["video"]['name']) && $_POST['old_video'] != $temp_video)
      {
        $video = $temp_video;
      }
      else
      {
        $video = $_POST['old_video'];
      }

      if (move_uploaded_file($_FILES['video']['tmp_name'], $uploadfile_video)) 
      {
            echo "File is valid, and was successfully uploaded.\n";
      } 

    $media_one = array(
      "id"   => $id,
      "youtube" => $youtube,
      "music" => $music,
      "video" => $video
    );

    $media = new Media();
    $result = $media->update($media_one);
}
else
{
 
  $media_one = Media::find_by_id($id);
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
           <form action="update_media.php?id=<?php echo $id;?>" method="POST" enctype="multipart/form-data">
               Youtube
                 <div>
                  <?php 
                  $url = $media_one['youtube'];
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
                  
              </div>

              <div>
                <input type="hidden" name="old_youtube" value="<?php echo $media_one['youtube'];?>"> 
                 <input type="text" name="youtube" placeholder="<?php echo $media_one['youtube'];?>">
               </div>

              <br/>
              Music
              <div>
              <audio controls>
                <source src="horse.ogg" type="audio/ogg">
                <source src="<?php echo $media_one['music'];?>" type="audio/mpeg" >
              </audio>
              </div>
              <div>  
              <input type="hidden" class="form-control" name="old_music" value="<?php echo $media_one['music'];?>" >
              <input type="file" placeholder="Upload a file" name="music" accept="audio/mp3">
              </div>
              <br/>
              Video
              <div>
              <video width="320" height="240" controls>
                  <source src="<?php echo $media_one['video'];?>" type="video/mp4">
                  <source src="movie.ogg" type="video/ogg">
              </video>
              </div>
              <div>  
              <input type="hidden" class="form-control" name="old_video" value="<?php echo $media_one['video'];?>" >
              <input type="file" placeholder="Upload a file" name="video"  accept="video/mp4" >
              </div>
              <br/>
             <input type="submit" value="Update">
           </form>
         </center>
        </div>
      </div>
    </div>
  </section>
   <?php include('footer.php');?>

</body>

</html>
