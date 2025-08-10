
// Toggle Sidebar on Mobile
function toggleSidebar() {
    document.body.classList.toggle('sidebar-open');
}

// Dark Mode Toggle (example)
function toggleDarkMode() {
    const html = document.documentElement;
    const currentTheme = html.getAttribute('data-bs-theme');
    const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
    html.setAttribute('data-bs-theme', newTheme);
    localStorage.setItem('theme', newTheme);
}
