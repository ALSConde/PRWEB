@extends('layout.app')


@section('content')
<div class="container">
      <x-local-sistema 
         local="Lista de Usuário"
         url="/home"
         texto="Menu Principal"
      /> 
      <div class="tile"> 
         <div class="tile-body">
              <form class="form form-inline" 
                    action="{{ route('role.permissao.salvar') }}" 
                    method="POST" >
                  @csrf
                  <div class="col-sm-12">
                     <div class="form-group">
                         <label for="quantidade" 
                                class="control-label">Role:</label>       
                         <input type="text" class="form-control col-sm-9"
                                value="{{ $role->nome }}"/> 
                     </div>
                  </div>
                  <br/> 

                  <div class="container">
                     @include('layout.alert')
                  </div>
                  <br/>

                  <div class="container">
                     <div class="tile">
                     <div class="tile-body">  
                     <table class="table table-striped table-bordered table-hover">
                        <tr>
                           <th style="font-weight:bold; text-align: center; ">Recurso</th>
                           @foreach ($actions as $action) 
                              <th style="font-weight:bold; text-align: center; ">
                                 {{ $action->nome }}
                              </th>
                           @endforeach
                           <th style="font-weight:bold; text-align: center; ">Ações</th>
                        </tr> 
                        <tbody>
                           @foreach ( $registros as $registro)
                        
                           <tr>
                              <td style="text-align: center; ">{{ $registro->nome }}</td>
                              <td style="text-align: center; ">
                                 <input type='checkbox'
                                    id='permissao_{{ $registro->id }}'
                                    name='permissao[]'
                                    @if($registro->existePermissao($registro->id)) checked @endif
                                    value="{{ $registro->id }}"/> 
                              </td>
                              
                              @foreach ($actions as $action)
                                 <td style="text-align: center; ">
                                    <input type='checkbox'
                                       id='action_{{ $action->id }}'
                                       name='action[]'
                                       @if($action->existePermissaoAction($registro->id, $action->id)) checked @endif
                                       value="{{ $action->id }}"/> 
                                 </td>
                              @endforeach 
                              <td>
                                 <a class="btn btn-danger btn-sm"
                                    href="{{ route('role.permissao.excluir',[ $role->id, $registro->id, $action->id ]) }}"  >
                                    <i class="fa fa-trash"></i>
                                 </a>
                              </td>
                           </tr>  
                           @endforeach
                        </tbody>
                     </table> 
                     <input type="hidden"  id="role_id" name="role_id" value="{{ $role->id }}"/>
                     <button type="submit" class="btn btn-success btn-lg">
                        <i class="fa fa-plus-circle"></i> 
                        Incluir Permissões para Roles
                     </button>  
                  </div> 
            </form>    
      </div>         
   </div>  
</div>       
@endsection