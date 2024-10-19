<div class="modal fade" id="edit{{ $section->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">تعديل القسم</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                {!! Form::model($section, ['route' => ['section.update', $section->id], 'method' => 'PUT']) !!}
                @bsMultilangualFormTabs
                    {{ BsForm::text('name')->name('name')->label('section Name') }}
                @endBsMultilangualFormTabs
                <div class="form-group">
                    {!! Form::submit('تحديث', ['class' => 'btn btn-danger']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
