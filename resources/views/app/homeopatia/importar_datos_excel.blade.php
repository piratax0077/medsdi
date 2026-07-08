<h1>hola</h1>
<form action="{{ route('homeopatia.importar_presentaciones_excel') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file" required>
    <button type="submit">Importar Diagnósticos</button>
</form>

