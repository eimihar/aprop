<?php

use App\Exe;
use Exedra\Routing\Router;

require_once __DIR__.'/vendor/autoload.php';

$app = new \Exedra\Application(__DIR__);

$app->autoloadSrc();

$app['factory']->set('runtime.exe', App\Exe::class);

// env based db config
if($app->path['app']->has('config/env.php'))
    $app->config->set($app->path['app']->load('config/env.php'));
else
    throw new \Exception('Environment config is missing!!');

$app->provider->add(\Laraquent\Support\Exedra\Provider::class);

$app->provider->add(\Exedra\Support\Provider\Modular::class);

$app->map->middleware(\App\Middleware\UrlRegistry::class);

$app->map->middleware(function(Exe $exe)
{
    $exe['service']->add('layout', function() {
        return $this->view->create('layout');
    });

    return $exe->next($exe);
});

$app->map->middleware(\App\Middleware\All::class);

$app->map->middleware(\App\Middleware\RestController::class);

$app->map['admin']->any('/admin')->attr('module', 'Agent')->group(function(Router $admin)
{
    $admin['default']->any('/[:controller]/[:action?]')->execute(function(Exe $exe)
    {
        $exe->view->setDefaultData('form', $exe->form);

        $controller = ucfirst($exe->param('controller'));

        return $exe->rest($controller, $exe->param('action', 'index'));
    });
});

$app->map['web']->attr('module', 'Frontend')->group(function(Router $web)
{
    $web['landing']->any('/')->execute('controller=Web@index');

    $web['projects']->get('/senarai')->execute('controller=Web@projects');

    $web['contact']->get('/hubungi-kami')->execute('controller=Web@contact');

    $web['project']->get('/p/[:project-slug]')->execute('controller=Web@project');

    $web['default']->get('/[**:action]')->execute('controller=Web@{action}');
});

return $app;