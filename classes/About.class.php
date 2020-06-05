<?php

class About {

  public $title;
  public $time;
  public $content;
  public $image;

  public function find_all() 
  {
    global $conn;
    $sql = "SELECT * FROM about";
    $result = mysqli_query($conn, $sql);
    $about = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $about;
  }

  public function create($args=[]) 
  {
    global $conn;
    $sql = "INSERT INTO about (title,time,content,image";
    $sql .= ") VALUES ('";
    $sql .= $args['title']."','".$args['time']."','".$args['content']."','".$args['image']."'";
    $sql .= ")";
    $result = $conn->query($sql);
      
    return $result;
  }

   public function find_by_id($id) 
   {
        global $conn;
        $sql = "SELECT * FROM  about ";
        $sql .= "WHERE id='" . $id . "'";
        $result = mysqli_query($conn, $sql);
        $about_one = mysqli_fetch_assoc($result);

        return $about_one;
    }

    public function update($args=[])
    {
      global  $conn;

        $sql = "UPDATE about SET ";
        $sql .= "title ='".$args['title']."', time='".$args['time']."',content='".$args['content']."',image='".$args['image']."'";
        $sql .= " WHERE id='".$args['id']."' ";
        $sql .= "LIMIT 1";
        $result = mysqli_query($conn, $sql);

        return $result;
    }

     public function delete($id) 
     {
        global $conn;
        $sql = "DELETE FROM about ";
        $sql .= "WHERE id='" .$id. "' ";
        $sql .= "LIMIT 1";
        $result = mysqli_query($conn, $sql);
        return $result;
    }

}

?>