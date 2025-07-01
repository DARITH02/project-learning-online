import Home from "../pages/Home";
import About from "../pages/About";
import Category from "../pages/Category";

const routes = [
    {
        path: "/home",
        element: Home,
    },
    {
        path: "/about",
        element: About,
    },
    {
        path: "/category",
        element: Category,
    },
    { path: "/category/:type/:id", element: Category },
];

export default routes;
