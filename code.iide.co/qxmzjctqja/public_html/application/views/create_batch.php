

        <div class="content mt-3">

            <!--<div class="col-sm-12">
                <div class="alert  alert-success alert-dismissible fade show" role="alert">
                  <span class="badge badge-pill badge-success">Welcome</span> Admin!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>-->
            <div class = "col-md-12 col-sm-12 col-lg-12">
              <?php if(isset($_GET['success'])):?>
                <div class="alert alert-success" role="alert">
                  Batch Successfully Created!
                </div>
              <?php endif; ?>
              <div class="card">
                      <div class="card-header">
                        Add a new <strong>Batch</strong>
                      </div>
                      <div class="card-body card-block">
                        <form action="<?php echo base_url() . 'Batch/create' ?>" method="post" class="form-horizontal">
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="hf-email" class=" form-control-label">Batch Name</label></div>
                            <div class="col-12 col-md-9"><input id="hf-email" name="name"  class="form-control" type="text"></div>
                          </div>


                      </div>
                      <div class="card-footer">
                        <button type="submit" name = "submit" class="btn btn-primary btn-sm">
                          <i class="fa fa-dot-circle-o"></i> Submit
                        </button>
</form>

                      </div>
                    </div>
            </div>



        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->
