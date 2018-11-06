<?php
/**
 * Created by PhpStorm.
 * User: Dimit
 * Date: 03.11.2018
 * Time: 20:26
 */?>
<!DOCTYPE html>
<html lang="cs">
<head>
    <title>Registrace uživatele</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../css/Bootstrap/bootstrap.min.css">
    <script src="../../js/bootstrap.min.js"></script>
</head>
<body class="bg-dark">
        <div class="container w-50 pb-2 rounded bg-light" style="margin-top: 8vh">
            <h1 class="text-center text-dark">Registrace nového uživatele</h1>

            <form action="registration/submit" method="post">
                <div class="form-group">
                    <label for="nameTF">Jméno a příjmení</label>
                    <input type="text" class="form-control" id="nameTF"
                           placeholder="Jan Novák" name="regUsrJmeno">
                </div>
                <div class="form-group">
                    <label for="loginTF">Login</label>
                    <input type="text" class="form-control" id="loginTF"
                           placeholder="JNovak2018" name="regUsrLogin">
                </div>
                <div class="form-group">
                    <label for="passwordTF">Heslo</label>
                    <input type="password" class="form-control" id="passwordTF"
                           placeholder="Zadejte Vase heslo" name="regUsrPassword">
                </div>
                <div class="form-group">
                    <label for="passwordCheckTF">Ověření hesla</label>
                    <input type="password" class="form-control" id="passwordCheckTF"
                    placeholder="Zopakujte Vase heslo jěště jednou">
                </div>
                <div class="form-group">
                    <label for="emailTF">E-mail</label>
                    <input type="email" class="form-control" id="emailTF"
                           placeholder="jannovak@seznam.cz" name="regUsrEmail">
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="rememberCB">
                    <label class="form-check-label" for="rememberCB">Pamatovat si mě</label>
                </div>
                <div class="container text-center">
                    <button type="submit" class="btn btn-primary">Registrovat</button>
                    <a href="main" class="btn btn-danger">Storno</a>
                </div>
            </form>
        </div>
</body>
</html>
