<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="description" content="Anime Template">
    <meta name="keywords" content="Anime, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cine | Spot</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600;700;800;900&display=swap"
          rel="stylesheet">

    <!-- Css Styles -->
    @stack('css')
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/plyr.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/style.css')}}" type="text/css">

    <style>
        /* Style pour la mise en page */
        body {
            background-color: #0B0C2A;
            color: #ccc;
            font-family: Mulish;
        }

        .tab {
            overflow: hidden;
            border: 1px solid #F44336;
            background-color: #0B0C2A;
            color: #fff;
        }

        .tab button {
            background-color: inherit;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            transition: 0.3s;
            font-size: 17px;
            color: #fff;
        }

        .tab button:hover {
            background-color: #F44336;
        }

        .tab button.active {
            background-color: #F44336;
        }

        .tabcontent {
            display: none;
            padding: 6px 12px;
            border: 1px solid #F44336;
            border-top: none;
        }

        .card {
            text-align: center;
            float: left;
            margin-left: 15px;
            color: #fff;

        }

        .grid {
            display: inline-block;
            position: relative;
            color: #fff;
        }

        .content {
            position: relative;
            width: 100%;
            height: fit-content;
            display: inline-block;
            background-color: #0B0C2A;
            color: #fff;
        }

        .image {
            position: relative;
            float: left;
        }

        .present {
            position: relative;
            float: left;
            padding-left: 15px;
            background-color: #0B0C2A;
            color: #fff;
        }

        .button-inverse-full {
            background: #F44336;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
        }

        .userspace-input {
            background-color: #fff;
            border: 1px solid #ececec;
            border-radius: 2px;
            color: #333;
            font-size: .875rem;
            height: 3.125rem;
            padding-left: 1.125rem;
            width: 90%;
        }

        .rating, .rate {
            margin: 20px auto;
        }

        .star, .stars {
            font-size: 2rem;
            color: grey;
            cursor: pointer;
        }

        .star.active,
        .star:hover, .stars.active, .stars:hover {
            color: gold;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #0B0C2A;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 40%;
        }

        .close {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }

        textarea {
            width: 90%;
            height: 100px;
            margin: 20px auto;
            resize: none;
            border-radius: 5px;
            padding: 10px;
            border: 1px solid grey;
        }

    </style>
</head>
<body>

<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Header Section Begin -->
<header class="header">
    <div class="container">
        <div class="row">
            <div class="col-lg-2">
                <div class="header__logo">
                    <a href="{{route('index')}}">
                        <img src="{{asset('img/cinespot.png')}}" alt="">
                    </a>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="header__nav">
                    <nav class="header__menu mobile-menu">
                        <ul>
                            <li class="active"><a href="{{route('index')}}">Accueil</a></li>
                            <li><a href="{{route('internaute.film')}}">Films</a></li>
                            <li><a href="{{route('internaute.evenement')}}">Evènement</a></li>
                            <li><a href="#">Contacts</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="header__right">
                    <a href="#" class="search-switch"><span class="icon_search"></span></a>
                    <a onclick="openTab(event, 'preferences')"><span class="icon_profile"></span></a>
                </div>
            </div>
        </div>
        <div id="mobile-menu-wrap"></div>
    </div>
</header>
<!-- Header End -->

<!-- Normal Breadcrumb Begin -->
<section class="normal-breadcrumb set-bg" data-setbg="{{asset('img/anime/recompense.png')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="normal__breadcrumb__text">
                    <h2>Internaute</h2>
                    <p>Bienvenue dans votre espace !</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section de navigation -->
<center>
    <div class="center">
        <button class="tab" onclick="openTab(event, 'filmsVus')">Films déjà vus</button>
        <button class="tab" onclick="openTab(event, 'filmsAVoir')">Films à voir</button>
        <button class="tab" onclick="openTab(event, 'critiques')">Mes critiques</button>
        <button class="tab" onclick="openTab(event, 'preferences')">Préférences</button>
        <a href="{{route('logout')}}">
            <button class="tab">Déconnexion</button>
        </a>
    </div>
</center>
<!-- Contenu de la page -->
<div id="filmsVus" class="tabcontent">
    <div>
        <h2></h2>
        <button type="button" class="button button-inverse-full button-md" id="ajouterVusBtn">Ajouter des films</button>
    </div>
    <br><br>
    @foreach($films_vues as $films_vue)
        <div class="grid">
            <div class="card">
                <img {{$films_vue->idfilm ? 'selected': ''}} src="{{asset($films_vue->photo)}}" height="240px" width="180px"
                     alt="image">
                <p>{{$films_vue->titre}}</p>
            </div>
            {{--        <div class="card">--}}
            {{--            <img src="{{asset('img/photo/babylon.jpg')}}" height="240px" width="180px" alt="image">--}}
            {{--            <h3>Babylon</h3>--}}
            {{--        </div>--}}
        </div>
    @endforeach

    <div id="modalVus" class="modal">
        <div class="row d-flex justify-content-center mb-5 mt-5">
            <div class="modal-content">
                <table>
                    <h3></h3>
                    <tr>
                        <th>Titre du film</th>
                    </tr>
                    <form method="post" action="{{route('internaute.filmvus')}}">
                        @csrf
                        <tr>
                            <td>
                                <select class="form-control" name="idfilm" id="idfilm">
                                    @foreach($films as $film)
                                        <option value="{{$film->idfilm}}">{{$film->titre}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <input type="submit" name="Creer" value="Ajouter" class="btn btn-success">
                            </td>
                        </tr>
                        {{--                <button type="submit" class="button button-inverse-full button-md">Ajouter</button>--}}
                    </form>
                </table>
            </div>

        </div>
    </div>

    <script>
        // Sélectionner le bouton "Ajouter des envies de voir"
        const ajouterVusBtn = document.getElementById("ajouterVusBtn");

        // Sélectionner le modal
        const modalVus = document.getElementById("modalVus");

        // Afficher le modal lorsque le bouton est cliqué
        ajouterVusBtn.onclick = function () {
            modalVus.style.display = "block";

            // Sélectionner le bouton "Ajouter" dans le formulaire
            const ajouterBtn = document.querySelector("#modalVus button[type='submit']");

            // Fermer le modal lorsque le bouton "Ajouter" est cliqué
            ajouterBtn.onclick = function () {
                modalVus.style.display = "none";
            }

            // Fermer le modal lorsque l'utilisateur clique en dehors du modal
            window.onclick = function (event) {
                if (event.target == modalVus) {
                    modalVus.style.display = "none";
                }
            }
        }
    </script>
</div>

<div id="filmsAVoir" class="tabcontent">
    <div>
        <h2></h2>
        <button type="button" class="button button-inverse-full button-md" id="ajouterEnviesBtn">Ajouter des envies de
            voir
        </button>
    </div>
    <br><br>

    <div class="grid">
        @foreach($filmsavoir as $filmavoir)
        <div class="card">
            <img src="{{asset($filmavoir->photo)}}" height="240px" width="180px" alt="image">
            <p>{{$filmavoir->titre}}</p>
        </div>
        @endforeach

    </div>
    <div id="modalEnvies" class="modal">
        <div class="row d-flex justify-content-center mb-5 mt-5">
            <div class="modal-content">
                <table>
                    <h3></h3>
                    <tr>
                        <th>Titre du film</th>
                    </tr>
                    <form method="post" action="{{route('internaute.filmavoir')}}">
                        @csrf
                        <tr>
                            <td>
                                <select class="form-control" name="idfilm" id="idfilm">
                                    @foreach($films as $film)
                                        <option value="{{$film->idfilm}}">{{$film->titre}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <input type="submit" name="Creer" value="Ajouter" class="btn btn-success">
                            </td>
                        </tr>
                        {{--                <button type="submit" class="button button-inverse-full button-md">Ajouter</button>--}}
                    </form>
                </table>
            </div>

        </div>
    </div>
    <script>
        // Sélectionner le bouton "Ajouter des envies de voir"
        const ajouterEnviesBtn = document.getElementById("ajouterEnviesBtn");

        // Sélectionner le modal
        const modalEnvies = document.getElementById("modalEnvies");

        // Afficher le modal lorsque le bouton est cliqué
        ajouterEnviesBtn.onclick = function () {
            modalEnvies.style.display = "block";

            // Sélectionner le bouton "Ajouter" dans le formulaire
            const ajouterBtn = document.querySelector("#modalEnvies button[type='submit']");

            // Fermer le modal lorsque le bouton "Ajouter" est cliqué
            ajouterBtn.onclick = function () {
                modalEnvies.style.display = "none";
            }

            // Fermer le modal lorsque l'utilisateur clique en dehors du modal
            window.onclick = function (event) {
                if (event.target == modalEnvies) {
                    modalEnvies.style.display = "none";
                }
            }
        }
    </script>
</div>

<div id="critiques" class="tabcontent">
    <div>
        <h2></h2>
        <button type="button" class="button button-inverse-full button-md" id="ajouterCritiqueBtn">Ajouter une
            critique
        </button>
    </div>
    <br><br>

    @foreach($films_critiques as $films_critique)

        <div class="content">
            <div class="image">
                <img src="{{asset($films_critique->photo)}}" height="240px" width="180px" alt="image">
            </div>
            <div class="present">
                <br>
                <br>
                <br>
                <p style="color: white">{{$films_critique->titre}}</p>
                <p style="color: white">{{$films_critique->contenu}}</p>
                <p style="color: white">{{$films_critique->note}}</p>
{{--                <div class="rating">--}}
{{--                    <span class="star" data-value="1">&#9733;</span>--}}
{{--                    <span class="star" data-value="2">&#9733;</span>--}}
{{--                    <span class="star" data-value="3">&#9733;</span>--}}
{{--                    <span class="star" data-value="4">&#9733;</span>--}}
{{--                    <span class="star" data-value="5">&#9733;</span>--}}
{{--                </div>--}}
            </div>
        </div>
    @endforeach
    <script>
        const ratingStars = document.querySelectorAll(".star");
        let rating = 0;

        ratingStars.forEach(star => {
            star.addEventListener("click", () => {
                rating = star.getAttribute("data-value");
                highlightStars(rating);
            });
        });

        function highlightStars(rating) {
            ratingStars.forEach(star => {
                if (star.getAttribute("data-value") <= rating) {
                    star.classList.add("active");
                } else {
                    star.classList.remove("active");
                }
            });
        };
    </script>
    <div id="modalCritique" class="modal">
        <div class="modal-content">
            <h2>Ajouter une critique</h2>
            <form method="POST" action="{{route('internaute.ajoutcritique')}}">

                @csrf
                <tr>
                    <td>
                        <select class="form-control" name="idfilm" id="idfilm">
                            @foreach($films as $film)
                                <option value="{{$film->idfilm}}">{{$film->titre}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <br>
                <div class="rating">
                    <span> MA NOTE</span>
                    <input type="number" step="1" name="note">
                </div>
                <textarea name="contenu"
                          placeholder="Partagez avec nous ce que vous avez pensé de ce film, sans spoiler! "></textarea>
                <p>Nous vous rappelons qu'il n'est pas permis de tenir des propos violents, diffamatoires ou
                    discriminatoires. Toutes critiques ne respectant pas ces règles seront retirées et leurs émetteurs
                    seront bannis de la plateforme</p>
                <input type="hidden" name="Creer" value="Creer">
                <button type="submit" class="button button-inverse-full button-md">Envoyer</button>
            </form>
        </div>
    </div>
    <script>
        // Sélectionner le bouton "Ajouter des envies de voir"
        const ajouterCritiqueBtn = document.getElementById("ajouterCritiqueBtn");

        // Sélectionner le modal
        const modalCritique = document.getElementById("modalCritique");

        // Afficher le modal lorsque le bouton est cliqué
        ajouterCritiqueBtn.onclick = function () {
            modalCritique.style.display = "block";

            // Sélectionner le bouton "Ajouter" dans le formulaire
            const ajouterBtn = document.querySelector("#modalCritique button[type='submit']");

            // Fermer le modal lorsque le bouton "Ajouter" est cliqué
            ajouterBtn.onclick = function () {
                modalCritique.style.display = "none";
            }

            // Fermer le modal lorsque l'utilisateur clique en dehors du modal
            window.onclick = function (event) {
                if (event.target == modalCritique) {
                    modalCritique.style.display = "none";
                }
            }
        }

        const ratingStar = document.querySelectorAll(".stars");
        let rate = 0;

        ratingStar.forEach(star => {
            star.addEventListener("click", () => {
                rate = star.getAttribute("data-value");
                highlightStars(rate);
            });
        });

        function highlightStars(rating) {
            ratingStar.forEach(star => {
                if (star.getAttribute("data-value") <= rating) {
                    star.classList.add("active");
                } else {
                    star.classList.remove("active");
                }
            });
        };
    </script>
</div>
<!-- Profile Section Begin -->
<section class="signup spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="login__form">
                    <h3>Mon Profil Cinéphile</h3>
                    <form method="post" action="{{route('internaute.update')}}">
                        @csrf
                        <label for="nom">Votre Nom</label><br>
                        {{--                            <input class="userspace-input" type="text" id="nom" name="nom" value="{{$internaute->$utilisateur->nom}}">--}}
                        <input class="userspace-input" type="text" id="nom" name="nom" value="{{$user->nom}}">
                        <br><br>

                        <label for="nom">Votre Prénom</label><br>
                        <input class="userspace-input" type="text" id="prenom" name="prenom"
                               value="{{$user->prenom}}"><br><br>

                        <label for="email">Votre Email</label><br>
                        <input class="userspace-input" type="text" id="email" name="email" value="{{$user->email}}"><br><br>

                        <label for="mdp">Votre Mot de passe</label><br>
                        <input class="userspace-input" type="password" name="password" id="password"
                               placeholder="**********"><br><br>
                        &nbsp;
                        &nbsp;

                        <input class="button-inverse-full" type="submit" value="Enregistrer">

                        &nbsp;
                        &nbsp;
                        &nbsp;
                        &nbsp;
                        &nbsp;
                        &nbsp;
                        &nbsp;
                        &nbsp;

                        <input class="button-inverse-full" type="reset" value="Supprimer mon compte"
                               style="margin:right;">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Script pour la fonctionnalité des onglets -->
<script>
    function openTab(evt, tabName) {
// Récupère tous les éléments avec class="tabcontent" et les cache
        var tabcontent = document.getElementsByClassName("tabcontent");
        for (var i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }

// Récupère tous les éléments avec class="tablinks" et les active
        var tab = document.getElementsByClassName("tab");
        for (var i = 0; i < tab.length; i++) {
            tab[i].className = tab[i].className.replace(" active", "");
        }

// Affiche l'onglet actuel et ajoute la classe "active" au bouton qui a ouvert l'onglet
        document.getElementById(tabName).style.display = "block";
        evt.currentTarget.className += " active";
    }
</script>

<!-- Footer Section Begin -->
<footer class="footer">
    <div class="page-up">
        <a href="#" id="scrollToTopButton"><span class="arrow_carrot-up"></span></a>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="footer__logo">
                    <a href="./index.html"><img src="img/logo.png" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="footer__nav">
                    <ul>
                        <li class="active"><a href="{{route('index')}}">Accueil</a></li>
                        <li><a href="{{route('unfilm')}}">Films</a></li>
                        <li><a href="{{route('evenement')}}">Evènement</a></li>
                        <li><a href="#">Contacts</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3">
                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                    All rights reserved | CINESPOT with <i class="fa fa-heart" aria-hidden="true"></i>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>

            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->

<!-- Search model Begin -->
<div class="search-model">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="search-close-switch"><i class="icon_close"></i></div>
        <form class="search-model-form">
            <input type="text" id="search-input" placeholder="Search here.....">
        </form>
    </div>
</div>
<!-- Search model end -->

<!-- Js Plugins -->
<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/player.js')}}"></script>
<script src="{{asset('js/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('js/mixitup.min.js')}}"></script>
<script src="{{asset('js/jquery.slicknav.js')}}"></script>
<script src="{{asset('js/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
@stack('js')
</body>
</html>


