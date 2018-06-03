<?php
/**
 * @link https://github.com/antkaz/yii2-iview
 * @copyright Copyright (c) 2018 Anton Kazarinov
 * @license https://github.com/antkaz/yii2-iview/blob/master/LICENSE
 */

namespace antkaz\iview;

use yii\helpers\Html;

/**
 * Renders the Tree component
 *
 * Almost anything can be represented in a tree structure.
 * Examples include directories, organization hierarchies, biological classifications, countries, etc.
 * The Tree component is a way of representing the hierarchical relationship between these things.
 * You can also expand, collapse, and select a treeNode within a Tree.
 *
 * @see https://www.iviewui.com/components/tree-en
 *
 * @author Anton Kazarinov <askazarinov@gmail.com>
 * @package antkaz\iview
 */
class Tree extends Widget
{
    /**
     * @var string An array of nestable node properties that generates tree data.
     * Use string for creating two-way data bindings
     */
    public $data;

    /**
     * @var bool Allows selecting multiple treeNodes. Default `false`.
     */
    public $multiple = false;

    /**
     * @var bool Adds a Checkbox before the treeNodes. Default `false`.
     */
    public $showCheckbox = false;

    /**
     * @var string A tip without data. Default `No data`.
     */
    public $emptyText;

    /**
     * @var string Methods to load data lazily. Use string for creating two-way data bindings.
     */
    public $loadData;

    /**
     * @var string Custom node content. Use string for creating two-way data bindings.
     */
    public $render;

    /**
     * @var string Define child node key. Default `children`.
     */
    public $childrenKey;

    /**
     * @inheritdoc
     */
    public function initOptions()
    {
        parent::initOptions();

        $this->options[':data'] = $this->data ?: false;
        $this->options['multiple'] = $this->multiple ? true : false;
        $this->options['show-checkbox'] = $this->showCheckbox ? true : false;
        $this->options['empty-text'] = $this->emptyText ?: false;
        $this->options[':load-data'] = $this->loadData ?: false;
        $this->options[':render'] = $this->render ?: false;
        $this->options['children-key'] = $this->childrenKey ?: false;
    }

    /**
     * Renders the widget
     *
     * @return string Returns the rendering result
     */
    protected function renderWidget()
    {
        return Html::tag('tree', '', $this->options);
    }
}