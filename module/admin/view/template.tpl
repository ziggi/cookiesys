<!DOCTYPE html>
<html>
  <head>
    <title>CookieSys Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
{foreach $styles as $style_url}
    <link href="{$style_url}" rel="stylesheet" media="screen">
{/foreach}
{foreach $scripts as $script_url}
    <script src="{$script_url}"></script>
{/foreach}
  </head>
  <body>
   <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">CookieSys Admin</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Помощь</a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Поиск...">
          </form>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="#">CookieSys <span class="sr-only">(current)</span></a></li>
            <li><a href="#">Конфигурация</a></li>
          </ul>
          <ul class="nav nav-sidebar">
{foreach from=$data key=module_name item=module}
            <li><a href="{$uri.site}admin/{$module_name}">{$module.name}</a></li>
{/foreach}
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          some
        </div>
      </div>
    </div>
  </body>
</html>