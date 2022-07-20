<?php include("includes/header.php"); ?>
<?php include("includes/title.php"); ?>
<?php include("includes/login_valid_session.php"); ?>


<div class="row">
  <aside class="col-sm-1"></aside>

  <aside class="col-sm-10">

    <CENTER>
    <TABLE>
      <TR>
        <TD align="center"><font size="+2">MODOS DE CONSULTA - Visitas Tecnicas</font></TD>
      </TR>

      <TR>
        <TD align="center">
          <CENTER>
            <form name="form1" method="post" onSubmit="return revisar(form1);" action="visitas_buscar1.php">
              <HR>
              <p><B><span class="Titulo">Consultar por N° de Cedula</span></B><BR>
                <input class="form-control" type="text" name="filtro_cedula0" id="filtro_cedula0" onkeypress="return acceptNum(event)" /><BR>
                <input type="submit" class="btn btn-success btn-block" value="Buscar" />
              </p>
            </form>
          </CENTER>
        </TD>
      </TR>

      <TR>
        <TD align="center">
          <CENTER>
            <form name="form1" method="post" onSubmit="return revisar(form1);" action="visitas_buscar1.php">
              <HR>
              <p><B><span class="Titulo">Consultar por Puntuacion General</span></B><BR>
                <select class="form-control" name="filtro_general" id="filtro_general">
                  <option value="&gt;=" selected="selected">MAYOR QUE</option>
                  <option value="&lt;=">MENOR QUE</option>
                  <option value="=">IGUAL A</option>
                </select>
                <input class="form-control" type="text" name="valor_general" id="valor_general" onkeypress="return acceptNum(event)" /><BR>
                <input type="submit" class="btn btn-success btn-block" value="Buscar" />
              </p>
            </form>
          </CENTER>
        </TD>
      </TR>

      <TR>
        <TD align="center">
          <CENTER>
            <form name="form1" method="post" onSubmit="return revisar(form1);" action="visitas_buscar1.php">
              <HR>
              <p><B class="Titulo">Consultar por Combinacion de filtros</B></p>
                <span>Puntaje Cocina</span><BR>
                <select class="form-control" name="filtro_cocina" id="filtro_cocina">
                  <option value="&gt;=" selected="selected">MAYOR QUE</option>
                  <option value="&lt;=">MENOR QUE</option>
                  <option value="=">IGUAL A</option>
                </select>
                <input class="form-control" name="valor_cocina" type="text" id="valor_cocina" onkeypress="return acceptNum(event)" value="0" /><BR>

                <span> Puntaje Baños y Lavadero</span><BR>
                <select class="form-control" name="filtro_lavadero" id="filtro_lavadero">
                  <option value="&gt;=" selected="selected">MAYOR QUE</option>
                  <option value="&lt;=">MENOR QUE</option>
                  <option value="=">IGUAL A</option>
                </select>
                <input class="form-control" name="valor_lavadero" type="text" id="valor_lavadero" onkeypress="return acceptNum(event)" value="0" /><BR>
                
                <span>Puntaje Pisos</span><BR>
                <select class="form-control" name="filtro_pisos" id="filtro_pisos">
                  <option value="&gt;=" selected="selected">MAYOR QUE</option>
                  <option value="&lt;=">MENOR QUE</option>
                  <option value="=">IGUAL A</option>
                </select>
                <input class="form-control" name="valor_pisos" type="text" id="valor_pisos" onkeypress="return acceptNum(event)" value="0" /><BR>

                <span>Puntaje Cubierta</span><BR>
                <select class="form-control" name="filtro_cubierta" id="filtro_cubierta">
                  <option value="&gt;=" selected="selected">MAYOR QUE</option>
                  <option value="&lt;=">MENOR QUE</option>
                  <option value="=">IGUAL A</option>
                </select>
                <input class="form-control" name="valor_cubierta" type="text" id="valor_cubierta" onkeypress="return acceptNum(event)" value="0" /><BR>

                <span>Puntaje Estructura y muros</span><BR>
                <select class="form-control" name="filtro_muros" id="filtro_muros">
                  <option value="&gt;=" selected="selected">MAYOR QUE</option>
                  <option value="&lt;=">MENOR QUE</option>
                  <option value="=">IGUAL A</option>
                </select>
                <input class="form-control" name="valor_muros" type="text" id="valor_muros" onkeypress="return acceptNum(event)" value="0" /><BR>


                <input type="submit" class="btn btn-success btn-block" value="Buscar" />
              </p>
              <p><BR>
              </p>
            </form>
          </CENTER>
        </TD>
      </TR>
    </TABLE>
    </CENTER>

  </aside>

  <aside class="col-sm-1"></aside>
</div>

<?php include("includes/footer.php"); ?>