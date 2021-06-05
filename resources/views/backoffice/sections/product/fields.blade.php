@section('name')
    {{ Form::label('name', 'Nome', ['class' => 'form-label required']) }}
    {{ Form::text('name', $product->name ?? null, ['class' => 'form-control', 'placeholder' => 'Nome do produto', 'required', $disabled ?? null]) }}
    <x-validate-field field="name"/>
@endsection

@section('brand_id')
    {{ Form::label('brand_id', 'Marca', ['class' => 'form-label required'])  }}
    {{ Form::select('brand_id', $brands->pluck('name', 'id'), $product->brand_id ?? null, ['class'=>'form-select form-control', 'required', $disabled ?? null]) }}
    <x-validate-field field="brand_id"/>
@endsection

@section('stock')
    {{ Form::label('stock', 'Estoque', ['class' => 'form-label']) }}
    {{ Form::number('stock', $product->stock ?? null, ['class' => 'form-control', 'placeholder' => 'Estoque do produto', $disabled ?? null]) }}
    <x-validate-field field="stock"/>
@endsection

@section('price')
    {{ Form::label('price', 'Preço', ['class' => 'form-label required'])  }}
    {{ Form::number('price', $product->price ?? null, ['class' => 'form-control', 'placeholder' => 'Valor do produto', 'required', 'max' => '2147483647', $disabled ?? null]) }}
    <x-validate-field field="price"/>
@endsection

@section('description')
    {{ Form::label('description', 'Descrição', ['class' => 'form-label'])  }}
    {{ Form::textarea('description', $product->description ?? null, ['class' => 'form-control', 'rows' => '9', 'placeholder' => 'Descrição do produto', $disabled ?? null]) }}
    <x-validate-field field="description"/>
@endsection

@section('image')
    {{ Form::label('image', 'Imagem', ['class' => 'form-label'])  }}
    {{ Form::file('image', ['class' => 'form-control', $disabled ?? null, 'accept' => 'image/png' ]) }}
@endsection