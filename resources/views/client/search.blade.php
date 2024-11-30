@extends('layouts.user.client')
@section('main')
    <div id="map"></div>
    <script>
        // 1. Tạo bản đồ và định vị tại một vị trí mặc định
        var map = L.map('map').setView([21.072230462692275, 105.77386462253688], 13);

        // 2. Thêm lớp nền bản đồ
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        //hiển thị các cửa hàng sẽ thêm vào bản đồ.

        var shops = @json($shops);
        var shops = @json($data);

        shops.forEach(shop => {
            if (shop.latitude && shop.longitude) {
                const marker = L.marker([shop.latitude, shop.longitude]).addTo(map);
                const popupContent = `
                    <div style="text-align: center;">
                        <h4>${shop.name}</h4>
                        <img src="/assets/images/shop/${shop.image}" alt="${shop.name}" style="width: 100px; height: auto; border-radius: 5px;">
                        <p>${shop.address}</p>
                        <p>Phone: ${shop.phone}</p>
                    </div>
                `;
                marker.bindPopup(popupContent);
                marker.openPopup();
            }
        });



         // 3. Hiển thị vị trí của người dùng
         map.locate({setView: true, maxZoom: 16});

        function onLocationFound(e) {
            var radius = e.accuracy / 2;

            // Thêm marker vị trí hiện tại
            L.marker(e.latlng).addTo(map)
                .bindPopup("Bạn đang ở đây").openPopup();

            // Thêm vòng tròn hiển thị độ chính xác
            // L.circle(e.latlng, radius).addTo(map);
        }

        map.on('locationfound', onLocationFound);

        // Xử lý lỗi khi không lấy được vị trí
        function onLocationError(e) {
            alert(e.message);
        }

        map.on('locationerror', onLocationError);


    </script>
@endsection