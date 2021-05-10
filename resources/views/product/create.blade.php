@extends('base')

@section('submenu')
    <div class="row align-items-center">
        <div class="col">
            <div class="page-pretitle">Dashboard > Produtos > Criar</div>
            <h2 class="page-title">Produtos</h2>
        </div>
        <div class="col-auto ms-auto d-print-none">
            <div class="btn-list">
                <div>
                    <a href="{{ route('produtos.index') }}" class="btn btn-light d-none d-sm-inline-block">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                             stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                             stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M9 11l-4 4l4 4m-4 -4h11a4 4 0 0 0 0 -8h-1"/>
                        </svg>
                        Voltar para listagem
                    </a>
                    <a href="{{ route('produtos.index') }}" class="btn btn-light d-sm-none btn-icon"
                       aria-label="Create new report">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                             stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                             stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M9 11l-4 4l4 4m-4 -4h11a4 4 0 0 0 0 -8h-1"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="col-12">
        <form action="{{ route('produtos.store') }}" method="post" class="card" autocomplete="off">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="row">
                            <div class="mb-3">
                                <label class="form-label required" for="name">Nome</label>
                                <input name="name" type="text" class="form-control" placeholder="Nome do produto" required maxlength="255">
                            </div>
                            <div class="mb-3">
                                <label for="brand_id" class="form-label required">Marca</label>
                                    <select name="brand_id" id="brand_id" class="form-select form-control" required>
                                        <option value="" selected hidden>Selecione uma marca</option>
                                        @foreach($brands as $brand)
                                            <option value="{{$brand->id}}">{{$brand->name}}</option>
                                        @endforeach
                                    </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="stock">Estoque</label>
                                    <input type="number" class="form-control" name="stock"
                                           placeholder="Estoque do produto">
                            </div>
                            <div class="mb-3">
                                <label class="form-label required" for="price">Preço</label>
                                    <input type="number" class="form-control" name="price"
                                           placeholder="Valor do produto" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="row">
                            <div class="mb-3">
                                <label class="form-label" for="description">Descrição</label>
                                    <textarea class="form-control" name="description" rows="13"
                                              placeholder="Descrição do produto"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-end">
                <div class="d-flex">
                    <a href="{{ route('produtos.index') }}" class="btn btn-link">Cancelar</a>
                    <button type="submit" class="btn btn-primary ms-auto">Salvar</button>
                </div>
            </div>
        </form>
    </div>
@endsection