import React, { useState, useEffect } from 'react';
import axios from 'axios';

const OrderManager = () => {
    const [orders, setOrders] = useState([]);

    useEffect(() => {
        axios.get('/api/orders')
            .then(response => setOrders(response.data))
            .catch(error => console.error('Error fetching orders:', error));
    }, []);

    const handleMarkAsDelivered = (id) => {
        axios.put(`/api/orders/${id}`, { status: 'entregado' })
            .then(() => setOrders(orders.map(order => (order.id === id ? { ...order, status: 'entregado' } : order))))
            .catch(error => console.error('Error updating order status:', error));
    };

    const handleMarkAsPending = (id) => {
        axios.put(`/api/orders/${id}`, { status: 'pendiente' })
            .then(() => setOrders(orders.map(order => (order.id === id ? { ...order, status: 'pendiente' } : order))))
            .catch(error => console.error('Error updating order status:', error));
    };

    return (
        <div className="order-manager">
            <h2>Gestión de Pedidos</h2>
            {orders.map(order => (
                <div key={order.id}>
                    <span>Pedido ID: {order.id}</span>
                    <span>Estado: {order.status}</span>
                    <button onClick={() => handleMarkAsDelivered(order.id)}>Marcar como Entregado</button>
                    <button onClick={() => handleMarkAsPending(order.id)}>Marcar como Pendiente</button>
                </div>
            ))}
        </div>
    );
};

export default OrderManager;
