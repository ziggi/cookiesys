<!doctype html>
<html lang="en">
<head>
  <title>CookieSys Admin</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
  <meta name="viewport" content="width=device-width, initial-scale=1">
{foreach $styles as $style_url}
  <link href="{$style_url}" rel="stylesheet" media="screen">
{/foreach}
{foreach $scripts as $script_url}
  <script src="{$script_url}"></script>
{/foreach}
<head>

<body>
  <div class="mdl-layout__container">
    <div class="tpl-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
      <header class="tpl-header mdl-layout__header mdl-color--white mdl-color--grey-100 mdl-color-text--grey-600">
        <div class="mdl-layout__header-row">
          <span class="mdl-layout-title">Home</span>
          <div class="mdl-layout-spacer"></div>
          <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
            <label class="mdl-button mdl-js-button mdl-button--icon" for="search">
              <i class="material-icons">search</i>
            </label>
            <div class="mdl-textfield__expandable-holder">
              <input class="mdl-textfield__input" type="text" id="search">
              <label class="mdl-textfield__label" for="search">Enter your query...</label>
            </div>
          </div>
          <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" id="hdrbtn">
            <i class="material-icons">more_vert</i>
          </button>
          <div class="mdl-menu__container">
            <div class="mdl-menu__outline mdl-menu--bottom-right"></div>
            <ul class="mdl-menu mdl-js-menu mdl-js-ripple-effect mdl-menu--bottom-right " for="hdrbtn">
              <li class="mdl-menu__item">About</li>
              <li class="mdl-menu__item">Contact</li>
              <li class="mdl-menu__item">Legal information</li>
            </ul>
          </div>
        </div>
      </header>
      <div class="tpl-drawer mdl-layout__drawer mdl-color--blue-grey-900 mdl-color-text--blue-grey-50">
        <header class="tpl-drawer-header">
          <div class="tpl-admin-info">
            <span>hello@email.com</span>
            <div class="mdl-layout-spacer"></div>
            <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
              <i class="material-icons">exit_to_app</i>
            </button>
          </div>
          <div class="tpl-menu-dropdown">
            <button id="menu-home" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
              <i class="material-icons">home</i>
            </button>
            <div class="mdl-tooltip" for="menu-home">
            Home
            </div>
            <button id="menu-addmodule" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
              <i class="material-icons">file_upload</i>
            </button>
            <div class="mdl-tooltip" for="menu-addmodule">
            Add module
            </div>
          </div>
        </header>
        <nav class="tpl-navigation mdl-navigation mdl-color--blue-grey-800">
{foreach from=$data.package key=package_name item=package}
  {if isset($package.active)}
          <a class="mdl-navigation__link is-active" href="{$uri.site}/admin/{$package_name}">{$package.title}</a>
  {else}
          <a class="mdl-navigation__link" href="{$uri.site}/admin/{$package_name}">{$package.title}</a>
  {/if}
{/foreach}
        </nav>
      </div>
      <main class="mdl-layout__content mdl-color--grey-100">
        <div class="mdl-grid">
          {block name=content}{/block}
        </div>
      </main>
    </div>
  </div>

  <script src="js/material.min.js"></script>
</body>

</html>