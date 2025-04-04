<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Immigration Form</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.min.css"/>
</head>
<body>
<form action="save_form.php" method="POST">
    <input type="hidden" name="form_type" value="immigration">

    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required placeholder="Enter your name" autocomplete="name"><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required placeholder="Enter your email" autocomplete="email"><br>

    <label for="phone">Phone:</label>
    <input type="tel" id="phone" name="phone" required placeholder="Enter your phone number" autocomplete="tel"><br>

    <div class="row">
        <div class="col-md-6">
            <label for="age">Age:</label>
            <input type="number" id="age" name="age" required min="18" max="100" placeholder="Enter your age"><br>
        </div>

        <div class="col-md-6">
            <label for="preferred_country">Preferred Country:</label>
            <input type="text" id="preferred_country" name="preferred_country" required placeholder="Enter preferred country"><br>
        </div>
    </div>

    <label for="nationality">Nationality:</label>
    <input type="text" id="nationality" name="nationality" required placeholder="Enter your nationality"><br>

    <label for="education_qualification">Education Qualification:</label>
    <input type="text" id="education_qualification" name="education_qualification" required placeholder="Enter your qualification"><br>
    <div class="row">
    <div class="col-md-6">
    <label for="work_experience">Work Experience:</label>
    <input type="text" id="work_experience" name="work_experience" required placeholder="Enter years of experience"><br>
</div>
<div class="col-md-6">
    <label for="job_title">Job Title:</label>
    <input type="text" id="job_title" name="job_title" required placeholder="Enter your job title"><br>
</div>
</div>
<div class="row">
    <div class="col-md-6">
    <label for="nearest_branch">Nearest Branch:</label>
    <select id="nearest_branch" name="nearest_branch" required>
        <option value="" disabled selected>Select nearest branch</option>
        <option value="New York">New York</option>
        <option value="London">London</option>
        <option value="Toronto">Toronto</option>
    </select><br>
    </div>
    <div class="col-md-6">
    <label for="city">City:</label>
    <input type="text" id="city" name="city" required placeholder="Enter your city"><br>
    </div>
    </div>
    <input class="submit-btn" type="submit" value="Submit">
</form>



<!-- <h2>Download Immigration Data</h2>
<a href="export_immigration.php"><button>Download Immigration Data</button></a> -->

<script>
document.addEventListener("DOMContentLoaded", function () {
    const phoneInput = document.querySelector("#phone_immigration");
    window.intlTelInput(phoneInput, { separateDialCode: true });
});
</script>

</body>
</html>
