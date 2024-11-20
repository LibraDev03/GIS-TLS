@extends('layouts.client')
@section('main')
<div id="map"></div>
<script>
    var map = L.map('map').setView([21.072230462692275, 105.77386462253688], 13);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    L.marker([21.072230462692275, 105.77386462253688]).addTo(map)
        .bindPopup('<h1>Đại học mỏ địa chất</h1><img src="logo.png"/>')
        //.openPopup();

    //Hiển thị chấm tròn đánh dấu trên abnr đồ
    // var points = {
    //         "type": "FeatureCollection",
    //         "features": [
    //             {
    //             "type": "Feature",
    //             "properties": {},
    //             "geometry": {
    //                 "coordinates": [
    //                 105.7726820894548,
    //                 21.07291490802521
    //                 ],
    //                 "type": "Point"
    //             }
    //             },
    //             {
    //             "type": "Feature",
    //             "properties": {},
    //             "geometry": {
    //                 "coordinates": [
    //                 105.77600578862138,
    //                 21.072133807058222
    //                 ],
    //                 "type": "Point"
    //             }
    //             }
    //         ]
    //     }
    // var geojsonMarkerOptions = {
    //     radius: 8,
    //     fillColor: "#ff7800",
    //     color: "#000",
    //     weight: 1,
    //     opacity: 1,
    //     fillOpacity: 0.8
    // };
    // L.geoJSON(points, {
    //     pointToLayer: function (feature, latlng) {
    //         return L.circleMarker(latlng, geojsonMarkerOptions);
    //     }
    // }).addTo(map);
</script>
<h1>hhh</h1>
@endsection