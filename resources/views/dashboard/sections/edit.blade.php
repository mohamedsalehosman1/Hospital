<!-- Button to trigger modal -->

<!-- Modal -->
<div class="modal fade" id="edit{{ $section->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">تعديل القسم</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editForm" method="POST" action="{{ route('section.update', 'test') }}">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label for="sectionName">اسم القسم</label>
                        <input type="hidden" value="{{$section->id}}" name="id"
                            value="{{ $section->id }}" >

                        <input type="text" class="form-control" name="name"
                            value="{{ $section->name }}" >
                    </div>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal">
                        تعديل
                    </button>
                    <button type="submit" class="btn btn-primary">حفظ التعديلات</button>
                </form>
            </div>
        </div>
    </div>
</div>
