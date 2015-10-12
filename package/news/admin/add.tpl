{extends file="file:[admin]template.tpl"}
{block name=content append}
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
{/block}