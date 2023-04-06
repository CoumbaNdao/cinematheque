<!DOCTYPE html>
<html>
<head>
    <meta charset="ISO-8859-1">
    <title>Inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>

</head>
<body>

<div class="container">
    <div class="row ">
        <div class="col-10 emplacementForminsc">
            <h6 class="text-uppercase mb-4 font-weight-bold titreInsc">Inscription</h6>
            <form class="Inscform" method="post" id="candidatInscriptionForm" style="margin-left: -5vw"
                  action="{{route('auth.register.register')}} ">
                @csrf
                <div class="form-group row champPlacement ">
                    <div class="col-sm-12">
                        <input type="text" class="form-control" name="nom" id="inputNom" required="required"
                               placeholder="Nom">
                    </div>
                </div>

                <div class="form-group row champPlacement">
                    <div class="col-sm-12">
                        <input type="text" class="form-control" name="prenom" id="inputPrenom"
                               required="required" placeholder="Prénom">
                    </div>
                </div>

                <div class="form-group row champPlacement">
                    <div class="col-sm-12">
                        <input type="email" class="form-control" name="email" id="inputEmail"
                               required="required" placeholder="Login">
                    </div>
                </div>

                <div class="form-group row champPlacement">
                    <div class="col-sm-12">
                        <select class="form-control" name="userprofile" id="inputNom" required="required">
                            <option value="">-- Vous êtes : --</option>
                            <option value="1">Journaliste</option>
                            <option value="2">Internaute</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row champPlacement">
                    <div class="col-sm-12">
                        <p id="text" class="text-danger"></p>
                        <input type="password"
                               class="form-control"
                               data-name="tet"
                               name="password"
                               minlength="8"
                               maxlength="20"
                               id="mdpCandidat"
                               onkeyup="sec()"
                               required="required"
                               placeholder="Mot de passe">
                        <span id="msg"></span>
                    </div>
                </div>

                <div class="form-group row champPlacement">
                    <div class="col-sm-12">
                        <input type="password" class="form-control  minlength=8"  maxlength="20" name="validationMdp"
                               id="inputMotDePasse" required="required" placeholder="Confirmer le mot de passe">
                    </div>
                </div>

                <input class="inscpBouton btn btn-primary" style="margin-left: 5vw" onclick="validateMdp()"
                       value="S'inscrire">
            </form>
            <br>
            <br>
        </div>
    </div>
</div>
<!-- Scripts -->
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
</body>
</html>



