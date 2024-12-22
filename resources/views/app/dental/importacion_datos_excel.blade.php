<h1>hola</h1>
<form action="{{ route('dental.importar_datos_excel') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="archivo">Archivo Excel</label>
        <input type="file" class="form-control-file" id="archivo" name="archivo">
    </div>
    <button type="submit" class="btn btn-primary" id="btn-importar">Importar</button>

</form>
