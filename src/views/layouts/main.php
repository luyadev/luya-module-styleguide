<?php

use \luya\styleguide\assets\ResourcesAsset;

ResourcesAsset::register($this);

?>

<?php $this->beginPage(); ?>
<html class="sg-html">
    <head>
        <meta charset="UTF-8" />
        <meta name="robots" content="noindex, nofollow" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?= Yii::$app->siteTitle; ?> Styleguide</title>
        <?php $this->head() ?>
    </head>
    <body class="sg-body">
    <?php $this->beginBody() ?>
        <div class="sg-body__page">
            <?= $content; ?>
        </div>

        <div class="sg-body__settings">
            <div class="sg-settings-toggler sg-js-open-settings">
                <svg class="sg-settings-toggler__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 13.616v-3.232c-1.651-.587-2.694-.752-3.219-2.019v-.001c-.527-1.271.1-2.134.847-3.707l-2.285-2.285c-1.561.742-2.433 1.375-3.707.847h-.001c-1.269-.526-1.435-1.576-2.019-3.219h-3.232c-.582 1.635-.749 2.692-2.019 3.219h-.001c-1.271.528-2.132-.098-3.707-.847l-2.285 2.285c.745 1.568 1.375 2.434.847 3.707-.527 1.271-1.584 1.438-3.219 2.02v3.232c1.632.58 2.692.749 3.219 2.019.53 1.282-.114 2.166-.847 3.707l2.285 2.286c1.562-.743 2.434-1.375 3.707-.847h.001c1.27.526 1.436 1.579 2.019 3.219h3.232c.582-1.636.75-2.69 2.027-3.222h.001c1.262-.524 2.12.101 3.698.851l2.285-2.286c-.744-1.563-1.375-2.433-.848-3.706.527-1.271 1.588-1.44 3.221-2.021zm-12 2.384c-2.209 0-4-1.791-4-4s1.791-4 4-4 4 1.791 4 4-1.791 4-4 4z"/></svg>
            </div>
            <div class="sg-settings">
                <div class="sg-settings__entry">
                    <div class="sg-settings__switch">
                        <label class="switch">
                            <input type="checkbox" id="sg-settings-hide-nav" name="sg-settings-hide-nav">
                            <span class="slider round"></span>
                        </label>
                    </div>
                    <label class="sg-settings__label" for="sg-settings-hide-nav">Hide nav</label>
                </div>
                <div class="sg-settings__entry">
                    <div class="sg-settings__switch">
                        <label class="switch">
                            <input type="checkbox" id="sg-settings-no-horizontal-spacing" name="sg-settings-no-horizontal-spacing">
                            <span class="slider round"></span>
                        </label>
                    </div>
                    <label class="sg-settings__label" for="sg-settings-no-horizontal-spacing">Remove all horizontal spacing (for accurate breakpoints)</label>
                </div>
            </div>
        </div>

    <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
