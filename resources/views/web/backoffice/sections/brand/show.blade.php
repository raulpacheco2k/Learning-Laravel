@extends('web.backoffice.layout.base')

@section('title', 'Visualização de marca')


@section('submenu')
    <div class="row align-items-center">
        <div class="col">
            <div class="page-pretitle">
                Dashboard > Marcas > Visualizar
            </div>
            <h2 class="page-title">
                Visualização {{ substr($brand->name, 0, 55) }}
            </h2>
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
                <div>
                    <a href="{{ route('marcas.edit', $brand->id) }}" class="btn btn-primary d-none d-sm-inline-block">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                             stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                             stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3"/>
                            <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3"/>
                            <line x1="16" y1="5" x2="19" y2="8"/>
                        </svg>
                        Editar marca
                    </a>
                    <a href="{{ route('marcas.edit', $brand->id) }}" class="btn btn-primary d-sm-none btn-icon"
                       aria-label="Create new report">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                             stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                             stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3"/>
                            <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3"/>
                            <line x1="16" y1="5" x2="19" y2="8"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="col-12">
        <form action="{{ route('marcas.edit', $brand->id) }}" method="get" class="card">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="row">
                        <div class="mb-3">
                            <label class="form-label" for="name">Nome
                                <input readonly type="text"
                                       class="form-control"
                                       name="name"
                                       placeholder="Nome da marca"
                                       value="{{ $brand->name }}">
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3">
                            <label class="form-label" for="description">Descrição
                                <textarea readonly type="text" class="form-control" name="descriptionBrand" rows="9"
                                          id="descriptionBrand">{{ $brand->description }}</textarea>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-end">
                <div class="d-flex">
                    <a href="{{route('marcas.index')}}" class="btn btn-link">Voltar para listagem</a>
                    <button type="submit" class="btn btn-primary ms-auto">Editar marca</button>
                </div>
            </div>
        </form>
    </div>
@endsection