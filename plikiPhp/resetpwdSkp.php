<?php
if (isset($_POST["resert-pwd-submit"])) {

    $selector = $_POST["selector"];
    $validator = $_POST["validator"];
    $pwd = $_POST["pwd"];
    $pwdRepead = $_POST["pwd-repeat"];

    if (empty($pwd) || empty($pwdRepead)) {
        header("location: ../sihnin.php?newpwd=empty");
        exit();
    } elseif ($pwd != $pwdRepead) {
        header("location: ../sihnin.php?newpwd=pwdnotsame");
        exit();
    }

    //Sprawdzenie tokenu, czy nie wygasł
    $currentDate = date("U");

    include "dbSkp.php";

    $sql = "SELECT * FROM pwdreset WHERE pwdResetSelector=? AND pwdResetExpires >= $currentDate";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $conn)) {
        echo "Wystąpił błąd";
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "s", $selector);
        mysqli_stmt_execute($stmt);
    }

    $result = mysqli_stmt_get_result($stmt);
    if (!$row = mysqli_fetch_assoc($result)) {
        echo "Błąd";
        exit();
    } else {

        $tokenBin = hex2bin($validator);
        $tokenCheck = password_verify($tokenBin, $row["pwdResetToken"]);

        if ($tokenCheck === false) {
            echo "Wystąpił błąd";
            exit();
        } elseif ($tokenCheck === true) {

            $tokenEmail = $row["pwdResetEmail"];

            $sql = "SELECT * FROM users WHERE usersEmail=?;";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                echo "Wystąpił błąd";
                exit();
            } else {
                mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                if (!$row = mysqli_fetch_assoc($result)) {
                    echo "Błąd";
                    exit();
                } else {
                    $sql = "UPDATE users SET usersPwd=? WHERE usersEmail=?;";
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        echo "Wystąpił błąd";
                        exit();
                    } else {
                        $newPwdHash = password_hash($pwd, PASSWORD_DEFAULT );
                        mysqli_stmt_bind_param($stmt, "ss", $newPwdHash, $tokenEmail);
                        mysqli_stmt_execute($stmt);

                        //usunięcie tokenu, tak by w bazie nie było żadnego nieużywanego tokenu
                        $sql = "DELETE FROM pwdreset WHERE pwdResetEmail=?;";
                        $stmt = mysqli_stmt_init($conn);
                    
                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                            echo "Wystąpił bład";
                            exit();
                        } else {
                            mysqli_stmt_bind_param($stmt, "s", $useremial);
                            mysqli_stmt_execute($stmt);
                            header ("location: ../signup.php?newpwd=passwordupdated"); 
                        }
                    
                    }
                }
            }
        }
    }
} else {
    header("location: ../index.php");
}
