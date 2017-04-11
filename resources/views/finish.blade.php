@extends('layout.main')
@section('content')
<div class="medium-screen"> 
    <h1 class="siimple-h1 text-center">Finalizado! <br> Muito obrigado {{Session::get('volunteer')}}!</h1>
    <div class="siimple-pre" style="width: 800px; margin: auto">
        Obrigado por sua participação, esses dados serão de grande importância para o projeto <b>JointLIBRAS!</b>
        (componente do projeto <b><a class="siimple-link" href="http://deeplibras.github.io/">Deeplibras</a></b>)
        <br><br>
        ___ <br>
        Vitor Silvério de Souza
    </div>
</div>
@endsection