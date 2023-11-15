<?php
include "lang_action.php";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup multilingue</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

   <div class="box_languages">
        <a href="signup.php?lang=fr">FR</a>
        <a href="signup.php?lang=en">EN</a>
        <a href="signup.php?lang=it">IT</a>
   </div>

    <div class="container">
        <h1><?=__('Inscription')?></h1>
        <form action="signup_action.php" method="post">
            <?php if(isset($error_MSG)): ?>
            <p><?php echo $error_MSG ?></p>
            <?php endif; ?>

            <div class="box_input">
                <input type="text" name="pseudo" placeholder="Pseudo" required>
            </div>
            <div class="box_input">
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <div class="box_input">
                <input type="password" name="password" placeholder="<?=__('Mot de passe')?>" required>
            </div>

            <p><?=__('Avez-vous un compte utilisateur ?')?> <a href="#" class="login"><?=__('Se connecter')?></a></p>

            <button type="submit" name="submit"><?= __('Envoyer')?></button>
        </form>
    </div>

</body>
</html>