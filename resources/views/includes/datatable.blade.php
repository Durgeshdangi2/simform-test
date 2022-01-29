<div class="row">
    <div class="col-12">
        <div class="table-responsive">
            <table id="dtb-list" class="table table-hover table-striped">
                <thead>
                <tr>
                    @foreach($datatable as $key => $input)
                        <th>{{ $input['label'] }}</th>
                    @endforeach
                </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

@push('head.start')
    @include('includes.plugins', ['name' => 'datatables-css'])
@endpush

@push('body.end')
    @include('includes.plugins', ['name' => 'ajax-init'])
    @include('includes.plugins', ['name' => 'datatables-js', ['datatable' => $datatable]])
    <script type="text/javascript">
        $(function () {
            defaultDTConfig.ajax = {
                "url": "{{ route(($options['route_controller'] ?? '').'.all') }}",
                data: function (data) {
                    let filterElms = $(".datatable-filter-inputs"); //$( "[name^='__filter']" );
                    $.each(filterElms, function (index, elem) {
                        data[elem.name] = $(elem).val();
                    });
                }
            };
            defaultDTConfig.columns = {!! json_encode($datatable) !!};
            let dtbList = $('#dtb-list').DataTable(defaultDTConfig);
            $(document).on('click', '.btn-datatable-filter-search', function (e) {
                e.preventDefault();
                dtbList.draw();
            });

            $(document).on('click', '.btn-datatable-filter-reset', function (e) {
                e.preventDefault();
                window.location.reload();
            });
        });
    </script>
@endpush
