<?php
// Define timeline items with unique keys
$timelineItems = [
    "Check Eligibility 1" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.",
    "Check Eligibility 2" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.",
    "Check Eligibility 3" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.",
    "Check Eligibility 4" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam."
];
?>

<section id="choose-us">
    <div class="container ">
    <h2 class="heading text-center mb-5">Why <strong>Choose Us?</strong></h2>
        <div class="row">
            <!-- Left Side Image -->
            <div class="col-md-6">
                <img src="assets/images/choose-us.png" alt="Image" class="img-fluid mt-5">
            </div>
            
            <!-- Right Side Timeline -->
            <div class="col-md-6">
                <div class="timeline">
                    <?php foreach ($timelineItems as $title => $description) : ?>
                        <div class="timeline-item">
                            <h4><strong><?php echo htmlspecialchars($title); ?></strong></h4>
                            <p><?php echo htmlspecialchars($description); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
