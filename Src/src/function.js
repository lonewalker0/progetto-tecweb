function showMenu()
{
    document.getElementById("menu-header").classList.replace("is-invisible","is-visible");
    document.getElementById("hamburger-head").classList.replace("unrotate-ham","rotate-ham");
}
function hideMenu()
{
    document.getElementById("menu-header").classList.replace("is-visible","is-invisible");
    document.getElementById("hamburger-head").classList.replace("rotate-ham","unrotate-ham");
}
