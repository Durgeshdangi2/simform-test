<?php

namespace App\Http\Controllers;

use App\Models\ExpenseManagement;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }



    /**
     * Return a json data of the user.
     *
     * @param  Request  $request
     *
     * @return JsonResponse
     * @throws Exception
     */
    public function index(Request $request)
    {
        $user=auth()->user();
        $myIncomes = $user->incomes->sum('amount');
        $myExpenses = $user->expenses->sum('amount');
        $widgets =
        [
            [
                'title' => __('common.users'),
                'summary' => User::count(),
                'block_class' => 'col-lg-3 col-6',
                'box_class' => 'bg-gradient-danger',
                'icon' => '<i class="material-icons">face</i>',
                'more_info' => route('users.index')
            ],
            [
                'title' => __('common.my_incomes'),
                'summary' => '₹'.$myIncomes,
                'block_class' => 'col-lg-3 col-6',
                'box_class' => 'bg-gradient-danger',
                'icon' => '<i class="material-icons">face</i>',
                'more_info' => route('expense-management.index')
            ],
            [
                'title' => __('common.my_expense'),
                'summary' => '₹'.$myExpenses,
                'block_class' => 'col-lg-3 col-6',
                'box_class' => 'bg-gradient-danger',
                'icon' => '<i class="material-icons">face</i>',
                'more_info' => route('expense-management.index')
            ],
            [
                'title' => __('common.total_profit_loss'),
                'summary' => $myIncomes-$myExpenses,
                'block_class' => 'col-lg-3 col-6',
                'box_class' => 'bg-gradient-danger',
                'icon' => '<i class="material-icons">face</i>',
                'more_info' => route('expense-management.index')
            ],
        ];
        return view('home',compact('widgets'));
    }

}
