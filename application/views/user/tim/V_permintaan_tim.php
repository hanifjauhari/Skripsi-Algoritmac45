<div class="dashboard-title fl-wrap">
	<h3>Permintaan Tim Baru</h3>
</div>


<?php if ( $permintaan->num_rows() > 0 ) {
        
        
    foreach ( $permintaan->result_array() AS $row ) :
?>
<!-- profile-edit-container-->
<div class="profile-edit-container fl-wrap block_box">

    <?php 
            
        $foto = "";

        if ( $row['foto'] ) {

            $foto = base_url('assets/img/profile-photos/'. $row['foto']);
        } else {

            $foto = base_url('assets/img/profile-photos/2.png');
        }
    ?>
    <!-- booking-list-->
	<div class="booking-list">
		<div class="booking-list-message">
			<div class="booking-list-contr">

                <?php if ( $row['status'] == "process" ) { ?>
				<a href="<?php echo base_url('user/tim/decision/accept/'. $row['id_profile'].'/'. $row['id_grup'].'/'. $row['id_futsalbergabung']) ?>" 
                class="green-bg tolt" data-microtip-position="left" data-tooltip="Disetujui"><i
						class="fal fa-check"></i></a>
				<a href="<?php echo base_url('user/tim/decision/decline/'. $row['id_profile'].'/'. $row['id_grup'].'/'. $row['id_futsalbergabung']) ?>" 
                class="color-bg tolt" data-microtip-position="left" data-tooltip="Ditolak"><i
						class="fal fa-times"></i></a>
                <?php } else {
                    
                    echo "Telah di ";
                    echo ($row['status'] == "accept") ? "setujui" : "ditolak" ;
                }?>
			</div>
			<div class="booking-list-message-avatar">
				<img src="<?php echo $foto ?>" alt="">
			</div>  

            <?php
            
                $text = "Proses";
                $color = "yellow";

                if ( $row['status'] == "accept" ) {

                    $color = "green";
                    $text = "Disetujui";
                } else if ( $row['status'] == "decline" ) {

                    $color = "red";
                    $text  = "Ditolak";
                }

            ?>
			<span class="booking-list-new <?php echo $color ?>-bg"><?php echo $text ?></span>
			<div class="booking-list-message-text">
				<h4><?php echo $row['nama_lengkap'] ?> - <span><?php echo date('d F Y H.i A', strtotime($row['dibuat_pada'])) ?></span></h4>
				
				<div class="booking-details fl-wrap">
					<span class="booking-title">Email :</span>
					<span class="booking-text"><?php echo $row['email'] ?></span>
				</div>
				<div class="booking-details fl-wrap">
					<span class="booking-title">Terdaftar pada :</span>
					<span class="booking-text"><?php echo date('d F Y H.i A', strtotime($row['registered_at'])) ?></span>
				</div>
				<span class="fw-separator"></span>
				
                Isi Pengajuan : 
                <p><?php echo $row['alasan'] ?></p>
			</div>
		</div>
	</div>
	<!-- dashboard-list end-->
</div>
<!-- profile-edit-container end-->

<?php 

        endforeach;
    } ?>