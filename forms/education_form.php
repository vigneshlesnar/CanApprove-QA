<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Include intl-tel-input CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/css/intlTelInput.css"/>
</head>
<body>

    <form action="save_form.php" method="POST">
        <input type="hidden" name="form_type" value="education">
        
        <label>Name</label><br>
        <input type="text" name="name" required placeholder="Enter Name"><br>

        <label>Email</label><br>
        <input type="email" name="email" required placeholder="Enter Email"><br>

        <label>Phone</label><br>
        <input type="tel" id="phone_education" name="phone" required placeholder="Enter Phone"><br>
<div class="row">
    <div class="col-md-6">
        <label>Age</label><br>
        <input type="number" name="age" required placeholder="Enter your Age"><br>
        </div>
        <div class="col-md-6">
        <label>Qualification</label><br>
        <input type="text" name="education_qualification" required placeholder="Enter Qualification"><br>
    </div>
        </div>
        <div class="row">
        <div class="col-md-6">       
        <label>Study In</label><br>
<select name="study_in" required>
    <option value="" disabled selected>Select Country</option>
    <option value="USA">USA</option>
    <option value="Canada">Canada</option>
    <option value="UK">UK</option>
</select><br>

</div>
<div class="col-md-6">
        <label>Nationality</label><br>
        <input type="text" name="nationality" required placeholder="Enter Nationality"> <br>
        </div>
</div>
<div class="row">
    <div class="col-md-6">
        <label>Nearest Branch</label><br>
<select name="nearest_branch" required>
    <option value="" disabled selected>Select Branch</option>
    <option value="New York">New York</option>
    <option value="London">London</option>
    <option value="Toronto">Toronto</option>
</select><br>
</div>
<div class="col-md-6">
        <label>City</label><br>
        <input type="text" name="city" required placeholder="Enter City"><br>
        </div>
        </div>
        <input class="submit-btn" type="submit" value="Submit">
    </form>

    

    <!-- Include intl-tel-input JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/intlTelInput.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const phoneInput = document.querySelector("#phone_education");

            // Initialize intl-tel-input
            const iti = window.intlTelInput(phoneInput, {
                separateDialCode: true,  // Show country dial code separately
                preferredCountries: ["us", "gb", "ca"],  // Preferred countries
                initialCountry: "auto",  // Auto-detect user's country
                geoIpLookup: function(callback) {
                    fetch('https://ipapi.co/json/')  // Alternative API for country detection
                        .then(response => response.json())
                        .then(data => callback(data.country_code.toLowerCase()))  // Convert to lowercase
                        .catch(() => callback("us"));  // Default to US if error occurs
                }
            });

            // Ensure valid phone number before form submission
            document.querySelector("form").addEventListener("submit", function (e) {
                if (!iti.isValidNumber()) {
                    alert("Please enter a valid phone number!");
                    e.preventDefault();
                }
            });
        });
    </script>

</body>
</html>
