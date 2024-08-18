// Header.jsx
import React from 'react';
import { useNavigate } from 'react-router-dom';
import { useState } from 'react';
import '../styles/nav.css'; // Asegúrate de tener un archivo CSS para los estilos

const Nav = ({ carrito, onAddToCarrito, onRemoveFromCarrito }) => {
    const navigate = useNavigate();

    const handleGoToCarrito = () => {
      navigate('/carrito', { state: { carrito } }); // Redirige al carrito con el estado del carrito
    };

return (
<header className="header">
    <div className="header-left">
    <h1>Mi Tienda</h1>
    </div>
    <div className="header-right">
        <button onClick={handleGoToCarrito} className="nav-button">
            Ver Carrito ({carrito.length})
        </button>
    </div>
</header>
);
};

export default Nav;
