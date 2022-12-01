<div class="modal fade bd-example-modal-sm" id="model_button" tabindex="-1" role="dialog" aria-labelledby="bd-example-modal-sm" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="customModalTwoLabel">Add Stock</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="">
        <form  action="{{ route('stock.update') }}" method="POST">
          @csrf
          <input type="hidden" name="id" id="adid" value="">
          <input type="number" name="stock" style="width:100%;" placeholder="Enter Stock Quantity">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary btn-sm">Add</button>
        </form>
      </div>
    </div>
  </div>
</div>
