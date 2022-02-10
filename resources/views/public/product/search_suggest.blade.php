@if (count($products) > 0)
    @foreach ($products as $product)
        <li><a href="{{route('product.show', $product->slug)}}"><span>{{ $product->name }}</span>-
                @if ($user->level ==1)
                <span class="text-danger">{{formatPrice($product->productPrice->price_new_daily)}}</span>
                @else
                    <span class="text-danger">{{formatPrice($product->productPrice->price_ctv)}}</span>
                @endif
            </a></li>
    @endforeach
@else
    <li>Không tìm thấy sản phẩm</li>
@endif
