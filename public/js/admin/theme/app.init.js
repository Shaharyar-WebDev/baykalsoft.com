const ColorTheme = localStorage.getItem("colorTheme") ?? "Blue_Theme";

const Theme = localStorage.getItem("theme") ?? "dark";

const Layout = localStorage.getItem("layout") ?? "vertical";

const BoxedLayout = localStorage.getItem("boxedLayout") === "true";

const SidebarType = localStorage.getItem("sidebarOpen") === "true" ? 'full' : 'mini-sidebar';

const cardBorder = localStorage.getItem("cardBorder") === "true";

// console.log(SidebarType);

var userSettings = {
    Layout: Layout, // vertical | horizontal
    SidebarType: SidebarType, // full | mini-sidebar
    BoxedLayout: BoxedLayout, // true | false
    // Direction: "ltr", // ltr | rtl
    Theme: Theme, // light | dark
    ColorTheme: ColorTheme, // Blue_Theme | Aqua_Theme | Purple_Theme | Green_Theme | Cyan_Theme | Orange_Theme
    cardBorder: cardBorder, // true | false
};
