import React, {useEffect} from 'react';
import {useDispatch, useSelector} from "react-redux";
import {getHotels} from "./actions/hotels";
import HotelBlock from "./HotelBlock";

const Main = () => {
    const dispatch = useDispatch()
    const hotels = useSelector(state => state.hotels.items)

    useEffect(() => {
        dispatch(getHotels())
    }, [])

    return (
        <div className="container mx-auto px-4 flex flex-row flex-wrap">
            {hotels.map(hotel =>
                <HotelBlock key={hotel.id} hotel={hotel}/>
            )}
        </div>
    );
};

export default Main;