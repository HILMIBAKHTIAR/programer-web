<div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog"
aria-labelledby="myModalLabel33" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
    role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel33">Login Form </h4>
            <button type="button" class="close" data-bs-dismiss="modal"
                aria-label="Close">
                <i data-feather="x"></i>
            </button>
        </div>
        <form method="POST" action="{{ route('article.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <label>Title</label>
                <div class="form-group">
                    <input type="text" name="title" placeholder="programing language"
                        class="form-control">
                </div>
                <label>Description</label>
                <div class="form-group">
                    <input type="text" name="description" placeholder="js is..."
                        class="form-control">
                </div>
                <label>Image</label>
                <div class="form-group">
                    <input type="file" name="image"
                        class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-secondary"
                    data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Close</span>
                </button>
                <button type="submit" class="btn btn-primary ml-1"
                    data-bs-dismiss="modal">
                    <i class="bx bx-check d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">submit</span>
                </button>
            </div>
        </form>
    </div>
</div>
</div>