<div class="modal-header">
  <h4 class="modal-title">Billing</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<form role="form" id = "form_billing" method="POST">
  @csrf
  <div class="modal-body">
    <button class="btn btn-sm btn-info" id = "add_item" style = "float:left; margin-bottom:5px;"><i class = "fa fa-plus"></i>  &nbsp; Add Item</button>
    <table class = "table table-bordered" id = "billing_table">
      <thead>
        <tr>
          <th></th>
          <th>Item</th>
          <th>Qty</th>
          <th>Total</th>
          <th>Notes</th>
        </tr>
      </thead>
      <tbody>
        @foreach($bill->billDetail as $billing)
        <tr>
          <td>1</td>
          <td>
            <input type = "hidden" name = "bill[0][visit_bill_item_id]" value = "<?php echo $billing->id ?>">
            <select class = "form-control" name = "bill[0][item_id]">
              <option value = "">-Select-</option>
              @foreach($bill_item as $item)
              <option value = "{{$item->id}}" <?php if($item->id == $billing->bill_item_id) echo "selected"; ?>>{{$item->item_name}}</option>
              @endforeach
            </select>
          </td>
          <td><input type = "number" name = "bill[0][qty]" class = "form-control" value = "<?php echo $billing->qty?>"></td>
          <td><input type = "number" name = "bill[0][total]" class = "form-control" value = "<?php echo $billing->qty*$item->price; ?>"></td>
          <td><textarea class = "form-control" name="bill[0][notes]"><?php echo $billing->notes?></textarea></td>
        </tr>
        @endforeach
        <tr>
          <td style = "text-align:center;" colspan = "3">Total</td>
          <td style = "text-align:right;">70.000</td>
          <td></td>
        </tr> 
      </tbody>
    </table>
  </div>
  <div class="modal-footer">
    <!-- <button type="submit" class="btn btn-default">Save</button> -->
    <button type="submit" class="btn btn-success">Submit</button>
  </div>
</form>

<script>
$(function() {
  $('#add_item').click(function(e){
    e.preventDefault();
  })

  $('#form_billing').submit(function(r){
    r.preventDefault();

    var form = $(this);

    $.ajax({
      url: '/visit/updatebill',
      type: 'POST',
      data: form.serialize(),
      dataType: 'json',
      async: false,
      success: function (res) {
        if(res.status == 200){
          $('#modal-billing').modal('toggle');
        }
      }
    })
  })

})