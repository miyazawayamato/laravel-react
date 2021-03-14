import React, { useState } from 'react';

const EachDay = () => {
    
    const [values, setValues] = useState({year: 2021, month: 1, day: 1});
    
    const getNum = async (id) => {
        
        
        
        const res = await axios.get('../spasite/public/api/day/' + id + '/' + values.year + '/' + values.month + '/' + values.day);
        
        
        console.log(res.data);
        console.table(res.data);
        
    }
    
    
    const valuesChange = (event) => {
        
        const tName = event.target.name;
        const tValue = event.target.value;
        
        switch ( tName ) {
            case 'year':
                setValues({ ...values, year: tValue });
                break;
            case 'month':
                setValues({ ...values, month: tValue });
                break;
            case 'day':
                setValues({ ...values, day: tValue });
                break;
        }
        
    }
    
    return (
        <div>
            <p>トップ</p>
            <p>{values.year}</p>
            <p>{values.month}</p>
            <p>{values.day}</p>
            <p></p>
            <p></p>
            <div>
                <button onClick={() =>getNum(1)}>取得</button>
                <button onClick={() =>getNum(2)}>取得</button>
                <button onClick={() =>getNum(3)}>取得</button>
            </div>
            <div>
                <select name="year" value={values.year} onChange={valuesChange} >
                    <option>2020</option>
                    <option>2021</option>
                </select>
                {(() => {
                const month = [];
                    for (let i = 1; i < 13; i++) {
                        month.push(<option>{ i }</option>)
                    }
                    return <select name="month" value={values.month} onChange={valuesChange}>{ month }</select>;
                })()}
                {(() => {
                const day = [];
                    for (let t = 1; t < 32; t++) {
                        day.push(<option>{ t }</option>)
                    }
                    return <select name="day" value={values.day} onChange={valuesChange}>{ day }</select>;
                })()}
            </div>
        </div>
    );
    
    
}

export default EachDay;