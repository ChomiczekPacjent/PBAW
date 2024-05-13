<?php

namespace core;

use Exception;

class Router {

    public $action = null;
    public $routes = array();
    private $default = null;
    private $login = 'login';

    public function setAction($action) {
        $this->action = $action;
    }

    public function getAction() {
        return $this->action;
    }
    
    public function addRouteEx($action, $namespace, $controller, $method, $roles = null) {
        $this->routes[$action] = new Route($namespace, $controller, $method, $roles);
    }

    public function addRoute($action, $controller, $roles = null) {
        $this->routes[$action] = new Route(null, $controller, 'action_'.$action, $roles);
    }

    public function setDefaultRoute($route) {
        $this->default = $route;
    }

    public function setLoginRoute($route) {
        $this->login = $route;
    }

    private function control($namespace, $controller, $method, $roles = null) {
        if (!empty($roles)) {
            $found = false;
            if (is_array($roles)) {
                foreach ($roles as $role) {
                    if (inRole($role)) {
                        $found = true;
                        break;
                    }
                }
            } else {
                if (inRole($roles))
                    $found = true;
            }
            if (!$found)
                forwardTo($this->login);
        }
        if (empty($namespace)) {
            $controller = "app\\controllers\\" . $controller;
        } else {
            $controller = $namespace . "\\" . $controller;
        }	
        $ctrl = new $controller;
        if (method_exists($ctrl, $method)) {
            $ctrl->$method();
        } else {
            throw new Exception('Method "' . $method . '" does not exist in "' . $controller . '"');
        }
        exit;
    }

    public function go() {
        if (isset($this->routes[$this->action])) {
            $r = $this->routes[$this->action];
            $this->control($r->namespace, $r->controller, $r->method, $r->roles);
        } else {
            if (isset($this->default) && isset($this->routes[$this->default])) {
                $r = $this->routes[$this->default];
                $this->control($r->namespace, $r->controller, $r->method, $r->roles);
            } else {
                throw new Exception('Route for "' . $this->action . '" is not defined');
            }
        }
    }

}
