<?php require("./layout/header.php");


if ($_POST) {
    // Récupère l'objet utilisateur complet en fonction du pseudo saisit
    $user = $userManager->getByPseudo($_POST["pseudo"]);
  
    // Vérifie que cet utilisateur existe et que son mot de passe correspond à celui saisit
    if ($user && password_verify($_POST["password"], $user->getPassword())) {
        // Le connecte en mettant à jour la session
        $_SESSION["is_connected"] = $_POST["pseudo"];
        $_SESSION["user_id"] = $user->getId();
        
    }
    // Redirection sur la page d'accueil
    echo "<script>window.location.href='index.php'</script>";
    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<style> /* style de la page */

        /* Styles de la page de login */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100vh;
            font-family: Arial, sans-serif;
            background-color: #e0e0e0;
        }

        /* Styles du titre */
        h1 {
            margin-bottom: 20px;
        }

        /* Styles du formulaire */
        form {
            width: 500px;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
        }

        /* Styles des labels */
        label {
            font-weight: bold;
            margin-top: 10px;
        }

        /* Styles des inputs */
        input[type="text"],
        input[type="password"] {
            width: 95%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 10px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            border-radius: 4px;
            border: none;
            color: #fff;
            background-color: #5C6BC0;
            cursor: pointer;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        input[type="submit"]:hover {
            background-color: #3F51B5;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            color: #5C6BC0;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        @media screen and (max-width: 960px){
            form {
                width: 200px;
            }
        }

    </style>
</head>
<body>
        
    <!-- Formulaire de connexion -->
    
    <h1 class="mt-2">Connexion utilisateur</h1>
    <form method="post">
        <label for="pseudp">Pseudo</label>
        <input type="text" name="pseudo" id="pseudo" placeholder="Votre pseudo" class="form-control" required>
        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password" placeholder="Votre mot de passe" class="form-control" required minlength=6 maxlength=30>
        <input type="submit" value="Se connecter" class="mt-2 btn btn-primary">
    </form>
    <a href="register.php">Créer un compte utilisateur</a>  <!-- Lien vers la page de création de compte utilisateur -->

</body>
</html>



<?php
require("./layout/footer.php");
?>