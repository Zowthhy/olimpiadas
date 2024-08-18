import React, { useState } from 'react';
import '../styles/index.css';
import { useNavigate } from 'react-router-dom';
import Busqueda from '../components/Busqueda';
import Nav from '../components/Nav';
import Footer from '../components/Footer';

const Index = () => {
    const [carrito, setCarrito] = useState([]);
    const [filterText, setFilterText] = useState('');
    const [quantities, setQuantities] = useState({});
    const [selectedProduct, setSelectedProduct] = useState(null);
    const [selectedQuantity, setSelectedQuantity] = useState(1);

    const productos = [
        {codigo: 0, nombre: 'Producto A', descripcion: 'Descripción del Producto A', stock: 50, precio: 100.0,},
        {codigo: 1, nombre: 'Producto B', descripcion: 'Descripción del Producto B', stock: 30, precio: 200.0,},
        {codigo: 2, nombre: 'Producto C', descripcion: 'Descripción del Producto C', stock: 20, precio: 300.0,},
        {codigo: 3, nombre: 'Producto D', descripcion: 'Descripción del Producto D', stock: 20, precio: 300.0,},
        {codigo: 4, nombre: 'Producto E', descripcion: 'Descripción del Producto E', stock: 20, precio: 300.0,},
        {codigo: 5, nombre: 'Producto F', descripcion: 'Descripción del Producto F', stock: 20, precio: 300.0,},
        {codigo: 6, nombre: 'Producto G', descripcion: 'Descripción del Producto G', stock: 20, precio: 300.0,},
        {codigo: 7, nombre: 'Producto H', descripcion: 'Descripción del Producto H', stock: 20, precio: 300.0,},
    ];

    const handleSelectQuantity = (producto) => {
        setSelectedProduct(producto);
        setSelectedQuantity(1); // Reinicia la cantidad por defecto
    };

    const confirmAddToCarrito = () => {
        if (selectedProduct) {
            const producto = selectedProduct;
            const cantidad = selectedQuantity;

            setCarrito(prevCarrito => {
                const itemIndex = prevCarrito.findIndex(item => item.codigo === producto.codigo);
                if (itemIndex !== -1) {
                    const newCarrito = [...prevCarrito];
                    newCarrito[itemIndex].cantidad += cantidad;
                    return newCarrito;
                } else {
                    return [...prevCarrito, { ...producto, cantidad }];
                }
            });

            // Ocultar el modal o componente de selección
            setSelectedProduct(null);
        }
    };

    const handleSearchChange = (event) => {
        setFilterText(event.target.value);
    };

    const filteredProducts = productos.filter((producto) =>
        producto.nombre.toLowerCase().includes(filterText.toLowerCase())
    );

    return (
        <div className="container">
            <Nav carrito={carrito} />
            <div className="productos-container">
                <div className="header">
                    <Busqueda
                        placeHolder="buscar productos..."
                        onSearchChange={handleSearchChange}
                    />
                </div>
                <div className="products-grid">
                    {filteredProducts.map((producto) => (
                        <div key={producto.codigo} className="product-box">
                            <div className="product-title">{producto.nombre}</div>
                            <div className="product-stock">Stock: {producto.stock}</div>
                            <div className="product-price">Precio: ${producto.precio.toFixed(2)}</div>
                            <button onClick={() => handleSelectQuantity(producto)}>Añadir al Carrito</button>
                        </div>
                    ))}
                </div>
            </div>
            <Footer />

            {selectedProduct && (
                <div className="quantity-modal">
                    <h3>Selecciona la Cantidad</h3>
                    <input
                        type="number"
                        min="1"
                        max={selectedProduct.stock}
                        value={selectedQuantity}
                        onChange={(e) => setSelectedQuantity(Number(e.target.value))}
                    />
                    <button onClick={confirmAddToCarrito}>Confirmar</button>
                    <button onClick={() => setSelectedProduct(null)}>Cancelar</button>
                </div>
            )}
        </div>
    );
};

export default Index;
