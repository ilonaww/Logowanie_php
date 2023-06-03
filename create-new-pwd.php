<?php
include_once 'section/header.php';
?>

<div class="container">
    <section class="signup">
        
    <?php 
        $selector = $_GET["selector"];
        $validator = $_GET["validator"];

        if (empty($selector) || empty($validator)) {
            echo "Błąd";
        }else {
            if(ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false) {
                ?>
                    <form action="plikiPhph/resetpwdSkp.php" method="post">
                        <input type="hidden" name="selector" value="<?php $selector ?>">
                        <input type="hidden" name="validator" value="<?php $validator ?>">
                        <input type="password" name="pwd" placeholder="Nowe hasło">
                        <input type="password" name="pwd-repeat" placeholder="Powtórz hasło">
                        <button type="submit" name="resert-pwd-submit">Resetuj hasło</button>

                    </form>
                <?php
            }
        }
    ?>

    </section>
</div>

<?php
include_once 'section/footer.php';
?>