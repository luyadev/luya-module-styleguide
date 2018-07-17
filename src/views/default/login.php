<div style="padding:20px; text-align:center;">
    <?php if (Yii::$app->session->getFlash('wrong.styleguide.password')): ?>
        <p style="color:red;">The provided password is empty or wrong.</p>
    <?php endif; ?>
    <form method="post">
        <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>" />
        Styleguide Password:
        <input type="password" name="pass" />
        <input type="submit" name="login" value="Login" />
    </form>
</div>