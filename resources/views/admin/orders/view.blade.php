@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">
    <article class="card mb-4">
		<header class="card-header">
			<a href="#" class="float-right"> <i class="fa fa-print"></i> Print</a>
			<strong class="d-inline-block mr-3">Order ID: {{ $order->_id }}</strong>
            <span class=" mr-3">Order Date: <strong>{{ date('d-M-Y', strtotime($order->created_at)) }}</strong></span>
            @if ($order->status == 'pending')
			    <span class=" mr-3">Status: <span class="badge badge-warning badge-pill">{{ $order->status }}</span></span>
            @elseif ($order->status == 'delivered')
			    <span class=" mr-3">Status: <span class="badge badge-success badge-pill">{{ $order->status }}</span></span>
            @endif
            @if ($order->payments['status'] == 'pending')
			    <span class=" mr-3">Payment Status: <span class="badge badge-warning badge-pill">{{ $order->payments['status'] }}</span></span>
            @elseif ($order->payments['status'] == 'paid')
			    <span class=" mr-3">Payment Status: <span class="badge badge-success badge-pill">{{ $order->payments['status'] }}</span></span>

            @endif
		</header>
		<div class="card-body">
			<div class="row">
				<div class="col-md-8">
					<h6 class="text-muted">Delivery to</h6>
                    <h5>{{ $order->name ?? 'Not Found' }}</h5>
                    <p>Phone: {{ $order->phone ?? 'Not Found' }} <br>
                        Email: {{ $order->email ?? 'Not Found' }} <br>
                        Location: {{ $order->address['location'] }},{{ $order->address['city'] }},{{ $order->address['country'] }}, <br>
                        Post Office: {{ $order->address['zip'] }}</p>
				</div>
				<div class="col-md-4">
					<h6 class="text-muted">Payment</h6>
					<span class="text-success">
						<i class="fab fa-lg fa-cc-visa"></i>
					    Visa  **** 4216
					</span>
					<p>Subtotal: $356 <br>
					 Shipping fee:  $56 <br>
					 <span class="b">Total:  $456 </span>
					</p>
				</div>
			</div> <!-- row.// -->
		</div> <!-- card-body .// -->
		<div class="">
		<table class="responsive-table table-hover">
			<tbody>
                <tr>
                    <td width="65">
                        <img class="img-fluid border" src="https://cdn.ambientedirect.com/chameleon/mediapool/thumbs/3/0a/Moooi_Rabbit-Lamp-Tischleuchte_2000x2000-ID753590-f6733544e125a417e3792ad56bbe533b.jpg" alt="product photo">
                    </td>
                    <td>
                        <p class="title mb-0">{{ $product->title }}</p>
                        <var class="price text-muted">BDT {{ $order->total_price }}</var>
                    </td>
                    <td> Seller <br> <strong>{{ $product->user->name ?? "Not Found" }}</strong> </td>
                    <td width="250"> <a href="#" class="btn btn-outline-primary">Track order</a>
                        <div class="dropdown d-inline-block">
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle btn btn-outline-secondary">More</a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="#" class="dropdown-item">Return</a>
                                <a href="#" class="dropdown-item">Cancel order</a>
                            </div>
                        </div> <!-- dropdown.// -->
                    </td>
                </tr>
            </tbody>
        </table>
		</div> <!-- table-responsive .end// -->
		</article>
</div>
<!--container.//-->
@endsection
