@extends('base')

@section('submenu')
    <div class="row align-items-center">
        <div class="col">
            <div class="page-pretitle">
                Overview
            </div>
            <h2 class="page-title">
                Navbar overlap layout
            </h2>
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
        <form action="{{ route('produtos.update', $product->id) }}" method="post" class="card">
            @method('PATCH')
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="row">
                            <div class="mb-3">
                                <label class="form-label" for="name">Nome
                                    <input type="text"
                                           class="form-control"
                                           name="name"
                                           placeholder="Nome do produto"
                                           value="{{ $product->name }}">
                                </label>
                                @if ($errors->has('name'))
                                    <div class="mt-3 alert alert-danger">
                                        <p>{{ $errors->first('name') }}</p>
                                    </div>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Marca</label>
                                <select type="text" name="brand_id" class="form-select form-control" required>
                                    <option selected hidden>Selecione uma marca</option>
                                    @foreach($brands as $brand)
                                        <option @if($brand->id == $product->brand_id) selected @endif value="{{$brand->id}}">{{ substr($brand->name, 0, 55) }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('brand_id'))
                                    <div class="mt-3 alert alert-danger">
                                        <p>{{ $errors->first('brand_id') }}</p>
                                    </div>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="stock">Estoque
                                    <input type="number" class="form-control" name="stock"
                                           placeholder="Estoque do produto"
                                           value="{{ $product->stock }}">
                                </label>
                                @if ($errors->has('stock'))
                                    <div class="mt-3 alert alert-danger">
                                        <p>{{ $errors->first('stock') }}</p>
                                    </div>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="price">Preço
                                    <input type="number" class="form-control" name="price"
                                           placeholder="Valor do produto"
                                           value="{{ $product->price }}">
                                </label>
                                @if ($errors->has('price'))
                                    <div class="mt-3 alert alert-danger">
                                        <p>{{ $errors->first('price') }}</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="row">
                            <div class="mb-3">
                                <label class="form-label" for="description">Descrição
                                    <textarea type="text" class="form-control" name="description" rows="13"
                                              id="description">{{ $product->description }}</textarea>
                                </label>
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