<section>
    <div class="jumbotron rounded-0 blue-grey darken-1 bg-secondary">
        <!-- <div class="container">top</div> -->
        <form action="{{ route('products.search') }}" method="GET">
            {{-- @csrf --}}
            <div class="container">
                <div class="input-group input-group-lg">
                    <input type="text" class="form-control" id="query" name="query" placeholder="Search...">
                    <div class="input-group-append">
                    <button class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </div>
                </div>
            </div>
            <div class="container mt-4">
                <div class="input-group input-group-sm">
                    <div class="input-group-prepend">
                        <label class="input-group-text blue-grey darken-1 border-dark">Filter: </label>
                    </div>
                    <select class="form-control blue-grey darken-1 border-dark" name="" id="filter">
                        <option value="">Choose an item</option>
                    </select>
                    <select class="form-control blue-grey darken-1 border-dark" name="" id="filter">
                        <option value="">Choose an item</option>
                    </select>
                    <select class="form-control blue-grey darken-1 border-dark" name="" id="filter">
                        <option value="">Choose an item</option>
                    </select>
                    <select class="form-control blue-grey darken-1 border-dark" name="" id="filter">
                        <option value="">Choose an item</option>
                    </select>
                </div>
            </div>
        </form>
    </div>
</section>
