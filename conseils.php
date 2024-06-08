<!DOCTYPE html>
<html>

<head>
    <!-- style de la page -->
    <style>
        /* Styles de la page de conseils */
        body {
            background-image: url("./images/fond.png");
            background-attachment: fixed;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        /* Styles des titres */
        h1 {
            text-align: center;
            position: absolute;
            top: 0;
            padding: 20px;
        }

        /* Styles des boxes des conseils */
        .conteneurConseils {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            margin-top: 100px;
            padding: 20px;
        }

        /* Styles des conseils */
        .conseil {
            flex: 0 0 calc(25% - 20px);
            margin-bottom: 20px;
            padding: 20px;
            background: #f0f0f0;
            border-radius: 10px;
            transition: transform 0.3s ease-in-out;
        }

        .conseil:hover {
            transform: scale(1.3);
        }

        .conseil h2 {
            margin-bottom: 40px;
            text-align: center;
            color: #000;
        }
    </style>
</head>

<body>
    <!-- conteneur principal des conseis -->
    <div class="conteneurConseils">

        <h1>Quelques conseils utiles pour vous aidez dans vos études</h1>

        <script>
            // Récupérer le conteneur des conseils
            const conteneurConseils = document.querySelector('.conteneurConseils');

            // Récupérer les conseils depuis l'API
            fetch('API.json')
                .then(reponse => reponse.json())
                .then(data => {

                    // Pour chaque conseil dans les données
                    data.conseils.forEach(conseil => {

                        // Créer un div pour le conseil
                        const div = document.createElement('div');
                        div.className = 'conseil'; // Ajouter la classe 'conseil' a la div


                        const h2 = document.createElement('h2'); // Créer un titre h2
                        const p = document.createElement('p'); // Créer un paragraphe
                        h2.textContent = conseil.tip; // Ajouter le titre du conseil
                        p.textContent = conseil.details; // Ajouter les détails du conseil
                        div.appendChild(h2); // Ajouter le titre au div
                        div.appendChild(p); // Ajouter le paragraphe a la div
                        conteneurConseils.appendChild(div); // Ajouter la div au conteneur des conseils
                    });
                });
        </script>
    </div>
</body>

</html>