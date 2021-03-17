import React, { useState, useEffect } from 'react';
import axios from 'axios';
import { Link } from 'react-router-dom';

const EachDay = () => {
    
    const [values, setValues] = useState({year: 2021, month: 1, day: 1});
    const [type, setType] = useState('「」');
    const [number, setNumber] = useState('読み込み中');
    const [date, setDate] = useState('「」');
    
    
    const getNum = async (id) => {
        
        setNumber(data['読み込み中']);
        
        const res = await axios.get('../../api/day/' + id + '/' + values.year + '/' + values.month + '/' + values.day);
        const data = res.data.data;
        
        setDate(data['日付']);
        setType(data['分類']);
        setNumber(data['人数']);
        
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
        <div className="left">
            <p>日別情報</p>
            <p><span className="emphasis">{date}</span>のコロナウイルス<span className="emphasis">{type}</span>は</p>
            <p><span className="number">{number}</span>人</p>
            <div className="selects">
                <select name="year" value={values.year} onChange={valuesChange} className="select-max">
                    <option>2020</option>
                    <option>2021</option>
                </select>
                <span>年</span>
                {(() => {
                const month = [];
                    for (let i = 1; i < 13; i++) {
                        month.push(<option>{ i }</option>)
                    }
                    return <select name="month" value={values.month} onChange={valuesChange} className="select-min">{ month }</select>;
                })()}
                <span>月</span>
                {(() => {
                const day = [];
                    for (let t = 1; t < 32; t++) {
                        day.push(<option>{ t }</option>)
                    }
                    return <select name="day" value={values.day} onChange={valuesChange} className="select-min">{ day }</select>;
                })()}
                <span>日</span>
            </div>
            <div>
                <button onClick={() =>getNum(1)}>陽性者数</button>
                <button onClick={() =>getNum(2)}>重症者数</button>
                <button onClick={() =>getNum(3)}>検査人数</button>
            </div>
            <Link to="/" className="link">
                最新発表情報
            </Link>
        </div>
    );
    
    
}

export default EachDay;