@extends('backoffice.layout.base')
@include('backoffice.sections.product.fields')

@section('title', 'Criação de produto')

@section('submenu')
    <div class="row align-items-center">
        <div class="col">
            <div class="page-pretitle">Dashboard > Produtos > Criar</div>
            <h2 class="page-title">Produtos</h2>
        </div>
        <div class="col-auto ms-auto d-print-none">
            <div class="btn-list">
                <div>
                    <a href="{{ route('products.index') }}" class="btn btn-light d-none d-sm-inline-block">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                             stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                             stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M9 11l-4 4l4 4m-4 -4h11a4 4 0 0 0 0 -8h-1"/>
                        </svg>
                        Voltar para listagem
                    </a>
                    <a href="{{ route('products.index') }}" class="btn btn-light d-sm-none btn-icon"
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
        {{ Form::open(['route' => 'products.store', 'class' => 'card', 'enctype' => 'multipart/form-data', 'autocomplete' => 'off']) }}
        <div class="card-body">
            <div class="row">
                <div class="col-xl-6">
                    <div class="row">
                        <div class="mb-3">
                            @yield('name')
                        </div>
                        <div class="mb-3">
                            @yield('brand_id')
                        </div>
                        <div class="mb-3">
                            @yield('stock')
                        </div>
                        <div class="mb-3">
                            @yield('price')
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="row">
                        <div class="mb-3">
                            @yield('image')
                        </div>
                        <div class="mb-3">
                            @yield('description')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer text-end">
            <div class="d-flex">
                <a href="{{ route('products.index') }}" class="btn btn-link">Cancelar</a>
                <button type="submit" class="btn btn-primary ms-auto">Salvar</button>
            </div>
        </div>
        {{ Form::close() }}
    </div>
@endsection