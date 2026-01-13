<?php
require_once "connexio.php";

$email = "";
if (isset($_POST['email'])) $email = $_POST['email'];
$password = "";
if (isset($_POST['password'])) $password = $_POST['password'];

?>

<form caption="" method="post">        
    <p>Email: <input type="text" value="<?php echo $email ?>" name="email"></p>
    <p>Password: <input type="password" name="password" value="<?php echo $password ?>"></p>
    <input type="submit" value="Verificar">
</form>

<?php

if(!empty($email) && !empty($password)) {
    $sql = "select * from employees where email='$email' and password='$password'"; 
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "CREDENCIALS VÀLIDES!!!";
    } else {
        echo "ERROR EN LES CREDENCIALS!!!";
    }
}

?>