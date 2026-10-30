@extends('theme.user.master')
@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
<style>
    .accordion {
        /* max-width: 530px; */
        width: 100%;
        background: #FFF;
        margin: 0 15px;
        padding: 15px;
        border-radius: 8px;
        box-shadow: 0 0 4px rgba(0, 0, 0, 0.2);
    }

    .accordion .accordion-content {
        margin: 10px 0;
        border-radius: 4px;
        background: #FFF7F0;
        border: 1px solid #FFD6B3;
        overflow: hidden;
    }

    .accordion-content:nth-child(2n) {
        background-color: #F0FAFF;
        border-color: #CCEEFF;
    }



    .accordion-content.open {
        padding-bottom: 10px;
    }

    .accordion-content header {
        display: flex;
        min-height: 50px;
        padding: 0 15px;
        cursor: pointer;
        align-items: center;
        justify-content: space-between;
        transition: all 0.2s linear;
    }

    .accordion-content.open header {
        min-height: 35px;
    }
    .accordion-content.open .description{
        display: block;
    }

    .accordion-content header .title {
        font-size: 14px;
        font-weight: 500;
        color: #333;
    }

    .accordion-content header i {
        font-size: 15px;
        color: #333;
    }

    .accordion-content .description {
        display: none;
        height: 0;
        font-size: 12px;
        color: #333;
        font-weight: 400;
        padding: 0 15px;
        transition: all 0.2s linear;
    }
</style>
@endpush

@section('content')

<div class="hero page-inner overlay" style="background-image: url({{url('theme_property/images/hero_bg_3.jpg')}})">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-9 text-center mt-5">
                <h1 class="heading" data-aos="fade-up">FAQ</h1>

                <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="200">
                    <ol class="breadcrumb text-center justify-content-center">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active text-white-50" aria-current="page">
                            FAQ
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="section">
    <div class="container">



        <div class="accordion">

            @foreach ($faqs as $faq)

            <div class="accordion-content">
                <header>
                    <span class="title">{{$faq->question}}</span>
                    <i class="fa-solid fa-plus"></i>
                </header>

                <p class="description">
                    {{$faq->answer}}
                </p>
            </div>
            @endforeach
          
        </div>


    </div>
</div>

@endsection

@push('js')
<script>
    const accordionContent = document.querySelectorAll(".accordion-content");

    accordionContent.forEach((item, index) => {
        let header = item.querySelector("header");
        header.addEventListener("click", () => {
            item.classList.toggle("open");

            let description = item.querySelector(".description");
            if (item.classList.contains("open")) {
                description.style.height =
                `${description.scrollHeight}px`; //scrollHeight property returns the height of an element including padding , but excluding borders, scrollbar or margin
                item.querySelector("i").classList.replace("fa-plus", "fa-minus");
            } else {
                description.style.height = "0px";
                item.querySelector("i").classList.replace("fa-minus", "fa-plus");
            }
            removeOpen(
            index); //calling the funtion and also passing the index number of the clicked header
        })
    })

    function removeOpen(index1) {
        accordionContent.forEach((item2, index2) => {
            if (index1 != index2) {
                item2.classList.remove("open");

                let des = item2.querySelector(".description");
                des.style.height = "0px";
                item2.querySelector("i").classList.replace("fa-minus", "fa-plus");
            }
        })
    }
</script>

@endpush