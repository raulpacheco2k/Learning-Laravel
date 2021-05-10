@extends('base')

@section('submenu')
    <div class="row align-items-center">
        <div class="col">
            <div class="page-pretitle">Dashboard > Marcas > Criar</div>
            <h2 class="page-title">Marcas</h2>
        </div>
        <div class="col-auto ms-auto d-print-none">
            <div class="btn-list">
                <div>
                    <a href="{{ route('marcas.index') }}" class="btn btn-light d-none d-sm-inline-block">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                             stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                             stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M9 11l-4 4l4 4m-4 -4h11a4 4 0 0 0 0 -8h-1"/>
                        </svg>
                        Voltar para listagem
                    </a>
                    <a href="{{ route('marcas.index') }}" class="btn btn-light d-sm-none btn-icon"
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
        <form action="{{ route('marcas.store') }}" method="post" class="card">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="row">
                        <div class="mb-3">
                            <label class="form-label required" for="name">Nome</label>
                            <input type="text" class="form-control" name="name" placeholder="Nome da marca" required
                                   maxlength="255">
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3">
                            <label class="form-label" for="description">Descrição</label>
                            <textarea class="form-control" name="description" rows="9"
                                      placeholder="Descrição da marca"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-end">
                <div class="d-flex">
                    <a href="{{ route('marcas.index') }}" class="btn btn-link">Cancelar</a>

                    <button type="submit" class="btn btn-primary ms-auto">Salvar</button>
                </div>
            </div>
        </form>
    </div>
@endsection