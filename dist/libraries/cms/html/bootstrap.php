<?php
/**
 * @package     Joomla.Libraries
 * @subpackage  HTML
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

defined('JPATH_PLATFORM') or die;

/**
 * Utility class for Bootstrap elements.
 *
 * @since  3.0
 */
abstract class JHtmlBootstrap
{
	/**
	 * @var    array  Array containing information for loaded files
	 * @since  3.0
	 */
	protected static $loaded = array();

	/**
	 * Add javascript support for the Bootstrap affix plugin
	 *
	 * @param   string  $selector  Unique selector for the element to be affixed.
	 * @param   array   $params    An array of options.
	 *                             Options for the affix plugin can be:
	 *                             - offset  number|function|object  Pixels to offset from screen when calculating position of scroll.
	 *                                                               If a single number is provided, the offset will be applied in both top
	 *                                                               and left directions. To listen for a single direction, or multiple
	 *                                                               unique offsets, just provide an object offset: { x: 10 }.
	 *                                                               Use a function when you need to dynamically provide an offset
	 *                                                               (useful for some responsive designs).
	 *
	 * @return  void
	 *
	 * @since   3.1
	 */
	public static function affix($selector = 'affix', $params = array())
	{
		$sig = md5(serialize(array($selector, $params)));

		if (!isset(static::$loaded[__METHOD__][$sig]))
		{
			// Include Bootstrap framework
			static::framework();

			// Setup options object
			$opt['offset'] = isset($params['offset']) ? $params['offset'] : 10;

			$options = JHtml::getJSObject($opt);

			// Attach affix to document
			JFactory::getDocument()->addScriptDeclaration(
				"(function($){
					$('#$selector').affix($options);
					})(jQuery);"
			);

			// Set static array
			static::$loaded[__METHOD__][$sig] = true;
		}

		return;
	}

	/**
	 * Add javascript support for Bootstrap alerts
	 *
	 * @param   string  $selector  Common class for the alerts
	 *
	 * @return  void
	 *
	 * @since   3.0
	 */
	public static function alert($selector = 'alert')
	{
		// Only load once
		if (isset(static::$loaded[__METHOD__][$selector]))
		{
			return;
		}

		// Include Bootstrap framework
		static::framework();

		// Attach the alerts to the document
		JFactory::getDocument()->addScriptDeclaration(
			"(function($){
				$('.$selector').alert();
				})(jQuery);"
		);

		static::$loaded[__METHOD__][$selector] = true;

		return;
	}

	/**
	 * Add javascript support for Bootstrap buttons
	 *
	 * @param   string  $selector  Common class for the buttons
	 *
	 * @return  void
	 *
	 * @since   3.1
	 */
	public static function button($selector = 'button')
	{
		// Only load once
		if (isset(static::$loaded[__METHOD__][$selector]))
		{
			return;
		}

		// Include Bootstrap framework
		static::framework();

		// Attach the button to the document
		JFactory::getDocument()->addScriptDeclaration(
			"(function($){
				$('.$selector').button();
				})(jQuery);"
		);

		static::$loaded[__METHOD__][$selector] = true;

		return;
	}

	/**
	 * Add javascript support for Bootstrap carousels
	 *
	 * @param   string  $selector  Common class for the carousels.
	 * @param   array   $params    An array of options for the carousel.
	 *                             Options for the carousel can be:
	 *                             - interval  number  The amount of time to delay between automatically cycling an item.
	 *                                                 If false, carousel will not automatically cycle.
	 *                             - pause     string  Pauses the cycling of the carousel on mouseenter and resumes the cycling
	 *                                                 of the carousel on mouseleave.
	 *
	 * @return  void
	 *
	 * @since   3.0
	 */
	public static function carousel($selector = 'carousel', $params = array())
	{
		$sig = md5(serialize(array($selector, $params)));

		if (!isset(static::$loaded[__METHOD__][$sig]))
		{
			// Include Bootstrap framework
			static::framework();

			// Setup options object
			$opt['interval'] = isset($params['interval']) ? (int) $params['interval'] : 5000;
			$opt['pause']    = isset($params['pause']) ? $params['pause'] : 'hover';

			$options = JHtml::getJSObject($opt);

			// Attach the carousel to document
			JFactory::getDocument()->addScriptDeclaration(
				"(function($){
					$('.$selector').carousel($options);
					})(jQuery);"
			);

			// Set static array
			static::$loaded[__METHOD__][$sig] = true;
		}

		return;
	}

	/**
	 * Add javascript support for Bootstrap dropdowns
	 *
	 * @param   string  $selector  Common class for the dropdowns
	 *
	 * @return  void
	 *
	 * @since   3.0
	 */
	public static function dropdown($selector = 'dropdown-toggle')
	{
		// Only load once
		if (isset(static::$loaded[__METHOD__][$selector]))
		{
			return;
		}

		// Include Bootstrap framework
		static::framework();

		// Attach the dropdown to the document
		JFactory::getDocument()->addScriptDeclaration(
			"(function($){
				$('.$selector').dropdown();
				})(jQuery);"
		);

		static::$loaded[__METHOD__][$selector] = true;

		return;
	}

	/**
	 * Method to load the Bootstrap JavaScript framework into the document head
	 *
	 * If debugging mode is on an uncompressed version of Bootstrap is included for easier debugging.
	 *
	 * @param   mixed  $debug  Is debugging mode on? [optional]
	 *
	 * @return  void
	 *
	 * @since   3.0
	 */
	public static function framework($debug = null)
	{
		// Only load once
		if (!empty(static::$loaded[__METHOD__]))
		{
			return;
		}

		// Load jQuery
		JHtml::_('jquery.framework');

		// If no debugging value is set, use the configuration setting
		if ($debug === null)
		{
			$config = JFactory::getConfig();
			$debug = (boolean) $config->get('debug');
		}

		JHtml::_('script', 'jui/bootstrap.min.js', false, true, false, false, $debug);
		static::$loaded[__METHOD__] = true;

		return;
	}

	/**
	 * Add javascript support for Bootstrap modals
	 *
	 * @param   string  $selector  The ID selector for the modal.
	 * @param   array   $params    An array of options for the modal.
	 *                             Options for the modal can be:
	 *                             - backdrop  boolean  Includes a modal-backdrop element.
	 *                             - keyboard  boolean  Closes the modal when escape key is pressed.
	 *                             - show      boolean  Shows the modal when initialized.
	 *                             - remote    string   An optional remote URL to load
	 *
	 * @return  void
	 *
	 * @since   3.0
	 * @deprecated  4.0  Unused, JS Not working
	 */
	public static function modal($selector = 'modal', $params = array())
	{
		$sig = md5(serialize(array($selector, $params)));

		if (!isset(static::$loaded[__METHOD__][$sig]))
		{
			// Include Bootstrap framework
			static::framework();

			// Setup options object
			$opt['backdrop'] = isset($params['backdrop']) ? (boolean) $params['backdrop'] : true;
			$opt['keyboard'] = isset($params['keyboard']) ? (boolean) $params['keyboard'] : true;
			$opt['show']     = isset($params['show']) ? (boolean) $params['show'] : true;
			$opt['remote']   = isset($params['remote']) ?  $params['remote'] : '';

			$options = JHtml::getJSObject($opt);

			// Attach the modal to document
			JFactory::getDocument()->addScriptDeclaration(
				"(function($){
					$('#$selector').modal($options);
					})(jQuery);"
			);

			// Set static array
			static::$loaded[__METHOD__][$sig] = true;
		}

		return;
	}

	/**
	 * Method to render a Bootstrap modal
	 *
	 * @param   string  $selector  The ID selector for the modal.
	 * @param   array   $params    An array of options for the modal.
	 *                             Options for the modal can be:
	 *                             - title     string   The modal title
	 *                             - backdrop  mixed    A boolean select if a modal-backdrop element should be included (default = true)
	 *                                                  The string 'static' includes a backdrop which doesn't close the modal on click.
	 *                             - keyboard  boolean  Closes the modal when escape key is pressed (default = true)
	 *                             - closeButton  boolean  Display modal close button (default = true)
	 *                             - animation boolean  Fade in from the top of the page (default = true)
	 *                             - footer    string   Optional markup for the modal footer
	 *                             - url       string   URL of a resource to be inserted as an <iframe> inside the modal body
	 *                             - height    string   height of the <iframe> containing the remote resource
	 *                             - width     string   width of the <iframe> containing the remote resource
	 * @param   string  $body      Markup for the modal body. Appended after the <iframe> if the url option is set
	 *
	 * @return  string  HTML markup for a modal
	 *
	 * @since   3.0
	 */
	public static function renderModal($selector = 'modal', $params = array(), $body = '')
	{
		// Include Bootstrap framework
		static::framework();

		$layoutData = array(
			'selector' => $selector,
			'params'   => $params,
			'body'     => $body
		);

		return JLayoutHelper::render('joomla.modal.main', $layoutData);
	}

	/**
	 * Add javascript support for Bootstrap popovers
	 *
	 * Use element's Title as popover content
	 *
	 * @param   string  $selector  Selector for the popover
	 * @param   array   $params    An array of options for the popover.
	 *                  Options for the popover can be:
	 *                      animation  boolean          apply a css fade transition to the popover
	 *                      html       boolean          Insert HTML into the popover. If false, jQuery's text method will be used to insert
	 *                                                  content into the dom.
	 *                      placement  string|function  how to position the popover - top | bottom | left | right
	 *                      selector   string           If a selector is provided, popover objects will be delegated to the specified targets.
	 *                      trigger    string           how popover is triggered - hover | focus | manual
	 *                      title      string|function  default title value if `title` tag isn't present
	 *                      content    string|function  default content value if `data-content` attribute isn't present
	 *                      delay      number|object    delay showing and hiding the popover (ms) - does not apply to manual trigger type
	 *                                                  If a number is supplied, delay is applied to both hide/show
	 *                                                  Object structure is: delay: { show: 500, hide: 100 }
	 *                      container  string|boolean   Appends the popover to a specific element: { container: 'body' }
	 *
	 * @return  void
	 *
	 * @since   3.0
	 */
	public static function popover($selector = '.hasPopover', $params = array())
	{
		// Only load once
		if (isset(static::$loaded[__METHOD__][$selector]))
		{
			return;
		}

		// Include Bootstrap framework
		static::framework();

		$opt['animation'] = isset($params['animation']) ? $params['animation'] : null;
		$opt['html']      = isset($params['html']) ? $params['html'] : true;
		$opt['placement'] = isset($params['placement']) ? $params['placement'] : null;
		$opt['selector']  = isset($params['selector']) ? $params['selector'] : null;
		$opt['title']     = isset($params['title']) ? $params['title'] : null;
		$opt['trigger']   = isset($params['trigger']) ? $params['trigger'] : 'hover focus';
		$opt['content']   = isset($params['content']) ? $params['content'] : null;
		$opt['delay']     = isset($params['delay']) ? $params['delay'] : null;
		$opt['container'] = isset($params['container']) ? $params['container'] : 'body';

		$options = JHtml::getJSObject($opt);

		// Attach the popover to the document
		JFactory::getDocument()->addScriptDeclaration(
			"jQuery(document).ready(function()
			{
				jQuery('" . $selector . "').popover(" . $options . ");
			});"
		);

		static::$loaded[__METHOD__][$selector] = true;

		return;
	}

	/**
	 * Add javascript support for Bootstrap ScrollSpy
	 *
	 * @param   string  $selector  The ID selector for the ScrollSpy element.
	 * @param   array   $params    An array of options for the ScrollSpy.
	 *                             Options for the ScrollSpy can be:
	 *                             - offset  number  Pixels to offset from top when calculating position of scroll.
	 *
	 * @return  void
	 *
	 * @since   3.0
	 */
	public static function scrollspy($selector = 'navbar', $params = array())
	{
		$sig = md5(serialize(array($selector, $params)));

		if (!isset(static::$loaded[__METHOD__][$sig]))
		{
			// Include Bootstrap framework
			static::framework();

			// Setup options object
			$opt['offset'] = isset($params['offset']) ? (int) $params['offset'] : 10;

			$options = JHtml::getJSObject($opt);

			// Attach ScrollSpy to document
			JFactory::getDocument()->addScriptDeclaration(
				"(function($){
					$('#$selector').scrollspy($options);
					})(jQuery);"
			);

			// Set static array
			static::$loaded[__METHOD__][$sig] = true;
		}

		return;
	}

	/**
	 * Add javascript support for Bootstrap tooltips
	 *
	 * Add a title attribute to any element in the form
	 * title="title::text"
	 *
	 * @param   string  $selector  The ID selector for the tooltip.
	 * @param   array   $params    An array of options for the tooltip.
	 *                             Options for the tooltip can be:
	 *                             - animation  boolean          Apply a CSS fade transition to the tooltip
	 *                             - html       boolean          Insert HTML into the tooltip. If false, jQuery's text method will be used to insert
	 *                                                           content into the dom.
	 *                             - placement  string|function  How to position the tooltip - top | bottom | left | right
	 *                             - selector   string           If a selector is provided, tooltip objects will be delegated to the specified targets.
	 *                             - title      string|function  Default title value if `title` tag isn't present
	 *                             - trigger    string           How tooltip is triggered - hover | focus | manual
	 *                             - delay      integer          Delay showing and hiding the tooltip (ms) - does not apply to manual trigger type
	 *                                                           If a number is supplied, delay is applied to both hide/show
	 *                                                           Object structure is: delay: { show: 500, hide: 100 }
	 *                             - container  string|boolean   Appends the popover to a specific element: { container: 'body' }
	 *
	 * @return  void
	 *
	 * @since   3.0
	 */
	public static function tooltip($selector = '.hasTooltip', $params = array())
	{
		if (!isset(static::$loaded[__METHOD__][$selector]))
		{
			// Include Bootstrap framework
			static::framework();

			// Setup options object
			$opt['animation'] = isset($params['animation']) ? (boolean) $params['animation'] : null;
			$opt['html']      = isset($params['html']) ? (boolean) $params['html'] : true;
			$opt['placement'] = isset($params['placement']) ? (string) $params['placement'] : null;
			$opt['selector']  = isset($params['selector']) ? (string) $params['selector'] : null;
			$opt['title']     = isset($params['title']) ? (string) $params['title'] : null;
			$opt['trigger']   = isset($params['trigger']) ? (string) $params['trigger'] : null;
			$opt['delay']     = isset($params['delay']) ? (int) $params['delay'] : null;
			$opt['container'] = isset($params['container']) ? $params['container'] : 'body';
			$opt['template']  = isset($params['template']) ? (string) $params['template'] : null;
			$onShow = isset($params['onShow']) ? (string) $params['onShow'] : null;
			$onShown = isset($params['onShown']) ? (string) $params['onShown'] : null;
			$onHide = isset($params['onHide']) ? (string) $params['onHide'] : null;
			$onHidden = isset($params['onHidden']) ? (string) $params['onHidden'] : null;

			$options = JHtml::getJSObject($opt);

			// Build the script.
			$script = array();
			$script[] = "jQuery(document).ready(function(){";
			$script[] = "\tjQuery('" . $selector . "').tooltip(" . $options . ");";

			if ($onShow)
			{
				$script[] = "\tjQuery('" . $selector . "').on('show.bs.tooltip', " . $onShow . ");";
			}

			if ($onShown)
			{
				$script[] = "\tjQuery('" . $selector . "').on('shown.bs.tooltip', " . $onShown . ");";
			}

			if ($onHide)
			{
				$script[] = "\tjQuery('" . $selector . "').on('hide.bs.tooltip', " . $onHide . ");";
			}

			if ($onHidden)
			{
				$script[] = "\tjQuery('" . $selector . "').on('hidden.bs.tooltip', " . $onHidden . ");";
			}

			$script[] = "});";

			// Attach tooltips to document
			JFactory::getDocument()->addScriptDeclaration(implode("\n", $script));

			// Set static array
			static::$loaded[__METHOD__][$selector] = true;
		}

		return;
	}

	/**
	 * Add javascript support for Bootstrap typeahead
	 *
	 * @param   string  $selector  The selector for the typeahead element.
	 * @param   array   $params    An array of options for the typeahead element.
	 *                             Options for the tooltip can be:
	 *                             - source       array, function  The data source to query against. May be an array of strings or a function.
	 *                                                             The function is passed two arguments, the query value in the input field and the
	 *                                                             process callback. The function may be used synchronously by returning the data
	 *                                                             source directly or asynchronously via the process callback's single argument.
	 *                             - items        number           The max number of items to display in the dropdown.
	 *                             - minLength    number           The minimum character length needed before triggering autocomplete suggestions
	 *                             - matcher      function         The method used to determine if a query matches an item. Accepts a single argument,
	 *                                                             the item against which to test the query. Access the current query with this.query.
	 *                                                             Return a boolean true if query is a match.
	 *                             - sorter       function         Method used to sort autocomplete results. Accepts a single argument items and has
	 *                                                             the scope of the typeahead instance. Reference the current query with this.query.
	 *                             - updater      function         The method used to return selected item. Accepts a single argument, the item and
	 *                                                             has the scope of the typeahead instance.
	 *                             - highlighter  function         Method used to highlight autocomplete results. Accepts a single argument item and
	 *                                                             has the scope of the typeahead instance. Should return html.
	 *
	 * @return  void
	 *
	 * @since   3.0
	 */
	public static function typeahead($selector = '.typeahead', $params = array())
	{
		if (!isset(static::$loaded[__METHOD__][$selector]))
		{
			// Include Bootstrap framework
			static::framework();

			// Setup options object
			$opt['source']      = isset($params['source']) ? $params['source'] : '[]';
			$opt['items']       = isset($params['items']) ? (int) $params['items'] : 8;
			$opt['minLength']   = isset($params['minLength']) ? (int) $params['minLength'] : 1;
			$opt['matcher']     = isset($params['matcher']) ? (string) $params['matcher'] : null;
			$opt['sorter']      = isset($params['sorter']) ? (string) $params['sorter'] : null;
			$opt['updater']     = isset($params['updater']) ? (string) $params['updater'] : null;
			$opt['highlighter'] = isset($params['highlighter']) ? (int) $params['highlighter'] : null;

			$options = JHtml::getJSObject($opt);

			// Attach typehead to document
			JFactory::getDocument()->addScriptDeclaration(
				"jQuery(document).ready(function()
				{
					jQuery('" . $selector . "').typeahead(" . $options . ");
				});"
			);

			// Set static array
			static::$loaded[__METHOD__][$selector] = true;
		}

		return;
	}

	/**
	 * Add javascript support for Bootstrap accordians and insert the accordian
	 *
	 * @param   string  $selector  The ID selector for the tooltip.
	 * @param   array   $params    An array of options for the tooltip.
	 *                             Options for the tooltip can be:
	 *                             - parent  selector  If selector then all collapsible elements under the specified parent will be closed when this
	 *                                                 collapsible item is shown. (similar to traditional accordion behavior)
	 *                             - toggle  boolean   Toggles the collapsible element on invocation
	 *                             - active  string    Sets the active slide during load
	 *
	 * @return  string  HTML for the accordian
	 *
	 * @since   3.0
	 */
	public static function startAccordion($selector = 'myAccordian', $params = array())
	{
		$sig = md5(serialize(array($selector, $params)));

		if (!isset(static::$loaded[__METHOD__][$sig]))
		{
			// Include Bootstrap framework
			static::framework();

			// Setup options object
			$opt['parent'] = isset($params['parent']) ? (boolean) $params['parent'] : 'false';
			$opt['toggle'] = isset($params['toggle']) ? (boolean) $params['toggle'] : 'true';
			$opt['active'] = isset($params['active']) ? (string) $params['active'] : '';
			
			$options = '';
			foreach($opt as $k => $v)
			if(!empty($v))
				$options .= 'data-'.$k.'="'.$v.'" ';

			// Set static array
			static::$loaded[__METHOD__][$sig] = true;
			static::$loaded[__METHOD__]['active'] = $opt['active'];
		}
		
		return '<div class="panel-group" id="'.$selector.'" role="tablist" aria-multiselectable="true" '.$options.'>';
		
	}

	/**
	 * Close the current accordion
	 *
	 * @return  string  HTML to close the accordian
	 *
	 * @since   3.0
	 */
	public static function endAccordion()
	{
		return '</div>';
	}

	/**
	 * Begins the display of a new accordion slide.
	 *
	 * @param   string  $selector  Identifier of the accordion group.
	 * @param   string  $text      Text to display.
	 * @param   string  $id        Identifier of the slide.
	 * @param   string  $class     Class of the accordion group.
	 *
	 * @return  string  HTML to add the slide
	 *
	 * @since   3.0
	 */
	public static function addSlide($selector, $text, $id, $class = '')
	{
		$in = (static::$loaded['JHtmlBootstrap::startAccordion']['active'] == $id) ? ' in' : '';
		$class = (!empty($class)) ? ' ' . $class : '';

		$html = '<div class="panel panel-default' . $class . '">'
			. '<div class="panel-heading" role="tab" id="heading'.$id.'">'
			. '<h4 class="panel-title">'
			. '<a data-toggle="collapse" data-parent="#' . $selector . '" href="#'.$id.'" aria-expanded="true" aria-controls="'.$id.'">'
			. $text
			. '</a>'
			. '</h4>'
			. '</div>'
			. '<div id="'.$id.'" class="panel-collapse collapse'.$in.'" role="tabpanel" aria-labelledby="heading'.$id.'">'
			. '<div class="panel-body">';
  	
		return $html;
	}

	/**
	 * Close the current slide
	 *
	 * @return  string  HTML to close the slide
	 *
	 * @since   3.0
	 */
	public static function endSlide()
	{
		return '</div></div></div>';
	}

	/**
	 * Creates a tab pane
	 *
	 * @param   string  $selector  The pane identifier.
	 * @param   array   $params    The parameters for the pane
	 *
	 * @return  string
	 *
	 * @since   3.1
	 */
	public static function startTabSet($selector = 'myTab', $params = array())
	{
		$sig = md5(serialize(array($selector, $params)));

		if (!isset(static::$loaded[__METHOD__][$sig]))
		{
			// Include Bootstrap framework
			static::framework();

			// Setup options object
			$opt['active'] = (isset($params['active']) && ($params['active'])) ? (string) $params['active'] : '';

			// Attach tabs to document
			JFactory::getDocument()
				->addScriptDeclaration(JLayoutHelper::render('libraries.cms.html.bootstrap.starttabsetscript', array('selector' => $selector)));

			// Set static array
			static::$loaded[__METHOD__][$sig] = true;
			static::$loaded[__METHOD__][$selector]['active'] = $opt['active'];
		}

		$html = JLayoutHelper::render('libraries.cms.html.bootstrap.starttabset', array('selector' => $selector));

		return $html;
	}

	/**
	 * Close the current tab pane
	 *
	 * @return  string  HTML to close the pane
	 *
	 * @since   3.1
	 */
	public static function endTabSet()
	{
		$html = JLayoutHelper::render('libraries.cms.html.bootstrap.endtabset');

		return $html;
	}

	/**
	 * Begins the display of a new tab content panel.
	 *
	 * @param   string  $selector  Identifier of the panel.
	 * @param   string  $id        The ID of the div element
	 * @param   string  $title     The title text for the new UL tab
	 *
	 * @return  string  HTML to start a new panel
	 *
	 * @since   3.1
	 */
	public static function addTab($selector, $id, $title)
	{
		static $tabScriptLayout = null;
		static $tabLayout = null;

		$tabScriptLayout = is_null($tabScriptLayout) ? new JLayoutFile('libraries.cms.html.bootstrap.addtabscript') : $tabScriptLayout;
		$tabLayout = is_null($tabLayout) ? new JLayoutFile('libraries.cms.html.bootstrap.addtab') : $tabLayout;

		$active = (static::$loaded['JHtmlBootstrap::startTabSet'][$selector]['active'] == $id) ? ' active' : '';

		// Inject tab into UL
		JFactory::getDocument()
		->addScriptDeclaration($tabScriptLayout->render(array('selector' => $selector,'id' => $id, 'active' => $active, 'title' => $title)));

		$html = $tabLayout->render(array('id' => $id, 'active' => $active));

		return $html;
	}

	/**
	 * Close the current tab content panel
	 *
	 * @return  string  HTML to close the pane
	 *
	 * @since   3.1
	 */
	public static function endTab()
	{
		$html = JLayoutHelper::render('libraries.cms.html.bootstrap.endtab');

		return $html;
	}

	/**
	 * Creates a tab pane
	 *
	 * @param   string  $selector  The pane identifier.
	 * @param   array   $params    The parameters for the pane
	 *
	 * @return  string
	 *
	 * @since   3.0
	 * @deprecated  4.0	Use JHtml::_('bootstrap.startTabSet') instead.
	 */
	public static function startPane($selector = 'myTab', $params = array())
	{
		$sig = md5(serialize(array($selector, $params)));

		if (!isset(static::$loaded['JHtmlBootstrap::startTabSet'][$sig]))
		{
			// Include Bootstrap framework
			static::framework();

			// Setup options object
			$opt['active'] = isset($params['active']) ? (string) $params['active'] : '';

			// Attach tab to document
			JFactory::getDocument()->addScriptDeclaration(
				"(function($){
					$('#$selector a').click(function (e) {
						e.preventDefault();
						$(this).tab('show');
					});
				})(jQuery);"
			);

			// Set static array
			static::$loaded['JHtmlBootstrap::startTabSet'][$sig] = true;
			static::$loaded['JHtmlBootstrap::startTabSet'][$selector]['active'] = $opt['active'];
		}

		return '<div class="tab-content" id="' . $selector . 'Content">';
	}

	/**
	 * Close the current tab pane
	 *
	 * @return  string  HTML to close the pane
	 *
	 * @since   3.0
	 * @deprecated  4.0	Use JHtml::_('bootstrap.endTabSet') instead.
	 */
	public static function endPane()
	{
		return '</div>';
	}

	/**
	 * Begins the display of a new tab content panel.
	 *
	 * @param   string  $selector  Identifier of the panel.
	 * @param   string  $id        The ID of the div element
	 *
	 * @return  string  HTML to start a new panel
	 *
	 * @since   3.0
	 * @deprecated  4.0 Use JHtml::_('bootstrap.addTab') instead.
	 */
	public static function addPanel($selector, $id)
	{
		$active = (static::$loaded['JHtmlBootstrap::startTabSet'][$selector]['active'] == $id) ? ' active' : '';

		return '<div id="' . $id . '" class="tab-pane' . $active . '">';
	}

	/**
	 * Close the current tab content panel
	 *
	 * @return  string  HTML to close the pane
	 *
	 * @since   3.0
	 * @deprecated  4.0 Use JHtml::_('bootstrap.endTab') instead.
	 */
	public static function endPanel()
	{
		return '</div>';
	}

	/**
	 * Loads CSS files needed by Bootstrap
	 *
	 * @param   boolean  $includeMainCss  If true, main bootstrap.css files are loaded
	 * @param   string   $direction       rtl or ltr direction. If empty, ltr is assumed
	 * @param   array    $attribs         Optional array of attributes to be passed to JHtml::_('stylesheet')
	 *
	 * @return  void
	 *
	 * @since   3.0
	 */
	public static function loadCss($includeMainCss = true, $direction = 'ltr', $attribs = array())
	{
		// Load Bootstrap main CSS
		if ($includeMainCss)
		{
			JHtml::_('stylesheet', 'jui/bootstrap.min.css', $attribs, true);
			JHtml::_('stylesheet', 'jui/bootstrap-responsive.min.css', $attribs, true);
			JHtml::_('stylesheet', 'jui/bootstrap-extended.css', $attribs, true);
		}

		// Load Bootstrap RTL CSS
		if ($direction === 'rtl')
		{
			JHtml::_('stylesheet', 'jui/bootstrap-rtl.css', $attribs, true);
		}
	}
}
