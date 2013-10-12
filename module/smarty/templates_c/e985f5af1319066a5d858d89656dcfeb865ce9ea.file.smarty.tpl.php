<?php /* Smarty version Smarty-3.1.14, created on 2013-09-29 22:22:44
         compiled from "/home/ziggi/public_html/cookiesys/template/default/smarty.tpl" */ ?>
<?php /*%%SmartyHeaderCode:108407452452486ff4b4df37-72825013%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e985f5af1319066a5d858d89656dcfeb865ce9ea' => 
    array (
      0 => '/home/ziggi/public_html/cookiesys/template/default/smarty.tpl',
      1 => 1380478842,
      2 => 'file',
    ),
    'ea09fce897b21b0423acbf5a3d53c6d452ca00ff' => 
    array (
      0 => '/home/ziggi/public_html/cookiesys/template/default/template.tpl',
      1 => 1380478803,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '108407452452486ff4b4df37-72825013',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52486ff4cdd7f4_19969291',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52486ff4cdd7f4_19969291')) {function content_52486ff4cdd7f4_19969291($_smarty_tpl) {?><!DOCTYPE html>
<html>
  <head>
    <title>CookieSys</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="asset/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="template/default/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
    <link href="template/default/css/navbar.css" rel="stylesheet" media="screen">
    <link href="template/default/css/signin.css" rel="stylesheet" media="screen">

  </head>
  <body>
    <div class="container">
      <div id="header" class="text-center">
        <img src="template/default/img/head.png" alt="head">
      </div>

      <nav class="navbar navbar-default" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Главная</a></li>
            <li><a href="#">Форум</a></li>
            <li><a href="#">Как играть</a></li>
            <li><a href="#">Донат</a></li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Сервер <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">Игроки онлайн</a></li>
                <li><a href="#">Статистика игроков</a></li>
                <li><a href="#">Список забаненных</a></li>
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Аккаунт <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li style="width: 275px">
                  <form class="form-signin navbar-form">
                    <input type="text" class="form-control" placeholder="Логин" autofocus>
                    <input type="password" class="form-control" placeholder="Пароль">
                    <button class="btn btn-sm btn-primary btn-block" type="submit">Войти</button>
                    <button class="btn btn-sm btn-default btn-block" type="button">Регистрация</button>
                  </form>
                </li>
              </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </nav>

      <div class="row">

        <div class="col-sm-9">
          
        </div>

        <div class="col-sm-3">
          <div class="container">
            <div class="panel panel-default">
              <div class="panel-body text-center" style="padding: 5px">
                <a href="http://vk.com/" target="_blank"><img src="template/default/img/vk.png" alt="vk"></a>
                <a href="http://twitter.com/" target="_blank"><img src="template/default/img/twitter.png" alt="twitter"></a>
                <a href="http://youtube.com/" target="_blank"><img src="template/default/img/youtube.png" alt="youtube"></a>
                <a href="http://facebook.com/" target="_blank"><img src="template/default/img/facebook.png" alt="facebook"></a>
              </div>
            </div>

            <div class="panel panel-default" style="padding: 3px">
              <table class="table">
                <thead>
                  <tr>
                    <th colspan="2" class="text-center">
                      Название сервера
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>IP</td>
                    <td>127.0.0.1</td>
                  </tr>
                  <tr>
                    <td>Версия</td>
                    <td>0.3x</td>
                  </tr>
                  <tr>
                    <td>Игроки</td>
                    <td>40 / 100</td>
                  </tr>
                </tbody>
              </table>
              <button class="btn btn-primary btn-block">Подключиться</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Site footer -->
      <div id="footer">
        <div class="container">
          <p class="text-muted credit">&copy; <a href="http://ziggi.org/" target="_blank">ziggi</a> 2013</p>
        </div>
      </div>
    </div>
    <script src="asset/js/jquery-2.0.3.min.js"></script>
    <script src="asset/js/bootstrap.min.js"></script>
  </body>
</html><?php }} ?>