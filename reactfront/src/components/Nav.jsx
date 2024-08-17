// Header.jsx
import React from 'react';
import { Link } from 'react-router-dom';
import { useState } from 'react';
import '../styles/nav.css'; // Asegúrate de tener un archivo CSS para los estilos

const Nav = ({ carrito, onAddToCarrito, onRemoveFromCarrito }) => {
const [showCarrito, setShowCarrito] = useState(false);

const handleCarritoToggle = () => {
    setShowCarrito(!showCarrito);
};

return (
<header className="header">
    <div className="header-left">
    <h1>Mi Tienda</h1>
    </div>
    <div className="header-right">
    
    </div>
</header>
);
};

export default Nav;
