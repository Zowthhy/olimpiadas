import './App.css';
import {BrowserRouter, Routes, Route } from 'react-router-dom';
import Index from './pages/Index.jsx';

function App() {
  return (
    <div className="App">
      <header className="App-header">
        <BrowserRouter>
          <Routes>
            <Route path="/" element={<Index />} />
          </Routes>
        </BrowserRouter>
      </header>
    </div>
  );
}

export default App;
