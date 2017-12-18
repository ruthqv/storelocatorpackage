
@extends('layouts.app')
@section('content')
@include('storelocator::admin.snippets.errors')

@include('storelocator::admin.snippets.flash')

 <form method="POST" action="{{ route('admin.countries.update', $country['id']) }}" accept-charset="UTF-8" enctype="multipart/form-data" role="form">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="control-label required">Country Name:</label>

                    <input type="text" id="name" class="form-control namefortrans" name="name" value="{{ old('name', $country['name']) }}" maxlength="255" required />

                    @include('storelocator::admin.snippets.errors_first', ['param' => 'name'])
                </div>
                <div class="form-group{{ $errors->has('iso') ? ' has-error' : '' }}">
                    <label for="iso" class="control-label required">Country iso:</label>

                    <input type="text" id="iso" class="form-control namefortrans" name="iso" value="{{ old('iso', $country['iso']) }}" maxlength="255" required />
                    <p class="help-block">You can find the iso codes to use country detection  <a href="http://www.geonames.org/countries/">here</a>.</p>

                    @include('storelocator::admin.snippets.errors_first', ['param' => 'iso'])
                </div>


                @if(env('LANGS'))
                  @include('logistic::admin.langs.show')            
                @endif


                <div class="form-group{{ $errors->has('zone_id') ? ' has-error' : '' }}">
                    <label for="zone-id" class="control-label required">Zone:</label>

                    <select id="zone-id" class="form-control" name="zone_id" required>
                        <option value="">Select one</option>

                        @foreach($zones as $zone)


                            <option value="{{ $zone['id'] }}"{{ old('zone_id', $country['zone_id']) == $zone['id'] ? ' selected' : '' }}> {{ $zone['name'] }}</option>
                      
                        @endforeach
                    </select>

                    @include('storelocator::admin.snippets.errors_first', ['param' => 'zone_id'])
                </div>

                <div class="form-group">
                    <label for="active" class="control-label">Activo:</label>

                    <input type="checkbox" id="active" name="active" value="1"{{ old('active', $country['active']) ? ' checked' : '' }} />

                    <p class="help-block">Check this to mark this country as a "active" country.
                        ribbon on its thumbnail image.</p>

                    @include('storelocator::admin.snippets.errors_first', ['param' => 'active'])
                </div>



                <div class="form-group">
                    <button type="submit" class="btn btn-success" title="Update this country"><i class="fa fa-save"></i> Save</button>

                    <a href="{{ route('admin.countries.index') }}" class="btn" title="Click here to cancel">Cancel</a>
                </div>



            </form>

    @endsection