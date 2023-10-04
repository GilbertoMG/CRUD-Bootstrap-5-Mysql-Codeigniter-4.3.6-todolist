<?= $this->extend('Modules\Todo\Main\Views\external_template'); ?>

<?= $this->section('css'); ?>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<?= form_open(site_url('auth/login')); ?>
<div class="row mt-5">
    <div class="col-12 col-md-6 mx-auto">       
        <?php echo renderAlerts(session('message')); ?>
        <h1 class="h3 mb-3 fw-normal">Login</h1>
        <div class="form-floating mb-1">
            <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" required />
            <label for="email">E-mail</label>
        </div>
        <div class="form-floating bm-1">
            <input type="password" class="form-control" name="password" id="password" placeholder="Password" required />
            <label for="password">Password</label>
        </div>
        <button class="w-100 btn btn-lg btn-primary mt-2" type="submit">Login</button>
        <p class="mt-5 mb-3 text-muted">© 2023</p>
    </div>
</div>
<?= form_close() ?>

<?= $this->endSection(); ?>

<?= $this->section('scripts'); ?>
<?= $this->endSection(); ?>