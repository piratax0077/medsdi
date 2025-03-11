
<style>
.odontograma {
    display: flex;
    flex-direction: column;
    gap: 15px;
    padding: 20px;
}

.fila {
    display: grid;
    grid-template-columns: repeat(8, 1fr);
    gap: 5px;
}

.pieza {
    border: 2px solid #007bff;
    background-color: #e3f2fd;
    text-align: center;
    padding: 10px;
    cursor: pointer;
    border-radius: 4px;
    transition: background 0.3s ease;
}

.pieza.seleccionada {
    background-color: #28a745;
    color: #fff;
    border-color: #218838;
}


</style>
<div class="odontograma">
    <!-- Fila superior (1.8 al 1.1 y 2.1 al 2.8) -->
    <div class="fila">
        @for($i = 18; $i >= 11; $i--)
            <div class="pieza" data-pieza="1.{{ $i % 10 }}">1.{{ $i % 10 }}</div>
        @endfor

        @for($i = 21; $i <= 28; $i++)
            <div class="pieza" data-pieza="2.{{ $i % 10 }}">2.{{ $i % 10 }}</div>
        @endfor
    </div>

    <!-- Fila inferior (4.8 al 4.1 y 3.1 al 3.8) -->
    <div class="fila">
        @for($i = 48; $i >= 41; $i--)
            <div class="pieza" data-pieza="4.{{ $i % 10 }}">4.{{ $i % 10 }}</div>
        @endfor

        @for($i = 31; $i <= 38; $i++)
            <div class="pieza" data-pieza="3.{{ $i % 10 }}">3.{{ $i % 10 }}</div>
        @endfor
    </div>
</div>


