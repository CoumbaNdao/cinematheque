<!DOCTYPE html>
<html>
<head>
    <meta charset="ISO-8859-1">
    <title>Gestion Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>

</head>
<body>
<div class="container text-center">
    <a href="{{route('logout')}}" class="text-danger"> Déconnexion </a>
    <h1> Espace Admin</h1>
    <a href="{{route('admin.dashboard')}}">
        <img src="{{asset('img/manage.jpg')}}" alt="l" height="100" width="100">
    </a>
    <a href="{{route('admin.stat')}}">
        <img src="{{asset('img/stat.png')}}" alt="l" height="100" width="100">
    </a>
    <hr>
    <div class="row d-flex justify-content-center mb-5 mt-5">
        <h2> Tableau de bord </h2>

        <table class="table table-striped table-primary">
            <tr>
                <th> NB Version</th>
            </tr>
            <tr>
                <td>{{count($versions)}}</td>
            </tr>
        </table>
    </div>

    <div class="row d-flex justify-content-center mb-5 mt-5">
        <h2> Gestion des Versions </h2>

        <table class="table table-striped table-warning">
            <tr>
                <th> Libellé</th>
                <th>Action</th>
            </tr>
            @foreach($versions as $version)

                <form method="post" action="{{route('admin.version', [$version->idversion])}}">
                    @csrf
                    <tr>
                        <td><input type="text" name="nomversion" value="{{$version->nomversion}}" class="form-control">
                        </td>
                        <td>
                            <input type="submit" name="Supprimer" value="Supprimer" class="btn btn-danger">
                            <input type="submit" name="Valider" value="Valider" class="btn btn-success">
                        </td>
                    </tr>
                </form>

            @endforeach

            <form method="post" action="{{route('admin.version')}}">
                @csrf
                <tr>
                    <td><input type="text" name="nomversion" required placeholder="Ajouter une version"
                               class="form-control"></td>
                    <td>

                        <input type="submit" name="Creer" value="Créer" class="btn btn-success">
                    </td>
                </tr>
            </form>

        </table>
    </div>

    <div class="row d-flex justify-content-center mb-5 mt-5">
        <h2> Gestion des Genres </h2>

        <table class="table table-striped table-warning">
            <tr>
                <th> Libellé</th>
                <th>Action</th>
            </tr>
            @foreach($genres as $genre)

                <form method="post" action="{{route('admin.genre', [$genre->idgenre])}}">
                    @csrf
                    <tr>
                        <td><input type="text" name="nomgenre" value="{{$genre->nomgenre}}" class="form-control">
                        </td>
                        <td>
                            <input type="submit" name="Supprimer" value="Supprimer" class="btn btn-danger">
                            <input type="submit" name="Valider" value="Valider" class="btn btn-success">
                        </td>
                    </tr>
                </form>

            @endforeach

            <form method="post" action="{{route('admin.genre')}}">
                @csrf
                <tr>
                    <td><input type="text" name="nomgenre" required placeholder="Ajouter un genre"
                               class="form-control"></td>
                    <td>

                        <input type="submit" name="Creer" value="Créer" class="btn btn-success">
                    </td>
                </tr>
            </form>

        </table>
    </div>

    <div class="row d-flex justify-content-center mb-5 mt-5">
        <h2> Gestion des Thèmes </h2>

        <table class="table table-striped table-warning">
            <tr>
                <th> Libellé</th>
                <th>Action</th>
            </tr>
            @foreach($themes as $theme)

                <form method="post" action="{{route('admin.theme', [$theme->idtheme])}}">
                    @csrf
                    <tr>
                        <td><input type="text" name="nomtheme" value="{{$theme->nomtheme}}" class="form-control">
                        </td>
                        <td>
                            <input type="submit" name="Supprimer" value="Supprimer" class="btn btn-danger">
                            <input type="submit" name="Valider" value="Valider" class="btn btn-success">
                        </td>
                    </tr>
                </form>

            @endforeach

            <form method="post" action="{{route('admin.theme')}}">
                @csrf
                <tr>
                    <td><input type="text" name="nomtheme" required placeholder="Ajouter un Thème"
                               class="form-control"></td>
                    <td>

                        <input type="submit" name="Creer" value="Créer" class="btn btn-success">
                    </td>
                </tr>
            </form>

        </table>
    </div>

    <div class="row d-flex justify-content-center mb-5 mt-5">
        <h2> Gestion des Récompenses </h2>

        <table class="table table-striped table-warning">
            <tr>
                <th> Libellé</th>
                <th> Photo</th>
                <th> Evènement</th>
                <th>Action</th>
            </tr>
            @foreach($recompenses as $recompense)

                <form method="post" action="{{route('admin.recompense', [$recompense->idrecompense])}}"
                      enctype="multipart/form-data">
                    @csrf
                    <tr>
                        <td><input type="text" name="nomrecompense" value="{{$recompense->nomrecompense}}"
                                   class="form-control"></td>
                        <td><input type="file" name="photorecompense" value="{{$recompense->photorecompense}}"
                                   class="form-control">{{$recompense->photorecompense}}</td>
                        <td><select class="form-control" name="idevenement" id="idevenement" required="required">
                                @foreach($evenements as $evenement)
                                    <option
                                        {{$evenement->idevenement == $recompense->idevenement ? 'selected' : ''}} value="{{$evenement->idevenement}}">{{$evenement->nomevenement}}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input type="submit" name="Supprimer" value="Supprimer" class="btn btn-danger">
                            <input type="submit" name="Valider" value="Valider" class="btn btn-success">
                        </td>
                    </tr>
                </form>

            @endforeach

            <form method="post" action="{{route('admin.recompense')}}" enctype="multipart/form-data">
                @csrf
                <tr>
                    <td><input type="text" name="nomrecompense" required placeholder="Ajouter une récompense"
                               class="form-control"></td>

                    <td><input type="file" name="photorecompense" required placeholder="Ajouter une photo"
                               class="form-control"></td>
                    <td>
                        <select class="form-control" name="idevenement" id="idevenement" required="required">
                            @foreach($evenements as $evenement)
                                <option value="{{$evenement->idevenement}}">{{$evenement->nomevenement}}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input type="submit" name="Creer" value="Créer" class="btn btn-success">
                    </td>
                </tr>
            </form>

        </table>
    </div>

    <div class="row d-flex justify-content-center mb-5 mt-5">
        <h2> Gestion des Lieux </h2>

        <table class="table table-striped table-warning">
            <tr>
                <th> Libellé</th>
                <th>Action</th>
            </tr>
            @foreach($lieux as $lieu)

                <form method="post" action="{{route('admin.lieu', [$lieu->idlieu])}}">
                    @csrf
                    <tr>
                        <td><input type="text" name="nomlieu" value="{{$lieu->nomlieu}}" class="form-control">
                        </td>
                        <td>
                            <input type="submit" name="Supprimer" value="Supprimer" class="btn btn-danger">
                            <input type="submit" name="Valider" value="Valider" class="btn btn-success">
                        </td>
                    </tr>
                </form>

            @endforeach

            <form method="post" action="{{route('admin.lieu')}}">
                @csrf
                <tr>
                    <td><input type="text" name="nomlieu" required placeholder="Ajouter un Lieu"
                               class="form-control"></td>
                    <td>
                        <input type="submit" name="Creer" value="Créer" class="btn btn-success">
                    </td>
                </tr>
            </form>

        </table>
    </div>

    <div class="row d-flex justify-content-center mb-5 mt-5">
        <h2> Gestion des Evènements </h2>

        <table class="table table-striped table-warning">
            <tr>
                <th> Libellé</th>
                <th> Date</th>
                <th> Affiche</th>
                <th> Lieu de l'évènement</th>
                <th>Action</th>
            </tr>
            @foreach($evenements as $evenement)

                <form method="post" action="{{route('admin.evenement', [$evenement->idevenement])}}"
                      enctype="multipart/form-data">
                    @csrf
                    <tr>
                        <td><input type="text" name="nomevenement" value="{{$evenement->nomevenement}}"
                                   class="form-control"></td>
                        <td><input type="date" name="dateevenement" value="{{$evenement->dateevenement}}"
                                   class="form-control"></td>
                        <td><input type="file" name="afficheevenement" value="{{$evenement->afficheevenement}}"
                                   class="form-control">{{$evenement->afficheevenement}}</td>
                        <td><select class="form-control" name="idlieu" id="idlieu" required="required">
                                @foreach($lieux as $lieu)
                                    <option
                                        {{$lieu->idlieu == $evenement->idlieu ? 'selected' : ''}} value="{{$lieu->idlieu}}">{{$lieu->nomlieu}}</option>
                                @endforeach
                            </select></td>
                        <td>
                            <input type="submit" name="Supprimer" value="Supprimer" class="btn btn-danger">
                            <input type="submit" name="Valider" value="Valider" class="btn btn-success">
                        </td>
                    </tr>
                </form>

            @endforeach

            <form method="post" action="{{route('admin.evenement')}} " enctype="multipart/form-data">
                @csrf
                <tr>
                    <td>
                        <input type="text" name="nomevenement" required placeholder="Ajouter un Evènement"
                               class="form-control">
                    </td>

                    <td>
                        <input type="date" name="dateevenement" required placeholder="Ajouter la date"
                               class="form-control">
                    </td>
                    <td>
                        <input type="file" name="afficheevenement" required placeholder="Ajouter l'affiche"
                               class="form-control">
                    </td>

                    <td>
                        <select class="form-control" name="idlieu" id="idlieu" required="required">
                            @foreach($lieux as $lieu)
                                <option value="{{$lieu->idlieu}}">{{$lieu->nomlieu}}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input type="submit" name="Creer" value="Créer" class="btn btn-success">
                    </td>
                </tr>
            </form>

        </table>
    </div>

    <div class="row d-flex justify-content-center mb-5 mt-5">
        <h2> Gestion des Acteurs </h2>

        <table class="table table-striped table-warning">
            <tr>
                <th> Nom de l'acteur</th>
                <th> Prénom de l'acteur</th>
                <th> Date de naissance</th>
                <th> Nationalité</th>
                <th>Action</th>
            </tr>
            @foreach($acteurs as $acteur)

                <form method="post" action="{{route('admin.acteur', [$acteur->idacteur])}}">
                    @csrf
                    <tr>
                        <td><input type="text" name="nomacteur" value="{{$acteur->nomacteur}}" class="form-control">
                        </td>
                        <td><input type="text" name="prenomacteur" value="{{$acteur->prenomacteur}}"
                                   class="form-control"></td>
                        <td><input type="date" name="datenaissanceacteur" value="{{$acteur->datenaissanceacteur}}"
                                   class="form-control"></td>
                        {{--                        <td><input type="text" name="datedecesacteur" value="{{$acteur->datedecesacteur}}" class="form-control"></td>--}}
                        <td><input type="text" name="nationaliteacteur" value="{{$acteur->nationaliteacteur}}"
                                   class="form-control"></td>
                        <td>
                            <input type="submit" name="Supprimer" value="Supprimer" class="btn btn-danger">
                            <input type="submit" name="Valider" value="Valider" class="btn btn-success">
                        </td>
                    </tr>
                </form>

            @endforeach

            <form method="post" action="{{route('admin.acteur')}}">
                @csrf
                <tr>
                    <td><input type="text" name="nomacteur" required placeholder="Nom de l'acteur" class="form-control">
                    </td>
                    <td><input type="text" name="prenomacteur" required placeholder="Prénom de l'acteur"
                               class="form-control"></td>
                    <td><input type="date" name="datenaissanceacteur" required placeholder="Date de naissance"
                               class="form-control"></td>
                    {{--                    <td><input type="text" name="datedecesacteur" required placeholder="" class="form-control"></td>--}}
                    <td><input type="text" name="nationaliteacteur" required placeholder="Nationalité"
                               class="form-control"></td>
                    <td>
                        <input type="submit" name="Creer" value="Créer" class="btn btn-success">
                    </td>
                </tr>
            </form>

        </table>
    </div>

    <div class="row d-flex justify-content-center mb-5 mt-5">
        <h2> Gestion des Producteurs </h2>

        <table class="table table-striped table-warning">
            <tr>
                <th> Nom du producteur</th>
                <th> Prénom du producteur</th>
                <th> Date de naissance</th>
                <th> Nationalité</th>
                <th>Action</th>
            </tr>
            @foreach($producteurs as $producteur)

                <form method="post" action="{{route('admin.producteur', [$producteur->idproducteur])}}">
                    @csrf
                    <tr>
                        <td><input type="text" name="nomproducteur" value="{{$producteur->nomproducteur}}"
                                   class="form-control"></td>
                        <td><input type="text" name="prenomproducteur" value="{{$producteur->prenomproducteur}}"
                                   class="form-control"></td>
                        <td><input type="date" name="datenaissanceproducteur"
                                   value="{{$producteur->datenaissanceproducteur}}" class="form-control"></td>
                        {{--                        <td><input type="text" name="datedecesacteur" value="{{$acteur->datedecesacteur}}" class="form-control"></td>--}}
                        <td><input type="text" name="nationaliteproducteur"
                                   value="{{$producteur->nationaliteproducteur}}" class="form-control"></td>
                        <td>
                            <input type="submit" name="Supprimer" value="Supprimer" class="btn btn-danger">
                            <input type="submit" name="Valider" value="Valider" class="btn btn-success">
                        </td>
                    </tr>
                </form>

            @endforeach

            <form method="post" action="{{route('admin.producteur')}}">
                @csrf
                <tr>
                    <td><input type="text" name="nomproducteur" required placeholder="Ajouter le nom du producteur"
                               class="form-control"></td>
                    <td><input type="text" name="prenomproducteur" required
                               placeholder="Ajouter le prénom du producteur" class="form-control"></td>
                    <td><input type="date" name="datenaissanceproducteur" required placeholder="Date de naissance"
                               class="form-control"></td>
                    {{--                    <td><input type="text" name="datedecesacteur" required placeholder="" class="form-control"></td>--}}
                    <td><input type="text" name="nationaliteproducteur" required placeholder="Nationalité"
                               class="form-control"></td>
                    <td>
                        <input type="submit" name="Creer" value="Créer" class="btn btn-success">
                    </td>
                </tr>
            </form>

        </table>
    </div>

    <div class="row d-flex justify-content-center mb-5 mt-5">
        <h2> Gestion des Réalisateurs </h2>

        <table class="table table-striped table-warning">
            <tr>
                <th> Nom du réalisateurs</th>
                <th> Prénom du réalisateurs</th>
                <th> Date de naissance</th>
                <th> Nationalité</th>
                <th>Action</th>
            </tr>
            @foreach($realisateurs as $realisateur)

                <form method="post" action="{{route('admin.realisateur', [$realisateur->idrealisateur])}}">
                    @csrf
                    <tr>
                        <td><input type="text" name="nomrealisateur" value="{{$realisateur->nomrealisateur}}"
                                   class="form-control"></td>
                        <td><input type="text" name="prenomrealisateur" value="{{$realisateur->prenomrealisateur}}"
                                   class="form-control"></td>
                        <td><input type="date" name="datenaissancerealisateur"
                                   value="{{$realisateur->datenaissancerealisateur}}" class="form-control"></td>
                        <td><input type="text" name="nationaliterealisateur"
                                   value="{{$realisateur->nationaliterealisateur}}" class="form-control"></td>
                        <td>
                            <input type="submit" name="Supprimer" value="Supprimer" class="btn btn-danger">
                            <input type="submit" name="Valider" value="Valider" class="btn btn-success">
                        </td>
                    </tr>
                </form>

            @endforeach

            <form method="post" action="{{route('admin.realisateur')}}">
                @csrf
                <tr>
                    <td><input type="text" name="nomrealisateur" required placeholder="Ajouter le nom du réalisateurs"
                               class="form-control"></td>
                    <td><input type="text" name="prenomrealisateur" required
                               placeholder="Ajouter le prénom du réalisateurs" class="form-control"></td>
                    <td><input type="date" name="datenaissancerealisateur" required placeholder="Date de naissance"
                               class="form-control"></td>
                    <td><input type="text" name="nationaliterealisateur" required placeholder="Nationalité"
                               class="form-control"></td>
                    <td>
                        <input type="submit" name="Creer" value="Créer" class="btn btn-success">
                    </td>
                </tr>
            </form>

        </table>
    </div>

    <div class="row d-flex justify-content-center mb-5 mt-5">
        <h2> Gestion des Films </h2>

        <table class="table table-striped table-warning">
            <tr>
                <th> Titre</th>
                <th> Durée</th>
                <th> Date de sortie</th>
                <th> Synopsis</th>
                <th> Affiche</th>
                <th> Genre</th>
                <th> Réalisateur</th>
                <th> Producteur</th>
                <th>Action</th>
            </tr>
            @foreach($films as $film)

                <form method="post" action="{{route('admin.film', [$film->idfilm])}}">
                    @csrf
                    <tr>
                        <td><input type="text" name="titre" value="{{$film->titre}}" class="form-control"></td>
                        <td><input type="text" name="duree" value="{{$film->duree}}" class="form-control"></td>
                        <td><input type="date" name="datesortie" value="{{$film->datesortie}}" class="form-control">
                        </td>
                        <td><input type="text" name="synopsis" value="{{$film->synopsis}}" class="form-control"></td>
                        <td><input type="text" name="photo" value="{{$film->photo}}" class="form-control"></td>
                        <td><select class="form-control" name="idgenre" id="idgenre" required="required">
                                @foreach($genres as $genre)
                                    <option
                                        {{$genre->idgenre == $film->idgenre ? 'selected' : ''}} value="{{$genre->idgenre}}">{{$genre->nomgenre}}</option>
                                @endforeach
                            </select>
                        </td>
                        <td><select class="form-control" name="idrealisateur" id="idrealisateur" required="required">
                                @foreach($realisateurs as $realisateur)
                                    <option
                                        {{$realisateur->idrealisateur == $film->idrealisateur ? 'selected':''}} value="{{$realisateur->idrealisateur}}">{{$realisateur->nomrealisateur}} {{$realisateur->prenomrealisateur}}</option>
                                @endforeach
                            </select>
                        </td>

                        <td><select class="form-control" name="idproducteur" id="idproducteur" required="required">
                                @foreach($producteurs as $producteur)
                                    <option
                                        {{$producteur->idproducteur == $film->idproducteur ? 'selected':''}} value="{{$producteur->idproducteur}}">{{$producteur->nomproducteur}} {{$producteur->prenomproducteur}}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input type="submit" name="Supprimer" value="Supprimer" class="btn btn-danger">
                            <input type="submit" name="Valider" value="Valider" class="btn btn-success">
                        </td>
                    </tr>
                </form>

            @endforeach

            <form method="post" action="{{route('admin.film')}}" enctype="multipart/form-data">
                @csrf
                <tr>
                    <td><input type="text" name="titre" required placeholder="Ajouter le titre" class="form-control">
                    </td>
                    <td><input type="text" name="duree" required placeholder="Ajouter la durée" class="form-control">
                    </td>
                    <td><input type="date" name="datesortie" required placeholder="Ajouter la date de sortie"
                               class="form-control"></td>
                    <td><input type="text" name="synopsis" placeholder="Ajouter le synopsis" class="form-control"></td>
                    <td><input type="file" name="photo" class="form-control"></td>
                    <td>
                        <select class="form-control" name="idgenre" id="idgenre" required="required">
                            @foreach($genres as $genre)
                                <option value="{{$genre->idgenre}}">{{$genre->nomgenre}}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select class="form-control" name="idrealisateur" id="idrealisateur" required="required">
                            @foreach($realisateurs as $realisateur)
                                <option
                                    value="{{$realisateur->idrealisateur}}">{{$realisateur->nomrealisateur}} {{$realisateur->prenomrealisateur}}</option>
                            @endforeach
                        </select>
                    </td>

                    <td>
                        <select class="form-control" name="idproducteur" id="idproducteur" required="required">
                            @foreach($producteurs as $producteur)
                                <option
                                    value="{{$producteur->idproducteur}}">{{$producteur->nomproducteur}} {{$producteur->prenomproducteur}}</option>
                            @endforeach
                        </select>
                    </td>

                    <td>
                        <input type="submit" name="Creer" value="Créer" class="btn btn-success">
                    </td>
                </tr>
            </form>

        </table>
    </div>

    <div class="row d-flex justify-content-center mb-5 mt-5">
        <h2> Gestion des Acting </h2>

        <table class="table table-striped table-warning">
            <tr>
                <th> Acteur</th>
                <th> Film</th>
                <th> Date début</th>
                <th> Date fin</th>
                <th>Action</th>
            </tr>
            @foreach($jouers as $jouer)

                <form method="post" action="{{route('admin.jouer', [$jouer->idfilm])}}">
                    @csrf
                    <tr>
                        <td><select class="form-control" name="idacteur" id="idacteur" required="required">
                                @foreach($acteurs as $acteur)
                                    <option
                                        {{$acteur->idacteur === $jouer->idacteur ? 'selected' : ''}} value="{{$acteur->idacteur}}">{{$acteur->nomacteur}} {{$acteur->prenomacteur}}</option>
                                @endforeach
                            </select></td>
                        <td><select class="form-control" name="idfilm" id="idfilm" required="required">
                                @foreach($films as $film)
                                    <option
                                        {{$film->idfilm === $jouer->idfilm ? 'selected' : ''}} value="{{$film->idfilm}}">{{$film->titre}}</option>
                                @endforeach
                            </select>
                        </td>
                        <td><input type="text" name="datedebut" value="{{$jouer->datedebut}}" class="form-control"></td>
                        <td><input type="date" name="datefin" value="{{$jouer->datefin}}" class="form-control"></td>
                        <td>
                            <input type="submit" name="Supprimer" value="Supprimer" class="btn btn-danger">
                            <input type="submit" name="Valider" value="Valider" class="btn btn-success">
                        </td>
                    </tr>
                </form>

            @endforeach
            <form method="post" action="{{route('admin.jouer')}}">
                @csrf
                <tr>

                    <td>
                        <select class="form-control" name="idacteur" id="idacteur" required="required">
                            @foreach($acteurs as $acteur)
                                <option
                                    value="{{$acteur->idacteur}}">{{$acteur->nomacteur}} {{$acteur->prenomacteur}}</option>
                            @endforeach
                        </select>
                    </td>

                    <td>
                        <select class="form-control" name="idfilm" id="idfilm" required="required">
                            @foreach($films as $film)
                                <option value="{{$film->idfilm}}">{{$film->titre}}</option>
                            @endforeach
                        </select>
                    </td>

                    <td>
                        <input type="date" name="datedebut" required placeholder="Ajouter la date de début"
                               class="form-control">
                    </td>
                    <td>
                        <input type="date" name="datefin" required placeholder="Ajouter la date de fin"
                               class="form-control">
                    </td>

                    <td>
                        <input type="submit" name="Creer" value="Créer" class="btn btn-success">
                    </td>
                </tr>
            </form>


        </table>
    </div>

    <div class="row d-flex justify-content-center mb-5 mt-5">
        <h2> Gestion des Cinemas </h2>

        <table class="table table-striped table-warning">
            <tr>
                <th> Libellé</th>
                <th>Action</th>
            </tr>
            @foreach($cinemas as $cinema)

                <form method="post" action="{{route('admin.cinema', [$cinema->idcinema])}}">
                    @csrf
                    <tr>
                        <td><input type="text" name="nomcinema" value="{{$cinema->nomcinema}}" class="form-control">
                        </td>
                        <td>
                            <input type="submit" name="Supprimer" value="Supprimer" class="btn btn-danger">
                            <input type="submit" name="Valider" value="Valider" class="btn btn-success">
                        </td>
                    </tr>
                </form>

            @endforeach

            <form method="post" action="{{route('admin.cinema')}}">
                @csrf
                <tr>
                    <td><input type="text" name="nomcinema" required placeholder="Ajouter un cinéma"
                               class="form-control"></td>
                    <td>

                        <input type="submit" name="Creer" value="Créer" class="btn btn-success">
                    </td>
                </tr>
            </form>

        </table>
    </div>

    <div class="row d-flex justify-content-center mb-5 mt-5">
        <h2> Gestion des Séances </h2>

        <table class="table table-striped table-warning">
            <tr>
                <th> Cinema</th>
                <th> Film</th>
                <th>Action</th>
            </tr>
            @foreach($seances as $seance)

                <form method="post" action="{{route('admin.seance', [$seance->idcinema])}}">
                    @csrf
                    <tr>
                        <td><select class="form-control" name="idacteur" id="idacteur" required="required">
                                @foreach($cinemas as $cinema)
                                    <option
                                        {{$cinema->idcinema === $seance->idcinema ? 'selected' : ''}} value="{{$cinema->idcinema}}">{{$cinema->nomcinema}}</option>
                                @endforeach
                            </select></td>
                        <td><select class="form-control" name="idfilm" id="idfilm" required="required">
                                @foreach($films as $film)
                                    <option
                                        {{$film->idfilm === $seance->idfilm ? 'selected' : ''}} value="{{$film->idfilm}}">{{$film->titre}}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input type="submit" name="Supprimer" value="Supprimer" class="btn btn-danger">
                            <input type="submit" name="Valider" value="Valider" class="btn btn-success">
                        </td>
                    </tr>
                </form>

            @endforeach
            <form method="post" action="{{route('admin.seance')}}">
                @csrf
                <tr>

                    <td>
                        <select class="form-control" name="idcinema" id="idcinema" required="required">
                            @foreach($cinemas as $cinema)
                                <option value="{{$cinema->idcinema}}">{{$cinema->nomcinema}}</option>
                            @endforeach
                        </select>
                    </td>

                    <td>
                        <select class="form-control" name="idfilm" id="idfilm" required="required">
                            @foreach($films as $film)
                                <option value="{{$film->idfilm}}">{{$film->titre}}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input type="submit" name="Creer" value="Créer" class="btn btn-success">
                    </td>
                </tr>
            </form>


        </table>
    </div>

</div>

</body>
</html>



