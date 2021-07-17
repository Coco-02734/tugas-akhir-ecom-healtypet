<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-info text-white mr-2">
                <i class="mdi mdi-home"></i>
            </span> <?= $title; ?>
        </h3>
    </div>
    <div class="card mb-3" style="max-width: 940px;">
        <div class="row g-0">
            <div class="col-md-4">
                <div class="container mt-4">
                    <h5 class="card-text">Alamat Pengiriman</h5>
                    <p>
                        <?= $pembeli['nama']; ?>
                        <?= $pembeli['alamat']; ?>
                        <?= $pembeli['kota']; ?>
                        <?= $pembeli['provinsi']; ?>
                        <?= $pembeli['no_tlpn']; ?>
                        <hr>
                        Pengiriman : JNE - REG ( No Resi : <?= $trans['no_resi'] ?>)
                    </p>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">Pemesanan Produk</h5>
                    <p class="card-text">
                    <ul class="list-group">
                        <?php $data = $this->db->from('tb_keranjang')->join('tb_produk_rs', 'tb_produk_rs.id_produk=tb_keranjang.id_produk')->where('id_user', $pembeli['id'])->where('id_puskeswan', $bio_pus['id_puskeswan'])->where('tb_keranjang.status', 200 || 3 || 1)->get()->result_array();
                        foreach ($data as $s) :
                        ?>
                            <li class="list-group-item"><?= $s['nama_produk'] . ' - ( ' . $s['jml'] . ' Item )'; ?></li>
                        <?php endforeach; ?>
                    </ul>
                    </p>
                    <hr>
                    <h4 class="card-text"><small class="text-muted">Total Harga : Rp <?= $trans['harga'] ?></small></h5>

                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                            Update Resi
                        </button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Resi Pengiriman</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('klinik/updateresi') ?>" method="post">
                    <input type="hidden" value="<?= $trans['id_transaksi']; ?>" name="id">
                    <div class="form-group">
                        <label for="No Resi">Nomor Resi</label>
                        <input type="text" class="form-control" id="NoResi" name="no_resi" value="<?= $trans['no_resi'] ?>" aria-describedby="emailHelp" required>
                        <small id="emailHelp" class="form-text text-muted">Resi akan terupdate otomatis. Silahkan mengisi resi dengan benar !</small>
                    </div>
            </div>
            <div class="modal-footer">

                <button type="submit" class="btn btn-primary">Update Resi</button>
                </form>
            </div>
        </div>
    </div>
</div>