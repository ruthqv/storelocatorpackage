
@extends('layouts.app')
@section('content')
@include('storelocator::admin.snippets.errors')

@include('storelocator::admin.snippets.flash')

 <form method="POST" action="{{ route('admin.regions.store') }}" accept-charset="UTF-8" enctype="multipart/form-data" role="form">
                {{ csrf_field() }}

                <div class="row">
                    <div class="col-sm-12 col-md-6">


                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="control-label required">Region Name:</label>

                            <input type="text" id="name" class="form-control namefortrans" name="name" value="{{ old('name') }}" maxlength="255" required />

                            @include('storelocator::admin.snippets.errors_first', ['param' => 'name'])
                        </div>



       
                        @if(env('LANGS'))
                          @include('logistic::admin.langs.create')            
                        @endif


                   <div class="form-group{{ $errors->has('country_id') ? ' has-error' : '' }}">
                    <label for="country-id" class="control-label required">Country:</label>

                    <select id="country-id" class="form-control" name="country_id" required>
                        <option value="">Select one</option>

                        @foreach($countries as $country)


                            <option value="{{ $country['id'] }}"> {{ $country['name'] }}</option>
                      
                        @endforeach
                    </select>

                    @include('storelocator::admin.snippets.errors_first', ['param' => 'country_id'])
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

                            <a href="{{ route('admin.regions.index') }}" title="Click here to cancel">Cancel</a>
                        </div>

                    </div>
                </div>

            </form>

    @endsection