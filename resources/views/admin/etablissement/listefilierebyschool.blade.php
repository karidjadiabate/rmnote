<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filières</title>
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
    <link rel="stylesheet" href="{{ asset('frontend/dashboard/css/lists.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/dashboard/html/admin.css') }}">
    <link rel="icon" href="{{ asset('assets/img/FaviconROMNOTE.png') }}" type="image/png">

    <style>
        .btn-toggle {
            position: relative;
            display: inline-block;
            width: 40px;
            height: 24px;
        }

        .toggle-checkbox {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .toggle-label {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            border-radius: 34px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .toggle-label:before {
            position: absolute;
            content: "";
            height: 15px;
            width: 15px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            border-radius: 50%;
            transition: transform 0.3s;
        }

        .toggle-checkbox:checked+.toggle-label {
            background-color: #38B293;
            /* Vert lorsque activé */
        }

        .toggle-checkbox:checked+.toggle-label:before {
            transform: translateX(18px);
            /* Déplace le cercle vers la droite */
        }

        .margin-bryan {
            margin-left: -180px !important;
            margin-right: 30px !important;
        }
    </style>

</head>


<body>
    <!-- header -->
    @include('admin.include.menu')

    <!-- accueil -->
    <div class="container printableArea principal">
        <div class="printableArea">
            <h2 class="text-start text-title">Liste des filières</h2>
            <div class="d-flex justify-content-between align-items-center flex-wrap action-buttons mb-3 no-print">
                <div class="d-flex search-container">
                    <i class="fa fa-search"></i>
                    <input id="searchInput" type="text" id="search" class="form-control search-bar"
                        placeholder="Rechercher...">
                </div>

                <div class="d-flex justify-content-end flex-wrap action-buttons">
                    <button class="btn btn-custom btn-imprimer" id="printBtn" onclick="printDiv()"><i
                            class="fa fa-print"></i> Imprimer</button>
                    <button class="btn btn-custom btn-importer" data-bs-toggle="modal" data-bs-target="#importModal"><i
                            class="fa fa-upload"></i> Importer</button>

                    <!-- Dropdown for Export options -->
                    <div class="btn-group">
                        <button class="btn btn-custom btn-exporter dropdown-toggle" type="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-download"></i> Exporter
                        </button>
                        <ul class="dropdown-menu" id="menu">
                            <!-- Assurez-vous que ces liens ont bien l'attribut href="#" et que onclick est correct -->
                            <li><a class="dropdown-item" id="excel" href="#"
                                    onclick="exportTableToExcel('#filiereTable')">Excel</a></li>
                            <li><a class="dropdown-item" id="pdf" href="#"
                                    onclick="exportTableToPDF('#filiereTable')">PDF</a></li>

                        </ul>
                    </div>
                    <button class="btn btn-custom btn-ajouter" data-bs-toggle="modal" data-bs-target="#filiere"><i
                            class="fa fa-plus"></i> Ajouter une filiere</button>

                    <div class="dropdown" id="filterMenu">
                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-filter"></i> Filtrer par
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#"
                                    data-bs-toggle="dropdown">Nom-Filière</a>
                                <ul class="dropdown-menu">
                                    @foreach ($lesfilieres as $filiere)
                                        <li>
                                            <a class="dropdown-item" href="#"
                                                onclick="applyFilter('Nom-Filière', '{{ $filiere->nomfiliere }}')">
                                                {{ $filiere->nomniveau }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#"
                                    data-bs-toggle="dropdown">Niveau</a>
                                <ul class="dropdown-menu">
                                    @foreach ($lesfilieres as $filiere)
                                        <li>
                                            <a class="dropdown-item" href="#"
                                                onclick="applyFilter('Niveau', '{{ $filiere->nomniveau }}')">
                                                {{ $filiere->code }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>




            </div>
            <!-- Table for listing teachers -->
            <div id="noResults">Aucun résultat trouvé</div>
            <div class="table-responsive">
                <table id="filiereTable" class="table">
                    <thead class="table-aaa">
                        <tr class="aa">
                            <th>Code</th>
                            <th>Nom de la Filière</th>
                            <th>Niveaux</th>
                            <th>Directeur de filière</th>
                            <th>Nombres de classes</th>
                            <th class="no-print">Action</th>
                        </tr>
                    </thead>&nbsp;&nbsp;
                    <tbody id="filiereTable">
                        @php
                            $num = 1;
                        @endphp
                        @foreach ($nosfilieres as $filiere)
                            <tr>
                                <td data-label="Code">{{ $filiere->code }}</td>
                                <td data-label="Nom de la Filière">{{ $filiere->nomfiliere }}</td>
                                <td data-label="Niveau">{{ str_replace(',', ' - ', $filiere->niveaux) }}</td>
                                <td data-label="Directeur filiere">{{ $filiere->directeurfiliere }}</td>
                                <td data-label="Nombre de classes" class="text-center">{{ $filiere->nbclasse }}</td>
                                <td data-label="Action" class="action-icons no-print">
                                    <!-- Choisir l'ID en fonction de la source -->
                                    <button type="button" class="btn-toggle"
                                        data-id="{{ $filiere->etablissement_filiere_id ?? $filiere->filiere_id }}">
                                        <input type="checkbox"
                                            id="toggle-{{ $filiere->etablissement_filiere_id ?? $filiere->filiere_id }}"
                                            class="toggle-checkbox" {{ $filiere->active ? 'checked' : '' }}>
                                        <label
                                            for="toggle-{{ $filiere->etablissement_filiere_id ?? $filiere->filiere_id }}"
                                            class="toggle-label"></label>
                                    </button>

                                    <!-- Bouton Éditer -->
                                    <button class="btn btn-sm edit-btn" data-bs-toggle="modal"
                                        data-bs-target="#editFiliere{{ $filiere->etablissement_filiere_id ?? $filiere->filiere_id }}"
                                        data-id="{{ $filiere->etablissement_filiere_id ?? $filiere->filiere_id }}"
                                        data-code="{{ $filiere->code }}"
                                        data-nomfiliere="{{ $filiere->nomfiliere }}"
                                        data-nbclasse="{{ $filiere->nbclasse }}"
                                        data-directeurfiliere="{{ $filiere->directeurfiliere }}"
                                        {{ !$filiere->active ? 'disabled' : '' }}>
                                        <i class="fas fa-pen"></i>
                                    </button>

                                    <!-- Bouton Supprimer -->
                                    <button class="btn btn-sm delete-btn" data-bs-toggle="modal"
                                        data-bs-target="#deletefiliere{{ $filiere->etablissement_filiere_id ?? $filiere->filiere_id }}"
                                        {{ !$filiere->active ? 'disabled' : '' }}>
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>

                            <!-- Modal de Modification -->
                            <div class="modal fade"
                                id="editFiliere{{ $filiere->etablissement_filiere_id ?? $filiere->filiere_id }}"
                                tabindex="-1" aria-labelledby="editFiliereLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content ">
                                        <button type="button" class="custom-close-btn" data-bs-dismiss="modal"
                                            aria-label="Close">
                                            <i class="fa-solid fa-xmark"></i>
                                        </button>
                                        <!-- <h1 class="text-center">Modifier</h1> -->
                                        <form
                                            action="{{ route('updateadmin.filiere', $filiere->etablissement_filiere_id ?? $filiere->filiere_id) }}"
                                            method="POST" class="needs-validation" novalidate>
                                            @csrf
                                            @method('PUT')

                                            <div class="modal-body">
                                                <div class="row g-3">
                                                    <!-- Sélection de la filière -->
                                                    <div class="col-sm-6">
                                                        <select class="select2-multiple form-control"
                                                            id="filiereSelect" name="filiere_id" style="width: 100%"
                                                            disabled>
                                                            @foreach ($lesfilieres as $filiereOption)
                                                                <option value="{{ $filiereOption->id }}"
                                                                    {{ $filiereOption->id == $filiere->filiere_id ? 'selected' : '' }}>
                                                                    {{ $filiereOption->nomfiliere }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        <input type="hidden" name="filiere_id"
                                                            value="{{ $filiere->filiere_id }}">
                                                    </div>

                                                    <!-- Sélection des niveaux -->
                                                    <div class="col-sm-6">
                                                        <select class="select2-multiple form-control"
                                                            name="niveau_id[]" style="width: 100%"
                                                            id="niveaueditselect2" multiple>
                                                            @foreach ($niveaux as $niveau)
                                                                <option value="{{ $niveau->id }}"
                                                                    {{ in_array($niveau->id, (array) json_decode($filiere->niveau_id, true) ?? []) ? 'selected' : '' }}>
                                                                    {{ $niveau->code }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <!-- Nombre de classes -->
                                                    <div class="col-sm-6">
                                                        <input type="number" name="nbclasse" class="form-control"
                                                            value="{{ $filiere->nbclasse }}"
                                                            placeholder="Nombre de classes" required>
                                                        <div class="invalid-feedback">
                                                            Le nombre de classes est requis.
                                                        </div>
                                                    </div>

                                                    <!-- Nom du directeur -->
                                                    <div class="col-sm-6">
                                                        <input type="text" name="directeurfiliere"
                                                            class="form-control"
                                                            value="{{ $filiere->directeurfiliere }}"
                                                            placeholder="Nom du directeur" required>
                                                        <div class="invalid-feedback">
                                                            Le nom du directeur est requis.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal-footer d-flex justify-content-between">
                                                <button type="submit" class="btn btn-success">Sauvegarder</button>
                                                <button type="button" class="btn btn-secondaire"
                                                    data-bs-dismiss="modal">Annuler</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal de Suppression -->
                            <div class="modal fade"id="deletefiliere{{ $filiere->etablissement_filiere_id ?? $filiere->filiere_id }}"
                                tabindex="-1" aria-labelledby="deletefiliereLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content text-center">
                                        <button type="button" class="custom-close-btn" data-bs-dismiss="modal"
                                            aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
                                        <div class="modal-body text-center d-flex flex-column" id="">
                                            <i class="fa-solid fa-triangle-exclamation"
                                                id="fa-triangle-exclamation"></i>
                                            <span>Êtes vous sûres ?</span>
                                        </div>
                                        <p>supprimer la filière <strong><span
                                                    id="nom_affiche">{{ $filiere->nomfiliere }}</span></strong> ?</p>
                                        <div class="d-flex justify-content-between margin-bryan">
                                            <form
                                                action="{{ route('destroyadmin.filiere', $filiere->etablissement_filiere_id ?? $filiere->filiere_id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-success">Supprimer</button>
                                            </form>
                                            <button type="button" style="border-radius:0%"
                                                class="btn btn-secondaire" data-bs-dismiss="modal">Annuler</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach



                    </tbody>
                </table>
            </div>

            <div class="pagination-container  no-print">
                <div class="pagination-info">
                    Affiche
                    <select id="rowsPerPageSelect" data-table-id="#filiereTable">
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
                    <button class="btn prev">‹</button>
                    <button class="btn active">1</button>
                    <button class="btn next">›</button>
                    <span id="nbr">sur 2</span>
                </div>
            </div><br>
        </div>
    </div>
    <!--  -->
    <!--  -->
    <!-- Modal -->
    <div class="modal fade" id="filiere" tabindex="-1" aria-labelledby="editFiliereLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal Header -->

                <!-- Modal Body -->
                <button type="button" class="custom-close-btn" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa-solid fa-xmark"></i>
                </button>
                <!-- <h1 class="text-center">Ajouter</h1> -->
                <div class="modal-body">
                    <form action="{{ route('storeadmin.filiere') }}" method="POST" class="needs-validation"
                        novalidate>
                        @csrf
                        <div class="row g-3">

                            <div class="col-sm-6">
                                <input type="text" name="nomfilieretablissement" class="form-control"
                                    id="editLastName" placeholder="Nom de la filière" required>
                                <div class="invalid-feedback">
                                    Valid last name is required.
                                </div>
                            </div>


                            <div class="col-sm-6">
                                <div class="form-group">
                                    <select class="select2-multiple form-control" name="niveau_id[]"
                                        style="width: 100%" id="niveauselect2" multiple required>
                                        <option value="">Selectionnez un ou plusieurs niveaux</option>
                                        @foreach ($niveaux as $niveau)
                                            <option value="{{ $niveau->id }}">
                                                {{ $niveau->code }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <input type="number" name="nbclasse" class="form-control" id="editLastName"
                                    placeholder="Nombre de classes" required>
                                <div class="invalid-feedback">
                                    Valid last name is required.
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <input type="text" name="directeurfiliere" class="form-control" id="editLastName"
                                    placeholder="Nom du directeur" required>
                                <div class="invalid-feedback">
                                    Valid last name is required.
                                </div>
                            </div>



                        </div>

                        <div class="modal-footer d-flex justify-content-between">
                            <button type="submit" class="btn btn-success">Sauvegarder</button>
                            <button type="button" class="btn btn-secondaire"
                                data-bs-dismiss="modal">Annuler</button>
                        </div>
                    </form>


                </div>

            </div>
        </div>
    </div>
    <!--  -->

    <!-- Footer -->

    @include('admin.include.footer')
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
                <div class="modal-footer d-flex justify-content-between p-0">
                    <button type="submit" class="btn btn-success">Importer</button>
                    <button type="button" class="btn btn-secondaire" data-bs-dismiss="modal">Annuler</button>
                </div>
            </div>
        </div>
    </div>
    <!--  -->


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const rowsPerPageSelect = document.getElementById('rowsPerPageSelect');
            tableId = rowsPerPageSelect.getAttribute('data-table-id');

            setTableConfig({
                'Nom-Filière': 2,
                'Niveau': 3
            });

            setTableId('#filiereTable');
            searchTable('#filiereTable tbody', 'searchInput', 'noResults');
            paginateTable('#filiereTable');
        });
    </script>


    </script>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script>
        $(document).ready(function() {
            // Gestion du clic sur les boutons toggle
            $('.btn-toggle').click(function() {
                var filiereId = $(this).data('id'); // ID de la relation filière/établissement
                var checkbox = $('#toggle-' + filiereId);
                var editBtn = $(this).closest('td').find('.edit-btn');
                var deleteBtn = $(this).closest('td').find('.delete-btn');

                // Désactiver temporairement le checkbox pendant l'envoi de la requête
                checkbox.prop('disabled', true);

                // Envoi de la requête AJAX pour basculer l'état active
                $.ajax({
                    url: '/admin/filiere/activate/' + filiereId,
                    method: 'PUT',
                    data: {
                        _token: '{{ csrf_token() }}',
                    },
                    success: function(response) {
                        // Basculer l'état du toggle selon la réponse
                        if (response.active) {
                            checkbox.prop('checked', true); // Activer le toggle si actif
                            editBtn.prop('disabled', false); // Réactiver le bouton "Éditer"
                            deleteBtn.prop('disabled',
                                false); // Réactiver le bouton "Supprimer"
                        } else {
                            checkbox.prop('checked', false); // Désactiver le toggle si inactif
                            editBtn.prop('disabled', true); // Désactiver le bouton "Éditer"
                            deleteBtn.prop('disabled',
                                true); // Désactiver le bouton "Supprimer"
                        }
                        checkbox.prop('disabled', false); // Réactiver l'interaction
                    },
                    error: function(xhr, status, error) {
                        console.log('Erreur lors de la mise à jour de l\'état :', error);
                        checkbox.prop('disabled', false); // Réactiver même en cas d'erreur
                    }
                });
            });

            // Initialisation lors du chargement de la page
            $('.btn-toggle').each(function() {
                var filiereId = $(this).data('id');
                var checkbox = $('#toggle-' + filiereId);
                var editBtn = $(this).closest('td').find('.edit-btn');
                var deleteBtn = $(this).closest('td').find('.delete-btn');

                // Si le toggle est activé, activer les boutons "Éditer" et "Supprimer"
                if (checkbox.is(':checked')) {
                    editBtn.prop('disabled', false); // Réactiver le bouton "Éditer"
                    deleteBtn.prop('disabled', false); // Réactiver le bouton "Supprimer"
                } else {
                    editBtn.prop('disabled', true); // Désactiver le bouton "Éditer"
                    deleteBtn.prop('disabled', true); // Désactiver le bouton "Supprimer"
                }
            });
        });
    </script>




    <script>
        $(document).ready(function() {


            $('#niveau_id').select2({
                placeholder: "Selectionnez le niveau",
                width: '100%',
                minimumResultsForSearch: Infinity

            });
        });
    </script>

    <script>
        $(document).ready(function() {

            $('#niveauselect2').select2({
                placeholder: "Sélectionner le niveau",
                allowClear: true,
            });

        });

        $(document).ready(function() {

            $('#niveaueditselect2').select2({
                placeholder: "Sélectionner le niveau",
                allowClear: true,
            });

        });
    </script>

    <script>
        // Ajoutez ce script pour mettre à jour le champ caché lors du chargement de la page
        document.addEventListener('DOMContentLoaded', function() {
            const select = document.getElementById('filiereSelect');
            const hiddenInput = document.querySelector('input[name="filiere_id"]');

            // Récupérer la valeur sélectionnée dans le select
            hiddenInput.value = select.value;
        });
    </script>


</body>

</html>
