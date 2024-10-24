<?php

// ETO UNG NAG HAHANDLE NG BACKEND

require_once("./config.php");
session_start();

// PAG LOGIN KA, EXAMPLE NI CLICK UNG LOGIN BUTTON
function login()
{
    // GAWA NG DATABASE GAMIT UNG NASA CONFIG
    $database = new MySQLi(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    if ($database->connect_error) {
        die("Connection failed: " . $database->connect_error);
    }

    // ETO UNG PINASA MO DUN SA FORM, NAKA POST
    $email = $_POST['email'];
    $password = $_POST['password'];

    // NORMAL STUFF SA DATABASE, BASTA SESELECT MUNA UNG MGA USERS
    $stmt = $database->prepare("SELECT id, userName, password FROM users WHERE email = ?");
    $stmt->bind_param('s', $email);

    $stmt->execute();
    $stmt->store_result();

    // CHECK IF MAY NAKUHA NA ISA (1)
    if ($stmt->num_rows === 1) {
        $stmt->bind_result($userId, $userName, $hashedPassword);
        $stmt->fetch();

        // VERIFY UNG PASSWORD
        if (password_verify($password, $hashedPassword)) {

            // IF OKAY NA, GAGAWA NA NG USER MEANING NAKA LOGIN NA  
            $_SESSION["user"] = [
                'username' => $userName,
                'email' => $email,
                'id' => $userId,
            ];

            // GINAGAMIT SA MODAL TOH
            // LALABAS SA DASHBOARD PAG KA LOGIN 
            $_SESSION['success'] = "Login successful! Welcome, " . $userName;
            header("Location: dashboard.php");
            exit;
        } else {
            $_SESSION['error'] = "Incorrect password.";
        }
    } else {
        $_SESSION['error'] = "User with this email does not exist or account is inactive.";
    }

    $stmt->close();
    $database->close();

    // BUMALIK SA REGISTRATION.PHP PAG MALI MALI PINAG GAGAWA
    $_SESSION["email-put"] = $email;
    header("Location: registration.php");
    exit;
}

// REGISTER BUTTON SOMETHING
function register()
{
    // GAWA NG DATABASE GAMIT UNG NASA CONFIG
    $database = new MySQLi(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    if ($database->connect_error) {
        die("Connection failed: " . $database->connect_error);
    }

    // KUNIN LAHAT UNG NILAGAY SA FORM
    $userName = $_POST['userName'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // I HASH UNG PASSWORD
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $database->prepare("INSERT INTO users (userName, firstName, lastName, email, password) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param('sssss', $userName, $firstName, $lastName, $email, $hashedPassword);

    // EXECUTE ILALAGAY NA UNG DATA SA DATABASE
    if ($stmt->execute()) {
        $_SESSION['success'] = "Registration successful!";
    } else {

        // PAG MALI BUMALIK SA  REGISTRATION.PHP
        $_SESSION['error'] = "Error: " . $stmt->error;
        header("Location: registration.php?page=register");
        exit;
    }

    $stmt->close();
    $database->close();

    // DUN DIN PERO SA LOGIN NA
    header("Location: registration.php");
    exit;
}


// ETO UNG MAG DETECT NUN
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $type = $_POST["type"];

    if ($type == "login") {
        login();
    }
    if ($type == "register") {
        register();
    }
}
?>