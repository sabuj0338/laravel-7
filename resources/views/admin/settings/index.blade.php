@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">

    <div class="row gutters-sm">
        <div class="col-md-4 d-none d-md-block">
            <div class="card">
                <div class="card-body">
                    <nav class="nav flex-column nav-pills nav-gap-y-1">
                        <a href="#currencyUnits" data-toggle="tab" class="nav-item nav-link has-icon nav-link-faded active">
                            <i class="fa fa-cog" aria-hidden="true"></i> Currency & Units
                        </a>
                        <a href="#account" data-toggle="tab" class="nav-item nav-link has-icon nav-link-faded">
                            <i class="fa fa-cog" aria-hidden="true"></i> Account Settings
                        </a>
                        <a href="#notification" data-toggle="tab" class="nav-item nav-link has-icon nav-link-faded">
                            <i class="fa fa-bell" aria-hidden="true"></i> Notification
                        </a>
                    </nav>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body tab-content">
                    <div class="tab-pane active" id="currencyUnits">
                        <h6>CURRENCY & UNITS SETTINGS</h6>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="{{ route('admin.settings.currency') }}" method="POST">
                                            @csrf

                                            <div class="form-row justify-content-between">
                                                <div class="form-group">
                                                    <label for="currency">Currency</label>
                                                    <input class="form-control rounded-pill @error('currency') is-invalid @enderror" type="text" onkeyup="this.value = this.value.toLowerCase();" name="currency" id="currency" value="{{ old('currency') }}" placeholder="BDT" required>
                                                    @error('currency')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="symbol">Symbol</label>
                                                    <input class="form-control rounded-pill @error('symbol') is-invalid @enderror" type="text" onkeyup="this.value = this.value.toLowerCase();" name="symbol" value="{{ old('symbol') }}" placeholder="৳" required>
                                                    @error('symbol')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <button class="btn btn-primary waves btn-block rounded-pill" type="submit">ADD</button>
                                        </form>
                                    </div>
                                </div>
                                <br>
                                <table class="responsive-table table-sm border centered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Currency</th>
                                            <th>Symbol</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($currency as $key => $item)

                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td class="text-uppercase">{{ $item->currency }}</td>
                                            <td class="text-uppercase">{{ $item->symbol }}</td>
                                            <td>
                                                @if ($item->status)
                                                <i class="fa fa-check-circle text-success" aria-hidden="true"></i>
                                                @else
                                                <i class="fa fa-check-circle-o" aria-hidden="true"></i>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <a class="btn btn-sm btn-danger" href="{{ route('admin.settings.currency.destroy',['_id'=>$item->_id]) }}"><i class="fa fa-trash"></i></a>
                                                    <a class="btn btn-sm btn-primary" href="{{ route('admin.settings.currency.active',['_id'=>$item->_id]) }}"><i class="fa fa-check" aria-hidden="true"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                        @empty

                                        <tr>
                                            <td colspan="5">Empty</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="{{ route('admin.settings.units') }}" method="POST">
                                            @csrf

                                            <div class="form-group">
                                                <label for="unit">Unit</label>
                                                <input class="form-control rounded-pill @error('unit') is-invalid @enderror" type="text" onkeyup="this.value = this.value.toLowerCase();" name="unit" id="unit" value="{{ old('unit') }}" placeholder="KG" required>
                                                @error('unit')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <button class="btn btn-primary waves btn-block rounded-pill" type="submit">ADD</button>
                                        </form>
                                    </div>
                                </div>
                                <br>
                                <table class="responsive-table table-sm border centered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($units as $key => $item)

                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td class="text-uppercase">{{ $item->unit }}</td>
                                            <td>
                                                @if ($item->status)
                                                <i class="fa fa-check-circle text-success" aria-hidden="true"></i>
                                                @else
                                                <i class="fa fa-check-circle-o" aria-hidden="true"></i>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <a class="btn btn-sm btn-danger" href="{{ route('admin.settings.units.destroy',['_id'=>$item->_id]) }}"><i class="fa fa-trash"></i></a>
                                                    <a class="btn btn-sm btn-primary" href="{{ route('admin.settings.units.active',['_id'=>$item->_id]) }}"><i class="fa fa-check" aria-hidden="true"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                        @empty

                                        <tr>
                                            <td colspan="5">Empty</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="account">
                        <h6>ACCOUNT SETTINGS</h6>
                        <hr>
                        <form action="#" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="interested">Interested Area</label>
                                <input type="text" data-role="tagsinput" class="form-control" id="interested" name="interested" value="{{ old('interested') }}" placeholder="Enter your interested products" required>
                                <span class="form-text text-muted">Enter your interested product areas like rice, mango, etc</span>
                            </div>
                            <button class="btn btn-primary waves rounded-pill" type="submit">Update</button>
                        </form>
                        <hr>
                        {{-- <form>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username"
                                    aria-describedby="usernameHelp" placeholder="Enter your username"
                                    value="kennethvaldez">
                                <small id="usernameHelp" class="form-text text-muted">After changing your username,
                                    your old username becomes available for anyone else to claim.</small>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label class="d-block text-danger">Delete Account</label>
                                <p class="text-muted font-size-sm">Once you delete your account, there is no going
                                    back. Please be certain.</p>
                            </div>
                            <button class="btn btn-danger" type="button">Delete Account</button>
                        </form> --}}
                    </div>
                    <div class="tab-pane" id="notification">
                        <h6>NOTIFICATION SETTINGS</h6>
                        <hr>
                        <form>
                            <div class="form-group">
                                <label class="d-block mb-0">Security Alerts</label>
                                <div class="small text-muted mb-3">Receive security alert notifications via email
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1"
                                        checked="">
                                    <label class="custom-control-label" for="customCheck1">Email each time a
                                        vulnerability is found</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck2"
                                        checked="">
                                    <label class="custom-control-label" for="customCheck2">Email a digest summary of
                                        vulnerability</label>
                                </div>
                            </div>
                            <div class="form-group mb-0">
                                <label class="d-block">SMS Notifications</label>
                                <ul class="list-group list-group-sm">
                                    <li class="list-group-item has-icon">
                                        Comments
                                        <div class="custom-control custom-control-nolabel custom-switch ml-auto">
                                            <input type="checkbox" class="custom-control-input" id="customSwitch1"
                                                checked="">
                                            <label class="custom-control-label" for="customSwitch1"></label>
                                        </div>
                                    </li>
                                    <li class="list-group-item has-icon">
                                        Updates From People
                                        <div class="custom-control custom-control-nolabel custom-switch ml-auto">
                                            <input type="checkbox" class="custom-control-input" id="customSwitch2">
                                            <label class="custom-control-label" for="customSwitch2"></label>
                                        </div>
                                    </li>
                                    <li class="list-group-item has-icon">
                                        Reminders
                                        <div class="custom-control custom-control-nolabel custom-switch ml-auto">
                                            <input type="checkbox" class="custom-control-input" id="customSwitch3"
                                                checked="">
                                            <label class="custom-control-label" for="customSwitch3"></label>
                                        </div>
                                    </li>
                                    <li class="list-group-item has-icon">
                                        Events
                                        <div class="custom-control custom-control-nolabel custom-switch ml-auto">
                                            <input type="checkbox" class="custom-control-input" id="customSwitch4"
                                                checked="">
                                            <label class="custom-control-label" for="customSwitch4"></label>
                                        </div>
                                    </li>
                                    <li class="list-group-item has-icon">
                                        Pages You Follow
                                        <div class="custom-control custom-control-nolabel custom-switch ml-auto">
                                            <input type="checkbox" class="custom-control-input" id="customSwitch5">
                                            <label class="custom-control-label" for="customSwitch5"></label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
