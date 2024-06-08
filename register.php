<?php require("./layout/header.php");


// Vérification si le formulaire a été soumis
if ($_POST) {
    // Récupération des données du formulaire
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $pseudo = $_POST["pseudo"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Hashage du mot de passe
    
    // Création d'un nouvel utilisateur
    $userManager->create(new User([
        "firstName" => $firstName,
        "lastName" => $lastName,
        "pseudo" => $pseudo,
        "password" => $password
    ]));

    // Redirection vers la page d'accueil
    echo "<script>window.location.href='index.php'</script>";
  
}



?>

<!DOCTYPE html>
<html>
<head>
    <style> /* Style de la page */

        /* Style de la page register */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100vh;
            font-family: Arial, sans-serif;
            background-color: #e0e0e0;
        }

        h1 {
            color: #333;;
        }

        /* Style du formulaire */
        form {
            width: 500px;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
        }

        /* Style des labels */
        label {
            font-weight: bold;
            margin-top: 20px;
        }

        /* Style des inputs */
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

        @media screen and (max-width: 960px){
            form {
                width: 200px;
            }
        }
        
    </style>
</head>

<h1 class="mt-2">Créer un compte utilisateur</h1>

<!-- Formulaire d'inscription -->
<form method="post">
    <label for="firstName">Prénom</label>
    <input type="text" name="firstName" id="firstName" placeholder="Votre prénom" required>
    <label for="lastName">Nom</label>
    <input type="text" name="lastName" id="lastName" placeholder="Votre nom" required >
    <label for="pseudo">Pseudo</label>
    <input type="text" name="pseudo" id="pseudo" placeholder="Votre pseudo" required>
    <label for="password">Mot de passe</label>
    <input type="password" name="password" id="password" placeholder="Votre mot de passe" required minlength=6 maxlength=30>
    <input type="submit" value="Valider">
</form>
</html>

<?php
require("./layout/footer.php");
?>