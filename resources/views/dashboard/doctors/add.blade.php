@extends('dashboard.layouts.master')
@section('css')
    <link href="{{ URL::asset('dashboard/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('dashboard/plugins/notify/css/notifIt.css') }}" rel="stylesheet">
@endsection
@section('title')
    {{ trans('dashboard/doctors.add') }}
@endsection
@section('page-header')
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">
                    {{ trans('dashboard/doctors.add') }}
                </h4> {{ trans('dashboard/doctors.view_all') }}</span>

                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/
            </div>
        </div>
    </div>
@endsection
@section('content')
    @include('dashboard.doctors.messages_alert')
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    {{ BsForm::post(route('doctor.store'), ['enctype' => 'multipart/form-data']) }}
                    @bsMultilangualFormTabs
                        {{ BsForm::text('name')->name('name')->label(trans('dashboard/doctors.name')) }}
                    @endBsMultilangualFormTabs
                    {{ BsForm::text('email')->name('email')->label(':البريد الالكتروني') }}

                    <!-- كلمة المرور -->
                    <div>
                        <label for="password">كلمة المرور:</label>
                        <input class="form-control" name="password" type="password" required>
                    </div>

                    <!-- رقم الهاتف -->
                    <div>
                        <label for="phone">رقم الهاتف:</label>
                        <input class="form-control" name="phone" type="tel" required>
                    </div>

                    <!-- اختيار التخصص -->
                    <div>
                        <label for="section_id">التخصص:</label>
                        <select name="section_id" class="form-control" required>
                            <option value="" disabled selected>-----</option>
                            @foreach ($sections as $section)
                                <option value="{{ $section->id }}">{{ $section->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- اختيار المواعيد -->
                    {{-- <div>
                            <label for="appointments">المواعيد:</label>
                            <select multiple name="appointments[]" class="form-control" required>
                                <option value="السبت">السبت</option>
                                <option value="الاحد">الاحد</option>
                                <option value="الاثنين">الاثنين</option>
                                <option value="الثلاثاء">الثلاثاء</option>
                                <option value="الاربعاء">الاربعاء</option>
                                <option value="الخميس">الخميس</option>
                                <option value="الجمعه">الجمعه</option>
                            </select>

                    </div> --}}

                    <!-- سعر الكشف -->
                    <div>
                        <label for="price">سعر الكشف:</label>
                        <input class="form-control" name="price" type="text" value="0.00" required>
                    </div>

                    <!-- صورة الطبيب -->
                    <div>
                        <label for="photo">صورة الطبيب:</label>
                        <input name="photo" type="file" required>
                    </div>
                    {{ BsForm::submit()->label('إضافة طبيب')->danger() }}
                    {{ BsForm::close() }}

                </div>
            </div>
        </div>
    </div>
@endsection
