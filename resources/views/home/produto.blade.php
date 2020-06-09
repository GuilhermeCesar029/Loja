@extends('layout.app')

@section('titulo', 'Produto')

@section('conteudo')

<div class="site-wrap">

  <div class="site-section">
    <div class="container">
      <div class="row">
        <div class="col-md-5 mr-auto">
          <div class="border text-center">
            <img src="{{asset($produtos->imagem)}}" alt=" {{$produtos->titulo}} " class="img-fluid p-5">
          </div>
        </div>
        <div class="col-md-6">
          <h2 class="text-black">{{$produtos->titulo}}</h2>
          <p> {{$produtos->descricao}} </p>          

          <p><del>{{$produtos->valor}}</del>  <strong class="text-primary h4">{{$produtos->valor}}</strong></p>

          <div class="mb-5">
            <div class="input-group mb-3" style="max-width: 220px;">
              <div class="input-group-prepend">
                <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
              </div>
              <input type="text" class="form-control text-center" value="1" placeholder=""
                aria-label="Example text with button addon" aria-describedby="button-addon1">
              <div class="input-group-append">
                <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
              </div>
            </div>
  
          </div>
          <p><a href="cart.html" class="btn btn-sm btn-primary">Adicionar ao carrinho</a></p>        
          </div>  
        </div>
      </div>
    </div>
  </div>

@endsection