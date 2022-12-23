<div class="modal-header">
        <h4 class="modal-title">Billing</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form role="form" id = "form_user" method="POST">
        @csrf
        <div class="modal-body">
          <table class = "table table-bordered" id = "billing_table">
            <thead>
              <tr>
                <th></th>
                <th>Item</th>
                <th>Qty</th>
                <th>Notes</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>
                <select class = "form-control" name = "bill[0][item_id]">
                  <option value = "">-Select-</option>
                  @foreach($bill_item as $item)
                  <option value = "{{$item->id}}" <?php if($item->id == $bill->billDetail[0]->bill_item_id) echo "selected"; ?>>{{$item->item_name}}</option>
                  @endforeach
                </select>
                </td>
                <td><input type = "number" name = "bill[0][qty]" class = "form-control"></td>
                <td><textarea class = "form-control" name="bill[0][notes]"></textarea></td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success">Save</button>
        </div>
      </form>