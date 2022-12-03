<section id="brand" class="brand">
    <div class="container">
        <h2 class="title title-underline mb-4 ls-normal appear-animate">Our Brands</h2>
        <div class="swiper-container swiper-theme brands-wrapper mb-9 appear-animate" data-swiper-options="{
            'spaceBetween': 0,
            'slidesPerView': 2,
            'autoplay': false,
            'loop': true,
            'breakpoints': {
                '576': {
                    'slidesPerView': 3
                },
                '768': {
                    'slidesPerView': 4
                },
                '992': {
                    'slidesPerView': 5
                },
                '1200': {
                    'slidesPerView': 6
                }
            }
        }">
            <div class="swiper-wrapper row gutter-no cols-xl-6 cols-lg-5 cols-md-4 cols-sm-3 cols-2">
                @foreach ($brand as $item)
                <div class="swiper-slide brand-col">
                    <a href="{{ route('shop.box', ['brand_filter' => $item->id]) }}">
                        <figure class="brand-wrapper">
                            <img src="{{ asset($item->image) }}" alt="{{ $item->name }}" width="410"
                                height="186" />
                        </figure>
                    </a>
                </div>
                @endforeach
            </div>
            {{-- <div class="swiper-wrapper row gutter-no cols-xl-6 cols-lg-5 cols-md-4 cols-sm-3 cols-2">
            
            </div> --}}
        </div>
        <!-- End of Brands Wrapper -->
    </div>
</section>