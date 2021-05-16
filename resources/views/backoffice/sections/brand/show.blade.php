@extends('backoffice.layout.base')

@section('title', 'Visualização de marca')

@section('submenu')
    <div class="row align-items-center">
        <div class="col">
            <div class="page-pretitle">Dashboard > Marcas > Visualizar</div>
            <h2 class="page-title">{{ substr($brand->name, 0, 55) }}</h2>
        </div>
        <div class="col-auto ms-auto d-print-none">
            <div class="btn-list">
                <div>
                    <a href="{{ route('brands.index') }}" class="btn btn-light d-none d-sm-inline-block">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                             stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                             stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M9 11l-4 4l4 4m-4 -4h11a4 4 0 0 0 0 -8h-1"/>
                        </svg>
                        Voltar para listagem
                    </a>
                    <a href="{{ route('brands.index') }}" class="btn btn-light d-sm-none btn-icon"
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
                    <a href="{{ route('brands.edit', $brand->id) }}" class="btn btn-primary d-none d-sm-inline-block">
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
                    <a href="{{ route('brands.edit', $brand->id) }}" class="btn btn-primary d-sm-none btn-icon"
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
        {{ Form::open(['route' => ['brands.edit', $brand->id], 'method' => 'get', 'class' => 'card']) }}
        <div class="card-body">
            <div class="row">
                <div class="row">
                    <div class="mb-3">
                        {{ Form::label('name', 'Nome', ['class' => 'form-label required']) }}
                        {{ Form::text('name', $brand->name, ['class' => 'form-control', 'placeholder' => 'Nome da marca', 'readonly','required', 'maxlength' => '255']) }}
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3">
                        {{ Form::label('description', 'Descrição', ['class' => 'form-label required']) }}
                        {{ Form::textarea('description', $brand->description, ['class' => 'form-control', 'rows' => '9', 'placeholder' => 'Descrição da marca', 'readonly','required']) }}
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer text-end">
            <div class="d-flex">
                <a href="{{route('brands.index')}}" class="btn btn-link">Voltar para listagem</a>
                <button type="submit" class="btn btn-primary ms-auto">Editar marca</button>
            </div>
        </div>
        {{ Form::close() }}
    </div>
@endsection