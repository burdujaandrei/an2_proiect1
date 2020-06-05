<?php include('header.php');
require_once('initialize.php');

$id= $_GET['id'];

if($_SERVER["REQUEST_METHOD"] == "POST")
{
  // team image

    $uploads_dir = 'img/';
    $uploadfile = $uploads_dir . basename($_FILES['image']['name']);
    $temp = $uploads_dir.$_FILES["image"]['name'];  

      if(!empty($_FILES["image"]['name']) && $_POST['old_image'] != $temp)
      {
        $image = $temp;
      }
      else
      {
        $image = $_POST['old_image'];
      }

      if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
            echo "File is valid, and was successfully uploaded.\n";
        } 

    $team_one = array(
      "id"   => $id,
      "name" => $_POST['name'],
      "profession" => $_POST['profession'],
      "image" => $image
    );

    $team = new Team();
    $result = $team->update($team_one);
}
else
{
 
  $team_one = Team::find_by_id($id);
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


 <!-- Team -->
  <section class="page-section" id="insert">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Edit member</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <center>
           <form action="update_team.php?id=<?php echo $id;?>" method="POST" enctype="multipart/form-data">
              <div> Name 
              <input type="text" name="name" value="<?php echo $team_one['name'];?>" required>
              </div>
              <br/>
           		<div> Profession 
           		<input type="text" name="profession" value="<?php echo $team_one['profession'];?>" required>
              </div>
              <br/>
              Image
              <div>  
              <img src="<?php echo $team_one['image'];?>" width="50%" height="50%" />
              <input type="hidden" class="form-control" name="old_image" value="<?php echo $team_one['image'];?>" >
              <input type="file" placeholder="Upload a file" name="image" >
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
