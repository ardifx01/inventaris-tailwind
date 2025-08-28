
const toggle = document.getElementById('darkModeToggle');

// Set default theme saat load
if (localStorage.getItem('theme') === 'light') {
    document.documentElement.classList.add('dark');
    toggle.checked = true;
}

toggle.addEventListener('change', function () {
    if (this.checked) {
        document.documentElement.classList.add('dark');
        localStorage.setItem('theme', 'dark');
    } else {
        document.documentElement.classList.remove('dark');
        localStorage.setItem('theme', 'light');
    }
});
