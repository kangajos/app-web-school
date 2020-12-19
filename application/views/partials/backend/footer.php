<footer class="main-footer">
	<div class="float-right d-none d-sm-block">
		<b>Version</b> 3.0.0
	</div>
	<strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
	reserved.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
	<!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- jQuery -->
<script src="<?= base_url('myassets/adminlte') ?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('myassets/adminlte') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script
	src="<?= base_url('myassets/adminlte') ?>/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('myassets/adminlte') ?>/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('myassets/adminlte') ?>/dist/js/demo.js"></script>
<!-- ChartJS -->
<script src="<?= base_url('myassets/adminlte') ?>/plugins/chart.js/Chart.min.js"></script>
<!-- Summernote -->
<script src="<?= base_url('myassets/adminlte') ?>/plugins/summernote/summernote-bs4.min.js"></script>
<!-- DataTables -->
<script src="<?= base_url('myassets/adminlte') ?>/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url('myassets/adminlte') ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- Select2 -->
<script src="<?= base_url('myassets/adminlte') ?>/plugins/select2/js/select2.full.min.js"></script>
<script>
	$(document).ready(function () {
		var btn = 91991;
		$("#addItinerary").on("click", function () {
			var itinerary = `<div class="form-group" id="del` + btn + `">
								<label for="">Conten Itinerary</label>
								<textarea name="itinerary[]" rows="4" class="form-control" placeholder="Typing..." required></textarea>
								<button type="button" id="` + btn + `" class="btn btn btn-danger btn-xs float-right del"><i class="fa fa-plus"></i> Delete Record Itinerary</button>&nbsp;
							</div>`;
			$(".itinerary").append(itinerary);
			btn++;
		})
		$(".itinerary").on("click", ".del", function () {
			var id = $(this).attr("id");
			$("#del"+id).remove();
		})
		$("table").DataTable();
		// Summernote
		$('.sumernote').summernote({
			height: 300
		});

		$('.custom-file-input').on('change', function () {
			var fileName = $(this).val().split("\\").pop();
			$(this).next('.custom-file-label').addClass("selected").html(fileName);
		})
		//Initialize Select2 Elements
		$('.select2').select2({
			theme: 'bootstrap4'
		})
	})
</script>

</body>
</html>
