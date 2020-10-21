import React from 'react';

import { DEFAULT_IMG_PATH } from '../../Consts';

function Vote({vote}) {
    const imgSrc = vote.user.image_path ? `/${vote.user.image_path}` : DEFAULT_IMG_PATH;

    return (
        <div className="card mb-3">
            <div className="card-body">
                <div className="row">
                    <div className="col-3">
                        <img src={imgSrc} alt="User image" className="img-fluid rounded-circle" />
                    </div>
                    <div className="col-9">
                        <p>
                            <a href={`/profile/${vote.user.id}`}
                                className="text-dark text-decoration-none font-weight-bold mr-2">
                                    {vote.user.name}
                            </a>
                            {vote.created_at}
                        </p>
                        <p>{vote.description}</p>
                        <p>{vote.value}</p>
                    </div>
                </div>
            </div>
        </div>
    );
}

export default Vote;
