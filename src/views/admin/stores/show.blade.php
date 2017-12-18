@extends('admin.index')
@section('previous')
<a type="submit" href="{{ route('admin.stores.index') }}" class="btn btn-sm btn-primary" target="_blank" title="SHOP"><i class="fa fa-angle-left"></i> SHOP</a>
<h2>Details</h2>


    @endsection
@section('maincontent')
 <form method="POST" action="{{ route('admin.stores.update', $store['id']) }}" accept-charset="UTF-8" enctype="multipart/form-data" role="form">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="control-label required">Store Name:</label>

                    <input type="text" id="name" class="form-control namefortrans" name="name" value="{{ old('name', $store['name']) }}" maxlength="255" required />

                    @include('snippets.errors_first', ['param' => 'name'])
                </div>


                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                    <label for="description" class="control-label required">Store description:</label>

                    <input type="text" id="description" class="form-control descriptionfortrans" name="description" value="{{ old('description', $store['description']) }}" maxlength="255" required />

                    @include('snippets.errors_first', ['param' => 'description'])
                </div>



                <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                    <label for="phone" class="control-label required">Store Phone:</label>

                    <input type="text" id="phone" class="form-control " name="phone" value="{{ old('phone', $store['phone']) }}" maxlength="255" required />

                    @include('snippets.errors_first', ['param' => 'phone'])
                </div>


                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="control-label required">Store email:</label>

                    <input type="text" id="email" class="form-control " name="email" value="{{ old('email', $store['email']) }}" maxlength="255" required />

                    @include('snippets.errors_first', ['param' => 'email'])
                </div>


                <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                    <label for="address" class="control-label required">Store Adress:</label>

                    <input type="text" id="address" class="form-control " name="address" value="{{ old('address', $store['address']) }}" maxlength="255" required />

                    @include('snippets.errors_first', ['param' => 'address'])
                </div>
                <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                    <label for="city" class="control-label required">Store City:</label>

                    <input type="text" id="city" class="form-control " name="city" value="{{ old('city', $store['city']) }}" maxlength="255" required />

                    @include('snippets.errors_first', ['param' => 'city'])
                </div>
                <div class="form-group{{ $errors->has('latitude') ? ' has-error' : '' }}">
                    <label for="latitude" class="control-label required">Store Latitude:</label>

                    <input type="text" id="latitude" class="form-control" name="latitude" value="{{ old('latitude', $store['latitude']) }}" maxlength="255" required />

                    @include('snippets.errors_first', ['param' => 'latitude'])
                </div>
                <div class="form-group{{ $errors->has('longitude') ? ' has-error' : '' }}">
                    <label for="longitude" class="control-label required">Store Longitude:</label>

                    <input type="text" id="longitude" class="form-control " name="longitude" value="{{ old('longitude', $store['longitude']) }}" maxlength="255" required />

                    @include('snippets.errors_first', ['param' => 'longitude'])
                </div>

                <div class="form-group{{ $errors->has('zone_id') ? ' has-error' : '' }}">
                    <label for="zone-id" class="control-label required">Zone:</label>

                    <select id="zone-id" class="form-control" name="zone_id" required>
                        <option value="">Select one</option>

                        @foreach($zones as $zone)


                            <option value="{{ $zone['id'] }}"{{ old('zone_id', $store['zone_id']) == $zone['id'] ? ' selected' : '' }}> {{ $zone['name'] }}</option>
                      
                        @endforeach
                    </select>

                    @include('snippets.errors_first', ['param' => 'zone_id'])
                </div>

                <div class="form-group{{ $errors->has('country_id') ? ' has-error' : '' }}">
                    <label for="country-id" class="control-label required">Country:</label>

                    <select id="country-id" class="form-control" name="country_id" required>
                        <option value="">Select one</option>

                        @foreach($countries as $country)


                            <option value="{{ $country['id'] }}"{{ old('country_id', $store['country_id']) == $country['id'] ? ' selected' : '' }}> {{ $country['name'] }}</option>
                      
                        @endforeach
                    </select>

                    @include('snippets.errors_first', ['param' => 'country_id'])
                </div>

                <div class="form-group{{ $errors->has('region_id') ? ' has-error' : '' }}">
                    <label for="region-id" class="control-label required">Country:</label>

                    <select id="region-id" class="form-control" name="region_id" required>
                        <option value="">Select one</option>

                        @foreach($regions as $region)


                            <option value="{{ $region['id'] }}"{{ old('region_id', $store['region_id']) == $region['id'] ? ' selected' : '' }}> {{ $region['name'] }}</option>
                      
                        @endforeach
                    </select>

                    @include('snippets.errors_first', ['param' => 'region_id'])
                </div>
                <div class="form-group">
                    <label for="active" class="control-label">Activo:</label>

                    <input type="checkbox" id="active" name="active" value="1"{{ old('active', $store['active']) ? ' checked' : '' }} />

                    <p class="help-block">Check this to mark this store as a "active" store.
                        ribbon on its thumbnail image.</p>

                    @include('snippets.errors_first', ['param' => 'active'])
                </div>


                <div class="form-group">
                    <button type="submit" class="btn btn-success" title="Update this store"><i class="fa fa-save"></i> Save</button>

                    <a href="{{ route('admin.stores.index') }}" class="btn" title="Click here to cancel">Cancel</a>
                </div>



            </form>


    @endsection