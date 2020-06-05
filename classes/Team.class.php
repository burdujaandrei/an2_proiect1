<?php

class Team {

  public $name;
  public $profession;
  public $image;

  public function find_all() 
  {
    global $conn;
    $sql = "SELECT * FROM team";
    $result = mysqli_query($conn, $sql);
    $team = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $team;
  }

  public function create($args=[]) 
  {
    global $conn;
    $sql = "INSERT INTO team (name,profession,image";
    $sql .= ") VALUES ('";
    $sql .= $args['name']."','".$args['profession']."','".$args['image']."'";
    $sql .= ")";
    $result = $conn->query($sql);
      
    return $result;
  }

   public function find_by_id($id) 
   {
        global $conn;
        $sql = "SELECT * FROM  team ";
        $sql .= "WHERE id='" . $id . "'";
        $result = mysqli_query($conn, $sql);
        $team_one = mysqli_fetch_assoc($result);

        return $team_one;
    }

    public function update($args=[])
    {
      global  $conn;

        $sql = "UPDATE team SET ";
        $sql .= "name ='".$args['name']."', profession='".$args['profession']."',image='".$args['image']."'";
        $sql .= " WHERE id='".$args['id']."' ";
        $sql .= "LIMIT 1";
        $result = mysqli_query($conn, $sql);

        return $result;
    }

     public function delete($id) 
     {
        global $conn;
        $sql = "DELETE FROM team ";
        $sql .= "WHERE id='" .$id. "' ";
        $sql .= "LIMIT 1";
        $result = mysqli_query($conn, $sql);
        return $result;
    }

}

?>