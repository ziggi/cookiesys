{extends file="template.tpl"}
{block name=content}
  {foreach from=$data item=news}
    <div class="container">
      <h4><a href="{$uri.site}/news/{$news.name}">{$news.title}</a></h4>
      <p>{$news.text}</p>
    </div>
  {/foreach}
{/block}
