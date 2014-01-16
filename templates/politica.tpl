{extends file="index.tpl"}

{block name="style" append}
  <link rel="stylesheet" type="text/css" href="{$template_url_s}/css/confirmacion.css" />
  
{/block}

{block name="script" append}
<script src="{$template_url_s}/js/confirmacion.js"></script>
{/block}

{block name="content" append}
<div class="main_content content body-content">
    <div class="col-md-12">
        <div class="main_content book-confirmation">
            <div class="book-confirmation-inner">
                <div class="row">
                <div class="col-md-12">
                    <h2 class="text-primary">{$politica->nombres->es}</h2>
                    <p>
                        {$politica->descripciones->es}
                    </p>
                </div>
                </div>
                
                <div class="row hidden-print">
                    <div class="col-md-12">
                        <div class="form-actions centered">
                            <a class="btn btn-default finalizar" href="{$base_url}">Finalizar</a>
                            <a class="btn btn-success imprimir" onclick="window.print(); return false;">Imprimir</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{/block}