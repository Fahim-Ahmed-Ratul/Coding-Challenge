<?php

namespace App\Http\Controllers;

use App\Expense;
use Illuminate\Http\Request;

use DB;
use PDF;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function downloadPDF(Request $request) {
        $UserId=$request->session()->get('info');
        $pdf = PDF::loadView('expense-yearwise-reports-detailed',compact('UserId'));

        return $pdf->download('year-wise-expense.pdf');
      }

    public function download1PDF() {

        $pdf = PDF::loadView('expense-monthwise-reports-detailed');

        return $pdf->download('month-wise-expense.pdf');
      }

    public function download2PDF() {

        $pdf = PDF::loadView('expense-datewise-reports-detailed');

        return $pdf->download('date-wise-expense.pdf');
      }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $expense=new Expense;
        $expense->ExpenseDate=$request->dateexpense;
        $expense->ExpenseItem=$request->item;
        $expense->ExpenseCost=$request->costitem;
        // $info=$request->session()->get('info');
        $expense->UserId=$request->session()->get('info');
        $UserId=$request->session()->get('info');
        if($expense->save()){
          // return view('/add-expense',['query'=>$request->session()->get('info')]);
          return view('/add-expense',compact('UserId'));
        }
        // else{
        //   return view('register',['query'=>0]);
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function show(Expense $expense,Request $request)
    {
        //
        $UserId=$request->session()->get('info');
        echo gettype($UserId);
        // $all=DB::table('expenses')->where('UserId',$UserId)->get();
        $all=DB::table('expenses')->where('UserId',$UserId)->get();
        // dd($all->ID);
        // foreach($all as $a){
        //   echo  $a->ID . "<br>";
        //   echo  $a->UserId. "<br>";
        // }


        // print_r($all);
        // dd();
        if($all){
          return view('manage-expense',compact('all','UserId'));
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function edit(Expense $expense)
    {
        //
    }

    public function mreport(Request $request)
    {
        //
        $UserId=$request->session()->get('info');
        $fromdate=$request->fromdate;
        $todate=$request->todate;
        return view('expense-monthwise-reports-detailed',compact('UserId','fromdate','todate'));

    }

    public function dreport(Request $request)
    {
        //
        $UserId=$request->session()->get('info');
        $fromdate=$request->fromdate;
        $todate=$request->todate;
        return view('expense-datewise-reports-detailed',compact('UserId','fromdate','todate'));

    }

    public function yreport(Request $request)
    {
        //
        $UserId=$request->session()->get('info');
        $fromdate=$request->fromdate;
        $todate=$request->todate;
        return view('expense-yearwise-reports-detailed',compact('UserId','fromdate','todate'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expense $expense)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expense $expense,$id)
    {

        DB::table('expenses')->where('ID',$id)->delete();
        return redirect()->route('manageexpense');
    }
}
