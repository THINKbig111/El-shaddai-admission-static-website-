// Toggle Mobile Menu
document.querySelector('.nav-toggle').addEventListener('click', function() {
    this.classList.toggle('active');
    document.querySelector('.nav-links').classList.toggle('active');
});
