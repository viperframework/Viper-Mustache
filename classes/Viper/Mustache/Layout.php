<?php defined('SYSPATH') OR die('Direct access is never permitted.');

/**
 * Viper Framework Mustache Layout Template Class.
 * 
 * @package      Viper/Mustache
 * @category     Mustache
 * @name         Layout
 * @author       Michael Noël <mike@viperframework.com>
 * @author       Viper Team
 * @copyright    (c) 2015 Viper Framework
 * @license      https://viperframework.com/license
 * @version      4.0.3
 */

class Viper_Mustache_Layout extends Viper_Mustache {
    
	// Partial name for content.
	const CONTENT_PARTIAL = 'content';
    
	/**
     * @access  protected
	 * @var     string  $_layout  Layout path
	 */
	protected $_layout = 'layout';
    
	/**
     * Factory instance.
     * 
     * @static
	 * @access  public
	 * @param   mixed  $layout  Layout
	 * @return  mixed
	 */
	public static function factory($layout = 'layout')
	{
		$k = parent::factory();
        
		$k->set_layout($layout);
		
        return $k;
	} // End Method
    
    
	public function set_layout($layout)
	{
		$this->_layout = (string) $layout;
	} // End Method
    
	/**
	 * Render.
     * 
     * @access  public
	 * @param   mixed  $class     Class
	 * @param   mixed  $template  Template
	 * @return  mixed
	 */
	public function render($class, $template = NULL)
	{
		$content = $this->_engine->getLoader()->load($this->_detect_template_path($class));
        
		$this->_engine->setPartials(array(
			Mustache_Layout::CONTENT_PARTIAL => $content
		));
        
		return $this->_engine->loadTemplate($this->_layout)->render($class);
	} // End Method
    
} // End Viper_Mustache_Layout Class
