@if (count($errors) > 0)
<div class="alert alert-danger">
    <button aria-label="Close" class="close" data-dismiss="alert" type="button">
        <span aria-hidden="true">&times;</span>
    </button>
    <strong>خطأ</strong>
    <ul>
        @foreach ($errors as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if (session()->has('add'))
<script>
    window.onload = function() {
        notif({
            msg: "{{ trans('dashboard/message.add') }}",
            type: "success"
        });
    }
</script>
@endif

@if (session()->has('edit'))
<script>
    window.onload = function() {
        notif({
            msg: "{{ trans('dashboard/message.edit') }}",
            type: "success"
        });
    }
</script>
@endif

@if (session()->has('delete'))
<script>
    window.onload = function() {
        notif({
            msg: "{{ trans('dashboard/message.delete') }}",
            type: "success"
        });
    }
</script>
@endif
