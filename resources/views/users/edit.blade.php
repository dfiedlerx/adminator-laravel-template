@extends('layouts.app')
@section('title', 'Main page')
@section('content')

<section class="row content wrapper wrapper-content animated fadeInRight">
    <div class="masonry-item col-md-12">
        <div class="bgc-white p-20 bd">
        <h3 class="c-grey-900">Editar usuário</h3>
        @if ($errors->any())
                    <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div><br />
                    @endif
                    @if(session()->has('message.level'))
                    <div class="alert alert-{{ session('message.level') }}"> 
                    </div>
                    @endif

            <div class="mT-30">
            <form id="vue_app" class="form form-horizontal form-label-left" name="form" action="{{ route('users.update', [ 'id' => $item->id]) }}"
                method="POST" novalidate>
                <input name="_method" type="hidden" value="PUT">
                {!! csrf_field() !!}

                <div class="form-group ">
                    <label for="exampleInputEmail1">Nome completo</label>
                    <input type="email" class="form-control"
                        value="{{$item->name}}"
                     name="name" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="Ex: Fulano da Silva">
                </div>

                <div class="form-group ">
                    <label for="exampleInputEmail1">Endereço de E-mail</label>
                    <input type="email" class="form-control" name="email" 
                        value="{{ $item->email }}"
                        id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="Ex: test@test.com">
                    <small id="emailHelp" class="form-text text-muted">E-mail para que o usuário consiga acessar o
                        sistema.</small>
                </div>
                <div class="form-group ">
                    <label for="exampleInputEmail1">Senha</label>
                    <input type="password" class="form-control" name="password" 
                        id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="********">
                </div>
                <div class="form-group ">
                    <label for="exampleInputEmail1">Confirmação de senha</label>
                    <input type="password" class="form-control" name="password_confirmation" 
                        id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="********">
                </div>

                <div class="form-group "><label for="inputState">Perfil do usuário</label><select 
                    value="{{ $item->role_id }}"
                    id="inputState" name="role_id" class="form-control">
                        @if($item->role_id == 0)
                        <option value="0" selected="selected">Simples</option>
                        @else
                        <option value="0" >Simples</option>
                        @endif

                        @if($item->role_id == 1)
                        <option selected="selected" value="1">Administrador</option>
                        @else
                        <option value="1">Administrador</option>
                        @endif

                    </select></div>

                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
            </div>

        </div>
    </div>
</section>
<script>
    var app = new Vue({
        el: '#app',
        data: {
            selectedState: 0,
            isLoadingState: false,
            States: [],
            selectedCity: 0,
            isLoadingCity: false,
            Citys: [],
            selectedUserPic: 0,
            isLoadingUserPic: false,
            UserPics: [],
        },
        methods: {
            onChangeStateId: async () => {
                app.isLoadingState = true;
                fetch('/api/State/')
                    .then(raw => raw.json())
                    .then(response => {
                        console.log(response);
                        app.States = response;
                    })
                    .catch(err => console.err(err))
                    .finally(() => app.isLoadingState = false);
            },
            onChangeCidade: async () => {
                app.isLoadingCity = true;
                fetch('/api/City/')
                    .then(raw => raw.json())
                    .then(response => {
                        console.log(response);
                        app.Citys = response;
                    })
                    .catch(err => console.err(err))
                    .finally(() => app.isLoadingCity = false);
            },
            onChangeUserPicId: async () => {
                app.isLoadingUserPic = true;
                fetch('/api/UserPic/')
                    .then(raw => raw.json())
                    .then(response => {
                        console.log(response);
                        app.UserPics = response;
                    })
                    .catch(err => console.err(err))
                    .finally(() => app.isLoadingUserPic = false);
            },
        },
        beforeMount() {
            this.onChangeStateId(),
                this.onChangeCidade(),
                this.onChangeUserPicId(),
        },
    });

</script>
@endsection
