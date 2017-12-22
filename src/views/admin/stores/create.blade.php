@extends('admin.index')
@section('previous')
<a type="submit" href="{{ route('admin.home') }}" class="btn btn-sm btn-primary" target="_blank" title="GO BACK"><i class="fa fa-angle-left"></i> GO BACK</a>
@endsection
@section('maincontent')
 <form method="POST" action="{{ route('admin.stores.store') }}" accept-charset="UTF-8" enctype="multipart/form-data" role="form">
                {{ csrf_field() }}

                <div class="row">
                    <div class="col-sm-12 col-md-6">


                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="control-label required">Store Name:</label>

                            <input type="text" id="name" class="form-control namefortrans" name="name" value="{{ old('name') }}" maxlength="255" required />

                            @include('storelocator::admin.snippets.errors_first', ['param' => 'name'])
                        </div>
                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="control-label required">Store description:</label>

                            <input type="text" id="description" class="form-control descriptionfortrans" name="description" value="{{ old('description') }}" maxlength="255" required />

                            @include('storelocator::admin.snippets.errors_first', ['param' => 'description'])
                        </div>


                       <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="phone" class="control-label required">Store phone:</label>

                            <input type="text" id="phone" class="form-control " name="phone" value="{{ old('phone') }}" maxlength="255" required />

                            @include('storelocator::admin.snippets.errors_first', ['param' => 'phone'])
                        </div>


                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="control-label required">Store address:</label>

                            <input type="text" id="address" class="form-control " name="address" value="{{ old('address') }}" maxlength="255" required />

                            @include('storelocator::admin.snippets.errors_first', ['param' => 'address'])
                        </div>
                        <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                            <label for="city" class="control-label required">Store city:</label>

                            <input type="text" id="city" class="form-control " name="city" value="{{ old('city') }}" maxlength="255" required />

                            @include('storelocator::admin.snippets.errors_first', ['param' => 'city'])
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="control-label required">Store email:</label>

                            <input type="text" id="email" class="form-control " name="email" value="{{ old('email') }}" maxlength="255" required />

                            @include('storelocator::admin.snippets.errors_first', ['param' => 'email'])
                        </div>


                        <div class="form-group{{ $errors->has('latitude') ? ' has-error' : '' }}">
                            <label for="latitude" class="control-label required">Store latitude:</label>

                            <input type="text" id="latitude" class="form-control " name="latitude" value="{{ old('latitude') }}" maxlength="255" required />

                            @include('storelocator::admin.snippets.errors_first', ['param' => 'latitude'])
                        </div>


                         <div class="form-group{{ $errors->has('longitude') ? ' has-error' : '' }}">
                            <label for="longitude" class="control-label required">Store longitude:</label>

                            <input type="text" id="longitude" class="form-control" name="longitude" value="{{ old('longitude') }}" maxlength="255" required />

                            @include('storelocator::admin.snippets.errors_first', ['param' => 'longitude'])
                        </div>



                   <div class="form-group{{ $errors->has('zone_id') ? ' has-error' : '' }}">
                    <label for="zone-id" class="control-label required">Zone:</label>

                    <select id="zone-id" class="form-control" name="zone_id" required>
                        <option value="">Select one</option>

                        @foreach($zones as $zone)


                            <option value="{{ $zone['id'] }}"> {{ $zone['name'] }}</option>
                      
                        @endforeach
                    </select>

                    @include('storelocator::admin.snippets.errors_first', ['param' => 'zone_id'])
                </div>


                   <div class="form-group{{ $errors->has('country_id') ? ' has-error' : '' }}">
                    <label for="country-id" class="control-label required">Country:</label>

                    <select id="country-id" class="form-control" name="country_id" required>
                        <option value="">Select one</option>

                        @foreach($countries as $country)


                            <option value="{{ $country['id'] }}"> {{ $country['name'] }}</option>
                      
                        @endforeach
                    </select>

                    @include('storelocator::admin.snippets.errors_first', ['param' => 'zone_id'])
                </div>

                   <div class="form-group{{ $errors->has('region_id') ? ' has-error' : '' }}">
                    <label for="region-id" class="control-label required">Region:</label>

                    <select id="region-id" class="form-control" name="region_id">
                        <option value="">Select one</option>

                        @foreach($regions as $region)


                            <option value="{{ $region['id'] }}"> {{ $region['name'] }}</option>
                      
                        @endforeach
                    </select>

                    @include('storelocator::admin.snippets.errors_first', ['param' => 'zone_id'])
                </div>

                <div class="form-group">
                    <label for="active" class="control-label">Activo:</label>

                    <input type="checkbox" id="active" name="active" value="1"/>

                    <p class="help-block">Check this to mark this country as a "active" country.
                       </p>

                    @include('storelocator::admin.snippets.errors_first', ['param' => 'active'])
                </div>








                        <div class="form-group">
                            <button type="submit" class="btn btn-success" title="Create this new country"><i class="fa fa-save"></i> Submit</button>

                            <a href="{{ route('admin.stores.index') }}" title="Click here to cancel">Cancel</a>
                        </div>

                    </div>
                </div>

            </form>

    @endsection