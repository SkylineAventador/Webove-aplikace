<?php
/**
 * Created by PhpStorm.
 * User: Dimit
 * Date: 28.10.2018
 * Time: 12:12
 */
?>
<!DOCTYPE html>
<html lang="cs">
<head>
    <title>Uživatele</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../css/Bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/other_service.css">
    <script src="../../js/Bootstrap/bootstrap.min.js"></script>
</head>
<body>

<div class="bg-dark container_fluid">
    <div class="container border shadow-lg bg-white rounded pt-3"
            style="display: flex; flex-wrap: wrap; justify-content: space-between">
        <?php
        foreach ($tplData['data'] as $user) {

            ?>

            <div class="card m-2" style="flex: 0 1 calc(25% - 1em)">
                <img class="card-img-top" src="../../images/unknown_user_img.png"
                    alt="User image">
                <div class="card-body">
                    <h4 class="card-title text-center"><?php echo "$user[jmeno]" ?></h4>
                    <p class="card-text"><?php echo "$user[email]" ?></p>
                    <a href="#" class="btn btn-primary" style="display: block">Zobrazit profil</a>
                </div>
            </div>

            <?php
        }
        ?>
        <div class="container text-center mt-2">
            <a href="../index2.php?page=main" class="btn btn-danger">Hlavni stranka</a>
        </div>
    </div>
    <footer>
        <h2 class="mt-2 mr-2 text-right text-white-50">Kravtsov Dmytro</h2>
    </footer>
</div>
</body>
</html>
