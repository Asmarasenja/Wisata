
<?php 
session_start();
include('connect.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Cek user di database
    $sql = "SELECT * FROM user WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['username'] = $username;
        header('Location: index.php');
        exit();
    } else {
        $error = "Ups Salah Sayangku!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- Tambahkan SweetAlert -->
    <title>Login</title>
    <style>
        /* Reset default margin and padding */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Poppins', sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    margin: 0;
    background: linear-gradient(135deg, #ffdb58, #ffa726);
    color: #333;
}

.container {
    background: #ffffff;
    border-radius: 15px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    padding: 30px;
    text-align: center;
    width: 100%;
    max-width: 400px;
}

.logo {
    max-width: 120px;
    margin: 0 auto 20px;
}

h2 {
    margin-bottom: 20px;
    color: #444;
    font-weight: bold;
}

form {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

input {
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ddd;
    border-radius: 8px;
    outline: none;
    transition: border-color 0.3s ease;
}

input:focus {
    border-color: #ffa726;
    box-shadow: 0 0 5px rgba(255, 167, 38, 0.5);
}

button {
    padding: 12px;
    font-size: 16px;
    color: #fff;
    background: #ffa726;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button:hover {
    background: #fb8c00;
}

p {
    font-size: 14px;
    margin-top: 10px;
}

p a {
    color: #ffa726;
    text-decoration: none;
    font-weight: bold;
    transition: color 0.3s ease;
}

p a:hover {
    color: #fb8c00;
}

footer {
    position: fixed;
    bottom: 0;
    width: 100%;
    background: #ffdb58;
    text-align: center;
    padding: 10px 0;
}

.marquee {
    font-weight: bold;
    color: #333;
    white-space: nowrap;
    overflow: hidden;
}

.marquee span {
    display: inline-block;
    animation: marquee 10s linear infinite;
}

@keyframes marquee {
    from { transform: translateX(100%); }
    to { transform: translateX(-100%); }
}
    </style>
</head>
<body>
    <div class="container">
        <!-- Logo -->
        <img src="img/cs.jpeg" alt="Logo" class="logo"> <!-- Ganti logo.png dengan path logo Anda -->
        
        <h2>Login</h2>
        <form method="POST" action="">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <p>Belum punya akun? <a href="register.php">Daftar disini</a></p>
    </div>

    <!-- Footer dengan teks berjalan -->
    <footer>
        <div class="marquee">
            <span>Selamat Datang! Masukkan Username dan Password untuk login.</span>
        </div>
    </footer>

    <!-- Script untuk menampilkan SweetAlert jika ada error -->
    <script>
        <?php if(isset($error)): ?>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '<?php echo $error; ?>',
                confirmButtonText: 'Coba lagi'
            });
        <?php endif; ?>
    </script>
</body>
</html>









