import './app.css'
import React from 'react'
import ReactDOM from "react-dom/client";
import {
    createBrowserRouter,
    RouterProvider
} from "react-router-dom";
import {Provider} from "react-redux";
import {store} from './reducers'
import Main from "./components/Main";
import Hotel from "./components/Hotel";

const router = createBrowserRouter([
    {
        path: "/",
        element: (
            <Main/>
        ),
    },
    {
        path: "hotel/:id",
        element: (
            <Hotel/>
        ),
    },
]);

ReactDOM.createRoot(document.getElementById("root")).render(
    <Provider store={store}>
        <RouterProvider router={router}/>
    </Provider>
);