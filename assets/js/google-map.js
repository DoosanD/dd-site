var map;

function initMap() {
	if(document.getElementById('gmap')){
    map = new google.maps.Map(document.getElementById('gmap'), { 
        center: {  lat: 0,  lng: 0 },
        zoom: 15,
		styles: [
    {
        "featureType": "all",
        "stylers": [
            {
                "saturation": 0
            },
            {
                "hue": "#e7ecf0"
            }
        ]
    },
    {
        "featureType": "road",
        "stylers": [
            {
                "saturation": -70
            }
        ]
    },
    {
        "featureType": "transit",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "poi",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "water",
        "stylers": [
            {
                "visibility": "simplified"
            },
            {
                "saturation": -60
            }
        ]
    }
]
    });
    var marker = new google.maps.Marker({  
        position: { lat: 0.0,  lng: 0.0 },
        map: map,
        title: 'Movers'
		
    });
	}
}

// window.onload = initMap;
 google.maps.event.addDomListener(window, 'load', initMap);