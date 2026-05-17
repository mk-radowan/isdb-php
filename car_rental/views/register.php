<?php require_once __DIR__ . '/includes/header.php'; ?>

<section class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card shadow-sm border-0 mt-5">
                <div class="card-body p-4 p-md-5">
                    <h3 class="text-center fw-bold mb-4">Create an Account</h3>
                    
                    <!-- Error Message Display -->
                    <?php if (isset($error)): ?>
                        <div class="alert alert-danger text-center">
                            <?= htmlspecialchars($error) ?>
                        </div>
                    <?php endif; ?>

                    <form action="?url=register/process" method="POST">
                        
                        <div class="mb-3">
                            <label class="form-label">Full Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="full_name" placeholder="e.g. John Doe" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Phone Number <span class="text-danger">*</span></label>
                            <input type="tel" class="form-control" name="phone_number" placeholder="e.g. 017XXXXXXXX" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email Address (Optional)</label>
                            <input type="email" class="form-control" name="email" placeholder="e.g. john@example.com">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">NID / Passport Number <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="id_number" placeholder="Enter your valid ID number" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" name="password" placeholder="Min. 6 characters" required>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 fw-bold py-2 mt-2">Sign Up</button>
                    </form>

                    <div class="text-center mt-4">
                        <p class="mb-0">Already have an account? <a href="?url=login" class="text-decoration-none fw-bold">Login here</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>