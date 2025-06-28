import React from "react";
import { Routes, Route } from "react-router-dom";
import routeList from "./routes";
import Header from "./components/Header";
import "./index.css";
import Layout from "./components/Layout";

export default function App({ page, data }) {
    return (
        <div>
            <Routes>
                {routeList.map(({ path, element: Element, props }, index) => (
                    <Route
                        key={index}
                        path={path}
                        element={
                            <Layout>
                                <Element page={page} data={data} />
                            </Layout>
                        }
                        // element={<Element page={page} data={data} {...props} />}
                    />
                ))}
                <Route
                    path="*"
                    element={
                        <Layout>
                            <div className="text-center ">
                                <h1 className="text-red-800">
                                    Page not found....
                                </h1>
                            </div>
                        </Layout>
                    }
                />
            </Routes>
        </div>
    );
}
