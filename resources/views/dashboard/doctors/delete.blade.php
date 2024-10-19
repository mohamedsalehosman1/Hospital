<!-- Button to trigger modal -->

<!-- Modal -->
<div class="modal fade" id="delete{{ $doctor->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">حذف القسم</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('doctor.destroy', $doctor->id) }}">
                    @csrf
                    @method('delete')
                    <div class="form-group">
                        <label for="doctorName">اسم القسم</label>
                        <input type="hidden" value="{{$doctor->id}}" name="id"
                            value="{{ $doctor->id }}" >

                      <h5> هل انت متاكد من الحذف</h5>
                    </div>

                    <button type="submit" class="btn btn-primary">حذف القسم </button>
                </form>
            </div>
        </div>
    </div>
</div>
