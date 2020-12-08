<main id="js-page-content" role="main" class="page-content">
<div class="row">
    <div class="col-xl-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>Data Pesanan Read</h2>
                <div class="panel-toolbar">
                    <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                    <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                    <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                </div>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
        <table class="table table-striped">
	    <tr><td>No Pesanan</td><td><?php echo $no_pesanan; ?></td></tr>
	    <tr><td>Id Survei</td><td><?php echo $id_survei; ?></td></tr>
	    <tr><td>Id Tipe Pesanan</td><td><?php echo $id_tipe_pesanan; ?></td></tr>
	    <tr><td>Id Jenis Bahan</td><td><?php echo $id_jenis_bahan; ?></td></tr>
	    <tr><td>P</td><td><?php echo $p; ?></td></tr>
	    <tr><td>L</td><td><?php echo $l; ?></td></tr>
	    <tr><td>T</td><td><?php echo $t; ?></td></tr>
	    <tr><td>Note</td><td><?php echo $note; ?></td></tr>
	    <tr><td>Id Status</td><td><?php echo $id_status; ?></td></tr>
	    <tr><td>Created Date</td><td><?php echo $created_date; ?></td></tr>
	    <tr><td>Users</td><td><?php echo $users; ?></td></tr>
	    <tr><td>Is Deleted</td><td><?php echo $is_deleted; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('t_pesanan') ?>" class="btn btn-primary waves-effect waves-themed">Kembali</a></td></tr>
	</table>
</div>
</div>

            </div>
        </div>
    </div>
</main>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>