const sidebar = document.querySelector(".sidebar");

if (sidebar) {
    sidebar.scrollTop = localStorage.getItem("sidebarScroll") || 0;

    sidebar.addEventListener("scroll", function () {
        localStorage.setItem("sidebarScroll", sidebar.scrollTop);
    });
}