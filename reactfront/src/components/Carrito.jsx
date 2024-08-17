// src/components/Carrito.js
import React from 'react';
import '../styles/Carrito.css'; // Asegúrate de que la ruta sea correcta

const Carrito = ({ carrito, onRemove, onUpdateCantidad }) => {
const getTotalItems = () => {
return carrito.reduce((total, producto) => total + producto.cantidad, 0);
};

const getTotalPrice = () => {
return carrito.reduce((total, producto) => total + producto.precio * producto.cantidad, 0);
};

return (
<div className="carrito">
    <h3>Carrito</h3>
    {carrito.length === 0 ? (
    <p>El carrito está vacío.</p>
    ) : (
    <>
        <div className="carrito-items">
        {carrito.map((producto) => (
            <div key={producto.codigo} className="carrito-item">
            <img src={producto.imagen} alt={producto.nombre} />
            <div className="carrito-item-info">
                <div>{producto.nombre}</div>
                <div>
                Qty:
                <input
                    type="number"
                    min="1"
                    max={producto.stock}
                    value={producto.cantidad}
                    onChange={(e) => onUpdateCantidad(producto.codigo, Number(e.target.value))}
                    className="carrito-quantity"
                />
                </div>
                <div>${(producto.precio * producto.cantidad).toFixed(2)}</div>
                <button onClick={() => onRemove(producto)}>Eliminar</button>
            </div>
            </div>
        ))}
        </div>
        <div className="carrito-summary">
        <div>Total Items: {getTotalItems()}</div>
        <div>Total Price: ${getTotalPrice().toFixed(2)}</div>
        </div>
    </>
    )}
</div>
);
};

export default Carrito;
