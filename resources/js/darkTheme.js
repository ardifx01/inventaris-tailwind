document.addEventListener("DOMContentLoaded", () => {
    const toggle = document.getElementById("darkModeToggle");
    const toggleHandle = document.getElementById("toggleHandle");
    const sunIcon = document.getElementById("sunIcon");
    const moonIcon = document.getElementById("moonIcon");
    const currentThemeText = document.getElementById("currentTheme");
    const toggleLogo = document.getElementById("themeLogo");
    const root = document.documentElement;

    // Fungsi untuk set theme
    function setTheme(theme) {
        if (theme === "dark") {
            root.classList.add("dark");

            if (toggle) toggle.checked = true;
            if (toggleHandle) toggleHandle.style.transform = "translateX(40px)";
            if (sunIcon) sunIcon.style.opacity = "0";
            if (moonIcon) moonIcon.style.opacity = "1";
            if (currentThemeText) currentThemeText.textContent = "Dark";

            localStorage.setItem("theme", "dark");
        } else {
            root.classList.remove("dark");

            if (toggle) toggle.checked = false;
            if (toggleHandle) toggleHandle.style.transform = "translateX(0px)";
            if (sunIcon) sunIcon.style.opacity = "1";
            if (moonIcon) moonIcon.style.opacity = "0";
            if (currentThemeText) currentThemeText.textContent = "Light";

            localStorage.setItem("theme", "light");
        }
    }

    // Load theme dari localStorage
    const savedTheme = localStorage.getItem("theme") || "light";
    setTheme(savedTheme);

    // Event listener toggle switch (kalau ada)
    if (toggle) {
        toggle.addEventListener("change", function () {
            if (this.checked) {
                setTheme("dark");
            } else {
                setTheme("light");
            }
        });
    }

    // Klik logo → toggle tema (kalau ada)
    if (toggleLogo) {
        toggleLogo.addEventListener("click", function () {
            if (root.classList.contains("dark")) {
                setTheme("light");
            } else {
                setTheme("dark");
            }
        });
    }
});
