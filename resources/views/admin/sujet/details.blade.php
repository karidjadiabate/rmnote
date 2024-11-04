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
    <title>Sujets</title>
</head>
<style>
    .content {
        font-family: Arial, sans-serif;
        margin: 10rem auto;
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
        font-size: 14px;
        margin-bottom: 2mm;
        background-color: rgb(244, 244, 243);
        border-bottom-left-radius: 5mm;
        border-bottom-right-radius: 5mm;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        width: 80%;
        max-width: 460px;
        margin: 0 auto;
        padding: 10px;
    }

    .devoir {
        width: 100%;
        margin-bottom: 2mm;
        display: flex;
        justify-content: center;
    }

    .devoir-text {
        font-weight: bold;
        margin-top: 0;
        padding: 2mm 35mm;
        margin-bottom: 1mm;
        font-size: 14px !important;
        text-transform: uppercase;
    }

    .devtitle {
        width: 50%;
        margin: 0 auto;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .left-title {
        font-weight: 300;
        font-size: 14px !important;
        margin-right: 5px;
        /* pour espacer le texte du titre de la valeur */
        padding-top: 1px;

    }

    .info {
        display: flex;
        flex-direction: column;
        text-align: left;
        font-size: 13px;
    }

    .points {
        float: right;
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
        flex-direction: column;
    }

    .exercise-image {
        text-align: center;
        width: 100%;
        margin: 10px;
    }

    .question {
        display: flex;
        justify-content: space-between;
        flex-direction: column;
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
        width: 80%;
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

    .random-subject {
        max-width: 21cm;
    }

    .qr-code {
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
        height: 100px;
    }

    .subject-wrapper {
        min-height: calc(29.7cm - 100px);
        padding-bottom: 100px;
    }

    .page {
        width: 21cm;
        height: 29.7cm;
        position: relative;
        border: 1px solid #cfd0e5;
        margin-bottom: 20px;
        padding: 10px 20px;
        page-break-before: always;
        page-break-after: always;
    }

    .page-footer {
        height: 100px;
        background-color: white;
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

        .page {
            page-break-after: always;
            padding: 0 5mm 0 5mm;
            margin: 0 auto;
            box-sizing: border-box;
            border: none;
        }

        .top-space {
            padding-top: 10mm;
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
</style>
</head>

<body>
    <!-- header -->
    @include('admin.include.menu')
    <div class="content">
        <div class="random-subject">
            <div class="subject-wrapper">
                <div class="subject-content">

                    {{-- Formatage de la durée --}}
                    @php
                        $duree = $dataAtributes['heure'];
                        [$heure, $minutes] = explode(':', $duree);
                    @endphp
                    <div class="header">
                        <div class="logo"><img
                                src="{{ asset('storage/logo/' . auth()->user()->etablissement->logo) }}" height="50"
                                width="150" alt=""></div>
                        <div class="title">
                            <div class="devoir"><span class="devoir-text">{{ $dataAtributes['typesujet'] }}</span></div>
                            <div class="devtitle">
                                <div class="devoir"><span class="left-title">Matière :</span>
                                    {{ strtoupper($dataAtributes['matiere']) }}</div>
                                <div class="devoir"><span class="left-title">Filière :</span>
                                    {{ strtoupper($dataAtributes['filiere']) }}</div>

                            </div>
                        </div>
                        <div class="info">
                            <div>Classe :<span class="info-text"> {{ $dataAtributes['classe'] }}</span></div>
                            <div>
                                Durée :
                                <span class="info-text">
                                    @if ($heure > 0)
                                        {{ $heure }} h {{ $minutes }} min
                                    @elseif ($minutes > 0)
                                        {{ $minutes }} min
                                    @else
                                        0min
                                    @endif
                                </span>
                            </div>
                            <div>Coefficient : <span class="info-text">{{ $coefficient }}</span></div>
                            <div>ECT : <span class="info-text">{{ $ects }}</span></div>
                        </div>
                    </div>

                    <div class="main-title">
                        {{ $dataAtributes['consigne'] }} <span class="points">{{ $dataAtributes['noteprincipale'] }}
                            pts</span>
                    </div>

                    <div class="exercises">
                        @foreach ($dataAtributes['sections'] as $section)
                            <div class="exercise">
                                <div class="exercise-title">EXERCICE {{ $loop->iteration }} : {{ $section->titre }}
                                    <span class="points">{{ $section->total_points }} pts</span></div>
                                <div class="exercise-content">
                                    @if ($section->soustitre)
                                        <div class="exercise-description">{{ $section->soustitre }}</div>
                                    @endif
                                    @if ($section->image_section)
                                        <div class="exercise-image">
                                            <img src="{{ asset($section->image_section) }}" height="100"
                                                width="auto" alt="Image de l'exercice" class="img-sheet" />
                                        </div>
                                    @endif
                                </div>
                                @foreach ($section->questions as $question)
                                    <div class="question">
                                        <div class="question-content">
                                            @if ($question->libquestion)
                                                <span class="question-text">{{ $loop->iteration }} -
                                                    {{ $question->libquestion }}</span>
                                            @endif
                                            <span class="points">
                                                ({{ $question->reponses->filter(function ($reponse) {
                                                        return $reponse->result === 'bonne_reponse';
                                                    })->sum('points') }}
                                                pts)</span>
                                        </div>
                                        @if ($question->image_question)
                                            <div class="exercise-image">
                                                <img src="{{ asset($question->image_question) }}" height="100"
                                                    width="auto" alt="Image de l'exercice" class="img-sheet" />
                                            </div>
                                        @endif
                                    </div>

                                    <div class="options">
                                        <div class="options-group">
                                            @foreach ($question->reponses as $response)
                                                <div class="option-content">
                                                    <span class="option-text"><span
                                                            class="circle">{{ chr(65 + $loop->index) }}</span>
                                                        {{ $response->libreponse }}</span>
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
</body>

</html>
