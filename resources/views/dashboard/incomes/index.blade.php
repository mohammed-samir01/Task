@extends('dashboard.layouts.admin')
@section('content')
    @include('dashboard.layouts.alert')

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-primary">Incomes</h6>
            <div class="ml-auto">
                <a href="{{ route('incomes.create') }}" class="btn btn-primary">
                    <span class="icon text-white-50">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">Add New Income</span>
                </a>
            </div>
        </div>

        @include('dashboard.incomes.filter.filter')

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Notes</th>
                    <th>Category</th>
                    <th>Amount</th>
                    <th>Date</th>
                    <th class="text-center" style="width: 30px;">Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse($incomes as $income)
                    <tr>
                        <td>{{ $income->notes }}</td>
                        <td>{{ $income->category->name }}</td>
                        <td>{{ $income->amount }}</td>
                        <td>{{$income->date}}</td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="{{ route('incomes.edit', $income->id) }}" class="btn btn-primary">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="javascript:void(0);" onclick="if (confirm('Are you sure to delete this record?')) { document.getElementById('delete-product-category-{{ $income->id }}').submit(); } else { return false; }" class="btn btn-danger">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </div>
                            <form action="{{ route('incomes.destroy', $income->id) }}" method="post" id="delete-product-category-{{ $income->id }}" class="d-none">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No Incomes found</td>
                    </tr>
                @endforelse
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="6">
                        <div class="float-right">
                            {!! $incomes->links() !!}
                        </div>
                    </td>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>

@endsection
