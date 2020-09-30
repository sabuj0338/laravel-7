@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid mt-3">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <table class="responsive-table table-sm table-striped centered table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Type</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Measure By</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $key => $item)

                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->slug }}</td>
                            <td>{{ $item->type }}</td>
                            <td>{{ $item->unit_price ?? $item->min_bid_price }}</td>
                            <td>{{ $item->stock }}</td>
                            <td>{{ $item->unit }}</td>
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-sm btn-primary" href="{{ route('admin.products.show',['_id'=> $item->_id]) }}"><i class="fa fa-eye"></i></a>
                                    {{-- <a class="btn btn-sm btn-warning" href="{{ route('farmer.products.edit',['_id'=> $item->_id]) }}"><i class="fa fa-edit"></i></a> --}}
                                    {{-- <form id="{{ "delete_product_".$item->_id }}" action="{{ route('farmer.products.delete',['_id'=> $item->_id]) }}" method="POST">
                                        <button class="btn btn-sm btn-danger" type="submit" formaction="{{ route('farmer.products.delete',['_id'=> $item->_id]) }}"><i class="fa fa-trash"></i></button>
                                    @csrf</form> --}}
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8">Empty</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="card-footer pt-3">
                {{ $products->links() }}
            </div>
        </div>
    </div>
@endsection
