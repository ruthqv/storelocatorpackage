@extends('admin.index')
@section('previous')
<a type="submit" href="{{ route('admin.home') }}" class="btn btn-sm btn-primary" target="_blank" title="GO BACK"><i class="fa fa-angle-left"></i> GO BACK</a>
@endsection
@section('maincontent')
<div class="row">
    
    <a href="{{route('admin.generatedata')}}" title="generatedata" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i>Update datas for map </a>
</div>
    <div class="row">

        <div class="col-md-12">

            <h1>Stores</h1>
            <table class="table table-striped">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Region</th>
                    <th>Country</th>
                    <th>Zone</th>
                    <th>Lat</th>
                    <th>Long</th>
                    <th>Active</th>
                    <th>Edit</th>
                    <th>Remove</th>
                </tr>


                @foreach($stores as $store)
                    <tr>
                        <td>{{$store['id'] }}</td>
                        <td>{{$store['name'] }}</td>
                        <td>{{$store->region['name'] }}</td>

                        <td>{{$store->country['name'] }}</td>

                        <td>{{$store->country->zone['name'] }}</td>
                        <td>{{$store['latitude'] }}</td>
                        <td>{{$store['longitude'] }}</td>
                        <td>{{$store['active'] }}</td>

                        <td><a href="{{route('admin.stores.show', $store['id'])}}" title="Edit this attribute" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i> Edit</a></td>
                        <td>
                            <form method="POST" action="{{route('admin.stores.destroy', $store['id'])}}" accept-charset="UTF-8" role="form" onsubmit="return confirm('Do you really want to remove?');">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <button type="submit" class="btn btn-sm btn-danger" title="Remove this attribute"><i class="fa fa-times"></i> Remove</button>
                            </form>
                        </td>
                   </tr>
                @endforeach
            </table>
            <a href="{{route('admin.stores.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Add new @yield('name') </a><br /><br />
        </div>

    </div>


@endsection


