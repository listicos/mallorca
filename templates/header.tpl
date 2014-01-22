<div class="header_container">
    <div class="navbar navbar-inverse">
      <div class="navbar-wrapper">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand logo-title" href="{$base_url}">
            <img src="{$template_url_s}/img/logo.png">
          </a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav pull-right">
            <li {if !$page}class="active"{/if}><a class="to_scroll" href="{$base_url}">{#inicio#}</a></li>
            <!--<li {if $page == 'agroturismo'}class="active"{/if}><a href="{$base_url}/agroturismo">{#agroturismo#}</a></li>-->
            <li {if $page == 'contacto'}class="active"{/if}><a href="{$base_url}/contacto">{#contacto#} & {#mapa#}</a></li>
            <li class="dropdown">
                <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">{$lang|upper}<b class="caret"></b></a>
              <ul class="dropdown-menu">
                {foreach from=$languages item=language}
                {if $lang ne $language->codigo}
                    <li><a href="{$actual_url}/lang:{$language->codigo}">{$language->codigo|upper}</a></li>
                {/if}
              {/foreach}
              </ul>
            </li>
          </ul>
        </div>
        </div>
    </div>
</div>