import React from 'react';
import ReactDOM from 'react-dom/client';
import {
    BrowserRouter,
    Routes,
    Route,
} from 'react-router-dom';

import Home from './components/Home';


const el = document.getElementById('app');
const props=JSON.parse(el.dataset.page||"{}");
ReactDOM.createRoot(el).render(
    <BrowserRouter>
        <Routes>
            <Route path="*" element={<Home {...props} />} />
        </Routes>
    </BrowserRouter>
);
