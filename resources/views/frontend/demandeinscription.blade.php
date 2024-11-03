@extends("frontend.layout")

@section("title", "AKP ROM-Note Demande d'inscription")

@section("content")

  <main id="main-inscription">
    <section class="inscription-header pt-3" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
      <div class="container">
        <div class="col-md-12 d-flex align-items-center justify-content-between">
          <div class="col-md-6 logo-register">
            <img src="/assets/img/logo ROMNOTE 1.png" alt="" class="text-light logo-text image images">
          </div>
          <div class="col-md-6 d-flex align-items-end justify-content-end">
            <a href="{{ route('home') }}" class="btn btn-custom btn-saveur">Retour</a>
          </div>
        </div>
      </div>
    </section>
    @if ($errors->any())
    <div class="alert alert-danger text-center" style="font-weight: bold">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="col-md-12 d-flex align-items-center justify-content-center">
      <div class="section-title-register text-center w-50">
        <h2>Inscription</h2>
      </div>
    </div>
    <!-- ======= Contact Section ======= -->
    <section class="inscription" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">

      <div class="container">

        <div class="row">
        <div class="container contenue" >
          <div class="col-lg-12">
            <form action="{{route('demandeinscription.store')}}" id="" method="post" role="form">
                  @csrf
              <div class="form-row mt-2">
                <div class="col-md-6 form-group">
                  <label for="">Prenom</label>
                  <input type="text" name="prenom" class="form-control conn-input-regi col-md-8" id="lastname" placeholder="" data-rule="Prenom"required/>
                  <div class="validate"></div>
                </div>
                <div class="col-md-6 form-group">
                <label for="">Nom</label>
                  <input type="text" class="form-control  conn-input-regi col-md-8" name="nom" id="firstname" placeholder="" data-rule="firstname" required/>
                  <div class="validate"></div>
                </div>
              </div>
              <div class="form-row  mt-2">
                <div class="col-md-6 form-group">
                <label for="">Contact</label>
                  <input type="tel" name="contact" class="form-control conn-input-regi col-md-8" id="phone" placeholder="" data-rule="phone"  required/>
                  <div class="validate"></div>
                </div>
                <div class="col-md-6 form-group">
                <label for="">Email</label>
                  <input type="email" class="form-control conn-input-regi col-md-8" name="email" id="email" placeholder="" data-rule="email" required/>
                  <div class="validate"></div>
                </div>
              </div>
              <div class="form-row  mt-2">
                <div class="col-md-6 form-group">
                <label for="">Nom de l'établissement</label>
                  <input type="text" name="nometablissement" class="form-control conn-input-regi col-md-8" id="nameschool" placeholder="" data-rule="nameschool" required/>
                  <div class="validate"></div>
                </div>
                <div class="col-md-6 form-group">
                  <label for="">Adresse de l'établissement</label>
                  <input type="text" class="form-control conn-input-regi col-md-8 " name="adresseetablissement" id="adress" placeholder="" data-rule="adress" required/>
                  <div class="validate"></div>
                </div>
              </div>
              <div class="form-row mt-4">
                <div class="col-md-5 form-group">
                  <input type="checkbox" id="exampleInputEmail1required"> <span style="color: #4a3dbb;">J'ai lu et j'accepte les <span class="fgpwd">Termes et conditions</span> ainsi que la <a href="" class="fgpwd">Politique de confidentialité.</a> </span>
                  <div class="validate"></div>
                </div>
                <div class="col-md-7 form-group">
                  <div class="text-right"><button type="submit" class="btn btn-save-register">Inscription</button></div>
                  <div class="validate"></div>
                </div>
                <!-- <div class="col-md-12  text-center form-group">
                    <p>Vous avez déjà un compte ? <a href="{{ route('login') }}" class="fgpwd">Cliquez ici</a></p>
                    </div> -->
              </div>
            </form>
          </div>

        </div>
        </div>
      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  @endsection
