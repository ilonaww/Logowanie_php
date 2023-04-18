<?php
include_once 'section/header.php';
?>

<div class="container">
    <section class="signup">
        <div class="heading-top">
            <div class="mt-4 heading-top">
                <h2 class="display-6">
                    <p class="mx-auto">Zarejestruj się</p>
                </h2>
            </div>
        </div>
        <form action="plikiPhp/signupSkp.php" method="post">
            <div class="signup__form d-flex flex-column align-items-center">
                <input class="signup__form__item form-control" type="text" name="name" placeholder="Imię i nazwisko...">
                <input class="signup__form__item form-control" type="text" name="email" placeholder="E-mail...">
                <input class="signup__form__item form-control" type="text" name="username" placeholder="Nazwa użytkowika...">
                <input class="signup__form__item form-control" type="password" name="pwd" placeholder="Hasło...">
                <input class="signup__form__item form-control" type="password" name="pwdrepeat" placeholder="Powtórz hasło...">
                <input class="signup__form__item btn btn-outline-primary" type="submit" name="submit" value="Zarejestruj">
            </div>
        </form>
    </section>
    <?php

    if (isset($_GET["error"])) {
        if ($_GET["error"] == "emptyinput") {
            echo '<p class="text-danger text-center fs-3 text">Wypełnij wszystkie pola</p>';

        } elseif ($_GET["error"] == "invaliduid") {
            echo '<p class="text-danger text-center fs-3 text">Błędna nazwa użytkownika</p>';

        } elseif ($_GET["error"] == "invalidemail") {
            echo '<p class="text-danger text-center fs-3 text">Niepoprawny adres e-mail</p>';

        } elseif ($_GET["error"] == "pwddontmatch") {
            echo '<p class="text-danger text-center fs-3 text">Nowe i powtórzone hasła muszą być takie same</p>';

        } elseif ($_GET["error"] == "usernametaken") {
            echo '<p class="text-danger text-center fs-3 text">Ta nazwa użytkownika lub e-mail są już zajęte</p>';
            
        } elseif ($_GET["error"] == "none") {
            echo '<p class="text-success text-center fs-3 text">Udana rejsetracja</p>';
        }
    }


    ?>
</div>



<?php
include_once 'section/footer.php';
?>