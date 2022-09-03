@extends('app')

@section('content')
<a href="{{route('product.create')}}" class="button is-primary">Add product</a>
<table class="table is-fullwidth">
    <thead>
        <tr>
            <th>Brand name</th>
            <th>Code</th>
            <th>Product name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Discount (%)</th>
            <th>Tax (%)</th>
            <th>Total</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
        <tr>
            <th colspan="7">Grand total</th>
            <th>
                {{$brands->sum('total')}}
            </th>
        </tr>
        </tr>
    </tfoot>
    <tbody>
        @forelse($brands as $brand)
        <tr>
            <td rowspan="{{count($brand->products)}}" style="vertical-align: middle;">{{$brand->name}}</td>
            @foreach($brand->products as $product)
            @if (!$loop->first)
        <tr>
            @endif
            <td>{{str_pad($product->id,2,0,STR_PAD_LEFT)}}</td>
            <td>{{$product->name}}</td>
            <td>{{$product->price}}</td>
            <td>{{$product->quantity}}</td>
            <td>{{$product->discount}}</td>
            <td>{{$product->tax}}</td>
            @if (!$loop->first)
        </tr>
        @else
        <td rowspan="{{count($brand->products)}}" style="vertical-align: middle;">{{$brand->total}}</td>
        @endif
        @endforeach
        </tr>
        @empty
        <p>No results found</p>
        @endforelse
    </tbody>
</table>
@endsection