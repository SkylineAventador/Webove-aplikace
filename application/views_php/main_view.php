<?php
/**
 * Created by PhpStorm.
 * User: Dimit
 * Date: 27.10.2018
 * Time: 23:46
 */
global $tplData;
require "application/controllers/controller_uLogin.class.php";
$login = new Controller_uLogin();




//TEST LOGINNING
//$login->login("Dmytro Kravtsov");
//$login->logout();
//=======================================
?>
<!DOCTYPE html>
<html lang="cs">
<head>
    <title>Konference - Hlavní stránka</title>
    <meta charset="utf-8">
    <!-- Proper bootstrap elements scaling -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../../css/Bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/other_service.css">
    <link rel="stylesheet" href="../../css/login_form.css"/>

    <script src="../../js/Bootstrap/bootstrap.min.js"></script>
</head>
<body>

<div class="container_fluid">
    <nav class="navbar navbar-dark bg-dark navbar-expand fixed-top justify-content-end">
        <ul class="navbar-nav">
            <?php
                ///////////// PRO NEPRIHLASENE UZIVATELE ///////////////
                if(!$login->isUserLoged()) {
                    ?>
                    <li class="nav-item active">
                        <button class="nav-link btn btn-primary mr-2"
                                onclick="document.getElementById('lfModal').style.display='block'">Prihlasit se
                        </button>
                        <!-- lfModal = Login Form Modal-->

                        <div id="lfModal" class="modal">
                            <form id="lfModal" class="modal-content animate col-md-6"
                                  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                                <div id="lfModal" class="imgcontainer">
                            <span onclick="document.getElementById('lfModal').style.display='none'" class="close"
                                  title="Close Login Form">&times;</span>
                                </div>
                                <h4 class="text-dark text-center">Přihlášení uživatele</h4>

                                <div id="lfModal" class="container">
                                    <label for="uname"><b>Username</b></label>
                                    <input id="lfModal" type="text" placeholder="Enter Username" name="uname" required>

                                    <label for="psw"><b>Password</b></label>
                                    <input id="lfModal" type="password" placeholder="Enter Password" name="psw"
                                           required>

                                    <button id="lfModal" type="submit" class="btn btn-success">Login</button>
                                    <label>
                                        <input type="checkbox" checked="checked" name="remember"> Remember me
                                    </label>
                                </div>

                                <div id="lfModal" class="container">
                                    <button id="lfModal" type="button"
                                            onclick="document.getElementById('lfModal').style.display='none'"
                                            class="cancelbtn">Cancel</button>
                                    <span id="lfModal" class="psw">Forgot <a href="#">password?</a></span>
                                </div>
                            </form>

                        </div>
                        <script>
                            // Get the modal
                            var modal = document.getElementById("lfModal");

                            // When the user clicks anywhere outside of the modal, close it
                            window.onclick = function (event) {
                                if (event.target == modal) {
                                    modal.style.display = "none";
                                }
                            }
                        </script>
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link btn btn-primary" href="../index2.php?page=registration">Registrace</a>
                    </li>
                    <?php
                } else {
                    ?>
                    <li class="navbar-text mr-3">
                        <div class="container">
                            <?php echo $login->getUserInfo()?>
                        </div>
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link btn btn-primary mt-2" href="#">Odhlásit se</a>
                    </li>
                    <?php
                }
            ?>
        </ul>
    </nav>

    <div class="page-header text-center border mb-3">
        <h1>Web konference</h1>
        <h2>Vzor semestralni prace z predmetu KIV/WEB</h2>
    </div>


    <div class="container shadow border contTransBg col-1 float-left text-center" style="padding: 5px;
                                                                        margin-left: 3px">
        <h4>Navigace</h4>
        <a class="btn btn-block bg-secondary text-white"
                href="../index2.php?page=users">Uživatele</a>
        <button type="button" class="btn btn-block bg-primary text-white">Publikace</button>
        <button type="button" class="btn btn-block bg-warning text-black">Termíny</button>
        <button type="button" class="btn btn-block bg-secondary text-white">Témata</button>
        <button type="button" class="btn btn-block bg-info">Info</button>
    </div>

<!--        <div class="container shadow p-3 mb-4 text-justify contTransBg border">-->
<!--            <h3>Zajimave publikace</h3>-->
<!--<!--            <div class="card mb-3 bg-light text-dark">-->-->
<!--<!--                <div class="card-header">Publikovano: Kravtsov Dmytro 21.10.18 18:03</div>-->-->
<!--<!--                <div class="card-body">-->-->
<!--<!--                    <h4>Nazev clanku</h4>-->-->
<!--<!--                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur vitae diam non enim vestibulum interdum. Duis risus. In sem justo, commodo ut, suscipit at, pharetra vitae, orci. Phasellus enim erat, vestibulum vel, aliquam a, posuere eu, velit. Fusce tellus. Nulla non arcu lacinia neque faucibus fringilla. In enim a arcu imperdiet malesuada. Duis condimentum augue id magna semper rutrum. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Nam sed tellus id magna elementum tincidunt. Mauris tincidunt sem sed arcu. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Nulla turpis magna, cursus sit amet, suscipit a, interdum id, felis. Fusce nibh. Integer lacinia. Morbi leo mi, nonummy eget tristique non, rhoncus non leo. Integer in sapien.</p>-->-->
<!--<!--                </div>-->-->
<!--<!--            </div>-->-->
<!--            --><?php
//                foreach ($tplData['data'] as $article) {
//                    ?>
<!--                    <div class="card mb-3 bg-light text-dark">-->
<!--                        <div class="card-header">Zveřejněno: --><?php //echo "$article[date]" ?><!--,-->
<!--                            uzivatelem --><?php //echo "$article[author]" ?><!--.</div>-->
<!--                        <div class="card-body">-->
<!--                            <h4>--><?php //echo "$article[title]" ?><!--</h4>-->
<!--                            <p>--><?php //echo "$article[text]" ?><!--</p>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                --><?php
//                }
//            ?>
<!--        </div>-->



    <footer class="footer text-right">
        <div class="container">
            <hr>
            <span class="text-muted">Kravtsov Dmytro 2018 &reg;</span>
        </div>
    </footer>
</div>

</body>
</html>