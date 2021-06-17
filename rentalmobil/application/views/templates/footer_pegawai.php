<!-- /.content-wrapper -->
<footer class="main-footer text-sm shadow-0">
	<strong>Copyright &copy; 2021 - RPL Kelompok 7</strong>
	<!-- All rights reserved.
	<div class="float-right d-none d-sm-inline-block">
		<b>Version</b> 3.1.0-rc
	</div> -->
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
	<!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url('assets/');?>plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url('assets/');?>plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
	$.widget.bridge('uibutton', $.ui.button)
	$.widget.bridge('uitooltip', $.ui.tooltip);

</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/');?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?= base_url('assets/');?>plugins/sweetalert2/sweetalert2.all.min.js"></script>
<!-- Select2 -->
<script src="<?= base_url('assets/');?>plugins/select2/js/select2.full.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url('assets/');?>plugins/chart.js/Chart.min.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url('assets/');?>plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url('assets/');?>plugins/moment/moment.min.js"></script>
<script src="<?= base_url('assets/');?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url('assets/');?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?= base_url('assets/');?>plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url('assets/');?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/');?>dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('assets/');?>dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url('assets/');?>dist/js/pages/dashboard.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>
<!-- Datatables -->
<script src="<?= base_url('assets/');?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/');?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/');?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('assets/');?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/');?>plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url('assets/');?>plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/');?>plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url('assets/');?>plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url('assets/');?>plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url('assets/');?>plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url('assets/');?>plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url('assets/');?>plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script>
	// JAVASCRIPT UNTUK UPLOAD FILE
	$(document).ready(function () {
		bsCustomFileInput.init()
	})

	// JAVASCRIPT UNTUK TOOLTIP BUTTON
	$(document).ready(function () {
		$('[data-toggle="tooltip"]').tooltip();
	});

	// JAVASCRIPT UNTUK SELECT2
	$(function () {
		//Initialize Select2 Elements
		$('.select2').select2()

		//Initialize Select2 Elements
		$('.select2bs4').select2({
			theme: 'bootstrap4'
		})
	})

	// JAVASCRIPT UNTUK DATATABLES
	$(function () {
		$("#datapegawai").DataTable({
			"responsive": true,
			"lengthChange": false,
			"autoWidth": false,
			"ordering": true,

			//DATATABLES UNTUK TOMBOL COPY EXCEL PDF
			buttons: [{
					extend: 'excelHtml5',
					exportOptions: {
						columns: [0, 1, 2, 3, 4, 5, 6, 7]
					}
				},
				{
					extend: 'pdfHtml5',
					exportOptions: {
						columns: [0, 1, 2, 3, 4, 5, 6, 7]
					}
				},
				{
					extend: 'print',
					exportOptions: {
						columns: [0, 1, 2, 3, 4, 5, 6, 7]
					}
				},
				'colvis'
			],
			language: {
				buttons: {
					colvis: '<i class="far fa-eye mr-1 text-sm"></i>',
					excel: '<span class="text-sm">Excel</span>',
					pdf: '<span class="text-sm">PDF</span>',
					print: '<span class="text-sm">Print</span>',
				}
			},
		}).buttons().container().appendTo('#datapegawai_wrapper .col-md-6:eq(0)');
		
		$("#datacustomer").DataTable({
			"responsive": true,
			"lengthChange": false,
			"autoWidth": false,
			"ordering": true,

			//DATATABLES UNTUK TOMBOL COPY EXCEL PDF
			buttons: [{
					extend: 'excelHtml5',
					exportOptions: {
						columns: [0, 1, 2, 3, 4, 5, 6, 7]
					}
				},
				{
					extend: 'pdfHtml5',
					exportOptions: {
						columns: [0, 1, 2, 3, 4, 5, 6, 7]
					}
				},
				{
					extend: 'print',
					exportOptions: {
						columns: [0, 1, 2, 3, 4, 5, 6, 7]
					}
				},
				'colvis'
			],
			language: {
				buttons: {
					colvis: '<i class="far fa-eye mr-1 text-sm"></i>',
					excel: '<span class="text-sm">Excel</span>',
					pdf: '<span class="text-sm">PDF</span>',
					print: '<span class="text-sm">Print</span>',
				}
			},
			columnDefs: [
				{ width: '1%', targets: 0 },
				{ width: '1%', targets: 2 },
				{ width: '10%', targets: 9 }
			],
		}).buttons().container().appendTo('#datacustomer_wrapper .col-md-6:eq(0)');
		
		$("#datamobil").DataTable({
			"responsive": true,
			"lengthChange": false,
			"autoWidth": false,
			"ordering": true,

			//DATATABLES UNTUK TOMBOL COPY EXCEL PDF
			buttons: [
				{
					extend: 'excelHtml5',
					exportOptions: {
						columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9]
					}
				},
				{
					extend: 'pdfHtml5',
					exportOptions: {
						columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9]
					}
				},
				{
					extend: 'print',
					exportOptions: {
						columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9]
					}
				},
				'colvis',
			],
			language: {
				buttons: {
					colvis: '<i class="far fa-eye mr-1"></span>',
					excel: '<span class="text-sm">Excel</span>',
					pdf: '<span class="text-sm">PDF</span>',
					print: '<span class="text-sm">Print</span>',
				}
			},
			columnDefs: [
				{ width: '1%', targets: 0 },
				{ width: '11%', targets: 10 }
			],
		}).buttons().container().appendTo('#datamobil_wrapper .col-md-6:eq(0)');

		$("#datajenismobil").DataTable({
			"responsive": true,
			"lengthChange": false,
			"autoWidth": false,
			"ordering": true,

			//DATATABLES UNTUK TOMBOL COPY EXCEL PDF
			buttons: [{
					extend: 'excelHtml5',
					exportOptions: {
						columns: [0, 1]
					}
				},
				{
					extend: 'pdfHtml5',
					exportOptions: {
						columns: [0, 1]
					}
				},
				{
					extend: 'print',
					exportOptions: {
						columns: [0, 1]
					}
				}
			],
			language: {
				buttons: {
					excel: '<span class="text-sm">Excel</span>',
					pdf: '<span class="text-sm">PDF</span>',
					print: '<span class="text-sm">Print</span>',
				}
			},
		}).buttons().container().appendTo('#datajenismobil_wrapper .col-md-6:eq(0)');

		$("#datamerkmobil").DataTable({
			"responsive": true,
			"lengthChange": false,
			"autoWidth": false,
			"ordering": true,

			//DATATABLES UNTUK TOMBOL COPY EXCEL PDF
			buttons: [{
					extend: 'excelHtml5',
					exportOptions: {
						columns: [0, 1]
					}
				},
				{
					extend: 'pdfHtml5',
					exportOptions: {
						columns: [0, 1]
					}
				},
				{
					extend: 'print',
					exportOptions: {
						columns: [0, 1]
					}
				}
			],
			language: {
				buttons: {
					excel: '<span class="text-sm">Excel</span>',
					pdf: '<span class="text-sm">PDF</span>',
					print: '<span class="text-sm">Print</span>',
				}
			},
		}).buttons().container().appendTo('#datamerkmobil_wrapper .col-md-6:eq(0)');

		$("#dataserimobil").DataTable({
			"responsive": true,
			"lengthChange": false,
			"autoWidth": false,
			"ordering": true,

			//DATATABLES UNTUK TOMBOL COPY EXCEL PDF
			buttons: [{
					extend: 'excelHtml5',
					exportOptions: {
						columns: [0, 1, 2]
					}
				},
				{
					extend: 'pdfHtml5',
					exportOptions: {
						columns: [0, 1, 2]
					}
				},
				{
					extend: 'print',
					exportOptions: {
						columns: [0, 1, 2]
					}
				}
			],
			language: {
				buttons: {
					excel: '<span class="text-sm">Excel</span>',
					pdf: '<span class="text-sm">PDF</span>',
					print: '<span class="text-sm">Print</span>',
				}
			},
		}).buttons().container().appendTo('#dataserimobil_wrapper .col-md-6:eq(0)');

		$("#datametodebayar").DataTable({
			"responsive": true,
			"lengthChange": false,
			"autoWidth": false,
			"ordering": true,

			//DATATABLES UNTUK TOMBOL COPY EXCEL PDF
			buttons: [{
					extend: 'excelHtml5',
					exportOptions: {
						columns: [0, 1]
					}
				},
				{
					extend: 'pdfHtml5',
					exportOptions: {
						columns: [0, 1]
					}
				},
				{
					extend: 'print',
					exportOptions: {
						columns: [0, 1]
					}
				}
			],
			language: {
				buttons: {
					excel: '<span class="text-sm">Excel</span>',
					pdf: '<span class="text-sm">PDF</span>',
					print: '<span class="text-sm">Print</span>',
				}
			},
		}).buttons().container().appendTo('#datametodebayar_wrapper .col-md-6:eq(0)');
		
		$("#datarole").DataTable({
			"responsive": true,
			"lengthChange": false,
			"autoWidth": false,
			"ordering": true,

			//DATATABLES UNTUK TOMBOL COPY EXCEL PDF
			buttons: [{
					extend: 'excelHtml5',
					exportOptions: {
						columns: [0, 1, 2]
					}
				},
				{
					extend: 'pdfHtml5',
					exportOptions: {
						columns: [0, 1, 2]
					}
				},
				{
					extend: 'print',
					exportOptions: {
						columns: [0, 1, 2]
					}
				}
			],
			language: {
				buttons: {
					excel: '<span class="text-sm">Excel</span>',
					pdf: '<span class="text-sm">PDF</span>',
					print: '<span class="text-sm">Print</span>',
				}
			},
		}).buttons().container().appendTo('#datarole_wrapper .col-md-6:eq(0)');
	})

	// JAVASCRIPT UNTUK SWEETALERT
	const flashDataCustomer = $('.flash-data-data-customer').data('flashdata');
	if (flashDataCustomer) {
		Swal.fire(
			'Data Customer',
			'Berhasil ' + flashDataCustomer + '!',
			'success'
		);
	}
	
	const flashDataPegawai = $('.flash-data-pegawai').data('flashdata');
	if (flashDataPegawai) {
		Swal.fire(
			'Data Pegawai',
			'Berhasil ' + flashDataPegawai + '!',
			'success'
		);
	}

	const flashDataMobil = $('.flash-data-mobil').data('flashdata');
	if (flashDataMobil) {
		Swal.fire(
			'Data Mobil',
			'Berhasil ' + flashDataMobil + '!',
			'success'
		);
	}
	
	const flashDataMerk = $('.flash-data-merk').data('flashdata');
	if (flashDataMerk) {
		Swal.fire(
			'Data Merk Mobil',
			'Berhasil ' + flashDataMerk + '!',
			'success'
		);
	}

	const flashDataSeri = $('.flash-data-seri').data('flashdata');
	if (flashDataSeri) {
		Swal.fire(
			'Data Seri Mobil',
			'Berhasil ' + flashDataSeri + '!',
			'success'
		);
	}
	
	const flashDataJenis = $('.flash-data-jenis').data('flashdata');
	if (flashDataJenis) {
		Swal.fire(
			'Data Jenis Mobil',
			'Berhasil ' + flashDataJenis + '!',
			'success'
		);
	}
	
	const flashDataMetode = $('.flash-data-metode').data('flashdata');
	if (flashDataMetode) {
		Swal.fire(
			'Data Metode Pembayaran',
			'Berhasil ' + flashDataMetode + '!',
			'success'
		);
	}
	
	const flashDataRole = $('.flash-data-role').data('flashdata');
	if (flashDataRole) {
		Swal.fire(
			'Data Jabatan Pegawai',
			'Berhasil ' + flashDataRole + '!',
			'success'
		);
	}

	$('.tombol-nonaktifkan-customer').on('click', function (e) {

		e.preventDefault();
		const href = $(this).attr('href');

		Swal.fire({
			title: 'Apakah Anda yakin?',
			text: "Customer tersebut akan dinonaktifkan!",
			icon: 'warning',
			showCancelButton: true,
			cancelButtonText: 'Batal',
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Nonaktifkan'
		}).then((result) => {
			if (result.isConfirmed) {
				document.location.href = href;
			}
		})
	})

	$('.tombol-aktifkan-customer').on('click', function (e) {

		e.preventDefault();
		const href = $(this).attr('href');

		Swal.fire({
			title: 'Apakah Anda yakin?',
			text: "Customer tersebut akan diaktifkan!",
			icon: 'warning',
			showCancelButton: true,
			cancelButtonText: 'Batal',
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Aktifkan'
		}).then((result) => {
			if (result.isConfirmed) {
				document.location.href = href;
			}
		})
	})

	$('.tombol-nonaktifkan-pegawai').on('click', function (e) {

		e.preventDefault();
		const href = $(this).attr('href');

		Swal.fire({
			title: 'Apakah Anda yakin?',
			text: "Pegawai tersebut akan dinonaktifkan!",
			icon: 'warning',
			showCancelButton: true,
			cancelButtonText: 'Batal',
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Nonaktifkan'
		}).then((result) => {
			if (result.isConfirmed) {
				document.location.href = href;
			}
		})
	})

	$('.tombol-aktifkan-pegawai').on('click', function (e) {

		e.preventDefault();
		const href = $(this).attr('href');

		Swal.fire({
			title: 'Apakah Anda yakin?',
			text: "Pegawai tersebut akan diaktifkan!",
			icon: 'warning',
			showCancelButton: true,
			cancelButtonText: 'Batal',
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Aktifkan'
		}).then((result) => {
			if (result.isConfirmed) {
				document.location.href = href;
			}
		})
	})

	$('.tombol-nonaktifkan-mobil').on('click', function (e) {

		e.preventDefault();
		const href = $(this).attr('href');

		Swal.fire({
			title: 'Apakah Anda yakin?',
			text: "Data mobil tersebut akan dinonaktifkan!",
			icon: 'warning',
			showCancelButton: true,
			cancelButtonText: 'Batal',
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Nonaktifkan'
		}).then((result) => {
			if (result.isConfirmed) {
				document.location.href = href;
			}
		})
	})
	
	$('.tombol-aktifkan-mobil').on('click', function (e) {

		e.preventDefault();
		const href = $(this).attr('href');

		Swal.fire({
			title: 'Apakah Anda yakin?',
			text: "Data mobil tersebut akan diaktifkan!",
			icon: 'warning',
			showCancelButton: true,
			cancelButtonText: 'Batal',
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Aktifkan'
		}).then((result) => {
			if (result.isConfirmed) {
				document.location.href = href;
			}
		})
	})

	$('.tombol-nonaktifkan-jenis').on('click', function (e) {

		e.preventDefault();
		const href = $(this).attr('href');

		Swal.fire({
			title: 'Apakah Anda yakin?',
			text: "Semua data mobil dengan jenis ini akan ikut dinonaktifkan!",
			icon: 'warning',
			showCancelButton: true,
			cancelButtonText: 'Batal',
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Nonaktifkan'
		}).then((result) => {
			if (result.isConfirmed) {
				document.location.href = href;
			}
		})
	})

	$('.tombol-aktifkan-jenis').on('click', function (e) {

		e.preventDefault();
		const href = $(this).attr('href');

		Swal.fire({
			title: 'Apakah Anda yakin?',
			text: "Data jenis tersebut akan diaktifkan!",
			icon: 'warning',
			showCancelButton: true,
			cancelButtonText: 'Batal',
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Aktifkan'
		}).then((result) => {
			if (result.isConfirmed) {
				document.location.href = href;
			}
		})
	})

	$('.tombol-nonaktifkan-merk').on('click', function (e) {

		e.preventDefault();
		const href = $(this).attr('href');

		Swal.fire({
			title: 'Apakah Anda yakin?',
			text: "Semua data mobil yang terhubung dengan merk ini akan dinonaktifkan!",
			icon: 'warning',
			showCancelButton: true,
			cancelButtonText: 'Batal',
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Nonaktifkan'
		}).then((result) => {
			if (result.isConfirmed) {
				document.location.href = href;
			}
		})
	})
	
	$('.tombol-aktifkan-merk').on('click', function (e) {

		e.preventDefault();
		const href = $(this).attr('href');

		Swal.fire({
			title: 'Apakah Anda yakin?',
			text: "Semua data mobil yang terhubung dengan merk ini akan diaktifkan!",
			icon: 'warning',
			showCancelButton: true,
			cancelButtonText: 'Batal',
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Aktifkan'
		}).then((result) => {
			if (result.isConfirmed) {
				document.location.href = href;
			}
		})
	})
	
	$('.tombol-nonaktifkan-seri').on('click', function (e) {

		e.preventDefault();
		const href = $(this).attr('href');

		Swal.fire({
			title: 'Apakah Anda yakin?',
			text: "Semua data mobil yang terhubung dengan seri ini akan dinonaktifkan!",
			icon: 'warning',
			showCancelButton: true,
			cancelButtonText: 'Batal',
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Nonaktifkan'
		}).then((result) => {
			if (result.isConfirmed) {
				document.location.href = href;
			}
		})
	})
	
	$('.tombol-aktifkan-seri').on('click', function (e) {

		e.preventDefault();
		const href = $(this).attr('href');

		Swal.fire({
			title: 'Apakah Anda yakin?',
			text: "Semua data mobil yang terhubung dengan seri ini akan diaktifkan!",
			icon: 'warning',
			showCancelButton: true,
			cancelButtonText: 'Batal',
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Aktifkan'
		}).then((result) => {
			if (result.isConfirmed) {
				document.location.href = href;
			}
		})
	})

	$('.tombol-hapus-role').on('click', function (e) {

		e.preventDefault();
		const href = $(this).attr('href');

		Swal.fire({
			title: 'Apakah Anda yakin?',
			text: "Pegawai dengan jabatan ini akan ikut dinonaktifkan!",
			icon: 'warning',
			showCancelButton: true,
			cancelButtonText: 'Batal',
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Nonaktifkan'
		}).then((result) => {
			if (result.isConfirmed) {
				document.location.href = href;
			}
		})
	})
	
	$('.tombol-aktifkan-role').on('click', function (e) {

		e.preventDefault();
		const href = $(this).attr('href');

		Swal.fire({
			title: 'Apakah Anda yakin?',
			text: "Pegawai dengan jabatan ini akan ikut diaktifkan!",
			icon: 'warning',
			showCancelButton: true,
			cancelButtonText: 'Batal',
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Aktifkan'
		}).then((result) => {
			if (result.isConfirmed) {
				document.location.href = href;
			}
		})
	})
	
	$('.tombol-nonaktifkan-metode').on('click', function (e) {

		e.preventDefault();
		const href = $(this).attr('href');

		Swal.fire({
			title: 'Apakah Anda yakin?',
			text: "Semua data transaksi dengan metode pembayaran ini akan ikut dinonaktifkan!",
			icon: 'warning',
			showCancelButton: true,
			cancelButtonText: 'Batal',
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Nonaktifkan'
		}).then((result) => {
			if (result.isConfirmed) {
				document.location.href = href;
			}
		})
	})

	$('.tombol-aktifkan-metode').on('click', function (e) {

		e.preventDefault();
		const href = $(this).attr('href');

		Swal.fire({
			title: 'Apakah Anda yakin?',
			text: "Semua data transaksi dengan metode pembayaran ini akan ikut diaktifkan!",
			icon: 'warning',
			showCancelButton: true,
			cancelButtonText: 'Batal',
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Aktifkan'
		}).then((result) => {
			if (result.isConfirmed) {
				document.location.href = href;
			}
		})
	})

	// JAVASCRIPT FORM MODAL
	$('#form-tambah-merk').submit(function (e) {
		e.preventDefault();
		var fa = $(this);

		$.ajax({
			url: fa.attr('action'),
			type: 'post',
			data: fa.serialize(),
			dataType: 'json',
			success: function (response) {
				// console.log(response);
				if (response.success == true) {
					$('.form-control').removeClass('is-invalid')
						.removeClass('is-valid');
					$('.text-danger').remove();
					fa[0].reset();
					$('#tambah-merk').modal('hide');
					window.location.replace('<?= base_url('mobil/merkserimobil');?>');

				} else {
					$.each(response.messages, function (key, value) {
						var element = $('#' + key);
						// console.log(element);
						element.closest('.form-control')
							.removeClass('is-invalid')
							.addClass(value.length > 0 ? 'is-invalid' : 'is-valid')
						element.closest('.col-sm')
							.find('.text-danger')
							.remove();
						element.after(value);
					});
				}
			}
		});
	});

	$('#form-tambah-seri').submit(function (e) {
		e.preventDefault();
		var fa = $(this);

		$.ajax({
			url: fa.attr('action'),
			type: 'post',
			data: fa.serialize(),
			dataType: 'json',
			success: function (response) {
				// console.log(response);
				if (response.success == true) {
					$('.form-control').removeClass('is-invalid')
						.removeClass('is-valid');
					$('.text-danger').remove();
					fa[0].reset();
					$('#tambah-seri').modal('hide');
					window.location.replace('<?= base_url('mobil/merkserimobil');?>');

				} else {
					$.each(response.messages, function (key, value) {
						var element = $('#' + key);
						element.closest('.form-control')
							.removeClass('is-invalid')
							.addClass(value.length > 0 ? 'is-invalid' : 'is-valid')
						element.closest('.col-sm')
							.find('.text-danger')
							.remove();
						element.after(value);
					});
				}
			}
		});
	});
	
	$('#form-tambah-jenis').submit(function (e) {
		e.preventDefault();
		var fa = $(this);

		$.ajax({
			url: fa.attr('action'),
			type: 'post',
			data: fa.serialize(),
			dataType: 'json',
			success: function (response) {
				console.log(response);
				if (response.success == true) {
					$('.form-control').removeClass('is-invalid')
						.removeClass('is-valid');
					$('.text-danger').remove();
					fa[0].reset();
					$('#tambah-jenis').modal('hide');
					window.location.replace('<?= base_url('mobil/jenismobil');?>');

				} else {
					$.each(response.messages, function (key, value) {
						var element = $('#' + key);
						element.closest('.form-control')
							.removeClass('is-invalid')
							.addClass(value.length > 0 ? 'is-invalid' : 'is-valid')
						element.closest('.col-sm')
							.find('.text-danger')
							.remove();
						element.after(value);
					});
				}
			}
		});
	});
	
	$('#form-tambah-metode').submit(function (e) {
		e.preventDefault();
		var fa = $(this);

		$.ajax({
			url: fa.attr('action'),
			type: 'post',
			data: fa.serialize(),
			dataType: 'json',
			success: function (response) {
				console.log(response);
				if (response.success == true) {
					$('.form-control').removeClass('is-invalid')
						.removeClass('is-valid');
					$('.text-danger').remove();
					fa[0].reset();
					$('#tambah-metode').modal('hide');
					window.location.replace('<?= base_url('pegawai/datatransaksi/metodebayar');?>');

				} else {
					$.each(response.messages, function (key, value) {
						var element = $('#' + key);
						element.closest('.form-control')
							.removeClass('is-invalid')
							.addClass(value.length > 0 ? 'is-invalid' : 'is-valid')
						element.closest('.col-sm')
							.find('.text-danger')
							.remove();
						element.after(value);
					});
				}
			}
		});
	});
	
	$('#form-tambah-role').submit(function (e) {
		e.preventDefault();
		var fa = $(this);

		$.ajax({
			url: fa.attr('action'),
			type: 'post',
			data: fa.serialize(),
			dataType: 'json',
			success: function (response) {
				console.log(response);
				if (response.success == true) {
					$('.form-control').removeClass('is-invalid')
						.removeClass('is-valid');
					$('.text-danger').remove();
					fa[0].reset();
					$('#tambah-role').modal('hide');
					window.location.replace('<?= base_url('pegawai/datapegawai/jabatan');?>');

				} else {
					$.each(response.messages, function (key, value) {
						var element = $('#' + key);
						element.closest('.form-control')
							.removeClass('is-invalid')
							.addClass(value.length > 0 ? 'is-invalid' : 'is-valid')
						element.closest('.col-sm')
							.find('.text-danger')
							.remove();
						element.after(value);
					});
				}
			}
		});
	});
	
	$('.modal-content #form-ubah-merk').submit(function (e) {
		e.preventDefault();
		var fa = $(this);

		$.ajax({
			url: fa.attr('action'),
			type: 'post',
			data: fa.serialize(),
			dataType: 'json',
			success: function (response) {
				// console.log(response);
				if (response.success == true) {
					$('.form-control').removeClass('is-invalid')
						.removeClass('is-valid');
					$('.text-danger').remove();
					// fa[0].reset();
					$('#ubah-merk').modal('hide');
					window.location.replace('<?= base_url('mobil/merkserimobil');?>');

				} else {
					// alert('Error');
					$.each(response.messages, function (key, value) {
						var element = $('.col-sm #' + key);
						element.closest('.form-control')
							.removeClass('is-invalid')
							.addClass(value.length > 0 ? 'is-invalid' : 'is-valid')
						element.closest('.col-sm')
							.find('.text-danger')
							.remove()
						element.after(value);
						// console.log(element.after(value));
					});
				}
			}
		});
	});
	
	$('.modal-content #form-ubah-seri').submit(function (e) {
		e.preventDefault();
		var fa = $(this);

		$.ajax({
			url: fa.attr('action'),
			type: 'post',
			data: fa.serialize(),
			dataType: 'json',
			success: function (response) {
				// console.log(response);
				if (response.success == true) {
					$('.form-control').removeClass('is-invalid')
						.removeClass('is-valid');
					$('.text-danger').remove();
					// fa[0].reset();
					$('#ubah-seri').modal('hide');
					window.location.replace('<?= base_url('mobil/merkserimobil');?>');

				} else {
					// alert('Error');
					$.each(response.messages, function (key, value) {
						var element = $('.col-sm #' + key);
						element.closest('.form-control')
							.removeClass('is-invalid')
							.addClass(value.length > 0 ? 'is-invalid' : 'is-valid')
						element.closest('.col-sm')
							.find('.text-danger')
							.remove()
						element.after(value);
						// console.log(element.after(value));
					});
				}
			}
		});
	});
	
	$('.modal-content #form-ubah-jenis').submit(function (e) {
		e.preventDefault();
		var fa = $(this);

		$.ajax({
			url: fa.attr('action'),
			type: 'post',
			data: fa.serialize(),
			dataType: 'json',
			success: function (response) {
				// console.log(response);
				if (response.success == true) {
					$('.form-control').removeClass('is-invalid')
						.removeClass('is-valid');
					$('.text-danger').remove();
					// fa[0].reset();
					$('#ubah-jenis').modal('hide');
					window.location.replace('<?= base_url('mobil/jenismobil');?>');

				} else {
					// alert('Error');
					$.each(response.messages, function (key, value) {
						var element = $('.col-sm #' + key);
						element.closest('.form-control')
							.removeClass('is-invalid')
							.addClass(value.length > 0 ? 'is-invalid' : 'is-valid')
						element.closest('.col-sm')
							.find('.text-danger')
							.remove()
						element.after(value);
						// console.log(element.after(value));
					});
				}
			}
		});
	});
	
	$('.modal-content #form-ubah-metode').submit(function (e) {
		e.preventDefault();
		var fa = $(this);

		$.ajax({
			url: fa.attr('action'),
			type: 'post',
			data: fa.serialize(),
			dataType: 'json',
			success: function (response) {
				// console.log(response);
				if (response.success == true) {
					$('.form-control').removeClass('is-invalid')
						.removeClass('is-valid');
					$('.text-danger').remove();
					// fa[0].reset();
					$('#ubah-jenis').modal('hide');
					window.location.replace('<?= base_url('pegawai/datatransaksi/metodebayar');?>');

				} else {
					// alert('Error');
					$.each(response.messages, function (key, value) {
						var element = $('.col-sm #' + key);
						element.closest('.form-control')
							.removeClass('is-invalid')
							.addClass(value.length > 0 ? 'is-invalid' : 'is-valid')
						element.closest('.col-sm')
							.find('.text-danger')
							.remove()
						element.after(value);
					});
				}
			}
		});
	});
	
	$('.modal-content #form-ubah-role').submit(function (e) {
		e.preventDefault();
		var fa = $(this);

		$.ajax({
			url: fa.attr('action'),
			type: 'post',
			data: fa.serialize(),
			dataType: 'json',
			success: function (response) {
				// console.log(response);
				if (response.success == true) {
					$('.form-control').removeClass('is-invalid')
						.removeClass('is-valid');
					$('.text-danger').remove();
					// fa[0].reset();
					$('#ubah-jenis').modal('hide');
					window.location.replace('<?= base_url('pegawai/datapegawai/jabatan');?>');

				} else {
					// alert('Error');
					$.each(response.messages, function (key, value) {
						var element = $('.col-sm #' + key);
						element.closest('.form-control')
							.removeClass('is-invalid')
							.addClass(value.length > 0 ? 'is-invalid' : 'is-valid')
						element.closest('.col-sm')
							.find('.text-danger')
							.remove()
						element.after(value);
					});
				}
			}
		});
	});

</script>
</body>

</html>
