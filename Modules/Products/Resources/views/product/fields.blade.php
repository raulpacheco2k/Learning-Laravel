@section('name')
    {{ Form::label('name', __('Name'), ['class' => 'form-label required']) }}
    {{ Form::text('name', $product->name ?? null, ['class' => 'form-control', 'placeholder' => __('Product\'s name'), 'required', $disabled ?? null]) }}
    <x-validate-field field="name"/>
@endsection

@section('brand_id')
    {{ Form::label('brand_id', __('Brand'), ['class' => 'form-label required'])  }}
    {{ Form::select('brand_id', $brands->pluck('name', 'id'), $product->brand_id ?? null, ['class'=>'form-select form-control', 'required', $disabled ?? null]) }}
    <x-validate-field field="brand_id"/>
@endsection

@section('stock')
    {{ Form::label('stock', __('Stock'), ['class' => 'form-label']) }}
    {{ Form::number('stock', $product->stock ?? null, ['class' => 'form-control', 'placeholder' => __('Product stock'), $disabled ?? null]) }}
    <x-validate-field field="stock"/>
@endsection

@section('price')
    {{ Form::label('price', __('Price'), ['class' => 'form-label required'])  }}
    {{ Form::number('price', $product->price ?? null, ['class' => 'form-control', 'placeholder' => __('Price of the product'), 'required', 'max' => '2147483647', $disabled ?? null]) }}
    <x-validate-field field="price"/>
@endsection

@section('description')
    {{ Form::label('description', __('Description'), ['class' => 'form-label'])  }}
    {{ Form::textarea('description', $product->description ?? null, ['class' => 'form-control', 'rows' => '9', 'placeholder' => __('Product description'), $disabled ?? null]) }}
    <x-validate-field field="description"/>
@endsection

@section('image')
    {{ Form::label('image', __('Image'), ['class' => 'form-label'])  }}
    {{ Form::file('image', ['class' => 'form-control', $disabled ?? null, 'accept' => 'image/png' ]) }}
@endsection