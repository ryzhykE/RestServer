<?php
/**
 *  this class used to hide files of application
 *  and get user actions
 */
namespace application\core;
use application\controllers as controller;

class Route
{
	private $url;
    private $method;    

    public function __construct()
    {
   
        $this->url = $_SERVER['REQUEST_URI'];
        $this->method = $_SERVER['REQUEST_METHOD'];
    }

	public function start()
	{
		list($server, $user, $dir, $taskDir , $serverDir , $apiDir, $className, $data) = explode('/', $this->url, 8);
       // list($server, $serverDir,$apiDir ,$className, $data) = explode('/', $this->url , 7);

        $className[0] = strtoupper($className[0]); 
        
        $controllerName = 'Controller' . $className;
        $controllerClass = 'application\controllers\\Controller' . $className;
        
        $controllerFile = $controllerName . '.php';
		$controllerPath = "application/controllers/" . $controllerFile;
	    echo $data;	
		if(!file_exists($controllerPath))
		{
			$this->ErrorPage404();	
		}

        switch($this->method)
        {
        case 'GET':
            $controller = new $controllerClass($className);
            if(method_exists($controller, 'actionGet'))
			{
				$controller->actionGet();
			}
			else
			{
				Route::ErrorPage404();
			}
            break;
        case 'POST':
            $controller = new $controllerClass($className);
            if(method_exists($controller, 'actionPost'))
			{
				$controller->actionPost();
			}
			else
			{
				Route::ErrorPage404();
			}
            break;
        case 'DELETE':
            $controller = new $controllerClass($className);
            if(method_exists($controller, 'actionDelete'))
			{
				$controller->actionDelete();
			}
			else
			{
				Route::ErrorPage404();
			}
            break;
        case 'PUT':
        	$controller = new $controllerClass($className);
            if(method_exists($controller, 'actionPut'))
			{
				$controller->actionPut();
			}
			else
			{
				Route::ErrorPage404();
			}
            break;
        default:
            $this->ErrorPage404();
        } 

	} 

	/**
	 * redirects user on 404 screen
	 */
	public function ErrorPage404()
	{
		$host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
		header('HTTP/1.1 404 Not Found');
		header("Status: 404 Not Found");
		header('Location:' . $host . '404');
	}

}
