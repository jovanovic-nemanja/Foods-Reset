"use strict";

let store = {
    state: {
        user: null
    },
    mutations: {
        SET_USER(state,user){
            state.user = user;
        }
    },
};

export default store;
