import {combineReducers} from "redux";
import {createStore, applyMiddleware} from "redux";
import hotelsReducer from "./hotelsReducer";
import { composeWithDevTools } from 'redux-devtools-extension'
import thunk from "redux-thunk";

const rootReducer = combineReducers({
    hotels: hotelsReducer
})

export const store = createStore(rootReducer, composeWithDevTools(applyMiddleware(thunk)))