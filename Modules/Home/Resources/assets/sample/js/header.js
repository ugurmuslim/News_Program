function toggleLargeNavMenu(e) {
    const largeNavMenu = document.getElementById("large-nav-menu");
    if (largeNavMenu?.style?.display === "none")
        largeNavMenu.style.display = "flex";
    else if (largeNavMenu?.style?.display === "flex")
        largeNavMenu.style.display = "none";
    else largeNavMenu.style.display = "flex";
}

function toggleDrawerNav(e) {
    const drawerNav = document.getElementById("drawer-nav");
    if (drawerNav?.style?.display === "none") drawerNav.style.display = "block";
    else if (drawerNav?.style?.display === "block")
        drawerNav.style.display = "none";
    else drawerNav.style.display = "block";
}

function deactivateLargeNavMenu(event) {
    const largeNavMenu = document.getElementById("large-nav-menu");
    let isLargeNavMenuButton = event.target.id === "large-nav-menu-button";
    let isLargeNavMenu =
        event.target.id === "large-nav-menu" ||
        largeNavMenu.contains(event.target);
    let isOpen = largeNavMenu.style.display === "flex";

    if (!isOpen) return;
    else if (isLargeNavMenuButton || isLargeNavMenu) return;
    else largeNavMenu.style.display = "none";
}

function deactivateDrawerNav(event) {
    const drawerNav = document.getElementById("drawer-nav");
    let isDrawerNavButton = event.target.id === "drawer-nav-button";
    let isDrawerNav =
        event.target.id === "drawer-nav" || drawerNav.contains(event.target);
    let isOpen = drawerNav.style.display === "flex";

    if (!isOpen) return;
    else if (isDrawerNavButton || isDrawerNav) return;
    else drawerNav.style.display = "none";
}

document.addEventListener("click", function (event) {
    deactivateLargeNavMenu(event);
    deactivateDrawerNav(event);
});
