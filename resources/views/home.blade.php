@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Noticias</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                    
                    @if(isset($edit))
                        @include('layouts.modificar');
                    @else
                        @include('layouts.form');
                        @include('layouts.listNoticias');
                    @endif
                    
                    <!--You are logged in!-->
                    
                    
                   
                    
                </div>
            </div>
            <!--<div class="panel panel-primary ">
                <div class="panel-heading">Noticias Registradas</div>
                <div class="panel-body">


                    

                </div>
                <div class="panel-footer">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-end">
                            <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1">Previous</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>-->


        </div>
    </div>
</div>
@endsection

<!--@section('menu')
    @parent //me traes el contenido anterior
    <p>Contenido hija</p>
@endsection-->
