import React, { useRef } from 'react';

import { API_URL, DEFAULT_IMG_PATH } from '../../Consts';

function ImageModal({ userId, image_path, onImageUpload, onImageDelete }) {
    const inputEl = useRef(null);
    const imgSrc = image_path ? `/${image_path}` : DEFAULT_IMG_PATH;

    function onUploadClick() {
        inputEl.current.click();
    }

    async function onDeleteClick() {
        await axios.delete(`${API_URL}/users/${userId}/image`);
        onImageDelete();
    }

    async function onFileSelect(e) {
        const file = e.target.files[0];
        const data = new FormData()
        data.append('image', file);

        const res = await axios.post(`${API_URL}/users/${userId}/image`, data);

        onImageUpload(res.data);
    }

    return (
        <div id="image-modal" className="modal" tabIndex="-1" role="dialog">
            <div className="modal-dialog" role="document">
                <div className="modal-content">
                <div className="modal-header">
                    <h5 className="modal-title">Profile image</h5>
                    <button type="button" className="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div className="modal-body">
                    <div className="text-center">
                        <img src={imgSrc} className="img-fluid" alt="User image"/>
                    </div>
                    <form className="d-none">
                        <input type="file" className="form-control-file" ref={inputEl} onChange={onFileSelect}/>
                    </form>
                </div>
                <div className="modal-footer">
                    <button type="button" className="btn btn-primary" onClick={onUploadClick}>Upload</button>
                    <button type="button" className="btn btn-secondary" onClick={onDeleteClick}>Delete</button>
                    <button type="button" className="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
        </div>
    );
}

export default ImageModal;
