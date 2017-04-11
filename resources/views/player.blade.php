@extends('layout.main')
@section('notapp')
<script>
  // Global vars
  var draggables = {}
  var elements = document.getElementsByClassName('draggable')
  var dragbound = document.getElementById('drag-bound');
</script>
@endsection
@section('content')
  <form method="POST" action="{{ route('save') }}" v-on:submit.prevent="onSubmit">
    {{ csrf_field() }}
    <!-- X Axis positions -->
    <input type="hidden"  value="{{$id}}"                  name="id"                        hidden required>
    <input type="hidden" :value="positions.head.x"           name="positions[head][0]"           hidden required>
    <input type="hidden" :value="positions.neck.x"           name="positions[neck][0]"           hidden required>
    <input type="hidden" :value="positions.shoulder_left.x"  name="positions[shoulder_left][0]"  hidden required>
    <input type="hidden" :value="positions.shoulder_right.x" name="positions[shoulder_right][0]" hidden required>
    <input type="hidden" :value="positions.elbow_left.x"     name="positions[elbow_left][0]"     hidden required>
    <input type="hidden" :value="positions.elbow_right.x"    name="positions[elbow_right][0]"    hidden required>
    <input type="hidden" :value="positions.hand_left.x"      name="positions[hand_left][0]"      hidden required>
    <input type="hidden" :value="positions.hand_right.x"     name="positions[hand_right][0]"     hidden required>
    <input type="hidden" :value="positions.torso.x"          name="positions[torso][0]"          hidden required>
    <input type="hidden" :value="positions.hip_left.x"       name="positions[hip_left][0]"       hidden required>
    <input type="hidden" :value="positions.hip_right.x"      name="positions[hip_right][0]"      hidden required>
    <input type="hidden" :value="positions.knee_left.x"      name="positions[knee_left][0]"      hidden required>
    <input type="hidden" :value="positions.knee_right.x"     name="positions[knee_right][0]"     hidden required>
    <input type="hidden" :value="positions.foot_left.x"      name="positions[foot_left][0]"      hidden required>
    <input type="hidden" :value="positions.foot_right.x"     name="positions[foot_right][0]"     hidden required>
    <!-- Y Axis Positions -->
    <input type="hidden"  value="{{$id}}"                  name="id"                        hidden required>
    <input type="hidden" :value="positions.head.y"           name="positions[head][1]"           hidden required>
    <input type="hidden" :value="positions.neck.y"           name="positions[neck][1]"           hidden required>
    <input type="hidden" :value="positions.shoulder_left.y"  name="positions[shoulder_left][1]"  hidden required>
    <input type="hidden" :value="positions.shoulder_right.y" name="positions[shoulder_right][1]" hidden required>
    <input type="hidden" :value="positions.elbow_left.y"     name="positions[elbow_left][1]"     hidden required>
    <input type="hidden" :value="positions.elbow_right.y"    name="positions[elbow_right][1]"    hidden required>
    <input type="hidden" :value="positions.hand_left.y"      name="positions[hand_left][1]"      hidden required>
    <input type="hidden" :value="positions.hand_right.y"     name="positions[hand_right][1]"     hidden required>
    <input type="hidden" :value="positions.torso.y"          name="positions[torso][1]"          hidden required>
    <input type="hidden" :value="positions.hip_left.y"       name="positions[hip_left][1]"       hidden required>
    <input type="hidden" :value="positions.hip_right.y"      name="positions[hip_right][1]"      hidden required>
    <input type="hidden" :value="positions.knee_left.y"      name="positions[knee_left][1]"      hidden required>
    <input type="hidden" :value="positions.knee_right.y"     name="positions[knee_right][1]"     hidden required>
    <input type="hidden" :value="positions.foot_left.y"      name="positions[foot_left][1]"      hidden required>
    <input type="hidden" :value="positions.foot_right.y"     name="positions[foot_right][1]"     hidden required>

    <input type="hidden" :value="action"     name="action"     hidden required>
    <div class="text-center">
      @if($hideButton != 'previous')
        <button class="siimple-btn siimple-btn--teal go-button" @click="setAction('previous')" type="submit">Anterior!</button>    
      @endif      
      @if($hideButton != 'next')
        <button class="siimple-btn siimple-btn--teal go-button" @click="setAction('next')" type="submit">Próximo!</button>
      @else
        <button class="siimple-btn siimple-btn--teal go-button" @click="setAction('finish')" type="submit">Terminar!</button>
      @endif
    </div>
  </form>

  <section class="container">
    <section class="image-container">
      <img src="{{ asset($image) }}" id="drag-bound" ref="dragbound" width="800" height="600">
      <div id="head" class="draggable"><span class="description">Cabeça</span></div>
      <div id="neck" class="draggable"><span class="description">Pescoço</span></div>
      <div id="shoulder_left" class="draggable"><span class="description">Ombro Esquerdo</span></div>
      <div id="shoulder_right" class="draggable"><span class="description">Ombro Direito</span></div>
      <div id="elbow_left" class="draggable"><span class="description">Cotovelo Esquerdo</span></div>
      <div id="elbow_right" class="draggable"><span class="description">Cotovelo Direito</span></div>
      <div id="hand_left" class="draggable"><span class="description">Mão Esquerda</span></div>
      <div id="hand_right" class="draggable"><span class="description">Mão Direita</span></div>
      <div id="torso" class="draggable"><span class="description">Tronco</span></div>
      <div id="hip_left" class="draggable"><span class="description">Quadril Esquerdo</span></div>
      <div id="hip_right" class="draggable"><span class="description">Quadril Direito</span></div>
      <div id="knee_left" class="draggable"><span class="description">Joelho Esquerdo</span></div>
      <div id="knee_right" class="draggable"><span class="description">Joelho Direito</span></div>
      <div id="foot_left" class="draggable"><span class="description">Pé Esquerdo</span></div>
      <div id="foot_right" class="draggable"><span class="description">Pé Direito</span></div>
    </section>
  </section>

  <footer class="siimple-h6 siimple-pre" style="width: 800px; margin: 10px auto; padding: 2px">
    Tente posicionar o ponto o mais próximo do centro da parte do corpo selecionada.
  </footer>
@endsection

@section('js')
@php $p = @$positions @endphp
  <script>
  // Setting to Vue
    let v = app.__vue__._data.positions
    v.head           = { x: {{ $p->head[0] or 800 }},           y: {{ $p->head[1]           or 0 }} }
    v.neck           = { x: {{ $p->neck[0] or 800 }},           y: {{ $p->neck[1]           or 40 }} }
    v.shoulder_left  = { x: {{ $p->shoulder_left[0] or 800 }},  y: {{ $p->shoulder_left[1]  or 80 }} }
    v.shoulder_right = { x: {{ $p->shoulder_right[0] or 800 }}, y: {{ $p->shoulder_right[1] or 120 }} }
    v.elbow_left     = { x: {{ $p->elbow_left[0] or 800 }},     y: {{ $p->elbow_left[1]     or 160 }} }
    v.elbow_right    = { x: {{ $p->elbow_right[0] or 800 }},    y: {{ $p->elbow_right[1]    or 200 }} }
    v.hand_left      = { x: {{ $p->hand_left[0] or 800 }},      y: {{ $p->hand_left[1]      or 240 }} }
    v.hand_right     = { x: {{ $p->hand_right[0] or 800 }},     y: {{ $p->hand_right[1]     or 280 }} }
    v.torso          = { x: {{ $p->torso[0] or 800 }},          y: {{ $p->torso[1]          or 320 }} }
    v.hip_left       = { x: {{ $p->hip_left[0] or 800 }},       y: {{ $p->hip_left[1]       or 360 }} }
    v.hip_right      = { x: {{ $p->hip_right[0] or 800 }},      y: {{ $p->hip_right[1]      or 400 }} }
    v.knee_left      = { x: {{ $p->knee_left[0] or 800 }},      y: {{ $p->knee_left[1]      or 440 }} }
    v.knee_right     = { x: {{ $p->knee_right[0] or 800 }},     y: {{ $p->knee_right[1]     or 480 }} }
    v.foot_left      = { x: {{ $p->foot_left[0] or 800 }},      y: {{ $p->foot_left[1]      or 520 }} }
    v.foot_right     = { x: {{ $p->foot_right[0] or 800 }},     y: {{ $p->foot_right[1]     or 560 }} }

    // Setting to Draggable
    for(let i = 0; i < elements.length; i++){
        let element = elements[i]
        let v = app.__vue__._data.positions
        console.info(v.head.x)
        //         Body-part              x                     y
        draggables['head']           .set(v.head.x,            v.head.y)
        draggables['neck']           .set(v.neck.x,            v.neck.y)
        draggables['shoulder_left']  .set(v.shoulder_left.x,   v.shoulder_left.y)
        draggables['shoulder_right'] .set(v.shoulder_right.x,  v.shoulder_right.y)
        draggables['elbow_left']     .set(v.elbow_left.x,      v.elbow_left.y)
        draggables['elbow_right']    .set(v.elbow_right.x,     v.elbow_right.y)
        draggables['hand_left']      .set(v.hand_left.x,       v.hand_left.y)
        draggables['hand_right']     .set(v.hand_right.x,      v.hand_right.y)
        draggables['torso']          .set(v.torso.x,           v.torso.y)
        draggables['hip_left']       .set(v.hip_left.x,        v.hip_left.y)
        draggables['hip_right']      .set(v.hip_right.x,       v.hip_right.y)
        draggables['knee_left']      .set(v.knee_left.x,       v.knee_left.y)
        draggables['knee_right']     .set(v.knee_right.x,      v.knee_right.y)
        draggables['foot_left']      .set(v.foot_left.x,       v.foot_left.y)
        draggables['foot_right']     .set(v.foot_right.x,      v.foot_right.y)
    }
  </script>
@endsection