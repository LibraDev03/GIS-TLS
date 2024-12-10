@extends('layouts.user.client')
@section('shop_list')
<h3>Danh sách cửa hàng</h3>
    <ul>
        @foreach($data as $shop)
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
        const map = L.map('map').setView([21.072230462692275, 105.77386462253688], 13);
    
        // 2. Thêm lớp nền bản đồ
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
    
        // 3. Biến lưu trữ router để tránh tạo nhiều tuyến đường
        let router = null;
    
        // 4. Dữ liệu cửa hàng
        const shops = @json($data);
    
        if (Array.isArray(shops) && shops.length > 0) {
            shops.forEach(shop => {
                if (shop.latitude && shop.longitude) {
                    const marker = L.marker([shop.latitude, shop.longitude]).addTo(map);
    
                    const popupContent = `
                        <div style="text-align: center;">
                            <h4>${shop.name}</h4>
                            <img src="/assets/images/shop/${shop.image}" alt="${shop.name}" 
                                style="width: 100px; height: auto; border-radius: 5px;">
                            <p>${shop.address}</p>
                            <p>Phone: ${shop.phone}</p>
                            <button onclick="getRoute(${shop.latitude}, ${shop.longitude})" 
                                style="margin-top: 5px; padding: 5px; background-color: #007BFF; color: #fff; border: none; border-radius: 3px; cursor: pointer;">
                                Chỉ đường
                            </button>
                        </div>
                    `;
                    marker.bindPopup(popupContent);
                }
            });
        } else {
            console.warn("No shop data available.");
        }
    
        // 5. Hiển thị vị trí của người dùng
        let currentLocation = null;
    
        map.locate({ setView: true, maxZoom: 16 });
    
        function onLocationFound(e) {
            currentLocation = e.latlng;
    
            // Thêm marker vị trí hiện tại
            const currentMarker = L.marker(currentLocation).addTo(map);
            currentMarker.bindPopup("Bạn đang ở đây").openPopup();
        }
    
        map.on('locationfound', onLocationFound);
    
        function onLocationError(e) {
            alert("Không thể xác định vị trí: " + e.message);
        }
    
        map.on('locationerror', onLocationError);
    
        // 6. Hàm chỉ đường
        function getRoute(lat, lng) {
            if (!currentLocation) {
                alert("Không tìm thấy vị trí hiện tại của bạn!");
                return;
            }
    
            // Xóa tuyến đường cũ nếu tồn tại
            if (router) {
                map.removeControl(router);
            }
    
            // Tạo tuyến đường mới
            router = L.Routing.control({
                waypoints: [
                    L.latLng(currentLocation.lat, currentLocation.lng),
                    L.latLng(lat, lng)
                ],
                routeWhileDragging: true,
                show: false
            }).addTo(map);
        }
    </script>     
@endsection