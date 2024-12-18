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
    <script src="{{ asset('frontend/dashboard/js/list.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('frontend/dashboard/css/dash.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/dashboard/html/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/dashboard/css/lists.css') }}">
    <link rel="icon" href="{{ asset('assets/img/FaviconROMNOTE.png') }}" type="image/png">

    <title>Sujets</title>
</head>
<style>
    .modal-content {
        background-color: #f8f9fa;
        border: none;
    }

    .modal-header {
        border-bottom: none;
        padding: 20px 20px 0;
        position: relative;
    }

    .modal-title {
        color: #4A41C5;
        font-size: 1.5rem;
        font-weight: bold;
    }

    .close {
        color: #4A41C5;
        border: none;
        background-color: transparent;
        position: absolute;
        right: -1%;
        top: -20%;
    }

    .close span {
        font-size: 3rem;
    }

    .modal-body {
        padding: 20px;
    }

    .add-printer {
        margin-bottom: 20px;
    }

    .add-button {
        background-color: #e8eaf6;
        color: #4A41C5;
        border: none;
        padding: 10px 15px;
        border-radius: 5px;
        font-weight: bold;
    }

    .add-button i {
        margin-right: 5px;
    }

    h3 {
        color: #4A41C5;
        font-size: 1.2rem;
        margin-bottom: 15px;
    }

    .devices-list {
        list-style-type: none;
        padding: 0;
    }

    .devices-list li {
        background-color: #ffffff;
        margin-bottom: 10px;
    }

    .add-printer-scanner {
        margin-bottom: 20px;
    }

    .add-button {
        background-color: #F1F1FF;
        border: none;
        padding: 12px 20px;
        font-size: 16px;
        color: #3F2CA3;
        border-radius: 0%;
        display: flex;
        align-items: center;
        cursor: pointer;
    }

    h3 {
        color: #3F2CA3;
        font-size: 18px;
    }

    .fa-plus {
        margin-right: 8px;
        font-size: 18px;
    }

    /* Style de la liste des appareils */
    .devices-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .devices-list li {
        display: flex;
        align-items: center;
        padding: 8px 8px;
        color: #3F2CA3;
    }

    .device-icon,
    .add-button i {
        background-color: #3F2CA3;
        color: white;
        width: 40px;
        height: 40px;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-right: 10px;
        border-radius: 5px;
    }



    .device-icon svg {
        width: 24px;
        height: 24px;
        fill: white;
    }

    .titres {
        display: none;
    }

    #inscriptionTables0 {
        display: none;
    }

    .fa-solid.fa-trash {
        color: #ffd100 !important;
    }

    .barre {
    position: relative;
    }

    .barre::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 0;
        height: 1px;
        background-color: rgb(11, 53, 120);
        width: calc(100% - 24%); /* Ajustez cette largeur pour s'arrêter à "statut" */
        transform: translateY(-50%);
        z-index: 1;
    }

    .disabled-buttons a,
    .disabled-buttons button {
        pointer-events: none; /* Désactive les clics */
        opacity: 1; /* Garde l'opacité à 1 pour que la couleur appliquée soit bien visible */
        color: #B0B0B0 !important; /* Remplace la couleur de texte par du gris */
        border-color: #E0E0E0 !important; /* Remplace la couleur de bordure par du gris */
        fill: #B0B0B0 !important; /* Pour les icônes SVG ou toute couleur remplie */
    }

    /* Applique la couleur grise aux icônes dans les liens et boutons désactivés */
    .disabled-buttons a i,
    .disabled-buttons button i,
    .disabled-buttons a .fa-solid,
    .disabled-buttons button .fa-solid {
        color: #B0B0B0 !important; /* Remplace la couleur des icônes par du gris */
        fill: #B0B0B0 !important; /* Assure la couleur grise pour les icônes SVG */
    }

    /* Pour les effets de hover et d'active - désactiver */
    .disabled-buttons a:hover,
    .disabled-buttons button:hover,
    .disabled-buttons a:active,
    .disabled-buttons button:active {
        color: #B0B0B0 !important; /* Garde le texte en gris même au hover */
        background-color: #E0E0E0 !important; /* Garde le fond gris au hover */
        border-color: #E0E0E0 !important; /* Garde la bordure grise au hover */
    }


    /* Disable only the editTeacher1 button when status is "Non Corrigé" */
    .non-corrige-status .editTeacher1.disabled {
        pointer-events: none;
        opacity: 0.5; /* Optional dimming */
    }

    /* Appliquer un style pour les boutons désactivés */
    button.disabled {
        pointer-events: none; /* Désactive les clics */
        opacity: 0.5; /* Rend le bouton visuellement atténué */
        color: #B0B0B0 !important; /* Change la couleur de l'icône ou du texte en gris */
    }

    /* Style pour les icônes à l'intérieur des boutons désactivés */
    button.disabled i {
        color: #B0B0B0 !important; /* Change la couleur des icônes en gris */
    }

    /* Facultatif : applique une couleur de fond gris clair pour les boutons désactivés */



</style>

<body>
    <!-- header -->
    @include('admin.include.menu')
    <!-- accueil -->
    <div class="container printableArea principal">
        <div class="printableArea">
            <h2 class="text-start text-title titre">Liste des sujets</h2>
            <div class="d-flex justify-content-between align-items-center flex-wrap action-buttons mb-3 no-print">
                <div class="d-flex search-container">
                    <i class="fa fa-search"></i>
                    <input id="searchInput" type="text" id="search" class="form-control search-bar"
                        placeholder="Rechercher...">
                </div>

                <div class="d-flex justify-content-end flex-wrap action-buttons">
                    <button class="btn btn-custom btn-imprimer" id="printBtn" onclick="printDiv()"><i
                            class="fa fa-print"></i> Imprimer</button>
                    {{-- <button class="btn btn-custom btn-importer" data-bs-toggle="modal" data-bs-target="#importModal"><i
                            class="fa fa-upload"></i> Importer</button> --}}

                    <!-- Dropdown for Export options -->
                    <div class="btn-group">
                        <button class="btn btn-custom btn-exporter dropdown-toggle" type="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-download"></i> Exporter
                        </button>
                        <ul class="dropdown-menu" id="menu">
                            <!-- Assurez-vous que ces liens ont bien l'attribut href="#" et que onclick est correct -->
                            <li><a class="dropdown-item" id="excel" href="#"
                                    onclick="exportTableToExcel('#inscriptionTable')">Excel</a></li>
                            <li><a class="dropdown-item" id="pdf" href="#"
                                    onclick="exportTableToPDF('#inscriptionTable')">PDF</a></li>

                        </ul>
                    </div>

                    @if (intval(auth()->user()->role_id) === 2)
                        <a href="{{ route('sujetprofesseur.create') }}" class="btn btn-custom btn-ajouter"
                            onclick="window.location.href='{{ asset('frontend/dashboard/html/sujt.html') }}'"><i
                                class="fa fa-plus"></i> Creer un sujet</a>
                    @elseif(intval(auth()->user()->role_id) === 3)
                        <a href="{{ route('sujetadmin.create') }}" class="btn btn-custom btn-ajouter"
                            onclick="window.location.href='{{ asset('frontend/dashboard/html/sujt.html') }}'"><i
                                class="fa fa-plus"></i> Creer un sujet</a>
                    @endif

                    <div class="dropdown" id="filterMenu">
                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-filter"></i> Filtrer par
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#"
                                    data-bs-toggle="dropdown">Matière</a>
                                <ul class="dropdown-menu">
                                    {{-- @foreach ($etudiants as $etudiant)
                                        <li>
                                            <a class="dropdown-item" href="#"
                                                onclick="applyFilter('Genre', '{{ $etudiant->genre }}')">
                                                {{ $etudiant->genre }}
                                            </a>
                                        </li>
                                    @endforeach --}}
                                </ul>
                            </li>
                            {{--  --}}
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#"
                                    data-bs-toggle="dropdown">Filière</a>
                                <ul class="dropdown-menu">
                                    {{-- @foreach ($etudiants as $etudiant)
                                        <li>
                                            <a class="dropdown-item" href="#"
                                                onclick="applyFilter('Classe', '{{ $etudiant->nomclasse }}')">
                                                {{ $etudiant->nomclasse }}
                                            </a>
                                        </li>
                                    @endforeach --}}
                                </ul>
                            </li>

                            {{--  --}}
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#"
                                    data-bs-toggle="dropdown">Classes</a>
                                <ul class="dropdown-menu">
                                    {{-- @foreach ($etudiants as $etudiant)
                                        <li>
                                            <a class="dropdown-item" href="#"
                                                onclick="applyFilter('Classe', '{{ $etudiant->nomclasse }}')">
                                                {{ $etudiant->nomclasse }}
                                            </a>
                                        </li>
                                    @endforeach --}}
                                </ul>
                            </li>

                        </ul>
                    </div>
                </div>



            </div>
            <!-- Table for listing teachers -->
            <div id="noResults">Aucun résultat trouvé</div>
            <div class="table-responsive">
                <table id="inscriptionTable" class="table">
                    <thead class="table-aaa">
                        <tr class="aa">
                            <th>Code</th>
                            <th>Matière</th>
                            <th>Filière</th>
                            <th>Classes</th>
                            <th>Date de création</th>
                            <th>statut</th>
                            <th class="no-print">Action</th>
                        </tr>
                    </thead>&nbsp;&nbsp;
                    <tbody>
                        @foreach ($listesujets as $listesujet)
                        <tr class="{{ $listesujet->is_deleted ? 'barre' : '' }}">
                            {{-- <td data-label="Identifiant">{{ $listesujet->id }}</td> --}}
                            <td data-label="Code">{{ $listesujet->code }}</td>
                            <td data-label="Matière">{{ $listesujet->matiere->nommatiere }}</td>
                            <td data-label="Filière">
                                {{ $listesujet->filiere->nomfiliere ?? $listesujet->filiere->etablissementFilieres->nomfilieretablissement }}
                            </td>
                            <td data-label="Classes">{{ $listesujet->classe->nomclasse }}</td>
                            <td data-label="Date de création">
                                {{ \Carbon\Carbon::parse($listesujet->created_date)->format('d - m - Y') }}
                            </td>
                            <td data-label="statut">
                                <span
                                    style="background-color: {{ $listesujet->status === 'corrige' ? '#9FE4B6' : '#F9D465' }};
                                        color: {{ $listesujet->status === 'corrige' ? '#024802' : '#6E5400' }};
                                        padding: 0px 10px;
                                        border-radius: 20px;">
                                    {{ $listesujet->status === 'non-corrige' ? 'Non Corrigé' : 'Corrigé' }}
                                </span>
                            </td>


                            <td data-label="Action" class="action-icons no-print {{ $listesujet->is_deleted ? 'disabled-buttons' : ($listesujet->status === 'non-corrige' ? 'non-corrige-status' : '') }}">
                                @if (auth()->user()->role_id == 3)
                                        <a href="{{ route('sujetadmin.details', ['id' => $listesujet->id]) }}"> <i
                                                class="fas fa-eye"></i></a>
                                    @elseif (auth()->user()->role_id == 2)
                                        <a href="{{ route('sujetprofesseur.details', ['id' => $listesujet->id]) }}">
                                            <i class="fas fa-eye"></i></a>
                                    @endif

                                    <button class="printSujet {{ $listesujet->status === 'corrige' ? 'disabled' : '' }}" data-idsujet="{{ $listesujet->id }}">
                                        <i style="color: #4A41C5;" class="fa-solid fa-print"></i>
                                    </button>

                                    <button data-bs-toggle="modal" data-bs-target="#impri" class="imprip {{ $listesujet->status === 'corrige' ? 'disabled' : '' }}" data-idsujet="{{ $listesujet->id }}">
                                        <i style="color:#38B293" class="fa-solid fa-calculator"></i>
                                    </button>


                                    <button data-bs-toggle="modal" class="editTeacher1 {{ $listesujet->status === 'non-corrige' ? 'disabled' : '' }}">
                                        <i class="fa-solid fa-list"></i>
                                    </button>

                                            <button data-bs-toggle="modal" data-bs-target="#deleteSujet"
                                            data-id="{{ $listesujet->id }}" data-code="{{ $listesujet->code }}" id="suppression_sujet">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>

                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

            <div class="pagination-container  no-print">
                <div class="pagination-info">
                    Affiche
                    <select id="rowsPerPageSelect" data-table-id="#inscriptionTable">
                        <option value="5" selected>5</option>
                        <option value="10">10</option>
                        <option value="15">15</option>
                        <option value="20">20</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                    de
                </div>
                <div class="pagination-buttons">
                    <button class="btn prev"><i class="fa fa-chevron-left"></i></button>
                    <button class="btn active">1</button>
                    <button class="btn next"><i class="fa fa-chevron-right"></i></button>
                    <span id="nbr">sur 2</span>
                </div>
            </div><br>
        </div>
    </div>
    <!--  -->
    {{--  --}} {{-- modal scan --}}



    <div class="modal fade " id="impri" tabindex="-1" aria-labelledby="largeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <i class="fa-solid fa-xmark" id="fa-xmark" data-bs-dismiss="modal"></i>
                <div class="modal-header">
                    <h5 class="modal-title" id="largeModalLabel">Connecter un scanner</h5>
                </div>
                <div class="modal-body">
                    <div class="add-printer-scanner">
                        <button class="add-button">
                            <i class="fas fa-plus"></i> Ajouter une imprimante ou un scanner
                        </button>
                    </div>
                    <h3>Imprimante et scanners disponible</h3>
                    <ul class="devices-list">
                        <li>
                            <div class="device-icon">
                                <!-- SVG de l'imprimante -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 35.529 31.976">
                                    <g id="printer2" transform="translate(-2 -3)"
                                        style="mix-blend-mode: normal;isolation: isolate">
                                        <path id="Tracé_379" data-name="Tracé 379"
                                            d="M2,11.329A5.329,5.329,0,0,1,7.329,6h3.553a1.777,1.777,0,0,1,.794.188l3.178,1.589H32.2a5.329,5.329,0,0,1,5.329,5.329v8.882A5.329,5.329,0,0,1,32.2,27.317H28.647V23.765H32.2a1.776,1.776,0,0,0,1.776-1.776V13.106A1.776,1.776,0,0,0,32.2,11.329H14.435a1.776,1.776,0,0,1-.794-.188L10.463,9.553H7.329a1.776,1.776,0,0,0-1.776,1.776V21.988a1.776,1.776,0,0,0,1.776,1.776h3.553v3.553H7.329A5.329,5.329,0,0,1,2,21.988Z"
                                            transform="translate(0 2.329)" fill="#fff" fill-rule="evenodd" />
                                        <path id="Tracé_380" data-name="Tracé 380"
                                            d="M8.553,6.553A3.553,3.553,0,0,1,12.106,3H22.765a3.553,3.553,0,0,1,3.553,3.553v3.553H22.765V6.553H12.106V9.9L9.347,8.517a1.777,1.777,0,0,0-.794-.188ZM26.317,26.094v5.329a3.553,3.553,0,0,1-3.553,3.553H12.106a3.553,3.553,0,0,1-3.553-3.553V22.541a1.776,1.776,0,0,1,0-3.553H26.317a1.776,1.776,0,1,1,0,3.553Zm-3.553-3.553H12.106v8.882H22.765ZM8.553,15.435a1.776,1.776,0,1,1-1.776-1.776A1.776,1.776,0,0,1,8.553,15.435Z"
                                            transform="translate(2.329)" fill="#fff" fill-rule="evenodd" />
                                    </g>
                                </svg>
                            </div>
                            SCANNER HP Scanjet Pro 2600 F1
                        </li>
                        <li>
                            <div class="device-icon">
                                <!-- Répéter l'icône SVG de l'imprimante -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 35.529 31.976">
                                    <g id="printer2" transform="translate(-2 -3)"
                                        style="mix-blend-mode: normal;isolation: isolate">
                                        <path id="Tracé_379" data-name="Tracé 379"
                                            d="M2,11.329A5.329,5.329,0,0,1,7.329,6h3.553a1.777,1.777,0,0,1,.794.188l3.178,1.589H32.2a5.329,5.329,0,0,1,5.329,5.329v8.882A5.329,5.329,0,0,1,32.2,27.317H28.647V23.765H32.2a1.776,1.776,0,0,0,1.776-1.776V13.106A1.776,1.776,0,0,0,32.2,11.329H14.435a1.776,1.776,0,0,1-.794-.188L10.463,9.553H7.329a1.776,1.776,0,0,0-1.776,1.776V21.988a1.776,1.776,0,0,0,1.776,1.776h3.553v3.553H7.329A5.329,5.329,0,0,1,2,21.988Z"
                                            transform="translate(0 2.329)" fill="#fff" fill-rule="evenodd" />
                                        <path id="Tracé_380" data-name="Tracé 380"
                                            d="M8.553,6.553A3.553,3.553,0,0,1,12.106,3H22.765a3.553,3.553,0,0,1,3.553,3.553v3.553H22.765V6.553H12.106V9.9L9.347,8.517a1.777,1.777,0,0,0-.794-.188ZM26.317,26.094v5.329a3.553,3.553,0,0,1-3.553,3.553H12.106a3.553,3.553,0,0,1-3.553-3.553V22.541a1.776,1.776,0,0,1,0-3.553H26.317a1.776,1.776,0,1,1,0,3.553Zm-3.553-3.553H12.106v8.882H22.765ZM8.553,15.435a1.776,1.776,0,1,1-1.776-1.776A1.776,1.776,0,0,1,8.553,15.435Z"
                                            transform="translate(2.329)" fill="#fff" fill-rule="evenodd" />
                                    </g>
                                </svg>
                            </div>
                            Canon G3010 séries
                        </li>
                        <li>
                            <div class="device-icon">
                                <!-- Répéter l'icône SVG de l'imprimante -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 35.529 31.976">
                                    <g id="printer2" transform="translate(-2 -3)"
                                        style="mix-blend-mode: normal;isolation: isolate">
                                        <path id="Tracé_379" data-name="Tracé 379"
                                            d="M2,11.329A5.329,5.329,0,0,1,7.329,6h3.553a1.777,1.777,0,0,1,.794.188l3.178,1.589H32.2a5.329,5.329,0,0,1,5.329,5.329v8.882A5.329,5.329,0,0,1,32.2,27.317H28.647V23.765H32.2a1.776,1.776,0,0,0,1.776-1.776V13.106A1.776,1.776,0,0,0,32.2,11.329H14.435a1.776,1.776,0,0,1-.794-.188L10.463,9.553H7.329a1.776,1.776,0,0,0-1.776,1.776V21.988a1.776,1.776,0,0,0,1.776,1.776h3.553v3.553H7.329A5.329,5.329,0,0,1,2,21.988Z"
                                            transform="translate(0 2.329)" fill="#fff" fill-rule="evenodd" />
                                        <path id="Tracé_380" data-name="Tracé 380"
                                            d="M8.553,6.553A3.553,3.553,0,0,1,12.106,3H22.765a3.553,3.553,0,0,1,3.553,3.553v3.553H22.765V6.553H12.106V9.9L9.347,8.517a1.777,1.777,0,0,0-.794-.188ZM26.317,26.094v5.329a3.553,3.553,0,0,1-3.553,3.553H12.106a3.553,3.553,0,0,1-3.553-3.553V22.541a1.776,1.776,0,0,1,0-3.553H26.317a1.776,1.776,0,1,1,0,3.553Zm-3.553-3.553H12.106v8.882H22.765ZM8.553,15.435a1.776,1.776,0,1,1-1.776-1.776A1.776,1.776,0,0,1,8.553,15.435Z"
                                            transform="translate(2.329)" fill="#fff" fill-rule="evenodd" />
                                    </g>
                                </svg>
                            </div>
                            Canon Colortrac SmartLF SCi 36
                        </li>
                        <li>
                            <div class="device-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 35.529 31.976">
                                    <g id="printer2" transform="translate(-2 -3)"
                                        style="mix-blend-mode: normal;isolation: isolate">
                                        <path id="Tracé_379" data-name="Tracé 379"
                                            d="M2,11.329A5.329,5.329,0,0,1,7.329,6h3.553a1.777,1.777,0,0,1,.794.188l3.178,1.589H32.2a5.329,5.329,0,0,1,5.329,5.329v8.882A5.329,5.329,0,0,1,32.2,27.317H28.647V23.765H32.2a1.776,1.776,0,0,0,1.776-1.776V13.106A1.776,1.776,0,0,0,32.2,11.329H14.435a1.776,1.776,0,0,1-.794-.188L10.463,9.553H7.329a1.776,1.776,0,0,0-1.776,1.776V21.988a1.776,1.776,0,0,0,1.776,1.776h3.553v3.553H7.329A5.329,5.329,0,0,1,2,21.988Z"
                                            transform="translate(0 2.329)" fill="#fff" fill-rule="evenodd" />
                                        <path id="Tracé_380" data-name="Tracé 380"
                                            d="M8.553,6.553A3.553,3.553,0,0,1,12.106,3H22.765a3.553,3.553,0,0,1,3.553,3.553v3.553H22.765V6.553H12.106V9.9L9.347,8.517a1.777,1.777,0,0,0-.794-.188ZM26.317,26.094v5.329a3.553,3.553,0,0,1-3.553,3.553H12.106a3.553,3.553,0,0,1-3.553-3.553V22.541a1.776,1.776,0,0,1,0-3.553H26.317a1.776,1.776,0,1,1,0,3.553Zm-3.553-3.553H12.106v8.882H22.765ZM8.553,15.435a1.776,1.776,0,1,1-1.776-1.776A1.776,1.776,0,0,1,8.553,15.435Z"
                                            transform="translate(2.329)" fill="#fff" fill-rule="evenodd" />
                                    </g>
                                </svg>
                            </div>
                            Fax
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
    <div class="modal fade" id="impri" tabindex="-1" aria-labelledby="printerModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="printerModalLabel">Connecter une imprimante</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="add-printer">
                        <button class="add-button">
                            <i class="fas fa-plus"></i> Ajouter une imprimante
                        </button>
                    </div>
                    <h3>Imprimante et scanners disponible</h3>
                    <ul class="devices-list">
                        <li>
                            <i class="fas fa-print"></i>
                            ImageRUNNER ADVANCE DX C580
                        </li>
                        <li>
                            <i class="fas fa-print"></i>
                            Canon G3010 séries
                        </li>
                        <li>
                            <i class="fas fa-print"></i>
                            Canon Colortrac SmartLF SCi 36
                        </li>
                        <li>
                            <i class="fas fa-fax"></i>
                            Fax
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    @include('admin.include.footer')
    <!-- Modal de Suppression -->
    <div class="modal fade" id="deleteSujet" tabindex="-1" aria-labelledby="deleteSujetLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-center">
                <button type="button" class="custom-close-btn" data-bs-dismiss="modal" aria-label="Close"><i
                        class="fa-solid fa-xmark"></i></button>
                <div class="modal-body text-center d-flex flex-column">
                    <i class="fa-solid fa-triangle-exclamation" id="fa-triangle-exclamation"></i>
                    <span>Êtes-vous sûr(e) ?</span>
                </div>
                <p>Voulez-vous supprimer l'évaluation <strong><span id="nom_affiche"></span></strong> ?</p>
                <div class="d-flex justify-content-around">
                    @if (auth()->user()->role_id == 3)
                        <form action="{{ route('sujetadmin.destroy') }}" method="POST">
                    @elseif (auth()->user()->role_id == 2)
                        <form action="{{ route('sujetprofesseur.destroy') }}" method="POST">
                    @endif
                        @csrf
                        <input type="hidden" name="id" id="sujet_id_for_deletion">
                        <button type="submit" class="btn btn-success marge">Oui, je confirme</button>
                    </form>
                    <button type="button" class="btn btn-secondaire" data-bs-dismiss="modal">Annuler</button>
                </div>
            </div>
        </div>
    </div>


    {{--  --}}
    <!-- importer -->
    <div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal Header -->
                <!-- Modal Body -->
                <button type="button" class="custom-close-btn" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa-solid fa-xmark"></i> <!-- Font Awesome close icon -->
                </button>
                <h1 class="modal-title fs-5 text-center" id="importModalLabel">Importer un fichier</h1>

                <form action="/path/to/your/upload/handler" method="post" enctype="multipart/form-data"
                    class="needs-validation" novalidate>
                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="fileInput" class="form-label">Choisissez un fichier à importer</label>
                            <input type="file" class="form-control" id="fileInput" name="importedFile" required>
                            <div class="invalid-feedback">
                                Veuillez sélectionner un fichier.
                            </div>
                        </div>
                </form>

                <!-- Modal Footer -->
                <div class="modal-footer d-flex justify-content-between">
                    <button type="submit" class="btn btn-success">Importer</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                </div>
            </div>
        </div>
    </div>
    <!--  -->
    <iframe id="pageIframe" src="/url-de-la-page-a-imprimer" style=""></iframe>




    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Définir la configuration pour ce fichier
            setTableConfig({
                'Matière': 5, // Index de la colonne "Matière"
                'Classe': 6 // Index de la colonne "Classe"
            });

            // Définir l'ID du tableau pour les fonctions de recherche et de pagination
            setTableId('#inscriptionTable');
            // Appel des fonctions de recherche et de pagination
            searchTable('#inscriptionTable tbody', 'searchInput', 'noResults');
            paginateTable('#inscriptionTable');
        });
    </script>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script>
        document.querySelectorAll('.printSujet').forEach(function(button) {

            button.addEventListener('click', function() {

                var idSujet = this.getAttribute('data-idsujet');

                // Obtenir la racine de l'URL
                var baseUrl = window.location.origin;

                // URL
                var url = baseUrl + '/nouvelle-page/' + idSujet;

                //URL dans l'iframe
                var iframe = document.getElementById('pageIframe');
                iframe.src = url;
                console.log(iframe.src);

                // Déclencher l'impression
                iframe.onload = function() {
                    console.log("Le contenu a bien été chargé dans l'iframe");
                    requestAnimationFrame(function() {
                        requestAnimationFrame(function() {
                            iframe.contentWindow.focus();
                            iframe.contentWindow.print();
                        });
                    });
                };

                iframe.onerror = function() {
                    console.log("Erreur lors du chargement de la page dans l'iframe");
                };
            });
        });
    </script>
    <script>
        document.querySelectorAll('[data-label="statut"]').forEach(function(element) {
            if (element.textContent.trim() == "Non Corrigé") {
                const trElement = element.closest("tr"); // Sélectionne le parent <tr> de l'élément
                const editButton = trElement.querySelector(
                    ".editTeacher1"); // Sélectionne le bouton avec la classe "editTeacher1" dans le même <tr>

                if (editButton) {
                    editButton.disabled = true; // Désactive le bouton
                    editButton.children[0].setAttribute('style',
                        'background:#d3d3d3!important'); // Désactive le bouton
                }
            }
        });
    </script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('#suppression_sujet').forEach(button => {
            button.addEventListener('click', function () {
                const sujetId = this.getAttribute('data-id'); // Récupère l'ID du sujet
                const sujetCode = this.getAttribute('data-code'); // Récupère le code du sujet

                // Remplit le champ caché du formulaire avec l'ID
                document.getElementById('sujet_id_for_deletion').value = sujetId;

                // Affiche le code du sujet dans le modal
                document.getElementById('nom_affiche').textContent = sujetCode;
            });
        });
    });
</script>


</body>

</html>

</body>

</html>
