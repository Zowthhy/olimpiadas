import React from 'react';
import '../styles/Footer.css'; // Importa el archivo CSS para los estilos del footer

const Footer = () => {
return (
<footer className="footer">
    <div className="footer-content">
    <div className="footer-left">
        <p>&copy; {new Date().getFullYear()} Tu Empresa. Todos los derechos reservados.</p>
    </div>
    <div className="footer-right">
        <a href="/privacy-policy">Política de Privacidad</a>
        <a href="/terms-of-service">Términos de Servicio</a>
        <a href="/contact">Contacto</a>
    </div>
    </div>
</footer>
);
};

export default Footer;
