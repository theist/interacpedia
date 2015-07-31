<?php namespace App\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider {

	/**
	 * This namespace is applied to the controller routes in your routes file.
	 *
	 * In addition, it is set as the URL generator's root namespace.
	 *
	 * @var string
	 */
	protected $namespace = 'App\Http\Controllers';

	/**
	 * Define your route model bindings, pattern filters, etc.
	 *
	 * @param  \Illuminate\Routing\Router  $router
	 * @return void
	 */
	public function boot(Router $router)
	{
		parent::boot($router);
        $router->model('stories', 'App\Interacpedia\Story');
        $router->model('challenges', 'App\Interacpedia\Challenge');
		$router->model('courses', 'App\Interacpedia\Course');
        $router->model('companies', 'App\Interacpedia\Company');
        $router->model('projects', 'App\Interacpedia\Project');
        $router->model('comments', 'App\Interacpedia\Comment');
        $router->model('likes', 'App\Interacpedia\Like');
        $router->model('follows', 'App\Interacpedia\Follow');
        $router->model('groups', 'App\Interacpedia\Group');
        $router->model('messages', 'App\Interacpedia\Message');
		$router->model('notifications', 'App\Interacpedia\Notification');

//
	}

	/**
	 * Define the routes for the application.
	 *
	 * @param  \Illuminate\Routing\Router  $router
	 * @return void
	 */
	public function map(Router $router)
	{
		$router->group(['namespace' => $this->namespace], function($router)
		{
			require app_path('Http/routes.php');
		});
	}

}
