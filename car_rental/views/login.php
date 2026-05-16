<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | AutoRide</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 h-screen flex items-center justify-center">

    <div class="bg-white p-8 rounded-lg shadow-lg max-w-md w-full">
        <div class="text-center mb-6">
            <h2 class="text-3xl font-bold text-blue-600">AutoRide</h2>
            <p class="text-gray-500 mt-2">আপনার অ্যাকাউন্টে লগইন করুন</p>
        </div>

        <?php if (isset($error) && !empty($error)): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4 text-sm">
                <?php echo htmlspecialchars($error); ?>
            </div>
        <?php endif; ?>

        <form action="index.php?url=login/process" method="POST" id="loginForm">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-semibold mb-2">ফোন নম্বর অথবা ইমেইল</label>
                <input type="text" name="identity" required 
                       placeholder="01XXXXXXXXX অথবা email@domain.com"
                       class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-semibold mb-2">পাসওয়ার্ড</label>
                <input type="password" name="password" required 
                       placeholder="••••••••"
                       class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <button type="submit" 
                    class="w-full bg-blue-600 text-white font-bold p-3 rounded hover:bg-blue-700 transition duration-300">
                লগইন করুন
            </button>
        </form>

        <div class="text-center mt-4">
            <p class="text-sm text-gray-600">নতুন ইউজার? <a href="index.php?url=register" class="text-blue-500 hover:underline">রেজিস্ট্রেশন করুন</a></p>
        </div>
    </div>

</body>
</html>