# Tree

Виджет выводит дерево IView. [Примеры и API](https://www.iviewui.com/components/tree-en)

Когда использовать?

Почти все может быть представлено в древовидной структуре. Например, каталоги, структура организации, биологические классификации, страны и т.д.
Компонент Tree - это способ представления иерархической связи между этими вещами. Вы также можете развернуть, свернуть и выбрать узлы в дереве.

## Опции

* `data` *(string)* - массив свойст вложенных узлов, которые генерируют данные дерева. Используйте строку для создания двухстороннего связывания;
* `multiple` *(bool)* - позволяет выбрать несколько узлов. По умолчанию `false`;
* `showCheckbox` *(bool)* - добавляет Checkbox перед узлами. По умолчанию `false`;
* `emptyText` *(string)* - текст, если нет данных. По умолчанию `No data`;
* `loadData` *(string)* - методы ленивой загрузки данных. Используйте строку для создания двухстороннего связывания с методом;
* `render` *(string)* - пользовательское содержимое узла. Используйте строку для создания двухстороннего связывания с методом;
* `childrenKey` *(string)* - определяет ключ узла. По умолчанию `children`;
* `events` *(array)* - события дерева:
    * `on-select-change` - срабатывает при клике на узел дерева. Возвращает выбранный массив узлов;
    * `on-check-change` - срабатывает при клике на Checkbox. Возвращает массив выделенных узлов;
    * `on-toggle-expand` - срабатывает, когда список раскрывается или сворачивается. Возвращает текущие узлы;
    
## Примеры

```php
<?php

use antkaz\iview\IViewAsset;
use antkaz\iview\Tree;
use antkaz\vue\Vue;

IViewAsset::register($this);
?>
<div class="iview-tag">
    <?php Vue::begin([
        'clientOptions' => [
            'data' => [
                'treeData' => [
                    [
                        'title' => 'parent 1',
                        'expand' => true,
                        'children' => [
                            [
                                'title' => 'parent 1-1',
                                'expand' => true,
                                'checked' => true,
                                'children' => [
                                    [
                                        'title' => 'leaf 1-1-1'
                                    ],
                                    [
                                        'title' => 'leaf 1-1-2'
                                    ]
                                ]
                            ],
                            [
                                'title' => 'parent 1-2',
                                'expand' => true,
                                'children' => [
                                    [
                                        'title' => 'leaf 1-2-1'
                                    ],
                                    [
                                        'title' => 'leaf 1-2-2'
                                    ]
                                ]
                            ],
                        ]
                    ]
                ]
            ]
        ]
    ]) ?>

    <?= Tree::widget([
        'data' => 'treeData',
        'showCheckbox' => true
    ]); ?>

    <?php Vue::end() ?>
</div>
```