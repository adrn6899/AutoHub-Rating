<div class="modal fade" id="questionModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="questionModalTitle">
            Create
          </h1>
          {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="questionName" class="form-label">Title</label>
            <input type="text" class="form-control" id="questionName" placeholder="Title">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="question_save">Save</button>
        </div>
      </div>
    </div>
  </div>