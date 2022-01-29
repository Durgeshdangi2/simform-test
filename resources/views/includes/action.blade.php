<div class="dtb-actions">
        <a
            href="{{ route(($options['route_controller'] ?? '').'.show', $row->id) }}"
            title="View" class="float-left mr-2 mb-2 btn btn-sm btn-gradient-warning action-btn ">
            <i class="material-icons text-md">visibility</i>
        </a>
        <a
            href="{{ route(($options['route_controller'] ?? '').'.edit', $row->id) }}"
            title="Edit" class="float-left mr-2 mb-2 btn btn-sm btn-gradient-primary action-btn ">
            <i class="material-icons text-md">edit</i>
        </a>
        <div class="float-left">
            <form
                method="POST"
                action="{{ route(($options['route_controller'] ?? '').'.destroy', $row->id) }}"
                accept-charset="UTF-8"
                data-toggle="tooltip" title="{{__('common.sure')}}"
                data-original-title="Delete">
                @csrf
                @method('DELETE')
                <a
                    href="#"
                    class="float-left btn btn-sm mb-2  btn-gradient-danger action-btn "
                    data-toggle="modal"
                    data-target="#confirmDelete"
                    data-title="{{__('common.sure')}}"
                    data-message="{{__('common.want_to_delete')}}">
                    <i class="material-icons text-md">delete</i>
                </a>
            </form>
        </div>
</div>
