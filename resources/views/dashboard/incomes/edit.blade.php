@extends('dashboard.layouts.admin')
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-primary">Edit category {{ $income->name }}</h6>
            <div class="ml-auto">
                <a href="{{ route('incomes.index') }}" class="btn btn-primary">
                    <span class="icon text-white-50">
                        <i class="fa fa-home"></i>
                    </span>
                    <span class="text">Incomes</span>
                </a>
            </div>
        </div>
        <div class="card-body">

            <form action="{{ route('incomes.update', $income->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="name">Notes</label>
                            <input type="text" name="notes" value="{{ old('name', $income->notes) }}" class="form-control">
                            @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="name">Amount</label>
                            <input type="number" name="amount" value="{{ old('name', $income->amount) }}" class="form-control">
                            @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="name">Category</label>
                            <select name="category_id" class="form-control">
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $category->id == $income->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="name">Date</label>
                            <input type="date" name="date" value="{{ old('name', $income->date) }}" class="form-control">
                            @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>

                </div>


                <div class="form-group pt-4">
                    <button type="submit" name="submit" class="btn btn-primary">Update Income</button>
                </div>
            </form>
        </div>
    </div>

@endsection
