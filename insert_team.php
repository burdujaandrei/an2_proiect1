<?php include('header.php');
require_once('initialize.php');
if($_SERVER["REQUEST_METHOD"] == "POST")
{
  // team image
    $uploads_dir = 'img/';
    $uploadfile = $uploads_dir . basename($_FILES['image']['name']);
    $image = $uploads_dir.$_FILES["image"]['name'];
    if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
            echo "File is valid, and was successfully uploaded.\n";
        } else {
            echo "Possible file upload attack!\n";
        }
    $args = array(
      "name" => $_POST['name'],
      "profession" => $_POST['profession'],
      "image" => $image
    );

    $team = new Team();
    $result = $team->create($args);
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


 <!-- About -->
  <section class="page-section" id="insert">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">New member</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <center>
           <form action="insert_team.php" method="POST" enctype="multipart/form-data">
              <div> Name 
              <input type="text" name="name" required>
              </div>
              <br/>
           		<div> Profession 
           		<input type="text" name="profession" required>
              </div>
              <br/>
              <div> Image 
              <input type="file" placeholder="Upload a file" name="image" required>
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
