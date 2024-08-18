import React, { useState, useEffect } from 'react';
import axios from 'axios';
import '../styles/ProductManager.css'; // Asegúrate de tener estilos para el panel de administración

const ProductManager = () => {
    const [productos, setProductos] = useState([]);
    const [editProduct, setEditProduct] = useState(null);
    const [formData, setFormData] = useState({
        codigo: '',
        nombre: '',
        descripcion: '',
        imagen: '',
        stock: 0,
        precio: 0,
    });

    useEffect(() => {
        const fetchProductos = async () => {
            try {
                const response = await axios.get('/api/productos'); // Cambia esta URL según tu backend
                setProductos(response.data);
            } catch (error) {
                console.error('Error fetching productos:', error);
            }
        };
        fetchProductos();
    }, []);

    const handleEditClick = (producto) => {
        setEditProduct(producto);
        setFormData({ ...producto });
    };

    const handleInputChange = (e) => {
        const { name, value } = e.target;
        setFormData((prevFormData) => ({
            ...prevFormData,
            [name]: value,
        }));
    };

    const handleSubmit = async (e) => {
        e.preventDefault();
        try {
            await axios.put(`/api/productos/${formData.codigo}`, formData); //cambiar la url a la q es
            const updatedProductos = productos.map((prod) =>
                prod.codigo === formData.codigo ? formData : prod
            );
            setProductos(updatedProductos);
            setEditProduct(null);
        } catch (error) {
            console.error('Error updating producto:', error);
        }
    };

    const handleDelete = async (codigo) => {
        try {
            await axios.delete(`/api/productos/${codigo}`); // x2
            setProductos(productos.filter((producto) => producto.codigo !== codigo));
        } catch (error) {
            console.error('Error deleting producto:', error);
        }
    };

    return (
        <div className="product-manager">
            <h1>Panel de Administración de Productos</h1>
            <h2>{editProduct ? 'Editar Producto' : 'Agregar Nuevo Producto'}</h2>
            <form onSubmit={handleSubmit} className="product-form">
                <label>
                    Código:
                    <input
                        type="text"
                        name="codigo"
                        value={formData.codigo}
                        onChange={handleInputChange}
                        disabled={!!editProduct}
                    />
                </label>
                <label>
                    Nombre:
                    <input
                        type="text"
                        name="nombre"
                        value={formData.nombre}
                        onChange={handleInputChange}
                    />
                </label>
                <label>
                    Descripción:
                    <input
                        type="text"
                        name="descripcion"
                        value={formData.descripcion}
                        onChange={handleInputChange}
                    />
                </label>
                <label>
                    Imagen URL:
                    <input
                        type="text"
                        name="imagen"
                        value={formData.imagen}
                        onChange={handleInputChange}
                    />
                </label>
                <label>
                    Stock:
                    <input
                        type="number"
                        name="stock"
                        value={formData.stock}
                        onChange={handleInputChange}
                    />
                </label>
                <label>
                    Precio:
                    <input
                        type="number"
                        name="precio"
                        value={formData.precio}
                        onChange={handleInputChange}
                    />
                </label>
                <button type="submit">{editProduct ? 'Actualizar Producto' : 'Agregar Producto'}</button>
            </form>
            <h2>Lista de Productos</h2>
            <ul>
                {productos.map((producto) => (
                    <li key={producto.codigo}>
                        <span>{producto.nombre}</span>
                        <button onClick={() => handleEditClick(producto)}>Editar</button>
                        <button onClick={() => handleDelete(producto.codigo)}>Eliminar</button>
                    </li>
                ))}
            </ul>
        </div>
    );
};

export default ProductManager;
