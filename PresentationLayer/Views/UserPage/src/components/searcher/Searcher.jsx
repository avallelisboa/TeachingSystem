import React from 'react'
import NavBar from '../navbar/NavBar'

const Searcher = () => {
    const [isTherePriceRange, setIsTherePriceRange] = React.useState(false);

    const search = (e) => {
        e.preventDefault();

        let search = e.target.search.value;
        let search_type = e.target.search_type.value;
        let type = e.target.type.value;
        
        console.log(search);
        console.log(search_type);
        console.log(type);

        let price_range = e.target.price_range.checked;
        if(price_range){
            let min_price = e.target.min_price.value;
            let max_price = e.target.max_price.value;
            
            console.log(min_price);
            console.log(max_price);
        }
    }
    return (
        <>
            <section>
                <article>
                <h2>Buscador</h2>
                </article>
                <article>
                    <form onSubmit={(e)=>{search(e);}}>
                        <fieldset>
                            <input type="text" id="search" name="search" required/>
                        </fieldset>
                        <fieldset>
                            <p>
                                <label htmlFor="subject">por materia</label>
                                <input type="radio" id="subject" value="subject" name="search_type" defaultChecked/>
                            </p>
                            <p>
                                <label htmlFor="teacher">por docente</label>
                                <input type="radio" id="teacher" value="teacher" name="search_type"/>
                            </p>
                        </fieldset>
                        <fieldset>
                            <p>
                                <label htmlFor="subject">clases</label>
                                <input type="radio" id="subject" value="classes" name="type" defaultChecked/>
                            </p>
                            <p>
                                <label htmlFor="teacher">curso</label>
                                <input type="radio" id="teacher" value="course" name="type"/>
                            </p>
                        </fieldset>
                        <fieldset>
                            <label htmlFor="price_range">rango de precios</label>
                            <input type="checkbox" id="price_range" name="price_range" onChange={() => setIsTherePriceRange(!isTherePriceRange)}/>
                        </fieldset>
                        {
                            isTherePriceRange ?
                                <>
                                    <fieldset>
                                        <label>precio mínimo</label>
                                        <input type="number" id="min_price" name="min_price" min="0" defaultValue="0"/>
                                    </fieldset>
                                    <fieldset>
                                        <label>precio máximo</label>
                                        <input type="number" id="max_price" name="max_price" min="0" defaultValue="1000"/>
                                    </fieldset>
                                    
                                </>
                                :
                                null

                        }
                        <fieldset>
                            <input className="btn btn-primary" type="submit" value="Buscar"/>
                        </fieldset>
                    </form>
                </article>
            </section>
        </>
        
    )
}

export default Searcher