<form action="<?php echo site_url('t_po/create_file') ?>" method="post" enctype="multipart/form-data">
    <input class="form-control" type="hidden" name="id_pelanggan" value="<?php echo $id_pelanggan ?>">
    <input class="form-control" type="hidden" name="id_po" value="<?php echo $id_po ?>">
    <table class='table table-striped'>
        <tr>
            <td width='200'>Keterangan</td>
            <td><textarea class="form-control" type="text" name="keterangan" value="" required></textarea></td>
        </tr>
        <tr>
            <td width='200'>File</td>
            <td><input type="file" class="form-control-file" name="gambar" required></td>
        </tr>
        <tr>
            <td colspan="2">
                <button type="submit" class="btn btn-block btn-warning">Simpan</button>
            </td>
        </tr>
    </table>
    <hr>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped w-100">
            <thead class="thead-themed">
                <tr>
                    <th width="30px">No</th>
                    <th>Keterangan</th>
                    <th>File</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($list as $row) { ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $row->keterangan ?></td>
                        <td><a href="<?php echo site_url('assets/rab/' . $row->file) ?>" target="_blank" class="btn btn-xs btn-success">Lihat</a></td>
                        <td>
                            <a href="<?php echo site_url('T_po/delete_file/' . $row->id . '/' . $id_pelanggan); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Are You Sure ?');"><i class="fal fa-trash" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</form>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>