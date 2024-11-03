<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du Sujet</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0 auto;
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
            width: 100%;
            margin-bottom: 2mm;
            display: flex;
            justify-content: start;
        }
        .devoir-text {
            font-weight: bold;
            margin-top: 0;
            padding: 2mm 35mm;
            margin-bottom: 1mm;
            font-size: 14px !important;
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
        }
        .info {
            display: flex;
            flex-direction: column;
            text-align: left;
            font-size: 13px;
        }
        
        .points:not(.points.instruction, .points.qt){
            font-weight:normal;
        }
            
        .points{
            float:right;
        }
        .points.instruction{
            font-weight:bold;
           border: 1px solid #8993A04D;
           padding:5px;
        }            
        .info .info-text {
            font-weight: bold;
        }
        .main-title {
            text-align: center;
            margin-bottom: 20px;
            margin-top: 20px;
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
            align-items: start;
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
                padding: 10mm;
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
            .container{
                  margin: 0 auto;
            }     padding: 0;
        }


        .border-success{
            border: 1px solid #38b292  !important;
            outline: 0.5px solid #38b292;
        }
        h5{
            font-size: 2.35mm;
            text-align: center;
        }
        .page-a4 {  
            width: 210mm;
            height: 297mm;
            background: rgb(255, 255, 255);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 3mm;
            box-sizing: border-box;
            padding-top: 15mm;
            margin-bottom: 20mm;
            
        } 
        .name-title{
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #eefaf6;
            height: 5mm;
        }
        .name-arrow{
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        }
        .header-a4{
            height: 6mm;
            width: 187mm;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            text-align: center;
            margin-bottom: 1mm;
        }
        .header-text{
            font-size: 4mm;
            font-weight: 400;
            color: #38b292;
        }

        .head {
            width: 100%;
            max-width: 180mm;
            margin-top: 24mm;
            display: flex;
            justify-content: center;
            position: relative;
        }
        .logo{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        .logo .dev{
            background-color: rgb(237, 237, 237);
            text-align: center;
            padding: 0 87.5mm;
        }
        
        .img-logo{
            display: flex;
            align-items: center;
            flex-direction: column;
        }
        
        .header-content {
            margin-right: 3mm;
            margin-left: 3mm;
            display: flex;
            align-items: center;
            justify-content: space-around;
        }
        .content-striped{
            margin-top: 34mm;
            margin-bottom: 0mm;
            display: flex;
            flex-direction: column;
            height: 278mm;
            width: 100%;
            max-width: 5mm;
            overflow: hidden;
        }
        .bg-striped1 {
            width: 100%;
            max-width: 5mm;
            margin-top: 2.5mm;
        }

        .bg-striped2 {
            width: 100%;
            max-width: 5mm;
            margin-bottom:1mm;
            margin-top: 2mm;
        }

        .tble-dark{
            width: 6mm;
        }
        .tr-dark1 {
            background-color: #000; 
            height: 3.1mm;
            margin-top: 1mm;
        }
        .tr-light1 {
            background-color: #fff;
            color: #000; 
            height: 1.29mm;
        }
        .tr-dark2 {
            background-color: #000; 
            height: 3.1mm;
        }
        .tr-light2 {
            background-color: #fff;
            color: #000; 
            height: 1.65mm;
        }

        .dark-bar{
            width: 5mm;
            height: 3mm;
            background-color: rgb(0, 0, 0);
        }
        .page-content{
            width: 100%;
            max-width: 205mm;
            /*margin-top: -15mm;*/
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .sqare-date{
            padding: 2mm 15mm;
            border: 1px solid #38b292;
            box-shadow: 0 0 0 0.5px #38b292;
            margin-left: 2mm ;
        }

        .sqare-matiere{
            padding: 0 30mm;
            border: 1px solid #38b292;
            box-shadow: 0 0 0 0.5px #38b292;
            margin-left: 2mm ;
        }

        .sheet-section{
            width: 100%;
            max-width: 200mm;
            margin-left: 2mm;
            margin-right: 2mm;
        }
        .sheet-info{
            display: flex;
            align-items: center;
            justify-content: space-around;
            box-sizing: border-box;
        }
        .number-section{
            width: 100%;
            max-width: 95mm;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }
        .instruction-content{
            display: flex;
            justify-content: space-between;
        }
        .instruction-section{
            border: 1px solid #38b292;
            box-shadow: 0 0 0 0.5px #38b292;
            margin-top:2mm;
            max-width: 55mm;

        }   
        .qr-div {
            max-width: 250px;
            padding: 5% 10%;
            box-sizing: border-box;
            width: auto;
        }

        .qr-div svg{
            width: 75px;
            height: 75px;
        }
        
        .qr-content{
            border: 1px solid #38b292;
            box-shadow: 0 0 0 0.5px #38b292;
            margin-top:2mm;
            max-width: 33mm; 
            text-align: center;
        }
        .question-section{
            display: flex;
            justify-content: space-around;
            padding-top: 3mm;
        }
        .number-candidate{
            width: 100%;
            max-width: 118mm; 
        }
        .studentname td{
            padding: 2.9mm;
        }
        .numbercase td{
            padding: 2mm 1.5mm; 
        }
        .studentname tr , .numbercase tr{
            margin: 1mm;
        }
        .table{
            margin-bottom: 0 !important;
            width: 118mm;
        }
        table {
            border-collapse: collapse;

        }
        .nbr-tble{
            border-collapse: separate;
        }
        th{
            background-color: #38b292;
            color: #fff;
            font-size: 3mm;
            font-weight: 300;
        }
        td{
            text-align: center;
            font-size: 2.3mm;
            padding-left: 1.5mm;
        }

        tr.studentname , tr.numbercase, tr.questions-a4 {
            margin-left: 1mm;
            margin-right: 1mm;
        }
        .questions-a4{
            border: 2px solid #38b292; 
        }
        .studentname td , .numbercase td {
            border: 2px solid #38b292;
            box-sizing: border-box ;
        }
        .questions-a4 td:nth-child(1){
            border-left: 2px solid #38b292;
            border-right: 2px solid #38b292;
        }
        .textindic.two{
            display: flex;
            align-items: start;
        }
        .textindic{
            text-align: start;
        }
        .text-center{
            text-align: center;
        }
        .circle-matricule{
            text-align: center;
            border: 1px solid #38b292;
            box-shadow: 0 0 0 0.5px #38b292;
            width: 3.3mm;
            height: 3.3mm;
            margin-bottom: .039mm;
            border-radius: 50%;
            background-color: #fff;
            color: #38b292;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .border-bottom-success{
            width: 100%;
            border-bottom: 2px solid  #38b292;
            margin-bottom: 1mm;            
        }
        .infos-section{
            width: 100%;
            max-width: 91mm;    
        }

        .note-section{
            max-width: 36mm;
        }
        .table-number{
            max-width: 50mm; 
            margin-top: 2mm; 
        }

        .table-section {
            display:flex;
            align-items: center;
            justify-content: space-between;
            max-width: 90mm;
        }

        .filiere-content{
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .info-classe, .info-niveau,  .info-filiere, .info-number, .info-signature, .info-note, .note-obtained, .supervisor-signature{
            width: 100%;
            border: 1px solid #38b292;
            outline: 0.5px solid #38b292;

        }
        .info-note {
            margin-top: 2mm;
            height: 28mm;
        }
        .info-signature {
            margin-top: 4mm;
            height: 29mm;
        }
        .info-classe{
            max-width: 25mm; 
        }

        .info-niveau{
            max-width: 20mm; 
        }

        .info-filiere{
            max-width: 35mm; 
        }
        .note-obtained, .supervisor-signature{
            margin-top: 2mm;
            height: 30mm;
        }
        .questions-a4{
            width: 100%;
            max-width: 33mm;
        }
        .bg-primary{
            background-color: rgb(23, 62, 221);
        }
        .border-primary{
            border: 1px solid rgb(23, 62, 221);
            border: 2px solid rgb(23, 62, 221);
        }
        .text-primary{
            color: rgb(23, 62, 221);
            font-size: 4mm;
        }
        .semi-circle{
            position: absolute;
            top: 50%;
            left: 20%;
            transform: translate(-50%, -50%);
            height: 3mm;
            width: 2.5mm;
            border-radius: 150px  0 0 150px;
            background-color: rgb(23, 62, 221);
            rotate: rotate(-90deg);
        }
        .content-footer{
            position: relative;
        }
        .footer-a4{
            width: 100%;
            font-size: 3mm;
            bottom: -5mm;
            color: #38b292;
            text-align: center;
            position: absolute;
            top: -2mm;
        }
        .footer-a4 .romnote{
            font-weight: bold;
        }
    </style>
</head>
<body>
        @foreach($randomSubjects as $index => $randomSubject)
        
            <div class="random-subject">
            <div class="subject-wrapper">
                <div class="subject-content">
                <div class="header">
                    <div class="logo"><img src="{{ asset('images/romnote.png') }}" height="50" width="auto" alt=""></div>
                        <div class="title"> 
                            <div class="devoir"><span class="devoir-text">{{ $dataAtributes['typesujet'] }}</span></div>
                            <div class="devtitle">
                                <div class="devoir"><span class="left-title">Matière :</span> {{ $dataAtributes['matiere'] }}</div>
                                <div class="devoir"><span class="left-title">Filière :</span> {{ $dataAtributes['filiere'] }}</div>
                            </div>
                        </div>
                        <div class="info">
                            <div>Classe :<span class="info-text">{{ $dataAtributes['classe'] }}</span></div>
                            <div>Durée : <span class="info-text"> @php
                                                                    $timeParts = explode(':', $dataAtributes['heure']);
                                                                    $hoursInMinutes = $timeParts[0] * 60;
                                                                    $minutes = $timeParts[1];
                                                                    $totalMinutes = $hoursInMinutes + $minutes;
                                                                @endphp
                                                                {{ $totalMinutes }} min</span></div>
                            <div>Coefficient : <span class="info-text">1</span></div>
                            <div>ECT : <span class="info-text">1</span></div>
                        </div>
                    </div>

                    <div class="main-title">
                        {{ ($dataAtributes['consigne']) }}  <span class="points instruction">{{ $dataAtributes['noteprincipale'] }} pts</span><br>
                    </div>
                @foreach($randomSubject->sections as $section)
                    <div class="exercise">
                        <div class="exercise-title">EXERCICE {{ $loop->iteration }} : {{ $section->titre }} <span class="points  qt">{{$section->questions->sum(function($q) { return $q->reponses->sum('points'); })}} pts</span></div>
                        <div class="exercise-content">
                            @if($section->soustitre)
                                <div class="exercise-description">{{ $section->soustitre }}</div>
                            @endif
                            @if($section->image_section)
                                <div class="exercise-image">
                                    <img src="{{ asset($section->image_section) }}" height="100" width="auto" alt="Image de l'exercice" class="img-sheet"/>
                                </div>
                            @endif
                        </div>

                        @foreach($section->questions as $question)
                            <div class="question">
                                <div class="question-content">
                                    @if($question->libquestion)
                                        <span class="question-text">{{ $loop->iteration }} - {{ $question->libquestion }}</span>
                                    @endif
                                    <span class="points">({{ $question->reponses->sum('points') }} pts)</span>
                                </div>
                                    @if($question->image_question)
                                        <div class="exercise-image">
                                            <img src="{{ asset($question->image_question) }}" height="100" width="auto" alt="Image de l'exercice" class="img-sheet"/>
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
                </div>
            </div>
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
                            {!! $randomSubject->qrCode !!}
                            {{ $randomSubject->reference }}
                        </div>
                    </div> 
                </div>
            </div>
         

            <!--- Feuille de OMR-Sheet   --->
            <div class="container page-a4">
            <div class="page-content">
                <div class="content-striped">
                    <div class="bg-striped1">
                        <table class="tble-dark">
                            <tbody class="tbody-dark1">
                                
                            </tbody>
                        </table>
                    </div>
                    <div class="bg-striped2">
                        <table class="tble-dark">
                            <tbody class="tbody-dark2">
                                
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <div class="sheet-section">
                    <div class="logo">
                        <div class="img-logo">
                            <img src="{{ asset('images/romnote.png') }}" height="44" width="auto" class="" alt="logo" srcset="">
                            <div class="dev">Devoir</div>
                        </div>
                    </div>
                    <div class="sheet-info">
                        <div class=" border-success header-a4">
                            <div class="header-content"><div class="header-text">Matière: </div> <div class="sqare-matiere">{{ $dataAtributes['matiere'] }}</div></div>
                            <div class="header-content"><span class="header-text">Date: </span> <span class="sqare-date"></span></div>
                        </div>
                    </div>
                  <div class="sheet-info">

                    <div class="number-section">

                        <div class="table-responsive  border-success name-arrow">
                            <div class="w-100 border-bottom-success name-title number-candidate">
                                <h5>MATRICULE D CANDIDAT</h5>
                            </div>
                            <table>
                                <tbody>
                                    <tr class="studentname">
                                        <td></td><td></td><td></td>
                                        <td></td><td></td><td></td>
                                        <td></td><td></td><td></td>
                                        <td></td><td></td><td></td>
                                        <td></td><td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                     <div class="infos-section">
                        <div class="d-flex align-items-center justify-content-between filiere-section">
                            <div class="filiere-content">
                                <div class="info-classe">
                                    <div class="border-bottom-success name-title">
                                        <h5>CLASSE</h5>
                                    </div>
                                    <div class="table-responsive  name-arrow">
                                        
                                        <table class="table">
                                            <tbody>
                                              <tr class="tablename">
                                                <td>{{ $dataAtributes['classe'] }}</td>
                                              </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
    
                                <div class="info-niveau">
                                    <div class="border-bottom-success name-title">
                                        <h5>NIVEAU</h5>
                                    </div>
                                    <div class="table-responsive name-arrow">
                                        <table class="table">
                                            <tbody>
                                              <tr class="tablename">
                                                <td>{{ $dataAtributes['classe'] }}</td>
                                              </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
        
                                <div class="info-filiere">
                                    <div class="border-bottom-success name-title">
                                        <h5>FILIERE</h5>
                                    </div>
                                    <div class="table-responsive name-arrow">
                                        <table class="table">
                                            <tbody>
                                              <tr class="tablename">
                                                <td>{{ $dataAtributes['filiere'] }}</td>
                                              </tr>
                                            </tbody>
                                        </table>
                                    </div> 
                                </div>
                            </div>
                        </div>
    
                        <div class="table-section">
                            <div class="note-section">
                                <div class="info-note">
                                    <div class="border-bottom-success name-title">
                                        <h5>NOTE OBTENUE</h5>
                                    </div>
                                    <div class="table-responsive  name-arrow">
                                        
                                        <table class="table">
                                            <tbody>
                                              <tr class="scoreobtained">
     
                                              </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="info-signature">
                                    <div class="border-bottom-success name-title">
                                        <h5>SIGNATURE DU CORRECTEUR</h5>
                                    </div>
                                    <div class="table-responsive  name-arrow">
                                        
                                        <table class="table">
                                            <tbody>
                                              <tr class="proofreadersignature">
    
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="table-number">
                                <div class="info-number">
                                    <div class="border-bottom-success name-title">
                                        <h5>N° TABLE</h5>
                                    </div>
                                    <div class="table-responsive  name-arrow">
                                        <table class="table nbr-tble">
                                            <tbody>
                                                <tr class="numbercase">
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="instruction-content">
                            <div class="instruction-section">
                                <div class="col-md-12 border-bottom-success name-title mt-2">
                                    <h5>INSTRUCTIONS POUR LE MARQUAGE DE LA FEUILLE ROM</h5>
                                </div>
                                <div class="name-arrow  d-flex align-items-center justify-content-center px-5">
    
                                    <table class="tr-matricule">
                                        <tbody>
    
                                        <tr class="tablename">
                                            <td class="textindic">1.</td>
                                            <td class="textindic">Utiliser un stylo à bille noir/bleu pour cocher</td>
                                        </tr>
    
                                        <tr class="tablename">
                                            <td class="textindic two">2.</td>
                                            <td class="textindic">Ne noicir qu'un ou plusieurs cercles pour indiquer la/les réponse </td>
                                        </tr>
                                        </tbody>
                                    </table>
    
                                    <table class="tr-matricule">
                                        <tbody>
                                            <tr class="tablename">
                                                <td class="text-start"><strong>BONNE MÉTHODE</strong></td>
                                                <td class="textindic"><div class="circle-matricule"></div></td>
                                                <td class="textindic"><div class="circle-matricule"></div></td>
                                                <td class="textindic"><div class="circle-matricule bg-primary border-primary"></div></td>
                                                <td class="textindic"><div class="circle-matricule"></div></td> 
                                            </tr>
    
                                            <tr class="tablename">
                                                <td class="text-start"><strong>MAUVAISE MÉTHODE</strong></td>
                                                <td class="textindic"><div class="circle-matricule text-primary h5">x</div></td>
                                                <td class="textindic"><div class="circle-matricule"></div></td>
                                                <td class="textindic"><div class="circle-matricule text-primary  h5">v</div></td>
                                                <td class="textindic"><div class="circle-matricule" style="position: relative; overflow: hidden;"><span class="semi-circle"></span></div></td>
                                            </tr>
                                        </tbody>
                                    </table>
    
                                </div>
                            </div>
    
                            <div class="qr-content">
                                <div class="qr-div">
                                {!! $randomSubject->qrCode !!}
                                {{ $randomSubject->reference }}
                                </div>
                            </div>
                        </div>
                        
                        <div class="note-obtained">
                            <div class=" name-title border-bottom-success" >
                                    <h5>SIGNATURE DU CANDIDAT</h5>
                            </div>

                            <div class="name-arrow"></div>
                        </div>

                        <div class="supervisor-signature">
                                <div class="name-title border-bottom-success">
                                    <h5 class="" >SIGNATURE DU SURVEILLANT</h5>
                                </div>
                                <div class="name-arrow"></div>
                        </div>

                     </div>

                    </div>


                    <div class="question-section">

                            <table class="questions-a4">
                                <tr>
                                    <th colspan="5">Réponses</th>
                                </tr>
                                <tbody>
                                    
                                <tr class="">
                                    <td class="text-center">1</td>
                                    <td class="text-center"><div class="circle-matricule">A</div></td>
                                    <td class="text-center"><div class="circle-matricule">B</div></td>
                                    <td class="text-center"><div class="circle-matricule">C</div></td>
                                    <td class="text-center"><div class="circle-matricule">D</div></td>
                                </tr>

                                <tr class="">
                                    <td class="text-center">2</td>
                                    <td class="text-center"><div class="circle-matricule">A</div></td>
                                    <td class="text-center"><div class="circle-matricule">B</div></td>
                                    <td class="text-center"><div class="circle-matricule">C</div></td>
                                    <td class="text-center"><div class="circle-matricule">D</div></td>
                                </tr>

                                <tr class="">
                                    <td class="text-center">3</td>
                                    <td class="text-center"><div class="circle-matricule">A</div></td>
                                    <td class="text-center"><div class="circle-matricule">B</div></td>
                                    <td class="text-center"><div class="circle-matricule">C</div></td>
                                    <td class="text-center"><div class="circle-matricule">D</div></td>
                                </tr>
                                <tr class="">
                                    <td class="text-center">4</td>
                                    <td class="text-center"><div class="circle-matricule">A</div></td>
                                    <td class="text-center"><div class="circle-matricule">B</div></td>
                                    <td class="text-center"><div class="circle-matricule">C</div></td>
                                    <td class="text-center"><div class="circle-matricule">D</div></td>
                                </tr>
                                <tr class="tablename">
                                    <td class="text-center">5</td>
                                    <td class="text-center"><div class="circle-matricule">A</div></td>
                                    <td class="text-center"><div class="circle-matricule">B</div></td>
                                    <td class="text-center"><div class="circle-matricule">C</div></td>
                                    <td class="text-center"><div class="circle-matricule">D</div></td>
                                </tr>

                                <tr class="">
                                    <td class="text-center">6</td>
                                    <td class="text-center"><div class="circle-matricule">A</div></td>
                                    <td class="text-center"><div class="circle-matricule">B</div></td>
                                    <td class="text-center"><div class="circle-matricule">C</div></td>
                                    <td class="text-center"><div class="circle-matricule">D</div></td>
                                </tr>
                                <tr class="tablename">
                                    <td class="text-center">7</td>
                                    <td class="text-center"><div class="circle-matricule">A</div></td>
                                    <td class="text-center"><div class="circle-matricule">B</div></td>
                                    <td class="text-center"><div class="circle-matricule">C</div></td>
                                    <td class="text-center"><div class="circle-matricule">D</div></td>
                                </tr>
                                <tr class="tablename">
                                    <td class="text-center">8</td>
                                    <td class="text-center"><div class="circle-matricule">A</div></td>
                                    <td class="text-center"><div class="circle-matricule">B</div></td>
                                    <td class="text-center"><div class="circle-matricule">C</div></td>
                                    <td class="text-center"><div class="circle-matricule">D</div></td>
                                </tr>
                                <tr class="tablename">
                                    <td class="text-center">9</td>
                                    <td class="text-center"><div class="circle-matricule">A</div></td>
                                    <td class="text-center"><div class="circle-matricule">B</div></td>
                                    <td class="text-center"><div class="circle-matricule">C</div></td>
                                    <td class="text-center"><div class="circle-matricule">D</div></td>
                                </tr>
                                <tr class="tablename">
                                    <td class="text-center">10</td>
                                    <td class="text-center"><div class="circle-matricule">A</div></td>
                                    <td class="text-center"><div class="circle-matricule">B</div></td>
                                    <td class="text-center"><div class="circle-matricule">C</div></td>
                                    <td class="text-center"><div class="circle-matricule">D</div></td>
                                </tr>
                                <tr class="tablename">
                                    <td class="text-center">11</td>
                                    <td class="text-center"><div class="circle-matricule">A</div></td>
                                    <td class="text-center"><div class="circle-matricule">B</div></td>
                                    <td class="text-center"><div class="circle-matricule">C</div></td>
                                    <td class="text-center"><div class="circle-matricule">D</div></td>
                                </tr>
                                <tr class="tablename">
                                    <td class="text-center">12</td>
                                    <td class="text-center"><div class="circle-matricule">A</div></td>
                                    <td class="text-center"><div class="circle-matricule">B</div></td>
                                    <td class="text-center"><div class="circle-matricule">C</div></td>
                                    <td class="text-center"><div class="circle-matricule">D</div></td>
                                </tr>
                                <tr class="tablename">
                                    <td class="text-center">13</td>
                                    <td class="text-center"><div class="circle-matricule">A</div></td>
                                    <td class="text-center"><div class="circle-matricule">B</div></td>
                                    <td class="text-center"><div class="circle-matricule">C</div></td>
                                    <td class="text-center"><div class="circle-matricule">D</div></td>
                                </tr>
                                <tr class="tablename">
                                    <td class="text-center">14</td>
                                    <td class="text-center"><div class="circle-matricule">A</div></td>
                                    <td class="text-center"><div class="circle-matricule">B</div></td>
                                    <td class="text-center"><div class="circle-matricule">C</div></td>
                                    <td class="text-center"><div class="circle-matricule">D</div></td>
                                </tr>
                                <tr class="tablename">
                                    <td class="text-center">15</td>
                                    <td class="text-center"><div class="circle-matricule">A</div></td>
                                    <td class="text-center"><div class="circle-matricule">B</div></td>
                                    <td class="text-center"><div class="circle-matricule">C</div></td>
                                    <td class="text-center"><div class="circle-matricule">D</div></td>
                                </tr>
                                <tr class="tablename">
                                    <td class="text-center">16</td>
                                    <td class="text-center"><div class="circle-matricule">A</div></td>
                                    <td class="text-center"><div class="circle-matricule">B</div></td>
                                    <td class="text-center"><div class="circle-matricule">C</div></td>
                                    <td class="text-center"><div class="circle-matricule">D</div></td>
                                </tr>
                                <tr class="tablename">
                                    <td class="text-center">17</td>
                                    <td class="text-center"><div class="circle-matricule">A</div></td>
                                    <td class="text-center"><div class="circle-matricule">B</div></td>
                                    <td class="text-center"><div class="circle-matricule">C</div></td>
                                    <td class="text-center"><div class="circle-matricule">D</div></td>
                                </tr>
                                <tr class="tablename">
                                    <td class="text-center">18</td>
                                    <td class="text-center"><div class="circle-matricule">A</div></td>
                                    <td class="text-center"><div class="circle-matricule">B</div></td>
                                    <td class="text-center"><div class="circle-matricule">C</div></td>
                                    <td class="text-center"><div class="circle-matricule">D</div></td>
                                </tr>
                                <tr class="tablename">
                                    <td class="text-center">19</td>
                                    <td class="text-center"><div class="circle-matricule">A</div></td>
                                    <td class="text-center"><div class="circle-matricule">B</div></td>
                                    <td class="text-center"><div class="circle-matricule">C</div></td>
                                    <td class="text-center"><div class="circle-matricule">D</div></td>
                                </tr>
                                <tr class="tablename">
                                    <td class="text-center">20</td>
                                    <td class="text-center"><div class="circle-matricule">A</div></td>
                                    <td class="text-center"><div class="circle-matricule">B</div></td>
                                    <td class="text-center"><div class="circle-matricule">C</div></td>
                                    <td class="text-center"><div class="circle-matricule">D</div></td>
                                </tr>
                          
                                </tbody>
                            </table>

                            <table class="questions-a4">
                                <tr>
                                    <th colspan="5">Réponses</th>
                                </tr>
                                <tbody>
                                    <tr class="tablename">
                                        <td class="text-center">21</td>
                                        <td class="text-center"><div class="circle-matricule">A</div></td>
                                        <td class="text-center"><div class="circle-matricule">B</div></td>
                                        <td class="text-center"><div class="circle-matricule">C</div></td>
                                        <td class="text-center"><div class="circle-matricule">D</div></td>
                                    </tr>
                                    <tr class="tablename">
                                        <td class="text-center">22</td>
                                        <td class="text-center"><div class="circle-matricule">A</div></td>
                                        <td class="text-center"><div class="circle-matricule">B</div></td>
                                        <td class="text-center"><div class="circle-matricule">C</div></td>
                                        <td class="text-center"><div class="circle-matricule">D</div></td>
                                    </tr>
    
                                    <tr class="tablename">
                                        <td class="text-center">23</td>
                                        <td class="text-center"><div class="circle-matricule">A</div></td>
                                        <td class="text-center"><div class="circle-matricule">B</div></td>
                                        <td class="text-center"><div class="circle-matricule">C</div></td>
                                        <td class="text-center"><div class="circle-matricule">D</div></td>
                                    </tr>
    
                                    <tr class="tablename">
                                        <td class="text-center">24</td>
                                        <td class="text-center"><div class="circle-matricule">A</div></td>
                                        <td class="text-center"><div class="circle-matricule">B</div></td>
                                        <td class="text-center"><div class="circle-matricule">C</div></td>
                                        <td class="text-center"><div class="circle-matricule">D</div></td>
                                    </tr>
                                    <tr class="tablename">
                                        <td class="text-center">25</td>
                                        <td class="text-center"><div class="circle-matricule">A</div></td>
                                        <td class="text-center"><div class="circle-matricule">B</div></td>
                                        <td class="text-center"><div class="circle-matricule">C</div></td>
                                        <td class="text-center"><div class="circle-matricule">D</div></td>
                                    </tr>
                                <tr class="tablename">
                                    <td class="text-center">26</td>
                                    <td class="text-center"><div class="circle-matricule">A</div></td>
                                    <td class="text-center"><div class="circle-matricule">B</div></td>
                                    <td class="text-center"><div class="circle-matricule">C</div></td>
                                    <td class="text-center"><div class="circle-matricule">D</div></td>
                                </tr>

                                <tr class="tablename">
                                    <td class="text-center">27</td>
                                    <td class="text-center"><div class="circle-matricule">A</div></td>
                                    <td class="text-center"><div class="circle-matricule">B</div></td>
                                    <td class="text-center"><div class="circle-matricule">C</div></td>
                                    <td class="text-center"><div class="circle-matricule">D</div></td>
                                </tr>
                                <tr class="tablename">
                                    <td class="text-center">28</td>
                                    <td class="text-center"><div class="circle-matricule">A</div></td>
                                    <td class="text-center"><div class="circle-matricule">B</div></td>
                                    <td class="text-center"><div class="circle-matricule">C</div></td>
                                    <td class="text-center"><div class="circle-matricule">D</div></td>
                                </tr>
                                <tr class="tablename">
                                    <td class="text-center">29</td>
                                    <td class="text-center"><div class="circle-matricule">A</div></td>
                                    <td class="text-center"><div class="circle-matricule">B</div></td>
                                    <td class="text-center"><div class="circle-matricule">C</div></td>
                                    <td class="text-center"><div class="circle-matricule">D</div></td>
                                </tr>

                                <tr class="tablename">
                                    <td class="text-center">30</td>
                                    <td class="text-center"><div class="circle-matricule">A</div></td>
                                    <td class="text-center"><div class="circle-matricule">B</div></td>
                                    <td class="text-center"><div class="circle-matricule">C</div></td>
                                    <td class="text-center"><div class="circle-matricule">D</div></td>
                                </tr>
                                <tr class="tablename">
                                    <td class="text-center">31</td>
                                    <td class="text-center"><div class="circle-matricule">c</div></td>
                                    <td class="text-center"><div class="circle-matricule">c</div></td>
                                    <td class="text-center"><div class="circle-matricule">c</div></td>
                                    <td class="text-center"><div class="circle-matricule">c</div></td>
                                </tr>
                                <tr class="tablename">
                                    <td class="text-center">32</td>
                                    <td class="text-center"><div class="circle-matricule">A</div></td>
                                    <td class="text-center"><div class="circle-matricule">B</div></td>
                                    <td class="text-center"><div class="circle-matricule">C</div></td>
                                    <td class="text-center"><div class="circle-matricule">D</div></td>
                                </tr>
                                <tr class="tablename">
                                    <td class="text-center">33</td>
                                    <td class="text-center"><div class="circle-matricule">A</div></td>
                                    <td class="text-center"><div class="circle-matricule">B</div></td>
                                    <td class="text-center"><div class="circle-matricule">C</div></td>
                                    <td class="text-center"><div class="circle-matricule">D</div></td>
                                </tr>
                                <tr class="tablename">
                                    <td class="text-center">34</td>
                                    <td class="text-center"><div class="circle-matricule">A</div></td>
                                    <td class="text-center"><div class="circle-matricule">B</div></td>
                                    <td class="text-center"><div class="circle-matricule">C</div></td>
                                    <td class="text-center"><div class="circle-matricule">D</div></td>
                                </tr>
                                <tr class="tablename">
                                    <td class="text-center">35</td>
                                    <td class="text-center"><div class="circle-matricule">A</div></td>
                                    <td class="text-center"><div class="circle-matricule">B</div></td>
                                    <td class="text-center"><div class="circle-matricule">C</div></td>
                                    <td class="text-center"><div class="circle-matricule">D</div></td>
                                </tr>
                                <tr class="tablename">
                                    <td class="text-center">36</td>
                                    <td class="text-center"><div class="circle-matricule">A</div></td>
                                    <td class="text-center"><div class="circle-matricule">B</div></td>
                                    <td class="text-center"><div class="circle-matricule">C</div></td>
                                    <td class="text-center"><div class="circle-matricule">D</div></td>
                                </tr>
                                <tr class="tablename">
                                    <td class="text-center">37</td>
                                    <td class="text-center"><div class="circle-matricule">A</div></td>
                                    <td class="text-center"><div class="circle-matricule">B</div></td>
                                    <td class="text-center"><div class="circle-matricule">C</div></td>
                                    <td class="text-center"><div class="circle-matricule">D</div></td>
                                </tr>
                                <tr class="tablename">
                                    <td class="text-center">38</td>
                                    <td class="text-center"><div class="circle-matricule">A</div></td>
                                    <td class="text-center"><div class="circle-matricule">B</div></td>
                                    <td class="text-center"><div class="circle-matricule">C</div></td>
                                    <td class="text-center"><div class="circle-matricule">D</div></td>
                                </tr>
                                <tr class="tablename">
                                    <td class="text-center">39</td>
                                    <td class="text-center"><div class="circle-matricule">A</div></td>
                                    <td class="text-center"><div class="circle-matricule">B</div></td>
                                    <td class="text-center"><div class="circle-matricule">C</div></td>
                                    <td class="text-center"><div class="circle-matricule">D</div></td>
                                </tr>
                                <tr class="tablename">
                                    <td class="text-center">40</td>
                                    <td class="text-center"><div class="circle-matricule">A</div></td>
                                    <td class="text-center"><div class="circle-matricule">B</div></td>
                                    <td class="text-center"><div class="circle-matricule">C</div></td>
                                    <td class="text-center"><div class="circle-matricule">D</div></td>
                                </tr>

                                
                                </tbody>
                            </table>

                                <table class="questions-a4">
                                    <thead>
                                        <tr>
                                            <th colspan="5">Réponses</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="tablename">
                                            <td class="text-center">41</td>
                                            <td class="text-center"><div class="circle-matricule">A</div></td>
                                            <td class="text-center"><div class="circle-matricule">B</div></td>
                                            <td class="text-center"><div class="circle-matricule">C</div></td>
                                            <td class="text-center"><div class="circle-matricule">D</div></td>
                                        </tr>
                                        <tr class="tablename">
                                            <td class="text-center">42</td>
                                            <td class="text-center"><div class="circle-matricule">A</div></td>
                                            <td class="text-center"><div class="circle-matricule">B</div></td>
                                            <td class="text-center"><div class="circle-matricule">C</div></td>
                                            <td class="text-center"><div class="circle-matricule">D</div></td>
                                        </tr>
                                        <tr class="tablename">
                                            <td class="text-center">43</td>
                                            <td class="text-center"><div class="circle-matricule">A</div></td>
                                            <td class="text-center"><div class="circle-matricule">B</div></td>
                                            <td class="text-center"><div class="circle-matricule">C</div></td>
                                            <td class="text-center"><div class="circle-matricule">D</div></td>
                                        </tr>
                                        <tr class="tablename">
                                            <td class="text-center">44</td>
                                            <td class="text-center"><div class="circle-matricule">A</div></td>
                                            <td class="text-center"><div class="circle-matricule">B</div></td>
                                            <td class="text-center"><div class="circle-matricule">C</div></td>
                                            <td class="text-center"><div class="circle-matricule">D</div></td>
                                        </tr>
                                        <tr class="tablename">
                                            <td class="text-center">45</td>
                                            <td class="text-center"><div class="circle-matricule">A</div></td>
                                            <td class="text-center"><div class="circle-matricule">B</div></td>
                                            <td class="text-center"><div class="circle-matricule">C</div></td>
                                            <td class="text-center"><div class="circle-matricule">D</div></td>
                                        </tr>
                                        <tr class="tablename">
                                            <td class="text-center">36</td>
                                            <td class="text-center"><div class="circle-matricule">A</div></td>
                                            <td class="text-center"><div class="circle-matricule">B</div></td>
                                            <td class="text-center"><div class="circle-matricule">C</div></td>
                                            <td class="text-center"><div class="circle-matricule">D</div></td>
                                        </tr>
        
                                        <tr class="tablename">
                                            <td class="text-center">47</td>
                                            <td class="text-center"><div class="circle-matricule">A</div></td>
                                            <td class="text-center"><div class="circle-matricule">B</div></td>
                                            <td class="text-center"><div class="circle-matricule">C</div></td>
                                            <td class="text-center"><div class="circle-matricule">D</div></td>
                                        </tr>
        
                                        <tr class="tablename">
                                            <td class="text-center">48</td>
                                            <td class="text-center"><div class="circle-matricule">A</div></td>
                                            <td class="text-center"><div class="circle-matricule">B</div></td>
                                            <td class="text-center"><div class="circle-matricule">C</div></td>
                                            <td class="text-center"><div class="circle-matricule">D</div></td>
                                        </tr>
        
                                        <tr class="tablename">
                                            <td class="text-center">49</td>
                                            <td class="text-center"><div class="circle-matricule">A</div></td>
                                            <td class="text-center"><div class="circle-matricule">B</div></td>
                                            <td class="text-center"><div class="circle-matricule">C</div></td>
                                            <td class="text-center"><div class="circle-matricule">D</div></td>
                                        </tr>
        
                                        <tr class="tablename">
                                            <td class="text-center">50</td>
                                            <td class="text-center"><div class="circle-matricule">A</div></td>
                                            <td class="text-center"><div class="circle-matricule">B</div></td>
                                            <td class="text-center"><div class="circle-matricule">C</div></td>
                                            <td class="text-center"><div class="circle-matricule">D</div></td>
                                        </tr>
        
                                        <tr class="tablename">
                                            <td class="text-center">51</td>
                                            <td class="text-center"><div class="circle-matricule">A</div></td>
                                            <td class="text-center"><div class="circle-matricule">B</div></td>
                                            <td class="text-center"><div class="circle-matricule">C</div></td>
                                            <td class="text-center"><div class="circle-matricule">D</div></td>
                                        </tr>
        
                                    <tr class="tablename">
                                        <td class="text-center">52</td>
                                        <td class="text-center"><div class="circle-matricule">A</div></td>
                                        <td class="text-center"><div class="circle-matricule">B</div></td>
                                        <td class="text-center"><div class="circle-matricule">C</div></td>
                                        <td class="text-center"><div class="circle-matricule">D</div></td>
                                    </tr>
    
                                    <tr class="tablename">
                                        <td class="text-center">53</td>
                                        <td class="text-center"><div class="circle-matricule">A</div></td>
                                        <td class="text-center"><div class="circle-matricule">B</div></td>
                                        <td class="text-center"><div class="circle-matricule">C</div></td>
                                        <td class="text-center"><div class="circle-matricule">D</div></td>
                                    </tr>
    
                                    <tr class="tablename">
                                        <td class="text-center">54</td>
                                        <td class="text-center"><div class="circle-matricule">A</div></td>
                                        <td class="text-center"><div class="circle-matricule">B</div></td>
                                        <td class="text-center"><div class="circle-matricule">C</div></td>
                                        <td class="text-center"><div class="circle-matricule">D</div></td>
                                    </tr>
                                    <tr class="tablename">
                                        <td class="text-center">55</td>
                                        <td class="text-center"><div class="circle-matricule">A</div></td>
                                        <td class="text-center"><div class="circle-matricule">B</div></td>
                                        <td class="text-center"><div class="circle-matricule">C</div></td>
                                        <td class="text-center"><div class="circle-matricule">D</div></td>
                                    </tr>
                                    <tr class="tablename">
                                        <td class="text-center">56</td>
                                        <td class="text-center"><div class="circle-matricule">A</div></td>
                                        <td class="text-center"><div class="circle-matricule">B</div></td>
                                        <td class="text-center"><div class="circle-matricule">C</div></td>
                                        <td class="text-center"><div class="circle-matricule">D</div></td>
                                    </tr>
    
                                    <tr class="tablename">
                                        <td class="text-center">57</td>
                                        <td class="text-center"><div class="circle-matricule">A</div></td>
                                        <td class="text-center"><div class="circle-matricule">B</div></td>
                                        <td class="text-center"><div class="circle-matricule">C</div></td>
                                        <td class="text-center"><div class="circle-matricule">D</div></td>
                                    </tr>
                                    <tr class="tablename">
                                        <td class="text-center">58</td>
                                        <td class="text-center"><div class="circle-matricule">A</div></td>
                                        <td class="text-center"><div class="circle-matricule">B</div></td>
                                        <td class="text-center"><div class="circle-matricule">C</div></td>
                                        <td class="text-center"><div class="circle-matricule">D</div></td>
                                    </tr>
                                    <tr class="tablename">
                                        <td class="text-center">59</td>
                                        <td class="text-center"><div class="circle-matricule">A</div></td>
                                        <td class="text-center"><div class="circle-matricule">B</div></td>
                                        <td class="text-center"><div class="circle-matricule">C</div></td>
                                        <td class="text-center"><div class="circle-matricule">D</div></td>
                                    </tr>
                                </tbody>
                            </table>

                            <table class="questions-a4">
                                <thead>
                                    <tr>
                                        <th colspan="5">Réponses</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="tablename">
                                        <td class="text-center">60</td>
                                        <td class="text-center"><div class="circle-matricule">A</div></td>
                                        <td class="text-center"><div class="circle-matricule">B</div></td>
                                        <td class="text-center"><div class="circle-matricule">C</div></td>
                                        <td class="text-center"><div class="circle-matricule">D</div></td>
                                    </tr>
                                    <tr class="tablename">
                                        <td class="text-center">61</td>
                                        <td class="text-center"><div class="circle-matricule">A</div></td>
                                        <td class="text-center"><div class="circle-matricule">B</div></td>
                                        <td class="text-center"><div class="circle-matricule">C</div></td>
                                        <td class="text-center"><div class="circle-matricule">D</div></td>
                                    </tr>
                                    <tr class="tablename">
                                        <td class="text-center">62</td>
                                        <td class="text-center"><div class="circle-matricule">A</div></td>
                                        <td class="text-center"><div class="circle-matricule">B</div></td>
                                        <td class="text-center"><div class="circle-matricule">C</div></td>
                                        <td class="text-center"><div class="circle-matricule">D</div></td>
                                    </tr>
                                    <tr class="tablename">
                                        <td class="text-center">63</td>
                                        <td class="text-center"><div class="circle-matricule">A</div></td>
                                        <td class="text-center"><div class="circle-matricule">B</div></td>
                                        <td class="text-center"><div class="circle-matricule">C</div></td>
                                        <td class="text-center"><div class="circle-matricule">D</div></td>
                                    </tr>
                                    <tr class="tablename">
                                        <td class="text-center">64</td>
                                        <td class="text-center"><div class="circle-matricule">A</div></td>
                                        <td class="text-center"><div class="circle-matricule">B</div></td>
                                        <td class="text-center"><div class="circle-matricule">C</div></td>
                                        <td class="text-center"><div class="circle-matricule">D</div></td>
                                    </tr>
                                    <tr class="tablename">
                                        <td class="text-center">65</td>
                                        <td class="text-center"><div class="circle-matricule">A</div></td>
                                        <td class="text-center"><div class="circle-matricule">B</div></td>
                                        <td class="text-center"><div class="circle-matricule">C</div></td>
                                        <td class="text-center"><div class="circle-matricule">D</div></td>
                                    </tr>
                                    <tr class="tablename">
                                        <td class="text-center">66</td>
                                        <td class="text-center"><div class="circle-matricule">A</div></td>
                                        <td class="text-center"><div class="circle-matricule">B</div></td>
                                        <td class="text-center"><div class="circle-matricule">C</div></td>
                                        <td class="text-center"><div class="circle-matricule">D</div></td>
                                    </tr>
                                    <tr class="tablename">
                                        <td class="text-center">67</td>
                                        <td class="text-center"><div class="circle-matricule">A</div></td>
                                        <td class="text-center"><div class="circle-matricule">B</div></td>
                                        <td class="text-center"><div class="circle-matricule">C</div></td>
                                        <td class="text-center"><div class="circle-matricule">D</div></td>
                                    </tr>
                                    <tr class="tablename">
                                        <td class="text-center">68</td>
                                        <td class="text-center"><div class="circle-matricule">A</div></td>
                                        <td class="text-center"><div class="circle-matricule">B</div></td>
                                        <td class="text-center"><div class="circle-matricule">C</div></td>
                                        <td class="text-center"><div class="circle-matricule">D</div></td>
                                    </tr>
                                    <tr class="tablename">
                                        <td class="text-center">69</td>
                                        <td class="text-center"><div class="circle-matricule">A</div></td>
                                        <td class="text-center"><div class="circle-matricule">B</div></td>
                                        <td class="text-center"><div class="circle-matricule">C</div></td>
                                        <td class="text-center"><div class="circle-matricule">D</div></td>
                                    </tr>
                                    <tr class="tablename">
                                        <td class="text-center">70</td>
                                        <td class="text-center"><div class="circle-matricule">A</div></td>
                                        <td class="text-center"><div class="circle-matricule">B</div></td>
                                        <td class="text-center"><div class="circle-matricule">C</div></td>
                                        <td class="text-center"><div class="circle-matricule">D</div></td>
                                    </tr>
                                    <tr class="tablename">
                                        <td class="text-center">71</td>
                                        <td class="text-center"><div class="circle-matricule">A</div></td>
                                        <td class="text-center"><div class="circle-matricule">B</div></td>
                                        <td class="text-center"><div class="circle-matricule">C</div></td>
                                        <td class="text-center"><div class="circle-matricule">D</div></td>
                                    </tr>
                                    <tr class="tablename">
                                        <td class="text-center">72</td>
                                        <td class="text-center"><div class="circle-matricule">A</div></td>
                                        <td class="text-center"><div class="circle-matricule">B</div></td>
                                        <td class="text-center"><div class="circle-matricule">C</div></td>
                                        <td class="text-center"><div class="circle-matricule">D</div></td>
                                    </tr>
                                 
                                    <tr class="tablename">
                                        <td class="text-center">73</td>
                                        <td class="text-center"><div class="circle-matricule">A</div></td>
                                        <td class="text-center"><div class="circle-matricule">B</div></td>
                                        <td class="text-center"><div class="circle-matricule">C</div></td>
                                        <td class="text-center"><div class="circle-matricule">D</div></td>
                                    </tr>
    
                                    <tr class="tablename">
                                        <td class="text-center">74</td>
                                        <td class="text-center"><div class="circle-matricule">A</div></td>
                                        <td class="text-center"><div class="circle-matricule">B</div></td>
                                        <td class="text-center"><div class="circle-matricule">C</div></td>
                                        <td class="text-center"><div class="circle-matricule">D</div></td>
                                    </tr>
                                    <tr class="tablename">
                                        <td class="text-center">75</td>
                                        <td class="text-center"><div class="circle-matricule">A</div></td>
                                        <td class="text-center"><div class="circle-matricule">B</div></td>
                                        <td class="text-center"><div class="circle-matricule">C</div></td>
                                        <td class="text-center"><div class="circle-matricule">D</div></td>
                                    </tr>
                                    <tr class="tablename">
                                        <td class="text-center">76</td>
                                        <td class="text-center"><div class="circle-matricule">A</div></td>
                                        <td class="text-center"><div class="circle-matricule">B</div></td>
                                        <td class="text-center"><div class="circle-matricule">C</div></td>
                                        <td class="text-center"><div class="circle-matricule">D</div></td>
                                    </tr>
    
                                <tr class="tablename">
                                    <td class="text-center">77</td>
                                    <td class="text-center"><div class="circle-matricule">A</div></td>
                                    <td class="text-center"><div class="circle-matricule">B</div></td>
                                    <td class="text-center"><div class="circle-matricule">C</div></td>
                                    <td class="text-center"><div class="circle-matricule">D</div></td>
                                </tr>

                                <tr class="tablename">
                                    <td class="text-center">78</td>
                                    <td class="text-center"><div class="circle-matricule">A</div></td>
                                    <td class="text-center"><div class="circle-matricule">B</div></td>
                                    <td class="text-center"><div class="circle-matricule">C</div></td>
                                    <td class="text-center"><div class="circle-matricule">D</div></td>
                                </tr>

                                <tr class="tablename">
                                    <td class="text-center">78</td>
                                    <td class="text-center"><div class="circle-matricule">A</div></td>
                                    <td class="text-center"><div class="circle-matricule">B</div></td>
                                    <td class="text-center"><div class="circle-matricule">C</div></td>
                                    <td class="text-center"><div class="circle-matricule">D</div></td>
                                </tr>
                                <tr class="tablename">
                                    <td class="text-center">79</td>
                                    <td class="text-center"><div class="circle-matricule">A</div></td>
                                    <td class="text-center"><div class="circle-matricule">B</div></td>
                                    <td class="text-center"><div class="circle-matricule">C</div></td>
                                    <td class="text-center"><div class="circle-matricule">D</div></td>
                                </tr>
                                <tr class="tablename">
                                    <td class="text-center">80</td>
                                    <td class="text-center"><div class="circle-matricule">A</div></td>
                                    <td class="text-center"><div class="circle-matricule">B</div></td>
                                    <td class="text-center"><div class="circle-matricule">C</div></td>
                                    <td class="text-center"><div class="circle-matricule">D</div></td>
                                </tr>
                                    </tbody>
                                </table>

                                <table class="questions-a4">
                                    <thead>
                                        <tr>
                                            <th colspan="5">Réponses</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
    
                                    <tr class="tablename">
                                        <td class="text-center">81</td>
                                        <td class="text-center"><div class="circle-matricule">A</div></td>
                                        <td class="text-center"><div class="circle-matricule">B</div></td>
                                        <td class="text-center"><div class="circle-matricule">C</div></td>
                                        <td class="text-center"><div class="circle-matricule">D</div></td>
                                    </tr>
                                    <tr class="tablename">
                                        <td class="text-center">82</td>
                                        <td class="text-center"><div class="circle-matricule">A</div></td>
                                        <td class="text-center"><div class="circle-matricule">B</div></td>
                                        <td class="text-center"><div class="circle-matricule">C</div></td>
                                        <td class="text-center"><div class="circle-matricule">D</div></td>
                                    </tr>
                                    <tr class="tablename">
                                        <td class="text-center">83</td>
                                        <td class="text-center"><div class="circle-matricule">A</div></td>
                                        <td class="text-center"><div class="circle-matricule">B</div></td>
                                        <td class="text-center"><div class="circle-matricule">C</div></td>
                                        <td class="text-center"><div class="circle-matricule">D</div></td>
                                    </tr>
                                    <tr class="tablename">
                                        <td class="text-center">83</td>
                                        <td class="text-center"><div class="circle-matricule">A</div></td>
                                        <td class="text-center"><div class="circle-matricule">B</div></td>
                                        <td class="text-center"><div class="circle-matricule">C</div></td>
                                        <td class="text-center"><div class="circle-matricule">D</div></td>
                                    </tr>
                                    <tr class="tablename">
                                        <td class="text-center">85</td>
                                        <td class="text-center"><div class="circle-matricule">A</div></td>
                                        <td class="text-center"><div class="circle-matricule">B</div></td>
                                        <td class="text-center"><div class="circle-matricule">C</div></td>
                                        <td class="text-center"><div class="circle-matricule">D</div></td>
                                    </tr>
                                    <tr class="tablename">
                                        <td class="text-center">86</td>
                                        <td class="text-center"><div class="circle-matricule">A</div></td>
                                        <td class="text-center"><div class="circle-matricule">B</div></td>
                                        <td class="text-center"><div class="circle-matricule">C</div></td>
                                        <td class="text-center"><div class="circle-matricule">D</div></td>
                                    </tr>
                                    <tr class="tablename">
                                        <td class="text-center">87</td>
                                        <td class="text-center"><div class="circle-matricule">A</div></td>
                                        <td class="text-center"><div class="circle-matricule">B</div></td>
                                        <td class="text-center"><div class="circle-matricule">C</div></td>
                                        <td class="text-center"><div class="circle-matricule">D</div></td>
                                    </tr>
                                    <tr class="tablename">
                                        <td class="text-center">88</td>
                                        <td class="text-center"><div class="circle-matricule">A</div></td>
                                        <td class="text-center"><div class="circle-matricule">B</div></td>
                                        <td class="text-center"><div class="circle-matricule">C</div></td>
                                        <td class="text-center"><div class="circle-matricule">D</div></td>
                                    </tr>
                                    <tr class="tablename">
                                        <td class="text-center">89</td>
                                        <td class="text-center"><div class="circle-matricule">A</div></td>
                                        <td class="text-center"><div class="circle-matricule">B</div></td>
                                        <td class="text-center"><div class="circle-matricule">C</div></td>
                                        <td class="text-center"><div class="circle-matricule">D</div></td>
                                    </tr>
                                    <tr class="tablename">
                                        <td class="text-center">90</td>
                                        <td class="text-center"><div class="circle-matricule">A</div></td>
                                        <td class="text-center"><div class="circle-matricule">B</div></td>
                                        <td class="text-center"><div class="circle-matricule">C</div></td>
                                        <td class="text-center"><div class="circle-matricule">D</div></td>
                                    </tr>
        
                                    <tr class="tablename">
                                        <td class="text-center">91</td>
                                        <td class="text-center"><div class="circle-matricule">A</div></td>
                                        <td class="text-center"><div class="circle-matricule">B</div></td>
                                        <td class="text-center"><div class="circle-matricule">C</div></td>
                                        <td class="text-center"><div class="circle-matricule">D</div></td>
                                    </tr>
                                    <tr class="tablename">
                                        <td class="text-center">92</td>
                                        <td class="text-center"><div class="circle-matricule">A</div></td>
                                        <td class="text-center"><div class="circle-matricule">B</div></td>
                                        <td class="text-center"><div class="circle-matricule">C</div></td>
                                        <td class="text-center"><div class="circle-matricule">D</div></td>
                                    </tr>
                                    <tr class="tablename">
                                        <td class="text-center">93</td>
                                        <td class="text-center"><div class="circle-matricule">A</div></td>
                                        <td class="text-center"><div class="circle-matricule">B</div></td>
                                        <td class="text-center"><div class="circle-matricule">C</div></td>
                                        <td class="text-center"><div class="circle-matricule">D</div></td>
                                    </tr>
                                    <tr class="tablename">
                                        <td class="text-center">94</td>
                                        <td class="text-center"><div class="circle-matricule">A</div></td>
                                        <td class="text-center"><div class="circle-matricule">B</div></td>
                                        <td class="text-center"><div class="circle-matricule">C</div></td>
                                        <td class="text-center"><div class="circle-matricule">D</div></td>
                                    </tr>
                                    <tr class="tablename">
                                        <td class="text-center">95</td>
                                        <td class="text-center"><div class="circle-matricule">A</div></td>
                                        <td class="text-center"><div class="circle-matricule">B</div></td>
                                        <td class="text-center"><div class="circle-matricule">C</div></td>
                                        <td class="text-center"><div class="circle-matricule">D</div></td>
                                    </tr>
                                 
                                    <tr class="tablename">
                                        <td class="text-center">96</td>
                                        <td class="text-center"><div class="circle-matricule">A</div></td>
                                        <td class="text-center"><div class="circle-matricule">B</div></td>
                                        <td class="text-center"><div class="circle-matricule">C</div></td>
                                        <td class="text-center"><div class="circle-matricule">D</div></td>
                                    </tr>
    
                                    <tr class="tablename">
                                        <td class="text-center">98</td>
                                        <td class="text-center"><div class="circle-matricule">A</div></td>
                                        <td class="text-center"><div class="circle-matricule">B</div></td>
                                        <td class="text-center"><div class="circle-matricule">C</div></td>
                                        <td class="text-center"><div class="circle-matricule">D</div></td>
                                    </tr>
                                    <tr class="tablename">
                                        <td class="text-center">99</td>
                                        <td class="text-center"><div class="circle-matricule">A</div></td>
                                        <td class="text-center"><div class="circle-matricule">B</div></td>
                                        <td class="text-center"><div class="circle-matricule">C</div></td>
                                        <td class="text-center"><div class="circle-matricule">D</div></td>
                                    </tr>
                                    <tr class="tablename">
                                        <td class="text-center">100</td>
                                        <td class="text-center"><div class="circle-matricule">A</div></td>
                                        <td class="text-center"><div class="circle-matricule">B</div></td>
                                        <td class="text-center"><div class="circle-matricule">C</div></td>
                                        <td class="text-center"><div class="circle-matricule">D</div></td>
                                    </tr>
                                    </tbody>
                                </table>
                    </div>
                   <div class="content-footer">
                    <p class="footer-a4"><span class="romnote">ROMNote</span> - AKPANY, Software & Media Solution</p>
                   </div> 
                </div>

               <!--<div class="bg-striped"></div>-->
                <div class="content-striped">
                    <div class="bg-striped1">
                        <table class="tble-dark">
                            <tbody class="tbody-dark1">
                                
                            </tbody>
                        </table>
                    </div>
                    <div class="bg-striped2">
                        <table class="tble-dark">
                            <tbody class="tbody-dark2">
                                
                            </tbody>
                        </table>
                    </div>
                </div>
             </div> 

        </div>
        @endforeach

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
    const randomSubjects = document.querySelectorAll('.random-subject');

    randomSubjects.forEach((subject, subjectIndex) => {
        const originalSubject = subject.cloneNode(true);
        const header = originalSubject.querySelector('.header');
        const mainTitle = originalSubject.querySelector('.main-title');
        const footer = originalSubject.querySelector('.footer-wrapper');
        const exercises = Array.from(originalSubject.querySelectorAll('.exercise'));

        // Vider le sujet original
        while (subject.firstChild) {

            subject.removeChild(subject.firstChild);
        }

        let currentPage = createNewPage(subject, header, mainTitle, footer, 1);
        let currentPageHeight = header.offsetHeight + mainTitle.offsetHeight;

        exercises.forEach((exercise, exerciseIndex) => {
            const exerciseHeight = getElementHeight(exercise);

            if (currentPageHeight + exerciseHeight > availableHeightPx) {
                // Créer une nouvelle page
                const pageNumber = subject.querySelectorAll('.page').length + 1;
                currentPage = createNewPage(subject, null, null, footer, pageNumber);
                currentPageHeight = 0;
            }

            currentPage.querySelector('.subject-content').appendChild(exercise);
            
            currentPageHeight += exerciseHeight;
        });

        updatePagination(subject);
    });
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

// Script pour la feuille de OMR-Sheet

$(document).ready(function() {
            for (let i = 90; i >= 65; i--) {
                let letter = String.fromCharCode(i);
                let $tr = $('<tr class="tablename"></tr>'); 
                
                for (let j = 0; j < 14; j++) {
                    $tr.append(`<td><div class="circle-matricule">${letter}</div></td>`);
                }

                $('.studentname').after($tr);
            }
            for (let i = 9; i >= 0; i--) {
                let $tr = $('<tr class="tablename"></tr>');
                let $tr1 = $('<tr class="tablename"></tr>');
                
                for (let j = 0; j < 14; j++) {
                    $tr.append(`<td><div class="circle-matricule">${i}</div></td>`);
                }
                $('.studentname').after($tr);

                for (let k = 0; k < 8; k++) {
                    $tr1.append(`<td><div class="circle-matricule">${i}</div></td>`);
                }
                $('.numbercase').after($tr1);

            }

            $(document).ready(function() {
            for (var i = 0; i < 81; i++) {
                var rowClass1 = (i % 2 === 0) ? 'tr-dark1' : 'tr-light1';
                $('.tbody-dark1').append('<tr class="' + rowClass1 + '"><td></td></tr>');
            }
            for (var i = 0; i < 37; i++) {
                var rowClass2 = (i % 2 === 0) ? 'tr-dark2' : 'tr-light2';
                $('.tbody-dark2').append('<tr class="' + rowClass2 + '"><td></td></tr>');
            }
        }); 
        });
</script>
</body>
</html>
