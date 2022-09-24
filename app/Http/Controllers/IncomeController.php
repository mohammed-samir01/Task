<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Income;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $incomes = Income::with('category')
            ->when(request()->keyword, function ($query) {
                $query->where('notes', 'like', '%' . request()->keyword . '%');
            })
            ->when(request()->date_from, function ($query) {
                $query->where('date', '>=', request()->date_from);
            })
            ->when(request()->date_to, function ($query) {
                $query->where('date', '<=', request()->date_to);
            })
            ->when(request()->category_id, function ($query) {
                $query->where('category_id', request()->category_id);
            })
            ->paginate(request()->limit_by ?? 10);

        $categories = Category::all();

        return view('dashboard.incomes.index', compact('incomes', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('dashboard.incomes.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'notes' => 'required|string|max:100|min:10',
            'amount' => 'required|numeric|min:1',
            'date' => 'required|date|before_or_equal:today',
            'category_id' => 'required|exists:categories,id|numeric|min:1|not_in:0',
        ]);

        Income::create([
            'notes' => $request->notes,
            'amount' => $request->amount,
            'date' => $request->date,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('incomes.index')
            ->with('success', 'Income created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $income = Income::find($id);
        return view('dashboard.incomes.show', compact('income'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $income = Income::find($id);
        $categories = Category::all();
        return view('dashboard.incomes.edit', compact('income', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'notes' => 'required|string|max:100|min:10',
            'amount' => 'required|numeric|min:1',
            'date' => 'required|date|before_or_equal:today',
            'category_id' => 'required|exists:categories,id|numeric|min:1|not_in:0',
        ]);

        $income = Income::find($id);
        $income->update([
            'notes'         => $request->notes,
            'amount'        => $request->amount,
            'category_id'   => $request->category_id,
            'date'         => $request->date,

        ]);

        return redirect()->route('incomes.index')
            ->with('success', 'Income updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $income = Income::find($id);
        $income->delete();

        return redirect()->route('incomes.index')
            ->with('success', 'Income deleted successfully');

    }
}
