@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="text-right mb-2">
            All Orders
            {{-- <a class="waves btn btn-primary" href="{{ route('farmer.products.create') }}">+ Upload Product</a> --}}
        </div>
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <table class="responsive-table table-sm table-striped centered table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>ProductTitle</th>
                            <th>OrderedBy</th>
                            <th>Quantity</th>
                            <th>Unit Price</th>
                            <th>Total Price</th>
                            <th>Status</th>
                            <th>Payments</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($orders as $key => $item)

                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $item->product->title ?? 'Product Not Found' }}</td>
                            <td>
                                <ul class="list-group">
                                    <li class="list-group-item p-0">Name: <strong>{{ $item->name }}</strong></li>
                                    <li class="list-group-item p-0">Email: <strong>{{ $item->email }}</strong></li>
                                    <li class="list-group-item p-0">Phone: <strong>{{ $item->phone }}</strong></li>
                                    <li class="list-group-item p-0">Address: <strong>{{ $item->address['location'] . ',' . $item->address['city'] . '-' . $item->address['zip'] . ',' . $item->address['country'] }}</strong></li>
                                </ul>
                            </td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ $item->unit_price }}</td>
                            <td>{{ $item->total_price }}</td>
                            <td>
                                @if ($item->status == 'pending')
                                    <span class="badge badge-pill badge-warning">Pending</span>
                                @elseif ($item->status == 'delivered')
                                    <span class="badge badge-pill badge-success">Delivered</span>
                                @endif
                            </td>
                            <td>
                                @if ($item->payments['status'] == 'pending')
                                    <span class="badge badge-pill badge-warning">Pending</span>
                                @elseif ($item->payments['status'] == 'paid')
                                    <span class="badge badge-pill badge-success">Paid</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-sm btn-primary" href="{{ route('admin.orders.show',['_id'=>$item->_id]) }}"><i class="fa fa-eye"></i></a>
                                    {{-- <a class="btn btn-sm btn-warning" href="#"><i class="fa fa-edit"></i></a>
                                    <form id="{{ "delete_product_".$item->_id }}" action="#" method="POST">
                                        <button class="btn btn-sm btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                                    @csrf</form> --}}
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="12">Empty</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
