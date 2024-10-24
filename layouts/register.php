<!-- SIMPLE REGISTER FORM -->
<h5 class="card-title text-center mb-4">Register</h5>
<form action="redirector.php" method="POST">
    <input type="hidden" name="type" value="register">
    <div class="mb-3">
        <label for="userName" class="form-label">Username</label>
        <input type="text" class="form-control" id="userName" name="userName" required>
    </div>
    <div class="mb-3">
        <label for="firstName" class="form-label">First Name</label>
        <input type="text" class="form-control" id="firstName" name="firstName" required>
    </div>
    <div class="mb-3">
        <label for="lastName" class="form-label">Last Name</label>
        <input type="text" class="form-control" id="lastName" name="lastName" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <button type="submit" class="btn btn-primary w-100">Register</button>
</form>
<div class="mt-4 text-center">
    <p>Already have an account? <a href="registration.php?page=login">Login</a></p>
</div>