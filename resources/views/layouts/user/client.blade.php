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
        <script src="https://unpkg.com/leaflet-routing-machine"></script>
        <style>
            #map {
                height: 625px;
                margin-left: 380px;
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
        @if (Auth::check())
            <ul>
                <li><a href="{{route('admin.dashboard')}}">Quản trị</a></li>
                <li><a href="{{route('client.home')}}">Trang chủ</a></li>
                <li><a href="{{route('authen.register')}}">Đăng kí</a></li>
                <li><a href="#">Đăng xuất</a></li>
            </ul>
        @else
        <ul>
            <li><a href="{{route('client.home')}}">Trang chủ</a></li>
            <li><a href="{{route('authen.register')}}">Đăng kí</a></li>
            <li><a href="{{route('authen.login')}}">Đăng nhập </a></li>
        </ul>
        @endif
       
    </div>

    <!-- Main Content -->
    <main class="main-content">
        <div class="content-wrapper">
            <!-- Khu vực dành cho danh sách -->
            <div id="shop-list">
                @yield('shop_list')
            </div>
    
            <!-- Khu vực dành cho nội dung chính -->
            <div id="main-view">
                @yield('main')
            </div>
        </div>
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

        /* Tùy chỉnh hộp chứa các chỉ dẫn của Leaflet Routing Machine */
        .leaflet-routing-container {
            background-color: white; /* Nền trắng */
            color: black;             /* Chữ đen */
            font-family: Arial, sans-serif;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); /* Thêm bóng cho hộp chứa */
        }

        /* Tùy chỉnh các dòng chỉ dẫn */
        .leaflet-routing-instructions {
            font-size: 14px;
            line-height: 1.6;
        }

        /* Thay đổi mũi tên và kiểu dáng chỉ dẫn */
        .leaflet-routing-icon {
            background-color: #ff6600;
        }

        /* Shop List Sidebar */
        #shop-list {
            position: fixed; /* Cố định vị trí */
            top: 60px; /* Đẩy xuống dưới header */
            left: 35px; /* Gắn sát bên trái */
            width: 300px; /* Chiều rộng sidebar */
            height: calc(100% - 60px); /* Chiều cao bằng 100% trừ chiều cao của header */
            background-color: #444; /* Màu nền tối */
            color: white; /* Màu chữ */
            padding: 20px; /* Khoảng cách bên trong */
            overflow-y: auto; /* Cho phép cuộn khi nội dung dài */
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.2); /* Đổ bóng để tạo chiều sâu */
            z-index: 999; /* Nổi trên phần nội dung chính */
            border-right: 1px solid #ccc; /* Đường viền phân cách với phần chính */
        }

        #shop-list ul {
            list-style: none; /* Bỏ gạch đầu dòng */
            padding: 0;
            margin: 0;
        }

        #shop-list ul li {
            margin: 15px 0; /* Khoảng cách giữa các mục */
        }

        #shop-list ul li a {
            color: white; /* Màu chữ */
            text-decoration: none; /* Bỏ gạch chân */
            font-size: 16px; /* Kích thước chữ */
            display: block; /* Chiếm toàn bộ chiều rộng của mục */
            padding: 8px 10px; /* Khoảng cách bên trong mỗi mục */
            border-radius: 4px; /* Bo góc các mục */
            transition: background-color 0.3s ease; /* Hiệu ứng hover mượt mà */
        }

        #shop-list ul li a:hover {
            background-color: #555; /* Đổi màu nền khi hover */
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
