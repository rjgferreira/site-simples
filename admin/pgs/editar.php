<h2>Alterar p&aacute;gina <?=$_SESSION['pg']['pag_id']?><a href="/admin" class="btn btn-primary btn-sm pull-right" style="margin-right:18px;">VOLTAR</a></h2>
<table class="table">
    <tr><td>
        <form class="form-horizontal" action="fnc/alterar.php" method="post">
            <div class="form-group">
                <label for="botao" class="col-sm-2 control-label">Texto do bot&atilde;o:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="botao" value="<?=$_SESSION['pg']['pag_botao']?>">
                </div>
            </div>
            <div class="form-group">
                <label for="titulo" class="col-sm-2 control-label">T&iacute;tulo da p&aacute;gina:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="titulo" value="<?=$_SESSION['pg']['pag_titulo']?>">
                </div>
            </div>
            <div class="form-group">
                <label for="chamada" class="col-sm-2 control-label">Chamada:</label>
                <div class="col-sm-10">
                    <textarea class="form-control" rows="5" name="chamada"><?=$_SESSION['pg']['pag_chamada']?></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="conteudo" class="col-sm-2 control-label">Chamada:</label>
                <div class="col-sm-10">
                    <textarea class="form-control" rows="20" id="conteudo" name="conteudo"><?=str_replace('</textarea>', htmlentities('</textarea>'), $_SESSION['pg']['pag_conteudo_html']);?></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="hidden" name="id" value="<?=$_SESSION['pg']['pag_id']?>">
                    <button type="submit" class="btn btn-default">Salvar</button>
                </div>
            </div>
        </form>
    </td></tr>
</table>