  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image" style="padding-left:15px">
          <img src="<?php echo themes_url('dist/img/no-avatar.png'); ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
		  <p>Branch, <?php echo $this -> privileges -> sesresult['ubname']; ?></p>
          <p><?php echo $this -> privileges -> sesresult['uemail']; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
		  <div style="padding:10px 0 0">
			<select class="switchbrand" name="switchbranch" style="padding: 5px;color: #000;">
				<?php echo __get_branch($this -> privileges -> sesresult['ubid'],2); ?>
			</select>
			</div>
          <div style="clear:both;"></div>
        </div>
      </div>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="<?php echo site_url();?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
		<?php if (__get_roles('Product') || __get_roles('Categories') || __get_roles('Brand') || __get_roles('Vendor') || __get_roles('Customer') || __get_roles('City') || __get_roles('Province') || __get_roles('Country') || __get_roles('Reffer')) : ?>
        <li class="treeview" rel="Master">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Master</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
              <span class="label label-danger pull-right">14</span>
            </span>
          </a>
          <ul class="treeview-menu">
			<?php if (__get_roles('Product')) : ?>
            <li><a href="<?php echo site_url('branch'); ?>"><i class="fa fa-circle-o"></i> Branch</a></li>
            <?php endif; ?>
			<?php if (__get_roles('Product')) : ?>
            <li><a href="<?php echo site_url('product'); ?>"><i class="fa fa-circle-o"></i> Products</a></li>
            <li><a href="<?php echo site_url('product_others'); ?>"><i class="fa fa-circle-o"></i> Products Others</a></li>
            <?php endif; ?>
			<?php if (__get_roles('Categories')) : ?>
            <li><a href="<?php echo site_url('categories'); ?>"><i class="fa fa-circle-o"></i> Categories </a></li>
            <li><a href="<?php echo site_url('categories_others'); ?>"><i class="fa fa-circle-o"></i> Categories Others</a></li>
            <li><a href="<?php echo site_url('color'); ?>"><i class="fa fa-circle-o"></i> Color</a></li>
            <?php endif; ?>
			<?php if (__get_roles('Reffer')) : ?>
            <li><a href="<?php echo site_url('reffer'); ?>"><i class="fa fa-circle-o"></i> Reffer </a></li>
            <?php endif; ?>
			<?php if (__get_roles('Logistics')) : ?>
            <li><a href="<?php echo site_url('logistics'); ?>"><i class="fa fa-circle-o"></i> Logistics </a></li>
            <?php endif; ?>
			<?php if (__get_roles('Brand')) : ?>
            <li><a href="<?php echo site_url('brand'); ?>"><i class="fa fa-circle-o"></i> Brands</a></li>
            <?php endif; ?>
			<?php if (__get_roles('Vendor')) : ?>
            <li><a href="<?php echo site_url('vendor'); ?>"><i class="fa fa-circle-o"></i> Vendor</a></li>
            <?php endif; ?>
			<?php if (__get_roles('Customer')) : ?>
            <li><a href="<?php echo site_url('customer'); ?>"><i class="fa fa-circle-o"></i> Customers</a></li>
            <?php endif; ?>
			<?php if (__get_roles('City')) : ?>
            <li><a href="<?php echo site_url('city'); ?>"><i class="fa fa-circle-o"></i> City</a></li>
            <?php endif; ?>
			<?php if (__get_roles('Province')) : ?>
            <li><a href="<?php echo site_url('province'); ?>"><i class="fa fa-circle-o"></i> Province</a></li>
            <?php endif; ?>
			<?php if (__get_roles('Country')) : ?>
            <li><a href="<?php echo site_url('country'); ?>"><i class="fa fa-circle-o"></i> Country</a></li>
            <?php endif; ?>
          </ul>
        </li>
		<?php endif; ?>
		<?php if (__get_roles('DistributionRequest') || __get_roles('DistributionTransfer')) : ?>
        <li class="treeview" rel="Distribution">
          <a href="#">
            <i class="fa fa-th-list"></i>
            <span>Distribution</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
              <span class="label bg-green pull-right">2</span>
            </span>
          </a>
          <ul class="treeview-menu">
			<?php if (__get_roles('DistributionRequest')) : ?>
            <li><a href="<?php echo site_url('request'); ?>"><i class="fa fa-circle-o"></i> Request</a></li>
            <?php endif; ?>
			<?php if (__get_roles('DistributionTransfer')) : ?>
            <li><a href="<?php echo site_url('transfer'); ?>"><i class="fa fa-circle-o"></i> Transfer</a></li>
            <?php endif; ?>
          </ul>
        </li>
		<?php endif; ?>
		<?php if (__get_roles('ItemReceiving') || __get_roles('Stock') || __get_roles('Opname')) : ?>
        <li class="treeview" rel="Inventory">
          <a href="#">
            <i class="fa fa-th"></i>
            <span>Inventory</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
              <span class="label bg-green pull-right">3</span>
            </span>
          </a>
          <ul class="treeview-menu">
			<?php if (__get_roles('ItemReceiving')) : ?>
            <li><a href="<?php echo site_url('receiving'); ?>"><i class="fa fa-circle-o"></i> Item Receiving</a></li>
            <?php endif; ?>
			<?php if (__get_roles('Stock')) : ?>
            <li><a href="<?php echo site_url('inventory'); ?>"><i class="fa fa-circle-o"></i> Stock</a></li>
            <?php endif; ?>
			<?php if (__get_roles('Opname')) : ?>
            <li><a href="<?php echo site_url('opname'); ?>"><i class="fa fa-circle-o"></i> Opname</a></li>
            <?php endif; ?>
          </ul>
        </li>
		<?php endif; ?>
		<?php if (__get_roles('Order') || __get_roles('Return')) : ?>
        <li class="treeview" rel="SalesPurchase">
          <a href="#">
            <i class="fa fa-money"></i>
            <span>Sales &amp; Purchase</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
              <span class="label label-primary pull-right">2</span>
            </span>
          </a>
          <ul class="treeview-menu">
			<?php if (__get_roles('Order')) : ?>
            <li><a href="<?php echo site_url('order'); ?>"><i class="fa fa-circle-o"></i> Order JakVR</a></li>
            <?php endif; ?>
<!--
			<?php if (__get_roles('Order')) : ?>
            <li><a href="<?php echo site_url('order_others'); ?>"><i class="fa fa-circle-o"></i> Order KoekMuraH</a></li>
            <?php endif; ?>
-->
			<?php if (__get_roles('Return')) : ?>
            <li><a href="<?php echo site_url('retur'); ?>"><i class="fa fa-circle-o"></i> Return JakVR</a></li>
<!--
            <li><a href="#"><i class="fa fa-circle-o"></i> Return KoekMuraH</a></li>
-->
            <?php endif; ?>
          </ul>
        </li>
		<?php endif; ?>
		<?php if (__get_roles('ReportOpname') || __get_roles('ReportTransaction') || __get_roles('ReportStock')) : ?>
        <li class="treeview" rel="Reports">
          <a href="#">
            <i class="fa fa-table"></i>
            <span>Reports</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
              <span class="label bg-aqua pull-right">3</span>
            </span>
          </a>
          <ul class="treeview-menu">
			<?php if (__get_roles('ReportTransaction')) : ?>
            <li><a href="<?php echo site_url('reporttransaction'); ?>"><i class="fa fa-circle-o"></i> Transaction</a></li>
            <?php endif; ?>
			<?php if (__get_roles('ReportOpname')) : ?>
            <li><a href="<?php echo site_url('reportopname'); ?>"><i class="fa fa-circle-o"></i> Opname</a></li>
            <?php endif; ?>
			<?php if (__get_roles('ReportStock')) : ?>
            <li><a href="<?php echo site_url('reportstock'); ?>"><i class="fa fa-circle-o"></i> Stock</a></li>
            <?php endif; ?>
          </ul>
        </li>
		<?php endif; ?>
        <li>
		<?php if (__get_roles('PetiCash')) : ?>
		<a href="<?php echo site_url('peti_cash'); ?>">
			<i class="fa fa-outdent"></i> <span>Peti Cash</span>
		</a>
		</li>
		<?php endif; ?>
        <li>
		<a href="<?php echo site_url('dailyreport'); ?>">
			<i class="fa fa-question-circle"></i> <span>Daily Report</span>
		</a>
		</li>
		<?php if (__get_roles('Users') || __get_roles('UsersGroup')) : ?>
        <li class="treeview" rel="Users">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
              <span class="label bg-yellow pull-right">2</span>
            </span>
          </a>
          <ul class="treeview-menu">
			<?php if (__get_roles('Users')) : ?>
            <li><a href="<?php echo site_url('users'); ?>"><i class="fa fa-circle-o"></i> Users</a></li>
            <?php endif; ?>
			<?php if (__get_roles('UsersGroup')) : ?>
            <li><a href="<?php echo site_url('users/users_group'); ?>"><i class="fa fa-circle-o"></i> Users Group</a></li>
            <?php endif; ?>
          </ul>
        </li>
		<?php endif; ?>
        <li>
		<a href="<?php echo site_url('login/logout'); ?>" onclick="return confirm('<?php echo $this -> privileges -> sesresult['uemail']; ?>, are you sure you want to logout?');">
			<i class="fa fa-sign-in"></i> <span>Logout</span>
		</a>
		</li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
