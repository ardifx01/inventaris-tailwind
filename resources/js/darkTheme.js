document.addEventListener("DOMContentLoaded", () => {
    const toggle = document.getElementById("darkModeToggle");
    const toggleHandle = document.getElementById("toggleHandle");
    const sunIcon = document.getElementById("sunIcon");
    const moonIcon = document.getElementById("moonIcon");
    const currentThemeText = document.getElementById("currentTheme");
    const root = document.documentElement;

    // Fungsi untuk set theme
    function setTheme(theme) {
        if (theme === "dark") {
            root.classList.add("dark");
            toggle.checked = true;
            toggleHandle.style.transform = "translateX(40px)"; // geser handle
            sunIcon.style.opacity = "0";
            moonIcon.style.opacity = "1";
            currentThemeText.textContent = "Dark";
            localStorage.setItem("theme", "dark");
        } else {
            root.classList.remove("dark");
            toggle.checked = false;
            toggleHandle.style.transform = "translateX(0px)";
            sunIcon.style.opacity = "1";
            moonIcon.style.opacity = "0";
            currentThemeText.textContent = "Light";
            localStorage.setItem("theme", "light");
        }
    }

    // Load theme dari localStorage
    const savedTheme = localStorage.getItem("theme") || "light";
    setTheme(savedTheme);

    // Event listener toggle
    toggle.addEventListener("change", function () {
        if (this.checked) {
            setTheme("dark");
        } else {
            setTheme("light");
        }
    });
});
