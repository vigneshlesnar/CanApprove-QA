<?php
$pageTitle = "Study in Australia";
$metaDescription = "Find out how you can study in Australia. Learn about top universities, scholarships, and visa requirements.";
$metaKeywords = "study in Australia, Canadian universities, student visa Australia";
$canonicalURL = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$pageHeading = "Study in <strong>Australia</strong>";

// Set banner image
$banner_image = "/canapprove-qa/assets/images/australia-map.svg";
?>
<div class="row">
            <section>
                <h2>Australian Immigration</h2>
                <p>
                    Studying abroad can bring so many changes to both your professional and personal life. Taking an Australia 
                    education that is globally recognized, leading a life that is highly standardized, and having a different range 
                    of opportunities are some key factors of overseas education in Australia.
                </p>
                <p>
                    The Kangaroo country is one of the oldest, most diverse, and most importantly the safest countries on the 
                    planet. Australia has a long history of migration since it started in 1945 and around seven million people have 
                    migrated to Australia since then. Thus, it turns out to be one of its greatest assets as it has the oldest and well 
                    diverse culture. Australia is highly proclaimed for its world-class education, top-end technology, high paid 
                    jobs, and much more still.
                </p>
            </section>
            
            <section>
</section>

<section>
    <h4>Let’s see why to study in Australia</h4>
    <div class="row g-5" id="reasons-container">
        <?php
        $reasons = [
            "Australia has world-class universities and education institutions.",
            "It offers a diverse and multicultural environment for students.",
            "Scholarship opportunities make studying in Australia more affordable.",
            "Students can work part-time while studying to gain experience.",
            "Post-study work opportunities help graduates build careers.",
            "Australia has a high standard of living and beautiful landscapes."
        ];

        foreach ($reasons as $index => $reason) {
            echo '
            <div class="col-md-4 d-flex">
                <div class="inner-card w-100">
                    <div class="number">' . ($index + 1) . '</div>
                    <p>' . htmlspecialchars($reason) . '</p>
                </div>
            </div>';
        }
        ?>
    </div>
</section>
            <section>
                <h2>The Australia Education system</h2>
                <p>
                    Choosing Australia to study can make sure that you receive an exceptional quality of education, a 
                    standard of living, and a concise curriculum, especially focusing on critical thinking, ethical understanding, 
                    communication, analytics, and practical learning. Additionally, a wide range of courses close to 22,000 and 
                    more than 1100 institutions is a very big boon to students who wish to study in Australia. 
                </p>
                <p>
                    The Australian education system is assisted by a unique factor called Australian Qualifications Framework 
                    (AQF). AQF is a government policy that is established to determine the standards of qualifications, to be 
                    precise to specify the level of education and provide certificates. 
                </p>
            </section>
            <section>
                <h2>Quality Assured</h2>
                <p>
                    Another key benefit of Australian education is it is quality assured by the Tertiary Education Quality and 
                    Standards Agency (TEQSA). It is a national regulatory and quality agency for higher education that monitors 
                    and regulates the higher education sector of Australia. Additionally, Education Services for Overseas Students 
                    (ESOS) looks after the student rights are protected or not. The rights include the following:
                </p>
                <div>
                    <ul>
                        <li>Ensure international student well-being.</li>
                        <li>The quality of Education students gets in Australia</li>
                        <li>Providing information that is accurate and current</li>
                    </ul>
                </div>
            </section>
            <section>
    <h2>Top Courses in Australia</h2>
    <div class="course-container">
        <?php
        $courses = [
            ["name" => "Healthcare", "icon" => "healthcare.svg"],
            ["name" => "Information Technology", "icon" => "it.svg"],
            ["name" => "Engineering", "icon" => "engineering.svg"],
            ["name" => "Business & Management", "icon" => "business.svg"],
            ["name" => "Education", "icon" => "education.svg"],
            ["name" => "Accounting & Finance", "icon" => "accounting.svg"],
            ["name" => "Hospitality & Tourism", "icon" => "hospitality.svg"],
            ["name" => "Environmental Science", "icon" => "environment.svg"]
        ];

        foreach ($courses as $course) {
            echo '
            <div class="course-icon-box">
                <div class="course-icon-container">
                    <img class="course-icon" src="icons/' . htmlspecialchars($course["icon"]) . '" alt="' . htmlspecialchars($course["name"]) . ' Icon">
                </div>
                <p>' . htmlspecialchars($course["name"]) . '</p>
            </div>';
        }
        ?>
    </div>
</section>

<section class="my-4">
    <table class="table table-striped table-hover table-bordered">
        <thead>
            <tr >
                <th>Australian Universities</th>
                <th>QS World University Rankings 2024</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>The University of Melbourne</td>
                <td>#19</td>
            </tr>
            <tr>
                <td>The University of Melbourne</td>
                <td>#19</td>
            </tr>
            <tr>
                <td>The University of New South Wales</td>
                <td>#19</td>
            </tr>
            <tr>
                <td>Australian National University</td>
                <td>#34</td>
            </tr>
            <tr>
                <td>Monash University</td>
                <td>#42</td>
            </tr>
            <tr>
                <td>The University of Queensland</td>
                <td>#43</td>
            </tr>
            <tr>
                <td>The University of Western Australia</td>
                <td>#72</td>
            </tr>
            <tr>
                <td>The University of Adelaide</td>
                <td>#89</td>
            </tr>
            <tr>
                <td>University Technology of Sydney</td>
                <td>#90</td>
            </tr>
        </tbody>
    </table>
</section>
<section>
<?php
$programs = [
    [
        "title" => "Diploma Courses",
        "description" => "Require a minimum of 60% in grade 12 and a score of at least 5.5 in the IELTS exam. This exam should be taken only within the 2 years of your course.",
        "image" => "placeholder.png"
    ],
    [
        "title" => "Bachelor’s Programs",
        "description" => "Require a minimum of 60% in grade 12 and a score of at least 5.5 in the IELTS exam. This exam should be taken only within the 2 years of your course commencement.",
        "image" => "placeholder.png"
    ],
    [
        "title" => "Master’s Programs",
        "description" => "Require a minimum of 60% in grade 12 and a score of at least 5.5 in the IELTS exam. This exam should be taken only within the 2 years of your course commencement.",
        "image" => "placeholder.png"
    ],
    [
        "title" => "Doctoral Programs",
        "description" => "Require a minimum of 60% in grade 12 and a score of at least 5.5 in the IELTS exam. This exam should be taken only within the 2 years of your course commencement.",
        "image" => "placeholder.png"
    ]
];
?>
    <h2>Eligibility to study in Australia</h2>
<div class="edu-container py-5">
    <div class="edu-timeline">
        <?php foreach ($programs as $index => $program): ?>
            <div class="edu-timeline-item">
                <?php if ($index % 2 == 0): ?>
                    <div class="edu-timeline-content">
                        <h4><?= $program['title'] ?></h4>
                        <p><?= $program['description'] ?></p>
                    </div>
                    <div class="edu-timeline-image">
                        <img src="<?= $program['image'] ?>" alt="Illustration">
                    </div>
                <?php else: ?>
                    <div class="edu-timeline-image">
                        <img src="<?= $program['image'] ?>" alt="Illustration">
                    </div>
                    <div class="edu-timeline-content">
                        <h4><?= $program['title'] ?></h4>
                        <p><?= $program['description'] ?></p>
                    </div>
                <?php endif; ?>
                <div class="edu-circle"></div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

</section>
<?php include 'template/sectionVisaSearch.php'; ?>
        </div>
