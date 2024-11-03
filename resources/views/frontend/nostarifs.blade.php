<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AKP ROM-Note</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/3c4b920158.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
    <link rel="icon" href="{{ asset('assets/img/FaviconROMNOTE.png') }}" type="image/png">

    <style>
        .full-screen-div {
            background: url("{{asset('frontend/img/font.png')}}") no-repeat center center;
            background-size: cover;
            z-index: 1;
            width: 100%;
            padding: 30px;
            position: relative;
            height: 80vh;
        }

        .content-container {
            display: flex;
            justify-content: space-between;
        }

        .logo {
            color: #38B293;
        }

        h2 {
            font-size: 2rem;
            color: white;
        }

        #btnRetour {
            font-size: 19px;
            border-radius: 0%;
            /* margin-top: 20px; */
            padding-top: 10px;
            width: 160px;
            height: 50px;
            background-color: #0000009c;
            border:none;
        }

        #btnRetour:hover {
            background-color: #0000009c;
        }

        .centered-title {
            text-align: center;
            margin: 20px 0;
            color: white;
        }

        .centered-paragraph {
            text-align: center;
            margin: 0 auto 40px;
            max-width: 600px;
            color: white;
        }

        .card-section {
            padding: 60px 0 30px;
            position: relative;
            z-index: 2;
            margin-top: -20%;
            /* top: -200px; */
        }

        .card {
            width: 100%;
            height: auto;
            text-align: center;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 0px;
        }
        .card:hover {
    color: #fff;
    background: #003CC8;

    .card-price,
    .card-text,
    .card-title,
    .card-subtitle {
        color: #fff !important;
    }
}


        .card .card-title,
        .card .card-subtitle,
        .card .card-text {
            margin-bottom: 15px;
        }

        .card .card-title {
            color: #230fd7;
            font-weight: bold;
            font-size: 30px;
        }

        .card .card-subtitle {
            margin-top: 10px;
            color: #2f1ec9 !important;
            font-weight: bold;
            font-size: 15px;
        }

        .card .card-price {
            margin-top: 10px;
            color: #38B293 !important;
            font-weight: bold;
            font-size: 45px;
        }

        .card .card-text {
            margin-top: 10px;
            color: #4a3dbb;
        }

        .card-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .custom-btn {
            height: 100%;
            width: 40%;
            background-color: #38B293;
            color: white;
            border-radius: 0%;
            border: none;
            text-transform:uppercase;
            margin-top:100px;
        }

        .custom-btn:hover {
            background-color: #38B293;
            color: white;
        }
        .images{
            width: 320px;
        }
        /* Médias queries pour les petites tailles d'écran */
        @media (max-width: 768px) {
            .content-container {
                flex-direction: column;
                align-items: center;
            }

            #btnRetour {
                margin-top: 10px;
            }

            .card-section {
                margin-top: -100px;
            }

            .card {
                width: 90%;
            }
        }
        footer{
            display: flex;
            align-items: center;
            justify-content: center;
            color:#fff;
            background:#293d7a;
            height: 80px;
        }
        .centre{
            display: flex;
            justify-content: center;
        }
    </style>
</head>

<body>
    <div class="full-screen-div">
        <!-- Contenu de la div -->
        <div class="content-container">
            <img src="/assets/img/logo ROMNOTE 2.png" alt="" class="text-light logo-text image images">
            <a href="{{route('home')}}" id="btnRetour" class="btn btn-success ml-auto">Retour</a>
        </div>
        <div class="text-center centered-title">
            <h1>Choisissez votre plan!</h1>
        </div>
        <p class="centered-paragraph">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Rerum repellendus esse
            nemo, accusamus facere possimus omnis autem aperiam veniam placeat?</p>
    </div>

    <div class="card-section">
        <div class="container card-container">
            <div class="row centre">
                <div class="col-md-3">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">STARTER</h5>
                            <h6 class="card-subtitle mb-2 text-muted">A PARTIR DE</h6>
                            <h6 class="card-price mb-2 text-muted">80 000 F</h6>
                            <p class="card-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nostrum,
                                officia. Modi cupiditate nisi officia nulla velit exercitationem voluptate saepe
                                reiciendis!
                            </p>
                            <a href="/admin" class="btn custom-btn">Choisir</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">PREMIUM</h5>
                            <h6 class="card-subtitle mb-2 text-muted">A PARTIR DE </h6>
                            <h6 class="card-price mb-2 text-muted">200 000 F</h6>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique nemo
                                doloremque consequatur natus vitae error veritatis nobis possimus quam autem.
                                harum?</p>
                            <a href="/admin" class="btn custom-btn">Choisir</a>
                        </div>
                    </div>

                </div>
                <div class="col-md-3">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">ADVANCE</h5>
                            <h6 class="card-subtitle mb-2 text-muted">A PARTIR DE</h6>
                            <h6 class="card-price mb-2 text-muted">800 000 F</h6>
                            <p class="card-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nostrum,
                                officia. Modi cupiditate nisi officia nulla velit exercitationem voluptate saepe
                                reiciendis!</p>
                            <a href="/admin" class="btn custom-btn">Choisir</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('/admin.include.footer')

    <script src="../js/landing.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>
