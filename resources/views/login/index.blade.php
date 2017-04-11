@extends('layout.main')
@section('content')
  <form method="POST" action="{{ route('login') }}" class="siimple-h6" style="text-align: center">
    {{ csrf_field() }}
    Olá, eu me chamo <input type="text" class="siimple-input" placeholder="Fulano da Silva" name="volunteer" autofocus required>!
    <br>
    Informe o número fornecido: 
    <input type="number" class="siimple-input" name="folder" required>
    <br>
    <div style="text-align: center">
      <button class="siimple-btn siimple-btn--green go-button" id="done" type="submit">Começar!</button>
    </div>
  </form>
@endsection