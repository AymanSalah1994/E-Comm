@extends('layouts.store.main_page')
@section('title', $product->name)

@section('content')
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('review.submit') }}" onsubmit="myButton.disabled = true; return true;"
                    method="POST">
                    @csrf
                    <input type="hidden" value="{{ $product->slug }}" name="review_product_id">
                    <div class="modal-body">
                        @if ($user_review)
                            <div class="rating-css">
                                <div class="star-icon ">
                                    <input type="radio" value="1" name="product_rating" id="rating1"
                                        {{ $user_review->rating_stars == 1 ? 'checked' : '' }}>
                                    <label for="rating1" class="fa fa-star"></label>
                                    <input type="radio" value="2" name="product_rating" id="rating2"
                                        {{ $user_review->rating_stars == 2 ? 'checked' : '' }}>
                                    <label for="rating2" class="fa fa-star"></label>
                                    <input type="radio" value="3" name="product_rating" id="rating3"
                                        {{ $user_review->rating_stars == 3 ? 'checked' : '' }}>
                                    <label for="rating3" class="fa fa-star"></label>
                                    <input type="radio" value="4" name="product_rating" id="rating4"
                                        {{ $user_review->rating_stars == 4 ? 'checked' : '' }}>
                                    <label for="rating4" class="fa fa-star"></label>
                                    <input type="radio" value="5" name="product_rating" id="rating5"
                                        {{ $user_review->rating_stars == 5 ? 'checked' : '' }}>
                                    <label for="rating5" class="fa fa-star"></label>
                                </div>
                            </div>
                            <textarea name="rating_text" style="min-width: 100%" rows="7">{{ $user_review->rating_text }}</textarea>
                        @else
                            <div class="rating-css">
                                <div class="star-icon ">
                                    <input type="radio" value="1" name="product_rating" id="rating1">
                                    <label for="rating1" class="fa fa-star"></label>
                                    <input type="radio" value="2" name="product_rating" id="rating2">
                                    <label for="rating2" class="fa fa-star"></label>
                                    <input type="radio" value="3" name="product_rating" id="rating3">
                                    <label for="rating3" class="fa fa-star"></label>
                                    <input type="radio" value="4" name="product_rating" id="rating4">
                                    <label for="rating4" class="fa fa-star"></label>
                                    <input type="radio" value="5" name="product_rating" checked id="rating5">
                                    <label for="rating5" class="fa fa-star"></label>
                                </div>
                            </div>
                            <textarea name="rating_text" style="min-width: 100%" rows="7"></textarea>
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" name="myButton" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="py-3 px-5 mb-2 shadow-sm  border-top">
        <ol class="breadcrumb">
            <li><a href="{{ route('store.index') }}">{{ __('Home') }}</a></li>
            <li>
                <a href="{{ route('category.products', $product->category->slug) }}">
                    {{ $product->category->name }}
                </a>
            </li>
            <li class="active">{{ $product->name }}</li>
        </ol>
    </div>

    <div class="container">
        <div class="card shadow product_data">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 ">
                        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                                    class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                                    aria-label="Slide 2"></button>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="{{ $product->product_picture }}" class="d-block w-100 h-100"
                                        alt="iamge">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ $product->secondary_picture }}" class="d-block w-100 h-100"
                                        alt="iamge">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button"
                                data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button"
                                data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>

                        </div>
                        <div class="row">
                            <div class="">
                                {{-- col-md-2 --}}
                                <div class="input-group text-center mb-3">
                                    <span class="input-group-text decrement-btn rounded"> - </span>
                                    <input type="number" name="" value="1"
                                        class="form-control quantity-input text-center " min="1">
                                    <span class="input-group-text increment-btn rounded"> + </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <h2 class="mb-0">
                            {{ $product->name }}
                        </h2>
                        <label
                            class="float-end badge bg-danger badge-info">{{ $product->trending == '1' ? 'Trending' : '' }}</label>
                        <br>
                        <hr>
                        <label for="" class="me-5">{{ __('Original Price') }} :
                            <s>{{ $product->original_price }} {{ __('EGP') }}</s>
                        </label>
                        <label for="" class="fw-bold">{{ __('Selling Price') }}
                            :{{ $product->selling_price }} {{ __('EGP') }}</label>
                        <div class="rating">
                            <span> {{ __('Ratings') }}:( {{ $product->reviews->count() }} )</span>
                            <i class="fa fa-star {{ $average_rating >= 1 ? 'checked' : '' }}"></i>
                            <i class="fa fa-star {{ $average_rating >= 2 ? 'checked' : '' }}"></i>
                            <i class="fa fa-star {{ $average_rating >= 3 ? 'checked' : '' }}"></i>
                            <i class="fa fa-star {{ $average_rating >= 4 ? 'checked' : '' }}"></i>
                            <i class="fa fa-star {{ $average_rating >= 5 ? 'checked' : '' }}"></i>
                            <span>{{ $average_rating }} {{ __('of') }} 5 </span>
                        </div>
                        <br>
                        <p>{{ $product->description }}</p>
                        <hr>
                        @if ($product->status == '1')
                            <label for="" class="badge bg-success">{{ __('Available') }}</label>
                        @else
                            <label for="" class="badge bg-danger">{{ __('Out of Stock') }}</label>
                        @endif
                        @if ($product->refundable == '1')
                            <label for="" class="badge bg-info">{{ __('Refundable') }}</label>
                        @else
                            <label for="" class="badge bg-danger">{{ __('Not Refundable') }}</label>
                        @endif
                        <hr>
                        {{-- <div class="row"></div> --}}
                        <div class="row">
                            <input type="hidden" value="{{ $product->id }}" class="product_id">
                            <div class="col-md-6 col-sm-12">
                                @if ($product->status == '1')
                                    <button type="button"
                                        class="btn btn-danger rounded-pill addToCartBtn">{{ __('Add To Cart') }}
                                    </button>
                                @endif
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <button type="button"
                                    class="btn btn-success rounded-pill addToWishListBtn">{{ __('Add To Wish List') }}
                                </button>
                            </div>
                        </div>

                        <hr>
                        <div class="row mt-5">
                            <div class="col-md-6">
                                <h3 class="float-start">{{ __('Buyer') }}:
                                    <a href="{{ route('merchant.details', $product->user->slug) }}">
                                        {{ $product->user->first_name }}
                                    </a>
                                </h3>
                            </div>
                            <div class="col-md-6">
                                <button type="button" class="btn btn-warning float-end rounded-pill"
                                    data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    {{ __('Write a Review') }} <i class="fa-solid fa-pen"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>
    <div class="container">
        <div class="row">
            @if ($product->youtube_vid)
                <div class="col-md-5">
                    <iframe width="100%" height="315" src="{{ $product->youtube_vid }}"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                </div>
            @else
                <div class="col-md-5">
                    {{-- <img src="{{ asset('images/No-Video.jpg') }}" class="" width="" height=""
                        style="width: 100%;height: 15vw;object-fit: cover;"> --}}
                </div>
            @endif
            <div class="col-md-7">
                <h4 class="text-center">-----{{ __('Reviews') }}-------</h4>
                @if ($reviews->count() > 0)
                    @foreach ($reviews as $review)
                        <div class="container">
                            <div class="card shadow">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $review->user->first_name }}</h5>
                                    <div class="rating">
                                        <i class="fa fa-star {{ $review->rating_stars >= 1 ? 'checked' : '' }}"></i>
                                        <i class="fa fa-star {{ $review->rating_stars >= 2 ? 'checked' : '' }}"></i>
                                        <i class="fa fa-star {{ $review->rating_stars >= 3 ? 'checked' : '' }}"></i>
                                        <i class="fa fa-star {{ $review->rating_stars >= 4 ? 'checked' : '' }}"></i>
                                        <i class="fa fa-star {{ $review->rating_stars >= 5 ? 'checked' : '' }}"></i>
                                    </div>
                                    <p class="card-text">{{ $review->rating_text }}</p>
                                    <p class="card-text"><small class="text-muted">{{ $review->updated_at }}</small></p>
                                </div>
                            </div>
                            <br>
                        </div>
                    @endforeach
                @else
                    <div class="container">
                        <div class="card shadow">
                            <div class="card-body">
                                <h5 class="card-title">{{ __('No Reviews Yet') }}</h5>
                                <p class="card-text"></p>
                            </div>
                        </div>
                        <br>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <hr>
    <div class="container">
        <h2 class="">
            {{ __('Related Products') }}
        </h2>
        <br>
        <div class="row">
            <div class="owl-carousel owl-theme">
                @foreach ($relatedProducts as $Rproduct)
                    @if ($product->id != $Rproduct->id)
                        <div class="item row">
                            @include('layouts.store.storeparts.related-product-card')
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    @if ($message = session('status-review-error'))
        <script>
            $.notify('{{ __($message) }}', "error");
        </script>
    @endif
    @if ($message2 = session('status'))
        <script>
            $.notify("{{ __($message2) }}", "success");
        </script>
    @endif
    <script>
        $('.owl-carousel').owlCarousel({
            loop: true,
            rtl: true,
            margin: 30,
            dots: true,
            nav: false,
            theme: 'green',
            responsiveClass: true,
            responsive: {
                0: {
                    items: 2,
                    margin: 10,
                    stagePadding: 20,
                },
                600: {
                    items: 3,
                    margin: 20,
                    stagePadding: 50,
                },
                1000: {
                    items: 4
                }
            }
        });
    </script>
@endsection
