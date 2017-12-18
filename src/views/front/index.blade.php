 @extends('layouts.app') @section('content') 
<link rel="stylesheet" type="text/css" href="{{asset('/stores/css/storelocator.css') }}" /> 
<div class="container">
    <div class="bh-sl-container">
        <div class="row clearfix">
            <div class="col-sm-3 col-xs-12">
                <fieldset class="bordgre">
                    <legend>
                        <p class="catcol bh-sl-title custom_font_rudy textocentrado">{{ __('Store_locator') }}</p>
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
                                <button id="miposi" class="nobut"><i class="icon-location-arrow"></i> Buscar tiendas cercanas a mi ubicación actual</button>
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
                        <p class="bordbut">
                            <button data-toggle="collapse" data-target="#conti" class="nobut">CONTINENT<span class="caret"></span></button>
                        </p>
                        <div id="conti" class="collapse bh-sl-filters-container">
                            <ul id="continente-filter" class="bh-sl-filters">
                                <li>
                                    <input type="radio" name="continente" value="" id="noradio"> Todos/Reset
                                </li>
                                @foreach ($stores as $store)
                                <li>
                                    <input type="radio" name="continente" value="{{$store->country->zone['id']}} " id="noradio"> {{$store->country->zone['name']}} </input>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <p class="bordbut">
                            <button data-toggle="collapse" data-target="#pais" class="nobut">COUNTRY<span class="caret"></span></button>
                        </p>
                        <div id="pais" class="collapse bh-sl-filters-container">
                            <ul id="pais-filter" class="bh-sl-filters">
                                <li>
                                    <input type="radio" name="pais" value="" id="noradio"> Todos/Reset
                                </li>
                                @foreach ($stores as $store)
                                <li>
                                    <input type="radio" name="pais" value=" {{$store->country['id']}} " id="noradio"> {{$store->country['name']}} </input>
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
@endsection @section('footer')
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.0.10/handlebars.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/js-marker-clusterer/1.0.0/markerclusterer.js"></script>
<script src="https://maps.google.com/maps/api/js?key=AIzaSyDSEhEkJcS2UnkuScbq3w_YX9kRh6usf-A"></script>
<script src="{{asset('/stores/js/storelocator.js') }}"></script>
<script src="{{asset('/stores/js//buttons.js') }}"></script>
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
            'category': 'category-filter',
            'pais': 'pais-filter',
            'continente': 'continente-filter',
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