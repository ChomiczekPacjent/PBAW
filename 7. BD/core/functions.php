<?php
function getFrom(&$source,&$idx,&$required,&$required_message){
	if (isset($source[$idx])){
		return $source[$idx];
	} else {
		if ($required) getMessages()->addError($required_message);
		return null;
	}
}

function getFromRequest($param_name,$required=false,$required_message=null){
	return getFrom($_REQUEST,$param_name,$required,$required_message);
}
function getFromGet($param_name,$required=false,$required_message=null){
	return getFrom($_GET,$param_name,$required,$required_message);
}
function getFromPost($param_name,$required=false,$required_message=null){
	return getFrom($_POST,$param_name,$required,$required_message);
}
function getFromCookies($param_name,$required=false,$required_message=null){
	return getFrom($_COOKIES,$param_name,$required,$required_message);
}
function getFromSession($param_name,$required=false,$required_message=null){
	return getFrom($_SESSION,$param_name,$required,$required_message);
}

function forwardTo($action_name){
	getRouter()->setAction($action_name);
	include getConf()->root_path."/ctrl.php";
	exit;
}

function redirectTo($action_name){
	header("Location: ".getConf()->action_url.$action_name);
	exit;
}

function addRole($role){
	getConf()->roles [$role] = true;
	$_SESSION['_roles'] = serialize(getConf()->roles);
}

function inRole($role){
	return isset(getConf()->roles[$role]);
}