@extends('layouts.app')
@section('title', 'Main page')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Usuários</h2>
        
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="container-fluid">
				
                <h4 class='c-grey-900 mT-10 mB-30'></h4>
                
                <div class="bgc-white bd bdrs-3 p-20 mB-20">

                <form action="{{route('users.index')}}" method='GET' role="search">
                    <div class="form-group row">
                        
                        <div class="col-md-2 col-sm-12">
                        <div class="form-group">
                            <label for="" class="control-label">Termo a pesquisar</label>
                            <input type="text" placeholder="" 
                            @if(array_key_exists('name_query', $requested_items))
                                    value="{{$requested_items['name_query']}}"
                            @endif                            
                            class="form-control" name="name_query" id="top-search" />
                        </div>
                        </div>
                       

                        
                        <div class="col-md-2 col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Tipo</label>
                                    <select name="StatusType" id="" class="form-control">
                                        <option value=""
                                        @if(!array_key_exists('StatusType', $requested_items))
                                        selected
                                        @endif
                                        >Todos</option>

                                        
                                        <option 
                                        @if(array_key_exists('StatusType', $requested_items) && $requested_items['StatusType'] == 1)
                                        selected
                                        @endif
                                        value="1">Simples</option>
                                        <option
                                        @if(array_key_exists('StatusType', $requested_items) && $requested_items['StatusType'] == 2)
                                        selected
                                        @endif
                                         value="2">Administrador</option>
                                    </select>
                                </div>
                        </div>

                        <div class="col-md-2 col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Data inicial</label>
                                    <input type="date" 
                                    @if(array_key_exists('StartDate', $requested_items))
                                            value="{{$requested_items['StartDate']}}"
                                    @endif
                                    class="form-control" name="StartDate" />
                                </div>
                            </div>

                            <div class="col-md-2 col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Data final</label>
                                    <input 
                                        type="date"
                                        @if(array_key_exists('EndDate', $requested_items))
                                            value="{{$requested_items['EndDate']}}"
                                        @endif
                                        class="form-control" name="EndDate" />
                                </div>
                            </div>

                            <div class="col-md-2 col-sm-12">
                            </div>

                            <div class="col-md-2 col-sm-12">
                                <input type='submit' value='Filtrar' href="#" id='search_btn' class="btn btn-block  btn-success" />
                                <a href="{{route('users.index')}}" id='search_btn' class="btn btn-block btn-light">
                                    Limpar pesquisa </a>
                            </div>
                    </div>
                </form>

                    <table class="table table-striped table-bordered">
                        <tr>
                         <th>#</th>
                         <th>Nome</th>
                         <th>Email</th>
                         <th>Perfil</th>
                         <td></td>
                        </tr>

                  @foreach($items as $item)
                        <tr>
                        <td>
                            {{$item->id}}
                        </td>
                        <td>
                            {{$item->name}}
                        </td>
                        <td>
                            {{$item->email}}
                        </td>
                        <td>
                            {{$item->role_name}}
                        </td>
                        <td>
                            <a href="{{route('users.edit', ['id' => $item->id])}}" class = "btn cur-p btn-light"> Editar <a/>
                            <a data-itemid={{$item->id}} data-toggle="modal" data-target="#delete" class = "btn cur-p btn-light"> Deletar </a>
                        </td>
                        </tr>
                    @endforeach
                    </table>
                    {{$items}}
                </div>
            </div>
        </div>
    </div>
 </div>
</body>

<!-- Modal -->
<div class="modal modal-danger fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center" id="myModalLabel">Antes de remover...</h4>
            </div>
            <form action="{{route('users.destroy', 'test')}}" method="POST">
                {{method_field('delete')}}
                {{csrf_field()}}
                <div class="modal-body">
                    <p class="text-center">
                        Você tem certeza que deseja remover o registro?
                    </p>
                    <input type="hidden" name="id" id="itemid" value="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn " data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Sim, remover</button>
                </div>
            </form>
        </div>
    </div>
</div>


</html>
@endsection

@section('scripts')
<script>

</script>
@endsection