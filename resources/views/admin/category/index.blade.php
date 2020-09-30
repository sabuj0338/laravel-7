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
                            <th>Name</th>
                            <th>Photo</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $key => $item)

                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td class="text-capitalize">{{ $item->name }}</td>
                            <td>{{ $item->photo }}</td>
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-sm btn-danger waves" href="{{ route('admin.category.destroy',['_id' => $item->_id]) }}"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                </div>
                            </td>
                        </tr>

                        @empty
                        <tr>
                            <td class="text-center" colspan="4">Empty</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="pt-3">
            {{ $categories->links() }}
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.category.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                      <label for="name">Category Name</label>
                      <input type="text" name="name" onkeyup="this.value = this.value.toLowerCase();" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="name" aria-describedby="helpId" required>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      <small id="helpId" class="text-muted">Category name must be unique</small>
                    </div>

                    <div class="form-group">
                      <label for="photo">Category Photo</label>
                      <input type="file" name="photo" id="photo" class="form-control @error('photo') is-invalid @enderror" placeholder="photo" aria-describedby="helpId">
                        @error('photo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      <small id="helpId" class="text-muted">Category name must be unique</small>
                    </div>

                    <div class="text-center">
                        <button class="btn btn-primary waves rounded-pill btn-block" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
