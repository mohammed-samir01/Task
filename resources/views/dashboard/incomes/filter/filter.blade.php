<div class="card-body">
    <form action="{{ route('incomes.index') }}" method="get">
        <div class="row">
            <div class="col-2">
                <div class="form-group">
                    <label for="name">Notes</label>
                    <input type="text" name="keyword" value="{{ old('keyword', request()->input('keyword')) }}" class="form-control" placeholder="Search here">
                </div>
            </div>
            <div class="col-2">
                <div class="form-group">
                    <label for="name">Date From</label>
                    <input type="date" name="date_from" value="{{ old('date_from', request()->input('date_from')) }}" class="form-control" placeholder="Search here">
                </div>
            </div>
            <div class="col-2">
                <div class="form-group">
                    <label for="name">Date To</label>
                    <input type="date" name="date_to" value="{{ old('date_to', request()->input('date_to')) }}" class="form-control" placeholder="Search here">
                </div>
            </div>
            <div class="col-2">
                <div class="form-group">
                    <label for="name">Category</label>
                    <select name="category_id" class="form-control">
                        <option value="">Select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-1">
                <div class="form-group">
                    <label for="name">Limit By</label>
                    <select name="limit_by" class="form-control">
                        <option value="">---</option>
                        <option value="10" {{ old('limit_by', request()->input('limit_by')) == '10' ? 'selected' : '' }}>10</option>
                        <option value="20" {{ old('limit_by', request()->input('limit_by')) == '20' ? 'selected' : '' }}>20</option>
                        <option value="50" {{ old('limit_by', request()->input('limit_by')) == '50' ? 'selected' : '' }}>50</option>
                        <option value="100" {{ old('limit_by', request()->input('limit_by')) == '100' ? 'selected' : '' }}>100</option>
                    </select>
                </div>
            </div>
            <div class="col-1">
                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary" style="margin-top: 30px;">Filter</button>
                </div>
            </div>
        </div>
    </form>
</div>
