<div class="card">
    <div class="card-header">
        <h3 class="card-title p-2">
            @if (optional($form)->id && $isForm === true)
                {{ __('common.edit') }}
            @elseif(optional($form)->id && $isForm === false)
                {{ __('common.show') }}
            @else
                {{ __('common.create') }}
            @endif
        </h3>
        <a href="{{ route(($options['route_controller'] ?? '') . '.index') }}"
            class="btn btn-gradient-dark float-right">
            <i class="material-icons">reply_all</i>&nbsp;
            {{ __('common.go_back') }}
        </a>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                @if ($isForm === true)@csrf @endif
                @if (optional($form)->id) @method('PUT') @endif
                <!-- Page Information -->
                <div class="row">

                    <div class="col-md-12 col-xs-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    {{ __('expense-management.expense_management_information') }}
                                </h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group input-group-sm ">
                                                    <label class="mb-0 font-weight-normal"
                                                        for="title">{{ __('expense-management.labels.amount') }}
                                                        <span class="text-danger">*</span></label>
                                                    @if ($isForm === true)
                                                        <input type="text" id="amount" name="amount"
                                                            class="form-control @error('amount') is-invalid @enderror"
                                                            placeholder="{{ __('expense-management.labels.amount') }}"
                                                            value="{{ old('amount', optional($form)->amount ?? '') }}"
                                                            maxlength="12" autocomplete="off">
                                                        @include('includes.invalid', ['field'=> 'amount'])
                                                    @else
                                                        <div class="text-muted">
                                                            {{ optional($form)->amount }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group input-group-sm ">
                                                    <label class="mb-0 font-weight-normal"
                                                        for="title">{{ __('expense-management.labels.date') }}
                                                        <span class="text-danger">*</span></label>
                                                    @if ($isForm === true)
                                                        <input type="text" id="date_to" name="date_to"
                                                            class="form-control @error('date_to') is-invalid @enderror"
                                                            placeholder="{{ __('expense-management.labels.date') }}"
                                                            value="{{ old('date_to', optional($form)->date_to ?? '') }}"
                                                            autocomplete="off">
                                                        @include('includes.invalid', ['field'=> 'date_to'])
                                                    @else
                                                        <div class="text-muted">
                                                            {{ optional($form)->date_to }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <div class="form-group input-group-sm ">
                                                    <label class="mb-0"
                                                        for="type">{{ __('expense-management.labels.type') }}</label>
                                                    @if ($isForm === true)
                                                        <select id="type" name="type"
                                                            class="form-control @error('type') is-invalid @enderror">
                                                            @foreach ($options['type'] as $key => $name)
                                                                <option value="{{ $name }}"
                                                                    {{ old('type', optional($form)->type ?? '') === $name ? 'selected' : '' }}>
                                                                    {{ __($name) }}</option>
                                                            @endforeach
                                                        </select>
                                                        @include('includes.invalid', ['field'=> 'type'])
                                                    @else
                                                        <div class="text-muted">
                                                            {{ optional($form)->type }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            @if ($isForm === true)
                @include('includes.page_action.submit', ['go_back' => route(($options['route_controller'] ?? '').'.index') ])
            @else
                {{-- @include('includes.page_action.edit', ['go_back' => route(($options['route_controller'] ?? '').'.index'), 'go_edit' => route(($options['route_controller'] ?? '').'.edit'), optional($form)->id)]) --}}
            @endif
        </div>
    </div>
</div>
</div>
@push('head.start')
    @include('includes.plugins', ['name' => 'datepicker-css'])
@endpush

@push('body.end')
    @include('includes.plugins', ['name' => 'datepicker-js'])
@endpush
