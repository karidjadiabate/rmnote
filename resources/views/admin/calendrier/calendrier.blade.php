<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendrier des devoirs & examens</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css"
        integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css"
        integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('frontend/dashboard/css/dash.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/dashboard/html/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/dashboard/css/lists.css') }}">
    <link rel="icon" href="{{ asset('assets/img/FaviconROMNOTE.png') }}" type="image/png">


    <style>
        body {
            font-family: 'poppins', sans-serif;
            background-color: #F8F8F8;
            color: #353E4A;
        }
        .modal-dialog{
            max-width:600px!important;
        }
        .margin-r{
            margin-right: 20px;
        }
        .containers {
            max-width: 80%;
            margin: 0 auto;
            color: #000;
            margin-left: 150px;
        }
        .fc-day-header .fc-widget-header span{
            font-size:25px;
        }
        .containers H1 {
            color: #293D7A;
            font-weight:0px!important;
        }
        .fc-unthemed td.fc-today {
            background: #C0CCFE !important;
        }
        .fc-basic-view .fc-body .fc-row {
            min-height: 4em;
            height: 95px !important;
        }


        .fc-scroller .fc-day-grid-container {
            overflow: hidden;
            height: 590px!important;
        }

        .search-container {
            display: flex;
            align-items: center;
        }

        .search-bar {
            position: relative;
            width: 100%;
            max-width: 400px;
        }
        .fc-center h2{
            text-transform:capitalize;
        }

        .search-bar input {
            border: 1px solid #DBDEE2;
            border-radius: 5px;
            padding: 10px 20px;
            width: 100%;
            font-size: 14px;
            padding-left: 35px;
            outline: none;
            box-shadow: none
        }

        .search-bar i.fa-search {
            position: absolute;
            top: 50%;
            left: 10px;
            transform: translateY(-50%);
            color: #8993A0;
        }

        .fc-toolbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
            border-bottom: 3px solid #E3E7EE;
            padding-bottom: 20px;
        }
        .fc .fc-row .fc-content-skeleton table, .fc .fc-row .fc-content-skeleton td, .fc .fc-row .fc-helper-skeleton td {
            background: 0 0;
            border-top-color: #DBDEE2 !important;
        }
        .fc-toolbar h2 {
            color: #353E4A;
            font-size: 28px;
            width: 65% !important;
        }

        .fc-toolbar .fc-left .fc-button-group {
            display: flex;
            align-items: center;
        }

        .fc-day-header {
            background-color: #fff !important;
            color: #353E4A;
            font-weight: bold;
            text-align: center;
        }

        .fc-day-header .fc-widget-header {
            background-color: #E90C0C
        }

        .fc-day {
            background-color: #F8F8F8;
            gap: 10px
        }

        .fc-today {
            background-color: #C0CCFE !important;
        }

        .fc-event {
            border: 1px solid #8993A04D;
            border-radius: 4px;
            padding: 5px;
        }

        .event-economie-ma2a {
            background-color: #C0CCFE;
            color: #353E4A;
        }
        .fa-solid.fa-trash{
            color: #ffd100!important;
        }
        .fc-event .fc-time {
            color: #1E5AE6;
            font-weight: bold;
            margin-right:10px;
            margin-left: 5px;
        }

        .fc .fc-button-group>[aria-label="prev"]{
            background:#F1F4FE!important;
            color:grey!important;
        }
        .fc .fc-button-group>[aria-label="next"]{
            background:#F1F4FE!important;
            color:grey!important;

        }
        .fc {
            direction: ltr;
            text-align: left;
            background-color: #fff;
            border: 1px solid #E3E7EE;
            margin-bottom: 50px;
        }
        .fc .fc-toolbar>*>:first-child {
            margin-left: 6px!important;
        }
        .fc-event .fc-title {
            color: #353E4A;
            position: absolute;
            right: 5%;
        }

        .fc td,
        .fc th {
            /* border-style: solid;*/
            border-width: 20px;
            padding: 0;
            vertical-align: top;
        }
        .button-group .fc-prev-button .fc-button .fc-state-default .fc-corner-left{
            background:#F1F4FE!important;
        }


        .fc thead td:first-child {
            border-top-color: #fff!important;

        }


        /* span {
            font-size: 15px!important;
            font-weight:bold!important;
        } */

        .fc th {

            border-style: none;
            height: 2rem;


        }
        .fc-day-grid-event .fc-content {
            white-space: normal;
        }
        .fc-event .fc-content {
            position: relative;
            z-index: 2;
            background: #fff;
            /* display: flex; */
            margin-right: -6px;
            /* padding-bottom: 100%; */
            margin-bottom: -6px;
            margin-top: -6px;
            padding-left: 1%;
            margin-left: 3%;
            /* flex-direction: column; */
            bottom: 0px;
            display: flex;
            flex-direction: row;
        }
        .fc-event-container{
            display: flex;
            flex-direction: column;
            position: relative;
            bottom: -44px;
        }
        .fc-event .fc-delete-icon {
            color: #E90C0C;
            /* float: right; */
            /* margin-left: 10px; */
            /* margin-top: -40px; */
            position: absolute;
            top: 0px;
            right: 2px;
        }
        .fc-day-grid .fc-unselectable .fc-row .fc-week .fc-widget-content{
            height:100px!important;
        }
        /* .fc-button-group .fc-button {
            background-color: #1E5AE6;
            color: white;
            border: none;
        }

        .fc-button-group .fc-button:hover {
            background-color: #003CC8;
        } */

        /* .fc-state-active {
            background-color: #003CC8 !important;
        } */

        /* Cacher le bouton aujourd'hui */
        .fc-today-button {
            display: none;
        }

        .fc-left .fc-button-group {
            order: 3;
            display: flex;

        }

        .fc-center {
            display: flex !important;
            justify-content: flex-start;
            align-items: center;

        }
        .fc-toolbar button {
            position: relative;
            background: #003CC8 !important;
            color: #fff !important;
            border-radius: 0px !important;
            height:40px!important;
        }
        .fc-center {
            width: 500px;
        }
        .fc-toolbar h2 {
            color: #293D7A!important;
            font-size: 28px;
            width: 65% !important;
        }
                .fc-prev-button .fc-button .fc-state-default .fc-corner-left{
            background: #F1F4FE!important;
            color: #000!important;
        }
        .fc-next-button .fc-button .fc-state-default .fc-corner-right{
            background: #F1F4FE!important;
            color: #000!important;
        }
        .fc-right {
            order: 1;
            display: flex;

        }
        .fc-toolbar .fc-right {
            float: right;
            margin-right: 10px;
        }
        .fc-day-grid-container{
            height:auto!important;
        }
        .form-control{
            border-radius:0px!important;
        }
        th span  {
            font-size: 20px!important;
        }
        td span  {
            font-size: 15px;
        }
        .margin-space{
            margin-left:20px;
            margin-right:-20px;
        }
        .event-icon{
            margin-left:10px;
        }
        /*modal*/
        .modal {
    display: none; /* Cacher par défaut */
    position: fixed; 
    z-index: 1; 
    left: 0;
    top: 0;
    width: 100%; 
    height: 100%; 
    overflow: auto; 
    background-color: rgb(0,0,0); 
    background-color: rgba(0,0,0,0.4); 
}

.modal-content {
    background-color: #fefefe;
    margin: 15% auto; 
    padding: 20px;
    border: 1px solid #888;
    width: 80%; 
}

.close-button {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close-button:hover,
.close-button:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}
.fc-basic-view .fc-day-number {
    padding: 2px;
    padding-right: 15%;
    padding-top: 10%;
}
tr:first-child>td>.fc-day-grid-event {
    margin-top: -10%;
    margin-right: 0px;
    margin-left: -16px;
    width: 118%;
}
.fc td {
    border-style: solid;
    border-width: 18px;
    border-color: #fff !important;
    background: #F1F4FE;
    color: #000;
    font-weight: bold;
    border-top-width: 1px;
}
.barre {
            position: relative; /* Nécessaire pour le positionnement de l'élément enfant */
            padding: 0px; /* Ajouter un peu d'espace autour du texte */
            background-color: #f9f9f9; /* Couleur d'arrière-plan pour mieux voir la ligne */
        }

        .barre::after {
            content: ''; /* Nécessaire pour créer une ligne */
            position: absolute; /* Positionner la ligne par rapport à la div parent */
            top: 45%; /* Alignement vertical au milieu */
            left: 0; /* Commence à gauche */
            right: 0; /* S'étend jusqu'à la droite */
            height: 1px; /* Hauteur de la ligne */
            background-color: black; /* Couleur de la ligne */
            transform: translateY(-50%); /* Centre la ligne verticalement */
        }
    </style>
</head>

<body>
    <!-- header -->
    @include('admin.include.menu')
    <!-- accueil -->

    <div class="containers principal">
        <h2>Calendriers des évaluations</h2>
        <div id="calendar"></div>

                <!-- Modal -->
        <div class="modal fade" id="createEventModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <button type="button" class="custom-close-btn" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
                    <div class="modal-body">
                        <form id="eventForm">
                            <!-- 8 Input Fields -->
                           <div class="form-group col-md-12 row g-3">
                                <div class="form-group col-md-6">
                                    <select class="form-control" id="input1" required>
                                        <option value="" disabled selected>Matière</option>
                                        <option value="option1">Option 1</option>
                                        <option value="option2">Option 2</option>
                                        <option value="option3">Option 3</option>
                                        <!-- Ajoutez d'autres options ici -->
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <select class="form-control" id="input2" required>
                                        <option value="" disabled selected>Catégorie d'évolution</option>
                                        <option value="option1">Option 1</option>
                                        <option value="option2">Option 2</option>
                                        <option value="option3">Option 3</option>
                                        <!-- Ajoutez d'autres options ici -->
                                    </select>
                                </div>
                           </div>
                           <div class="form-group col-md-12 row g-3">
                                <div class="form-group col-md-6">
                                    <select class="form-control" id="input3" required>
                                        <option value="" disabled selected>Filière</option>
                                        <option value="option1">Option 1</option>
                                        <option value="option2">Option 2</option>
                                        <option value="option3">Option 3</option>
                                        <!-- Ajoutez d'autres options ici -->
                                    </select>
                                </div>
                               <div class="form-group col-md-6">
                                    <select class="form-control" id="input4" required>
                                        <option value="" disabled selected>Classe</option>
                                        <option value="classe1">Classe 1</option>
                                        <option value="classe2">Classe 2</option>
                                        <option value="classe3">Classe 3</option>
                                        <!-- Ajoutez d'autres options ici -->
                                    </select>
                                </div>
                           </div>
                           <div class="form-group col-md-12 row g-3">
                               <div class="form-group col-md-3">
                                   <input type="time" class="form-control" id="input5" placeholder="Début" required>
                               </div>
                               <div class="form-group col-md-3">
                                   <input type="time" class="form-control" id="input6" placeholder="Fin" required>
                               </div>
                               <div class="form-group col-md-6">
                                   <input type="date" class="form-control" id="input7" placeholder="Date" required>
                               </div>
                           </div>
                        </form>
                    </div>
                    <div class="modal-footer d-flex justify-content-between margin-space">
                        <button type="submit" class="btn btn-success" id="submitEvent">Sauvegarder</button>
                        <button type="cancel" class="btn btn-secondaire margin-r" data-bs-dismiss="modal" aria-label="Close" >Annuler</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

<!-- Modal Structure -->
<div class="modal fade" id="eventModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <button type="button" class="custom-close-btn" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
                    <div class="modal-body">
                        <form id="eventForm">
                            <!-- 8 Input Fields -->
                           <div class="form-group col-md-12 row g-3">
                                <div class="form-group col-md-6">
                                    <select class="form-control" id="input10" disabled>
                                        <option value="" disabled selected>Matière</option>
                                        <option value="option1">Option 1</option>
                                        <option value="option2">Option 2</option>
                                        <option value="option3">Option 3</option>
                                        <!-- Ajoutez d'autres options ici -->
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <select class="form-control" id="input20" disabled>
                                        <option value="" disabled selected>Catégorie d'évolution</option>
                                        <option value="option1">Option 1</option>
                                        <option value="option2">Option 2</option>
                                        <option value="option3">Option 3</option>
                                        <!-- Ajoutez d'autres options ici -->
                                    </select>
                                </div>
                           </div>
                           <div class="form-group col-md-12 row g-3">
                                <div class="form-group col-md-6">
                                    <select class="form-control" id="input30" disabled>
                                        <option value="" disabled selected>Filière</option>
                                        <option value="option1">Option 1</option>
                                        <option value="option2">Option 2</option>
                                        <option value="option3">Option 3</option>
                                        <!-- Ajoutez d'autres options ici -->
                                    </select>
                                </div>
                               <div class="form-group col-md-6">
                                    <select class="form-control" id="input40" disabled>
                                        <option value="" disabled selected>Classe</option>
                                        <option value="classe1">Classe 1</option>
                                        <option value="classe2">Classe 2</option>
                                        <option value="classe3">Classe 3</option>
                                        <!-- Ajoutez d'autres options ici -->
                                    </select>
                                </div>
                           </div>
                           <div class="form-group col-md-12 row g-3">
                               <div class="form-group col-md-3">
                                   <input type="time" class="form-control" id="input50" placeholder="Début" required>
                               </div>
                               <div class="form-group col-md-3">
                                   <input type="time" class="form-control" id="input60" placeholder="Fin" disabled>
                               </div>
                               <div class="form-group col-md-6">
                                   <input type="date" class="form-control" id="input70" placeholder="Date" required>
                               </div>
                           </div>
                        </form>
                    </div>
                    <div class="modal-footer d-flex justify-content-between margin-space">
                        <button type="submit" class="btn btn-success" id="submitEvent">Sauvegarder</button>
                        <button type="cancel" class="btn btn-secondaire margin-r" data-bs-dismiss="modal" aria-label="Close">Annuler</button>
                    </div>
                </div>
            </div>
        </div>


                            <!-- Modal de Suppression -->
                            <div class="modal fade" id="deleteclasse" tabindex="-1"
                                aria-labelledby="deleteclasseLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content text-center">
                                        <button type="button" class="custom-close-btn" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
                                        <div  class="modal-body text-center d-flex flex-column" id="">
                                            <i class="fa-solid fa-triangle-exclamation" id="fa-triangle-exclamation"></i>                            
                                            <span>Êtes vous sûres ?</span>
                                        </div>
                                        <p>Voulez-vous supprimer l'évaluation <strong><span id="nom_affiche"></span></strong> ?</p>
                                        <div class="d-flex justify-content-around">
                                            <form action="" method="POST">
                                                <button type="button" class="btn btn-success">Oui, je confirme</button>
                                            </form>
                                            <button type="button" class="btn btn-secondaire"
                                                data-bs-dismiss="modal">Annuler</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
            <!-- Footer -->

    @include('admin.include.footer')

    <!-- Charger jQuery, moment.js et FullCalendar -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js"
        integrity="sha512-ykZ1QQr0Jy/4ZkvKuqWn4iF3lqPZyij9iRv6sGqLRdTPkY69YX6+7wvVGmsdBbiIfN/8OdsI7HABjvEok6ZopQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/locale/fr.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.0/jspdf.umd.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.25/jspdf.plugin.autotable.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
    <script>
$(document).ready(function() {
    // Définir les variables pour les dates des événements
    var heure = "12:00:00"; // Corriger le double point à la fin
    var ma2aStart = '2024-10-15T08:30:00';
    var ma2aEnd = `2024-10-15T${heure}`; // Utiliser les backticks pour l'interpolation de chaîne

    var cficStart = '2024-10-23T08:20:00';
    var cficEnd = '2024-10-23T12:00:00';

    $('#calendar').fullCalendar({
        locale: 'fr',
        header: {
            left: 'createButton',
            center: 'searchBar title',
            right: 'agendaDay,agendaWeek,month prev,next'
        },
        defaultDate: new Date(),
        editable: true,
        events: [
            {
                id: 1, // Assurez-vous d'ajouter un identifiant unique pour chaque événement
                title: ' MA2A ',
                start: ma2aStart, // Utiliser la variable pour la date de début
                end: ma2aEnd, // Utiliser la variable pour la date de fin
                className: 'event-economie-ma2a',
                description: 'Économie pour MA2A',
                location: 'Devoir'
            },
            {
                id: 2, // Identifiant pour le deuxième événement
                title: ' CFIC ',
                start: cficStart, // Utiliser la variable pour la date de début
                end: cficEnd, // Utiliser la variable pour la date de fin
                className: 'event-economie-ma2a',
                description: 'Économie pour CFIC',
                location: 'Devoir'
            }
        ],
        eventRender: function(event, element) {
            element.find('.fc-title').append('<span class="event-icon"><i class="fa-solid fa-trash"></i></span>');

            // Écouter le clic sur l'icône de l'événement
            element.find('.event-icon').on('click', function(e) {
                e.stopPropagation(); // Empêcher le clic d'atteindre l'élément parent
                $('#deleteclasse').modal('show'); // Ouvrir le deuxième modal

                // Stocker une référence à l'élément parent .fc-content pour utilisation ultérieure
                const parentContent = $(this).closest('.fc-content');

                // Lorsque le bouton de confirmation est cliqué, ajouter la classe 'barre'
                $(document).on('click', '.btn-success', function() {
                    parentContent.addClass('barre'); // Ajouter la classe barre à l'élément parent
                    $('#deleteclasse').modal('hide'); // Optionnel : Fermer le modal après la confirmation
                });
            });


            // Écouter le clic sur l'élément de l'événement
            element.on('click', function() {
                $('#eventModal').modal('show'); // Ouvrir le premier modal

                // Remplir les inputs avec les données de l'événement
                $('#input10').val(event.title);
                $('#input20').val(event.location);
                $('#input30').val(event.description);
                $('#input40').val(event.className);
                $('#input50').val(event.start.format('HH:mm'));
                $('#input60').val(event.end.format('HH:mm'));
                $('#input70').val(event.start.format('YYYY-MM-DD'));

                // Supprimer le backdrop
                setTimeout(function() {
                    $('.modal-backdrop').remove();
                }, 0);
            });
        },
        // Écouter le changement de position de l'événement
        eventDrop: function(event, delta, revertFunc) {
            // Mettre à jour les dates de l'événement
            event.start = event.start.clone(); // Clone pour éviter de modifier l'original
            event.end = event.end.clone(); // Clone pour éviter de modifier l'original
            event.start.add(delta); // Ajoute la delta (décalage) à la date de début
            event.end.add(delta); // Ajoute la delta (décalage) à la date de fin

            // Enregistrer les nouvelles dates dans la base de données via AJAX
            $.ajax({
                url: '', // L'URL de votre script côté serveur pour mettre à jour l'événement
                method: 'POST',
                data: {
                    id: event.id, // Envoyer l'identifiant de l'événement
                    start: event.start.format(),
                    end: event.end.format()
                },
                success: function(response) {
                    // Traitement en cas de succès
                    console.log('Événement mis à jour avec succès:', response);
                },
                error: function() {
                    // Si une erreur se produit
                    alert('Une erreur s\'est produite lors de la mise à jour de l\'événement.');
                    revertFunc(); // Revenir à la position originale si l'erreur se produit
                }
            });

            // Ne pas annuler le changement
            // Si vous voulez annuler, utilisez revertFunc();
        }
    });

    $(".fc-center").prepend(`
        <div class="search-bar">
            <i class="fas fa-search"></i>
            <input type="text" placeholder="Rechercher...">
        </div>
    `);

    // Gérer le formulaire du premier modal
    $('#eventForm').on('submit', function(event) {
        event.preventDefault();
        alert('Formulaire soumis');
        $('#eventModal').modal('hide'); // Fermer le premier modal
    });

    // Gérer le formulaire du deuxième modal
    $('#deleteForm').on('submit', function(event) {
        event.preventDefault();
        alert('Formulaire de suppression soumis');
        $('#deleteclasse').modal('hide'); // Fermer le deuxième modal
    });
});

</script>


</body>

</html>
