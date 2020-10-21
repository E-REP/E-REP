import React, { useState, useEffect } from 'react';

import { API_URL } from '../Consts';

import Details from './details/Details';
import DetailsForm from './details/DetailsForm';

import Image from './image/Image';
import ImageModal from './image/ImageModal';
import VoteList from './vote/VoteList';

function Profile() {
    const [details, setDetails] = useState({});
    const [isLoading, setIsLoading] = useState(true);

    async function fetchDetails() {
        const res = await axios(`${API_URL}/users/${globalData.profileId}`);
        setDetails(res.data);
        setIsLoading(false);
    }

    useEffect(() => {
        fetchDetails();
    }, []);

    const onImageDelete = () => {
        const newDetails = { ...details };
        newDetails.image_path = null;

        setDetails(newDetails);
    }

    const onImageUpload = (image_path) => {
        const newDetails = { ...details, image_path };

        setDetails(newDetails);
    }

    const onDetailsUpdate = (updatedDetails) => {
        const newDetails = { ...details, ...updatedDetails };

        setDetails(newDetails);
    }

    const onListUpdated = () => {
        fetchDetails();
    }


    if (isLoading) {
        return <p>Loading...</p>;
    }

    return (
        <div className="container">
            <div className="row">
                <div className="col-12 col-md-3">
                    <div className="row row-cols-1">
                        <div className="col">
                            <Image image_path={details.image_path}>
                                <ImageModal
                                    image_path={details.image_path}
                                    onImageUpload={onImageUpload}
                                    onImageDelete={onImageDelete}
                                    userId={details.id}
                                />
                            </Image>
                        </div>
                        <div className="col">
                            <Details {...details}>
                                <DetailsForm onDetailsUpdate={onDetailsUpdate} userId={details.id}/>
                            </Details>
                        </div>
                    </div>
                </div>
                <div className="col-12 col-md-9">
                    <VoteList onListUpdated={onListUpdated} userId={details.id}/>
                </div>
            </div>
        </div>
    );
}

export default Profile;
