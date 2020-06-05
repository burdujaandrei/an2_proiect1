   <!-- Conecxiunea la baza de date -->
    
            <?php
            session_start();
            require('connection.php');
            
            $errors = array(); 
        // LOGIN USER
    
            $user = mysqli_real_escape_string($conn, $_POST['user']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);
        
                $password = md5($password);
                $query = "SELECT * FROM users WHERE user='$user' AND password='$password'";
                $results = mysqli_query($conn, $query);
                $user = mysqli_fetch_array($result);
                $count_users = mysqli_num_rows($results);
                if ($count_users == 1) {
    //              $_SESSION['user'] = $user;
    //              print_r($_SESSION);exit;
                $_SESSION["user_id"] = $user["id"];
                
                if(!empty($_POST["remember_me"])) 
                {
                    setcookie("member_login",$user,time()+ (10 * 365 * 24 * 60 * 60));
                } 
                else 
                {
                    if(isset($_COOKIE["member_login"])) {
                        setcookie ("member_login","");
                }
            }
                    // if($_POST["remember_me"]=='1' || $_POST["remember_me"]=='on')
                    // {
                    // $hour = time() + 3600 * 24 * 30;
                    // setcookie('user', $user, $hour);
                    // setcookie('password', $password, $hour);
                    // }
                  $_SESSION['success'] = "You are now logged in";
                  header('location: admin.php');
                }else {
                     header('Location: index.php');
                }
                
