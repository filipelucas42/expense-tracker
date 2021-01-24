<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Auth::user()->categories()->get();
        $expenses = Auth::user()->expenses()->get();
        return view('resource.expense.index', compact("categories", "expenses"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $input['user_id'] = Auth::user()->id;
        Expense::create($input);
 /*        $categories = Auth::user()->categories()->get();
        $expenses = Auth::user()->expenses()->get(); */
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function show(Expense $expense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function edit(Expense $expense)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expense $expense)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expense $expense)
    {
        if($expense->user_id != Auth::user()->id){
            abort(401);
        }
        $expense->delete();
        return back();
    }

    public function csvImport(Request $request){
        $user = Auth::user();
        $file = $request->file('csv');
        $path = $file->path();
        $handle = fopen($path,"r");
        while($row = fgetcsv($handle)){

            $category_name = strtolower(trim($row[2]));

            $description = $row[3] ? trim($row[3]) : "";
            $value = trim($row[0]);
            $date = trim($row[1]);
            if($user->categories()->where('name', $category_name)->count()){
                $category = $user->categories()->where('name', $category_name)->get();
            } else {
                $category = Category::create(["user_id" => $user->id, "name" => $category_name]);
            }
            $category = $category->first();
            Expense::create(["value" => $value, "date" => $date, "description" => $description, "category_id" => $category->id, "user_id" => $user->id]);
        }
        return redirect()->route('category.index');
    }

    public function csvIndex(){
        return view('resource.expense.csvIndex');
    }
}
