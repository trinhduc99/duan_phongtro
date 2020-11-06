jQuery(document).ready(function ($) {
    if (typeof google === 'object' && typeof google.maps === 'object') {
        initializeMap();
        setTimeout(function () {
            initializeMapContent();
        }, 3500);
    }

    function initializeMapContent() {
        if ($('#maps_content').length <= 0) return;
        var data_lat = $('#maps_content').attr('data-lat');
        var data_long = $('#maps_content').attr('data-long');
        var data_address = $('#maps_content').attr('data-address');

        var initialLocation = new google.maps.LatLng(10.75, 106.6667);

        var myOptions = {
            scrollwheel: false,
            zoom: 15,
            center: initialLocation,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        var marker = false;

        var map = new google.maps.Map($('#maps_content')[0], myOptions);
        geocoder = new google.maps.Geocoder();
        if (!marker) {
            marker = addMarker(initialLocation, 'Bấm vào map để tạo chỉ dẫn', map);
        }

        if (data_lat != 0 && data_long != 0) {
            initialLocation = new google.maps.LatLng(data_lat, data_long);
            map.setCenter(initialLocation);
            marker.setPosition(initialLocation);
        } else if (typeof data_address !== "undefined") {

            geocoder.geocode({'address': data_address}, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {

                    map.setCenter(results[0].geometry.location);
                    marker.setPosition(results[0].geometry.location);
                } else {
                    map.setCenter(initialLocation);
                    marker.setPosition(initialLocation);
                }
            });
        }
    }

    function initializeMap() {

        if ($('#maps').length <= 0) return;

        var default_lat = $('#map_lat').val() != 0 ? $('#map_lat').val() : 10.75;
        var default_long = $('#map_long').val() != 0 ? $('#map_long').val() : 106.6667;
        var initialLocation = new google.maps.LatLng(default_lat, default_long);
        var myOptions = {
            scrollwheel: false,
            zoom: 15,
            center: initialLocation,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        var marker = false;
        var address = '';

        var map = new google.maps.Map($('#maps')[0], myOptions);
        geocoder = new google.maps.Geocoder();
        if (!marker) {
            marker = addMarker(initialLocation, 'Bấm vào map để tạo chỉ dẫn', map);
        }

        $('#diachi').donetyping(function () {
            address = $(this).val();

            geocoder.geocode({'address': address}, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {

                    map.setCenter(results[0].geometry.location);
                    marker.setPosition(results[0].geometry.location);

                    $('#map_lat').val(results[0].geometry.location.lat());
                    $('#map_long').val(results[0].geometry.location.lng());
                }
            });
        });
        if (default_lat == 10.75) {
            address = $('#diachi').val();

            geocoder.geocode({'address': address}, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {

                    map.setCenter(results[0].geometry.location);
                    marker.setPosition(results[0].geometry.location);

                    $('#map_lat').val(results[0].geometry.location.lat());
                    $('#map_long').val(results[0].geometry.location.lng());
                }
            });
        } else {
            address = $('#diachi').val();

            geocoder.geocode({'address': address}, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {

                    map.setCenter(results[0].geometry.location);
                    marker.setPosition(results[0].geometry.location);

                    $('#map_lat').val(results[0].geometry.location.lat());
                    $('#map_long').val(results[0].geometry.location.lng());
                }
            });
        }
    }

    function addMarker(latlng, title, map) {
        var marker = new google.maps.Marker({
            position: latlng,
            map: map,
            title: title,
            animation: google.maps.Animation.DROP,
            draggable: true
        });

        marker.addListener('dragend', function (event) {
            $('#map_lat').val(event.latLng.lat());
            $('#map_long').val(event.latLng.lng());
        });
        return marker;
    }

    changeLayoutNews();

    function changeLayoutNews() {
        $('.js-select-tinhthanhpho, .js-select-quanhuyen, .js-select-duong, .js-select-phuongxa').change(function () {
            changeAddress();
        });

        $('.js-input-street-number').donetyping(function () {
            changeAddress();
        }, 1000);

        function changeAddress() {
            var duong = "";
            if ($(".js-select-duong").val() != "" && $(".js-select-duong").val() != 0) {
                var street_number = $('.js-input-street-number').val();
                duong = (street_number ? street_number + ' ' : '') + $(".js-select-duong option:selected").text() + ", ";
            }

            var quan = "";
            if ($(".js-select-quanhuyen").val() != "" && $(".js-select-quanhuyen").val() != 0) {
                quan = $(".js-select-quanhuyen option:selected").text() + ", ";
            }

            var tinhthanhpho = "";
            if ($(".js-select-tinhthanhpho").val() != "" && $(".js-select-tinhthanhpho").val() != 0) {
                tinhthanhpho = $(".js-select-tinhthanhpho option:selected").text();
            }

            var phuongxa = "";
            if ($(".js-select-phuongxa").val() != "" && $(".js-select-phuongxa").val() != 0) {
                phuongxa = $(".js-select-phuongxa option:selected").text() + ", ";
            }

            if ($("#diachi").length) {
                $('#diachi').val(duong + phuongxa + quan + tinhthanhpho);
                $("#diachi").focus();
                $("#diachi").get(0).setSelectionRange(0, 0);
                initializeMap();
            }
        }
    }
});
