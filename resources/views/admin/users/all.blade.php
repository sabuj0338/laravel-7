@extends('admin.layouts.app')

@section('content')
<div class="jumbotron jumbotron-fluid text-center rounded-0 p-3">
    <h1 class="display-4">All Users</h1>
</div>
<div class="row m-0">
    <div class="col-md-12">
        <div class="card border-0">
            <div class="card-body p-0">
                <table class="border table-sm table-striped responsive-table centered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Type</th>
                            <th>Photo</th>
                            <th>Name</th>
                            <th>E-mail</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $key => $item)

                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $item->type }}</td>
                            <td width="5%"><img class="img-fluid rounded-circle p-2" src="{{ asset($item->photo) }}" alt="photo"></td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>{{ $item->address['location'] ?? '' }}, {{ $item->address['zip'] ?? '' }}, {{ $item->address['city']  ?? '' }}, {{ $item->address['country']  ?? '' }}</td>
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-sm btn-primary waves" href="#"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    <a class="btn btn-sm btn-danger waves" href="#"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                </div>
                            </td>
                        </tr>

                        @empty
                        <tr>
                            <td class="text-center" colspan="7">Empty</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="pt-3">
            {{ $users->links() }}
        </div>
    </div>
</div>

@endsection
