<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Map</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
</head>

<body>
    <h3 style="text-align: center;" >Map</h3>
    <!-- the id of map is used to put all the details from Javascript function -->
    <div id="map" style="height: 320px;"></div>
    <script defer>
        // fetch makes GET request to get all the data from one's location using ipinfo
        // please make request by disbaling ad-blocker else the request might get blocked
        fetch('http://ip-api.com/json/')
            .then(response => response.json())
            .then(data => {
                // latituedes of the location
                geoDatas = []
                geoDatas.push(data.lat)
                geoDatas.push(data.lon)
                ip = data.query
                console.log(geoDatas);
                // a map view
                var map = L.map('map').setView([geoDatas[0], geoDatas[1]], 13);
                // addding tile to map
                L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiZmhia2pzbmtteiIsImEiOiJja3duZ2l2aWkwaHduMnhxdGNhcjVwMHZxIn0.h2BW6q2vyc_JhV47n6aVQg', {
                    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                    maxZoom: 18,
                    id: 'mapbox/streets-v11',
                    tileSize: 512,
                    zoomOffset: -1,
                    accessToken: 'your.mapbox.access.token'
                }).addTo(map);
                // adding marker to map
                var marker = L.marker([geoDatas[0], geoDatas[1]]).addTo(map);
                // adding popup to map
                marker.bindPopup(`<p>Your ip is ${ip}</p>`).openPopup();

            }).catch(error => console.log("Error in geo data fetching"))
    </script>
</body>

</html>