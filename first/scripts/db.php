<?php
        
        if(isset($_POST['submito'])){ //post submitted
            $servername = "localhost";
            $username = $_POST['user'];
            $password = $_POST['password'];
            try {
                $conn = new PDO("mysql:host=$servername;dbname=users", 'rw_user', password());
                // set the PDO error mode to exception
                session_start();
                $_SESSION['user'] = 'rw_user';
                $_SESSION['password'] = '10Elfosdesangre';
                $encrypted_password = md5($password);
                $sql = "SELECT * FROM users WHERE username='".$username."' AND password='".$encrypted_password."';";
                $result = $conn->query($sql);
                if($result->rowCount()>0){
                  setcookie('state','online',time()+1800);
                  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                  header("Location: http://localhost/first/management.php");
                }else{
                  echo "<h2 class='failed'>Nombre de Usuario o Password equivocado</h2>";
                }
                
              } catch(PDOException $e) {
                echo "<h2 class='failed'>Nombre de Usuario o Password equivocado</h2>";
              }
        }
    ?>






























































































































<?php
function password(){
  return '10Elfosdesangre';
}?>

    
