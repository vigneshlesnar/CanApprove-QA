<?php
// Get the current page from the URL
$current_page = isset($_GET['page']) ? $_GET['page'] : null;
?>
<div class="sidebar">
<h2 class="text-center">Abroad Education</h2>
<ul class="list-group flag-sec">
    <li class="list-group-item <?php echo ($current_page == 'canada') ? 'active' : ''; ?>" onclick="location.href='/canapprove-qa/education/canada';" style="cursor: pointer;">
        <img src="/canapprove-qa/assets/images/canada-flag.svg" alt=""> 
        <a href="/canapprove-qa/education/canada" class="text-decoration-none <?php echo ($current_page == 'canada') ? 'text-white' : ''; ?>">Canada Education</a>
    </li>
    <li class="list-group-item <?php echo ($current_page == 'australia') ? 'active' : ''; ?>" onclick="location.href='/canapprove-qa/education/australia';" style="cursor: pointer;">
        <img src="/canapprove-qa/assets/images/australia-flag.svg" alt=""> 
        <a href="/canapprove-qa/education/australia" class="text-decoration-none <?php echo ($current_page == 'australia') ? 'text-white' : ''; ?>">Australia Education</a>
    </li>
    <li class="list-group-item <?php echo ($current_page == 'germany') ? 'active' : ''; ?>" onclick="location.href='/canapprove-qa/education/germany';" style="cursor: pointer;">
        <img src="/canapprove-qa/assets/images/germany-flag.svg" alt="">  
        <a href="/canapprove-qa/education/germany" class="text-decoration-none <?php echo ($current_page == 'germany') ? 'text-white' : ''; ?>">Germany Education</a>
    </li>
    <li class="list-group-item <?php echo ($current_page == 'poland') ? 'active' : ''; ?>" onclick="location.href='/canapprove-qa/education/poland';" style="cursor: pointer;">
        <img src="/canapprove-qa/assets/images/poland-flag.svg" alt=""> 
        <a href="/canapprove-qa/education/poland" class="text-decoration-none <?php echo ($current_page == 'poland') ? 'text-white' : ''; ?>">Poland Education</a>
    </li>
</ul>

<!-- /////////// Blog /////////// -->
 <h2 class="text-center mt-4">Blog</h2>
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
            $selected_posts = array_slice($posts, 0, 3);
            
            foreach ($selected_posts as $post) {
                $title = $post->title->rendered;
                $excerpt = trim_words(strip_tags($post->excerpt->rendered, '<a>'), 15);
                $link = $post->link;
                
                // Featured Image Handling
                $featured_image = isset($post->_embedded->{'wp:featuredmedia'}[0]->source_url) 
                    ? $post->_embedded->{'wp:featuredmedia'}[0]->source_url 
                    : 'assets/images/default-image.jpg';
                ?>
                
                <div class="row mb-4">
                    <div class="col-md-6">
                        <img class="home-blog img-fluid" src="<?php echo $featured_image; ?>" alt="<?php echo htmlspecialchars($title); ?>">
                    </div>
                    <div class="col-md-6">
                        <h2>
                            <a href="<?php echo htmlspecialchars($link); ?>" class="text-decoration-none text-dark">
                                <?php echo htmlspecialchars($title); ?>
                            </a>
                        </h2>
                        <p><?php echo $excerpt; ?></p>
                        <div>
                            <a href="<?php echo htmlspecialchars($link); ?>" class="text-decoration-none">
                                Read More <img src="/canapprove-qa/assets/images/navbar/arrow.svg" class="custom-svg-icon">
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
