<div class="row">
    <div class="row-fluid center">
        <h4 class="calendar-title">{$smarty.config.$mes}</h4>
    </div>
    <div class="row-fluid">
        <table class="tarifas-calendar">
            <thead>
                <tr>
                    <th class="first">
                    </th>
                    {for $d=1 to $lastDay}
                        <th>{$d}</th>
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
                            <td class="{if $apartamento->disponibilidades[$d]->estatus eq 'disponible'}green{else}red{/if}"></td>
                        {/for}
                    </tr>
                {/foreach}
            </tbody>
        </table>
    </div>
</div>