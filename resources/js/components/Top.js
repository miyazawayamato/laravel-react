import React, { useState, useEffect } from 'react';
import axios from 'axios';

const Top = () => {
    
    const [date, setDate] = useState('');
    const [type, setType] = useState('');
    const [number, setNumber] = useState('');
    
    useEffect(() => {
        
        const first = async () => {
            
            const res = await axios.get('../../api/total/1');
            
            const data = res.data.data;
            
            console.table(res);
            
            setDate(data['日付']);
            setType(data['分類']);
            setNumber(data['人数']);
            
        }
        
        
        first();
        }, []);
        
        
        
    const initial = async (id) => {
        
        const res = await axios.get('../../api/total/' + id);
        const data = res.data.data;
        setDate(data['日付']);
        setType(data['分類']);
        setNumber(data['人数']);
        
    }
    
    
    return (
        <div className="left">
            <p>コロナウイルス最新発表情報</p>
            <p><span className="emphasis">{date}</span>の時点で<span className="emphasis">{type}</span>の累計は</p>
            <p><span className="number">{number}</span>人</p>
            <div className="buttons">
                <button onClick={() =>initial(1)} type="button">死亡者数</button>
                <button onClick={() =>initial(2)} type="button">陽性者数</button>
                <button onClick={() =>initial(3)} type="button">重症者数</button>
            </div>
            <Link to="/spasite/public/day">
                日付別
            </Link>
        </div>
    );
    
    
}

export default Top;