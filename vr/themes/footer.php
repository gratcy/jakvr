  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 0.1.0
    </div>
    <strong>Copyright &copy; 2016 <a href="http://jakvr.com">JakVR</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab" class="side-panel"><i class="fa fa-home"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Today Stats</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-money bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">New Order</h4>

                <p class="side-panel-order"></p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Customer</h4>

                <p class="side-panel-customer"></p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-o bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Products</h4>

                <p class="side-panel-product"></p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-th-list bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Current Stock</h4>

                <p class="side-panel-stock"></p>
              </div>
            </a>
          </li>
        </ul>

      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- Bootstrap 3.3.6 -->
<script src="<?php echo themes_url('bootstrap/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo themes_url('bootstrap/js/app.js'); ?>"></script>
<script src="<?php echo themes_url('plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
<script src="<?php echo themes_url('plugins/chosen/chosen.jquery.min.js'); ?>"></script>
<script src="<?php echo themes_url('plugins/datatables/dataTables.bootstrap.min.js'); ?>"></script>
<script src="<?php echo themes_url('plugins/daterangepicker/moment.min.js'); ?>"></script>
<script src="<?php echo themes_url('plugins/daterangepicker/daterangepicker.js'); ?>"></script>
<script src="<?php echo themes_url('plugins/datetimepicker/build/jquery.datetimepicker.full.min.js'); ?>"></script>
<script src="<?php echo themes_url('plugins/jquery-ui.min.js'); ?>"></script>
<!-- Sparkline -->
<script src="<?php echo themes_url('plugins/slimScroll/jquery.slimscroll.min.js'); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo themes_url('dist/js/app.min.js'); ?>"></script>
<script src="<?php echo themes_url('dist/js/demo.js'); ?>"></script>
<script src="<?php echo themes_url('bootstrap/js/js.js'); ?>"></script>
<script>
  $(function () {
    $("#sTable").DataTable({"aaSorting": [], "pageLength": 25, "scrollX": true});

	$('#orderOthers').DataTable( {
		"processing": true,
		"serverSide": true,
		"bFilter": true,
		"ordering": true,
		"scrollX": true,
		"pageLength": 25,
		"ajax": '<?php echo site_url('order_others'); ?>',
		"columnDefs": [
			{ "orderable": false, "targets": 0 }
		],
	  <?php if (__get_roles('ProductPriceBase')) : ?>
		"columnDefs": [
			{ "orderable": false, "targets": 0 },
			{ "orderable": false, "targets": 12 },
		],
		"columns": [
			null,
			null,
			null,
			{ className: "aprice" },
			null,
			null,
			null,
			{ className: "aprice" },
			{ className: "aprice" },
			{ className: "tresi" },
			{ className: "tdesc" },
			null,
			null,
		],
		createdRow: function( row, data, dataIndex ) {
			$( row ).find('td:eq(9)').attr('idnya', $(data[0]).attr('value'));
			$( row ).find('td:eq(10)').attr('idnya', $(data[0]).attr('value'));
		}
		<?php else : ?>
		"columnDefs": [
			{ "orderable": false, "targets": 0 },
			{ "orderable": false, "targets": 11 },
		],
		"columns": [
			null,
			null,
			null,
			{ className: "aprice" },
			null,
			null,
			null,
			{ className: "aprice" },
			{ className: "tresi" },
			{ className: "tdesc" },
			null,
			null,
		],
		createdRow: function( row, data, dataIndex ) {
			$( row ).find('td:eq(8)').attr('idnya', $(data[0]).attr('value'));
			$( row ).find('td:eq(9)').attr('idnya', $(data[0]).attr('value'));
		}
		<?php endif; ?>
	} );
  });
</script>
<script type="text/javascript">
	if (/\/users/.test(window.location.href) === true) {
		$('li[rel="Users"]').addClass('active');
		$('li[rel="Users"] > ul.treeview-menu').css({'display': 'block', 'overflow': 'hidden'});
	}
	else if (/\/reporttransaction|reportopname|reportstock/.test(window.location.href) === true) {
		$('li[rel="Reports"]').addClass('active');
		$('li[rel="Reports"] > ul.treeview-menu').css({'display': 'block', 'overflow': 'hidden'});
	}
	else if (/\/request|transfer/.test(window.location.href) === true) {
		$('li[rel="Distribution"]').addClass('active');
		$('li[rel="Distribution"] > ul.treeview-menu').css({'display': 'block', 'overflow': 'hidden'});
	}
	else if (/\/receiving|inventory|opname/.test(window.location.href) === true) {
		$('li[rel="Inventory"]').addClass('active');
		$('li[rel="Inventory"] > ul.treeview-menu').css({'display': 'block', 'overflow': 'hidden'});
	}
	else if (/\/order|retur/.test(window.location.href) === true) {
		$('li[rel="SalesPurchase"]').addClass('active');
		$('li[rel="SalesPurchase"] > ul.treeview-menu').css({'display': 'block', 'overflow': 'hidden'});
	}
	else if (/\/customer|product|brand|branch|vendor|categories|reffer|logistics|country|city|province/.test(window.location.href) === true) {
		$('li[rel="Master"]').addClass('active');
		$('li[rel="Master"] > ul.treeview-menu').css({'display': 'block', 'overflow': 'hidden'});
	}
	
	$(function(){
		$('a.side-panel').click(function(){
			if ($('p.side-panel-order').html() == '') {
				$.post('<?php echo site_url('ajax/get_stats'); ?>', [],
				function(datas) {
					$('p.side-panel-order').append(datas.total.order);
					$('p.side-panel-customer').append(datas.total.customer);
					$('p.side-panel-product').append(datas.total.products);
					$('p.side-panel-stock').append(datas.total.stock);
				});
			}
		});
		
		$('.form-horizontal select').chosen({search_contains: true, no_results_text: "Oops, nothing found!"}); 
		
		$( document ).ajaxComplete(function() {
		$('.aprice').click(function(){
			var removeDot = $(this).html();
			removeDot = removeDot.replace(/\./g, '');
			$(this).html(removeDot);
		})
			$('.form-horizontal select').chosen({search_contains: true, no_results_text: "Oops, nothing found!"}); 
		});
		$('#DatePicker').datepicker({
			dateFormat: 'dd/mm/yy'
		});
		
		jQuery('#DateTimePicker').datetimepicker({
			format: 'd/m/Y h:i'
		});
		
		$('#monthyear').datepicker({
			changeMonth: true,
			changeYear: true,
			showButtonPanel: true,
			dateFormat: 'mm,yy'
		}).focus(function() {
			var thisCalendar = $(this);
			$('.ui-datepicker-calendar').detach();
			$('.ui-datepicker-close').click(function() {
				var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
				var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
				thisCalendar.datepicker('setDate', new Date(year, month, 1));
			});
		});

		$('#datesort').daterangepicker({
			dateFormat: 'DD/MM/YY'
		});
			
		$('select[name="switchbranch"]').change(function(){
			window.location.href = '/switchbranch/' + $(this).val();
		});
	});
	
	$('.aprice').click(function(){
		var removeDot = $(this).html();
		removeDot = removeDot.replace(/\./g, '');
		$(this).html(removeDot);
	})
</script>

</body>
</html>
