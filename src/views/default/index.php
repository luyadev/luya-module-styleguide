<?php

use luya\helpers\Html;
use luya\helpers\Url;

/* @var array $styleguide */
/* @var boolean $showDomain */
/* @var string $title */
?>

<div class="sg-container">
    <div class="sg-container__item sg-container__item--nav js-nearby">
        <div class="sg-title">
            <h1 class="sg-title__title"><?= $title; ?></h1>
            <?php if ($showDomain): ?>
                <a class="sg-title__domain" href="<?= Url::base(true); ?>" target="_blank"><?= Yii::$app->request->hostName ?></a>
            <?php endif; ?>
        </div>
        <nav class="sg-nav">
            <?php foreach ($styleguide['groups'] as $groupKey => $group): ?>
                <div class="sg-nav__group">
                    <p class="sg-nav__group-title"><?= $group['name'] ?></p>
                    <ul class="sg-nav__items">
                        <?php foreach ($group['elements'] as $elementKey => $element): ?>
                            <li class="sg-nav__item">
                                <a class="sg-nav__link sg-js-scrollspy-nav-item" href="#sg-<?= $groupKey . $elementKey ?>"><?= $element['name'] ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endforeach; ?>
        </nav>
    </div>
    <div class="sg-container__item sg-container__item--main">
        <?php foreach ($styleguide['groups'] as $groupKey => $group): ?>
            <div class="sg-group">
                <h2 class="sg-group__title"><?= $group['name'] ?></h2>
                <p class="sg-group__description"><?= $group['description'] ?></p>
                <?php foreach ($group['elements'] as $elementKey => $element): ?>
                    <div class="sg-element sg-js-scrollspy-item" id="sg-<?= $groupKey . $elementKey ?>">
                        <h3 class="sg-element__title"><?= $element['name'] ?></h3>
                        <?php if (isset($element['description'])): ?>
                            <p class="sg-element__description"><?= $element['description'] ?></p>
                        <?php endif; ?>
                        <div class="sg-element__preview">
                            <?= Yii::$app->element->getElement($element['element'], $element['values']) ?>
                        </div>
                        <div class="sg-element__codesample">
                            <div class="sg-codesample sg-js-codesample">
                                <div class="sg-codesample__code">
                                    <code class="sg-php php">
                                        <?= Html::encode('<?= Yii::$app->elements->' . $element['element'] . '(' . implode(", ", $element['params']) . ') ?>'); ?>
                                    </code>
                                </div>
                                <p class="sg-codesample__toggler sg-codesample__toggler--show">
                                    <svg class="sg-icon" aria-hidden="true" data-prefix="fas" data-icon="eye" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M569.354 231.631C512.969 135.949 407.81 72 288 72 168.14 72 63.004 135.994 6.646 231.631a47.999 47.999 0 0 0 0 48.739C63.031 376.051 168.19 440 288 440c119.86 0 224.996-63.994 281.354-159.631a47.997 47.997 0 0 0 0-48.738zM288 392c-75.162 0-136-60.827-136-136 0-75.162 60.826-136 136-136 75.162 0 136 60.826 136 136 0 75.162-60.826 136-136 136zm104-136c0 57.438-46.562 104-104 104s-104-46.562-104-104c0-17.708 4.431-34.379 12.236-48.973l-.001.032c0 23.651 19.173 42.823 42.824 42.823s42.824-19.173 42.824-42.823c0-23.651-19.173-42.824-42.824-42.824l-.032.001C253.621 156.431 270.292 152 288 152c57.438 0 104 46.562 104 104z"></path></svg>
                                    <span class="sg-v-middle">Show code</span>
                                </p>
                                <div class="sg-codesample__toggler sg-codesample__toggler--hide">
                                    <svg class="sg-icon" aria-hidden="true" data-prefix="fas" data-icon="eye-slash" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M286.693 391.984l32.579 46.542A333.958 333.958 0 0 1 288 440C168.19 440 63.031 376.051 6.646 280.369a47.999 47.999 0 0 1 0-48.739c24.023-40.766 56.913-75.775 96.024-102.537l57.077 81.539C154.736 224.82 152 240.087 152 256c0 74.736 60.135 135.282 134.693 135.984zm282.661-111.615c-31.667 53.737-78.747 97.46-135.175 125.475l.011.015 41.47 59.2c7.6 10.86 4.96 25.82-5.9 33.42l-13.11 9.18c-10.86 7.6-25.82 4.96-33.42-5.9L100.34 46.94c-7.6-10.86-4.96-25.82 5.9-33.42l13.11-9.18c10.86-7.6 25.82-4.96 33.42 5.9l51.038 72.617C230.68 75.776 258.905 72 288 72c119.81 0 224.969 63.949 281.354 159.631a48.002 48.002 0 0 1 0 48.738zM424 256c0-75.174-60.838-136-136-136-17.939 0-35.056 3.473-50.729 9.772l19.299 27.058c25.869-8.171 55.044-6.163 80.4 7.41h-.03c-23.65 0-42.82 19.17-42.82 42.82 0 23.626 19.147 42.82 42.82 42.82 23.65 0 42.82-19.17 42.82-42.82v-.03c18.462 34.49 16.312 77.914-8.25 110.95v.01l19.314 27.061C411.496 321.2 424 290.074 424 256zM262.014 356.727l-77.53-110.757c-5.014 52.387 29.314 98.354 77.53 110.757z"></path></svg>
                                    <span class="sg-v-middle">Hide code</span>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>
