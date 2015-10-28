{extends file="file:[admin]template.tpl"}
{block name=content append}
<div class="mdl-cell mdl-card mdl-shadow--2dp mdl-cell--8-col">
  <div class="mdl-card__title">
    <h2 class="mdl-card__title-text">Добавить новость</h2>
  </div>
  <div class="mdl-card__actions mdl-card--border">
    <form action="{$data.submit.add}" method="POST">
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <input class="mdl-textfield__input" type="text" id="name" name="name" />
        <label class="mdl-textfield__label" for="name">Имя</label>
      </div>
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <input class="mdl-textfield__input" type="text" id="title" name="title" />
        <label class="mdl-textfield__label" for="title">Заголовок</label>
      </div>
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width:100%">
        <textarea class="mdl-textfield__input" type="text" rows= "16" id="text" name="text"></textarea>
        <label class="mdl-textfield__label" for="text">Текст</label>
      </div>
      <button class="mdl-button mdl-js-button mdl-button--raised">
        Добавить
      </button>
    </form>
  </div>
</div>
{/block}