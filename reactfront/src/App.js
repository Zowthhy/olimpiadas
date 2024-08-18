import './App.css';
import {BrowserRouter, Routes, Route } from 'react-router-dom';
import Index from './pages/Index.jsx';
import Carrito from './pages/CarritoPage';

function App() {
  return (
    <div className="App">
      <header className="App-header">
        <BrowserRouter>
          <Routes>
            <Route path="/" element={<Index />} />
            <Route path="/carrito" element={<Carrito />} />
          </Routes>
        </BrowserRouter>
      </header>
    </div>
  );
}

export default App;
