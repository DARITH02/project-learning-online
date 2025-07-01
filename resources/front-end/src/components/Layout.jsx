import React from "react";
import Header from "../layout/Header";
import Footer from "../layout/Footer";

const Layout = ({ children }) => {
    return (
        <>
            <div className="w-full">
                <Header />
                <div className="bg-white">
                    {children}
                </div>
                <Footer/>
            </div>
        </>
    );
};

export default Layout;
