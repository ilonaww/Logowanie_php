<?php
include_once 'section/header.php';
?>

<div class="container">
    <section class="signup">
        <div class="heading-top">
            <div class="mt-4 heading-top">
                <h2 class="display-6">
                    <p class="mx-auto">Zaloguj się</p>
                </h2>
            </div>
        </div>
        <form action="loginSkp.php" method="post">
            <div class="signup__form d-flex flex-column align-items-center">
                <input class="signup__form__item form-control" type="text" name="imie" placeholder="Nazwa użytkownika/E-mail">
                <input class="signup__form__item form-control" type="password" name="haslo" placeholder="Hasło">
                <input class="signup__form__item btn btn-outline-primary" type="submit" name="submit" value="Zaloguj">
            </div>
        </form>
    </section>
</div>

<?php
include_once 'section/footer.php';
?>