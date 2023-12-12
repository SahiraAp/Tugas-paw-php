<?php 
include_once 'dbconfig.php'; 

if (isset($_POST['btn-simpan'])) {
    $table = "table_buku_tamu";
    $nama = $_POST['nama'];
    $subject = $_POST['subject'];
    $isi = $_POST['isi'];
    if ($buku->tambah($table, $nama, $subject, $isi)) {
        header("Location: buku-tamu.php?success");
    } else {
        header("Location: buku-tamu.php?failed");
    }
}

?>
<?php include_once 'admin/buku-header.php'; ?>
<div class="my-16 mx-4">
    <div class="clearfix"></div>

    <?php 
    if (isset($_GET['success'])) {
    ?>
    <div class="container">
        <div class="alert alert-info">
            <strong>Input Buku Tamu Berhasil</strong>
        </div>
    </div>
    <?php
    } else if(isset($_GET['failed'])){
    ?>
    <div class="container">
        <div class="alert alert-warning">
            <strong>Buku Tamu gagal Di input</strong>
        </div>
    </div>
    <?php
    }
    ?>

    <div class="container">

        <div class="bg-white shadow-md rounded p-4">
            <h4 class="text-xl font-bold mb-4"><i class="glyphicon glyphicon-list-alt"></i> Buku Tamu</h4>
            
            <form class="form-horizontal" role="form" method="post">
                <div class="mb-4">
                    <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                    <input type="text" name="nama" id="nama" class="form-input w-full border rounded-md p-2" placeholder="Nama .." required>
                </div>

                <div class="mb-4">
                    <label for="subject" class="block text-sm font-medium text-gray-700">Subject</label>
                    <input type="text" name="subject" id="subject" class="form-input w-full border rounded-md p-2" placeholder="Subject ..">
                </div>

                <div class="mb-4">
                    <label for="isi" class="block text-sm font-medium text-gray-700">Isi</label>
                    <textarea name="isi" id="isi" class="form-textarea w-full border rounded-md p-2" rows="5"></textarea>
                </div>

                <div class="flex items-center">
                    <button type="submit" name="btn-simpan" class="bg-hutao text-white px-4 py-2 rounded mr-2">Simpan</button>
                    <button type="reset" class="bg-hutao text-white px-4 py-2 rounded">Batal</button>                        
                </div>
            </form>

        </div>

    </div>

    <div class="container">
        
        <table class="table-auto w-full border border-gray-400">
            <thead>
                <tr class="bg-green-500 text-white">
                    <th class="px-4 py-2 border">Tanggal</th>
                    <th class="px-4 py-2 border">Nama</th>
                    <th class="px-4 py-2 border">Subject</th>
                    <th class="px-4 py-2 border">Isi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $tampil = 'depan';
                $query = "SELECT * FROM table_buku_tamu";
                $buku->tampildata($query, $tampil);
                ?>
            </tbody>
        </table>

    </div>
</div>
