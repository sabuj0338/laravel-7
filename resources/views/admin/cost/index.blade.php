@extends('admin.layouts.app')

@section('content')
<div class="row m-0">
    <div class="col-md-8">
        <div class="card border-0">
            <div class="card-body p-0">
                <table class="border table-sm table-striped responsive-table centered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Category</th>
                            <th>Unit</th>
                            <th>Cost (tk)</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($costs as $key => $item)

                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td class="text-uppercase">{{ $item->from }}</td>
                            <td class="text-uppercase">{{ $item->to }}</td>
                            <td class="text-uppercase">{{ $item->category }}</td>
                            <td class="text-uppercase">{{ $item->unit }}</td>
                            <td class="text-uppercase">{{ $item->cost }}</td>
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-sm btn-warning waves" href="{{ route('admin.cost.edit',['_id' => $item->_id]) }}"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                    <a class="btn btn-sm btn-danger waves" href="{{ route('admin.cost.destroy',['_id' => $item->_id]) }}"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
            {{ $costs->links() }}
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.cost.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                      <label for="from">From (City Name)</label>
                      <input type="text" onkeyup="this.value = this.value.toLowerCase();" name="from" value="{{ old('from') }}" list="cityname" id="from" class="form-control @error('from') is-invalid @enderror" placeholder="Name" required>
                        @error('from')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      <small id="helpId" class="text-muted">Place Name</small>
                    </div>

                    <div class="form-group">
                      <label for="to">To (City Name)</label>
                      <input type="text" onkeyup="this.value = this.value.toLowerCase();" name="to" value="{{ old('to') }}" list="cityname" id="to" class="form-control @error('to') is-invalid @enderror" placeholder="Name" aria-describedby="helpId" required>
                        @error('to')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      <small id="helpId" class="text-muted">Place Name</small>
                    </div>

                    <div class="form-group">
                      <label for="category">Category</label>
                      <select class="form-control @error('category') is-invalid @enderror" value="{{ old('category') }}" name="category" id="category">
                        <option disabled selected>Choose a Category</option>
                        @foreach ($categories as $item)
                            <option value="{{ $item->name }}">{{ $item->name }}</option>
                        @endforeach
                      </select>
                      @error('category')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                      <label for="unit">Unit</label>
                      <select class="form-control @error('unit') is-invalid @enderror" value="{{ old('unit') }}" name="unit" id="unit">
                        <option disabled selected>Choose a Unit</option>
                        @foreach (App\Setting::where('settings','units')->get() as $item)
                            <option value="{{ $item->unit }}">{{ $item->unit }}</option>
                        @endforeach
                      </select>
                      @error('unit')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                      <label for="cost">Cost Amount (TK)</label>
                      <input type="number" min="0" name="cost" value="{{ old('cost') }}" id="cost" class="form-control @error('cost') is-invalid @enderror" placeholder="Amount" aria-describedby="helpId" required>
                        @error('cost')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      <small id="helpId" class="text-muted">Cost amount</small>
                    </div>

                    <div class="text-center">
                        <button class="btn btn-primary waves rounded-pill btn-block" type="submit">Submit</button>
                    </div>
                    <datalist id="cityname">
                        <option value="Barguna">
                        <option value="Barisal">
                        <option value="Bhola">
                        <option value="Jhalokati">
                        <option value="Patuakhali">
                        <option value="Pirojpur">
                        <option value="Bandarban">
                        <option value="Brahmanbaria">
                        <option value="Chandpur">
                        <option value="Chittagong">
                        <option value="Comilla">
                        <option value="Cox's Bazar">
                        <option value="Feni">
                        <option value="Khagrachhari">
                        <option value="Lakshmipur">
                        <option value="Noakhali">
                        <option value="Rangamati">
                        <option value="Dhaka">
                        <option value="Faridpur">
                        <option value="Gazipur">
                        <option value="Gopalganj">
                        <option value="Kishoreganj">
                        <option value="Madaripur">
                        <option value="Manikganj">
                        <option value="Munshiganj">
                        <option value="Narayanganj">
                        <option value="Narsingdi">
                        <option value="Rajbari">
                        <option value="Shariatpur">
                        <option value="Tangail">
                        <option value="Bagerhat">
                        <option value="Chuadanga">
                        <option value="Jessore">
                        <option value="Jhenaidah">
                        <option value="Khulna">
                        <option value="Kushtia">
                        <option value="Magura">
                        <option value="Meherpur">
                        <option value="Narail">
                        <option value="Satkhira">
                        <option value="Jamalpur">
                        <option value="Mymensingh">
                        <option value="Netrokona">
                        <option value="Sherpur">
                        <option value="Bogra">
                        <option value="Joypurhat">
                        <option value="Naogaon">
                        <option value="Natore">
                        <option value="Chapainawabganj">
                        <option value="Pabna">
                        <option value="Rajshahi">
                        <option value="Sirajganj">
                        <option value="Dinajpur">
                        <option value="Gaibandha">
                        <option value="Kurigram">
                        <option value="Lalmonirhat">
                        <option value="Nilphamari">
                        <option value="Panchagarh">
                        <option value="Rangpur">
                        <option value="Thakurgaon">
                        <option value="Habiganj">
                        <option value="Moulvibazar">
                        <option value="Sunamganj">
                        <option value="Sylhet">
                      </datalist>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
