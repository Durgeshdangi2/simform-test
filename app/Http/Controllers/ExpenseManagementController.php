<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExpenseManagementRequet;
use App\Models\ExpenseManagement;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ExpenseManagementController extends Controller
{
    /**
     * @var $expenseManagement
     */
    private $expenseManagement;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->expenseManagement = new ExpenseManagement();
    }

    /**
     * Return a json data of the expense-income.
     *
     * @param  Request  $request
     *
     * @return JsonResponse
     * @throws Exception
     */
    public function all(Request $request)
    {
        $options = $this->getOptions();

        $rows = $this->expenseManagement::select('id', 'date_to', 'type', 'currency', 'currency_simbol', 'amount')->orderBy('id','desc');

        return DataTables::of($rows)->addColumn('amount', function ($row) {
            return $row->currency_simbol . $row->amount;
        })->addColumn('action', function ($row) use ($options) {
                return view('includes.action', compact('row', 'options'));
            })
            ->rawColumns(['amount', 'action'])
            ->make(true);
    }

    /**
     * Display a listing of the resource.
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $options = $this->getOptions();
        $datatable = [
            [
                'label' => '#',
                'data' => 'id',
                'name' => 'id',
                'orderable' => true,
                'searchable' => true,
                'exportable' => true
            ],
            [
                'label' => __('expense-management.labels.amount'),
                'data' => 'amount',
                'name' => 'amount',
                'orderable' => true,
                'searchable' => false,
                'exportable' => true
            ],
            [
                'label' => __('expense-management.labels.currency'),
                'data' => 'currency',
                'name' => 'currency',
                'orderable' => true,
                'searchable' => true,
                'exportable' => true
            ],
            [
                'label' => __('expense-management.labels.type'),
                'data' => 'type',
                'name' => 'type',
                'orderable' => true,
                'searchable' => true,
                'exportable' => true
            ],
            [
                'label' => __('expense-management.labels.date'),
                'data' => 'date_to',
                'name' => 'date_to',
                'orderable' => true,
                'searchable' => true,
                'exportable' => true
            ],
            [
                'label' => __('common.action'),
                'data' => 'action',
                'name' => 'action',
                'orderable' => false,
                'searchable' => false,
                'exportable' => false,
            ]
        ];

        return view('expense-management.index', compact('datatable', 'options'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $options = $this->getOptions();
        $options['type'] = ['Expense', 'Income'];
        return view('expense-management.create', [
            'options' => $options,
            'form' => null,
        ]);
    }

    /**
     * Store a newly created expenes in storage.
     *
     * @param  ExpenseManagementRequet  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExpenseManagementRequet $request)
    {
        $data = $request->only('amount', 'date_to', 'type');
        $data['user_id'] = auth()->id();
        $this->expenseManagement::create($data);
        return redirect()->route('expense-management.index')->with('success', __('expense-management.message.added',['type'=>$request->type]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $options = $this->getOptions();
        return view('expense-management.show', [
            'options' => $options,
            'form' => $this->expenseManagement::findorFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $options = $this->getOptions();
        $options['type'] = ['Expense', 'Income'];
        return view('expense-management.edit', [
            'options' => $options,
            'form' => $this->expenseManagement::findorFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ExpenseManagementRequet  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ExpenseManagementRequet $request, $id)
    {
        $data = $request->only('amount','date_to', 'type');
        $this->expenseManagement::where('id',$id)->update($data);
        return redirect()->route('expense-management.index')->with('success', __('expense-management.message.update',['type'=>$request->type]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obj = $this->expenseManagement::findorFail($id);
        $type = $obj->type;
        $obj->delete();
        return redirect()->route('expense-management.index')->with('success', __('expense-management.message.delete',['type'=>$type]));
    }
}
