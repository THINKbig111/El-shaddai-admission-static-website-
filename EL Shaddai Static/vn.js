// script.js

// Add any interactivity you want here, such as smooth scrolling
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();

        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});
// JavaScript to Handle Modal
document.addEventListener('DOMContentLoaded', function() {
    const applyBtn = document.getElementById('apply-btn');
    const modal = document.getElementById('apply-modal');
    const closeBtn = document.querySelector('.close-btn');

    // Open the modal when the Apply button is clicked
    applyBtn.addEventListener('click', function(e) {
        e.preventDefault();
        modal.style.display = 'block';
    });

    // Close the modal when the close button is clicked
    closeBtn.addEventListener('click', function() {
        modal.style.display = 'none';
    });

    // Close the modal when clicking outside of the modal content
    window.addEventListener('click', function(e) {
        if (e.target == modal) {
            modal.style.display = 'none';
        }
    });

    // Handle the file upload
    const uploadInput = document.getElementById('upload-pdf');
    const uploadForm = document.getElementById('pdf-upload-form');

    uploadInput.addEventListener('change', function() {
        if (uploadInput.files.length > 0) {
            uploadForm.submit(); // Submit the form
        }
    });
});

