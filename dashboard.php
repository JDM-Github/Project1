<?php
session_start();
// if (!isset($_SESSION["user"])) {
//     $_SESSION['error'] = "Can\'t access dashboard, Please login/register first.";
//     header("Location: registration.php");
//     exit;
// }

// KINUHA KO UNG HEADER PARA DI PAULIT ULIT
include_once "layouts/header.php";
?>

<?php
// IMPORT UNG MODAL SA SUCCESS AT ERROR
require_once("modals/modals.php");

// ETO UNG MAG DETECT NUN, EXAMPLE SUCCESS, CHECK NYA UN, TAS I TOAST NYA
// TAS AALISIN NA AGAD, PARA DI UMULIT
if (isset($_SESSION['success'])) {
    echo "<script>showSuccessModal('{$_SESSION['success']}');</script>";
    unset($_SESSION['success']);
} elseif (isset($_SESSION['error'])) {
    echo "<script>showErrorModal('{$_SESSION['error']}');</script>";
    unset($_SESSION['error']);
}
?>

<body class="bg-light">
    <!-- BOOTSTRAP SHIT, KINUHA KO LANG SA INTERNET HAHAHA -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="dashboard.php">EWAN</a>

            <!-- ETO UNG NAV BAR, UNG NASA TAAS -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- ETO UNG LAMAN NG NAV BAR, NAND2 UNG HOME, ABOUT TUTORIAL -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php">Home</a>
                    </li>

                    <!-- ETO GAGANA LANG TOH PAG NAKA SIGNIN NA UNG USER -->
                    <!-- PAG HINDI PA, DI SYA LALABAS -->
                    <?php
                    if (isset($_SESSION['user'])) {
                        echo "<li class='nav-item'>
                            <a class='nav-link' href='create.php'>Create Resume</a>
                        </li>";
                    }
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tutorial.php">Tutorial</a>
                    </li>

                    <!-- ETO DIN, PAG WALANG NAKA SIGN IN NA USER, SIGN IN NAKALAGAY SA DULO -->
                    <!-- PAG MERON, LOGOUT NAKALAGAY -->
                    <?php
                    if (isset($_SESSION['user'])) {
                        echo "
                        <li class='nav-item'>
                            <a class='nav-link' href='registration.php'>Logout</a>
                        </li>";
                    } else {
                        echo "
                        <li class='nav-item'>
                            <a class='nav-link' href='registration.php'>Sign in</a>
                        </li>";
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- BINAGO KO LANG PAG NI HOHOVER -->
    <style>
        .nav-link:hover {
            color: #4466ff !important;
        }
    </style>
</body>


<!-- INIMPORT LANG UNG FOOTER -->
<?php
include_once "layouts/footer.php";
?>