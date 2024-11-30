<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bai tap lon</title>
        <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
        crossorigin=""/>
        <style>
            #map {
                height: 625px;
                margin-left: 45px;
            }
        </style>
        <!-- Make sure you put this AFTER Leaflet's CSS -->
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
        crossorigin=""></script>
        <!-- Leaflet Routing Machine -->
        <script src="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.js"></script>
    </head>
<body>
    <!-- Header -->
    <header class="header">
        <button id="menu-toggle" class="menu-button">☰</button>
        <form action="{{route('client.search')}}" method="GET">
            <input type="text" class="search-bar" placeholder="Tìm kiếm tại đâyyyyy" name="key">
            <button type="submit">
                <i class="fa fa-search"></i> <!-- Biểu tượng tìm kiếm từ Font Awesome -->
            </button>
        </form>
    </header>
    

    <!-- Sidebar -->
    <div id="sidebar" class="sidebar">
        <ul>
            <li><a href="{{route('client.home')}}">Trang chủ</a></li>
            <li><a href="{{route('authen.register')}}">Đăng kí</a></li>
            <li><a href="{{route('authen.login')}}">Đăng nhập </a></li>
            <li><a href="#">Đăng xuất</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <main class="main-content">
        @yield('main')
    </main>

    <script src="script.js"></script>
    <style>
                /* General Reset */
        body, html {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            overflow: hidden; /* Đảm bảo không có thanh cuộn */
        }

        /* Header */
        .header {
            position: fixed; /* Cố định header trên cùng */
            top: 0;
            left: 0;
            width: 100%;
            background-color: #333;
            color: white;
            padding: 10px 20px;
            display: flex;
            align-items: center;
            gap: 10px;
            z-index: 1000; /* Đảm bảo header luôn nổi trên các thành phần khác */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Đổ bóng để tạo chiều sâu */
        }

        .menu-button {
            background: none;
            border: none;
            color: white;
            font-size: 20px;
            cursor: pointer;
        }

        .search-bar {
            flex-grow: 1;
            max-width: 300px;
            padding: 5px;
            font-size: 16px;
        }

        /* Sidebar */
        .sidebar {
            position: fixed;
            top: 0;
            left: -250px; /* Sidebar ẩn bên ngoài màn hình */
            width: 250px;
            height: 100%;
            background-color: #444;
            color: white;
            padding: 20px;
            margin-top: 40px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.5);
            transition: left 0.3s ease;
            z-index: 999; /* Đảm bảo sidebar nổi ngay dưới header */
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar ul li {
            margin: 15px 0;
        }

        .sidebar ul li a {
            color: white;
            text-decoration: none;
            font-size: 18px;
        }

        /* Main Content */
        .main-content {
            position: fixed; /* Đảm bảo nội dung chính cũng cố định */
            top: 60px; /* Đẩy xuống dưới header */
            left: 0;
            right: 0;
            bottom: 0;
            overflow-y: auto; /* Cho phép cuộn nếu nội dung dài */
            padding: 20px;
            background: #f5f5f5;
            z-index: 1;
        }

        /* Sidebar Active State */
        .sidebar.active {
            left: 0;
        }

    </style>
        <script>
            // Select menu toggle button and sidebar
            const menuToggle = document.getElementById('menu-toggle');
            const sidebar = document.getElementById('sidebar');

            // Add event listener to toggle sidebar
            menuToggle.addEventListener('click', () => {
                sidebar.classList.toggle('active');
            });

        </script>
</body>
</html>
