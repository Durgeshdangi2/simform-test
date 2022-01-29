<button type="submit"
        class="btn {{ config('ws_theme.default.submit_btn_class')}} btn-frm-submit mr-3">
    <i class="material-icons">save_alt</i>&nbsp;{{ __('common.save') }}
</button>
<a href="{{$go_back}}"
   class="btn {{ config('ws_theme.default.cancel_btn_class')}}">
    <i class="material-icons">cancel</i>&nbsp;<span>{{ __('common.cancel') }}</span>
</a>
