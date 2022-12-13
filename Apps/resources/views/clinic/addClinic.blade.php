<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Form Request Permit</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Clinic</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <!-- <h5><i class="icon fas fa-ban"></i> Alert!</h5> -->
   <i class="icon fas fa-exclamation-triangle"></i>
  </div>
  <form class="form-horizontal" id = "customer_requirement_form" method="POST" action = "" enctype="multipart/form-data">
  <div class="row">
    <div class = "col-12">
      <!-- Administration - Start !-->
      <div class="col-md-12">
        <div class="card card-primary">
          <div class="card-body">
            <div class = "row">
              <div class = "col-md-6">
                <div class="form-group">
                  <label for="inputName">Requestor</label>
                  <input type="text" id="requestor_name" name = "requestor_name" value = "" disabled class="form-control">
                </div>
              </div>
              <div class = "col-md-6">
                <div class="form-group">
                  <label>Divisi</label>
                  <input type="text" value = "" disabled class="form-control">
                </div>
              </div>
            </div>
          </div>
          
            
          <div class="card-footer">
            <div class="col-sm-5" style="float: right;">
                    
              <button type="submit" class="btn btn-primary" style="float: right;"><i class="fa fa-paper-plane"></i>&nbsp;Submit</button>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
      </div>
      <!-- Administration - End !-->
    </div>
  </div>
  </form>
</section>
<script>
</script>