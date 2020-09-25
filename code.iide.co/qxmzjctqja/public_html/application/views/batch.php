
        <div class="content mt-3">

            <!--<div class="col-sm-12">
                <div class="alert  alert-success alert-dismissible fade show" role="alert">
                  <span class="badge badge-pill badge-success">Welcome</span> Admin!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>-->
            <div class="row">

               <div class="col-md-12">
                   <div class="card">
                       <div class="card-header">
                           <strong class="card-title"><?php echo $name; ?></strong>
                       </div>
                       <div class="card-body">
                 <table id="bootstrap-data-table" class="table table-striped table-bordered">
                   <thead>
                     <tr>
                       <th>Name</th>
                       <th>Exercises Completed</th>
                     </tr>
                   </thead>
                  <tbody>

                      <?php foreach($batches as $b): ?>
                        <tr>
                        <td><a href = "<?php echo base_url() . 'Batch/student/' . $b->id; ?>"><?php echo $b->name; ?></a></td>
                        <td>
                          <?php $percentage = (($b->count) / 400) * 100  . "%" ?>
                          <div class="progress mb-3">
                              <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $percentage ?>" aria-valuenow="<?php echo $percentage; ?>" aria-valuemin="0" aria-valuemax="100"></div><?php echo $percentage; ?>
                          </div>
                        </td>
                      </tr>
                      <?php endforeach; ?>
                  </tbody>
                 </table>
                       </div>
                   </div>
               </div>


               </div>



        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->
