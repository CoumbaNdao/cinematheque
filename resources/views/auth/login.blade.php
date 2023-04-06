@extends('base')
@section('title', 'Login')
@section('content')
    <!-- Normal Breadcrumb Begin -->
    <section class="normal-breadcrumb set-bg" data-setbg="{{asset('img/normal-breadcrumb.jpg')}}">
{{--        {{asset('css/bootstrap.min.css')}}--}}
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="normal__breadcrumb__text">
                        <h2>Connexion</h2>
                        <p>Bienvenue sur notre plateforme.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Normal Breadcrumb End -->

    <!-- Login Section Begin -->
    <section class="login spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="login__form">
                        <h3>Login</h3>
                        <form action="{{route('auth.login.login')}}" method="post">
                            @csrf
                            <div class="input__item">
                                <input type="text" placeholder="Adresse email" id="email" name="email">
                                <span class="icon_mail"></span>
                            </div>
                            <div class="input__item">
                                <input type="password" placeholder="Mot de passe" id="password" name="password">
                                <span class="icon_lock"></span>
                            </div>
                            <button type="submit" class="site-btn">Se connecter</button>
                        </form>
                        <a href="#" class="forget_pass">Mot de passe oublié?</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="login__register">
                        <h3>Pas de compte?</h3>
                        <a href="{{route('auth.register.index')}}" class="primary-btn">S'inscrire</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Login Section End -->

@endsection




