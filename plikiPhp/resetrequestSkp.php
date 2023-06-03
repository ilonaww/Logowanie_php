<?php

if ($_POST["reset-email"]) {

    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);

    $url = "www.logowaniephp/plikiPhp/create-new-pwd.php?selector" . $selector . "&validator=" . bin2hex($token);
    $expires = date("U") + 600;

    require("dbSkp.php");

    $useremial = $_POST["email"];

    //Usinięcie tokena, jeśli jakiś aktywny by jeszcze istniał
    $sql = "DELETE FROM pwdreset WHERE pwdResetEmail=?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "Wystąpił bład";
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "s", $useremial);
        mysqli_stmt_execute($stmt);
    }

    //Utworzenie nowego tokena
    $sql = "INSERT INTO pwdreset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "Wystąpił błąd";
        exit();
    } else {
        $hashedToken = password_hash($token, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "ssss", $useremial, $selector, $hashedToken, $expires);
        mysqli_stmt_execute($stmt);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    //Wysyłanie maila z tokenem

    $to = $useremial;
    $subject = 'Resetowanie hasła na stronie Logo';
    $message = '<p>Jeśli to nie Ty zgłaszałeś chęć zmiany hasła - zignoruj tę wiadomość.</p></ br> <p>Aby ustawić nowe hasło do logowania w Pracuj.pl, kliknij w poniższy przycisk: </br>
    <a href="' . $url . '"> ' . $url . '</a></p>';

    $headers = "From logo <logo@gmail.com>\r\n";
    $headers .= "Reply-To: logo@gmail.com\r\n";
    $headers .= "Content-type: text/html\r\n";

    mail($useremial, $subject, $message, $headers);
    header("location: ../resetpwd.php?reset=success");
    
} else {
    header("location: ../resetpwd.php");
}
