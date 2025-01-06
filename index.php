

<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	
		<link rel="stylesheet" href="style2.css">
	<style>
		 body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
        }
        .container {
            text-align: center;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        .logo {
            max-width: 100px;
            margin: 0 auto 20px;
        }
        footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #ffdb58;
            text-align: center;
            padding: 10px 0;
            overflow: hidden;
        }
        .marquee {
            font-weight: bold;
            color: #333;
            white-space: nowrap;
            overflow: hidden;
        }
        .marquee span {
            display: inline-block;
            animation: marquee 8s linear infinite;
        }
        @keyframes marquee {
            from { transform: translateX(100%); }
            to { transform: translateX(-100%); }
        }

		/* Header tetap di atas */
        .head-title {
            position: fixed;
            top: 0;
            left: 250px; /* Sesuaikan dengan lebar sidebar */
            width: calc(100% - 250px);
            background-color: #fff;
            z-index: 1000;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 15px 20px;
            border-bottom: 1px solid #ccc;
        }

        /* Tambahkan jarak ke konten utama */
        main {
            margin-top: 100px; /* Sesuaikan dengan tinggi header */
        }


/* CSS untuk logout */
#logoutButton {
    background-color: #ffff00; /* Warna kuning */
    color: black; /* Warna teks */
    border: none; /* Hapus border */
    padding: 10px 20px; /* Jarak padding */
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 10px 0;
    cursor: pointer;
    border-radius: 5px; /* Membuat tombol membulat */
    transition: background-color 0.3s ease; /* Animasi perubahan warna */
}

#logoutButton:hover {
    background-color: #f44336; /* Warna merah lebih gelap saat di-hover */
}
.user-profile {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .user-profile img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }

        .user-profile span {
            font-weight: bold;
        }

	</style>

	<title>AdminHub</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text">AdminHub</span>
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="#" title="belum Buat">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">My Store</span>
				</a>
			</li>
			<li>
				<a href="Analytics.html">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Analytics</span>
				</a>
			</li>
			<li>
				<a href="Message.html">
					<i class='bx bxs-message-dots' ></i>
					<span class="text">Message</span>
				</a>
			</li>
			<li>
				<a href="team.html">
					<i class='bx bxs-group' ></i>
					<span class="text">Team</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="setting.html">
					<i class='bx bxs-cog' ></i>
					<span class="text">Settings</span>
				</a>
			</li>
			<li>
					<button id="logoutButton"><b>LOGOUT</b></button>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
	

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Dashboard</h1>
					<ul class="breadcrumb">
						<li>
							<a href="index.php">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Home</a>
						</li>
					</ul>
				</div>
				<a href="#" class="btn-download">
					<i class='bx bxs-cloud-download' ></i>
					<span class="text">Download PDF</span>
				</a>
			</div>

			<ul class="box-info">
				<li>
					<i class='bx bxs-calendar-check' ></i>
					<span class="text">
						<h3>1020</h3>
						<p>New Order</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-group' ></i>
					<span class="text">
						<h3>2834</h3>
						<p>Visitors</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-dollar-circle' ></i>
					<span class="text">
						<h3>$2543</h3>
						<p>Total Sales</p>
					</span>
				</li>
			</ul>


			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Recent Orders</h3>
						<i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<table>
						<thead>
							<tr>
								<th>User</th>
								<th>Date Order</th>
								<th>Status</th>
							</tr>
						</thead>
				
		</main>
		<!-- MAIN -->
	</section>
	<script>
	<!-- CONTENT -->
	// untuk Sweet alert Logout
        document.getElementById('logoutButton').addEventListener('click', function() {
    Swal.fire({
        title: 'Apakah Anda yakin?',
        text: "Anda akan keluar dari akun!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, logout!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            // Logika untuk logout, misalnya redirect ke halaman logout
            window.location.href = 'login.php'; // Ganti dengan URL logout Anda
        }
    });
});
</script>

	<script src="script.js"></script>
</body>
</html>