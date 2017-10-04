<?php
namespace application\core;
/**
 * Base class of view includes files of template
 * 	
 */

class View
{
	/**
	 * function include file with template, send
	 * data to view from controller
	 * @param  string $content_view  name of content template
	 * @param  string $template_view name of base template
	 * @param  array $data          data from model
	 * @return true                
	 */
	function generate($contentView, $templateView, $data = null)
	{
		include "application/views/" . $templateView;
	}
}