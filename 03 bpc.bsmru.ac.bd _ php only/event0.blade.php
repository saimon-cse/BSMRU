@extends('welcome')
@section('main')
  <main id="main">
    <div style="height: 100px; background:#3498db"></div>
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>EVENT DETAILS</h2>
          {{-- <ol>
            <li><a href="index.html">Home</a></li>
            <li>Portfolio Details</li>
          </ol> --}}
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-7">
            <div class="portfolio-details-slider swiper">
              <div class="swiper-wrapper align-items-center">

                <div class="swiper-slide">
                  <img src="assets/img/events/ev1.jpg" alt="">
                </div>

                <div class="swiper-slide">
                    <img src="assets/img/events/ev1.jpg" alt="">
                </div>

                <div class="swiper-slide">
                    <img src="assets/img/events/ev1.jpg" alt="">
                </div>

              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>

          <div class="col-lg-5">
            <div class="portfolio-description">
              <h2>NCPC - National Collegiate Programming Contest 2023
            </h2>
              <h6 style="margin-top: -15px"><i>07 March 2024</i></h6>
              <br><br>
              <p class="" style=" text-align: justify;text-justify: inter-word;">
                Team BSMRU_NewHorizon proudly represented Bangabandhu Sheikh Mujibur Rahman University, Kishoreganj, at the prestigious NCPC 2024, hosted by Jahangirnagar University. Comprising Md. Sarafat Hossain (CSE-01), Shahria Mahmud Aupo (CSE-01), and Meherab Hossen (CSE-01), our team embarked on this exhilarating journey for the very first time.

Participating in NCPC was not merely a competition for us; it was an opportunity to showcase our talent, passion, and dedication in the realm of programming. As newcomers to the contest, we approached each challenge with determination and a hunger to learn and excel.

Throughout the competition, our team demonstrated resilience, problem-solving skills, and effective teamwork. We tackled complex algorithmic problems, brainstormed innovative solutions, and persevered through the rigorous competition environment.

NCPC provided us with a platform to interact with fellow programmers, exchange ideas, and broaden our knowledge in various domains of computer science. The experience was invaluable, offering insights into real-world problem-solving scenarios and enhancing our capabilities as aspiring computer scientists.

Although the journey was demanding, the support and encouragement from our university, mentors, and peers fueled our determination to give our best. Regardless of the outcome, participating in NCPC has been a defining experience for us.

As we reflect on our journey at NCPC 2024, we extend our gratitude to Bangabandhu Sheikh Mujibur Rahman University, our teammates, and everyone who supported us along the way. We are proud to have represented our university and look forward to future opportunities to contribute to the vibrant programming community.

              </p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Portfolio Details Section -->

  </main><!-- End #main -->
  <br><br><br><br><br><br><br>

 @endsection
