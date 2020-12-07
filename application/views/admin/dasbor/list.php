<h1> Data Pengguna </h1><br>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>NO</th>
            <th>NAMA</th>
            <th>EMAIL</th>
            <th>USERNAME</th>
            <th>LEVEL</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; foreach($user as $user) { ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $user->nama ?></td>
            <td><?php echo $user->email ?></td>
            <td><?php echo $user->username ?></td>
            <td><?php echo $user->akses_level ?></td>
        </tr>
        <?php } ?>
    </tbody>
</table><hr>

<h1> Data Kategori </h1><br>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>NO</th>
            <th>NAMA</th>
            <th>SLUG</th>
            <th>URUTAN</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; foreach($kategori as $kategori) { ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $kategori->nama_kategori ?></td>
            <td><?php echo $kategori->slug_kategori ?></td>
            <td><?php echo $kategori->urutan ?></td>
        </tr>
        <?php } ?>
    </tbody>
</table><hr>

<h1> Data Produk </h1><br>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>NO</th>
            <th>GAMBAR</th>
            <th>NAMA</th>
            <th>KATEGORI</th>
            <th>HARGA</th>
            <th>STATUS</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; foreach($produk as $produk) { ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td>
                <img src="<?php echo base_url('assets/upload/image/thumbs/'.$produk->gambar) ?>" class="img img-responsive img-thumbnail" width="60">
            </td>
            <td><?php echo $produk->nama_produk?></td>
            <td><?php echo $produk->nama_kategori ?></td>
            <td><?php echo number_format($produk->harga,'0',',',',') ?></td>
            <td><?php echo $produk->status_produk ?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>