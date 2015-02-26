<?php defined('SYSPATH') OR die('Direct access is never permitted.');

/**
 * Viper Framework Mustache Base Class.
 * 
 * @package      Viper/Mustache
 * @category     Base
 * @name         Mustache
 * @author       Michael Noël <mike@viperframework.com>
 * @author       Viper Team
 * @copyright    (c) 2015 Viper Framework
 * @license      https://viperframework.com/license
 * @version      4.0.3
 */

class Viper_Mustache {
    
    // Constants.
	const VERSION = '4.0.3';
    
	/**
	 * @access  protected
	 * @var     mixed  $_engine  Engine
	 */
	protected $_engine;
    
    /**
     * Constructor.
     * 
	 * @access  public
	 * @param   mixed  $engine  Engine
     * @return  void
	 */
	public function __construct($engine)
	{
		$this->_engine = $engine;
	} // End Method
    
	/**
     * Factory intance.
     * 
     * @static
	 * @access  public
	 * @return  object  Class
     * @uses  Mustache_Engine
     * @uses  Mustache_Loader_Viper
     * @uses  HTML::chars
     * @uses  Viper::$cache_dir
	 */
	public static function factory()
	{
		$m = new Mustache_Engine(
			array(
				'loader' => new Mustache_Loader_Viper(),
				'partials_loader' => new Mustache_Loader_Viper('templates/partials'),
				'escape' => function($value) {
					return HTML::chars($value);
				},
				'cache' => Viper::$cache_dir.DIRECTORY_SEPARATOR.'mustache',
			)
		);
        
		$class = get_called_class();
        
		return new $class($m);
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
		if ($template == NULL)
		{
			$template = $this->_detect_template_path($class);
		} // End If
        
		return $this->_engine->loadTemplate($template)->render($class);
	} // End Method
    
	/**
     * Detect Template Path.
     * 
	 * @access  protected
	 * @param   mixed  $class  Class
	 * @return  mixed
	 */
	protected function _detect_template_path($class)
	{
		$path = explode('_', get_class($class));
        
		array_shift($path);
        
		return implode('/', $path);
	} // End Method
    
} // End Viper_Mustache Class
