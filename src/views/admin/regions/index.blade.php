
@extends('layouts.app')
@section('content')
@include('storelocator::admin.snippets.errors')

@include('storelocator::admin.snippets.flash')

    <div class="row">

        <div class="col-md-12">

            <h1>Stores</h1>
            <table class="table table-striped">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Country</th>
                    <th>Zone</th>

                    <th>Active</th>
                    <th>Edit</th>
                    <th>Remove</th>
                </tr>


                @foreach($regions as $region)
                    <tr>
                        <td>{{$region['id'] }}</td>
                        <td>{{$region['name'] }}</td>
                        <td>{{$region->country['name'] }}</td>
                        <td>{{$region->country->zone['name'] }}</td>
                        <td>{{$region['active'] }}</td>

                        <td><a href="{{route('admin.regions.show', $region['id'])}}" title="Edit this attribute" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i> Edit</a></td>
                        <td>
                            <form method="POST" action="{{route('admin.regions.destroy', $region['id'])}}" accept-charset="UTF-8" role="form" onsubmit="return confirm('Do you really want to remove?');">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <button type="submit" class="btn btn-sm btn-danger" title="Remove this attribute"><i class="fa fa-times"></i> Remove</button>
                            </form>
                        </td>
                   </tr>
                @endforeach
            </table>
            <a href="{{route('admin.regions.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Add new @yield('name') </a><br /><br />
        </div>

    </div>


@endsection