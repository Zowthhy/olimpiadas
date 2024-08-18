import React from 'react';
import { BrowserRouter as Router, Route, Routes } from 'react-router-dom';
import Index from './pages/Index';
import Login from './pages/Login';
import Registro from './pages/Registro';
import CarritoPage from './pages/CarritoPage';
import PanelAdmin from './pages/PanelAdmin'; 

const App = () => {
    return (
        <Router>
            <Routes>
                <Route path="/" element={<Index />} />
                <Route path="/login" element={<Login />} />
                <Route path="/registro" element={<Registro />} />
                <Route path="/carrito" element={<CarritoPage />} />
                <Route path="/admin" element={<PanelAdmin />} /> 
            </Routes>
        </Router>
    );
};

export default App;
