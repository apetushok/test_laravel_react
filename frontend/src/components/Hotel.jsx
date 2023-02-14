import React, {useEffect} from 'react';
import {useParams} from "react-router";
import {getHotel} from "./actions/hotels";
import {useDispatch, useSelector} from "react-redux";
import {Link} from "react-router-dom";

const Hotel = () => {

    const params = useParams();
    const dispatch = useDispatch()
    const hotel = useSelector(state => state.hotels.item)

    useEffect(() => {
        dispatch(getHotel(params.id))
    }, [])

    return (
        <div className="container mx-auto py-10">
            <Link to="/">
                <button
                    className="px-4 py-1 text-sm text-purple-600 font-semibold rounded-full border border-purple-200 hover:text-white hover:bg-purple-600 hover:border-transparent focus:outline-none focus:ring-2 focus:ring-purple-600 focus:ring-offset-2">Back
                </button>
            </Link>
            <br/>
            <div className="px-4 flex flex-row flex-wrap">
                <h3>{hotel.name}</h3>
                <p className="py-5">{hotel.description}</p>
            </div>
        </div>
    );
};

export default Hotel;