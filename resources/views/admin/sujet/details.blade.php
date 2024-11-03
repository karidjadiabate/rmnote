<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome for icons (if needed) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.0/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.25/jspdf.plugin.autotable.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
    <link rel="stylesheet" href="{{ asset('frontend/dashboard/css/dash.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/dashboard/html/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/dashboard/css/lists.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/dashboard/html/sujt.css') }}" />
    <link rel="icon" href="{{ asset('assets/img/FaviconROMNOTE.png') }}" type="image/png">

    <title>Sujets</title>
</head>
<style>
    .bleu {
    background-color: #4A41C5;
    height: 15px;
    margin-bottom: 15px;
}

.bleu-1 {
    color: #A2ADCF;
    display: flex;
    align-items: center;
    justify-content: space-between;
    font-size: 2rem;
    padding-left: 15px;
    padding-right: 15px;
}

.bleu-2 {
    color: #A2ADCF;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2rem;
    width: 72%;
}
.bg-1{
            background:#030D2D!important;
            color:#fff!important;
        }
        a.btn.btn-success {
                padding: 16px 12px !important;
        }
        .content {
            font-family: Arial, sans-serif;
            margin: 5rem auto;
            padding: 0;
            width: 21cm;
            height: 29.7cm; 
        }
        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
           /* border: 1px solid #cfd0e5; */ 
           /* padding: 0 2mm 5mm 2mm;*/
            margin-bottom: 10px;
            flex-wrap: wrap;
        }
        .logo {
            font-weight: bold;
            font-size: 18px;
        }
        .title {
            font-weight: bold;
            font-size: 16px;
            margin-bottom: 2mm;
            background-color: rgb(244, 244, 243);
            border-bottom-left-radius: 5mm;
            border-bottom-right-radius: 5mm;
            display: flex;
            justify-content: center;
            flex-direction: column;
        }
        .devoir {
            width: 95%;
            margin-bottom: 2mm;
            display: flex;
            justify-content: center;
            /* padding-left: 10px;
            padding-right: 10px; */
        }
        .devoir-text {
            font-weight: bold;
            margin-top: 0;
            padding: 2mm 35mm;
            margin-bottom: 1mm;
            font-size: 14px !important;
        }
        .devtitle {
            width: 100%;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .left-title {
            font-weight: 300;
            font-size: 14px !important;
        }
        .info {
            display: flex;
            flex-direction: column;
            text-align: left;
            font-size: 13px;
        }
        
        .points{
            float:right;
        }
        .info .info-text {
            font-weight: bold;
        }
        .main-title {
            text-align: center;
            margin-bottom: 10px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .exercise {
            margin-bottom: 45px;
            page-break-inside: avoid;
        }
        .exercise-title {
            font-weight: bold;
            margin-bottom: 5px;
        }
        .exercise-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-direction:column;
        }
        
        .exercise-image{
            text-align: center;
            width: 100%;
            margin: 10px;
        }
        
        .question {
            display: flex;
            justify-content: space-between;
            flex-direction:column;
            align-items: center;
            margin-bottom: 15px;
            font-weight: bold;
            margin-bottom: 20px;
            margin-top: 10px;
        }
        .question-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px; 
            width: 100%;
        }
        .question-text {
            flex: 1; 
            font-size: 1rem;
            color: #333;
        }
        .options {
            display: flex;
            justify-content: space-between;
            width: 100%;
           margin-bottom: 30px;
        }
        .options-group {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
            flex-grow: 1;
        }
        .option-content {
            display: flex;
            align-items: center;
        }
        .option-text {
            margin-right: 10px;
            font-size: 14px !important;
        }
        .circle {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 1px solid #000;
            color: #000;
            border-radius: 50%;
            text-align: center;
            line-height: 20px;
            margin-right: 5px;
        }
        .page-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .footer-sheet {
            margin-top: 20px;
            font-size: 12px;
            width:80%;
            padding-left: 10%;
        }
        .footer-logo {
            text-align: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-weight: bold;
        }
        .page-number {
            margin-top: 30px;
            text-align: center;
        }
        .random-subject{
            max-width: 21cm;
        }
        .qr-code{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            line-height: 1.5rem;
            width: 100px;
            height: 100px;
        }
        .page-footer {
            position: absolute;
            bottom: 0;
            left: .5cm;
            right: .5cm;
            height:100px;
        }
        .subject-wrapper {
            min-height: calc(29.7cm - 100px); 
            padding-bottom: 100px; 
        }
        .page{
            width: 21cm;
            height: 29.7cm; 
            position:relative;
            border: 1px solid #cfd0e5;
            margin-bottom: 70px;
            padding: 10px 20px;
            page-break-before: always;
            page-break-after: always;
        }
        .page-footer {
            height: 100px;
            background-color: white; 
        }
        .btn-second{
            background:#003cc8;
            width:150px;
            height:56px;
            color:#fff;
            border-radius:0px;
        }
        .btn-success1{
            background:#38b293;
            width:150px;
            height:56px;
            color:#fff;
            border-radius:0px;
        }
        .btn-second:hover{
            background:#003cc8;
            width:150px;
            height:56px;
            color:#fff;
            border-radius:0px;
        }
        .btn-success1:hover{
            background:#38b293;
            width:150px;
            height:56px;
            color:#fff;
            border-radius:0px;
        }
        .modal {
            display: none;
            position: fixed;
            z-index: 1040;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 0px;
            width: 400px; 
            max-width: 90%;
            text-align: center;
            padding-top:0px;
        }
        .btn-red{
            font-size: 16px!important;
            padding: 12px 20px!important;
        }
        .btn-success {
    background-color: #38B293;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 0px;
    text-decoration: none;
}
        @page {
        margin: 0;
        size: A4;
        }
  
@media print {         
    body { 
        position: relative; 
         margin: 0;
         padding: 0;
         height: 29.7cm;
         width: 21cm;
        } 
        .subject-wrapper { 
            height: calc(100% - 50px);
        }
        .footer-wrapper {
            position: absolute;
            bottom: 5mm;
            left: 0; 
            right: 0;
            height: 50px;
        }
        .page{
              page-break-after: always;
              padding: 0 5mm 0 5mm;
              margin: 0 auto;
              box-sizing: border-box;
              border: none;
        } 
        .top-space{
             padding-top:10mm;
        }
        .page-footer {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
        } 
        .qr-code {
            page-break-inside: avoid;
        } 
        .qr-code svg {
            width: 75px;
            height: 75px;
        }
        .page { 
           page-break-after: always;
        } 
   
}
.fa-moon{
        color:#4A41C5;
        }
        .fa-sun{
            color:#4A41C5;
            display:none;
        }
        .margin-l{
            margin-right: 100px;
            margin-top: -65px;    
        }
        .enfant h2{
        margin-top:20px!important;
    }
    .espace-theme{
        margin-right:0px!important;
        margin-top:-43px!important;
    }
    .fermetures {
    position: absolute;
    right: 3%;
    top: 30%;
    cursor: pointer;
}
.bleus {
    background-color: #4A41C5;
    height: 30px;
    margin-bottom: 15px;
}
#modalbtn {
    transition: opacity 0.3s ease; /* Animation de fondu */
}
.modal{
        background:rgb(18 18 18 / 70%);
        z-index: 99999;
    }
    .left-title1{
        width: 44.5%;
        text-align: end;
        }
    </style>
</head>
<body>


        <div class="heade">
        <div class="bleus"></div>
        <div class="bleu-1 d-flex justify-content-center">
            <div class="bleu-2">
                <!-- <i class="fa-solid fa-circle-chevron-left"></i> -->
                <div class="enfant d-flex justify-content-center">
                    <h2>Aperçu du sujet</h2>
                </div>

            </div>
            <div class="margin-l espace-theme">
                    <i class="fa-solid fa-moon"></i>
                    <i class="fa-solid fa-sun"></i>
            </div>
            <i class="fa-solid fa-circle-xmark fermetures" id="close-modal-btn" data-toggle="modal" data-target="#modalbtn"></i>
        </div>
        <!-- Progress bar -->
        <hr />

    </div>
    <div class="content">
    <div class="random-subject">
        <div class="subject-wrapper">
            <div class="subject-content">

                    <div class="header">
                        <div class="logo"><img src="{{ asset('images/pigier.png') }}" height="50" width="auto" alt=""></div>
                        <div class="title"> 
                            <div class="devoir"><span class="devoir-text">{{ $dataAtributes['typesujet'] }}</span></div>
                            <div class="devtitle">
                                <div class="devoir"><span class="left-title">Matière :</span> {{ $dataAtributes['matiere'] }}</div>
                                <div class="devoir"><span class="left-title left-title1">Filière :</span> {{ $dataAtributes['filiere'] }}</div>
                            </div>
                        </div>
                        <div class="info">
                            <div>Classe :<span class="info-text"> {{ $dataAtributes['classe'] }}</span></div>
                            <div>Durée : <span class="info-text"> {{ $dataAtributes['heure'] }}</span></div>
                            <div>Coefficient : <span class="info-text">1</span></div>
                            <div>ECT : <span class="info-text">1</span></div>
                        </div>
                    </div>

                    <div class="main-title">
                    {{ ($dataAtributes['consigne']) }}  <span class="points">{{ $dataAtributes['noteprincipale'] }} pts</span>
                    </div>

                    <div class="exercises">
                        @foreach($dataAtributes['sections'] as $section)
                            <div class="exercise">
                                <div class="exercise-title">EXERCICE {{ $loop->iteration }} : {{ $section->titre }} <span class="points">{{$section->total_points}} pts</span></div>
                                <div class="exercise-content">
                                    @if($section->soustitre)
                                        <div class="exercise-description">{{ $section->soustitre }}</div>
                                    @endif
                                    @if($section->image_section)
                                        <div class="exercise-image">
                                            <img src="{{ asset( $section->image_section) }}" height="100" width="auto" alt="Image de l'exercice" class="img-sheet"/>
                                        </div>
                                    @endif
                                </div>
                                @foreach($section->questions as $question)
                                    <div class="question">
                                        <div class="question-content">
                                            @if($question->libquestion)
                                                <span class="question-text">{{ $loop->iteration }} - {{ $question->libquestion }}</span>
                                            @endif
                                            <span class="points"> ({{ $question->reponses->filter(function($reponse) {
                                                                        return $reponse->result === 'bonne_reponse';
                                                                    })->sum('points') }} pts)</span>
                                        </div>
                                         @if($question->image_question)
                                            <div class="exercise-image">
                                                <img src="{{ asset( $question->image_question) }}" height="100" width="auto" alt="Image de l'exercice" class="img-sheet"/>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="options">
                                        <div class="options-group">
                                            @foreach($question->reponses as $response)
                                                <div class="option-content">
                                                    <span class="option-text"><span class="circle">{{ chr(65 + $loop->index) }}</span> {{ $response->libreponse }}</span>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        @endforeach

                <!-- Après l'affichage du sujet principal -->
                        <div class="footer-wrapper">
                            <div class="page-footer">
                                    <div class="footer-sheet">
                                        <div class="footer-logo">
                                            Pigier Côte d'Ivoire l'Université des Métiers
                                        </div>
                                        <div class="page-number">
                                            Page <span class="current-page">1</span> sur <span class="totalpage">1</span>
                                        </div>
                                    </div>
                                    <div class="qr-code">
                                        {!! $dataAtributes['qrCode'] !!}
                                    {{ $dataAtributes['reference'] }}
                                    </div>
                                </div> 
                        </div>
                    </div>
                </div>
             </div>
        </div>
        <div class="d-flex justify-content-end col-md-12">
            <div class="d-flex gap-2 mb-5">
                <button class="btn btn-success1">Voir les réponses</button>
                <button class="btn btn-second">Modifier</button>
            </div>
        </div>

    </div>
    <!-- Modal -->

    <div id="modalbtn" class="modal">
        <div class="modal-content">
            <button type="button" class="custom-close-btn" data-bs-dismiss="modal" aria-label="Close" id="fermetures1">
                <i class="fa-solid fa-xmark"></i>
            </button>
            <h3>Quitter la page</h3>
            <p>Voulez-vous vraiment quitter la page ??</p>
            <div id="cool">
                <!-- Correction ici : 'href' au lieu de 'herf' -->
                <a href="/admin/sujet" class="btn btn-success">Oui</a>
                <input type="reset" value="Non" class="btn-secondaire sizes" id="btn-red">
            </div>
        </div>
    </div>
</body>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
     <script>
// Dimensions de la page A4
const A4_HEIGHT_MM = 297;
const A4_WIDTH_MM = 210;
const CONTENT_MARGIN_MM = 20;
const AVAILABLE_HEIGHT_MM = A4_HEIGHT_MM - (2 * CONTENT_MARGIN_MM);
const MM_TO_PX_RATIO = 3.779527559;  

function mmToPx(mm) {
    return mm * MM_TO_PX_RATIO;
}

function handleOverflow() {
    const availableHeightPx = mmToPx(AVAILABLE_HEIGHT_MM);
    const subject = document.querySelector('.random-subject');

    // Cloner le sujet original
    const originalSubject = subject.cloneNode(true);
    const header = originalSubject.querySelector('.header');
    const mainTitle = originalSubject.querySelector('.main-title');
    const footer = originalSubject.querySelector('.footer-wrapper');
    console.log(footer);
    const exercises = Array.from(originalSubject.querySelectorAll('.exercise'));

    // Vider le sujet original
    while (subject.firstChild) {
        subject.removeChild(subject.firstChild);
    }

    // Création de la première page
    let currentPage = createNewPage(subject, header, mainTitle, footer, 1);
    let currentPageHeight = header.offsetHeight + mainTitle.offsetHeight;

    exercises.forEach((exercise, exerciseIndex) => {
        const exerciseHeight = getElementHeight(exercise);

        if (currentPageHeight + exerciseHeight > availableHeightPx) {
            // Créer une nouvelle page si l'exercice dépasse la hauteur disponible
            const pageNumber = subject.querySelectorAll('.page').length + 1;
            currentPage = createNewPage(subject, null, null, footer, pageNumber);
            currentPageHeight = 0;
        }

        // Ajouter l'exercice à la page courante
        currentPage.querySelector('.subject-content').appendChild(exercise);
        currentPageHeight += exerciseHeight;
    });

    updatePagination(subject);
}

function createNewPage(subject, header, mainTitle, footer, pageNumber) {
    const page = document.createElement('div');
    page.className = 'page';

    const subjectWrapper = document.createElement('div');
    subjectWrapper.className = 'subject-wrapper';

    const subjectContent = document.createElement('div');
    subjectContent.className = 'subject-content';
    subjectContent.classList.add("top-space");

    if (pageNumber === 1 && header) {
        subjectContent.appendChild(header.cloneNode(true));
        subjectContent.classList.remove("top-space");
    }
    if (pageNumber === 1 && mainTitle) {
        subjectContent.appendChild(mainTitle.cloneNode(true));
        subjectContent.classList.remove("top-space");
    }

    subjectWrapper.appendChild(subjectContent);
    page.appendChild(subjectWrapper);

    const footerWrapper = footer.cloneNode(true);
    const pageNumberElement = footerWrapper.querySelector('.current-page');
    if (pageNumberElement) {
        pageNumberElement.textContent = pageNumber;
    }
    page.appendChild(footerWrapper);

    subject.appendChild(page);
    return page;
}

function getElementHeight(element) {
    const clone = element.cloneNode(true);
    clone.style.visibility = 'hidden';
    document.body.appendChild(clone);
    const height = clone.offsetHeight;
    document.body.removeChild(clone);
    return height;
}

function updatePagination(subject) {
    const totalPages = subject.querySelectorAll('.page').length;
    subject.querySelectorAll('.totalpage').forEach(element => {
        element.textContent = totalPages;
    });
}

function initializePageLayout() {
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', handleOverflow);
    } else {
        handleOverflow();
    }
}

initializePageLayout();

 </script>
 <script>
    // modal de retour 
    const closeModalBtn = document.getElementById("close-modal-btn");
const modal = document.getElementById("modalbtn");
const fermerBtn = document.getElementById("fermetures1");
const nonBtn = document.getElementById("btn-red");

function openModal() {
    modal.style.display = "flex";
    setTimeout(() => {
        modal.style.opacity = "1"; // Transition d’apparition
    }, 10); // Léger délai pour permettre l'animation
}

function closeModal() {
    modal.style.opacity = "0"; // Transition de disparition
    setTimeout(() => {
        modal.style.display = "none";
    }, 300); // Correspond à la durée de la transition
}

closeModalBtn.addEventListener("click", openModal);
fermerBtn.addEventListener("click", closeModal);
nonBtn.addEventListener("click", closeModal);

window.addEventListener("click", (event) => {
    if (event.target === modal) {
        closeModal();
    }
});

 </script>
  <script>
document.addEventListener('DOMContentLoaded', () => {
    // Sélectionner les icônes
    const sunIcon = document.querySelector('.fa-sun');
    const moonIcon = document.querySelector('.fa-moon');
    const navigation = document.querySelectorAll('.navbar.navbar-expand-lg');
    const navigationControl = document.querySelectorAll('.form-control.search-input');
    const navigationControler = document.querySelectorAll('.input-group-text');
    const information = document.querySelectorAll('h1.welcome');
    const information01 = document.querySelectorAll('.container.text-center.mt-4');
    const information02 = document.querySelectorAll('.container.text-center.printableArea.principal');
    const information03 = document.querySelectorAll('.card');
    const information04 = document.querySelectorAll('.d-flex.flex-column.p-3.mb-4.perfo');
    const information05 = document.querySelectorAll('.col-md-12.position-relative.perfo.p-2.mb-2');
    const information06 = document.querySelectorAll('#myChart');
    const information07 = document.querySelectorAll('.col-12.col-md-12.tablest.d-flex.justify-content-center.flex-column');
    const information08 = document.querySelectorAll('.container.printableArea.principal');
    const information09 = document.querySelectorAll('.pagination-info');
    const information10 = document.querySelectorAll('#nbr');
    const information11 = document.querySelectorAll('.table-responsive');
    const information12 = document.querySelectorAll('#teacherTable');
    const information13 = document.querySelectorAll('.mt-auto');
    const information14 = document.querySelectorAll('.containers.principal');
    const information15 = document.querySelectorAll('body');
    const information16 = document.querySelectorAll('.fc');
    const information17 = document.querySelectorAll('#calendar');
    const information19 = document.querySelectorAll('.text-start.text-title');
    const information18 = document.querySelectorAll('#searchInput');
    const information20 = document.querySelectorAll('.containers.principal > h2');
    const information21 = document.querySelectorAll('#apparence_accessibilite');
    const information22 = document.querySelectorAll('.titre');
    const information23 = document.querySelectorAll('.stack');
    const information24 = document.querySelectorAll('.stacks > label');
    const information25 = document.querySelectorAll('input[type="checkbox"]');
    const information26 = document.querySelectorAll('input[type="text"]');
    const information27 = document.querySelectorAll('textarea');
    const information28 = document.querySelectorAll('#svg');
    const information29 = document.querySelectorAll('.profile-and-form');
    const information30 = document.querySelectorAll('.account-container');
    const information31 = document.querySelectorAll('input[type="password"]');
    const information32 = document.querySelectorAll('input[type="email"]');
    const information33 = document.querySelectorAll('select');
    const information34 = document.querySelectorAll('.account-title');
    const information35 = document.querySelectorAll('.form-group > label');
    const information36 = document.querySelectorAll('.account-form > h2');
    const information37 = document.querySelectorAll('th');
    const information38 = document.querySelectorAll('td');
    const information39 = document.querySelectorAll('.btn.btn-custom.btn-exporter.dropdown-toggle');
    const information40 = document.querySelectorAll('.btn-ajouter');
    const information41 = document.querySelectorAll('.btn-importer');
    const information42 = document.querySelectorAll('.btn-imprimer');
    const information43 = document.querySelectorAll('.fc td, .fc th');
    const information44 = document.querySelectorAll('td');
    const information45 = document.querySelectorAll('.fc-unthemed .fc-ltr');
    const information46 = document.querySelectorAll('.heade');
    const information47 = document.querySelectorAll('.enfant h2');
    const information48 = document.querySelectorAll('.form label');
    const information49 = document.querySelectorAll('.form input');
    const information50 = document.querySelectorAll('input[type="number"]');
    const information51 = document.querySelectorAll('.sectio-container');
    
    const information52 = document.querySelectorAll('.sa');
    const information53 = document.querySelectorAll('.file-input');
    const information54 = document.querySelectorAll('input[type="file"]');
    const information55 = document.querySelectorAll('.input-group');
    const information56 = document.querySelectorAll('.sectio-container');
    const information57 = document.querySelectorAll('.question-separator');
    const fermetureIcon = document.querySelector('.fa-circle-xmark');
    const information60 = document.querySelectorAll('#modalbtn > .modal-content');
    const information61 = document.querySelectorAll('.custom-close-btn');
    const information62 = document.querySelectorAll('#modalbtn > .modal-content > h3');
    const information63 = document.querySelectorAll('#modalbtn > .modal-content > p');
    const information64 = document.querySelectorAll('.page');




    // Vérifier l'état enregistré dans localStorage
    const isDarkMode = localStorage.getItem('isDarkMode') === 'true';

    // Fonction pour appliquer les styles en fonction du mode
    const applyStyles = (darkMode) => {
        if (darkMode) {
            sunIcon.style.display = 'none'; 
            moonIcon.style.display = 'flex'; 
            sunIcon.style.color = '#fff'; 
            moonIcon.style.color = ''; 
            fermetureIcon.classList.remove('fermons'); 
 
            navigation.forEach(nav => nav.style.background = ""); 
            navigationControl.forEach(control => control.style.background = ""); 
            navigationControler.forEach(control => control.style.background = ""); 
            information.forEach(info => info.style.color = ""); 
            information01.forEach(info => {
                info.style.background = ""; 
                info.classList.add('mt-4');
            });
            information02.forEach(info => info.style.background = ""); 
            information03.forEach(card => card.style.background = ""); 
            information04.forEach(container => container.style.background = ""); 
            information05.forEach(container => container.style.background = ""); 
            information06.forEach(container => container.style.background = ""); 
            information07.forEach(container => container.style.background = ""); 
            information08.forEach(container => container.style.background = ""); 
            information09.forEach(container => container.style.color = ""); 
            information10.forEach(container => container.style.color = ""); 
            information11.forEach(container => container.style.background = ""); 
            information12.forEach(container => container.style.background = ""); 
            information12.forEach(container => container.style.color = "");
            // information13.forEach(container => container.classList.add('mt-auto')); 
            information14.forEach(container =>{
                container.style.background = "";
                container.style.color = "";

            });
            information15.forEach(container => {
                container.style.background = "";
                container.style.color = "";
            });
            information16.forEach(container => container.style.background = "");
            // information17.forEach(container => container.style.background = "");
            information18.forEach(container => {
                container.style.background = "";
                container.style.color = "";
                container.classList.remove('custom-placeholder');

            });
            information19.forEach(container => {
                container.style.color = "";

            });
            information20.forEach(container => container.style.color = "");
            information21.forEach(container => container.style.color = "");
            information22.forEach(container => container.style.color = "");
            information23.forEach(container => container.style.color = "");
            information24.forEach(container => container.style.color = "");
            information25.forEach(container => container.style.borderColor = "");
            information26.forEach(container => {
                container.style.background = "";
                container.style.color = "";
                container.classList.remove('custom-placeholder');
                container.classList.remove('custom-placeholders');

            });
            information27.forEach(container => {
                container.style.background = "";
                container.style.color = "";
                container.classList.remove('custom-placeholder');

            });
            information29.forEach(container => {
                container.style.background = "";
                container.style.color="";
            });
            information30.forEach(container => {
                container.style.background = "";
                container.style.color="";
            });
            information31.forEach(container => {
                container.style.background = "";
                container.style.color="";
                container.classList.remove('custom-placeholder');

            });
            information32.forEach(container => {
                container.style.background = "";
                container.style.color="";
            });
            information33.forEach(container => {
                container.style.background = "";
                container.style.color="";
            });
            information34.forEach(container => container.style.color = "");
            information35.forEach(container => container.style.color = "");
            information36.forEach(container => container.style.color = "");
            information37.forEach(container => {
                container.style.color = "";
                container.style.background = "";

            });
            information38.forEach(container => {
                container.style.color = "";
                container.style.background = "";

            });
            information39.forEach(container => container.style.background = ""); 
            information39.forEach(container => {
                container.classList.remove('hover-class');
            });
            information40.forEach(container => container.style.background = ""); 
            information41.forEach(container => container.style.background = ""); 
            information42.forEach(container => container.style.background = ""); 
            information39.forEach(container => {
    // Supprimez la classe qui gère le hover
    container.classList.remove('hover-class');
});
information43.forEach(container => container.style.background = ""); 
information44.forEach(container => container.style.background = ""); 
information45.forEach(container => container.style.background = ""); 
information46.forEach(container => container.style.background = ""); 
information47.forEach(container => container.style.color = ""); 
information48.forEach(container => container.style.color = "");
information49.forEach(container => {
                container.style.background = "";
                container.style.color = "";
                container.classList.remove('custom-placeholder');

            }); 
            information50.forEach(container => {
                container.style.color = "";
                container.classList.remove('custom-placeholder');
                container.setAttribute('style','background:;');


            });
            information51.forEach(container => {
                container.style.background = "";
                container.style.color = "";
                container.classList.remove('custom-placeholder');

            });
            information52.forEach(container => {
                container.setAttribute('style','background:;');
                container.style.color = "";
                container.classList.remove('custom-placeholders');

            });
            information53.forEach(container => container.style.display = "");

            // information19.forEach(container => container.style.background = "");
            information54.forEach(container => container.setAttribute('style','display:none!important;')); 
            information55.forEach(container => container.setAttribute('style','background:;')); 
            information56.forEach(container => container.setAttribute('style','background:;')); 
            information57.forEach(container => container.setAttribute('style','background:;')); 
            information60.forEach(container => {
                container.classList.remove('bg-1'); 
            }); 
            information61.forEach(container => {
                container.classList.remove('bg-1'); 
            }); 
            information62.forEach(container => {
                container.classList.remove('bg-1'); 
            }); 
            information63.forEach(container => {
                container.classList.remove('bg-1'); 
            });
            information64.forEach(container => {
                container.style.background = "";
                container.style.color = "";
                container.style.marginBottom = "";


            }); 
 

            } else {
            sunIcon.style.display = 'flex'; 
            moonIcon.style.display = 'none';  
            sunIcon.style.color = '#fff'; 
            moonIcon.style.color = ''; 
            fermetureIcon.classList.add('fermons'); 

            navigation.forEach(nav => nav.style.background = "#030D2D");
            navigationControl.forEach(control => control.style.background = "#030D2D"); 
            navigationControler.forEach(control => control.style.background = "#030D2D"); 
            information.forEach(info => info.style.color = "#fff"); 
            information01.forEach(info => {
                info.style.background = "#020917"; 
                info.classList.remove('mt-4');
            });
            information02.forEach(info => info.style.background = "#020917"); 
            information03.forEach(card => card.style.background = "#030D2D"); 
            information04.forEach(container => container.style.background = "#030D2D"); 
            information05.forEach(container => container.style.background = "#030D2D"); 
            information06.forEach(container => container.style.background = "#030D2D"); 
            information07.forEach(container => container.style.background = "#030D2D"); 
            information08.forEach(container => container.style.background = "#020917"); 
            information09.forEach(container => container.style.color = "#fff"); 
            information10.forEach(container => container.style.color = "#fff"); 
            information11.forEach(container => container.style.background = "#020917"); 
            information12.forEach(container => container.style.background = "#030D2D"); 
            information12.forEach(container => container.style.color = "#fff"); 
            // information13.forEach(container => container.classList.remove('mt-auto'));
            information14.forEach(container =>{
                container.style.background = "#020917";
                container.style.color = "#fff";
            }); 
            information15.forEach(container =>{
                container.style.background = "#020917";
                container.style.color = "#fff";
            });
            information16.forEach(container => container.style.background = "#030D2D");
            // information17.forEach(container => container.style.background = "#030D2D");
            information18.forEach(container => {
                container.style.background = "#030D2D";
                container.style.color = "#fff";
                container.classList.add('custom-placeholder');

            });
            information19.forEach(container => {
                container.style.color = "#fff";

            });
            information20.forEach(container => container.style.color = "#fff");
            information21.forEach(container => container.style.color = "#fff");
            information22.forEach(container => container.style.color = "#fff");
            information23.forEach(container => container.style.color = "#fff");
            information24.forEach(container => container.style.color = "#fff");
            information25.forEach(container => container.style.borderColor = "#fff");
            information26.forEach(container => {
                container.style.background = "#030D2D";
                container.style.color = "#fff";
                container.classList.add('custom-placeholder');
                container.classList.add('custom-placeholders');

            });
            information27.forEach(container => {
                container.style.background = "#030D2D";
                container.style.color = "#fff";
                container.classList.add('custom-placeholder');

            });
            information29.forEach(container => {
                container.style.background = "#020917";
                container.style.color="#fff";
            }); 
            information30.forEach(container => {
                container.style.background = "#020917";
                container.style.color="#fff";
            }); 
            information31.forEach(container => {
                container.style.background = "#030D2D";
                container.style.color="#fff";
                container.classList.add('custom-placeholder');

            }); 
            information32.forEach(container => {
                container.style.background = "#030D2D";
                container.style.color="#fff";
            }); 
            information33.forEach(container => {
                container.style.background = "#030D2D";
                container.style.color="#fff";
            }); 
            information34.forEach(container => container.style.color = "#fff"); 
            information35.forEach(container => container.style.color = "#fff");
            information36.forEach(container => container.style.color = "#fff");
            information37.forEach(container => {
                container.style.color = "#fff";
                container.style.background = "#030D2D";

            });
            information38.forEach(container => {
                container.style.color = "#fff";
                container.style.background = "#030D2D";

            });
            information39.forEach(container => container.setAttribute('style','background:#0C3B0C!important;'));
            information39.forEach(container => {
    container.classList.remove('hover-class');
});
            information40.forEach(container => container.style.background = "#0C3B0C"); 
            information41.forEach(container => container.style.background = "#0C3B0C"); 
            information42.forEach(container => container.style.background = "#0C3B0C"); 

            information43.forEach(container => container.setAttribute('style','background:#030D2D!important;color:#fff!important;')); 
            information44.forEach(container => container.setAttribute('style','background:#030D2D!important;color:#fff!important;')); 
            information45.forEach(container => container.setAttribute('style','background:#030D2D!important;color:#fff!important;')); 
            information46.forEach(container => container.setAttribute('style','background:#020917!important;color:#fff!important;')); 
            information47.forEach(container => container.setAttribute('style','color:#fff!important;')); 
            information48.forEach(container => container.setAttribute('style','color:#fff!important;')); 
            information49.forEach(container => {
                container.setAttribute('style','background:#030D2D!important;');
                container.setAttribute('style','color:#fff!important;');
                container.classList.add('custom-placeholder');

            });
            information50.forEach(container => {
                container.setAttribute('style','color:#4A41C5!important;');
                container.setAttribute('style','background:#030D2D!important;');
                container.classList.add('custom-placeholder');

            });
            information51.forEach(container => {
                container.setAttribute('style','background:#020917!important;');
                container.setAttribute('style','color:#fff!important;');
                container.classList.add('custom-placeholder');

            });
            information52.forEach(container => {
                container.setAttribute('style','background:#030D2D!important;');
                container.setAttribute('style','color:#fff!important;');
                container.classList.add('custom-placeholders');

            });
            
            // information19.forEach(container => container.setAttribute('style','background:#030D2D!important;'))
            information53.forEach(container => container.setAttribute('style','display:none!important;')); 
            information54.forEach(container => container.setAttribute('style','display:none!important;')); 
            information55.forEach(container => container.setAttribute('style','background:#030D2D!important;')); 
            information56.forEach(container => container.setAttribute('style','background:#030D2D!important;')); 
            information57.forEach(container => container.setAttribute('style','background:#020917!important;')); 

            information60.forEach(container => {
                container.classList.add('bg-1'); 
            }); 
            information61.forEach(container => {
                container.classList.add('bg-1'); 
            }); 
            information62.forEach(container => {
                container.classList.add('bg-1'); 
            }); 
            information63.forEach(container => {
                container.classList.add('bg-1'); 
            }); 
            information64.forEach(container => {
                container.style.background = "#fff";
                container.style.color = "#000";
                container.style.marginBottom = "10px";
            }); 

        }
    };

    // Appliquer les styles en fonction de l'état enregistré
    applyStyles(isDarkMode);

    // Fonction pour gérer le clic sur l'icône de lune
    moonIcon.addEventListener('click', () => {
        applyStyles(false); // Revenir au mode clair
        localStorage.setItem('isDarkMode', 'false'); // Enregistrer l'état clair
    });

    // Fonction pour gérer le clic sur l'icône de soleil
    sunIcon.addEventListener('click', () => {
        applyStyles(true); // Appliquer le mode sombre
        localStorage.setItem('isDarkMode', 'true'); // Enregistrer l'état sombre
    });
    document.addEventListener('click', function(event) {
        if (event.target.classList.contains('add-response')) {
            // Gérer le clic sur le bouton d'ajout de réponse
            applyStyles(isDarkMode); // Appliquer les styles du mode actuel
        }
    });

    document.addEventListener('click', function(event) {
        if (event.target.classList.contains('Ajouter-question')) {
            // Gérer le clic sur le bouton d'ajout de réponse
            applyStyles(isDarkMode); // Appliquer les styles du mode actuel
        }
    });
    document.addEventListener('click', function(event) {
        if (event.target.classList.contains('Ajouter-section')) {
            // Gérer le clic sur le bouton d'ajout de réponse
            applyStyles(isDarkMode); // Appliquer les styles du mode actuel
        }
    });
});
</script>
</body>

</html>
