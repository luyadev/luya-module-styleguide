<div class="sg-container">

    <div class="sg-container__item sg-container__item--nav">
        <h1 class="sg-title">Styleguide</h1>
        <nav class="sg-nav">
            <div class="sg-nav__group">
                <p class="sg-nav__group-title">Typography</p>
                <ul class="sg-nav__items">
                    <li class="sg-nav__item">
                        <a class="sg-nav__link sg-nav__link--active" href="#">Headings</a>
                    </li>
                    <li class="sg-nav__item">
                        <a class="sg-nav__link" href="#">Text</a>
                    </li>
                    <li class="sg-nav__item">
                        <a class="sg-nav__link" href="#">Lists</a>
                    </li>
                    <li class="sg-nav__item">
                        <a class="sg-nav__link" href="#">Special</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

    <div class="sg-container__item sg-container__item--main">

        <div class="sg-group">
            <h2 class="sg-group__title">Headings</h2>
            <p class="sg-group__description">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>

            <?php foreach ($containers as $item): ?>
                <h3 class="sg-element__title"><?= $item['name']; ?></h3>
                <div class="sg-element">
                    <?= $item['tag']; ?>
                </div>
                <?= implode(', ', $item['args']); ?>
            <?php endforeach; ?>

            <div class="sg-element">
                <h3 class="sg-element__title">Heading 1</h3>
                <div class="sg-element__preview">
                    <h1>Heading 1</h1>
                </div>
                <div class="sg-element__code-sample">
                    <code>Yii::$app->elements->heading1('Heading 1');</code>
                </div>
            </div>

            <div class="sg-element">
                <h3 class="sg-element__title">Heading 2</h3>
                <div class="sg-element__preview">
                    <h2>Heading 2</h2>
                </div>
                <div class="sg-element__code-sample">
                    <code>Yii::$app->elements->heading2('Heading 2');</code>
                </div>
            </div>

        </div>

    </div>

</div>

<!--


<?php foreach ($containers as $item): ?>
    <div style="padding:20px; text-align:center;">
        <span style="font-size:18px;"><?= $item['name']; ?><i>(<?= implode(', ', $item['args']); ?>)</i></span>
    </div>
    <?= $item['tag']; ?>
<?php endforeach; ?>

<div style="padding:20px; text-align:center;">
        <span style="font-size:18px;">Global Styles</span>
</div>
<?= $global; ?>

-->