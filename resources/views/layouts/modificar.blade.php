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



@if(isset($noticia))

<form action="{{route('noticias.update', $noticia->id)}}" method="POST" class="form-horizontal" enctype="multipart/form-data">

<input type="hidden" name="_method" value="PUT">
<input class="hide" type="text" name="img" value="{{$noticia->imgurl}}">


<!--Creando Tokens por seguridad-->
    {{ csrf_field() }}
    <div class="form-group">
        <label for="titulo" class="col-sm-2 control-label">Título</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="titulo" value="{{$noticia->titulo}}">
            <!--Reenderizando-->
            @if($errors->has('titulo'))
                <span>{{$errors->first('titulo')}}</span>
            @endif
        </div>
    </div>

    <div class="form-group">
        <label for="descripcion" class="col-sm-2 control-label">Descripción</label>
        <div class="col-sm-10">
            <Textarea type="text" class="form-control" name="descripcion"  >{{$noticia->descripcion}}</Textarea>
            @if($errors->has('descripcion'))
                <span>{{$errors->first('descripcion')}}</span>
            @endif
        </div>
    </div>

    <div class="form-group">
        <label for="urlimg" class="col-sm-2 control-label">Imágen</label>
        <div class="col-sm-5">
            <!--<img src="/image/{{$noticia->urlimg}}" class="img-thumbnail" alt="Cinque Terre" width="100px" heigth="100px" >-->
        </div>
        <div class="col-sm-5">
            <input type="file" class="form-control" name="urlimg">
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-success">Modificar</button>
        </div>
    </div>
    

</form>

@endif