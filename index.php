<?php

include_once 'section/header.php';

?>

<?php

if(isset($_SESSION["useruid"])) {
    echo '<p class="text-success text-center fs-3 text">Witaj ' . $_SESSION["useruid"] . '</p>';
}

?>

<?php

include_once 'section/footer.php';

?>
