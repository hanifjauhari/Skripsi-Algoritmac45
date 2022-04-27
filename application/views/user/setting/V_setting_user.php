<form action="<?php echo base_url('user/setting/proses_ubahakun') ?>" method="POST" enctype="multipart/form-data">


<?php echo $this->session->flashdata('pesan') ?>



<div class="dashboard-title fl-wrap">
	<h3>Pengaturan Akun</h3>
</div>


<!-- profile-edit-container-->
<div class="profile-edit-container fl-wrap block_box">
	<div class="custom-form">

		<label>Nama <i class="fal fa-briefcase"></i></label>
		<input type="text" name="nama" placeholder="Nama Lengkap" value="<?php echo $profile['nama_lengkap'] ?>" />


		<label>Email <i class="fal fa-envelope"></i></label>
		<input type="email" name="email" placeholder="Email" value="<?php echo $profile['email'] ?>" />
		

		<label>Foto Profile<i class="fal fa-briefcase"></i></label>
		<div class="add-list-media-wrap">

			<div class="listsearch-input-item fl-wrap">
				<div class="fuzone">

					<div class="fu-text">
						<span><i class="fal fa-images"></i> Klik untuk mengubah foto sampul</span>
						<div class="photoUpload-files fl-wrap"></div>
					</div>
					<input type="file" name="userfile_profile" class="upload">

				</div>
				<?php if ( $profile['foto'] ) { ?>
				<div style="text-align: left">
					<label>Foto Sampul : </label><a
							href="<?php echo base_url() ?>assets/img/profile-photos/<?php echo $profile['foto'] ?>"
						target="_blank" class="text-muted"><small><?php echo $profile['foto'] ?></small></a>
				</div>
				<?php } else { ?>

					<label for="">Belum memiliki foto profile</label>
				<?php } ?>
			</div>

		</div>


		<hr><br><br>

		
		<label>Username <i class="fal fa-user"></i></label>
		<input type="text" name="username" placeholder="Nama Lengkap" value="<?php echo $profile['username'] ?>" />


		<label>Kata Sandi <i class="fal fa-key"></i></label>
		<input type="text" name="password" placeholder="Nama Lengkap" value="<?php echo $profile['password'] ?>" />

		<br><br>

		<button style="margin-top: 11px" type="submit" class="btn color2-bg float-btn">Tambahkan dan Simpan<i class="fal fa-paper-plane"></i></button>


    </div>
</div>


</form>