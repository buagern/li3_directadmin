<?php

namespace li3_directadmin\extensions\adapter;

use lithium\util\String;
use \lithium\util\Inflector;

class DirectAdmin extends \lithium\net\http\Service {
	
	public function __construct($config = array()) {

		# Define default configuration
		$defaults = array(
			'socket' => 'Context',
			'encoding' => 'UTF-8',
			'scheme' => 'http',
			'host' => 'localhost',
			'port' => '2222',
			'username' => 'user',
			'password' => 'password',
			'auth' => null,
			'timeout' => 30
		);
		
		# Add config to default
		$config += $defaults;
		
		# Reset HOST because DirectAdmin API requires another format
		$config['host'] = String::insert("{:username}:{:password}@{:host}", array(
			'username' => $config['username'],
			'password' => $config['password'],
			'host' => $config['host']
		));
		
		# Send configuration to parent
		parent::__construct($config);
	}
	
	/**
	 * Main function to retrieve the variabeles from the DA-server
	 * @param $command
	 * @param array $params
	 * @return array|null
	 */
	private function command($command, $params = array()) {
		parse_str($this->get($command, $params), $array);
		return $array;
	}
	
	/**
	 * Call API functions whithout CMD_API_ and underscores. Call them with camelcase.
	 * Example: `CMD_API_SHOW_USERS = $directadmin->showUsers($params = array());`
	 * @param $method
	 * @param array $params
	 * @return array|null
	 */
	public function __call($method, $params = array()) {
		return $this->command('CMD_API_' . strtoupper(Inflector::underscore($method)), $params);
	}
	
	

	
}
