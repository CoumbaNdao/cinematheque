@extends('base')
@section('title', 'Register')

@section('content')
    <!-- Normal Breadcrumb Begin -->
    <section class="normal-breadcrumb set-bg" data-setbg="{{asset('img/normal-breadcrumb.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="normal__breadcrumb__text">
                        <h2>Inscription</h2>
                        <p>Bienvenue sur notre plateforme.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Normal Breadcrumb End -->

    <!-- Signup Section Begin -->
    <section class="signup spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="login__form">
                        <h3>Sign Up</h3>
                        <form action="{{route('auth.register.register')}}" method="post">
                            @csrf
                            <div class="input__item">
                                <input type="text" id="email" name="email" placeholder="Adresse email">
                                <span class="icon_mail"></span>
                            </div>
                            <div class="input__item">
                                <input type="text" name="nom" id="nom" placeholder="Nom">
                                <span class="icon_profile"></span>
                            </div>
                            <div class="input__item">
                                <input type="text" name="prenom" id="prenom" placeholder="Prénom">
                                <span class="icon_profile"></span>
                            </div>

                            <div class="input__item">
                                <input type="password"
                                       data-name="tet"
                                       name="password"
                                       minlength="8"
                                       maxlength="20"
                                       id="password"
                                       onkeyup="sec()"
                                       required="required"
                                       placeholder="Mot de passe">
                                <span class="icon_lock" id="msg"></span>
                            </div>
                            <div class="input__item">
                                <input type="password"
                                       minlength="8"
                                       maxlength="20"
                                       name="validationMdp"
                                       id="password"
                                       required="required"
                                       placeholder="Confirmer le mot de passe">
                                <span class="icon_lock"></span>
                            </div>

                            <div class="list-group-horizontal-md">
                                <select name="userprofile">
                                    <option value="">-- Vous êtes : --</option>
                                    <option value="1">Journaliste</option>
                                    <option value="2">Internaute</option>
                                </select>
                            </div>
<br>
                            <br>
                            <br>
                            <button  type="submit" class="site-btn" onclick="validateMdp()" >S'inscrire</button>
                        </form>
                        <h5>Déjà un compte? <a href="{{route('auth.login.index')}}">Se connecter!</a></h5>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="login__social__links">
                        <h3>Se connecter avec:</h3>
                        <ul>
                            <li><a href="#" class="facebook"><i class="fa fa-facebook"></i> Facebook</a>
                            </li>
                            <li><a href="#" class="google"><i class="fa fa-google"></i> Google</a></li>
                            <li><a href="#" class="twitter"><i class="fa fa-twitter"></i> Twitter</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Signup Section End -->
@endsection

@push('js')
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <script>


        function sec() {


            let mdp = document.getElementById('mdpCandidat').value;
            let msg = "";

            console.log(this);


            if (mdp.length > 20) {
                msg = msg + "<li class='text-danger'> mot de pass trop long"
            }

            if (mdp.length < 8) {
                msg = msg + "<li class='text-danger'> mot de pass trop court"
            }

            if (!mdp.match(/[0-9]/g)) {
                msg = msg + "<li class='text-danger'> mot de pass doit contenir un chiffre"
            }


            if (!mdp.match(/[a-z]/g)) {
                msg = msg + "<li class='text-danger'> mot de pass doit contenir un caractère en minuscule"
            }


            if (!mdp.match(/[A-Z]/g)) {
                msg = msg + "<li class='text-danger'> mot de pass doit contenir un caractère en Majuscule"
            }

            if (!mdp.match(/[^a-zA-z\d]/g)) {
                msg = msg + "<li class='text-danger'> mot de pass doit contenir un caractère spécial"
            }

            document.getElementById('msg').innerHTML = msg
        }


        function validateMdp() {
            let mdp = document.getElementById('mdpCandidat').value;

            if (
                mdp.match(/[0-9]/g) &&
                mdp.match(/[a-z]/g) &&
                mdp.match(/[A-Z]/g) &&
                mdp.match(/[^a-zA-z\d]/g) &&
                mdp.length <= 20 &&
                mdp.length >= 8
            ) {
                document.getElementById("candidatInscriptionForm").submit();
            } else {
                alert('Votre mot de passe doit respecter les critères suivants : Compris entre 8 et 12 caractères, au moins un chiffre, une lettre majuscule et miniscule et un caractère spécial' + mdp);
            }


        }

    </script>
@endpush

