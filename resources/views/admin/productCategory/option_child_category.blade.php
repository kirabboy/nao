<option value="{{ $child_category->id }}">{{ $subMask }}{{ $child_category->name }}</option>
@if (count($child_category->categories) > 0)
    @foreach ($child_category->categories as $childCategory)
        @include('admin.productCategory.option_child_category', ['child_category' => $childCategory, 'subMask' =>
        $subMask . '--'])
    @endforeach
@endif
