<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <?= $this->session->flashdata('message'); ?>

    <div class="row">
        <div class="col-lg-8">

            <form action="<?= base_url('user/harianPemasukan'); ?>" method="post">


                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Nama Pemasukan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nama Pemasukan">
                        <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Kategori</label>
                    <div class="col-sm-10">
                        <select class="custom-select">
                            <option selected>Pilih Kategori Pemasukan</option>
                            <option value="dikasihortu">Dikasih Orang Tua</option>
                            <option value="bulanan">Bulanan</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Besar Pemasukan</label>
                    <div class="col-sm-10">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Rp.</span>
                            </div>
                            <input type="text" class="form-control" placeholder="Besar Total Pemasukan">
                        </div>
                    </div>
                </div>
                <div class="form-group row justify-content-end">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Submit Pemasukan</button>
                    </div>
                </div>

            </form>


        </div>
    </div>
</div>
</div>