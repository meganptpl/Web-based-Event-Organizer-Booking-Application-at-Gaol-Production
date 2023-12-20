<x-web-layout title="Galeri">
   <main>
      <!-- blog-area-start -->
      <section class="blog-area pt-80">
         <div class="container">
            <div class="row">
               <div class="col-lg-12 text-center">
                  <div class="tpsection mb-80 mt-10">
                     <h4 class="tpsection__title">Galeri Gaol Production</h4>
                     <p>Deretan galeri dari jasa Gaol Production</p>
                  </div>
               </div>
            </div>
            <div class="row">
                @foreach ($galeri as $item)
                <div class="col-lg-4">
                    <div class="tpblog__item tpblog__item-2 mb-20">
                       <div class="tpblog__thumb fix">
                          <a href="blog-details.html"><img src="{{ asset('images/galeri/' . $item->gambar) }}" alt=""></a>
                       </div>
                       <div class="tpblog__wrapper">
                          <div class="tpblog__entry-wap">
                             <span class="post-data"><a href="#">{{ $item->tempat }}, {{ $item->tanggal }}</a></span>
                          </div>
                          <h4 class="tpblog__title"><a href="blog-details.html">{{ $item->judul }}</a></h4>
                          <p>{{ $item->deskripsi }}</p>
                       </div>
                    </div>
                 </div>
                @endforeach

               {{-- <div class="col-lg-4">
                  <div class="tpblog__item tpblog__item-2 mb-20">
                     <div class="tpblog__thumb fix">
                        <a href="blog-details.html"><img src="assets/img/blog/ultah.jpg" alt=""></a>
                     </div>
                     <div class="tpblog__wrapper">
                        <div class="tpblog__entry-wap">
                           <span class="post-data"><a href="#">SEP 15. 2022</a></span>
                        </div>
                        <h4 class="tpblog__title"><a href="blog-details.html">Dekorasi Ulang Tahun Sederhana</a></h4>
                        <p>Dekorasi acara ulang tahun ini bernuansa sederhana yang nyaman di pandang mata</p>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4">
                  <div class="tpblog__item tpblog__item-2 mb-20">
                     <div class="tpblog__thumb fix">
                        <a href="blog-details.html"><img src="assets/img/blog/konser.jpg" alt=""></a>
                     </div>
                     <div class="tpblog__wrapper">
                        <div class="tpblog__entry-wap">
                           <span class="post-data"><a href="#">SEP 15. 2022</a></span>
                        </div>
                        <h4 class="tpblog__title"><a href="blog-details.html">Dekorasi Festival Musik Di Tarutung</a></h4>
                        <p>Dekorasi untuk acara konser Judika di tarutung di design oleh Gaol Production</p>
                     </div>
                  </div>
               </div> --}}
            </div>
         </div>
      </section>
      <!-- blog-area-end -->
   </main>
</x-web-layout>
