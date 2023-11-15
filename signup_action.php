<?php

require_once "database.php"; 

if(isset($_POST['submit'])){
    
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $error_MSG = "";

    if(empty($pseudo) || empty($email) || empty($password)){
        $error_MSG = "Veuillez remplir tout les champs";
    } else {
        if (strlen($pseudo) < 5){
            $error_MSG = "Pseudo invalide";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $error_MSG = "Email invalide";
        } elseif (strlen($password) < 8 || !preg_match('/[0-9]/', $password)){
            $error_MSG = "Mot de passe invalide";
        } else {

            $stmt = $con->prepare("INSERT INTO users (pseudo, email, password) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $pseudo, $email, $password);

            if($stmt->execute()){
                echo "Inscription réussie";
            }else{
                $error_MSG = "Echec lors de l'inscription";
            }

            $stmt->close();
        }
    }

    if(!empty($error_MSG)){
        echo $error_MSG;
    }
}

?>