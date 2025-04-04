<?php
$countries = [
    "Canada" => [
        "image" => "assets/images/Canada.svg",
        "services" => ["Canada PR Visa", "Canada Visit Visa", "Canada Study Visa"]
    ],
    "Australia" => [
        "image" => "assets/images/australia.svg",
        "services" => ["Australia PR Visa", "Australia Visit Visa", "Australia Study Visa"]
    ],
    "Germany" => [
        "image" => "assets/images/germany.svg",
        "services" => ["Germany PR Visa", "Germany Visit Visa", "Germany Study Visa"]
    ],
    "Poland" => [
        "image" => "assets/images/poland.svg",
        "services" => ["Poland PR Visa", "Poland Visit Visa", "Poland Study Visa"]
    ]
];
?>

<!-- Include Swiper.js CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css">

<section id="services">
  <div class="container">
    <div class="text-center">
      <h2 class="heading mb-5">Our <strong>Services</strong></h2>
    </div>

    <!-- Swiper Container -->
    <div class="swiper mySwiper">
      <div class="swiper-wrapper">
        <?php foreach ($countries as $country => $data): ?>
          <div class="swiper-slide">
            <div class="card-ser">
              <div class="card-inner">
                <div class="card-sec1">
                  <img src="<?php echo $data['image']; ?>" alt="<?php echo $country; ?>">
                  <h4><?php echo $country; ?></h4>
                </div>
                <div class="card-sec2">
                  <ul>
                    <?php foreach ($data['services'] as $service): ?>
                      <li><a href="#"><?php echo $service; ?></a></li>
                    <?php endforeach; ?>
                  </ul>
                </div>
              </div>
              <a href="#" class="arrow-btn">
                <img src="assets/images/navbar/arrow.svg" alt="" class="custom-svg-icon">
              </a>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

      <!-- Swiper Navigation -->
      <!-- <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div> -->

    </div>

  </div>
</section>
<style>
    .swiper-button-next:after,.swiper-button-prev:after {
    font-family: swiper-icons;
    font-size: 14px;
    text-transform: none!important;
    letter-spacing: 0;
    font-variant: initial;
    line-height: 1;
    color: var(--white);
    background: var(--black);
    padding: 11px 15px;
    border-radius: 50px;
}
</style>
<!-- Include Swiper.js -->
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

<script>
  var swiper = new Swiper(".mySwiper", {
    slidesPerView: 1, // Mobile
    spaceBetween: 10,
    loop: true, // Infinite scrolling
    autoplay: {
      delay: 3000, // Auto-slide every 3 seconds
      disableOnInteraction: false, // Keeps auto-slide working even after manual navigation
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    breakpoints: {
      768: {
        slidesPerView: 2, // Tablet
        spaceBetween: 15,
      },
      1024: {
        slidesPerView: 4, // Desktop
        spaceBetween: 20,
      },
    },
  });
</script>
