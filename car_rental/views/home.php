<?php require_once __DIR__ . '/includes/header.php'; ?>

    <!-- Hero & Search Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <h1 class="display-4 fw-bold">Find Your Perfect Ride</h1>
                    <p class="lead">Reliable and comfortable cars at the best prices.</p>
                </div>
                <div class="col-lg-6">
                    <div class="search-card shadow">
                        <h4 class="mb-4 fw-bold text-center">Book a Car</h4>
                        <form action="?url=booking/submit" method="POST">
                            <div class="mb-3">
                                <label class="form-label">Pickup Location</label>
                                <select class="form-select" name="pickup_location" required>
                                    <option value="" selected disabled>Select location...</option>
                                    <?php foreach($locations as $location): ?>
                                        <option value="<?= htmlspecialchars($location) ?>"><?= htmlspecialchars($location) ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Start Date</label>
                                    <input type="date" class="form-control" name="start_date" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">End Date</label>
                                    <input type="date" class="form-control" name="end_date" required>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary w-100 fw-bold py-2">Search Available Cars</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Cars Section -->
    <section class="container py-5">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Available Vehicles</h2>
            <p class="text-muted">Choose from our wide range of premium cars.</p>
        </div>

        <div class="row g-4">
            <?php if (!empty($availableCars)): ?>
                <?php foreach($availableCars as $car): ?>
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 car-card border-0 shadow-sm">
                            <!-- গাড়ির ডিফল্ট ছবি যদি ডাটাবেজে না থাকে -->
                            <img src="<?= !empty($car['primary_image']) ? 'assets/images/cars/' . htmlspecialchars($car['primary_image']) : 'https://via.placeholder.com/400x250?text=Car+Image' ?>" class="card-img-top" alt="Car Image" style="height: 250px; object-fit: cover;">
                            
                            <div class="card-body">
                                <h5 class="card-title fw-bold">
                                    <?= htmlspecialchars($car['brand'] . ' ' . $car['model']) ?>
                                </h5>
                                <div class="d-flex justify-content-between mb-3 text-muted small">
                                    <span><i class="bi bi-people-fill text-primary"></i> <?= htmlspecialchars($car['seat_capacity']) ?> Seats</span>
                                    <span><i class="bi bi-fuel-pump-fill text-primary"></i> <?= htmlspecialchars($car['fuel_type']) ?></span>
                                    <span><i class="bi bi-snow text-primary"></i> <?= $car['has_ac'] ? 'AC' : 'Non-AC' ?></span>
                                </div>
                                <h4 class="text-success mb-3">৳<?= number_format($car['rent_per_day'], 2) ?> <small class="text-muted fs-6">/ Day</small></h4>
                                <a href="?url=booking/checkout&vehicle_id=<?= $car['vehicle_id'] ?>" class="btn btn-outline-primary w-100">Rent Now</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center">
                    <p class="alert alert-warning">No vehicles available at the moment. Please check back later!</p>
                </div>
            <?php endif; ?>
        </div>
    </section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>