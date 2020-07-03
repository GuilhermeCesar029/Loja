@extends('layout.app')

@section('titulo', 'Seus pedidos')

@section('conteudo')
<div class="site-wrap">
    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0">
            <a href=" {{route('home')}} ">Home</a> <span class="mx-2 mb-0">/</span> 
            <strong class="text-black">Pedidos</strong>
          </div>
        </div>
      </div>
    </div>
    @if(Session::has('mensagem-sucesso'))
      <div>
        <strong> {{Session::get('mensagem-sucesso')}} </strong>
      </div>
    @endif
    @if(Session::has('mensagem-falha'))
      <div>
        <strong> {{Session::get('mensagem-falha')}} </strong>
      </div>
    @endif
    <h4 class="text-center">Compras concluidas</h4>
    @forelse ( $compras as $pedido )                      
        <div class="site-section">
          <div class="container">
            <div class="row mb-8">
               <div class="table">
                <div class="form-row">
                    <h5 class="col-md-6 mb-2"> Pedido: {{$pedido->id}} </h5>
                    <h5 class="col-md-6 mb-2">Criando em: {{$pedido->created_at->format('d/m/Y H:i')}} </h5> 
                </div>                               
                 <table class="table ">
                   <thead>
                     <tr>
                       <th class=""></th>
                       <th class="">Produto</th>
                       <th class="">Valor</th>
                       <th class="">Desconto(s)</th>
                       <th class="">Total</th>
                     </tr>
                   </thead>
                   <tbody>                       
                       @php
                        $total_pedido = 0;   
                       @endphp
                       @foreach ($pedido->pedido_produtos_item as $pedido_produto)
                           @php
                               $total_produto = $pedido_produto->valor - $pedido_produto->desconto;
                               $total_pedido += $total_produto;
                           @endphp
                           <tr>
                               <td>
                                <img width="100" height="100" src=" {{$pedido_produto->produto->imagem}} ">                             
                               </td>
                               <td> {{$pedido_produto->produto->titulo}} </td>
                               <td>R$ {{number_format($pedido_produto->valor, 2, ',', '.')}} </td>
                               <td>R$ {{number_format($pedido_produto->desconto, 2, ',', '.')}} </td>
                               <td>R$ {{number_format($total_produto, 2, ',', '.')}} </td>
                           </tr>
                       @endforeach
                   </tbody>
                   <tfoot>
                       <tr>
                           <td colspan="3"></td>
                           <td><strong>Total do pedido</strong></td>
                           <td>R$ {{number_format($total_pedido, 2, ',', '.')}} </td>
                       </tr>
                   </tfoot>
                 </table>
               </div>
            </div>   
    @empty
        <h5 class="text-center">
            @if ($cancelados->count() > 0 )
                Neste Momento não há nenhuma compra valida.
            @else
                Voçê ainda nao fez nunhuma compra.    
            @endif
        </h5>
    @endforelse 
@endsection