<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Style de la barre de navigation */

        /* style de la navbar */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 200px;
            height: 100%;
            background-color: #f8f9fa;
            border: 2px solid black;
        }

        /* style du logo */
        .navbar .logo {
            width: 170px;
            position: fixed;
            top: 0;
            left: 15px;
        }

        /* style de l'icône créer une nouvelle leçon */
        .navbar .plus {
            width: 40px;
            position: fixed;
            bottom: 20%;
            left: 80px;
        }

        /* style de l'icône conseils */
        .navbar .ampoule {
            width: 50px;
            position: fixed;
            bottom: 10%;
            left: 75px;
        }

        /* style de l'icône profil et déconnection */
        .navbar .profil,
        .se-deconnecter {
            width: 40px;
            position: fixed;
            bottom: 0%;
            left: 80px;
        }

        /* navbar responsive non affichée */
        .navbarResponsive {
            display: none;
        }


        /* style de la navbar pour une largueure max de 1250px */
        @media screen and (max-width: 1250px) {
            .navbar {
                width: 100px;
            }

            .navbar .logo {
                width: 100px;
                left: 0px;
            }

            .navbar .plus {
                width: 30px;
                left: 50px;
            }

            .navbar .ampoule {
                width: 40px;
                left: 45px;
            }

            .navbar .profil,
            .se-deconnecter {
                width: 30px;
                left: 50px;
            }

        }

        /* afficher la navbar responsive*/
        @media screen and (max-width: 960px) {
            .navbar {
                display: none;
            }

            .navbarResponsive {
                display: block;
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 70px;
                background-color: #f8f9fa;
                border: 2px solid black;
            }

            .navbarResponsive .logo {
                width: 40px;
                position: absolute;
                bottom: 15px;
                left: 50px;
            }

            .navbarResponsive .plus {
                width: 40px;
                position: absolute;
                bottom: 15px;
                right: 200px;
            }

            .navbarResponsive .ampoule {
                display: none;
            }

            .navbarResponsive .profil,
            .se-deconnecter {
                width: 35px;
                position: absolute;
                bottom: 15px;
                left: 90%;
            }

        }

        /* style de la navbar responsive pour une largueure max de 775px */
        @media screen and (max-width: 775px) {
            .navbarResponsive {
                height: 50px;
            }

            .navbarResponsive .plus {
                width: 30px;
                right: 150px;
                bottom: 10px;
            }

            .navbarResponsive .ampoule {
                width: 30px;
                right: 95px;
                bottom: 10px;
            }

            .navbarResponsive .profil,
            .se-deconnecter {
                width: 25px;
                right: 90px;
                bottom: 10px;
            }

        }
    </style>
</head>

<body>


    <header>

        <!-- Barre de navigation -->
        <nav class="navbar">

            <!-- Logo -->
            <a href="./images/JoyeuxAnniverssaire.png" target="_blank">
                <img class="logo" src="./images/logo.png" alt="logo">
            </a>

            <!-- icône créer une nouvelle leçon -->
            <a href="./vues/createLesson.php">
                <img class="plus" src="./images/plus.png" alt="ajouter une note">
            </a>

            <!-- icône conseils -->
            <a href="conseils.php" target="_blank">
                <img class="ampoule" src="./images/ampoule.png" alt="conseils">
            </a>

            <!-- Si l'utilisateur est connecté, affiche le lien de déconnexion, sinon affiche le lien de connexion -->
            <?php if ($_SESSION && $_SESSION["is_connected"]) : ?>

                <!-- Lien de déconnexion -->
                <a href="logout.php">
                    <img class="se-deconnecter" src="./images/se-deconnecter.png" alt="se déconnecter">
                </a>
            <?php else : ?>
                <!-- Lien de connexion -->
                <a href="login.php">
                    <img class="profil" src="./images/profil.png" alt="accéder/créer à compte à son compte">
                </a>
            <?php endif; ?>

        </nav>


        <!-- Barre de navigation responsive -->
        <nav class="navbarResponsive">

            <!-- Icône créer une nouvelle leçon -->
            <a href="./vues/createLesson.php">
                <img class="plus" src="./images/plus.png" alt="ajouter une note">
            </a>

            <!-- Icône conseils -->
            <a href="conseils.php" target="_blank">
                <img class="ampoule" src="./images/ampoule.png" alt="conseils">
            </a>

            <!-- Si l'utilisateur est connecté, affiche le lien de déconnexion, sinon affiche le lien de connexion -->
            <?php if ($_SESSION && $_SESSION["is_connected"]) : ?>
                <!-- Lien de déconnexion -->
                <a href="logout.php">
                    <img class="se-deconnecter" src="./images/se-deconnecter.png" alt="se déconnecter">
                </a>
            <?php else : ?>
                <!-- Lien de connexion -->
                <a href="login.php">
                    <img class="profil" src="./images/profil.png" alt="accéder/créer à compte à son compte">
                </a>
            <?php endif; ?>
        </nav>


    </header>




</body>

</html>