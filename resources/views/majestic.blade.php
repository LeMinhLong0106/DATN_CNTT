@extends('layouts.main')

@section('main')

    <section class="home" id="home">

        <div class="content">
            <span>welcome foodies</span>
            <h3>different spices for the different tastes 😋</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis unde dolores temporibus hic quam debitis
                tenetur harum nemo.</p>
            <a href="#" class="btn">order now</a>
        </div>

        <div class="image">
            <img src="images/home-img.png" alt="" class="home-img">
            <img src="images/home-parallax-img.png" alt="" class="home-parallax-img">
        </div>

    </section>

    <!-- home section ends  -->

    <!-- search-form  -->

    <section class="search-form-container">

        <form action="">
            <input type="search" name="" placeholder="search here..." id="search-box">
            <label for="search-box" class="fas fa-search"></label>
        </form>

    </section>

    <!-- shopping-cart section  -->

    <section class="shopping-cart-container">

        <div class="products-container">

            <h3 class="title">your products</h3>

            <div class="box-container">

                <div class="box">
                    <i class="fas fa-times"></i>
                    <img src="images/menu-1.png" alt="">
                    <div class="content">
                        <h3>delicious food</h3>
                        <span> quantity : </span>
                        <input type="number" name="" value="1" id="">
                        <br>
                        <span> note : </span>
                        <span class="price"> abc </span>
                        <br>
                        <span> price : </span>
                        <span class="price"> $40.00 </span>
                    </div>
                </div>

                <div class="box">
                    <i class="fas fa-times"></i>
                    <img src="images/menu-2.png" alt="">
                    <div class="content">
                        <h3>delicious food</h3>
                        <span> quantity : </span>
                        <input type="number" name="" value="1" id="">
                        <br>
                         <span> note : </span>
                        <span class="price"> abc </span>
                        <br>
                        <span> price : </span>
                        <span class="price"> $40.00 </span>
                    </div>
                </div>

                <div class="box">
                    <i class="fas fa-times"></i>
                    <img src="images/menu-3.png" alt="">
                    <div class="content">
                        <h3>delicious food</h3>
                        <span> quantity : </span>
                        <input type="number" name="" value="1" id="">
                        <br>
                         <span> note : </span>
                        <span class="price"> abc </span>
                        <br>
                        <span> price : </span>
                        <span class="price"> $40.00 </span>
                    </div>
                </div>

                <div class="box">
                    <i class="fas fa-times"></i>
                    <img src="images/menu-4.png" alt="">
                    <div class="content">
                        <h3>delicious food</h3>
                        <span> quantity : </span>
                        <input type="number" name="" value="1" id="">
                        <br>
                         <span> note : </span>
                        <span class="price"> abc </span>
                        <br>
                        <span> price : </span>
                        <span class="price"> $40.00 </span>
                    </div>
                </div>

                <div class="box">
                    <i class="fas fa-times"></i>
                    <img src="images/menu-5.png" alt="">
                    <div class="content">
                        <h3>delicious food</h3>
                        <span> quantity : </span>
                        <input type="number" name="" value="1" id="">
                        <br>
                         <span> note : </span>
                        <span class="price"> abc </span>
                        <br>
                        <span> price : </span>
                        <span class="price"> $40.00 </span>
                    </div>
                </div>

            </div>

        </div>

        <div class="cart-total">

            <h3 class="title"> cart total </h3>

            <div class="box">

                <h3 class="subtotal"> subtotal : <span>$200</span> </h3>
                <h3 class="total"> total : <span>$200</span> </h3>

                <a href="#" class="btn">proceed to checkout</a>

            </div>

        </div>

    </section>

    <!-- login-form  -->

    <div class="login-form-container">

        <form action="">
            <h3>login form</h3>
            <input type="email" name="" placeholder="enter your email" id="" class="box">
            <input type="password" name="" placeholder="enter your password" id="" class="box">
            <div class="remember">
                <input type="checkbox" name="" id="remember-me">
                <label for="remember-me">remember me</label>
            </div>
            <input type="submit" value="login now" class="btn">
            <p>forget password? <a href="#">click here</a></p>
            <p>don't have an account? <a href="#">create one</a></p>
        </form>

    </div>

    <!-- about section starts  -->

    <section class="about" id="about">

        <div class="image">
            <img src="images/about-img.png" alt="">
        </div>

        <div class="content">
            <span>why choose us?</span>
            <h3 class="title">what's make our food delicious!</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos ut explicabo, numquam iusto est a ipsum
                assumenda tempore esse corporis?</p>
            <a href="#" class="btn">read more</a>
            <div class="icons-container">
                <div class="icons">
                    <img src="images/serv-1.png" alt="">
                    <h3>fast delivery</h3>
                </div>
                <div class="icons">
                    <img src="images/serv-2.png" alt="">
                    <h3>fresh food</h3>
                </div>
                <div class="icons">
                    <img src="images/serv-3.png" alt="">
                    <h3>best quality</h3>
                </div>
                <div class="icons">
                    <img src="images/serv-4.png" alt="">
                    <h3>24/7 support</h3>
                </div>
            </div>
        </div>

    </section>

    <!-- about section ends -->

    <!-- food section starts  -->

    <section class="food" id="food">

        <div class="heading">
            <span>Popular dishes</span>
            <h3>our delicious food</h3>
        </div>

        <div class="swiper food-slider">

            <div class="swiper-wrapper">

                <div class="swiper-slide slide" >
                    <img src="images/food-img-1.png" alt="">
                    <h3>delicious food</h3>
                    <div class="price">$49.99</div>
                </div>

                <div class="swiper-slide slide" >
                    <img src="images/food-img-2.png" alt="">
                    <h3>delicious food</h3>
                    <div class="price">$49.99</div>
                </div>

                <div class="swiper-slide slide" >
                    <img src="images/food-img-3.png" alt="">
                    <h3>delicious food</h3>
                    <div class="price">$49.99</div>
                </div>

                <div class="swiper-slide slide" >
                    <img src="images/food-img-4.png" alt="">
                    <h3>delicious food</h3>
                    <div class="price">$49.99</div>
                </div>

                <div class="swiper-slide slide" >
                    <img src="images/food-img-5.png" alt="">
                    <h3>delicious food</h3>
                    <div class="price">$49.99</div>
                </div>

            </div>

            <div class="swiper-pagination"></div>

        </div>

    </section>

    <!-- food section ends -->

    <!-- popular section starts  -->

    <section class="popular" id="popular">

        <div class="heading">
            <span>New food</span>
            <h3>our special dishes</h3>
        </div>

        <div class="box-container">

            <div class="box">
                <div class="image">
                    <img src="images/food-1.png" alt="">
                </div>
                <div class="content">
                    <h3>delicious food</h3>
                    <div class="price">$40.00 </div>
                    <a href="#" class="btn">add to cart</a>
                </div>
            </div>

            <div class="box">
                <div class="image">
                    <img src="images/food-2.png" alt="">
                </div>
                <div class="content">
                    <h3>delicious food</h3>
                    <div class="price">$40.00 </div>
                    <a href="#" class="btn">add to cart</a>
                </div>
            </div>

            <div class="box">
                <div class="image">
                    <img src="images/food-3.png" alt="">
                </div>
                <div class="content">
                    <h3>delicious food</h3>
                    <div class="price">$40.00 </div>
                    <a href="#" class="btn">add to cart</a>
                </div>
            </div>

            <div class="box">
                <div class="image">
                    <img src="images/food-4.png" alt="">
                </div>
                <div class="content">
                    <h3>delicious food</h3>
                    <div class="price">$40.00 </div>
                    <a href="#" class="btn">add to cart</a>
                </div>
            </div>

            <div class="box">
                <div class="image">
                    <img src="images/food-5.png" alt="">
                </div>
                <div class="content">
                    <h3>delicious food</h3>
                    <div class="price">$40.00 </div>
                    <a href="#" class="btn">add to cart</a>
                </div>
            </div>

            <div class="box">
                <div class="image">
                    <img src="images/food-6.png" alt="">
                </div>
                <div class="content">
                    <h3>delicious food</h3>
                    <div class="price">$40.00 </div>
                    <a href="#" class="btn">add to cart</a>
                </div>
            </div>

            <div class="box">
                <div class="image">
                    <img src="images/food-7.png" alt="">
                </div>
                <div class="content">
                    <h3>delicious food</h3>
                    <div class="price">$40.00 </div>
                    <a href="#" class="btn">add to cart</a>
                </div>
            </div>

            <div class="box">
                <div class="image">
                    <img src="images/food-8.png" alt="">
                </div>
                <div class="content">
                    <h3>delicious food</h3>
                    <div class="price">$40.00 </div>
                    <a href="#" class="btn">add to cart</a>
                </div>
            </div>
    </section>

    <!-- popular section ends -->

    </div>
@endsection
