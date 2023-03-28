@if (sizeof($menus) > 0)
@foreach ($menus as $menu)
    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 item_card">
        <a href="javascript:" title="{{ $menu->name }}" onclick="addToCart(this)"
            data-details="{{$menu->id . '|' .$menu->name . '|' .$menu->price}}">
            <div class="card mb-0">
                <div class="card-content box-shadow-1 rounded">
                    <img class="food-item-img img-fluid" alt="{{ $menu->name }}"
                    src="{{ $menu->image ? asset ('public/uploads/image/'.$menu->image) : asset('public/image/no-image-icon.png') }}" >
                    <div class="card-body p-0 text-center">
                        <p class="text-dark">{{ mb_strimwidth($menu->name, 0, 12, '....') }}</span> <br>BDT {{ $menu->price }} </p>
                    </div>
                </div>
            </div>
        </a>
    </div>
@endforeach
@endif
