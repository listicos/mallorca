<?php ?>
<div class="row-fluid correo_reservas_overlay">

    <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered table-striped bootstrap-datatable" id="reservas_detalles_table" >
        <thead><tr><th colspan="2">Notificacion al cliente</th></tr></thead>
        <tbody>
            <tr>
                <td style="width: 35%;">De:</td>
                <td>
                    listico__@hotmail.com
                    <input type="hidden" id="from" name="de"/>
                </td>
            </tr>
            <tr>
                <td style="width: 35%;">Para:</td>
                <td>
                    listico__@hotmail.com
                    <input type="hidden" id="to" name="para"/>
                </td>
            </tr>
            <tr>
                <td style="width: 35%;">Asunto:</td>
                <td><input type="text" id="subject" name="asunto"/></td>
            </tr>
            <tr>
                <td style="width: 35%;">Mensaje:</td>
                <td>
                    <textarea id="editor_correo" name="editor_correo" rows="10" style="width: calc(100% - 10px);"></textarea>
                    <script>
                        
                        var EMAIL_EDITOR;    
                        
                        EMAIL_EDITOR = CKEDITOR.replace('editor_correo', {
				uiColor: '#369bd7'
			});
                            
                    </script>
                </td>
            </tr>
        </tbody>
    </table>
</div>
