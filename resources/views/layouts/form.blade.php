@if(session()->has('msj'))
<div class="alert alert-success" role="alert">
  {{session('msj')}}
</div>
@endif
@if(session()->has('errormsj'))
<div class="alert alert-danger" role="alert">
  Error al almacenar datos
</div>
@endif





<form action="{{url('noticias')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">

<!--Creando Tokens por seguridad-->
    {{ csrf_field() }}
    <div class="form-group">
        <label for="titulo" class="col-sm-2 control-label">Título</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="titulo" placeholder="título">
            <!--Reenderizando-->
            @if($errors->has('titulo'))
                <span>{{$errors->first('titulo')}}</span>
            @endif
        </div>
    </div>

    <div class="form-group">
        <label for="descripcion" class="col-sm-2 control-label">Descripción</label>
        <div class="col-sm-10">
            <Textarea type="text" class="form-control" name="descripcion" placeholder="Descripción"></Textarea>
            @if($errors->has('descripcion'))
                <span>{{$errors->first('descripcion')}}</span>
            @endif
        </div>
    </div>

    <div class="form-group">
        <label for="urlimg" class="col-sm-2 control-label">Imágen</label>
        <div class="col-sm-10">
            <input type="file" class="form-control" name="urlimg">
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
    </div>
    

</form>