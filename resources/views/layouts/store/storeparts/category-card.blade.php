@isset($category)
    <div class="col-md-3 gy-3 d-flex justify-content-center">
        <div class="card" style="width: 18rem;">
            <img src="{{ $category->category_picture }}" class="card-img-top" alt="...">
            <div class="card-body">
                <a href="{{ route('category.products', $category->slug) }}">
                    <h5 class="card-title">{{ $category->name }}</h5>
                </a>
                <p class="card-text">{{ Str::limit($category->description, $limit = 20, $end = '...') }}</p>
                <a href="{{ route('category.products', $category->slug) }}"
                    class="btn btn-info rounded-pill">{{ __('Category Products') }}</a>
            </div>
        </div>
    </div>
@endisset
