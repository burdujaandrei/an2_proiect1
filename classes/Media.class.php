<?php

class Media {

  public $youtube;
  public $music;
  public $video;

  public function find_all() 
  {
    global $conn;
    $sql = "SELECT * FROM media";
    $result = mysqli_query($conn, $sql);
    $media = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $media;
  }

  public function create($args=[]) 
  {
    global $conn;
    $sql = "INSERT INTO media (youtube,music,video";
    $sql .= ") VALUES ('";
    $sql .= $args['youtube']."','".$args['music']."','".$args['video']."'";
    $sql .= ")";
    $result = $conn->query($sql);
      
    return $result;
  }

   public function find_by_id($id) 
   {
        global $conn;
        $sql = "SELECT * FROM  media ";
        $sql .= "WHERE id='" . $id . "'";
        $result = mysqli_query($conn, $sql);
        $media_one = mysqli_fetch_assoc($result);

        return $media_one;
    }

    public function update($args=[])
    {
      global  $conn;

        $sql = "UPDATE media SET ";
        $sql .= "youtube ='".$args['youtube']."', music='".$args['music']."',video='".$args['video']."'";
        $sql .= " WHERE id='".$args['id']."' ";
        $sql .= "LIMIT 1";
        $result = mysqli_query($conn, $sql);

        return $result;
    }

     public function delete($id) 
     {
        global $conn;
        $sql = "DELETE FROM media ";
        $sql .= "WHERE id='" .$id. "' ";
        $sql .= "LIMIT 1";
        $result = mysqli_query($conn, $sql);
        return $result;
    }

}

?>