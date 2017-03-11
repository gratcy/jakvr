  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Users Group
        <small>Update User Group</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Users Group</a></li>
        <li class="active"><a href="#">Update User Group</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
            <?php echo __get_error_msg(); ?>
            
           <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Update User Group</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="<?php echo site_url('users/users_group_update'); ?>" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Group</label>

                  <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" id="inputEmail3" placeholder="Group Name" value="<?php echo $group[0] -> uname; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="Description" class="col-sm-2 control-label">Description</label>

                  <div class="col-sm-10">
                    <textarea type="text" name="desc" class="form-control" id="Description" placeholder="Description"><?php echo $group[0] -> udesc; ?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Status</label>

                  <div class="col-sm-10">
                    <div class="checkbox">
					  <?php echo __get_status($group[0] -> ustatus,2); ?>
                  </div>
                  </div>
                </div>

              </div>
              <!-- /.box-body -->
                                <div class="box-body">
                                <div class="box-header">
                                    <label>Group Permission</label>
                                </div><!-- /.box-header -->
                                    <table class="table table-bordered">
      <thead>
		<tr>
		<th>Name</th>
		<th>Access</th>
		</tr>
      </thead>
      <tbody>
        <?php foreach($permission as $k => $v) : ?>
		<tr>
        <td><?php echo ($v -> uparent != 0 ? '-- '.$v -> udesc.'' : $v -> udesc); ?></td>
		<td><label>Yes <?php if ($v -> uaccess == 1) { ?> <input class="uniform" type="radio" value="1" name="perm[<?php echo $v -> uid?>]" checked></label>&nbsp;<label> No <input class="uniform" type="radio" value="0" name="perm[<?php echo $v -> uid?>]"></label> <?php } else { ?><label><input class="uniform" type="radio" value="1" name="perm[<?php echo $v -> uid?>]"> No</label><label> <input class="uniform" type="radio" value="0" name="perm[<?php echo $v -> uid?>]" checked><label><?php } ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
      </table>
                            </div>
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
