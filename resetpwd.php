<?php
include_once 'section/header.php';
?>

<div class="container">
    <section class="signup">
        <div class="heading-top">
            <div class="mt-4 heading-top">
                <h2 class="display-6">
                    <p class="mx-auto">Resetuj hasło</p>
                </h2>
            </div>
        </div>
        <form method="post" action="plikiPhp/resetpwdSkp.php">
            <div class="signup__form d-flex flex-column align-items-center">
                <input type="text" name="email" class="form-control signin__form__item" placeholder="Twój adres e-mail">
                <button type="submit" name="reset-email" class="btn btn-outline-primary signin__form__item">Przypomnij
                    hasło</button>
            </div>
        </form>
        <?php
            if(isset($_GET["reset"])) {
                if($_GET["reset"] === "success"){
                    echo '<p class="resetsuccess"> Sprawdź swojego e-maila</p>';
                };
            };
        ?>
    </section>
</div>



<?php
include_once 'section/footer.php';
?>