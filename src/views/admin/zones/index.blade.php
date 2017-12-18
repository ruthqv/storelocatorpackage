
@extends('layouts.app')
@section('content')
@include('storelocator::admin.snippets.errors')

@include('storelocator::admin.snippets.flash')


    <div class="row">

        <div class="col-md-12">

            <h1>zones</h1>
            <table class="table table-striped">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Region</th>
                    <th>Country</th>
                    <th>Active</th>
                    <th>Edit</th>
                    <th>Remove</th>
                </tr>


                @foreach($zones as $zone)
                    <tr>
                        <td>{{$zone['id'] }}</td>
                        <td>{{$zone['name'] }}</td>
                        <td>{{$zone->region['name'] }}</td>
                        <td>{{$zone->country['name'] }}</td>
                        <td>{{$zone['active'] }}</td>

                        <td><a href="{{route('admin.zones.show', $zone['id'])}}" title="Edit this attribute" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i> Edit</a></td>
                        <td>
                            <form method="POST" action="{{route('admin.zones.destroy', $zone['id'])}}" accept-charset="UTF-8" role="form" onsubmit="return confirm('Do you really want to remove?');">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <button type="submit" class="btn btn-sm btn-danger" title="Remove this attribute"><i class="fa fa-times"></i> Remove</button>
                            </form>
                        </td>
                   </tr>
                @endforeach
            </table>
            <a href="{{route('admin.zones.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Add new @yield('name') </a><br /><br />
        </div>

    </div>


@endsection