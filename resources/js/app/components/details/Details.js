import React, { useState } from 'react';

import styled from 'styled-components';

const EditButton = styled.button`
    padding: 0;
`;

function Details({ reputation, name, created_at, children }) {
    const [isEditingName, setIsEditingName] = useState(false);

    const toggleEditName = () => {
        setIsEditingName(!isEditingName);
    }

    return (
        <div>
            <p className="font-weight-bold">Current reputation { reputation }</p>
            <p>{ name } <EditButton className="btn btn-link" onClick={toggleEditName}>(Edit)</EditButton></p>
            { isEditingName && React.Children.map(children, child => {
                return React.cloneElement(child, {
                    toggleEditName
                })
            })}

            <p>Joined on {created_at}</p>
        </div>
    );
}

export default Details;
