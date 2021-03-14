import React from 'react';
import axios from 'axios';

const Top = () => {
    
    // useEffect(() => {
        
    const initial = async (id) => {
        
        const res = await axios.get('../spasite/public/api/total/' + id);
        console.log(res.data);
        console.table(res.data);
        
    }
        // initial();
    // }, []);
    
    return (
        <div>
            <p>トップ</p>
            <button onClick={() =>initial(1)}>取得</button>
            <button onClick={() =>initial(2)}>取得</button>
            <button onClick={() =>initial(3)}>取得</button>
        </div>
    );
    
    
}

export default Top;