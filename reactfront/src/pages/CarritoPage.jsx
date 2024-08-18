import React, { useState } from 'react';
import { useLocation, useNavigate } from 'react-router-dom';
import axios from 'axios';
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

    const handlePlaceOrder = async () => {
        try {
            const response = await axios.post('/api/pedidos', { carrito });
            
            if (response.data.success) {
                alert('Pedido realizado con éxito.');
                navigate('/'); // Redirige a la página principal después de hacer el pedido
            } else {
                alert('Error al realizar el pedido. Inténtalo de nuevo.');
            }
        } catch (error) {
            console.error('Error al realizar el pedido:', error);
            alert('Error al realizar el pedido. Inténtalo de nuevo.');
        }
    };

    return (
        <div className="carrito-page">
            <button onClick={handleGoBack} className="back-button">Volver Atrás</button>
            <h1>Carrito</h1>
            <Carrito carrito={carrito} onRemove={handleRemoveFromCarrito} onUpdateCantidad={handleUpdateCantidad}/>
            <button onClick={handlePlaceOrder} className="place-order-button">Realizar Pedido</button>
        </div>
    );
};

export default CarritoPage;
