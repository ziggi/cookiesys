{extends file="file:[admin]template.tpl"}
{block name=content}
<h4 class="page-header">Настройки</h4>
<div class="row">
  <div class="col-md-6">
    <div class="packageAdd">
      <button class="btn btn-default" id="btnUpload">
        <span class="glyphicon glyphicon-open-file" aria-hidden="true"></span>
        Добавить пакет
      </button>
      <form id="inputForm" method="post" enctype="multipart/form-data" action="{$uri.site}/admin/package/add">
        <input type="file" name="inputFile" id="inputFile">
      </form>
    </div>
  </div>
  <div class="col-md-6">
  </div>
</div>
{/block}