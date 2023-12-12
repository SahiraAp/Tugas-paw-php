<?php
// Buat koneksi ke database
$db_host = "localhost"; // atau $db_host = "127.0.0.1";
$db_user = "root";
$db_pass = "";
$db_name = "nama_database";


$conn = new mysqli('localhost', 'root', '', 'nama_database');


if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

// Periksa formulir login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Periksa kredensial pengguna
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Gunakan metode hashing untuk kata sandi demi keamanan yang lebih baik
    // Sesuaikan dengan metode hashing yang Anda gunakan di basis data
    $hashed_password = hash('sha256', $password);

    $sql = "SELECT * FROM nama_tabel_pengguna WHERE username = '$username' AND password = '$hashed_password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Redirect ke halaman yang sesuai jika login berhasil
        header("Location: halaman_berhasil.php");
        exit();
    } else {
        // Tampilkan pesan kesalahan jika login gagal
        $error_message = "Username atau password salah. Silakan coba lagi.";
    }
}
?>

<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
	<link href="dist/output.css" rel="stylesheet">
    <title>Login - Portfolio</title>
</head>
<body>
    <!-- Header Start -->
    <header id="header" class="bg-transparent fixed top-0 left-0 w-full flex items-center z-10 bg-white opacity-90 drop-shadow-md">
        <div class="container">
            <div class="flex items-center justify-between relative">
                <div class="px-4">
                    <a href="#home" class="font-semibold text-2xl text-hutao block py-6 hover:text-gelap transition duration-500">Sahira Apriyani</a>
                </div>
                <nav class="p-5 flex font-semibold text-xl text-slate-800">
                    <ul>
                        <a href="index.php#hero"><li class="inline-block p-2 hover:text-hutao transition duration-500">Home</li></a>
                        <a href="index.php#about"><li class="inline-block p-2 hover:text-hutao transition duration-500">About</li></a>
                        <a href="index.php#service"><li class="inline-block p-2 hover:text-hutao transition duration-500">Service</li></a>
                        <a href="index.php#portfolio"><li class="inline-block p-2 hover:text-hutao transition duration-500">Portfolio</li></a>
			<a href="login.php"><li class="inline-block p-2 hover:text-hutao transition duration-500">Login</li></a>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Form Login Start -->
    <section id="login" class="pt-36 pb-32">
        <div class="container mx-auto">
            <h2 class="text-3xl font-bold text-center mb-8 text-hutao">User Login</h2>

            <?php
            // Tampilkan pesan kesalahan jika ada
            if (isset($error_message)) {
                echo '<p class="text-red-500 text-center mb-4">' . $error_message . '</p>';
            }
            ?>
		<div class="text-center mt-4">
    <a href="index.php" class="text-hutao hover:underline">Kembali ke Halaman Utama</a>
</div>
            <form action="login.php" method="post" class="max-w-md mx-auto border border-gray-300 rounded-lg p-6">
    <div class="mb-4">
        <label for="username" class="block mb-2 font-bold text-hutao">Username:</label>
        <input type="text" id="username" name="username" class="w-full px-3 py-2 border border-gray-300 rounded" required>
    </div>
    <div class="mb-4">
        <label for="password" class="block mb-2 font-bold text-hutao">Password:</label>
        <input type="password" id="password" name="password" class="w-full px-3 py-2 border border-gray-300 rounded" required>
    </div>
    <div class="pt-3">
        <button type="submit" class="bg-hutao hover:bg-gelap text-white font-bold py-2 px-4 rounded-xl">Login</button>
    </div>
</form>

        </div>
    </section>
    <!-- Form Login End -->

    <!-- ... (lanjutan dari halaman asli) ... -->

</body>
</html>
