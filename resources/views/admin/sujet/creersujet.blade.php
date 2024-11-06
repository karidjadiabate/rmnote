<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('frontend/dashboard/html/sujt.css') }}" />
    <script src="{{ asset('frontend/dashboard/html/script.js') }}" defer></script>
    <link rel="stylesheet" href="{{ asset('frontend/dashboard/css/dash.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/dashboard/html/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/dashboard/css/lists.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<style>
    .content{
            font-family: Arial, sans-serif;
            max-width: 200mm;
            margin: 0 auto;
            padding: 10px;
            font-size: 14px;
            font-weight: 500;
            line-height: 1.2;
    }
    /* Pour Chrome, Safari et Edge */
    input[type="number"]::-webkit-inner-spin-button,
    input[type="number"]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Pour Firefox */
    input[type="number"] {
        -moz-appearance: textfield;
    }


    .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            border: 1px solid #cfd0e5;
            padding: 0 10mm 5mm 10mm;
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
            max-width: 400px;
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
            margin-right: 5px; /* pour espacer le texte du titre de la valeur */
            padding-top: 1px;

        }
        .info {
            display: flex;
            flex-direction: column;
            text-align: left;
            font-size: 13px;
        }

        .info .info-text{
            font-weight: bold;
        }
        .main-title {
            text-align: center;
            margin-bottom: 10px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .exercise {
            margin-bottom: 45px;
        }
        .exercise-title {
            font-weight: bold;
            margin-bottom: 5px;
        }
        .exercisecootent{
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .questioncontent{
            text-align: left;
        }


        .question {
            display: flex;
            justify-content: space-between;
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
        .custom-placeholder::placeholder {
            color: #fff!important; /* Couleur du placeholder modifiée */
            font-weight: lighter;
        }
        .custom-placeholders {
            color: #fff!important; /* Couleur du placeholder modifiée */
            background:#030D2D!important;
            font-weight: lighter;
        }
        .question-text {
            flex: 1;
            font-size: 1rem;
            color: #333;
        }

        .question-image {
            flex-shrink: 0;
        }

        .question-image img {
            max-width: 75px;
            height: auto;
        }
        .fa-moon{
        color:#4A41C5;
        }
        .fa-sun{
            color:#4A41C5;
            display:none;
        }
        .options {
            display: flex;
            justify-content: space-between;
            width: 100%;
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
            font-size:14px !important;
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
        .exercise-image{
            text-align:center;
        }
        .option-image {
            max-width: 200px;
            margin-left: 20px;
        }
        .option-image img {
            max-width: 100%;
            height: auto;
        }
        @media (max-width: 768px) {
            .options {
                flex-direction: column;
            }
            .option-image {
                margin: 10px auto;
            }
        }
        span.option{
            font-size:  14px !important;
        }


        .graph {
            display: flex;
            justify-content: end;
            margin: 5px 0;
        }

        .graph img {
            width: auto;
            height: 100px;
        }

        .points {
            float: right;
            font-weight: normal;
        }

        .page-footer{
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .margin-l{
            margin-right: 100px;
            margin-top: -65px;
        }
        .footer-sheet {
            margin-top: 20px;
            font-size: 12px;
            width: 90%;
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

        .page-footer {
            position: absolute;
            bottom: 0;
            left: .5cm;
            right: .5cm;
            height:100px;
            height: 100px;
            background-color: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        li{
            list-style: none;
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

        .btn-success {
    background-color: #38B293;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 0px;
    text-decoration: none;
    }
    .disabled {
            pointer-events: none;
            background: grey;
            text-decoration: none;
            color:#fff;
            border-radius: 0;
        }
        .endnext{
            position: absolute!important;
            right: 20%!important;
        }
        input[name="noteprincipale"] {
            width:254px!important;
            height:68px!important;
        }
        .enfant h2{
            margin-top:20px!important;
        }
</style>
    <title>Sujet</title>
</head>

<body>
    <div class="heade">
        <div class="bleu"></div>
        <div class="bleu-1">
            <div class="bleu-2">
                <!-- <i class="fa-solid fa-circle-chevron-left"></i> -->
                <div class="enfant">
                    <h2>Création de sujet</h2>
                </div>
                <div class="progressbar">
                <div class="progress" id="progress"></div>
                <div class="progress-step progress-step-active">Informations</div>
                <div class="progress-step">Questions</div>
                <div class="progress-step">Finalisation</div>
            </div>

            </div>
            <div class="margin-l">
                    <i class="fa-solid fa-moon"></i>
                    <i class="fa-solid fa-sun"></i>
            </div>
            <i class="fa-solid fa-circle-xmark fermeture" id="close-modal-btn" data-toggle="modal" data-target="#modalbtn"></i>
        </div>
        <!-- Progress bar -->
        <hr />
        <div class="msg-error"></div>

    </div>


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    @if (auth()->user()->role_id == 2)
        <form action="{{ route('sujetprofesseur.store') }}" class="form" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-step form-step-active">
                <div class="wo">
                    <div class="input-group select-group">
                        <label for="position" class="label">Type de sujet</label>
                        <select name="type_sujet_id" id="position" class="select-effect-1" required>
                            <option value="" disabled selected hidden>
                                Choisissez le type de sujet
                            </option>
                            @foreach ($typessujets as $typessujet)
                                <option value="{{ $typessujet->id }}" data-typesujet="{{ $typessujet->libtypesujet }}">{{ $typessujet->libtypesujet }}</option>
                            @endforeach
                        </select>
                        <span class="border"></span>
                        <div class="error-message" id="position-error" style="display: none; color: red;">Veuillez
                            sélectionner un type de sujet.</div>
                    </div>
                    <div class="input-group select-group">
                        <label for="position" class="label">Matière</label>
                        <select name="matiere_id" id="positions" class="select-effect-1" required>
                            <option value="" disabled selected hidden>
                                Sélectionner la matière
                            </option>

                            @if(auth()->user()->role_id == 2)
                                @foreach ($professeurMatiere as $matiere)
                                    <option value="{{ $matiere->id }}" data-matiere ="{{ $matiere->nommatiere }}">{{ $matiere->nommatiere }}</option>
                                @endforeach
                            @endif
                        </select>
                        <span class="border"></span>
                        <div class="error-message" id="positions-error" style="display: none; color: red;">Veuillez
                            sélectionner une matière.</div>
                    </div>
                    <div class="input-group select-group">
                        <label for="position" class="label">Filière</label>
                        <select name="filiere_id" id="positions1" class="select-effect-1" required>
                            <option value="" disabled selected hidden>
                                Sélectionnez la Filière
                            </option>
                            @foreach ($filieres as $filiere)
                                <option value="{{ $filiere->id }}" data-filiere="{{ $filiere->filiere->nomfiliere ?? $filiere->nomfilieretablissement }}">{{ $filiere->filiere->nomfiliere ?? $filiere->nomfilieretablissement }}</option>
                            @endforeach
                        </select>
                        <span class="border"></span>
                        <div class="error-message" id="positions1-error" style="display: none; color: red;">Veuillez
                            sélectionner une filière.</div>
                    </div>
                    <div class="input-group select-group">
                        <label for="position" class="label">Classe</label>
                        <select name="classe_id" id="positions2" class="select-effect-1" required>
                            <option value="" disabled selected hidden>
                                Sélectionnez la classe
                            </option>
                            @foreach ($classes as $classe)
                                <option value="{{ $classe->id }}" data-classe="{{ $classe->nomclasse }}">{{ $classe->nomclasse }}</option>
                            @endforeach
                        </select>
                        <span class="border"></span>
                        <div class="error-message" id="positions2-error" style="display: none; color: red;">Veuillez
                            sélectionner une classe.</div>
                    </div>
                    <div class="input-group time-group">
                        <label for="time" class="label">Durée</label>
                        <input type="text" name="heure" id="time" class="time-effect-1"
                            placeholder="hh:mm" onfocus="this.type='time'" onblur="this.type='time'" required />
                        <span class="border"></span>
                    </div>
                    <div class="input-group ">
                        <label for="consigne" class="label">Consigne</label>
                        <input type="text" name="consigne" id="consigne" class="time-effect-1"
                            placeholder="Entrez une consigne..."  required />
                        <span class="border"></span>
                        <div class="error-message" id="positions5-error" style="display: none; color: red;">Veuillez
                            rempli les consignes.</div>
                    </div><br>
                    <div class="next-step">
                    <a href="#" class="btn btn-next width-24 ml-auto disabled" id="suivants">Suivant</a>
                </div>
                </div>


            </div>

            <div class="form-step">
                <div class="note-container">
                    <span>Note:</span>
                    <input type="number" name="noteprincipale" class="note-value"
                        placeholder="Entrez le nombre total de points *" pattern="\d*" title="Veuillez entrer uniquement des chiffres."/>
                    <a class="enfant_suivant width-24 disabled">Valider</a>
                    <div class="error-message" id="error-message">Le champ ne peut pas être vide.</div>
                    <div class="btns-group avancer">
                        <a href="#" class="btn-prev">Précédent</a>
                        <a href="#" class="btn width-24 disabled valid-not" id="">Suivant</a>
                    </div>
                </div>

                <div class="frm" style="display: none">

                    <div class="sa">
                        <div class="btnas-ends">
                            <i class="fa-solid fa-x delete-questionnaires"></i>
                        </div>
                        <div class="input-group">
                            <input type="text" name="sections[0][titre]" id="phone"
                                placeholder="Sous titre 1" required />
                        </div>
                        <div class="input-group input-with-icon">
                            <input type="text" name="sections[0][soustitre]" id="preview"
                                placeholder="Libellé du sous titre" required />
                            <label for="file-input" class="icon-label"><i class="fa-regular fa-image"></i></label>
                            <input type="file" id="file-input" class="file-input" data-preview="image-preview"
                                data-result="preview" name="sections[0][soustitre][image]" style="display: none" />
                            <img id="image-preview" alt="Aperçu de l'image" />

                        </div>
                    </div>

                    <div class="section-container">
                        <div class="sectio-container">
                            <div class="btnas-end">
                                <!-- <i class="fa-solid fa-x delete-section"></i> -->
                            </div>
                            <div class="sa-1">
                                <div class="questionnaire-container">
                                    <div class="input-group" data-question-index="0">
                                        <div class="questionnaire">
                                            <div class="input-group">
                                                <div class="display-1">
                                                    <div class="textarea">
                                                        <textarea name="sections[0][questions][0][libquestion]" id="previews" required placeholder="Question"></textarea>
                                                    </div>
                                                    <div class="file-inputa">
                                                        <div class="eme">
                                                            <label for="fileinputs"><i
                                                                    class="fa-regular fa-image"></i></label>
                                                            <input type="file" id="fileinputs" class="file-input"
                                                                data-preview="imagepreviews" data-result="previews"
                                                                name="sections[0][questions][0][image]" style="display: none" />
                                                            <img id="imagepreviews" alt="Aperçu de l'image" />

                                                        </div>
                                                        <div>
                                                            <i
                                                                class="fa-solid fa-xmark deletes delete-questionnaire"></i>
                                                        </div>
                                                        <!-- <i class="fa-solid fa-x  delete-section"></i> -->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input-group">
                                                <ol class="circle-list">
                                                    <li>
                                                        <input type="text" class="heckbox-reponce" id="checkbox1"
                                                            name="sections[0][questions][0][reponses][0][libreponse]"
                                                            required placeholder="reponse 1" />
                                                        <input type="file" id="imagine" class="file-input"
                                                            data-preview="imaginations" name="sections[0][questions][0][reponses][0][image]"
                                                            style="display: none" />
                                                        <img id="imaginations" class="img" alt="" />
                                                        <select name="sections[0][questions][0][reponses][0][result]"
                                                            id="mySelect" class="Select">
                                                            <option value="" disabled selected hidden>
                                                                resultat
                                                            </option>
                                                            <option value="bonne_reponse" class="green"
                                                                data-target="1">
                                                                Bonne réponse
                                                            </option>
                                                            <option value="mauvaise_reponse" class="yellow"
                                                                data-target="2">
                                                                Mauvaise réponse
                                                            </option>
                                                            <option value="mauvaise_reponse-" class="red"
                                                                data-target="3">
                                                                Mauvaise réponse(-)
                                                            </option>
                                                        </select>
                                                        <input type="number" id="point" class="point"
                                                            name="sections[0][questions][0][reponses][0][points]"
                                                            placeholder="" />
                                                        <i class="fa-regular fa-trash-can delete delete-btn"></i>
                                                    </li>
                                                </ol>
                                                <a class="add-response" href="#"><input type="radio" />
                                                    <p>
                                                        Ajouter une autre proposition de réponse ou
                                                        <span>ajouter '' Autre ''</span>
                                                    </p>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="#" class="Ajouter-question"><i
                                        class="fa-solid fa-circle-plus"></i>Ajouter une
                                    question</a>
                            </div>
                        </div>
                    </div>

                    <div class="btns-end">
                        <a href="#" class="Ajouter-section"> <i class="fa-solid fa-circle-plus"></i>Ajouter une
                            section</a>
                    </div>

                    <div class="btns-group">
                        <a href="#" class="btn-prev">Précédent</a>
                        <a href="#" class="btn btn-next width-24 endnext endnexts1 disabled">Suivant</a>
                    </div>
                </div>
            </div>

            <div class="form-step">
                <div class="content"><!-- Contenu de la page --></div>
                <div class="btns-group">
                    <a href="#" class="btn-prev">Précédent</a>
                    <button type="submit" class="btn">Terminé</button>
                </div>
            </div>

        </form>


    @elseif(auth()->user()->role_id == 3)
        <form action="{{ route('sujetadmin.store') }}" class="form" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-step form-step-active">
                <div class="wo">
                    <div class="input-group select-group">
                        <label for="position" class="label">Type de sujet</label>
                        <select name="type_sujet_id" id="position" class="select-effect-1" required>
                            <option value="" disabled selected hidden>
                                Choisissez le type de sujet
                            </option>
                            @foreach ($typessujets as $typessujet)
                                <option value="{{ $typessujet->id }}" data-typesujet="{{ $typessujet->libtypesujet }}">{{ $typessujet->libtypesujet }}</option>
                            @endforeach
                        </select>
                        <span class="border"></span>
                        <div class="error-message" id="position-error" style="display: none; color: red;">Veuillez
                            sélectionner un type de sujet.</div>
                    </div>
                    <div class="input-group select-group">
                        <label for="position" class="label">Matière</label>
                        <select name="matiere_id" id="positions" class="select-effect-1" required>
                            <option value="" disabled selected hidden>
                                Sélectionner la matière
                            </option>
                            @if (auth()->user()->role_id == 3)
                                @foreach ($matieres as $matiere)
                                    <option value="{{ $matiere->id }}" data-matiere="{{ $matiere->nommatiere }}">{{ $matiere->nommatiere }}</option>
                                @endforeach
                            @elseif(auth()->user()->role_id == 2)
                                @foreach ($professeurMatiere as $matiere)
                                    <option value="{{ $matiere->id }}" data-matiere ="{{ $matiere->nommatiere }}">{{ $matiere->nommatiere }}</option>
                                @endforeach
                            @endif
                        </select>
                        <span class="border"></span>
                        <div class="error-message" id="positions-error" style="display: none; color: red;">Veuillez
                            sélectionner une matière.</div>
                    </div>
                    <div class="input-group select-group">
                        <label for="position" class="label">Filière</label>
                        <select name="filiere_id" id="positions1" class="select-effect-1" required>
                            <option value="" disabled selected hidden>
                                Sélectionnez la Filière
                            </option>
                            @foreach ($filieres as $filiere)
                                <option value="{{ $filiere->id }}" data-filiere="{{ $filiere->filiere->nomfiliere ?? $filiere->nomfilieretablissement }}">{{ $filiere->filiere->nomfiliere ?? $filiere->nomfilieretablissement }}</option>
                            @endforeach
                        </select>
                        <span class="border"></span>
                        <div class="error-message" id="positions1-error" style="display: none; color: red;">Veuillez
                            sélectionner une filière.</div>
                    </div>
                    <div class="input-group select-group">
                        <label for="position" class="label">Classe</label>
                        <select name="classe_id" id="positions2" class="select-effect-1" required>
                            <option value="" disabled selected hidden>
                                Sélectionnez la classe
                            </option>
                            @foreach ($classes as $classe)
                                <option value="{{ $classe->id }}" data-classe="{{ $classe->nomclasse }}">{{ $classe->nomclasse }}</option>
                            @endforeach
                        </select>
                        <span class="border"></span>
                        <div class="error-message" id="positions2-error" style="display: none; color: red;">Veuillez
                            sélectionner une classe.</div>
                    </div>
                    <div class="input-group time-group">
                        <label for="time" class="label">Durée</label>
                        <input type="text" name="heure" id="time" class="time-effect-1"
                            placeholder="hh:mm" onfocus="this.type='time'" onblur="this.type='time'" required />
                        <span class="border"></span>
                    </div>
                    <div class="input-group ">
                        <label for="consigne" class="label">Consigne</label>
                        <input type="text" name="consigne" id="consigne" class="time-effect-1"
                            placeholder="Entrez une consigne..."  required />
                        <span class="border"></span>
                        <div class="error-message" id="positions5-error" style="display: none; color: red;">Veuillez
                            rempli les consignes.</div>
                    </div><br>
                    <div class="next-step">
                    <a href="#" class="btn btn-next width-24 ml-auto disabled" id="suivants">Suivant</a>
                </div>
                </div>


            </div>

            <div class="form-step">
                <div class="note-container">
                    <span>Note:</span>
                    <input type="number" name="noteprincipale" class="note-value"
                        placeholder="Entrez le nombre total de points *" pattern="\d*" title="Veuillez entrer uniquement des chiffres."/>
                    <a class="enfant_suivant width-24 disabled">Valider</a>
                    <div class="error-message" id="error-message">Le champ ne peut pas être vide.</div>
                    <div class="btns-group avancer">
                        <a href="#" class="btn-prev">Précédent</a>
                        <a href="#" class="btn width-24 disabled valid-not" id="">Suivant</a>
                    </div>
                </div>

                <div class="frm" style="display: none">

                    <div class="sa">
                        <div class="btnas-ends">
                            <i class="fa-solid fa-x delete-questionnaires"></i>
                        </div>
                        <div class="input-group">
                            <input type="text" name="sections[0][titre]" id="phone"
                                placeholder="Sous titre 1" required />
                        </div>
                        <div class="input-group input-with-icon">
                            <input type="text" name="sections[0][soustitre]" id="preview"
                                placeholder="Libellé du sous titre" required />
                            <label for="file-input" class="icon-label"><i class="fa-regular fa-image"></i></label>
                            <input type="file" id="file-input" class="file-input" data-preview="image-preview"
                                data-result="preview" name="sections[0][soustitre][image]" style="display: none" />
                            <img id="image-preview" alt="Aperçu de l'image" />

                        </div>
                    </div>

                    <div class="section-container">
                        <div class="sectio-container">
                            <div class="btnas-end">
                                <!-- <i class="fa-solid fa-x delete-section"></i> -->
                            </div>
                            <div class="sa-1">
                                <div class="questionnaire-container">
                                    <div class="input-group" data-question-index="0">
                                        <div class="questionnaire">
                                            <div class="input-group">
                                                <div class="display-1">
                                                    <div class="textarea">
                                                        <textarea name="sections[0][questions][0][libquestion]" id="previews" required placeholder="Question"></textarea>
                                                    </div>
                                                    <div class="file-inputa">
                                                        <div class="eme">
                                                            <label for="fileinputs"><i
                                                                    class="fa-regular fa-image"></i></label>
                                                            <input type="file" id="fileinputs" class="file-input"
                                                                data-preview="imagepreviews" data-result="previews"
                                                                name="sections[0][questions][0][image]" style="display: none" />
                                                            <img id="imagepreviews" alt="Aperçu de l'image" />

                                                        </div>
                                                        <div>
                                                            <i
                                                                class="fa-solid fa-xmark deletes delete-questionnaire"></i>
                                                        </div>
                                                        <!-- <i class="fa-solid fa-x  delete-section"></i> -->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input-group">
                                                <ol class="circle-list">
                                                    <li>
                                                        <input type="text" class="heckbox-reponce" id="checkbox1"
                                                            name="sections[0][questions][0][reponses][0][libreponse]"
                                                            required placeholder="reponse 1" />
                                                        <input type="file" id="imagine" class="file-input"
                                                            data-preview="imaginations" name="sections[0][questions][0][reponses][0][image]"
                                                            style="display: none" />
                                                        <img id="imaginations" class="img" alt="" />
                                                        <select name="sections[0][questions][0][reponses][0][result]"
                                                            id="mySelect" class="Select">
                                                            <option value="" disabled selected hidden>
                                                                resultat
                                                            </option>
                                                            <option value="bonne_reponse" class="green"
                                                                data-target="1">
                                                                Bonne réponse
                                                            </option>
                                                            <option value="mauvaise_reponse" class="yellow"
                                                                data-target="2">
                                                                Mauvaise réponse
                                                            </option>
                                                            <option value="mauvaise_reponse-" class="red"
                                                                data-target="3">
                                                                Mauvaise réponse(-)
                                                            </option>
                                                        </select>
                                                        <input type="number" id="point" class="point"
                                                            name="sections[0][questions][0][reponses][0][points]"
                                                             placeholder="" />
                                                        <i class="fa-regular fa-trash-can delete delete-btn"></i>
                                                    </li>
                                                </ol>
                                                <a class="add-response" href="#"><input type="radio" />
                                                    <p>
                                                        Ajouter une autre proposition de réponse ou
                                                        <span>ajouter '' Autre ''</span>
                                                    </p>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="#" class="Ajouter-question"><i
                                        class="fa-solid fa-circle-plus"></i>Ajouter une
                                    question</a>
                            </div>
                        </div>
                    </div>

                    <div class="btns-end">
                        <a href="#" class="Ajouter-section"> <i class="fa-solid fa-circle-plus"></i>Ajouter une
                            section</a>
                    </div>

                    <div class="btns-group">
                        <a href="#" class="btn-prev">Précédent</a>
                        <a href="#" class="btn btn-next width-24 endnext endnexts1 disabled">Suivant</a>
                    </div>
                </div>
            </div>

            <div class="form-step">
                <div class="content"><!-- Contenu de la page --></div>
                <div class="btns-group">
                    <a href="#" class="btn-prev">Précédent</a>
                    <button type="submit" class="btn">Terminé</button>
                </div>
            </div>

        </form>


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
                <input type="reset" value="Non" class="btn-secondaire" id="btn-red">
            </div>
        </div>
    </div>



    @endif


    <script>

        function validateSection(sectionElement) {
            // Vérification du titre et du sous-titre
            const titreInput = sectionElement.querySelector('input[name$="[titre]"]');
            const sousTitreInput = sectionElement.querySelector('input[name$="[soustitre]"]');
            console.log(titreInput);
            console.log(sousTitreInput);
            if (!titreInput || !sousTitreInput || !titreInput.value.trim() || !sousTitreInput.value.trim()) {
                console.log("Titre ou sous-titre manquant");
                return false;
            }

            const questions = sectionElement.querySelectorAll('.questionnaire');

            if (questions.length === 0) {
                console.log("Aucune question trouvée");
                return true;
            }

            for (let question of questions) {
                const reponses = question.querySelectorAll('.circle-list li');

                if (reponses.length === 0) {
                    console.log("Aucune réponse trouvée pour une question");
                    return false;
                }

                for (let reponse of reponses) {
                    const libreponseInput = reponse.querySelector('input[name$="[libreponse]"]');
                    const resultSelect = reponse.querySelector('select[name$="[result]"]');
                    const pointsInput = reponse.querySelector('input[name$="[points]"]');
                    const fileInput = reponse.querySelector('input[type="file"]');

                    if (!libreponseInput || !resultSelect || !pointsInput || !fileInput) {
                        console.log("Champs manquants dans une réponse");
                        return false;
                    }

                    const libreponse = libreponseInput.value.trim();
                    const result = resultSelect.value;
                    const points = pointsInput.value.trim();

                    if ((!libreponse && !fileInput.files.length) || !result || !points) {
                        console.log("Champs requis non remplis dans une réponse");
                        return false;
                    }
                }
            }

            return true;
        }

        document.body.addEventListener('change', function(event) {
            if (event.target && event.target.classList.contains('file-input')) {
                const file = event.target.files[0];
                const previewId = event.target.getAttribute('data-preview');
                const imagePreview = document.getElementById(previewId);
                const imaginations = event.target.getAttribute('data-result');
                const inpute = document.getElementById(imaginations);

                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        if (imagePreview) {
                            imagePreview.src = e.target.result;
                            imagePreview.style.display = 'block';
                            inpute.style.paddingLeft = '95px';
                        }
                    };
                    reader.readAsDataURL(file);
                } else {
                    if (imagePreview) {
                        imagePreview.style.display = 'none';
                    }
                }
            }
        });
        document.addEventListener("DOMContentLoaded", function() {
            let counters = {
                section: document.querySelectorAll(".frm").length,
                question: 0,
                response: 0,
                image: 0,
                file: 0,
            };

            function handleSelectChanges(event) {
                const selectElement = event.target;
                const inputElement = selectElement.nextElementSibling;
                const selectedOption = selectElement.options[selectElement.selectedIndex];

                selectElement.classList.remove("yellow", "red", "green");

                if (selectedOption) {
                    if (selectedOption.className) {
                        selectElement.classList.add(selectedOption.className);
                            inputElement.value = 0;
                    }

                    if (inputElement) {
                        inputElement.className = "";
                        if (selectedOption.className) {
                            inputElement.classList.add(selectedOption.className);
                        }

                        if (selectedOption.value === "Manager") {
                            inputElement.disabled = true;
                        } else {
                            inputElement.disabled = false;
                        }
                    }
                }
            }

            function attachAllEvents(sectionElement) {
                attachResponseEvent(sectionElement);
                attachDeleteEvent(sectionElement);
                attachAddQuestionEvent(sectionElement);
                attachDeleteQuestionnaireEvent(sectionElement);
                attachDeleteSectionEvent(sectionElement);

                sectionElement.querySelectorAll('.Select').forEach(selectElement => {
                    selectElement.addEventListener("change", handleSelectChanges);
                    const initialSelectedOption = selectElement.options[selectElement.selectedIndex];
                    if (initialSelectedOption) {
                        if (initialSelectedOption.className) {
                            selectElement.classList.add(initialSelectedOption.className);
                        }
                        const inputElement = selectElement.nextElementSibling;
                        if (inputElement) {
                            inputElement.className = "";
                            if (initialSelectedOption.className) {
                                inputElement.classList.add(initialSelectedOption.className);
                            }
                            if (initialSelectedOption.value === "Manager") {
                                inputElement.disabled = true;
                            } else {
                                inputElement.disabled = false;
                            }
                        }
                    }
                });
            }

            function attachResponseEvent(sectionElement) {
                const addResponseButton = sectionElement.querySelector(".add-response");
                if (addResponseButton) {
                    addResponseButton.addEventListener("click", function(event) {
                        event.preventDefault();
                        const sectionContainer = event.currentTarget.closest('.form');
                        var errormsg = document.querySelector('.msg-error');
                        errormsg.textContent = "";
                        errormsg.style.display = "none";

                        // Vérifier s'il y a déjà 4 réponses
                        const existingResponses = sectionElement.querySelectorAll(".heckbox-reponce");
                        if (existingResponses.length >= 4) {
                            errormsg.style.display = "block";
                            errormsg.textContent = "Vous ne pouvez pas ajouter plus de 4 réponses.";
                            return;  // Empêche l'ajout d'une nouvelle réponse
                        }

                        if (!validateSection(sectionContainer)) {
                            errormsg.style.display = "block";
                            errormsg.textContent = "Veuillez remplir tous les champs requis avant d'ajouter une nouvelle réponse.";
                            return;
                        }

                        const list = sectionElement.querySelector(".circle-list");
                        const newItem = document.createElement("li");
                        const questionIndex = $(this).closest('.input-group').parents().eq(1).data('question-index');
                        const responseIndex = list.children.length;

                        newItem.innerHTML = `
                            <input type="text" class="heckbox-reponce" name="sections[${counters.section - 1}][questions][${questionIndex}][reponses][${responseIndex}][libreponse]" placeholder="réponse ${responseIndex + 1}" required />
                            <input type="file" id="imagine${counters.file++}" class="file-input" data-preview="revange${counters.image++}" name="sections[${counters.section - 1}][questions][${questionIndex}][reponses][${responseIndex}][image]" style="display: none" />
                            <img id="revange${counters.image++}" class="img" alt="" />
                            <select name="sections[${counters.section - 1}][questions][${questionIndex}][reponses][${responseIndex}][result]" id="responseselect${counters.section}${++counters.response}" class="Select">
                                <option value="" disabled selected hidden>résultat</option>
                                <option value="bonne_reponse" class="green" data-target="1">Bonne réponse</option>
                                <option value="mauvaise_reponse" class="yellow" data-target="2">Mauvaise réponse</option>
                                <option value="mauvaise_reponse-" class="red" data-target="3">Mauvaise réponse(-)</option>
                            </select>
                            <input type="number" class="point" name="sections[${counters.section - 1}][questions][${questionIndex}][reponses][${responseIndex}][points]" placeholder="" />
                            <i class="fa-regular fa-trash-can delete delete-btn"></i>`;

                        list.appendChild(newItem);
                        attachDeleteEvent(newItem);
                        newItem.querySelector('.Select').addEventListener("change", handleSelectChanges);
                    });
                }
            }


            function attachDeleteEvent(element) {
                const deleteButton = element.querySelector(".delete-btn");
                if (deleteButton) {
                    deleteButton.addEventListener("click", function() {
                        this.closest("li").remove();
                    });
                }
            }

            function attachAddQuestionEvent(sectionElement) {
                const addQuestionButton = sectionElement.querySelector(".Ajouter-question");
                console.log(addQuestionButton);
                if (addQuestionButton) {
                    addQuestionButton.addEventListener("click", function(event) {
                        event.preventDefault();
                        const sectionContainer = event.currentTarget.closest('.form');
                        var errormsg = document.querySelector('.msg-error');
                        errormsg.textContent ="";
                        errormsg.style.display ="none";
                        if (!validateSection(sectionContainer)) {
                            errormsg.style.display ="block";
                            errormsg.textContent ="Veuillez remplir tous les champs requis avant d'ajouter une nouvelle question.";
                            return;
                        }
                        const questionIndex = sectionElement.querySelectorAll('.questionnaire').length;
                        counters.question++;
                        const questionnaireContainer = sectionElement.querySelector(
                            ".questionnaire-container");
                        if (!questionnaireContainer) return;


                        const newQuestionnaire = document.createElement("div");
                        newQuestionnaire.className = "input-group";
                        newQuestionnaire.setAttribute('data-question-index', questionIndex);

                        newQuestionnaire.innerHTML = `
                    <div class="questionnaire">
                        <div class="input-group">
                            <div class="display-1">
                                <div class="textarea">
                                    <textarea name="sections[${counters.section - 1}][questions][${questionIndex}][libquestion]" id="previews${counters.file++}" required placeholder="Question"></textarea>
                                </div>
                                <div class="file-inputa">
                                    <div class="eme">
                                        <label for="fileinputs${counters.file++}"><i class="fa-regular fa-image"></i></label>
                                        <input type="file" id="fileinputs${counters.file++}" data-preview="imagepreviews${counters.image++}" data-result="previews${counters.file++}" class="file-input" name="sections[${counters.section - 1}][questions][${questionIndex}][image]" style="display: none;">
                                        <img id="imagepreviews${counters.image++}" alt="Aperçu de l'image" />
                                    </div>
                                </div>
                                <div>
                                    <i class="fa-solid fa-xmark deletes delete-questionnaire"></i>
                                </div>
                            </div>
                        </div>
                        <div class="input-group">
                            <ol class="circle-list">
                                <li>
                                    <input type="text" class="heckbox-reponce" name="sections[${counters.section - 1}][questions][${questionIndex}][reponses][0][libreponse]" placeholder="reponse 1" required />
                                    <input type="file" id="imagine${counters.file++}" class="file-input" data-preview="imaginationss${counters.image++}" name="sections[${counters.section - 1}][questions][${questionIndex}][reponses][0][image]" style="display: none" />
                                    <img id="imaginationss${counters.image++}" class="img" alt="" />
                                    <select name="sections[${counters.section - 1}][questions][${questionIndex}][reponses][0][result]" id="responseselect${counters.section}${++counters.response}" class="Select">
                                        <option value="" disabled selected hidden>resultat</option>
                                        <option value="bonne_reponse" class="green" data-target="1">Bonne réponse</option>
                                        <option value="mauvaise_reponse" class="yellow" data-target="2">Mauvaise réponse</option>
                                        <option value="mauvaise_reponse-" class="red" data-target="3">Mauvaise réponse(-)</option>
                                    </select>
                                    <input type="number" class="point" name="sections[${counters.section - 1}][questions][${questionIndex}][reponses][0][points]"  placeholder="" />
                                    <i class="fa-regular fa-trash-can delete delete-btn"></i>
                                </li>
                            </ol>
                            <a class="add-response" href="#"><input type="radio"><p>Ajouter une autre proposition de réponse ou <span>ajouter '' Autre ''</span></p></a>
                        </div>
                    </div>`;
                    const spacer = document.createElement("div");
                    spacer.className = "question-separator";

                        questionnaireContainer.appendChild(spacer);
                        questionnaireContainer.appendChild(newQuestionnaire);
                        attachAllEvents(newQuestionnaire);
                    });
                }
            }

            function attachDeleteQuestionnaireEvent(sectionElement) {
                const deleteQuestionnaireButtons = sectionElement.querySelectorAll(".delete-questionnaire");

                deleteQuestionnaireButtons.forEach(function(button) {
                    button.addEventListener("click", function() {
                        const questionnaire = this.closest(".questionnaire");

                        if (questionnaire) {
                            const inputGroup = questionnaire.closest(".input-group");

                            if (inputGroup) {
                                const previousElement = inputGroup.previousElementSibling;

                                if (previousElement && previousElement.classList.contains(
                                        "question-separator")) {
                                    previousElement.remove();
                                }
                                questionnaire.remove();
                                inputGroup.remove();
                            }
                        }
                    });
                });
            }



            function attachDeleteSectionEvent(sectionElement) {
                const deleteSectionButton = sectionElement.querySelector(".delete-section");
                if (deleteSectionButton) {
                    deleteSectionButton.addEventListener("click", function() {
                        this.closest(".sectio-container").remove();
                    });
                }
            }

            document.querySelector(".Ajouter-section")?.addEventListener("click", function(event) {
                event.preventDefault();
                const sectionContainer = event.currentTarget.closest('.form');
                var errormsg = document.querySelector('.msg-error');
                errormsg.textContent ="";
                errormsg.style.display ="none";
                if (!validateSection(sectionContainer)) {
                    errormsg.style.display ="block"
                    errormsg.textContent ="Veuillez remplir tous les champs requis avant d'ajouter une nouvelle section.";
                    return;
                }
                const sectionsContainer = document.querySelector(".section-container");
                if (sectionsContainer) {
                    counters.section++;

                    const newSections = document.createElement("div");
                    newSections.className = "sa";
                    newSections.innerHTML = `
                <div class="btnas-ends">
                    <i class="fa-solid fa-x delete-questionnaires"></i>
                </div>
                <div class="input-group">
                    <input type="text" name="sections[${counters.section - 1}][titre]" id="phone" placeholder="Sous titre ${counters.section}" required />
                </div>
                <div class="input-group input-with-icon">
                    <input type="text" name="sections[${counters.section - 1}][soustitre]" id="preview${counters.file++}" placeholder="Libellé du sous titre" required />
                    <label for="file-input${counters.file++}" class="icon-label"><i class="fa-regular fa-image"></i></label>
                    <input type="file" class="file-input" id="file-input${counters.file++}" data-preview="image-preview${counters.image++}" data-result="preview${counters.file++}" name="sections[${counters.section - 1}][image]" style="display: none" />
                    <img id="image-preview${counters.image++}" alt="Aperçu de l'image" />
                </div>`;
                    const newSection = document.createElement("div");
                    newSection.className = "sectio-container";
                    newSection.setAttribute('data-section-index', counters.section - 1);
                    newSection.innerHTML = `
                <div class="btnas-end"></div>
                <div class="sa-1">
                    <div class="questionnaire-container">
                        <div class="input-group" data-question-index="0">
                            <div class="questionnaire">
                                <div class="input-group">
                                    <div class="display-1">
                                        <div class="textarea">
                                            <textarea name="sections[${counters.section - 1}][questions][0][libquestion]" id="previewz${counters.file++}" required placeholder="Question"></textarea>
                                        </div>
                                        <div class="file-inputa">
                                            <div class="eme">
                                                <label for="fileinputs${counters.file++}"><i class="fa-regular fa-image"></i></label>
                                                <input type="file" id="fileinputs${counters.file++}" data-preview="imagepreviews${counters.image++}" data-result="previewz${counters.file++}" class="file-input" name="sections[${counters.section - 1}][questions][image]" style="display: none;">
                                                <img id="imagepreviews${counters.image++}" alt="Aperçu de l'image" />
                                            </div>
                                        </div>
                                        <div>
                                            <i class="fa-solid fa-xmark deletes delete-questionnaire"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group">
                                    <ol class="circle-list">
                                        <li>
                                            <input type="text" class="heckbox-reponce" name="sections[${counters.section - 1}][questions][0][reponses][0][libreponse]" placeholder="reponse 1" required />
                                            <input type="file" id="imagine${counters.file++}" class="file-input" data-preview="cool${counters.image++}" name="sections[${counters.section - 1}][questions][0][reponses][0][image]" style="display: none" />
                                            <img id="cool${counters.image++}" class="img" alt="" />
                                            <select name="sections[${counters.section - 1}][questions][0][reponses][0][result]" id="responseselect${counters.section}${++counters.response}" class="Select">
                                                <option value="" disabled selected hidden>resultat</option>
                                                <option value="bonne_reponse" class="green" data-target="1">Bonne réponse</option>
                                                <option value="mauvaise_reponse" class="yellow" data-target="2">Mauvaise réponse</option>
                                                <option value="mauvaise_reponse-" class="red" data-target="3">Mauvaise réponse(-)</option>
                                            </select>
                                            <input type="number" class="point" name="sections[${counters.section - 1}][questions][0][reponses][0][points]" placeholder="" />
                                            <i class="fa-regular fa-trash-can delete delete-btn"></i>
                                        </li>
                                    </ol>
                                    <a class="add-response" href="#"><input type="radio"><p>Ajouter une autre proposition de réponse ou <span>ajouter '' Autre ''</span></p></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="#" class="Ajouter-question"> <i class="fa-solid fa-circle-plus"></i>Ajouter une question</a>
                </div>`;
                    sectionsContainer.appendChild(newSections);
                    attachAllEvents(newSections);
                    sectionsContainer.appendChild(newSection);
                    attachAllEvents(newSection);
                }
            });

            // Correct Validation Handling
            let isModified = false;

            document.querySelector(".valid-not")?.addEventListener("click", function(event) {
    var input = document.querySelector('.note-value');
    var errorMessage = document.getElementById('error-message');

    // Vérifie si le champ est vide
    if (input.value.trim() === '') {
        event.preventDefault();
        errorMessage.style.display = 'block';
        input.focus();
    } else {
        errorMessage.style.display = 'none';
        const noteValue = input.value;
        const frm = document.querySelector(".frm");

        if (frm) {
            frm.style.display = "block";
        }

        // Supprimer l'élément avec la classe "avancer"
        const elementToRemoves = document.querySelector(".avancer");
        if (elementToRemoves) {
            elementToRemoves.remove();
        }

        // Supprimer les classes "enfant_suivant" et "width-24" de l'élément <a>
        const elementToModify = document.querySelector("a.enfant_suivant.width-24");
        if (elementToModify) {
            elementToModify.classList.remove("enfant_suivant", "width-24"); // Retire les deux classes
            elementToModify.classList.add("edit-button"); // Ajoute la classe "edit-button"
            elementToModify.id = 'edit-buttons'; // Ajoute l'ID
            elementToModify.innerHTML = '<i class="fa-solid fa-pen-to-square" id="square"></i>'; // Change le contenu
        }

        const frmNoteInput = document.querySelector(".frm .note-value");
        if (frmNoteInput) {
            frmNoteInput.value = noteValue;
        }

        // Ajoute un écouteur d'événement pour gérer la modification
        document.getElementById('edit-buttons')?.addEventListener("click", function() {
            const frmNoteInputs = document.querySelector(".note-value");
            frmNoteInputs.disabled = false;
            frmNoteInputs.focus();

            // Marque le champ comme modifié
            isModified = true;
        });
    }
});


            // Ajoutez un gestionnaire de soumission du formulaire
            document.querySelector("form").addEventListener("submit", function(event) {
                if (!isModified) {
                    // Si le champ n'a pas été modifié, envoyer la première soumission
                    // Action pour la première soumission
                } else {
                    // Si le champ a été modifié, envoyer la deuxième soumission
                    // Action pour la deuxième soumission
                }
            });



            document.querySelectorAll(".sectio-container").forEach(attachAllEvents);
        });



        $(document).ready(function () {
            let formData = new FormData();
            var dataAtributes = {};
            var structuredData = null;
            var fileReadPromises = [];


            var structuredData = null;

$(".btn-next").click(function (e) {
    e.preventDefault();

    // Initialisation
    var formData = new FormData();
    var fileReadPromises = [];
    var dataAtributes = {};
    var button = $(this);
    var coefficient;
    var ects;
    var matiereId = $('#positions').val();


    // Collecte des données
    $('.form-step').find('input, select, textarea').each(function() {
        var inputName = $(this).attr('name');
        var inputValue = $(this).val();

         // Ajouter la durée dans FormData
        if (inputName === 'heure') {
            formData.append(inputName, inputValue);
        }

        // Vérifier si l'input est de type 'file'
        if ($(this).attr('type') === 'file' && this.files.length > 0) {
            $.each(this.files, function(i, file) {
                var reader = new FileReader();
                // Créer une promesse pour chaque fichier
                var promise = new Promise(function(resolve) {
                    reader.onload = function(e) {
                        formData.append(inputName, e.target.result);
                        resolve();
                    };
                    reader.readAsDataURL(file);
                });
                fileReadPromises.push(promise);
            });
        } else {
            // Ajouter la valeur normale dans FormData
            if (inputValue) {
                formData.append(inputName, inputValue);
            }
        }

        // Si c'est un select, récupérer les attributs supplémentaires
        if ($(this).is('select')) {
            var option = $(this).find(':selected');
            var optionData = option.data();
            $.each(optionData, function(key, value) {
                dataAtributes[key] = value;
            });
        }
    });
    console.log(dataAtributes);

    Promise.all(fileReadPromises).then(function() {
        if (button.hasClass('endnext')) {

            $.ajax({
                url: '{{ route('recuperer.coefficient.ects', ':id') }}'.replace(':id', matiereId),
                method: 'GET',
                success: function(response) {
                    if (response.coefficient !== undefined) {
                        dataAtributes.coefficient = response.coefficient;
                    } else {
                        dataAtributes.coefficient = 0;
                    }

                    if (response.ects !== undefined) {
                        dataAtributes.ects = parseFloat(response.ects);
                    } else {
                        dataAtributes.ects = 0;
                    }

            structuredData = structureData(formData);

            var counter = 1;
                var count_qustn = 1;
                const contentHtml = `
                    <div class="header">
                        <div class="logo"><img src="{{ asset('images/pigier.png') }}" class="img-sheet" height="50" width="auto" alt=""></div>
                        <div class="title">
                            <div class="devoir"><span class="devoir-text">${dataAtributes.typesujet}</span></div>
                            <div class="devtitle">
                                <div class="devoir"><span class="left-title">Matière :</span> ${dataAtributes.matiere.toUpperCase()}</div>
                                <div class="devoir"><span class="left-title">Filière :</span> ${dataAtributes.filiere.toUpperCase()}</div>

                            </div>
                        </div>
                        <div class="info">
                            <div>Classe :<span class="info-text"> ${dataAtributes.classe}</span></div>
                            <div>Durée : <span class="info-text">${formData.get('heure')}</span></div>
                            <div>Coefficient : <span class="info-text">${dataAtributes.coefficient}</span></div>
                            <div>ECTS : <span class="info-text">${dataAtributes.ects}</span></div>
                        </div>
                    </div>

                    <div class="main-title">
                        Répondre aux QCM sur la fiche ROMNote <span class="points">${formData.get('noteprincipale')} pts</span>
                    </div>

                    <div class="exercises">

                        ${structuredData.sections.map(section => `

                            <div class="exercise">
                                <div class="exercise-title">EXERCICE ${counter++} : ${section.titre} <span class="points">${calculatePoints(section.questions)} pts</span></div>
                                <div class="exercise-content">
                                ${section.soustitre ? `
                                    <div class="exercise-description">${section.soustitre}</div>
                                    ` : ''}
                                    ${section.image ? `
                                    <div class="exercise-image">
                                        <img src="${section.image}"  height="100" width="auto" alt="Image de l'exercice" class="img-sheet"/>
                                    </div>
                                    ` : ''}
                                </div>
                                ${section.questions.map(question => `
                                    <div class="question">
                                        <div class="question-content">
                                        ${question.libquestion ? `
                                            <span class="question-text">${count_qustn++} - ${question.libquestion}</span>
                                            ` : ''}
                                            ${question.image ? `
                                            <div class="question-image">
                                                <img src="${question.image}" alt="Image de la question" class ="img-sheet" />
                                            </div>
                                            ` : ''}
                                            <span class="points">(${calculateQuestionPoints(question.reponses)} pts)</span>
                                        </div>
                                    </div>

                                    <div class="options">
                                        <div class="options-group">
                                            ${question.reponses.map((response, responseIndex) => `
                                                <div class="option-content">
                                                    <span class="option-text"><span class="circle">${String.fromCharCode(65 + responseIndex)}</span> ${response.libreponse}</span>
                                                </div>
                                            `).join('')}
                                        </div>
                                        ${question.reponses.some(r => r.image) ? `
                                            <div class="option-image">
                                                <img src="${question.reponses.image}" alt="Image de la réponse" />
                                            </div>
                                        ` : ''}
                                    </div>

                                `).join('')}
                            </div>
                        `).join('')}
                    </div>

                    <div class="page-footer">
                        <div class="footer-sheet">
                            <div class="footer-logo">
                                Pigier Côte d'Ivoire l'Université des Métiers
                            </div>
                            <div class="page-number">
                                Page 1 sur 1
                            </div>
                        </div>
                        <div class="qr-code">
                            <img src="qr.png" height="75" width="auto" alt="">
                        </div>
                    </div>
                `;

                // Insérer le HTML dynamique
                $('.content').html(contentHtml);
            },
                error: function(error) {
                    console.error("Erreur lors de la récupération des données : ", error);
                }
            });

    }
    }).catch(function(error) {
        console.error("Erreur lors de la lecture des fichiers : ", error);
    });
});

// Fonction de structuration des données
function structureData(formData) {
    var structuredData = {
        sections: []
    };
    var sectionIndex = 0;

    // Vérification des sections
    while (formData.get(`sections[${sectionIndex}][titre]`) !== null) {
        var sectionData = {
            titre: formData.get(`sections[${sectionIndex}][titre]`) || null,
            soustitre: formData.get(`sections[${sectionIndex}][soustitre]`) || null,
            image: formData.get(`sections[${sectionIndex}][soustitre][image]`) || null,
            questions: []
        };

        var questionIndex = 0;
        while (formData.get(`sections[${sectionIndex}][questions][${questionIndex}][libquestion]`) !== null) {
            var questionData = {
                libquestion: formData.get(`sections[${sectionIndex}][questions][${questionIndex}][libquestion]`) || null,
                image: formData.get(`sections[${sectionIndex}][questions][${questionIndex}][image]`) || null,  // Ajout de l'image de la question
                reponses: []
            };

            var responseIndex = 0;
            while (formData.get(`sections[${sectionIndex}][questions][${questionIndex}][reponses][${responseIndex}][libreponse]`) !== null) {
                var responseData = {
                    libreponse: formData.get(`sections[${sectionIndex}][questions][${questionIndex}][reponses][${responseIndex}][libreponse]`) || null,
                    result: formData.get(`sections[${sectionIndex}][questions][${questionIndex}][reponses][${responseIndex}][result]`) || null,
                    points: formData.get(`sections[${sectionIndex}][questions][${questionIndex}][reponses][${responseIndex}][points]`) || null,
                    //image: formData.get(`sections[${sectionIndex}][questions][${questionIndex}][reponses][${responseIndex}][image]`) || null  // Ajout de l'image de la réponse
                };

                questionData.reponses.push(responseData);
                responseIndex++;
            }

            sectionData.questions.push(questionData);
            questionIndex++;
        }

        structuredData.sections.push(sectionData);
        sectionIndex++;
    }

    return structuredData;
}

            function calculatePoints(questions) {
                return questions.reduce((total, question) => total + calculateQuestionPoints(question.reponses), 0);
            }

            function calculateQuestionPoints(reponses) {
                return reponses.reduce((total, response) => response.result === 'bonne_reponse' ? total + (parseInt(response.points) || 0) : total, 0);
            }

            // Gérer le clic sur "Précédent"
            $(".btn-prev").click(function (e) {
                e.preventDefault();

                var currentStep = $(this).closest(".form-step");
                var prevStep = currentStep.prev(".form-step");


                prevStep.find('input, select, textarea, file').each(function () {
                    var inputName = $(this).attr('name');
                    if (formData[inputName]) {
                        $(this).val(formData[inputName]);
                    }
                });
            });


        $(".valid-not").click(function (e) {
            e.preventDefault();

            var currentStep = $(this).closest(".form-step");

            var noteValue = currentStep.find("input[name='noteprincipale']").val();

            if (noteValue) {
                formData["noteprincipale"] = noteValue;
            } else {
                console.error("Erreur : noteprincipale est vide.");
            }

            currentStep.next(".form-step").find('input, select, textarea, file').each(function () {
                var inputName = $(this).attr('name');
                if (formData.get(inputName)) {
                    $(this).val(formDatas.get(inputName));
                }
            });
        });

    // Champs de fichier de type input
    $(".file-input").on("change", function (e) {
        var previewId = $(this).data("preview");
        var file = e.target.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $("#" + previewId).attr("src", e.target.result);
            };
            reader.readAsDataURL(file);
        }
    });
});
// modal de retour
 const closeModalBtn = document.getElementById("close-modal-btn");
    const modal = document.getElementById("modalbtn");
    const fermerBtn = document.getElementById("fermetures1");
    const nonBtn = document.getElementById("btn-red");

    closeModalBtn.addEventListener("click", () => {
        modal.style.display = "flex";
    });
    fermerBtn.addEventListener("click", () => {
        modal.style.display = "none";
    });

    nonBtn.addEventListener("click", () => {
        modal.style.display = "none";
    });
    window.addEventListener("click", (event) => {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    });
    </script>
<script>
    function checkSelects() {
        const selects = document.querySelectorAll('.wo select');
        const inputselect = document.getElementById('time');
        const inputselect1 = document.getElementById('consigne');
        let allFilled = true;

        selects.forEach(select => {
            if (select.value === "") {
                allFilled = false;
            }
        });

        if (inputselect.value === "") {
            allFilled = false;
        }
        if (inputselect1.value === "") {
            allFilled = false;
        }

        const suivantButton = document.getElementById('suivants');
        if (allFilled) {
            suivantButton.classList.remove('disabled');
            suivantButton.style.backgroundColor="#38b293";
        } else {
            suivantButton.classList.add('disabled');
            suivantButton.style.backgroundColor="grey";

        }
    }

    document.querySelectorAll('.wo select').forEach(select => {
        select.addEventListener('change', checkSelects);
    });

    document.getElementById('time').addEventListener('input', checkSelects);
    document.getElementById('consigne').addEventListener('input', checkSelects);


        </script>

    <script>
    function checkSelectContainer() {
        const notecontainer = document.querySelector('.note-container input');
        const suivantButton2 = document.querySelector('.valid-not');
        const suivantButton1 = document.querySelector('.enfant_suivant');

        // Vérifier si l'input est rempli
        if (notecontainer && notecontainer.value !== "") {
            suivantButton1.classList.remove('disabled');
            suivantButton1.style.backgroundColor = "#003cc8";
            suivantButton1.addEventListener('click',function(){
                suivantButton2.classList.remove('disabled');
                suivantButton2.style.backgroundColor = "#003cc8";

            })
        } else {
            suivantButton1.classList.add('disabled');
            suivantButton2.classList.add('disabled');
            suivantButton1.style.backgroundColor = "grey";
            suivantButton2.style.backgroundColor = "grey";
        }
    }

    const input = document.querySelector('.note-container input');
    if (input) {
        input.addEventListener('input', checkSelectContainer);
    }
            </script>

            <script>
                function alignLastAjouterQuestion() {
        const ajouterQuestionLinks = document.querySelectorAll('.Ajouter-question');
        const dernierAjouterQuestion = ajouterQuestionLinks[ajouterQuestionLinks.length - 1];
        const ajouterSection = document.querySelector('.ajouter-section');

        if (dernierAjouterQuestion && ajouterSection) {
            const sectionRect = ajouterSection.getBoundingClientRect();

            dernierAjouterQuestion.style.position = 'absolute';
            dernierAjouterQuestion.style.left = `${sectionRect.left}px`;
            dernierAjouterQuestion.style.top = `${sectionRect.top}px`;
        }
    }

    alignLastAjouterQuestion();

            </script>

    <script>
        function toggleAjouterSection() {
            const inputs = document.querySelectorAll('.form input[type="text"]');
            const ajouterSectionLink = document.querySelector('.ajouter-section');

            let allFilled = true;

            inputs.forEach(input => {
                if (input.value === "") {
                    allFilled = false;
                }
            });

            if (allFilled) {
                ajouterSectionLink.classList.remove('disabled');
            } else {
                ajouterSectionLink.classList.add('disabled');
            }
        }

        const inputs = document.querySelectorAll('.form input[type="text"]');
        inputs.forEach(input => {
            input.addEventListener('input[type="text"]', toggleAjouterSection);
        });

        toggleAjouterSection();
    </script>
    <script>
const parentContainer = document.querySelector(".parent-container"); // Remplace par le bon sélecteur de conteneur

if (parentContainer) {
    parentContainer.addEventListener("click", function(event) {
        if (event.target.classList.contains("delete-questionnaires")) {
            const grandParent = event.target.closest(".sa");

            if (grandParent) {
                const sibling = grandParent.nextElementSibling; // Frère direct

                grandParent.remove();

                if (sibling && sibling.classList.contains("section-container")) {
                    sibling.remove();
                }
            }
        }
    });
}

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

    // Vérifier l'état enregistré dans localStorage
    const isDarkMode = localStorage.getItem('isDarkMode') === 'true';

    // Fonction pour appliquer les styles en fonction du mode
    const applyStyles = (darkMode) => {
        if (darkMode) {
            sunIcon.style.display = 'none';
            moonIcon.style.display = 'flex';

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


            } else {
            sunIcon.style.display = 'flex';
            moonIcon.style.display = 'none';


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
});


</script>

</body>

</html>
