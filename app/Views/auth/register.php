<?php
$app_identity = app_identity();
?>
<?= $this->extend($config->viewLayout) ?>

<?= $this->section('content'); ?>
<h4 class="text-dark font-weight-normal"><span class="font-weight-bold"><?= $app_identity['app_title'] ?></span></h4>
<p class="text-muted"><?= lang('Auth.register') ?> <?= $app_identity['app_name']; ?></p>
<?= view('Myth\Auth\Views\_message_block') ?>
<form method="POST" action="<?= route_to('register') ?>" class="needs-validation" novalidate="">
    <?= csrf_field() ?>
    <div class="form-group">
        <label for="email"><?= lang('Auth.email') ?></label>
        <input id="email" type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" tabindex="1" autofocus value="<?= old('email') ?>">
        <div class="invalid-feedback">
            <?= session('errors.email') ?>
        </div>
    </div>
    <div class="form-group">
        <label for="username"><?= lang('Auth.username') ?></label>
        <input id="username" type="text" class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" tabindex="1" value="<?= old('username') ?>">
        <div class="invalid-feedback">
            <?= session('errors.username') ?>
        </div>
    </div>
    <div class="form-group">
        <div class="d-block">
            <label for="password" class="control-label"><?= lang('Auth.password') ?></label>
        </div>
        <input id="password" type="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" name="password" tabindex="3" autocomplete="off">
        <div class="invalid-feedback">
            <?= session('errors.password') ?>
        </div>
    </div>
    <div class="form-group">
        <div class="d-block">
            <label for="pass_confirm" class="control-label"><?= lang('Auth.repeatPassword') ?></label>
        </div>
        <input id="pass_confirm" type="password" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" name="pass_confirm" tabindex="4" autocomplete="off">
        <div class="invalid-feedback">
            <?= session('errors.pass_confirm') ?>
        </div>
    </div>

    <div class="form-group text-center">
        <button type="submit" class="btn btn-success btn-lg btn-icon icon-right" tabindex="5">
            <?= lang('Auth.register') ?>
        </button>
    </div>
    <div class="mt-5 text-center">
        <?= lang('Auth.alreadyRegistered') ?> <a href="<?= route_to('login') ?>"><?= lang('Auth.signIn') ?></a>
    </div>
</form>
<?= $this->endSection(); ?>