<!DOCTYPE html>
<!-- saved from url=(0061)http://leaflet.github.io/Leaflet.draw/docs/examples/full.html -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Leaflet.draw vector editing handlers</title>

    <script src="{{asset('map/Leaflet.draw vector editing handlers_files/leaflet-src.js')}}"></script>
    <link rel="stylesheet" href="{{asset('map/Leaflet.draw vector editing handlers_files/leaflet.css')}}">

    <script src="{{asset('map/Leaflet.draw vector editing handlers_files/Leaflet.draw.js')}}"></script>
    <script src="{{asset('map/Leaflet.draw vector editing handlers_files/Leaflet.Draw.Event.js')}}"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ==" crossorigin="" />
    <link rel="stylesheet" href="{{asset('map/Leaflet.draw vector editing handlers_files/leaflet.draw.css')}}">

    <script src="http://leaflet.github.io/Leaflet.draw/src/Toolbar.js"></script>
    <script src="http://leaflet.github.io/Leaflet.draw/src/Tooltip.js"></script>

    <script src="{{asset('map/Leaflet.draw vector editing handlers_files/GeometryUtil.js')}}"></script>
    <script src="http://leaflet.github.io/Leaflet.draw/src/ext/LatLngUtil.js"></script>
    <script src="{{asset('map/Leaflet.draw vector editing handlers_files/LineUtil.Intersect.js')}}"></script>
    <script src="{{asset('map/Leaflet.draw vector editing handlers_files/Polygon.Intersect.js')}}"></script>
    <script src="{{asset('map/Leaflet.draw vector editing handlers_files/Polyline.Intersect.js')}}"></script>
    <script src="{{asset('map/Leaflet.draw vector editing handlers_files/TouchEvents.js')}}"></script>

    <script src="{{asset('map/Leaflet.draw vector editing handlers_files/DrawToolbar.js')}}"></script>
    <script src="{{asset('map/Leaflet.draw vector editing handlers_files/Draw.Feature.js')}}"></script>
    <script src="{{asset('map/Leaflet.draw vector editing handlers_files/Draw.SimpleShape.js')}}"></script>
    <script src="{{asset('map/Leaflet.draw vector editing handlers_files/Draw.Polyline.js')}}"></script>
    <script src="{{asset('map/Leaflet.draw vector editing handlers_files/Draw.Marker.js')}}"></script>
    <script src="{{asset('map/Leaflet.draw vector editing handlers_files/Draw.Circle.js')}}"></script>
    <script src="{{asset('map/Leaflet.draw vector editing handlers_files/Draw.CircleMarker.js')}}"></script>
    <script src="{{asset('map/Leaflet.draw vector editing handlers_files/Draw.Polygon.js')}}"></script>
    <script src="{{asset('map/Leaflet.draw vector editing handlers_files/Draw.Rectangle.js')}}"></script>


    <script src="{{asset('map/Leaflet.draw vector editing handlers_files/EditToolbar.js')}}"></script>
    <script src="{{asset('map/Leaflet.draw vector editing handlers_files/EditToolbar.Edit.js')}}"></script>
    <script src="{{asset('map/Leaflet.draw vector editing handlers_files/EditToolbar.Delete.js')}}"></script>

    <script src="{{asset('map/Leaflet.draw vector editing handlers_files/Control.Draw.js')}}"></script>

    <script src="{{asset('map/Leaflet.draw vector editing handlers_files/Edit.Poly.js')}}"></script>
    <script src="{{asset('map/Leaflet.draw vector editing handlers_files/Edit.SimpleShape.js')}}"></script>
    <script src="{{asset('map/Leaflet.draw vector editing handlers_files/Edit.Rectangle.js')}}"></script>
    <script src="{{asset('map/Leaflet.draw vector editing handlers_files/Edit.Marker.js')}}"></script>
    <script src="{{asset('map/Leaflet.draw vector editing handlers_files/Edit.CircleMarker.js')}}"></script>
    <script src="{{asset('map/Leaflet.draw vector editing handlers_files/Edit.Circle.js')}}"></script>
</head>
<body class="">
<div id="map" style="width: 800px; height: 600px; border: 1px solid rgb(204, 204, 204); position: relative;" class="leaflet-container leaflet-touch leaflet-fade-anim leaflet-touch-zoom leaflet-grab leaflet-touch-drag" tabindex="0">
    <div class="leaflet-pane leaflet-map-pane" style="transform: translate3d(939.203px, -408.41px, 0px);">
        <div class="leaflet-pane leaflet-tile-pane">
            <div class="leaflet-layer " style="z-index: 1; opacity: 1;">
                <div class="leaflet-tile-container leaflet-zoom-animated" style="z-index: 17; transform: translate3d(-540px, 529px, 0px) scale(0.5);">

                </div>
                <div class="leaflet-tile-container leaflet-zoom-animated" style="z-index: 18; transform: translate3d(-389px, 322px, 0px) scale(1);">
                    <img alt="" role="presentation" src="{{asset('map/Leaflet.draw vector editing handlers_files/10.png')}}" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(-301px, 248px, 0px); opacity: 1;">
                    <img alt="" role="presentation" src="{{asset('map/Leaflet.draw vector editing handlers_files/9.png')}}" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(-301px, -8px, 0px); opacity: 1;">
                    <img alt="" role="presentation" src="{{asset('map/Leaflet.draw vector editing handlers_files/10(1).png')}}" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(-557px, 248px, 0px); opacity: 1;">
                    <img alt="" role="presentation" src="{{asset('map/Leaflet.draw vector editing handlers_files/10(2).png')}}" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(-45px, 248px, 0px); opacity: 1;">
                    <img alt="" role="presentation" src="{{asset('map/Leaflet.draw vector editing handlers_files/11.png')}}" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(-301px, 504px, 0px); opacity: 1;">
                    <img alt="" role="presentation" src="{{asset('map/Leaflet.draw vector editing handlers_files/9(1).png')}}" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(-557px, -8px, 0px); opacity: 1;">
                    <img alt="" role="presentation" src="{{asset('map/Leaflet.draw vector editing handlers_files/9(2).png')}}" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(-45px, -8px, 0px); opacity: 1;">
                    <img alt="" role="presentation" src="{{asset('map/Leaflet.draw vector editing handlers_files/11(1).png')}}" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(-557px, 504px, 0px); opacity: 1;">
                    <img alt="" role="presentation" src="{{asset('map/Leaflet.draw vector editing handlers_files/11(2).png')}}" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(-45px, 504px, 0px); opacity: 1;">
                    <img alt="" role="presentation" src="{{asset('map/Leaflet.draw vector editing handlers_files/10(3).png')}}" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(211px, 248px, 0px); opacity: 1;">
                    <img alt="" role="presentation" src="{{asset('map/Leaflet.draw vector editing handlers_files/9(3).png')}}" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(211px, -8px, 0px); opacity: 1;">
                    <img alt="" role="presentation" src="{{asset('map/Leaflet.draw vector editing handlers_files/11(3).png')}}" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(211px, 504px, 0px); opacity: 1;">
                </div>
            </div>
        </div>
        <div class="leaflet-pane leaflet-shadow-pane">
            <img src="http://leaflet.github.io/Leaflet.draw/docs/examples/libs/images/marker-shadow.png" class="leaflet-marker-shadow leaflet-zoom-animated" alt="" style="margin-left: -12px; margin-top: -41px; width: 41px; height: 41px; transform: translate3d(-689px, 735px, 0px);">
            <img src="http://leaflet.github.io/Leaflet.draw/docs/examples/libs/images/marker-shadow.png" class="leaflet-marker-shadow leaflet-zoom-animated" alt="" style="margin-left: -12px; margin-top: -41px; width: 41px; height: 41px; transform: translate3d(-737px, 701px, 0px);">
            <img src="http://leaflet.github.io/Leaflet.draw/docs/examples/libs/images/marker-shadow.png" class="leaflet-marker-shadow leaflet-zoom-animated" alt="" style="margin-left: -12px; margin-top: -41px; width: 41px; height: 41px; transform: translate3d(-589px, 735px, 0px);">
        </div>
        <div class="leaflet-pane leaflet-overlay-pane">
            <svg pointer-events="none" class="leaflet-zoom-animated" width="960" height="720" viewBox="-1019 348 960 720" style="transform: translate3d(-1019px, 348px, 0px);">
                <g>
                    <path class="leaflet-interactive" stroke="#3388ff" stroke-opacity="0.5" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" fill="#3388ff" fill-opacity="0.2" fill-rule="evenodd" d="M-691 734L-691 734z"></path>
                    <path class="leaflet-interactive" stroke="#3388ff" stroke-opacity="0.5" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" fill="none" d="M-691 734L-691 734"></path>
                    <path class="leaflet-interactive" stroke="#3388ff" stroke-opacity="0.5" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" fill="none" d="M-689 735L-689 735"></path>
                    <path class="leaflet-interactive" stroke="#3388ff" stroke-opacity="0.5" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" fill="#3388ff" fill-opacity="0.2" fill-rule="evenodd" d="M-689 735L-689 735z"></path>
                    <path class="leaflet-interactive" stroke="#3388ff" stroke-opacity="0.5" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" fill="none" d="M-689 735L-689 735"></path>
                    <path class="leaflet-interactive" stroke="#3388ff" stroke-opacity="0.5" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" fill="#3388ff" fill-opacity="0.2" fill-rule="evenodd" d="M-699,735a10,10 0 1,0 20,0 a10,10 0 1,0 -20,0 "></path>
                    <path class="leaflet-interactive" stroke="#3388ff" stroke-opacity="0.5" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" fill="#3388ff" fill-opacity="0.2" fill-rule="evenodd" d="M-689.8888688087463,734.7022690250942a1,1 0 1,0 2,0 a1,1 0 1,0 -2,0 "></path>
                    <path class="leaflet-interactive" stroke="#3388ff" stroke-opacity="0.5" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" fill="#3388ff" fill-opacity="0.2" fill-rule="evenodd" d="M-689 735L-689 735z"></path>
                    <path class="leaflet-interactive" stroke="#3388ff" stroke-opacity="0.5" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" fill="#3388ff" fill-opacity="0.2" fill-rule="evenodd" d="M-689 735L-689 735z"></path>
                    <path class="leaflet-interactive" stroke="#3388ff" stroke-opacity="0.5" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" fill="#3388ff" fill-opacity="0.2" fill-rule="evenodd" d="M-689 735L-689 735z"></path>
                    <path class="leaflet-interactive" stroke="#3388ff" stroke-opacity="0.5" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" fill="#3388ff" fill-opacity="0.2" fill-rule="evenodd" d="M-780 569L-761 569L-760 682L-815 681L-815 675L-788 668z"></path>
                    <path class="leaflet-interactive" stroke="#3388ff" stroke-opacity="0.5" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" fill="#3388ff" fill-opacity="0.2" fill-rule="evenodd" d="M-751 570L-749 673L-695 673L-702 654L-729 658L-731 620L-710 620L-712 602L-734 602L-733 583L-708 581L-708 562z"></path>
                    <path class="leaflet-interactive" stroke="#3388ff" stroke-opacity="0.5" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" fill="#3388ff" fill-opacity="0.2" fill-rule="evenodd" d="M-685 560L-682 680L-655 681L-659 628L-631 653L-613 652L-602 634L-592 681L-558 676L-569 553L-598 554L-625 608L-658 557z"></path>
                    <path class="leaflet-interactive" stroke="#3388ff" stroke-opacity="0.5" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" fill="#3388ff" fill-opacity="0.2" fill-rule="evenodd" d="M-812 718L-814 810L-774 806L-774 786L-789 770L-774 749L-775 717z"></path>
                </g>
            </svg>
            <div class="leaflet-draw-guides">

            </div>
            <div class="leaflet-draw-guides">

            </div>
        </div>
        <div class="leaflet-pane leaflet-marker-pane">
            <img src="http://leaflet.github.io/Leaflet.draw/docs/examples/libs/images/marker-icon.png" class="leaflet-marker-icon leaflet-zoom-animated leaflet-interactive" alt="" tabindex="0" style="margin-left: -12px; margin-top: -41px; width: 25px; height: 41px; transform: translate3d(-689px, 735px, 0px); z-index: 735;">
            <img src="http://leaflet.github.io/Leaflet.draw/docs/examples/libs/images/marker-icon.png" class="leaflet-marker-icon leaflet-zoom-animated leaflet-interactive" alt="" tabindex="0" style="margin-left: -12px; margin-top: -41px; width: 25px; height: 41px; transform: translate3d(-737px, 701px, 0px); z-index: 701;">
            <img src="http://leaflet.github.io/Leaflet.draw/docs/examples/libs/images/marker-icon.png" class="leaflet-marker-icon leaflet-zoom-animated leaflet-interactive" alt="" tabindex="0" style="margin-left: -12px; margin-top: -41px; width: 25px; height: 41px; transform: translate3d(-589px, 735px, 0px); z-index: 735;">
        </div>
        <div class="leaflet-pane leaflet-tooltip-pane"></div>
        <div class="leaflet-pane leaflet-popup-pane"></div>
        <div class="leaflet-proxy leaflet-zoom-animated" style="transform: translate3d(4246.8px, 2698.41px, 0px) scale(16);"></div>
    </div>
    <div class="leaflet-control-container">
        <div class="leaflet-top leaflet-left">
            <div class="leaflet-control-zoom leaflet-bar leaflet-control">
                <a class="leaflet-control-zoom-in" href="http://leaflet.github.io/Leaflet.draw/docs/examples/full.html#" title="Zoom in" role="button" aria-label="Zoom in">+</a>
                <a class="leaflet-control-zoom-out" href="http://leaflet.github.io/Leaflet.draw/docs/examples/full.html#" title="Zoom out" role="button" aria-label="Zoom out">−</a>
            </div>
            <div class="leaflet-control-layers leaflet-control-layers-expanded leaflet-control" aria-haspopup="true">
                <a class="leaflet-control-layers-toggle" href="http://leaflet.github.io/Leaflet.draw/docs/examples/full.html#" title="Layers"></a>
                <form class="leaflet-control-layers-list">
                    <div class="leaflet-control-layers-base">
                        <label>
                            <div>
                                <input type="radio" class="leaflet-control-layers-selector" name="leaflet-base-layers" checked="checked">
                                <span> osm</span>
                            </div>
                        </label>
                        <label>
                            <div>
                                <input type="radio" class="leaflet-control-layers-selector" name="leaflet-base-layers">
                                <span> google</span>
                            </div>
                        </label>
                    </div>
                    <div class="leaflet-control-layers-separator"></div>
                    <div class="leaflet-control-layers-overlays">
                        <label>
                            <div><input type="checkbox" class="leaflet-control-layers-selector" checked=""><span> drawlayer</span>
                            </div>
                        </label></div>
                </form>
            </div>
            <div class="leaflet-draw leaflet-control">
                <div class="leaflet-draw-section">
                    <div class="leaflet-draw-toolbar leaflet-bar leaflet-draw-toolbar-top"><a
                            class="leaflet-draw-draw-polyline"
                            href="http://leaflet.github.io/Leaflet.draw/docs/examples/full.html#"
                            title="Draw a polyline"><span class="sr-only">Draw a polyline</span></a><a
                            class="leaflet-draw-draw-polygon"
                            href="http://leaflet.github.io/Leaflet.draw/docs/examples/full.html#"
                            title="Draw a polygon"><span class="sr-only">Draw a polygon</span></a><a
                            class="leaflet-draw-draw-rectangle"
                            href="http://leaflet.github.io/Leaflet.draw/docs/examples/full.html#"
                            title="Draw a rectangle"><span class="sr-only">Draw a rectangle</span></a><a
                            class="leaflet-draw-draw-circle"
                            href="http://leaflet.github.io/Leaflet.draw/docs/examples/full.html#" title="Draw a circle"><span
                                class="sr-only">Draw a circle</span></a><a class="leaflet-draw-draw-marker"
                                                                           href="http://leaflet.github.io/Leaflet.draw/docs/examples/full.html#"
                                                                           title="Draw a marker"><span class="sr-only">Draw a marker</span></a><a
                            class="leaflet-draw-draw-circlemarker"
                            href="http://leaflet.github.io/Leaflet.draw/docs/examples/full.html#"
                            title="Draw a circlemarker"><span class="sr-only">Draw a circlemarker</span></a></div>
                    <ul class="leaflet-draw-actions" style="top: 125px; display: none;">
                        <li class=""><a class="" href="http://leaflet.github.io/Leaflet.draw/docs/examples/full.html#"
                                        title="Cancel drawing">Cancel</a></li>
                    </ul>
                </div>
                <div class="leaflet-draw-section">
                    <div class="leaflet-draw-toolbar leaflet-bar"><a class="leaflet-draw-edit-edit"
                                                                     href="http://leaflet.github.io/Leaflet.draw/docs/examples/full.html#"
                                                                     title="Edit layers"><span class="sr-only">Edit layers</span></a><a
                            class="leaflet-draw-edit-remove"
                            href="http://leaflet.github.io/Leaflet.draw/docs/examples/full.html#" title="Delete layers"><span
                                class="sr-only">Delete layers</span></a></div>
                    <ul class="leaflet-draw-actions" style="top: 1px; display: none;">
                        <li class=""><a class="" href="http://leaflet.github.io/Leaflet.draw/docs/examples/full.html#"
                                        title="Save changes">Save</a></li>
                        <li class=""><a class="" href="http://leaflet.github.io/Leaflet.draw/docs/examples/full.html#"
                                        title="Cancel editing, discards all changes">Cancel</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="leaflet-top leaflet-right"></div>
        <div class="leaflet-bottom leaflet-left"></div>
        <div class="leaflet-bottom leaflet-right">
            <div class="leaflet-control-attribution leaflet-control"><a href="http://leafletjs.com/"
                                                                        title="A JS library for interactive maps">Leaflet</a>
                | © <a href="http://openstreetmap.org/copyright">OpenStreetMap</a> contributors
            </div>
        </div>
    </div>
</div>

<script>
    var osmUrl = 'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
        osmAttrib = '&copy; <a href="http://openstreetmap.org/copyright">OpenStreetMap</a> contributors',
        osm = L.tileLayer(osmUrl, { maxZoom: 18, attribution: osmAttrib }),
        map = new L.Map('map', { center: new L.LatLng(-6.970, 109.803), zoom: 8 }),
        drawnItems = L.featureGroup().addTo(map);
    L.control.layers({
        'osm': osm.addTo(map),
        "google": L.tileLayer('http://www.google.cn/maps/vt?lyrs=s@189&gl=cn&x={x}&y={y}&z={z}', {
            attribution: 'google'
        })
    }, { 'drawlayer': drawnItems }, { position: 'topleft', collapsed: false }).addTo(map);
    map.addControl(new L.Control.Draw({
        edit: {
            featureGroup: drawnItems,
            poly: {
                allowIntersection: false
            }
        },
        draw: {
            polygon: {
                allowIntersection: false,
                showArea: true
            }
        }
    }));

    map.on(L.Draw.Event.CREATED, function (event) {
        var layer = event.layer;
        var type = event.layerType;
        var content = '<span><b>Shape Name</b></span><br/><input id="shapeName" type="text"/><br/><br/><span><b>Shape Description<b/></span><br/><textarea id="shapeDesc" cols="25" rows="5"></textarea><br/><br/><input type="button" id="okBtn" value="Save" onclick="saveIdIW()"/>';

        if (type === 'polygon') {
            layer.bindPopup(content);
        }

        drawnItems.addLayer(layer);

    });

</script>


</body>
</html>
