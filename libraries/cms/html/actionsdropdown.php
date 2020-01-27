<?php
/**
 * @package     Joomla.Libraries
 * @subpackage  HTML
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

defined('JPATH_PLATFORM') or die;

/**
 * HTML utility class for building a dropdown menu
 *
 * @since  3.2
 */
abstract class JHtmlActionsDropdown
{
    /**
     * @var    string  HTML markup for the dropdown list
     * @since  3.2
     */
    protected static $dropDownList = array();

    /**
     * Method to render current dropdown menu
     *
     * @param   string  $item  An item to render.
     *
     * @return  string  HTML markup for the dropdown list
     *
     * @since   3.2
     */
    public static function render($item = '')
    {
        $html = array();

        $html[] = '<button class="btn btn-default btn-xs dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
	    $html[] = '<span class="caret"></span>';
	    $html[] = '</button>';
	    $html[] = '<ul class="dropdown-menu">';
	    $html[] = implode('', static::$dropDownList);
	    $html[] = '<ul>';

        static::$dropDownList = null;

        return implode('', $html);
    }

    /**
     * Append a publish item to the current dropdown menu
     *
     * @param   string  $id      ID of corresponding checkbox of the record
     * @param   string  $prefix  The task prefix
     *
     * @return  void
     *
     * @since   3.2
     */
    public static function publish($id, $prefix = '')
    {
        $task = ($prefix ? $prefix . '.' : '') . 'publish';
        static::addCustomItem(JText::_('JTOOLBAR_PUBLISH'), 'check', $id, $task);
    }

    /**
     * Append an unpublish item to the current dropdown menu
     *
     * @param   string  $id      ID of corresponding checkbox of the record
     * @param   string  $prefix  The task prefix
     *
     * @return  void
     *
     * @since   3.2
     */
    public static function unpublish($id, $prefix = '')
    {
        $task = ($prefix ? $prefix . '.' : '') . 'unpublish';
        static::addCustomItem(JText::_('JTOOLBAR_UNPUBLISH'), 'times-circle', $id, $task);
    }

    /**
     * Append a feature item to the current dropdown menu
     *
     * @param   string  $id      ID of corresponding checkbox of the record
     * @param   string  $prefix  The task prefix
     *
     * @return  void
     *
     * @since   3.2
     */
    public static function feature($id, $prefix = '')
    {
        $task = ($prefix ? $prefix . '.' : '') . 'featured';
        static::addCustomItem(JText::_('JFEATURE'), 'star', $id, $task);
    }

    /**
     * Append an unfeature item to the current dropdown menu
     *
     * @param   string  $id      ID of corresponding checkbox of the record
     * @param   string  $prefix  The task prefix
     *
     * @return  void
     *
     * @since   3.2
     */
    public static function unfeature($id, $prefix = '')
    {
        $task = ($prefix ? $prefix . '.' : '') . 'unfeatured';
        static::addCustomItem(JText::_('JUNFEATURE'), 'star-o', $id, $task);
    }

    /**
     * Append an archive item to the current dropdown menu
     *
     * @param   string  $id      ID of corresponding checkbox of the record
     * @param   string  $prefix  The task prefix
     *
     * @return  void
     *
     * @since   3.2
     */
    public static function archive($id, $prefix = '')
    {
        $task = ($prefix ? $prefix . '.' : '') . 'archive';
        static::addCustomItem(JText::_('JTOOLBAR_ARCHIVE'), 'archive', $id, $task);
    }

    /**
     * Append an unarchive item to the current dropdown menu
     *
     * @param   string  $id      ID of corresponding checkbox of the record
     * @param   string  $prefix  The task prefix
     *
     * @return  void
     *
     * @since   3.2
     */
    public static function unarchive($id, $prefix = '')
    {
        $task = ($prefix ? $prefix . '.' : '') . 'unpublish';
        static::addCustomItem(JText::_('JTOOLBAR_UNARCHIVE'), 'archive', $id, $task);
    }

    /**
     * Append a duplicate item to the current dropdown menu
     *
     * @param   string  $id      ID of corresponding checkbox of the record
     * @param   string  $prefix  The task prefix
     *
     * @return  void
     *
     * @since   3.2
     */
    public static function duplicate($id, $prefix = '')
    {
        $task = ($prefix ? $prefix . '.' : '') . 'duplicate';
        static::addCustomItem(JText::_('JTOOLBAR_DUPLICATE'), 'clone', $id, $task);
    }

    /**
     * Append a trash item to the current dropdown menu
     *
     * @param   string  $id      ID of corresponding checkbox of the record
     * @param   string  $prefix  The task prefix
     *
     * @return  void
     *
     * @since   3.2
     */
    public static function trash($id, $prefix = '')
    {
        $task = ($prefix ? $prefix . '.' : '') . 'trash';
        static::addCustomItem(JText::_('JTOOLBAR_TRASH'), 'trash', $id, $task);
    }

    /**
     * Append an untrash item to the current dropdown menu
     *
     * @param   string  $id      ID of corresponding checkbox of the record
     * @param   string  $prefix  The task prefix
     *
     * @return  void
     *
     * @since   3.2
     */
    public static function untrash($id, $prefix = '')
    {
        self::publish($id, $prefix);
    }

    /**
     * Writes a divider between dropdown items
     *
     * @return  void
     *
     * @since   3.0
     */
    public static function divider()
    {
        static::$dropDownList[] = '<li role="separator" class="divider"></li>';
    }

    /**
     * Append a custom item to current dropdown menu.
     *
     * @param   string  $label  The label of the item.
     * @param   string  $icon   The icon classname.
     * @param   string  $id     The item id.
     * @param   string  $task   The task.
     *
     * @return  void
     *
     * @since   3.2
     */
    public static function addCustomItem($label, $icon = '', $id = '', $task = '')
    {
        static::$dropDownList[] = '<li>'
            . '<a href = "javascript://" onclick="listItemTask(\'' . $id . '\', \'' . $task . '\')">'
            . ($icon ? '<span class="fa fa-' . $icon . '"></span> ' : '')
            . $label
            . '</a>'
            . '</li>';
    }
}
