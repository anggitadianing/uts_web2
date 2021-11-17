<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Form Edit</title>
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.min.css">
</head>

<body>
    <div class="container-lg">
        <form method="post" action="<?php echo base_url(); ?>index.php/Uts/Update" enctype="multipart/form-data">
            <table class="table table-borderless">
                <tr>
                    <th colspan="3">
                        Data Pegawai
                    </th>
                </tr>
                <tr>
                    <td colspan="3">
                        <hr>
                    </td>
                </tr>
                <tr>
                    <th>Nip</th>
                    <td>:</td>
                    <td>
                        <input type="text" name="nip" value="<?= $nip; ?>" placeholder="Masukkan Nip">
                    </td>
                    <td><?php echo form_error('nip'); ?></td>
                </tr>
                <tr>
                    <th>Nama</th>
                    <td>:</td>
                    <td>
                        <input type="text" name="nama" id="nama" value="<?= $nama; ?>" placeholder="Masukkan Nama Pegawai">
                    </td>
                    <td><?php echo form_error('nama'); ?></td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>:</td>
                    <td>
                        <input type="radio" name="status" value="Menikah" <?php if ($status == "Menikah") echo 'checked'; ?>>Menikah
                        <input type="radio" name="status" value="Belum Menikah" <?php if ($status == "Belum Menikah") echo 'checked'; ?>>Belum Menikah
                    </td>
                    <td><?php echo form_error('status'); ?></td>
                </tr>
                <tr>
                    <th>Jabatan</th>
                    <td>:</td>
                    <td>
                        <select name="jabatan">
                            <option value="">Pilih..</option>
                            <option value="Staff" <?php if ($jabatan == "Staff") echo 'selected'; ?>>Staff</option>
                            <option value="Sekretaris" <?php if ($jabatan == "Sekretaris") echo 'selected'; ?>>Sekretaris</option>
                            <option value="Marketing" <?php if ($jabatan == "Marketing") echo 'selected'; ?>>Marketing</option>
                        </select>
                    </td>
                    <td><?php echo form_error('jabatan'); ?></td>
                </tr>
                <tr>
                    <th>Gaji</th>
                    <td>:</td>
                    <td>
                        <input type="text" name="gaji" value="<?= $gaji; ?>" placeholder="">
                    </td>
                    <td><?php echo form_error('gaji'); ?></td>
                </tr>
                <tr>
                    <th>Tunjangan</th>
                    <td>:</td>
                    <td>
                        <input type="text" name="tunjangan" value="<?= $tunjangan; ?>" placeholder="">
                    </td>
                    <td><?php echo form_error('tunjangan'); ?></td>
                </tr>
                <tr>
                    <th>Foto</th>
                    <td>:</td>
                    <td>
                        <input type="file" name="foto" id="foto" accept="image/*">
                        <?php echo form_error('foto'); ?><br>
                        <?php
                        if ($foto == "") {
                        ?>
                            <img src="<?php echo base_url(); ?>assets/img/180900.jpg" width="100">
                        <?php
                        } else {
                        ?>
                            <img src="<?php echo base_url(); ?>upload/<?= $foto; ?>" width="100">
                        <?php
                        }
                        ?>
                        <input type="hidden" name="nip_hidden" value="<?= $nip; ?>">
                        <input type="hidden" name="hidden_foto" value="<?= $foto; ?>">
                    </td>
                </tr>
                <tr>
                    <td colspan="3" align="center">
                        <button class="btn btn-info" type="submit">Update</button>
                        <button class="btn btn-danger" type="reset" onclick="history.back(-1)">Kembali</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>