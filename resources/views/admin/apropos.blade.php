<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- FontAwesome for icons (if needed) -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- pdf & excel -->

    <!-- Select2 CSS -->

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.0/jspdf.umd.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.25/jspdf.plugin.autotable.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>

    <script src="{{ asset('frontend/dashboard/js/list.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('frontend/dashboard/css/dash.css') }}">

    <link rel="stylesheet" href="{{ asset('frontend/dashboard/html/admin.css') }}">
    <link rel="icon" href="{{ asset('assets/img/FaviconROMNOTE.png') }}" type="image/png">


    <title>Bienvenue sur ROMNote</title>



</head>





<style>

    body {

        font-family: 'Poppins', sans-serif;

        background-color: white;

        color: #4a3dbb;

        margin: 0;

        padding: 0;

        line-height: 1.6;



    }

    .image {
    width: 250px !important;
}

    .container {

        max-width: 900px;

        margin: 20px auto;

        padding: 20px;

        text-align: center;

    }



    .container h1,

    .container h2 {

        font-size: 24px;

        margin-bottom: 15px;

        

    }



    .container h2 {

        font-size: 20px;

        margin-top: 20px;

    }



    .content-section {

        text-align: center;

        margin-bottom: 30px;

    }



    .content-section h2 {

        margin-bottom: 10px;

    }



    .content-section p {

        margin: 5px 0;

        font-size: 16px;

    }



  

</style>

</head>





<body>

    <!-- header -->

    @include('admin.include.menu')

    <!-- accueil -->



    <div class="container">

        <h1>Bienvenue sur ROMNote</h1>

        <p>Votre solution complète pour la création et la correction de sujets d'évaluations scolaires et

            universitaires.

            Notre mission est de simplifier le processus d'évaluation pour les enseignants et les établissements

            scolaires, en rendant la gestion des examens plus rapide, plus précise et plus intuitive.</p>



        <div class="content-section">

            <h2>Notre Vision</h2>

            <p>Chez ROMNote, nous croyons que l'éducation est au cœur du progrès. C'est pourquoi nous avons développé

                une

                application qui soutient les enseignants et les administrateurs dans leur travail quotidien. Notre

                vision

                est de créer un écosystème d'évaluation transparent et efficace, où les enseignants peuvent se

                concentrer

                sur l'accompagnement des étudiants plutôt que sur la gestion administrative.</p>

        </div>



        <div class="content-section">

            <h2>Notre Mission</h2>

            <p>Notre mission est de faciliter la création et la correction des évaluations à travers une plateforme

                intuitive et performante. Grâce à notre technologie d'OMR (Optical Mark Recognition), ROMNote automatise

                la correction des examens, permettant ainsi de gagner un temps précieux et d'assurer une grande

                précision. Nous fournissons aux établissements les outils nécessaires pour analyser les performances des

                étudiants et améliorer la qualité de l'enseignement.</p>

        </div>



        <div class="content-section">

            <h2>Nos Valeurs</h2>

            <p><strong>Innovation :</strong> Nous exploitons la puissance de la technologie pour moderniser les

                processus

                d'évaluation traditionnels.</p>

            <p><strong>Simplicité :</strong> Nous avons conçu ROMNote pour qu'elle soit facile à utiliser, même pour

                ceux

                qui ne sont pas technophiles.</p>

            <p><strong>Fiabilité :</strong> Nous garantissons une correction précise grâce à nos algorithmes avancés.

            </p>

            <p><strong>Sécurité :</strong> La confidentialité et la sécurité des données des utilisateurs sont

                primordiales.

                Nous adoptons les meilleures pratiques pour protéger les informations de nos utilisateurs.</p>

        </div>



        <div class="content-section">

            <h2>Pourquoi ROMNote ?</h2>

            <p><strong>Gain de temps :</strong> Plus besoin de passer des heures à corriger manuellement des copies.

                ROMNote fait le travail en quelques minutes, libérant ainsi du temps pour se concentrer sur

                l'enseignement.</p>

            <p><strong>Précision accrue :</strong> L'erreur humaine lors des corrections manuelles est réduite à zéro

                grâce à notre technologie avancée de reconnaissance optique.</p>

            <p><strong>Analyse des performances :</strong> Grâce à des rapports détaillés et des statistiques, vous

                obtenez une vue d'ensemble des résultats et performances des étudiants, ce qui vous aide à ajuster votre

                pédagogie.</p>

            <p><strong>Gestion centralisée :</strong> ROMNote vous permet de gérer facilement vos classes, sujets,

                étudiants et résultats, le tout dans une seule et même plateforme.</p>

        </div>



        <div class="content-section">

            <h2>Qui sommes-nous ?</h2>

            <p>ROMNote est le fruit d'une équipe passionnée d'éducateurs, de développeurs et de concepteurs, tous animés

                par le même objectif : transformer le processus d'évaluation pour le rendre plus efficace en restant

                accessible à tous les enseignants, quel que soit leur niveau de familiarité avec les technologies

                numériques.</p>

            <p>Nous travaillons constamment à l'amélioration de notre plateforme pour répondre aux besoins évolutifs du

                secteur éducatif. Chaque fonctionnalité de ROMNote est pensée pour faciliter la vie des enseignants et

                améliorer l'expérience d'apprentissage des étudiants.</p>

        </div>

    </div>



    <!-- Footer -->

    @include('admin.include.footer')



</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"

    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">

</script>



</html>

