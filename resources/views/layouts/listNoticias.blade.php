


        <table class="table">

            @if(isset($noticias))

                <thead>
                    <tr>
                    
                        <th scope="col">Título</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Imágen</th> 
                        <th scope="col"></th>


                    </tr>
                </thead>
                <tbody>

                    @foreach($noticias as $noticia)
                        <tr>
                            <td>{{ $noticia->titulo }}</td>
                            <td>{{ $noticia->descripcion }}</td>
                            <td>
                                <img src="image/{{$noticia->urlimg}}" class="img-thumbnail" alt="Cinque Terre" width="100px" heigth="100px" >
                            </td>
                            <td>
                               <div class="btn-group">
                                    <a href="noticias/{{$noticia->id}}/edit" class="btn btn-warning btn-sm"> Modificar</a>
                                   
                                   <form action="{{ route('noticias.destroy', $noticia->id )}}" method="POST">
                                        <input type="hidden" name="_method" value="DELETE">
                                        {{ csrf_field() }}
                                        <input type="submit" class="btn btn-danger btn-sm" value="Eliminar"></input>
                                   </form>
                                    

                               </div> 
                            </td>
                        </tr>
                    @endforeach
                    
                </tbody>



            @endif
        </table>

    