function toggleLargeNavMenu(e) {
    const largeNavMenu = document.getElementById("large-nav-menu");
    const menuBtn = document.querySelector("#large-nav-menu-button svg");

    if (largeNavMenu?.style?.display === "none"){
        largeNavMenu.style.display = "flex";
        menuBtn.style.transform = "scaleY(1.3)";
        menuBtn.style.transition = "150ms ease";
    }
    else if (largeNavMenu?.style?.display === "flex"){
        largeNavMenu.style.display = "none";
        menuBtn.style.transform = "scaleY(1)";
        menuBtn.style.transition = "150ms ease";
    }        
    else{
        largeNavMenu.style.display = "flex";
        menuBtn.style.transform = "scaleY(1.3)";
        menuBtn.style.transition = "150ms ease";
    }

}

function toggleDrawerNav(e) {
    const drawerNav = document.getElementById("drawer-nav");
    if (drawerNav?.style?.display === "none") drawerNav.style.display = "flex";
    else if (drawerNav?.style?.display === "flex")
        drawerNav.style.display = "none";
    else drawerNav.style.display = "flex";
}

function deactivateLargeNavMenu(event) {
    const largeNavMenu = document.getElementById("large-nav-menu");
    const menuBtn = document.querySelector("#large-nav-menu-button svg");
    let isLargeNavMenuButton = event.target.id === "large-nav-menu-button";
    let isLargeNavMenu =
        event.target.id === "large-nav-menu" ||
        largeNavMenu.contains(event.target);
    let isOpen = largeNavMenu.style.display === "flex";

    if (!isOpen) return;
    else if (isLargeNavMenuButton || isLargeNavMenu) return;
    else {
        largeNavMenu.style.display = "none";
        menuBtn.style.transform = "scaleY(1)";
        menuBtn.style.transition = "150ms ease";
    }

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
    console.log("5");
});
