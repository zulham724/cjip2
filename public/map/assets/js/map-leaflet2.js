$(document).ready(function($) {
    "use strict";


    var mapId = "ts-map-hero";

    if (typeof foo === 'string'){
        alert('Data tidak dapat ditemukan');
        localStorage.clear();
        document.getElementById("refresh").href = "/admin/peta-potensi-investasi";
    }
    else {
        document.getElementById("refresh").href = "/admin/peta-potensi-investasi";
        var loadedMarkersData = foo;
        var allMarkersData = foo;
    }
    console.log(foo)
    //==================================================================================================================
    // VARIABLES
    // =================================================================================================================

    var newMarkers = [];
    var umk = [];
    var umkapimap = [];

    var lastMarker;
    var map;
    var markerCluster;

    if ($("#" + mapId).length) {

        //==============================================================================================================
        // MAP SETTINGS
        // =============================================================================================================
        var mapElement = $(document.getElementById(mapId));
        var mapDefaultZoom = parseInt(mapElement.attr("data-ts-map-zoom"), 10);
        var centerLatitude = mapElement.attr("data-ts-map-center-latitude");
        var centerLongitude = mapElement.attr("data-ts-map-center-longitude");
        var locale = mapElement.attr("data-ts-locale");
        var currency = mapElement.attr("data-ts-currency");
        var unit = mapElement.attr("data-ts-unit");
        var controls = parseInt(mapElement.attr("data-ts-map-controls"), 10);
        var scrollWheel = parseInt(mapElement.attr("data-ts-map-scroll-wheel"), 10);
        var leafletMapProvider = mapElement.attr("data-ts-map-leaflet-provider");
        var leafletAttribution = mapElement.attr("data-ts-map-leaflet-attribution");
        var zoomPosition = mapElement.attr("data-ts-map-zoom-position");
        var mapBoxAccessToken = mapElement.attr("data-ts-map-mapbox-access-token");
        var mapBoxId = mapElement.attr("data-ts-map-mapbox-id");

        if (mapElement.attr("data-ts-display-additional-info")) {
            var displayAdditionalInfoTemp = mapElement.attr("data-ts-display-additional-info").split(";");
            var displayAdditionalInfo = [];
            for (var i = 0; i < displayAdditionalInfoTemp.length; i++) {
                displayAdditionalInfo.push(displayAdditionalInfoTemp[i].split("*"));
            }
        }

        // Default map zoom
        if (!mapDefaultZoom) {
            mapDefaultZoom = 14;
        }

        //==================================================================================================================
        // RTRW

        //==================================================================================================================
        // MAP ELEMENT
        // =================================================================================================================
        map = L.map(mapId, {
            zoomControl: false,
            scrollWheelZoom: scrollWheel
        });
        map.setView([centerLatitude, centerLongitude], mapDefaultZoom);

        L.tileLayer(leafletMapProvider, {
            attribution: leafletAttribution,
            id: mapBoxId,
            accessToken: mapBoxAccessToken
        }).addTo(map);

        var district_boundary = new L.geoJson();
        district_boundary.addTo(map);

        if( controls !== 0 && zoomPosition ){
            L.control.zoom({position: zoomPosition}).addTo(map);
        }
        else if ( controls !== 0 ){
            L.control.zoom({position: "topright"}).addTo(map);
        }

        //==================================================================================================================
        // LOAD DATA
        // =================================================================================================================

        createMarkers();
    }

    function onEachFeature(feature, layer) {
        //bind click
        layer.on('click', function (e) {
            // e = event
            console.log(e);
            // You can make your ajax call declaration here
            //$.ajax(...
        });

    }
    function getColor(d) {
        return d > 2700000 ? '#4b0019' :
            d > 2500000 ? '#71001f' :
                d > 2300000 ? '#800026' :
                    d > 2100000  ? '#BD0026' :
                        d > 1900000  ? '#E31A1C' :
                            d > 1700000  ? '#FC4E2A' :
                                '#FFFFFF';
    }
    function zoomToFeature(e) {
        map.fitBounds(e.target.getBounds());
    }

    function loadData(parameters) {

        $.ajax({
            url: "/admin/koordinat/",
            dataType: "json",
            method: "POST",
            cache: false,
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function (results) {
                //console.log(results);
                if (typeof parameters !== "undefined" && parameters["formData"]) {
                    //loadFormData(parameters);
                }
                else {
                    allMarkersData = results;
                    loadedMarkersData = allMarkersData;
                }

                createMarkers(); // call function to create markers
            },
            error: function (e) {
                console.log(e);
            }
        });


    }

    //==================================================================================================================
    // Create DIV with the markers data
    // =================================================================================================================
    function createMarkers() {
        $.ajax({
            dataType: "json",
            url: "http://geoportal.jatengprov.go.id/geoserver/ADMIN/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=ADMIN:rtrwp_330020200106083814&maxFeatures=50&outputFormat=application%2Fjson",
            success: function(data) {
                //console.log(data);
                $(data.features).each(function(key, data) {
                    district_boundary.addData(data);
                });

                loadData();
            },
            error: function (e) {
                console.log(e);
            }
        });

        $.ajax({
            dataType: "json",
            url: "http://geo.dpmptsp.jatengprov.go.id/geoserver/jawatengah/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=jawatengah:peta_propinsi_jawatengah&maxFeatures=50&outputFormat=application%2Fjson",
            async:false,
            success: function(data) {

                $.ajax({
                    dataType: "json",
                    url: window.location.origin + "/api/umk",
                    async:false,
                    success: function(apiumk) {
                        //console.log(apiumk);
                        umk = apiumk;
                        //console.log(umk.length);
                        $(data.features).each(function(key, data) {

                            //console.log(data.properties);
                            //console.log(data.properties.Kabupaten_ + '-' + data.properties.kode);

                            $(umk).each(function (k, umk) {
                                //console.log(umk.kode_map + 'api');
                                if (umk.kode_map == data.properties['kode']){
                                    data.properties['umk'] = umk.umk;

                                }
                                //console.log(umk.kode_map === data.properties['kode']);
                            });

                            var district_boundary = new L.geoJson(data, {
                                onEachFeature: function (data, layer) {
                                    layer.setStyle({
                                        fillColor: getColor(data.properties.umk),
                                        weight: 2,
                                        opacity: 1,
                                        color: 'white',
                                        dashArray: '3',
                                        fillOpacity: 0.7
                                    });

                                    layer.on({
                                        mouseover: function (ee) {
                                            layer.setStyle({
                                                weight: 5,
                                                color: '#24fa29',
                                                dashArray: '',
                                                fillOpacity: 0.7
                                            })
                                            info.update(data.properties);
                                        },
                                        mouseout: function(e){
                                            layer.setStyle({
                                                fillColor: getColor(data.properties.umk),
                                                weight: 2,
                                                opacity: 1,
                                                color: 'white',
                                                dashArray: '3',
                                                fillOpacity: 0.7
                                            });
                                            info.update();
                                        },
                                        click: zoomToFeature
                                    });

                                    layer.on('mouseover', function () {
                                        // Let's say you've got a property called url in your geojsonfeature:
                                        var customOptions =
                                            {
                                                'maxWidth': '500',
                                                'className' : 'custom'
                                            };
                                        layer.bindPopup(data.properties.Kabupaten_, customOptions);

                                    });
                                }
                            });
                            district_boundary.addTo(map);


                        });
                        //console.log(data.features);

                    },
                    error: function (e) {
                        console.log(e);
                    }
                });

                //

                //loadData();
            },
            error: function (e) {
                console.log(e);
            }
        });

        var legend = L.control({position: 'bottomright'});

        legend.onAdd = function (map) {

            var div = L.DomUtil.create('div', 'info legend'),
                grades = [2700000,
                    2500000,
                    2300000,
                    2100000,
                    1900000,
                    1700000,
                    1600000],
                labels = [];

            // loop through our density intervals and generate a label with a colored square for each interval
            for (var i = 0; i < grades.length; i++) {
                div.innerHTML +=
                    '<i style="background:' + getColor(grades[i] + 1) + '; width: 100%"></i> ' +
                    grades[i] + (grades[i + 1] ? '&ndash;' + grades[i + 1] + '<br>' : '+');
            }

            return div;
        };

        legend.addTo(map);
        //LEGEND.//
        var info = L.control({position: 'bottomright'});

        info.onAdd = function (map) {
            this._div = L.DomUtil.create('div', 'info'); // create a div with a class "info"
            this.update();
            return this._div;
        };

// method that we will use to update the control based on feature properties passed
        info.update = function (props) {
            this._div.innerHTML = '<h4>' + 'UMK Jawa Tengah Tahun ' + (new Date).getFullYear() + '</h4>'  +  (props ?
                '<b>' + props.Kabupaten_ + '</b><br />' + 'Rp. ' + (props.umk).toLocaleString()
                : 'Pilih Kab/Kota');
        };

        //LEGEND.//
        info.addTo(map);
        function resetHighlight(e) {
            district_boundary.resetStyle(e.target);
        }
        markerCluster = L.markerClusterGroup({
            showCoverageOnHover: false,
            disableClusteringAtZoom: 8,
        });

        for (var i = 0; i < loadedMarkersData.length; i++) {

            var markerContent = document.createElement('div');
            markerContent.innerHTML =
                '<div class="ts-marker-wrapper">' +
                '<a href="#" class="ts-marker" data-ts-id="' + loadedMarkersData[i]["id"] + '" data-ts-ln="' + i + '">' +
                ( ( loadedMarkersData[i]["market_id"] === 1) ? '<div class="ts-marker__feature">' + loadedMarkersData[i]["ribbon"] + '</div>' : "" ) +
                ( ( loadedMarkersData[i]["title"] !== undefined ) ? '<div class="ts-marker__title">' + loadedMarkersData[i]["title"] + '</div>' : "" ) +
                ( ( loadedMarkersData[i]["sektor"] !== undefined ) ? '<div class="ts-marker__title">' + loadedMarkersData[i]["sektor"] + '</div>' : "" ) +
                ( ( loadedMarkersData[i]["market"] !== undefined) ? '<div class="ts-marker__info">' + loadedMarkersData[i]["market"] + '</div>' : "" ) +
                ( ( loadedMarkersData[i]["marker_image"] !== undefined ) ? '<img src=' + loadedMarkersData[i]["marker_image"] + '></img>' : '<img src="/public/map/icon/cjip.png"></img>' ) +
                '</a>' +
                '</div>';

            placeLeafletMarker({"i": i, "markerContent": markerContent, "method": "latitudeLongitude"});

        }

        // After the markers are created, do the rest

        markersDone();
    }

    //==================================================================================================================
    // When markers are placed, do the rest
    // =================================================================================================================
    function markersDone() {

        //==================================================================================================================
        // MARKER CLUSTERER
        // =============================================================================================================
        map.addLayer(markerCluster);
        map.on("moveend", createSideBarResult);
        createSideBarResult();
    }

    //==================================================================================================================
    // Google Rich Marker plugin
    // =================================================================================================================

    function placeLeafletMarker(parameters) {
        //console.log(loadedMarkersData);
        var i = parameters["i"];

        // Define marker HTML

        var markerIcon = L.divIcon({
            html: parameters["markerContent"].innerHTML,
            iconSize: [32, 37],
            iconAnchor: [0, 37]
        });

        // Attach marker to map
        var marker = L.marker([loadedMarkersData[i]["latitude"], loadedMarkersData[i]["longitude"]], {
            icon: markerIcon
        });

        marker.loopNumber = i;

        //markerCluster.addLayer(marker);
        markerCluster.addLayer(marker);

        // Open Popup on click

        marker.on('click', function () {
            if (lastMarker && lastMarker._icon) {
                $(lastMarker._icon.firstChild).removeClass("ts-hide-marker");
            }
            openInfobox({
                "id": $(this._icon).find(".ts-marker").attr("data-ts-id"),
                "parentMarker": marker,
                "i": i,
                "url": "/admin/koordinat/"
            });
        });

        newMarkers.push(marker);
    }


    //==================================================================================================================
    // Open InfoBox on marker click
    // =================================================================================================================
    function openInfobox(parameters) {

        var i = parameters["i"];
        var parentMarker = parameters["parentMarker"];
        var id = parameters["id"];
        var infoboxHtml = document.createElement('div');

        // First create and HTML for infobox
        createInfoBoxHTML({"i": i, "infoboxHtml": infoboxHtml});

        //==============================================================================================================
        // Set InfoBox options
        //==============================================================================================================

        var popup = L.popup({closeButton: false, offset: [120, 0], closeOnClick: false})
            .setLatLng([parentMarker._latlng.lat, parentMarker._latlng.lng])
            .setContent(infoboxHtml)
            .openOn(map);

        // Set the new "Last" opened marker
        lastMarker = parentMarker;

        // Hide the current marker, so only InfoBox is visible
        parentMarker._markerIcon = parentMarker._icon.firstChild;
        $(parentMarker._icon.firstChild).addClass("ts-hide-marker");

        setTimeout(function () {
            $(".ts-infobox[data-ts-id='" + id + "']").closest(".infobox-wrapper").addClass("ts-show");

            $(".ts-infobox[data-ts-id='" + id + "'] .ts-close").on("click", function () {
                $(".ts-infobox[data-ts-id='" + id + "']").closest(".infobox-wrapper").removeClass("ts-show");
                $(parentMarker._markerIcon).removeClass("ts-hide-marker");
                map.closePopup();
            });
        }, 50);

    }

    //==================================================================================================================
    // Create Infobox HTML element
    //==================================================================================================================

    function createInfoBoxHTML(parameters) {

        var i = parameters["i"];
        var infoboxHtml = parameters["infoboxHtml"];

        infoboxHtml.innerHTML =
            '<div class="infobox-wrapper">' +
            '<div class="ts-infobox" data-ts-id="' + loadedMarkersData[i]["id"] + '">' +
            '<img src="../map/assets/img/infobox-close.svg" class="ts-close">' +

            ( ( loadedMarkersData[i]["market_id"] === 1 ) ? '<div class="ts-ribbon">' + loadedMarkersData[i]["ribbon"] + '</div>' : "" ) +
            ( ( loadedMarkersData[i]["ribbon_corner"] !== undefined ) ? '<div class="ts-ribbon-corner"><span>' + loadedMarkersData[i]["ribbon_corner"] + '</span></div>' : "" ) +

            '<a href="' + loadedMarkersData[i]["url"] + '" class="ts-infobox__wrapper ts-black-gradient">' +
            ( ( loadedMarkersData[i]["badge"] !== undefined && loadedMarkersData[i]["badge"].length > 0 ) ? '<div class="badge badge-dark">' + loadedMarkersData[i]["badge"] + '</div>' : "" ) +
            '<div class="ts-infobox__content">' +
            '<figure class="ts-item__info">' +
            ( ( loadedMarkersData[i]["sektor"] !== undefined) ? '<div class="ts-item__info-badge">' + loadedMarkersData[i]["sektor"] + '</div>' : "" ) +
            ( ( loadedMarkersData[i]["title"] !== undefined && loadedMarkersData[i]["title"].length > 0 ) ? '<h4>' + loadedMarkersData[i]["title"] + '</h4>' : "" ) +
            ( ( loadedMarkersData[i]["luas_lahan"] !== undefined && loadedMarkersData[i]["luas_lahan"].length > 0 ) ? '<aside><i class="fa fa-map-marker mr-2"></i>' + loadedMarkersData[i]["luas_lahan"] + '</aside>' : "" ) +
            '</figure>' +
            additionalInfoHTML({display: displayAdditionalInfo, i: i}) +
            '</div>' +
            '<div class="ts-infobox_image" style="background-image: url(' + "../storage/" + loadedMarkersData[i]["fotos"][0] + ')"></div>' +
            '</a>' +
            '</div>' +
            '</div>';
    }

    //==================================================================================================================
    // Create Additional Info HTML element
    //==================================================================================================================

    function additionalInfoHTML(parameters) {
        var i = parameters["i"];
        var displayParameter;
        //console.log(parameters["display"]);
        var additionalInfoHtml = "";
        for (var a = 0; a < parameters["display"].length; a++) {
            displayParameter = parameters["display"][a];
            if (loadedMarkersData[i][displayParameter[0]] !== undefined) {
                additionalInfoHtml +=
                    '<dl>' +
                    '<dt>' + displayParameter[1] + '</dt>' +
                    '<dd>' + loadedMarkersData[i][displayParameter[0]] + ((displayParameter[a] === "area") ? unit : "") + '</dd>' +
                    '</dl>';
            }
        }
        if (additionalInfoHtml) {
            return '<div class="ts-description-lists">' + additionalInfoHtml + '</div>';
        }
        else {
            return "";
        }
    }

    //==================================================================================================================
    // Create SideBar HTML Results
    //==================================================================================================================
    function createSideBarResult()  {

        //var visibleMarkersId = [];
        var visibleMarkersOnMap = [];
        var resultsHtml = [];

        for (var i = 0; i < loadedMarkersData.length; i++) {
            //visibleMarkersOnMap.push( newMarkers[i] );

            if (map.getBounds().contains(newMarkers[i].getLatLng())) {
                visibleMarkersOnMap.push(newMarkers[i]);
                //newMarkers[i].addTo(map);
            }
            else {
                //newMarkers[i].setVisible(false);
                //newMarkers[i].remove();
            }

        }

        //markerCluster.refreshClusters();

        for (i = 0; i < visibleMarkersOnMap.length; i++) {
            var id = visibleMarkersOnMap[i].loopNumber;
            var additionalInfoHtml = "";

            if (loadedMarkersData[id]["additional_info"]) {
                for (var a = 0; a < loadedMarkersData[id]["additional_info"].length; a++) {
                    additionalInfoHtml +=
                        '<dl>' +
                        '<dt>' + loadedMarkersData[id]["additional_info"][a]["title"] + '</dt>' +
                        '<dd>' + loadedMarkersData[id]["additional_info"][a]["value"] + '</dd>' +
                        '</dl>';
                }
            }

            resultsHtml.push(
                '<div class="ts-result-link" data-ts-id="' + loadedMarkersData[id]["id"] + '" data-ts-ln="' + newMarkers[id].loopNumber + '">' +
                '<span class="ts-center-marker"><img src="map/assets/img/marker-active.svg"></span>' +
                '<a href="' + loadedMarkersData[id]["url"] + '" class="card ts-item ts-card ts-result">' +
                ( ( loadedMarkersData[i]["market_id"] === 1 ) ? '<div class="ts-ribbon">' + loadedMarkersData[i]["ribbon"] + '</div>' : "" ) +
                ( ( loadedMarkersData[i]["ribbon_corner"] !== undefined ) ? '<div class="ts-ribbon-corner"><span>' + loadedMarkersData[i]["ribbon_corner"] + '</span></div>' : "" ) +
                '<div href="detail-01.html" class="card-img ts-item__image" style="background-image: url(' + loadedMarkersData[id]["marker_image"] + ')"></div>' +
                '<div class="card-body">' +
                '<div class="ts-item__info-badge">' + loadedMarkersData[id]["sektor"] + '</div>' +
                '<figure class="ts-item__info">' +
                '<h4>' + loadedMarkersData[id]["title"] + '</h4>' +
                '<aside>' +
                '<i class="fa fa-map-marker mr-2"></i>' + loadedMarkersData[id]["luas_lahan"] + '</aside>' +
                '</figure>' +
                additionalInfoHTML({display: displayAdditionalInfo, i: i}) +
                '</div>' +
                '<div class="card-footer">' +
                '<span class="ts-btn-arrow">Detail</span>' +
                '</div>' +
                '</a>' +
                '</div>'
            );
        }


        $(".ts-results-wrapper").html(resultsHtml);

        var $results = $("#ts-results").find(".ts-sly-frame");
        if ($results.hasClass("ts-loaded")) {
            $results.sly("reload");
        }
        else {
            initializeSly();
        }

        var resultsBar = $(".scroll-wrapper.ts-results__vertical-list, .scroll-wrapper.ts-results__grid");
        if ($(window).width() < 575) {
            resultsBar.find(".ts-results__vertical").css("pointer-events", "none");
            resultsBar.on("click", function () {
                $(this).addClass("ts-expanded");
                $(this).find(".ts-results__vertical").css("pointer-events", "auto");
                $("#ts-map-hero").addClass("ts-dim-map");
            });

            $("#ts-map-hero").on("click", function(){
                if (resultsBar.hasClass("ts-expanded")) {
                    resultsBar.removeClass("ts-expanded");
                    $("#ts-map-hero").removeClass("ts-dim-map");
                    resultsBar.find(".ts-results__vertical").css("pointer-events", "none");
                }
            });
        }
        else {
            resultsBar.removeClass("ts-expanded");
            resultsBar.find(".ts-results__vertical").css("pointer-events", "auto");
            $("#ts-map-hero").removeClass("ts-dim-map");
        }

    }

    // Center map on result click (Disabled)
    //==============================================================================================================

    $(document).on("click", ".ts-center-marker", function () {
        $(".ts-marker").parent().removeClass("ts-active-marker");
        map.setView( newMarkers[ $(this).parent().attr("data-ts-ln") ].getLatLng() );
        var id = $(this).parent().attr("data-ts-id");
        $(".ts-marker[data-ts-id='" + id + "']").parent().addClass("ts-active-marker");
    });

    // Highlight marker on result hover
    //==============================================================================================================

    var timer;
    $(document).on({
        mouseenter: function () {
            var id = $(this).parent().attr("data-ts-id");
            timer = setTimeout(function(){
                $(".ts-marker").parent().addClass("ts-marker-hide");
                $(".ts-marker[data-ts-id='" + id + "']").parent().addClass("ts-active-marker");
            }, 500);
        },
        mouseleave: function () {
            clearTimeout(timer);
            $(".ts-marker").parent().removeClass("ts-active-marker").removeClass("ts-marker-hide");
        }
    }, ".ts-result");

    function formatPrice(price) {
        return Number(price).toLocaleString(locale, {style: 'currency', currency: currency}).replace(/\D\d\d$/, '');
    }


    var simpleMapId = "ts-map-simple";
    if( $("#"+simpleMapId).length ){

        mapElement = $(document.getElementById(simpleMapId));
        mapDefaultZoom = parseInt(mapElement.attr("data-ts-map-zoom"), 10);
        centerLatitude = mapElement.attr("data-ts-map-center-latitude");
        centerLongitude = mapElement.attr("data-ts-map-center-longitude");
        controls = parseInt(mapElement.attr("data-ts-map-controls"), 10);
        scrollWheel = parseInt(mapElement.attr("data-ts-map-scroll-wheel"), 10);
        leafletMapProvider = mapElement.attr("data-ts-map-leaflet-provider");
        var markerDrag = parseInt( mapElement.attr("data-ts-map-marker-drag"), 10 );


        if (!mapDefaultZoom) {
            mapDefaultZoom = 14;
        }

        map = L.map(simpleMapId, {
            zoomControl: false,
            scrollWheelZoom: scrollWheel
        });
        map.setView([centerLatitude, centerLongitude], mapDefaultZoom);

        L.tileLayer(leafletMapProvider, {
            attribution: leafletAttribution,
            id: mapBoxId,
            accessToken: mapBoxAccessToken
        }).addTo(map);

        ( controls === 1 ) ? L.control.zoom({position: "topright"}).addTo(map) : "";

        var icon = L.icon({
            iconUrl: "assets/img/marker-small.png",
            iconSize: [22, 29],
            iconAnchor: [11, 29]
        });

        var marker = L.marker([centerLatitude, centerLongitude],{
            icon: icon,
            draggable: markerDrag
        }).addTo(map);

    }



});
