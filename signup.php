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
</div>

<?php
include_once 'section/footer.php';
?>