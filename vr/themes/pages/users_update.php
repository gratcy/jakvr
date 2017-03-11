  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Users
        <small>Update User</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Users</a></li>
        <li class="active"><a href="#">Update User</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
            <?php echo __get_error_msg(); ?>
            
           <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Update User</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="<?php echo site_url('users/users_update'); ?>" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
              <div class="box-body">
                <div class="form-group">
                  <label for="Country" class="col-sm-2 control-label">Group</label>

                  <div class="col-sm-10">
					  <select name="group" class="form-control" id="Group">
                    <?php echo $groups; ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Email</label>

                  <div class="col-sm-10">
                    <input type="text" name="uemail" class="form-control" id="inputEmail3" placeholder="Email" value="<?php echo $users[0] -> uemail; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="NewPassword" class="col-sm-2 control-label">New Password</label>

                  <div class="col-sm-10">
                    <input type="password" name="newpass" class="form-control" id="NewPassword" placeholder="New Password">
                  </div>
                </div>
                <div class="form-group">
                  <label for="ConfirmPassword" class="col-sm-2 control-label">Confirm Password</label>

                  <div class="col-sm-10">
                    <input type="password" name="confpass" class="form-control" id="ConfirmPassword" placeholder="Confirm Password">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Status</label>

                  <div class="col-sm-10">
                    <div class="checkbox">
					  <?php echo __get_status($users[0] -> ustatus,2); ?>
                  </div>
                  </div>
                </div>

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="button" onclick="javascript:history.go(-1);" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-info pull-right">Submit</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
