<div class="modal fade" id="addSectionModal" tabindex="-1" role="dialog" aria-labelledby="addSectionModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addSectionModalLabel">إضافة قسم جديد</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{ BsForm::post(route('section.store'), ['enctype' => 'multipart/form-data']) }}
                @bsMultilangualFormTabs
                    {{ BsForm::text('name')->name('name')->label('Section Name') }}
                @endBsMultilangualFormTabs

                {{ BsForm::submit()->label('إضافة قسم')->danger() }}

                {{ BsForm::close() }}


            </div>
        </div>
    </div>
</div>
