<?php $app_identity = app_identity() ?>
<?= $this->extend($config->viewLayout) ?>

<?= $this->section('content'); ?>
<div class="animate form login_form">
    <section class="login_content">
        <img src="<?= $app_identity['app_brand']; ?>" width="100px" alt="">
        <form method="POST" action="<?= route_to('reset-password') ?>" class="needs-validation">
            <h1><?= lang('Auth.resetYourPassword') ?></h1>
            <?= view('Myth\Auth\Views\_message_block') ?>
            <p><?= lang('Auth.enterCodeEmailPassword') ?></p>
            <?= csrf_field() ?>
            <div class="form-group">
                <input type="text" class="form-control <?php if (session('errors.token')) : ?>is-invalid<?php endif ?>" name="token" id="token" value="<?= old('token', $token ?? '') ?>" placeholder="<?= lang('Auth.token') ?>">
                <div class="invalid-feedback">
                    <?= session('errors.token') ?>
                </div>
            </div>
            <div class="form-group">
                <input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" id="email" aria-describedby="emailHelp" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>">
                <div class="invalid-feedback">
                    <?= session('errors.email') ?>
                </div>
            </div>
            <div class="form-group">
                <input type="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" name="password" id="password" placeholder="<?= lang('Auth.newPassword') ?>" autocomplete="off">
                <div class="invalid-feedback">
                    <?= session('errors.password') ?>
                </div>
            </div>
            <div class="form-group">
                <input type="password" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" name="pass_confirm" id="pass_confirm" placeholder="<?= lang('Auth.newPasswordRepeat') ?>" autocomplete="off">
                <div class="invalid-feedback">
                    <?= session('errors.pass_confirm') ?>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-secondary submit" style="text-decoration:none;">
                    <?= lang('Auth.resetPassword') ?>
                </button>
            </div>
            <div class="clearfix"></div>
            <div class="separator">
                <p class="change_link"><?= lang('Auth.alreadyRegistered') ?>
                    <a href="<?= route_to('login') ?>" class="to_register"><?= lang('Auth.signIn') ?></a>
                </p>
                <div class="clearfix"></div>
                <br>
                <div>
                    <h1><?= $app_identity['app_name']; ?></h1>
                    <p>©<?= date('Y'); ?> All Rights Reserved. <?= $app_identity['app_title']; ?></p>
                </div>
            </div>
        </form>
    </section>
</div>
<?= $this->endSection(); ?>