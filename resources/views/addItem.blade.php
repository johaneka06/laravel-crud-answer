<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Insert new data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @if($errors->any())
        <div class="container mt-2">
          @foreach($errors->all() as $error)
          <div class="alert alert-danger">{{ $error }}</div>
          @endforeach
        </div>
        @endif
        <div class="container mt-2">
          <form action="{{ url('/insert') }}" method="post" class="form-group">
            @csrf
            <div class="form-inline mb-3">
              <label for="name" class="col-4">Product Name: </label>
              <input type="text" name="name" id="name" placeholder="Name" class="form-control">
            </div>
            <div class="form-inline mb-3">
              <label for="price" class="col-4">Product Price: </label>
              <input type="number" name="price" id="price" placeholder="Price" class="form-control">
            </div>
            <div class="form-inline mb-3">
              <label for="name" class="col-4">Product Stocks: </label>
              <input type="number" name="stock" id="stock" placeholder="Stocks" class="form-control">
            </div>
            <div class="modal-footer">
              <input type="submit" value="Insert" class="btn btn-primary">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>