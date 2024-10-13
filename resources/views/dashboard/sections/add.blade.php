
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
                <form method="POST" action="{{ route('section.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="newSectionName">اسم القسم</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <button type="submit" class="btn btn-success">إضافة القسم</button>
                </form>
            </div>
        </div>
    </div>
</div>
