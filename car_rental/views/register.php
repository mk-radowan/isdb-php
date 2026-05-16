<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | AutoRide</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center py-10">

    <div class="bg-white p-8 rounded-lg shadow-lg max-w-lg w-full mx-4">
        <div class="text-center mb-6">
            <h2 class="text-3xl font-bold text-blue-600">AutoRide</h2>
            <p class="text-gray-500 mt-2">নতুন কাস্টমার অ্যাকাউন্ট তৈরি করুন</p>
        </div>

        <?php if (isset($error) && !empty($error)): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4 text-sm">
                <?php echo htmlspecialchars($error); ?>
            </div>
        <?php endif; ?>

        <form action="index.php?url=register/process" method="POST">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-semibold mb-2">পূর্ণ নাম (NID অনুযায়ী)</label>
                <input type="text" name="full_name" required placeholder="যেমন: মোঃ রেদওয়ানুল ইসলাম"
                       class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-semibold mb-2">মোবাইল নম্বর</label>
                    <input type="text" name="phone_number" required placeholder="01XXXXXXXXX"
                           class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-semibold mb-2">ইমেইল (ঐচ্ছিক)</label>
                    <input type="email" name="email" placeholder="example@mail.com"
                           class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-semibold mb-2">এনআইডি (NID) নম্বর</label>
                <input type="text" name="id_number" required placeholder="জাতীয় পরিচয়পত্র নম্বর দিন"
                       class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-semibold mb-2">পাসওয়ার্ড</label>
                <input type="password" name="password" required placeholder="নূন্যতম ৬ অক্ষরের পাসওয়ার্ড"
                       class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <button type="submit" 
                    class="w-full bg-blue-600 text-white font-bold p-3 rounded hover:bg-blue-700 transition duration-300">
                নিবন্ধন সম্পন্ন করুন
            </button>
        </form>

        <div class="text-center mt-4">
            <p class="text-sm text-gray-600">অলরেডি অ্যাকাউন্ট আছে? <a href="index.php?url=login" class="text-blue-500 hover:underline">লগইন করুন</a></p>
        </div>
    </div>

</body>
</html>