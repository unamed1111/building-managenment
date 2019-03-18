<div class="modal fade" id="add{{$id}}" tabindex="-1" role="dialog" aria-labelledby="add{{$id}}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel-4">Ban có chắc chắn muốn xóa không?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="form-submit">
                <form action="{{$route}}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Xóa</button>
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Không</button>
                </form>
                    
            </div>

        </div>
    </div>
</div>
