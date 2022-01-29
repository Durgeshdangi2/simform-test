@extends('layouts.app')
@section('title') {{ config('app.name', 'Laravel') }} | {{__('user.all_users')}} @endsection
@section('heading') {{__('user.all_users')}} @endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h3 class="card-title p-2">{{ __('common.list') }}</h3>
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

