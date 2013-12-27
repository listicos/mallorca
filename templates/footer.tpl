<div class="footer_container">
    <footer class="bs-footer">
        <div class="footer-top">
            <div class="row navbar-wrapper">
                <!-- <h3 class="text-center">Outlet Rooms S.L.</h3>
                <p class="text-center">Booking Now 902 000 999</p> -->
                <div class="col-md-4">
                    <h3>{#contactanos#}</h3>
                    <p class="phone_contact">{$config->telefonosContacto|replace:', ':'</p><p class="phone_contact">'}</p>
                    <ul class="contact">
                        <li class="address">{$config->nombreEmpresa}</li>
                        <li class="email"><a href="mailto:{$config->emailContacto}">{$config->emailContacto}</a></li>
                    </ul>
                    <div class="clearfix"></div>    
                </div>
                <div class="col-md-4">
                    <h3>{#siguenos#}</h3>
                    <div class="footer_social">
                        {if $config->facebook && strlen($config->facebook)}
                        <a href="{$config->facebook}" class="icon-facebook">Facebook</a> 
                        {/if}
                        {if $config->twitter && strlen($config->twitter)}
                        <a href="{$config->twitter}" class="icon-twitter">Twitter</a>
                        {/if}
                        {if $config->vimeo && strlen($config->vimeo)}
                        <a href="{$config->vimeo}" class="icon-vimeo">Vimeo</a>
                        {/if}
                        {if $config->rss && strlen($config->rss)}
                        <a href="{$config->rss}" class="icon-rss">RSS</a>
                        {/if}
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="col-md-4">
                    <form id="suscribirFrm">
                    <h3>{#suscribete#}</h3>
                    <div class="newsletter form-group">
                        <label>{#correo_electronico#}</label>
                        <input type="email" class="form-control validate[required, custom[email]]" name="email" />
                    </div>
                    <div class="text-right"><a id="suscribirBtn" href="#" class="btn btn-newsletter">{#suscribete#}</a></div>
                    </form>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="row navbar-wrapper">
                    <div class="col-md-6"><p>Mallorca Rent Haus</p></div>
                    <div class="col-md-6">
                        <ul class="nav navbar-nav">
                            <li><a class="to_scroll" href="{$base_url}">{#inicio#}</a></li>
                            <li><a href="{$base_url}/contacto">{#contacto#} & {#mapa#}</a></li>
                            <li><a href="#" class="to_scroll_top"><span class="caret caret-inverse"></span>{#top#}</a></li>
                        </ul>
                    </div>
            </div>
        </div>
    </footer>
</div>