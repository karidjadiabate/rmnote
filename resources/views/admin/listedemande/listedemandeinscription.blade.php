<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- FontAwesome for icons (if needed) -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <script src="https://kit.fontawesome.com/3c4b920158.js" crossorigin="anonymous"></script>

    <!-- Select2 CSS -->

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.0/jspdf.umd.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.25/jspdf.plugin.autotable.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>

    <link rel="stylesheet" href="{{ asset('frontend/dashboard/css/dash.css') }}">

    <link rel="stylesheet" href="{{ asset('frontend/dashboard/html/admin.css') }}">

    <link rel="stylesheet" href="{{ asset('frontend/dashboard/css/lists.css') }}">
    <link rel="icon" href="{{ asset('assets/img/FaviconROMNOTE.png') }}" type="image/png">

    <title>demande_d'inscription</title>



</head>





<body>

    <!-- header -->

    @include('admin.include.menu')

    <!-- accueil -->

    <div class="container principal">

        <div class="printableArea">

            <h2 class="text-start text-title">La liste de demande d'inscription</h2>

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

                    {{-- <button class="btn btn-custom btn-ajouter" data-bs-toggle="modal" data-bs-target="#enseignant"><i

                            class="fa fa-plus"></i> Ajouter un enseignant</button> --}}

                </div>



            </div>

            <!-- Table for listing teachers -->

            <div id="noResults">Aucun résultat trouvé</div>

            <div class="table-responsive">

                <table id="inscriptionTable" class="table">

                    <thead class="table-aaa">

                        <tr class="aa">

                            <th>Identifiant</th>

                            <th>Date</th>

                            <th>Nom</th>

                            <th>Prénoms</th>

                            <th>Email</th>

                            <th>Contact</th>

                            <th>Noms de l'Etablissement</th>

                            <th>Adresses de l'Etablissement</th>

                            <th class="no-print">Action</th>

                        </tr>

                    </thead>&nbsp;&nbsp;

                    <tbody id="inscriptionTable">

                        <!-- Example rows, replace with dynamic data -->

                        @foreach ($listedemandeinscriptions as $listedemandeinscription)
                            <tr>

                                <td data-label="Identifiant">{{ $listedemandeinscription->id }}</td>

                                <td data-label="Date">{{ $listedemandeinscription->created_at->format('d/m/Y') }}</td>

                                <td data-label="Nom">{{ $listedemandeinscription->nom }}</td>

                                <td data-label="Prénoms">{{ $listedemandeinscription->prenom }}</td>

                                <td data-label="Email">{{ $listedemandeinscription->email }}</td>

                                <td data-label="Contact">{{ $listedemandeinscription->contact }}</td>

                                <td data-label="Noms Etablissement">{{ $listedemandeinscription->nometablissement }}

                                </td>



                                <td data-label="Adresse Etablissement">

                                    {{ $listedemandeinscription->adresseetablissement }}</td>



                                <td data-label="Action">



                                    @if (!$listedemandeinscription->accepted && !$listedemandeinscription->rejected)
                                        <button data-id="{{ $listedemandeinscription->id }}" data-bs-toggle="modal"
                                            data-bs-target="#acceptModal"
                                            class="btn btn-outline-success btn-sm btn-accept">

                                            <i class="fa-solid fa-check"></i>

                                        </button>

                                        <button data-id="{{ $listedemandeinscription->id }}" data-bs-toggle="modal"
                                            data-bs-target="#rejectModal"
                                            class="btn btn-outline-danger btn-sm btn-reject">

                                            <i class="fa-solid fa-times"></i>

                                        </button>
                                    @elseif ($listedemandeinscription->accepted)
                                        <button class="btn btn-success btn-sm" disabled>

                                            <i class="fa-solid fa-check"></i>

                                        </button>
                                    @elseif ($listedemandeinscription->rejected)
                                        <button class="btn btn-danger btn-sm" disabled>

                                            <i class="fa-solid fa-times"></i>

                                        </button>
                                    @endif

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
                    <button class="btn prev"><i class="fa-solid fa-chevron-left"></i></button>
                    <button class="btn active">1</button>
                    <button class="btn next"><i class="fa-solid fa-chevron-right"></i></button>
                    <span id="nbr">sur 2</span>
                </div>

            </div><br>

        </div>

    </div>

    <!--  -->

    <!-- Modal pour Accepter -->





    <!--  -->

    <!-- Modal -->

    <div class="modal fade" id="acceptModal" tabindex="-1" aria-labelledby="acceptModalLabel" aria-hidden="true">

        <div class="modal-dialog">

            <div class="modal-content">

                <!-- Modal Header -->

                <h5 class="modal-title" id="acceptModalLabel">Accepter la demande</h5>



                <!-- Modal Body -->

                <button type="button" class="custom-close-btn" data-bs-dismiss="modal" aria-label="Close">

                    <i class="fa-solid fa-xmark"></i> <!-- Font Awesome close icon -->

                </button>

                <div class="modal-body">

                    Êtes-vous sûr de vouloir accepter cette demande et créer l'établissement ?



                </div>

                <!-- Modal Footer -->

                <div class="modal-footer d-flex justify-content-between">

                    <button type="submit" class="btn btn-success"id="confirmAccept">Accepter</button>

                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>

                </div>

            </div>

        </div>

    </div>

    <!--  -->





    <!-- refuser -->

    <div class="modal fade" id="rejectModal" tabindex="-1" aria-labelledby="rejectModalLabel" aria-hidden="true">

        <div class="modal-dialog">

            <div class="modal-content">

                <!-- Modal Header -->

                <h5 class="modal-title" id="rejectModalLabel">Refuser la demande</h5>



                <!-- Modal Body -->

                <button type="button" class="custom-close-btn" data-bs-dismiss="modal" aria-label="Close">

                    <i class="fa-solid fa-xmark"></i> <!-- Font Awesome close icon -->

                </button>

                <div class="modal-body">

                    Êtes-vous sûr de vouloir refuser cette demande ?



                </div>

                <!-- Modal Footer -->

                <div class="modal-footer d-flex justify-content-between">

                    <button type="submit" class="btn btn-danger"id="confirmReject">Refuser</button>

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>

                </div>

            </div>

        </div>

    </div>

    <!--  -->



    <script>
        document.addEventListener('DOMContentLoaded', function() {



            // setTableId('#inscriptionTable');

            // Appel des fonctions de recherche et de pagination

            searchTable('#inscriptionTable tbody', 'searchInput', 'noResults');

            paginateTable('#inscriptionTable');

        });
    </script>





    </script>



    <!-- Bootstrap JS -->

    <script src="{{ asset('frontend/dashboard/js/list.js') }}"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <!-- Select2 JS -->

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>





    <script>
        $(document).ready(function() {

            let selectedId = null;



            const routeAccept = '{{ route('demandeinscription.accept', ['id' => 'ID']) }}';

            const routeReject = '{{ route('demandeinscription.reject', ['id' => 'ID']) }}';



            function setSelectedId(id) {

                selectedId = id;

            }



            // Gestionnaires d'événements pour les boutons "accepter" et "rejeter"

            $(document).on('click', '.btn-accept', function() {

                const id = $(this).data('id');

                setSelectedId(id);

            });



            $(document).on('click', '.btn-reject', function() {

                const id = $(this).data('id');

                setSelectedId(id);

            });



            $('#confirmAccept').on('click', function() {

                const $button = $(this);

                if (selectedId) {

                    // Changer le texte du bouton et griser le bouton

                    $button.text('Acceptation en cours...');

                    $button.addClass('btn-disabled');

                    $button.prop('disabled', true);



                    $.ajax({

                        url: routeAccept.replace('ID', selectedId),

                        method: 'POST',

                        data: {

                            _token: '{{ csrf_token() }}'

                        },

                        success: function(response) {

                            console.log(response);

                            if (response.success) {

                                $('#acceptModal').modal('hide');

                                window.location.reload();

                            } else {

                                alert('Une erreur est survenue: ' + response.message);

                                // Réactiver le bouton en cas d'erreur

                                $button.text('Accepter');

                                $button.removeClass('btn-disabled');

                                $button.prop('disabled', false);

                            }

                        },

                        error: function(xhr) {

                            alert('Une erreur est survenue lors de la requête: ' + xhr.status +

                                ' ' + xhr.statusText);

                            // Réactiver le bouton en cas d'erreur

                            $button.text('Accepter');

                            $button.removeClass('btn-disabled');

                            $button.prop('disabled', false);

                        }

                    });

                }

            });



            $('#confirmReject').on('click', function() {

                const $button = $(this);

                if (selectedId) {

                    // Changer le texte du bouton et griser le bouton

                    $button.text('Refus en cours...');

                    $button.addClass('btn-disabled');

                    $button.prop('disabled', true);



                    $.ajax({

                        url: routeReject.replace('ID', selectedId),

                        method: 'POST',

                        data: {

                            _token: '{{ csrf_token() }}'

                        },

                        success: function(response) {

                            if (response.success) {

                                $('#rejectModal').modal('hide');

                                window.location.reload();

                            } else {

                                alert('Une erreur est survenue: ' + response.message);

                                // Réactiver le bouton en cas d'erreur

                                $button.text('Refuser');

                                $button.removeClass('btn-disabled');

                                $button.prop('disabled', false);

                            }

                        },

                        error: function(xhr) {

                            alert('Une erreur est survenue lors de la requête: ' + xhr.status +

                                ' ' + xhr.statusText);

                            // Réactiver le bouton en cas d'erreur

                            $button.text('Refuser');

                            $button.removeClass('btn-disabled');

                            $button.prop('disabled', false);

                        }

                    });

                }

            });

        });
    </script>









</body>



</html>
