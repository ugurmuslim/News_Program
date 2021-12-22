document.addEventListener("click", function (event) {
    const largeNavMenuButton = document.getElementById("large-nav-menu-button");
    const largeNavMenu = document.getElementById("large-nav-menu");
    let isLargeNavMenuButton = event.target.id === "large-nav-menu-button";
    let isLargeNavMenu =
        event.target.id === "large-nav-menu" ||
        largeNavMenu.contains(event.target);
    let isOpen = largeNavMenu.style.display === "flex";

    if (!isOpen) return;
    else if (isLargeNavMenuButton || isLargeNavMenu) return;
    else largeNavMenu.style.display = "none";
});

function toggleLargeNavMenu(event) {
    const largeNavMenu = document.getElementById("large-nav-menu");
    if (largeNavMenu?.style?.display === "none")
        largeNavMenu.style.display = "flex";
    else if (largeNavMenu?.style?.display === "flex")
        largeNavMenu.style.display = "none";
    else largeNavMenu.style.display = "flex";
}
