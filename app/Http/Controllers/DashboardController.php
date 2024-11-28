<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customers;
use App\Products;
use App\Transactions;
use App\Users;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function cashierdashboard()
    {
        return view('dashboard.cashier');
    }

    public function admindashboard()
    {
        $countproduct = Products::all()->count();
        $countuser = Users::all()->count();
        $countcustomer = Customers::all()->count();
        $conttotal = Transactions::sum('total_amount');
        
        //perbulan
        $transactions = Transactions::selectRaw('MONTH(created_at) as month, 
            SUM(total_amount) as total')
            ->groupBy('month')
            ->whereYear('created_at', Carbon::now()->year)
            ->orderBy('month')
            ->get();

        $months = [];
        $totals = [];

        // Loop untuk mempersiapkan bulan dan total transaksi
        foreach ($transactions as $transaction) {
            $months[] = Carbon::create()->month($transaction->month)->format('F');  // Nama bulan
            $totals[] = $transaction->total;  // Total transaksi per bulan
        }

        //pertahun
        $transactions_year = Transactions::selectRaw('YEAR(created_at) as year, SUM(total_amount) 
        as totalyear')
        ->groupBy('year') ->orderBy('year')->get();
            
        // Siapkan data untuk chart
        $years = [];
        $totalyear = [];

        foreach ($transactions_year as $v) {
            $years[] = $v->year;  // Tahun transaksi
            $totalyear[] = $v->totalyear;  // Total transaksi per tahun
        }

        return view('dashboard.admin', compact('countproduct', 'countuser', 
        'countcustomer', 'conttotal', 'months', 'totals', 'years', 'totalyear'));
    
    }
}