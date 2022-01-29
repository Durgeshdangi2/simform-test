@extends('layouts.app')
@section('title') {{ config('app.name', 'Laravel') }} | {{ 'Show Category' }} @endsection
@section('heading') {{ __('common.expense-management') }} @endsection
@section('content')
    <div class="row">
        <div class="col-12">
            @include($options['route_controller'].'.includes.form', ['isForm' => false])
        </div>
    </div>
@endsection
