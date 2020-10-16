import React, { useState } from 'react';

import axios from 'axios';

import { API_URL } from '../Consts';

function UserInfoForm() {
    const [name, setName] = useState('');

    async function handleSubmit(e) {
        e.preventDefault();

        if (name.length < 1 || description > 64) {
            return;
        }

        const res = await axios.patch(`${API_URL}/users/1`, {
            name,
        });

        console.log(res);

        setName('');
    }

    function handleChange(e) {
        setName(e.target.value);
    }

    return (
        <div>
            <form onSubmit={handleSubmit}>
                <div className="form-group">
                    <label htmlFor="name">Name</label>
                    <input id="name" className="form-control" rows="3" onChange={handleChange}></input>
                </div>
                <button type="submit" className="btn btn-primary">Submit</button>
            </form>
        </div>
    );
}

export default UserInfoForm;