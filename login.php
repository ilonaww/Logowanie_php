<?php
include_once 'section/header.php';
?>

<div class="container">
    <section class="signin">
        <div class="heading-top">
            <div class="mt-4 heading-top">
                <h2 class="display-6">
                    <p class="mx-auto">Zaloguj się</p>
                </h2>
            </div>
        </div>
        <form action="plikiPhp/loginSkp.php" method="post">
            <div class="signup__form d-flex flex-column align-items-center">
                <input class="signin__form__item form-control" type="text" name="uid" placeholder="Nazwa użytkownika/E-mail">
                <input class="signin__form__item form-control" type="password" name="pwd" placeholder="Hasło">
                <input class="signin__form__item btn btn-outline-primary" type="submit" name="submit" value="Zaloguj">
            </div>
        </form>

        <?php
        if (isset($_GET["newpwd"])) {
            if ($_GET["newpwd"] === "passwordupdated") {
                echo '<p class="resetsuccess">Hasło zostało zmienione</p>';
            };
        };
        ?>
        <div class="signin__link">
            <a href="resetpwd.php">Niepamiętam hasła</a>
        </div>


        <?php
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "emptyinput") {
                echo '<p class="text-danger text-center fs-3 text">Wypełnij wszystkie pola</p>';
            } elseif ($_GET["error"] == "wronglogin") {
                echo '<p class="text-danger text-center fs-3 text">Nieprawidłowy login lub hasło</p>';
            }
        }
        ?>
    </section>
</div>

<?php
include_once 'section/footer.php';
?>