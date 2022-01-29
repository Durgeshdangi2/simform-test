@extends('layouts.app')
@section('title')
{{ config('app.name', 'Laravel') }} | {{ __('common.dashboard') }}
@endsection
@section('heading'){{ __('common.dashboard') }}@endsection
@section('heading-icon')<i class="nav-icon material-icons">home</i>@endsection
@section('content')
<div class="row">
    @foreach($widgets as $key => $widget)
    <div class="{{$widget['block_class']}}">
        <!-- small box -->
        <div class="small-box {{$widget['box_class']}}">
            <div class="inner">
                <h6>{{$widget['title']}}</h6>
                <p>{{$widget['summary']}}</p>
            </div>
            <div class="icon">
                {!! $widget['icon'] !!}
            </div>
            @if($widget['more_info'] !== "")
            <a href="{{$widget['more_info']}}" class="small-box-footer"><span>{{ __('common.more_info') }}</span> <i class="material-icons">forward</i></a>
            @endif
        </div>
    </div>
    @endforeach
</div>

@endsection
