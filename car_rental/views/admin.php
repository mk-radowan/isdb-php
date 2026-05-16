<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-light">
    <div class="container-fluid py-4">
        <h2 class="mb-4"><i class="fas fa-lock"></i> System Dashboard Overview</h2>
        
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card bg-primary text-white p-3 shadow-sm">
                    <h6>Total Bookings</h6>
                    <h3><?php echo isset($totalBookings) ? $totalBookings : 0; ?></h3>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-success text-white p-3 shadow-sm">
                    <h6>Active Fleet Vehicles</h6>
                    <h3><?php echo isset($activeVehicles) ? $activeVehicles : 0; ?></h3>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-warning text-dark p-3 shadow-sm">
                    <h6>Pending Identity Verifications</h6>
                    <h3><?php echo isset($pendingVerifications) ? $pendingVerifications : 0; ?></h3>
                </div>
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-header bg-dark text-white">Recent Transactions</div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Customer</th>
                            <th>Vehicle</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (isset($recentBookings) && is_array($recentBookings) && count($recentBookings) > 0): ?>
                            <?php foreach($recentBookings as $bk): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($bk['booking_id']); ?></td>
                                <td><?php echo htmlspecialchars($bk['customer']); ?></td>
                                <td><?php echo htmlspecialchars($bk['vehicle']); ?></td>
                                <td><span class="badge bg-info"><?php echo htmlspecialchars($bk['booking_status']); ?></span></td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4" class="text-center text-muted">No recent bookings found.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>