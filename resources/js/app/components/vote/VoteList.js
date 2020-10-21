import React, { useState, useEffect } from 'react';

import axios from 'axios';

import { API_URL } from '../../Consts';
import Vote from './Vote';
import VoteForm from './VoteForm';

function VoteList({ userId, onListUpdated }) {
    const [votes, setVotes] = useState([]);
    const [count, setCount] = useState(0);
    const [isLoading, setIsLoading] = useState(true);
    const [page, setPage] = useState(1);

    async function fetchVotes() {
        const res = await axios(`${API_URL}/users/${userId}/received-votes`);
        setVotes(res.data.items);
        setCount(res.data.count);
        setIsLoading(false);
    }

    useEffect(() => {
        fetchVotes();
    }, []);

    const handleClick = async () => {
        const newPage = page + 1;

        const res = await axios(`${API_URL}/users/${userId}/received-votes?page=${newPage}`);

        const newVotes = [...votes, ...res.data.items];
        const newCount = res.data.count;

        setVotes(newVotes);
        setCount(newCount);
        setPage(newPage);
    }

    const onVoteAdded = () => {
        fetchVotes();
        setPage(1);
        onListUpdated();
    }

    if (isLoading) {
        return (
            <p>Loading...</p>
        )
    } else {
        return (
            <div>
                <h4>Vote</h4>
                <VoteForm onVoteAdded={onVoteAdded}/>
                <hr/>
                <h4>Recent votes</h4>
                { votes.length === 0 && <p>No votes yet</p>}
                {votes.length > 0 && votes.map(vote => {
                    return <Vote key={vote.id} vote={vote} />
                })}
                { votes.length !== count &&
                    <button className="btn btn-primary" onClick={handleClick}>Load more</button>
                }
            </div>
        );
    }
}

export default VoteList;
