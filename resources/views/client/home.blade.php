@extends('layouts.user.client')
@section('shop_list')
<h3>Danh sách cửa hàng</h3>
    <ul>
        @foreach($shops as $shop)
            <li>
                <strong>{{ $shop['name'] }}</strong><br>
            </li>
        @endforeach
    </ul>

@endsection
@section('main')
    <div id="map"></div>
    <script>
        // 1. Tạo bản đồ và định vị tại một vị trí mặc định
        var map = L.map('map').setView([21.072230462692275, 105.77386462253688], 18);

        // 2. Thêm lớp nền bản đồ
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // 3. Hiển thị các cửa hàng
        const shops = @json($shops);
        shops.forEach(shop => {
            L.marker([shop.latitude, shop.longitude])
                .addTo(map)
                .bindPopup(`
                    <div style="text-align: center;">
                        <h4>${shop.name}</h4>
                        <img src="/assets/images/shop/${shop.image}" alt="${shop.name}" style="width: 100px; height: auto; border-radius: 5px;">
                        <p>${shop.address}</p>
                        <p>Phone: ${shop.phone}</p>
                    </div>
                `);
        });

        //4 xác định tuyến đường
        // Biến để lưu tuyến đường hiện tại
        let currentRoute;
        var userLocation;

        // Tự động định vị vị trí của người dùng
        map.locate({ setView: true, maxZoom: 16 });

        function onLocationFound(e) {
            userLocation = e.latlng; // Lưu lại vị trí của người dùng
            var radius = e.accuracy / 2;

            // Thêm marker cho vị trí hiện tại
            L.marker(userLocation).addTo(map)
                .bindPopup("Bạn đang ở đây. Độ chính xác: " + radius.toFixed(1) + " mét").openPopup();

            // Thêm vòng tròn hiển thị độ chính xác
            L.circle(userLocation, radius).addTo(map);
        }

        map.on('locationfound', onLocationFound);

        // Xử lý lỗi khi không lấy được vị trí
        function onLocationError(e) {
            alert(e.message);
        }
        map.on('locationerror', onLocationError);

        // Hiển thị các cửa hàng và thêm sự kiện click để chỉ đường
        shops.forEach(shop => {
            // Tạo marker cho cửa hàng
            var marker = L.marker([shop.latitude, shop.longitude])
                .addTo(map)
                .bindPopup(`
                    <div style="text-align: center;">
                        <h4>${shop.name}</h4>
                        <img src="/assets/images/shop/${shop.image}" alt="${shop.name}" style="width: 100px; height: auto; border-radius: 5px;">
                        <p>${shop.address}</p>
                        <p>Phone: ${shop.phone}</p>
                        <button onclick="drawRoute(${shop.id})">Chỉ đường</button>
                    </div>
                `);

            // Hoặc sử dụng sự kiện click trực tiếp trên marker
            marker.on('click', () => drawRoute(shop.id));
        });

        // Hàm vẽ tuyến đường
        function drawRoute(shopId) {
            // Kiểm tra nếu vị trí người dùng chưa được xác định
            if (!userLocation) {
                alert("Không thể xác định vị trí của bạn.");
                return;
            }

            // Tìm cửa hàng theo ID
            var selectedShop = shops.find(shop => shop.id === shopId);
            if (!selectedShop) {
                alert("Không tìm thấy cửa hàng này.");
                return;
            }

            // Xóa tất cả tuyến đường trước đó (nếu có)
            if (currentRoute) {
                map.removeControl(currentRoute);
            }

            // Vẽ tuyến đường từ người dùng đến cửa hàng
            currentRoute = L.Routing.control({
                waypoints: [
                    L.latLng(userLocation), // Vị trí hiện tại của người dùng
                    L.latLng([selectedShop.latitude, selectedShop.longitude]) // Vị trí của cửa hàng
                ],
                routeWhileDragging: true // Cho phép kéo để chỉnh tuyến
            }).addTo(map);
        }


    </script>
@endsection
