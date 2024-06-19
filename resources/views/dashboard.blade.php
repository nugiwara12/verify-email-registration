@extends('layouts.app1')

@section('contents')

<!DOCTYPE html>
<html lang="en">
<!--divinectorweb.com-->

<head>
    <!-- All CSS -->
    <link rel="stylesheet" href="{{ asset('admin_assets/css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/css/sb-admin-2.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>

    <h1 class="user-name" id="hoverElement">Hi, <span
            class="user-name"><strong>{{ auth()->user()->name }}</strong></span></h1>

    <div class="carousel slide" data-bs-ride="carousel" id="carouselExampleIndicators">
        <div class="carousel-indicators">
            <button aria-label="Slide 1" class="active" data-bs-slide-to="0" data-bs-target="#carouselExampleIndicators"
                type="button"></button>
            <button aria-label="Slide 2" data-bs-slide-to="1" data-bs-target="#carouselExampleIndicators" type="button">
            </button> <button aria-label="Slide 3" data-bs-slide-to="2" data-bs-target="#carouselExampleIndicators"
                type="button"></button>

        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img alt="..." class="d-block w-100"
                    src="{{ asset('admin_assets/img/books/exploring-literature.png') }}">
                <div class="carousel-caption">
                    <h5>The Enlightening Pages: Exploring the Depths of Literature</h5>
                    <p>
                        Literature provides wisdom, insight, and imagination, allowing readers to explore human psyche,
                        fostering empathy and understanding in a polarized world through vivid imagery and evocative
                        language.
                    </p>

                </div>
            </div>
            <div class="carousel-item">
                <img alt="..." class="d-block w-100"
                    src="{{ asset('admin_assets/img/books/transformative-books.png') }}">
                <div class="carousel-caption">
                    <h5>The Transformative Power of Books</h5>
                    <p>
                        Books serve as powerful tools for personal growth, illustrating human complexities through
                        stories of love, loss, triumph, and adversity, fostering change, enlightenment, and empowerment.
                    </p>

                </div>
            </div>
        </div>
        <button class="carousel-control-prev" data-bs-slide="prev" data-bs-target="#carouselExampleIndicators"
            type="button"><span aria-hidden="true" class="carousel-control-prev-icon"></span> <span
                class="visually-hidden">Previous</span></button> <button class="carousel-control-next"
            data-bs-slide="next" data-bs-target="#carouselExampleIndicators" type="button"><span aria-hidden="true"
                class="carousel-control-next-icon"></span> <span class="visually-hidden">Next</span></button>
        <br><br><br>



        <!-- All Js -->
        <script>
        document.getElementById('hoverElement').addEventListener('mouseover', function() {
            setTimeout(function() {
                document.getElementById('hoverElement').style.opacity = 0;
            }, 500); // 5000 milliseconds = 5 seconds
        });
        </script>


</body>

</html>

@endsection