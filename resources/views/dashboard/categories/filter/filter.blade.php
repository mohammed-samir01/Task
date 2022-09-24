<div class="card-body">
    <form action="{{ route('categories.index') }}" method="get">
        <div class="row">
            <div class="col-2">
                <div class="form-group">
                    <input type="text" name="keyword" value="{{ old('keyword', request()->input('keyword')) }}" class="form-control" placeholder="Search here">
                </div>
            </div>
            <div class="col-1">
                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary">Filter</button>
                </div>
            </div>
        </div>
    </form>
</div>
