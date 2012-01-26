The most rad li3  DirectAdmin API
==============================

Under development....

Usage
----------
See http://www.directadmin.com/api.html

Commands are like CMD_API_ADMIN_STATS. You can use every command that's possible in the 
DirectAdmin API with camelcase and without the "CMD_API_"-prefix.

Example
----------
<?php

$DirectAdmin = new DirectAdmin(array('host' => 'mydaserver.com', 'port' => '2222', 
'username' => 'user', 'password' => 'pass'));

$users = $DirectAdmin->showUsers();
return compact('users');

?>

Notice: I'm new to Lithium (and all other Frameworks) so if you can make my library better, 
please fork. Maby make it static? So that I can call DirectAdmin::showUsers(); ??
