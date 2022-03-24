<div class="item-cart d-flex bg-white justify-content-between" id="cart-item-{{$row->id}}">
    <div class="item-cart-img d-flex">
        <input type="checkbox" name="rowid" value="{{$row->rowId}}">
        <img src="{{ asset($row->model->feature_img) }}" alt="">
    </div>
    <div class="item-cart-info">
        <h4 class="mb-16">{{ $item->name }}</h4>
        <div class="cart-select d-flex justify-content-between">
            <div class="cart-quantity-control-group d-flex mb-16">
                <div id="minus-{{ $item->id }}" class="down-btn btn-primary-4 btn-rounded">-</div>
                <input id="qty-{{ $item->id }}" type="text" class="quantity-input text-center"
                    value="{{ $item->qty }}" name="quantity" im-insert="true" 
                    data-rowid="{{$row->rowId}}" data-url="{{ route('cart.update') }}">
                <div id="plus-{{ $item->id }}" class="up-btn btn-primary-4 btn-rounded">+</div>
            </div>
            <div class="product-stock text-right">
                <h4 class="color-brand-green">Còn 120 sp</h4>
            </div>
        </div>
        <div class="cart-price d-flex justify-content-between">
            <p>Giá tiền:</p>
            <h4 class="color-brand-green row-price-{{ $item->id }}">{{ formatPrice($item->price * $item->qty) }}</h4>
        </div>
    </div>
</div>
<script>
    var minus{{ $item->id }} = $("#minus-{{ $item->id }}");
    var plus{{ $item->id }} = $("#plus-{{ $item->id }}");
    var input{{ $item->id }} = $("#qty-{{ $item->id }}");
    var rowprice{{ $item->id }} = $('#cart-item-{{ $item->id }} .row-price-{{ $item->id }}')
    var quantity{{ $item->id }} = input{{ $item->id }}.val();
    input{{ $item->id }}.val(quantity{{ $item->id }});
    minus{{ $item->id }}.on('click', function(event) {
        if (quantity{{ $item->id }} > 0) {
            quantity{{ $item->id }}--;
            input{{ $item->id }}.val(quantity{{ $item->id }});
            updateCart(input{{ $item->id }},rowprice{{ $item->id }});
        }
    });
    plus{{ $item->id }}.on('click', function(event) {
        quantity{{ $item->id }}++;
        input{{ $item->id }}.val(quantity{{ $item->id }});
        updateCart(input{{ $item->id }},rowprice{{ $item->id }});
    });
</script>
