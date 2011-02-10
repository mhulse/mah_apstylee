<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// --------------------------------------------------------------------

$plugin_info = array(
	'pi_name' => 'APStylee',
	'pi_version' => '1.0',
	'pi_author' => 'Micky Hulse',
	'pi_author_url' => 'https://github.com/mhulse/mah_apstylee',
	'pi_description' => '[Expression Engine 2.0] APStylee: Formats date/time according to AP style standards.',
	'pi_usage' => Mah_apstylee::usage()
);

// --------------------------------------------------------------------

/**
 * Mah_apstylee Class
 * 
 * @package       ExpressionEngine
 * @category      Plugin
 * @author        Micky Hulse
 * @copyright     Copyright (c) 2011, Micky Hulse
 * @link          http://hulse.me/
 */

class Mah_apstylee {
	
	// ----------------------------------
	// Public class variables:
	// ----------------------------------
	
	public $return_data = '';
	
	// ----------------------------------
	// Private class variables:
	// ----------------------------------
	
	private $timestamp = FALSE;
	private $ap_noon = FALSE;
	private $ap_midnight = FALSE;
	private $ap_today = FALSE;
	private $ap_not_today = TRUE;
	private $ap_year_now = FALSE;
	private $ap_not_year_now = TRUE;
	private $ap_month_now = FALSE;
	private $ap_not_month_now = TRUE;
	private $ap_time = '';
	private $ap_meridiem = '';
	private $ap_day = '';
	private $ap_month = '';
	private $ap_year = '';
	
	/**
	 * PHP 4 constructor.
	 * Plugin won't work without it.
	 *
	 * @see     __construct
	 */
	
	public function Mah_apstylee()
	{
		$this->__construct();
	}
	
	/**
	 * Constructor
	 *
	 * @access     public
	 * @return     mixed
	 */
	
	function __construct()
	{
		
		# Performance Guidelines:
		# http://expressionengine.com/public_beta/docs/development/guidelines/performance.html
		# General Style and Syntax:
		# http://expressionengine.com/public_beta/docs/development/guidelines/general.html
		
		// ----------------------------------
		// Call super object:
		// ----------------------------------

		$this->EE =& get_instance();
		
		// ----------------------------------
		// Fetch plugin parameters:
		// ----------------------------------
		
		$this->timestamp = $this->EE->TMPL->fetch_param('timestamp');
		
		// ----------------------------------
		// Check required:
		// ----------------------------------
		
		if ($this->timestamp !== FALSE) {
			
			// ----------------------------------
			// Validate timestamp:
			// ----------------------------------
			
			$this->timestamp = (is_numeric($this->timestamp) && strtotime($this->timestamp) === FALSE) ? $this->timestamp : strtotime($this->timestamp .' UTC');
			
			// ----------------------------------
			// Populate class variables:
			// ----------------------------------
			
			$this->ap_meridiem = $this->_ap_meridiem();
			$this->ap_time = $this->_ap_time();
			$this->ap_day = $this->_ap_day();
			$this->ap_month = $this->_ap_month();
			$this->ap_year = $this->_ap_year();
		
			// ----------------------------------
			// Obtain tag data:
			// ----------------------------------
			
			$tagdata = $this->EE->TMPL->tagdata;
		
			// ----------------------------------
			// Single or wrapping tag?
			// ----------------------------------
			
			if (trim($tagdata) !== ''):
				
				//--------------------------------------------------------------------------
				//
				// "Wrapping" tag:
				//
				//--------------------------------------------------------------------------
				
				// ----------------------------------
				// Parse variables:
				// ----------------------------------
				
				$variables[] = array(
					'ap_noon' => $this->ap_noon,
					'ap_midnight' => $this->ap_midnight,
					'ap_today' => $this->ap_today,
					'ap_not_today' => $this->ap_not_today,
					'ap_year_now' => $this->ap_year_now,
					'ap_not_year_now' => $this->ap_not_year_now,
					'ap_month_now' => $this->ap_month_now,
					'ap_not_month_now' => $this->ap_not_month_now,
					'ap_time' => $this->ap_time,
					'ap_meridiem' => $this->ap_meridiem,
					'ap_day' => $this->ap_day,
					'ap_month' => $this->ap_month,
					'ap_year' => $this->ap_year
				);
				
				// ----------------------------------
				// Return:
				// ----------------------------------
				
				$this->return_data = $this->EE->TMPL->parse_variables($tagdata, $variables); // Exit point 1 of 2.
				
			else:
				
				//--------------------------------------------------------------------------
				//
				// "Single" tag:
				//
				//--------------------------------------------------------------------------
				
				// ----------------------------------
				// Fetch parameters:
				// ----------------------------------
				
				$get_year = $this->EE->TMPL->fetch_param('year'); // Note: values of 'y', 'on' and 'yes' will all return 'yes', while 'n', 'off' and 'no' all return 'no'.
				$get_today = $this->EE->TMPL->fetch_param('today');
				$get_noon = $this->EE->TMPL->fetch_param('noon');
				$get_midnight = $this->EE->TMPL->fetch_param('midnight');
				
				// ----------------------------------
				// Determine return value:
				// ----------------------------------
				
				switch ($this->EE->TMPL->fetch_param('return')) {
					
					case 'timeonly':
						$return = ((($get_noon !== FALSE) && ($this->ap_noon === TRUE)) ? $get_noon : ((($get_midnight !== FALSE) && ($this->ap_midnight === TRUE)) ? $get_midnight : $this->ap_time)) . ((($this->ap_noon !== TRUE) && ($this->ap_midnight !== TRUE)) ? ' ' . $this->ap_meridiem : '');
						break;
						
					case 'dateonly':
						$return = ((($get_today !== FALSE) && ($this->ap_today === TRUE)) ? $get_today : $this->ap_day) . ' ' . $this->ap_month . (($get_year === 'yes') ? ', ' . $this->ap_year : (($this->ap_year_now !== TRUE) ? ', ' . $this->ap_year : ''));
						break;
					
					case 'time':
						$return = $this->ap_time;
						break;
					
					case 'meridiem':
						$return = $this->ap_meridiem;
						break;
					
					case 'day':
						$return = (($get_today !== FALSE) && ($this->ap_today === TRUE)) ? $get_today : $this->ap_day;
						break;
					
					case 'month':
						$return = $this->ap_month;
						break;
					
					case 'year':
						$return = $this->ap_year;
						break;
					
					default:
						$return = ((($get_noon !== FALSE) && ($this->ap_noon === TRUE)) ? $get_noon : ((($get_midnight !== FALSE) && ($this->ap_midnight === TRUE)) ? $get_midnight : $this->ap_time)) . ((($this->ap_noon !== TRUE) && ($this->ap_midnight !== TRUE)) ? ' ' . $this->ap_meridiem : '') . ', ' . ((($get_today !== FALSE) && ($this->ap_today === TRUE)) ? $get_today : $this->ap_day) . ' ' . $this->ap_month . (($get_year === 'yes') ? ', ' . $this->ap_year : (($this->ap_year_now !== TRUE) ? ', ' . $this->ap_year : ''));
					
				}
				
				// ----------------------------------
				// Return:
				// ----------------------------------
				
				$this->return_data = $return; // Exit point 2 of 2.
				
			endif;
			
		}
		
	}
	
	//--------------------------------------------------------------------------
	//
	// Public methods:
	//
	//--------------------------------------------------------------------------
	
	/**
	 * Third segment call for plugin.
	 * 
	 * @access     private
	 * @return     string
	 */
	
	public function single()
	{
		
		/*
		** 
		** Using a "third segment" class method bypasses the "random" bug.
		** http://emarketsouth.com/add-ons/string-plugin/template-tags/#random-parameter
		** 
		*/
		
		return $this->return_data;
		
	}
	
	//--------------------------------------------------------------------------
	//
	// Private methods:
	//
	//--------------------------------------------------------------------------
	
	/**
	 * Gets meridiem
	 * 
	 * @access     private
	 * @return     string
	 */
	
	private function _ap_meridiem()
	{
		
		return ($this->EE->localize->decode_date('%a', $this->timestamp) == 'am') ? 'a.m.' : 'p.m.';
		
	}
	
	// --------------------------------------------------------------------
	
	/**
	 * Gets time
	 * 
	 * @access     private
	 * @return     string
	 */
	
	private function _ap_time()
	{
		
		// Noon or midnight?
		
		$t = $this->EE->localize->decode_date('%H:%i', $this->timestamp);
		
		if ($t == '00:00'): $this->ap_midnight = TRUE;
		
		elseif ($t == '12:00'): $this->ap_noon = TRUE;
		
		endif;
		
		// Leading zeros:
		
		if ($this->EE->localize->decode_date('%i', $this->timestamp) == '00'): $return = $this->EE->localize->decode_date('%g', $this->timestamp);
		
		else: $return = $this->EE->localize->decode_date('%g:%i', $this->timestamp);
		
		endif;
		
		return $return;
		
	}
	
	// --------------------------------------------------------------------
	
	/**
	 * Gets day
	 * 
	 * @access     private
	 * @return     string
	 */
	
	private function _ap_day()
	{
		
		if ($this->EE->localize->decode_date('%F %j %Y', $this->timestamp) == $this->EE->localize->decode_date('%F %j %Y', $this->EE->localize->now)):
			
			$this->ap_today = TRUE;
			$this->ap_not_today = FALSE;
			
		endif;
		
		return $this->EE->localize->decode_date('%j', $this->timestamp);
	
	}
	
	// --------------------------------------------------------------------
	
	/**
	 * Gets month
	 * 
	 * @access     private
	 * @return     string
	 */
	
	private function _ap_month()
	{
		
		$m = $this->EE->localize->decode_date('%m', $this->timestamp);
		
		if ($m == $this->EE->localize->decode_date('%m', $this->EE->localize->now)):
			
			$this->ap_month_now = TRUE;
			$this->ap_not_month_now = FALSE;
			
		endif;
		
		$ap_months_array = array('01' => 'Jan.', '02' => 'Feb.', '08' => 'Aug.', '09' => 'Sept.', '10' => 'Oct.', '11' => 'Nov.', '12' => 'Dec.');
		
		// All months with five letters or less are never abbreviated:
		return (isset($ap_months_array[$m])) ? $ap_months_array[$m] : $this->EE->localize->decode_date('%F', $this->timestamp);
		
	}
	
	// --------------------------------------------------------------------
	
	/**
	 * Gets year
	 * 
	 * @access     private
	 * @return     string
	 */
	
	private function _ap_year()
	{
		
		$y = $this->EE->localize->decode_date('%Y', $this->timestamp);
		
		if ($y == $this->EE->localize->decode_date('%Y', $this->EE->localize->now)):
			
			$this->ap_year_now = TRUE;
			$this->ap_not_year_now = FALSE;
			
		endif;
		
		return $y;
	
	}
	
	//--------------------------------------------------------------------------
	//
	// Usage:
	//
	//--------------------------------------------------------------------------
	
	/**
	 * Plugin Usage
	 * 
	 * @access     public
	 * @return     string
	 */
	
	public function usage()
	{
		
		ob_start();
		
		?>
		
		More information & documentation:
		
		https://github.com/mhulse/mah_apstylee
		
		Changelog:
		
		Version 1.0
		******************
		2011/02/09: Initial public release.
		
		<?php
		
		$buffer = ob_get_contents();
		
		ob_end_clean(); 
		
		return $buffer;
		
	}
	
	// --------------------------------------------------------------------
	
}

/* End of file pi.mah_eencode.php */
/* Location: ./system/expressionengine/third_party/mah_eencode/pi.mah_apstylee.php */