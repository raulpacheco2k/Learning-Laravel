@extends('backoffice.layout.base')

@section('title', 'Produtos')

@section('submenu')
    <div class="row align-items-center">
        <div class="col">
            <div class="page-pretitle">{{ __('Dashboard') }} > {{ __('Products') }}</div>
            <h2 class="page-title">{{ __('Products') }}</h2>
        </div>
        <div class="col-auto ms-auto d-print-none">
            <div class="btn-list">
                <a href="{{ route('products.create') }}" class="btn btn-primary d-none d-sm-inline-block">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                         stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                         stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <line x1="12" y1="5" x2="12" y2="19"></line>
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg>
                    {{ __('Create product') }}
                </a>
                <a href="{{ route('products.create') }}" class="btn btn-primary d-sm-none btn-icon">
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
            <div class="table-responsive">
                <table class="table card-table table-vcenter text-nowrap datatable">
                    @if(count($products) == 0)
                        <div class="empty">
                            <p class="empty-title">{{ __('No results found') }}</p>
                            <p class="empty-subtitle text-muted">
                                {{ __('Try adjusting your filter to find what you\'re looking for, or create a product') }}
                            </p>
                            <div class="empty-action">
                                <a href="{{ route('products.create') }}" class="btn btn-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                         viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                         stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <line x1="12" y1="5" x2="12" y2="19"></line>
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                    </svg>
                                    {{ __('Create product') }}
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
                            <th>{{ __('Name') }}</th>
                            <th>{{ __('Brand') }}</th>
                            <th>{{ __('Price') }}</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($products as $product)
                            <tr>
                                <td data-children-count="1"><input class="form-check-input m-0 align-middle"
                                                                   type="checkbox"
                                                                   aria-label="Select invoice">
                                </td>
                                <td><span class="text-muted">{{ $product->id }}</span></td>
                                <td>{{ substr($product->name, 0, 55) }}</td>
                                <td>
                                    {{ substr(\App\Models\Brand::find($product->brand_id)->name, 0, 55) }}
                                </td>
                                <td>
                                    R$ {{ $product->formatted_price }}
                                </td>
                                <td class="text-end">
                            <span class="dropdown">
                              <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport"
                                      data-bs-toggle="dropdown">{{ __('Actions') }}</button>
                              <div class="dropdown-menu dropdown-menu-end">

                                <a class="dropdown-item" href="{{ route('products.show', $product) }}">
                                  {{ __('View') }}
                                </a>
                                  <form method="post" action="{{ route('products.destroy', $product) }}">
                                        @csrf
                                      @method('DELETE')
                                      <button type="submit" class="dropdown-item">{{ __('Delete') }}</button>
                                  </form>
                              </div>
                            </span>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    @endif
                </table>

            </div>
            <div class="card-footer d-flex align-items-center">
                <p class="m-0 text-muted">{{ __('Showing :exhibition to :total of', ['exhibition' => 0, 'total' => 3]) }} <span>{{count($products)}}</span></p>
                <ul class="pagination m-0 ms-auto">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                 viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <polyline points="15 6 9 12 15 18"></polyline>
                            </svg>
                            {{ __('Prev') }}
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item active"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">
                            {{ __('Next') }}
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