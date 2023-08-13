function saveThemePreference() {
    let style = document.getElementById('theme').getAttribute('href');
    localStorage.setItem('theme', style);
}

function loadSavedTheme() {
    const savedTheme = localStorage.getItem('theme');

    const preferredTheme = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'style_dark.css' : 'style_light.css';

    if (savedTheme) {
        document.getElementById('theme').setAttribute('href', savedTheme);
    } else {
        document.getElementById('theme').setAttribute('href', preferredTheme);
    }
}

function swapStyleSheet(sheet) {

    let style = document.getElementById('theme').getAttribute('href');

    if(style == 'style_light.css'){
        document.getElementById('theme').setAttribute('href', 'style_dark.css');
    }
    else {
        document.getElementById('theme').setAttribute('href', 'style_light.css');
    }
}