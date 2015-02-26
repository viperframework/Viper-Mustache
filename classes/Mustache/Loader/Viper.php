<?php defined('SYSPATH') OR die('Direct access is never permitted.');

/**
 * Viper Framework Mustache Loader Viper Implementation Class.
 * 
 * @package      Viper/Mustache
 * @category     Base
 * @name         Viper
 * @author       Michael Noël <mike@viperframework.com>
 * @author       Viper Team
 * @copyright    (c) 2015 Viper Framework
 * @license      https://viperframework.com/license
 * @version      4.0.3
 * @see          Mustache_Loader, Mustache_Loader_MutableLoader
 */

class Mustache_Loader_Viper implements Mustache_Loader, Mustache_Loader_MutableLoader {
    
	/**
	 * @access  private
	 * @var     string  $_base_dir  Base templates directory name
	 */
	private $_base_dir = 'templates';
	
    /**
     * @access  private
     * @var     string  $_extension  Mustache file extension name
     */
    private $_extension = 'mustache';
	
    /**
     * @access  private
     * @var     array  $_templates  Templates
     */
    private $_templates = array();
    
	/**
	 * Constructor.
     * 
     * @access  public
     * @param   mixed  $base_dir  Base directory
	 * @param   mixed  $options   Options
     * @return  void
	 */
	public function __construct($base_dir = NULL, $options = array())
	{
		if ($base_dir)
        {
            $this->_base_dir = $base_dir;
        } // End If
        
		if (isset($options['extension']))
		{
			$this->_extension = ltrim($options['extension'], '.');
		} // End If
	} // End Method
    
	/**
	 * Load.
     * 
     * @access  public
	 * @param   mixed  $name  Name
	 * @return  mixed
	 */
	public function load($name)
	{
		if ( ! isset($this->_templates[$name]))
		{
			$this->_templates[$name] = $this->_load_file($name);
		} // End If
        
		return $this->_templates[$name];
	} // End Method
    
	/**
     * Load File.
     * 
	 * @access  protected
	 * @param   mixed  $name  Name
	 * @throws  Viper_Exception 
	 * @return  mixed
     * @uses  Viper::find_file
	 */
	protected function _load_file($name)
	{
		$filename = Viper::find_file($this->_base_dir, $name = strtolower($name), $this->_extension);
        
		if ( ! $filename)
		{
			throw new Viper_Exception('Mustache template ":name" not found', array(
                ':name' => $name,
            ));
		} // End If
        
		return file_get_contents($filename);
	} // End Method
    
	/**
	 * Set an associative array of Template sources for this loader.
	 * 
     * @access  public
	 * @param   array  $templates  Templates
     * @return  void
	 */
	public function setTemplates(array $templates)
	{
		$this->_templates = array_merge($this->_templates, $templates);
	} // End Method
    
	/**
	 * Set a Template source by name.
	 * 
     * @access  public
	 * @param   string  $name      Name
	 * @param   string  $template  Mustache Template source
     * @return  void
	 */
	public function setTemplate($name, $template)
	{
		$this->_templates[$name] = $template;
	} // End Method
    
} // End Mustache_Loader_Viper Class
