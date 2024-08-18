import React, { useState } from 'react';
import axios from 'axios';
import { useNavigate } from 'react-router-dom';
import '../styles/Login.css'; // Asegúrate de que la ruta sea correcta

const Login = () => {
const [correo, setCorreo] = useState('');
const [contraseña, setContraseña] = useState('');
const [error, setError] = useState('');
const navigate = useNavigate();

const handleLogin = async (event) => {
event.preventDefault();
try {
    const response = await axios.post('/api/login', {
    correo,
    contraseña
    });

    if (response.data.success) {
    navigate('/'); // Redirige a la página principal después del inicio de sesión
    } else {
    setError('Credenciales incorrectas.');
    }
} catch (error) {
    setError('Error al iniciar sesión. Inténtalo de nuevo.');
}
};

return (
<div className="login-container">
    <h2>Inicio de Sesión</h2>
    <form onSubmit={handleLogin}>
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
    {error && <div className="error">{error}</div>}
    <button type="submit">Iniciar Sesión</button>
    <div className="form-group">
        <p>¿No tienes una cuenta? <a href="/registro">Regístrate</a></p>
    </div>
    </form>
</div>
);
};

export default Login;