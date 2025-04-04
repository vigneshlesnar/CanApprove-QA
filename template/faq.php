<div class="container">
    <h2 class="heading text-center mb-2">Frequently Asked <strong>Questions?</strong></h2>
    <p class="text-center mb-5">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Neque nobis molestias, illum<br> facilis recusandae ad magnam? Deleniti quos earum velit?</p>
    
    <div id="faq-section">
        <?php foreach ($faqs as $faq) : ?>
            <div class="faq offset-md-2 col-md-8">
                <div class="question">
                    <?= htmlspecialchars($faq['question']); ?>
                    <img src="assets/images/plus.svg" class="toggle-icon" alt="Toggle">
                </div>
                <div class="answer">
                    <p><?= htmlspecialchars($faq['answer']); ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<script>
    document.querySelectorAll('.question').forEach(item => {
        item.addEventListener('click', () => {
            let answer = item.nextElementSibling;
            let icon = item.querySelector('.toggle-icon');

            if (answer.classList.contains('open')) {
                // Close the clicked one and switch to plus icon
                answer.classList.remove('open');
                icon.src = "assets/images/plus.svg"; 
            } else {
                // Close all others
                document.querySelectorAll('.answer').forEach(ans => ans.classList.remove('open'));
                document.querySelectorAll('.toggle-icon').forEach(icon => icon.src = "assets/images/plus.svg");

                // Open clicked one and switch to minus icon
                answer.classList.add('open');
                icon.src = "assets/images/minus.svg";
            }
        });
    });
</script>