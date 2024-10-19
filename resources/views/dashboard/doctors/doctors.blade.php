@extends('dashboard.layouts.master')
@section('css')
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('dashboard/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('dashboard/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('dashboard/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('dashboard/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('dashboard/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('dashboard/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('dashboard/plugins/notify/css/notifIt.css') }}">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{trans('dashboard/doctors.doctors')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    {{trans('dashboard/doctors.view_all')}}</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    @include('dashboard.doctors.messages_alert')
    <!-- row -->

    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <a href="{{route('doctor.create')}}" type="button" class="btn btn-success"   role="button"  aria-pressed="true">
                            إضافة طبيب
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example1">
                          <thead>
    <tr>
        <th class="wd-15p border-bottom-0">#</th>
        <th class="wd-15p border-bottom-0"> {{ trans('dashboard/doctors.name') }} </th>
        <th class="wd-20p border-bottom-0"> {{ trans('dashboard/doctors.email') }}</th>
        <th class="wd-15p border-bottom-0"> {{ trans('dashboard/doctors.specialty') }}</th>
        <th class="wd-15p border-bottom-0"> {{ trans('dashboard/doctors.phone') }}</th>
        <th class="wd-15p border-bottom-0"> {{ trans('dashboard/doctors.appointments') }}</th>
        <th class="wd-15p border-bottom-0"> {{ trans('dashboard/doctors.price') }}</th>
        <th class="wd-15p border-bottom-0"> {{ trans('dashboard/doctors.status') }}</th>
        <th class="wd-15p border-bottom-0"> {{ trans('dashboard/doctors.created_at') }}</th>
        <th class="wd-15p border-bottom-0"> {{ trans('dashboard/doctors.processes') }}</th>
        <th class="wd-15p border-bottom-0"> {{ trans('dashboard/doctors.photo') }}</th> <!-- إضافة عمود الصورة -->
    </tr>
</thead>
<tbody>
    @foreach ($doctor as $doctor)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $doctor->name }}</td>
            <td>{{ $doctor->email }}</td>
            <td>{{ $doctor->section->name }}</td>
            <td>{{ $doctor->phone }}</td>
            <td>{{ $doctor->appointments }}</td>
            <td>{{ $doctor->price }}</td>
            <td>
                <div class="dot-label bg-{{ $doctor->status == 1 ? 'success' : 'danger' }} ml-1"></div>
                {{ $doctor->status == 1 ? trans('dashboard/doctors.enabled') : trans('dashboard/doctors.Notenabled') }}
            </td>
            <td>{{ $doctor->created_at->diffForHumans() }}</td>
            <td>
                <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                   data-toggle="modal" href="#edit{{ $doctor->id }}"><i class="las la-pen"></i></a>
                <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                   data-toggle="modal" href="#delete{{ $doctor->id }}"><i class="las la-trash"></i></a>
            </td>
            <td>
                    <img src="{{ $doctor->getFirstMediaUrl('media') }}" alt="{{ $doctor->name }}" style="width: 50px; height: 50px; border-radius: 50%;">

            </td>
            @include('dashboard.doctors.delete')
        </tr>
        @include('dashboard.doctors.edit')
        @endforeach
</tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>



    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <script src="{{ URL::asset('dashboard/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('dashboard/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('dashboard/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('dashboard/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('dashboard/plugins/datatable/js/jquery.dataTables.js') }}"></script>
    <script src="{{ URL::asset('dashboard/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ URL::asset('dashboard/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('dashboard/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('dashboard/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('dashboard/plugins/datatable/js/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('dashboard/plugins/datatable/js/vfs_fonts.js') }}"></script>
    <script src="{{ URL::asset('dashboard/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('dashboard/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('dashboard/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ URL::asset('dashboard/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('dashboard/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
    <!--Internal  Datatable js -->
    <script src="{{ URL::asset('dashboard/js/table-data.js') }}"></script>
    <script src="{{ URL::asset('dashboard/plugins/notify/js/notify.js') }}"></script>
    <script src="{{ URL::asset('/plugins/notify/js/notify-custom.js') }}"></script>
@endsection
