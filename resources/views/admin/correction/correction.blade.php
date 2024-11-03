<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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

    <link rel="stylesheet" href="{{ asset('frontend/dashboard/css/messageError.css') }}">
    <link rel="icon" href="{{ asset('assets/img/FaviconROMNOTE.png') }}" type="image/png">



    <title>Liste_des_Etablissements</title>

<style>

    a{

        text-decoration: none !important;

    }

    .card1{

       background-color: #F2F4F6 !important; 

       display: flex;

       align-items: center;

       justify-content: center;

       position: relative;

       padding-top: 1rem;

       padding-bottom: 1rem;

       box-shadow: none !important;

    }

    .card-ellipsis i{

        font-size: 1.5rem;

    }

    .card-ellipsis {

        display: flex;

        justify-content: center;

        position: absolute;

        top: 2%;

        right: 2%;

        color: #000;

        background-color: #fff;

        padding: .5rem;

        border-radius: 50%;

    }

    .card-ellipsis:hover{

        color: #000;

        background-color: #fff;

    }

    .card-title{

        color: #293D7A;

        margin-top: 15px;

        font-size: 1rem;

    }

</style>

</head>





<body>

    <!-- header -->

    @include('admin.include.menu')



    <!-- accueil -->

    <div class="container">

        <div class="printableArea">

            <h2 class="text-start">Liste des Etablissements</h2>

            <div class="d-flex justify-content-between align-items-center flex-wrap action-buttons mb-3 no-print">

                <div class="d-flex search-container">

                    <i class="fa fa-search"></i>

                    <input id="searchInput" type="text" id="search" class="form-control search-bar"

                        placeholder="Rechercher...">

                </div>



                <div class="d-flex justify-content-end flex-wrap action-buttons">

                    <button class="btn btn-custom btn-imprimer" id="printBtn" onclick="printDiv()"><i

                            class="fa fa-print"></i> Imprimer</button>





                    <!-- Dropdown for Export options -->

                    <div class="btn-group">

                        <button class="btn btn-custom btn-exporter dropdown-toggle" type="button"

                            data-bs-toggle="dropdown" aria-expanded="false">

                            <i class="fa fa-download"></i> Exporter

                        </button>

                        <ul class="dropdown-menu" id="menu">

                            <!-- Assurez-vous que ces liens ont bien l'attribut href="#" et que onclick est correct -->

                            <li><a class="dropdown-item" id="excel" href="#"

                                    onclick="exportTableToExcel('#etablissementTable')">Excel</a></li>

                            <li><a class="dropdown-item" id="pdf" href="#"

                                    onclick="exportTableToPDF('#etablissementTable')">PDF</a></li>



                        </ul>

                    </div>

                    <button class="btn btn-custom btn-ajouter" data-bs-toggle="modal"

                        data-bs-target="#etablissementModal"><i class="fa fa-plus"></i> Ajouter un

                        Etablissement</button>

                </div> 

            </div>



            <div class="row">



                <a href="{{ route('listcorrection.admin') }}" class="col-sm-6 col-md-3">

                    <div class="card card1 rounded">

                    <div class="card-body">

                        <span class="card-ellipsis"><i class="fa-solid fa-ellipsis"></i></span>

                        <img src="{{ asset('/assets/img/folder.png') }}" alt="" srcset="">

                        <h5 class="card-title">S0004_ Economie_CF3A</h5>

                    </div>

                    </div>

                </a>



                <a href="{{ route('listcorrection.admin') }}" class="col-sm-6 col-md-3">

                    <div class="card card1 rounded">

                    <div class="card-body">

                        <span class="card-ellipsis"><i class="fa-solid fa-ellipsis"></i></span>

                        <img src="{{ asset('/assets/img/folder.png') }}" alt="" srcset="">

                        <h5 class="card-title">S0004_ Economie_CF3A</h5>

                    </div>

                    </div>

                </a>



                <a href="{{ route('listcorrection.admin') }}" class="col-sm-6 col-md-3">

                    <div class="card card1 rounded">

                    <div class="card-body">

                        <span class="card-ellipsis"><i class="fa-solid fa-ellipsis"></i></span>

                        <img src="{{ asset('/assets/img/folder.png') }}" alt="" srcset="">

                        <h5 class="card-title">S0004_ Economie_CF3A</h5>



                    </div>

                    </div>

                </a>



                <a href="#" class="col-sm-6 col-md-3">

                    <div class="card card1 rounded">

                    <div class="card-body">

                        <span class="card-ellipsis"><i class="fa-solid fa-ellipsis"></i></span>

                        <img src="{{ asset('/assets/img/folder.png') }}" alt="" srcset="">

                        <h5 class="card-title">S0004_ Economie_CF3A</h5>

                    </div>

                    </div>

                </a>



            </div>





        </div>

    </div>

    <!--  -->

    <!--  -->

    <!-- Modal -->

    <div class="modal fade" id="etablissementModal" tabindex="-1" aria-labelledby="etablissementModalLabel"

        aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered">

            <div class="modal-content">

                <h1 class="text-center">Ajouter</h1>

                <form action="{{ route('etablissement.store') }}" method="POST" class="needs-validation"

                    enctype="multipart/form-data" novalidate>

                    @csrf

                    <div class="modal-body">

                        <div class="row g-3">

                            <div class="col-sm-6">

                                <input type="text" class="form-control" name="nometablissement"

                                    placeholder="Nom Etablissement" required>

                                <div class="invalid-feedback">

                                    Le nom de l'établissement est requis.

                                </div>

                            </div>

                            <div class="col-sm-6">

                                <input type="text" class="form-control" name="nomresponsable"

                                    placeholder="Nom Responsable" required>

                                <div class="invalid-feedback">

                                    Le nom du responsable est requis.

                                </div>

                            </div>

                            <div class="col-sm-6">

                                <input type="text" class="form-control" name="prenomresponsable"

                                    placeholder="Prénom Responsable" required>

                                <div class="invalid-feedback">

                                    Le prénom du responsable est requis.

                                </div>

                            </div>

                            <div class="col-sm-6">

                                <input type="tel" class="form-control" name="contact" placeholder="Contact"

                                    required>

                                <div class="invalid-feedback">

                                    Le contact est requis.

                                </div>

                            </div>

                            <div class="col-sm-6">

                                <input type="text" class="form-control" name="adresse"

                                    placeholder="Adresse Etablissement" required>

                                <div class="invalid-feedback">

                                    L'adresse est requise.

                                </div>

                            </div>

                            <div class="col-sm-6">

                                <input type="file" class="form-control" name="file" placeholder="Logo"

                                    required>

                                <div class="invalid-feedback">

                                    Choisissez un logo valide.

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="modal-footer d-flex justify-content-between">

                        <button type="submit" class="btn btn-success">Sauvegarder</button>

                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>

                    </div>

                </form>

            </div>

        </div>

    </div>

    <!--  -->





    <script>

        document.addEventListener('DOMContentLoaded', function() {

            // Définir la configuration pour ce fichier

            setTableConfig({

                'Matière': 5, // Index de la colonne "Matière"

                'Classe': 6 // Index de la colonne "Classe"

            });



            // Définir l'ID du tableau pour les fonctions de recherche et de pagination

            setTableId('#etablissementTable');

            // Appel des fonctions de recherche et de pagination

            searchTable('#etablissementTable tbody', 'searchInput', 'noResults');

            paginateTable('#etablissementTable');

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







</body>



</html>

