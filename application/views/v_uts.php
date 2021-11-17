<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <title>Data Pegawai</title>
</head>

<body>
    <div class="container-lg">
        <form action="<?= base_url('Uts/cetak'); ?>" method="POST" enctype="multipart/form-data">
            <table class="table table-borderless">
                <tr>
                    <th colspan="3">
                        Data Pegawai
                        <small>Power Control</small>
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
                    <td width="85%">
                        <input type="text" name="nip" placeholder="Masukkan Nip">
                    </td>
                    <td><?php echo form_error('nip'); ?></td>
                </tr>
                <tr>
                    <th>Nama</th>
                    <td>:</td>
                    <td width="85%">
                        <input type="text" name="nama" id="nama" placeholder="Masukkan Nama Pegawai">
                    </td>
                    <td><?php echo form_error('nama'); ?></td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>:</td>
                    <td width="85%">
                        <input type="radio" name="status" value="Menikah">Menikah
                        <input type="radio" name="status" value="Belum Menikah">Belum Menikah
                    </td>
                    <td><?php echo form_error('status'); ?></td>
                </tr>
                <tr>
                    <th>Jabatan</th>
                    <td>:</td>
                    <td width="85%">
                        <select name="jabatan">
                            <option value="">Pilih--</option>
                            <option value="staff">Staff</option>
                            <option value="Sekertaris">Sekertaris</option>
                            <option value="Marketing">Marketing</option>
                        </select>
                    </td>

                    <td><?php echo form_error('jabatan'); ?></td>
                </tr>
                <tr>
                    <th>Gaji</th>
                    <td>:</td>
                    <td width="85%">
                        <input type="text" name="gaji" placeholder="">
                    </td>
                    <td><?php echo form_error('gaji'); ?></td>
                </tr>
                <tr>
                    <th>Tunjangan</th>
                    <td>:</td>
                    <td width="85%">
                        <input type="text" name="tunjangan" placeholder="">
                    </td>
                    <td><?php echo form_error('tunjangan'); ?></td>
                </tr>
                <tr>
                    <th>Upload Foto</th>
                    <td>:</td>
                    <td width="85%">
                        <input type="file" name="foto" id="foto">
                    </td>
                    <td><?php echo form_error('foto'); ?></td>
                </tr>
                <tr>
                    <td colspan="3">
                        <input class="btn btn-primary" type="submit" value="Simpan">
                        <input class="btn btn-danger" type="reset" value="Batal">
                    </td>
                </tr>
            </table>
        </form>
        <!--  -->
        <br>
        <br>
        <table class="table table-borderless" border="1pt">
            <tr>
                <th>No</th>
                <th>Nip</th>
                <th>Nama</th>
                <th>Status</th>
                <th>Jabatan</th>
                <th>Gaji</th>
                <th>Tunjangan</th>
                <th>Foto</th>
                <th>Action</th>
            </tr>
            <?php
            $no = 1;
            foreach ($pegawai as $pegawai) {
            ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $pegawai->nip; ?></td>
                    <td><?= $pegawai->nama; ?></td>
                    <td><?= $pegawai->status; ?></td>
                    <td><?= $pegawai->jabatan; ?></td>
                    <td><?= $pegawai->gaji; ?></td>
                    <td><?= $pegawai->tunjangan; ?></td>
                    <td>
                        <?php
                        if ($pegawai->foto == "") {
                        ?>
                            <img src="<?php echo base_url(); ?>assets/img/180900.jpg" width="100%"height="25%">
                        <?php
                        } else {
                        ?>
                            <img width="50" height="50" src="<?php echo base_url(); ?>upload/<?= $pegawai->foto; ?>">
                        <?php
                        }
                        ?>
                    </td>
                    <td>
                        <a href="<?= base_url('Uts/edit/' . $pegawai->nip) ?>">Edit</a>
                        <a href="<?= base_url('Uts/hapus/' . $pegawai->nip) ?>">Hapus</a>
                    </td>
                </tr>

            <?php
            }
            ?>
        </table>
    </div>
</body>

</html>