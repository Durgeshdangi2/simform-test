@if($name === 'ajax-init')
    <script type="text/javascript">
        $(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
    </script>
@elseif($name === 'select2-css')
    <!-- Select 2 -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@elseif($name === 'select2-js')
    <!-- Select2 -->
    <script src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}"></script>
    <script type="text/javascript">
        const select2ConfigDefault = {
            theme: 'bootstrap4',
            width: 'inherit !important',
            disabled: ''
        };

        const select2ConfigReadOnly = {
            theme: 'bootstrap4',
            width: 'inherit !important',
            disabled: 'readonly'
        };

        $(function () {
            $('.select2bs4').select2(select2ConfigDefault);

            $(document).on('click', '.select2bs4-all', function (e) {
                let selector = $(this).data('select');
                if ($(this).is(':checked')) {
                    $(".select2bs4." + selector).find('option').prop("selected", true);
                    $(".select2bs4." + selector).trigger("change");
                } else {
                    $(".select2bs4." + selector).find('option').prop("selected", false);
                    $(".select2bs4." + selector).trigger("change");
                }
            });
        });
    </script>
@elseif($name === 'datatables-css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    {{--    <link rel="stylesheet" href="https://cdn.datatables.net/searchbuilder/1.0.1/css/searchBuilder.dataTables.min.css">--}}
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@elseif($name === 'datatables-js')
    <!-- DataTables -->
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <!-- Export -->
    <script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script type="text/javascript">
        const exportOptions = [];
        @foreach($datatable as $key => $elem)
        @if ($elem['exportable'] === true)
        exportOptions.push('{{$key}}');
        @endif
        @endforeach
        const defaultDTConfig = {
            processing: true,
            serverSide: true,
            autoWidth: false,
            responsive: true,
            dom: "<'row'<'col-sm-12 col-md-4'l><'col-sm-12 col-md-4'B><'col-sm-12 col-md-4'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
            buttons: [
                {
                    "extend": 'csv',
                    "text": '{{__('common.csv')}}',
                    "className": 'btn {{ config('ws_theme.default.export_btn_class') }} mr-2',
                    exportOptions: {columns: exportOptions}
                },
                {
                    "extend": 'pdf',
                    "text": '{{__('common.pdf')}}',
                    "className": 'btn {{ config('ws_theme.default.export_btn_class') }} mr-2',
                    exportOptions: {columns: exportOptions}
                },
                {
                    "extend": 'print',
                    "text": '{{__('common.print')}}',
                    "className": 'btn {{ config('ws_theme.default.export_btn_class') }} mr-2',
                    exportOptions: {columns: exportOptions}
                },
            ],
            "lengthMenu": [25, 50, 100, 500, 1000, 2000, 5000, 10000, 50000, 100000],
            "aaSorting": []
        };
    </script>
@elseif($name === 'datepicker-css')
<!-- Date Time Picker -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">

@elseif($name === 'datepicker-js')
<!-- Date Time Picker -->
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
<script>
    $( function() {
      $( "#date_to" ).datepicker({  maxDate: new Date(),dateFormat: "yy-mm-dd" });
    } );
    </script>
@endif
