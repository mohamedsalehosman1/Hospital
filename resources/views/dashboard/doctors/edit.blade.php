<!-- Button to trigger modal -->


<!-- Modal -->
<div class="modal fade" id="edit{{ $doctor->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">تعديل الطبيب</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{ BsForm::model($doctor, route('doctor.update', $doctor), ['enctype' => 'multipart/form-data']) }}
                @csrf
                @method('patch')

                <div class="form-group">
                    @bsMultilangualFormTabs
                        {{ BsForm::text('name')->label(trans('dashboard/doctors.name')) }}
                    @endBsMultilangualFormTabs
                </div>
                <div class="form-group">
                    {{ BsForm::text('email')->name('email')->label(':البريد الالكتروني')->value($doctor->email) }}
                </div>

                <div class="form-group">
                    <label for="password">كلمة المرور:</label>
                    <input class="form-control" name="password" type="password">
                    <small class="form-text text-muted">اترك الحقل فارغًا إذا كنت لا ترغب في تغيير كلمة المرور.</small>
                </div>

                <div class="form-group">
                    <label for="phone">رقم الهاتف:</label>
                    <input class="form-control" name="phone" type="tel" value="{{ $doctor->phone }}" required>
                </div>

                <div class="form-group">
                    <label for="section_id">التخصص:</label>
                    <select name="section_id" class="form-control" required>
                        <option value="" disabled>-----</option>
                        @foreach ($sections as $section)
                            <option value="{{ $section->id }}"
                                {{ $doctor->section_id == $section->id ? 'selected' : '' }}>
                                {{ $section->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="price">سعر الكشف:</label>
                    <input class="form-control" name="price" type="text" value="{{ $doctor->price }}" required>
                </div>

                <div class="form-group">
                    <label for="photo">صورة الطبيب:</label>
                    <input name="photo" type="file">
                    <small class="form-text text-muted">اترك الحقل فارغًا إذا كنت لا ترغب في تغيير الصورة.</small>
                </div>

                {{ BsForm::submit()->label('تحديث')->danger() }}
                {{ BsForm::close() }}
            </div>
        </div>
    </div>
</div>
