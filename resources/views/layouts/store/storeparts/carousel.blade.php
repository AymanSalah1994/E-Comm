<div class="container-fluid">
    <br>
    <div class="row">
        <div class="col-md-8 gy-3">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" class=""
                        aria-label="Slide 2"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('images/Caro-logo-3.png') }}" class="d-block w-100" alt="iamge">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('images/Caro-logo.png') }}" class="d-block w-100" alt="iamge">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon rounded" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon rounded" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="col-md-4 gy-3">
            <div class="card">
                <div class="card-header">
                    <h4>{{__('Why Choose us ?')}}</h4>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <i class="bi bi-check-circle-fill" style="color:green"></i>
                            {{ __('Fast Delivery') }}
                        </li>
                        <li class="list-group-item">
                            <i class="bi bi-check-circle-fill" style="color:green"></i>
                            {{ __('Trusted Places') }}
                        </li>
                        <li class="list-group-item">
                            <i class="bi bi-check-circle-fill" style="color:green"></i>
                            {{ __('Online With Low Cost') }}
                        </li>
                        <li class="list-group-item">
                            <i class="bi bi-check-circle-fill" style="color:green"></i>
                            {{ __('Simple Site , No Links EveryWhere') }}
                        </li>
                        <li class="list-group-item">
                            <i class="bi bi-check-circle-fill" style="color:green"></i>
                            {{ __('Real Photos . No Fraud') }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
