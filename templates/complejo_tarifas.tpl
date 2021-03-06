<div class="row">
    <div class="row-fluid">
        <div class="col-md-offset-3 col-md-3">
            <div class="form-group">
                <label>{#mes#}</label>
                <select id="tarifaMes" class="form-control">
                    {for $i=0 to 11}
                        {assign var=mesI value=$meses.$i}
                        <option value="{$i + 1}" {if $mesI eq $mes}selected{/if}>{$smarty.config.$mesI}</option>
                    {/for}
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>{#anio#}</label>
                <select id="tarifaAnio" class="form-control">
                    {for $i=0 to 10}
                        <option value="{$i + date('Y')}" {if $anio eq $i + date('Y')}selected{/if}>{$i + date('Y')}</option>
                    {/for}
                </select>
            </div>
        </div>
                    <input id="tarifaComplejoId" value="{$idComplejo}" type="hidden">
                <div class="clearfix"></div>
    </div>
    <div class="row-fluid">
        <table class="tarifas-calendar">
            <thead>
                <tr>
                    <th class="first">
                    </th>
                    {for $d=1 to $lastDay}
                        <th>{$d|string_format:"%02s"}</th>
                    {/for}
                </tr>
                <!--<tr>
                    <th class="first">
                    </th>
                    {assign var=di value=0}
                    {for $d=1 to $lastDay}
                        {assign var=diaSemana value=$diasSemana[$di]}
                        <th>{$smarty.config.$diaSemana|truncate:2:''}</th>
                        {assign var=di value={$di + 1}}
                        {if $di > 6}{assign var=di value=0}{/if}
                    {/for}
                </tr>-->
            </thead>
            <tbody>
                {foreach from=$apartamentos item=apartamento}
                    <tr>
                        <td class="first">
                            {$apartamento->nombre}
                        </td>
                        {for $d=1 to $lastDay}
                            <td class="{if $apartamento->disponibilidades[$d]->estatus eq 'no disponible'}red{else}green{/if}"></td>
                        {/for}
                    </tr>
                {/foreach}
            </tbody>
        </table>
    </div>
</div>