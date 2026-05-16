<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"><title>AutoRide | Rent Car</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <nav class="bg-white p-4 shadow"><div class="container mx-auto flex justify-between"><h1 class="text-xl font-bold text-blue-600">AutoRide</h1></div></nav>
    
    <div class="container mx-auto mt-10 p-5">
        <h2 class="text-2xl font-bold mb-6">Available Vehicles in Fleet</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <?php if(empty($availableCars)): ?>
                <p class="text-gray-500">No cars available right now.</p>
            <?php else: ?>
                <?php foreach($availableCars as $car): ?>
                <div class="bg-white p-5 rounded-lg shadow-md border">
                    <img src="<?php echo $car['primary_image'] ?? 'https://via.placeholder.com/300x180'; ?>" class="rounded mb-3 w-full h-40 object-cover">
                    <h3 class="text-lg font-bold"><?php echo $car['brand'] . " " . $car['model']; ?></h3>
                    <p class="text-sm text-gray-600">Type: <?php echo $car['vehicle_type']; ?> | Seat: <?php echo $car['seat_capacity']; ?></p>
                    <div class="mt-4 flex justify-between items-center">
                        <span class="text-blue-600 font-bold">BDT <?php echo $car['rent_per_day']; ?>/Day</span>
                        <button class="bg-blue-600 text-white text-sm px-4 py-2 rounded hover:bg-blue-700">Book Now</button>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>