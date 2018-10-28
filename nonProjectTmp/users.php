<!DOCTYPE html>
<html lang="cs">
<head>
    <title>Uzivatele</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/Bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../css/mainOwnStyles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css"
          integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns"
          crossorigin="anonymous">
    <script src="../js/bootstrap.min.js"></script>
</head>
<body>

<div class="gBox usersBg pb-1">
    <div class="container border shadow-lg usrBgSq rounded">
        <?php
        $usersNmb = 1;
        if ($usersNmb == 0) {
            echo "<h2 class='text-dark text-center'>Error: There are no users inside!</h2>";
        } else {
            for ($i = 0; $i < 10; $i++) {

            }
        }
        ?>
    </div>
    <footer>
        <h2 class="mt-2 mr-2 text-right text-black-50">Kravtsov Dmytro</h2>
    </footer>
</div>
</body>
</html>