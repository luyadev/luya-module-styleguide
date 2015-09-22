<? $assets = $this->assetManager->getBundle('\\styleguide\\assets\\ResourcesAsset'); ?>

<script type="text/javascript">
    setTimeout(function() {
        $('.login__form--error').addClass('js-active-animation');
    }, 250);
</script>

<div class="login">

    <div class="login__logo">
        <img class="login__image" src="<?= $assets->baseUrl ?>/img/luya.png" width="500" height="auto" />
        <h1 class="login__title">Styleguide</h1>
    </div>

    <form class="login__form <? if($e): ?> login__form--error<? endif; ?>" method="POST">
        <div class="login__input-wrapper">
            <input type="password" name="pass" class="login__input" placeholder="Passwort eingeben..." />
        </div>
        <button type="submit" name="login" class="login__submit">
            
            <svg class="login__lock login__lock--open" fill="#fff" height="36" width="36" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 0h24v24H0z" fill="none"/>
                <path d="M12 17c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm6-9h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6h1.9c0-1.71 1.39-3.1 3.1-3.1 1.71 0 3.1 1.39 3.1 3.1v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zm0 12H6V10h12v10z"/>
            </svg>

            <svg class="login__lock login__lock--closed" fill="#fff" height="36" width="36" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 0h24v24H0z" fill="none"/>
                <path d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zm-6-5.1c1.71 0 3.1 1.39 3.1 3.1v2H9V6h-.1c0-1.71 1.39-3.1 3.1-3.1zM18 20H6V10h12v10zm-6-3c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2z"/>
            </svg>

        </button>
    </form>

    <? if($e): ?>
        <p class="login__error">Das eingegebene Passwort ist ungültig.</p>
    <? endif; ?>

</div>