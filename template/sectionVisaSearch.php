<?php
$visa_categories = [
    "PR Visa" => [
        "Canada PNP", "Australia PR", "Germany PR"
    ],
    "Work Visa" => [
        "Poland", "Canada", "Germany", "Australia"
    ],
    "Visit Visa" => [
        "Poland", "Canada", "Germany", "Australia"
    ],
    "Study Visa" => [
        "Poland", "Canada", "Germany", "Australia", "UK"
    ],
    "News" => [
        "Australia Immigration News", "Canada", "Germany", "Australia", "UK"
    ]
];
?>

<section id="visa-search">
    <div class="container">
        <h2 class="heading text-center mb-4">Popular <strong>Visa Searches</strong></h2>
        
        <?php foreach ($visa_categories as $category => $links) : ?>
            <p>
                <strong><?php echo $category; ?> : </strong>
                <?php foreach ($links as $index => $link) : ?>
                    <a href="#"><?php echo $link; ?></a><?php echo $index < count($links) - 1 ? " | " : ""; ?>
                <?php endforeach; ?>
            </p>
        <?php endforeach; ?>
        
    </div>
</section>
