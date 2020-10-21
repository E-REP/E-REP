import React, { useState } from 'react';

import axios from 'axios';

import { API_URL } from '../../Consts';

function VoteForm({ userId, onVoteAdded }) {
    const defaultState = {
        value: '1',
        description: '',
    };

    const [state, setState] = useState(defaultState);

    async function handleSubmit(e) {
        e.preventDefault();

        if (state.description.length < 1 || state.description > 512) {
            return;
        }

        if (state.value !== '1' && state.value !== '-1') {
            return;
        }

        await axios.post(`${API_URL}/users/${userId}/received-votes`, {
            description: state.description,
            value: parseInt(state.value),
        });

        setState(defaultState);
        onVoteAdded();
    }

    function handleChange(e) {
        const value = e.target.value;

        setState({
            ...state,
            [e.target.name]: value
        });
    }

    return (
        <div>
            <form onSubmit={handleSubmit}>
                <div className="form-group">
                    <label htmlFor="description">Description</label>
                    <textarea id="description" className="form-control" rows="3" onChange={handleChange}
                        name="description"
                        value={state.description}
                    ></textarea>
                    <div className="form-check form-check-inline">
                        <input
                            className="form-check-input" type="radio" name="value" onChange={handleChange}
                            id="positive"
                            value="1"
                            checked={state.value === "1"}
                            />
                        <label className="form-check-label" htmlFor="positive">+1</label>
                    </div>
                    <div className="form-check form-check-inline">
                        <input
                            className="form-check-input" type="radio" name="value" onChange={handleChange}
                            id="negative"
                            value="-1"
                            checked={state.value === "-1"}
                        />
                        <label className="form-check-label" htmlFor="negative">-1</label>
                    </div>
                </div>
                <button type="submit" className="btn btn-primary">Submit</button>
            </form>
        </div>
    );
}

export default VoteForm;
