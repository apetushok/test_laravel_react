const SET_HOTELS = 'SET_HOTELS'
const SET_HOTEL = 'SET_HOTEL'

const defaultState = {
    items: [],
    item: [],
    isLoading: true
}

export default function hotelsReducer(state = defaultState, action) {
    switch (action.type) {
        case SET_HOTELS:
            return {
                ...state,
                items: action.payload
            }
        case SET_HOTEL:
            return {
                ...state,
                item: action.payload
            }
        default:
            return state
    }
}

export const setHotels = hotels => ({type:SET_HOTELS, payload:hotels})
export const setHotel = hotel => ({type:SET_HOTEL, payload:hotel})