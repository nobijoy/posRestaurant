@if (sizeof($menus) > 0)
@foreach ($menus as $menu)
    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 ">
        <a href="javascript:" title="{{ $menu->name }}" onclick="addToCart(this)"
            data-details="{{$menu->id . '|' .$menu->name . '|' .$menu->price}}">
            <div class="card">
                <div class="card-content box-shadow-1 rounded">
                    <img class="food-item-img img-fluid" alt="{{ $menu->name }}"
                    src="{{ $menu->image ? asset ('public/uploads/image/'.$menu->image) : asset('public/image/no-image-icon.png') }}" >
                    <div class="card-body p-0 text-center">
                        <h6 class="text-dark">{{ mb_strimwidth($menu->name, 0, 12, '....') }}</span> <br>BDT {{ $menu->price }} </h6>
                    </div>
                </div>
            </div>
        </a>
    </div>
@endforeach
@endif
