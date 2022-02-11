<div class="checkout-customer-info bg-white">
    <div class="customer-info-content">
        <div class="d-flex justify-content-between">
            <p>{{ $address_shipping->customer->name }}</p>
            <div class="customer-edit-icon text-center">
                <button class="show-modal btn p-0 bg-white mr-2"><i class="far fa-edit color-brand-green"></i></button>
                <button class="delete-address-shipping btn p-0 bg-white" data-action="{{ route('delete.address.shipping', $address_shipping->id) }}"><i class="fas fa-trash-alt color-brand-green"></i></i></button>
            </div>
        </div>
        <p>Số điện thoại : {{ $address_shipping->customer->phone }}</p>
        <p>{{ $address_full }}</p>
    </div>
</div>