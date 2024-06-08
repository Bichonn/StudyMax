<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Document</title>

</head>

<body>

    <?php
    require("./layout/header.php");
    require("./navBar.php");
    require_once("./LessonManager.php");

    $lessonManager = new LessonManager();           //Crée un objet LessonManager
    $lessons = $lessonManager->getAllLesson();      //Récupère toutes les leçons
    ?>

    <header>

        <!-- Noms des catégories RESPONSIVE avec un lien vers la fonction showCategory() -->
        <div class="categoryNameResponsive">
            <h4 class="CM"><a href="#" onclick="showCategory('cartesMentales')">CM</a></h4>
            <h4 class="FR"><a href="#" onclick="showCategory('fichesRevisions')">FR</a></h4>
            <h4 class="NC"><a href="#" onclick="showCategory('notesCours')">NC</a></h4>
        </div>

        <!-- Noms des catégories avec un lien vers la fonction showCategory() -->
        <div class="categoryName">
            <h2 class="Cartes"><a href="#" onclick="showCategory('cartesMentales')">Cartes mentales</a></h2>
            <h2 class="Fiches"><a href="#" onclick="showCategory('fichesRevisions')">Fiches de révisions</a></h2>
            <h2 class="Notes"><a href="#" onclick="showCategory('notesCours')">Notes de cours</a></h2>
        </div>



        <!-- section des cartes mentales -->
        <div class="cartesMentales">

            <?php
            //Boucle à travers toutes les leçons
            foreach ($lessons as $lesson) {
                //vérifie si la catégorie de la leçon est 'Carte mentale'
                if ($lesson->getCategory() == 'Carte mentale') {
                    //affiche la leçon
                    echo '<a href="' . $lesson->getmedia() . '" target="_blank">';
                    echo '<div class="lessonCM">';
                    echo '<h3>' . $lesson->getName() . '</h3>';
                    echo '<p>' . $lesson->getCategory() . '</p>';
                    echo '<img src="' . $lesson->getmedia() . '"/>';
                    //vérifie si l'utilisateur est connecté et si l'utilisateur est le propriétaire de la leçon
                    if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == $lesson->getUser_id()) {
                        //affiche les boutons de suppression et de modification
                        echo '<div class="deleteLesson">';
                        echo '<a href="./vues/delete.php?id=' . $lesson->getId() . '">';
                        echo '<img src="./images/corbeille.png" alt="supprimer une leçon">';
                        echo '</a>';
                        echo '</div>';
                        echo '<div class="editLesson">';
                        echo '<a href="./vues/edit.php?id=' . $lesson->getId() . '">';
                        echo '<img src="./images/edit.png" alt="modifier une leçon">';
                        echo '</a>';
                        echo '</div>';
                    }
                    echo '</div>';
                    echo '</a>';
                }
            }
            ?>

        </div>
        <!-- fin section des cartes mentales -->



        <!-- section des fiches de révisions -->
        <div class="fichesRevisions">
            <?php
            //Boucle à travers toutes les leçons
            foreach ($lessons as $lesson) {
                //vérifie si la catégorie de la leçon est 'Fiche de révision'
                if ($lesson->getCategory() == 'Fiche de revision') {
                    //affiche la leçon
                    echo '<a href="' . $lesson->getmedia() . '" target="_blank">';
                    echo '<div class="lessonFR">';
                    echo '<h3>' . $lesson->getName() . '</h3>';
                    echo '<p>' . $lesson->getCategory() . '</p>';
                    echo '<img src="' . $lesson->getmedia() . '"/>';
                    //vérifie si l'utilisateur est connecté et si l'utilisateur est le propriétaire de la leçon
                    if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == $lesson->getUser_id()) {
                        //affiche les boutons de suppression et de modification
                        echo '<div class="deleteLesson">';
                        echo '<a href="./vues/delete.php?id=' . $lesson->getId() . '">';
                        echo '<img src="./images/corbeille.png" alt="supprimer une leçon">';
                        echo '</a>';
                        echo '</div>';
                        echo '<div class="editLesson">';
                        echo '<a href="./vues/edit.php?id=' . $lesson->getId() . '">';
                        echo '<img src="./images/edit.png" alt="modifier une leçon">';
                        echo '</a>';
                        echo '</div>';
                    }
                    echo '</div>';
                    echo '</a>';
                }
            }
            ?>
        </div>
        <!-- fin section des fiches de révisions -->



        <!-- section des notes de cours -->
        <div class="notesCours">
            <?php
            //Boucle à travers toutes les leçons
            foreach ($lessons as $lesson) {
                //vérifie si la catégorie de la leçon est 'Note de cours'
                if ($lesson->getCategory() == 'Note de cours') {
                    //affiche la leçon
                    echo '<a href="' . $lesson->getmedia() . '" target="_blank">';
                    echo '<div class="lessonNC">';
                    echo '<h3>' . $lesson->getName() . '</h3>';
                    echo '<p>' . $lesson->getCategory() . '</p>';
                    echo '<img src="' . $lesson->getmedia() . '"/>';
                    //vérifie si l'utilisateur est connecté et si l'utilisateur est le propriétaire de la leçon
                    if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == $lesson->getUser_id()) {
                        //affiche les boutons de suppression et de modification
                        echo '<div class="deleteLesson">';
                        echo '<a href="./vues/delete.php?id=' . $lesson->getId() . '">';
                        echo '<img src="./images/corbeille.png" alt="supprimer une leçon">';
                        echo '</a>';
                        echo '</div>';
                        echo '<div class="editLesson">';
                        echo '<a href="./vues/edit.php?id=' . $lesson->getId() . '">';
                        echo '<img src="./images/edit.png" alt="modifier une leçon">';
                        echo '</a>';
                        echo '</div>';
                    }
                    echo '</div>';
                    echo '</a>';
                }
            }
            ?>
        </div>
        <!-- fin section des notes de cours -->

    </header>


    <script>
        //Cette fonction permet d'afficher une catégorie spécifique de leçons
        function showCategory(categoryClass) {

            //Liste des catégories
            var categories = ['cartesMentales', 'fichesRevisions', 'notesCours'];

            //Boucle à travers les catégories
            for (var i = 0; i < categories.length; i++) {
                //Récupère tous les éléments de la catégorie actuelle
                var elements = document.getElementsByClassName(categories[i]);

                //Boucle à travers les éléments de la catégorie actuelle
                for (var j = 0; j < elements.length; j++) {
                    // Si la catégorie actuelle est celle sélectionnée, affiche les éléments, sinon les cache
                    elements[j].style.display = (categories[i] === categoryClass) ? 'block' : 'none';
                }
            }
        }
    </script>

</body>

</html>