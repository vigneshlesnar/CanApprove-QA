<?php
$pageTitle = "Migrate | My Website";
$metaDescription = "Learn about our expert migration services.";
$metaKeywords = "migrate, move abroad, immigration";
$canonicalURL = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
?>
<?php
include 'template/header/header.php';
?> 
<!-- Banner Section -->
 <section id="banner">
<div class="container">
    <div class="row align-items-center banner">
        <!-- <img src="assets/images/shape-top.svg" alt="" class="top-shape custom-svg-icon"> -->
        <div class="col-md-6">
            <h4>Sub-Head</h4>
            <h1>Welcome to Our <br>
                Website</h1>
            <p class="lead">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
            <div class="banner-btns">
            <a href="#" class="button-secondary">Study Abroad <img src="assets/images/navbar/arrow.svg" alt="" class="custom-svg-icon"></a>
            <a href="#" class="button-primary">Immigration <img src="assets/images/navbar/arrow.svg" alt="" class="custom-svg-icon"></a>
            </div>
        </div>
        <div class="col-md-6 text-center">
            <img src="assets/images/banner-img2.webp" alt="Banner Image" class="banner-img">
        </div>
        <!-- <img src="assets/images/bottom-shape.svg" alt="" class="bottom-shape custom-svg-icon"> -->
    </div>
</div>
</section>
<section>
    
</section>
<section id="about">
    <div class="container">
        <div class="row align-items-center">
            <!-- Left Side -->
            <div class="col-md-4 abo-left">
                <div class="mt-4">
                    <div class="row">
                        <div class="col-6">
                            <div class="shape1"></div>
                        </div>
                        <div class="col-6">
                            <div class="shape2"></div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-6">
                            <div class="shape3">
                                <p>25 years of<br>Experience</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="shape4"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Right Side -->
            <div class="offset-md-2 col-md-6">
                <h2 class="heading">Who <strong>We Are?</strong></h2>
                <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
                <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
                <div class="about-btn">
                <a href="#" class="button-primary">Learn More <img src="assets/images/navbar/arrow.svg" alt="" class="custom-svg-icon"></a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
include 'template/sectionService.php';
?>

<!-- //////////// Why Choose Us ////////// -->
<?php
include 'template/sectionWhyChoose.php';
?>
<section id="abroad">
    <div class="container text-center">
        <h2>Are you planning to move <strong>Abroad?</strong></h2>
        <p>
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tenetur nostrum molestias assumenda consectetur dignissimos repellendus asperiores veniam pariatur vel nisi incidunt cupiditate suscipit tempora, porro totam, et nihil. Fuga debitis, nesciunt dolorem officiis provident ullam, autem modi adipisci dignissimos facere ipsam voluptate facilis illo reprehenderit deserunt iste repellat quam ratione similique, quae eos? Voluptas eligend.
        </p>
        <div class="double-btn">
        <a href="#" class="button-secondary">Study Abroad <img src="assets/images/navbar/arrow.svg" alt="" class="custom-svg-icon"></a>
            <a href="#" class="button-primary">Immigration <img src="assets/images/navbar/arrow.svg" alt="" class="custom-svg-icon"></a>
            </div>
        </div>
</section>
<section id="blog">
    <div class="container">
    <h2 class="heading text-center mb-5">Latest <strong>Updates</strong></h2>
    <!-- //////////// Fetch data from wordpress blog ////////////// -->
     <div class="row">
     <div class="col-md-5">
    <?php
    // Fetch latest blog post
    $number_of_posts = 1;
    $blog_url = "http://localhost/canapprove-qa/blog/wp-json/wp/v2/posts?per_page=$number_of_posts&_embed";
    $response = file_get_contents($blog_url);
    $posts = json_decode($response);

    if (!empty($posts)) {
        foreach ($posts as $post) {
            $title = $post->title->rendered;
            $excerpt = strip_tags($post->excerpt->rendered, '<a>'); // Removes extra <p> tags but keeps links
            $content = strip_tags($post->content->rendered); // Remove all HTML tags from content
            $link = $post->link;

            // Get Featured Image
            $featured_image = isset($post->_embedded->{'wp:featuredmedia'}[0]->source_url) 
                ? $post->_embedded->{'wp:featuredmedia'}[0]->source_url 
                : 'assets/images/default-image.jpg';

            // Estimate Reading Time (200 words per minute)
            $word_count = str_word_count($content);
            $reading_time = ceil($word_count / 200);

            // Get Categories
            $category_names = [];
            foreach ($post->categories as $category_id) {
                $category_url = "http://localhost/canapprove-qa/blog/wp-json/wp/v2/categories/$category_id";
                $category_response = file_get_contents($category_url);
                $category_data = json_decode($category_response);
                if (!empty($category_data->name)) {
                    $category_names[] = $category_data->name;
                }
            }
            $category_list = implode(", ", $category_names);

            // Get Post Date
            $post_date = new DateTime($post->date);
            $formatted_date = $post_date->format('F j, Y'); // Example: "March 27, 2025"
            ?>

            <div style="margin-bottom: 10px;">
                <img class="home-blog" src="<?php echo htmlspecialchars($featured_image); ?>" alt="<?php echo htmlspecialchars($title); ?>" style="width:100%; max-width:600px;">
                <div class="cat-time">
                    <p class="category"><?php echo htmlspecialchars($category_list); ?></p>
                    <p class="estimate"><?php echo $reading_time; ?> min read</p>
                </div>
            </div>
            <h2>
                <a href="<?php echo htmlspecialchars($link); ?>" class="text-decoration-none text-dark">
                    <?php echo htmlspecialchars($title); ?>
                </a>
            </h2>
            <p class="experts-left"><?php echo $excerpt; ?></p>
            <div class="date-read">
                <div class="cat-time">
                    <p class="date"><?php echo $formatted_date; ?></p>
                    <a href="<?php echo htmlspecialchars($link); ?>" class="text-decoration-none">
                        Read More <img src="assets/images/navbar/arrow.svg" class="custom-svg-icon">
                    </a>
                </div>
            </div>

            <?php
        }
    } else {
        echo "<p>No posts found.</p>";
    }
    ?>
</div>

   <div class="col-md-7 ps-5">
    <div class="home-blog-2">
        <?php
        function trim_words($text, $limit = 15, $ellipsis = '...') {
            $words = explode(' ', $text);
            return count($words) > $limit ? implode(' ', array_slice($words, 0, $limit)) . $ellipsis : $text;
        }

        $number_of_posts = 4;
        $blog_url = "http://localhost/canapprove-qa/blog/wp-json/wp/v2/posts?per_page=$number_of_posts&order=desc&orderby=date&_embed";
        $response = file_get_contents($blog_url);
        $posts = json_decode($response);
        
        if (!empty($posts) && count($posts) > 1) {
            $selected_posts = array_slice($posts, 1, 3);
            
            foreach ($selected_posts as $post) {
                $title = $post->title->rendered;
                $excerpt = trim_words(strip_tags($post->excerpt->rendered, '<a>'), 15);
                $link = $post->link;
                
                // Featured Image Handling
                $featured_image = isset($post->_embedded->{'wp:featuredmedia'}[0]->source_url) 
                    ? $post->_embedded->{'wp:featuredmedia'}[0]->source_url 
                    : 'assets/images/default-image.jpg';
                
                // Word Count & Reading Time
                $content = strip_tags($post->content->rendered);
                $word_count = str_word_count($content);
                $reading_time = ceil($word_count / 200);

                // Get Categories
                $category_names = [];
                foreach ($post->categories as $category_id) {
                    $category_url = "http://localhost/canapprove-qa/blog/wp-json/wp/v2/categories/$category_id";
                    $category_response = file_get_contents($category_url);
                    $category_data = json_decode($category_response);
                    
                    if (!empty($category_data->name)) {
                        $category_names[] = $category_data->name;
                    }
                }
                $category_list = implode(", ", $category_names);
                ?>
                
                <div class="row mb-4">
                    <div class="col-md-5">
                        <img class="home-blog img-fluid" src="<?php echo $featured_image; ?>" alt="<?php echo htmlspecialchars($title); ?>">
                    </div>
                    <div class="col-md-7">
                        <div class="d-flex">
                            <div class='cat-time'>
                                <p class='category'><?php echo htmlspecialchars($category_list); ?></p>
                                <p class='estimate'><?php echo $reading_time; ?> min read</p>
                            </div>
                        </div>
                        <h2>
                            <a href="<?php echo htmlspecialchars($link); ?>" class="text-decoration-none text-dark">
                                <?php echo htmlspecialchars($title); ?>
                            </a>
                        </h2>
                        <p><?php echo $excerpt; ?></p>
                        <div>
                            <a href="<?php echo htmlspecialchars($link); ?>" class="text-decoration-none">
                                Read More <img src="assets/images/navbar/arrow.svg" class="custom-svg-icon">
                            </a>
                        </div>
                    </div>
                </div>

                <?php
            }
        } else {
            echo "<p>Not enough posts found.</p>";
        }
        ?>
    </div>
</div>

</div>
    <!-- ////////////////////////// -->
    </div>
</section>
    <?php
include 'template/testimonial.php';
?>

<section id="stories" class="d-flex align-items-center">
    <div class="container">
        <h2 class="heading text-center mb-4">Success <strong>Stories</strong></h2>
        <div class="row align-items-center">
            <div class="col-md-7">
                <p style="width:90%">Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur optio modi neque similique, aut, in tenetur cumque fugiat eligendi architecto nesciunt amet repellendus explicabo ut obcaecati fugit unde? Obcaecati debitis ullam repellendus? Tempore perferendis ab minus aspernatur vel maiores. Architecto.</p>
            </div>
            <div class="col-md-5">
            <?php
include 'template/sectionStorieVideo.php';
?>
            </div>
        </div>
    </div>
</section>
<?php include 'template/sectionVisaSearch.php'; ?>
<!-- ////////////// FAQ SECTION ////////////// -->
<?php
$faqs = [
    ["question" => "What is your return policy?", "answer" => "You can return any item within 30 days of purchase."],
    ["question" => "How can I contact customer support?", "answer" => "You can reach us via email at support@example.com."],
    ["question" => "Do you offer international shipping?", "answer" => "Yes, we ship to over 50 countries worldwide."],
];
?>
<section id="faq">
<?php include 'template/faq.php'; ?>

</section>

<?php
include 'template/footer/footer.php';
?>

