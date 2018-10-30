<?php
//($url, page, $alias optional)
Router::add('/', 'login.php', 'login');
Router::add('login/', 'login.php', 'login');
Router::add('home', 'login.php');
Router::add('dashboard', 'dashboard.php');