<?php

$pageTitle = "Contact Us";
$metaDescription = "Find out how you can study in Australia. Learn about top universities, scholarships, and visa requirements.";
$metaKeywords = "study in Australia, Canadian universities, student visa Australia";
$canonicalURL = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$pageHeading = "Get in Touch <strong>with Us</strong>";

// Set banner image
$banner_image = "/canapprove-qa/assets/images/australia-map.svg";
?>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/canapprove-qa/template/header/header.php"; ?>
<body>
<div class="container mt-4">
    <!-- Banner Section -->
    <div class="inner-banner">
        <div class="row">
            <div class="col-md-7 pe-5">
            <h1 class="mt-4 mb-2 heading"><?= html_entity_decode($pageHeading ?? "Default Page Heading") ?></h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur saepe doloremque a, nemo enim nulla nostrum nihil repellat maiores blanditiis exercitationem totam iure tenetur quos?</p>
                <img src="<?= htmlspecialchars($final_banner) ?>" alt="Banner Image" class="img-fluid inner-banner-img">
            </div>
            <div class="col-md-5">
            <?php
// Default form type (education) if not set
$form_type = isset($_GET['form']) ? $_GET['form'] : 'education';
?>
    <style>
        /* Toggle Container */
        .toggle-container {
            width: 250px;
    margin-bottom: 20px;
    display: flex;
    align-items: center;
    background: #ddd;
    border-radius: 35px;
    padding: 5px;
    overflow: hidden;
    position: relative;
    left: 50%;
    transform: translate(-50%, 0px);
        }

        /* Toggle Button */
        .toggle-btn {
            width: 120px;
            /* text-align: center; */
            padding: 10px;
            cursor: pointer;
            position: relative;
            z-index: 2;
            font-size: 16px;
            font-weight: bold;
            transition: color 0.3s ease-in-out;
        }

        /* Highlight Effect (Sliding Background) */
        .highlight {
            position: absolute;
            width: 120px;
            height: 40px;
            background: var(--primary);
            border-radius: 25px;
            transition: transform 0.3s ease-in-out;
            transform: translateX(<?php echo ($form_type === 'immigration') ? '100%' : '0%'; ?>);
        }

        /* Form Container */
        .form-container {
            display: none;
        }

        .active {
            display: block;
        }

        /* Active Button Text Color */
        .toggle-btn.active {
            color: white;
        }
    </style>
<body>

    <!-- Toggle Switch -->
    <div class="toggle-container mt-4">
        <div class="highlight" id="highlight"></div>
        <div class="toggle-btn <?php echo ($form_type === 'education') ? 'active' : ''; ?>" 
             id="educationBtn" onclick="toggleForm('education')">Education</div>
        <div class="toggle-btn <?php echo ($form_type === 'immigration') ? 'active' : ''; ?>" 
             id="immigrationBtn" onclick="toggleForm('immigration')">Immigration</div>
    </div>

    <!-- Form Sections -->
    <div class="form-container <?php echo ($form_type === 'education') ? 'active' : ''; ?>" id="educationForm">
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/canapprove-qa/forms/education_form.php"; ?>
    </div>

    <div class="form-container <?php echo ($form_type === 'immigration') ? 'active' : ''; ?>" id="immigrationForm">
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/canapprove-qa/forms/immigration_form.php"; ?>
    </div>

    <script>
        function toggleForm(formType) {
            // Update the highlight position
            let highlight = document.getElementById("highlight");
            let educationBtn = document.getElementById("educationBtn");
            let immigrationBtn = document.getElementById("immigrationBtn");

            if (formType === "education") {
                highlight.style.transform = "translateX(0%)";
                educationBtn.classList.add("active");
                immigrationBtn.classList.remove("active");
            } else {
                highlight.style.transform = "translateX(100%)";
                immigrationBtn.classList.add("active");
                educationBtn.classList.remove("active");
            }

            // Show the selected form and hide the other
            document.getElementById("educationForm").style.display = (formType === "education") ? "block" : "none";
            document.getElementById("immigrationForm").style.display = (formType === "immigration") ? "block" : "none";
        }

        // Ensure the correct form is displayed on load
        window.onload = function () {
            let currentForm = "<?php echo $form_type; ?>";
            toggleForm(currentForm);
        };
    </script>

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
          
        </div>
    </div>
</div>
<div class="container">
    <section>
        <h2 class="text-center">Check out the offices locations</h2>
        <p style="width:80%;margin: auto;" class="text-center mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis aliquid quia ex culpa debitis natus beatae. Asperiores tempore labore debitis id temporibus facere dolorum optio, veniam cupiditate? Tenetur magni unde sed doloremque.</p>
        <img src="/canapprove-qa/assets/images/con-map.svg" alt="" style="width:100%; height: auto;">
    </section>

    <section>
    <?php
// Default selected country (fallback)
$selectedCountry = $_POST['country'] ?? 'India';

// Messages for each country
$messages = [
    "India" => "Welcome to India! The land of diversity.",
    "Canada" => "Hello from Canada! The home of maple syrup.",
    "Dubai" => "Welcome to Dubai! The city of gold.",
    "UAE" => "Greetings from UAE! Experience luxury and culture.",
    "Australia" => "G'day mate! Welcome to Australia!"
];

$displayMessage = $messages[$selectedCountry] ?? "";
?>

<style>
    .custom-toggle-container {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 20px;
    }
    .custom-toggle-wrapper {
        display: flex;
        position: relative;
        background: #ddd;
        border-radius: 40px;
        padding: 5px;
        width: 500px;
        cursor: pointer;
        overflow: hidden;
    }
    .custom-toggle-btn {
        position: absolute;
        height: 46px;
        background: var(--primary);
        border-radius: 25px;
        transition: transform 0.3s ease-in-out, width 0.3s ease-in-out;
    }
    .custom-toggle-option {
    flex: 1;
    text-align: center;
    padding: 16px 20px;
    font-weight: bold;
    cursor: pointer;
    z-index: 2;
    transition: color 0.3s;
    line-height: 1;
}
    .custom-selected {
        color: white !important;
    }
    #custom-message {
        margin-top: 20px;
        font-size: 20px;
        font-weight: bold;
        color: #333;
        text-align: center;
    }
</style>

<div class="custom-toggle-container">
    <div class="custom-toggle-wrapper">
        <div class="custom-toggle-btn" id="customToggleBtn"></div>
        <div class="custom-toggle-option" data-country="India">India</div>
        <div class="custom-toggle-option" data-country="Canada">Canada</div>
        <div class="custom-toggle-option" data-country="Dubai">Dubai</div>
        <div class="custom-toggle-option" data-country="UAE">UAE</div>
        <div class="custom-toggle-option" data-country="Australia">Australia</div>
    </div>
</div>

<!-- Message Display -->
<p id="custom-message"><?= $displayMessage ?></p>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        let selectedCountry = "<?= $selectedCountry ?>";
        let options = document.querySelectorAll(".custom-toggle-option");
        let toggleBtn = document.getElementById("customToggleBtn");
        let messageBox = document.getElementById("custom-message");

        let messages = {
            "India": "Welcome to India! The land of diversity.",
            "Canada": "Hello from Canada! The home of maple syrup.",
            "Dubai": "Welcome to Dubai! The city of gold.",
            "UAE": "Greetings from UAE! Experience luxury and culture.",
            "Australia": "G'day mate! Welcome to Australia!"
        };

        // Function to adjust the toggle button's position and width based on the option element
        function moveCustomToggleButton(optionElement) {
            // Get the option's offset from the left of the parent container
            let leftPosition = optionElement.offsetLeft;
            // Get the width of the selected option
            let optionWidth = optionElement.offsetWidth;
            // Apply the computed width and transform position to the toggle button
            toggleBtn.style.width = optionWidth + "px";
            toggleBtn.style.transform = `translateX(${leftPosition}px)`;
        }

        // Set initial position and active state for the default selected country
        options.forEach((option) => {
            if (option.dataset.country === selectedCountry) {
                moveCustomToggleButton(option);
                option.classList.add("custom-selected");
                messageBox.innerText = messages[selectedCountry];
            }

            option.addEventListener("click", function () {
                let newCountry = this.dataset.country;
                // Remove active state from all options
                options.forEach(opt => opt.classList.remove("custom-selected"));
                // Add active state to the clicked option
                this.classList.add("custom-selected");
                // Adjust the toggle button based on the clicked option's size and position
                moveCustomToggleButton(this);
                // Update the displayed message
                messageBox.innerText = messages[newCountry];
            });
        });
    });
</script>

    </section>
</div>

<?php include $_SERVER['DOCUMENT_ROOT'] . "/canapprove-qa/template/footer/footer.php"; ?>