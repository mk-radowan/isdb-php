<?php require_once __DIR__ . '/includes/header.php'; ?>

<section class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow-sm border-0 mt-5">
                <div class="card-body p-4 p-md-5">
                    <h3 class="text-center fw-bold mb-4">Welcome Back!</h3>
                    
                    <!-- Error Message Display -->
                    <?php if (isset($error)): ?>
                        <div class="alert alert-danger text-center">
                            <?= htmlspecialchars($error) ?>
                        </div>
                    <?php endif; ?>

                    <form action="?url=login/process" method="POST">
                        <div class="mb-3">
                            <label class="form-label">Phone Number or Email</label>
                            <input type="text" class="form-control" name="identity" placeholder="Enter phone or email" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Enter your password" required>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 fw-bold py-2">Login</button>
                    </form>

                    <div class="text-center mt-4">
                        <p class="mb-0">Don't have an account? <a href="?url=register" class="text-decoration-none fw-bold">Sign up here</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>