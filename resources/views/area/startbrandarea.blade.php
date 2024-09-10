<section class="brand-area section_gap">
    <div class="container">
        <div class="row">
            {{-- <a class="col single-img" href="#">
                <img class="img-fluid d-block mx-auto" src="{{ asset('theme/img/brand/1.png') }}" alt="">
            </a>
            <a class="col single-img" href="#">
                <img class="img-fluid d-block mx-auto" src="{{ asset('theme/img/brand/2.png') }}" alt="">
            </a>
            <a class="col single-img" href="#">
                <img class="img-fluid d-block mx-auto" src="{{ asset('theme/img/brand/3.png') }}" alt="">
            </a>
            <a class="col single-img" href="#">
                <img class="img-fluid d-block mx-auto" src="{{ asset('theme/img/brand/4.png') }}" alt="">
            </a>
            <a class="col single-img" href="#">
                <img class="img-fluid d-block mx-auto" src="{{ asset('theme/img/brand/5.png') }}" alt="">
            </a> --}}

            @php
                $brands = [
                    'theme/img/brand/1.png',
                    'theme/img/brand/2.png',
                    'theme/img/brand/3.png',
                    'theme/img/brand/4.png',
                    'theme/img/brand/5.png'
                ];
            @endphp

            @foreach ($brands as $brand)
                <a class="col single-img" href="#">
                    <img class="img-fluid d-block mx-auto" src="{{ asset($brand) }}" alt="">
                </a>
            @endforeach
        </div>
    </div>
</section>
