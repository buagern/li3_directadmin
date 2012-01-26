# The most rad li3  DirectAdmin API

###Under development....
Notice that this library is still under development. Everything works but has not been extensively tested

###Documentation
See the [API-documentation](http://www.directadmin.com/api.html) for commands!


###How to use
First add the library in the ./config/bootstrap/libraries.php by adding the following code:

    Libraries::add('li3_directadmin');
      
Lazy load the library in top of the controller that you want to use

    use \li3_directadmin\extensions\adapter\DirectAdmin;
      
Now you can call the library in the controller:

    public function show_users() {
      
      // Initialize DirectAdmin object
      $directAdmin = new DirectAmdmin(array(
        'host' => 'mydahost.com', 
        'port' => 2222, 
        'username' => 'user',
        'password' => 'pass'
      ); 
      
      // Send 'CMD_API_SHOW_USERS' of the reseller with username 'business'
      $users = $directAdmin->showUsers(array('reseller' => 'business')); 
      
      // Return as array
      return compact('users');
      
      }
      
###Notice
All commands are available, because the methods are overloaded by __call. YOu can send add the parameters in $param as an array!

Example:
  *showUsers will be converted into CMD_API_SHOW_USERS automatically*