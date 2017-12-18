
@extends('layouts.app')
@section('content')
@include('storelocator::admin.snippets.errors')

@include('storelocator::admin.snippets.flash')




    <div class="row">

        <div class="col-md-5">

            <h2>Details</h2>

            
            

            <form method="POST" action="{{ route('admin.zones.update', $zone['id']) }}" accept-charset="UTF-8" enctype="multipart/form-data" role="form">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="control-label required">Country Name:</label>

                    <input type="text" id="name" class="form-control namefortrans" name="name" value="{{ old('name', $zone['name']) }}" maxlength="255" required />

                    @include('storelocator::admin.snippets.errors_first', ['param' => 'name'])
                </div>




                <div class="form-group">
                    <label for="active" class="control-label">Activo:</label>

                    <input type="checkbox" id="active" name="active" value="1"{{ old('active', $zone['active']) ? ' checked' : '' }} />

                    <p class="help-block">Check this to mark this zone as a "active" zone.
                        ribbon on its thumbnail image.</p>

                    @include('storelocator::admin.snippets.errors_first', ['param' => 'active'])
                </div>



                <div class="form-group">
                    <button type="submit" class="btn btn-success" title="Update this zone"><i class="fa fa-save"></i> Save</button>

                    <a href="{{ route('admin.zones.index') }}" class="btn" title="Click here to cancel">Cancel</a>
                </div>



            </form>
        </div>

      
    </div>

    @endsection