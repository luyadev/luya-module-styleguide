<div style="padding:20px; text-align:center;">
    <?php if ($e): ?>
    <p style="color:red;">Es wurde ein falsches Passwort eingegeben</p>
    <?php endif; ?>
    <form method="post">
        Styleguide Password:
        <input type="password" name="pass" />
        <input type="submit" name="login" value="Login" />
    </form>
</div>