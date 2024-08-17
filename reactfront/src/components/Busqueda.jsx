

function Busqueda({placeHolder="Buscar...", onSearchChange}){

    const handleChangeBusqueda = (e) => {
        onSearchChange(e); // Pasar el evento completo (e)
    };


    return(

        <section className="busqueda-section">
            
            <input 
            type="text" 
            onChange={handleChangeBusqueda} 
            placeholder={placeHolder}
            className="search-bar" />

        </section>


    )
}
export default Busqueda