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
                        <form id="eventForm" action="{{route('calendrieradmin.store')}}" method="POST">
                            @csrf
                            <!-- 8 Input Fields -->
                           <div class="form-group col-md-12 row g-3">
                                <div class="form-group col-md-6">
                                    <select class="form-control" name="matiere_id" id="input1" required>
                                        <option value="" disabled selected>Matière</option>
                                        @foreach ($matieres as $matiere)
                                            <option value="{{$matiere->id}}">{{$matiere->nommatiere}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <select class="form-control" name="type_sujet_id" id="input2" required>
                                        <option value="" disabled selected>Catégorie d'évaluation</option>
                                            <option value="1">Devoir</option>
                                            <option value="2">Examen</option>
                                    </select>
                                </div>
                           </div>
                           <div class="form-group col-md-12 row g-3">
                                <div class="form-group col-md-6">
                                    <select class="form-control" name="filiere_id" id="input3" required>
                                        <option value="" disabled selected>Filière</option>
                                        @foreach ($filieres as $filiere)
                                            <option value="{{$filiere->id}}">{{$filiere->filiere->nomfiliere ?? $filiere->nomfilieretablissement }}</option>
                                        @endforeach
                                    </select>
                                </div>
                               <div class="form-group col-md-6">
                                    <select class="form-control" name="classe_id" id="input4" required>
                                        <option value="" disabled selected>Classe</option>
                                        @foreach ($classes as $classe)
                                            <option value="{{$classe->id}}">{{$classe->nomclasse}}</option>
                                        @endforeach
                                    </select>
                                </div>
                           </div>
                           <div class="form-group col-md-12 row g-3">
                               <div class="form-group col-md-3">
                                   <input type="time" name="debut" class="form-control" id="input5" placeholder="Début" required>
                               </div>
                               <div class="form-group col-md-3">
                                   <input type="time" name="fin" class="form-control" id="input6" placeholder="Fin" required>
                               </div>
                               <div class="form-group col-md-6">
                                   <input type="date" name="date" class="form-control" id="input7" placeholder="Date" required>
                               </div>
                           </div>

                           <div class="modal-footer d-flex justify-content-between margin-space">
                            <button type="submit" class="btn btn-success" id="submitEvent">Sauvegarder</button>
                            <button type="button" class="btn btn-secondaire margin-r" data-dismiss="modal">Annuler</button>
                           </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>

        <!-- Modal Structure -->
       <!-- Modal Structure pour l'édition -->
<div class="modal fade" id="eventModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="custom-close-btn" data-bs-dismiss="modal" aria-label="Close">
                <i class="fa-solid fa-xmark"></i>
            </button>
            <div class="modal-body">
                <form id="editEventForm">
                    <!-- Champs grisés sauf date, début et fin -->
                    <div class="form-group col-md-12 row g-3">
                        <div class="form-group col-md-6">
                            <select class="form-control" name="matiere_id" id="editInput1" disabled>
                                <option value="" disabled selected>Matière</option>
                                @foreach ($matieres as $matiere)
                                    <option value="{{$matiere->id}}">{{$matiere->nommatiere}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <select class="form-control" name="type_sujet_id" id="editInput2" disabled>
                                <option value="" disabled selected>Catégorie d'évaluation</option>
                                @foreach ($typesujets as $typesujet)
                                    <option value="{{$typesujet->id}}">{{$typesujet->libtypesujet}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-md-12 row g-3">
                        <div class="form-group col-md-6">
                            <select class="form-control" name="filiere_id" id="editInput3" disabled>
                                <option value="" disabled selected>Filière</option>
                                @foreach ($filieres as $filiere)
                                    <option value="{{$filiere->id}}">{{$filiere->filiere->nomfiliere ?? $filiere->nomfilieretablissement }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <select class="form-control" name="classe_id" id="editInput4" disabled>
                                <option value="" disabled selected>Classe</option>
                                @foreach ($classes as $classe)
                                    <option value="{{$classe->id}}">{{$classe->nomclasse}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group col-md-12 row g-3">
                        <div class="form-group col-md-3">
                            <input type="time" name="debut" class="form-control" id="editInput5" placeholder="Début" required>
                        </div>
                        <div class="form-group col-md-3">
                            <input type="time" name="fin" class="form-control" id="editInput6" placeholder="Fin" required disabled>
                        </div>
                        <div class="form-group col-md-6">
                            <input type="date" name="date" class="form-control" id="editInput7" placeholder="Date" required>
                        </div>
                    </div>

                    <div class="modal-footer d-flex justify-content-between margin-space">
                        <button type="submit" class="btn btn-success" id="submitEvent">Sauvegarder</button>
                        <button type="button" class="btn btn-secondaire margin-r" data-bs-dismiss="modal" aria-label="Close">Annuler</button>
                    </div>
                </form>
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
            // Ajouter le token CSRF dans toutes les requêtes AJAX
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var calendrierEvents = @json($calendrierEvents);
            $('#calendar').fullCalendar({
                locale: 'fr',
                header: {
                    left: 'createButton',
                    center: 'searchBar title',
                    right: 'agendaDay,agendaWeek,month prev,next'
                },
                customButtons: {
                    createButton: {
                        text: '+ Créer',
                        click: function() {
                            $('#createEventModal').modal('show');
                        }
                    },
                },
                defaultDate: new Date(),
                editable: true,
                events: calendrierEvents,

                // Fonction pour rendre chaque événement
                eventRender: function(event, element) {

                    console.log("Données de l'événement:", event);

                    // Ajouter une icône de suppression
                    element.find('.fc-title').html(event.title);
                    element.find('.fc-title').append('<span class="event-icon"><i class="fa-solid fa-trash"></i></span>');

                    // Associer l'événement de suppression
                    element.find(".event-icon").on('click', function() {
                        if (confirm("Voulez-vous vraiment supprimer cet événement ?")) {
                            $.ajax({
                                url: '{{ route("deletevaluation") }}',
                                data: {
                                    id: event.id
                                },
                                type: 'POST',
                                success: function(response) {
                                    alert('Événement supprimé avec succès !');
                                    $('#calendar').fullCalendar('removeEvents', event._id);
                                },
                                error: function() {
                                    alert('Erreur lors de la suppression de l\'événement.');
                                }
                            });
                        }
                    });

                    // Appliquer des couleurs selon le jour de la semaine
                    var dayOfWeek = event.start.day(); // 0 = dimanche, 1 = lundi, etc.
                    switch(dayOfWeek) {
                        case 0: // Dimanche
                            element.css('background-color', '#f39c12');
                            break;
                        case 1: // Lundi
                            element.css('background-color', '#3498db');
                            break;
                        case 2: // Mardi
                            element.css('background-color', '#2ecc71');
                            break;
                        case 3: // Mercredi
                            element.css('background-color', '#9b59b6');
                            break;
                        case 4: // Jeudi
                            element.css('background-color', '#e74c3c');
                            break;
                        case 5: // Vendredi
                            element.css('background-color', '#f1c40f');
                            break;
                        case 6: // Samedi
                            element.css('background-color', '#16a085');
                            break;
                    }
                },

                eventClick: function(event) {

                    // Convertir la durée de l'événement en heures et minutes
                    let durationParts = event.duree.split(':'); // Par exemple "02:30"
                    let eventDurationHours = parseInt(durationParts[0], 10); // Heures
                    let eventDurationMinutes = parseInt(durationParts[1], 10); // Minutes
                    $('#editEventForm').data('event-id', event.id); // Définit l'ID de l'événement

                    // Appliquer les valeurs aux sélections et champs dans le modal d'édition
                    $('#editInput1').val(event.matiere_id).trigger('change');
                    $('#editInput2').val(event.type_sujet_id).trigger('change');
                    $('#editInput3').val(event.filiere_id).trigger('change');
                    $('#editInput4').val(event.classe_id).trigger('change');
                    $('#editInput5').val(event.start.format('HH:mm'));
                    $('#editInput7').val(event.start.format('YYYY-MM-DD'));

                    // Définir la valeur de fin si elle existe
                    if (event.end) {
                        $('#editInput6').val(event.end.format('HH:mm'));
                    } else {
                        $('#editInput6').val('');
                    }

                    // Afficher le modal d'édition
                    setTimeout(function() {
                        $('#eventModal').modal('show');
                    }, 100);

                    // Écouteur de changement pour recalculer l'heure de fin lorsque l'heure de début change
                    $('#editInput5').on('change', function() {
                        let newStartTime = $(this).val(); // Par exemple, "15:00"

                        if (newStartTime) {
                            // Utiliser moment.js pour manipuler l'heure
                            let startMoment = moment(newStartTime, 'HH:mm');

                            // Ajouter la durée en heures et minutes pour obtenir l'heure de fin
                            let endMoment = startMoment.clone()
                                .add(eventDurationHours, 'hours')
                                .add(eventDurationMinutes, 'minutes');

                            // Mettre à jour le champ de fin avec la nouvelle heure calculée
                            $('#editInput6').val(endMoment.format('HH:mm'));
                        }
                    });
                },


                // Mise à jour de l'événement lors d'un déplacement
                eventDrop: function(event, delta, revertFunc) {
                    var start_time = event.start.format('HH:mm:ss');
                    var end_time = event.end ? event.end.format('HH:mm:ss') : null;
                    var event_date = event.start.format('YYYY-MM-DD');

                    $.ajax({
                        url: '{{ route("updatevaluation") }}',
                        data: {
                            id: event.id,
                            debut: start_time,
                            fin: end_time,
                            date: event_date
                        },
                        type: 'POST',
                        success: function(response) {
                            alert('Événement mis à jour avec succès !');
                        },
                        error: function() {
                            alert('Erreur lors de la mise à jour de l\'événement.');
                            revertFunc();
                        }
                    });
                }
            });

            $('#editEventForm').on('submit', function(e) {

                // Récupération des données du formulaire
                let debut = $('#editInput5').val();
                let fin = $('#editInput6').val();
                let date = $('#editInput7').val();
                let eventId = $('#editEventForm').data('event-id'); // Assurez-vous de définir cet ID lors de l'ouverture du modal

                // Vérification de l'ID de l'événement
                if (!eventId) {
                    alert('ID de l\'événement manquant');
                    return;
                }

                // Envoi de la requête AJAX
                $.ajax({
                    url: '{{ route("updatevaluation") }}',
                    type: 'POST',
                    data: {
                        id: eventId,
                        debut: debut,
                        fin: fin,
                        date: date
                    },
                    success: function(response) {
                        if (response.success) {
                            alert(response.success);
                            $('#calendar').fullCalendar('refetchEvents'); // Rafraîchit les événements dans le calendrier
                            $('#eventModal').modal('hide'); // Ferme le modal d'édition
                        } else if (response.error) {
                            alert(response.error);
                        }
                    },
                    error: function(xhr) {
                        alert('Erreur lors de la mise à jour de l\'événement.');
                    }
                });
            });


            // Ajouter une barre de recherche dans le calendrier
            $(".fc-center").prepend(`
                <div class="search-bar">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Rechercher...">
                </div>
            `);
        });
    </script>


</body>

</html>
