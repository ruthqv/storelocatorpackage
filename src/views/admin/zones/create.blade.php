
@extends('layouts.app')
@section('content')
@include('storelocator::admin.snippets.errors')

@include('storelocator::admin.snippets.flash')


    <div class="row">

        <div class="col-md-12">

            <h2>Create new Zone</h2>

            
            

            <form method="POST" action="{{ route('admin.zones.store') }}" accept-charset="UTF-8" enctype="multipart/form-data" role="form">
                {{ csrf_field() }}

                <div class="row">
                    <div class="col-sm-12 col-md-6">


                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="control-label required">Zone Name:</label>

                            <input type="text" id="name" class="form-control namefortrans" name="name" value="{{ old('name') }}" maxlength="255" required />

                            @include('storelocator::admin.snippets.errors_first', ['param' => 'name'])
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

                            <a href="{{ route('admin.zones.index') }}" title="Click here to cancel">Cancel</a>
                        </div>

                    </div>
                </div>

            </form>

        </div>

    </div>
    @endsection
