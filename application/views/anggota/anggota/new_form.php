<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("anggota/_partials/head.php") ?>
</head>

<body id="page-top">

	<?php $this->load->view("anggota/_partials/navbar.php") ?>
	<div id="wrapper">

		<?php $this->load->view("anggota/_partials/sidebar.php") ?>

		<div id="content-wrapper">

			<div class="container-fluid">

				<?php $this->load->view("anggota/_partials/breadcrumb.php") ?>

				<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>

				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('anggota/anggota/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url('anggota/anggota/add') ?>" method="post" enctype="multipart/form-data" >
							<div class="form-group">
								<label for="nik">Nik*</label>
								<input class="form-control <?= form_error('nik') ? 'is-invalid':'' ?>"
								 type="number" name="nik" placeholder="Nomor nik" />
								<div class="invalid-feedback">
									<?php echo form_error('nik') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="nama">Nama*</label>
								<input class="form-control <?php echo form_error('nama') ? 'is-invalid':'' ?>"
								 type="text" name="nama" min="0" placeholder="Kode jabatan" />
								<div class="invalid-feedback">
									<?php echo form_error('nama') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="jabatan">Jabatan*</label>
								<input class="form-control <?php echo form_error('jabatan') ? 'is-invalid':'' ?>"
								 type="text" name="jabatan" min="0" placeholder="Kode jabatan" />
								<div class="invalid-feedback">
									<?php echo form_error('jabatan') ?>
								</div>
							</div>
							<input class="btn btn-success" type="submit" name="btn" value="Save" />
						</form>

					</div>

					<div class="card-footer small text-muted">
						* required fields
					</div>


				</div>
				<!-- /.container-fluid -->

				<!-- Sticky Footer -->
				<?php $this->load->view("anggota/_partials/footer.php") ?>

			</div>
			<!-- /.content-wrapper -->

		</div>
		<!-- /#wrapper -->


		<?php $this->load->view("anggota/_partials/scrolltop.php") ?>

		<?php $this->load->view("anggota/_partials/js.php") ?>

</body>

</html>
