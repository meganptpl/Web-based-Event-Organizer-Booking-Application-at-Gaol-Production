<x-web-layout title="Testimoni">
   <main>

      <!-- testimonial-area-start -->
      <section class="testimonial-area tptestimonial__bg pt-80 p-relative" data-background="assets/img/testimonial/testimonial-bg-1.jpg">
         <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                   <div class="tpsection mb-35">
                      <h4 class="tpsection__sub-title">~ Happy Customer ~</h4>
                      <h4 class="tpsection__title">Apa Kata Client?</h4>
                      <p>Berikut adalah testimoni dari client Gaol Production</p>
                   </div>
                </div>
             </div>
            <div class="testimonial__shape p-relative d-none d-md-block">
               <img src="assets/img/shape/tree-leaf-4.svg" alt="" class="testimonial__shape-one">
               <img src="assets/img/shape/tree-leaf-5.svg" alt="" class="testimonial__shape-two">
               <img src="assets/img/shape/tree-leaf-6.png" alt="" class="testimonial__shape-three">
            </div>
            <div class="swiper-container tptestimonial-active2 p-relative">
               <div class="swiper-wrapper">
                <?php
                    $testimoni=\App\Models\Testimoni::join('users', 'testimoni.user_id', '=', 'users.id')->get();
                ?>
                @foreach ($testimoni as $item)
                <div class="swiper-slide">
                    <div class="row justify-content-center p-relative">
                       <div class="col-md-12">
                          <div class="tptestimonial__item text-center ">
                             <div class="tptestimonial__avata mb-25">
                                <img src="assets/img/testimonial/test-avata-1.png" alt="">
                             </div>
                             <div class="tptestimonial__content tptestimonial__content2">
                                <p>{{ $item->deskripsi }}</p>
                                <h4 class="tptestimonial__title">{{ $item->name }}</h4>
                             </div>
                          </div>
                       </div>
                    </div>
                 </div>
                @endforeach

               </div>
            </div>
         </div>
         <div class="tptestimonial-arrow d-none d-md-block">
            <button class="testi-arrow tptestimonial__prv">
               <i class="icon-chevron-left"></i>
            </button>
            <button class="testi-arrow tptestimonial__nxt">
               <i class="icon-chevron-right"></i>
            </button>
         </div>
      </section>
      <!-- testimonial-area-end -->
      <div class="tpdescription__box">
         <div class="tpdescription__box-center d-flex align-items-center justify-content-center">
            <nav>
               <div class="nav nav-tabs"  role="tablist">

                 <button class="nav-link" id="nav-review-tab" data-bs-toggle="tab" data-bs-target="#nav-review" type="button" role="tab" aria-controls="nav-review" aria-selected="false">Reviews</button>
               </div>
             </nav>
         </div>
         <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade" id="nav-review" role="tabpanel" aria-labelledby="nav-review-tab" tabindex="0">
               <div class="tpreview__wrapper">
                  <div class="tpreview__form">
                     <h4 class="tpreview__form-title mb-25">Add a review </h4>
                     <form action="{{ route('review.store') }}" method="POST"
                     enctype="multipart/form-data">
                     @csrf
                        <div class="row">
                           <div class="col-lg-12">
                              <div class="tpreview__input mb-30">
                                 <textarea name="deskripsi" placeholder="Message"></textarea>
                                 <div class="tpreview__submit mt-30">
                                    <button class="tp-btn">Submit</button>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </main>
</x-web-layout>
