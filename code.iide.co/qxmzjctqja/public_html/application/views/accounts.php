

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
                  Account Successfully Created!
                </div>
              <?php endif; ?>
            <div class = "col-md-12 col-sm-12 col-lg-12">
              <div class="card">
                      <div class="card-header">
                        Add a new <strong>Account</strong>
                      </div>
                      <div class="card-body card-block">
                        <form action="<?php echo base_url() . 'User/register' ?>" method="post" class="form-horizontal">
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="hf-name" class=" form-control-label">Full Name:</label></div>
                            <div class="col-12 col-md-9"><input id="hf-name" name="name" placeholder="Enter Full Name..." class="form-control" type="text"></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="hf-email" class=" form-control-label">Email</label></div>
                            <div class="col-12 col-md-9"><input id="hf-email" name="email" placeholder="Enter Email..." class="form-control" type="email"></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Role</label></div>
                            <div class="col-12 col-md-9">
                              <select name="role" id="select" class="form-control">
                                <option value="0">Please select</option>
                                <option value="2">Student</option>
                                <option value="3">Teacher</option>
                                <option value="1">Admin</option>
                              </select>
                            </div>
                          </div>

                          <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Batch</label></div>
                            <div class="col-12 col-md-9">
                              <select name="batch" id="select" class="form-control">
                                <option value = "">Please select</option>
                                <?php foreach($classes as $c): ?>

                                  <option value = "<?php echo $c->id ?>"><?php echo $c->name ?></option>
                                <?php endforeach; ?>
                              </select>
                            </div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="hf-password" class=" form-control-label">Password</label></div>
                            <div class="col-12 col-md-9"><input id="hf-password" name="password" placeholder="Enter Password..." class="form-control" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAACIUlEQVQ4EX2TOYhTURSG87IMihDsjGghBhFBmHFDHLWwSqcikk4RRKJgk0KL7C8bMpWpZtIqNkEUl1ZCgs0wOo0SxiLMDApWlgOPrH7/5b2QkYwX7jvn/uc//zl3edZ4PPbNGvF4fC4ajR5VrNvt/mo0Gr1ZPOtfgWw2e9Lv9+chX7cs64CS4Oxg3o9GI7tUKv0Q5o1dAiTfCgQCLwnOkfQOu+oSLyJ2A783HA7vIPLGxX0TgVwud4HKn0nc7Pf7N6vV6oZHkkX8FPG3uMfgXC0Wi2vCg/poUKGGcagQI3k7k8mcp5slcGswGDwpl8tfwGJg3xB6Dvey8vz6oH4C3iXcFYjbwiDeo1KafafkC3NjK7iL5ESFGQEUF7Sg+ifZdDp9GnMF/KGmfBdT2HCwZ7TwtrBPC7rQaav6Iv48rqZwg+F+p8hOMBj0IbxfMdMBrW5pAVGV/ztINByENkU0t5BIJEKRSOQ3Aj+Z57iFs1R5NK3EQS6HQqF1zmQdzpFWq3W42WwOTAf1er1PF2USFlC+qxMvFAr3HcexWX+QX6lUvsKpkTyPSEXJkw6MQ4S38Ljdbi8rmM/nY+CvgNcQqdH6U/xrYK9t244jZv6ByUOSiDdIfgBZ12U6dHEHu9TpdIr8F0OP692CtzaW/a6y3y0Wx5kbFHvGuXzkgf0xhKnPzA4UTyaTB8Ph8AvcHi3fnsrZ7Wore02YViqVOrRXXPhfqP8j6MYlawoAAAAASUVORK5CYII=&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;" type="password">
                          </div>

                      </div>
                      <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-sm">
                          <i class="fa fa-dot-circle-o"></i> Submit
                        </button>
</form>

                      </div>
                    </div>
            </div>



        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->
