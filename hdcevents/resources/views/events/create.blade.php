@extends('layouts.main')

@section('title', 'Criar Evento')

@section('content')
<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Crie um evento</h1>
    <form action="/events" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="image">Imagem do Evento:</label>
            <input type="file" id="image" name="image" class="form-control-file">
        </div>    

        <div class="form-group">
            <label for="title">Título do Evento:</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Título do evento">
        </div>    

        <div class="form-group">
            <label for="date">Data do evento:</label>
            <input type="date" class="form-control" id="date" name="date"> 
        </div>

        <div class="form-group">
            <label for="city">Cidade:</label>
            <input type="text" class="form-control" id="city" name="city" placeholder="Cidade do evento">
        </div>

        <div class="form-group">
            <label for="private">O evento é privado:</label>
            <input type="checkbox" class="form-control" id="private" name="private" value="1">
        </div>

        <div class="form-group">
            <label for="items">Itens disponíveis:</label>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" name="items[]" value="Cadeiras" id="cadeiras">
                <label class="form-check-label" for="cadeiras">Cadeiras</label>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" name="items[]" value="Cerveja Gratis" id="cervejaGratis">
                <label class="form-check-label" for="cervejaGratis">Cerveja Grátis</label>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" name="items[]" value="Open Food" id="openFood">
                <label class="form-check-label" for="openFood">Open Food</label>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" name="items[]" value="Brindes" id="brindes">
                <label class="form-check-label" for="brindes">Brindes</label>
            </div>
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Criar Evento">
        </div>
    </form>
</div>
@endsection
