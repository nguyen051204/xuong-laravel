@extends('client.layouts.app')

@section('content')

    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-bg d-flex justify-content-center align-items-center">
                    <div class="breadcrumb-shape1 position-absolute top-0 end-0">
                        <img src="assets/images/shapes/bs-right.png" alt>
                    </div>
                    <div class="breadcrumb-shape2 position-absolute bottom-0 start-0">
                        <img src="assets/images/shapes/bs-left.png" alt>
                    </div>
                    <div class="breadcrumb-content text-center">
                        <h2 class="page-title">Shop Details</h2>
                        <ul class="page-switcher d-flex ">
                            <li><a href="index.html">Home</a> <i class="flaticon-arrow-pointing-to-right"></i></li>
                            <li>Shop Details</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="product-details-area mt-100 ml-110">
        <div class="container">
            <div class="product-details-wrapper">
                <div class="row">
                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-8">
                        <div class="product-switcher-wrap">
                            <div class="nav product-tab" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <div class="product-variation active" id="v-pills-home-tab" data-bs-toggle="pill"
                                     data-bs-target="#v-pills-home" role="tab" aria-controls="v-pills-home">
                                    <div class="pd-showcase-img">
                                        <img src="{{$product->img_thumbnail}}" alt>
                                    </div>
                                </div>
                                <div class="product-variation" id="v-pills-profile-tab" data-bs-toggle="pill"
                                     data-bs-target="#v-pills-profile" role="tab" aria-controls="v-pills-profile">
                                    <div class="pd-showcase-img">
                                        <img src="{{$product->img_thumbnail}}" alt>
                                    </div>
                                </div>
                                <div class="product-variation" id="v-pills-messages-tab" data-bs-toggle="pill"
                                     data-bs-target="#v-pills-messages" role="tab" aria-controls="v-pills-messages">
                                    <div class="pd-showcase-img">
                                        <img src="{{$product->img_thumbnail}}" alt>
                                    </div>
                                </div>

                            </div>
                            <div class="tab-content" id="v-pills-tabContent">
                                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                                     aria-labelledby="v-pills-home-tab">
                                    <div class="pd-preview-img">
                                        <img src="{{$product->img_thumbnail}}" alt>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-6 col-xl-6 col-lg-6">
                        <div class="product-details-wrap">
                            <div class="pd-top">
                                <ul class="product-rating d-flex align-items-center">
                                    <li><i class="bi bi-star-fill"></i></li>
                                    <li><i class="bi bi-star-fill"></i></li>
                                    <li><i class="bi bi-star-fill"></i></li>
                                    <li><i class="bi bi-star-fill"></i></li>
                                    <li><i class="bi bi-star"></i></li>
                                    <li class="count-review">(<span>23</span> Review)</li>
                                </ul>
                                <h3 class="pd-title">{{$product->name}}</h3>
                                <h5 class="pd-price">{{$product->price_sale}}</h5>

                                    <p class="pd-small-info">
                                        {{$product->description}}
                                </p>
                            </div>
                            <div class="pd-quick-discription">
                                <ul>
                                        <form action="{{route('cart.add')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{$product->id}}">

                                            <li class="d-flex align-items-center">
                                                    <span>Color :</span>
                                            @foreach($colors as $id=>$name)
                                                <div class="color-option d-flex align-items-center">
                                                    <input type="radio" name="product_color_id" id="radio_color_{{$id}}"
                                                           value="{{$id}}" checked>
                                                    <label for="radio_color_{{$id}}"><span class="c1 p-color">{{$name}}</span></label>
                                                </div>
                                            @endforeach
                                            </li>


                                            <li class="d-flex align-items-center">
                                                <span>Size :</span>
                                            @foreach($sizes as $id=>$name)
                                                    <div class="size-option d-flex align-items-center">
                                                        <input type="radio" name="product_size_id" id="radio_size_{{$id}}" value="{{$id}}"
                                                               checked>
                                                        <label for="radio_size_{{$id}}">
                                                            <span class="p-size">{{$name}}</span>
                                                        </label>

                                                    </div>

                                            @endforeach
                                            </li>

                                            <li class="d-flex align-items-center pd-cart-btns">
                                                <div class="quantity">
                                                    <label for="quantity"></label>
                                                    <input id="quantity" name="quantity" type="number" min="1" max="90" step="10" value="1">
                                                </div>
                                                <button type="submit" class="pd-add-cart">Add
                                                        to cart</button>
                                            </li>
                                        </form>


                                    <li class="pd-type">Product Type: <span>Woman Winter Dress</span></li>
                                    <li class="pd-type">Catagories: <span> {{$product->catelogue->name }}</span></li>
                                    <li class="pd-type">Material : <span>{{$product->material}}</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-discription-wrapper mt-100">
                <div class="row">
                    <div class="col-xxl-3 col-xl-3">
                        <div class="nav flex-column nav-pills discription-bar" id="v-pills-tab2" role="tablist"
                             aria-orientation="vertical">
                            <button class="nav-link active" id="pd-discription3" data-bs-toggle="pill"
                                    data-bs-target="#pd-discription-pill3" role="tab"
                                    aria-controls="pd-discription-pill3"> Discription
                            </button>
                            <button class="nav-link" id="pd-discription2" data-bs-toggle="pill"
                                    data-bs-target="#pd-discription-pill2" role="tab"
                                    aria-controls="pd-discription-pill2">Additional
                                Information
                            </button>
                            <button class="nav-link" id="pd-discription1" data-bs-toggle="pill"
                                    data-bs-target="#pd-discription-pill1" role="tab"
                                    aria-controls="pd-discription-pill1">Our Review (2)
                            </button>
                        </div>
                    </div>
                    <div class="col-xxl-9 col-xl-9">
                        <div class="tab-content discribtion-tab-content" id="v-pills-tabContent2">
                            <div class="tab-pane fade show active" id="pd-discription-pill3" role="tabpanel"
                                 aria-labelledby="pd-discription3">
                                <div class="discription-texts">
                                    <p>
                                        Dễ dàng phối với những trang phục và phù hợp với mọi cuộc picnic, đi biển hay hòa mình vào những lễ hội âm nhạc sôi động đậm chất mùa hè. Bấy nhiêu đây, áo khoác bohemian đã đủ chinh phục bạn chưa?
                                    </p>
                                    {{$product->content}}

                                </div>
                            </div>
                            <div class="tab-pane fade" id="pd-discription-pill2" role="tabpanel"
                                 aria-labelledby="pd-discription2">
                                <div class="additional-discription">
                                    <ul>
                                        <li>
                                            <h5 class="additition-name">Color</h5>
                                            <div class="additition-variant"><span>:</span>Red, Green, Blue, Yellow,
                                                pink,
                                            </div>
                                        </li>
                                        <li>
                                            <h5 class="additition-name">Size</h5>
                                            <div class="additition-variant"><span>:</span>S, M, L, Xl, XXL</div>
                                        </li>
                                        <li>
                                            <h5 class="additition-name">Material</h5>
                                            <div class="additition-variant"><span>:</span>100% Cotton, Jens</div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="tab-pane fade " id="pd-discription-pill1" role="tabpanel"
                                 aria-labelledby="pd-discription1">
                                <div class="discription-review">
                                    <div class="clients-review-cards">
                                        <div class="row">
                                            @foreach($comments as $comment)
                                                <div class="col-lg-6">
                                                    <div class="client-review-card">
                                                        <div class="review-card-head">
                                                            <div class="client-img">
                                                                <img  style="height: 48px; width: 48px;border-radius: 100px" src="https://www.vietnamworks.com/hrinsider/wp-content/uploads/2023/12/anh-dep-thien-nhien-3d-003.jpg" alt>
                                                            </div>
                                                            <div class="client-info">
                                                                <h5 class="client-name"> {{$comment->user->name}} <span
                                                                        @php
                                            $date = explode(' ', $comment->created_at) @endphp
                                                                        class="review-date">{{$date[0]}}</span></h5>
                                                                <ul class="review-rating d-flex">
                                                                    <li><i class="bi bi-star-fill"></i></li>
                                                                    <li><i class="bi bi-star-fill"></i></li>
                                                                    <li><i class="bi bi-star-fill"></i></li>
                                                                    <li><i class="bi bi-star-fill"></i></li>
                                                                    <li><i class="bi bi-star"></i></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <p class="review-text">
                                                            {{$comment->noidung}}
                                                        </p>
                                                        <ul class="review-actions d-flex align-items-center">
                                                            <li><a href="#"><i class="flaticon-like"></i></a></li>
                                                            <li><a href="#"><i class="flaticon-heart"></i></a></li>
                                                            <li><a href="#">Reply</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="review-form-wrap">
                                        <h5>Bình luận</h5>
                                        <h3>Leave A Comment</h3>
                                        <p>Your email address will not be published. Required fields are marked *</p>
                                        <form action="{{route('comment.store', $product->id)}}" method="POST" class="review-form">
                                            @csrf
                                            <div class="row">

                                                <div class="col-lg-12">
                                                    <div class="review-input-group">
                                                        <textarea name="content" id="review-area" cols="30" rows="7"
                                                                  placeholder="Your message"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="review-rating">
                                                        <p>Your Rating</p>
                                                        <ul class="d-flex">
                                                            <li><i class="bi bi-star-fill"></i></li>
                                                            <li><i class="bi bi-star-fill"></i></li>
                                                            <li><i class="bi bi-star-fill"></i></li>
                                                            <li><i class="bi bi-star-fill"></i></li>
                                                            <li><i class="bi bi-star-fill"></i></li>
                                                        </ul>
                                                    </div>
                                                    <div class="submit-btn">
                                                        <input type="submit" value="Post Comment">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
