<?php
$testimonials = [
    [
        "name" => "John Doe",
        "visa" => "Work Visa Canada",
        "image" => "assets/images/test-modal.jpg",
        "short_quote" => "The new, recommend version of applying clipping to elements in CSS is clip-path. You’d think it would be as simple as.",
        "full_quote" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi illo veniam eligendi? Vero cum provident velit ipsum rerum distinctio dolore odio inventore."
    ],
    [
        "name" => "Jane Smith",
        "visa" => "Student Visa USA",
        "image" => "assets/images/test-modal.jpg",
        "short_quote" => "The new, recommend version of applying clipping to elements in CSS is clip-path. You’d think it would be as simple as.",
        "full_quote" => "Amazing experience! Highly recommended. The team was so helpful and guided me through every step of the process."
    ],
    [
        "name" => "Michael Lee",
        "visa" => "PR Australia",
        "image" => "assets/images/test-modal.jpg",
        "short_quote" => "The new, recommend version of applying clipping to elements in CSS is clip-path. You’d think it would be as simple as.",
        "full_quote" => "Professional service. Quick and efficient! I got my PR approval faster than I expected."
    ],
    [
        "name" => "Emily Davis",
        "visa" => "Tourist Visa UK",
        "image" => "assets/images/test-modal.jpg",
        "short_quote" => "The new, recommend version of applying clipping to elements in CSS is clip-path. You’d think it would be as simple as.",
        "full_quote" => "Had a smooth process! Thank you. The agents were always available and responsive."
    ],
    [
        "name" => "David Wilson",
        "visa" => "Work Visa Germany",
        "image" => "assets/images/test-modal.jpg",
        "short_quote" => "The new, recommend version of applying clipping to elements in CSS is clip-path. You’d think it would be as simple as.",
        "full_quote" => "Excellent support from start to finish! Highly professional and knowledgeable team."
    ],
    [
        "name" => "Sophia Miller",
        "visa" => "Spouse Visa Canada",
        "image" => "assets/images/test-modal.jpg",
        "short_quote" => "The new, recommend version of applying clipping to elements in CSS is clip-path. You’d think it would be as simple as.",
        "full_quote" => "Very happy with the service! Everything was handled smoothly and efficiently."
    ]
];

$chunks = array_chunk($testimonials, 3); // Split into groups of 3 per slide
?>

<section id="clients">
    <div class="container">
    <h2 class="heading text-center">What Our<strong> Clients Says</strong></h2>
<div class="mt-5">
    <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php foreach ($chunks as $index => $testimonialGroup): ?>
                <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                    <div class="row">
                        <?php foreach ($testimonialGroup as $testimonial): ?>
                            <div class="col-md-4">
                                <div class="testimonial flex-grow-1">
                                    <div class="test-content">
                                    <img src="<?= $testimonial['image'] ?>" alt="<?= $testimonial['name'] ?>" class="clip-circle">
                                    <p class="author"><?= $testimonial['name'] ?></p>
                                    <p class="visa-type"><?= $testimonial['visa'] ?></p>
                                    <p class="quote"><?= $testimonial['short_quote'] ?></p>
                                    <a href="#" class="read-more" data-bs-toggle="modal" data-bs-target="#quoteModal"
                                       data-quote="<?= htmlspecialchars($testimonial['full_quote']) ?>">
                                        Read More
                                    </a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Carousel Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div></div></section>

<!-- Modal for full quote -->
<div class="modal fade" id="quoteModal" tabindex="-1" aria-labelledby="quoteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="quoteModalLabel">Full Quote</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Full quote will be dynamically added here -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.read-more').on('click', function(event) {
            event.preventDefault();
            var quoteText = $(this).data('quote');
            $('#quoteModal .modal-body').html(quoteText);
        });
    });
</script>

