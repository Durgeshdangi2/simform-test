@extends('layouts.app')
@section('title') {{ config('app.name', 'Laravel') }} | {{__('common.expense-management')}} @endsection
@section('heading') {{ __('common.expense-management') }} @endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h3 class="card-title p-2">{{ __('common.list') }}</h3>
                        </div>
                            <div class="col-6">
                                <a
                                    href="{{ route(($options['route_controller'] ?? '').'.create') }}"
                                    class="btn bg-gradient-info float-right">
                                    <i class="material-icons">add_circle</i>
                                    <span>{{ __('common.create_new') }}</span>
                                </a>
                            </div>
                       </div>
                </div>
                <div class="card-body">
                    @include('includes.datatable')
                </div>
            </div>
        </div>
    </div>
    @include('includes.modal_delete')
@endsection

