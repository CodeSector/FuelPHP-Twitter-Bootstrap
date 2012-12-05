<?php

namespace Bootstrap;

/**
 * Represents nav list element.
 * 
 * @extends BootstrapModule
 */
abstract class Html_Nav extends BootstrapModule {
	
	protected $use_item = 'Html_Item';
	
	/**
	 * Items in list
	 * 
	 * (default value: array())
	 * 
	 * @var array
	 * @access protected
	 */
	protected $items = array();
	
	/**
	 * Add item to the list.
	 * 
	 * @access public
	 * @param mixed $anchor
	 * @param string $title (default: '')
	 * @param array $attrs (default: array())
	 * @param bool $secure (default: false)
	 * @return void
	 */
	public function item($anchor, $title = '', $attrs = array(), $secure = false)
	{
		$class = $this->use_item;
		
		$item = $class::forge($attrs)->make($anchor, $title, $secure);
		
		$this->items[] = $item;
		
		return $item;
	}
	
	/**
	 * 
	 * @access public
	 * @return void
	 */
	public function render()
	{
		$this->css('nav', 'nav-'.$this->attrs['type']);
		
		$this->html('ul', implode(PHP_EOL, $this->items));
		
		return parent::render();
	}
	
}