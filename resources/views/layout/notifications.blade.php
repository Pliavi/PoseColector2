@if(Session::has('success'))
<div class="siimple-alert siimple-alert--done center" style="width: 800px">
    <strong><span class="glyphicon glyphicon-ok-sign"></span></strong> {{Session::pull('success')}}
</div>
@endif

@if(Session::has('error'))
<div class="siimple-alert siimple-alert--error center" style="width: 800px">
    <strong><span class="glyphicon glyphicon-remove-sign"></span></strong> {{Session::pull('error')}}
</div>
@endif

@if(Session::has('info'))
<div class="siimple-alert siimple-alert--info center" style="width: 800px">
    <strong><span class="glyphicon glyphicon-info-sign"></span></strong> {{Session::pull('info')}}
</div>
@endif
