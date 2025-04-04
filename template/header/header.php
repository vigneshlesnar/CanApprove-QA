<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($pageTitle); ?></title>
    <meta name="description" content="<?php echo htmlspecialchars($metaDescription); ?>">
    <meta name="keywords" content="<?php echo htmlspecialchars($metaKeywords); ?>">
    
    <link rel="canonical" href="<?php echo htmlspecialchars($canonicalURL); ?>">
    
    <!-- Open Graph & Twitter Meta Tags -->
    <meta property="og:title" content="<?php echo htmlspecialchars($pageTitle); ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars($metaDescription); ?>">
    <meta property="og:url" content="<?php echo htmlspecialchars($canonicalURL); ?>">
    <meta property="og:image" content="https://example.com//canapprove-qa/assets/images/seo-image.jpg">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo htmlspecialchars($pageTitle); ?>">
    <meta name="twitter:description" content="<?php echo htmlspecialchars($metaDescription); ?>">
    
    <link rel="stylesheet" href="http://localhost/canapprove-qa/src/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
    
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
      jQuery(document).ready(function() {
        // Read More Button
        jQuery('.read-more').on('click', function(event) {
          event.preventDefault();
          var quoteText = jQuery(this).data('quote');
          jQuery('#quoteModal .modal-body').html(quoteText);
          jQuery('#quoteModal').modal('show');
        });

        // Convert <img> SVGs to inline SVGs
        $('img.custom-svg-icon').each(function () {
            var $img = $(this);
            var imgURL = $img.attr('src');

            if (!imgURL) {
                console.error("Image source is empty.");
                return;
            }

            $.ajax({
                url: imgURL,
                dataType: 'xml',
                success: function (data) {
                    var $svg = $(data).find('svg');

                    if (!$svg.length) {
                        console.error("Invalid SVG file: " + imgURL);
                        return;
                    }

                    // Copy all attributes
                    $.each($img.prop("attributes"), function () {
                        $svg.attr(this.name, this.value);
                    });

                    // Remove conflicting attributes
                    $svg.removeAttr('xmlns:a');
                    if (!$svg.attr('width')) $svg.attr('width', '100');
                    if (!$svg.attr('height')) $svg.attr('height', '100');

                    $img.replaceWith($svg);
                },
                error: function () {
                    console.error("Failed to load SVG: " + imgURL);
                }
            });
        });
      });
    </script>
    <script>
document.addEventListener("DOMContentLoaded", function () {
    let path = window.location.pathname;
    
    // Adjust based on your site root
    let isHomePage = path === "/canapprove-qa/" || path === "/canapprove-qa/index.php" || path === "/canapprove-qa/index.html";

    console.log("Current Path:", path, "Is Home Page:", isHomePage); // Debugging output

    if (isHomePage) {
        document.body.classList.add("home-body");
    } else {
        document.body.classList.add("inner-body");
    }
});
</script>

</head>
<body >
<div class="header-vr" >
<!-- Top Header -->
<div class="top-header">
    <div class="container d-flex justify-content-between align-items-center">
        <div class="left-side">
            <span class="call-text">
                <img src="/canapprove-qa/assets/images/navbar/call.svg" alt="Call Icon"/>
                <a href="tel:+97430896436">+974 3089 6436</a>
            </span>
            <span class="mail-text">
                <img src="/canapprove-qa/assets/images/navbar/mail.svg" alt="Mail Icon"/>
                <a href="mailto:enquiry@canapprove.qa">enquiry@canapprove.qa</a>
            </span>
        </div>
        <div class="right-side">
            <a href="#"><img src="/canapprove-qa/assets/images/navbar/instagram.svg" alt="Instagram" class="custom-svg-icon"></a>
            <a href="#"><img src="/canapprove-qa/assets/images/navbar/x-icon.svg" alt="Twitter" class="custom-svg-icon"></a>
            <a href="#"><img src="/canapprove-qa/assets/images/navbar/facebook.svg" alt="Facebook" class="custom-svg-icon"></a>
        </div>
    </div>
</div>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="/canapprove-qa">
            <img src="/canapprove-qa/assets/images/navbar/main-logo.webp" alt="Company Logo" width="150">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item"><a class="nav-link" href="/home.php">Home</a></li>
                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="migrateDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Migrate
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="migrateDropdown">
                        <li><a class="dropdown-item" href="/migrate/canada.php">Canada</a></li>
                        <li><a class="dropdown-item" href="/migrate/australia.php">Australia</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown position-relative">
  <a class="nav-link pe-4" href="/canapprove-qa/education.php">Study</a>
  <!-- <a class="dropdown-toggle dropdown-toggle-split nav-link position-absolute end-0 top-0" href="#" id="studyDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="padding-right: 1rem;"></a> -->

  <ul class="dropdown-menu" aria-labelledby="studyDropdown">
    <li><a class="dropdown-item" href="/canapprove-qa/education/canada.php">Canada</a></li>
    <li><a class="dropdown-item" href="/canapprove-qa/education/australia.php">Australia</a></li>
    <li><a class="dropdown-item" href="/canapprove-qa/education/germany.php">Germany</a></li>
    <li><a class="dropdown-item" href="/canapprove-qa/education/poland.php">Poland</a></li>
  </ul>
</li>

                <li class="nav-item"><a class="nav-link" href="/visit.php">Visit</a></li>
                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="workDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Work
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="workDropdown">
                        <li><a class="dropdown-item" href="/work/visa.php">Work Visa</a></li>
                        <li><a class="dropdown-item" href="/work/permits.php">Work Permits</a></li>
                    </ul>
                </li>
                
                <li class="nav-item"><a class="nav-link" href="/resources.php">Resources</a></li>
                <li class="nav-item"><a class="nav-link" href="/canapprove-qa/contact-us?form=education">Contact Us</a></li>
                <li class="nav-item"><a class="nav-link" href="/about.php">About Us</a></li>
            </ul>
        </div>
        <a href="#" class="button-primary">Get a Consultation <img src="/canapprove-qa/assets/images/navbar/arrow.svg" alt="Arrow Icon" class="custom-svg-icon"></a>
    </div>
</nav>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
$(document).ready(function () {
    // Enable dropdown on hover
    $('.navbar-nav .dropdown').hover(
        function () {
            $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(200);
        },
        function () {
            $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(200);
        }
    );

    // Close mobile menu on item click
    $('.navbar-nav a.nav-link').on('click', function () {
        $('.navbar-collapse').collapse('hide');
    });
});
/////////////
let lastScrollTop = 0;
const header = document.querySelector(".header-vr");

window.addEventListener("scroll", () => {
    let scrollTop = window.scrollY || document.documentElement.scrollTop;
    
    if (scrollTop > 50) {
        header.classList.add("scrolled"); // Add white background when scrolling
    } else {
        header.classList.remove("scrolled"); // Keep it transparent at top
    }

    if (scrollTop > lastScrollTop) {
        // Scrolling down, hide header
        header.classList.add("hidden");
    } else {
        // Scrolling up, show header
        header.classList.remove("hidden");
    }
    
    lastScrollTop = scrollTop;
});


</script>

