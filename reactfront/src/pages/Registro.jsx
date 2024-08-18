// src/pages/Registro.jsx
import React, { useState } from 'react';
import axios from 'axios';
import { useNavigate } from 'react-router-dom';
import '../styles/Registro.css'; // Asegúrate de que la ruta sea correcta

const Registro = () => {
const [nombre, setNombre] = useState('');
const [dni, setDni] = useState('');
const [correo, setCorreo] = useState('');
const [contraseña, setContraseña] = useState('');
const [confirmarContraseña, setConfirmarContraseña] = useState('');
const [telefono, setTelefono] = useState('');
const [direccion, setDireccion] = useState('');
const [error, setError] = useState('');
const [passwordMatch, setPasswordMatch] = useState(true);
const navigate = useNavigate();

const handleRegister = async (event) => {
event.preventDefault();
if (contraseña !== confirmarContraseña) {
    setPasswordMatch(false);
    return;
}
try {
    const response = await axios.post('/api/registro', {
    nombre,
    dni,
    correo,
    contraseña,
    telefono,
    direccion
    });
    navigate('/login'); // Redirige a la página de login después del registro
} catch (error) {
    setError('Error al registrar. Inténtalo de nuevo.');
}
};

return (
<div className="registro-container">
    <h2>Registro</h2>
    <form onSubmit={handleRegister}>
    <div className="form-group">
        <label htmlFor="nombre">Nombre</label>
        <input
        type="text"
        id="nombre"
        value={nombre}
        onChange={(e) => setNombre(e.target.value)}
        required
        />
    </div>
    <div className="form-group">
        <label htmlFor="dni">DNI</label>
        <input
        type="text"
        id="dni"
        value={dni}
        onChange={(e) => setDni(e.target.value)}
        required
        />
    </div>
    <div className="form-group">
        <label htmlFor="correo">Correo Electrónico</label>
        <input
        type="email"
        id="correo"
        value={correo}
        onChange={(e) => setCorreo(e.target.value)}
        required
        />
    </div>
    <div className="form-group">
        <label htmlFor="contraseña">Contraseña</label>
        <input
        type="password"
        id="contraseña"
        value={contraseña}
        onChange={(e) => setContraseña(e.target.value)}
        required
        />
    </div>
    <div className="form-group">
        <label htmlFor="confirmarContraseña">Confirmar Contraseña</label>
        <input
        type="password"
        id="confirmarContraseña"
        value={confirmarContraseña}
        onChange={(e) => setConfirmarContraseña(e.target.value)}
        required
        />
    </div>
    {!passwordMatch && <div className="error">Las contraseñas no coinciden.</div>}
    <div className="form-group">
        <label htmlFor="telefono">Teléfono</label>
        <input
        type="text"
        id="telefono"
        value={telefono}
        onChange={(e) => setTelefono(e.target.value)}
        />
    </div>
    <div className="form-group">
        <label htmlFor="direccion">Dirección</label>
        <textarea
        id="direccion"
        value={direccion}
        onChange={(e) => setDireccion(e.target.value)}
        />
    </div>
    {error && <div className="error">{error}</div>}
    <button type="submit">Registrar</button>
    </form>
</div>
);
};

export default Registro;
