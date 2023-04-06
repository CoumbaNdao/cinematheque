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
    <a href="{{route('logout')}}" class="text-danger" > Déconnexion </a>
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
                <th> NB de visites</th>
            </tr>
            <tr>
                <td>{{count($versions)}}</td>
                <td>{{count($userlogs)}}</td>
            </tr>
        </table>
    </div>
    <div class="row d-flex justify-content-center mb-5 mt-5">
        <h2> Liste des films récents </h2>

        <table class="table table-striped table-secondary" aria-describedby="etude">
            <tr>
                <th> Titre du film </th>
                <th> L'affiche </th>
                <th> Date de sortie </th>
                <th> Réalisateur </th>
                <th> Genre </th>
            </tr>
            @foreach(listfilmrecent() as $listfilmrecent)
                <tr>
                    <td>
                        {{$listfilmrecent->titre}}
                    </td>
                    <td>
                        {{$listfilmrecent->affiche}}
                    </td>
                    <td>
                        {{$listfilmrecent->datesortie}}
                    </td>
                    <td>
                        {{$listfilmrecent->nomrealisateur}} {{$listfilmrecent->prenomrealisateur}}
                    </td>
                    <td>
                        {{$listfilmrecent->genre}}
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</div>

</body>
</html>
