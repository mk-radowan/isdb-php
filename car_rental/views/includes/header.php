<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental Service</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    
    <!-- Custom CSS (আপনার চাইলে এই স্টাইলগুলো আলাদা style.css ফাইলে রাখতে পারেন) -->
    <style>
        .hero-section {
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('https://images.unsplash.com/photo-1449965408869-eaa3f722e40d?q=80&w=1920&auto=format&fit=crop') center/cover no-repeat;
            padding: 100px 0;
            color: white;
        }
        .search-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 10px;
            padding: 30px;
            color: #333;
        }
        .car-card {
            transition: transform 0.3s;
        }
        .car-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body class="bg-light">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand fw-bold" href="?url=home">Rent-A-Car</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="?url=home">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Vehicles</a></li>
                    <li class="nav-item"><a class="nav-link" href="?url=login">Login</a></li>
                    <li class="nav-item"><a class="btn btn-primary ms-2" href="?url=register">Sign Up</a></li>
                </ul>
            </div>
        </div>
    </nav>