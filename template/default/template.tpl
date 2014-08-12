<!DOCTYPE html>
<html>
  <head>
    <title>CookieSys</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{$uri.asset}/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="{$uri.template}/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
    <link href="{$uri.template}/css/navbar.css" rel="stylesheet" media="screen">
    <link href="{$uri.template}/css/signin.css" rel="stylesheet" media="screen">
  </head>
  <body>
    <div class="container">
      <div id="header" class="text-center">
        <img src="{$uri.template}/img/head.png" alt="head">
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
                <li>
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
          {block name=content}{/block}
        </div>

        <div class="col-sm-3">
          <div class="panel panel-default">
            <div class="panel-body text-center" style="padding: 5px">
              <a href="http://vk.com/" target="_blank"><img src="{$uri.template}/img/vk.png" alt="vk"></a>
              <a href="http://twitter.com/" target="_blank"><img src="{$uri.template}/img/twitter.png" alt="twitter"></a>
              <a href="http://youtube.com/" target="_blank"><img src="{$uri.template}/img/youtube.png" alt="youtube"></a>
              <a href="http://facebook.com/" target="_blank"><img src="{$uri.template}/img/facebook.png" alt="facebook"></a>
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

      <!-- Site footer -->
      <div id="footer">
        <p class="text-muted credit">&copy; <a href="http://ziggi.org/" target="_blank">ziggi</a> 2014</p>
      </div>
    </div>
    <script src="{$uri.asset}/js/jquery-2.1.1.min.js"></script>
    <script src="{$uri.asset}/js/bootstrap.min.js"></script>
  </body>
</html>