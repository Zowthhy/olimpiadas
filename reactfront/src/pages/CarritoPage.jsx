// src/pages/Carrito.jsx
import React from 'react';
import { useState } from 'react';
import { useLocation, useNavigate } from 'react-router-dom';
import Carrito from '../components/Carrito'; // Asegúrate de que la ruta sea correcta
import '../styles/CarritoPage.css';

const CarritoPage = () => {
    const location = useLocation();
    const navigate = useNavigate();
    const [carrito, setCarrito] = useState(location.state?.carrito || []);

    const handleRemoveFromCarrito = (producto) => {
        setCarrito(prevCarrito => prevCarrito.filter(item => item.codigo !== producto.codigo));
    };

    const handleUpdateCantidad = (codigo, cantidad) => {
        setCarrito(prevCarrito =>
        prevCarrito.map(item =>
            item.codigo === codigo ? { ...item, cantidad } : item
        )
        );
    };

    const handleGoBack = () => {
        navigate(-1); // Retrocede en el historial
    };

    return (
        <div className="carrito-page">
            <button onClick={handleGoBack} className="back-button">Volver Atrás</button>
            <h1>Carrito</h1>
            <Carrito carrito={carrito} onRemove={handleRemoveFromCarrito} onUpdateCantidad={handleUpdateCantidad}/>
        </div>
    );
};

export default CarritoPage;
