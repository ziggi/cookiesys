{extends file="file:[admin]template.tpl"}
{block name=content}
<div class="mdl-cell mdl-card mdl-shadow--2dp mdl-cell--8-col">
  <div class="mdl-card__title">
    <h2 class="mdl-card__title-text">Добавить новость</h2>
  </div>
  <div class="mdl-card__actions mdl-card--border">
    <form action="#">
      <div class="mdl-textfield mdl-js-textfield" style="width:100%">
        <textarea class="mdl-textfield__input" type="text" rows= "16" id="sample5"></textarea>
        <label class="mdl-textfield__label" for="sample5">Text lines...</label>
      </div>
      <button class="mdl-button mdl-js-button mdl-button--raised">
        Button
      </button>
    </form>
  </div>
</div>
<div class="mdl-cell mdl-card mdl-shadow--2dp mdl-cell--4-col">
  <div class="mdl-card__title">
    <h2 class="mdl-card__title-text">Настройка</h2>
  </div>
  <div class="mdl-card__actions mdl-card--border">
    <form action="#">
      <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="checkbox-2">
        <input type="checkbox" id="checkbox-2" class="mdl-checkbox__input" />
        <span class="mdl-checkbox__label">Checkbox</span>
      </label>
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <input class="mdl-textfield__input" type="text" id="sample3" />
        <label class="mdl-textfield__label" for="sample3">Text...</label>
      </div>
      <button class="mdl-button mdl-js-button mdl-button--raised">
        Button
      </button>
    </form>
  </div>
</div>
{/block}