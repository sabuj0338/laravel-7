@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row p-0 m-0">
        <div class="{{ $product->type == 'live_auction'? 'col-md-8': 'col-md-12' }} p-1">
            <div class="card border-0 rounded-">
                <div class="row p-0 m-0">
                    <div class="col-md-5 p-0">
                        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                              <li data-target="#carouselExampleCaptions" data-slide-to="0" class="bg-danger active"></li>
                              <li data-target="#carouselExampleCaptions" data-slide-to="1" class="bg-danger"></li>
                              <li data-target="#carouselExampleCaptions" data-slide-to="2" class="bg-danger"></li>
                            </ol>
                            <div class="carousel-inner">
                              <div class="carousel-item active">
                                  <a href="{{ url('/thanos.jpg') }}" target="blank">
                                <img src="{{ asset($product->photos['one_thumb']) }}" class="d-block w-100" alt="..."></a>
                                <div class="carousel-caption d-none d-md-block">
                                  <h5>First slide label</h5>
                                  <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                                </div>
                              </div>
                              <div class="carousel-item">
                                <img src="{{ asset($product->photos['two_thumb']) }}" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                  <h5>Second slide label</h5>
                                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                </div>
                              </div>
                              <div class="carousel-item">
                                <img src="{{ asset($product->photos['three_thumb']) }}" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                  <h5>Third slide label</h5>
                                  <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                                </div>
                              </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                              {{-- <span class="carousel-control-prev-icon" aria-hidden="true"></span> --}}
                              <i class="fa fa-arrow-circle-left fa-2x text-danger" aria-hidden="true"></i>
                              <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                                {{-- <span class="carousel-control-next-icon" aria-hidden="true"></span> --}}
                                <i class="fa fa-arrow-circle-right fa-2x text-danger" aria-hidden="true"></i>
                              <span class="sr-only">Next</span>
                            </a>
                          </div>
                        {{-- <div class="">
                            <img class="img-fluid"
                                src="{{ asset($product->photos['one_thumb']) }}"
                                alt="">
                        </div> --}}
                        {{-- <div class="row">
                            <div class="col-md-4">
                                <div class="">
                                    <img class="img-fluid"
                                        src="https://cdn.ambientedirect.com/chameleon/mediapool/thumbs/3/0a/Moooi_Rabbit-Lamp-Tischleuchte_2000x2000-ID753590-f6733544e125a417e3792ad56bbe533b.jpg"
                                        alt="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="">
                                    <img class="img-fluid"
                                        src="https://cdn.ambientedirect.com/chameleon/mediapool/thumbs/3/0a/Moooi_Rabbit-Lamp-Tischleuchte_2000x2000-ID753590-f6733544e125a417e3792ad56bbe533b.jpg"
                                        alt="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="">
                                    <img class="img-fluid"
                                        src="https://cdn.ambientedirect.com/chameleon/mediapool/thumbs/3/0a/Moooi_Rabbit-Lamp-Tischleuchte_2000x2000-ID753590-f6733544e125a417e3792ad56bbe533b.jpg"
                                        alt="">
                                </div>
                            </div>
                        </div> --}}
                    </div>
                    <div class="col-md-7 border-left border-dark p-3" style="border-width: 5px !important;">
                        <h5>{{ $product->title }}</h5>
                        <p class="text-muted">{{ $product->description }}</p>
                        <ul class="list-group">
                            <li class="list-group-item">Fixed Price: {{ $product->unit_price ?? $product->min_bid_price }} / <span class="badge badge-info badge-pill">{{ $product->unit }}</span></li>
                            <li class="list-group-item">Stock Available: {{ $product->stock }} <span class="badge badge-info badge-pill">{{ $product->unit }}</span></li>
                            <li class="list-group-item">Start Date: {{ $product->started_at->diffForHumans() }}</li>
                            <li class="list-group-item">Expire Date: {{ $product->expired_at->diffForHumans() }}</li>
                        </ul>
                    </div>
                </div>
            </div>
            @forelse ($comments as $item)
                <ul class="list-group my-2">
                    <li class="list-group-item border-0">
                        <div class="d-flex w-100 justify-content-between mb-1">
                            <div class="">
                                {{-- <img class="rounded-circle img-fluid" src="https://cdn.ambientedirect.com/chameleon/mediapool/thumbs/3/0a/Moooi_Rabbit-Lamp-Tischleuchte_2000x2000-ID753590-f6733544e125a417e3792ad56bbe533b.jpg" width="30" alt="">
                                <span class="mx-2 h5 text-uppercase">{{ $item->user->name ?? 'User Not Found' }}</span> --}}
                                <span class="h6 text-uppercase">{{ $item->updated_at->diffForHumans() ?? 'Not Found' }}</span>
                            </div>
                            {{-- <small>{{ $item->updated_at->diffForHumans() }}</small> --}}
                        </div>
                        <p class="mb-1">{{ $item->message }}</p>
                    </li>
                </ul>
            @empty
                <ul class="list-group my-2">
                    <li class="list-group-item text-center border-0">Empty!</li>
                </ul>
            @endforelse
        </div>
        @if ($product->type == 'live_auction')
        <div class="col-md-4 p-1">
            @forelse ($auctions as $item)
            <div class="list-group mb-2">
                <a href="#" class="list-group-item list-group-item-action red lighten-5 border-0">
                    <div class="d-flex w-100 justify-content-between mb-1">
                        <div class="">
                            <img class="rounded-circle img-fluid" src="https://cdn.ambientedirect.com/chameleon/mediapool/thumbs/3/0a/Moooi_Rabbit-Lamp-Tischleuchte_2000x2000-ID753590-f6733544e125a417e3792ad56bbe533b.jpg" width="30" alt="">
                            <span class="mx-2 h5 text-uppercase">{{ $item->user->name ?? 'User Not Found' }}</span>
                        </div>
                        <strong class="text-danger">{{ $item->amount }}-tk</strong>
                    </div>
                    <p class="mb-1">{{ $item->message }}</p>
                    <small>{{ $item->updated_at->diffForHumans() }}</small>
                </a>
            </div>
            @empty
            <ul class="list-group mb-2">
                <li class="list-group-item red lighten-5 border-0 text-center">Empty!</li>
            </ul>
            @endforelse
        </div>
        @endif
    </div>
</div>
<!--container.//-->
@endsection
