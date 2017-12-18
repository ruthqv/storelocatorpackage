
@extends('layouts.app')
@section('content')
@include('storelocator::admin.snippets.errors')

@include('storelocator::admin.snippets.flash')

 <form method="POST" action="{{ route('admin.regions.update', $region['id']) }}" accept-charset="UTF-8" enctype="multipart/form-data" role="form">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="control-label required">Region Name:</label>

                    <input type="text" id="name" class="form-control namefortrans" name="name" value="{{ old('name', $region['name']) }}" maxlength="255" required />

                    @include('storelocator::admin.snippets.errors_first', ['param' => 'name'])
                </div>



                <div class="form-group{{ $errors->has('zone_id') ? ' has-error' : '' }}">
                    <label for="zone-id" class="control-label required">Country:</label>

                    <select id="zone-id" class="form-control" name="country_id" required>
                        <option value="">Select one</option>

                        @foreach($countries as $country)


                            <option value="{{ $country['id'] }}"{{ old('country_id', $region['country_id']) == $country['id'] ? ' selected' : '' }}> {{ $country['name'] }}</option>
                      
                        @endforeach
                    </select>

                    @include('storelocator::admin.snippets.errors_first', ['param' => 'zone_id'])
                </div>

                <div class="form-group">
                    <label for="active" class="control-label">Activo:</label>

                    <input type="checkbox" id="active" name="active" value="1"{{ old('active', $region['active']) ? ' checked' : '' }} />

                    <p class="help-block">Check this to mark this region as a "active" region.
                        ribbon on its thumbnail image.</p>

                    @include('storelocator::admin.snippets.errors_first', ['param' => 'active'])
                </div>



                <div class="form-group">
                    <button type="submit" class="btn btn-success" title="Update this region"><i class="fa fa-save"></i> Save</button>

                    <a href="{{ route('admin.regions.index') }}" class="btn" title="Click here to cancel">Cancel</a>
                </div>



            </form>

    @endsection