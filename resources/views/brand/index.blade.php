@extends('base')

@section('submenu')
    <div class="row align-items-center">
        <div class="col">
            <div class="page-pretitle">Dashboard > Marcas</div>
            <h2 class="page-title">Marcas</h2>
        </div>
        <div class="col-auto ms-auto d-print-none">
            <div class="btn-list">
                <a href="{{ route('marcas.create') }}" class="btn btn-primary d-none d-sm-inline-block">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                         stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                         stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <line x1="12" y1="5" x2="12" y2="19"></line>
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg>
                    Criar marca
                </a>
                <a href="{{ route('marcas.create') }}" class="btn btn-primary d-sm-none btn-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                         stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                         stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <line x1="12" y1="5" x2="12" y2="19"></line>
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg>
                </a>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="">
                <table class="table card-table table-vcenter text-nowrap datatable">
                    @if(count($brands) == 0)
                        <div class="empty">
                            <p class="empty-title">Nenhum resultado encontrado</p>
                            <p class="empty-subtitle text-muted">
                                Tente ajustar seu filtro para encontrar o que procura ou então crie uma marca.
                            </p>
                            <div class="empty-action">
                                <a href="{{ route('marcas.create') }}" class="btn btn-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                         viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                         stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <line x1="12" y1="5" x2="12" y2="19"></line>
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                    </svg>
                                    Criar marca
                                </a>
                            </div>
                        </div>
                    @else
                        <thead>
                        <tr>
                            <th class="w-1" data-children-count="1">
                                <input class="form-check-input m-0 align-middle" type="checkbox"
                                       aria-label="Select all invoices"></th>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($brands as $brand)
                            <tr>
                                <td data-children-count="1"><input class="form-check-input m-0 align-middle"
                                                                   type="checkbox"
                                                                   aria-label="Select invoice">
                                </td>
                                <td><span class="text-muted">{{ $brand->id }}</span></td>
                                <td>{{ substr($brand->name, 0, 55) }}</td>
                                <td>
                                    {{ substr($brand->description, 0, 55) }}
                                </td>
                                <td class="text-end">
                            <span class="dropdown">
                              <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport"
                                      data-bs-toggle="dropdown">Ações</button>
                              <div class="dropdown-menu dropdown-menu-end">

                                <a class="dropdown-item" href="{{ route('marcas.show', $brand->id) }}">
                                  Visualizar
                                </a>
                                      <a href="#" class="dropdown-item" data-bs-toggle="modal"
                                         data-bs-target="#modal-danger">Deletar</a>
                                  </div>
                            </span>
                                </td>
                            </tr>
                            <div class="modal modal-blur fade" id="modal-danger" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        <div class="modal-status bg-danger"></div>
                                        <div class="modal-body text-center py-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24" height="24"
                                                 viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                                 stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                <path d="M12 9v2m0 4v.01"/>
                                                <path d="M5 19h14a2 2 0 0 0 1.84 -2.75l-7.1 -12.25a2 2 0 0 0 -3.5 0l-7.1 12.25a2 2 0 0 0 1.75 2.75"/>
                                            </svg>
                                            <h3>Você tem certeza que deseja deletar?</h3>
                                            <div class="text-muted">Está ação irá excluir a marca e todos os {X} produtos que estão associadas a
                                                ela. <br>Está ação não poderá ser desfeita.
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <div class="w-100">
                                                <div class="row">
                                                    <div class="col"><a href="#" class="btn btn-white w-100" data-bs-dismiss="modal">
                                                            Cancel
                                                        </a></div>
                                                    <div class="col">
                                                        <form method="post" action="{{ route('marcas.destroy', $brand->id) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger w-100">Deletar</button>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </tbody>
                    @endif
                </table>

            </div>
            <div class="card-footer d-flex align-items-center">
                <p class="m-0 text-muted">Mostrando de <span>1</span> a <span>8</span> de
                    <span>{{count($brands)}}</span>
                </p>
                <ul class="pagination m-0 ms-auto">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                            <!-- Download SVG icon from http://tabler-icons.io/i/chevron-left -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                 viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <polyline points="15 6 9 12 15 18"></polyline>
                            </svg>
                            prev
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item active"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">
                            next <!-- Download SVG icon from http://tabler-icons.io/i/chevron-right -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                 viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <polyline points="9 6 15 12 9 18"></polyline>
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection