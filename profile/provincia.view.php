<form action="" method="POST" novalidate>
    <div class="form-group">
        <div class="form-group">
            <label for="provincia">Provincia</label>
            <select class="form-control <?=($errores["provincia"])?"is-invalid":"";?>" id="provincia" name="provincia" aria-describedby="provinciaHelp">
                <option value="">- selecciona -</option>
                <option value="15">A coruña</option>
                <option value="1">Álava</option>
                <option value="2">Albacete</option>
                <option value="3">Alicante</option>
                <option value="4">Almería</option>
                <option value="33">Asturias</option>
                <option value="5">Ávila</option>
                <option value="6">Badajoz</option>
                <option value="7">Baleares</option>
                <option value="8">Barcelona</option>
                <option value="9">Burgos</option>
                <option value="10">Cáceres</option>
                <option value="11">Cádiz</option>
                <option value="39">Cantabria</option>
                <option value="12">Castellón</option>
                <option value="51">Ceuta</option>
                <option value="13">Ciudad Real</option>
                <option value="14">Córdoba</option>
                <option value="16">Cuenca</option>
                <option value="99">Extranjero</option>
                <option value="17">Girona</option>
                <option value="18">Granada</option>
                <option value="19">Guadalajara</option>
                <option value="20">Guipúzcoa</option>
                <option value="21">Huelva</option>
                <option value="22">Huesca</option>
                <option value="23">Jaén</option>
                <option value="26">La rioja</option>
                <option value="35">Las palmas</option>
                <option value="24">León</option>
                <option value="25">Lleida</option>
                <option value="27">Lugo</option>
                <option value="28">Madrid</option>
                <option value="29">Málaga</option>
                <option value="52">Melilla</option>
                <option value="30">Murcia</option>
                <option value="31">Navarra</option>
                <option value="32">Ourense</option>
                <option value="34">Palencia</option>
                <option value="36">Pontevedra</option>
                <option value="37">Salamanca</option>
                <option value="38">Santa cruz de tenerife</option>
                <option value="40">Segovia</option>
                <option value="41">Sevilla</option>
                <option value="42">Soria</option>
                <option value="43">Tarragona</option>
                <option value="44">Teruel</option>
                <option value="45">Toledo</option>
                <option value="46">Valencia</option>
                <option value="47">Valladolid</option>
                <option value="48">Vizcaya</option>
                <option value="49">Zamora</option>
                <option value="50">Zaragoza</option>
            </select>
            <?=validationDiv('provincia','invalid-feedback')?>
        </div>
    </div>
    <button type="submit" name="update_Provincia" class="btn btn-primary">Actualizar Provincia</button>