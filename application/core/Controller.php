<?php 
/**
 *  core class of controller can create model and view obj
 *  he gets requests from frontend and send its to model or not;
 *  when model returns data controller sends on view, than view 
 *  shows temolate and data in view for user
 */
namespace application\core;
	class Controller
	{
		protected $model;
		protected $view;
		
		/**
		 *  contructor init view and model obj
		 */
		function __construct()
		{
			
			$this->view = new View();
		}
		
		/**
		 * some action in cotroller wich user done
		 * 
		 */
		function actionIndex()
		{
			
		}
	}