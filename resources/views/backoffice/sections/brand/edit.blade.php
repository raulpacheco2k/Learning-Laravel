@extends('backoffice.layout.base')

@section('title', 'Edição de marca')

@section('submenu')
    <div class="row align-items-center">
        <div class="col">
            <div class="page-pretitle">Dashboard > Marcas > Edição</div>
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
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="col-12">
        {{ Form::open(['route' => ['brands.update', $brand->id], 'method' => 'patch', 'class' => 'card']) }}
        <div class="card-body">
            <div class="row">
                <div class="row">
                    <div class="mb-3">
                        {{ Form::label('name', 'Nome', ['class' => 'form-label required']) }}
                        {{ Form::text('name', $brand->name, ['class' => 'form-control', 'placeholder' => 'Nome da marca', 'required']) }}
                        <x-validate-field field="name"/>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3">
                        {{ Form::label('description', 'Descrição', ['class' => 'form-label required']) }}
                        {{ Form::textarea('description', $brand->description, ['class' => 'form-control', 'rows' => '9']) }}
                        <x-validate-field field="description"/>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer text-end">
            <div class="d-flex">
                <a href="{{ route('brands.index') }}" class="btn btn-link">Cancelar</a>
                <button type="submit" class="btn btn-primary ms-auto">Salvar</button>
            </div>
        </div>
        {{ Form::close() }}
    </div>
@endsection