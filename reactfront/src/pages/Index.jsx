import React, { useState } from 'react';
import '../styles/index.css';
import { useNavigate } from 'react-router-dom';
import Busqueda from '../components/Busqueda';
import Nav from '../components/Nav'
import Footer from '../components/Footer';


const Index = () => {

const navigate = useNavigate();
const [filter, setFilter] = useState('');
const [filterText, setFilterText] = useState('');
const [showForm, setShowForm] = useState(false);
const [formData, setFormData] = useState({
    nombre: '',
    descipcion: '',
    imagen: '',
    stock: 0,
    precio: 0,
    });

const [productos, setProductos] = useState([
    {nombre: 'Producto A', descripcion: 'Descripción del Producto A', imagen: 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ffolder.es%2F41611-large_default%2Fcaja-de-35-botellas-de-agua-nestle-aquarel-033l.jpg&f=1&nofb=1&ipt=5b6fe52d29c0ca85c9718802fa42b73cd5e14d9ae547bbc74d95b143d222335a&ipo=images', stock: 50, precio: 100.0,},
    {nombre: 'Producto B', descripcion: 'Descripción del Producto B', imagen: 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fstatic.mercadonegro.pe%2Fwp-content%2Fuploads%2F2017%2F07%2F22194845%2Fembotellada.jpg&f=1&nofb=1&ipt=f87a9de64da09b10d067924a1bf039e0f061ee051efe1968fdd5f9fa0eaa35cd&ipo=images', stock: 30, precio: 200.0,},
    {nombre: 'Producto C', descripcion: 'Descripción del Producto C', imagen: 'https://example.com/imagen-producto-c.jpg', stock: 20, precio: 300.0,},
    {nombre: 'Producto C', descripcion: 'Descripción del Producto C', imagen: 'https://example.com/imagen-producto-c.jpg', stock: 20, precio: 300.0,},
    {nombre: 'Producto C', descripcion: 'Descripción del Producto C', imagen: 'https://example.com/imagen-producto-c.jpg', stock: 20, precio: 300.0,},
    {nombre: 'Producto C', descripcion: 'Descripción del Producto C', imagen: 'https://example.com/imagen-producto-c.jpg', stock: 20, precio: 300.0,},
    {nombre: 'Producto C', descripcion: 'Descripción del Producto C', imagen: 'https://example.com/imagen-producto-c.jpg', stock: 20, precio: 300.0,},
    {nombre: 'Producto C', descripcion: 'Descripción del Producto C', imagen: 'https://example.com/imagen-producto-c.jpg', stock: 20, precio: 300.0,},
    {nombre: 'Producto C', descripcion: 'Descripción del Producto C', imagen: 'https://example.com/imagen-producto-c.jpg', stock: 20, precio: 300.0,},
    {nombre: 'Producto C', descripcion: 'Descripción del Producto C', imagen: 'https://example.com/imagen-producto-c.jpg', stock: 20, precio: 300.0,},
    {nombre: 'Producto C', descripcion: 'Descripción del Producto C', imagen: 'https://example.com/imagen-producto-c.jpg', stock: 20, precio: 300.0,},
    {nombre: 'Producto C', descripcion: 'Descripción del Producto C', imagen: 'https://example.com/imagen-producto-c.jpg', stock: 20, precio: 300.0,},
    {nombre: 'Producto C', descripcion: 'Descripción del Producto C', imagen: 'https://example.com/imagen-producto-c.jpg', stock: 20, precio: 300.0,},

]);

const handleSearchChange = (event) => {
    setFilterText(event.target.value);
};

const filteredProducts = productos.filter((producto) =>
    producto.nombre.toLowerCase().includes(filterText.toLowerCase())
);

return (
    <div className="container">
        <Nav />
        <div className="productos-container">
            <div className="header">
            <Busqueda
                placeHolder="buscar productos..."
                onSearchChange={handleSearchChange}
            />

            </div>
            <div className="products-grid">
            

            {filteredProducts.map((producto, index) => (
                <div
                key={index} // Asegúrate de usar un identificador único si está disponible
                className="product-box"
                onClick={() => console.log('Producto seleccionado:', producto.nombre)}
                >
                <img src={producto.imagen} alt={producto.nombre} />
                <div className="product-title">{producto.nombre}</div>
                <div className="product-stock">Stock: {producto.stock}</div>
                <div className="product-price">Precio: ${producto.precio.toFixed(2)}</div>
                </div>
            ))}
            </div>
        </div>
        <Footer />
    </div>
);
};

export default Index;