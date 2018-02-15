# Card

Этот виджет позволяет вывести компонент IView Card. [Demo and API](https://www.iviewui.com/components/card-en)

## Опции

* `body` *(string)* - содержимое виджета;
* `bordered` *(bool)* - показывать рамку или нет. Рекомендуется использовать, когда цвет фона серый. По умолчанию `true`;
* `disHover` *(bool)* - отключить эффект наведения мыши. По умолчанию `false`;
* `shadow` *(bool)* - тень, Рекомендуется использовать, когда цвет фона серый. По умолчанию `false`;
* `padding` *(int)* - внутренний отступ в px. По умолчанию `16`;
* `title` *(string)* - аголовок;
* `extra` *(array)* - слот Extra:
    * `'tag'` *(string)* - тег слота. По умолчанию `p`;
    * `'content'` *(string)* - содержимое слота, по умолчанию отображается в правом углу;
    * `'options'` *(array)* - HTML атрибуты тега, в который обернут этот слот.

## Пример

```php
<?php
use antkaz\iview\Card;
?>
<div class="iview-card">

    <?= Card::widget([
        'title' => 'Card title',
        'bordered' => false,
        'extra' => [
            'tag' => 'a',
            'content' => 'Extra',
            'options' => [
                '@click.prevent' => 'change' 
            ]
        ],
        'body' => 'Text card'
    ]) ?>

</div>
```

Вы можете обернуть содержимое между вызовами `begin()` и `end()`, как показано в следующем примере:

```php
<?php
use antkaz\iview\Card;
?>
<div class="iview-card">

    <?php Card::begin([
        'shadow' => true
    ]) ?>
        <p slot="title">Card title</p>
        <p>Content card.</p>
    <?php Card::end() ?>

</div>
```