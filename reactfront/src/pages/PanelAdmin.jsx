import React from 'react';
import ProductManager from '../components/ProductManager';
import OrderManager from '../components/OrderManager';
import '../styles/PanelAdmin.css';

const AdminPanel = () => {
    return (
        <div className="admin-panel">
            <h1>Panel de Administración</h1>
            <ProductManager />
            <OrderManager />
        </div>
    );
};

export default AdminPanel;
