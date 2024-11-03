<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matières</title>
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
    <link rel="stylesheet" href="{{ asset('frontend/dashboard/css/lists.css') }}">
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

        .margin-bryan {
            margin-left: -180px !important;
            margin-right: 30px !important;
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

        .sort-by {
            width: 80%;
        }

        .margin1 {
            margin-left: 35px;
            margin-right: 35px;
        }

        .custom-btn-color {
            background-color: #4A41C5 !important;
            color: white !important;
            border: none !important;
            box-shadow: none !important;
            outline: none !important;
            transition: none !important;
        }

        /* Désactive l'effet au clic */
        .custom-btn-color:active {
            transform: none !important;
            box-shadow: none !important;
        }
    </style>

    <title>matiere</title>

</head>


<body>
    <!-- header -->
    @include('admin.include.menu')

    <!-- accueil -->
    <div class="container printableArea principal">
        <div class="printableArea">
            <h2 class="text-start text-title">Liste des matières</h2>
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
                                    onclick="exportTableToExcel('#matiereTable')">Excel</a></li>
                            <li><a class="dropdown-item" id="pdf" href="#"
                                    onclick="exportTableToPDF('#matiereTable')">PDF</a></li>

                        </ul>
                    </div>
                    <button class="btn btn-custom btn-ajouter" data-bs-toggle="modal" data-bs-target="#matiere"><i
                            class="fa fa-plus"></i> Ajouter une Matière</button>

                    <div class="dropdown" id="filterMenu">
                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-filter"></i> Filtrer par
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#"
                                    data-bs-toggle="dropdown">Nom-Matière</a>
                                <ul class="dropdown-menu">
                                    @foreach ($lesmatieres as $matiere)
                                        <li>
                                            <a class="dropdown-item" href="#"
                                                onclick="applyFilter('Nom-Matière', '{{ $matiere->nommatiere }}')">
                                                {{ $matiere->nommatiere }}
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
                <table id="matiereTable" class="table">
                    <thead class="table-aaa">
                        <tr class="aa">
                            <th>Code</th>
                            <th>Nom de la Matière</th>
                            <th>Niveau & Coefficient</th>
                            <th>Filière</th>
                            <th>Crédits ECTS</th>
                            <th>Volume horaire</th>
                            <th class="no-print" style="text-align: center">Action</th>
                        </tr>
                    </thead>&nbsp;&nbsp;
                    <tbody id="matiereTable">

                        @foreach ($nosmatieres as $matiere)
                            <tr>
                                <td data-label="Identifiant">{{ $matiere->code }}</td>
                                <td data-label="Nom">{{ $matiere->nommatiere }}</td>
                                <td data-label="NiveauCoefficient">
                                    {{ $matiere->codeniveau }}[{{ $matiere->coefficient }}]</td>
                                <td data-label="filiere">{{ $matiere->nomfiliere }}</td>
                                <td data-label="credit">{{ $matiere->credit }}</td>
                                <td data-label="volume">{{ $matiere->volumehoraire }} h</td>
                                <td data-label="Action" class="action-icons no-print">
                                    <button type="button" class="btn-toggle"
                                        data-id="{{ $matiere->etablissement_matiere_id ?? $matiere->matiere_id }}">
                                        <input type="checkbox"
                                            id="toggle-{{ $matiere->etablissement_matiere_id ?? $matiere->matiere_id }}"
                                            class="toggle-checkbox" {{ $matiere->active ? 'checked' : '' }}>
                                        <label
                                            for="toggle-{{ $matiere->etablissement_matiere_id ?? $matiere->matiere_id }}"
                                            class="toggle-label"></label>
                                    </button>

                                    <!-- Bouton Éditer -->
                                    <button class="btn btn-sm edit-btn" data-bs-toggle="modal"
                                        data-bs-target="#editMatiere{{ $matiere->etablissement_matiere_id ?? $matiere->matiere_id }}"
                                        data-id="{{ $matiere->etablissement_matiere_id ?? $matiere->matiere_id }}"
                                        data-code="{{ $matiere->code }}"
                                        data-coefficient="{{ $matiere->coefficient }}"
                                        data-credit="{{ $matiere->credit }}"
                                        data-nomfiliere="{{ $matiere->nomfiliere }}"
                                        data-volumehoraire="{{ $matiere->volumehoraire }}"
                                        data-label="{{ $matiere->nommatiere }}"
                                        {{ !$matiere->active ? 'disabled' : '' }}> <!-- Désactiver si inactif -->
                                        <i class="fas fa-pen"></i>
                                    </button>

                                    <!-- Bouton Supprimer -->
                                    <button class="btn btn-sm delete-btn" data-bs-toggle="modal"
                                        data-bs-target="#deletematiere{{ $matiere->etablissement_matiere_id }}"
                                        {{ !$matiere->active ? 'disabled' : '' }}> <!-- Désactiver si inactif -->
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>

                            <!-- Modal de Modification -->
                            <div class="modal fade"
                                id="editMatiere{{ $matiere->etablissement_matiere_id ?? $matiere->matiere_id }}"
                                tabindex="-1" aria-labelledby="editMatiereLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <button type="button" class="custom-close-btn" data-bs-dismiss="modal"
                                            aria-label="Close">
                                            <i class="fa-solid fa-xmark"></i> </button>
                                        <!-- <h1 class="text-center">Modifier</h1> -->
                                        <form
                                            action="{{ route('updateadmin.matiere', $matiere->etablissement_matiere_id ?? $matiere->matiere_id) }}"
                                            method="POST" class="needs-validation" novalidate>
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="row g-3">
                                                    <!-- Sélection des matières -->
                                                    <div class="col-sm-6">
                                                        <select class="select2-multiple form-control"
                                                            id="matiereSelect" name="matiere_id" style="width: 100%"
                                                            disabled>
                                                            @foreach ($lesmatieres as $matiereOption)
                                                                <option value="{{ $matiereOption->id }}"
                                                                    {{ $matiereOption->id == $matiere->matiere_id ? 'selected' : '' }}>
                                                                    {{ $matiereOption->nommatiere }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        <input type="hidden" name="matiere_id"
                                                            value="{{ $matiere->matiere_id }}">
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <input type="number" name="volumehoraire"
                                                            class="form-control" id="editLastName"
                                                            placeholder="Volume horaire"
                                                            value="{{ $matiere->volumehoraire }}" required>
                                                        <div class="invalid-feedback">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-12" style="margin-bottom: 15px;">
                                                        <select name="etablissement_filiere_id"
                                                            id="etablissement_filiere_id" class="form-control"
                                                            required>
                                                            <option value="">Sélectionnez une filière</option>
                                                            @foreach ($listefilieres as $filiere)
                                                                <option value="{{ $filiere->filiere_id }}"
                                                                    {{ $filiere->id == $matiere->filiere_id ? 'selected' : '' }}>
                                                                    {{ $filiere->filiere->nomfiliere ?? $filiere->nomfilieretablissement }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        <div class="invalid-feedback">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-control"
                                                            style="display: flex; align-items: center;">
                                                            <!-- Button to decrease value -->
                                                            <button class="btn btn-outline-secondary" type="button"
                                                                id="decrease-btnedit">-</button>

                                                            <select
                                                                class="sort-by btn custom-btn-color rounded-start-pill ticketBtn vvip py-2"
                                                                id="niveau_id" name="niveau_id" required
                                                                style="height: 38px; border-right: none;">
                                                                <option selected disabled>Niveau</option>
                                                                @foreach ($niveaux as $niveau)
                                                                    <option value="{{ $niveau->id }}"
                                                                        {{ $niveau->id == $matiere->niveau_id ? 'selected' : '' }}>
                                                                        {{ $niveau->code }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            <input type="number" placeholder="coef"
                                                                class="sort-by custom-btn-color rounded-end-pill ticketBtn vvip py-2"
                                                                id="coefficient" name="coefficient"
                                                                value="{{ $matiere->coefficient }}" min="1"
                                                                style="width: 63px; height: 38px; border-left: none; -webkit-appearance: none; -moz-appearance: textfield;"
                                                                required>

                                                            <!-- Button to increase value -->
                                                            <button class="btn circular-btn"
                                                                style=" background-color: #4A41C5 !important;border: none !important; color:white;width: 30px; height: 30px;border-radius: 50%;"
                                                                type="button" id="increase-btnedit">+</button>
                                                        </div>


                                                    </div>




                                                    <div class="col-sm-6">
                                                        <input type="number" name="credit" class="form-control"
                                                            id="editLastName"
                                                            placeholder="Crédits ECTS / autre système de crédit"
                                                            value="{{ $matiere->credit }}" required>
                                                        <div class="invalid-feedback">
                                                        </div>
                                                    </div>


                                                </div>
                                                <br>
                                                <div class="d-flex justify-content-between margin">
                                                    <button type="submit"
                                                        class="btn btn-success">Sauvegarder</button>
                                                    <button type="button" class="btn btn-secondaire"
                                                        data-bs-dismiss="modal">Annuler</button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>


                            <!-- Modal de Suppression -->
                            <div class="modal fade"
                                id="deletematiere{{ $matiere->etablissement_matiere_id ?? $matiere->matiere_id }}"
                                tabindex="-1" aria-labelledby="deletematiereLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content text-center">
                                        <button type="button" class="custom-close-btn" data-bs-dismiss="modal"
                                            aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
                                        <div class="modal-body text-center d-flex flex-column" id="">
                                            <i class="fa-solid fa-triangle-exclamation"
                                                id="fa-triangle-exclamation"></i>
                                            <span>Êtes vous sûres ?</span>
                                        </div>
                                        <p>supprimer la matière <span
                                                id="nom_affiche">{{ $matiere->nommatiere }}</span>?</p>
                                        <div class="d-flex justify-content-between margin-bryan">
                                            <form
                                                action="{{ route('destroyadmin.matiere', $matiere->etablissement_matiere_id ?? $matiere->matiere_id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-success">Supprimer</button>
                                            </form>
                                            <button type="button" style="border-radius: 0%"
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
                    <select id="rowsPerPageSelect" data-table-id="#matiereTable">
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
                    <button class="btn prev"><i class="fa-solid fa-chevron-left"></i></button>
                    <button class="btn active">1</button>
                    <button class="btn next"><i class="fa-solid fa-chevron-right"></i></button>
                    <span id="nbr">sur 2</span>
                </div>
            </div><br>
        </div>
    </div>
    <!--  -->
    <!--  -->
    <!-- Modal -->
    <div class="modal " id="matiere" tabindex="-1" aria-labelledby="addMatiereLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content ">
                <button type="button" class="custom-close-btn" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa-solid fa-xmark"></i></button>
                <!-- <h1 class="text-center">Ajouter</h1> -->
                <form action="{{ route('storeadmin.matiere') }}" method="POST" class="needs-validation" novalidate>
                    @csrf
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <input type="text" name="nommatieretablissement" class="form-control"
                                    id="editLastName" placeholder="Nom de la matière" required>
                                <div class="invalid-feedback">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <input type="number" name="volumehoraire" class="form-control" id="editLastName"
                                    placeholder="Volume horaire" required>
                                <div class="invalid-feedback">
                                </div>
                            </div>

                            <div class="col-sm-12" style="margin-bottom: 15px;">
                                <select name="etablissement_filiere_id" id="etablissement_filiere_id"
                                    class="form-control" required>
                                    <option value="">Sélectionnez une filière</option>
                                    @foreach ($listefilieres as $filiere)
                                        <option value="{{ $filiere->filiere_id }}">
                                            {{ $filiere->filiere->nomfiliere ?? $filiere->nomfilieretablissement }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                </div>
                            </div>

                            <div class="col-sm-6" style="display: flex; align-items: center;">
                                <button type="button" class="moins">-</button>

                                <select class="sort-by btn btn-outline-primary rounded-pill ticketBtn vvip py-2"
                                    required>
                                    <option value="" selected disabled>--Choisir un ticket--</option>
                                    <option value="vvip" data-count="0">VVIP: 100 F [0]</option>
                                    <option value="vip" data-count="0">VIP: 50 F [0]</option>
                                    <option value="stand1" data-count="0">GP1: 30 F [0]</option>
                                    <option value="stand2" data-count="0">GP2: 20 F [0]</option>
                                </select>

                                <button type="button" class="pluss">+</button>
                            </div>

                            <!-- Crédit Field -->
                            <div class="col-sm-6" style="display: flex; align-items: center;">
                                <input type="number" name="credit" class="form-control"
                                    placeholder="Crédits ECTS / autre système de crédit" required>
                            </div>


                        </div>
                    </div>
                    <div class="d-flex justify-content-between margin1">
                        <button type="submit" class="btn btn-success">Sauvegarder</button>
                        <button type="button" class="btn btn-secondaire" data-bs-dismiss="modal">Annuler</button>
                    </div>
                </form>
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
                    <i class="fa-solid fa-xmark"></i></button>

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
                    <button type="button" class="btn btn-secondaire" data-bs-dismiss="modal">Annuler</button>
                </div>
            </div>
        </div>
    </div>
    <!--  -->


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Définir la configuration pour ce fichier
            setTableConfig({
                'Nom-Matière': 1,

            });

            // Définir l'ID du tableau pour les fonctions de recherche et de pagination
            setTableId('#matiereTable');
            // Appel des fonctions de recherche et de pagination
            searchTable('#matiereTable tbody', 'searchInput', 'noResults');
            paginateTable('#matiereTable');
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
        $(document).ready(function() {

            $('#matiereselect2').select2({
                placeholder: "Matière",
                allowClear: true,
            });

        });
    </script>




    <script>
        $(document).ready(function() {
            // Gestion du clic sur les boutons toggle
            $('.btn-toggle').click(function() {
                var matiereId = $(this).data('id'); // ID de la relation filière/établissement
                console.log(matiereId);
                var checkbox = $('#toggle-' + matiereId);
                var editBtn = $(this).closest('td').find('.edit-btn');
                var deleteBtn = $(this).closest('td').find('.delete-btn');

                // Désactiver temporairement le checkbox pendant l'envoi de la requête
                checkbox.prop('disabled', true);

                // Envoi de la requête AJAX pour basculer l'état active
                $.ajax({
                    url: '/admin/matiere/activate/' + matiereId,
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
                var matiereId = $(this).data('id');
                var checkbox = $('#toggle-' + matiereId);
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
        // Ajoutez ce script pour mettre à jour le champ caché lors du chargement de la page
        document.addEventListener('DOMContentLoaded', function() {
            const select = document.getElementById('matiereSelect');
            const hiddenInput = document.querySelector('input[name="matiere_id"]');

            // Récupérer la valeur sélectionnée dans le select
            hiddenInput.value = select.value;
        });
    </script>

    <script>
        // Fonction pour changer la valeur du coefficient
        function changeCoefficient(value) {
            var coefficientInput = document.getElementById('coefficient');
            var currentValue = parseInt(coefficientInput.value);

            if (!isNaN(currentValue) && currentValue + value >= 1) {
                coefficientInput.value = currentValue + value;
            }
        }

        // Assignation des fonctions aux boutons
        document.getElementById('decrease-btn').onclick = function() {
            changeCoefficient(-1);
        };

        document.getElementById('increase-btn').onclick = function() {
            changeCoefficient(1);
        };
    </script>

    <script>
        // Fonction pour changer la valeur du coefficient
        function changeCoefficientEdit(value) {
            var coefficientInput = document.getElementById('coefficient');
            var currentValue = parseInt(coefficientInput.value);

            if (!isNaN(currentValue) && currentValue + value >= 1) {
                coefficientInput.value = currentValue + value;
            }
        }

        // Assignation des fonctions aux boutons
        document.getElementById('decrease-btnedit').onclick = function() {
            changeCoefficientEdit(-1);
        };

        document.getElementById('increase-btnedit').onclick = function() {
            changeCoefficientEdit(1);
        };
    </script>
    <script>
        $(document).ready(function() {
            $('.pluss').on('click', function() {
                var $select = $(this).siblings('.sort-by');
                var selectedOption = $select.find('option:selected');
                console.log($(this).siblings('.sort-by'))
                // Récupérer et convertir en entier
                var currentCount = parseInt(selectedOption.data('count'), 10);
                var selectVal = $select.val();

                console.log("Current selected value:", selectVal);
                console.log("Current count:", currentCount); // Debug pour voir le count récupéré

                if (!isNaN(currentCount)) {
                    var newCount = currentCount + 1;
                    selectedOption.data('count', newCount); // Met à jour l'attribut data-count

                    selectedOption.text(function(i, text) {
                        return text.replace(/\[\d+\]/, '[' + newCount + ']');
                    });

                    localStorage.setItem('opt' + $select.val(), newCount);
                } else {
                    console.error('The count is not a number:', currentCount);
                }
            });

            $('.moins').on('click', function() {
                var $select = $(this).siblings('.sort-by');
                var selectedOption = $select.find('option:selected');

                // Récupérer et convertir en entier
                var currentCount = parseInt(selectedOption.data('count') || "0", 10);

                console.log("Current count (before decrement):",
                    currentCount); // Debug pour voir le count avant décrémentation

                if (!isNaN(currentCount) && currentCount > 0) {
                    var newCount = currentCount - 1;
                    selectedOption.data('count', newCount); // Met à jour l'attribut data-count

                    selectedOption.text(function(i, text) {
                        return text.replace(/\[\d+\]/, '[' + newCount + ']');
                    });

                    localStorage.setItem('opt' + $select.val(), newCount);
                } else {
                    console.error('The count is not a number or is already 0:', currentCount);
                }
            });
        });
    </script>

</body>

</html>