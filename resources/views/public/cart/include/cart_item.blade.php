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
            <h4 class="color-brand-green row-price">{{ formatPrice($item->price * $item->qty) }}</h4>
        </div>
    </div>
</div>
<script>
    var minus = $("#minus-{{ $item->id }}");
    var plus = $("#plus-{{ $item->id }}");
    var input = $("#qty-{{ $item->id }}");
    var rowprice = $('#cart-item-{{ $item->id }} .row-price')
    var quantity = input.val();
    input.val(quantity);
    minus.on('click', function(event) {
        if (quantity > 1) {
            quantity--;
            input.val(quantity);
            updateCart(input,rowprice);
        }
    });
    plus.on('click', function(event) {
        quantity++;
        input.val(quantity);
        updateCart(input,rowprice);
    });
</script>
