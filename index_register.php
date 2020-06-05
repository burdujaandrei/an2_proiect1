<!-- Conecxiunea la baza de date -->
    
    <?php
    
    require('connection.php');
    
    $errors = array(); 

    // REGISTER USER

    if(!isset($_POST['reg_user']))
    {
        array_push($errors, "Empty fields username or password");
    }
    else
    {
        // receive all input values from the form
        $user_register = mysqli_real_escape_string($conn, $_POST['user_register']);
        $password_register = mysqli_real_escape_string($conn, $_POST['password_register']);

        // form validation: ensure that the form is correctly filled ...
        // by adding (array_push()) corresponding error unto $errors array
        if (empty($user_register)) { array_push($errors, "Username is required"); }
        if (empty($password_register)) { array_push($errors, "Password is required"); }

        // first check the database to make sure 
        // a user does not already exist with the same username and/or email
        $user_check_query = "SELECT * FROM users WHERE user='$user_register' LIMIT 1";
        $result = mysqli_query($conn, $user_check_query);
        $user_db = mysqli_fetch_assoc($result);
        if ($user_db)
        { 
            // if user exists
            if ($user_db['user'] === $user_register && !empty($user_register)) {
              array_push($errors, "Username already exists");
            }
        }


            // Finally, register user if there are no errors in the form
            if(count($errors) == 0)
            {
              $password = md5($password);//encrypt the password before saving in the database
              $query = "INSERT INTO users (user, password) 
                                VALUES('$user', '$password')";

              mysqli_query($conn, $query);
              $_SESSION['user'] = $user;
              header('location: index.php');
            }
            else
            {
                include_once('index.php');
            }
    }

    ?>

