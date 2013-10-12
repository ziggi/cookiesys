<?php /* Smarty version Smarty-3.1.14, created on 2013-09-29 23:58:31
         compiled from "/home/ziggi/public_html/cookiesys/template/default/404.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1819747705248848d864e42-06262867%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0fa06ff5c43e6f4f3e8eeb09f8798ba9728c3158' => 
    array (
      0 => '/home/ziggi/public_html/cookiesys/template/default/404.tpl',
      1 => 1380484135,
      2 => 'file',
    ),
    'ea09fce897b21b0423acbf5a3d53c6d452ca00ff' => 
    array (
      0 => '/home/ziggi/public_html/cookiesys/template/default/template.tpl',
      1 => 1380484705,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1819747705248848d864e42-06262867',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5248848e227c81_96242077',
  'variables' => 
  array (
    'uri' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5248848e227c81_96242077')) {function content_5248848e227c81_96242077($_smarty_tpl) {?><!DOCTYPE html>
<html>
  <head>
    <title>CookieSys</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo $_smarty_tpl->tpl_vars['uri']->value;?>
/asset/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="<?php echo $_smarty_tpl->tpl_vars['uri']->value;?>
/template/default/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
    <link href="<?php echo $_smarty_tpl->tpl_vars['uri']->value;?>
/template/default/css/navbar.css" rel="stylesheet" media="screen">
    <link href="<?php echo $_smarty_tpl->tpl_vars['uri']->value;?>
/template/default/css/signin.css" rel="stylesheet" media="screen">

  </head>
  <body>
    <div class="container">
      <div id="header" class="text-center">
        <img src="<?php echo $_smarty_tpl->tpl_vars['uri']->value;?>
/template/default/img/head.png" alt="head">
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
          
<div class="container">
  <h4>Ошибка 404</h4>
  <p><?php echo $_smarty_tpl->tpl_vars['data']->value['errorMsg'];?>
</p>
</div>

        </div>

        <div class="col-sm-3">
          <div class="container">
            <div class="panel panel-default">
              <div class="panel-body text-center" style="padding: 5px">
                <a href="http://vk.com/" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['uri']->value;?>
/template/default/img/vk.png" alt="vk"></a>
                <a href="http://twitter.com/" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['uri']->value;?>
/template/default/img/twitter.png" alt="twitter"></a>
                <a href="http://youtube.com/" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['uri']->value;?>
/template/default/img/youtube.png" alt="youtube"></a>
                <a href="http://facebook.com/" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['uri']->value;?>
/template/default/img/facebook.png" alt="facebook"></a>
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
    <script src="<?php echo $_smarty_tpl->tpl_vars['uri']->value;?>
/asset/js/jquery-2.0.3.min.js"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['uri']->value;?>
/asset/js/bootstrap.min.js"></script>
  </body>
</html><?php }} ?>