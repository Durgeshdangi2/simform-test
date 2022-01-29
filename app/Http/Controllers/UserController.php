<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    /**
     * @var $user
     */
    private $user;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->user = new User();
    }

    /**
     * Return a json data of the user.
     *
     * @param  Request  $request
     *
     * @return JsonResponse
     * @throws Exception
     */
    public function all(Request $request)
    {
        $rows = $this->user::select('id','name','email')->orderBy('id','desc');
        return DataTables::of($rows)->make(true);
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
                'label' => __('user.labels.name'),
                'data' => 'name',
                'name' => 'name',
                'orderable' => true,
                'searchable' => true,
                'exportable' => true
            ],
            [
                'label' => __('user.labels.email'),
                'data' => 'email',
                'name' => 'email',
                'orderable' => true,
                'searchable' => true,
                'exportable' => true
            ],
        ];

        return view('users.index', compact('datatable','options'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
