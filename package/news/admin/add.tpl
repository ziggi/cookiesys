{extends file="file:[admin]template.tpl"}
{block name=content append}
{$name={$data.redirect.news.validator.name.value|default:''}}
{$title={$data.redirect.news.validator.title.value|default:''}}
{$text={$data.redirect.news.validator.text.value|default:''}}
<div class="mdl-cell mdl-card mdl-shadow--2dp mdl-cell--8-col">
  <div class="mdl-card__title">
    <h2 class="mdl-card__title-text">Добавить новость</h2>
  </div>
{if isset($data.redirect.news.errorMsg)}
  <div class="mdl-card__supporting-text">
    Ошибка: {$data.redirect.news.errorMsg}
  </div>
{/if}
{if isset($data.redirect.news.successMsg)}
  <div class="mdl-card__supporting-text">
    {$data.redirect.news.successMsg}
  </div>
{/if}
{if isset($data.redirect.news.validator.name.errors)}
  <div class="mdl-card__supporting-text">
    Имя: 
    {foreach from=$data.redirect.news.validator.name.errors item=error}
      {$error}
    {/foreach}
  </div>
{/if}
{if isset($data.redirect.news.validator.title.errors)}
  <div class="mdl-card__supporting-text">
    Заголовок: 
    {foreach from=$data.redirect.news.validator.title.errors item=error}
      {$error}
    {/foreach}
  </div>
{/if}
{if isset($data.redirect.news.validator.text.errors)}
  <div class="mdl-card__supporting-text">
    Текст: 
    {foreach from=$data.redirect.news.validator.text.errors item=error}
      {$error}
    {/foreach}
  </div>
{/if}
  <div class="mdl-card__actions mdl-card--border">
    <form action="{$data.submit.add}" method="POST">
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <input class="mdl-textfield__input" type="text" id="name" name="name" value="{$name}" />
        <label class="mdl-textfield__label" for="name">Имя</label>
      </div>
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <input class="mdl-textfield__input" type="text" id="title" name="title" value="{$title}" />
        <label class="mdl-textfield__label" for="title">Заголовок</label>
      </div>
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width:100%">
        <textarea class="mdl-textfield__input" type="text" rows= "16" id="text" name="text">{$text}</textarea>
        <label class="mdl-textfield__label" for="text">Текст</label>
      </div>
      <button class="mdl-button mdl-js-button mdl-button--raised">
        Добавить
      </button>
    </form>
  </div>
</div>
{/block}
