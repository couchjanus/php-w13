<?php

class Router
{
    protected $routes = ROUTES;

    public function direct($uri)
    {
        if (array_key_exists($uri, $this->routes)) {
            return $this->callAction(
                ...$this->getAction($this->routes[$uri])
            );
        } else {
            foreach ($this->routes as $key => $val) {
                $pattern = "@^" .preg_replace('/{([a-zA-Z0-9\_\-]+)}/', '(?<$1>[a-zA-Z0-9\_\-]+)', $key). "$@";
                preg_match($pattern, $uri, $matches);
                array_shift($matches);
                if ($matches) {
                    $getAction = $this->getAction($val);
                    return $this->callAction($getAction[0], $getAction[1], $getAction[2], $matches);
                }
            }
        }
        return $this->callAction(
                ...$this->getAction($this->routes['404'])
        );
    }

    private function getAction($route)
    {
        list($segments, $action) = explode('@', $route);
        $segments = explode('\\', $segments);
        $controller = array_pop($segments);
        $getControllerPath = '/';
        do {
            if (count($segments)==0) {
                return array ($controller, $action, $getControllerPath);
            } else {
                $segment = array_shift($segments);
                $getControllerPath = $getControllerPath.$segment.'/';
            }
        } while ( count($segments) >= 0);

    }

    protected function callAction($controller, $action, $getControllerPath, $vars = [])
    {
        include CONTROLLERS.$getControllerPath.'/'.$controller.EXT;
        
        $controller = new $controller;
        
        if (! method_exists($controller, $action)) {
            throw new Exception(
                "{$controller} does not respond to the {$action} action."
            );
        }
        return $controller->$action($vars);
    }
}
