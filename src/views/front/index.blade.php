@extends('front.layouts.master')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('/stores/css/storelocator.css') }}" /> 
<div class="container">
    <div class="bh-sl-container">
        <div class="row clearfix">
            <div class="col-sm-3 col-xs-12">




                <fieldset class="bordgre">
                    <legend>
                        <p class="catcol bh-sl-title custom_font_rudy textocentrado">STORE LOCATOR</p>
                    </legend>
                    <div class="row">
                        <form role="form" class="col-centered" id="bh-sl-user-location" method="post" action="#">
                            <div class="col-sm-12 col-xs-12 nopadding">
                                <div class="form-input" id="midir">
                                    <input type="text" id="bh-sl-address" name="bh-sl-address" class="form-control" placeholder="Introduce la dirección o CP" />
                                    <button id="bh-sl-submit" type="submit" class="nobut"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                            <p class="bordbut">
                                <button id="miposi" class="nobut"><i class="icon-location-arrow"></i> Look for most near shops</button>
                            </p>
                    </div>
                    <div class="row">
                        <button id="miboton" type="button" value="Refrescar" class="nobut bh-sl-reset" />
                        <p>RESET ALL</p>
                        </button>
                        <br>
                    </div>
                    <div class="row">
                        <button type="text" id="display" class="nobut">
                            <p>LIST<span class="caret"></span></p>
                        </button>
                        <button type="text" id="hide" class="nobut hide">
                            <p>MAP<span class="caret"></span></p>
                        </button>
                    </div>
                    <div class="row">
                        <p class="bordbut">
                            <button type="button" class="nobut" />FILTER</button>
                        </p>
                    </div>
                    <div class="row">
                                <?php foreach ($stores as $store){
                                    $zones[] = $store->country->zone;
                                }
                                $zones = array_unique($zones);
                                ;?>
                        <p class="bordbut">
                            <button data-toggle="collapse" data-target="#zone_id" class="nobut">ZONE<span class="caret"></span></button>
                        </p>
                        <div id="zone_id" class="collapse bh-sl-filters-container">
                            <ul id="zone-filter" class="bh-sl-filters">
                                <li>
                                    <input type="radio" name="zone_id" value="" id="noradio">Todos/Reset
                                </li>
                                @foreach ($zones as $zone)                                
                                <li>
                                    <input type="radio" name="zone_id" value="{{$zone['id']}}" id="noradio" /> {{$zone['name']}} 
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                               <?php foreach ($stores as $store){
                                    $countries[] = $store->country;
                                }
                                $countries = array_unique($countries);
                                ;?>
                        <p class="bordbut">
                            <button data-toggle="collapse" data-target="#country_id" class="nobut">COUNTRY <span class="caret"></span></button>
                        </p>
                        <div id="country_id" class="collapse bh-sl-filters-container">
                            <ul id="country-filter" class="bh-sl-filters">
                                <li>
                                    <input type="radio" name="country_id" value="" id="noradio"> Todos/Reset
                                </li>
                                @foreach ($countries as $country)                                

                                <li>
                                    <input type="radio" name="country_id" value="{{$country['id']}}" id="noradio" /> {{$country['name']}} 
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    </form>
            </div>
            </fieldset>
            <div class="col-sm-9">
                <div id="bh-sl-map-container" class="bh-sl-map-container" options="device.map1.options">
                    <div id="bh-sl-map" class="bh-sl-map"></div>
                    <div id="verti" class="bh-sl-loc-list none">
                        <ul class="list"></ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="bh-sl-loc-list">
                    <ul class="list"></ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('footer')
<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.0.10/handlebars.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/js-marker-clusterer/1.0.0/markerclusterer.js"></script>
<script>
    var api_key = {!! json_encode(config('storelocator.API_KEY') ) !!};
    document.write("<script src='https://maps.google.com/maps/api/js?key="+ api_key + "'><\/script>");
</script>
<!-- <script src='https://maps.google.com/maps/api/js?key='"+ api_key +'" ></script>
 -->
 <script src="{{asset('/stores/js/storelocator.js') }}"></script>
<script src="{{asset('/stores/js/buttons.js') }}"></script>
<script>
$(document).ready(function() {
    $('#bh-sl-map-container').storeLocator({
        'fullMapStart': true,
        'slideMap': false,
        'fullMapStartListLimit': false,
        'storeLimit': 500,
        'markerImg': 'storesfiles/img/marcador.png',
        'markerDim': { height: 42, width: 35 },
        'taxonomyFilters': {
            'country_id': 'country-filter',
            'zone_id': 'zone-filter',
            // 'category': 'category-filter',
            /*'postal': 'postal-filter'*/
        },
        'inlineDirections': true,
        'geocodeID': 'miposi',


        'markerCluster': {
            imagePath: 'storesfiles/img/m',
            minimumClusterSize: 2,
            gridSize: 100,
            maxZoom: null,
            averageCenter: true,
        },

        'mapSettings': {
            scrollwheel: false,
            minZoom: 2,
            zoom: 12,
            mapTypeControl: false,
            streetViewControl: false,
            styles: [{
                featureType: 'all',
                stylers: [
                    { hue: '#00ffee' },
                    { saturation: -50 },
                    { lightness: -10 }
                ]
            }, {
                featureType: 'water',
                stylers: [
                    { hue: '#00ffee' },
                    { saturation: 10 },
                    { lightness: -20 }
                ]
            }, {
                featureType: 'road.arterial',
                elementType: 'geometry',
                stylers: [
                    { hue: '#00ffee' },
                    { saturation: 50 }
                ]
            }, {
                featureType: 'poi.business',
                elementType: 'labels',
                stylers: [
                    { visibility: 'off' }
                ]
            }],
            mapTypeId: google.maps.MapTypeId.ROADMAP
        },

    });
});
</script>
@endsection