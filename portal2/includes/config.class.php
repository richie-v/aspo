<?PHP
//class holding all configuration variables
class Config {
	
	public $config = array();

	function load($conffile) {
		
		//read config file
		if(!is_readable($conffile))
			return false;

		//set configuration
		$this->config = parse_ini_file($conffile);
		return true;
	}
	
	/**
	 * Sets configuration for factory objects.
	 *
	 * Sets configuration variable. Pass directive and value or configuration array as arguments.
	 * @access		public
	 * @param		string|array $conf directive or array with configuration directives and values
	 * @param		mixed $value configuration value
	 * @return		bool true
	 */
	function set($conf, $value = 0) {
		if(is_array($conf))
			$this->config = array_merge($this->config, $conf);
		else
			$this->config[$conf] = $value;
		return true;
	}
	
	/**
	 * Gets configuration value.
	 *
	 * Gets configuration from factory objects.
	 * Returns single directive or complete configuration if directive ommitted.
	 * @access		public
	 * @param		string $conf directive to get
	 * @return		value or null
	 */
	function get($conf = false) {
		if($conf && isset($this->config[$conf]))
			return $this->config[$conf];
		else
			return false;
	}

	/**
	 * Gets all configuration values.
	 *
	 * Gets configuration from factory objects.
	 * Returns single directive or complete configuration if directive ommitted.
	 * @access		public
	 * @param		string $conf directive to get
	 * @return		array
	 */
	function get_all() {
		return $this->config;
	}
	
}