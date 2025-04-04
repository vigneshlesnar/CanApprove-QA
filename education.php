<?php
session_start();

// Get the requested page from the URL
$page = isset($_GET['page']) ? $_GET['page'] : null;

// Set default metadata
$pageTitle = "Migrate | My Website";
$metaDescription = "Learn about our expert migration services.";
$metaKeywords = "migrate, move abroad, immigration";
$canonicalURL = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$pageHeading = "Education";

// Default banner image
$banner_image = "/canapprove-qa/assets/images/default-banner.png";

// Check if the requested page exists
if ($page) {
    $file = "pages/education/$page.php";
    if (file_exists($file)) {
        // Capture the content of the included file
        ob_start();
        include $file;
        ob_end_clean(); // Discard output (only capture variables)
    }
}

// If the included file sets a banner image, update it
$final_banner = isset($banner_image) ? $banner_image : "/canapprove-qa/assets/images/default-banner.png";

// Include header
include 'template/header/header.php'; 
?>

<body>
<div class="container mt-4">
    <!-- Banner Section -->
    <div class="inner-banner">
        <div class="row">
            <div class="col-md-8">
            <h1 class="text-center mt-4 mb-5 heading"><?= html_entity_decode($pageHeading ?? "Default Page Heading") ?></h1>
                <img src="<?= htmlspecialchars($final_banner) ?>" alt="Banner Image" class="img-fluid inner-banner-img">
            </div>
            <div class="col-md-4">
                <?php include 'forms/education_form.php'; ?>
            </div>
        </div>
    </div>
    <!-- End Banner Section -->

    <!-- Page Content Section -->
    <div class="d-flex mt-5 mb-5">
        <div class="inner-content pe-5">
   <!-- ///// Bread crumbs Start /////// -->

        <?php
function get_breadcrumb() {
    $path = $_SERVER['REQUEST_URI'];
    $parts = explode("/", trim($path, "/"));
    $breadcrumb = '<nav aria-label="breadcrumb"><ul class="breadcrumb">';

    $url = "/";
    foreach ($parts as $index => $part) {
        $url .= $part . "/";
        $name = ucfirst(str_replace("-", " ", $part)); // Format nicely
        if ($index == count($parts) - 1) {
            $breadcrumb .= '<li class="breadcrumb-item active" aria-current="page">' . $name . '</li>';
        } else {
            $breadcrumb .= '<li class="breadcrumb-item"><a href="' . $url . '">' . $name . '</a></li>';
        }
    }

    $breadcrumb .= '</ul></nav>';
    return $breadcrumb;
}

// Usage
echo get_breadcrumb();
?>
<!-- ///// Bread crumbs end /////// -->
            <?php
            // Safely include the page content
            if ($page && file_exists("pages/education/$page.php")) {
                include "pages/education/$page.php";
            } else {
                // Default homepage content
                echo "<h2>Welcome to the Education Portal</h2>";
                echo "<p>Select a country from the sidebar to learn more about studying there.</p>";
            }
            ?>
        </div>
        <div class="inner-sidebar">
            <?php include 'template/sidebar.php'; ?>
        </div>
    </div>
</div>

<?php include 'template/footer/footer.php'; ?>

</body>
</html>
