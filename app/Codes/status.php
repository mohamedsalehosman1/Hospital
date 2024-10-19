<!-- // status code -->
<div class="dot-label bg-{{ $doctor->status == 1 ? 'success' : 'danger' }} ml-1">
{{ $doctor->status == 1 ? trans('dashboard/doctors.enabled') : trans('dashboard/doctors.Notenabled') }}
</div>


