@extends('front.layouts.main')
@section('title', 'About')
@section('css')

@stop
@section('content')
<!--about section start -->
<div class="about_section layout_padding">
    <div class="container d-flex">
        <h1 class="about_taital">About Us</h1>
        <!-- <p class="about_text">It is a long established fact that a reader will be distracted by the readable content of a page when</p> -->
        <!-- <div class="about_section_2">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about_image"><img src="{{ asset('assets/front/images/about-img.png')}}"></div>
                </div>
                <div class="col-lg-6">
                    <div class="about_taital_main">
                        <p class="lorem_text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words </p>
                        <div class="read_bt"><a href="{{route('front.contact')}}">Contact Us</a></div>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
    <div class="d-flex justify-content-center flex-column align-items-center mx-5">
        <img src="{{asset('custom-assets/front/images/about-us.jpeg')}}" alt="">
        <h1>।। श्री महावीराय नमः ।।</h1>
        <hr>
        <h3>
            णमो अरिहंताणं , णमो सिद्धाणं <br>
            णमो आयरियाणं, णमो उवज्झायाणं <br>
            णमो लोय सव्व साहुणं<br>
            एसो पंच णमोकारो, सव्व पाव प्पणासणॊ । <br>
            मंगलाणं च सव्वेसिं, पढ़मं हवइ मंगलम ।। <br>
        </h3>
        <hr>
        <p>From the Earth to Your Table
            <br><br>
            Started with humble beginnings in 1981 from a small town in the heart of Central India, Barnagar (Madhya Pradesh), Jain Agriventures was founded by Shree Rajkumar Bilala, a visionary who sowed the seeds of hope and passion into agriculture.
            With quality and trust as its guiding mantra, this seed sown by Shree Rajkumar Bilala has blossomed into a thriving enterprise, expanding its branches into agritrading ( domestic and international ) , warehousing, and agriprocessing industries . Jain Agriventures is an umbrella that proudly houses a family of businesses, including Jain Traders, M/s Manoj kumar Rajkumar Jain , Garvit Enterprises,
            Jain Warehouses, Jain Coldstorages, Jain Sortex Plants and Jain farms.
            <br><br>
            Jain Agriventures continues to stand tall, dedicated to delivering excellence "from the earth to your table."
            <br><br>
            Jain Traders is now recognized as one of the leading suppliers and traders in the industry, known for delivering quality produce both domestically and internationally. Sourcing from the fertile agricultural belts of India, such as Malwa and Nimar, the firm ensures only the finest produce reaches its customers.
            <br><br>
            M/s Manojkumar Rajkumar remains committed to serving the domestic market with the same focus on quality.
            Garvit Enterprises, the star member of the family, has set its sights on the global marketplace, aspiring to deliver the richness of India’s soil to tables around the world.
            <br><br>
            At Jain Sortex Plants, we have perfected the art of resource optimization by providing top-notch cleaning, sorting, and sizing solutions for organic grains. By ensuring size uniformity and quality preparation, we transform regular grains into premium-grade commodities that meet international standards.
            <br><br>
            Meanwhile, Jain Warehouses and Jain Coldstorages are dedicated to offering the best storage solutions for farmers, ensuring their goods are stored in optimal conditions, allowing them to secure the best possible prices in the market.
            <br><br>
            At Jain Agriventures, we are united by one mission: to bring the finest agricultural products from the earth to your table, while supporting the backbone of our nation's economy—our farmers.
        </p>
    </div>
</div>
@stop
