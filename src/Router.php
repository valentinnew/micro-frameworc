<?php declare(strict_types=1);


namespace MF;


use MF\Action\NotFound;

/**
 * Class Route
 * @package Core
 *
 * Возвращает Экшен по урлу.
 * Конфиг:
 *      coreNamespace - нэймспэйс, относительно которого искать экшены.
 * Алгоритм получения:
 *      '/' - \Index\Action\Index
 *      '/SomeModule' - \SomeModule\Action\Index
 *      '/SomeModule/ActionName' = \SomeModule\Action\ActionName
 *
 *
 */
class Router
{
    private $coreNamespace;

    public function __construct($config)
    {
        $this->coreNamespace = $config['coreNamespace'];
    }

    public function getAction(Application $app, string $uri): ActionInterface
    {
        $className = $this->getActionClass($uri);
        if ($className
            && class_exists($className)
            && in_array(ActionInterface::class, class_implements($className))
        ) {
            $action = new $className();
        } else {
            $action = new NotFound();
        }

        $action->setApp($app);
        return $action;
    }

    public function getActionClass(string $uri): string
    {
        if ($uri === '/') {
            $path = ['index', 'index'];
        } else {
            $path = explode('/', trim($uri, '/'));
        }

        $className = '';
        if (count($path) === 2) {
            $className = $this->coreNamespace . ucfirst($path[0]) . '\\Action\\' . ucfirst($path[1]);
        } elseif (count($path) === 1) {
            $className = $this->coreNamespace . ucfirst($path[0]) . '\\Action\\Index';
        }

        return $className;
    }
}