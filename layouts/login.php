<?php

// GINAGAMIT PARA DI MAULIT UNG EMAIL NA NILAGAY DATI
$email_put = $_SESSION['email-put'] ?? '';
unset($_SESSION['email-put']);
?>

<!-- SIMPLE LOGIN FORM -->
<h5 class="card-title text-center mb-4">Login</h5>
<form action="redirector.php" method="POST">
    <input type="hidden" name="type" value="login">
    <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" id="email" name="email" value="<?php echo $email_put ?>" required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <button type="submit" class="btn btn-primary w-100">Login</button>
</form>
<div class="mt-4 text-center">
    <p>Don't have an account? <a href="registration.php?page=register">Register</a></p>
</div>