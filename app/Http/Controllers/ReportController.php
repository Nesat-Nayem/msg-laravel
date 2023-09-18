<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Payment;
use App\Models\Service;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function earnings()
    {
        $payments = Payment::orderBY('id', 'desc')->get();
        return view('admin.earnings', compact('payments'));
    }

    public function seller_balance()
    {
        $payments = Payment::orderBy('id', 'desc')->get();
        return view('admin.seller-balance', compact('payments'));
    }

    public function revenue()
    {
        return view('admin.revenue');
    }
}
