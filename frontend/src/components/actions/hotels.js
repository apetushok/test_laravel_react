import axios from "axios";
import {setHotel, setHotels} from "../../reducers/hotelsReducer";

export const getHotels = () => {
    return async dispatch => {
        const response = await axios.get('https://57b3-89-114-64-239.ngrok.io/api/hotel')
        dispatch(setHotels(response.data))
    }
}

export const getHotel = id => {
    return async dispatch => {
        const response = await axios.get(`https://57b3-89-114-64-239.ngrok.io/api/hotel/${id}`)
        dispatch(setHotel(response.data))
    }
}