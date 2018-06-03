# Tree

This widget renders the IView Tree. [Demo and API](https://www.iviewui.com/components/tree-en)

When To Use?

Almost anything can be represented in a tree structure. Examples include directories, organization hierarchies, biological classifications, countries, etc. 
The Tree component is a way of representing the hierarchical relationship between these things. You can also expand, collapse, and select a treeNode within a Tree.

## Options

* `data` *(string)* - an array of nestable node properties that generates tree data. Use string for creating two-way data bindings;
* `multiple` *(bool)* - allows selecting multiple treeNodes. Default `false`;
* `showCheckbox` *(bool)* - adds a Checkbox before the treeNodes. Default `false`;
* `emptyText` *(string)* - a tip without data. Default `No data`;
* `loadData` *(string)* - methods to load data lazily. Use string for creating two-way data bindings;
* `render` *(string)* - custom node content. Use string for creating two-way data bindings;
* `childrenKey` *(string)* - define child node key. Default `children`;
* `events` *(array)* - tree events:
    * `on-select-change` - emitted when the tree node is clicked. Returns the currently selected node array;
    * `on-check-change` - emitted when the checkbox is clicked. Returns an array of nodes is currently checked;
    * `on-toggle-expand` - emitted when when the list is expanded or dropped. Returns current nodes;
    
## Example

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