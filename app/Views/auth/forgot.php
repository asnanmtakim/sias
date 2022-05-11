<?php $app_identity = app_identity() ?>
<?= $this->extend($config->viewLayout) ?>

<?= $this->section('content'); ?>
<div class="animate form login_form">
    <section class="login_content">
        <img src="<?= $app_identity['app_brand']; ?>" width="100px" alt="">
        <form method="POST" action="<?= route_to('forgot') ?>" class="needs-validation">
            <h1><?= lang('Auth.forgotPassword') ?></h1>
            <?= view('Myth\Auth\Views\_message_block') ?>
            <p><?= lang('Auth.enterEmailForInstructions') ?></p>
            <?= csrf_field() ?>
            <div class="form-group">
                <input type="email" name="email" id="email" class="form-control<?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.emailAddress') ?>">
                <div class="invalid-feedback">
                    <?= session('errors.email') ?>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-secondary submit" style="text-decoration:none;">
                    <?= lang('Auth.sendInstructions') ?>
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